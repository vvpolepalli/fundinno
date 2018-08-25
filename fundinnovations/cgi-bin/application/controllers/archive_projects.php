<?php

class archive_projects extends CI_Controller  

{		

protected $EBSCREDENTIALS;

	 public function __construct()

       {

            parent::__construct();

			//$this->benchmark->elapsed_time();

			$this->load->library('session');

			

			//login status		

			

			if($this->phpsession->get('user_id')!='')

			 {				

				 $this->mysmarty->assign('profile_name',$this->phpsession->get('profile_name'));		 

			 }

			 else

			 {

				 $this->mysmarty->assign('profile_name','');			   

			 }

		 //login status

		 	$this->mysmarty->assign('user_id',$this->phpsession->get('user_id'));	

		 	$this->load->model('archive_projectmodel');

			$this->load->model('projectmodel');

			$this->load->model('ebsmodel','ebs');

			$this->EBSCREDENTIALS=$this->ebs->_load_ebs_credentials();

			$media=$this->archive_projectmodel->media_banner_list();

			$this->mysmarty->assign('media',$media);

			//$this->mysmarty->assign('adminid',$this->phpsession->get('username'));	

			$this->mysmarty->assign('baseurl',base_url());	

			$this->mysmarty->assign('header','header.tpl');

			$this->mysmarty->assign('footer','footer.tpl');

		    error_reporting(E_ALL ^ E_NOTICE); 	            

       }

	

	  function index()

	  {

		$category_list  = $this->archive_projectmodel->category_list(); 

		//$city_list		= $this->archive_projectmodel->city_list(); 

		$city_list		= $this->archive_projectmodel->proj_city_list(); 

		$most_funded	= $this->archive_projectmodel->most_funded('',0,10); 

		$recently_added = $this->archive_projectmodel->recently_added('',0,10);

		$staff_pick		= $this->archive_projectmodel->staff_pick('',0,10);

		$succ_projects	= $this->archive_projectmodel->succ_projects('',0,10);

		

		$this->mysmarty->assign('recently_added',$recently_added);

		$this->mysmarty->assign('most_funded',$most_funded);

		$this->mysmarty->assign('staff_pick',$staff_pick);

		$this->mysmarty->assign('succ_projects',$succ_projects);

		

		$this->mysmarty->assign('category_list',$category_list);

		$this->mysmarty->assign('city_list',$city_list);

		

		$this->mysmarty->assign('middlecontent','projects/projects_list_home.tpl');				

	    $this->mysmarty->display('layout.tpl');

	  }

	  function save_redirect_page(){

		 $proj_id=$this->input->post('project_id');

		 $this->phpsession->save('redirectToCurrent',base_url().'archive_projects/project_details/'.$proj_id);

		}

	  function city_auto_suggest(){

		  $locations = $this->archive_projectmodel->auto_suggest();

          echo $locations;

	 }

	  function get_country($cntry_id='')

	   {

		  $states		= $this->archive_projectmodel->select_statesByCid($cntry_id);

		  $this->mysmarty->assign('sel_states',$states);

		  $this->mysmarty->display('paymnt_states.tpl');

		} 

