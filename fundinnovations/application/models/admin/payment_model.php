<?php
class Payment_model extends  CI_Model {
	
		function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->library(array('phpsession','mysmarty','email'));
			
		}	
		
		
		
		public function load_all_payments()
		{
			try
			{
				$order=trim($this->input->post('order_by'));
				$startp=trim($this->input->post('startp'));
				$limitp=trim($this->input->post('limitp'));
				$project_title=trim($this->input->post('project_title'));
				$order_id=trim($this->input->post('order_id'));
				$pledge_amount=trim($this->input->post('pledge_amount'));
				$order_status=trim($this->input->post('order_status'));
				$backed_profile_name=trim($this->input->post('backed_profile_name'));
				$proj_status=trim($this->input->post('proj_status'));
				//$paymethod=trim($this->input->post('paymethod'));
				
				
				######################## Common Query Statement ##############################
				
				$this->sql="SELECT 
									u.email_id,u.profile_name name,
									u.profile_image,
									pf.id,pf.order_id,pf.user_id,pf.project_id,
									pf.amount,
									pf.status as paymentstatus,pf.date,
									p.project_status,
									p.project_title
									FROM 
									project_funds pf
									join
									projects p on pf.project_id=p.id
									join 
									user u on pf.user_id =u.id
									where pf.fund_via ='backed'
								";
									
					#######################################################################	
						
					################## SEARCH CRITERIA #####################################			
					
							
					if($order_id!=''):
						$this->sql.="	AND pf.order_id='".$order_id."'";
					endif;		
					
					if($project_title!=''):
						$this->sql.="	AND p.project_title like '%".$project_title."%'";
					endif;		
					
					if($pledge_amount!=''):
						$this->sql.="	AND pf.amount='".$pledge_amount."'";
					endif;
					
					if($order_status!=''):
						$this->sql.="	AND pf.status='".$order_status."'";
					endif;
					if($proj_status!=''):
						$this->sql.="	AND p.project_status ='".$proj_status."'";
					endif;
					
					if($backed_profile_name!=''):
						$this->sql.="	AND u.profile_name like '%".$backed_profile_name."%'";
					endif;
					
					//echo $this->sql;
					
					
					############## ORDER BY  CONDITIONS(SORTING) #####################
					if($order == "")
					{
						$orderBy = " pf.date DESC";
					}
					if($order == "ASC_STATUS")
					{
						$orderBy = " 	pf.status  ASC";
					}
					if($order == "DESC_STATUS")
					{
						$orderBy = " 	pf.status  DESC";
					}
					if($order == "ASC_AMNT")
					{
						$orderBy = " 	pf.amount  ASC";
					}
					if($order == "DESC_AMNT")
					{
						$orderBy = " 	pf.amount  DESC";
					}
					
					if($order == "ASC_PTIT")
					{
						$orderBy = " 	p.project_title  ASC";
					}
					if($order == "DESC_PTIT")
					{
						$orderBy = " 	p.project_title  DESC";
					}
					if($order == "ASC_PTIT")
					{
						$orderBy = " 	p.project_title  ASC";
					}
					if($order == "DESC_PTIT")
					{
						$orderBy = " 	p.project_title  DESC";
					}
					if($order == "ASC_USR")
					{
						$orderBy = " 	u.profile_name  ASC";
					}
					if($order == "DESC_USR")
					{
						$orderBy = " 	u.profile_name  DESC";
					}
					
					/**/
					
					$this->sql.="	GROUP BY pf.id	ORDER BY  ".$orderBy." LIMIT  $startp,$limitp ";
					//echo $this->sql;
					##########################################################
					//echo $this->sql;
					$res=$this->db->query($this->sql)->result();
					foreach($res as $r){
						
					}
					return $res;
				
			}
			catch(Exception $e)
			{
				die($e->getMessage().'<pre>'.$e->getTraceAsString().'</pre>');  
			}
		}
		
		
		function orderCount()
		{
			try
			{
				//$trans_id=trim($this->input->post('trans_id'));
				$order=trim($this->input->post('order_by'));
				$startp=trim($this->input->post('startp'));
				$limitp=trim($this->input->post('limitp'));
				$project_title=trim($this->input->post('project_title'));
				$order_id=trim($this->input->post('order_id'));
				$pledge_amount=trim($this->input->post('pledge_amount'));
				$order_status=trim($this->input->post('order_status'));
				$backed_profile_name=trim($this->input->post('backed_profile_name'));
				$proj_status=trim($this->input->post('proj_status'));
				
				
				######################## Common Quesry Statement ##############################
				//$this->sql="SELECT ph.payment_id FROM payment_history ph, user u, main_listing_plans ml, states s, cities c, property_listing_plans pl, user_types ut, properties p WHERE ph.plan_id=p.plan_id AND ph.user_id=u.user_id AND u.state_id=s.st_id AND u.city_id=c.city_id AND u.user_type_id=ut.type_id";
					$this->sql="SELECT pf.id FROM project_funds pf join projects p on pf.project_id=p.id join user u on pf.user_id=u.id where pf.fund_via ='backed'";
									
					#######################################################################	
						
					################## SEARCH CRITERIA #####################################			
					/*if($trans_id!=''):
						$this->sql.="	AND ph.transaction_id='".$trans_id."'";
					endif;*/
							
						if($order_id!=''):
						$this->sql.="	AND pf.order_id='".$order_id."'";
					endif;		
					
					if($project_title!=''):
						$this->sql.="	AND p.project_title like '%".$project_title."%'";
					endif;		
					
					if($pledge_amount!=''):
						$this->sql.="	AND pf.amount='".$pledge_amount."'";
					endif;
					
					if($order_status!=''):
						$this->sql.="	AND pf.status='".$order_status."'";
					endif;
					if($proj_status!=''):
						$this->sql.="	AND p.project_status ='".$proj_status."'";
					endif;
					
					if($backed_profile_name!=''):
						$this->sql.="	AND u.profile_name like '%".$backed_profile_name."%'";
					endif;
					
					//echo $this->sql;
					
					
					
					$this->sql.="	GROUP BY pf.id";
					######################################################################
					
					$res=$this->db->query($this->sql);
					$numrows = $res->num_rows();
					return $numrows;
			}
			catch(Exception $e)
			{
				die($e->getMessage().'<pre>'.$e->getTraceAsString().'</pre>');  
			}
		}


	function change_status()
	{
		$order_id=$this->input->post('pid');
		//$clist =explode(",", $clists);
		$action=$this->input->post('action');
		//$count=count($clist);
		$i=0;
		$date   = date('Y-m-d H:i:s');
		//while($count>0)
		//{
			$proj_sts=$this->get_proj_det($order_id);
			if($action =='pending'){
				if($proj_sts['remaining_days'] <=0 && $proj_sts['status'] !='pending'){
					$not_updated_orders=$proj_sts;
					$updated='completed';
				}else{
					if($proj_sts['status'] =='deleted'){
						$not_updated_orders=$proj_sts;
						$updated='deleted';
						}
					else{
					$q=$this->db->query("update project_funds set status ='".$action."' where id='".$order_id."'");
					$updated='updated';
					}
				}
			 	//$q=$this->db->query("update projects set project_status='ongoing' where id='".$proj_sts['id']."'");
			}
			else if($action =='completed'){
				if($proj_sts['remaining_days'] <=0){
					$not_updated_orders=$proj_sts;
					$updated='completed';
				}else{
					$q=$this->db->query("update project_funds set status ='".$action."' where id='".$order_id."'");
                                        $q123=$this->db->query("insert into reward_history (order_id,reward_id,user_id,amount,date) select id as order_id,reward_id,user_id,amount,'".$date."' from project_funds  where id='".$order_id."' and (select count(id) from reward_history where order_id=".$order_id.")=0");
					//$this->phpsession->get('reward_selected')
//echo "update project_funds set status ='".$action."' where id='".$order_id."'";
					$updated='updated';
				}
			//$q=$this->db->query("update projects set status='".$action."',project_status='' where id='".$clist[$i]."'");
			}
			else if($action =='refunded'){
			$q=$this->db->query("update project_funds set status='".$action."',fund_via='refunded' where id='".$order_id."'");
			$q2=$this->db->query("update project_funds set status='deleted' where referral_order_id='".$order_id."'");
			$sql3 = "insert into  fundinnovation_cash (order_id,user_id,cash,status,date) 
				select id as order_id,user_id,amount as cash,1,'".$date."' from  project_funds  where fund_via='refunded' and project_id=".$proj_sts['project_id']." and id='".$order_id."' ";
				$qry3 = $this->db->query($sql3);
				$updated='updated';
			}else if($action =='deleted'){
				$q3="select fundinnovation_cash from  project_funds where id='".$order_id."'";	
				$qry3 = $this->db->query($q3);
				$res  = $qry3->result_array();
					if($qry3->num_rows()>0){
						if($res[0]['fundinnovation_cash']>0){
							$sql3 = "insert into  fundinnovation_cash (order_id,user_id,cash,status,date) 
						select id as order_id,user_id,'".$res[0]['fundinnovation_cash']."' ,1,'".$date."' from  project_funds  where fund_via='refunded' and project_id=".$proj_sts['project_id']." and id='".$order_id."' ";
							$qry3 = $this->db->query($sql3);
						
						}
					}	
				$q=$this->db->query("update project_funds set status ='".$action."' where id='".$order_id."'");
				$q2=$this->db->query("update project_funds set status='deleted' where referral_order_id='".$order_id."'");
				$updated='updated';
			}
			else if($action =='error'){
			$q=$this->db->query("update project_funds set status ='".$action."' where id='".$order_id."'");
			$q2=$this->db->query("update project_funds set status='deleted' where referral_order_id='".$order_id."'");
			$updated='updated';
			}
			//$i++;	
			//$count--;	
			
		//}
		//if($updated=='updated')
		return $updated;
		//else
		//return $not_updated_order;
		
	}
		function get_proj_det($order_id){
			$sql="SELECT pf.*,DATEDIFF(DATE_ADD( p.created_date, INTERVAL p.fund_duration day),now()) as remaining_days
			 FROM project_funds pf join projects p on pf.project_id=p.id where pf.id=".$order_id." group by p.id";
			$res=$this->db->query($sql)->result_array();
			return $res[0];
		}
		function cron_fn($proj_id){
		$date   = date('Y-m-d H:i:s');
		$qry  = $this->db->query("select 
		p.id,p.funding_goal ,	
		DATEDIFF(DATE_ADD( p.created_date, INTERVAL p.fund_duration day),now()) as remaining_days
		from projects p
		where DATEDIFF(DATE_ADD( p.created_date, INTERVAL p.fund_duration day),now()) <=0
		and project_status='ongoing' and p.id=$proj_id
		");
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
				$sql  = "update projects set project_status='failed' where id=".$r['id'];	
				$qry1 =  $this->db->query($sql); 
				$sq   = "update project_funds set  fund_via='refunded' where fund_via='backed' and status='completed' and project_id=".$r['id'];
				$qry  = $this->db->query($sq); 
				
				$sql3 = "insert into  fundinnovation_cash (order_id,user_id,cash,status,date) 
				select id as order_id,user_id,amount as cash,1,'".$date."' from  project_funds  where fund_via='refunded' and project_id=".$r['id']."";
				$qry3 = $this->db->query($sql3);
			}
			elseif($tot >= $r['funding_goal'])
			{
				$sql2  = "update projects set project_status='success' where id=".$r['id'];	
				$qry2  = $this->db->query($sql2);
			}
		}
	}
	function project_fund_details($projid){ 
		$sq="select * from project_funds where fund_via='backed' and status='completed' and project_id=".$projid;
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		return $res;
	}
	
		function payment_detail($payment_id)
		{
			try
			{
				$this->sql="SELECT 
									u.user_name email
									,CONCAT(u.first_name,' ',u.last_name) name,
									u.profile_image,
									u.address1,u.address2,u.zip,u.contact_no_mob,
									u.contact_no_office,u.contact_no_res,u.fb_user_id,
									ut.user_type,
									s.state,c.city_name,
									ml.list_name,
									ph.payment_id,ph.order_id,ph.user_id,ph.property_id,
									ph.amount,ph.plan_id,ph.payment_date,ph.payment_mode,
									ph.transaction_id,ph.billing_name,ph.billing_city,
									ph.billing_state,ph.billing_address,ph.billing_postal_code,
									ph.billing_country,ph.billing_phone,ph.billing_email,
									IF(ph.isFlagged=0,'Pending','Complete') as paymentstatus,
									p.property_name
									FROM 
									payment_history ph,user u,main_listing_plans ml,states s,
									cities c, property_listing_plans pl,user_types ut,properties p
									
							WHERE  
									payment_id='".$payment_id."'
									AND ph.user_id=u.user_id 
									AND ph.property_id=p.property_id
									AND ph.plan_id=pl.plan_id
									AND pl.list_id=ml.list_id
									AND u.state_id=s.st_id
									AND u.city_id=c.city_id
									AND u.user_type_id=ut.type_id
								";
					$res=$this->db->query($this->sql)->result();
					return $res;
			}
			catch(Exception $e)
			{
				die($e->getMessage().'<pre>'.$e->getTraceAsString().'</pre>');  
			}
		}
		
	
	
	function update_payment_status()
	{
		$payment_id=trim($this->input->post('payment_id'));
		$status=(int)trim($this->input->post('status'));
		$this->sql="Update payment_history set isFlagged='".$status."' where payment_id='".$payment_id."'";
		$this->db->query($this->sql);
	}
	
	
	function update_bulk_status()
	{
		$clists=trim($this->input->post('id'));
		$clist =explode(",", $clists); //print_r($clist); exit;
		$count=count($clist);
		$i=0;
		$data = array(
               'isFlagged' =>1);
		while($count>0)
		{
			
			$this->db->where('payment_id', $clist[$i]);
			$this->db->update('payment_history', $data); 
			
			$i++;	
			$count--;	
		}
		
		


		
	}
}


?>