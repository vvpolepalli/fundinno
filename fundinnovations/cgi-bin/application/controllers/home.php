<?php
class Home extends CI_Controller  
{		
	 public function __construct()
       {
            parent::__construct();
			//$this->benchmark->elapsed_time();
			$this->load->library('session');
			
			//login status		
			//phpinfo();
			if($this->phpsession->get('user_id')!='')
			 {				
				 $this->mysmarty->assign('profile_name',$this->phpsession->get('profile_name'));		 
			 }
			 else
			 {
				 $this->mysmarty->assign('profile_name','');			   
			 }
		 //login status
		 	$this->load->model('homemodel');
			//$this->mysmarty->assign('adminid',$this->phpsession->get('username'));	
			$media=$this->homemodel->media_banner_list();
			$this->mysmarty->assign('media',$media);
			$this->mysmarty->assign('baseurl',base_url());	
			$this->mysmarty->assign('header','header.tpl');
			$this->mysmarty->assign('footer','footer.tpl');
		    error_reporting(E_ALL ^ E_NOTICE); 	            
       }
	
	  function index(){	
	  	//phpinfo();
		//echo date("Y-m-d H:i:s ", strtotime("Tomorrow 12.01am"));
	  	$imagebanner    = $this->homemodel->imagebanner_list();
		$recently_added = $this->homemodel->recently_added();
		$most_funded	= $this->homemodel->most_funded(); 
		$staff_pick		= $this->homemodel->staff_pick();
		$succ_projects	= $this->homemodel->succ_projects();
		$website_intro  = $this->homemodel->get_cms(19);
                $this->mysmarty->assign('page_id',19);
		
		$this->mysmarty->assign('recently_added',$recently_added);
		$this->mysmarty->assign('most_funded',$most_funded);
		$this->mysmarty->assign('staff_pick',$staff_pick);
		$this->mysmarty->assign('succ_projects',$succ_projects);
		$this->mysmarty->assign('imagebanner',$imagebanner);
		$this->mysmarty->assign('website_intro',$website_intro);
	    $this->mysmarty->assign('middlecontent','home.tpl');				
	    $this->mysmarty->display('layout.tpl');
	  }
	  function sign_in(){
		if($this->phpsession->get('user_id')!='')
		{
			redirect('home');
		}
		if($this->input->post('signin')!='')
		{
			
		$email_id=$this->input->post('email_id');
		$password=trim($this->input->post('passwrd'));	
		//echo md5($password);
		//$this->benchmark->mark('code_start');

	    $rs	=$this->homemodel->check_valid_user($email_id,md5($password));

		//$this->benchmark->mark('code_end');

		//echo $this->benchmark->elapsed_time('code_start', 'code_end');exit;
	 	
		 
		//print_r($rs);
			if($rs=='fail')
			{
				//echo 'k';
				$error='Entered Email id or Password is incorrect.';
			}
			elseif($rs=='blocked'){
				$error='Your mail account is blocked.';
			}
			elseif($rs=='not verified'){
				$error='Your are not verified mail id.';
			}
			else
			{	
				$this->phpsession->save('user_id',$rs[0]->id);
				$this->phpsession->save('email_id',$rs[0]->email_id);
				$this->phpsession->save('profile_name',$rs[0]->profile_name);
				if($this->phpsession->get('redirectToCurrent')!='')
				{  		
					$error='';
					$rediderect_url=$this->phpsession->get('redirectToCurrent');
					
					redirect($rediderect_url);
				//echo 'success';	
				}else{
					redirect('user/my_profile');
				}
			}
		}else{
			$error='';
		}
		if($this->phpsession->get('redirectToCurrent')!='')
		{ 
		$rediderect_url=$this->phpsession->get('redirectToCurrent');
		$this->mysmarty->assign('rediderect_url',$rediderect_url);
		}
		$media_content=$this->homemodel->get_cms(18);
                $this->mysmarty->assign('page_id',18);
		$this->mysmarty->assign('cms_content',$media_content);
		if($_SESSION['signout_responce']=='yes'){
		$error='You have signed out.';
		unset($_SESSION['signout_responce']);
		}
		$this->mysmarty->assign('error_msg',$error);
		$this->mysmarty->assign('middlecontent','sign_in.tpl');				
	    $this->mysmarty->display('login_layout.tpl');
	   }
	  function sign_up(){
		if($this->phpsession->get('user_id')!='')
		{
			redirect('home');
		}
		//echo $_SESSION['security_code'];
		$media_content=$this->homemodel->get_cms(18);
                $this->mysmarty->assign('page_id',18);
		$this->mysmarty->assign('cms_content',$media_content);
		$this->mysmarty->assign('middlecontent','sign_up.tpl');				
	    $this->mysmarty->display('login_layout.tpl');
	 }
	 function signup_response(){
		if($_SESSION['sign_up_sts'] =='')
		{
			redirect('home');
		}else{
			$this->mysmarty->assign('sign_up_email_id',$_SESSION['sign_up_email_id']);
			$this->mysmarty->assign('msg',$_SESSION['sign_up_sts']);
			$_SESSION['sign_up_sts']='';
			$_SESSION['sign_up_sts']='';
		}
	//	echo $_SESSION['security_code'];
		
		$this->mysmarty->assign('middlecontent','signup_success.tpl');				
	    $this->mysmarty->display('login_layout.tpl');
	 }
	 function fb_register()
	{
		
		//fb
	   $fbuser_id = $this->input->post('fb_userid'); 
	   $username  = $this->input->post('username');
	   $name	  = $this->input->post('name');
	   $email	  = $this->input->post('email');
	   
		if($fbuser_id != NULL)
		{
		 
		 
		  $stat=$this->homemodel->check_fb_user($fbuser_id);
		  
			if($stat)
			{		
				
				$this->phpsession->save('user_id',$stat[0]->id);
				$this->phpsession->save('email_id',$stat[0]->email_id);
				$this->phpsession->save('profile_name',$stat[0]->profile_name);		
				echo 1;
			}
			else
			{
				$var=$this->homemodel->check_siteemail_id($email);
				if($var !=1){
				   $ins_user 	= $this->homemodel->insert_fbuser();
				   if($ins_user !=0)
					echo 1;
					else
					echo 0;
				}else{
			  		echo 'duplicate';
			 	}
			}
		  
		}
		else
		echo 0;
	}
	function in_register()
	{
	   $in_user_id  = $this->input->post('in_user_id'); 
	   $firstName	= $this->input->post('firstName');
	   $lastName	= $this->input->post('lastName');
	   $email_id	= $this->input->post('email_id');
	   $pictureUrl	= $this->input->post('pictureUrl');
		if($in_user_id != NULL)
		{
			
		     $stat=$this->homemodel->check_In_user($in_user_id);
		  
			if($stat)
			{		
				
				$this->phpsession->save('user_id',$stat[0]->id);
				$this->phpsession->save('email_id',$stat[0]->email_id);
				$this->phpsession->save('profile_name',$stat[0]->profile_name);		
				echo 1;
			}
			else
			{
				$var=$this->homemodel->check_siteemail_id($email_id);
				if($var !=1){
				  $ins_user 	= $this->homemodel->insert_Inuser();
				   if($ins_user !=0)
					echo 1;
					else
					echo 0;
				}else{
			  		echo 'duplicate';
			 	}	
			}
		  
		}
		else
		echo 0;
	}
	function load_sign_up($user_id,$username,$email,$fname,$lname)
	{
			$user_details=array();
			$profilename=str_replace("%20",' ',$username);
			$fname=str_replace("%20",' ',$fname);
			$lname=str_replace("%20",' ',$lname);
			$user_details[0]['first_name']=$fname;
			$user_details[0]['last_name']=$lname;
			$user_details[0]['email_id']=trim($email);
			$proilepictutrepath="http://graph.facebook.com/".$user_id."/picture";
			if($user_id!='')
			{
				
				$this->mysmarty->assign('user_details',$user_details);	
				$this->mysmarty->assign('fbuser',$user_id);	
			}
			
			else
			{
				$this->mysmarty->assign('fbuser',0);	
			}
			
			//$states 	= $this->homemodel->select_states();
			//$this->mysmarty->assign('sel_states',$states);	
			$this->mysmarty->assign('picture',$proilepictutrepath);
			
			//$this->mysmarty->assign('topheader','home/header_inner.tpl');	
			//$this->mysmarty->assign('subheader','home/subheader.tpl');	
			//$this->mysmarty->assign('footer','home/footer.tpl');	
			$this->mysmarty->assign('middlecontent','sign_up.tpl');				
	   		$this->mysmarty->display('login_layout.tpl');	
		
		
	}
	 function signout(){
		 
		//$this->load->library('facebook_connect');
		//$this->mysmarty->assign('tracebackurl',"");
		//$this->facebook_connect->facebook_logout(); 
		$this->phpsession->save('profile_name','');
		$this->phpsession->save('email_id','');
		$this->phpsession->save('user_id','');
		$this->phpsession->save('redirectToCurrent','');
		$_SESSION['signout_responce']='yes';
		unset($_SESSION['promote']);
		 //login status		
		  $this->mysmarty->assign('profile_name', $this->phpsession->get('profile_name'));
			/*if($this->phpsession->get('email_id')!='')
			 {				
				 $this->mysmarty->assign('userstat', 1);	
				 $this->mysmarty->assign('after_login', "<b>Welcome<span> ".$this->phpsession->get('first_name')."</span></b>, <a href=".base_url()."signup/my_account>My account</a>");				 
			 }
			 else
			 {
				 $this->mysmarty->assign('userstat', 0);		
				 $this->mysmarty->assign('after_login', "");		   
			 }
		 //login status	*/	
		 	redirect('signin');
		//$this->mysmarty->display('inner_login.tpl');		
	
	 }
	 
