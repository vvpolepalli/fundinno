<?php
/***************************************************************************
File Name		: emailmodel.php

****************************************************************************/

class emailmodel extends  CI_Model
{
	  function __construct()
    {
        parent::__construct();
		//$this->load->database();
		//$this->load->library(array('phpsession','mysmarty'));
		
    }
	
	
	
	function user_registration_mail($toemail, $password, $name,$activation_link) {
		$baseurl = base_url();
		$message ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Login credential</title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						 <p>Dear '.$name.',</p>
						 <p >Thank you for registering with <a href="'.$baseurl.'">www.fundinnovations.com</a>.  Please use the below credentials for logging in: :</p></td>
					   </tr>
                       <tr>
           <td valign="top" style="padding:4px;">
            User id
           </td>
           <td valign="top" style="padding:4px;">
            : '.$toemail.'
           </td>
          </tr>
		  <tr>
			 <td valign="top" style="padding:4px;">
            Password
           </td>
           <td valign="top" style="padding:4px;">
            :  '.$password.'
           </td>
          </tr>';
		  if($activation_link !='')
		  $message.='<tr>
			 <td valign="top" style="padding:4px;">
             Your activation link
           </td>
           <td valign="top" style="padding:4px;">
            :  <a href="'.$activation_link.'" target="_blank" >Click Here</a> <br/> OR copy this url "'.$activation_link.'"
           </td>
          </tr>';	    
           $message.='</table>
        </p><p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
           <strong>Team Fundinnovations</strong></p>
				              </td>
      </tr>
    </table></td>
  </tr>
  
  <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>	</table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>';
		$to=$toemail;
		$subject="Welcome to Fundinnovations";
		$headers= 'From: Team Fundinnovations <admin@fundinnovations.com>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in";
		@mail($to, $subject, $message, $headers); // mail to client
	}
	
	function change_user_password_mail($toemail, $password, $name)
	{
		$baseurl = base_url();
		$message ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Password Changed</title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" width="100%" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						 <p>Dear '.$name.',</p>
						 <p >Your password for FundInnovations has been changed successfully. The new password is given below.Please do not share the password with anyone. Use the new password to login to the website. In case you are not able to login with the new password, please feel free to contact our support team. Write to us at : contact@fundinnovations.com</p></td>
					   </tr>
                       <tr>
           <td valign="top" style="padding:4px;" width="100">
            User id
           </td>
           <td valign="top"  style="padding:4px;">
            : '.$toemail.'
           </td>
          </tr>
		  <tr>
			 <td valign="top" style="padding:4px;">
            Password
           </td>
           <td valign="top" style="padding:4px;">
            :  '.$password.'
           </td>
          </tr>	
		     
                     
         </table>
        </p>
				   <p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
           <strong>Team Fundinnovations</strong></p>
		              </td>
      </tr>
	  
    </table></td>
  </tr>
 <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr></table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>';
		$to=$toemail;
		$subject="New FundInnovations Password";
		$headers= 'From: Team Fundinnovations  <admin@fundinnovations.com>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in";
		@mail($to, $subject, $message, $headers); // mail to client
	}
	function send_feedback_mail_sender($post){
		$baseurl = base_url();
		$from_name	= $post['feedback_name'];
		$subject	= $post['subject'];
		$from_email	= $post['feedback_email_id'];
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
      <p>
         <table cellpadding="0" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						<p>Dear '.$from_name.',                
				<p> Thank you for submitting your query. We will process your query at the earliest time and will get back to you soon.</p></p></td>
					   </tr>
                       
         </table>
        </p><p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
           <strong>Team Fundinnovations</strong></p>
				              </td>
      </tr>
	 
    </table></td>
  </tr>
   <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>	</table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>';
		
		$to=$from_email;
		$subject="Re :".$subject;
		$headers='From: Team Fundinnovations  <admin@fundinnovations.com>' . "\r\n";
		$headers.="MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		mail($to, $subject, $message, $headers); // mail to client
		return 'success'; 
	}
	function send_feedback_mail($post) {
		$baseurl = base_url();
		$from_name	= $post['feedback_name'];
		$subject	= $post['subject'];
		$from_email	= $post['feedback_email_id'];
		$query		= stripslashes($post['message_cntnt']);
		
		// insertion to enquiry table
		/*$datetime	= date('Y-m-d H:i:s');
		$this->db->set('first_name',$from_name);
		$this->db->set('email',$from_email);	
		$this->db->set('contact_no',$phone);	
		$this->db->set('enquiry_type','Feedback');
		$this->db->set('subject','Feedback');	
		$this->db->set('enquiry_content',$query);
		$this->db->set('datetime',$datetime);		
		$this->db->insert('enquiry');	*/
		// insertion to enquiry table
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Feedback </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>Dear Admin,                
				<p>There is an enquiry from '.$from_name.', details are given below.</p>
         <table cellpadding="0" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
				  <td class="textfild" colspan="3"></td>
				  </tr>
				  <tr>
				   <td valign="top" width="80" style="padding:4px;">Name</td>
				   <td valign="top" style="padding:4px;">:</td>
				   <td valign="top" style="padding:4px;"> '.$from_name.'</td>
				  </tr>
				  <tr>
				  <td valign="top" style="padding:4px;">Email</td>
				   <td valign="top" style="padding:4px;">:</td>
				   <td vvalign="top" style="padding:4px;"> <a href="mailto:'.$from_email.'">'.$from_email.'</a> </td>
				  </tr>
				  
				  <tr>
				   <td valign="top" style="padding:4px;">Message</td>
				   <td valign="top" style="padding:4px;">:</td>
				   <td valign="top" style="padding:4px;"> '.$query.' </td>
				  </tr>
                       
         </table>
        </p>
				              </td>
      </tr>
	 
    </table></td>
  </tr>
   <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr></table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>';
		
		$to		 = 'feedback@fundinnovations.com';
		//$subject="Enquiry - Fundinnovation ";
		$headers= 'From: '.$from_name.' <'.$from_email.'>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); // mail to client	
		return 'success'; 
		
		/*$this->load->library('phpmailer/phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); // send via SMTP
		//IsSMTP(); // send via SMTP
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = "ssl";
	    $mail->Host = "smtp.gmail.com";
	    $mail->Port = 465;
		$mail->Username = "qamailtesting8@gmail.com"; // SMTP username
		$mail->Password = "ispg123456"; // SMTP password
		$webmaster_email = $from_email; //Reply to this email ID
		//$to_email = 'knoufal29mea@gmail.com'; // Recipients email ID
		$to_email = 'qamailtesting8@gmail.com'; // Recipients email ID
		$to_name = 'fundinnovation '; // Recipient's name
		$mail->From = $webmaster_email;
		$mail->FromName = $from_name;
		$mail->AddAddress($to_email,$to_name);
		$mail->AddReplyTo($webmaster_email,$from_name);
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "Enquiry - fundinnovation ";
		$mail->Body = $message; //HTML Body
		$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
		if(!$mail->Send())
		{
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
			return 'success'; 
		}*/
	}
	
