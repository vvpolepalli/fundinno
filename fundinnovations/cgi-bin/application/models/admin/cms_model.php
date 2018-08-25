<?php
class Cms_model extends  CI_Model {
 function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library(array('phpsession','mysmarty'));		
    }		
	
 function listPages()
	{		
	   $query=$this->db->query("select *,date_format(date(updated_date_time),'%M %d, %Y') as date from cms");	 
	   $listResult=$query->result();
	   return $listResult;
		
	}	 
	
 function listPage($id)
	{
	   $this->db->select('*');
	   $this->db->from('cms');
	   $this->db->where('page_id', $id); 
	   $Qry=$this->db->get();
	   $listResult=$Qry->result();
	   return $listResult;		
	}	
	function get_project_detas($id){
		
		$sql=$this->db->query("select * from projects where id = $id");
		if($sql->num_rows()>0)
		{
			$result =$sql->result_array();
			return $result[0];
		} else {
			return NULL;	
		}
	
	}
   function updatePage($_POST,$id)
	{			
		
		$Content			=	str_replace("'","\'",$_POST['content']);
		//$Content			=	$_POST['content'];
		if(trim($Content)!='')
		{				
		$Pagename			=	$_POST['pagename'];	
		$PageTitle			=	$_POST['pagetitle'];			
		$MetaKeyword		=	$_POST['metaKeyword'];
		$MetaDescription	=	$_POST['metaDescription'];		
		$datetime=date('Y-m-d H:i:s');	
		//echo "UPDATE cms SET page_title='".$PageTitle."',page_name ='".$Pagename."',page_content='".$Content."',meta_keywords='".$MetaKeyword."',meta_description ='".$MetaDescription."',updated_date_time ='".$datetime."' WHERE page_id 	='".$id."'"; exit;	 
		$Qry=$this->db->query("UPDATE cms SET page_title='".$PageTitle."',page_name ='".$Pagename."',page_content='".$Content."',meta_keywords='".$MetaKeyword."',meta_description ='".$MetaDescription."',updated_date_time ='".$datetime."' WHERE page_id 	='".$id."'");			
						
		}	
	}
	
	// ################## News letter starts here ##################################//
	// Noufal Added on 20-07-2012	
	function add_news_letter($_POST) {
		$newsContent		=	str_replace("'","\'",$_POST['news_content']);
		if(trim($newsContent)!='')
		{				
			$newsTitle		= $_POST['news_title'];	
			$newsSubject	= $_POST['news_subject'];			
			$datetime		= date('Y-m-d H:i:s');
			
			$this->db->set('news_title',$newsTitle);
			$this->db->set('subject',$newsSubject);	
			$this->db->set('news_content',$newsContent);	
			$this->db->set('news_added',$datetime);	
			$this->db->insert('news_letter');	
			
		}
	}
	
	
	function all_news_letters() {
		$startp		= $this->input->post('startp');
		$limitp		= $this->input->post('limitp');
		$orderBy 	= $this->input->post('order_by');
		
		$start_on = $this->input->post('start_on');
		$end_on = $this->input->post('end_on');
		$newsletter_name = $this->input->post('newsletter_name');
		
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
		
		if($orderBy=='ASC_TITLE') {
			$order = " news_title ASC";	
		}
		else if($orderBy=='DESC_TITLE') {
			$order = " news_title DESC";	
		}
		else {
			$order = " news_id DESC";
		}
		
		$entry = array();	
		$i=0;
		
		/*if(!empty($prCity))
		{
			$entry[$i] = "P.city = '".$prCity."'";
			$i++;
		}*/
		
		if(!empty($newsletter_name))
		{
			$entry[$i] = "news_title like '%".$newsletter_name."%' or subject like '%".$newsletter_name."%' ";
			$i++;
		}
		if(!empty($start_on) && !empty($end_on))
		{
			$sdate	=	date('Y-m-d', strtotime($start_on));
			$edate	=	date('Y-m-d', strtotime($end_on));
			$entry[$i]	=	"DATE_FORMAT(news_added,'%Y-%m-%d') BETWEEN '".$sdate."' AND '".$edate."'";
			$i++;
		}
		else if(!empty($start_on) && empty($end_on)) {
			$sdate	=	date('Y-m-d', strtotime($start_on));
			$entry[$i]	=	"DATE_FORMAT(news_added,'%Y-%m-%d') >= '".$sdate."'";
			$i++;
		}
		else if(empty($start_on) && !empty($end_on)) {
			$edate	=	date('Y-m-d', strtotime($end_on));
			$entry[$i]	=	"DATE_FORMAT(news_added,'%Y-%m-%d') <= '".$edate."'";
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
		
		$qry = $this->db->query("select * from news_letter ".$sqlentry." limit $startp,$limitp"); 
		//echo $this->db->last_query(); 
		if($qry->num_rows()>0)
		{
			$result = $qry->result();
			
			return $result;
		}
		if($qry->num_rows()<1) {
			if($startp != 0 && $startp>0)
			{
				
				$delstartp = $startp-2;
			} else {
				$delstartp = 0;
			}
				$sqldel = "select * from news_letter ".$sqlentry." limit $startp,$limitp";
				
				$querydel = $this->db->query($sqldel);
				$resultdel = $querydel->result();
				return $resultdel;
		}
		
	}
	
	function all_news_letters_Count()
	{
		
		$start_on = $this->input->post('start_on');
		$end_on = $this->input->post('end_on');
		$newsletter_name = $this->input->post('newsletter_name');
		$entry = array();	
		$i=0;
		if(!empty($newsletter_name))
		{
			$entry[$i] = "news_title like '%".$newsletter_name."%' or subject like '%".$newsletter_name."%' ";
			$i++;
		}
		if(!empty($start_on) && !empty($end_on))
		{
			$sdate	=	date('Y-m-d', strtotime($start_on));
			$edate	=	date('Y-m-d', strtotime($end_on));
			$entry[$i]	=	"DATE_FORMAT(news_added,'%Y-%m-%d') BETWEEN '".$sdate."' AND '".$edate."'";
			$i++;
		}
		else if(!empty($start_on) && empty($end_on)) {
			$sdate	=	date('Y-m-d', strtotime($start_on));
			$entry[$i]	=	"DATE_FORMAT(news_added,'%Y-%m-%d') >= '".$sdate."'";
			$i++;
		}
		else if(empty($start_on) && !empty($end_on)) {
			$edate	=	date('Y-m-d', strtotime($end_on));
			$entry[$i]	=	"DATE_FORMAT(news_added,'%Y-%m-%d') <= '".$edate."'";
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
		
		$sql = "select count(*) as count from news_letter ".$sqlentry; 
		$query = $this->db->query($sql);
		$qryres = $query->row();
		return $qryres->count;
	}
	
	function delete_news_letter($id) {
		$sqlqry	= $this->db->query("delete from news_letter where news_id ='".$id."'");
		$delhistory	= $this->db->query("delete from news_letter_hystory where news_id ='".$id."'");
		return 'Deleted';
	}
	
	function get_newsletter_details($id) {
		$sql = "select * from news_letter where news_id ='".$id."'"; 
		$query = $this->db->query($sql);
		$qryres = $query->result();
		return $qryres;
	}
	
	function update_news_letter() {
		$newsContent	= str_replace("'","\'",$this->input->post('news_content'));
		$newsId			= $this->input->post('news_id');
		if(trim($newsContent)!='' && $newsId!='')
		{				
			$newsTitle		= $this->input->post('news_title');
			$newsSubject	= $this->input->post('news_subject');		
			//$datetime		= date('Y-m-d H:i:s');
			
			$this->db->set('news_title',$newsTitle);
			$this->db->set('subject',$newsSubject);	
			$this->db->set('news_content',$newsContent);	
			$this->db->where('news_id',$newsId);
			$this->db->update('news_letter');	
			return 'Updated';
			
		}
	}
	
	function select_news_letters()
	{
		$sql = "select * from news_letter order by news_id desc"; 
		$query = $this->db->query($sql);
		$qryres = $query->result();
		return $qryres;
	}
	function select_projects()
	{
		$sql = "select * from projects where DATEDIFF(DATE_ADD( date(projects.created_date), INTERVAL projects.fund_duration day),CURDATE()) <= projects.fund_duration and project_status='ongoing' order by id desc"; 
		$query = $this->db->query($sql);
		$qryres = $query->result();
		return $qryres;
	}
	
	function get_all_sent_newsletter($id){
		$sql = "select * from news_letter_hystory where news_id ='$id' order by id desc "; 
		$query = $this->db->query($sql);
		$result = $query->result();
		foreach($result as $key => $res) {
			$send_to	='All Members';	
			/*if($res->sent_to=='all') {
				$send_to	='All Members';	
			} else if($res->sent_to=='4') {
				$send_to	='Individuals';
			} else if($res->sent_to=='5') {
				$send_to	='Agents / Brokers';
			} else if($res->sent_to=='6') {
				$send_to	='Builders / Developers';
			} else if($res->sent_to=='7') {
				$send_to	='Guest Members';
			}*/
			/*if($res->send_status=='all') {
				$u_status	='All';	
			} else if($res->send_status=='1') {
				$u_status	='Active';
			} else if($res->send_status=='0') {
				$u_status	='Inactive';
			} else if($res->send_status=='2') {
				$u_status	='Blocked';
			} else {
				$u_status	='';	
			}*/
			$result[$key]->sent_to		= $send_to;
			//$result[$key]->send_status	= $u_status;
		}
		return $result;
	}
	
	function delete_newsletter_history($id) {
		$sqlqry=$this->db->query("delete from news_letter_hystory where id ='".$id."'");
		return 'Deleted';
	}
	// Noufal Added on 20-07-2012
	// ################## News letter starts ends ##################################//
	
	
	// ################## poidata address starts  // Noufal Added on 10-09-2012 // ##################################//
	function select_city_Id($city='') {
		$qry = $this->db->query("select city_id from cities where city_name='".$city."'");
		$res = $qry->row();//print_r($res->city_name);
		return $res->city_id; 
	}
	
	function select_city_Name($city='') {
		$qry = $this->db->query("select city_name from cities where city_id='".$city."'");
		$res = $qry->row();//print_r($res->city_name);
		return $res->city_name; 
	}
	
	function list_poidata_address() {
		$baseurl = base_url();
		$startp		= $this->input->post('startp');
		$limitp		= $this->input->post('limitp');
		$orderBy 	= $this->input->post('order_by');
		$prCity		= $this->input->post('pr_city');
		
		$today = date('Y-m-d');
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
		
		if($orderBy=='ASC_AD') {
			$order = " P.address ASC";	
		}
		else if($orderBy=='DESC_AD'){
			$order = " P.address DESC";	
		}
		else if($orderBy=='ASC_CT'){
			$order = " CT.category_name ASC";	
		}
		else if($orderBy=='DESC_CT'){
			$order = " CT.category_name DESC";	
		}
		else if($orderBy=='ASC_SC'){
			$order = " SC.subcategory_name ASC";	
		}
		else if($orderBy=='DESC_SC'){
			$order = " SC.subcategory_name DESC";	
		}
		else if($orderBy=='ASC_ST'){
			$order = " P.street ASC";	
		}
		else if($orderBy=='DESC_ST'){
			$order = " P.street DESC";	
		}
		else if($orderBy=='ASC_LT'){
			$order = " P.locality ASC";	
		}
		else if($orderBy=='DESC_LT'){
			$order = " P.locality DESC";	
		}
		else if($orderBy=='ASC_PIN'){
			$order = " P.pin_code ASC";	
		}
		else if($orderBy=='DESC_PIN'){
			$order = " P.pin_code DESC";	
		}
		else {
			$order = " P.address ASC";
		}
		
		
		$entry = array();	
		$i=0;
		if(!empty($prCity))
		{
			$entry[$i] = "P.city_id = '".$prCity."'";
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
		$qry = $this->db->query("select P.*, C.city_name, CT.category_name, SC.subcategory_name from `poi_address_data` P JOIN `cities` C ON P.city_id = C.city_id LEFT JOIN poi_main_cat CT ON P.cate_id = CT.cat_id LEFT JOIN poi_sub_cat SC ON P.sub_cat_poi_id = SC.poi_num ".$sqlentry." limit $startp,$limitp");
		
		if($qry->num_rows()>0)
		{
			$result = $qry->result();
			//echo '<pre>'; print_r($result);
			return $result;
		}
		if($qry->num_rows()<1) {
			if($startp != 0 && $startp>0)
			{
				$delstartp = $startp-$limitp;
			} else {
				$delstartp = 0;
			}
			$sqldel = "select P.*, C.city_name, CT.category_name, SC.subcategory_name from `poi_address_data` P JOIN `cities` C ON P.city_id = C.city_id LEFT JOIN poi_main_cat CT ON P.cate_id = CT.cat_id LEFT JOIN poi_sub_cat SC ON P.sub_cat_poi_id = SC.poi_num ".$sqlentry." limit $delstartp,$limitp"; 
			
			$querydel = $this->db->query($sqldel);
			$resultdel = $querydel->result();
			return $resultdel;
		}
	}
	
	function poidata_Count()
	{
		$prCity		= $this->input->post('pr_city');
		
		$today = date('Y-m-d');
		
		$entry = array();	
		$i=0;
		if(!empty($prCity))
		{
			$entry[$i] = "P.city_id = '".$prCity."'";
			$i++;
		}
		
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
		
		$sql = "select count(address_id) as count from poi_address_data P JOIN `cities` C ON P.city_id = C.city_id LEFT JOIN poi_main_cat CT ON P.cate_id = CT.cat_id LEFT JOIN poi_sub_cat SC ON P.sub_cat_poi_id = SC.poi_num ".$sqlentry;
		//echo $sql;
		$query = $this->db->query($sql);
		$qryres = $query->row();
		return $qryres->count;
	}
	
	function delete_poidata_address($id) {
		$sqlqry=$this->db->query("delete from poi_address_data where address_id ='".$id."'");
		return 'Deleted';
	}
	
	function del_selected_poidata_address()
	{
		$clists	= $this->input->post('adid');
		$clist 	= explode(",", $clists);
		$count	= count($clist);
		$i=0;
		while($count>0)
		{
			$this->db->where('address_id',$clist[$i]);
			$this->db->delete('poi_address_data');
			
			$i++;	
			$count--;	
		}
		return "Deleted";
	}
	
	function get_poidata_details($id) {
		$sql = "select P.*, C.city_name, CT.category_name, SC.subcategory_name from `poi_address_data` P JOIN `cities` C ON P.city_id = C.city_id LEFT JOIN poi_main_cat CT ON P.cate_id = CT.cat_id LEFT JOIN poi_sub_cat SC ON P.sub_cat_poi_id = SC.poi_num where P.address_id=$id";
		$query = $this->db->query($sql);
		$qryres = $query->result();
		//echo "<pre>"; print_r($qryres);
		return $qryres;
		
	}
	
	function select_all_poi_categories() {
		$qry 	= $this->db->query("select * from poi_main_cat order by category_name asc");
		$res	= $qry->result();
		return $res;	
	}
	
	function select_all_poi_subcategories() {
		$qry 	= $this->db->query("select * from poi_sub_cat order by subcategory_name asc");
		$res	= $qry->result();
		return $res;	
	}
	
	function update_poidata_address() {
		$addId 		= $this->input->post('ad_id');
		$addr 		= $this->input->post('name');
		$street 	= $this->input->post('street');
		$locality	= $this->input->post('locality');
		$cityId 	= $this->input->post('city');
		
		$cityName 	= $this->select_city_Name($cityId);
		$address	= $addr.','.$street.','.$locality.','.$cityName;
		
		$cities=$lat_long=$this->commonmodel->get_latlont_place_m($address);
		$lat = $cities['latitude'];
		$long = $cities['longitude'];
		
		if($lat !='' && $long != '') {
			$this->db->set('cate_id',$this->input->post('catid'));
			$this->db->set('sub_cat_poi_id',$this->input->post('subcatid'));
			$this->db->set('address',$addr);
			$this->db->set('street',$street);
			$this->db->set('locality',$locality);
			$this->db->set('longitude',$long);
			$this->db->set('latitude',$lat);
			$this->db->set('pin_code',$this->input->post('pincode'));
			$this->db->set('city_id',$cityId);
			$this->db->where('address_id',$addId);
			$this->db->update('poi_address_data');
			return 1; 
		} else {
			return 0;	
		}
	}
	// Noufal Added on 11-09-2012
	// ################## poidata address ends ##################################//
	
	// ################## Manage Guides starts  // Noufal Added on 12-09-2012 //  ##################################//
	function insert_guides() {
		//print_r($_POST); exit;
		$title	= $this->input->post('guide_title');
		$cat_id	= $this->input->post('cat_id');
		$Content= str_replace("'","\'",$_POST['content']);
		$today	= date('Y-m-d H:i:s');
		if($title!='' && $Content!='' ) {
			$this->db->set('guide_title',addslashes($title));
			$this->db->set('cat_id',$cat_id);
			$this->db->set('guide_description',$Content);
			$this->db->set('guide_created',$today);
			$this->db->insert('guides');
			return 1;
		} else {
			return 0;	
		}
		
	}
	
	function list_guide_list() {
		//print_r($_POST);
		$baseurl = base_url();
		$orderBy 	= $this->input->post('order_by');
		$gTitle		= $this->input->post('g_title');
		$cat_id		= $this->input->post('cat_id');
		
		if($orderBy=='ASC_TL') {
			$order = " guide_title ASC";	
		}
		else if($orderBy=='DESC_TL'){
			$order = " guide_title DESC";	
		}
		else if($orderBy=='ASC_DT'){
			$order = " guide_created ASC";	
		}
		else if($orderBy=='DESC_DT'){
			$order = " guide_created DESC";	
		}
		else {
			$order = " guide_created DESC";
		}
		
		
		$entry = array();	
		$i=0;
		if(!empty($gTitle))
		{
			$entry[$i] = "guide_title like '%".$gTitle."%%'";
			$i++;
		}
		
		$entry[$i] = "cat_id='".$cat_id."'";
		
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
		//echo "select * from guides ".$sqlentry;
		$qry = $this->db->query("select * from guides ".$sqlentry);
		
		if($qry->num_rows()>0)
		{
			$result = $qry->result();
			return $result;
		} else {
			return NULL;	
		}
		
	}
	
	function list_main_guide_list() {
		$baseurl = base_url();
		$orderBy 	= $this->input->post('order_by');
		$gTitle		= $this->input->post('g_title');
		
		/*if($orderBy=='ASC_TL') {
			$order = " a.guide_title ASC";	
		}
		else if($orderBy=='DESC_TL'){
			$order = " a.guide_title DESC";	
		}
		else if($orderBy=='ASC_DT'){
			$order = " a.guide_created ASC";	
		}
		else if($orderBy=='DESC_DT'){
			$order = " a.guide_created DESC";	
		}
		else {
			$order = " a.guide_created DESC";
		}
		
		
		$entry = array();	
		$i=0;
		if(!empty($gTitle))
		{
			$entry[$i] = "a.guide_title like '%".$gTitle."%%'";
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
		}*/
		$sqlentry .=" GROUP BY a.cat_id order by guide_category_name";
		
		$qry = $this->db->query("select a.*,COUNT(b.cat_id) AS 'postCount' from guides_category a LEFT JOIN guides b ON a.cat_id = b.cat_id
".$sqlentry."");
		
		if($qry->num_rows()>0)
		{
			$result = $qry->result();
			return $result;
		} else {
			return NULL;	
		}
		
	}
	
	function fetch_category_list($cat_id)
	{
		$this->db->select('*');
		$this->db->from('guides_category');
		$this->db->where('status','0');
		$this->db->where('cat_id',$cat_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			 $res = $query->row_array();
			return $res['guide_category_name'];
		} else {
			return NULL;
		}
	}
	
	function delete_guide_list($id) {
		$sqlqry=$this->db->query("delete from guides where g_id ='".$id."'");
		return 'Deleted';	
	}
	
	function del_selected_guide_list() {
		$clists	= $this->input->post('gid');
		$clist 	= explode(",", $clists);
		$count	= count($clist);
		$i=0;
		while($count>0)
		{
			$this->db->where('g_id',$clist[$i]);
			$this->db->delete('guides');
			
			$i++;	
			$count--;	
		}
		return "Deleted";
	}
	
	function get_guide_details($id) {
		$qry = $this->db->query("select * from guides where g_id ='".$id."'");
		$res = $qry->result();
		return $res;	
	}
	
	function get_guide_category($id){
		$qry = $this->db->query("select * from guides_category where cat_id ='".$id."'");
		$res = $qry->result();
		return $res;	
	}
	function upd_guide_category($id){
		$guide_category_name	= $this->input->post('guide_category_name');
			
			$this->db->set('guide_category_name',addslashes($guide_category_name));
			$this->db->where('cat_id',$id);
			$this->db->update('guides_category');
			return 1;
	}
	function add_guide_category(){
		$guide_category_name	= $this->input->post('guide_category_name');
		$today	= date('Y-m-d H:i:s');
		$this->db->set('guide_category_name',addslashes($guide_category_name));
		$this->db->set('added_date',$today);
		$this->db->insert('guides_category');
		return 1;
		
	}
	
	function update_guide_list() {
		
		$cat_id	= $this->input->post('cat_id');
		$title	= $this->input->post('g_title');
		$Content= str_replace("'","\'",$this->input->post('g_content'));
		$hgid 	= $this->input->post('hg_id');
		//$today	= date('Y-m-d H:i:s');
		if($title!='' && $Content!='' && $hgid!='') {
			$this->db->set('guide_title',addslashes($title));
			$this->db->set('cat_id',$cat_id);
			$this->db->set('guide_description',$Content);
			$this->db->where('g_id',$hgid);
			$this->db->update('guides');
			return 1;
		} else {
			return 0;	
		}
	}
	
	
	###### proximitypad starts here // added on 14-09-2012  // Noufal #####
	
	function insert_proximity_data_csv($addr,$subcat_poi_id,$pincode,$catname,$lat,$long,$street,$locality,$city_id){
		 $query = "SELECT cat_id FROM poi_main_cat WHERE category_name='".$catname."' group by cat_id";	
			$resultq=$this->db->query($query); 
			$result=$resultq->result_array();
			if (count($result) > 0) 
			{ 
				$this->db->set('cate_id',$result[0]['cat_id']);
				$this->db->set('sub_cat_poi_id',$subcat_poi_id);
				$this->db->set('address',addslashes($addr));
				$this->db->set('street',addslashes($street));
				$this->db->set('locality',addslashes($locality));
				$this->db->set('longitude',$long);
				$this->db->set('latitude',$lat);
				$this->db->set('pin_code',$pincode);
				$this->db->set('city_id',$city_id);
				$this->db->insert('proximitypad_data');
			
			}
	}
	
	function list_proximitypad_address() {
		$baseurl = base_url();
		$startp		= $this->input->post('startp');
		$limitp		= $this->input->post('limitp');
		$orderBy 	= $this->input->post('order_by');
		$prCity		= $this->input->post('pr_city');
		
		$today = date('Y-m-d');
		if($startp<0) {
			$startp =0;	
		} 
		else {
			$startp =$startp;	
		}
		
		if($orderBy=='ASC_AD') {
			$order = " P.address ASC";	
		}
		else if($orderBy=='DESC_AD'){
			$order = " P.address DESC";	
		}
		else if($orderBy=='ASC_CT'){
			$order = " CT.category_name ASC";	
		}
		else if($orderBy=='DESC_CT'){
			$order = " CT.category_name DESC";	
		}
		else if($orderBy=='ASC_SC'){
			$order = " SC.subcategory_name ASC";	
		}
		else if($orderBy=='DESC_SC'){
			$order = " SC.subcategory_name DESC";	
		}
		else if($orderBy=='ASC_ST'){
			$order = " P.street ASC";	
		}
		else if($orderBy=='DESC_ST'){
			$order = " P.street DESC";	
		}
		else if($orderBy=='ASC_LT'){
			$order = " P.locality ASC";	
		}
		else if($orderBy=='DESC_LT'){
			$order = " P.locality DESC";	
		}
		else if($orderBy=='ASC_PIN'){
			$order = " P.pin_code ASC";	
		}
		else if($orderBy=='DESC_PIN'){
			$order = " P.pin_code DESC";	
		}
		else {
			$order = " P.address ASC";
		}
		
		
		$entry = array();	
		$i=0;
		if(!empty($prCity))
		{
			$entry[$i] = "P.city_id = '".$prCity."'";
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
		$qry = $this->db->query("select P.*, C.city_name, CT.category_name, SC.subcategory_name from proximitypad_data P JOIN `cities` C ON P.city_id = C.city_id LEFT JOIN poi_main_cat CT ON P.cate_id = CT.cat_id LEFT JOIN poi_sub_cat SC ON P.sub_cat_poi_id = SC.poi_num ".$sqlentry." limit $startp,$limitp");
		
		if($qry->num_rows()>0)
		{
			$result = $qry->result();
			//echo '<pre>'; print_r($result);
			return $result;
		}
		if($qry->num_rows()<1) {
			if($startp != 0 && $startp>0)
			{
				$delstartp = $startp-$limitp;
			} else {
				$delstartp = 0;
			}
			$sqldel = "select P.*, C.city_name, CT.category_name, SC.subcategory_name from proximitypad_data P JOIN `cities` C ON P.city_id = C.city_id LEFT JOIN poi_main_cat CT ON P.cate_id = CT.cat_id LEFT JOIN poi_sub_cat SC ON P.sub_cat_poi_id = SC.poi_num ".$sqlentry." limit $delstartp,$limitp"; 
			
			$querydel = $this->db->query($sqldel);
			$resultdel = $querydel->result();
			return $resultdel;
		}
	}
	
	function proximitypad_Count()
	{
		$prCity		= $this->input->post('pr_city');
		
		$today = date('Y-m-d');
		
		$entry = array();	
		$i=0;
		if(!empty($prCity))
		{
			$entry[$i] = "P.city_id = '".$prCity."'";
			$i++;
		}
		
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
		
		$sql = "select count(address_id) as count from proximitypad_data P JOIN `cities` C ON P.city_id = C.city_id LEFT JOIN poi_main_cat CT ON P.cate_id = CT.cat_id LEFT JOIN poi_sub_cat SC ON P.sub_cat_poi_id = SC.poi_num ".$sqlentry;
		//echo $sql;
		$query = $this->db->query($sql);
		$qryres = $query->row();
		return $qryres->count;
	}
	
	function delete_proximitypad_address($id) {
		$sqlqry=$this->db->query("delete from proximitypad_data where address_id ='".$id."'");
		return 'Deleted';
	}
	
	function del_selected_proximitypad_address()
	{
		$clists	= $this->input->post('adid');
		$clist 	= explode(",", $clists);
		$count	= count($clist);
		$i=0;
		while($count>0)
		{
			$this->db->where('address_id',$clist[$i]);
			$this->db->delete('proximitypad_data');
			
			$i++;	
			$count--;	
		}
		return "Deleted";
	}
	
	function get_proximitypad_details($id) {
		$sql = "select P.*, C.city_name, CT.category_name, SC.subcategory_name from `proximitypad_data` P JOIN `cities` C ON P.city_id = C.city_id LEFT JOIN poi_main_cat CT ON P.cate_id = CT.cat_id LEFT JOIN poi_sub_cat SC ON P.sub_cat_poi_id = SC.poi_num where P.address_id=$id";
		$query = $this->db->query($sql);
		$qryres = $query->result();
		//echo "<pre>"; print_r($qryres);
		return $qryres;
		
	}
		
	function update_proximitypad_address() {
		$addId 		= $this->input->post('ad_id');
		$addr 		= $this->input->post('name');
		$street 	= $this->input->post('street');
		$locality	= $this->input->post('locality');
		$cityId 	= $this->input->post('city');
		
		$cityName 	= $this->select_city_Name($cityId);
		$address	= $addr.','.$street.','.$locality.','.$cityName;
		
		$cities=$lat_long=$this->commonmodel->get_latlont_place_m($address);
		$lat = $cities['latitude'];
		$long = $cities['longitude'];
		
		if($lat !='' && $long != '') {
			$this->db->set('cate_id',$this->input->post('catid'));
			$this->db->set('sub_cat_poi_id',$this->input->post('subcatid'));
			$this->db->set('address',$addr);
			$this->db->set('street',$street);
			$this->db->set('locality',$locality);
			$this->db->set('longitude',$long);
			$this->db->set('latitude',$lat);
			$this->db->set('pin_code',$this->input->post('pincode'));
			$this->db->set('city_id',$cityId);
			$this->db->where('address_id',$addId);
			$this->db->update('proximitypad_data');
			return 1; 
		} else {
			return 0;	
		}
	}
	
	function insert_best_school_csv($name,$addr,$pincode,$lat,$long,$city_id) {
		$this->db->set('name',addslashes($name));
		$this->db->set('address',addslashes($addr));
		$this->db->set('cityid',$city_id);
		$this->db->set('pincode',$pincode);
		$this->db->set('longitude',$long);
		$this->db->set('latitude',$lat);
		$this->db->insert('best_rated_school');
	}
		
} 
?>