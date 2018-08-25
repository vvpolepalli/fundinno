<?php /* Smarty version Smarty-3.1.8, created on 2013-01-21 17:13:03
         compiled from "/var/www/fundinnovations/application/views/admin/leftpane.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2032301479507654c08c52b7-42491016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd47252178fa55db4c660d17983a370a0ea41a42e' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/leftpane.tpl',
      1 => 1358768572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2032301479507654c08c52b7-42491016',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_507654c08d2418_16776626',
  'variables' => 
  array (
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507654c08d2418_16776626')) {function content_507654c08d2418_16776626($_smarty_tpl) {?>
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