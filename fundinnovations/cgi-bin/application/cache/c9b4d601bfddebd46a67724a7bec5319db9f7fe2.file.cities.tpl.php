<?php /* Smarty version Smarty-3.1.8, created on 2013-01-02 11:01:24
         compiled from "/var/www/fundinnovations/application/views/cities.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107232934050e3c62ce98135-80451173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9b4d601bfddebd46a67724a7bec5319db9f7fe2' => 
    array (
      0 => '/var/www/fundinnovations/application/views/cities.tpl',
      1 => 1357104202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107232934050e3c62ce98135-80451173',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sel_city' => 0,
    'ct' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e3c62cee8489_81561085',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e3c62cee8489_81561085')) {function content_50e3c62cee8489_81561085($_smarty_tpl) {?><select name="city" id="city" class="selectBx"   />
<option value="">Select City</option>
<?php  $_smarty_tpl->tpl_vars['ct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ct']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sel_city']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ct']->key => $_smarty_tpl->tpl_vars['ct']->value){
$_smarty_tpl->tpl_vars['ct']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['ct']->key;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['ct']->value->city_id;?>
" ><?php echo $_smarty_tpl->tpl_vars['ct']->value->city_name;?>
</option>
<?php } ?>
</select><?php }} ?>