<?php /* Smarty version Smarty-3.1.8, created on 2013-02-06 14:41:53
         compiled from "/var/www/fundinnovations/application/views/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113605598150cafcbc1e9529-00088340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd6afa065a80911a5db953bcee34edca741734dd' => 
    array (
      0 => '/var/www/fundinnovations/application/views/layout.tpl',
      1 => 1360141510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113605598150cafcbc1e9529-00088340',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50cafcbc34adf6_06600290',
  'variables' => 
  array (
    'baseurl' => 0,
    'header' => 0,
    'middlecontent' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50cafcbc34adf6_06600290')) {function content_50cafcbc34adf6_06600290($_smarty_tpl) {?><!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js ie-old"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie7"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Fund Innovation : infinite possibilities</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/fav.ico" rel="shortcut icon">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/css/popup.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/css/common.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/html5.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/css/slider_style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/css/nivo-slider.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-ui-1.8.2.custom.min.js"></script>
<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/pirobox_extended.js"></script>-->
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery.nivo.slider.js"></script>

 <script src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/video_js/video.js"></script>

 <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/video_js/video-js.css">
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/flowplayer/flowplayer.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/flowplayer/flowplayer-3.2.11.min.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/flowplayer/minimalist.css" rel="stylesheet" type="text/css">

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
 
<script type="text/javascript">

<!--carousel-->

    jQuery(document).ready(function() {
        jQuery('#media-carousel').jcarousel({       
        auto: 2
   	 });
	
	});
		


<!--li style-->
$(function(){
    $("li:first-child").css("border-left","0")
})


		
		


</script>

</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['middlecontent']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>