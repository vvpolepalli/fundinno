<?php
class Cms extends CI_Controller
{
   function __construct()
   {
		parent::__construct();	
		$this->load->library('session');		
			if(!($this->phpsession->get('username')))
			{
				redirect('admin/login','refresh');
			}	
		//$this->load->model('admin/propertyplan_model');
		//$property_plans = $this->propertyplan_model->property_plans_list();
		//$this->mysmarty->assign('property_plans',$property_plans);
		$baseurl =	$this->config->base_url();
		$this->mysmarty->assign('baseurl',base_url());			
		$this->load->model('admin/cms_model');	
		$this->load->model('emailmodel');
		//$this->load->model('commonmodel');
		$this->load->model('admin/siteuser_model');	
		
		$this->mysmarty->assign('adminid',$this->phpsession->get('username'));		  
		$this->mysmarty->assign('header','admin/header.tpl');
		$this->mysmarty->assign('middlecontent','admin/home.tpl');	  
		$this->mysmarty->assign('leftpane','admin/leftpane.tpl');		
	//Error reporting
		//error_reporting(E_ALL ^ E_NOTICE); 		
    }
	
   function index()
    {	  
	   $this->mysmarty->display('admin/layout.tpl');		
	}
	
  
	function ListCms()
   {
	  $CmsLists	=	$this->cms_model->listPages(); 	  
	  $this->mysmarty->assign('cmsCount',count($CmsLists));
	  $this->mysmarty->assign('CmsLists',$CmsLists);
	  $this->mysmarty->assign('updated_msg',''); 
	  $this->mysmarty->assign('middlecontent','admin/CmsList.tpl');	 
	  $this->mysmarty->display('admin/layout.tpl');
		
	}
	
	
	function cmsEdit($id="")
    {	  
	  $CmsContent=$this->cms_model->listPage($id);		
	  $this->mysmarty->assign('content','none');	
	  $this->mysmarty->assign('id',$id);
	  $this->mysmarty->assign('CmsContent',$CmsContent);
	  $this->mysmarty->assign('middlecontent','admin/CmsAdd.tpl');	 
	  $this->mysmarty->display('admin/layout.tpl');		
	}
	
	
	function updateCmsAjax($id="")
	{	
                if(isset($_POST)){
		 if(!isset($_POST['content']) )		 			  					
			  $this->mysmarty->assign('content','no');			 
		 else
		 {
			 $string = $_POST['content'];
			 $Patternn ="/^<p>(&nbsp;( ?)*)*<\/p>$/";
			if(preg_match_all($Patternn, $string, $nameMatches))
			{
					$this->mysmarty->assign('content','no');		
			}
			else
			{
				$CmsAddStatus		=	$this->cms_model->updatePage($_POST,$id);
			         $this->mysmarty->assign('content','yes');		
			}			 
					
		 }
                        $CmsContent=$this->cms_model->listPage($id);
			  $this->mysmarty->assign('id',$id);
			  $this->mysmarty->assign('CmsContent',$CmsContent);
			  $this->mysmarty->assign('middlecontent','admin/CmsAdd.tpl');	 
			  $this->mysmarty->display('admin/layout.tpl');	
                }
                else {
                    redirect('Cms/ListCms');
                }
		
	}
	
	// ################## News letter starts here ##################################//
	// Noufal Added on 20-07-2012	
	function add_news_letter($news='none') {
		
		$this->mysmarty->assign('news',$news);	
		$this->mysmarty->assign('middlecontent','admin/newsletter/add_news_letter.tpl');	
		$this->mysmarty->display('admin/layout.tpl');
	}
	
	function insert_news_letter(){
		$baseurl = base_url();
		if(isset($_POST) && $_POST['news_content']=='')		 			  					
			  $news ='no';			 
		 else
		 {
			 $string = $_POST['news_content'];
			 $Patternn ="/^<p>(&nbsp;( ?)*)*<\/p>$/";
			if(preg_match_all($Patternn, $string, $nameMatches))
			{
				$news ='no';		
			}
			else
			{
				 $newsAddStatus		=	$this->cms_model->add_news_letter($_POST);
				 $news ='yes';		
			}			 
					
		 }
		 redirect($baseurl.'admin/Cms/add_news_letter/'.$news);
	}
	
