<?php
ob_start();
class Enquiry extends CI_Controller
{
   function __construct()
   {
		parent::__construct();			
		
		$this->load->library('session');		
			if(!($this->phpsession->get('username')))
			{
				redirect('admin/login','refresh');
			}
		$baseurl =	$this->config->base_url();
		$this->mysmarty->assign('baseurl',base_url());	
		$this->mysmarty->assign('adminid',$this->phpsession->get('username'));			
	  //Model 
		$this->load->model('admin/enquiry_model');
		$this->load->model('admin/propertyplan_model');
		$property_plans = $this->propertyplan_model->property_plans_list();
		$this->mysmarty->assign('property_plans',$property_plans);
	  //load Header
		$this->mysmarty->assign('header','admin/header.tpl');
		$this->mysmarty->assign('middlecontent','admin/home.tpl');
	  //load LeftPane
		$this->mysmarty->assign('leftpane','admin/leftpane.tpl');
			
		
		
	//Error reporting
		error_reporting(E_ALL ^ E_NOTICE); 
		 
		
    }
	
  /* function index() {	  
		  $this->mysmarty->display('admin/layout.tpl');		
	}*/
	
   
	function index()
	{
	}
	function enquiry_lists()
	{
		 	  
			  $enquiryLists	=	$this->enquiry_model->list_enquirys_modelm(); 	  
		  	  $this->mysmarty->assign('enquiryLists',$enquiryLists);
			  $this->mysmarty->assign('propCount',count($enquiryLists));
			  $this->mysmarty->assign('middlecontent','admin/enquiry_list.tpl');	 
			  $this->mysmarty->display('admin/layout.tpl');	
			  //$this->mysmarty->assign('middlecontent','admin/enquiry.tpl');	 
		  //$this->mysmarty->display('admin/layout.tpl');	
		
	}
	function enquiry_list($id=""){
	  $enquiryList = $this->enquiry_model->list_enquiry_single($id);		
	  $this->mysmarty->assign('id',$id);
	  $this->mysmarty->assign('enquiryList',$enquiryList);
	  $this->mysmarty->assign('middlecontent','admin/enquiry_view.tpl');	 
	  $this->mysmarty->display('admin/layout.tpl');		
	}
	
	
	
	// function to send e-mail
	function sendreply($id=""){
	  $enquiryList = $this->enquiry_model->list_enquiry_single($id);		
	  $this->mysmarty->assign('id',$id);
	  $this->mysmarty->assign('enquiryList',$enquiryList);
	  $this->mysmarty->assign('middlecontent','admin/sendreply.tpl');	 
	  $this->mysmarty->display('admin/layout.tpl');		
	}
	
	 function viewproperty_type($id)
  	{
	  $baseurl 	=	$this->config->base_url();
	  $currP	= $this->input->post('currP');
	  $orderBy	= $this->input->post('order_by');
	  $this->mysmarty->assign('id',$id);
	  $enquiryList 	= $this->enquiry_model->list_enquiry_single($id);
	  $this->mysmarty->assign('enquiryList',$enquiryList);
	  //$this->mysmarty->assign('fromPage',$frompage);
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/enquiry_view.tpl');
  }
  
   function viewproperty_type_for_reply($id)
  	{
	
	  $baseurl 	=	$this->config->base_url();
	  $currP	= $this->input->post('currP');
	  $orderBy	= $this->input->post('order_by');
	  $this->mysmarty->assign('id',$id);
	  $enquiryList 	= $this->enquiry_model->list_enquiry_single($id);
	  $this->mysmarty->assign('enquiryList',$enquiryList);
	  //$this->mysmarty->assign('fromPage',$frompage);
	  $this->mysmarty->assign('currP',$currP);
	  $this->mysmarty->assign('order_by',$orderBy);
	  $this->mysmarty->display('admin/sendreply.tpl');
  }
	
