<?php /* Smarty version Smarty-3.1.8, created on 2013-01-01 18:27:02
         compiled from "/var/www/fundinnovations/application/views/profile/edit_profile_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180983455950e2dd1e517101-11852342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62c0a471094d29466d366a07e047ef74473037c8' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/edit_profile_main.tpl',
      1 => 1357044970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180983455950e2dd1e517101-11852342',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sub_middlecontent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e2dd1e58bd34_85330875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e2dd1e58bd34_85330875')) {function content_50e2dd1e58bd34_85330875($_smarty_tpl) {?>
<section class="innerMidWrap funding_EditP">
  <div class="innerMidContent">
      <div class="funding_tabEditP">
      <ul class="fundTab">
        <li><a class="active" href="#">Edit profile<span class="arrow"></span></a></li>
        <li><a  href="#">Acount Settings<span class="arrow"></span></a></li>
        <li><a href="#">My Notifications<span class="arrow"></span></a></li>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
   <div id="ajx_load_cntnt">
   <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['sub_middlecontent']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   </div>
      
   
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>
<?php }} ?>