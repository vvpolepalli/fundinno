<?php
class enquiry_model extends  CI_Model {
 function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library(array('phpsession','mysmarty','email'));
		
    }	
	

function list_enquirys_modelm(){		
	   $query		=	$this->db->query("SELECT * 
	   											FROM `enquiry`
												ORDER BY `datetime` desc");	 
	   $listResult	=	$query->result();
	   return $listResult;
		
	}
	
 function list_enquiry_single($id){
	   $this->db->select('*');
	   $this->db->from('enquiry');
	   $this->db->where('enquiry_id', $id); 
	   $Qry=$this->db->get();
	   $listResult=$Qry->result();
	   return $listResult;		
	}

  function delete_enquirym($id){
	   $startp=$this->input->post('startp');
	  $limitp=$this->input->post('limitp');
	  $this->db->where('enquiry_id', $id);
      $this->db->delete('enquiry'); 
	  
	 
	 
 }
 
 function send_emailm($_POST,$id){
	 $baseurl = base_url();
	 $userEmail =   $_POST['email'];
	 $subject	=	$_POST['subject'];
	 //$id	=	$_POST['id'];
	 $enquiry_content	=	$_POST['enquiry_content'];
	 $content='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
									<head>
									<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
									<title>estateace | Replymail</title>
									<style type="text/css">
<!--
BODY {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color:#fff;
}
.textfild {
	padding:4px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#030405;
}
.textfild_p {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#030405;
}
.textfildlink {
	padding:4px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#030405;
}
.textfildlink a {
	padding:4px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#030405;
	text-decoration:none;
}
.textfildlink a:hover {
	padding:4px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#00c4fd;
	text-decoration:underline;
}
-->
</style>
									</head>

									<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color:#fff;">
                                      <tbody>
    <tr>
                                          <td valign="top" align="right" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; padding:0"></td>
                                        </tr>
    <tr>
                                          <td valign="top" align="left" style="background-color:#fff; padding:0"><img width="582" height="69" border="0" usemap="#Map" alt="top" style="float:left;" src="'.$baseurl.'images/top.gif"></td>
                                        </tr>
    <tr>
                                          <td valign="top" align="left" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 ; background:#efeadd"><table width="530" cellspacing="0" cellpadding="0" border="0">
                                              <tbody>
                                              <tr>
                                                  <td valign="top" align="left" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding:0 10px 20px 10px; line-height:25px;"><p style="font-family:Verdana, Geneva, sans-serif; font-size:16px; color:#2E7CBE; border-bottom:dotted #bcbcbc 1px; font-weight:bold;">estateace <span style="color:#7a7a7a"></span></p>
                                                  <p align="justify">'.$enquiry_content.'</p>
                                                  <p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
                                                      <strong>estateace team</strong></p></td>
                                                </tr>
                                            </tbody>
                                            </table></td>
                                        </tr>
    <tr>
                                          <td valign="bottom" height="10px" bgcolor="#FFFFFF" align="center" style="color:#fff; font-size:10px; font-family:Tahoma, arial, verdana; padding:0 "><img width="582" height="39" alt="bottom" src="'.$baseurl.'images/bottom.gif"></td>
                                        </tr>
  </tbody>
                                    </table>
<map name="Map" id="Map">
                                      <area shape="rect" coords="16,10,219,50" href="#" />
                                    </map>
</body>
</html>';
				
				// Mail it
						$to=$userEmail;
						//$to='ilayaraja_s@ispg.in';
						$subject=$subject." - Estateace";
						$headers= 'From: Estateace <admin@estateace.com>' . "\r\n";
						$headers.="MIME-Version: 1.0\r\n";
						$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
						$status = mail($to, $subject,$content, $headers);
						//change reply status
						$Qry=$this->db->query("UPDATE `enquiry` SET 
															reply_status='1'
															WHERE enquiry_id ='".$id."'");	
				
 }
 //list property type after delete
 function list_enquiry_after_deletem()
	{
		
		$startp=$this->input->post('startp');
		$limitp=$this->input->post('limitp');
		$order=$this->input->post('order_by');
		if($order == "ASC_NAME")
		{
			$orderBy = " first_name  ASC";
		}
		elseif($order == "DESC_NAME")
		{
			$orderBy = " first_name  DESC";
		}
		elseif($order == "ASC_EMAIL")
		{
			$orderBy = " email ASC";
		}
		elseif($order == "DESC_EMAIL")
		{
			$orderBy = " email DESC";
		}
		elseif($order == "ASC_SUB")
		{
			$orderBy = " subject ASC";
		}
		elseif($order == "DESC_SUB")
		{
			$orderBy = " subject DESC";
		}
		elseif($order == "ASC_DATE")
		{
			$orderBy = " datetime ASC";
		}
		elseif($order == "DESC_DATE")
		{
			$orderBy = " datetime DESC";
		}
		elseif($order == "")
		{
			$orderBy = " datetime DESC";
		}
		$first_name  = trim($this->input->post('first_name'));
		$email  = trim($this->input->post('email'));
		$datetime  = $this->input->post('datetime');
		if(!empty($datetime)) {
			$datetime1	= date('Y-m-d', strtotime($datetime));
		} else { $datetime1	=''; }
		
		$entry = array();	
		$i=0;
		if(!empty($first_name))
		{
			$entry[$i] = "first_name like '%".$first_name ."%'" ;
			$i++;
		}
		if(!empty($email))
		{
			$entry[$i] = "email like '%".$email."%'";
			$i++;
		}
		if(!empty($datetime1))
		{
			$entry[$i] = "datetime like '".$datetime1."%'";
			$i++;
		}
		
		
		$entry[$i] = " reply_status IS NOT NULL ORDER BY $orderBy";
		//$sql = "select * from meida_siteuser";
		
		$sqlentry = "";
		$j=0;
		foreach($entry as $data)
		{
			
			if($j==0)
			$sqlentry = " WHERE ".$data;
			else
			$sqlentry .= " AND ".$data;
			
			$j++;
		}
		
		
		$sql = "SELECT * FROM `enquiry` ".$sqlentry." limit $startp,$limitp ";
		
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$result = $query->result();
			return $result;
		}
		if($query->num_rows()<1) {
			if($startp != 0 && $startp>0)
			{
				
				$delstartp = $startp-$limitp;
			} else {
				$delstartp = 0;
			}
			$sqldel = "SELECT * FROM `enquiry` ".$sqlentry." limit $delstartp,$limitp ";
			
			$querydel = $this->db->query($sqldel);
			$resultdel = $querydel->result();
			return $resultdel;
		}
	}
 //delete selected enquiry via checkbox
	function delselected_enquirym()
	{
		$clists=$this->input->post('id');
		$clist =explode(",", $clists); //print_r($clist); exit;
		$count=count($clist);
		$i=0;
		while($count>0)
		{
			$this->db->where('enquiry_id',$clist[$i]);
			$this->db->delete('enquiry');
			
			$i++;	
			$count--;	
		}
		//return "Deleted";
	}
 //Function To search property type
	function search_enquirym()
	{
		
		$order=$this->input->post('order_by');
		if($order == "ASC_NAME")
		{
			$orderBy = " first_name  ASC";
		}
		elseif($order == "DESC_NAME")
		{
			$orderBy = " first_name  DESC";
		}
		elseif($order == "ASC_EMAIL")
		{
			$orderBy = " email ASC";
		}
		elseif($order == "DESC_EMAIL")
		{
			$orderBy = " email DESC";
		}
		elseif($order == "ASC_SUB")
		{
			$orderBy = " subject ASC";
		}
		elseif($order == "DESC_SUB")
		{
			$orderBy = " subject DESC";
		}
		elseif($order == "ASC_DATE")
		{
			$orderBy = " datetime ASC";
		}
		elseif($order == "DESC_DATE")
		{
			$orderBy = " datetime DESC";
		}
		elseif($order == "")
		{
			$orderBy = " datetime DESC";
		}
		
		$startp=$this->input->post('startp');
		$limitp=$this->input->post('limitp');
		$first_name  = trim($this->input->post('first_name'));
		$email  = trim($this->input->post('email'));
		$datetime  = $this->input->post('datetime');
		//$expDate = explode('-',$datetime);
		//$datetime1 = $expDate[2]."-".$expDate[1]."-".$expDate[0]; 
		if(!empty($datetime)) {
			$datetime1	= date('Y-m-d', strtotime($datetime));
		} else { $datetime1	=''; }
		
		$entry = array();	
		$i=0;
		if(!empty($first_name))
		{
			$entry[$i] = "first_name like '%".$first_name ."%'" ;
			$i++;
		}
		if(!empty($email))
		{
			$entry[$i] = "email like '%".$email."%'";
			$i++;
		}
		/*if(!empty($datetime))
		{
			//$entry[$i] = "datetime = '".$datetime."'";
			//$entry[$i] = " datetime BETWEEN ('" . strtotime($datetime) . "' AND '" . strtotime($datetime, '+1 day') . "')";
			//$entry[$i] = " datetime >= '" . strtotime($datetime) . "' AND datetime <= '" . strtotime($datetime, '+1 day') . "'";
			$entry[$i] = " DATE( FROM_UNIXTIME( `datetime` ) ) = '".$datetime1."'";

			$i++;
		}*/
		if(!empty($datetime1))
		{
			$entry[$i] = "datetime like '".$datetime1."%'";
			$i++;
		}
		
		
		$entry[$i] = " reply_status IS NOT NULL ORDER BY $orderBy";
		//$sql = "select * from meida_siteuser";
		
		$sqlentry = "";
		$j=0;
		foreach($entry as $data)
		{
			
			if($j==0)
			$sqlentry = " WHERE ".$data;
			else
			$sqlentry .= " AND ".$data;
			
			$j++;
		}
		
		
		$sql = "SELECT * FROM `enquiry` ".$sqlentry." limit $startp,$limitp ";
		//echo "Search:".$sql."<br />"; 
		$query = $this->db->query($sql);
		$res=$query->result();
		return $res;
	}
	
	 //Function To search property type
	function search_enquiry_on_sortm($order)
	{
		
		if($order == "ASC_NAME")
		{
			$orderBy = " first_name  ASC";
		}
		elseif($order == "DESC_NAME")
		{
			$orderBy = " first_name  DESC";
		}
		elseif($order == "ASC_EMAIL")
		{
			$orderBy = " email ASC";
		}
		elseif($order == "DESC_EMAIL")
		{
			$orderBy = " email DESC";
		}
		elseif($order == "ASC_SUB")
		{
			$orderBy = " subject ASC";
		}
		elseif($order == "DESC_SUB")
		{
			$orderBy = " subject DESC";
		}
		elseif($order == "ASC_DATE")
		{
			$orderBy = " datetime ASC";
		}
		elseif($order == "DESC_DATE")
		{
			$orderBy = " datetime DESC";
		}
		elseif($order == "")
		{
			$orderBy = " datetime DESC";
		}
		
		
		$startp=$this->input->post('startp');
		$limitp=$this->input->post('limitp');
		$first_name  = trim($this->input->post('first_name'));
		$email  = trim($this->input->post('email'));
		$datetime  = $this->input->post('datetime');
		//$expDate = explode('-',$datetime);
		//$datetime1 = $expDate[2]."-".$expDate[1]."-".$expDate[0]; 
		if(!empty($datetime)) {
			$datetime1	= date('Y-m-d', strtotime($datetime));
		} else { $datetime1	=''; }
		$entry = array();	
		$i=0;
		if(!empty($first_name))
		{
			$entry[$i] = "first_name like '%".$first_name ."%'" ;
			$i++;
		}
		if(!empty($email))
		{
			$entry[$i] = "email like '%".$email."%'";
			$i++;
		}
		/*if(!empty($datetime))
		{
			//$entry[$i] = "datetime = '".$datetime."'";
			//$entry[$i] = " datetime BETWEEN ('" . strtotime($datetime) . "' AND '" . strtotime($datetime, '+1 day') . "')";
			//$entry[$i] = " datetime >= '" . strtotime($datetime) . "' AND datetime <= '" . strtotime($datetime, '+1 day') . "'";
			$entry[$i] = " DATE( FROM_UNIXTIME( `datetime` ) ) = '".$datetime1."'";

			$i++;
		}*/
		if(!empty($datetime1))
		{
			$entry[$i] = "datetime like '".$datetime1."%'";
			$i++;
		}
		
		$entry[$i] = " reply_status IS NOT NULL ORDER BY $orderBy";
		//$sql = "select * from meida_siteuser";
		
		$sqlentry = "";
		$j=0;
		foreach($entry as $data)
		{
			
			if($j==0)
			$sqlentry = " WHERE ".$data;
			else
			$sqlentry .= " AND ".$data;
			
			$j++;
		}
		
		
		$sql = "SELECT * FROM `enquiry` ".$sqlentry." limit $startp,$limitp ";
		//echo "Sort:".$sql;
		$query = $this->db->query($sql);
		$res=$query->result();
		return $res;
	}
	//Function To Get enquiry_count_req
	function enquiry_count_req()
	{
		
		$query = "SELECT count(*) as count FROM `enquiry` ";	
		$sqlqry = $this->db->query($query);
		$qryres = $sqlqry->row();
		return $qryres->count;
	}
	function enquiry_count_req1()
	{
		$first_name  = trim($this->input->post('first_name'));
		$email  = trim($this->input->post('email'));
		$datetime  = $this->input->post('datetime');
		//$expDate = explode('-',$datetime);
		//$datetime1 = $expDate[2]."-".$expDate[1]."-".$expDate[0]; 
		if(!empty($datetime)) {
			$datetime1	= date('Y-m-d', strtotime($datetime));
		} else { $datetime1	=''; }
		//echo $email;
		$entry = array();	
		$i=0;
		if(!empty($first_name))
		{
			$entry[$i] = "first_name like '%".$first_name ."%'" ;
			$i++;
		}
		if(!empty($email))
		{
			$entry[$i] = "email like '%".$email."%'";
			$i++;
		}
		if(!empty($datetime1))
		{
			//$entry[$i] = " datetime BETWEEN ('" . strtotime($datetime) . "' AND '" . strtotime($datetime, '+1 day') . "')";
			//$entry[$i] = " datetime >= '" . strtotime($datetime) . "' AND datetime <= '" . strtotime($datetime, '+1 day') . "'";
			//$entry[$i] = " DATE( FROM_UNIXTIME( `datetime` ) ) = '".$datetime1."'";
			$entry[$i] = " datetime like '".$datetime1."%'";

			$i++;
		}
		
		$entry[$i] = " reply_status IS NOT NULL ";
		//$sql = "select * from meida_siteuser";
		
		$sqlentry = "";
		$j=0;
		foreach($entry as $data)
		{
			
			if($j==0)
			$sqlentry = " where ".$data;
			else
			$sqlentry .= " and ".$data;
			
			$j++;
		}
		
		
		$sql = "select count(*) as count from enquiry ".$sqlentry." ";
		//echo $sql;exit;
		$query = $this->db->query($sql);
		$qryres = $query->row();
			
		return $qryres->count;
	}
} 
?>