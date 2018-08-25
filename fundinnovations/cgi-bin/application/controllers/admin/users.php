<?php
class Users extends CI_Controller 
 {
  function __construct()
   {
		parent::__construct();			
		$this->load->helper('url');		
		$baseurl =	$this->config->base_url();
		$this->load->library('session');		
			if(!($this->phpsession->get('username')))
			{
				redirect('admin/login','refresh');
			}
		$this->mysmarty->assign('adminid',$this->phpsession->get('username'));	
		$this->mysmarty->assign('baseurl',$baseurl);		
		$this->load->model('admin/Admin_user_model');
		$this->load->model('admin/siteuser_model');	
		$this->mysmarty->assign('header','admin/header.tpl');
		$this->mysmarty->assign('leftpane','admin/leftpane.tpl');					
		error_reporting(E_ALL ^ E_NOTICE); 						
    }
	
  function index()
   {  
   	  $baseurl =	$this->config->base_url();
	  redirect($baseurl."admin/users/manage_siteusers");
   }
  function add_user()
  {
	//  $this->mysmarty->assign('user_type',$type);
	  $country 	= $this->siteuser_model->select_country();
	  $this->mysmarty->assign('sel_country',$country);
	  $states 	= $this->siteuser_model->select_states();
	  $this->mysmarty->assign('sel_states',$states);
	  //$city		= $this->siteuser_model->select_cities();
	  //$this->mysmarty->assign('sel_city',$city);
	  //echo "<pre>"; print_r($states); echo "</pre>";
	  $this->mysmarty->assign('middlecontent','admin/add_siteuser.tpl');	
	  $this->mysmarty->display('admin/layout.tpl');	
  }
  function edituser($uid){
	  $baseurl 	=	$this->config->base_url();
	  $users 	= $this->siteuser_model->view_user_details($uid,$baseurl);
	  $country 	= $this->siteuser_model->select_country();
	  $this->mysmarty->assign('sel_country',$country);
	 // echo "<pre>"; print_r($users); echo "</pre>";
	 $this->mysmarty->assign('uid',$uid);
      $this->mysmarty->assign('users',$users);
	  $this->mysmarty->assign('middlecontent','admin/edit_user.tpl');	
	  $this->mysmarty->display('admin/layout.tpl');	
	 }
  function get_cities($st_id='') {
	  $city		= $this->siteuser_model->select_cities($st_id);
	  $this->mysmarty->assign('sel_city',$city);
	  $this->mysmarty->display('admin/get_city.tpl');	
  }
  
  function get_country($cntry_id=''){
	  $states		= $this->siteuser_model->select_statesByCid($cntry_id);
	  $this->mysmarty->assign('sel_states',$states);
	  $this->mysmarty->display('ajax_states.tpl');
	}
  function check_siteusername() {
	 echo $checkUser = $this->siteuser_model->check_siteusername(); 
  }
   function check_siteemail_id() {
	 echo $checkEmailid = $this->siteuser_model->check_siteemail_id(); 
  }
  function insert_siteuser() {
	//  echo '<pre>';print_r($_POST);  echo '</pre>';exit;
	$ins_user 	= $this->siteuser_model->insert_siteuser(); 
	echo 'Successfully Added';
  }
  function update_siteuser($uid){
	  $update_user 	= $this->siteuser_model->update_siteuser($uid,$_POST); 
	  echo 'updated';
	   
  }
  function manage_siteusers($type='all', $currP=''){
	   $country 	= $this->siteuser_model->select_country();
	  $this->mysmarty->assign('sel_country',$country);
	  
	  $this->mysmarty->assign('url_type',$type);
	  $this->mysmarty->assign('hidcurrP',$currP);
	  if($type=='all_1') { 
	  	$hedline = 'Active';
		$block_type = 0; 
	  }
	  else if($type=='all_2') { 
	  	$hedline = 'Blocked';
		$block_type = 0; 
	  }
	  else if($type=='all_0') { 
	  	$hedline = 'Pending'; 
		$block_type = 0; 
	  }
	
	  else { 
	  	$hedline = ''; 
		$block_type = 0;
	  }
	  $this->mysmarty->assign('page_headline',$hedline);
	  $this->mysmarty->assign('hide_type',$block_type);
	  $this->mysmarty->assign('middlecontent','admin/manage_siteuser.tpl');
	  $this->mysmarty->display('admin/layout.tpl');	
  }
  
  function siteusers_list() {
	  $order= $this->input->post('order_by');
	  if($order == "")
	  {
			$order = "DESC_DATE";
	  }
	  $this->mysmarty->assign('orderBy',$order);	
	  $fromPage= $this->input->post('url_type');
	  $this->mysmarty->assign('from_page',$fromPage);
	  $users = $this->siteuser_model->manage_site_users();
	  $this->mysmarty->assign('users',$users);
	  $this->mysmarty->assign('userscount',count($users));
	  
	  $this->mysmarty->display('admin/load_siteusers.tpl');
  }
  
  function countUsers()
  {
  	 $count = $this->siteuser_model->usercount();
   	 echo $count;
  }
  function searchCount()
  {
  	 $count = $this->siteuser_model->searchcount_users();
   	 echo $count;
  }
  
  function viewuser($uid='',$frompage='')
  {
	  $baseurl 	=	$this->config->base_url();
	  $currP	= $this->input->post('currP');
	  $orderBy	= $this->input->post('order_by');
	  ######  Traceback To  PAYMENT DETAILS Page if latter is the request sender #################
	  $traceback=(($this->input->post('traceback')!='') ? $this->input->post('traceback') : '');
	  $this->mysmarty->assign('traceback',$traceback);
	  ##############################################################################################
	  $users 	= $this->siteuser_model->view_user_details($uid,$baseurl);
	  $this->mysmarty->assign('users',$users);
	  $this->mysmarty->assign('fromPage',$frompage);
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/viewuser.tpl');
  }
   
  //Function Change Status
	function change_user_status()
	{
	   echo $status=$this->siteuser_model->change_siteuser_status();
	}
	
	
	//Function To Delete Selected list of users
	function del_select_siteusers()
	{
		 $order= $this->input->post('order_by');
	  	if($order == "")
	  	{
			$order = "DESC_DATE";
	  	}
	   $this->mysmarty->assign('orderBy',$order);
	   $this->siteuser_model->del_selected_siteusers();
	   $users = $this->siteuser_model->manage_site_users();
	   $this->mysmarty->assign('users',$users);
	   $this->mysmarty->assign('userscount',count($users));
	   $this->mysmarty->display('admin/load_siteusers.tpl');    
	}
  
  //Function To Delete Single user
	function delete_siteuser($userid)
	{
	   $order= $this->input->post('order_by');
	  	if($order == "")
	 	 {
			$order = "DESC_DATE";
	 	 }
	  	$this->mysmarty->assign('orderBy',$order);
	   $res=$this->siteuser_model->delete_siteuser($userid);	
	   $users = $this->siteuser_model->manage_site_users();
	   $this->mysmarty->assign('users',$users);
	   $this->mysmarty->assign('userscount',count($users));
	   $this->mysmarty->display('admin/load_siteusers.tpl');  
	}
  function unlink_idproof(){
	   	$removeImg	= $this->siteuser_model->delete_idproof();
		echo $removeImg;
	 } 
	 function unlink_profile_image()
	{
	 	$removeImg	= $this->siteuser_model->delete_profile_image();
		echo $removeImg;
	 }
 }