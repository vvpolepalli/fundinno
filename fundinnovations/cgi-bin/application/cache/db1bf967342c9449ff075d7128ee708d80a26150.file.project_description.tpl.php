<?php /* Smarty version Smarty-3.1.8, created on 2013-04-01 23:22:55
         compiled from "/home/fundinno/public_html/application/views/projects/project_description.tpl" */ ?>
<?php /*%%SmartyHeaderCode:416781226515a6b2f56e957-87663463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db1bf967342c9449ff075d7128ee708d80a26150' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/project_description.tpl',
      1 => 1361453587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '416781226515a6b2f56e957-87663463',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'project_det' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515a6b2f5f37b9_18669403',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515a6b2f5f37b9_18669403')) {function content_515a6b2f5f37b9_18669403($_smarty_tpl) {?><style type="text/css">
p {
color: #686868;
font: 13px/20px Arial, sans-serif, "Myriad Pro";
padding: 5px 0;
margin: 0;

}
html, body {
	border: 0;
	margin:0;
	padding:0;
}
body{
	color: #686868;
	font: 13px/20px Arial, sans-serif, "Myriad Pro";
	overflow: hidden;
	background:#fff;
}
.projDesc img{
	max-width:500px;
}
</style>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-1.4.3.min.js"></script>
 <script type="text/javascript">
$(window).load(function(){
$('#proj_cntnt',window.parent.document).css('height',$(document).height());
$(".projDesc").find("a").attr('target','_parent');
});
</script> 
<div class="projDesc" style="width:570px;max-width:560px;">
<?php echo stripslashes($_smarty_tpl->tpl_vars['project_det']->value['project_description']);?>

</div><?php }} ?>