	function send_enquiry_mailm() {
		
		//print_r($_POST); exit;
		$baseurl = base_url();
		$name	= $this->input->post('name');
		$phone	= $this->input->post('phone');
		$email	= $this->input->post('email');
		$query	= $this->input->post('message');
		
		if($this->input->post('alerts') == 'Yes'){
			$alerts	= 'Interested';
		}else{
			$alerts	= 'Not Interested';
		}
		
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Feedback | Fundinnovation </title>
		<style type="text/css">
					<!--
					BODY {	
						margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;
					}
					.textfild {
						padding:4px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#030405;	
					}
					.textfild_p {
						font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#030405;	
					}
					.textfildlink{
						padding:4px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#030405;
					
					}
					.textfildlink a{
						padding:4px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#030405;
						text-decoration:none;
					}
					
					.textfildlink a:hover{
						padding:4px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#00c4fd;
						text-decoration:underline;
					}
					-->
					</style>
		</head>
		
		<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
		<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
		  <tr>
			<td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="69" border="0" usemap="#Map"  /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8; background:#efeadd "><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#030405; padding-bottom:20px; line-height:25px;">
				<p>Dear Admin,                
				<p>Therer is an enquiry from '.$name.', details are given below.</p>
				  <table width="535" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
				  <td class="textfild" colspan="3"></td>
				  </tr>
				  <tr>
				   <td width="102" valign="top" class="textfild">Name</td>
				   <td width="20" valign="top" class="textfild">:</td>
				   <td width="413" valign="top" class="textfild"> '.$name.'</td>
				  </tr>
				  <tr>
				  <td valign="top" class="textfild">Email</td>
				   <td valign="top" class="textfild">:</td>
				   <td valign="top" class="textfildlink"> <a href="mailto:'.$email.'">'.$email.'</a> </td>
				  </tr>
				  <tr>
				   <td valign="top" class="textfild">Number</td>
				  <td valign="top" class="textfild">:</td>
				  <td valign="top" class="textfild"> '.$phone.' </td>
				  </tr>
				  <tr>
				   <td valign="top" class="textfild">Message</td>
				   <td valign="top" class="textfild">:</td>
				   <td valign="top" class="textfild"> '.stripslashes($query).' </td>
				  </tr>
				 
				  <tr>
				   <td valign="top" class="textfild">Alerts on new post?</td>
				   <td valign="top" class="textfild">:</td>
				   <td valign="top" class="textfild"> '.$alerts.' </td>
				  </tr>
				 </table>
				</p>
				</td>
			  </tr>
			  <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>
			</table></td>
		  </tr>
		  <tr>
			<td height="10px" align="center" valign="bottom"  bgcolor="#FFFFFF" style="color:#fff; font-size:10px; font-family:Tahoma, arial, verdana; "></td>
		  </tr>
		</table>
		
		
		
		<map name="Map" id="Map">

		  <area shape="rect" coords="16,10,219,50" href="#" />
		</map>
		</body>
		</html>'; 
		
		$to='adseelan@yahoo.com';
		$subject="Enquiry - Fundinnovation ";
		$headers= 'From: '.$name.' <'.$email.'>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); // mail to client	
		return 'success'; 
	}
	function send_enquiry_mail_from_basic_property_detailm() {
		
		//print_r($_POST); exit;
		$baseurl = base_url();
		$name	= $this->input->post('name');
		$phone	= $this->input->post('phone');
		$email	= $this->input->post('email');
		$query	= $this->input->post('message');
		$toEmailid	= $this->input->post('agent_email_id');
		$agent_name	= $this->input->post('agent_name');
		
		
		
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Password Changed</title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" border="0" >
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						 <p>Dear '.$agent_name.',                
				<p>Therer is an enquiry from '.$name.', details are given below.</p></td>
					   </tr>
                       <tr>
           <td valign="top" style="padding:4px;">
            User id
           </td>
           <td valign="top" style="padding:4px;">
            : '.$toemail.'
           </td>
          </tr>
		  <tr>
			 <td valign="top" style="padding:4px;">
            Password
           </td>
           <td valign="top" style="padding:4px;">
            :  '.$password.'
           </td>
          </tr>	
		     
                     
         </table>
        </p>
				              </td>
      </tr>
    </table></td>
  </tr>
  <tr> <td height="10px" align="center" valign="bottom"  bgcolor="#FFFFFF" style="color:#fff; font-size:10px; font-family:Tahoma, arial, verdana; "><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td>
  </tr>	</table>
			<map name="Map" id="Map">
  <area shape="rect" coords="24,3,174,102" href="#" />
</map>
</body>
</html>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Feedback | fundinnovation </title>
		<style type="text/css">
					<!--
					BODY {	
						margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;
					}
					.textfild {
						padding:4px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#030405;	
					}
					.textfild_p {
						font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#030405;	
					}
					.textfildlink{
						padding:4px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#030405;
					
					}
					.textfildlink a{
						padding:4px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#030405;
						text-decoration:none;
					}
					
					.textfildlink a:hover{
						padding:4px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#00c4fd;
						text-decoration:underline;
					}
					-->
					</style>
		</head>
		
		<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
		<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
		  <tr>
			<td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
		  </tr>
		  <tr>
			<td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="69" border="0" usemap="#Map"  /></td>
		  </tr>
		  <tr>
			<td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8; background:#efeadd "><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#030405; padding-bottom:20px; line-height:25px;">
				<p>Dear '.$agent_name.',                
				<p>Therer is an enquiry from '.$name.', details are given below.</p>
				  <table width="535" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
				  <td class="textfild" ><img src="'.$user['profile_imgurl'].'"/>'.$user['profile_name'].'</td>
				  </tr>
				 
				 </table>
				</p>
				</td>
			  </tr>
			  <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>
			</table></td>
		  </tr>
		  <tr>
			<td height="10px" align="center" valign="bottom"  bgcolor="#FFFFFF" style="color:#fff; font-size:10px; font-family:Tahoma, arial, verdana; "></td>
		  </tr>
		</table>
		
		
		
		<map name="Map" id="Map">

		  <area shape="rect" coords="16,10,219,50" href="#" />
		</map>
		</body>
		</html>'; 
		
		//$to='adseelan@yahoo.com';
		$to = $toEmailid;
		//$to='ilayaraja_s@ispg.in';
		$subject="Enquiry - fundinnovation ";
		$headers= 'From: '.$name.' <'.$email.'>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		//$headers.= "Bcc: ilayaraja_s@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); // mail to client	
		return 'success'; 
	}
	
