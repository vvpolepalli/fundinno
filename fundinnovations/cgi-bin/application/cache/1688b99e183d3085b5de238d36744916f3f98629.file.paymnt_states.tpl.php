<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 23:01:08
         compiled from "/home/fundinno/public_html/application/views/paymnt_states.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1438756014515bb7944b4836-72280105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1688b99e183d3085b5de238d36744916f3f98629' => 
    array (
      0 => '/home/fundinno/public_html/application/views/paymnt_states.tpl',
      1 => 1360935275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1438756014515bb7944b4836-72280105',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sel_states' => 0,
    'st' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bb794541ac1_23397941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bb794541ac1_23397941')) {function content_515bb794541ac1_23397941($_smarty_tpl) {?><select name="state" id="state" class="selectBx"  />

<option value="">Select State</option>
<?php  $_smarty_tpl->tpl_vars['st'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['st']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sel_states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['st']->key => $_smarty_tpl->tpl_vars['st']->value){
$_smarty_tpl->tpl_vars['st']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['st']->key;
?>
<option value="<?php echo $_smarty_tpl->tpl_vars['st']->value->st_id;?>
" ><?php echo $_smarty_tpl->tpl_vars['st']->value->state;?>
</option>
<?php } ?>
</select>
<?php }} ?>