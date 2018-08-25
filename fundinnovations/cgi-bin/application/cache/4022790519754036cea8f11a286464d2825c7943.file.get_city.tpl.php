<?php /* Smarty version Smarty-3.1.8, created on 2012-10-25 11:58:30
         compiled from "/var/www/fundinnovations/application/views/admin/get_city.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3355513305088dc0e262751-75409053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4022790519754036cea8f11a286464d2825c7943' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/get_city.tpl',
      1 => 1346758967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3355513305088dc0e262751-75409053',
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
  'unifunc' => 'content_5088dc0e35d232_01440461',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5088dc0e35d232_01440461')) {function content_5088dc0e35d232_01440461($_smarty_tpl) {?><div class="selectStyle">
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