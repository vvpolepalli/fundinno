<?php
class Login extends CI_Controller 
 {
  function __construct()
   {
		parent::__construct();			
		$this->load->helper('url');		
		$baseurl =	$this->config->base_url();
		$this->mysmarty->assign('baseurl',$baseurl);		
		$this->load->model('admin/Admin_user_model');			
		error_reporting(E_ALL ^ E_NOTICE); 						
    }
	
  function index()
   {  	
	 if(isset($_POST['submitLogin']))
	  {
		 $adminLoginName		=	$_POST['userName'];
		 $adminPassword			=	md5($_POST['userPassword']);		 	
		 $ValidateResponse 		= 	$this->Admin_user_model->checkValidLogin($adminLoginName,$adminPassword);
		 if($ValidateResponse)
		 { 	
		   $this->phpsession->save('username', $adminLoginName);			   
		   redirect('admin/home', 'location');			   
		 }
		 else
		 {
			$this->mysmarty->assign('loginError','Username or password is wrong');
			$this->mysmarty->display('admin/Login.tpl');			
		 }
				 
	  }
	 else		
		  $this->mysmarty->display('admin/Login.tpl');
   }
 
   
 
   function forgot_password()
   {
	   $this->mysmarty->assign('Error','');
	   $this->mysmarty->display('admin/forgot_password.tpl');		   
   }  
   
    function send_new_password()
   {
	   $adminEmail = $this->input->post('admin_email');
	   if($adminEmail) {
		   $rs= $this->Admin_user_model->make_new_password($adminEmail);
	   }
		   if($rs=='success')
		   {
				$this->mysmarty->assign('Error','');
				$this->mysmarty->assign('msgg','New password has been sent to your email id');
		   }
		   else
		   {
				$this->mysmarty->assign('Error','The Email address you have given is not matching');
				$this->mysmarty->assign('msgg','');
	  	   }
	   	  
	   $this->mysmarty->display('admin/forgot_password.tpl');		   
   }    
   
   
   function logout()
   {
	  $this->phpsession->save('username', '');	
	  $this->mysmarty->assign('msgg','You have logged out successfully');
	  $this->mysmarty->display('admin/Login.tpl');	
   }
   
   function change_user_password()
   {	 
	echo $this->Admin_user_model->change_user_password($this->input->post('current_password'),$this->input->post('new_password'),$this->phpsession->get('username'));	
   }   
   function change_email_id(){
	   
	   echo $this->Admin_user_model->change_email_id($this->input->post('email_id'),$this->phpsession->get('username'));
	}
}
	
?>