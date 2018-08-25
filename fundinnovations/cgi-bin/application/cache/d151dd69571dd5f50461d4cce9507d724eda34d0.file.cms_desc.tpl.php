<?php /* Smarty version Smarty-3.1.8, created on 2013-06-26 03:41:19
         compiled from "/home/fundinno/public_html/application/views/cms_desc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:437957317516f9516cde479-99655496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd151dd69571dd5f50461d4cce9507d724eda34d0' => 
    array (
      0 => '/home/fundinno/public_html/application/views/cms_desc.tpl',
      1 => 1372239665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '437957317516f9516cde479-99655496',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_516f9516d5cdb2_37999754',
  'variables' => 
  array (
    'baseurl' => 0,
    'page_t' => 0,
    'cms_content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_516f9516d5cdb2_37999754')) {function content_516f9516d5cdb2_37999754($_smarty_tpl) {?><style type="text/css">
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
	max-width:100%;
}
</style>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-1.4.3.min.js"></script>
 <script type="text/javascript">
$(window).load(function(){
$('#proj_cntnt',window.parent.document).css('height',$(document).height());
$(".projDesc").find("a").attr('target','_parent');
var page_t='<?php echo $_smarty_tpl->tpl_vars['page_t']->value;?>
';
if(page_t =='media_page'){
var hash_pos=parent.document.URL.indexOf('#')+1;
if(hash_pos !=0){
var goto=parent.document.URL.substr(hash_pos);
document.getElementById(goto).scrollIntoView()
}
}
});
</script> 
<div class="projDesc" >
<?php echo $_smarty_tpl->tpl_vars['cms_content']->value['page_content'];?>

</div><?php }} ?>