	function news_letter($currP='') {
		
		$this->mysmarty->assign('hidcurrP',$currP);
		//$newsletter = $this->cms_model->all_news_letters();
		//$this->mysmarty->assign('newsletter',$newsletter);
		//$this->mysmarty->assign('newsletter_count',count($newsletter));	
		$this->mysmarty->assign('middlecontent','admin/newsletter/news_letter.tpl');	
		$this->mysmarty->display('admin/layout.tpl');
	}
	function news_letter_list() {
		$order  = $this->input->post('order_by');
		$pstart = $this->input->post('startp');
	  	if($order == "")
	 	{
			$order = "DESC_NID";
	 	}
	  	$this->mysmarty->assign('orderBy',$order);
		$this->mysmarty->assign('pstart',$pstart);
		$newsletter = $this->cms_model->all_news_letters();
		$this->mysmarty->assign('newsletter',$newsletter);	
		$this->mysmarty->assign('newsletter_count',count($newsletter));
		$this->mysmarty->display('admin/newsletter/load_news_letter.tpl');
	}
	function newsletterCount() {
		$count = $this->cms_model->all_news_letters_Count();
   		echo $count;
		
	}
	
	function delete_newsletter($id)
	{
	   	$order  = $this->input->post('order_by');
		$pstart = $this->input->post('startp');
	  	if($order == "")
	 	{
			$order = "DESC_NID";
	 	}
	  	$this->mysmarty->assign('orderBy',$order);
		$this->mysmarty->assign('pstart',$pstart);
	   	$res=$this->cms_model->delete_news_letter($id);	
	   	$newsletter = $this->cms_model->all_news_letters();
		$this->mysmarty->assign('newsletter',$newsletter);	
		$this->mysmarty->assign('newsletter_count',count($newsletter));
		$this->mysmarty->display('admin/newsletter/load_news_letter.tpl');
	}
	
	function update_newsletter($newsId='')
  	{
	  $currP	= $this->input->post('currP');
	  $orderBy	= $this->input->post('order_by');
	  $news_details= $this->cms_model->get_newsletter_details($newsId);
	  $this->mysmarty->assign('newsdt',$news_details);
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/newsletter/edit_news_letter.tpl');
  	}
	function update_news_letter_content() {
		$newsContnt	= $this->input->post('news_content');
		if($newsContnt=='')		 			  					
			  $news ='no';			 
		 else
		 {
			 $string = $newsContnt;
			 $Patternn ="/^<p>(&nbsp;( ?)*)*<\/p>$/";
			if(preg_match_all($Patternn, $string, $nameMatches))
			{
				$news ='no';		
			}
			else
			{
				 $newsAddStatus		=	$this->cms_model->update_news_letter();
				 $news ='yes';		
			}			 
					
		 }
		 echo $news;
	}
	
	function view_newsletter($newsId='') {
	  $currP	= $this->input->post('currP');
	  $orderBy	= $this->input->post('order_by');
	  $news_details= $this->cms_model->get_newsletter_details($newsId);
	  $this->mysmarty->assign('newsdt',$news_details);
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/newsletter/view_news_letter.tpl');
		
	}
	
	function send_news_letter($resp='') {
		$news_letters = $this->cms_model->select_news_letters();
		$projects = $this->cms_model->select_projects();
		$this->mysmarty->assign('sel_news',$news_letters);
		$this->mysmarty->assign('projects',$projects);
		$this->mysmarty->assign('resp',$resp);
		$this->mysmarty->assign('middlecontent','admin/newsletter/send_news_letter.tpl');	
		$this->mysmarty->display('admin/layout.tpl');
	}
	function add_email_address($resp='') {
		//$news_letters = $this->cms_model->select_news_letters();
		$projects = $this->cms_model->select_projects();
		//$this->mysmarty->assign('sel_news',$news_letters);
		$this->mysmarty->assign('projects',$projects);
		$this->mysmarty->assign('resp',$resp);
		$this->mysmarty->assign('middlecontent','admin/newsletter/add_email_address.tpl');	
		$this->mysmarty->display('admin/layout.tpl');
	}
	
	
	function send_news_letter_action() {
		$baseurl = base_url();
		$news_letters = $this->emailmodel->send_newsletter_admin();
		redirect($baseurl.'admin/Cms/send_news_letter/'.$news_letters);
	}
	function add_email_address_action() {
	    $filePath = $_FILES['add_email_address']['tmp_name'];
		//print_r($_POST);
		//print_r($filePath);exit;
		
		$baseurl = base_url();
		$news_letters = $this->emailmodel->add_email_admin($filePath);
		//print_r($news_letters);exit;
		redirect($baseurl.'admin/Cms/add_email_address/success');
	}
	function sent_newsletter_history($nid){
	  $currP	= $this->input->post('currP');
	  $orderBy	= $this->input->post('order_by');
	  
	  $historyTitle = $this->cms_model->get_newsletter_details($nid);
	 // echo "<pre>"; print_r($newsTitle);
	  //$history_title = $newsTitle[0]->news_title;
	  $this->mysmarty->assign('history_dtls',$historyTitle);
	  
	  $sent_details= $this->cms_model->get_all_sent_newsletter($nid);
	  $this->mysmarty->assign('news_sentdt',$sent_details);
	  $this->mysmarty->assign('news_sent_count',count($sent_details));
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/newsletter/send_news_history.tpl');	
	}
	