	function send_followed_notify($user,$project_title,$project_id,$owner){
		
		//print_r($_POST); exit;
		$baseurl = base_url();
		
		$toEmailid	= $owner['email_id'];
		//$agent_name	= $this->input->post('agent_name');
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Followed</title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 0 10px 0; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" align="center" width="456"  border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						<p>Dear '.$owner['profile_name'].',                
				<p>'.$user['profile_name'].' followed your project <a href="'.$baseurl.'archive_projects/project_details/'.$project_id.'" >'.$project_title.'</a>.</p> <table width="535" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
				  <td  valign="top">
				 <table cellpadding="5" cellspacing="5" width="100%" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
				 <tr>
				 <td width="100"> 
				  <div style="width:80px;height:80px;overflow:hidden">
				  <a  href="'.$baseurl.'profile/index/'.$user['id'].'" ><img width="80" src="'.$user['profile_imgurl'].'"/></a>
				  </div>
				 </td>
				 <td valign="top">  
				  '.$user['profile_name'].'
				 </td>
				 </tr>
				 </table> 
				  </td>
				  </tr>
				 
				 </table>
				</p><p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
           <strong>Team Fundinnovations</strong></p></td>
					   </tr>
                       
         </table>
        </p>
				              </td>
      </tr>
	  
    </table></td>
  </tr>
 <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr></table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>'; 
		
		$to = $toEmailid;
		$subject="Followed your project ";
		$headers= 'From:  Team Fundinnovations <admin@fundinnovations.com>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); //
		return 'success'; 
	}
	function send_pledge_reached_to_owner($owner,$project_det,$backed_user){
		$baseurl = base_url();
		
		$toEmailid	= $owner['email_id'];
		//$agent_name	= $this->input->post('agent_name');
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 0 10px 0; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" align="center" width="456" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						<p>Dear '.$owner['profile_name'].',                
				<p>  Your project <a href="'.$baseurl.'archive_projects/project_details/'.$project_det['id'].'" >'.$project_det['project_title'].'</a> reached funding goal.</p>
				  <table width="535" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
				  <td width="210"><a href="'.$baseurl.'archive_projects/project_details/'.$project_det['id'].'"><img  width="200" src="'.$baseurl.'uploads/projects/images/200x150/'.$project_det['project_image'].'"/></a></td><td  valign="top"><a href="'.$baseurl.'archive_projects/project_details/'.$project_det['id'].'">'.$project_det['project_title'].'</a></td>
				  </tr>
				 
				 </table>
				</p></td>
					   </tr>
                       
         </table>
        </p>
				              </td>
      </tr>
	
    </table></td>
  </tr>
    <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>
  </tr>	</table>
			<map name="Map" id="Map">
  <area shape="rect" coords="24,3,174,102" href="#" />
</map>
</body>
</html>'; 
		
		$to = $toEmailid;
		$subject="Supported your projects ";
		$headers= 'From: Team Fundinnovations <contact@fundinnovations.com>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); //
		return 'success'; 
	}
	function send_funded_notify_owner($user,$project_title,$project_id,$backed_user){
		
		//print_r($_POST); exit;
		$baseurl = base_url();
		
		$toEmailid	= $user['email_id'];
		//$agent_name	= $this->input->post('agent_name');
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Supported </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 0 10px 0; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" width="456" align="center" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						<p>Dear '.ucwords($user['profile_name']).',                
				<p><a href="'.$baseurl.'profile/index/'.$backed_user['id'].'" >'.$backed_user['profile_name'].'</a>  supported your project on FundInnovations.</p>
				  <table width="535" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
				  <td width="100"><a href="'.$baseurl.'profile/index/'.$backed_user['id'].'" width="100"><img style="width:80px" src="'.$backed_user['profile_imgurl'].'"/></a></td>
				  <td valign="top"><a href="'.$baseurl.'profile/index/'.$backed_user['id'].'" >'.$backed_user['profile_name'].'</a></td>
				  </tr>
				 </table>
				</p><p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
           <strong>Team Fundinnovations</strong></p></td>
					   </tr>
                       
         </table>
        </p>
				              </td>
      </tr>
	
    </table></td>
  </tr>
    <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>
  </tr>	</table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>'; 
		
		$to = $toEmailid;
		$subject="Supported your project on FundInnovations ";
		$headers= 'From: Team Fundinnovations <admin@fundinnovations.com>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); //
		return 'success'; 
	}
	function send_funded_notify($user,$project_title,$project_id,$backed_user){
		
		//print_r($_POST); exit;
		$baseurl = base_url();
		
		$toEmailid	= $user['email_id'];
		//$agent_name	= $this->input->post('agent_name');
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 0 10px 0; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" width="456" align="center" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						<p>Dear '.ucwords($user['profile_name']).',                
				<p><a href="'.$baseurl.'profile/index/'.$backed_user['id'].'" >'.$backed_user['profile_name'].'</a> also supported  project  <a href="'.$baseurl.'archive_projects/project_details/'.$project_id.'" >'.$project_title.'</a> on FundInnovations.</p>
				  <table width="535" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
				  <!--<td width="100"><a href="'.$baseurl.'profile/index/'.$backed_user['id'].'" ><img width="80" src="'.$backed_user['profile_imgurl'].'"/></a></td>-->
				  <td valign="top"><a href="'.$baseurl.'profile/index/'.$backed_user['id'].'" >'.$backed_user['profile_name'].'</a></td>
				  </tr>
				 </table>
				</p><p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
           <strong>Team Fundinnovations</strong></p></td>
					   </tr>
                       
         </table>
        </p>
				              </td>
      </tr>
	
    </table></td>
  </tr>
    <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>
  </tr>	</table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>'; 
		
		$to = $toEmailid;
		$subject="New supporter for Project ".$project_title." on FundInnovations";
		$headers= 'From: Team Fundinnovations <admin@fundinnovations.com>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); //
		return 'success'; 
	}
	function send_project_updated_notify($user,$project_title,$project_id){
		
		//print_r($_POST); exit;
		$baseurl = base_url();
		
		$toEmailid	= $user['email_id'];
		//$agent_name	= $this->input->post('agent_name');
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						<p>Dear '.ucwords($user['profile_name']).',                
				<p><b><a href="'.$baseurl.'archive_projects/project_details/'.$project_id.'" >'.$project_title.' </a></b> is updated by innovator, <a href="'.$baseurl.'archive_projects/project_details/'.$project_id.'" >click here to see the project  </a>.</p></p></td>
					   </tr>
                       
         </table>
        </p><p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
           <strong>Team Fundinnovations</strong></p>
				              </td>
      </tr>
	  
    </table></td>
  </tr>
 <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr></table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>'; 
		
		$to = $toEmailid;
		$subject="Project updated";
		$headers= 'From: Team Fundinnovations <admin@fundinnovations.com>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); 
		return 'success'; 
	}
	function send_project_comment_notify($user,$owner,$proj_id){
		
		//print_r($_POST); exit;
		$baseurl = base_url();
		
		$toEmailid	= $owner['email_id'];
		//$agent_name	= $this->input->post('agent_name');
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						<p>Dear '.ucwords($owner['profile_name']).',                
				<p><a href="'.$baseurl.'profile/index/'.$user['id'].'">'.$user['profile_name'].' </a>commented on your project on FundInnovations, <a href="'.$baseurl.'archive_projects/project_comments/'.$proj_id.'" >click here to see the comment</a>.</p></p></td>
					   </tr>
                       
         </table>
        </p><p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
           <strong>Team Fundinnovations</strong></p>
				              </td>
      </tr>
	  
    </table></td>
  </tr>
 <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr></table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>'; 
		
		$to = $toEmailid;
		$subject="Commented on your project";
		$headers= 'From: Team Fundinnovations <admin@fundinnovations.com>' . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); 
		return 'success'; 
	}
	function send_mail_to_creator($to,$subject,$message_cntnt,$from_name,$from_email) {
		$baseurl = base_url();
		//$from_name	= $this->input->post('name');
		//$from_email	= $this->input->post('email');
		$message_cntnt		= stripslashes($message_cntnt);
		//$enquiry 	= $this->input->post('enquiry');
		
		/*// insertion to enquiry table
		$datetime	= date('Y-m-d H:i:s');
		$this->db->set('first_name',$from_name);
		$this->db->set('email',$from_email);	
		$this->db->set('contact_no',$phone);	
		$this->db->set('enquiry_type','Contact');
		$this->db->set('subject',$enquiry);	
		$this->db->set('enquiry_content',$query);
		$this->db->set('datetime',$datetime);		
		$this->db->insert('enquiry');	
		// insertion to enquiry table*/
		
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						<p>There is an enquiry from  '.ucwords($from_name).', details are given below.</p>                
				<p> '.$message_cntnt.'</p></td>
					   </tr>
                       
         </table>
        </p>
				              </td>
      </tr>
	 
    </table></td>
  </tr>
   <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr></table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>';
		
		//$to='pramod_ck@ispg.in';
		//$subject=$enquiry." - Fundinnovation ";
		$headers='From: '.$from_name.' <'.$from_email.'>' . "\r\n";
		$headers.="MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		mail($to, $subject, $message, $headers); // mail to client
		return 'success'; 

			
	}
	
	function send_mail($to,$subject,$message_cntnt,$from_name,$from_email,$project_title) {
		$baseurl = base_url();
		//$from_name	= $this->input->post('name');
		//$from_email	= $this->input->post('email');
		$message_cntnt		= stripslashes($message_cntnt);
		//$enquiry 	= $this->input->post('enquiry');
		
		/*// insertion to enquiry table
		$datetime	= date('Y-m-d H:i:s');
		$this->db->set('first_name',$from_name);
		$this->db->set('email',$from_email);	
		$this->db->set('contact_no',$phone);	
		$this->db->set('enquiry_type','Contact');
		$this->db->set('subject',$enquiry);	
		$this->db->set('enquiry_content',$query);
		$this->db->set('datetime',$datetime);		
		$this->db->insert('enquiry');	
		// insertion to enquiry table*/
		
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;line-height:14px" >
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
		   	<p>Hi,
						<p>Your friend '.ucwords($from_name).', supported a project <b>'.$project_title.'</b> on FundInnovations.Click on the below link to extend your support by pre-ordering an innovative product from FundInnovations.</p></p>
						            
				<p> '.$message_cntnt.'</p></td>
					   </tr>
                       
         </table>
        </p>
				              </td>
      </tr>
	 
    </table></td>
  </tr>
   <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>	</table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>';
		
		//$to='pramod_ck@ispg.in';
		//$subject=$enquiry." - Fundinnovation ";
		$headers='From: '.$from_name.' <'.$from_email.'>' . "\r\n";
		$headers.="MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		//$headers.= "Bcc: sumesh_c@ispg.in \r\n";
		@mail($to, $subject, $message, $headers); // mail to client
		return 'success'; 

			
	}
	
	function send_contactus_mail($post) {
		$baseurl = base_url();
		$from_name	= $post['name'];
		$phone		= $post['contact_no'];
		$from_email	= $post['email_id'];
		//$query		= stripslashes($post['cnt_message']);
		$enquiry 	= stripslashes($post['cnt_message']);
		
		/*// insertion to enquiry table
		$datetime	= date('Y-m-d H:i:s');
		$this->db->set('first_name',$from_name);
		$this->db->set('email',$from_email);	
		$this->db->set('contact_no',$phone);	
		$this->db->set('enquiry_type','Contact');
		$this->db->set('subject',$enquiry);	
		$this->db->set('enquiry_content',$query);
		$this->db->set('datetime',$datetime);		
		$this->db->insert('enquiry');	
		// insertion to enquiry table*/
		
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
       <p>
         <table cellpadding="0" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						
						<p>Dear Admin,                
				<p>There is an enquiry from  '.ucwords($from_name).', details are given below.</p>
				  <table width="535" border="0" cellpadding="0" cellspacing="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
                  <tr>
				  <td  colspan="3"></td>
				  </tr>
				  <tr>
				   <td width="104" valign="top" style="padding:4px;">Name</td>
				   <td width="17" valign="top" style="padding:4px;">:</td>
				   <td width="414" valign="top" style="padding:4px;"> '.ucwords($from_name).'</td>
				  </tr>
				  <tr>
				  <td valign="top" style="padding:4px;">Email</td>
				   <td valign="top" style="padding:4px;">: </td>
				   <td valign="top" style="padding:4px;"><a href="mailto:'.$from_email.'">'.$from_email.'</a></td>
				  </tr>
				  <tr>
				   <td valign="top" style="padding:4px;">Number</td>
				  <td valign="top" style="padding:4px;">:</td>
				  <td valign="top" style="padding:4px;"> '.$phone.'</td>
				  </tr>
                  <!--<tr>
				   <td valign="top" style="padding:4px;">Title</td>
				  <td valign="top" style="padding:4px;">:</td>
				  <td valign="top" style="padding:4px;"> '.$enquiry.'</td>
				  </tr>-->
				  <tr>
				   <td valign="top" style="padding:4px;">Message</td>
				   <td valign="top" style="padding:4px;">: </td>
				   <td valign="top" style="padding:4px;">'.$enquiry.'</td>
				  </tr>
				  
				 </table>
				</p></td>
					   </tr>
                       
         </table>
        </p>
				              </td>
      </tr>
	 
    </table></td>
  </tr>
   <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>	</table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>';
		
		$to='contact@fundinnovations.com';
		$subject="Contact - Team Fundinnovations ";
		$headers='From: '.$from_name.' <'.$from_email.'>' . "\r\n";
		$headers.="MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		mail($to, $subject, $message, $headers); // mail to client
		return 'success'; 
	}
	
	function send_contactus_mail_sender($post) {
		$baseurl = base_url();
		$from_name	= $post['name'];
		$phone		= $post['contact_no'];
		$from_email	= $post['email_id'];
		//$query		= stripslashes($post['cnt_message']);
		//$enquiry 	= stripslashes($post['cnt_message']);
		
		/*// insertion to enquiry table
		$datetime	= date('Y-m-d H:i:s');
		$this->db->set('first_name',$from_name);
		$this->db->set('email',$from_email);	
		$this->db->set('contact_no',$phone);	
		$this->db->set('enquiry_type','Contact');
		$this->db->set('subject',$enquiry);	
		$this->db->set('enquiry_content',$query);
		$this->db->set('datetime',$datetime);		
		$this->db->insert('enquiry');	
		// insertion to enquiry table*/
		
		
		$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
      <p>
         <table cellpadding="0" cellspacing="0" border="0" style="font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #7a7a7a;">
					  <tr>
           <td valign="top" style="padding:4px;" colspan="2"> 
						<p>Dear '.ucwords($from_name).',                
				<p>Your message has been sent successfully.  FundInnovations team will contact you soon.</p></p></td>
					   </tr>
                       
         </table>
        </p><p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
           <strong>Team Fundinnovations</strong></p>
				              </td>
      </tr>
	 
    </table></td>
  </tr>
   <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>	</table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>';
		
		$to=$from_email;
		$subject="Re:Contact - Team Fundinnovations ";
		$headers='From: Team Fundinnovations <contact@fundinnovations.com>' . "\r\n";
		$headers.="MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
		$headers.= "Bcc: pramod_ck@ispg.in \r\n";
		mail($to, $subject, $message, $headers); // mail to client
		return 'success'; 
	}

	function add_email_admin($filePath) {
	  $file=fopen($filePath,"r");
	  //Output a line of the file until the end is reached
	  $emails = array();
	  $id = 0;
     while(!feof($file))
       {
         $email = fgetcsv($file,0,';');
		 //print_r($email);exit;
		 if(!empty($email[0])){
		   //$emails[] = $email[0];
		 $this->db->set('email',$email[0]);	
		 $this->db->set('flag',1);	
		 $this->db->insert('news_letter_emails');
		 $id=$this->db->insert_id();
		 }
       }
      fclose($file);
	  return $id;
	}
	
	function send_newsletter_admin() {
		$baseurl = base_url();
		/*$members	= $this->input->post('sent_to');*/
		$newsId		= $this->input->post('news_title');
		//$u_status	= $this->input->post('user_status');
		$datetime	= date('Y-m-d H:i:s');
		$project_cont ='';
		// insertion to hystory table
		$this->db->set('news_id',$newsId);
		$this->db->set('sent_to','all');	
		//$this->db->set('send_status',$u_status);	
		$this->db->set('send_date',$datetime);	
		$this->db->insert('news_letter_hystory');	
		//print_r($_POST);
		// insertion to hystory table
		$project_title ='';
		if($this->input->post('include_project_title') !=''){
			
			$arr=$this->input->post('chk_group');
			if(!empty($arr)){
			foreach($arr as $ar){
				$news_dtls	= $this->cms_model->get_project_detas($ar);
				$desc=stripslashes($news_dtls['short_description']);
				$project_cont .='
                  <tr>
				  <td width="210"><a href="'.$baseurl.'archive_projects/project_details/'.$news_dtls['id'].'" style="padding:0"><img width="200" src="'.$baseurl.'uploads/projects/images/200x150/'.$news_dtls['project_image'].'" /></a></td><td valign="top"><a href="'.$baseurl.'archive_projects/project_details/'.$news_dtls['id'].'" style="color:#000000">'.$news_dtls['project_title'].'</a><p>'.$desc.'</p></td>
				 
				  </tr>
				 <tr><td colspan="2">&nbsp;</td></tr>
				 
				';
			 }
			}
			//$news_dtls	= $this->cms_model->get_project_detas($newsId);
		}
		
		//exit;
		$news_dtls	= $this->cms_model->get_newsletter_details($newsId);
		$newsSubj	= $news_dtls[0]->subject;
		$newsTitle	= $news_dtls[0]->news_title;
		$newsContent= stripslashes($news_dtls[0]->news_content);

	//	if($members!=7) {
			$entry = array();	
			$i=0;
			
			/*if(!empty($members) && ($members!='all'))
			{
				$entry[$i] = "user_type_id = '".$members."'";
				$i++;
			}
			if(isset($u_status) && ($u_status!='all'))
			{
				$entry[$i] = "status = '".$u_status."'";
				$i++;
			}*/
			
			$sqlentry = "";
			$j=0;
			foreach($entry as $data)
			{
				
				if($j==0)
				$sqlentry = " where  ".$data;
				else
				$sqlentry .= " and ".$data;
				
				$j++;
			}
			
			$qryuser = $this->db->query("select u.*,an.id as noti_id from user u  join account_notifications an on u.id= an.user_id  where an.news_letter=1 order by u.profile_name ASC ");
		//} else {
			//$qryuser = $this->db->query("select g_email as email_id from guest_users where g_email!=''");	
		//}
		if($qryuser->num_rows()>0)
		{
			$result = $qryuser->result();
			foreach($result as $key => $res) {
				$to_email = $res->email_id;
				//$to_name  = $res->first_name.' '.$res->last_name;
				
				$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:9px;color:#7A7A7A;">To ensure delivery to your inbox, please add newsletter@fundinnovations.com to your address book.<br>
Can&#39;t see pictures in the newsletter? Select "Always Display Images" or View in browser</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
		 <tr>
    <td align="left" valign="top" style="padding:0px 0 10px 0; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" width="456" align="center" border="0" >
					  <tr>
          
				   <td valign="top" align="left" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding:0 10px 20px 10px; line-height:25px;"><p style="font-family:Verdana, Geneva, sans-serif; font-size:16px; color:#2E7CBE; border-bottom:dotted #bcbcbc 1px; font-weight:bold;">Fundinnovation <span style="color:#7a7a7a">'.$newsTitle.'</span></p>
                                                  <p align="justify">'.$newsContent.'</p>
												  <p><table width="535" border="0" cellpadding="0" cellspacing="0" >'.$project_cont.'</table></p>
                                                  <p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
                                                      <strong>Fundinnovation team</strong></p>Please <a href="'.$baseurl.'home/unsubscribe/'.$res->id.'/'.$res->noti_id.'">click here</a> to unsubscribe. </td>
				  
				 </table>
				</p>
				</td>
					   </tr>
                       
         </table>
        </p>
	</td>
      </tr>
	  <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>
    </table></td>
  </tr>
    </tr>
  <tr><td>This e-mail message may contain confidential, proprietary or legally privileged information. It should not be used by anyone who is not the original intended recipient. If you have erroneously received this message, please delete it immediately and notify the sender.</td></tr>
 </table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>
	';
						
						$to=$to_email;
						//$to='noufal_k@ispg.in';
						$subject=$newsSubj." - Team Fundinnovations ";
						$headers= 'From: Team Fundinnovations <newsletter@fundinnovations.com>' . "\r\n";
						$headers.="MIME-Version: 1.0\r\n";
						$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
						//$headers.= "Bcc: sumesh_c@ispg.in \r\n";
						 // mail to client	
						@mail($to, $subject, $message, $headers);
				
			}
			
			$qryuser_news = $this->db->query("select id,email from news_letter_emails where flag = 1");
		//} else {
			//$qryuser = $this->db->query("select g_email as email_id from guest_users where g_email!=''");	
		//}
		if($qryuser_news->num_rows()>0)
		{
			$result = $qryuser_news->result();
			foreach($result as $key => $res) {
				$to_email = $res->email;
				//$to_name  = $res->first_name.' '.$res->last_name;
				
				$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Funded </title>
			</head>

<body style="margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;	background-color:#fff;">
<table width="582" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#fff;">
  <tr>
    <td align="left" valign="top" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:9px;color:#7A7A7A">To ensure delivery to your inbox, please add newsletter@fundinnovations.com to your address book.<br>
Can&#39;t see pictures in the newsletter? Select "Always Display Images" or View in browser</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-color:#fff;"><img src="'.$baseurl.'images/top.gif" style="float:left" alt="top" width="582" height="117" border="0" usemap="#Map"  /></td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding:0px 0 10px 0; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding-bottom:20px; line-height:25px;">
        <p>
         <table cellpadding="0" cellspacing="0" width="456" align="center" border="0" >
					  <tr>
          
				   <td valign="top" align="left" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding:0 10px 20px 10px; line-height:25px;"><p style="font-family:Verdana, Geneva, sans-serif; font-size:16px; color:#2E7CBE; border-bottom:dotted #bcbcbc 1px; font-weight:bold;">Fundinnovation <span style="color:#7a7a7a">'.$newsTitle.'</span></p><p align="justify">'.$newsContent.'</p>
												  <p><table width="535" border="0" cellpadding="0" cellspacing="0" >'.$project_cont.'</table></p>
                                                  <p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
                                                      <strong>Fundinnovation team</strong></p>Please <a href="'.$baseurl.'home/unsubscribe/user/'.$res->id.'">click here</a> to unsubscribe. </td>
				  
				 </table>
				</p>
				</td>
					   </tr>
                       
         </table>
        </p>
	</td>
      </tr>
	  <tr><td><img src="'.$baseurl.'images/bottom.gif" alt="bottom" width="582" height="39" /></td></tr>
    </table></td>
  </tr>
  <tr><td>This e-mail message may contain confidential, proprietary or legally privileged information. It should not be used by anyone who is not the original intended recipient. If you have erroneously received this message, please delete it immediately and notify the sender.</td></tr>
 </table>
			<map name="Map" id="Map">
  <area shape="rect" coords="8,6,252,100" href="'.$baseurl.'" />
</map>
</body>
</html>
	';
						
						$to=$to_email;
						//$to='noufal_k@ispg.in';
						$subject=$newsSubj." - Team Fundinnovations ";
						$headers= 'From: Team Fundinnovations <newsletter@fundinnovations.com>' . "\r\n";
						$headers.="MIME-Version: 1.0\r\n";
						$headers.="Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\r\n";
						//$headers.= "Bcc: sumesh_c@ispg.in \r\n";
						 // mail to client	
						@mail($to, $subject, $message, $headers);
				
			}
			return 1;
			
		} else {
			return 0;
		}
	
		} else {
			return 0;
		}
				//echo "<pre>"; print_r($news_dtls);
	}
	
		
}
?>