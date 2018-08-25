<?php
class Category extends CI_Controller 
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
		$this->load->model('admin/categorymodel');
		/*$this->load->model('admin/siteuser_model');	*/
		$this->mysmarty->assign('header','admin/header.tpl');
		$this->mysmarty->assign('leftpane','admin/leftpane.tpl');					
		error_reporting(E_ALL ^ E_NOTICE); 						
    }
	
  function index()
  {
	   $this->mysmarty->assign('middlecontent','admin/category/manage_category.tpl');	
	   $this->mysmarty->display('admin/layout.tpl');
	}
	
  function add_new_category()
  {
	   $cat_list=$this->categorymodel->category_parent_list();
	  // echo '<pre>';print_r($cat_list);echo '</pre>';
	   $this->mysmarty->assign('cat_list',$cat_list);
	   $this->mysmarty->assign('middlecontent','admin/category/add_category.tpl');	
	   $this->mysmarty->display('admin/layout.tpl');
	}
	
  function insert_category()
  {
	echo $cat_list=$this->categorymodel->insert_new_category($_POST);
  }
  function check_category(){
		echo $cat_list=$this->categorymodel->check_category($_POST);
  }
  function searchCount()
  {
  	 $count = $this->categorymodel->searchcount_category();
   	 echo $count;
  }
  
  function category_list() 
  {
	  $order= $this->input->post('order_by');
	  if($order == "")
	  {
			$order = "DESC_DATE";
	  }
	  $this->mysmarty->assign('orderBy',$order);	
	  $fromPage= $this->input->post('url_type');
	  $this->mysmarty->assign('from_page',$fromPage);
	  $category_list = $this->categorymodel->category_list();
	  $this->mysmarty->assign('category_list',$category_list);
	  $this->mysmarty->assign('category_list_count',count($category_list));
	  $this->mysmarty->display('admin/category/load_category_list.tpl');
  }
  
  function edit_category($cat_id){
	  
  	$cat_list=$this->categorymodel->category_parent_list_byid($cat_id);
	$cat_details= $this->categorymodel->get_category_ById($cat_id);
	// echo '<pre>';print_r($cat_list);echo '</pre>';
	 $this->mysmarty->assign('cat_list',$cat_list);
	 $this->mysmarty->assign('cat_details',$cat_details);
	 $this->mysmarty->assign('middlecontent','admin/category/edit_category.tpl');	
	 $this->mysmarty->display('admin/layout.tpl');
  }
  
  function update_category()
  {
	//  hid_catid
	  echo $cat_list=$this->categorymodel->update_category($_POST);
  }
  
  function delete_category($catid)
  {
	   $order= $this->input->post('order_by');
	  	if($order == "")
	 	 {
			$order = "DESC_DATE";
	 	 }
	   $this->mysmarty->assign('orderBy',$order);
	   $res=$this->categorymodel->delete_category($catid);	
	  // $users = $this->siteuser_model->manage_site_users();
	   $category_list = $this->categorymodel->category_list();
	   $this->mysmarty->assign('category_list',$category_list);
	   $this->mysmarty->assign('category_list_count',count($category_list));
	   $this->mysmarty->display('admin/category/load_category_list.tpl');  
 }
 
 function del_select_category()
 {
	  $order= $this->input->post('order_by');
	  	if($order == "")
	  	{
			$order = "DESC_DATE";
	  	}
	   $this->mysmarty->assign('orderBy',$order);
	   $this->categorymodel->del_selected_category();
	   $category_list = $this->categorymodel->category_list();
	   $this->mysmarty->assign('category_list',$category_list);
	   $this->mysmarty->assign('category_list_count',count($category_list));
	   $this->mysmarty->display('admin/category/load_category_list.tpl'); 
 }
  
 function get_projects_bycatid(){
	 //if($_POST)
	  $project_list = $this->categorymodel->get_projects_bycatid($_POST);
	  
	   $this->mysmarty->assign('category',$_POST['category']);
	   $this->mysmarty->assign('project_list',$project_list);
	   $this->mysmarty->display('admin/category/staff_pick.tpl'); 
 } 
  
 function change_staff_pick(){
	  echo $cat_list=$this->categorymodel->change_staff_pick($_POST);
 }
  
 }
 ?>