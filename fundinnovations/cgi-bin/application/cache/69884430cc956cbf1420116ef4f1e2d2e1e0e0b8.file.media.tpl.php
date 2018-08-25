<?php /* Smarty version Smarty-3.1.8, created on 2013-01-29 12:13:07
         compiled from "/var/www/fundinnovations/application/views/media.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107966649950ed372a6de710-83506755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69884430cc956cbf1420116ef4f1e2d2e1e0e0b8' => 
    array (
      0 => '/var/www/fundinnovations/application/views/media.tpl',
      1 => 1359441782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107966649950ed372a6de710-83506755',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50ed372a71ea97_93715134',
  'variables' => 
  array (
    'cms_content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ed372a71ea97_93715134')) {function content_50ed372a71ea97_93715134($_smarty_tpl) {?><section class="innerMidWrap">

	<div class="clear"></div>
	<div>
		<div class="contentBlock">
        	<h5><?php echo $_smarty_tpl->tpl_vars['cms_content']->value['page_name'];?>
</h5>
      <?php echo $_smarty_tpl->tpl_vars['cms_content']->value['page_content'];?>

			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</section><?php }} ?>