	function check_already_registered() {
		echo $checkUser = $this->homemodel->check_siteemail_id();	
	}
	
	function check_captcha_code(){
		//echo $_SESSION['security_code'];
		if(md5($_POST['captcha_code']) == $_SESSION['security_code'] ) {
				return 0;
			}
		else{
				return 1;
		}
	}
	function user_registration() {
		$res=$this->check_captcha_code();
		//print_r($_POST);
		if($res ==0){
		$ins_user 	= $this->homemodel->insert_siteuser();
		if($ins_user==0){
			$_SESSION['sign_up_sts']='error';
			echo 'There is an error occured, please try again.';
		}
		else{
			$_SESSION['sign_up_sts']='success';
			echo 'Thanks for registering with fundinnovation.com';  
			}
		}
		else{
			$_SESSION['sign_up_sts']='error';
			echo $res;
			
			}
	}
	function unsubscribe($uid,$notid){
		$unsubscribe = $this->homemodel->unsubscribe($uid,$notid);	
		$this->mysmarty->assign('msg',$unsubscribe);
		$this->mysmarty->assign('middlecontent','unsubscribe_status_page.tpl');				
	    $this->mysmarty->display('login_layout.tpl');
	}
	
	function check_valid_user()
	{
		$email_id=$this->input->post('email_id');
		$password=$this->input->post('password');
				//echo $password;
	 	$rs	=	$this->homemodel->check_valid_user($email_id,md5($password)); 
		
		if($rs=='fail')
		{
			echo 'fail';
		}
		else
		{			
			$this->phpsession->save('user_id',$rs[0]->id);
			$this->phpsession->save('email_id',$rs[0]->email_id);
			$this->phpsession->save('profile_name',$rs[0]->profile_name);
			echo 'success';			
		}
	}
	function promote_project($promote_key)
	{
		$res=$this->homemodel->check_promotekey($promote_key);
		if($res != 'wrong key'){
			redirect('archive_projects/project_details/'.$res);
		}
		else{
			redirect('home');
		}
	}
	function media(){
		$media_content=$this->homemodel->get_media();
                $this->mysmarty->assign('page_id',16);
		$this->mysmarty->assign('cms_content',$media_content);
		$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('cms_layout.tpl');	
	}
	function how_it_works(){
		$media_content=$this->homemodel->get_cms(7);
                $this->mysmarty->assign('page_id',7);
		$this->mysmarty->assign('cms_content',$media_content);
		$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('cms_layout.tpl');
	}
	function about_us(){
		$media_content=$this->homemodel->get_cms(1);
                $this->mysmarty->assign('page_id',1);
		$this->mysmarty->assign('cms_content',$media_content);
		$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('cms_layout.tpl');
	}
	function faq(){
		$media_content=$this->homemodel->get_cms(9);
                $this->mysmarty->assign('page_id',9);
		$this->mysmarty->assign('cms_content',$media_content);
		$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('cms_layout.tpl');
	}
	
