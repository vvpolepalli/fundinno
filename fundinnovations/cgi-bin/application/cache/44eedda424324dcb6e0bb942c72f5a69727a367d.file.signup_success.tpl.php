<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 05:57:27
         compiled from "/home/fundinno/public_html/application/views/signup_success.tpl" */ ?>
<?php /*%%SmartyHeaderCode:518543083515ac7a7480fd6-05578605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44eedda424324dcb6e0bb942c72f5a69727a367d' => 
    array (
      0 => '/home/fundinno/public_html/application/views/signup_success.tpl',
      1 => 1360769238,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '518543083515ac7a7480fd6-05578605',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'sign_up_email_id' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515ac7a752b637_58347218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515ac7a752b637_58347218')) {function content_515ac7a752b637_58347218($_smarty_tpl) {?><section  class="filter">
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