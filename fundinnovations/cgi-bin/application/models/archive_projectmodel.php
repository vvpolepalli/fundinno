<?php
/***************************************************************************
File Name		: archive_projectmodel.php
Created Date	: 26-12-2012
Author			: Pramod Kumar C. K
****************************************************************************/

class archive_projectmodel extends  CI_Model
{

     protected $EBSCREDENTIALS;
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
	function select_country(){
		$qry = $this->db->query("select * from country order by country ASC");  
  		$res = $qry->result();
		
		//echo "<pre>"; print_r($res); echo "</pre>";
		return $res;
	}
	function select_order_id() {
	  $qry = $this->db->query("select max(order_id) as orderId from project_funds");
	  $res = $qry->result();
		
		//echo "<pre>"; print_r($res); echo "</pre>";
		return $res;
	}
	function auto_suggest(){
		$city_var = $this->input->post('city_var');
		$state = $this->input->post('state_id');
		if($state !=''){
			$con=" and state_id =".$state;
		}else{
		$con="";
		}
		$Qry = "select city_name from cities where city_name  like '%".$city_var."%' $con limit 0,10";
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
	function select_statesByCid($cntry_id){
		if($cntry_id!='') {
			$qry = $this->db->query("select * from states where countryid=$cntry_id order by state ASC");  
			$res = $qry->result();
			return $res;
		} else {
			return NULL;	
		}
	}
	function get_project_det($proj_id){

		if($this->phpsession->get('user_id') != ''){
			//$access =1;
			$access = "1 and if(".$this->phpsession->get('user_id')."= projects.user_id,1,(if(DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration && projects.created_date !='0000-00-00 00:00:00',1,0))) ";
		}
		else{
		$access =" if(projects.access_status ='1',0,1) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration and  projects.status='approved'";
		} 
		//and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration day),CURDATE()) <= projects.fund_duration
		$sql="select projects.*,user.profile_name,user.email_id,
		user.profile_image,if (user.profile_image IS NULL,'',user.profile_image ) profile_image1,user.fb_image,user.in_image,user.fb_link,user.twitter_link,user.websites,
		(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration day),CURDATE()) as remaining_days,
		date(DATE_ADD( projects.created_date, INTERVAL projects.fund_duration-1 day)) as end_date
		from projects 
		join user on user.id=projects.user_id 
		left join cities on cities.city_id=projects.city_id  
		where $access
		and projects.id=".$proj_id;
		$qry = $this->db->query($sql);  
  		$res = $qry->result_array();
		//echo $this->db->last_query(); 
		foreach($res as $r)
		{
			//print_r($r);
			if($r['profile_image1'] !=''){
				
				$res[0]['profile_imgurl'] = base_url().'uploads/site_users/thumb/'.$r['profile_image1'];
			}elseif($r['fb_image'] !=''){
				$res[0]['profile_imgurl'] = $r['fb_image'].'?width=200&height=150';
			}elseif($r['in_image'] !=''){
				$res[0]['profile_imgurl']=$r['in_image'];
			}else{
				$res[0]['profile_imgurl'] = '';
			}
			if($r['fb_link'] !=''){
				$res[0]['fb_tinyurl']=$this->createTinyUrl($r['fb_link']);
			}
			else{
				$res[0]['fb_tinyurl']='';
			}
			if($r['twitter_link'] !=''){
				$res[0]['tw_tinyurl']=$this->createTinyUrl($r['twitter_link']);
			}
			else{
				$res[0]['tw_tinyurl']='';
			}
			if($r['websites'] !=''){
				$web_arr=explode(',',$r['websites']);
				foreach($web_arr as $we){
					$web_tinyarr[]=$this->createTinyUrl($we);
				}
				$res[0]['web_tinyurls']=$web_tinyarr;
				//$res[0]['web_tinyurl']=$this->createTinyUrl($r['twitter_link']);
			}
			else{
				$res[0]['web_tinyurls']='';
			}
			$promo_lnk   = $this->promote_link($this->phpsession->get('user_id'),$r['id']);
			//print($promo_lnk);
			if($promo_lnk != 0){
			$res[0]['promote_link']=base_url().'archive_projects/project_details/'.$r['id'].'/'.$promo_lnk['promote_key'];
			}
			else
			$res[0]['promote_link']='';
			
			$today = date('Y-m-d H:i:s');
			$rwSql="SELECT ro.*,if(ro.delivery_date >= '".$today."',1,0) click_sts,count(rh.reward_id) as taken_cnt FROM `reward_options` ro left join  reward_history rh on ro.`id` =rh.reward_id WHERE ro.`projects_id`=".$proj_id."   group by ro.`id`";
			$rwqry = $this->db->query($rwSql);  
  			$result = $rwqry->result_array();
				
			//$this->db->where('projects_id',$proj_id); 
			//$this->db->where('delivery_date >=',$today); 
			//$this->db->where('projects_id',$r['id']); 
			//$this->db->from('reward_options');
		   //	$q = $this->db->get();
			//$result=$q->result_array();
			
			
			$stared=$this->stared_status($r['id']);
			if(count($stared)>0){
			   $res[0]['stared_status']=1;
			}
			else{
			   $res[0]['stared_status']=0;
			}
				
			if(count($result)>0){
				$res[0]['rewards']=$result;
			}else{
				$res[0]['rewards']=0;
				}
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
				$arr[]=$f['user_id'];
				//$backers_details[]= $this->get_user_details($f['user_id']);
				$tot=$tot+$f['amount']; 
			}
			$arr=array_values(array_unique($arr));
			$backers_details= array_map(array($this,'get_user_details'),$arr);
			$res[0]['backers_cnt']= count($arr);
			$res[0]['pledged_amount']=$tot;
			$res[0]['backers_details']=$backers_details;
			///echo '</pre>';
			
		}
		//echo '<pre>'; print_r($res[0]);echo '</pre>';
		//echo $this->db->last_query(); 
		return $res[0];
	}
	function createTinyUrl($strURL) {
    $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$strURL);
    return $tinyurl;
	}
	function promote_link($userid,$proj_id){
		if($userid !=''){
		$this->db->select('promote_key');
		$this->db->select('user_id');
		$this->db->select('project_id');
		$this->db->from('promote');
		$this->db->where('user_id',$userid); 		
		$this->db->where('project_id',$proj_id); 	
		$query = $this->db->get();
		$rs	   = $query->result_array();
		//echo $this->db->last_query(); 
		if ($query->num_rows() > 0)
		{
			return $rs[0];
		}else{
			return $query->num_rows();
		}
		}else{
			return 0;
		}
		
	}
	function stared_status($proj_id){
		$this->db->where('projects_id',$proj_id);
		$this->db->where('user_id',$this->phpsession->get('user_id'));  
		$this->db->from('starred_projects');
		$q = $this->db->get();
		$result=$q->result_array();
		return $result;
	}
	function check_project_status($proj_id){
		$this->db->select('project_status,user_id');
		$this->db->where('id',$proj_id);
		//$this->db->where('user_id',$this->phpsession->get('user_id'));  
		$this->db->from('projects');
		$q = $this->db->get();
		$result=$q->result_array();
		return $result[0];
	}
	function get_project_updates($proj_id){
		$this->db->where('project_id',$proj_id);
		//$this->db->where('user_id',$this->phpsession->get('user_id'));  
		$this->db->from('project_updates');
		$q = $this->db->get();
		$result=$q->result_array();
		return $result;
		
	}
	function recently_added($where='',$start='',$end=''){
		if($where !=''){
			$where=" and ".$where;
		}
		if($start !='' && $end !=''){
			$limit=" limit $start,$end";
		}
		else{
			$limit="";
		}
		if($this->phpsession->get('user_id') != '')
		$access = "1 and if(DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration && projects.created_date !='0000-00-00 00:00:00',1,0) ";
		else{
		$access =" if(projects.access_status ='1',0,1) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration ";
		}
		//echo $end.' '.$start.' '.$limit;
		$qry = $this->db->query("select 
		projects.*,user.profile_name,user.id as user_id,(SELECT  if(c.parent_id=0,c.category_name,(select c1.`category_name` from category c1 where c1.id=c.parent_id))
FROM `category` c
WHERE c.id=category_id
) category_name,cities.city_name ,
		DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration day),CURDATE()) as remaining_days
		from projects 
		join user on user.id=projects.user_id 
		
		join cities on cities.city_id=projects.city_id  
		where 
		$access
		and projects.status='approved'
		$where
		order by `created_date` DESC $limit");  
	 //echo $this->db->last_query();
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
	function most_funded($where='',$start='',$end=''){
		if($where !=''){
			$where=' and '.$where;
		}
		if($start !='' && $end !=''){
			$limit=" limit $start,$end";
		}
		else{
			$limit="";
			}
		if($this->phpsession->get('user_id') != '')
		$access = "1 and if(DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration && projects.created_date !='0000-00-00 00:00:00',1,0) ";
		else{
		$access =" if(projects.access_status ='1',0,1) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration ";
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
		and find_in_set(projects.id,'".$proj_ids."') and projects.status='approved'
		$where
		group by projects.id $limit");  
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
	function staff_pick($where='',$start='',$end=''){
		if($where !=''){
			$where=' and '.$where;
		}
		if($start !='' && $end !=''){
			$limit=" limit $start,$end";
		}
		else{
			$limit="";
			}
		if($this->phpsession->get('user_id') != '')
		$access = "1 and if(DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration && projects.created_date !='0000-00-00 00:00:00',1,0) ";
		else{
		$access =" if(projects.access_status ='1',0,1) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration ";
		}
		$qry1 = $this->db->query("SELECT group_concat( `staff_pick_project_id` ) as proj_ids FROM category WHERE staff_pick_project_id != ''");
		$result = $qry1->result_array();
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
		$where
		order by `created_date` DESC $limit");  
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
	function succ_projects($where='',$start='',$end=''){
		if($where !=''){
			$where=' and '.$where;
		}
		if($start !='' && $end !=''){
			$limit=" limit $start,$end";
		}
		else{
			$limit="";
		}
		if($this->phpsession->get('user_id') != '')
		$access = "1 and if(DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration && projects.created_date !='0000-00-00 00:00:00',1,0) ";
		else{
		$access =" if(projects.access_status ='1',0,1) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration ";
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
		order by `created_date` DESC $limit");  
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
	function get_projects($where='',$start='',$end=''){ 
		if($where !=''){
			$where=' and '.$where;
		}
		if($start !='' && $end !=''){
			$limit=" limit $start,$end";
		}
		else{
			$limit="";
		}
		if($this->phpsession->get('user_id') != '')
		$access = "1 and if(DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration && projects.created_date !='0000-00-00 00:00:00',1,0) ";
		else{
		$access =" if(projects.access_status ='1',0,1 ) and DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration-1 day),CURDATE()) <= projects.fund_duration ";
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
		and projects.status='approved'
		$where
		order by `created_date` DESC $limit");  
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
	function projects_list(){
		//echo '<pre>'; print_r($_POST);echo '</pre>';
		$startp			= $this->input->post('startp');
		$limitp			= $this->input->post('limitp');
		$cat_lists	 	= $this->input->post('cat_lists');
		$sort_option	= $this->input->post('sort_option');
		$city_lists		= $this->input->post('city_lists');
		$search_param	= $this->input->post('search_param');
		$entry = array();	
		 $i=0;
			if(!empty($cat_lists)){
			// $where .=" projects.category_id in($cat_lists)";
			// $entry[$i] = " projects.category_id in($cat_lists)";
			$entry[$i] = "(projects.category_id in($cat_lists) or (select parent_id from category where id=projects.category_id) in($cat_lists))";
			 $i++;
			}
		
			if(!empty($city_lists)){
			   //$where .=" and projects.city_id in($city_list)";
			  $entry[$i] = " projects.city_id in($city_lists)";
			}
			
			if(!empty($search_param)){
				//echo 'jaja';
			   //$where .=" and projects.city_id in($city_list)";
			  $search_param=addslashes($search_param);
			   $search_arr=explode(' ',$search_param);
			   $search_val=implode(' +',$search_arr);
			  $entry[$i] = "  MATCH(project_title,short_description) AGAINST('(+".$search_val.")' IN BOOLEAN MODE)";
			}
		$where ="";
		$j=0;
		foreach($entry as $data)
		{
			
			if($j==0)
			$where = " ".$data;
			else
			$where .= " and ".$data;
			
			$j++;
		}
			
		
		 
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
		
		switch($sort_option){
			case 'success':
				$result=$this->succ_projects($where,$startp,$limitp);
				break;
			case 'staff_pick':
				$result=$this->staff_pick($where,$startp,$limitp);
				break;
			case 'most_funded':
				$result=$this->most_funded($where,$startp,$limitp);
				break;	
			case 'recent':
				$result=$this->recently_added($where,$startp,$limitp);
				break;
			default:
				$result=$this->get_projects($where,$startp,$limitp);
				break;
		}
		//echo $this->db->last_query();
		//echo '<pre>'; print_r($result);echo '</pre>';
		return $result;
	}
	function projects_list_cnt(){
		//echo '<pre>'; print_r($_POST);echo '</pre>';
		/*$startp			= $this->input->post('startp');
		$limitp			= $this->input->post('limitp');*/
		$cat_lists	 	= $this->input->post('cat_lists');
		//$cat_arr        = explode(',',$cat_lists);
		$sort_option	= $this->input->post('sort_option');
		$city_lists		= $this->input->post('city_lists');
		$search_param	= $this->input->post('search_param');
		$entry = array();	
		 $i=0;
			if(!empty($cat_lists)){
			
			$entry[$i] = "(projects.category_id in($cat_lists) or (select parent_id from category where id=projects.category_id) in($cat_lists))";
			 $i++;
			}
		
			if(!empty($city_lists)){
			   //$where .=" and projects.city_id in($city_list)";
			  $entry[$i] = " projects.city_id in($city_lists)";
			}
			
			if(!empty($search_param)){
				 $search_param=addslashes($search_param);
				$search_arr=explode(' ',$search_param);
			   $search_val=implode(' +',$search_arr);
			   //$where .=" and projects.city_id in($city_list)";
			  $entry[$i] = "  MATCH(project_title,short_description) AGAINST('(+".$search_val.")' IN BOOLEAN MODE)";
			}
		$where ="";
		$j=0;
		 $j=0;
		foreach($entry as $data)
		{
			
			if($j==0)
			$where = " ".$data;
			else
			$where .= " and ".$data;
			
			$j++;
		}
		
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
		
		switch($sort_option){
			case 'success':
				$result=$this->succ_projects($where,'','');
				break;
			case 'staff_pick':
				$result=$this->staff_pick($where,'','');
				break;
			case 'most_funded':
				$result=$this->most_funded($where,'','');
				break;	
			case 'recent':
				$result=$this->recently_added($where,'','');
				break;
			default:
				$result=$this->get_projects($where,'','');
				break;
		}
		$cnt=count($result);
		return $cnt;
	}
	function failed_project_fund_details($projid){ 

		$sq="select * from failed_project_backed_users where project_id=".$projid;
		$qry = $this->db->query($sq); 

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
	
	function get_project_backers($projid){
		$sq="select DISTINCT `user_id`  from project_funds where fund_via='backed' and status='completed' and project_id=".$projid." and admin_refunded !=1";
		$qry = $this->db->query($sq); 
		$res = $qry->result_array();
		foreach($res as $k=>$r){
			$res[$k]['backed_proj_cnt']=$this->backed_proj_cnt($r['user_id']);
			$res[$k]['backers_details']=$this->get_user_details($r['user_id']);
		}
		return $res;
	 }
	function project_det_counts($projid)
	{
		//echo '<pre>';
                $proj_det=  $this->get_project_by_id($projid);
                if($proj_det !=NULL && count($proj_det) >0){
                    if($proj_det['project_image'] == '')
                        $proj_img_cnt=0;
                    else
                        $proj_img_cnt=1;
                    
                }
                $this->db->where('project_id',$projid);
		$qry3=$this->db->get('project_images');
		$res3=$qry3->result_array();
		if($qry3->num_rows()>0)
		$result['images_cnt'] = count($res3)+$proj_img_cnt;
		else
		$result['images_cnt'] = $qry3->num_rows()+$proj_img_cnt;
                
		$sq="select DISTINCT `user_id`  from project_funds where fund_via='backed' and status='completed' and project_id=".$projid;
		$qry = $this->db->query($sq); 
		$res = $qry->result_array();
		if($qry->num_rows()>0)
		$result['backers_cnt'] = count($res);
		else
		$result['backers_cnt'] = $qry->num_rows();
		
		//print_r($res);
		
		$this->db->select('project_comments.id');
		$this->db->join('user','user.id = project_comments.user_id');
		$this->db->where('project_id',$projid);
		$this->db->where('parent_id',0);
		$this->db->where('admin_comment','0');
		$qry1=$this->db->get('project_comments');
		$res1=$qry1->result_array();
		//print_r($res1);
		if($qry1->num_rows()>0)
		$result['comments_cnt'] = count($res1);
		else
		$result['comments_cnt'] = $qry1->num_rows();
		
		//print_r($res1);
		
		$this->db->where('project_id',$projid);
		$qry2=$this->db->get('project_videos');
		$res2=$qry2->result_array();
		//print_r($res2);
		if($qry2->num_rows()>0)
		$result['videos_cnt'] = count($res2);
		else
		$result['videos_cnt'] = $qry2->num_rows();
		
		
		
		$this->db->select('project_comments.id');
		$this->db->join('user','user.id = project_comments.user_id');
		$this->db->where('project_id',$projid);
		$this->db->where('parent_id',0);
		$this->db->where('admin_comment','1');
		$qry1=$this->db->get('project_comments');
		$res1=$qry1->result_array();
		//print_r($res1);
		if($qry1->num_rows()>0)
		$result['admin_comments_cnt'] = count($res1);
		else
		$result['admin_comments_cnt'] = $qry1->num_rows();
		
		//print_r($res3);
		//echo '</pre>';
		return $result;
	}
	function star_project($post){
		$today		= date('Y-m-d H:i:s');
		if($post['type'] =='star' && $post['proj_id']!='')
		{
			$this->db->set('projects_id',$post['proj_id']); 	
			$this->db->set('user_id',$this->phpsession->get('user_id'));
			$this->db->set('date',$today);
			$this->db->insert('starred_projects'); 
			$this->send_follow_notification($post['proj_id']);
			return 'remove_star';
		}
		else if($post['type'] =='remove_star' && $post['proj_id']!='')
		{
			$this->db->where('projects_id',$post['proj_id']); 	
			$this->db->where('user_id',$this->phpsession->get('user_id'));
			$this->db->delete('starred_projects');
			return 'star';
		}
	}
	function send_follow_notification($proj_id){
		$user_id = $this->phpsession->get('user_id');
		$sql     = "select user_id,project_title,id from projects where id=".$proj_id ;
		$qry     = $this->db->query($sql); 
		$res     = $qry->result_array();
		$notifications=$this->get_notifications($res[0]['user_id']);//new_follower 
		if($notifications['new_follower'] ==1){
		$user    = $this->get_user_details($this->phpsession->get('user_id'));
		$owner    = $this->get_user_details($res[0]['id']);
		$project_title = $res[0]['project_title'];
		$project_id = $res[0]['id'];//profile_imgurl//images/prof_no_img.png
		if($user['profile_imgurl'] ==''){
		$user['profile_imgurl'] = base_url().'images/prof_no_img.png';
		}
		$this->emailmodel->send_followed_notify($user,$project_title,$project_id,$owner);
		}
		
	}
	function get_notifications($user_id){
	   $this->db->from('account_notifications');
	   $this->db->where('user_id',$user_id);
	   $Qry=$this->db->get();
	   $res = $Qry->result_array();
	   return $res[0];
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
	
	function get_project_comments($projid){
		$this->db->select('project_comments.*,user.profile_name,user.profile_image,user.fb_image,user.in_image');
		$this->db->join('user','user.id = project_comments.user_id', 'left');
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
		$this->db->join('user','user.id = project_comments.user_id', 'left');
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
	function reply_project_comment($post){
		
		$today		= date('Y-m-d H:i:s');
		$this->db->set('comment',addslashes($post['comment']));
		$this->db->set('user_id',$this->phpsession->get('user_id'));
		$this->db->set('project_id',$post['proj_id']);
		$this->db->set('parent_id',$post['comment_id']); 	
		$this->db->set('admin_comment','0');
		$this->db->set('date',$today);
		$this->db->insert('project_comments'); 
	//	echo $this->db->last_query();
		echo '1';
	}
	
	function post_project_comment($post){
		
		$today		= date('Y-m-d H:i:s');
		if($post['type']=='admin')
		{
			$this->db->set('comment',addslashes($post['comment']));
			$this->db->set('user_id',$this->phpsession->get('user_id'));
			$this->db->set('project_id',$post['proj_id']);
			$this->db->set('admin_comment','1');
			$this->db->set('date',$today);
			$this->db->insert('project_comments'); 
		}else{
			$this->db->set('comment',addslashes($post['comment']));
			$this->db->set('user_id',$this->phpsession->get('user_id'));
			$this->db->set('project_id',$post['proj_id']);
			$this->db->set('admin_comment','0');
			$this->db->set('date',$today);
			$this->db->insert('project_comments'); 
			//$project_det = $this->get_project_by_id($post['proj_id']);
			//$proj_owner     = $this->get_user_details($project_det['user_id']);
			$this->check_to_send_comment_notify($post['proj_id']);
		}
		echo '1';
	}
	
	function get_project_reward($proj_id)
	{
			$today = date('Y-m-d H:i:s');
			$sql=$this->db->query("select * from (SELECT ro.*,count(rh.reward_id) as taken_cnt FROM `reward_options` ro left join  reward_history rh on ro.`id` =rh.reward_id WHERE ro.`projects_id`=".$proj_id." and ro.delivery_date >= '".$today."' group by ro.`id`) t1 where t1.delivery_date >='".$today."' and (t1.taken_cnt < t1.users_limit or t1.users_limit =0)");
			$result =$sql->result_array();
			//$this->db->where('projects_id',$proj_id); 
			//$this->db->where('delivery_date >=',$today); 
			//$this->db->from('reward_options');
			//$q = $this->db->get();
			//$result=$q->result_array();
			return $result;
	}
	function check_to_send_comment_notify($proj_id){
		$sql     = "select  user_id from projects where id=".$proj_id ;
		$qry     = $this->db->query($sql); 
		$res     = $qry->result_array();
		$user    = $this->get_user_details($this->phpsession->get('user_id'));
		$owner	 = $this->get_user_details($res[0]['user_id']);
		
		$notify=$this->get_notifications($res[0]['user_id']);
			if($notify['new_comments'] == 1 && $res[0]['user_id'] != $this->phpsession->get('user_id')){
		   
			$this->emailmodel->send_project_comment_notify($user,$owner,$proj_id);
			}
			
	}
	
	function get_admin_comments($proj_id){
		$this->db->where('project_id',$proj_id);
		$this->db->where('parent_id',0);
		$this->db->where('admin_comment','1');
		$qry=$this->db->get('project_comments');
		$res=$qry->result_array();
		foreach($res as $k=>$r){
			if($r['user_id'] !=0){
			$user_det=$this->get_user_details($r['user_id']);
			$res[$k]['profile_name']	= $user_det['profile_name'];
			$res[$k]['profile_image'] 	= $user_det['profile_image'];
			}
			else{
				$res[$k]['profile_name']='Admin';
				$res[$k]['profile_image']='';
			}
		}
		return $res;
	}
	function get_reward_det($rewad_id){
		$sql=$this->db->query("select * from reward_options where id = $rewad_id");
		if($sql->num_rows()>0)
		{
			$result =$sql->result_array();
			return $result[0];
		} else {
			return NULL;	
		}
	}
	function check_fundinnovation_cash(){
		if($this->phpsession->get('user_id') !=''){
		$user_id=	$this->phpsession->get('user_id');
		$sql2=$this->db->query("select * from(SELECT sum( fc.cash) AS fundinnovation_cash
		FROM fundinnovation_cash fc
		JOIN project_funds pf ON pf.`id` = fc.order_id
		WHERE fc.user_id =$user_id
		AND admin_refunded !=1)t1 where t1.fundinnovation_cash >=0");		

		$sql=$this->db->query("SELECT sum( fc.cash) AS fundinnovation_cash
		FROM fundinnovation_cash fc
		WHERE fc.user_id =$user_id");	
		/*$sql2=$this->db->query("select (t1.refund_cash+referral_cash-reinvested_cash) as fundinnovation_cash
		from
		(select SUM(if((pf.fund_via='refunded') && (fc.cash >= 0),fc.cash,0)) refunded_cash,    SUM(if(pf.fund_via='referral',pf.amount,0)) referral_cash,
 abs(SUM(if( fc.cash < 0,fc.cash,0))) reinvested_cash,
 SUM(if( pf.admin_refunded =1,fc.cash,0)) withdrawn_cash ,
 SUM(if( pf.admin_refunded !=1,fc.cash,0)) tot_refund_cash 
from project_funds pf join fundinnovation_cash fc on pf.id = fc.order_id where pf.user_id  = ".$this->phpsession->get('user_id').")t1");
		$sql=$this->db->query("select (t1.refund_cash-admin_refund_cash) as fundinnovation_cash
		from
		(select sum(if(admin_refunded !=1,fc.cash,0)) as refund_cash,
		sum(if(admin_refunded = 1,pf.amount,0)) admin_refund_cash
		from  fundinnovation_cash fc
		join project_funds pf on pf.`id`=fc.order_id
		where fc.user_id = $user_id)t1");*/
		if($sql->num_rows()>0)
		{
			$result =$sql->result_array();
			return $result[0]['fundinnovation_cash'];
		} else {
			return 0;	
		}
	}else {
			return 0;	
		}
	}
	function insert_order($amount){
		$today			 = date('Y-m-d H:i:s');
		//$orderid		 = $this->phpsession->get('order_id');
		$proj_id		 = $this->phpsession->get('proj_id');
		//$purchaseInfo=$this->phpsession->get('purchaseInfo');
		$userid			 = $this->phpsession->get('userid');
		$pledge_amount	 = $this->phpsession->get('pledge_amount');
		$fundinnovation_cash = $this->phpsession->get('fundinnovation_cash');
		$amount          = $amount;
		$transfer_amount = $amount;
		//$insert_sql="insert into project_funds (order_id,amount,transfer_amount,fundinnovation_cash,project_id,status,user_id,date) values ( select oreder_id from project_funds )";
		$sql=$this->db->query("SELECT order_id FROM `project_funds` where fund_via !='referral' ORDER BY `id` DESC LIMIT 1");
		if($sql->num_rows()>0)
		{
		$result =$sql->result_array();
		$orderid=$result[0]['order_id']+1;
		}else{
			$orderid=10001;
		}
		$this->phpsession->save('order_id',$orderid);
		  $this->db->set('order_id',$orderid);
		  $this->db->set('amount',$pledge_amount);
		  $this->db->set('transfer_amount',$transfer_amount); 
		  $this->db->set('fundinnovation_cash',$fundinnovation_cash); 	 	
		  $this->db->set('project_id',$proj_id);
		  $this->db->set('fund_via','backed');
		  $this->db->set('status','pending');
		  $this->db->set('user_id',$this->phpsession->get('user_id')); 
		  $this->db->set('date',$today);
		  $this->db->insert('project_funds');
		  $order_id = $this->db->insert_id();
		if($order_id !='' && $fundinnovation_cash !=0)
		{
			$this->db->set('order_id',$order_id);
			$this->db->set('user_id',$this->phpsession->get('user_id')); 
			$this->db->set('cash',-$fundinnovation_cash); 	 	
			$this->db->set('status',1);
			$this->db->set('date',$today);
			$this->db->insert('fundinnovation_cash');
		}
		
		  return $order_id;
	}
	function cancel_order($proj_id,$cancel_order_id){
		$sql=$this->db->query("SELECT order_id FROM `project_funds` where status ='pending' and `id`=".$cancel_order_id);
		if($sql->num_rows()>0)
		{
			$this->db->query("delete  FROM `project_funds` where  `id`=".$cancel_order_id." and project_id=".$proj_id."");
			$this->db->query("delete  FROM `fundinnovation_cash` where  `order_id`=".$cancel_order_id);
		}
	}
	function update_order($response)
	{
	
	   // print_r($response);
		//exit;
		  //print_r($_SESSION['promoter_user_id']);
		try
		{
		$today			 = date('Y-m-d H:i:s');
		$orderid		 = $this->phpsession->get('order_id');
		$proj_id		 = $this->phpsession->get('proj_id');
		$tbl_insertedid  = $this->phpsession->get('tbl_insertedid');
		$userid			 = $this->phpsession->get('userid');
	    $ebs_credentials=json_decode($this->EBSCREDENTIALS);
        $WorkingKey="dsja0a31m2t0j6pwnx";		
		if($response['Merchant_Id'] !='')
		$Merchant_Id	 = $response['Merchant_Id'];
		
		if($response['Amount'] !='')
		$Amount	 = $response['Amount'];
		
		if($response['Merchant_Param'] !='')
		$Merchant_Param	 = $response['Merchant_Param'];
		
		if($response['Checksum'] !='')
		$Checksum	 = $response['Checksum'];
		
		if($response['AuthDesc'] !='')
		$AuthDesc	 = $response['AuthDesc'];
		
		if($response['ResponseCode'] !='')
		$responsecode	 = $response['ResponseCode'];
		
		if($response['ResponseCode'] !='')
		$responsecode	 = $response['ResponseCode'];
		
		if($response['ResponseMessage'] !='')
		$responsemessage = $response['ResponseMessage'];
		
		if($response['PaymentID'] !='')
		$paymentid       = $response['PaymentID'];
		
		if($response['Order_Id'] !='')
		$reference_no        = $response['Order_Id'];
		/*
		$amount         = $response['Amount'];
		*/

		$Checksum = $this->verifyChecksum($Merchant_Id, $reference_no , $Amount,$AuthDesc,$Checksum,$WorkingKey);

		$new_return = array();
		$new_return['checksum'] =  $Checksum;
		$new_return['AuthDesc'] =  $AuthDesc;
		
		if($response['BillingName'] !='')
		$billing_name    = $response['BillingName'];
		
		if($response['BillingCity'] !='')
		$billing_city    = $response['BillingCity'];
		
		if($response['BillingState'] !='')
		$billing_state   = $response['BillingState'];
		
		if($response['BillingPostalCode'] !='')
		$billing_postal_code = $response['BillingPostalCode'];
		
		if($response['BillingCountry'] !='')
		$billing_country = $response['BillingCountry'];
		
		if($response['BillingPhone'] !='')
		$billing_phone	 = $response['BillingPhone'];
		
		if($response['BillingEmail'] !='')
		$billing_email	 = $response['BillingEmail'];
		
		if($response['BillingAddress'] !='')
		$billing_address = $response['BillingAddress'];
		
		if($response['IsFlagged'] !='')
		$flagged		 = $response['IsFlagged'];
		
		if($response['TransactionID'] !='')
		$transactionid	 = $response['TransactionID'];
		
		if($response['PaymentMethod'] !='')
		$paymentmethod	 = $response['PaymentMethod'];
		
		if($response['max_no'] !='')
		$maxno			 = $response['max_no'];
		
		$pledge_amount	 = $this->phpsession->get('pledge_amount');
		$fundinnovation_cash = $this->phpsession->get('fundinnovation_cash');
		//echo '<br>';
		$transfer_amount = $amount;

		//if($Checksum=="true" && ($AuthDesc=="Y" || $AuthDesc=="B" )) {
		if($response['ResponseCode'] ==0){
		   
			$status='completed';
		 //   print 'hi'.$reference_no.'hey';
		    if($reference_no !=''){
		    $sql_du=$this->db->query("select order_id,status from project_funds where order_id=".$reference_no);
		    
			  if($sql_du->num_rows()>0) {
		        $resdu =$sql_du->result_array();
		        if($resdu[0]['status'] == 'completed')
		          return -1;
		        else{
		  	     $up='yes'; 
				 if($AuthDesc != "") {
				  if($AuthDesc!="Y" && $AuthDesc!="B" ) {
				    $status='error';
				  }
				}
		        }
		       }
		      else{
			    
		        $up='yes';
				if($AuthDesc != "") {
				  if($AuthDesc!="Y" && $AuthDesc!="B" ) {
				    $status='error';
				  }
				}
		      }
		    }
			else {
			$up='yes';
		    }
		 }
		 else{
			$up='yes';
			$status='error';
		 }
		 

		 if($up=='yes'){
		/*if($response['ResponseCode'] ==0){*/		
		   if( $orderid !=''){
		     $this->db->set('order_id',$orderid);
		     $this->db->set('amount',$pledge_amount);
		     $this->db->set('transfer_amount',$transfer_amount); 
		     $this->db->set('fundinnovation_cash',$fundinnovation_cash); 	 	
		     $this->db->set('project_id',$proj_id);
		     $this->db->set('fund_via','backed');
		     $this->db->set('status',$status);
		     $this->db->set('user_id',$this->phpsession->get('user_id')); 
		  //$this->db->set('date',$today);
		     $this->db->where('id',$tbl_insertedid); 
		     $this->db->update('project_funds');
		     $order_id = $tbl_insertedid;
		  
		     $project_det = $this->get_project_by_id($proj_id);
		
		     $get_referral_per	= $project_det;
		
		     if($this->phpsession->get('reward_selected')){
			   $reward_det = $this->get_reward_det($this->phpsession->get('reward_selected'));
			   $count_reward =  $this->get_reward_cnt($this->phpsession->get('reward_selected'));
			   if($reward_det['delivery_date'] >= $today && ($count_reward < $reward_det['users_limit'] || $reward_det['users_limit'] ==0) ){
			     $this->db->set('order_id',$order_id);	
			     $this->db->set('reward_id',$this->phpsession->get('reward_selected'));
			     $this->db->set('user_id',$this->phpsession->get('user_id')); 
			     $this->db->set('amount',$pledge_amount); 	 	
			     $this->db->set('status',0);
			     $this->db->set('date',$today);
			     $this->db->insert('reward_history');
			   }
		     }
		/*if($order_id !='' && $fundinnovation_cash !=0)
		{
			$this->db->set('order_id',$order_id);
			$this->db->set('user_id',$this->phpsession->get('user_id')); 
			$this->db->set('cash',-$fundinnovation_cash); 	 	
			$this->db->set('status',1);
			$this->db->set('date',$today);
			$this->db->insert('fundinnovation_cash');
		}*/
		if( $order_id !='' && $_SESSION['promoter_user_id'] !='' && $_SESSION['promoter_project_id'] !='')
		{
			$promoter_user_id    = $_SESSION['promoter_user_id']; 	 
			$promoter_project_id = $_SESSION['promoter_project_id'];
			unset($_SESSION['promoter_user_id']);
			unset($_SESSION['promoter_project_id']);
			
			if($promoter_project_id == $proj_id && $promoter_user_id != $this->phpsession->get('user_id') ){
				
				$referrer_percentage = $get_referral_per['referrer_percentage'];
				$ref_amount = $pledge_amount*$referrer_percentage/100;
				if($referrer_percentage>0){
				$this->db->set('amount',$ref_amount);
				$this->db->set('transfer_amount',0); 
				//$this->db->set('fundinnovation_cash',$promote_key); 	 	
				$this->db->set('project_id',$proj_id);
				$this->db->set('fund_via','referral');
				$this->db->set('status','pending');
				$this->db->set('user_id',$promoter_user_id ); 
				$this->db->set('referral_user_id',$this->phpsession->get('user_id'));
				$this->db->set('referral_order_id',	$order_id);
				$this->db->set('date',$today);
				$this->db->insert('project_funds');
				$order_id1=$this->db->insert_id();
				}
				/*if($order_id1)
				{
					$this->db->set('order_id',$order_id1);
					$this->db->set('user_id',$promoter_user_id ); 
					$this->db->set('cash',$ref_amount); 	 	
					$this->db->set('status',1);
					$this->db->set('date',$today);
					$this->db->insert('fundinnovation_cash');
				}*/
			}
		}
		//$post['proj_id'];
		if($order_id){
		  $fund_det=$this->project_fund_details($this->phpsession->get('proj_id'));
		  $tot=0;
		  $arr=array();
		  foreach($fund_det as $f){
			  $arr[]	=	$f['user_id'];
			  $tot		=	$tot+$f['amount']; 
		  }
		  $arr  = array_values(array_unique($arr));
		  //$res[$k]['backers_cnt'] = count($arr);
		    $project_id = $proj_id;
		  $backed_user    = $this->get_user_details($this->phpsession->get('user_id'));
		   if($backed_user['profile_imgurl'] ==''){
			  $backed_user['profile_imgurl'] = base_url().'images/prof_no_img.png';
		  }
		  $proj_owner     = $this->get_user_details($project_det['user_id']);
		  $this->emailmodel->send_funded_notify_owner($proj_owner,$project_title,$project_id,$backed_user);
		   
		 
		  $project_title = $project_det['project_title'];
		  
		   if($Checksum=="true" && $AuthDesc=="Y"){
		    $check_status = 1;
		  }
		  else if($Checksum=="true" && $AuthDesc=="B") {
		    $check_status = 2;
		  }
		  else if($Checksum=="true" && $AuthDesc=="N"){
		    $check_status = 3;
		  }
		  else {
		    $check_status = 4;
		  }	 
		  foreach($arr as $a){
			if($this->phpsession->get('user_id') !=$a){
		      $notify=$this->get_notifications($a);
			    if($notify['others_funded'] == 1){
			      $user     = $this->get_user_details($a);
			      $this->emailmodel->send_funded_notify($user,$project_title,$project_id,$backed_user);
			    }
		      }
		    }
		  }
		 
		  
		  return $check_status;
		}else
		return 0;
		//}
		//else
		//return 0;
		}else
		{
			return 0;
		}
	  }
	  catch(Exception $e)
	  {
		  die($e->getMessage().'<pre>'.$e->getTraceAsString().'</pre>');  
	  }
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
	function get_reward_cnt($id){
	   $sql=$this->db->query("select count(reward_id) as reward_cnt from reward_history where reward_id = $id");
		if($sql->num_rows()>0)
		{
			$result =$sql->result_array();
			return $result[0]['reward_cnt'];
		} else {
			return 0;	
		}
	}
	
	function category_list(){
		/*$sql=$this->db->query("select * from category where status = 1");
		if($sql->num_rows()>0)
		{
			$result =$sql->result_array();
			return $result;
		} else {
			return NULL;	
		}*/
		$this->db->where('parent_id',0);
		$this->db->where('status',1);
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
	function get_backing_terms(){
		$sql=$this->db->query("select * from cms where page_id = 11");
		if($sql->num_rows()>0)
		{
			$result =$sql->result_array();
			return $result[0];
		} else {
			return NULL;	
		}
	}
	function city_list(){
		$sql=$this->db->query("select * from cities where CountryID=113 order by city_name");
		if($sql->num_rows()>0)
		{
			$result =$sql->result_array();
			return $result;
		} else {
			return NULL;	
		}
	}
	
	function verifychecksum($MerchantId,$OrderId,$Amount,$AuthDesc,$CheckSum,$WorkingKey)
  {
	$str = "$MerchantId|$OrderId|$Amount|$AuthDesc|$WorkingKey";
	
	$adler = 1;
	$adler = $this->adler32($adler,$str);
	//print $adler .'=='. $CheckSum;
	if($adler == $CheckSum)
		return "true" ;
	else
		return "false" ;
  }
  function getchecksum($MerchantId,$Amount,$OrderId ,$URL,$WorkingKey)
{
	$str ="$MerchantId|$OrderId|$Amount|$URL|$WorkingKey";
	$adler = 1;
	$adler = $this->adler32($adler,$str);
	return $adler;
}  
  
  function adler32($adler , $str)
   {
	$BASE =  65521 ;

	$s1 = $adler & 0xffff ;
	$s2 = ($adler >> 16) & 0xffff;
	for($i = 0 ; $i < strlen($str) ; $i++)
	{
		$s1 = ($s1 + Ord($str[$i])) % $BASE ;
		$s2 = ($s2 + $s1) % $BASE ;
			//echo "s1 : $s1 <BR> s2 : $s2 <BR>";

	}
	return $this->leftshift($s2 , 16) + $s1;
   }

   function leftshift($str , $num)
    {

	$str = DecBin($str);

	for( $i = 0 ; $i < (64 - strlen($str)) ; $i++)
		$str = "0".$str ;

	for($i = 0 ; $i < $num ; $i++) 
	{
		$str = $str."0";
		$str = substr($str , 1 ) ;
		//echo "str : $str <BR>";
	}
	return $this->cdec($str) ;
    }
	
	
    function cdec($num)
    {
	  for ($n = 0 ; $n < strlen($num) ; $n++)
	    {
	       $temp = $num[$n] ;
	       $dec =  $dec + $temp*pow(2 , strlen($num) - $n - 1);
	    }

	return $dec;
    }
	
	function proj_city_list(){
		$sql=$this->db->query("select city_id,city_name from cities where  city_id in(select group_concat( DISTINCT p.city_id ) from projects p group by city_id ) order by city_name ");
		if($sql->num_rows()>0)
		{
			$result =$sql->result_array();
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
	function save_promote_key($promote_key,$proj_id)
	{
		$this->db->select('user_id');
		$this->db->select('project_id');
        $this->db->from('project_funds');
		$this->db->where('user_id',$this->phpsession->get('user_id'));
		$this->db->where('project_id',$proj_id); 			
        $query1 = $this->db->get();	
		if ($query1->num_rows() > 0)
		{
		$this->db->select('user_id');
		$this->db->select('project_id');
        $this->db->from('promote');
		$this->db->where('user_id',$this->phpsession->get('user_id'));
		$this->db->where('project_id',$proj_id); 			
        $query = $this->db->get();	
		//echo $this->db->last_query();
		if ($query->num_rows() > 0)
		{
			return 'duplicate';
		}
		else{
			$this->db->select('user_id');
			$this->db->select('project_id');
			$this->db->from('promote');
			$this->db->where('promote_key',$promote_key); 			
			$query2 = $this->db->get();
			if($query2->num_rows() > 0)
			{
				return 'key duplicate';
			}
			else{
				//echo 'e';
				$today		= date('Y-m-d H:i:s');
				$this->db->set('promote_key',$promote_key);
				$this->db->set('project_id',$proj_id);
				$this->db->set('user_id',$this->phpsession->get('user_id')); 
				$this->db->set('date',$today);
				$this->db->insert('promote');
				return 'inserted';
				//return $this->db->insert_id(); 
			}
		}
		}else{
		  return 'not funded';
		}
		
	}
	
	function send_mail($post){
		$to_emailids	 = $post['to_emailids'];
		$subject = $post['subject'];
		$to_emailidsArr= explode(',',$to_emailids);
		$attach_lnk=$this->createTinyUrl($post['attach_lnk']);
		$proj_id  = $post['proj_id'];
		$baseurl=base_url();
		$proj_details=$this->get_project_by_id($proj_id);
		$desc=stripslashes($proj_details['short_description']);
		$message = nl2br($post['message_cntnt']).'</br><div><a href="'.$attach_lnk.'">'.$attach_lnk.'</a></div><p><table width="535" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
				  <td width="210"><a href="'.$attach_lnk.'"><img  width="200" src="'.$baseurl.'uploads/projects/images/200x150/'.$proj_details['project_image'].'"/></a></td><td  valign="top"><a style="color:#000000" href="'.$attach_lnk.'">'.$proj_details['project_title'].'</a><p>'.$desc.'</p></td>
				  </tr>
				 
				 </table></p>';
		foreach($to_emailidsArr as $to){
		$this->emailmodel->send_mail(trim($to),$subject,$message,$this->phpsession->get('profile_name'),$this->phpsession->get('email_id'),$proj_details['project_title']);
		}
		
		return 'success'; 
	}
	function conatct_creator($post){
		$to		 = $post['to_emailid'];
		$subject = $post['subject'];
		//$contact_no = $post['contact_no'];
		$message = $post['message_cntnt'];
		$this->emailmodel->send_mail_to_creator($to,$subject,$message,$this->phpsession->get('profile_name'),$this->phpsession->get('email_id'));
		
		return 'success'; 
	}
}
?>