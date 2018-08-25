<?php
class City extends CI_Controller  
{		
	 public function __construct()
       {
            parent::__construct();
			//$this->load->library('session');	
			if(!($this->phpsession->get('username')))
			{
				redirect('admin/login','refresh');
			}
			$this->load->model('admin/siteuser_model');
			$this->load->model('admin/citymodel');
			$this->mysmarty->assign('adminid',$this->phpsession->get('username'));	
			$this->mysmarty->assign('baseurl',base_url());	
			$this->mysmarty->assign('header','admin/header.tpl');
			$this->mysmarty->assign('leftpane','admin/leftpane.tpl');
			error_reporting(E_ALL ^ E_NOTICE); 	
	   }
	 function index( $currP='') 
	 {	
	   $country 	= $this->siteuser_model->select_country();
	  $this->mysmarty->assign('sel_country',$country);
	  
	 // $this->mysmarty->assign('url_type',$type);
	  $this->mysmarty->assign('hidcurrP',$currP);
	  
	  $this->mysmarty->assign('middlecontent','admin/city/manage_city.tpl');
	  $this->mysmarty->display('admin/layout.tpl');	
	 }
	   
	 function add_city()
	 {
	  if($_POST['city'] !=''){
		 $res=$this->citymodel->insert_city($_POST);
		 if($res =='duplicate'){
			 $city_arr['country_id'] = $_POST['country'];
			 $city_arr['state_id']   = $_POST['state'];
			 $city_arr['city_name']  = $_POST['city'];
			 $this->mysmarty->assign('city_arr',$city_arr); 
			 $this->mysmarty->assign('updated_msg','Duplicalte city'); 
		 }else
		     redirect('admin/city');
		 }	 
	  $country 	= $this->siteuser_model->select_country();
	  $this->mysmarty->assign('sel_country',$country);
	  $this->mysmarty->assign('middlecontent','admin/city/add_city.tpl');
	  $this->mysmarty->display('admin/layout.tpl');	
     }
	 
	function searchCount()
	{
		 $count = $this->citymodel->searchcount_city();
		 echo $count;
	}
	function update_city($id=''){
		if($id !=''){
		if($_POST['city'] !='' ){
		 $res=$this->citymodel->update_city($_POST,$id);
		 if($res =='duplicate'){
			 $city_arr['CountryID'] = $_POST['country'];
			 $city_arr['state_id']   = $_POST['state'];
			 $city_arr['city_name']  = $_POST['city'];
			 $this->mysmarty->assign('city_arr',$city_arr); 
			 $this->mysmarty->assign('updated_msg','Duplicalte city'); 
		 }else
		     redirect('admin/city');
		 }	
	 
	  $country 	= $this->siteuser_model->select_country();
	  $this->mysmarty->assign('sel_country',$country);
	  $city_arr=$this->citymodel->get_city($id); 
	  $this->mysmarty->assign('city_arr',$city_arr); 
	  $this->mysmarty->assign('city_id',$id);
	  $this->mysmarty->assign('middlecontent','admin/city/add_city.tpl');
	  $this->mysmarty->display('admin/layout.tpl');
	   } else{
		  redirect('admin/city');
		  }
	}
	
   function delete_city($id){
	   //Function To Delete Single user
	
	   $order= $this->input->post('order_by');
	  	if($order == "")
	 	 {
			$order = "DESC_NAME";
	 	 }
	  	$this->mysmarty->assign('orderBy',$order);
	    $res=$this->citymodel->delete_city($id);	
	    $cities = $this->citymodel->manage_cities();
		$this->mysmarty->assign('cities',$cities);
		$this->mysmarty->assign('citiescount',count($cities));
	    $this->mysmarty->display('admin/city/load_cities.tpl');
	}
	
   function city_list()
   {
	$order= $this->input->post('order_by');
	if($order == "")
	{
		  $order = "DESC_NAME";
	}
	$this->mysmarty->assign('orderBy',$order);	
	$fromPage= $this->input->post('url_type');
	$this->mysmarty->assign('from_page',$fromPage);
	$cities = $this->citymodel->manage_cities();
	$this->mysmarty->assign('cities',$cities);
	$this->mysmarty->assign('citiescount',count($cities));
	
	$this->mysmarty->display('admin/city/load_cities.tpl');
  }
  
}
?>