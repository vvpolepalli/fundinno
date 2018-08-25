<?php
/***************************************************************************
File Name		: profilemodel.php
Created Date	: 1-1-2013
Author			: Pramod Kumar C. K
****************************************************************************/

class Profilemodel extends  CI_Model
{
	 function __construct()
    {
        parent::__construct();
    }
	function my_profile_det()
	{
	  $sql="select u.* from user u where id=".$this->phpsession->get('user_id');
	  $qry = $this->db->query($sql);  
  		$res = $qry->result_array();
		//echo $this->db->last_query();
		foreach($res as $r)
		{
			$res[0]['innovation_cnt'] = $this->my_innovation_cnt($this->phpsession->get('user_id'));
			$res[0]['funded_cnt'] 	  = $this->archive_projectmodel->backed_proj_cnt($r['id']);
			$res[0]['stared_cnt']	  = $this->my_stared_cnt();
			$res[0]['cityname']	  	  = $this->fetch_city_by_id($r['city_id']);
			$res[0]['countryname']	  = $this->fetch_country_by_id($r['country_id']);
			$res[0]['fundinnovation_cash'] = $this->archive_projectmodel->check_fundinnovation_cash();
			if($r['profile_image'] !=''){
				$res[0]['profile_imgurl']=base_url().'uploads/site_users/thumb/'.$r['profile_image'];
			}elseif($r['fb_image'] !=''){
				$res[0]['profile_imgurl']=$r['fb_image'].'?width=200&height=150';
			}
			elseif($r['in_image'] !=''){
				$res[0]['profile_imgurl']=$r['in_image'];
			}
			else{
				$res[0]['profile_imgurl']=base_url().'images/prof_no_img.png';
			}
			$res[0]['cityname']	  	  = $this->fetch_city_by_id($r['city_id']);
		}
		//print_r($res);
		return $res[0];
	}
	function projects_i_may_like(){
	  $sql="select u.liked_category from user u where id=".$this->phpsession->get('user_id');
	  $qry = $this->db->query($sql);  
  	  $res = $qry->result_array();
	  if( $qry->num_rows()>0){
		 $cate_ids= $res[0]['liked_category'];
		  
		$qry  = $this->db->query("select 
		projects.*,user.profile_name,(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration day),CURDATE()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		join category on category.id=projects.category_id 
		left join cities on cities.city_id=projects.city_id  
		where find_in_set(projects.category_id,'".$cate_ids."') and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) < projects.fund_duration and  projects.status='approved'  and project_status ='ongoing' and projects.user_id !=".$this->phpsession->get('user_id')."
		order by `created_date` DESC limit 0,10");  
  		$res = $qry->result_array();
	//	echo $this->db->last_query(); 
		foreach($res as $k=>$r){
			if($r['project_status'] =='failed')
                            $fund_det=$this->project_fund_details_failed($r['id']);
                        else    
                            $fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			$res[$k]['backed_by_user']=$new_array[$r['id']];
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  = array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
		}
		
		return $res;
	  }else{
		  return NULL;
	  }
	}
	
