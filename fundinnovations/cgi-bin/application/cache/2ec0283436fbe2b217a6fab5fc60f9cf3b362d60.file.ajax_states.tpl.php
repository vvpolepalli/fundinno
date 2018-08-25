<?php /* Smarty version Smarty-3.1.8, created on 2013-01-22 14:40:17
         compiled from "/var/www/fundinnovations/application/views/ajax_states.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207762970508a2ffc972b40-77593033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ec0283436fbe2b217a6fab5fc60f9cf3b362d60' => 
    array (
      0 => '/var/www/fundinnovations/application/views/ajax_states.tpl',
      1 => 1358845815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207762970508a2ffc972b40-77593033',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_508a2ffc9cb239_11836786',
  'variables' => 
  array (
    'sel_states' => 0,
    'st' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508a2ffc9cb239_11836786')) {function content_508a2ffc9cb239_11836786($_smarty_tpl) {?><select name="state" id="state" class="styletxt40perc" onchange="getCities(this.value)" />
                  
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