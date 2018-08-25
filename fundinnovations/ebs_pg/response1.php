<?php
ini_set('get.max_value_length',2000);
	phpinfo();

	$secret_key = "ebskey";	 // Your Secret Key
	echo strlen('IXc9laP5EPzkG8rJUEkT9GPYZKb+340d1KINeq1DJAbrqc5GeRs3RVwRJ7YShbNZUyaxTmSW46lexsfKVHpZGaEckYB8lZxGuzoEV29WUbCxZ86Rhnu125hgs12+1Ql5j0LYzth+IKN32SFu+2e9n2eDeWfaVS23Ht20Mhxs40OEeI7dbyeaS/AKLd9VbhfyaDWf45vw79O6/8mmmqqG+3ShRsTiIvx/25nJq0HHooiQcczlXG33V+tLQv3DSLqgga4LaZM6JrhhH86rpqFakRp9oYFGyzD8NxEpXBKippBeOUh8GCRyqFdxbc1Punr20m6gpw4yZ30omga/Im5ZUDkfbZUcYNQViqlXk7BooUHth1h4ef0NDzRjuzBoMw7iYMI62npaVuSVObN5xBc/BL7+KliugwdgTS2zqhB40vJiSdA51VAbX6t1j6axeRSsqLAomL8WORiSLkkAnyt+4f3eGFKx/rbsiItvTSGUFQJ3u+mFFRl4tAdm9BwgFnuF3qH4LtOnkBoQO4i24jwmgc0l8WCTVSc//G3R5tbG');
	//	print($_SERVER['REQUEST_URI']);
	$der=$_GET['DR'];
		print_r($der);
if($_GET['DR'] !='') {

	 require('Rc43.php');
		
	 $DR = preg_replace("/\s/","+",$_GET['DR']);



	 $rc4 = new Crypt_RC4($secret_key);

 	 $QueryString = base64_decode($DR);

	 $rc4->decrypt($QueryString);

	 $QueryString = split('&',$QueryString);



	 $response = array();

	 foreach($QueryString as $param){

	 	$param = split('=',$param);

		$response[$param[0]] = urldecode($param[1]);

	 }
	
	 $parameter=rawurlencode(serialize($response));


 
		//$orderurl="http://50.63.135.91/archive_projects/processOrder/".$parameter;



		header("Location:".$orderurl);

}

?>

<!--<HTML>

<HEAD>

<TITLE>E-Billing Solutions Pvt Ltd - Payment Page</TITLE>

<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">

<style>

	h1       { font-family:Arial,sans-serif; font-size:24pt; color:#08185A; font-weight:100; margin-bottom:0.1em}

    h2.co    { font-family:Arial,sans-serif; font-size:24pt; color:#FFFFFF; margin-top:0.1em; margin-bottom:0.1em; font-weight:100}

    h3.co    { font-family:Arial,sans-serif; font-size:16pt; color:#000000; margin-top:0.1em; margin-bottom:0.1em; font-weight:100}

    h3       { font-family:Arial,sans-serif; font-size:16pt; color:#08185A; margin-top:0.1em; margin-bottom:0.1em; font-weight:100}

    body     { font-family:Verdana,Arial,sans-serif; font-size:11px; color:#08185A;}

	th 		 { font-size:12px;background:#015289;color:#FFFFFF;font-weight:bold;height:30px;}

	td 		 { font-size:12px;background:#DDE8F3}

	.pageTitle { font-size:24px;}

</style>

</HEAD>

<BODY LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 bgcolor="#ECF1F7">

<center>

   <table width='100%' cellpadding='0' cellspacing="0" ><tr><th width='90%'><h2 class='co'>&nbsp;EBS Payment Integration Page - Version 2</h2></th></tr></table>

     <center><h1>PHP Example</H1></center>

	<center><h3>Response</H3></center>

    <table width="600" cellpadding="2" cellspacing="2" border="0">

        <tr>

            <th colspan="2">Transaction Details</th>

        </tr>

<?php

		foreach( $response as $key => $value) {

?>			

        <tr>

            <td class="fieldName" width="50%"><?php echo $key; ?></td>

            <td class="fieldName" align="left" width="50%"><?php echo $value; ?></td>

        </tr>

<?php

		}

?>		

	</table>

</center>

<table width='100%' cellpadding='0' cellspacing="0" ><tr><th width='90%'>&nbsp;</th></tr></table>

</body>

</html>-->