	function delete_newsletter_history($nhid) {
	  
	  $del = $this->cms_model->delete_newsletter_history($nhid);
	
	  $currP	= $this->input->post('currP');
	  $orderBy	= $this->input->post('order_by');
	  $newsId	= $this->input->post('newsId');
	  
	  $historyTitle = $this->cms_model->get_newsletter_details($newsId);
	 // echo "<pre>"; print_r($newsTitle);
	  //$history_title = $newsTitle[0]->news_title;
	  $this->mysmarty->assign('history_dtls',$historyTitle);
	  
	  $sent_details= $this->cms_model->get_all_sent_newsletter($newsId);
	  $this->mysmarty->assign('news_sentdt',$sent_details);
	  $this->mysmarty->assign('news_sent_count',count($sent_details));
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/newsletter/send_news_history.tpl');	
	}
	// Noufal Added on 23-07-2012
	// ################## News letter starts ends ##################################//
	
	// Noufal Added on 10-09-2012
	// ################## poidata CSV starts##################################//
	/*function upload_csv(){
		$msg ='';
		$divClass = '';
		$sel_cities	= $this->siteuser_model->select_all_cities();
		$this->mysmarty->assign('sel_cities',$sel_cities);
		
		if(isset($_REQUEST['submit']))	
		{
			if($_REQUEST['submit']!="")	{
			//$data = new Spreadsheet_Excel_Reader();
			
			$file=$_FILES['file']['name'];
		//	echo "Name=".$file."<br>";
			$arr = array();
			$ext1array		=	explode(".",$file);
			$ext			=	strrchr($file,".");
			$fname			=	$_FILES['file']['tmp_name']; 
			//echo"Ext".$ext;
			//exit;
			$fdir			=	UPLOAD_PATH."map_xml/".$file;
			
			if($ext==".csv")
			{
				if(copy($fname,$fdir)){ 
					$flag=1;
				} else {
					$msg= 'System error! Cannot able to upload the specified file';
					$divClass = 'error-message';
				}
			}
			else
			{
				$msg="Upload a csv file";
				$divClass = 'error-message';
			}
			if($msg=='') {
				$row = 1;
				if (($handle = fopen($fdir, "r")) !== FALSE) {
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$arr[]=$data;
					}
					fclose($handle);
					
				}
				//echo '<pre>'; print_r($arr);echo '</pre>';
				//$data->read($fdir);
				$cnt=count($arr);
				for ($j = 1; $j <= $cnt; $j++)
				{
					$addr= $arr[$j][0];
					$subcat_poi_id=$arr[$j][1];			
					$pincode =$arr[$j][7];
					$catname = $arr[$j][2];
					$street = $arr[$j][4];
					$locality = $arr[$j][5];
					$city= $arr[$j][6];
					$address=$addr.','.$street.','.$locality.','.$city;
					$city_id=$_REQUEST['prox_city'];
					//$city_id=$this->cms_model->select_city_Id($city);
					$cities=$lat_long=$this->commonmodel->get_latlont_place_m($address);
					$lat = $cities['latitude'];
					$long = $cities['longitude'];
					if($lat !='' && $long != '')
					$this->commonmodel->insert_addr_data_csv($addr,$subcat_poi_id,$pincode,$catname,$lat,$long,$street,$locality,$city_id);
				}
				unlink($fdir);
				$msg="csv file uploaded successfully" ;
				$divClass = 'success-message';
				}
				
			} else {
				$msg="Upload a csv file";
				$divClass = 'error-message';
			}
		} else {
			$msg ='';	
		}
		$this->mysmarty->assign('error_msg', $msg);
		$this->mysmarty->assign('divClass', $divClass);
		$this->mysmarty->assign('middlecontent','admin/poi_data/upload_csv.tpl');
		$this->mysmarty->display('admin/layout.tpl');
	}*/
	