	function delete_enquiry($id="")
	{
	 $order= $this->input->post('order_by');
	  if($order == "")
	  {
			$order = "DESC_DATE";
	  }
		$baseurl 	=	$this->config->base_url();
	    $currP	= $this->input->post('currP');
		
		$enquiryDeleteStatus =	$this->enquiry_model->delete_enquirym($id);
	    $searchenquiry = $this->enquiry_model->list_enquiry_after_deletem();
		$this->mysmarty->assign('currP',$currP);
	    $this->mysmarty->assign('orderBy',$order);
		$this->mysmarty->assign('searchenquiry',$searchenquiry);
		$this->mysmarty->assign('enquiryCount',count($searchenquiry));
	    $this->mysmarty->display('admin/load_enquiry.tpl');    	
		
		
		 
	}
	//function to delete only selected prop type
	function delselected_enquiry()
	{
		$order= $this->input->post('order_by');
		  if($order == "")
		  {
				$order = "DESC_DATE";
		  }
		$baseurl 	=	$this->config->base_url();
	    $currP	= $this->input->post('currP');
		$res=$this->enquiry_model->delselected_enquirym();	
		$searchenquiry = $this->enquiry_model->list_enquiry_after_deletem();
		$this->mysmarty->assign('currP',$currP);
		$this->mysmarty->assign('orderBy',$order);
		$this->mysmarty->assign('searchenquiry',$searchenquiry);
		$this->mysmarty->assign('enquiryCount',count($searchenquiry));
	    $this->mysmarty->display('admin/load_enquiry.tpl');  
		
		 
	}
	//to search property type
	function propertyTypes_list(){
		$order= $this->input->post('order_by');
		if($order == "")
		{
			$order = "DESC_DATE";
		}
		
		$searchenquiry = $this->enquiry_model->search_enquirym();
		$this->mysmarty->assign('orderBy',$order);
		$this->mysmarty->assign('searchenquiry',$searchenquiry);
		$this->mysmarty->assign('enquiryCount',count($searchenquiry));
	    $this->mysmarty->display('admin/load_enquiry.tpl'); 
		
			 
	}
	//to search property type
	function search_enquiry_on_sort($order=""){
		if($order == "")
		{
			$order = "DESC_DATE";
		}
		
		$searchenquiry = $this->enquiry_model->search_enquiry_on_sortm($order);
		$this->mysmarty->assign('orderBy',$order);
		$this->mysmarty->assign('searchenquiry',$searchenquiry);
		$this->mysmarty->assign('enquiryCount',count($searchenquiry));
	    $this->mysmarty->display('admin/load_enquiry.tpl');  
	}
	//to get count of property type
	function countEnquiry()	{
			//print_r($_POST); 
		$count = $this->enquiry_model->enquiry_count_req();
		echo $count;
	}
	
	function searchCount()	{
		
		$count = $this->enquiry_model->enquiry_count_req1();
		echo $count;
	}
	
	function sendreply_action($id="")
	{			
		 
		 
		 if($_POST['enquiry_content']=='')		 			  					
			  $this->mysmarty->assign('content','no');			 
		 else
		 {
			 
			 $string = $_POST['enquiry_content'];
			 $Patternn ="/^<p>(&nbsp;( ?)*)*<\/p>$/";
			if(preg_match_all($Patternn, $string, $nameMatches))
			{
					$this->mysmarty->assign('content','no');		
			}
			else
			{
					 $CmsAddStatus		=	$this->enquiry_model->send_emailm($_POST,$id);
			         $this->mysmarty->assign('content','yes');		
			}			 
					
		 }
		     $enquiryList = $this->enquiry_model->list_enquiry_single($id);		
	  		$this->mysmarty->assign('id',$id);
	  		$this->mysmarty->assign('enquiryList',$enquiryList);
			  $this->mysmarty->assign('middlecontent','admin/sendreply.tpl');	 
			  $this->mysmarty->display('admin/layout.tpl');	
		
	}
	
	
	
	
	
}