<?php
class Home extends CI_Controller  
{		
	 public function __construct()
       {
            parent::__construct();
			$this->load->library('session');		
			if(!($this->phpsession->get('username')))
			{
				redirect('admin/login','refresh');
			}
			 $this->load->model('admin/siteuser_model');
			/*$property_plans = $this->propertyplan_model->property_plans_list();*/
			// $this->mysmarty->assign('property_plans',$property_plans);
			//$this->load->model('homemodel');
			$this->load->model('admin/commonmodel');
			$this->mysmarty->assign('adminid',$this->phpsession->get('username'));	
			$this->mysmarty->assign('baseurl',base_url());	
			$this->mysmarty->assign('header','admin/header.tpl');
			$this->mysmarty->assign('leftpane','admin/leftpane.tpl');
		    error_reporting(E_ALL ^ E_NOTICE); 	            
       }
	
		function index()
		{	
			$tot_siteusers = $this->siteuser_model->total_site_users();
			$this->mysmarty->assign('tot_siteusers',$tot_siteusers);
			
			$active_siteusers = $this->siteuser_model->active_siteusers();
			$this->mysmarty->assign('active_siteusers',$active_siteusers);
			
			$inactive_users = $this->siteuser_model->inactive_users();
			$this->mysmarty->assign('inactive_users',$inactive_users);
			
			$users_not_logged_last_30 = $this->siteuser_model->users_not_logged_last_30();
			$this->mysmarty->assign('users_not_logged_last_30',$users_not_logged_last_30);
			
			$not_verified_users = $this->siteuser_model->not_verified_users();
			$this->mysmarty->assign('not_verified_users',$not_verified_users);
			
			$projects_funds = $this->commonmodel->projects_funds();
			$this->mysmarty->assign('projects_funds',$projects_funds);
			
			$fun_projects=$this->commonmodel->fun_projects();
			//echo '<pre>';print_r($fun_projects);echo '</pre>';
			$this->mysmarty->assign('projects_cnts',$fun_projects);
			
			$this->mysmarty->assign('middlecontent','admin/home.tpl');				
			$this->mysmarty->display('admin/layout.tpl');	
		}
		
	 function change_password()
     {
	   $this->mysmarty->assign('middlecontent','admin/change_password.tpl');	
	   $this->mysmarty->display('admin/layout.tpl');
     }	 
	  function change_email_id()
     {
	   $this->mysmarty->assign('email_id',$this->phpsession->get('username'));			
	   $this->mysmarty->assign('middlecontent','admin/change_email_id.tpl');	
	   $this->mysmarty->display('admin/layout.tpl');
     }
	 function homepage_image_banner()
     {
	   $this->mysmarty->assign('banner_images',$this->commonmodel->get_banner_images());			
	   $this->mysmarty->assign('middlecontent','admin/homepage_image_banner.tpl');	
	   $this->mysmarty->display('admin/layout.tpl');
     }
	 
	 function remove_banner_img(){
		$de= $this->commonmodel->remove_banner_img();
		echo $de;
	}
	function insert_banner_photos(){
		$de= $this->commonmodel->insert_banner_photos();
		echo $de;
	}
	function media_cms()
     {
	   $this->mysmarty->assign('media_images',$this->commonmodel->get_media_images());			
	   $this->mysmarty->assign('middlecontent','admin/media_cms.tpl');	
	   $this->mysmarty->display('admin/layout.tpl');
     }
	
	function insert_media_image(){
	$de= $this->commonmodel->insert_media_image();
	echo 1;
	}
	function remove_media_img(){
	$de= $this->commonmodel->remove_media_img();
	echo $de;
	}
	function edit_media($id){
	   $this->mysmarty->assign('media_image_det',$this->commonmodel->get_media_imagebyid($id));			
	   $this->mysmarty->assign('middlecontent','admin/edit_media_cms.tpl');	
	   $this->mysmarty->display('admin/layout.tpl');
	}
	 
	function update_media_image(){
	$de= $this->commonmodel->update_media_image();
	echo 1;
	}
}