	function get_my_profile_det(){
		$sql="select u.* from user u where id=".$this->phpsession->get('user_id');
	  $qry = $this->db->query($sql);  
  		$res = $qry->result_array();
		foreach($res as $r)
		{
			if($r['profile_image'] !=''){
				$res[0]['profile_imgurl'] = base_url().'uploads/site_users/thumb/'.$r['profile_image'];
			}elseif($r['fb_image'] !=''){
				$res[0]['profile_imgurl'] = $r['fb_image'].'?width=200&height=150';
			}elseif($r['in_image'] !=''){
				$res[0]['profile_imgurl']=$r['in_image'];
			}else{
				$res[0]['profile_imgurl'] = '';
			}
			$res[0]['cityname']	  	  = $this->fetch_city_by_id($r['city_id']);
		}
		return $res[0];
	}
	function profile_det($userid){
	  $sql="select u.* from user u where id=".$userid;
	  $qry = $this->db->query($sql);  
  		$res = $qry->result_array();
		//echo $this->db->last_query(); 
		foreach($res as $r)
		{
			$res[0]['innovation_cnt'] = $this->my_innovation_cnt($userid);
			$res[0]['funded_cnt'] 	  = $this->archive_projectmodel->backed_proj_cnt($r['id']);
			$res[0]['stared_cnt']	  = $this->my_stared_cnt($userid);
			if($r['profile_image'] !=''){
				$res[0]['profile_imgurl'] = base_url().'uploads/site_users/thumb/'.$r['profile_image'];
			}elseif($r['fb_image'] !=''){
				$res[0]['profile_imgurl'] = $r['fb_image'].'?width=200&height=150';
			}elseif($r['in_image'] !=''){
				$res[0]['profile_imgurl']=$r['in_image'];
			}else{
				$res[0]['profile_imgurl'] = '';
			}
			$res[0]['cityname']	  	  = $this->fetch_city_by_id($r['city_id']);
		}
		return $res[0];
	}
	function update_profile($post){
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
				
				$this->db->set('state_id',$post['state']);
				$this->db->set('city_name',$city_val);	
				$this->db->insert('cities');
				$city=$this->db->insert_id();
			}
		}
		$profImg	= $post['profile_timg'];
		//$profImg	= $this->input->post('profile_img');
		$profImage	= str_replace("site_users/thumb/", "", $profImg);
		
		$checkimg 	= $this->db->query("select profile_image,address_proof_image from user where id='".$uid."'");
		$resimg		= $checkimg->row();
		
		$oldImg		= $resimg->profile_image;
		if($oldImg) {
			if($profImage!=$oldImg) {
				$removeImg = $this->unlink_siteuser_image($oldImg);
			}
		}
		
		$oldIdproof		= $resimg->address_proof_image;
		$id_proof=$post['hid_id_proof'];
		if($oldIdproof) {
			if($id_proof!=$oldIdproof) {
				$removeId = $this->unlink_idproof_images($oldIdproof);
			}
		}
		
		if(isset($post['category_list'])){
			$interested_category=implode(',',$post['category_list']);
		}
		else
			$interested_category='';
		
		$this->db->set('profile_name',$profileName);
		$this->db->set('websites',$post['websites']);
		$this->db->set('fb_link',$post['fb_prof_link']);
		$this->db->set('country_id',$post['country']);
		$this->db->set('state_id',$post['state']);
		$this->db->set('city_id',$city);
		$this->db->set('about_me',$post['about_me']);
		$this->db->set('address',$post['address']);
		$this->db->set('liked_category',$interested_category);
		$this->db->set('contact_no',$post['mob_no']);
		$this->db->set('twitter_link',$post['tw_prof_link']);
	
		//$this->db->set('fb_user','no');
		//$this->db->set('status','active');
		
		$this->db->set('address_proof_image',$post['hid_id_proof']);
		$this->db->set('address_id_proof',$post['hid_addr_proof']);
		
		$this->db->set('profile_image',$profImg);
		
		//$this->db->set('joined_date',$created);
		$this->db->where('id',$this->phpsession->get('user_id'));
		$this->db->update('user');
		
		return 'updated';
	}
	function activate_profile($uid,$activation_key){
		//$sql = "SELECT * FROM user WHERE id=:id and activation_key=:key";
		//$query = $this->db->query( $sql, array( ':id' => $uid ,':key' => $activation_key) );
		$sql = "SELECT * FROM user WHERE id=? and activation_key=?";
		$query = $this->db->query( $sql, array(  $uid ,$activation_key) );
		$result=$query->result_array();
		$no=$query->num_rows();
		//$sth = $mysqli->prepare( $sql );
		//$sth->execute( array( ':id' => $uid ,':key' => $activation_key) );
		//$res = $sth->get_result();
		$today		= date('Y-m-d H:i:s');
		//print_r($result);
		if($no>0){
			//echo 'fgfg';
			$update_sql = "update  user set activation_key=? , status=?,last_logged_in =? where id=?  ";
			$update_query = $this->db->query( $update_sql, array( '',1,$today,$uid) );
			//$update_result=$query->result_array();
			//echo $this->db->last_query();
			return true;
		}else{
			return false;
		}
	}
	function check_old_passwrd($old_pass)
	{
	   $old_pass=md5($old_pass);
	   $this->db->select('id');
	   $this->db->select('email_id');
	   $this->db->select('profile_name');
	   $this->db->from('user');
	   $this->db->where('id',$this->phpsession->get('user_id'));
	   $this->db->where('password', $old_pass); 
	   $this->db->where('status', '1'); 
	   $Qry=$this->db->get();
	   $no=$Qry->num_rows();
	   if($no==0)	   
		   return false;
	   else
	   	return true;
	}
	
	function check_email($email_id)
	{
	 //  $old_pass=md5($old_pass);
	   $this->db->select('id');
	   $this->db->select('email_id');
	   $this->db->select('profile_name');
	   $this->db->from('user');
	   $this->db->where('id !=',$this->phpsession->get('user_id'));
	   $this->db->where('email_id', $email_id); 
	   //$this->db->where('status', '1'); 
	   $Qry=$this->db->get();
	   $no=$Qry->num_rows();
	   if($no==0)	   
		   return true;
	   else
	   	return false;
	}
	function get_email(){
	   $this->db->select('email_id');
	   $this->db->from('user');
	   $this->db->where('id',$this->phpsession->get('user_id'));
	   //$this->db->where('status', '1'); 
	   $Qry=$this->db->get();
	   $res = $Qry->result_array();
	  //echo $this->db->last_query();
	   return $res[0]['email_id'];
	}
	function get_notifications(){
	   $this->db->from('account_notifications');
	   $this->db->where('user_id',$this->phpsession->get('user_id'));
	   //$this->db->where('status', '1'); 
	   $Qry=$this->db->get();
	   $res = $Qry->result_array();
	  //echo $this->db->last_query();
	   return $res[0];
	}
	function update_notifications($post)
	{
	  // if(isset($post['follower']) || isset($post['funded']) || isset($post['comments']) || isset($post['project_update']))
	   //{
		if(isset($post['follower']))   
	   		$this->db->set('new_follower',1);
		else
			$this->db->set('new_follower',0);
		if(isset($post['funded']))   
	   		$this->db->set('others_funded',1);
		else
			$this->db->set('others_funded',0);
		if(isset($post['comments']))   
	   		$this->db->set('new_comments',1);
		else
			$this->db->set('new_comments',0);
		if(isset($post['project_update']))   
	   		$this->db->set('project_update',1);
		else
			$this->db->set('project_update',0);
			
		if(isset($post['newsletter']))   
	   		$this->db->set('news_letter',1);
		else
			$this->db->set('news_letter',0);
			
	   $this->db->where('user_id',$this->phpsession->get('user_id'));
	   
	   $this->db->update('account_notifications');
	  // }
	  return 'updated';
	}
	function update_account($post)
	{
	  // if($post['email_id'] !='')
	  // $this->db->set('email_id',$post['email_id']);
	  // if(isset($post['change_password']))
	  // {
		 if($post['new_pass'] !='')
		 {	 
		  $new_pass=md5($post['new_pass']);
		  $this->db->set('password',$new_pass);
		  
	  // }
	   $this->db->where('id',$this->phpsession->get('user_id'));
	   $this->db->update('user');
	   }
	   //$this->phpsession->save('email_id');
	   return 'updated';
	  // $Qry=$this->db->get();
	}
	function my_innovation_cnt($user_id){
		$this->db->where('user_id',$user_id);  
		$this->db->from('projects');
		$q = $this->db->get();
		//$result=$q->result_array();
		// $qry->num_rows();
		return $q->num_rows();
	}
	function my_stared_cnt($user_id=''){
		if($user_id =='')
		$user_id=$this->phpsession->get('user_id');
		$this->db->where('user_id',$user_id);  
		$this->db->from('starred_projects');
		$q = $this->db->get();
		//$result=$q->result_array();
		$sq1= $this->db->query("select * from starred_projects s left join projects p on s.projects_id =p.id where s.user_id=".$user_id." and p.status='approved'");
		// $qry->num_rows();
		//echo $q->num_rows();
		
		return $sq1->num_rows();
	}
	function explode_fn($substr) {
       	 return explode('-', $substr);
    }
	function getValue_fn($item) {
		 return $item[0];
	}
	function walk($val, $key, $new_array){
    $nums = explode('-',$val);
    $new_array[$nums[0]] = $nums[1];
	}
	function fun_walk($val){
	  $new_arr = array();
	  if(is_array($val)) {
	    foreach($val as $k => $v) {
         $nums = explode('-',$v);
		 $new_arr[$nums[0]] = $nums[1];
		} 
	   }
      return $new_arr;
	}
		//$ids = array_map(function($item) { return $item['id']; }, $communications);