	function contact_us(){
		if(isset($_POST['send']) ){
			if(isset($_POST['name']) && isset($_POST['email_id']) && isset($_POST['cnt_message'])){
			//print_r($_POST);
			$contact=$this->homemodel->contact($_POST);
			}else{
			 if(!isset($_POST['name'])){
				$name_error='Please enter name...';
			 }else{
				 $name_error='';
			 }
			 if(!isset($_POST['email_id'])){
				$email_error='Please enter email id...';
			 }else{
				 $email_error='';
			 }
			 if(!isset($_POST['cnt_message'])){
				$msg_error='Please enter message...';
			 }else{
				 $msg_error='';
			 }
			}
		}else{
			$name_error='';$email_error='';$msg_error='';
		}
		$this->mysmarty->assign('message',$contact);
                $media_content=$this->homemodel->get_cms(2);
                $this->mysmarty->assign('page_id',2);
		$this->mysmarty->assign('cms_content',$media_content);
		$this->mysmarty->assign('name_error',$name_error);	
		$this->mysmarty->assign('email_error',$email_error);	
		$this->mysmarty->assign('msg_error',$msg_error);		
		$this->mysmarty->assign('middlecontent','contact_us.tpl');
	   	$this->mysmarty->display('login_layout.tpl');
	}
	function send_feedback(){
		if(isset($_POST['feedback_name']) && isset($_POST['feedback_email_id'])){
			//print_r($_POST);
			echo $feed=$this->homemodel->send_feedback($_POST);
		}
	}
	function forgot_password(){
		if($this->input->post('send')!='')
		{	
		//print_r($_POST);
		$email_id=$this->input->post('email_id');
		if(!isset($_POST['email_id']) || $_POST['email_id'] ==''){
				$response='Please enter email id.';
			 }else{
				$new_password=$this->_rand_string(7);
				$response=$this->homemodel->send_new_password($email_id,trim($new_password));
			 }
		}else{
			$response='';
		}
		$media_content=$this->homemodel->get_cms(18);
                $this->mysmarty->assign('page_id',18);
		$this->mysmarty->assign('cms_content',$media_content);
		
		$this->mysmarty->assign('response',$response);	
		$this->mysmarty->assign('middlecontent','forgot_password.tpl');
	   	$this->mysmarty->display('login_layout.tpl');
	}
	
