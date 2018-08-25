<?php /* Smarty version Smarty-3.1.8, created on 2013-04-01 23:22:41
         compiled from "/home/fundinno/public_html/application/views/projects/project_layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1945524315515a6b21bd9796-00365334%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '939423bda9fba104143804910d613da33b5f7186' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/project_layout.tpl',
      1 => 1361458174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1945524315515a6b21bd9796-00365334',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project_det' => 0,
    'baseurl' => 0,
    'header' => 0,
    'middlecontent' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515a6b21d17c59_56996164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515a6b21d17c59_56996164')) {function content_515a6b21d17c59_56996164($_smarty_tpl) {?><!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js ie-old"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie7"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="title" content="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
" />
<meta name="description" content="<?php echo stripslashes($_smarty_tpl->tpl_vars['project_det']->value['short_description']);?>
" />
<meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
" />
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_image'];?>
"/>
<!--
<meta name="twitter:title" content="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
">-->
<link rel="image_src"     href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_image'];?>
" />
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