	  function payment_form(){

		

		$country 	= $this->archive_projectmodel->select_country();
		$order_id 	= $this->phpsession->get('order_id');
		
		

	 	$this->mysmarty->assign('sel_country',$country);
	 	$this->mysmarty->assign('order_id',$order_id);

		  if($_POST['proj_id'] !=''){

			//print_r($_POST);

			  if($_POST['reward'] !='no'){

				$reward_det=$this->archive_projectmodel->get_reward_det($_POST['reward']);

				$reward_selected=$_POST['reward'];

				$pledge_amount=$reward_det['pledge_amount'];

				}else{

					$pledge_amount=$_POST['pledge_amt'];

					$reward_selected='';

				}

				$check_fundinnovation_cash = $this->archive_projectmodel->check_fundinnovation_cash();

				//echo $check_fundinnovation_cash;

				if($pledge_amount >$check_fundinnovation_cash){

					//echo 'ppf';

					$amount = $pledge_amount-$check_fundinnovation_cash;

					$fundinnovation_cash=$check_fundinnovation_cash;

				}elseif($pledge_amount < $check_fundinnovation_cash){

					$amount = 0;

					$fundinnovation_cash=$pledge_amount;

				}else{

					$amount=0;

					$fundinnovation_cash=$check_fundinnovation_cash;

				}

				if($fundinnovation_cash ==''){

					$fundinnovation_cash=0;

				}

				

			$this->phpsession->save('pledge_amount',$pledge_amount);

			$this->phpsession->save('fundinnovation_cash',$fundinnovation_cash);

			$this->phpsession->save('reward_selected',$reward_selected);

			//$this->phpsession->get('reward_selected');

			$this->phpsession->save('proj_id',$_POST['proj_id']);

			//$this->load->helper('string');

			//$order_id=random_string('alnum',6);

			//$order_id="P".$_POST['proj_id']."-".$order_id;

			//$this->phpsession->save('order_id',$order_id);

			$tbl_insertedid=$this->archive_projectmodel->insert_order($amount);

			$this->phpsession->save('tbl_insertedid',$tbl_insertedid);

			if($amount !=0){

		  /* Comment This Section Once Live */

			

				/*#################### EBS PAYMENT GATEWAY CREDENTIALS IN DEMO MODE ####################

				$account_id="5880"; 

				$secretkey="ebskey";

				$mode="TEST";

				$return_url=base_url()."ebs_pg/response.php?DR={DR}";

				############################################################################

				
*/
			

			/* Comment This Section Once Live   */

			

			

			/* Enable This Section Once Live */

					

					

					############################# EBS PAYMENT GATEWAY CREDENTIALS IN LIVE MODE #######################

					$ebs_credentials=json_decode($this->EBSCREDENTIALS);

					$account_id=$ebs_credentials[0]->account_id;
					//$account_id =12733;
					$account_name=$ebs_credentials[0]->account_name;
					//$account_name='Oneoverpi Solutions Private Limited'	;
					$WorkingKey=$ebs_credentials[0]->secret_key;
					//$secretkey='cb37e1633db4ff048d6dbd08f61db52b';
					$mode="LIVE";

					$return_url=base_url()."ebs_pg/response.php?DR={DR}";

					##################################################################################################
                    
					

			

			/* Enable This Section Once Live */

			//$description=$list_name;

			$reference_no =$this->phpsession->get('order_id');
             $Checksum = $this->archive_projectmodel->getCheckSum($account_id,$amount,$reference_no ,$return_url,$WorkingKey);
					$this->mysmarty->assign('WorkingKey',$WorkingKey);
                    $this->mysmarty->assign('Checksum',$Checksum);
			//$amount		  = $_POST['transfer_amnt'];

			
			$hash = $secretkey."|".$account_id."|".$amount."|".$reference_no."|".$return_url."|".$mode;

			$secure_hash = md5($hash);


			$this->mysmarty->assign('account_id',$account_id);

			$this->mysmarty->assign('return_url',$return_url);

			$this->mysmarty->assign('mode',$mode);

			$this->mysmarty->assign('reference_no',$reference_no);

			$this->mysmarty->assign('amount',$amount);

			$this->mysmarty->assign('secure_hash',$secure_hash);

			$this->mysmarty->assign('description','live');

			
			$this->mysmarty->assign('proj_id',$_POST['proj_id']);

			$this->mysmarty->assign('fundinnovation_cash',$fundinnovation_cash);

			//$this->mysmarty->assign('amount',$amount);

			$this->mysmarty->assign('reward_selected',$reward_selected);

			$this->mysmarty->assign('pledge_amount',$pledge_amount);

			$this->mysmarty->assign('middlecontent','projects/payment_form.tpl');				

			$this->mysmarty->display('layout.tpl');

			}

			else{

				//$this->load->helper('string');

				//$order_id=random_string('alnum',6);

				//$order_id="P".$_POST['proj_id']."-".$order_id;

				//$this->phpsession->save('order_id',$order_id);

				$this->mysmarty->assign('amount',$amount);

				$this->mysmarty->assign('proj_id',$_POST['proj_id']);

				$this->mysmarty->assign('fundinnovation_cash',$fundinnovation_cash);

				$this->mysmarty->assign('reward_selected',$reward_selected);

				$this->mysmarty->assign('pledge_amount',$pledge_amount);

				$this->mysmarty->assign('middlecontent','projects/fundinnovation_pay.tpl');				

				$this->mysmarty->display('layout.tpl');

			}

		  }

		else{

			redirect('home');

			}

		 }