	function manage_poidata($city=284, $currP='') {
		$sel_cities	= $this->siteuser_model->select_all_cities();
		$this->mysmarty->assign('sel_cities',$sel_cities);
		$this->mysmarty->assign('curr_city',$city);
		$this->mysmarty->assign('hidcurrP',$currP);
		$this->mysmarty->assign('middlecontent','admin/poi_data/manage_poidata.tpl');
		$this->mysmarty->display('admin/properties/properties.tpl');
	}
	function poidata_list() {
		$order= $this->input->post('order_by');
	  	if($order == "")
	 	{
			$order = "ASC_AD";
	 	}
	  	$this->mysmarty->assign('orderBy',$order);

		$poidata	= $this->cms_model->list_poidata_address();
		$this->mysmarty->assign('poidata',$poidata);
		$this->mysmarty->assign('proximity_count',count($poidata));
	 	$this->mysmarty->display('admin/poi_data/load_poidata.tpl');
		
	}
	function poidataCount() {
		$count = $this->cms_model->poidata_Count();
   		echo $count;
	}
	
	function delete_poidata($id) {
		$order= $this->input->post('order_by');
	   	if($order == "")
		{
			$order = "ASC_AD";
	   	}
	   	$this->mysmarty->assign('orderBy',$order);
	   	$res=$this->cms_model->delete_poidata_address($id);	
	    $poidata	= $this->cms_model->list_poidata_address();
		$this->mysmarty->assign('poidata',$poidata);
		$this->mysmarty->assign('proximity_count',count($poidata));
	 	$this->mysmarty->display('admin/poi_data/load_poidata.tpl');
	}
	
	function del_select_poidata() {
		$order= $this->input->post('order_by');
	  	if($order == "")
	  	{
			$order = "ASC_AD";
	  	}
	   	$this->mysmarty->assign('orderBy',$order);
	  	$res=$this->cms_model->del_selected_poidata_address();
	   	$poidata	= $this->cms_model->list_poidata_address();
		$this->mysmarty->assign('poidata',$poidata);
		$this->mysmarty->assign('proximity_count',count($poidata));
	 	$this->mysmarty->display('admin/poi_data/load_poidata.tpl');
	}
	
	
	function edit_poidata_address($id='')
  	{
	  $currP	= $this->input->post('currP');
	  $orderBy	= $this->input->post('order_by');
	  $sel_cities1	= $this->siteuser_model->select_all_cities();
	  $this->mysmarty->assign('updt_cities',$sel_cities1);
	  $sel_poi_cat	= $this->cms_model->select_all_poi_categories();
	  $this->mysmarty->assign('sel_cat',$sel_poi_cat);
	  $sel_poi_subcat	= $this->cms_model->select_all_poi_subcategories();
	  $this->mysmarty->assign('sel_subcat',$sel_poi_subcat);
	  $prox_dtls= $this->cms_model->get_poidata_details($id);
	  $this->mysmarty->assign('prox_details',$prox_dtls);
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/poi_data/edit_poidata.tpl');
  	}
	
	function update_poidata_address() {
		$update = $this->cms_model->update_poidata_address();
		echo $update;
	}
	
	// Noufal Added on 11-09-2012
	// ################## poidata ends ##################################//
	
	// ################## Manage Guides  // Noufal Added 12-09-2012 ##################################//
	
	function create_guide($cat_id='') {
		$msg ='';
		$divClass ='';
		
		$category = $this->cms_model->fetch_category_list($cat_id);
	    $this->mysmarty->assign('category',$category);
		
		
		if($_REQUEST['guide_title']!='') {
			$insert = $this->cms_model->insert_guides();
			if($insert==1) {
				$msg ='Successfully Added';	
				$divClass ='success-message';
			} else {
				$msg ='Missing Title or Content';	
				$divClass ='error-message';
			}
		}
		
		$this->mysmarty->assign('cat_id',$cat_id);
		$this->mysmarty->assign('error_msg', $msg);
		$this->mysmarty->assign('divClass', $divClass);
		$this->mysmarty->assign('middlecontent','admin/guides/add_guides.tpl');	  
	 	$this->mysmarty->display('admin/layout.tpl');	
	}
	
