<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 22:38:41
         compiled from "/home/fundinno/public_html/application/views/admin/payment/select_bx.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1273740605515bb251939912-79423339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c859f6ecae56cd6703aa72cf3f819eb7b5081c08' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/payment/select_bx.tpl',
      1 => 1361373082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1273740605515bb251939912-79423339',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bb2519a9872_34971736',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bb2519a9872_34971736')) {function content_515bb2519a9872_34971736($_smarty_tpl) {?>  <div class="formValidation">
    <select class="user_select"  id="action_bx" name="action_bx">
     <option value="pending">Pending</option>
      <option value="refunded">Make as Fundinnovation cash</option>
       <option value="completed">Completed</option>
        <!-- <option value="error">Error</option>
          <option value="deleted">Deleted</option>-->
    </select>
    </div>
         <span class="btnlayout">
                        <input type="button" onclick="return change_action('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
',<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
)" name="update_btn" id="update_btn" class="button" value="Update">
                        </span>
                         <?php }} ?>