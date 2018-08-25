<?php /* Smarty version Smarty-3.1.8, created on 2013-01-02 11:01:24
         compiled from "/var/www/fundinnovations/application/views/states.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140701670750e3c62cb71de0-28522333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5ded02ca4d8eb3accddfb58319a2b2cf037db5d' => 
    array (
      0 => '/var/www/fundinnovations/application/views/states.tpl',
      1 => 1357104241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140701670750e3c62cb71de0-28522333',
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
  'unifunc' => 'content_50e3c62cbd6828_02219802',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e3c62cbd6828_02219802')) {function content_50e3c62cbd6828_02219802($_smarty_tpl) {?><select name="state" id="state" class="selectBx" onChange="getCities(this.value)" />

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