	function processOrder($response)

	{

		//if($this->phpsession->get('proj_id') !='' && $this->phpsession->get('user_id') !=''){

			

		$transactiondetails=unserialize(rawurldecode($response));
		//print_r($transactiondetails);
		//exit;

		$orderId=$this->phpsession->get('order_id');

		$transactionId=$transactiondetails['TransactionID'];

		

		if($orderId=='' || $this->phpsession->get('user_id') =='' || $this->phpsession->get('proj_id') =='' || $this->phpsession->get('pledge_amount') =='' ):

//print_r($_SESSION);

			$this->phpsession->save('order_id','');

			$this->phpsession->save('proj_id','');

			$this->mysmarty->assign('orderid',$orderId);

			$this->phpsession->save('pledge_amount','');

			$this->phpsession->save('fundinnovation_cash','');

			$this->phpsession->save('reward_selected','');

			$this->mysmarty->assign('message','Invalid Transaction ');

			$this->mysmarty->assign('middlecontent','projects/order_sucess.tpl');

			$this->mysmarty->display('layout.tpl');



		else:

		$status 	= $this->archive_projectmodel->update_order($transactiondetails);
        
		//$status=$this->order->processOrder($transactiondetails);



		if($status == 1 || $status == 2):



			$this->phpsession->save('order_id','');

			//$this->phpsession->save('referenceurl','');

			$this->phpsession->save('listDescription','');

			$this->phpsession->save('proj_id','');

			$this->phpsession->save('pledge_amount','');

			$this->phpsession->save('fundinnovation_cash','');

			$this->phpsession->save('reward_selected','');

			$this->mysmarty->assign('orderid',$orderId);

			$this->mysmarty->assign('transactionId',$transactionId);

			$this->mysmarty->assign('message',$status);

			$this->mysmarty->assign('middlecontent','projects/order_sucess.tpl');

			$this->mysmarty->display('layout.tpl');

		elseif($status ==0) :

		

			$this->phpsession->save('order_id','');

			$this->mysmarty->assign('orderid',$orderId);

			//$this->mysmarty->assign('transactionId',$transactionId);

			$this->phpsession->save('proj_id','');

			$this->phpsession->save('pledge_amount','');

			$this->phpsession->save('fundinnovation_cash','');

			$this->phpsession->save('reward_selected','');

			//$this->phpsession->save('referenceurl','');

			$this->phpsession->save('listDescription','');

			$this->mysmarty->assign('message',$status);

			$this->mysmarty->assign('middlecontent','projects/order_sucess.tpl');

			$this->mysmarty->display('layout.tpl');

		else :

			$this->phpsession->save('order_id','');

			$this->mysmarty->assign('orderid',$orderId);

			//$this->mysmarty->assign('transactionId',$transactionId);

			$this->phpsession->save('proj_id','');

			$this->phpsession->save('pledge_amount','');

			$this->phpsession->save('fundinnovation_cash','');

			$this->phpsession->save('reward_selected','');

			//$this->phpsession->save('referenceurl','');

			$this->phpsession->save('listDescription','');
            
			if($status == 3 || $status == 4):
			$this->mysmarty->assign('message',$status);
            else :
			$this->mysmarty->assign('message','This order already proccessed.');
			endif;
			
			$this->mysmarty->assign('middlecontent','projects/order_sucess.tpl');

			$this->mysmarty->display('layout.tpl');

		endif;



		endif;

		//}

		/*else{

				$this->phpsession->save('order_id','');

				$this->phpsession->save('proj_id','');

				$this->phpsession->save('pledge_amount','');

				$this->phpsession->save('fundinnovation_cash','');

				$this->phpsession->save('reward_selected','');

				$this->mysmarty->assign('orderid','');

				$this->mysmarty->assign('message','Session expired');

				$this->mysmarty->assign('middlecontent','projects/order_sucess.tpl');

				$this->mysmarty->display('layout.tpl');

		}*/



	}
	function cancel_order($proj_id=''){
		if($proj_id){
			$cancel_order_id=$this->phpsession->get('tbl_insertedid');
			if($cancel_order_id)
			$this->archive_projectmodel->cancel_order($proj_id,$cancel_order_id);
			
			$this->phpsession->save('order_id','');
			$this->phpsession->save('proj_id','');
			$this->phpsession->save('pledge_amount','');
			$this->phpsession->save('fundinnovation_cash','');
			$this->phpsession->save('reward_selected','');
			$this->mysmarty->assign('orderid','');
				
			redirect('archive_projects/project_details/'.$proj_id);
		}else
		redirect('home');
	}
	function payment_form1(){

	//	echo '<pre>';print_r($_POST);echo '</pre>';

		if($_POST['proj_id'] !=''){

		if($_POST['reward'] !='no'){

			$reward_det=$this->archive_projectmodel->get_reward_det($_POST['reward']);

			$reward_selected=$_POST['reward'];

			$amount=$reward_det['pledge_amount'];

		}else{

			$amount=$_POST['pledge_amt'];

			$reward_selected='';

		}

		$check_fundinnovation_cash = $this->archive_projectmodel->check_fundinnovation_cash();

		if($amount >$check_fundinnovation_cash){

			$transfer_amnt = $amount-$check_fundinnovation_cash;

			$fundinnovation_cash=$check_fundinnovation_cash;

		}elseif($amount < $check_fundinnovation_cash){

			$transfer_amnt = 0;

			$fundinnovation_cash=$amount;

		}else{

			$transfer_amnt=0;

			$fundinnovation_cash=$check_fundinnovation_cash;

		}

		$this->mysmarty->assign('proj_id',$_POST['proj_id']);

		$this->mysmarty->assign('fundinnovation_cash',$fundinnovation_cash);

		$this->mysmarty->assign('amount',$amount);

		$this->mysmarty->assign('reward_selected',$reward_selected);

		$this->mysmarty->assign('transfer_amnt',$transfer_amnt);

		

		$this->mysmarty->assign('middlecontent','projects/payment_form.tpl');				

	    $this->mysmarty->display('layout.tpl');

		}else{

			redirect('home');

		}

	}

