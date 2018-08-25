<?php /* Smarty version Smarty-3.1.8, created on 2013-06-25 22:57:42
         compiled from "/home/fundinno/public_html/application/views/profile/load_referral_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142108325951ca74c63bbbb4-88338807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c808ab0aaeb5170046d156be36e0d767a1700e4c' => 
    array (
      0 => '/home/fundinno/public_html/application/views/profile/load_referral_users.tpl',
      1 => 1360907785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142108325951ca74c63bbbb4-88338807',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'startp' => 0,
    'referral_users_cnt' => 0,
    'referral_users' => 0,
    'baseurl' => 0,
    'usr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51ca74c649b566_29256580',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ca74c649b566_29256580')) {function content_51ca74c649b566_29256580($_smarty_tpl) {?><div  style="margin-bottom:0;">
    
    <input type="hidden" name="hid_user_startp" id="hid_user_startp" value="<?php echo $_smarty_tpl->tpl_vars['startp']->value;?>
" />
    <input type="hidden" name="hid_referral_users_cnt" id="hid_referral_users_cnt" value="<?php echo $_smarty_tpl->tpl_vars['referral_users_cnt']->value;?>
" />
    <table class="tabStylee" style="border-collapse: inherit;border-spacing: 0;" cellspacing="0" width="100%" align="center" >
 <tr> <th align="left">User</th><th align="left">Pre-ordered Amount</th><th align="left">Referral Amount</th></tr>
       <?php  $_smarty_tpl->tpl_vars['usr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['usr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['referral_users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['usr']->key => $_smarty_tpl->tpl_vars['usr']->value){
$_smarty_tpl->tpl_vars['usr']->_loop = true;
?>
      <tr>
      <td  align="left" valign="top">
      <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['usr']->value['user_id'];?>
" style="float:left;">
      <?php if ($_smarty_tpl->tpl_vars['usr']->value['profile_image']!=''){?><img src="<?php echo $_smarty_tpl->tpl_vars['usr']->value['profile_image'];?>
" height="50" width="50"/><?php }else{ ?>
      
      <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/prof_no_img.png" height="50" width="50"/>
      <?php }?></a>
      <!--<a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['usr']->value['id'];?>
" style="color:hsl(210, 46%, 46%)">-->
      <span style="padding-left:10px"><?php echo $_smarty_tpl->tpl_vars['usr']->value['profile_name'];?>
</span>
      <!-- </a> --></td>
      <td align="left" valign="top"> <?php echo $_smarty_tpl->tpl_vars['usr']->value['back_amnt'];?>
</td>
      <td align="left" valign="top"> <?php echo $_smarty_tpl->tpl_vars['usr']->value['ref_amnt'];?>
</td>
      </tr>
      <?php } ?>
      </table>
</div><?php }} ?>