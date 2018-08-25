<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 06:20:37
         compiled from "/home/fundinno/public_html/application/views/admin/category/staff_pick.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1738404067515c1e95c64967-67612032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '789bc5d14ad2261128da6ee0b0253ade053ed7bb' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/category/staff_pick.tpl',
      1 => 1352896426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1738404067515c1e95c64967-67612032',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'project_list' => 0,
    'pr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c1e95d3c709_34146486',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c1e95d3c709_34146486')) {function content_515c1e95d3c709_34146486($_smarty_tpl) {?><div>Category : <?php echo $_smarty_tpl->tpl_vars['category']->value;?>
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