<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="{$cms_content.meta_keywords}" />
<meta name="description" content="{$cms_content.meta_description}" /> 
<title>{$cms_content.page_title}</title>
<link href="{$baseurl}images/fav.ico" rel="shortcut icon">
<link rel="stylesheet" href="{$baseurl}styles/css/popup.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="{$baseurl}styles/css/style.css">
<link rel="stylesheet" type="text/css" href="{$baseurl}styles/css/common.css">
<script type="text/javascript" src="{$baseurl}js/html5.js"></script>
<link rel="stylesheet" type="text/css" href="{$baseurl}styles/css/slider_style.css" />
<link rel="stylesheet" type="text/css" href="{$baseurl}styles/css/nivo-slider.css" />
<script type="text/javascript" src="{$baseurl}js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="{$baseurl}js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="{$baseurl}js/pirobox_extended.js"></script>
<script type="text/javascript" src="{$baseurl}js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="{$baseurl}js/jquery.nivo.slider.js"></script>
{literal}
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
{/literal}
</head>

<body>
{include file=$header}
{include file=$middlecontent}
{include file=$footer}
</body>
</html>
