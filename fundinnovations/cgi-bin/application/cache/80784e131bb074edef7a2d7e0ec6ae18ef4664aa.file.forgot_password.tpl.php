<?php /* Smarty version Smarty-3.1.8, created on 2013-08-01 00:02:38
         compiled from "/home/fundinno/public_html/application/views/admin/forgot_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166373486851f9f9fe2c7b33-92730440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80784e131bb074edef7a2d7e0ec6ae18ef4664aa' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/forgot_password.tpl',
      1 => 1349935474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166373486851f9f9fe2c7b33-92730440',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'Error' => 0,
    'msgg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51f9f9fe38e277_23040793',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f9f9fe38e277_23040793')) {function content_51f9f9fe38e277_23040793($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin : Settings</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/login.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="outer_container">
	<div class="container_div">
<div class="content_container">
    	<h1>estateace</h1>
    	<div class="content_container_inner ">
        	<div class="content_container_content">
            	<div class="filling">
                   <div class="error"><?php if ($_smarty_tpl->tpl_vars['Error']->value){?> <?php echo $_smarty_tpl->tpl_vars['Error']->value;?>
 <?php }?></div>
                   <div class="logout"><?php if ($_smarty_tpl->tpl_vars['msgg']->value){?> <?php echo $_smarty_tpl->tpl_vars['msgg']->value;?>
 <?php }?></div>
          			<div class="form_listing">
                      <form id="login" name="login" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/login/send_new_password" method="post">
                    	<ul>
                   	    <li>
                            	<div class="leftside01">Email address</div>
                                <div class="rightside01"><input name="admin_email" id="admin_email" type="text" class="textbox" /></div>
                                <div class="clear"></div>
                         </li>
                        
                          <li>
                            <div class="leftside01"></div>
                                <div class="rightside01">
                           	<span class="btnlayout01"><input name="Login" type="submit"  value="Send New Password" /></span> </div>
                            
                                <div class="clear"></div>
                         
                          	<div class="rightside01"> <div class="text_note">Nevermind, <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/login">send me back to the sign in screen</a></div></div>
                          </li>
                          <div class="clear"></div>
                        </ul>
                        </form>
                    </div><!--End:Form Listing-->
               </div>
            </div>
         </div>
    </div>
   <div class="text_note"> <em><strong>A note about spam filters</strong><br />
If you don't get an email from us within a few minutes please be sure to check your spam filter. 
<!--The email will be coming from  do-not-reply@dealsystem.com.--></em></div>
</div>
</div>
<!--End:Outer Container--> 

<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
      DD_belatedPNG.fix('img,div,ul,li,li a,a,input,p,blockquote,span,h1,h2,h3,.last-child');
</script>
<![endif]-->
<!--[if IE]>
<link href="styles/iefix.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]--></body>
</html>
<?php }} ?>