	function continue_payment(){

		if($_POST['proj_id'] !=''){

		if($this->phpsession->get('order_id') !='' && $this->phpsession->get('user_id') !='' && $this->phpsession->get('proj_id') !='' && $this->phpsession->get('pledge_amount') !='' ){

		

			//echo '<pre>';print_r($_POST);echo '</pre>';

		/*	$this->phpsession->save('pledge_amount',$pledge_amount);

			$this->phpsession->save('fundinnovation_cash',$fundinnovation_cash);

			$this->phpsession->save('reward_selected',$reward_selected);

			$this->phpsession->save('proj_id',$_POST['proj_id']);*/

			

			$res['Amount'] =0;

			$res['ResponseCode']=0;

			$insert 	= $this->archive_projectmodel->update_order($res);

			if($insert>0){

				$this->phpsession->save('order_id','');

				$this->phpsession->save('proj_id','');

				$this->phpsession->save('pledge_amount','');

				$this->phpsession->save('fundinnovation_cash','');

				$this->phpsession->save('reward_selected','');

				$this->mysmarty->assign('orderid','');

				$this->mysmarty->assign('orderstatus','success');

				$this->mysmarty->assign('message','Successfully supported.');

			}

			else{

				$this->phpsession->save('order_id','');

				$this->phpsession->save('proj_id','');

				$this->phpsession->save('pledge_amount','');

				$this->phpsession->save('fundinnovation_cash','');

				$this->phpsession->save('reward_selected','');

				$this->mysmarty->assign('orderid','');

				$this->mysmarty->assign('orderstatus','invalid');

				$this->mysmarty->assign('message','Invalid Transaction.');

				}

			$this->mysmarty->assign('middlecontent','projects/order_sucess.tpl');

			$this->mysmarty->display('layout.tpl');

			//redirect('archive_projects/project_details/'.$_POST['proj_id']);

		}

		else{

				$this->phpsession->save('order_id','');

				$this->phpsession->save('proj_id','');

				$this->phpsession->save('pledge_amount','');

				$this->phpsession->save('fundinnovation_cash','');

				$this->phpsession->save('reward_selected','');

				$this->mysmarty->assign('orderid','');

				$this->mysmarty->assign('message','Session expired');

				$this->mysmarty->assign('orderstatus','invalid');

				$this->mysmarty->assign('middlecontent','projects/order_sucess.tpl');

				$this->mysmarty->display('layout.tpl');

		}

		}else{

			redirect('home');

		}

	}

	

