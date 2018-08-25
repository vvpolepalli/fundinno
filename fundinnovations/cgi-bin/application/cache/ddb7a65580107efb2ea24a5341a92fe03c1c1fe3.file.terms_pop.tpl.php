<?php /* Smarty version Smarty-3.1.8, created on 2013-02-12 17:20:27
         compiled from "/var/www/fundinnovations/application/views/projects/terms_pop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67785792250d2e93200e013-02131590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddb7a65580107efb2ea24a5341a92fe03c1c1fe3' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/terms_pop.tpl',
      1 => 1360669820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67785792250d2e93200e013-02131590',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50d2e932062b45_89332971',
  'variables' => 
  array (
    're' => 0,
    'proj_id' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50d2e932062b45_89332971')) {function content_50d2e932062b45_89332971($_smarty_tpl) {?><section class="cmsSection">
<?php echo $_smarty_tpl->tpl_vars['re']->value['page_content'];?>
 
<div class="submitPane">
 <ul>
  <?php if ($_smarty_tpl->tpl_vars['proj_id']->value==''){?>
 
  <li style="clear:none"> <input type="button" class="blueBtn" id="popContinue" name="popContinue"  onclick = "save_projects('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','send') " value="Continue">
      </li>
   <?php }else{ ?>
    <li style="clear:none"> <input type="button" class="blueBtn" id="popContinue" name="popContinue"  onclick = "update_projects('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
',<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
,'send');close_pop('terms_popup');" value="Continue">
      </li>
   <?php }?>
      <li style="clear:none">
      <input type="button" class="grayBtn"  id="popCancel" name="popCancel" onclick ="close_pop('terms_popup')" value="Cancel">
      </li>
      </ul><div class="clear"></div>
      </div>
      <div class="clear"></div>
</section>
<div class="clear"></div><?php }} ?>