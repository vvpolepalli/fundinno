<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 01:22:11
         compiled from "/home/fundinno/public_html/application/views/admin/leftpane.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1050159590515a8723ab2d06-69983872%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '029c04665a4ac4d07ec52d2441bcf9e828abd692' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/leftpane.tpl',
      1 => 1358768572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1050159590515a8723ab2d06-69983872',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515a8723adff02_36669496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515a8723adff02_36669496')) {function content_515a8723adff02_36669496($_smarty_tpl) {?>
              <div class="sideQuickMEnu_" id="">
                <ul style="overflow:hidden">
                  <!--<li class="adminIcon_"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home/updateprofile" >My Account</a></li>-->
                  <li class="logoutIcon_"> <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/login/logout" ><i></i>Logout</a></li>
                  <li class="passChange"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home/change_password" ><i></i><span>Change Password</span></a></li>          
                  
                </ul>  
             <div class="clear"></div>
        </div>

        
<?php }} ?>