//$output = implode(',', $ids);
	function current_projects_funded(){
		//$sq= $this->db->query("select group_concat(DISTINCT `project_id`) as proj_ids from project_funds where fund_via='backed' and status='completed' and user_id=".$this->phpsession->get('user_id'));
		
		$sq1= $this->db->query("SELECT group_concat( t1.pr ) as pro_amnt
		FROM (
		SELECT concat( `project_id` , '-', sum( amount ) ) AS pr
		FROM project_funds
		WHERE fund_via = 'backed'
		AND STATUS = 'completed'
		AND user_id =".$this->phpsession->get('user_id')."
		GROUP BY `project_id`
		)t1");

		$result1   = $sq1->result_array();
		$pro_amnt  = $result1[0]['pro_amnt'];
		//print_r($result1);
		//$pro_amnt_arr= explode('-',$pro_amnt);
	//	echo '<pre>';
		//print_r($pro_amnt);
		//$a = array_map(array($this,'explode_fn'),explode(',', $pro_amnt));
		$a1 = explode(',', $pro_amnt);
		$new_array = array();
		//array_walk($a1,array($this,'walk'), $new_array); 
		$new_array = $this->fun_walk($a1);
		/*foreach ($a1 as $result) {
			$b1 = explode('-', $result);
			$array[$b1[0]] = $b1[1];
		}*/

		//$ids = array_map(array($this,'getValue_fn'),$a);
	 // print_r($new_array);

		$proj_ids=implode(',',array_keys($new_array));
		//print_r($proj_ids);
		/*$proj_ids=implode(',',$proj_idsArr);
		print_r($a);*/
		//echo '</pre>';
		//$result   = $sq->result_array();
		//$proj_ids =$result[0]['proj_ids'];
		//$backed_amnt =$result[0]['backed_amnt'];
		$qry  = $this->db->query("select 
		projects.*,user.profile_name,category.category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( projects.created_date, INTERVAL projects.fund_duration day),now()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		join category on category.id=projects.category_id 
		join cities on cities.city_id=projects.city_id  
		where find_in_set(projects.id,'".$proj_ids."') and projects.status='approved' and project_status ='ongoing'
		order by `created_date` DESC ");  
  		$res = $qry->result_array();
	//	echo $this->db->last_query(); 
		foreach($res as $k=>$r){
			if($r['project_status'] =='failed')
                            $fund_det=$this->project_fund_details_failed($r['id']);
                        else    
                            $fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			$res[$k]['backed_by_user']=$new_array[$r['id']];
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  = array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
		}
		return $res;
	}
	function projects_funded($userid=''){
		if($userid =='')
		$userid=$this->phpsession->get('user_id');
		//$sq= $this->db->query("select group_concat(DISTINCT `project_id`) as proj_ids from project_funds where fund_via='backed' and status='completed' and user_id=".$this->phpsession->get('user_id'));
		
		$sq1= $this->db->query("SELECT group_concat( t1.pr ) as pro_amnt
		FROM (
		SELECT concat( `project_id` , '-', sum( amount ) ) AS pr
		FROM project_funds
		WHERE fund_via != 'referral'
		AND STATUS = 'completed'
		AND user_id =".$userid."
		GROUP BY `project_id`
		)t1");
		
		if($this->phpsession->get('user_id') != '')
		$access = 1;
		else{
		$access =" if(projects.access_status ='1',0,1)";
		}
		
		$result1   = $sq1->result_array();
		$pro_amnt  = $result1[0]['pro_amnt'];
		
		$a1 = explode(',', $pro_amnt);
		$new_array = array();
		//array_walk($a1,array($this,'walk'), $new_array); 
        $new_array = $this->fun_walk($a1);
		$proj_ids=implode(',',array_keys($new_array));
		$qry  = $this->db->query("select 
		projects.*,user.profile_name,category.category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( projects.created_date, INTERVAL projects.fund_duration day),now()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		join category on category.id=projects.category_id 
		left join cities on cities.city_id=projects.city_id  
		where $access
		and find_in_set(projects.id,'".$proj_ids."') and projects.status='approved'
		order by `created_date` DESC ");  
  		$res = $qry->result_array();
	//	echo $this->db->last_query(); 
		foreach($res as $k=>$r){
			if($r['project_status'] =='failed')
                            $fund_det=$this->project_fund_details_failed($r['id']);
                        else    
                            $fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			$res[$k]['backed_by_user']=$new_array[$r['id']];
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  = array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
		}
		return $res;
	}
	function active_innovation(){
		$qry  = $this->db->query("select 
		projects.*,user.profile_name,(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration day),CURDATE()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		left join cities on cities.city_id=projects.city_id  
		where projects.user_id =".$this->phpsession->get('user_id')." and projects.status='approved' and project_status ='ongoing'
		order by `created_date` DESC ");  
  		$res = $qry->result_array();
	//	echo $this->db->last_query(); 
		foreach($res as $k=>$r){
			if($r['project_status'] =='failed')
                            $fund_det=$this->project_fund_details_failed($r['id']);
                        else    
                            $fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			//$res[$k]['backed_by_user']=$new_array[$r['id']];
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  = array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
		}
		return $res;
	}
	function projects_innovated($userid=''){
		
		if($userid =='')
		$userid=$this->phpsession->get('user_id');
		
		if($this->phpsession->get('user_id') != '')
		$access = 1;
		else{
		$access =" if(projects.access_status ='1',0,1)";
		}
		
		$qry  = $this->db->query("select 
		projects.*,user.profile_name,(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration day),CURDATE()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		left join cities on cities.city_id=projects.city_id  
		where $access
		and projects.user_id =".$userid." 
		order by `created_date` DESC ");  
  		$res = $qry->result_array();
		//echo $this->db->last_query(); 
		foreach($res as $k=>$r){
			if($r['project_status'] =='failed')
                            $fund_det=$this->project_fund_details_failed($r['id']);
                        else    
                            $fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			//$res[$k]['backed_by_user']=$new_array[$r['id']];
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  = array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			if($r['funding_goal'] !=0)
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
                        else 
                        $res[$k]['backd_per']=0;
		}
		return $res;
	}
	function projects_innovated_user($userid=''){
		
		if($userid =='')
		$userid=$this->phpsession->get('user_id');
		
		if($this->phpsession->get('user_id') != '')
		$access = 1;
		else{
		$access =" if(projects.access_status ='1',0,1) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration and  projects.status='approved'";
		}
		
		$qry  = $this->db->query("select 
		projects.*,user.profile_name,(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration day),CURDATE()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		left join cities on cities.city_id=projects.city_id  
		where $access
		and projects.user_id =".$userid." 
		and projects.status='approved' 
		order by `created_date` DESC ");  
  		$res = $qry->result_array();
		//echo $this->db->last_query(); 
		foreach($res as $k=>$r){
			if($r['project_status'] =='failed')
                            $fund_det=$this->project_fund_details_failed($r['id']);
                        else    
                            $fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			//$res[$k]['backed_by_user']=$new_array[$r['id']];
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  = array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
		}
		return $res;
	}
	function projects_stared($userid=''){
		if($userid =='')
		$userid=$this->phpsession->get('user_id');
		$sq = $this->db->query("select group_concat(DISTINCT `projects_id`) as proj_ids from starred_projects where  user_id=".$userid);
		/*$sq1= $this->db->query("SELECT group_concat( t1.pr ) as pro_amnt
		FROM (
		SELECT concat( `project_id` , '-', sum( amount ) ) AS pr
		FROM project_funds
		WHERE fund_via = 'backed'
		AND STATUS = 'completed'
		AND user_id =".$this->phpsession->get('user_id')."
		GROUP BY `project_id`
		)t1");*/

		$result   = $sq->result_array();
		$proj_ids  = $result[0]['proj_ids'];
		
		if($this->phpsession->get('user_id') != '')
		$access = 1;
		else{
		$access =" if(projects.access_status ='1',0,1)";
		}
		
		$qry  = $this->db->query("select 
		projects.*,user.profile_name,(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration day),CURDATE()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		left join cities on cities.city_id=projects.city_id  
		where $access 
		and find_in_set(projects.id,'".$proj_ids."') and projects.status='approved'
		order by `created_date` DESC ");  
  		$res = $qry->result_array();
	//	echo $this->db->last_query(); 
		foreach($res as $k=>$r){
			if($r['project_status'] =='failed')
                            $fund_det=$this->project_fund_details_failed($r['id']);
                        else    
                            $fund_det=$this->project_fund_details($r['id']);
			$tot=0;
			//$res[$k]['backed_by_user']=$new_array[$r['id']];
			$arr=array();
			foreach($fund_det as $f){
				$arr[]	=	$f['user_id'];
				$tot	=	$tot+$f['amount']; 
			}
			$arr  = array_values(array_unique($arr));
			$res[$k]['backers_cnt'] = count($arr);
			$res[$k]['pledged_amount'] = $tot;
			
			$res[$k]['backd_per'] =round(($tot/$r['funding_goal'])*100); 
		}
		return $res;
	}
	function project_fund_details($projid){ 
		$sq="select * from project_funds where fund_via='backed' and status='completed' and project_id=".$projid." ";
		$qry = $this->db->query($sq); 
		//if($qry->num_rows()>0){
  		$res = $qry->result_array();
		return $res;
	}
         function project_fund_details_failed($projid){
            $sq="select * from failed_project_backed_users where  project_id=".$projid."";
		$qry = $this->db->query($sq); 
		//if($qry->num_rows()>0){
  		$res = $qry->result_array();
		return $res;
        }
	function fundinnovation_cash_det(){
		/*$sq="select SUM(if((pf.fund_via='refunded') && (fc.cash >= 0),fc.cash,0)) refunded_cash,    SUM(if(pf.fund_via='referral',pf.amount,0)) referral_cash,
 abs(SUM(if( fc.cash < 0,if(pf.admin_refunded !=1,fc.cash,0),0))) reinvested_cash,
 SUM(if( pf.admin_refunded =1,if(fc.cash>0,fc.cash,0),0)) withdrawn_cash ,
 SUM(if( (pf.admin_refunded !=1) ,fc.cash,0)) tot_refund_cash 
from project_funds pf left join fundinnovation_cash fc on pf.id = fc.order_id where pf.user_id  = ".$this->phpsession->get('user_id')."
		";*/
		//echo $sq;
		$sql="select SUM(if((pf.fund_via='refunded') && (pf.status != 'error') && (pf.status != 'deleted'),pf.amount,0)) refunded_cash,
		SUM(if((pf.fund_via='referral') && (pf.status != 'pending' ) && (pf.status != 'error') && (pf.status != 'deleted'),pf.amount,0)) referral_cash,
		 SUM(if((pf.status != 'error') && (pf.status != 'pending') && (pf.status != 'deleted'),pf.fundinnovation_cash,0)) reinvested_cash 
		 from project_funds pf  where pf.user_id  = ".$this->phpsession->get('user_id');
		$qry = $this->db->query($sql);// echo $sql;
		
		
		//if($qry->num_rows()>0){
  		$res = $qry->result_array();
		$sq2="select SUM(if( (fc.order_id =0) ,fc.cash,0)) withdrawn_cash,
		SUM(fc.cash) fund_cash from fundinnovation_cash fc where fc.user_id  = ".$this->phpsession->get('user_id');
		$qry1 = $this->db->query($sq2);
		 $res2 = $qry1->result_array();
		// echo $sq2;
		//print_r($res);print_r($res2);
		$resul=array_merge($res[0],$res2[0]);
		//print_r($resul);
		return $resul;
	}
	function refunded_project(){
		$startp			= $this->input->post('startp');
		$limitp			= $this->input->post('limitp');
		 
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
			
		$sq="select p.id, p.project_title ,sum(pf.amount) as tot_amnt from project_funds pf join projects p on pf.project_id=p.id where `fund_via`='refunded' and pf.user_id =".$this->phpsession->get('user_id')."  group by `project_id` limit $startp,$limitp";
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		return $res;
	}
	function refunded_project_cnt(){
		
		$sq="select p.id, p.project_title ,sum(pf.amount) as tot_amnt from project_funds pf join projects p on pf.project_id=p.id where `fund_via`='refunded' and pf.user_id =".$this->phpsession->get('user_id')."  group by `project_id`";
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		$cnt = count($res);
		return $cnt;
		//return $res;
	}
	function referral_project(){
		$startp			= $this->input->post('startp');
		$limitp			= $this->input->post('limitp');
		 
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
			
		$sq="select p.id, p.project_title ,sum(pf.amount) as tot_amnt from project_funds pf join projects p on pf.project_id=p.id where `fund_via`='referral' and pf.status != 'pending' and pf.status != 'error' and  pf.status != 'deleted'  and pf.user_id =".$this->phpsession->get('user_id')."  group by `project_id` limit $startp,$limitp ";
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		return $res;
	}
	function referral_project_cnt(){
		
		$sq="select p.id, p.project_title ,sum(pf.amount) as tot_amnt from project_funds pf join projects p on pf.project_id=p.id where `fund_via`='referral' and pf.status != 'pending' and pf.status != 'error' and  pf.status != 'deleted' and pf.user_id =".$this->phpsession->get('user_id')."  group by `project_id` ";
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		$cnt = count($res);
		return $cnt;
		//return $res;
	}
	function reinvested_project(){
		$startp			= $this->input->post('startp');
		$limitp			= $this->input->post('limitp');
		 
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
			
		$sq="select p.id, p.project_title ,
		sum(pf.fundinnovation_cash) as tot_amnt 
		from project_funds pf 
		join projects p on pf.project_id=p.id 
		where pf.`fund_via` !='referral'  and pf.user_id =".$this->phpsession->get('user_id')."
		AND pf.fundinnovation_cash >0 
		group by `project_id` limit $startp,$limitp ";
		//echo $sq;
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		return $res;
	}
	function reinvested_project_cnt(){
					
		$sq="select p.id, p.project_title ,
		sum(pf.fundinnovation_cash) as tot_amnt 
		from project_funds pf 
		join projects p on pf.project_id=p.id 
		where `fund_via` !='referral' and pf.user_id =".$this->phpsession->get('user_id')." 
		AND pf.fundinnovation_cash >0
		group by `project_id`";
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		$cnt = count($res);
		return $cnt;
	}
	//
	function referral_users(){
		$startp			= $this->input->post('startp');
		$limitp			= $this->input->post('limitp');
		$proj_id		= $this->input->post('proj_id');
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
			$sq="select pf.amount as ref_amnt,
			(select u.profile_name from project_funds pf1 join user u on u.id=pf1.user_id where pf1.id=pf.referral_order_id) profile_name,
			(select u.id from project_funds pf1 join user u on u.id=pf1.user_id where pf1.id=pf.referral_order_id) user_id,
			(select pf2.amount from project_funds pf2 join user u1 on u1.id=pf2.user_id where pf2.id=pf.referral_order_id) back_amnt ,
			(select if(u2.profile_image !='',concat('".base_url()."','uploads/site_users/thumb/',u2.profile_image),
			if(u2.fb_image !='',u2.fb_image,
			if(u2.in_image !='',u2.in_image,''))) profile_image1
			from project_funds pf1 join user u2 on u2.id=pf1.user_id where pf1.id=pf.referral_order_id) profile_image
			from project_funds pf  where `fund_via`='referral' and pf.status != 'pending' and pf.status != 'error' and  pf.status != 'deleted' and pf.user_id =".$this->phpsession->get('user_id')."  and pf.project_id=".$proj_id."  limit $startp,$limitp";
		//$sq="select p.id, p.project_title ,sum(pf.amount) as tot_amnt from project_funds pf join projects p on pf.project_id=p.id where `fund_via`='referral' and pf.user_id =".$this->phpsession->get('user_id')."  group by `project_id` limit $startp,$limitp ";
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		return $res;
	}
	function referral_users_cnt(){
		$proj_id		= $this->input->post('proj_id');
		$sq="select pf.amount as ref_amnt,(select u.profile_name from project_funds pf1 join user u on u.id=pf1.user_id where pf1.id=pf.referral_order_id) profile_name,(select pf2.amount from project_funds pf2 join user u1 on u1.id=pf2.user_id where pf2.id=pf.referral_order_id) back_amnt from project_funds pf  where `fund_via`='referral' and pf.status != 'pending' and pf.status != 'error' and  pf.status != 'deleted' and pf.user_id =".$this->phpsession->get('user_id')."  and pf.project_id=".$proj_id." ";
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		$cnt = count($res);
		return $cnt;
		//return $res;
	}
	function delete_idproof($img='') {
		$baseurl = base_url();
		//if($project_id =='')
		$user_id=$this->phpsession->get('user_id');
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
					if($res[0]['address_proof_image'] !='')
				    $profile_image_file=$res[0]['address_proof_image'];
					
					
					$sqldel=$this->db->query("update user set address_proof_image   =''  where id =$user_id");
				}
			 }
			
			$this->unlink_idproof_images($img);
			return 1;
	}
	function delete_profile_image($img='') {
		$baseurl = base_url();
		//if($project_id =='')
		$user_id=$this->phpsession->get('user_id');
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
	function delete_project($proj_id){
		
		$sqlimg = $this->db->query("select project_image,intro_video,video_thumb_image from projects where id ='".$proj_id."'");
		if($sqlimg->num_rows()>0)
		{
			$res = $sqlimg->row();
			//print_r($res->project_image);
			$projImg = $res->project_image;
				$intro_video = $res->intro_video;
				$video_thumb_image = $res->video_thumb_image;
				if($projImg !='' && $projImg != NULL) {
					$removeImg = $this->unlink_project_images($projImg);
				}
				if($intro_video !='' && $video_thumb_image !=''){
					$removeVideo=$this->unlink_project_video($intro_video,$video_thumb_image);
				}
				$sqlqry=$this->db->query("delete from projects where id ='".$proj_id."'");
		}
		
		return 'deleted';
	}
	function unlink_project_images($path) {
		//echo $path.'papap';
		$thumbImg 	= UPLOAD_PATH.'uploads/projects/images/200x150/'.$path;
		$largeImg	= UPLOAD_PATH.'uploads/projects/images/original/'.$path;
		$mediumImg	= UPLOAD_PATH.'uploads/projects/images/medium/'.$path;
		$gallary	= UPLOAD_PATH.'uploads/projects/images/gallary/'.$path;
		$img		= UPLOAD_PATH.'uploads/projects/images/img/'.$path;
		if(file_exists($largeImg)) {
			unlink($largeImg);	
		}
		if(file_exists($thumbImg)) {
			unlink($thumbImg);	
		}
		if(file_exists($mediumImg)) {
			unlink($mediumImg);	
		}	
		if(file_exists($gallary)) {
			unlink($gallary);	
		}
		if(file_exists($img)) {
			unlink($img);	
		}
	}
	function unlink_project_video($video,$video_thumb_image) {
		$video 		= UPLOAD_PATH.'uploads/projects/videos/original/'.$video;
		$vidImage1 	= UPLOAD_PATH.'uploads/projects/videos/original/'.$video_thumb_image;
		$vidImage	= UPLOAD_PATH.'uploads/projects/videos/thumb/'.$video_thumb_image;
		//$smallImg	= 'uploads/projects/images/small/'.$path;
		if(file_exists($video)) {
			unlink($video);	
		}
		if(file_exists($vidImage1)) {
			unlink($vidImage1);	
		}
		if(file_exists($vidImage)) {
			unlink($vidImage);	
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
	function unlink_profile_images($path) {
		$largeImg 	= UPLOAD_PATH.'uploads/site_users/original/'.$path;
		$smallImg	= UPLOAD_PATH.'uploads/site_users/small/'.$path;
		$thumbImg	= UPLOAD_PATH.'uploads/site_users/thumb/'.$path;
		$large	    = UPLOAD_PATH.'uploads/site_users/large/'.$path;
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
		if(file_exists($large)) {
			unlink($large);	
		}	
	}
	function unlink_siteuser_image($path) {
		$thumbImg 	= 'uploads/site_users/thumb/'.$path;
		$largeImg	= 'uploads/site_users/original/'.$path;
		$smallImg	= 'uploads/site_users/small/'.$path;
		$large	    = UPLOAD_PATH.'uploads/site_users/large/'.$path;
		if(file_exists($largeImg)) {
			unlink($largeImg);	
		}
		if(file_exists($thumbImg)) {
			unlink($thumbImg);	
		}
		if(file_exists($smallImg)) {
			unlink($smallImg);	
		}	
		if(file_exists($large)) {
			unlink($large);	
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
	function fetch_country_by_id($ctid) {
		$sql=$this->db->query("select country from country where countryid= '$ctid'");
		if($sql->num_rows()>0)
		{
			$result = $sql->row()->country;
			return $result;
		} else {
			return NULL;	
		}
	}
	function select_country(){
		$qry = $this->db->query("select * from country order by country ASC");  
  		$res = $qry->result();
		
		//echo "<pre>"; print_r($res); echo "</pre>";
		return $res;
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
	function select_cities($st_id=''){
		if($st_id!='') {
			$qry = $this->db->query("select * from cities where state_id=$st_id order by city_name ASC");  
			$res = $qry->result();
			return $res;
		} else {
			return NULL;	
		}
	}

}
?>