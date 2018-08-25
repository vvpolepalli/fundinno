<?php /* Smarty version Smarty-3.1.8, created on 2013-02-05 10:50:19
         compiled from "/var/www/fundinnovations/application/views/unsubscribe_status_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5044590905110969347a9f2-08614159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5d9a3b8b83fb1a4e1dd75558ce298c02108f017' => 
    array (
      0 => '/var/www/fundinnovations/application/views/unsubscribe_status_page.tpl',
      1 => 1360039614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5044590905110969347a9f2-08614159',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_511096934d43e9_36500471',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511096934d43e9_36500471')) {function content_511096934d43e9_36500471($_smarty_tpl) {?><section  class="filter">
<div style=" clear: both;
    display: block;
    margin-left: 0;
    padding: 23px 28px 29px;
    width: 1010px;">

	<?php if ($_smarty_tpl->tpl_vars['msg']->value=='success'){?>
    <div class="signUpresponse">You have been successfully unsubscribed newsletter. You will no longer hear from us.</div>
     
    <?php }elseif($_smarty_tpl->tpl_vars['msg']->value=='error'){?>
   <div class="signUpresponse">There is error occured. Please try again.</div>
    <?php }?>
	
	<div class="clear"></div>
    </div>
    
</section><?php }} ?>