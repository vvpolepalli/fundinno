<?php


class siteuser_model extends  CI_Model
{
	  function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->model('emailmodel');	
		$this->load->library(array('phpsession','mysmarty'));
		
    }
	
	function total_site_users() {
		$qry = $this->db->query("select * from user");  
  		$res = $qry->num_rows();
		return $res;	
	}
	
	function active_siteusers() {
		$date	=	date('Y-m-d', strtotime("-30 days"));
		$qry = $this->db->query("select * from user where status =1 and DATE_FORMAT(last_logged_in,'%Y-%m-%d') > '".$date."'"); 
		//$qry = $this->db->query("select * from user where status =1 "); 
		//echo $this->db->last_query();
  		$res = $qry->num_rows();
		return $res;	
	}
	
	function users_not_logged_last_30() {
		
		$date	=	date('Y-m-d', strtotime("-30 days"));
		//$entry[$i]	.=	"DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') <= '".$date."'";
		$qry = $this->db->query("select * from user where status =1 and (DATE_FORMAT(last_logged_in,'%Y-%m-%d') <= '".$date."' or last_logged_in IS NULL) ");  
		//echo $this->db->last_query();
		//echo "select * from user where DATE_FORMAT(last_logged_in,'%Y-%m-%d') <= '".$date."'";
  		$res = $qry->num_rows();
		return $res;
	}
	function inactive_users(){
		$qry = $this->db->query("select * from user where status =2 "); 
		//echo $this->db->last_query();
  		$res = $qry->num_rows();
		return $res;	
		
	}
	function not_verified_users(){
		$qry = $this->db->query("select * from user where status =0 "); 
		//echo $this->db->last_query();
  		$res = $qry->num_rows();
		return $res;	
	}
	function total_siteusers_join_thisweek() {
		$today = date('Y-m-d');
        $date=date("Y-m-d H:i:s");
        $last_sun=date('Y-m-d H:i:s',strtotime($date.'last sunday'));
             
		$qry = $this->db->query('SELECT * FROM user WHERE  (joined_date >= \''.$last_sun.'\' AND joined_date <= \''.$date.'\') ');
  		$res = $qry->num_rows();
		return $res;
	}
	
	function total_siteusers_join_thismonth() {
		$sql = "SELECT * FROM user WHERE MONTH(joined_date) = MONTH(CURRENT_DATE) AND YEAR(joined_date) = YEAR(CURRENT_DATE)";
		$qry = $this->db->query($sql);
  		$res = $qry->num_rows();
		return $res;
	}
   
   function fetch_country_by_id($cntry_id){
	   
	   	$sql = $this->db->query("select country from country where countryid=".$cntry_id);  
  		//$res = $qry->result();
		if($sql->num_rows()>0)
		{
			$result = $sql->row()->country;
			return $result;
		} else {
			return NULL;	
		}
		//echo "<pre>"; print_r($res); echo "</pre>";
		return $res;
	  }
	function select_country(){
		$qry = $this->db->query("select * from country order by country ASC");  
  		$res = $qry->result();
		
		//echo "<pre>"; print_r($res); echo "</pre>";
		return $res;
	}
	function select_states(){
		$qry = $this->db->query("select * from states order by state ASC");  
  		$res = $qry->result();
		//echo "<pre>"; print_r($res); echo "</pre>";
		return $res;
	}
	function select_cities($st_id=''){
		if($st_id!='') {
			$qry = $this->db->query("select * from cities where state_id=$st_id order by city_name ASC");  
			$res = $qry->result();
			return $res;
		} else {
			return NULL;	
		}
	}
	function select_statesByCid($cntry_id){
		if($cntry_id!='') {
			$qry = $this->db->query("select * from states where countryid=$cntry_id order by state ASC");  
			$res = $qry->result();
			return $res;
		} else {
			return NULL;	
		}
		
	}
	function select_all_cities(){
		$qry = $this->db->query("select * from cities order by city_name ASC");  
		$res = $qry->result();
		return $res;
	}
	
	function check_siteusername()
	{
		$userName=$this->input->post('username');
		$sql=$this->db->query("select user_id from user where email_id='".$userName."'");
		if($sql->num_rows()>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	function check_siteemail_id($email_id="")
	{
		if($email_id=="")
		$email_id=$this->input->post('email_id');
		
		if($this->input->post('uid') !='')
		$sql=$this->db->query("select id from user where email_id='".$email_id."' and id !='".$this->input->post('uid')."'");
		else
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
	function insert_siteuser() {
			$created= date('Y-m-d G:i:s');
		$city_val = $this->input->post('city');
		if(is_numeric($city_val)) {
			$city = $city_val;	
		}
		else {
			$qry = $this->db->query("select city_id from cities where city_name='".$city_val."'");
			if($qry->num_rows()>0) {
				$res = $qry->row();
				$city = $res->city_id;	
			} else {
				
				$this->db->set('state_id',$this->input->post('state'));
				$this->db->set('city_name',$city_val);	
				$this->db->insert('cities');
				$city=$this->db->insert_id();
			}
		}
		$profImg	= $this->input->post('profile_timg');
		//$profImage	= str_replace("site_users/thumb/", "", $profImg);
		
		$email	= $this->input->post('email_id');
		$profileName		= $this->input->post('profileName');
		//$l_name		= $this->input->post('lastName');
		$password	= $this->input->post('userPassword');
		//$name		= $f_name.' '.$l_name; 
		$dup_check=$this->check_siteemail_id($email);
		if($dup_check ==0){
		$this->db->set('email_id',$email);
		$this->db->set('password',md5($password));
		$this->db->set('profile_name',$profileName);
		$this->db->set('address',$this->input->post('address'));
		$this->db->set('websites',$this->input->post('web_site_url'));
		$this->db->set('fb_link',$this->input->post('fb_prof_link'));
		$this->db->set('country_id',$this->input->post('country'));
		$this->db->set('state_id',$this->input->post('state'));
		$this->db->set('city_id',$city);
		//$this->db->set('zip',$this->input->post('zip'));
		$this->db->set('contact_no',$this->input->post('mob_no'));
		$this->db->set('twitter_link',$this->input->post('tw_prof_link'));
		//$this->db->set('contact_no_office',$this->input->post('office_no'));
	//	$this->db->set('fb_user','no');
		$this->db->set('last_logged_in',$created);
		$this->db->set('status',1);
		
		$this->db->set('address_proof_image',$this->input->post('id_proof_file_name'));
		$this->db->set('address_id_proof',$this->input->post('addr_proof'));
		//if($this->input->post('fb_userid')=='' || $this->input->post('fb_userid')==0):hid_addr_proof
		$this->db->set('profile_image',$profImg);
		//else:
			//$this->db->set('fb_image',$profImage);
		//endif;
		//$this->db->set('fb_user_id',$this->input->post('fb_userid'));
		$this->db->set('joined_date',$created);
		$this->db->insert('user');
	//	echo $this->db->last_query();
		$sendmail = $this->emailmodel->user_registration_mail($email, $password, $profileName,'');
		}else{
			return 0;
		}
		//echo 'Successfully inserted';
	}
	
	function update_siteuser($uid,$post){
		
		//echo '<pre>';print_r($post);echo '</pre>';
		$profileName		= $post['profileName'];
		$updated= date('Y-m-d G:i:s');
		$city_val = $post['city'];
		if(is_numeric($city_val)) {
			$city = $city_val;	
		}
		else {
			$qry = $this->db->query("select city_id from cities where city_name='".$city_val."'");
			if($qry->num_rows()>0) {
				$res = $qry->row();
				$city = $res->city_id;	
			} else {
				
			//	$this->db->set('state_id',$post['state']);
				$this->db->set('city_name',$city_val);	
				$this->db->insert('cities');
				$city=$this->db->insert_id();
			}
		}
		$profImg	= $post['profile_timg'];
		//$profImg	= $this->input->post('profile_img');
		$profImage	= str_replace("site_users/thumb/", "", $profImg);
		
		$checkimg 	= $this->db->query("select profile_image from user where id='".$uid."'");
		$resimg		= $checkimg->row();
		
		$oldImg		= $resimg->profile_image;
		//echo $profImage. '!= '.$oldImg; exit;
		if($oldImg) {
			if($profImage!=$oldImg) {
				$removeImg = $this->unlink_siteuser_image($oldImg);
			}
		}
		//$profImage	= str_replace("site_users/thumb/", "", $profImg);
		
		$email	= $post['email_id'];
		
		//$l_name		= $this->input->post('lastName');
		
	
		$password	= $post['userPassword'];
		if($password !='')
		$this->db->set('password',md5($password));
	
		
		$this->db->set('email_id',$email);
		
		$this->db->set('profile_name',$profileName);
		$this->db->set('address',$this->input->post('address'));
		$this->db->set('websites',$post['web_site_url']);
		$this->db->set('fb_link',$post['fb_prof_link']);
		$this->db->set('country_id',$post['country']);
		$this->db->set('state_id',$post['state']);
		$this->db->set('city_id',$city);
		
		$this->db->set('contact_no',$post['mob_no']);
		$this->db->set('twitter_link',$post['tw_prof_link']);
		
		$this->db->set('address_proof_image',$post['id_proof_file_name']);
		$this->db->set('address_id_proof',$this->input->post('addr_proof'));
		$this->db->set('profile_image',$profImg);
		
		//$this->db->set('joined_date',$created);
		$this->db->where('id',$uid);
		$this->db->update('user');
		//echo $this->db->last_query();
		//if($password !='')
		//$sendmail = $this->emailmodel->user_registration_mail($email, $password, $profileName);
	}
	//function to search users
	function manage_site_users()
	{
		
		//echo '<pre>'; print_r($_POST);echo '</pre>';
		$startp	= $this->input->post('startp');
		$limitp	= $this->input->post('limitp');
		$email 	= $this->input->post('email_id');
		 $name	= $this->input->post('profileName');
		//$type 	= $this->input->post('user_type');
		$orderBy = $this->input->post('order_by');
		$fil_status = $this->input->post('user_stat');
		$start_on = $this->input->post('start_on');
		$end_on = $this->input->post('end_on'); 
		$contact_no=$this->input->post('contact_no');
		$country=$this->input->post('country');
		$state=$this->input->post('state');
		$city=$this->input->post('city');
		$include_inactive= $this->input->post('include_inactive');
		$new_url = explode("_","$urlType");
		$url_type =$new_url[0];
		$user_status = $new_url[1];
		$date	=	date('Y-m-d', strtotime("-30 days"));
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
		if($orderBy=='ASC_NAME') {
			$order = " profile_name ASC";	
		}
		else if($orderBy=='DESC_NAME'){
			$order = " profile_name DESC";	
		}
		else if($orderBy=='ASC_EMAIL'){
			$order = " email_id ASC";	
		}
		else if($orderBy=='DESC_EMAIL'){
			$order = " email_id DESC";	
		}
		else if($orderBy=='ASC_DATE'){
			$order = " joined_date ASC";	
		}
		else if($orderBy=='DESC_DATE'){
			$order = " joined_date DESC";	
		}
		else if($orderBy=='ASC_STATUS'){
			$order = " status ASC";	
		}
		else if($orderBy=='DESC_STATUS'){
			$order = " status DESC";	
		}
		else {
			$order = " joined_date DESC";	
		}
		
		$entry = array();	
		$i=0;
		if(!empty($email))
		{
			$entry[$i] = "email_id like '%".$email."%'";
			$i++;
		}
		if(!empty($name))
		{
			$entry[$i] = " profile_name like '%".addslashes($name)."%'";
			$i++;
		}
		if(!empty($contact_no))
		{
			$entry[$i] = "u.contact_no ='".$contact_no."'";
			$i++;
		}
		if(!empty($country))
		{
			$entry[$i] = "u.country_id ='".$country."'";
			//$entry[$i] = "u.country_id ='".$country."'";
			$i++;
		}
		if(!empty($state))
		{
			$entry[$i] = "u.state_id ='".$state."'";
			$i++;
		}
		
		if(!empty($city))
		{
			$entry[$i] = "u.city_id ='".$city."'";
			$i++;
		}
		
		if(isset($user_status))
		{
			$entry[$i] = "status='".$user_status."'";
			$i++;
		}
	
		if($fil_status != "") {
		    $entry[$i] = "status='".$fil_status."'";
			$i++;	
		}
		if(!empty($start_on) && !empty($end_on))
		{
			$sdate	=	date('Y-m-d', strtotime($start_on));
			$edate	=	date('Y-m-d', strtotime($end_on));
			$entry[$i]	.=	"DATE_FORMAT(joined_date,'%Y-%m-%d') BETWEEN '".$sdate."' AND '".$edate."'";
			$i++;
		}
		else if(!empty($start_on) && empty($end_on)) {
			$sdate	=	date('Y-m-d', strtotime($start_on));
			$entry[$i]	.=	"DATE_FORMAT(joined_date,'%Y-%m-%d') >= '".$sdate."'";
			$i++;
		}
		else if(empty($start_on) && !empty($end_on)) {
			$edate	=	date('Y-m-d', strtotime($end_on));
			$entry[$i]	.=	"DATE_FORMAT(u.joined_date,'%Y-%m-%d') <= '".$edate."'";
			$i++;
		}
		
		
		
		$sqlentry = "";
		$j=0;
		foreach($entry as $data)
		{
			
			if($j==0)
			$sqlentry = " where  ".$data;
			else
			$sqlentry .= " and ".$data;
			
			$j++;
		}
		if($include_inactive == 'true')
		{
			
			if($sqlentry !='')
			$inact =" or DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') <= '".$date."'";
			else{
				$inact =" where DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') <= '".$date."' or 1";
			}
			//$i++;
		}else{
			/*if($sqlentry !='')
			$inact=	" and  DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') > '".$date."'";
			else{
				$inact=	"where  DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') > '".$date."'";
			}*/
		}
		
		$sqlentry .=$inact." order by $order";
		$sql = "select *,u.id as uid,if(DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') <= '".$date."',1,0) inactive_30days,
		(select count(p.id) from projects p where p.user_id=u.id) created_projs,
		(SELECT count( DISTINCT pf.`project_id` ) FROM `project_funds` pf where pf.user_id=u.id and fund_via  != 'referral' and status='completed') backed_projs1
		 from user u 
		 left join country cn on cn.countryid=u.country_id 
		 left join states s on u.state_id=s.st_id 
		 left join cities c on u.city_id=c.city_id ".$sqlentry."  limit $startp,$limitp";
	//echo $sql;
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$result = $query->result();
			//echo '<pre>';print_r($result);echo '</pre>';
			foreach($result as $k=>$re){
				  $result[$k]->backed_projs=$this->backed_proj_cnt($re->uid);
				
				// print_r($result);
			}
			return $result;
		}
		if($query->num_rows()<1) {
			if($startp != 0 && $startp>0)
			{
				
				$delstartp = $startp-$limitp;
			} else {
				$delstartp = 0;
			}
			$sqldel = "select *,u.id as uid,if(DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') <= '".$date."',1,0) inactive_30days,(select count(p.id) from projects p where p.user_id=u.id) created_projs,(SELECT count( DISTINCT pf.`project_id` ) FROM `project_funds` pf where pf.user_id=u.id) backed_projs1 from user u left join country cn on cn.countryid=u.country_id left join states s on u.state_id=s.st_id left join cities c on u.city_id=c.city_id ".$sqlentry." limit $delstartp,$limitp";
				
				$querydel = $this->db->query($sqldel);
				$resultdel = $querydel->result();
				foreach($resultdel as $k=>$re){
				  $resultdel[$k]->backed_projs=$this->backed_proj_cnt($re->uid);
				
				}
				return $resultdel;
				
		}
	}
	 function backed_proj_cnt($userid){
		// $sq="select DISTINCT `project_id`  from project_funds  where fund_via != 'referral' and status='completed' and user_id=".$userid." and admin_refunded !=1";
		//$qry = $this->db->query($sq); 
		 //$sq="select DISTINCT `project_id`  from project_funds  where fund_via != 'referral' and status='completed' and user_id=".$userid." and admin_refunded !=1 ";
		 $sq= $this->db->query("SELECT group_concat( DISTINCT `project_id` ) AS prids
FROM project_funds
WHERE fund_via != 'referral'
AND STATUS = 'completed'
AND user_id =".$userid."");
		
		//$qry = $this->db->query($sq); 
		$res = $sq->result_array();
		$proj_ids  = $res[0]['prids'];
		
		$qry1  = $this->db->query("select 
		projects.*,user.profile_name,category.category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( projects.created_date, INTERVAL projects.fund_duration day),now()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		join category on category.id=projects.category_id 
		left join cities on cities.city_id=projects.city_id  
		where find_in_set(projects.id,'".$proj_ids."') and projects.status='approved'
		order by `created_date` DESC ");  
  		//$res = $qry->result_array();
		
		return $qry1->num_rows();
		
		//$res = $qry->result_array();
		//return $qry->num_rows();
	}
	//Function To Get Total Members
	function usercount()
	{
		$urlType= $this->input->post('url_type');
		$new_url = explode("_","$urlType");
		$url_type =$new_url[0];
		$user_status = $new_url[1];
		$query = "select count(*) as count from user where 1";	
		if(isset($user_status))
		{
			$entry[$i] = "status='".$user_status."'";
			$i++;
		}
		if(!empty($url_type) && ($url_type!='all'))
		{
			
			if($url_type=='individuals') {
				$entry[$i] = "user_type_id='4'";
				$i++;
			}
			if($url_type=='agents') {
				$entry[$i] = "user_type_id='5'";
				$i++;
			}
			if($url_type=='builders') {
				$entry[$i] = "user_type_id='6'";
				$i++;
			}
			
		}
		$sqlqry = $this->db->query($query);
		$qryres = $sqlqry->row();
		return $qryres->count;
	}
	
	function searchcount_users()
	{
		$email 	= $this->input->post('email_id');
		 $name	= $this->input->post('profileName');
		//$type 	= $this->input->post('user_type');
		$orderBy = $this->input->post('order_by');
		$fil_status = $this->input->post('user_stat');
		$start_on = $this->input->post('start_on');
		$end_on = $this->input->post('end_on'); 
		$contact_no=$this->input->post('contact_no');
		$country=$this->input->post('country');
		$state=$this->input->post('state');
		$city=$this->input->post('city');
		$include_inactive= $this->input->post('include_inactive');
		//$new_url = explode("_","$urlType");
		//$url_type =$new_url[0];
		//$user_status = $new_url[1];
		$entry = array();	
		$i=0;
		if(!empty($email))
		{
			$entry[$i] = "email_id like '%".$email."%'";
			$i++;
		}
		if(!empty($name))
		{
			$entry[$i] = " profile_name like '%".addslashes($name)."%'";
			$i++;
		}
		if(!empty($contact_no))
		{
			$entry[$i] = "u.contact_no ='".$contact_no."'";
			$i++;
		}
		if(!empty($country))
		{
			$entry[$i] = "u.country_id ='".$country."'";
			//$entry[$i] = "u.country_id ='".$country."'";
			$i++;
		}
		if(!empty($state))
		{
			$entry[$i] = "u.state_id ='".$state."'";
			$i++;
		}
		
		if(!empty($city))
		{
			$entry[$i] = "u.city_id ='".$city."'";
			$i++;
		}
		
//		if(isset($user_status))
//		{
//			$entry[$i] = "status='".$user_status."'";
//			$i++;
//		}
	
		if($fil_status != "") {
		    $entry[$i] = "status='".$fil_status."'";
			$i++;	
		}
		if(!empty($start_on) && !empty($end_on))
		{
			$sdate	=	date('Y-m-d', strtotime($start_on));
			$edate	=	date('Y-m-d', strtotime($end_on));
			$entry[$i]	.=	"DATE_FORMAT(joined_date,'%Y-%m-%d') BETWEEN '".$sdate."' AND '".$edate."'";
			$i++;
		}
		else if(!empty($start_on) && empty($end_on)) {
			$sdate	=	date('Y-m-d', strtotime($start_on));
			$entry[$i]	.=	"DATE_FORMAT(joined_date,'%Y-%m-%d') >= '".$sdate."'";
			$i++;
		}
		else if(empty($start_on) && !empty($end_on)) {
			$edate	=	date('Y-m-d', strtotime($end_on));
			$entry[$i]	.=	"DATE_FORMAT(u.joined_date,'%Y-%m-%d') <= '".$edate."'";
			$i++;
		}
		
		
		
		$sqlentry = "";
		$j=0;
		foreach($entry as $data)
		{
			
			if($j==0)
			$sqlentry = " where  ".$data;
			else
			$sqlentry .= " and ".$data;
			
			$j++;
		}
		if($include_inactive == 'true')
		{
			
			if($sqlentry !='')
			$inact =" or DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') <= '".$date."'";
			else{
				$inact =" where DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') <= '".$date."' or 1";
			}
			//$i++;
		}else{
			/*if($sqlentry !='')
			$inact=	" and  DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') > '".$date."'";
			else{
				$inact=	"where  DATE_FORMAT(u.last_logged_in,'%Y-%m-%d') > '".$date."'";
			}*/
		}
		
		$sqlentry .=$inact;
		
		//$sqlentry .=" order by $order";
		$sql = "select count(*) count 
		 from user u 
		 left join country cn on cn.countryid=u.country_id 
		 left join states s on u.state_id=s.st_id 
		 left join cities c on u.city_id=c.city_id ".$sqlentry." ";
		//echo $sql; 
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$result = $query->row();
			return $result->count;
		}
		if($query->num_rows()<1) {
			if($startp != 0 && $startp>0)
			{
				
				$delstartp = $startp-$limitp;
			} else {
				$delstartp = 0;
			}
			$sqldel = "select count(*) count FROM `project_funds` pf where pf.user_id=u.id) backed_projs from user u left join country cn on cn.countryid=u.country_id left join states s on u.state_id=s.st_id left join cities c on u.city_id=c.city_id ".$sqlentry." ";
				
				$querydel = $this->db->query($sqldel);
				$qryres = $querydel->row();
				return $qryres->count;
		}
		
		// $sql = "select count(*) as count from user ".$sqlentry." ";
		//$query = $this->db->query($sql);
		//$qryres = $query->row();
	//	return $qryres->count;
	}
	
	function view_user_details($uid,$baseurl) {
		$sql=$this->db->query("select u.*,u.id as uid,(select count(p.id) from projects p where p.user_id=u.id) created_projs,
		(SELECT count( DISTINCT pf.`project_id` ) FROM `project_funds` pf where pf.user_id=u.id) backed_projs1,
		if (u.profile_image IS NULL,'',u.profile_image ) profile_image1 from user u where u.id ='$uid'");
		if($sql->num_rows()>0)
		{
			$result = $sql->result();
			if($result['0']->country_id !='')
			$fetchCountry= $this->fetch_country_by_id($result['0']->country_id);
			if($result['0']->state_id !='')
			$fetchSate = $this->fetch_state_by_id($result['0']->state_id);
			if($result['0']->city_id !='')
			$fetchCity = $this->fetch_city_by_id($result['0']->city_id);
			
			$result['0']->backed_projs=$this->backed_proj_cnt($result['0']->uid);
			
			$res_status =$result['0']->status;
			//$res_type =$result['0']->user_type_id;
			
			if($res_status==1) {
				$status ='Active';	
			} else if($res_status==2) {
				$status ='Inactive';
			} else {
				$status = 'Not Verified';	
			}
			
			if($result['0']->profile_image1 !='') {
				$profImg	= $baseurl.'uploads/site_users/thumb/'.$result['0']->profile_image1;
			}
			else if($result['0']->fb_image!= '' && $result['0']->fb_image!= 0) {
				$profImg	= $result['0']->fb_image;
			}
			else if($result['0']->in_image!= '' && $result['0']->in_image!= 0) {
				$profImg	= $result['0']->in_image;
			}
			 else {
				$profImg	= $baseurl.'images/no_image.png';
			}
			if($result['0']->address_proof_image) {
				$idProof	= $baseurl.'uploads/user_id_proof/thumb/'.$result['0']->address_proof_image;
			}
			 else {
				$idProof	= $baseurl.'images/no_image.png';
			}
			$result['0']->country=$fetchCountry;
			$result['0']->state  = $fetchSate;
			$result['0']->city	 = $fetchCity;
			$result['0']->status = $status;
		//	$result['0']->user_type=$user_type;
			$result['0']->user_image=$profImg;
			$result['0']->idProof=$idProof;
			//echo '<pre>'; print_r($result);
			return $result;
		} else {
			return NULL;	
		}
	}
	
	function fetch_state_by_id($stid) {
		$sql=$this->db->query("select state from states where st_id= '$stid'");
		//echo $this->db->last_query();
		if($sql->num_rows()>0)
		{
			$result = $sql->row()->state;
			return $result;
		} else {
			return NULL;	
		}
	}
	function fetch_city_by_id($ctid) {
		$sql=$this->db->query("select city_name from cities where city_id= '$ctid'");
		if($sql->num_rows()>0)
		{
			$result = $sql->row()->city_name;
			return $result;
		} else {
			return NULL;	
		}
	}
	
	//Function To Change Status
	function change_siteuser_status()
	{
		$clists=$this->input->post('uid');
		$clist =explode(",", $clists);
		$action=$this->input->post('action');
		$count=count($clist);
		$i=0;
		while($count>0)
		{
			$q12=$this->db->query("select status from user where id='".$clist[$i]."'");
			$res=$q12->result_array();
			if($action =='2'){
			
			if($res[0]['status'] !=0){
				//echo 'assa';
				$q=$this->db->query("update user set status='".$action."' where id='".$clist[$i]."'  ");
			}else{
				//echo '33';
			}
			}else{
				//echo 'hhh';
				$date= date('Y-m-d G:i:s');
				if($res[0]['status'] ==0){
					//echo 'hhh';
					$q=$this->db->query("update user set status='".$action."',activation_key='', last_logged_in  ='".$date."' where id='".$clist[$i]."'  ");
				}
			  	else{
					$q=$this->db->query("update user set status='".$action."' where id='".$clist[$i]."'  ");
				}
			}
			$i++;	
			$count--;	
			
		}
		return 'updated';
		
	}
	
	//Function To Delete Selected users
	function del_selected_siteusers()
	{
		$clists=$this->input->post('uid');
		$clist =explode(",", $clists);
		$count=count($clist);
		$i=0;
		while($count>0)
		{
			$sqlimg = $this->db->query("select profile_image from user where id ='".$clist[$i]."'");
			if($sqlimg->num_rows()>0)
			{
				$res = $sqlimg->row();
				$profImg = $res->profile_image;
				if($profImg) {
					$removeImg = $this->unlink_siteuser_image($profImg);
				}
			}
			$this->db->where('id',$clist[$i]);
			$this->db->delete('user');
			
			$i++;	
			$count--;	
		}
		return "Deleted";
	}
	
	//Function To Delete user
	function delete_siteuser($usrid)
	{
		$sqlimg = $this->db->query("select profile_image from user where id ='".$usrid."'");
		if($sqlimg->num_rows()>0)
		{
			$res = $sqlimg->row();
			$profImg = $res->profile_image;
			if($profImg) {
				$removeImg = $this->unlink_siteuser_image($profImg);
			}
		}
		$sqlqry=$this->db->query("delete from user where id ='".$usrid."'");
		return 'deleted';
	}
	
	
	function user_account_by_email($email_id) {
		$baseurl = base_url();
		$sql=$this->db->query("select * from user where email_id ='".$email_id."'");
		if($sql->num_rows()>0)
		{
			$result = $sql->result();
			
			$fetchSate = $this->fetch_state_by_id($result['0']->state_id);
			$fetchCity = $this->fetch_city_by_id($result['0']->city_id);
			
			$res_status =$result['0']->status;
			$res_type =$result['0']->user_type_id;
			
			if($res_status==1) {
				$status ='Active';	
			} else if($res_status==2) {
				$status ='Blocked';
			} else {
				$status = 'Inactive';	
			}
			//$new_type = explode(",", "$res_type");
			/*if($res_type==1) {
				$user_type ='Seller';	
			} 
			if($res_type==2) {
				$user_type ='Buyer';
			} 
			if($res_type==3) {
				$user_type = 'Renter';	
			}
			if($res_type==4) {
				$user_type = 'Individual';	
			}
			if($res_type==5) {
				$user_type = 'Agent / Broker';	
			}
			if($res_type==6) {
				$user_type = 'Builder / Developer';	
			}
			if($res_type=='1,3') {
				$user_type = 'Seller, Renter';	
			}
			if($res_type=='1,2') {
				$user_type = 'Seller, Buyer';	
			}
			if($res_type=='2,3') {
				$user_type = 'buyer, Renter';	
			}
			if($res_type=='1,2,3') {
				$user_type = 'Seller, Buyer, Renter';	
			}*/
			if($result['0']->profile_image!='') {
				$profImg	= $baseurl.'uploads/site_users/thumb/'.$result['0']->profile_image;
			}
			else if($result['0']->fb_image!= '') {
				$profImg	= $result['0']->fb_image;
			}
			 else {
				$profImg	= $baseurl.'images/img_upload.jpg';
			}
			$result['0']->state  = $fetchSate;
			$result['0']->city	 = $fetchCity;
			$result['0']->status = $status;
			$result['0']->user_type=$user_type;
			$result['0']->user_image=$profImg;
			//echo '<pre>'; print_r($result);
			return $result;
		} else {
			return 0;	
		}
	}
	
	function select_user_cities($username) {
		$sql=$this->db->query("select state_id from user where email_id ='".$username."'");
		if($sql->num_rows()>0)
		{
			$res 	= $sql->row();
			$result = $this->select_cities($res->state_id);
		}
		
		return $result;
	}
	
	function update_siteuser1($userName) {
		$city_val = $this->input->post('city');
		if(is_numeric($city_val)) {
			$city = $city_val;	
		}
		else {
			$qry = $this->db->query("select city_id from cities where city_name='".$city_val."'");
			if($qry->num_rows()>0) {
				$res = $qry->row();
				$city = $res->city_id;	
			} else {
				
				$this->db->set('state_id',$this->input->post('state'));
				$this->db->set('city_name',$city_val);	
				$this->db->insert('cities');
				$city=$this->db->insert_id();
			}
		}
		$profImg	= $this->input->post('profile_img');
		$profImage	= str_replace("site_users/thumb/", "", $profImg);
		
		$checkimg 	= $this->db->query("select profile_image from user where email_id='".$userName."'");
		$resimg		= $checkimg->row();
		
		$oldImg		= $resimg->profile_image;
		//echo $profImage. '!= '.$oldImg; exit;
		if($oldImg) {
			if($profImage!=$oldImg) {
				$removeImg = $this->unlink_siteuser_image($oldImg);
			}
		}
		
		$this->db->set('first_name',$this->input->post('firstName'));
		$this->db->set('last_name',$this->input->post('lastName'));
		$this->db->set('address1',mysql_escape_string($this->input->post('address1')));
		$this->db->set('address2',mysql_escape_string($this->input->post('address2')));
		$this->db->set('state_id',$this->input->post('state'));
		$this->db->set('city_id',$city);
		$this->db->set('zip',$this->input->post('zip'));
		$this->db->set('contact_no_mob',$this->input->post('mob_no'));
		$this->db->set('contact_no_res',$this->input->post('resi_no'));
		$this->db->set('contact_no_office',$this->input->post('office_no'));
		$this->db->set('user_type_id',$this->input->post('userType'));
		$this->db->set('profile_image',$profImage);
		$this->db->where('email_id',$userName);
		$this->db->update('user');
		
		echo 'Successfully Updated';
	}
	function delete_idproof($img='') {
		$baseurl = base_url();
		//if($project_id =='')
		//$user_id=$this->phpsession->get('user_id');
		if($img =='')
		$img = $this->input->post('image');
		
		$user_id = $this->input->post('user_id');
		//if($vid_file =='')
		//$vid_file = $this->input->post('vid_file');
	
			if($user_id !='' && isset($user_id))
			{
				
				$sqlqry = $this->db->query("select * from user where  id =$user_id");
				$res=$sqlqry->result_array();
				//print_r($res);
				if($sqlqry->num_rows()>0) 
				{
					if($res[0]['address_proof_image'] !='')
				    $profile_image_file=$res[0]['address_proof_image'];
					
					
					$sqldel=$this->db->query("update user set address_proof_image   =''  where id =$user_id");
				}
			 }
			
			$this->unlink_idproof_images($img);
			return 1;
	}
	function unlink_siteuser_image($path) {
		$thumbImg 	= 'uploads/site_users/thumb/'.$path;
		$largeImg	= 'uploads/site_users/original/'.$path;
		$smallImg	= 'uploads/site_users/small/'.$path;
		if(file_exists($largeImg)) {
			unlink($largeImg);	
		}
		if(file_exists($thumbImg)) {
			unlink($thumbImg);	
		}
		if(file_exists($smallImg)) {
			unlink($smallImg);	
		}	
	}
	function delete_profile_image($img='') {
		$baseurl = base_url();
		//if($project_id =='')
		$user_id = $this->input->post('user_id');
		if($img =='')
		$img = $this->input->post('image');
		//if($vid_file =='')
		//$vid_file = $this->input->post('vid_file');
	
			if($user_id !='' && isset($user_id))
			{
				
				$sqlqry = $this->db->query("select * from user where  id =$user_id");
				$res=$sqlqry->result_array();
				//print_r($res);
				if($sqlqry->num_rows()>0) 
				{
					if($res[0]['profile_image'] !='')
				    $profile_image_file=$res[0]['profile_image'];
					
					
					$sqldel=$this->db->query("update user set profile_image   =''  where id =$user_id");
				}
			 }
			
			$this->unlink_profile_images($img);
			return 1;
	}
	function unlink_profile_images($path) {
		$largeImg 	= UPLOAD_PATH.'uploads/site_users/original/'.$path;
		$smallImg	= UPLOAD_PATH.'uploads/site_users/small/'.$path;
		$thumbImg	= UPLOAD_PATH.'uploads/site_users/thumb/'.$path;
		//$smallImg	= 'uploads/projects/images/small/'.$path; 
		if(file_exists($largeImg)) {
			unlink($largeImg);	
		}
		if(file_exists($thumbImg)) {
			unlink($thumbImg);	
		}
		if(file_exists($smallImg)) {
			unlink($smallImg);	
		}	
	}
	function unlink_idproof_images($path) {
		$largeImg 	= UPLOAD_PATH.'uploads/user_id_proof/original/'.$path;
		$thumbImg	= UPLOAD_PATH.'uploads/user_id_proof/thumb/'.$path;
	/*	$thumbImg	= UPLOAD_PATH.'uploads/site_users/thumb/'.$path;*/
		//$smallImg	= 'uploads/projects/images/small/'.$path; 
		if(file_exists($largeImg)) {
			unlink($largeImg);	
		}
		if(file_exists($thumbImg)) {
			unlink($thumbImg);	
		}
	/*	if(file_exists($smallImg)) {
			unlink($smallImg);	
		}	*/
	}
	
	function update_image_field($userName) {
		$updtimg = $this->db->query("UPDATE user set profile_image='' where email_id ='".$userName."'");	
	}
	
	function change_user_password($userName) {
		$curr_psw	= $this->input->post('curr_psw');
		$new_psw	= $this->input->post('new_psw');
		$checkuser 	= $this->db->query("select password, first_name, last_name from user where email_id='".$userName."'");
		$respass	= $checkuser->row();
		$oldPass	= $respass->password;
		$name		= $respass->first_name.' '.$respass->last_name;
		if(md5($curr_psw)==$oldPass) {
			$updtpsw	= $this->db->query("update user set password='".md5($new_psw)."' where email_id='".$userName."' and password='".md5($curr_psw)."'");
			$sendPass = $this->emailmodel->change_user_password_mail($userName, $new_psw, $name);
			return 1;	
		} else {
			return 0;
		}
	}
	
	function check_fb_user($userid)
	{		
		$this->db->select('first_name');
		$this->db->select('email_id');
        $this->db->from('user');
		$this->db->where('fb_user_id', $userid); 		
        $query = $this->db->get();	
		if ($query->num_rows() > 0)
		    {
				$rs=$query->result();
				return $rs;		
			}
		else
		   	return NULL;		
	}
	
	function check_user_forgot_password() {
		$userName	= $this->input->post('username');
		$checkuser 	= $this->db->query("select email_id, first_name, last_name from user where email_id='".$userName."'");
		if($checkuser->num_rows() > 0)
		{
			$reuser		= $checkuser->row();
			$toemail	= $reuser->email_id;
			$name		= $reuser->first_name.' '.$reuser->last_name;
			$newpass	= substr(uniqid(),0,8);
			$updtpsw	= $this->db->query("update user set password='".md5($newpass)."' where email_id='".$toemail."'");
			$sendPass = $this->emailmodel->change_user_password_mail($toemail, $newpass, $name);
			return 'success';
		} else {
			return NULL;	
		}
		
	}
		
}
?>