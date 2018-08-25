<?php /* Smarty version Smarty-3.1.8, created on 2013-02-21 19:03:14
         compiled from "/var/www/fundinnovations/application/views/projects/project_description.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112870851850f8f7e2eb5533-12683173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87e11839f51c69abd4d10bc4fe8fab8d305f1cfc' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/project_description.tpl',
      1 => 1361453587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112870851850f8f7e2eb5533-12683173',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50f8f7e2ef80e8_49351750',
  'variables' => 
  array (
    'baseurl' => 0,
    'project_det' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f8f7e2ef80e8_49351750')) {function content_50f8f7e2ef80e8_49351750($_smarty_tpl) {?><style type="text/css">
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