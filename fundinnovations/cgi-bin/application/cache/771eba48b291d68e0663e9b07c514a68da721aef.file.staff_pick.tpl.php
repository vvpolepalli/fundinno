<?php /* Smarty version Smarty-3.1.8, created on 2012-11-14 18:03:51
         compiled from "/var/www/fundinnovations/application/views/admin/category/staff_pick.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67908641150a38907548cb1-42457361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '771eba48b291d68e0663e9b07c514a68da721aef' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/category/staff_pick.tpl',
      1 => 1352896426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67908641150a38907548cb1-42457361',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a389075b28b6_92995038',
  'variables' => 
  array (
    'category' => 0,
    'project_list' => 0,
    'pr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a389075b28b6_92995038')) {function content_50a389075b28b6_92995038($_smarty_tpl) {?><div>Category : <?php echo $_smarty_tpl->tpl_vars['category']->value;?>
 <br/>
  <?php if (count($_smarty_tpl->tpl_vars['project_list']->value)>0&&$_smarty_tpl->tpl_vars['project_list']->value!=0){?>
  
  Select staff pick project :
  <div class="formValidation" >
    <select name="project_list" id="project_list" class="user_select" >
      <option value="0">Select project</option>
      
      <?php  $_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pr']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['project_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->key => $_smarty_tpl->tpl_vars['pr']->value){
$_smarty_tpl->tpl_vars['pr']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['pr']->key;
?>
                  
      <option value="<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['pr']->value['project_title'];?>
</option>
      
      <?php } ?>
                   
    </select>
  </div>
  <?php }else{ ?>
  Sorry there is no projects created on this category.
  <?php }?> </div><?php }} ?>