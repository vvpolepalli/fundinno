<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js ie-old"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie7"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Fund Innovation : infinite possibilities</title>
<link href="{$baseurl}images/fav.ico" rel="shortcut icon">
<link rel="stylesheet" href="{$baseurl}styles/css/popup.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="{$baseurl}styles/css/style.css">
<link rel="stylesheet" type="text/css" href="{$baseurl}styles/css/common.css">
<script type="text/javascript" src="{$baseurl}js/html5.js"></script>
<link rel="stylesheet" type="text/css" href="{$baseurl}styles/css/slider_style.css" />
<link rel="stylesheet" type="text/css" href="{$baseurl}styles/css/nivo-slider.css" />
<script type="text/javascript" src="{$baseurl}js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="{$baseurl}js/jquery-ui-1.8.2.custom.min.js"></script>
<!--<script type="text/javascript" src="{$baseurl}js/pirobox_extended.js"></script>-->
<script type="text/javascript" src="{$baseurl}js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="{$baseurl}js/jquery.nivo.slider.js"></script>

 <script src="{$baseurl}video/video_js/video.js"></script>

 <link rel="stylesheet" type="text/css" href="{$baseurl}video/video_js/video-js.css">
<script src="{$baseurl}video/flowplayer/flowplayer.min.js"></script>
<script type="text/javascript" src="{$baseurl}video/flowplayer/flowplayer-3.2.11.min.js"></script>
<link href="{$baseurl}video/flowplayer/minimalist.css" rel="stylesheet" type="text/css">
{literal}
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
{/literal}
</head>

<body>
{include file=$header}
{include file=$middlecontent}
{include file=$footer}
</body>
</html>
