<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 05:00:36
         compiled from "/home/fundinno/public_html/application/views/admin/get_city.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1041819513515c0bd4c3a837-36544379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63c5b8a271e0a57363cd80216c01c37f238a5cfc' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/get_city.tpl',
      1 => 1346758967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1041819513515c0bd4c3a837-36544379',
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
  'unifunc' => 'content_515c0bd4cdc441_70605991',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c0bd4cdc441_70605991')) {function content_515c0bd4cdc441_70605991($_smarty_tpl) {?><div class="selectStyle">
<select name="city" id="city" class="user_select"  onchange="getCityBox(this.value)" />
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
<?php if (count($_smarty_tpl->tpl_vars['sel_city']->value)>0){?>
<option value="other">Other</option>
<?php }?>
</select>
</div><?php }} ?>