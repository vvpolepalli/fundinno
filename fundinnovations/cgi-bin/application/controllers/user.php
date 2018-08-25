<?php
class User extends CI_Controller 
 {
  function __construct()
   {
		parent::__construct();
		if(!($this->phpsession->get('user_id')))
		  {
			  $this->phpsession->save('redirectToCurrent', current_url());
			  
			  redirect('signin','refresh');
		  }else{
			  $this->mysmarty->assign('profile_name',$this->phpsession->get('profile_name'));
		  }
                 
		$this->load->model('archive_projectmodel');
		$this->load->model('profilemodel');
		$media=$this->archive_projectmodel->media_banner_list();
		$this->mysmarty->assign('media',$media);
		$this->mysmarty->assign('user_id',$this->phpsession->get('user_id'));	
		$this->mysmarty->assign('baseurl',base_url());	
		$this->mysmarty->assign('header','header.tpl');
		$this->mysmarty->assign('footer','footer.tpl');
		error_reporting(E_ALL ^ E_NOTICE); 		
   }
   function index(){
		redirect('home');
	}
	function my_profile($ptype=''){
		if($this->phpsession->get('user_id') == '')
		  {
			  redirect('home');
		  }
		  
		$category_list  = $this->archive_projectmodel->category_list(); 
		$city_list		= $this->archive_projectmodel->proj_city_list(); 
		$my_profile_det = $this->profilemodel->my_profile_det(); 
		
		$this->mysmarty->assign('category_list',$category_list);
		$this->mysmarty->assign('city_list',$city_list);
		$projects_list_cnt	= $this->archive_projectmodel->projects_list_cnt();
		$projects_i_may_like= $this->profilemodel->projects_i_may_like();
		if($projects_i_may_like !=NULL && count($projects_i_may_like)>0){
		$recently_added= $projects_i_may_like;
		//echo '<pre>'; print_r($recently_added); echo '</pre>';
		}else
		$recently_added		= $this->archive_projectmodel->recently_added('',0,10);
		
		$this->mysmarty->assign('ptype',$ptype);
		$this->mysmarty->assign('recently_added',$recently_added);
		$this->mysmarty->assign('projects_list_cnt',$projects_list_cnt);
		$this->mysmarty->assign('my_profile_det',$my_profile_det);
		$this->mysmarty->assign('middlecontent','profile/my_profile.tpl');				
		$this->mysmarty->display('layout.tpl');
	}
	function edit_profile(){
		if($this->phpsession->get('user_id') == '')
		  {
			  redirect('home');
		  }
		if(isset($_POST['save'])){
			//echo '<pre>';print_r($_POST);echo '</pre>';
			$update_profile = $this->profilemodel->update_profile($_POST); //updated
		}else{
			$update_profile='';
			}
		$this->mysmarty->assign('update_profile',$update_profile);
		$category_list  = $this->archive_projectmodel->category_list();
		$this->mysmarty->assign('category_list',$category_list);
		$country 	= $this->profilemodel->select_country();
	 	$this->mysmarty->assign('sel_country',$country);
		$my_profile_det = $this->profilemodel->get_my_profile_det(); 
		$this->mysmarty->assign('my_profile_det',$my_profile_det);
		$this->mysmarty->assign('middlecontent','profile/edit_profile.tpl');				
		$this->mysmarty->display('layout.tpl');
	}
	function account_settings(){
		
		if(isset($_POST['save'])){
  
			  $update_account    = $this->profilemodel->update_account($_POST); 
			  $error='';
			  $this->mysmarty->assign('update_account',$update_account);
		  
		}else{
			$error='';
			}
		$email_id = $this->profilemodel->get_email();
		//print_r($email_id);
		$this->mysmarty->assign('error',$error);
		$this->mysmarty->assign('email_id',$email_id);
		$this->mysmarty->assign('middlecontent','profile/account_settings.tpl');				
		$this->mysmarty->display('layout.tpl');
	}
	function my_notifications(){
		if(isset($_POST['save'])){
			$update_notifications    = $this->profilemodel->update_notifications($_POST); 
			$this->mysmarty->assign('update_notify',$update_notifications);
		}
		$notifications = $this->profilemodel->get_notifications();
		$this->mysmarty->assign('notifications',$notifications);
		$this->mysmarty->assign('middlecontent','profile/my_notifications.tpl');				
		$this->mysmarty->display('layout.tpl');
	}
	function my_funding($page=''){
		if($page ==''){
			$page='current_projects_funded';
		}
		$this->mysmarty->assign('selected_lnk','my_funding');
		$this->mysmarty->assign('page',$page);		
		$this->mysmarty->display('profile/main_page.tpl');		
	}
	function current_projects_funded(){
	//	$this->mysmarty->assign('page','current_projects_funded');	
		$projects_funded = $this->profilemodel->current_projects_funded();
		$this->mysmarty->assign('current_projects_funded',$projects_funded);
		$this->mysmarty->display('profile/current_projects_funded.tpl');	
	}
	function funding_history(){
		$projects_funded = $this->profilemodel->projects_funded();
		$this->mysmarty->assign('projects_funded',$projects_funded);
		$this->mysmarty->display('profile/funding_history.tpl');
	}
	function fundinnovation_cash(){
		$fundinnovation_cash_det = $this->profilemodel->fundinnovation_cash_det();
		$this->mysmarty->assign('fundinnovation_cash_det',$fundinnovation_cash_det);
		$this->mysmarty->display('profile/fundinnovation_cash.tpl');
	}
	function my_innovations($page=''){
		if($page ==''){
			$page='active_innovation';
		}
		$this->mysmarty->assign('selected_lnk','my_innovations');
		$this->mysmarty->assign('page',$page);		
		$this->mysmarty->display('profile/main_innovation_page.tpl');				
		//$this->mysmarty->display('layout.tpl');
	}
	
	function active_innovation(){
		$active_innovation = $this->profilemodel->active_innovation();
		$this->mysmarty->assign('active_innovation',$active_innovation);
		$this->mysmarty->display('profile/active_innovation.tpl');
	}
	function innovation_history(){
		$projects_innovated = $this->profilemodel->projects_innovated();
		$this->mysmarty->assign('projects_innovated',$projects_innovated);
		$this->mysmarty->display('profile/innovation_history.tpl');
	}
	function my_stared(){
		//$this->mysmarty->assign('page','active_innovation');	
		$this->mysmarty->assign('selected_lnk','my_stared');
		$projects_stared = $this->profilemodel->projects_stared();
		$this->mysmarty->assign('projects_stared',$projects_stared);	
		$this->mysmarty->display('profile/stared_projects.tpl');				
		//$this->mysmarty->display('layout.tpl');
	}
	
	function load_pop_page(){
	$page_type=$_POST['page_type'];
	$this->mysmarty->assign('page_type',$page_type);
	$this->mysmarty->display('profile/funded_projects_main_page.tpl');
	}
	function refunded_project(){
		$refunded_project 		= $this->profilemodel->refunded_project();
		$refunded_project_cnt	= $this->profilemodel->refunded_project_cnt();
		$this->mysmarty->assign('startp',$this->input->post('startp'));
		$this->mysmarty->assign('project_list',$refunded_project);
		$this->mysmarty->assign('page_type','refunded');		
		$this->mysmarty->assign('project_list_cnt',$refunded_project_cnt);
		$this->mysmarty->display('profile/load_projects.tpl');	
	}
	function referral_project(){
		$referral_project 		= $this->profilemodel->referral_project();
		$referral_project_cnt	= $this->profilemodel->referral_project_cnt();
		$this->mysmarty->assign('startp',$this->input->post('startp'));
		$this->mysmarty->assign('project_list',$referral_project);	
		$this->mysmarty->assign('page_type','referral');	
		$this->mysmarty->assign('project_list_cnt',$refunded_project_cnt);
		$this->mysmarty->display('profile/load_projects.tpl');
	}
	function reinvested_project(){
		$reinvested_project 	= $this->profilemodel->reinvested_project();
		$reinvested_project_cnt	= $this->profilemodel->reinvested_project_cnt();
		$this->mysmarty->assign('startp',$this->input->post('startp'));
		$this->mysmarty->assign('project_list',$reinvested_project);	
		$this->mysmarty->assign('page_type','reinvested');	
		$this->mysmarty->assign('project_list_cnt',$reinvested_project_cnt);
		$this->mysmarty->display('profile/load_projects.tpl');
	}
    function load_referral_users_page(){
	$proj_id=$_POST['proj_id'];
	$this->mysmarty->assign('proj_id',$proj_id);
	$this->mysmarty->display('profile/referral_users_main_page.tpl');
	}
	function referral_users(){
		$referral_users 	= $this->profilemodel->referral_users();
		$referral_users_cnt	= $this->profilemodel->referral_users_cnt();
		$this->mysmarty->assign('startp',$this->input->post('startp'));
		$this->mysmarty->assign('referral_users',$referral_users );	
		$this->mysmarty->assign('referral_users_cnt',$referral_users_cnt);
		$this->mysmarty->display('profile/load_referral_users.tpl');
	}
	function unlink_profile_image()
	{
	 	$removeImg	= $this->profilemodel->delete_profile_image();
		echo $removeImg;
	 }
   function unlink_idproof(){
	   	$removeImg	= $this->profilemodel->delete_idproof();
		echo $removeImg;
	 }
	function delete_project(){
		$removeImg	= $this->profilemodel->delete_project($_POST['proj_id']);
		echo $removeImg;
	} 
   function get_country($cntry_id='')
   {
	  $states		= $this->profilemodel->select_statesByCid($cntry_id);
	  $this->mysmarty->assign('sel_states',$states);
	  $this->mysmarty->display('states.tpl');
	} 
   function get_cities($st_id='') 
   {
	  $city		= $this->profilemodel->select_cities($st_id);
	  $this->mysmarty->assign('sel_city',$city);
	  $this->mysmarty->display('cities.tpl');	
   }
 }
 ?>