	function manage_guides_posts($id) {
		$this->mysmarty->assign('cat_id',$id);
		$category = $this->cms_model->fetch_category_list($id);
	    $this->mysmarty->assign('category',$category);
		
		$this->mysmarty->assign('middlecontent','admin/guides/manage_guides.tpl');	  
	 	$this->mysmarty->display('admin/layout.tpl');
	}
	
	
	function load_guide_list() {
		
		$order= $this->input->post('order_by');
		$cat_id= $this->input->post('cat_id');
	  	if($order == "")
	 	{
			$order = "DESC_DT";
	 	}
	  	$this->mysmarty->assign('orderBy',$order);
		$this->mysmarty->assign('cat_id',$cat_id);

		$guides	= $this->cms_model->list_guide_list();
		$this->mysmarty->assign('guides',$guides);
		$this->mysmarty->assign('guides_count',count($guides));
	 	$this->mysmarty->display('admin/guides/load_guides.tpl');
		
	}
	function edit_guide_title($id){
	  $guide_cat= $this->cms_model->get_guide_category($id);
	  $this->mysmarty->assign('id',$id);
	  $this->mysmarty->assign('guide_cat',$guide_cat);
	  
	  //send data to model
	  if($this->input->post('guide_category_name') != ''){
		  $upd_cat= $this->cms_model->upd_guide_category($id);
		  
	  }
	  
	  
	  $this->mysmarty->assign('middlecontent','admin/guides/add_edit_guide_cat.tpl');
	  $this->mysmarty->display('admin/layout.tpl');
		
	}
	
	function add_guide_title(){
	 
	  
	  //send data to model
	  if($this->input->post('guide_category_name') != ''){
		  $upd_cat= $this->cms_model->add_guide_category($id);
		  
	  }
	  
	  
	  $this->mysmarty->assign('middlecontent','admin/guides/add_edit_guide_cat.tpl');
	  $this->mysmarty->display('admin/layout.tpl');
		
	}
	
	
	//for main guide post
	function manage_guides(){
		$this->mysmarty->assign('middlecontent','admin/guides/list_guides.tpl');	  
	 	$this->mysmarty->display('admin/layout.tpl');
	}
	function load_main_guide() {
		$order= $this->input->post('order_by');
	  	if($order == "")
	 	{
			$order = "DESC_DT";
	 	}
	  	$this->mysmarty->assign('orderBy',$order);

		$guides	= $this->cms_model->list_main_guide_list();
		$this->mysmarty->assign('guides',$guides);
		$this->mysmarty->assign('guides_count',count($guides));
	 	$this->mysmarty->display('admin/guides/search_guides.tpl');
		
	}
	
	function delete_guide_list($id) {
		
		$order= $this->input->post('order_by');
	   	if($order == "")
		{
			$order = "DESC_DT";
	   	}
	   	$this->mysmarty->assign('orderBy',$order);
	   	$res=$this->cms_model->delete_guide_list($id);	
		if($res) {
			$guides	= $this->cms_model->list_guide_list();
			$this->mysmarty->assign('guides',$guides);
			$this->mysmarty->assign('guides_count',count($guides));
			$this->mysmarty->display('admin/guides/load_guides.tpl');
		}
	}
	
	function del_select_guide_list() {
		
		//print_r($_POST); exit;
		$order= $this->input->post('order_by');
		if($order == "")
	  	{
			$order = "DESC_DT";
	  	}
	   	$this->mysmarty->assign('orderBy',$order);
	  	$res=$this->cms_model->del_selected_guide_list();
	   	if($res) {
			$guides	= $this->cms_model->list_guide_list();
			$this->mysmarty->assign('guides',$guides);
			$this->mysmarty->assign('guides_count',count($guides));
			$this->mysmarty->display('admin/guides/load_guides.tpl');
		}
	}
	
	function edit_guide_list($id='',$cat_id='') {
		
		
	  $category = $this->cms_model->fetch_category_list($cat_id); 
	  $this->mysmarty->assign('category',$category);
	  $this->mysmarty->assign('cat_id',$cat_id);
	  $guide_dtls= $this->cms_model->get_guide_details($id);
	  $this->mysmarty->assign('guide_details',$guide_dtls);
	  $this->mysmarty->display('admin/guides/edit_guides.tpl');
		
	}
	
