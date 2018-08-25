<?php



class Image extends CI_Controller  

{		

	 public function __construct()

       {

            parent::__construct();		

		$this->load->model('captcha');

		//$this->load->model('Captcha');

		$this->mysmarty->assign('baseurl',  base_url() );

		header('Cache-control: private'); // IE 6 FIX

		// always modified 

		header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT'); 

		// HTTP/1.1  

		header('Cache-Control: no-store, no-cache, must-revalidate'); 

		header('Cache-Control: post-check=0, pre-check=0', false); 

		// HTTP/1.0 
		header('Pragma: no-cache');
		//phpinfo();
		//$captcha = new Captcha();
		 error_reporting(E_ALL ^ E_NOTICE); 
		$string=$this->captcha->generate_string();
		$this->captcha->show_image(132,30,$string);
		//$captcha->show_image(132, 30);
		}
}
?>