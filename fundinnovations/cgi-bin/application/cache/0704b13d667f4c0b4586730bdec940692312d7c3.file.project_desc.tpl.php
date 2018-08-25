<?php /* Smarty version Smarty-3.1.8, created on 2013-02-21 15:40:50
         compiled from "/var/www/fundinnovations/application/views/admin/projects/project_desc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12775438075125f1645e1c82-92479466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0704b13d667f4c0b4586730bdec940692312d7c3' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/projects/project_desc.tpl',
      1 => 1361441369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12775438075125f1645e1c82-92479466',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5125f1646361c9_52359858',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_details' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5125f1646361c9_52359858')) {function content_5125f1646361c9_52359858($_smarty_tpl) {?><style type="text/css">
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
	max-width:570px;
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
<div class="projDesc">
<?php echo stripslashes($_smarty_tpl->tpl_vars['proj_details']->value['project_description']);?>

</div><?php }} ?>