	function update_guide_list() {
		$update = $this->cms_model->update_guide_list();
		echo $update;
	}
	// ################## Manage Guides ends  // Noufal Added 13-09-2012 ##################################//
	
	// Noufal Added on 14-09-2012
	// ################## Proximitypad CSV starts ##################################//
	/*function add_proximitypad(){
		$msg ='';
		$divClass = '';
		$sel_cities	= $this->siteuser_model->select_all_cities();
		$this->mysmarty->assign('sel_cities',$sel_cities);
		
		if(isset($_REQUEST['submit']))	
		{
			if($_REQUEST['submit']!="")	{
			//$data = new Spreadsheet_Excel_Reader();
			
			$file=$_FILES['file']['name'];
		//	echo "Name=".$file."<br>";
			$arr = array();
			$ext1array		=	explode(".",$file);
			$ext			=	strrchr($file,".");
			$fname			=	$_FILES['file']['tmp_name']; 
			//echo"Ext".$ext;
			//exit;
			$fdir			=	UPLOAD_PATH."map_xml/".$file;
			
			if($ext==".csv")
			{
				if(copy($fname,$fdir)){ 
					$flag=1;
				} else {
					$msg= 'System error! Cannot able to upload the specified file';
					$divClass = 'error-message';
				}
			}
			else
			{
				$msg="Upload a csv file";
				$divClass = 'error-message';
			}
			if($msg=='') {
				$row = 1;
				if (($handle = fopen($fdir, "r")) !== FALSE) {
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$arr[]=$data;
					}
					fclose($handle);
					
				}
				//echo '<pre>'; print_r($arr);echo '</pre>';
				//$data->read($fdir);
				$cnt=count($arr);
				for ($j = 1; $j <= $cnt; $j++)
				{
					$addr= $arr[$j][0];
					$subcat_poi_id=$arr[$j][1];			
					$pincode =$arr[$j][7];
					$catname = $arr[$j][2];
					$street = $arr[$j][4];
					$locality = $arr[$j][5];
					$city= $arr[$j][6];
					$address=$addr.','.$street.','.$locality.','.$city;
					$city_id=$_REQUEST['prox_city'];
					//$city_id=$this->cms_model->select_city_Id($city);
					$cities=$lat_long=$this->commonmodel->get_latlont_place_m($address);
					$lat = $cities['latitude'];
					$long = $cities['longitude'];
					if($lat !='' && $long != '')
					$this->cms_model->insert_proximity_data_csv($addr,$subcat_poi_id,$pincode,$catname,$lat,$long,$street,$locality,$city_id);
				}
				unlink($fdir);
				$msg="csv file uploaded successfully" ;
				$divClass = 'success-message';
				}
				
			} else {
				$msg="Upload a csv file";
				$divClass = 'error-message';
			}
		} else {
			$msg ='';	
		}
		$this->mysmarty->assign('error_msg', $msg);
		$this->mysmarty->assign('divClass', $divClass);
		$this->mysmarty->assign('middlecontent','admin/proximitypad/add_proximitypad.tpl');
		$this->mysmarty->display('admin/layout.tpl');
	}*/
	
	function manage_proximitypad($city=402, $currP='') {
		$sel_cities	= $this->siteuser_model->select_all_cities();
		$this->mysmarty->assign('sel_cities',$sel_cities);
		$this->mysmarty->assign('curr_city',$city);
		$this->mysmarty->assign('hidcurrP',$currP);
		$this->mysmarty->assign('middlecontent','admin/proximitypad/manage_proximitypad.tpl');
		$this->mysmarty->display('admin/properties/properties.tpl');
	}
	function proximitypad_list() {
		$order= $this->input->post('order_by');
	  	if($order == "")
	 	{
			$order = "ASC_AD";
	 	}
	  	$this->mysmarty->assign('orderBy',$order);

		$proximitypad	= $this->cms_model->list_proximitypad_address();
		$this->mysmarty->assign('proximitypad',$proximitypad);
		$this->mysmarty->assign('proximity_count',count($proximitypad));
	 	$this->mysmarty->display('admin/proximitypad/load_proximitypad.tpl');
		
	}
	function proximitypadCount() {
		$count = $this->cms_model->proximitypad_Count();
   		echo $count;
	}
	
