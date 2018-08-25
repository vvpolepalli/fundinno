<?php /* Smarty version Smarty-3.1.8, created on 2013-02-20 20:49:45
         compiled from "/var/www/fundinnovations/application/views/admin/payment/select_bx.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131528021250f3c4f83da8c2-19643728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab07d4c3267f7d1903d5e7252e9d472fe7da3400' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/payment/select_bx.tpl',
      1 => 1361373082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131528021250f3c4f83da8c2-19643728',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50f3c4f8410265_84378435',
  'variables' => 
  array (
    'baseurl' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f3c4f8410265_84378435')) {function content_50f3c4f8410265_84378435($_smarty_tpl) {?>  <div class="formValidation">
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