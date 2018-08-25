{literal} 
<script type="text/javascript">
var baseurl='{/literal}{$baseurl}{literal}';
$(document).ready(function() {
	if($(window).width()<1143){
		$('body').addClass('sScreen')
	}
	$('.white_content').css('left',$(window).width()/2-287);
});
$(window).resize(function() {
	if($(window).width()<1143){
		$('body').addClass('sScreen')
	}
	else{
		$('body').removeClass('sScreen')
	}
});
function search(){
	if( $.trim($('#sr_project_title').val()) !='' && $.trim($('#sr_project_title').val()) != 'Search projects'){
		
	$('#frm_search_header').submit();
	}
	else 
	return false;
	}
function myFocus(element) {
 if (element.value == element.defaultValue) {
  element.value = '';
 }
 }
 function myBlur(element) {
 if (element.value == '') {
 element.value = element.defaultValue;
 }
 } 
function myFocusSearch(element) {
 if (element.value == 'Search projects') {
  element.value = '';
 }
 }
 function myBlurSearch(element) {
 if (element.value == '') {
 element.value = 'Search projects';
 }
 }
</script>
{/literal} 
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="{$baseurl}styles/css/ie78.css" />
<![endif]-->


<header>
  <div class="headerWrap">
    <h1 class="logo"><a href="{$baseurl}home">FundInnovation</a></h1>
    {if $media|@count gt 0}
    <div class="newsSlider">
      <ul id="media-carousel" class="jcarousel-skin-tango">
      {foreach from=$media item=m}
        <li><a href="{$m.link}"><img src="{$baseurl}uploads/media_images/{$m.image}" alt="title" height="35"/></a></li>
        {/foreach}
       <!-- <li><a href="#"><img src="{$baseurl}images/media_02.jpg" alt="title"  width="58"/></a></li>
        <li><a href="#"><img src="{$baseurl}images/media_03.jpg" alt="title"  width="58"/></a></li>
        <li><a href="#"><img src="{$baseurl}images/media_04.jpg" alt="title" width="65"/></a></li>
        <li><a href="#"><img src="{$baseurl}images/media_05.jpg" alt="title" width="100"/></a></li>
        <li><a href="#"><img src="{$baseurl}images/media_06.jpg" alt="title" width="44"/></a></li>
        <li><a href="#"><img src="{$baseurl}images/media_07.jpg" alt="title" width="43"/></a></li>
        <li><a href="#"><img src="{$baseurl}images/media_03.jpg" alt="title" width="58"/></a></li>
        <li><a href="#"><img src="{$baseurl}images/media_04.jpg" alt="title" width="65"/></a></li>
        <li><a href="#"><img src="{$baseurl}images/media_05.jpg" alt="title" width="100"/></a></li>-->
      </ul>
    </div>
    {/if}
    <div class="clear"></div>
    <nav class="leftNav txtUpper">
      <ul>
        <li><a href="{$baseurl}how_it_works">How It Works?</a></li>
        <li class="secontLi"><a href="{$baseurl}archive_projects">Discover Projects</a></li>
        <li class="thirdLi"><a href="{$baseurl}project/innovate_project">Innovate Projects</a></li>
        <li><a href="{$baseurl}about_us">About Us</a></li>
		<li><a href="{$baseurl}blog">Blog</a></li>
      </ul>
    </nav>
    
    <nav class="rightNav">
      <ul>
     {if $profile_name neq ''}
       <li><a href="{$baseurl}user/my_profile" title="{$profile_name|ucwords}">{$profile_name|ucwords|truncate:10}</a></li>
        <li><a href="{$baseurl}signout">Sign out</a></li>
    {else}
        <li><a href="{$baseurl}signin">Sign In</a></li>
        <li><a href="{$baseurl}signup">Sign Up</a></li>
    {/if}
      </ul>
    </nav>
    <div class="searchPane">
    <form id="frm_search_header" name="frm_search_header" method="post" action="{$baseurl}archive_projects/search" >
      <input type="button" id="searchbtn" name="searchbtn" onclick=" return search();">
      <input type="text" value="{if $search_param eq ''}Search projects{else}{$search_param}{/if}" id="sr_project_title" name="sr_project_title" onfocus="myFocusSearch(this)" onblur="myBlurSearch(this)">
      </form>
    </div>
  </div>
</header>
