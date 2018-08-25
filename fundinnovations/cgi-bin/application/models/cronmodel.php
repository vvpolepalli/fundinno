<?php
/***************************************************************************
File Name		: cronmodel.php
Created Date	: 10-1-2013
Author			: Pramod Kumar C. K
****************************************************************************/

class cronmodel extends  CI_Model
{
	 function __construct()
    {
        parent::__construct();
    }
	function cron_fn(){
		$date   = date('Y-m-d H:i:s');
		$qry  = $this->db->query("select 
		p.id,p.funding_goal ,	
		DATEDIFF(DATE_ADD( date(p.created_date), INTERVAL p.fund_duration-1 day),CURDATE()) as remaining_days
		from projects p
		where DATEDIFF(DATE_ADD(date(p.created_date), INTERVAL p.fund_duration-1 day),CURDATE()) <0
		and project_status='ongoing'
		");
		//and project_status='ongoing'
		$res = $qry->result_array();
		foreach($res as $k=>$r){
			$fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  = array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			if($tot < $r['funding_goal'])
			{
				$sql  = "update projects set project_status='failed',pledged_amount=".$tot." where id=".$r['id'];	
				$qry1 =  $this->db->query($sql); 
				//$fund_det2=$this->project_allfund_details($r['id']);
				foreach($fund_det as $f2 ){
				$sq   = "update project_funds set fund_via='refunded' where fund_via='backed' and status='completed'  and project_id=".$r['id']." and id =".$f2['id']."";
				$qry  = $this->db->query($sq); 
				
				$sqref   = "update project_funds set status='deleted' where fund_via='referral' and status='pending' and project_id=".$r['id']." and referral_order_id=".$f2['id'];
				$qryref  = $this->db->query($sqref); 
                                
				$sql4 = "insert into  failed_project_backed_users (user_id,project_id,amount) 
				select  pf.user_id,pf.project_id ,pf.amount from  project_funds pf where pf.fund_via='refunded' and pf.project_id=".$r['id']." and pf.id =".$f2['id']." "; 
				$qry4 = $this->db->query($sql4);
                                
                                
				$sql3 = "insert into  fundinnovation_cash (order_id,user_id,cash,status,date) 
				select  pf.id as order_id,pf.user_id,pf.amount as cash,1,'".$date."' from  project_funds pf where pf.fund_via='refunded' and pf.project_id=".$r['id']." and pf.id =".$f2['id']." "; 
				$qry3 = $this->db->query($sql3);
				}
			}
			elseif($tot >= $r['funding_goal'])
			{
				$sql2  = "update projects set project_status='success' where id=".$r['id'];	
				$qry2  = $this->db->query($sql2);
				foreach($fund_det as $f2 ){
				if(	$f2['status'] =='completed'){
				$sq   = "update project_funds set status='completed' where fund_via='referral' and status='pending' and project_id=".$r['id']." and referral_order_id=".$f2['id'];
				$qry  = $this->db->query($sq); 
				
				$sql3 = "insert into  fundinnovation_cash (order_id,user_id,cash,status,date) 
				select  pf.id as order_id,pf.user_id,pf.amount as cash,1,'".$date."' from  project_funds pf where pf.fund_via='referral' and pf.status='completed' and referral_order_id=".$f2['id']." and pf.project_id=".$r['id']." ";
				$qry3 = $this->db->query($sql3);
				}
				}
				
				$project_details=$this->get_project_by_id($r['id']);
				$proj_owner     = $this->get_user_details($project_details['user_id']);
				$this->send_project_success_to_owner($proj_owner,$project_details);
			}
		}
	}
	function project_fund_details($projid){ 
		$sq="select * from project_funds where fund_via='backed' and status='completed' and project_id=".$projid;
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		//print_r($res);
		return $res;
	}
	
	function project_allfund_details($projid){ 
		$sq="select * from project_funds where fund_via='backed' and (status='completed' or status='pending') and project_id=".$projid;
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		//print_r($res);
		return $res;
	}
	function get_project_by_id($proj_id){
		$sql=$this->db->query("select * from projects where id = $proj_id");
		if($sql->num_rows()>0)
		{
			$result =$sql->result_array();
			return $result[0];
		} else {
			return NULL;	
		}
	}
	function get_user_details($userid){
		$sq="select user.*,cities.city_name,email_id,if (profile_image IS NULL,'',profile_image ) profile_image1 from user left join  cities on cities.city_id=user.city_id  where id=".$userid;
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		foreach($res as $k=>$r){
			//echo $r['profile_image'].'h';
		if($r['profile_image1'] !='' && $r['profile_image1'] != ' '){
			//echo 'l';
				$res[0]['profile_imgurl'] = base_url().'uploads/site_users/thumb/'.$r['profile_image1'];
			}elseif($r['fb_image'] !=''){
				$res[0]['profile_imgurl'] = $r['fb_image'].'?width=200&height=150';
			}elseif($r['in_image'] !=''){
				$res[0]['profile_imgurl']=$r['in_image'];
			}else{
				$res[0]['profile_imgurl'] = '';
			}
		}
		return $res[0];
	}
	function send_project_success_to_owner($owner,$project_det){
		$baseurl = base_url();
		
		$toEmailid	= $owner['email_id'];
		//$agent_name	= $this->input->post('agent_name');
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Your project on FundInnovations reached its funding goal successfully </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 0 10px 0; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" align="center" width="456" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						<p>Dear '.ucwords($owner['profile_name']).',<br />
						Congratulations.              
				<p>  Your project <a href="'.$baseurl.'archive_projects/project_details/'.$project_det['id'].'" >'.$project_det['project_title'].'</a> on FundInnovations has reached its funding goal successfully.</p>
				  <table width="535" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
				  <td width="210"><a href="'.$baseurl.'archive_projects/project_details/'.$project_det['id'].'"><img  width="200" src="'.$baseurl.'uploads/projects/images/200x150/'.$project_det['project_image'].'"/></a></td><td  valign="top"><a href="'.$baseurl.'archive_projects/project_details/'.$project_det['id'].'">'.$project_det['project_title'].'</a></td>
				  </tr>
				 
				 </table>
				</p><p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
           <strong>Team Fundinnovations</strong></p></td>
					   </tr>
                       
         </table>
        </p>
				              </td>
      </tr>
	
    </table></td>
  </tr>
    <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>
  </tr>	</table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>'; 
		
		$to = $toEmailid;
		$subject="Your project on FundInnovations reached its funding goal successfully";
		$headers= 'From: Team Fundinnovations <admin@fundinnovations.com>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); //
		return 'success'; 
	}
}
?>