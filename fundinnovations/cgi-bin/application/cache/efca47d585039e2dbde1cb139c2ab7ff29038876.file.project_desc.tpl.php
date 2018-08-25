<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 22:16:31
         compiled from "/home/fundinno/public_html/application/views/admin/projects/project_desc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:233428964515bad1fd7d7d0-59150710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efca47d585039e2dbde1cb139c2ab7ff29038876' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/projects/project_desc.tpl',
      1 => 1361441369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233428964515bad1fd7d7d0-59150710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_details' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bad1fdfca07_65072901',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bad1fdfca07_65072901')) {function content_515bad1fdfca07_65072901($_smarty_tpl) {?><style type="text/css">
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