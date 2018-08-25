<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 05:00:31
         compiled from "/home/fundinno/public_html/application/views/ajax_states.tpl" */ ?>
<?php /*%%SmartyHeaderCode:580027087515c0bcff189a5-11016115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd76069cceef29493db919e1f0d02b8804ca4f0c4' => 
    array (
      0 => '/home/fundinno/public_html/application/views/ajax_states.tpl',
      1 => 1358845815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '580027087515c0bcff189a5-11016115',
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
  'unifunc' => 'content_515c0bd0061b04_76083078',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c0bd0061b04_76083078')) {function content_515c0bd0061b04_76083078($_smarty_tpl) {?><select name="state" id="state" class="styletxt40perc" onchange="getCities(this.value)" />
                  
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
                  </select><?php }} ?>