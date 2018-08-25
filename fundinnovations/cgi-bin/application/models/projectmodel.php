<?php
 ?><?php
/***************************************************************************
File Name		: projectmodel.php
Created Date	: 18-12-2012
Author			: Pramod Kumar C. K
****************************************************************************/

class Projectmodel extends  CI_Model
{
	 function __construct()
    {
        parent::__construct();
		$this->load->model('emailmodel');	
    }
	function media_banner_list()
	{
		$qry = $this->db->query("select * from media order by id ASC");  
  		$res = $qry->result_array();
		return $res;
	}
	function get_category(){
		
		$this->db->where('parent_id',0);
		$query = $this->db->get('category');
		
		$res=$query->result_array();
		foreach($res as $k=>$r){
			$child_category=$this->project_child_category($r['id']);
			$cnt=count($child_category);
			if($cnt >0){
				$res[$k]['child_category'] =$child_category;
			}else{
				$res[$k]['child_category']=0;
			}
			
		}
		return $res;
	}
	function project_child_category($parent_id){
			$this->db->where('parent_id',$parent_id);
		$query = $this->db->get('category');
	
		$res=$query->result_array();
		return $res;
	}
	function get_duration(){
		
		$query = $this->db->get('fund_duration');
		$res=$query->result_array();
		return $res;
	}
	function get_cities(){
		
		$this->db->where('CountryID',113); 
		$this->db->order_by('city_name'); 
		$query = $this->db->get('cities');
		$res=$query->result_array();
		//echo $this->db->last_query(); 
		return $res;
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
	
	function get_project_det($proj_id){
		$this->db->where('id',$proj_id); 
		$query = $this->db->get('projects');
		$res=$query->result_array();
		//echo $this->db->last_query(); 
		foreach($res as $r){
			$cityname=$this->fetch_city_by_id($r['city_id']);
			$res[0]['city_name']=$cityname;
			
			$this->db->where('projects_id',$r['id']); 
			$this->db->from('reward_options');
			$q = $this->db->get();
			$result=$q->result_array();
			if(count($result)>0){
				$res[0]['rewards']=$result;
			}else{
				$res[0]['rewards']=0;
				}//uploads/projects/images/200x150/{$project_det.project_image}
			$project_img_path=UPLOAD_PATH."uploads/projects/images/200x150/".$res[0]['project_image'];	
			if(file_exists($project_img_path)){
				$res[0]['project_img_path']=base_url()."uploads/projects/images/200x150/".$res[0]['project_image'];
			}else{
				//$res[0]['project_img_path']=UPLOAD_PATH.'images/add_img.jpg';
				$res[0]['project_img_path']='';
			}
		}
		//echo '<pre>'; print_r($res[0]);echo '</pre>';
		//echo $this->db->last_query(); 
		return $res[0];
		
	}
	function check_project_owner($proj_id){
		$this->db->select('*'); 
		$this->db->where('id',$proj_id); 
		$this->db->where('user_id',$this->phpsession->get('user_id')); 
		$query = $this->db->get('projects');
		if($query->num_rows()>0) {
		$res=$query->result_array();
		return $res;
		}else{
			return $query->num_rows();
		}
	}
	
	function get_project_updates($proj_id){
		
		$this->db->where('project_id',$proj_id); 
		//$this->db->where('project_update_privilage',$this->phpsession->get('user_id'));
		$query = $this->db->get('project_updates');
		if($query->num_rows()>0) {
		$res=$query->result_array();
		return $res[0];
		}else{
			return $query->num_rows();
		}
	}
	function update_projects_update($post){
		$created_date   = date('Y-m-d H:i:s');
		$update			= addslashes($post['update']);
		$proj_id    	= $post['proj_id'];
		if($post['action']=='update'){
			$this->db->set('project_update',$update);
			$this->db->set('last_updated_user_id',$this->phpsession->get('user_id'));
			$this->db->set('date',$created_date);
			$this->db->where('project_id',$proj_id);
			$this->db->update('project_updates');
		}elseif($post['action']=='save'){
			$this->db->set('project_update',$update);
			$this->db->set('last_updated_user_id',$this->phpsession->get('user_id'));
			$this->db->set('date',$created_date);
			$this->db->set('project_id',$proj_id);
			$this->db->insert('project_updates');
		}
		echo 'Successfully updated';
	}
	
	function post_project($post){
		$user_id=$this->phpsession->get('user_id');
		//$user_id=5;
		//echo '<pre>'; print_r($post);echo '</pre>'; exit; 
		$today			= date('Y-m-d H:i:s');
		$project_title	= $post['proj_title'];
		$project_img	= $post['hidImage'];
		$category		= $post['category_list'];
		$descrption		= addslashes($post['short_description']);
		$city_val 		= $post['city'];
		//$city_val = $post['city'];
		if(is_numeric($city_val)) {
			$city = $city_val;	
		}
		else {
			$qry = $this->db->query("select city_id from cities where city_name = '".$city_val."'");
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
		
		//$projectDesc    = str_replace("'","\'",$post['project_mdesc']);
		$projectDesc    = addslashes($post['project_mdesc']);
		if($post['logged_in_user'] == 'logged_users'){
			$access_status='1';
		}else
			$access_status='0';
		
		/*if(isset($post['category_list'])){
			$category=implode(',',$post['category_list']);
		}
		else
			$category='';*/
			
		$this->db->set('user_id',$user_id);
		$this->db->set('city_id ',$city);
		$this->db->set('project_title',$project_title); 
		$this->db->set('category_id',$category); 	 		 	
		$this->db->set('short_description',$descrption); 
		$this->db->set('fund_duration',$post['funding_duration']);
		$this->db->set('funding_goal',$post['funding_goal']);
		$this->db->set('max_sponsors',$post['max_sponsors']);
		$this->db->set('min_pledge_amount',$post['min_pledge_amnt']);
		$this->db->set('referrer_percentage',0);
		$this->db->set('project_image',$project_img);
		$this->db->set('intro_video',$post['hidVidFile']);
		$this->db->set('video_thumb_image',$post['hidVidThumb']);
		$this->db->set('project_description',$projectDesc);		
		$this->db->set('access_status',$access_status);
		
		if($post['action'] =='send'){
			$this->db->set('status','pending');
		}
		else{
			$this->db->set('status','incomplete');
		}
		//$this->db->set('created_date',$today);
		$this->db->insert('projects');
		//echo $this->db->last_query();
		$projectId = $this->db->insert_id();
		if($projectId)
		if(isset($post['reward_ck']) ){
		  $cnt=$post['hid_reward_cnt'];
		  for($i=1;$i<=$cnt;$i++){
			  if($post['reward_pledge_amnt'.$i] !=''  && $post['reward_del_date'.$i] !='' ){
			  if($post['reward_user_limit'.$i] ==''){
				 $reward_user_limit=0;
			  }
			  else{
				 $reward_user_limit=$post['reward_user_limit'.$i];
			  }
			  $this->db->set('projects_id',$projectId);
			  $this->db->set('pledge_amount',$post['reward_pledge_amnt'.$i]);		
			  $this->db->set('description',$post['reward_description'.$i]);
			  $this->db->set('delivery_date',$post['reward_del_date'.$i]);
			  $this->db->set('users_limit',$reward_user_limit);
			  $this->db->set('created_date',$today);
			  $this->db->insert('reward_options');
			  }
			 }
		}
		return $projectId;
		
	}
	function update_project($post,$project_id){
		//echo '<pre>'; print_r($post);echo '</pre>';
		
		
		$today		    = date('Y-m-d H:i:s');
		$project_title	= $post['proj_title'];
		$project_img    = $post['hidImage'];
		$category       = $post['category_list'];
		$descrption     = addslashes($post['short_description']);
		$city_val       = $post['city'];
		//$projectDesc    = str_replace("'","\'",$post['project_mdesc']);
		$projectDesc    = addslashes($post['project_mdesc']);
		//$projectDesc    = addslashes($post['project_desc']);
		if(is_numeric($city_val)) {
			$city = $city_val;	
		}
		else {
			$qry = $this->db->query("select city_id from cities where city_name = '".$city_val."'");
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
		
		//print($projectDesc);
		if(isset($post['logged_in_user'])){
			$access_status='1';
		}else
			$access_status='0';
		
		$sqlqry = $this->db->query("select * from projects where  id =$project_id");
		$res=$sqlqry->result_array();
				
		if($sqlqry->num_rows()>0) 
		{
		  if($res[0]['project_image'] != $project_img)			
		   $this->unlink_project_images($res[0]['project_image']);
		  if($res[0]['intro_video'] != $post['hidVidFile'])	
		   $this->unlink_project_video($res[0]['intro_video'],$res[0]['video_thumb_image']);
		}
		/*if(isset($post['category_list'])){
			$category=implode(',',$post['category_list']);
		}
		else
			$category='';
		*/
		//print_r($post);
		$this->db->set('user_id',$this->phpsession->get('user_id'));
		$this->db->set('city_id ',$city);
		$this->db->set('project_title',$project_title); 
		$this->db->set('category_id',$category); 	 		 	
		$this->db->set('short_description',$descrption); 
		$this->db->set('fund_duration',$post['funding_duration']);
		$this->db->set('funding_goal',$post['funding_goal']);	
		$this->db->set('max_sponsors',$post['max_sponsors']);
		$this->db->set('min_pledge_amount',$post['min_pledge_amnt']);
		$this->db->set('project_image',$project_img);
		$this->db->set('intro_video',$post['hidVidFile']);
		$this->db->set('video_thumb_image',$post['hidVidThumb']);
		$this->db->set('project_description',$projectDesc);		
		$this->db->set('access_status',$access_status);
		if($post['action'] =='send'){
		$this->db->set('status','pending');
		
		}
		//$this->db->set('status','approved');
		//$this->db->set('created_date',$today);
		$this->db->where('id',$project_id);
		$this->db->update('projects');
		//echo $this->db->last_query();
		$projectId = $project_id;
		$this->check_to_send_notification($projectId);
		if(isset($post['reward_ck']) ){
			
		  $cnt=$post['hid_reward_cnt'];
		  
		  for($i=1;$i<=$cnt;$i++){
			  
			  if($post['reward_pledge_amnt'.$i] !=''  && $post['reward_del_date'.$i] !='' ){
				  if($post['reward_user_limit'.$i] ==''){
					 $reward_user_limit=0;
				  }
				  else{
				 	$reward_user_limit=$post['reward_user_limit'.$i];
			 	  }
			  
				 if($post['reward'.$i] == '') {
					 
					  $this->db->set('projects_id',$projectId);
					  $this->db->set('pledge_amount',$post['reward_pledge_amnt'.$i]);		
					  $this->db->set('description',$post['reward_description'.$i]);
					  $this->db->set('delivery_date',$post['reward_del_date'.$i]);
					  $this->db->set('users_limit', $reward_user_limit);
					  $this->db->set('created_date',$today);
					  $this->db->insert('reward_options');
					  
				 }else{
			
					  $this->db->set('pledge_amount',$post['reward_pledge_amnt'.$i]);		
					  $this->db->set('description',$post['reward_description'.$i]);
					  $this->db->set('delivery_date',$post['reward_del_date'.$i]);
					  $this->db->set('users_limit', $reward_user_limit);
					  //$this->db->set('created_date',$today);
					  $this->db->where('projects_id',$projectId);
					   $this->db->where('id',$post['reward'.$i]);
					  $this->db->update('reward_options');
				 }
				 
			  }
			  
			}
		}else{
		//	$this->db->where('id',$post['reward_id']);
			$this->db->where('projects_id',$projectId);
			$this->db->delete('reward_options');
			
		}
		return $projectId;
		
	}
	function check_to_send_notification($proj_id){
		$sql     = "select distinct user_id from project_funds where project_id=".$proj_id ;
		$qry     = $this->db->query($sql); 
		$res     = $qry->result_array();
		$sql2    = "select user_id,project_title,id from projects where id = ".$proj_id ;
		$qry2    = $this->db->query($sql2); 
		$res2    = $qry2->result_array();
		$project_title = $res2[0]['project_title'];
		$project_id = $res2[0]['id'];
			//echo $project_title;		
		foreach($res as $r){
			$notify=$this->get_notifications($r['user_id']);
			if($notify['project_update'] == 1){
		//echo 'dsdsd';	
		    $user    = $this->get_user_details($r['user_id']);
			$this->emailmodel->send_project_updated_notify($user,$project_title,$project_id);
			}
		}	
		
	}
	function get_notifications($user_id){
	   $this->db->from('account_notifications');
	   $this->db->where('user_id',$user_id);
	   $Qry=$this->db->get();
	   $res = $Qry->result_array();
	   return $res[0];
	}
	function get_user_idproof(){
			$sq="select *  from user   where id=".$this->phpsession->get('user_id');
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		return $res[0];
	}
	function get_user_details($userid){
		$sq="select user.*,cities.city_name,email_id  from user left join  cities on cities.city_id=user.city_id  where id=".$userid;
		$qry = $this->db->query($sq); 
  		$res = $qry->result_array();
		foreach($res as $k=>$r){
		if($r['profile_image'] !=''){
				$res[0]['profile_imgurl'] = base_url().'uploads/site_users/thumb/'.$r['profile_image'];
			}elseif($r['fb_image'] !=''){
				$res[0]['profile_imgurl'] = $r['fb_image'].'?width=200&height=150';
			}elseif($r['in_image'] !=''){
				$res[0]['profile_imgurl'] = $r['in_image'];
			}else{
				$res[0]['profile_imgurl'] = '';
			}
		}
		return $res[0];
	}
	function remove_project_reward($post){
			$this->db->where('id',$post['reward_id']);
			$this->db->where('projects_id',$post['proj_id']);
			$this->db->delete('reward_options');
			echo '1'; 
	}
	function remove_proj_video(){
		$proj_id  = $this->input->post('project_id');
		$vid      = $this->input->post('vid');
		$this->db->where('project_id',$proj_id);
		$this->db->where('id',$vid);
		$qry=$this->db->get('project_videos');
		$res=$qry->result_array();
		if($qry->num_rows>0){
			$sql=$this->db->query("delete from project_videos where id ='$vid'");
			if($res[0]['type'] ==1){
				$this->unlink_project_video($res[0]['video_link'],$res[0]['thumb_image']);
			}
		}
	}
	
	function delete_project_video($project_id='',$img='',$vid_file='') {
		$baseurl = base_url();
		if($project_id =='')
		$project_id=$this->input->post('project_id');
		if($img =='')
		$img = $this->input->post('image');
		if($vid_file =='')
		$vid_file = $this->input->post('vid_file');
	
			if($project_id !='' && isset($project_id)){
				
				$sqlqry = $this->db->query("select * from projects where  id =$project_id");
				$res=$sqlqry->result_array();
				//print_r($res);
				if($sqlqry->num_rows()>0) 
				{
					if($res[0]['intro_video'] !='')
				    $vid_file=$res[0]['intro_video'];
					
					if($res[0]['video_thumb_image'] !='')
				    $img=$res[0]['video_thumb_image'];
					
					$sqldel=$this->db->query("update projects set intro_video   ='' , video_thumb_image ='' where id =$project_id");
				}
				
			}
			
			$this->unlink_project_video($vid_file,$img);
			return 1;
	}
	
	function unlink_project_video($video1,$video_thumb_image) {
		$video 		= UPLOAD_PATH.'uploads/projects/videos/original/'.$video1;
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
	function update_video_caption(){
		$proj_id  = $this->input->post('project_id');
		$vid      = $this->input->post('vid');
		$caption  = $this->input->post('caption');
		$this->db->set('video_title',$caption);
		$this->db->where('project_id',$proj_id);
		$this->db->where('id',$vid);
		$this->db->update('project_videos');
		return 'update';
		//$res=$qry->result_array();
		
	}
	function delete_project_image($project_id='',$img='',$vid_file='') {
		$baseurl = base_url();
		if($project_id =='')
		$project_id=$this->input->post('project_id');
		if($img =='')
		$img = $this->input->post('image');
		//if($vid_file =='')
		//$vid_file = $this->input->post('vid_file');
	
			if($project_id !='' && isset($project_id))
			{
				
				$sqlqry = $this->db->query("select * from projects where  id =$project_id");
				$res=$sqlqry->result_array();
				//print_r($res);
				if($sqlqry->num_rows()>0) 
				{
					if($res[0]['intro_video'] !='')
				    $vid_file=$res[0]['intro_video'];
					
					if($res[0]['video_thumb_image'] !='')
				    $img=$res[0]['video_thumb_image'];
					
					$sqldel=$this->db->query("update projects set intro_video   ='' , video_thumb_image ='' where id =$project_id");
				}
			 }
			
			$this->unlink_project_images($img);
			return 1;
	}
	function unlink_project_images($path) {
		$thumbImg 	= UPLOAD_PATH.'uploads/projects/images/200x150/'.$path;
		$largeImg	= UPLOAD_PATH.'uploads/projects/images/original/'.$path;
		$mediumImg	= UPLOAD_PATH.'uploads/projects/images/medium/'.$path;
		$gallary	= UPLOAD_PATH.'uploads/projects/images/gallary/'.$path;
		$img		= UPLOAD_PATH.'uploads/projects/images/img/'.$path;
		//$smallImg	= 'uploads/projects/images/small/'.$path; 
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
	
	
	function insert_project_images() {
				
		$created_date   = date('Y-m-d H:i:s');
		$Image1		= $this->input->post('image');
		$proj_id    = $this->input->post('proj_id');
		$image_title    = $this->input->post('image_title');
		
		$this->db->set('project_id',$proj_id);
		$this->db->set('image_title',$image_title);
		$this->db->set('image',$Image1);
		$this->db->set('date',$created_date);
		$this->db->insert('project_images');
		echo 'Successfully inserted';
		//echo $biulderPlace.' '.$startDate.' '.$endDate.' '.$adImage;	
	}
	
	function remove_proj_photo(){
		$proj_id  = $this->input->post('project_id');
		$photo_id      = $this->input->post('photo_id');
		$this->db->where('project_id',$proj_id);
		$this->db->where('id',$photo_id);
		$qry=$this->db->get('project_images');
		$res=$qry->result_array();
		if($qry->num_rows>0){
			$sql=$this->db->query("delete from project_images where id ='$photo_id'");
			//if($res[0]['type'] ==1){
				$this->unlink_project_images($res[0]['image']);
			//}
		}
		
	}
	function update_image_caption(){
		$proj_id  = $this->input->post('project_id');
		$photo_id      = $this->input->post('photo_id');
		$caption      = $this->input->post('caption');
		$this->db->set('image_title',$caption);
		$this->db->where('project_id',$proj_id);
		$this->db->where('id',$photo_id);
		$this->db->update('project_images');
		return 'updated';
	}
	function get_project_photos($proj_id){
		$this->db->where('project_id',$proj_id);
		
		$qry=$this->db->get('project_images');
		$res=$qry->result_array();
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
	function get_termsofuse(){
		$this->db->select('page_content');
		$this->db->where('page_id',3);
		$qry=$this->db->get('cms');
		$res=$qry->result_array();
		return $res[0];
	}
	
	function get_project_videos($proj_id){
		$this->db->where('project_id',$proj_id);
		$qry=$this->db->get('project_videos');
		$res=$qry->result_array();
               
                foreach($res as $k=>$r){
                if($r['type'] ==1){ 
                    $vidurl=UPLOAD_PATH.'uploads/projects/videos/original/'.$r['video_link'];
                    
                        if(!file_exists($vidurl)){
                            $res[$k]['vid_sts']='yes';
                        }else{
                             $res[$k]['vid_sts']='no';
                        }
                }else{
                    $res[$k]['vid_sts']='no';
                }
                }
              // echo '<pre>';  print_r($res); echo '<pre>'; 
		return $res;
	}
	
	function add_youtube_video($videoInformation)
	{
			try
			{
				
				$this->db->set('type',$videoInformation['videotype']);
				$this->db->set('video_link',$videoInformation['videourl']);
				$this->db->set('project_id',$videoInformation['project_id']);
				$this->db->set('video_title',$videoInformation['vid_title']);
				//$this->db->set('video_desc',$videoInformation['description']);
				$this->db->set('video_external_id',$videoInformation['videoid']);
				$this->db->set('thumb_image',$videoInformation['thumbnail']);
				$this->db->set('created_date',date('Y-m-d H:i:s'));
				$this->db->insert('project_videos');
				//echo 'Successfully inserted';	
			}
			catch(Exception $e)
			{
				die($e->getMessage().'<pre>'.$e->getTraceAsString().'</pre>');  
			}
	}
	
	function insert_vimeo_video($videoID,$proj_id,$thumbnailurl)
	{	
			try
			{
				$this->db->set('type','2');
				$this->db->set('video_link',$this->input->post('vimeo_url'));
				$this->db->set('project_id',$proj_id);
				$this->db->set('video_title',$this->input->post('vid_title'));
				$this->db->set('video_external_id',$videoID);
				$this->db->set('thumb_image',$thumbnailurl);
				$this->db->set('created_date',date('Y-m-d H:i:s'));
				$this->db->insert('project_videos');
				//echo 'Successfully inserted';	
			}
			catch(Exception $e)
			{
				die($e->getMessage().'<pre>'.$e->getTraceAsString().'</pre>');  
			}
	}
	
	function insert_video($type,$video_path,$vidImgfile,$project_id) 
	{		
		$this->db->set('type',$type);
		$this->db->set('video_link',$video_path);
		$this->db->set('video_title',$this->input->post('vid_title'));
		$this->db->set('thumb_image',$vidImgfile);
		$this->db->set('project_id',$project_id);
		$this->db->set('created_date',date('Y-m-d H:i:s'));
		$this->db->insert('project_videos');
		echo 'Video Successfully Inserted';		
	}
	
	function get_project_comments($projid){
		$this->db->select('project_comments.*,user.profile_name,user.profile_image,user.fb_image,user.in_image');
		$this->db->join('user','user.id = project_comments.user_id');
		$this->db->where('project_id',$projid);
		$this->db->where('parent_id',0);
	
		$this->db->where('admin_comment','0');
		$qry=$this->db->get('project_comments');
		$res=$qry->result_array();
		//echo $this->db->last_query();
		foreach($res as $k=>$r){
			$child_comments=$this->project_child_comments($projid,$r['id']);
			$cnt=count($child_comments);
			if($cnt >0){
				$res[$k]['child_comments'] =$child_comments;
			}else{
				$res[$k]['child_comments']=0;
			}
			if($r['profile_image'] !='' && $r['profile_image'] != ' '){
			//echo 'l';
				$res[$k]['profile_imgurl'] = base_url().'uploads/site_users/thumb/'.$r['profile_image'];
			}elseif($r['fb_image'] !=''){
				$res[$k]['profile_imgurl'] = $r['fb_image'].'?width=200&height=150';
			}elseif($r['in_image'] !=''){
				$res[$k]['profile_imgurl']=$r['in_image'];
			}else{
				$res[$k]['profile_imgurl'] = '';
			}
		}
		//echo '<pre>';print_r($res); echo '</pre>';
		return $res;
	}
	function project_child_comments($proj_id,$comment_id){
		$this->db->select('project_comments.*,user.profile_name,user.profile_image,user.fb_image,user.in_image');
		$this->db->join('user','user.id = project_comments.user_id');
		$this->db->where('project_id',$proj_id);
		$this->db->where('project_comments.parent_id',$comment_id);
		$this->db->where('admin_comment','0');
		$qry=$this->db->get('project_comments');
		$res=$qry->result_array();
		foreach($res as $k=>$r){
			if($r['profile_image'] !='' && $r['profile_image'] != ' '){
			//echo 'l';
				$res[$k]['profile_imgurl'] = base_url().'uploads/site_users/thumb/'.$r['profile_image'];
			}elseif($r['fb_image'] !=''){
				$res[$k]['profile_imgurl'] = $r['fb_image'].'?width=200&height=150';
			}elseif($r['in_image'] !=''){
				$res[$k]['profile_imgurl']=$r['in_image'];
			}else{
				$res[$k]['profile_imgurl'] = '';
			}
		}
		return $res;
	}
	function update_project_comment($post){
		$this->db->set('comment',addslashes($post['comment']));
		$this->db->where('id',$post['comment_id']);
		$this->db->where('project_id',$post['proj_id']);
		$this->db->update('project_comments'); 
	//	echo $this->db->last_query();
		echo '1';
	}
	function delete_project_comment($post){
		//$this->db->set('comment',addslashes($post['comment']));
		$this->db->where('project_id',$post['proj_id']);
		$this->db->where('id',$post['comment_id']);
		//$this->db->where('admin_comment','0');
		$qry=$this->db->get('project_comments');
		$res=$qry->result_array();
		$cnt=count($res);
		if($cnt>0){
		$this->db->where('id',$post['comment_id']);
		$this->db->where('project_id',$post['proj_id']);
		$this->db->delete('project_comments'); 
		if($res['parent_id'] ==0){
			$this->db->where('parent_id',$post['comment_id']);
			$this->db->where('project_id',$post['proj_id']);
			$this->db->delete('project_comments'); 
			}
		}
		echo '1';
	}
	
	function check_project_status($proj_id){
		$this->db->select('status,project_status,user_id');
		$this->db->where('id',$proj_id);
		//$this->db->where('user_id',$this->phpsession->get('user_id'));  
		$this->db->from('projects');
		$q = $this->db->get();
		$result=$q->result_array();
		return $result[0];
	}
	function auto_suggest(){
		$city_var = $this->input->post('city_var');
		$Qry = "select city_name from cities where city_name  like '%".$city_var."%' and CountryID=113 limit 0,10";
		$query = $this->db->query($Qry);
		$count = $query->num_rows();
		$city_list = $query->result_array();
		$li = '';	
		//print_r($city_list);
		if($count>0)
		{
			foreach($city_list as $key=>$val)
			{
				$li .= '<li onclick="fill('."'".$val['city_name']."'".');" style="cursor:pointer">'.$val['city_name'].'</li>';
			}
			 return $li;	
		}
		return  NULL;
	}
}
?>