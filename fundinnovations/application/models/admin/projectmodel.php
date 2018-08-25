<?php
 ?><?php
/***************************************************************************
File Name		: projectmodel.php
Created Date	: 12-10-2012
Author			: Pramod Kumar C. K
****************************************************************************/

class Projectmodel extends  CI_Model
{
	  function __construct()
    {
        parent::__construct();
		//$this->load->database();
		
		//$this->load->library(array('phpsession','mysmarty'));
		
    }
	function get_category(){
		
		$query = $this->db->get('category');
		$res=$query->result_array();
		return $res;
	}
	function get_users(){
		$this->db->where('status',1);
		$query = $this->db->get('user');
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
		$query = $this->db->get('cities');
		$res=$query->result_array();
		//echo $this->db->last_query(); 
		return $res;
	}
	
	function post_project($post){
	//echo '<pre>'; print_r($post);echo '</pre>'; exit; 
		$today		= date('Y-m-d H:i:s');
		$project_title	= $post['proj_title'];
		$project_img= $post['hidImage'];
		$category= $post['category_list'];
		$descrption = addslashes($post['short_description']);
		$city_val = $post['city'];
		$projectDesc =	addslashes($post['project_desc']);
		if($post['logged_in_user'] == 'logged_users'){
			$access_status='1';
		}else
			$access_status='0';
		
		/*if(isset($post['category_list'])){
			$category=implode(',',$post['category_list']);
		}
		else
			$category='';*/
		$this->db->set('user_id',$post['users']);
		$this->db->set('city_id',$city_val);
		$this->db->set('project_title',$project_title); 
		$this->db->set('category_id',$category); 	 		 	
		$this->db->set('short_description',$descrption); 
		$this->db->set('fund_duration',$post['funding_duration']);
		$this->db->set('funding_goal',$post['funding_goal']);	
		$this->db->set('min_pledge_amount',$post['min_pledge_amnt']);
		$this->db->set('max_sponsors',$post['max_sponsors']);
		$this->db->set('referrer_percentage',$post['ref_percent']);
		$this->db->set('project_image',$project_img);
		$this->db->set('intro_video',$post['hidVidFile']);
		$this->db->set('video_thumb_image',$post['hidVidThumb']);
		$this->db->set('project_description',$projectDesc);		
		$this->db->set('access_status',$access_status);
		$this->db->set('status','pending');
		//$this->db->set('created_date',$today);
		$this->db->insert('projects');
		//echo $this->db->last_query();
		$projectId = $this->db->insert_id();
		if($projectId)
		if($post['reward_ck'] =='add_reward'){
		  $cnt=$post['hid_reward_cnt'];
		  for($i=1;$i<=$cnt;$i++){
			  if($post['reward_pledge_amnt'.$i] !=''  && $post['reward_del_date'.$i] !='' ){
			  $this->db->set('projects_id',$projectId);
			  $this->db->set('pledge_amount',$post['reward_pledge_amnt'.$i]);		
			  $this->db->set('description',$post['reward_description'.$i]);
			  $this->db->set('delivery_date',$post['reward_del_date'.$i]);
			  $this->db->set('users_limit',$post['reward_user_limit'.$i]);
			  $this->db->set('created_date',$today);
			  $this->db->insert('reward_options');
			  }
			 }
		}
		return $projectId;
		
	}
	function update_project($post,$project_id){
	//echo '<pre>'; print_r($post);echo '</pre>'; exit; 
		
		$today		    = date('Y-m-d H:i:s');
		$project_title	= $post['proj_title'];
		$project_img    = $post['hidImage'];
		$category       = $post['category_list'];
		$descrption     = addslashes($post['short_description']);
		$city_val       = $post['city'];
		$projectDesc    = addslashes($post['project_desc']);
		if(isset($post['logged_in_user'])){
			$access_status='1';
		}else
			$access_status='0';
		
		$sqlqry = $this->db->query("select * from projects where  id =$project_id");
		$res=$sqlqry->result_array();
				
		if($sqlqry->num_rows()>0) 
		{
		  if($res[0]['project_image'] != $project_img  && $res[0]['project_image'] !='')			
		   $this->unlink_project_images($res[0]['project_image']);
		  if($res[0]['intro_video'] != $post['hidVidFile'] && $res[0]['intro_video'] !='')		
		   $this->unlink_project_video($res[0]['intro_video'],$res[0]['video_thumb_image']);
		}
		
		/*if(isset($post['category_list'])){
			$category=implode(',',$post['category_list']);
		}
		else
			$category='';*/
			
		$this->db->set('user_id',$post['users']);
		$this->db->set('city_id',$city_val);
		$this->db->set('project_title',$project_title); 
		$this->db->set('category_id',$category); 	 		 	
		$this->db->set('short_description',$descrption); 
		$this->db->set('fund_duration',$post['funding_duration']);
		$this->db->set('funding_goal',$post['funding_goal']);	
		$this->db->set('min_pledge_amount',$post['min_pledge_amnt']);
		$this->db->set('max_sponsors',$post['max_sponsors']);
		$this->db->set('referrer_percentage',$post['ref_percent']);
		$this->db->set('project_image',$project_img);
		$this->db->set('intro_video',$post['hidVidFile']);
		$this->db->set('video_thumb_image',$post['hidVidThumb']);
		$this->db->set('project_description',$projectDesc);		
		$this->db->set('access_status',$access_status);
		$this->db->where('id',$project_id);
		$this->db->update('projects');
		$projectId = $project_id;
		
		if(isset($post['reward_ck']) ){
			
		  $cnt=$post['hid_reward_cnt'];
		  
		  for($i=1;$i<=$cnt;$i++){
			  
			  if($post['reward_pledge_amnt'.$i] !=''  && $post['reward_del_date'.$i] !='' ){
				  
				 if($post['reward'.$i] == '') {
					 
					  $this->db->set('projects_id',$projectId);
					  $this->db->set('pledge_amount',$post['reward_pledge_amnt'.$i]);		
					  $this->db->set('description',$post['reward_description'.$i]);
					  $this->db->set('delivery_date',$post['reward_del_date'.$i]);
					  $this->db->set('users_limit',$post['reward_user_limit'.$i]);
					  $this->db->set('created_date',$today);
					  $this->db->insert('reward_options');
					  
				 }else{
			
					  $this->db->set('pledge_amount',$post['reward_pledge_amnt'.$i]);		
					  $this->db->set('description',$post['reward_description'.$i]);
					  $this->db->set('delivery_date',$post['reward_del_date'.$i]);
					  $this->db->set('users_limit',$post['reward_user_limit'.$i]);
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
	
	function remove_project_reward($post){
			$this->db->where('id',$post['reward_id']);
			$this->db->where('projects_id',$post['proj_id']);
			$this->db->delete('reward_options');
			echo '1'; 
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
			//$this->db->join('reward_options','projects.id=reward_options.projects_id');
			$q = $this->db->get();
			$result=$q->result_array();
			if(count($result)>0){
				$res[0]['rewards']=$result;
			}else{
				$res[0]['rewards']=0;
				}
		}
		//echo '<pre>'; print_r($res[0]);echo '</pre>';
		//echo $this->db->last_query(); 
		return $res[0];
		
	}
	//get_project_details
	
	
	function view_project_details($proj_id,$baseurl){
		
		$sql=$this->db->query("select p.*,u.profile_name,(SELECT `category_name` 
FROM `category`
WHERE id=category_id
) category from projects p join user u on u.id=p.user_id where p.id ='$proj_id'");
		//echo $this->db->last_query(); 
		if($sql->num_rows()>0)
		{
			$result        = $sql->result_array();
			
			$fetchCity     = $this->fetch_city_by_id($result[0]['city_id']);
			
			$fetchCategory = $this->fetch_category_by_id($result[0]['category_id']);
			
			if($result[0]['project_image'] ) {
				$projImg	= $baseurl.'uploads/projects/images/200x150/'.$result[0]['project_image'];
			}
			/*else if($result['0']->fb_image!= '') {
				$profImg	= $result['0']->fb_image;
			}*/
			 else {
				$projImg	= $baseurl.'images/no_image.png';
			}
			if($result[0]['video_thumb_image']) {
				$vid_image	= $baseurl.'uploads/projects/videos/original/'.$result[0]['video_thumb_image'];
			}
			 else {
				$vid_image	= $baseurl.'images/no_image.png';
			}
		
			foreach($result as $r)
			{
			$this->db->where('projects_id',$r['id']); 
			$this->db->from('reward_options');
			//$this->db->join('reward_options','projects.id=reward_options.projects_id');
			$q = $this->db->get();
			$res=$q->result_array();
			if(count($res)>0){
				$result[0]['rewards']=$res;
			}else{
				$result[0]['rewards']=0;
				}
			}
			
			$result[0]['city_name']	  = $fetchCity;
			$result[0]['proj_image']  = $projImg;
			$result[0]['video_image'] = $vid_image;
		//	$result[0]['category']    = $fetchCategory;
	//	echo '<pre>'; print_r($result);echo '</pre>';
			return $result[0];
		} else {
			return NULL;	
		}
	
	}
	
	function fetch_category_by_id($cat_id){
		$sql=$this->db->query("select category_name from category where id= '$cat_id'");
		if($sql->num_rows()>0)
		{
			$result = $sql->row()->category_name;
			return $result;
		} else {
			return NULL;	
		}
	}
	function searchcount_projects()
	{
		$proj_title 	= trim($this->input->post('proj_title'));
		$category	= $this->input->post('category');
		$project_status	= $this->input->post('project_status');
		$location       = $this->input->post('location');
		$fund_goal = $this->input->post('fund_goal');
		$status = $this->input->post('status');
		//$end_on = $this->input->post('end_on');
	//	$new_url = explode("_","$urlType");
		//$url_type =$new_url[0];
		//$user_status = $new_url[1];
		$entry = array();	
		$i=0;
		if(!empty($proj_title) || $proj_title !='')
		{
			//$entry[$i] = " MATCH(project_title,short_description) AGAINST('".$proj_title."') ";
			$entry[$i] = " project_title like '%".addslashes($proj_title)." %'";
			$i++;
		}
		if(!empty($category))
		{
			//$entry[$i] = " find_in_set('".$category."',category_ids) ";
			$entry[$i] = " category_id=".$category;
			$i++;
		}
		if(!empty($project_status))
		{
			$entry[$i] = "project_status ='".$project_status."'";
			$i++;
		}
		if(!empty($location))
		{
			$entry[$i] = " city_name like '%".addslashes($location)."%'";
			$i++;
		}
		if(!empty($fund_goal))
		{
			$entry[$i] = " funding_goal ='".$fund_goal."'";
			$i++;
		}
		
		if(!empty($status))
		{
			$entry[$i] = " p.status ='".$status."'";
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
		//$sqlentry .=" order by $order";
		$sql = "select  count(p.id) as count from projects p join user u on u.id=p.user_id left join cities c on p.city_id=c.city_id  ".$sqlentry;
	  //echo $sql;
		$query = $this->db->query($sql);
		$qryres = $query->row();
		return $qryres->count;
		
	/*	
	
		
		$sql = "select count(*) as count from projects join cities on cities.city_id=projects.city_id ".$sqlentry." ";
		$query = $this->db->query($sql);
		$qryres = $query->row();
		return $qryres->count;*/
	}
	function manage_projects(){
		
		
		//echo '<pre>'; print_r($_POST);echo '</pre>';
		$startp			= $this->input->post('startp');
		$limitp			= $this->input->post('limitp');
		$proj_title 	= trim($this->input->post('proj_title'));
		$category		= $this->input->post('category');
		//$type 	= $this->input->post('user_type');
		$orderBy 		= $this->input->post('order_by');
		$project_status = $this->input->post('project_status');
		$location 		= $this->input->post('location');
		$fund_goal 		= $this->input->post('fund_goal'); 
		$status			= $this->input->post('status');
		 
		
		
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
		if($orderBy=='ASC_TITLE') {
			$order = " 	project_title ASC";	
		}
		else if($orderBy=='DESC_TITLE'){
			$order = " project_title DESC";	
		}
		else if($orderBy=='ASC_NAME'){
			$order = " profile_name ASC";	
		}
		else if($orderBy=='DESC_NAME'){
			$order = " profile_name DESC";	
		}
		else if($orderBy=='ASC_FUND'){
			$order = " funding_goal ASC";	
		}
		else if($orderBy=='DESC_FUND'){
			$order = " funding_goal DESC";	
		}
		else if($orderBy=='ASC_DATE'){
			$order = " project_created_date ASC";	
		}
		else if($orderBy=='DESC_DATE'){
			$order = " project_created_date DESC";	
		}
		/*else if($orderBy=='ASC_PLEDGE'){
			$order = " created_date ASC";	
		}
		else if($orderBy=='DESC_PLEDGE'){
			$order = " created_date DESC";	
		}*/
		else {
			$order = " project_created_date DESC";	
		}
		
		$entry = array();	
		$i=0;
		if(!empty($proj_title) || $proj_title !='')
		{
			//$entry[$i] = " MATCH(project_title,short_description) AGAINST('".$proj_title."') ";
			$entry[$i] = " project_title like '%".addslashes($proj_title)."%'";
			$i++;
		}
		if(!empty($category))
		{
		//$entry[$i] = " find_in_set('".$category."',category_ids) ";
			$entry[$i] = " category_id=".$category;
			$i++;
		}
		if(!empty($project_status))
		{
			$entry[$i] = "project_status ='".$project_status."'";
			$i++;
		}
		if(!empty($location))
		{
			$entry[$i] = " city_name like '%".addslashes($location)."%'";
			$i++;
		}
		if(!empty($fund_goal))
		{
			$entry[$i] = " funding_goal ='".$fund_goal."'";
			$i++;
		}
		
		if(!empty($status))
		{
			$entry[$i] = " p.status ='".$status."'";
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
		$sqlentry .=" order by $order";
		$sql = "select  p.*,u.profile_name,c.city_name,p.id as proj_id from projects p join user u on u.id=p.user_id left join cities c on p.city_id=c.city_id  ".$sqlentry." limit $startp,$limitp";
	  //echo $sql;
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$result = $query->result();
			//return $result;
		}
		elseif($query->num_rows()<1) {
			if($startp != 0 && $startp>0)
			{
				$delstartp = $startp-$limitp;
			} else {
				$delstartp = 0;
			}
			$sqldel = "select p.*,u.profile_name,c.city_name,p.id as proj_id from projects p join user u on u.id=p.user_id left join cities c on p.city_id=c.city_id   ".$sqlentry." limit $delstartp,$limitp";
				
				$querydel = $this->db->query($sqldel);
				$resultdel = $querydel->result();
				$result=$resultdel;
				//return $resultdel; left join project_funds pf on pf.projects_id=p.id
		}
		foreach($result as $k=>$re)
		{
			//$fund_det=$this->project_fund_details($re->proj_id);
                     if($re->project_status =='failed')
                            $fund_det=$this->project_fund_details_failed($re->proj_id);
                        else    
                            $fund_det=$this->project_fund_details($re->proj_id);
                        
			$tot=0;
			$arr=array();
			if(count($fund_det)>0){
			foreach($fund_det as $f){
				$arr[]=$f['user_id'];
				
				//$backers_details[]= $this->get_user_details($f['user_id']);
				$tot=$tot+$f['amount']; 
			}
			$arr=array_values(array_unique($arr));
			}else{
				
			}
			
			//$backers_details= array_map(array($this,'get_user_details'),$arr);
			$result[$k]->total_backers= count($arr);
			$tot_backed_amount=$tot;
				$remain_amnt=$tot_backed_amount-($re->funding_goal);
				if($remain_amnt>0)
				$result[$k]->remain_amnt=0;
				else
				$result[$k]->remain_amnt=-1*$remain_amnt;
				$result[$k]->tot_backed_amount=$tot_backed_amount;
		}
		/*foreach($result as $k=>$re){
			$s="select count(id) as total_backers,sum(amount) as tot_backed_amount from project_funds where project_id=".$re->proj_id." and status='completed' and fund_via='backed'";
			$qu = $this->db->query($s);
			//echo $s;
			$re_q = $qu->result();
			if($qu->num_rows()>0)
			{
				$result[$k]->total_backers=$re_q[0]->total_backers;
				
				if($re_q[0]->tot_backed_amount !='')
				$tot_backed_amount=$re_q[0]->tot_backed_amount;
				else
				$tot_backed_amount=0;
				
				$result[$k]->tot_backed_amount=$tot_backed_amount;
				$remain_amnt=$tot_backed_amount-($re->funding_goal);
				if($remain_amnt>0)
				$result[$k]->remain_amnt=0;
				else
				$result[$k]->remain_amnt=-1*$remain_amnt;
				
			}else{
				$result[$k]->total_backers=0;
				$result[$k]->tot_backed_amount=0;
				$result[$k]->remain_amnt=0-$re->funding_goal;
			}
		}*/
		//echo '<pre>';print_r($result);echo '</pre>';
		return $result;
		
	}
        function project_fund_details_failed($projid){
            $sq="select * from failed_project_backed_users where  project_id=".$projid."";
		$qry = $this->db->query($sq); 
		//if($qry->num_rows()>0){
  		$res = $qry->result_array();
		return $res;
        }
	function project_fund_details($projid){ 
		//$sq="select count( DISTINCT `user_id` ) backers_cnt,sum(amount) as tot from project_funds where fund_via='backed' and status='completed' and project_id=".$projid;
		//echo $sq;
		$sq="select * from project_funds where fund_via='backed' and status='completed' and project_id=".$projid." and admin_refunded !=1 ";
		$qry = $this->db->query($sq); 
		//if($qry->num_rows()>0){
  		$res = $qry->result_array();
		return $res;
		/*}else{
			return 0;
		}*/
	}
	
	function refund_cash_list()
	{
		$startp			= $this->input->post('startp');
		$limitp			= $this->input->post('limitp');
		$orderBy 		= $this->input->post('order_by');
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
		if($orderBy == 'ASC_NAME') {
			$order = " 	profile_name ASC";	
		}
		else if($orderBy=='DESC_NAME'){
			$order = " profile_name DESC";	
		}
		else if($orderBy=='ASC_RFND_CASH'){
			$order = " refunded_cash ASC";	
		}
		else if($orderBy=='DESC_RFND_CASH'){
			$order = " refunded_cash DESC";	
		}
		else if($orderBy=='ASC_REF'){
			$order = " referral_cash ASC";	
		}
		else if($orderBy=='DESC_REF'){
			$order = " referral_cash DESC";	
		}
		else if($orderBy=='ASC_REIN'){
			$order = " reinvested_cash 	 ASC";	
		}
		else if($orderBy=='DESC_REIN'){
			$order = " reinvested_cash 	 DESC";	
		}
		else {
			$order = " profile_name ASC";	
		}
		
		//echo $order;
		$sq="select * from (select SUM(if((pf.fund_via='refunded') && (fc.cash >= 0),fc.cash,0)) refunded_cash,    SUM(if(pf.fund_via='referral',pf.amount,0)) referral_cash,
 abs(SUM(if( fc.cash < 0,if(pf.admin_refunded !=1,fc.cash,0),0))) reinvested_cash,
 SUM(if( pf.admin_refunded =1,pf.transfer_amount,0)) withdrawn_cash ,
 SUM(if( pf.admin_refunded !=1,fc.cash,0)) tot_refund_cash ,u.profile_name,pf.`user_id`
from project_funds pf 
join fundinnovation_cash fc on pf.id = fc.order_id
join user u on pf.`user_id`=u.id
where pf.admin_refunded != 1
GROUP BY pf.`user_id`) t1 where t1.tot_refund_cash >0
		";
		$sql="select * from 
		(select u.profile_name,pf.user_id,SUM(if((pf.fund_via='refunded') && (pf.status != 'error') && (pf.status != 'deleted'),pf.amount,0)) refunded_cash,
		SUM(if((pf.fund_via='referral')  && (pf.status != 'pending' ) && (pf.status != 'error') && (pf.status != 'deleted'),pf.amount,0)) referral_cash,
		 SUM(if((pf.status != 'error') && (pf.status != 'pending') && (pf.status != 'deleted'),pf.fundinnovation_cash,0)) reinvested_cash ,
		 (select SUM(if( (fc.order_id =0) ,fc.cash,0)) withdrawn_cash from fundinnovation_cash fc where fc.user_id  =pf.user_id)withdrawn_cash,
		( select SUM(fc.cash) fund_cash from fundinnovation_cash fc where fc.user_id  =pf.user_id) fund_cash
		 from user u join project_funds pf on u.id=pf.user_id GROUP BY pf.`user_id` )t1 where t1.refunded_cash !=0 or t1.referral_cash !=0
		";/**/
		$sql .=" order by $order limit $startp,$limitp";
		//echo $sq;
		$qry = $this->db->query($sql);
  		$res = $qry->result_array();
		//print_r($res);
		//foreach($res as)
		return $res;
	}
	
	function refund_cash_list_cnt()
	{
		
		$sq="select * from (select SUM(if((pf.fund_via='refunded') && (fc.cash >= 0),fc.cash,0)) refunded_cash,    SUM(if(pf.fund_via='referral',pf.amount,0)) referral_cash,
 abs(SUM(if( fc.cash < 0,if(pf.admin_refunded !=1,fc.cash,0),0))) reinvested_cash,
 SUM(if( pf.admin_refunded =1,pf.transfer_amount,0)) withdrawn_cash ,
 SUM(if( pf.admin_refunded !=1,fc.cash,0)) tot_refund_cash ,u.profile_name,pf.`user_id`
from project_funds pf 
join fundinnovation_cash fc on pf.id = fc.order_id
join user u on pf.`user_id`=u.id
where pf.admin_refunded != 1
GROUP BY pf.`user_id`) t1 where t1.tot_refund_cash >0";
		$sql="select * from 
		(select u.profile_name,pf.user_id,SUM(if((pf.fund_via='refunded') && (pf.status != 'error') && (pf.status != 'deleted'),pf.amount,0)) refunded_cash,
		SUM(if((pf.fund_via='referral') && (pf.status != 'pending' ) && (pf.status != 'error') && (pf.status != 'deleted'),pf.amount,0)) referral_cash,
		 SUM(if((pf.status != 'error') && (pf.status != 'deleted'),pf.fundinnovation_cash,0)) reinvested_cash ,
		 (select SUM(if( (fc.order_id =0) ,fc.cash,0)) withdrawn_cash from fundinnovation_cash fc where fc.user_id  =pf.user_id)withdrawn_cash,
		( select SUM(fc.cash) fund_cash from fundinnovation_cash fc where fc.user_id  =pf.user_id) fund_cash
		 from user u join project_funds pf on u.id=pf.user_id GROUP BY pf.`user_id` )t1 where t1.refunded_cash !=0 or t1.referral_cash !=0
		";/**/
		//$sql .=" order by $order limit $startp,$limitp";
		$qry = $this->db->query($sql); 
  		$res = $qry->result_array();
		return count($res);
	}
	function del_selected_projects(){
		$clists=$this->input->post('pid');
		$clist =explode(",", $clists);
		$count=count($clist);
		$i=0;
		while($count>0)
		{
			$sqlimg = $this->db->query("select project_image,intro_video,video_thumb_image from projects where id ='".$clist[$i]."'");
			if($sqlimg->num_rows()>0)
			{
				$res = $sqlimg->row();
				$projImg = $res->project_image;
				$intro_video = $res->intro_video;
				$video_thumb_image = $res->video_thumb_image;
				if($projImg !='' && $projImg != NULL) {
					$removeImg = $this->unlink_project_images($projImg);
				}
				if($intro_video !='' && $video_thumb_image !=''){
					$removeVideo=$this->unlink_project_video($intro_video,$video_thumb_image);
				}
				$sqlqry=$this->db->query("delete from projects where id ='".$clist[$i]."'");
			}
			//$this->db->where('id',$clist[$i]);
			//$this->db->delete('projects');
			
			$i++;	
			$count--;	
		}
		return "Deleted";
		
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
	
	function delete_project_image($project_id ='',$img='') {
		$baseurl = base_url();
		
		if($project_id =='')
		$project_id=$this->input->post('project_id');
		
		if($img =='')
		$img = $this->input->post('image');
		
		
		$propImg	=  $img;
	
			
			if($project_id !=''){
				
				$sqlqry = $this->db->query("select * from projects where  id =$project_id");
				$res=$sqlqry->result_array();
				
				
				if($sqlqry->num_rows()>0) 
				{
					if($res[0]['project_image'] !='')
					$propImg=$res[0]['project_image'];
					
					$sqldel=$this->db->query("update projects set project_image  ='' where id =$project_id");
					
				}
				
			}
			$this->unlink_project_images($propImg);
			return 1;
			
	}
		
	function delete_project_video($project_id='',$img='',$vid_file='') {
		$baseurl = base_url();
		if($project_id =='')
		$project_id=$this->input->post('project_id');
		if($img =='')
		$img = $this->input->post('image');
		if($vid_file =='')
		$vid_file = $this->input->post('vid_file');
	
			if($project_id !=''){
				
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
	
	//Function To Change Status
	function change_status()
	{
		$clists=$this->input->post('pid');
		$clist =explode(",", $clists);
		$action=$this->input->post('action');
		$count=count($clist);
		//$today		    = date('Y-m-d H:i:s');
		$today = date('Y-m-d');
		$tomorrow = date("Y-m-d H:i:s ", strtotime("Tomorrow 12.01am"));
		//$today_start = $today." 00:00:00";
		//$today_end = $today." 23:59:59";
		//$today_start_time = strtotime($today_start);
		//$today_end_time = strtotime($today_end);
		
		$i=0;
		while($count>0)
		{
			$sqlqry = $this->db->query("select * from projects where  id=".$clist[$i]."");
			$res=$sqlqry->result_array();
				
			if($action =='approved'){
				
			 	$q=$this->db->query("update projects set status='".$action."',project_status='ongoing' ,created_date='".$tomorrow."' where id='".$clist[$i]."'");
			}
			else if($action =='rejected'){
				if($res[0]['status'] != 'approved')
				$q=$this->db->query("update projects set status='".$action."',project_status='' where id='".$clist[$i]."'");
				
			}
			else{
			$q=$this->db->query("update projects set status='".$action."' where id='".$clist[$i]."'");
			}
			$i++;	
			$count--;	
			
		}
		return 'updated';
		
	}
	
	function change_status_fund(){
		$clists=$this->input->post('pid');
		$clist =explode(",", $clists);
		$today			 = date('Y-m-d H:i:s');
		$action=$this->input->post('action');
		$count=count($clist);
		$i=0;
		while($count>0)
		{
		  if($action =='refund_delete'){
			$sql=$this->db->query("select sum(cash) fund_cash from  fundinnovation_cash  where user_id='".$clist[$i]."'");
				$result =$sql->result_array();
				$result[0]['fund_cash'];
				$this->db->set('order_id',0);
				$this->db->set('user_id',$clist[$i]);
				$this->db->set('cash',-$result[0]['fund_cash']);
				$this->db->set('status',1);
				$this->db->set('date',$today);
				$this->db->insert('fundinnovation_cash');
				//$sql3 = "insert into  fundinnovation_cash (order_id,user_id,cash,status,date) values(0,'".$clist[$i]."',-'".$result[0]['fund_cash']."','".$today."')";
				//$qry3 = $this->db->query($sql3);
			}
			 	//$q=$this->db->query("update project_funds set admin_refunded = 1,status ='refunded' where user_id='".$clist[$i]."' and fund_via !='backed'");
				//$sql3 = "insert into  fundinnovation_cash (order_id,user_id,cash,status,date) 
				//select id as order_id,user_id,amount as cash,1,'".$date."' from  project_funds  where fund_via='refunded' and user_id=".$clist[$i]."";
				/*$qry3 = $this->db->query($sql3);*/
			$i++;	
			$count--;	
			
		}
		return 'updated';
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
	
	function get_project_videos($proj_id){
		$this->db->where('project_id',$proj_id);
		$qry=$this->db->get('project_videos');
		$res=$qry->result_array();
		return $res;
	}
	function update_proj_video_title($post){
		$vid_title=$post['vid_caption'];
		//$this->db->set('type',$type);
		//$this->db->set('video_link',$video_path);
		$this->db->set('video_title',$vid_title);
		//$this->db->set('thumb_image',$vidImgfile);
		$this->db->where('id',$post['vid_id']);
		$this->db->set('project_id',$post['project_id']);
		//$this->db->set('created_date',date('Y-m-d H:i:s'));
		$this->db->update('project_videos');
		return 'success';
	}
	function update_proj_image_title($post){
		$img_title =$post['img_caption'];
		$this->db->set('image_title',$img_title);
		$this->db->where('id',$post['img_id']);
		$this->db->set('project_id',$post['project_id']);
		//$this->db->set('created_date',date('Y-m-d H:i:s'));
		$this->db->update('project_images');
		return 'success';
	}
	function get_project_photos($proj_id){
		$this->db->where('project_id',$proj_id);
		$qry=$this->db->get('project_images');
		$res=$qry->result_array();
		return $res;
		
	}
	function get_project_comments($proj_id){
		$this->db->select('project_comments.*,user.profile_name,user.profile_image');
		$this->db->join('user','user.id = project_comments.user_id');
		$this->db->where('project_id',$proj_id);
		$this->db->where('parent_id',0);
	
		$this->db->where('admin_comment','0');
		$qry=$this->db->get('project_comments');
		$res=$qry->result_array();
		//echo $this->db->last_query();
		foreach($res as $k=>$r){
			$child_comments=$this->project_child_comments($proj_id,$r['id']);
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
		$this->db->select('project_comments.*,user.profile_name,user.profile_image');
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
	
	function post_admin_comment($post){
		$today		= date('Y-m-d H:i:s');
		$this->db->set('comment',addslashes($post['comment']));
		$this->db->set('user_id',0);
		$this->db->set('project_id',$post['proj_id']);
		$this->db->set('admin_comment','1');
		$this->db->set('date',$today);
		$this->db->insert('project_comments'); 
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
	
	function get_admin_comments($proj_id){
		//$this->db->select('project_comments.*,user.profile_name,user.profile_image');
		//$this->db->join('user','user.id = project_comments.user_id');
		$this->db->where('project_id',$proj_id);
		$this->db->where('parent_id',0);
		$this->db->where('admin_comment','1');
		$qry=$this->db->get('project_comments');
		$res=$qry->result_array();
		foreach($res as $k=>$r){
			if($r['user_id'] !=0){
			$user_det=$this->user_details($r['user_id']);
			$res[$k]['profile_name']=$user_det[0]['profile_name'];
			$res[$k]['profile_image']=$user_det[0]['profile_image'];
			}
			else{
				$res[$k]['profile_name']='Admin';
				$res[$k]['profile_image']='';
			}
			
		}
		return $res;
	}
	
	function user_details($user_id){
		$this->db->select('profile_name,profile_image');
		$this->db->where('id',$user_id);
		$qry=$this->db->get('user');
		$res=$qry->result_array();
		return $res;
	}
	
	function get_project_updates($proj_id){
		$this->db->where('project_id',$proj_id);
		//$this->db->where('admin_comment','0');
		$qry=$this->db->get('project_updates');
		$res=$qry->result_array();
		return $res;
	}
	
	function update_proj_update($post){
		$today		= date('Y-m-d H:i:s');
		$this->db->set('project_update',addslashes($post['comment'])); 	
		$this->db->set('last_updated_user_id',0);
		$this->db->where('id',$post['comment_id']);
		$this->db->where('project_id',$post['proj_id']);
		$this->db->set('date',$today);
		$this->db->update('project_updates'); 
	//	echo $this->db->last_query();
		echo '1';
	}
	
	function post_admin_update($post){
		$today		= date('Y-m-d H:i:s');
		$this->db->set('project_update',addslashes($post['comment']));
		$this->db->set('last_updated_user_id',0);
		$this->db->set('project_id',$post['proj_id']);
		$this->db->set('date',$today);
		$this->db->insert('project_updates'); 
	//	echo $this->db->last_query();
		echo '1';
	}
	
	function update_update_permission($post){
		$this->db->set('project_update_privilage',$post['privilage']);
		$this->db->where('id',$post['proj_id']);
	//	$this->db->set('date',$today);
		$this->db->update('projects'); 
		
	}
	
	function get_project_update_priv($proj_id){
		$this->db->select('project_update_privilage');
		$this->db->where('id',$proj_id);
		$qry=$this->db->get('projects'); 
		$res=$qry->result_array();
		return $res[0]['project_update_privilage'];
	}
	
	function get_project_backers1($proj_id){
		$this->db->select('project_funds.*,user.profile_name,user.profile_image');
		$this->db->join('user','user.id = project_funds.user_id');
		$this->db->where('project_id',$proj_id);
		$this->db->where('fund_via','backed');
		$this->db->where('project_funds.status','completed');
		$qry=$this->db->get('project_funds');
		$res=$qry->result_array();
		return $res; 
	}
        function get_project_byid($proj_id){
               // $this->db->select('id',$proj_id);
		$this->db->where('id',$proj_id); 
		$query = $this->db->get('projects');
		$res=$query->result_array();
                return $res;
        }
	function get_project_backers($projid){
           // project_status
            $proj_status=  $this->get_project_byid($projid);
            
            if($proj_status[0]['project_status']=='failed'){
                    $sq="select DISTINCT `user_id`  from failed_project_backed_users where project_id=".$projid;
                }
                else
		$sq="select DISTINCT `user_id`  from project_funds where fund_via='backed' and status='completed' and project_id=".$projid." and admin_refunded !=1";
		$qry = $this->db->query($sq); 
		$res = $qry->result_array();
		foreach($res as $k=>$r){
			$res[$k]['backed_proj_cnt']=$this->backed_proj_cnt($r['user_id']);
			$res[$k]['backers_details']=$this->get_user_details($r['user_id']);
			$res[$k]['amount']=$this->project_fund_byprid($r['user_id'],$projid,$proj_status[0]['project_status']);
		}
		return $res;
	 }
	 function project_fund_byprid($uid,$prid,$status=''){
             if($status=='failed'){
                    $sq="select sum(amount) fund_amnt  from failed_project_backed_users where project_id=".$prid." and  user_id=".$uid."";
                }
                else
		 $sq="select sum(amount) fund_amnt  from project_funds where fund_via='backed' and status='completed' and project_id=".$prid." and user_id=".$uid."";
		 $qry = $this->db->query($sq); 
		$res = $qry->result_array();
		//print_r($res );
		return $res[0]['fund_amnt'];
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
	
	function insert_video($type,$video_path,$vidImgfile,$project_id) 
	{		
		$vid_title=$this->input->post('vid_title');
		$this->db->set('type',$type);
		$this->db->set('video_link',$video_path);
		$this->db->set('video_title',$video_title);
		$this->db->set('thumb_image',$vidImgfile);
		$this->db->set('video_title',$vid_title);
		$this->db->set('project_id',$project_id);
		$this->db->set('created_date',date('Y-m-d H:i:s'));
		$this->db->insert('project_videos');
		echo 'Video Successfully Inserted';		
	}
	function add_youtube_video($videoInformation)
	{
			try
			{
				$vid_title=$this->input->post('vid_title');
				$this->db->set('type',$videoInformation['videotype']);
				$this->db->set('video_link',$videoInformation['videourl']);
				$this->db->set('project_id',$videoInformation['project_id']);
				$this->db->set('video_title',$vid_title);
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
				$vid_title=$this->input->post('vid_title');
				$this->db->set('type','2');
				$this->db->set('video_link',$this->input->post('vimeo_url'));
				$this->db->set('project_id',$proj_id);
				$this->db->set('video_external_id',$videoID);
				$this->db->set('video_title',$vid_title);
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
	
	
	 function insert_project_images() {
				
		$created_date   = date('Y-m-d H:i:s');
		$Image1		= $this->input->post('image');
		$proj_id    = $this->input->post('proj_id');
		$img_title    = $this->input->post('img_title');
		$this->db->set('project_id',$proj_id);
		$this->db->set('image_title',$img_title);
		$this->db->set('image',$Image1);
		$this->db->set('date',$created_date);
		$this->db->insert('project_images');
		echo 'Successfully inserted';
		//echo $biulderPlace.' '.$startDate.' '.$endDate.' '.$adImage;	
	}
	
	
}
?>