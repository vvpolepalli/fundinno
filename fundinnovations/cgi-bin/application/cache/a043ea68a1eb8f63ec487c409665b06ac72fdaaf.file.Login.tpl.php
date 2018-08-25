<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 01:21:35
         compiled from "/home/fundinno/public_html/application/views/admin/Login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1645699607515a86ff51ddb1-25989975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a043ea68a1eb8f63ec487c409665b06ac72fdaaf' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/Login.tpl',
      1 => 1349932318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1645699607515a86ff51ddb1-25989975',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'loginError' => 0,
    'msgg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515a86ff66f2c4_38548327',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515a86ff66f2c4_38548327')) {function content_515a86ff66f2c4_38548327($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin : Login</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/login.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div class="outer_container">
  <div class="container_div">
    <div class="content_container">
      <h1><!--<img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/logo.png"/>-->Logo</h1>
      <div class="content_container_inner">
        <div class="content_container_content">
          <div class="filling">
          <div class="error"><?php if ($_smarty_tpl->tpl_vars['loginError']->value){?> <?php echo $_smarty_tpl->tpl_vars['loginError']->value;?>
 <?php }?></div>
          <div class="logout"><?php if ($_smarty_tpl->tpl_vars['msgg']->value){?> <?php echo $_smarty_tpl->tpl_vars['msgg']->value;?>
 <?php }?></div>
          <form id="login" name="login" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/login/" method="post">
            <div class="form_listing">
              <ul>
                <li>
                  <div class="leftside01">User  ID</div>
                  <div class="rightside01">
                    <input name="userName" id="userName" type="text" class="textbox" />
                  </div>
                  <div class="clear"></div>
                </li>
                <li>
                  <div class="leftside01">Password</div>
                  <div class="rightside01">
                    <input name="userPassword" id="userPassword" type="password" class="textbox" />
                  </div>
                  <div class="clear"></div>
                </li>
                <li>
                  <div class="leftside01"></div>
                  <div class="rightside01"> <span class="btnlayout01">
                    <input name="submitLogin" type="submit"  value="Login"  />
                    </span> <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/login/forgot_password">Forgot password?</a></div>
                  <div class="clear"></div>
                </li>
              </ul>
            </div>
            <!--End:Form Listing--> 
           </form> 
          </div>
        </div>
      </div>
    </div>
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