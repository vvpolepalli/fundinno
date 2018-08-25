<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 05:57:59
         compiled from "/home/fundinno/public_html/application/views/activate_response_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1039427669515ac7c7e387f8-76152943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f6e0d1f05983578f4141e56cae6782e33017ada' => 
    array (
      0 => '/home/fundinno/public_html/application/views/activate_response_page.tpl',
      1 => 1357302986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1039427669515ac7c7e387f8-76152943',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'response' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515ac7c7eda7d8_22752674',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515ac7c7eda7d8_22752674')) {function content_515ac7c7eda7d8_22752674($_smarty_tpl) {?><section  class="filter">
<div class="filterInner">
	<?php if ($_smarty_tpl->tpl_vars['response']->value=='yes'){?>
     <span>Your Account is Activated. Please <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
signin">login</a></span>
    <?php }else{ ?>
    <span>The Code and User id doesn't match! Account is not Activated.</span>
    <?php }?>
	
	<div class="clear"></div>
    </div>
    
</section><?php }} ?>