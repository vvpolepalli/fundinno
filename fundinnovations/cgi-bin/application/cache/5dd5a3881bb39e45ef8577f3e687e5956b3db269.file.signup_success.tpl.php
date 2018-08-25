<?php /* Smarty version Smarty-3.1.8, created on 2013-02-14 17:35:32
         compiled from "/var/www/fundinnovations/application/views/signup_success.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12705783845107c5319ac686-40963120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dd5a3881bb39e45ef8577f3e687e5956b3db269' => 
    array (
      0 => '/var/www/fundinnovations/application/views/signup_success.tpl',
      1 => 1360769238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12705783845107c5319ac686-40963120',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5107c531a4f029_61532912',
  'variables' => 
  array (
    'msg' => 0,
    'sign_up_email_id' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5107c531a4f029_61532912')) {function content_5107c531a4f029_61532912($_smarty_tpl) {?><section  class="filter">
<div style=" clear: both;
    display: block;
    margin-left: 0;
    padding: 23px 28px 29px;
    width: 1010px;">

	<?php if ($_smarty_tpl->tpl_vars['msg']->value=='success'){?>
    <div class="signUpresponse">We have sent a confirmation email to your <?php if ($_smarty_tpl->tpl_vars['sign_up_email_id']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['sign_up_email_id']->value;?>
 account<?php }else{ ?> mail id<?php }?>. Request you to click on the link given in mail to confirm your email address submitted with us. Please do add our official email address in the address book in order to prevent the mail land on your Spam folder. Please <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
signin">Login</a>
   </div>
    <?php }elseif($_smarty_tpl->tpl_vars['msg']->value=='error'){?>
   <div class="signUpresponse">There is error occured in sign up. Please try again.</div>
    <?php }?>
	
	<div class="clear"></div>
    </div>
    
</section><?php }} ?>