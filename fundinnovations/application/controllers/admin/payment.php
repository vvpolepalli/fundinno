<?php
class payment extends CI_Controller  
{		
	 public function __construct()
       {
            parent::__construct();
			$this->load->library('session');		
			if(!($this->phpsession->get('username')))
			{
				redirect('admin/login','refresh');
			}
			$this->load->model('admin/payment_model');
			$this->mysmarty->assign('adminid',$this->phpsession->get('username'));	
			$this->mysmarty->assign('baseurl',base_url());	
			$this->mysmarty->assign('header','admin/header.tpl');
			$this->mysmarty->assign('leftpane','admin/leftpane.tpl');
		    error_reporting(E_ALL ^ E_NOTICE); 	            
	   }
	   function index()
		{
		  	$order_count = $this->payment_model->orderCount();
			$this->mysmarty->assign('payment_count',$order_count);
			$this->mysmarty->assign('middlecontent','admin/payment/allpayment.tpl');	 
		 	$this->mysmarty->display('admin/layout.tpl');
		}
		function orderCount()
		{
			echo $this->payment_model->orderCount();
		}
		function load_all_payment()
		{
				$order= $this->input->post('order_by');
				if($order == "")
				{
					$order = "DESC_DATE";
				}
		
				$allpayments=$this->payment_model->load_all_payments();
				if (is_array($allpayments)) {
				foreach($allpayments as $k => $v) {
				  if($v->paymentstatus == "error") {
				    $allpayments[$k]->paymentstatus = "failure";
				  }
				  if($v->project_status == "failed") {
				    $allpayments[$k]->project_status = "unsuccesful";
				  }
				  if($v->project_status == "success") {
				    $allpayments[$k]->project_status = "sucessful";
				  }
				}
				}
				$this->mysmarty->assign('orders',$allpayments);
				$this->mysmarty->assign('orderBy',$order);
				$this->mysmarty->assign('hidcurrP','');
				$this->mysmarty->assign('paymentCount',count($allpayments));
				$this->mysmarty->assign('from_page','');
				$this->mysmarty->display('admin/payment/load_allpayment.tpl');  
			
		}
	function change_status_cntnt(){
		$this->mysmarty->assign('id',$this->input->post('id'));
			$this->mysmarty->display('admin/payment/select_bx.tpl');  
	}
	 function change_status(){
		 echo $status=$this->payment_model->change_status();
		}
}
?>