<?php /* Smarty version Smarty-3.1.8, created on 2013-08-07 11:09:10
         compiled from "/home/fundinno/public_html/application/views/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2737950385159845fc75684-80905036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3820096fa39f4b4b663184fdc0693bd938057705' => 
    array (
      0 => '/home/fundinno/public_html/application/views/layout.tpl',
      1 => 1375894341,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2737950385159845fc75684-80905036',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5159845fdbcc76_91916291',
  'variables' => 
  array (
    'baseurl' => 0,
    'header' => 0,
    'middlecontent' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5159845fdbcc76_91916291')) {function content_5159845fdbcc76_91916291($_smarty_tpl) {?><!DOCTYPE HTML>
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

   var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39859499-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

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