<?php /* Smarty version Smarty-3.1.8, created on 2013-02-15 19:07:52
         compiled from "/var/www/fundinnovations/application/views/paymnt_states.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1567129821511e3a30547822-37567324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '166b7be07a03d53c922cb485b9c5270bd28b6bea' => 
    array (
      0 => '/var/www/fundinnovations/application/views/paymnt_states.tpl',
      1 => 1360935275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1567129821511e3a30547822-37567324',
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
  'unifunc' => 'content_511e3a30597ec7_75315509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511e3a30597ec7_75315509')) {function content_511e3a30597ec7_75315509($_smarty_tpl) {?><select name="state" id="state" class="selectBx"  />

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