<?php
class profile extends CI_Controller 
 {
  function __construct()
   {
		parent::__construct();
		if(!($this->phpsession->get('user_id')))
		  {
			  $this->phpsession->save('redirectToCurrent', current_url());
			  $this->mysmarty->assign('profile_name','');
			 // redirect('signin','refresh');
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
 function index($user_id=''){
	 if($user_id=='' || !is_numeric($user_id)){
		redirect('home');
	 }
	 else{
		 if($this->phpsession->get('user_id') == $user_id)
		 redirect('user/my_profile');
		 
		 $profile_det 	  	 = $this->profilemodel->profile_det($user_id);
		 if($profile_det['status'] !=2 && $profile_det['status']  !=0) {
		 $projects_funded 	 = $this->profilemodel->projects_funded($user_id);
		 $projects_innovated = $this->profilemodel->projects_innovated_user($user_id);
		 $projects_stared    = $this->profilemodel->projects_stared($user_id);
		 $this->mysmarty->assign('projects_stared',$projects_stared);	
		 $this->mysmarty->assign('projects_innovated',$projects_innovated);
		 $this->mysmarty->assign('projects_funded',$projects_funded);
		 $this->mysmarty->assign('profile_det',$profile_det);
		 $this->mysmarty->assign('middlecontent','profile/profile_view.tpl');				
		 $this->mysmarty->display('layout.tpl');
		 }else{
			 redirect('home');
		 }
	 }
	 
  }
 function activate_profile($uid,$activation_key){
	// exit;
	 $result = $this->profilemodel->activate_profile($uid,$activation_key); 
	 
	 if($result){
		 $_SESSION['activated'] = 'yes';
	  }
	  else{
		 $_SESSION['activated'] = 'no';
	  }
	   redirect('profile/activate_response');
  }
  function activate_response(){
	  if(isset($_SESSION['activated']))
	  {
		 $response=$_SESSION['activated'];
		 unset($_SESSION['activated']);
		 $this->mysmarty->assign('response',$response); 
		 $this->mysmarty->assign('middlecontent','activate_response_page.tpl');				
		 $this->mysmarty->display('layout.tpl');
	  }else{
		  redirect('home');
	  }
  }
 }
 ?>