	function search(){

		 if($_POST['sr_project_title'] !='' && $_POST['sr_project_title'] !='Search projects')

		{

		 $category_list  = $this->archive_projectmodel->category_list(); 

		 $city_list		= $this->archive_projectmodel->proj_city_list();

		 //print_r($_POST['sr_project_title']);

		 $this->mysmarty->assign('category_list',$category_list);

		 $this->mysmarty->assign('city_list',$city_list);

		 $this->mysmarty->assign('search_param',$_POST['sr_project_title']);

		 $this->mysmarty->assign('middlecontent','projects/projects_list_home.tpl');				

		 $this->mysmarty->display('layout.tpl');

		}

		else

		 redirect('archive_projects');

	  }

	  function search_projects(){

	//	$pagination ='';

		$projects_list_cnt	= $this->archive_projectmodel->projects_list_cnt();

		$projects_list		= $this->archive_projectmodel->projects_list();

		//echo '<pre>';print_r($projects_list);$projects_list_cnt;echo "$projects_list_cnt</pre>";

		$this->mysmarty->assign('projects_list',$projects_list);

		$this->mysmarty->assign('startp',$this->input->post('startp'));

		$this->mysmarty->assign('projects_list_cnt',$projects_list_cnt);

		$this->mysmarty->display('projects/project_list.tpl');

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

	  function project_details($proj_id='',$promote_key='')

	  {

		 if($proj_id =='' || !is_numeric($proj_id))

		 redirect('archive_projects');

		 else{

			 $project_view_st	    = $this->archive_projectmodel->get_project_by_id($proj_id);

			if($project_view_st['access_status'] ==1 && $this->phpsession->get('user_id') ==''){

				 redirect('archive_projects');

			}

			//print_r($_SESSION['promote']);

			$project_det	    = $this->archive_projectmodel->get_project_det($proj_id);

			$project_det_counts = $this->archive_projectmodel->project_det_counts($proj_id,$project_view_st['project_status']);

			$project_status 	= $this->archive_projectmodel->check_project_status($proj_id);

			if($promote_key !=''){

				$res=$this->archive_projectmodel->check_promotekey($promote_key);

			}

			//print_r($project_status);

			if(!empty($project_det)){

			$this->mysmarty->assign('project_status',$project_status);

			$this->mysmarty->assign('project_det_counts',$project_det_counts);

			$this->mysmarty->assign('project_det',$project_det);

				

			$this->mysmarty->assign('proj_id',$proj_id);	

			$this->mysmarty->assign('middlecontent','projects/project_details.tpl');				

			$this->mysmarty->display('projects/project_layout.tpl');

			}else{

				 redirect('archive_projects');

			}

		 }

	  }

	   function project_details_test($proj_id='',$promote_key='')

	  {

		 if($proj_id =='' || !is_numeric($proj_id))

		 redirect('archive_projects');

		 else{

			 $project_view_st	    = $this->archive_projectmodel->get_project_by_id($proj_id);

			if($project_view_st['access_status'] ==1 && $this->phpsession->get('user_id') ==''){

				 redirect('archive_projects');

			}

			//print_r($_SESSION['promote']);

			$project_det	    = $this->archive_projectmodel->get_project_det($proj_id);

			$project_det_counts = $this->archive_projectmodel->project_det_counts($proj_id);

			$project_status 	= $this->archive_projectmodel->check_project_status($proj_id);

			if($promote_key !=''){

				$res=$this->archive_projectmodel->check_promotekey($promote_key);

			}

			//print_r($project_status);

			if(!empty($project_det)){

			$this->mysmarty->assign('project_status',$project_status);

			$this->mysmarty->assign('project_det_counts',$project_det_counts);

			$this->mysmarty->assign('project_det',$project_det);

				

			$this->mysmarty->assign('proj_id',$proj_id);	

			$this->mysmarty->assign('middlecontent','projects/pro_det_test.tpl');				

			$this->mysmarty->display('projects/project_layout.tpl');

			}else{

				 redirect('archive_projects');

			}

		 }

	  }

	  function project_description($proj_id='')

	  {

		 if($proj_id =='' || !is_numeric($proj_id))

		 redirect('archive_projects');

		 else{

			 $project_det	    = $this->archive_projectmodel->get_project_det($proj_id);

			 	$this->mysmarty->assign('project_det',$project_det);

			 $this->mysmarty->display('projects/project_description.tpl');

			 

		 }

	  }

	  function project_videos($proj_id='')

	  {

		 if($proj_id =='' || !is_numeric($proj_id))

		 redirect('archive_projects');

		 else

		 {

			 $project_view_st	    = $this->archive_projectmodel->get_project_by_id($proj_id);

			if($project_view_st['access_status'] ==1 && $this->phpsession->get('user_id') ==''){

				 redirect('archive_projects');

			}

			//$project_det=$this->archive_projectmodel->get_project_det($proj_id);

			$proj_videos=$this->projectmodel->get_project_videos($proj_id);

			//if(!empty($proj_videos)){

			$project_det_counts = $this->archive_projectmodel->project_det_counts($proj_id,$project_view_st['project_status']);

			$project_status 	= $this->archive_projectmodel->check_project_status($proj_id);

			$this->mysmarty->assign('project_status',$project_status);

			$this->mysmarty->assign('project_det_counts',$project_det_counts);

			//}

			//else{

				//redirect('archive_projects');

			//}

		 }

		$this->mysmarty->assign('proj_videos',$proj_videos);	

		//$this->mysmarty->assign('project_det',$project_det);

		$this->mysmarty->assign('proj_id',$proj_id);	

		$this->mysmarty->assign('middlecontent','projects/projects_videos.tpl');				

	    $this->mysmarty->display('layout.tpl');

	  }

	  function project_images($proj_id=''){

		 if($proj_id =='' || !is_numeric($proj_id))

		 redirect('archive_projects');

		 else

		 {

			 $project_view_st	    = $this->archive_projectmodel->get_project_by_id($proj_id);

			$project_main_img       =   $project_view_st;

			if($project_view_st['access_status'] ==1 && $this->phpsession->get('user_id') ==''){

				 redirect('archive_projects');

			}

			$proj_photos = $this->projectmodel->get_project_photos($proj_id);

			//if(!empty($proj_photos)){

			$project_det_counts = $this->archive_projectmodel->project_det_counts($proj_id,$project_view_st['project_status']);
			$project_status 	= $this->archive_projectmodel->check_project_status($proj_id);

			$this->mysmarty->assign('project_status',$project_status);

			$this->mysmarty->assign('project_main_img',$project_main_img);

			$this->mysmarty->assign('project_det_counts',$project_det_counts);

			$this->mysmarty->assign('proj_photos',$proj_photos);

			//}

			//else{

				//redirect('archive_projects');

			//}

			//$project_det=$this->projectmodel->get_project_det($proj_id);

		}

		

		$this->mysmarty->assign('proj_id',$proj_id);

		//$this->mysmarty->assign('project_det',$project_det);	

		$this->mysmarty->assign('middlecontent','projects/projects_images.tpl');				

	    $this->mysmarty->display('layout.tpl');

	  }

	  function project_backers($proj_id=''){

		 if($proj_id =='' || !is_numeric($proj_id))

		  redirect('archive_projects');

		 else{

			 $project_view_st	    = $this->archive_projectmodel->get_project_by_id($proj_id);

			if($project_view_st['access_status'] ==1 && $this->phpsession->get('user_id') ==''){

				 redirect('archive_projects');

			}

			

			$proj_backers = $this->archive_projectmodel->get_project_backers($proj_id,$project_view_st['project_status']);

			//if(!empty($proj_backers)){

			$project_det_counts = $this->archive_projectmodel->project_det_counts($proj_id,$project_view_st['project_status']);
			$project_status 	= $this->archive_projectmodel->check_project_status($proj_id);

			$this->mysmarty->assign('project_status',$project_status);

			$this->mysmarty->assign('project_det_counts',$project_det_counts);

			$this->mysmarty->assign('proj_backers',$proj_backers);

			//}

			//else{

				//redirect('archive_projects');

			//}

		 }

		$this->mysmarty->assign('proj_id',$proj_id);

		//$this->mysmarty->assign('project_det',$project_det);	

		$this->mysmarty->assign('middlecontent','projects/project_backers.tpl');				

	    $this->mysmarty->display('layout.tpl');

	  }

	  

	 function project_comments($proj_id=''){

		 if($proj_id =='' || !is_numeric($proj_id))

		  redirect('archive_projects');

		 else{

			 $project_view_st	    = $this->archive_projectmodel->get_project_by_id($proj_id);

			if($project_view_st['access_status'] ==1 && $this->phpsession->get('user_id') ==''){

				 redirect('archive_projects');

			}

			if(!($this->phpsession->get('user_id')))

		  	{

			  $this->phpsession->save('redirectToCurrent', current_url());

		  	}

			$proj_comments = $this->archive_projectmodel->get_project_comments($proj_id);

			//if(!empty($proj_comments)){

			$project_det_counts = $this->archive_projectmodel->project_det_counts($proj_id,$project_view_st['project_status']);
			$project_status 	= $this->archive_projectmodel->check_project_status($proj_id);

			$this->mysmarty->assign('project_status',$project_status);	

			$this->mysmarty->assign('project_det_counts',$project_det_counts);

			$this->mysmarty->assign('proj_comments',$proj_comments);

			//}

			//else{

			//	redirect('archive_projects');

			//}

		  }

		$this->mysmarty->assign('proj_id',$proj_id);

		$this->mysmarty->assign('middlecontent','projects/project_comments.tpl');				

	    $this->mysmarty->display('layout.tpl');

	  }

	 function project_admin_commets($proj_id=''){

		 if($proj_id =='' || !is_numeric($proj_id))

		  redirect('archive_projects');

		 else{

			 $project_view_st	    = $this->archive_projectmodel->get_project_by_id($proj_id);

			if($project_view_st['access_status'] ==1 && $this->phpsession->get('user_id') ==''){

				 redirect('archive_projects');

			}

			$project_status 	= $this->archive_projectmodel->check_project_status($proj_id);

			$user_id			= $this->phpsession->get('user_id');

			if($project_status['user_id'] != $user_id || $user_id ==''){

			 redirect('archive_projects');

			}

			$proj_comments = $this->archive_projectmodel->get_admin_comments($proj_id);

			//if(!empty($proj_comments)){

			$project_det_counts = $this->archive_projectmodel->project_det_counts($proj_id,$project_view_st['project_status']);
			

			$this->mysmarty->assign('project_status',$project_status);	

			$this->mysmarty->assign('project_det_counts',$project_det_counts);

			$this->mysmarty->assign('proj_comments',$proj_comments);

			//}

			//else{

			//	redirect('archive_projects');

			//}

		  }

		$this->mysmarty->assign('proj_id',$proj_id);

		$this->mysmarty->assign('middlecontent','projects/project_admin_comments.tpl');				

	    $this->mysmarty->display('layout.tpl');

	 }

	function project_updates($proj_id=''){

		 if($proj_id =='' || !is_numeric($proj_id))

		  redirect('archive_projects');

		 else{

			 $project_view_st	    = $this->archive_projectmodel->get_project_by_id($proj_id);

			if($project_view_st['access_status'] ==1 && $this->phpsession->get('user_id') ==''){

				 redirect('archive_projects');

			}

			

			$project_status 	= $this->archive_projectmodel->check_project_status($proj_id);

			if($project_status['project_status'] !='success'){

			 redirect('archive_projects');

			}

			$proj_updates 		= $this->archive_projectmodel->get_project_updates($proj_id);

			//if(!empty($proj_updates)){

			$project_det_counts = $this->archive_projectmodel->project_det_counts($proj_id,$project_view_st['project_status']);
			

			$this->mysmarty->assign('project_view_st',$project_view_st);	

			$this->mysmarty->assign('project_status',$project_status);	

			$this->mysmarty->assign('project_det_counts',$project_det_counts);

			$this->mysmarty->assign('proj_updates',$proj_updates);

			//}else{

			//	redirect('archive_projects');

			//}

		  }

		$this->mysmarty->assign('proj_id',$proj_id);

		$this->mysmarty->assign('middlecontent','projects/project_updates.tpl');				

	    $this->mysmarty->display('layout.tpl');

	}
function video_sts_chk(){
            $vidurl=UPLOAD_PATH.'uploads/projects/videos/original/'.$_POST['video'];
                        if(!file_exists($vidurl)){
                            echo 'yes';
                            //$res[0]['vid_sts']='no';
                        }else{
                            echo 'no';
                             //$res[0]['vid_sts']='yes';
                        }
        }
	  function play_videos()
	{
		$videolink=$this->input->post('videolink');
		$videotype=$this->input->post('videotype');
		
		if($videotype ==1):
                $vidurl=UPLOAD_PATH.'uploads/projects/videos/original/'.$videolink;    
		$videolink=$videolink;
                $vsts='';
                if(!file_exists($vidurl)){
                    $vsts= 'yes';

                }else{
                    $vsts= 'no';
                }
		endif;
		
                
                        
                $this->mysmarty->assign('videostatus',$vsts);         
		$this->mysmarty->assign('videolink',$videolink);
		$this->mysmarty->assign('videotype',$videotype);
		$this->mysmarty->display('projects/videoplayer.tpl');	
	}

	function reply_comment(){

	echo $proj_comments = $this->archive_projectmodel->reply_project_comment($_POST);

	}

	

	function post_comment(){

	echo $proj_comments = $this->archive_projectmodel->post_project_comment($_POST);

	}

	

	function star_project(){

		echo $proj_comments = $this->archive_projectmodel->star_project($_POST);

	}

	function fund_project_page(){

		$project_rewards 	= $this->archive_projectmodel->get_project_reward($_POST['project_id']);

		$this->mysmarty->assign('project_rewards',$project_rewards);

		$this->mysmarty->assign('project_id',$_POST['project_id']);

		$this->mysmarty->assign('min_pledge_amount',$_POST['min_pledge_amount']);

		$this->mysmarty->display('projects/back_popup.tpl');	

	}

	function fund_reward_page(){

		$project_rewards 	= $this->archive_projectmodel->get_reward_det($_POST['reward_id']);

		//echo '<pre>';print_r($project_rewards);echo '</pre>';

		$this->mysmarty->assign('project_rewards',$project_rewards);

		$this->mysmarty->assign('project_id',$_POST['project_id']);

		$this->mysmarty->assign('min_pledge_amount',$_POST['min_pledge_amount']);

		$this->mysmarty->display('projects/back_reward_pop.tpl');

	}

	function get_backing_terms(){

		$backing_terms 	= $this->archive_projectmodel->get_backing_terms();

		$this->mysmarty->assign('backing_terms',$backing_terms);

		$this->mysmarty->assign('project_id',$_POST['project_id']);

		$this->mysmarty->assign('amount',$_POST['amount']);

		$this->mysmarty->display('projects/back_terms_pop.tpl');	

	}

	

	

	function create_promote_lnk(){

		if($this->phpsession->get('user_id') !=''){

			$generatedKey = sha1(mt_rand(10000,99999).time().$_POST['proj_id'].$this->phpsession->get('user_id'));

			$res = $this->archive_projectmodel->save_promote_key($generatedKey,$_POST['proj_id']);

			//print($res);

			if($res == 'duplicate'){

				echo 'duplicate';

			}elseif($res=='key duplicate'){

				$generatedKey = sha1(mt_rand(10000,99999).time().$_POST['proj_id'].$this->phpsession->get('user_id'));

				$res = $this->archive_projectmodel->save_promote_key($generatedKey,$_POST['proj_id']);

				echo base_url().'promote/'.$generatedKey;

			}elseif($res == 'not funded'){

				echo 'not funded';

			}

			else{

			echo base_url().'archive_projects/project_details/'.$_POST['proj_id'].'/'.$generatedKey;

			}

		}

		//echo $generatedKey =$this->_rand_string(7,$_POST['proj_id'],$this->phpsession->get('user_id'));

	}

	function show_promote_secn(){

		$res = $this->archive_projectmodel->get_project_by_id($_POST['proj_id']);

		$this->mysmarty->assign('project_det',$res);

		$this->mysmarty->assign('promote_link',$_POST['promote_link']);

		$this->mysmarty->display('projects/ajx_share_icons.tpl');	

	}

	function _rand_string($length,$proj_id,$user_id ) {

			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

		

			$size = strlen( $chars );

			for( $i = 0; $i < $length; $i++ ) {

				$str .= $chars[rand(0,$size-1)];

			}

			return $str;

	}

   function	send_mail()

   {

	if($this->phpsession->get('user_id') !=''){

		echo $res = $this->archive_projectmodel->send_mail($_POST);

	}

	

   }

   function conatct_creator(){

	  if($this->phpsession->get('user_id') !=''){

		echo $res = $this->archive_projectmodel->conatct_creator($_POST);

	  }

   }

}

?>