	function delete_proximitypad($id) {
		$order= $this->input->post('order_by');
	   	if($order == "")
		{
			$order = "ASC_AD";
	   	}
	   	$this->mysmarty->assign('orderBy',$order);
	   	$res=$this->cms_model->delete_proximitypad_address($id);	
	    $proximitypad	= $this->cms_model->list_proximitypad_address();
		$this->mysmarty->assign('proximitypad',$proximitypad);
		$this->mysmarty->assign('proximity_count',count($proximitypad));
	 	$this->mysmarty->display('admin/proximitypad/load_proximitypad.tpl');
	}
	
	function del_select_proximitypad() {
		$order= $this->input->post('order_by');
	  	if($order == "")
	  	{
			$order = "ASC_AD";
	  	}
	   	$this->mysmarty->assign('orderBy',$order);
	  	$res=$this->cms_model->del_selected_proximitypad_address();
	   	$proximitypad	= $this->cms_model->list_proximitypad_address();
		$this->mysmarty->assign('proximitypad',$proximitypad);
		$this->mysmarty->assign('proximity_count',count($proximitypad));
	 	$this->mysmarty->display('admin/proximitypad/load_proximitypad.tpl');
	}
	
	
	function edit_proximitypad_address($id='')
  	{
	  $currP	= $this->input->post('currP');
	  $orderBy	= $this->input->post('order_by');
	  $sel_cities1	= $this->siteuser_model->select_all_cities();
	  $this->mysmarty->assign('updt_cities',$sel_cities1);
	  $sel_poi_cat	= $this->cms_model->select_all_poi_categories();
	  $this->mysmarty->assign('sel_cat',$sel_poi_cat);
	  $sel_poi_subcat	= $this->cms_model->select_all_poi_subcategories();
	  $this->mysmarty->assign('sel_subcat',$sel_poi_subcat);
	  $prox_dtls= $this->cms_model->get_proximitypad_details($id);
	  $this->mysmarty->assign('prox_details',$prox_dtls);
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/proximitypad/edit_proximitypad.tpl');
  	}
	
	function update_proximitypad_address() {
		$update = $this->cms_model->update_proximitypad_address();
		echo $update;
	}
	
	/*function add_bestschool(){
		$msg ='';
		$divClass = '';
		if(isset($_REQUEST['submit']))	
		{
			if($_REQUEST['submit']!="")	{
			//$data = new Spreadsheet_Excel_Reader();
			$city_id ='505';
			$city_name ='Calcutta';
			$file=$_FILES['file']['name'];
			$arr = array();
			$ext1array		=	explode(".",$file);
			$ext			=	strrchr($file,".");
			$fname			=	$_FILES['file']['tmp_name']; 
			//echo"Ext".$ext;
			//exit;
			$fdir			=	UPLOAD_PATH."map_xml/".$file;
			
			if($ext==".csv")
			{
				if(copy($fname,$fdir)){ 
					$flag=1;
				} else {
					$msg= 'System error! Cannot able to upload the specified file';
					$divClass = 'error-message';
				}
			}
			else
			{
				$msg="Upload a csv file";
				$divClass = 'error-message';
			}
			if($msg=='') {
				$row = 1;
				if (($handle = fopen($fdir, "r")) !== FALSE) {
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
						$arr[]=$data;
					}
					fclose($handle);
					
				}
				//echo '<pre>'; print_r($arr);echo '</pre>';
				//$data->read($fdir);
				$cnt=count($arr);
				for ($j = 1; $j <= $cnt; $j++)
				{
					$name = $arr[$j][0];
					$addr = $arr[$j][1];
					$pincode = $arr[$j][2];
					$address=$addr.', '.$$city_name;
					$cities=$lat_long=$this->commonmodel->get_latlont_place_m($address);
					$lat = $cities['latitude'];
					$long = $cities['longitude'];
					if($lat !='' && $long != '')
					$this->cms_model->insert_best_school_csv($name,$addr,$pincode,$lat,$long,$city_id);
				}
				unlink($fdir);
				$msg="csv file uploaded successfully" ;
				$divClass = 'success-message';
				}
				
			} else {
				$msg="Upload a csv file";
				$divClass = 'error-message';
			}
		} else {
			$msg ='';	
		}
		$this->mysmarty->assign('error_msg', $msg);
		$this->mysmarty->assign('divClass', $divClass);
		$this->mysmarty->assign('middlecontent','admin/add_bestschool.tpl');
		$this->mysmarty->display('admin/layout.tpl');
	}*/
	
}