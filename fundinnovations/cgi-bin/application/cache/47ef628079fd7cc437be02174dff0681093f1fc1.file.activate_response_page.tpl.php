<?php /* Smarty version Smarty-3.1.8, created on 2013-01-04 18:06:43
         compiled from "/var/www/fundinnovations/application/views/activate_response_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94967828350e6cbd5c7c8e4-61231195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47ef628079fd7cc437be02174dff0681093f1fc1' => 
    array (
      0 => '/var/www/fundinnovations/application/views/activate_response_page.tpl',
      1 => 1357302986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94967828350e6cbd5c7c8e4-61231195',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e6cbd5cc50f3_18510152',
  'variables' => 
  array (
    'response' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e6cbd5cc50f3_18510152')) {function content_50e6cbd5cc50f3_18510152($_smarty_tpl) {?><section  class="filter">
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