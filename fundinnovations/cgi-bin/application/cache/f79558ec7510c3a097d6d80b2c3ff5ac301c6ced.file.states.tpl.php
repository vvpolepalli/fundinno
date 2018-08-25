<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 04:18:57
         compiled from "/home/fundinno/public_html/application/views/states.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1406550923515ab091bd1dd5-72010544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f79558ec7510c3a097d6d80b2c3ff5ac301c6ced' => 
    array (
      0 => '/home/fundinno/public_html/application/views/states.tpl',
      1 => 1357104241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1406550923515ab091bd1dd5-72010544',
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
  'unifunc' => 'content_515ab091c5a5a7_43625378',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515ab091c5a5a7_43625378')) {function content_515ab091c5a5a7_43625378($_smarty_tpl) {?><select name="state" id="state" class="selectBx" onChange="getCities(this.value)" />

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