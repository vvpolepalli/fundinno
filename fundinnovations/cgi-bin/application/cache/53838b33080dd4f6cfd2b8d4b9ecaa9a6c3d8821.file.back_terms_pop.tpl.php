<?php /* Smarty version Smarty-3.1.8, created on 2013-06-12 22:42:45
         compiled from "/home/fundinno/public_html/application/views/projects/back_terms_pop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1009591747515bb782ea5896-51551665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53838b33080dd4f6cfd2b8d4b9ecaa9a6c3d8821' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/back_terms_pop.tpl',
      1 => 1371098479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1009591747515bb782ea5896-51551665',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bb782f0fbb0_04423402',
  'variables' => 
  array (
    'backing_terms' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bb782f0fbb0_04423402')) {function content_515bb782f0fbb0_04423402($_smarty_tpl) {?><section class="cmsSection">
<?php echo $_smarty_tpl->tpl_vars['backing_terms']->value['page_content'];?>
 

      <div class="clear"></div>
</section>
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
<?php }} ?>