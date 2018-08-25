<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 04:18:58
         compiled from "/home/fundinno/public_html/application/views/cities.tpl" */ ?>
<?php /*%%SmartyHeaderCode:241341827515ab09241ab22-93668481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10bcc8e42d1822554283f1da44167b3323ab8250' => 
    array (
      0 => '/home/fundinno/public_html/application/views/cities.tpl',
      1 => 1357104202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '241341827515ab09241ab22-93668481',
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
  'unifunc' => 'content_515ab0924a32b9_99374474',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515ab0924a32b9_99374474')) {function content_515ab0924a32b9_99374474($_smarty_tpl) {?><select name="city" id="city" class="selectBx"   />
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