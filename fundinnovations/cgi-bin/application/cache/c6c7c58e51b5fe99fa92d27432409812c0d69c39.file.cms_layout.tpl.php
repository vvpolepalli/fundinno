<?php /* Smarty version Smarty-3.1.8, created on 2013-02-25 17:27:32
         compiled from "/var/www/fundinnovations/application/views/cms_layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92455610250ed45f66041e3-65517596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6c7c58e51b5fe99fa92d27432409812c0d69c39' => 
    array (
      0 => '/var/www/fundinnovations/application/views/cms_layout.tpl',
      1 => 1361782553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92455610250ed45f66041e3-65517596',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50ed45f667c837_11137580',
  'variables' => 
  array (
    'cms_content' => 0,
    'baseurl' => 0,
    'header' => 0,
    'middlecontent' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ed45f667c837_11137580')) {function content_50ed45f667c837_11137580($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['cms_content']->value['meta_keywords'];?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['cms_content']->value['meta_description'];?>
" /> 
<title><?php echo $_smarty_tpl->tpl_vars['cms_content']->value['page_title'];?>
</title>
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
js/pirobox_extended.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery.nivo.slider.js"></script>

<script type="text/javascript">

<!--carousel-->
function mycarousel_initCallback(carousel){
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });
    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
    };
    jQuery(document).ready(function() {
        jQuery('#media-carousel').jcarousel({       
        auto: 2,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
	
		

});
<!--li style-->
$(function(){
    $("li:first-child").css("border-left","0")
})

<!--pirobox popup-->
	$().piroBox_ext({
			piro_speed : 700,
			bg_alpha : 0.5,
			piro_scroll : true // pirobox always positioned at the center of the page
	});
		
		


</script>

</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['middlecontent']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>