<?php


class homemodel extends  CI_Model
{
	function __construct()
    {
        parent::__construct();
		$this->load->model('emailmodel');	
	}
	function imagebanner_list()
	{
		$qry = $this->db->query("select * from home_img_banner order by id ASC");  
  		$res = $qry->result_array();
		return $res;
	}
	function media_banner_list()
	{
		$qry = $this->db->query("select * from media order by id ASC");  
  		$res = $qry->result_array();
		return $res;
	}
	function get_media(){
		$qry = $this->db->query("select * from cms where page_id=16 ");  
  		$res = $qry->result_array();
		return $res[0];
	}
	function get_cms($id){
		$qry = $this->db->query("select * from cms where page_id=$id ");  
  		$res = $qry->result_array();
		return $res[0];
	}
	function contact($post){
		$to		 = 'contact@fundinnovation.com';
		//$subject = 'Conatact';
		//$message = $post['cnt_message'];
		//$headers = 'From: '.$post['name'].' <'.$post['email_id'].'>' . "\r\n";
		//$headers.= "MIME-Version: 1.0\r\n";
		//$headers.= "Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		//$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		
		$sendmail = $this->emailmodel->send_contactus_mail($post);
		$sendmail_sender = $this->emailmodel->send_contactus_mail_sender($post);
		//@mail($to, $subject, $message, $headers); 
		return 'success';
	}
	function send_feedback($post){
		$to		 = 'feedback@fundinnovation.com';
		$sendmail = $this->emailmodel->send_feedback_mail($post);
		$sendmail_sender = $this->emailmodel->send_feedback_mail_sender($post);
		//@mail($to, $subject, $message, $headers); 
		return 'success';
	}
	function unsubscribe($uid='',$notid=''){
		if($uid!='' && $notid !=''){
		  if($uid == "user") {
		    $sql=$this->db->query("select id from news_letter_emails where id=$notid");
			$rs=$sql->result_array();
		
			if($sql->num_rows()>0)
			{
				$this->db->set('flag',0);
				$this->db->where('id',$notid);
				$this->db->update('news_letter_emails');
				return 'success';
			}else
				return 'error';
			}
		  else {
		  $sql=$this->db->query("select user_id from account_notifications where user_id=$uid and id=$notid");
		  $rs=$sql->result_array();
		
			if($sql->num_rows()>0)
			{
				$this->db->set('news_letter',0);
				$this->db->where('user_id',$uid);
				$this->db->where('id',$notid);
				$this->db->update('account_notifications');
				return 'success';
			} else {
				return 'error';	
			}
         }
         }		 
		else {
		return 'error';
		}
	}
	function recently_added(){
		if($this->phpsession->get('user_id') != '')
		$access = "1 and if(DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration && projects.created_date !='0000-00-00 00:00:00',1,0) ";
		else{
		$access =" if(projects.access_status ='1',0,1) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration and  projects.status='approved'";
		}
		$qry = $this->db->query("select 
		projects.*,user.profile_name,user.id as user_id,(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration day),CURDATE()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		left join cities on cities.city_id=projects.city_id  
		where $access
		and projects.status='approved'
		order by `created_date` DESC limit 0,10");  
  		$res = $qry->result_array();
		foreach($res as $k=>$r){
			if($r['project_status'] == "failed") {
			  $fund_det=$this->failed_project_fund_details($r['id']);
			}
			else {
			  $fund_det=$this->project_fund_details($r['id']);
			}
			$tot=0;
			$arr=array();
			//print_r($fund_det);
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			//print_r($arr);
			$arr  =array_values(array_unique($arr));
			//print_r($arr);
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
		}
		return $res;
	}
	function most_funded(){
		if($this->phpsession->get('user_id') != '')
		$access = "1 and if(DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration && projects.created_date !='0000-00-00 00:00:00',1,0) ";
		else{
		$access =" if(projects.access_status ='1',0,1) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration and  projects.status='approved'";
		}
		$qr1= $this->db->query("SELECT group_concat( t1.project_id ) proj_ids FROM (SELECT `project_id` , sum( `amount` ) asa
FROM `project_funds` where fund_via ='backed' and status='completed' GROUP BY `project_id` ORDER BY asa DESC )t1");	
		$result = $qr1->result_array();
		$proj_ids=$result[0]['proj_ids'];
		
		$qry = $this->db->query("select 
		projects.*,user.profile_name,user.id as user_id,(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		left join cities on cities.city_id=projects.city_id  
		where $access
		and find_in_set(projects.id,'".$proj_ids."')
		and projects.status='approved'
		group by projects.id limit 0,10");  
  		$res = $qry->result_array();
		//echo $this->db->last_query();
		foreach($res as $k=>$r){
			$fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  =array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
		}
		return $res;
	}
	function staff_pick(){
		if($this->phpsession->get('user_id') != '')
		//$access = 1;
		$access = "1 and if(DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration && projects.created_date !='0000-00-00 00:00:00',1,0) ";
		else{
		$access =" if(projects.access_status ='1',0,1) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration and  projects.status='approved'";
		}
		
		$qry1 = $this->db->query("SELECT group_concat( `staff_pick_project_id` ) as proj_ids FROM category WHERE staff_pick_project_id != ''");
		$result = $qry1->result_array();
		//print_r($result);
		$proj_ids=$result[0]['proj_ids'];
		$qry  = $this->db->query("select 
		projects.*,user.profile_name,user.id as user_id,(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		left join cities on cities.city_id=projects.city_id  
		where $access
		and find_in_set(projects.id,'".$proj_ids."') and projects.status='approved'
		order by `created_date` DESC limit 0,10"); 
		//echo $this->db->last_query();
  		$res = $qry->result_array();
		foreach($res as $k=>$r){
			$fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  =array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
		}
		return $res;
	}
	function succ_projects(){
		
		if($this->phpsession->get('user_id') != '')
		$access = 1;
		else{
		$access =" if(projects.access_status ='1',0,1) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration and  projects.status='approved'";
		}	
		$qry = $this->db->query("select 
		projects.*,user.profile_name,user.id as user_id,(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		left join cities on cities.city_id=projects.city_id  
		where $access
		and project_status='success' $where
		order by `created_date` DESC limit 0,10");  
  		$res = $qry->result_array();
		foreach($res as $k=>$r){
			$fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  =array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
		}
		return $res;
	}
	function failed_project_fund_details($projid){ 

		$sq="select * from failed_project_backed_users where project_id=".$projid;
		$qry = $this->db->query($sq); 

  		$res = $qry->result_array();
		return $res;
	}
	function project_fund_details($projid){ 
	
		$sq="select * from project_funds where fund_via='backed' and status='completed' and project_id=".$projid." and admin_refunded !=1 ";
		$qry = $this->db->query($sq); 
		//if($qry->num_rows()>0){
  		$res = $qry->result_array();
		return $res;
		/*}else{
			return 0;
		}*/
	}
	function check_siteemail_id($email_id='')
	{
		if($email_id =='')
		$email_id=$this->input->post('email_id');
		$sql=$this->db->query("select id from user where email_id='".$email_id."'");
		if($sql->num_rows()>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function check_valid_user($email_id,$password)
	{	  
	   $this->db->select('id');
	   $this->db->select('status');
	   $this->db->select('email_id');
	   $this->db->select('profile_name');
	   $this->db->from('user');
	   $this->db->where('email_id', $email_id); 
	   $this->db->where('password', $password); 
	   //$this->db->where('status', '1'); 
	   $Qry=$this->db->get();
	   //echo $this->db->last_query();
	   $no=$Qry->num_rows();
	   if($no==0)	   
		   return 'fail';
	   else
	    {	$rs=$Qry->result();
			if($rs[0]->status ==2){
				return 'blocked';
			}elseif($rs[0]->status ==0){
				return 'not verified';
			}
			else{
				$today		= date('Y-m-d H:i:s');
		   		 $this->db->set('last_logged_in',$today);
				$this->db->where('email_id', $email_id); 
	   			$this->db->where('password', $password);
			 	$this->db->update('user'); 
			
			//$this->db->where('id', $password); 
		 		 return $rs;
		  }			 
	    }
	} 
	function insert_siteuser() {
		
		
		//$profImg	= $this->input->post('profile_img');
		$profImage	= '';
		$today		= date('Y-m-d H:i:s');
		$email_id	= $this->input->post('email_id');
		$name		= $this->input->post('name');
		$password	= $this->input->post('userPassword');
		//$name		= $f_name.' '.$l_name; 
		$generatedKey = sha1(mt_rand(10000,99999).time().$email_id);
		$dup_check=$this->check_siteemail_id($email_id);
		if($dup_check ==0){
		$this->db->set('profile_name',$name);
		$this->db->set('password',md5($password));
		$this->db->set('email_id',$email_id);
		$this->db->set('status',0);
		$this->db->set('activation_key',$generatedKey);
		if($this->input->post('fb_userid')=='' || $this->input->post('fb_userid')==0):
			$this->db->set('profile_image',$profImage);
		else:
			$this->db->set('fb_link',$this->input->post('fb_profile_link'));
			$profImage="http://graph.facebook.com/".$this->input->post('fb_userid')."/picture";
			$this->db->set('fb_image',$profImage);
		endif;
		$this->db->set('fb_user_id',$this->input->post('fb_userid'));
		$this->db->set('joined_date',$today);
		$this->db->insert('user');
		$userId = $this->db->insert_id(); 
		if($userId){
		$this->insert_user_notifications($userId);
		$activation_link=base_url().'profile/activate_profile/'.$userId.'/'.$generatedKey;
		$activation_link_tiny=$this->createTinyUrl($activation_link);
		$sendmail = $this->emailmodel->user_registration_mail($email_id, $password, $name,$activation_link_tiny);
		}
		$_SESSION['sign_up_email_id']=$email_id;
		return $userId;
		}else{
			return 0;
		}
		//echo 'Successfully inserted';
	}
	function createTinyUrl($strURL) {
    $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$strURL);
    return $tinyurl;
	}
	function send_new_password($email_id,$password){
		//$this->db->set('profile_name',$name);
		$sql=$this->db->query("select * from user where email_id = '".$email_id."'");
		$rs=$sql->result_array();
		if(count($rs)>0){
		if($rs[0]['status']==2){
			return 'blocked';
		}
		elseif($rs[0]['status']==0){
			return 'not verified';
		}
		else{
		$new_encript_pass=md5($password);
		//echo '</br>'.$password;
		$this->db->set('password',$new_encript_pass);
		$this->db->where('email_id',$email_id);
		$this->db->update('user');
		$sendmail = $this->emailmodel->change_user_password_mail($email_id, $password, $rs[0]['profile_name']);
		return 'send';
		}}
		else
		{
			return 'The email you entered does not belong to any account.';
		}
	}
	function insert_user_notifications($userid){
		$today		= date('Y-m-d H:i:s');
		$this->db->set('user_id',$userid);
		$this->db->set('date',$today);
		$this->db->insert('account_notifications');
	}
	
	function insert_fbuser() {
		
		
		//$profImg	= $this->input->post('profile_img');
		$profImage	= '';
		$today		= date('Y-m-d H:i:s');
		$email_id	= $this->input->post('email');
		$name		= $this->input->post('name');
		if($this->input->post('email') !='' && $this->input->post('fb_userid') !='' && $this->input->post('fb_userid') !='undefined'){
		$this->db->set('profile_name',$name);
		$this->db->set('email_id',$email_id);
		$this->db->set('status',1);
		
		$this->db->set('fb_link',$this->input->post('fb_profile_link'));
		$profImage="http://graph.facebook.com/".$this->input->post('fb_userid')."/picture";
		$this->db->set('fb_image',$profImage);
		$this->db->set('fb_user_id',$this->input->post('fb_userid'));
		$this->db->set('joined_date',$today);
		$this->db->insert('user');
		$userId = $this->db->insert_id(); 
		if($userId){
			
		$this->phpsession->save('user_id',$userId);
		$this->phpsession->save('email_id',$email_id);
		$this->phpsession->save('profile_name',$name);
		$this->insert_user_notifications($userId);
		}
		return $userId;
		}else{
			return 0;
		}
		//echo 'Successfully inserted';
	}
	function insert_Inuser(){
		$profImage	= '';
		$today		= date('Y-m-d H:i:s');
		//$email_id	= $this->input->post('email');
		
		
		$in_user_id  = $this->input->post('in_user_id'); 
		$firstName	= $this->input->post('firstName');
		$lastName	= $this->input->post('lastName');
		$email_id	= $this->input->post('email_id');
		$pictureUrl	= $this->input->post('pictureUrl');
	    $name		= $firstName.' '.$lastName;
	    if($this->input->post('email_id') !='' && $this->input->post('in_user_id') !='' && $this->input->post('in_user_id') !='undefined'){
		$this->db->set('profile_name',$name);
		$this->db->set('email_id',$email_id);
		$this->db->set('status',1);
		
		//$this->db->set('fb_link',$this->input->post('fb_profile_link'));
		$profImage=$pictureUrl;
		$this->db->set('in_image',$profImage);
		$this->db->set('in_user_id',$this->input->post('in_user_id'));
		$this->db->set('joined_date',$today);
		$this->db->insert('user');
		$userId = $this->db->insert_id(); 
		if($userId){
			
		$this->phpsession->save('user_id',$userId);
		$this->phpsession->save('email_id',$email_id);
		$this->phpsession->save('profile_name',$name);
		$this->insert_user_notifications($userId);
		}
		return $userId;
		}
		else
		return 0;
	}
	
	function check_fb_user($fbuserid)
	{		
		$this->db->select('profile_name');
		$this->db->select('email_id');
		$this->db->select('id');
        $this->db->from('user');
		$this->db->where('fb_user_id', $fbuserid); 		
        $query = $this->db->get();	
	//	echo $this->db->last_query();
		if ($query->num_rows() > 0)
		    {
				$rs=$query->result();
				//echo 'hjhj';
				$userid=$rs[0]->id;
				$today		= date('Y-m-d H:i:s');
				$email_id	= $this->input->post('email');
				$name		= $this->input->post('name');
				$this->db->set('profile_name',$name);
				$this->db->set('email_id',$email_id);
				$this->db->set('status',1);
				
				$this->db->set('fb_link',$this->input->post('fb_profile_link'));
				$profImage="http://graph.facebook.com/".$this->input->post('fb_userid')."/picture";
				$this->db->set('fb_image',$profImage);
				
				$this->db->set('last_logged_in',$today);
				//$this->db->where('fb_user_id', $fbuserid); 
				$this->db->where('id',$userid);
				//$this->db->set('joined_date',$today);
				$this->db->update('user');
				//echo $this->db->last_query();
			 
				return $rs;		
			}
		else
		   	return NULL;		
	}
	function check_In_user($Inuserid)
	{		
		$this->db->select('profile_name');
		$this->db->select('email_id');
		$this->db->select('id');
        $this->db->from('user');
		$this->db->where('in_user_id',$Inuserid); 		
        $query = $this->db->get();	
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		    {
				$rs=$query->result();
				$userid=$rs[0]->id;
				$today		= date('Y-m-d H:i:s');
				$in_user_id  = $this->input->post('in_user_id'); 
				$firstName	= $this->input->post('firstName');
				$lastName	= $this->input->post('lastName');
				$email_id	= $this->input->post('email_id');
				$pictureUrl	= $this->input->post('pictureUrl');
				$name		= $firstName.' '.$lastName;
				
				$this->db->set('profile_name',$name);
				$this->db->set('email_id',$email_id);
				$this->db->set('status',1);
				$profImage=$pictureUrl;
				$this->db->set('in_image',$profImage);
				$this->db->set('last_logged_in',$today);
				//$this->db->where('in_user_id', $userid);
				$this->db->where('id',$userid);
				$this->db->update('user');
				return $rs;		
			}
		else
		   	return NULL;	
		
	}
	function check_promotekey($promote_key){
			$this->db->select('user_id');
			$this->db->select('project_id');
			$this->db->from('promote');
			$this->db->where('promote_key',$promote_key); 			
			$query = $this->db->get();
			$rs	   = $query->result();
			if ($query->num_rows() > 0)
		    {
				$_SESSION['promoter_user_id'] 	 = $rs[0]->user_id;
				$_SESSION['promoter_project_id'] = $rs[0]->project_id;
				//
				/*$promote['promoter_user_id'] 	= $rs[0]->user_id;
				$promote['promoter_project_id'] = $rs[0]->project_id;
				$_SESSION['promote'][]=$promote;*/
				return $rs[0]->project_id;
			}else{
				return 'wrong key';
			}
	} 
}
?>