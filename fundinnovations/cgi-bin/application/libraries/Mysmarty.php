<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 require_once('Smarty/libs/Smarty.class.php');



class Mysmarty extends Smarty

{

  function Mysmarty()

	{

	$this->__Construct();	

	$this->template_dir = $_SERVER['DOCUMENT_ROOT']."/application/views";

	$this->config_dir = $_SERVER['DOCUMENT_ROOT']."/application/views/conf";

	$this->compile_dir = $_SERVER['DOCUMENT_ROOT']."/application/cache/";

	}



}



?>