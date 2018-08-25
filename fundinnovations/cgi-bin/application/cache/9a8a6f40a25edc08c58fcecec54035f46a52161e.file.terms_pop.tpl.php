<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 06:42:29
         compiled from "/home/fundinno/public_html/application/views/projects/terms_pop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1142212516515ad235f05fa2-43554631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a8a6f40a25edc08c58fcecec54035f46a52161e' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/terms_pop.tpl',
      1 => 1360669820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1142212516515ad235f05fa2-43554631',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    're' => 0,
    'proj_id' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515ad23607aca3_11249540',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515ad23607aca3_11249540')) {function content_515ad23607aca3_11249540($_smarty_tpl) {?><section class="cmsSection">
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