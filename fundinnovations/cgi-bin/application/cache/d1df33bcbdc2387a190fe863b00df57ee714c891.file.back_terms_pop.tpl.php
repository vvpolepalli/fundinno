<?php /* Smarty version Smarty-3.1.8, created on 2013-02-12 14:45:42
         compiled from "/var/www/fundinnovations/application/views/projects/back_terms_pop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150120836150efaeb813b362-68318799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1df33bcbdc2387a190fe863b00df57ee714c891' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/back_terms_pop.tpl',
      1 => 1360660530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150120836150efaeb813b362-68318799',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50efaeb8184ba7_23773171',
  'variables' => 
  array (
    'backing_terms' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50efaeb8184ba7_23773171')) {function content_50efaeb8184ba7_23773171($_smarty_tpl) {?><section class="cmsSection">
<?php echo $_smarty_tpl->tpl_vars['backing_terms']->value['page_content'];?>
 
<div class="submitPane">
 <ul>
  
  <li style="float:left; clear:none"> <input type="button" class="blueBtn" id="popContinue" name="popContinue"  onclick = "javascript:$('#frmback').submit()" value="Continue">
      </li>
   <li style="float:left; clear:none">
      <input type="button" class="grayBtn"  id="popCancel" name="popCancel" onclick ="$('#back_pop_cntnt').show();$('#back_terms_pop_cntnt').hide();" value="Cancel">
      </li>
 </ul> <div class="clear"></div>
      </div>
      <div class="clear"></div>
</section>

 <div class="clear"></div>
<?php }} ?>