	function _rand_string($length) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		
			$size = strlen( $chars );
			for( $i = 0; $i < $length; $i++ ) {
				$str .= $chars[rand(0,$size-1)];
			}
			return $str;
	}
	function terms(){
		$media_content=$this->homemodel->get_cms(3);
                $this->mysmarty->assign('page_id',3);
		$this->mysmarty->assign('cms_content',$media_content);
		$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('cms_layout.tpl');
	}
	function privacy_policy(){
		$media_content=$this->homemodel->get_cms(4);
                $this->mysmarty->assign('page_id',4);
		$this->mysmarty->assign('cms_content',$media_content);
		$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('cms_layout.tpl');
	}
	function knowledge_bank(){
   if($this->phpsession->get('user_id')=='')
			{
				$this->phpsession->save('redirectToCurrent', current_url());
				//echo 'ooo';
				redirect('signin','refresh');
			}else{
				$this->mysmarty->assign('profile_name',$this->phpsession->get('profile_name'));
			}
		$media_content=$this->homemodel->get_cms(15);
                $this->mysmarty->assign('page_id',15);
		$this->mysmarty->assign('cms_content',$media_content);
		$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('cms_layout.tpl');
	}
	function testimonial(){
    if($this->phpsession->get('user_id')=='')
			{
				$this->phpsession->save('redirectToCurrent', current_url());
				//echo 'ooo';
				redirect('signin','refresh');
			}else{
				$this->mysmarty->assign('profile_name',$this->phpsession->get('profile_name'));
			}
		$media_content=$this->homemodel->get_cms(13);
                $this->mysmarty->assign('page_id',13);
		$this->mysmarty->assign('cms_content',$media_content);
		$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('cms_layout.tpl');
	}
	function tools_tips(){
  if($this->phpsession->get('user_id')=='')
			{
				$this->phpsession->save('redirectToCurrent', current_url());
				//echo 'ooo';
				redirect('signin','refresh');
			}else{
				$this->mysmarty->assign('profile_name',$this->phpsession->get('profile_name'));
			}
		$media_content=$this->homemodel->get_cms(8);
		$this->mysmarty->assign('cms_content',$media_content);
                $this->mysmarty->assign('page_id',8);
		$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('cms_layout.tpl');
	}
        function cms_content($page_id){
            $media_content=$this->homemodel->get_cms($page_id);
	    $this->mysmarty->assign('cms_content',$media_content);
            $this->mysmarty->display('cms_desc.tpl');
        }
	function get_home_page_cms(){
		$media_content=$this->homemodel->get_cms(17);
                $this->mysmarty->assign('page_id',17);
		$this->mysmarty->assign('cms_content',$media_content);
	//$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('learn_more_pop.tpl');
	}
	function play_sitevideo(){
		$this->mysmarty->assign('videolink',$_POST['videolink']);
		$this->mysmarty->display('site_vid_player.tpl');
	}
	function coming_soon(){
		//$media_content=$this->homemodel->get_cms(4);
		//$this->mysmarty->assign('cms_content',$media_content);
		//$this->mysmarty->assign('middlecontent','media.tpl');				
	   	$this->mysmarty->display('coming_soon.tpl');
	}
}
?>