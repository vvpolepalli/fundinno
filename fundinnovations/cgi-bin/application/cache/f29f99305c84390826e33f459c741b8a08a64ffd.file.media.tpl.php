<?php /* Smarty version Smarty-3.1.8, created on 2013-06-17 06:31:49
         compiled from "/home/fundinno/public_html/application/views/media.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1458660845515abab7124ae2-15401269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f29f99305c84390826e33f459c741b8a08a64ffd' => 
    array (
      0 => '/home/fundinno/public_html/application/views/media.tpl',
      1 => 1371471217,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1458660845515abab7124ae2-15401269',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515abab7138915_33948279',
  'variables' => 
  array (
    'cms_content' => 0,
    'baseurl' => 0,
    'page_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515abab7138915_33948279')) {function content_515abab7138915_33948279($_smarty_tpl) {?><section class="innerMidWrap">

	<div class="clear"></div>
	<div>
		<div class="contentBlock">
        	<h5><?php echo $_smarty_tpl->tpl_vars['cms_content']->value['page_name'];?>
</h5>
                 <iframe id="proj_cntnt" frameborder="0" name="target-iframe"   width="100%" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
home/cms_content/<?php echo $_smarty_tpl->tpl_vars['page_id']->value;?>
">
                 <?php echo $_smarty_tpl->tpl_vars['cms_content']->value['page_content'];?>

                 </iframe>
      
			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</section><?php }} ?>