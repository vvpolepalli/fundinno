<!DOCTYPE html>
<html class="no-js"><!--<![endif]--><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Fund Innovation : infinite possibilities</title>
<link href="http://www.fundinnovations.com/images/fav.ico" rel="shortcut icon">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.8.3.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
<script type="text/javascript">
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
 $(document).ready(function(){
 $(".form-allowed-tags").hide();
 });
 
</script>

</head>
<body>
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="http://www.fundinnovations.com/styles/css/ie78.css" />
<![endif]-->
<header>
  <div class="headerWrap">
    <h1 class="logo"><a href="http://www.fundinnovations.com/home">FundInnovation</a></h1>
        <div class="clear"></div>
    <nav class="leftNav txtUpper">
      <ul>
        <li style="border-left: 0px none;"><a href="http://www.fundinnovations.com/how_it_works">How It Works?</a></li>
        <li class="secontLi"><a href="http://www.fundinnovations.com/archive_projects">Discover Projects</a></li>
        <li class="thirdLi"><a href="http://www.fundinnovations.com/project/innovate_project">Innovate Projects</a></li>
        <li><a href="http://www.fundinnovations.com/about_us">About Us</a></li>
      </ul>
    </nav>
    
    <nav class="rightNav">
      <ul>
        <?php if ( !is_user_logged_in() ) { ?>
		<li style="border-left: 0px none;"><a href="<?php echo home_url(); ?>/login">Sign In</a></li>
        <li><a href="<?php echo home_url(); ?>/signup">Sign Up</a></li>
		<?php }else if ( is_user_logged_in() ) { ?>
		<li><a href="<?php echo wp_logout_url( ""); ?>">logout</a></li>
		<?php }?>
          </ul>
    </nav>
    <div class="searchPane">
    <form id="frm_search_header" name="frm_search_header" method="post" action="http://www.fundinnovations.com/archive_projects/search">
      <input id="searchbtn" name="searchbtn" onclick=" return search();" type="button">
      <input value="Search projects" id="sr_project_title" name="sr_project_title" onfocus="myFocusSearch(this)" onblur="myBlurSearch(this)" type="text">
      </form>
    </div>
  </div>
</header>
<div class="main">