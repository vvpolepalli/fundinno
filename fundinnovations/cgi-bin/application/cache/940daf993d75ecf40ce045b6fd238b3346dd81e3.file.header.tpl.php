<?php /* Smarty version Smarty-3.1.8, created on 2013-02-14 14:46:09
         compiled from "/var/www/fundinnovations/application/views/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136472505350cafcbc34e2d2-65445703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '940daf993d75ecf40ce045b6fd238b3346dd81e3' => 
    array (
      0 => '/var/www/fundinnovations/application/views/header.tpl',
      1 => 1360833366,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136472505350cafcbc34e2d2-65445703',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50cafcbc3754e2_56219259',
  'variables' => 
  array (
    'baseurl' => 0,
    'media' => 0,
    'm' => 0,
    'profile_name' => 0,
    'search_param' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50cafcbc3754e2_56219259')) {function content_50cafcbc3754e2_56219259($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.truncate.php';
?> 
<script type="text/javascript">
var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
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
	
</script>
 
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/css/ie78.css" />
<![endif]-->


<header>
  <div class="headerWrap">
    <h1 class="logo"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
home">FundInnovation</a></h1>
    <?php if (count($_smarty_tpl->tpl_vars['media']->value)>0){?>
    <div class="newsSlider">
      <ul id="media-carousel" class="jcarousel-skin-tango">
      <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['media']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/media_images/<?php echo $_smarty_tpl->tpl_vars['m']->value['image'];?>
" alt="title" height="35"/></a></li>
        <?php } ?>
       <!-- <li><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/media_02.jpg" alt="title"  width="58"/></a></li>
        <li><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/media_03.jpg" alt="title"  width="58"/></a></li>
        <li><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/media_04.jpg" alt="title" width="65"/></a></li>
        <li><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/media_05.jpg" alt="title" width="100"/></a></li>
        <li><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/media_06.jpg" alt="title" width="44"/></a></li>
        <li><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/media_07.jpg" alt="title" width="43"/></a></li>
        <li><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/media_03.jpg" alt="title" width="58"/></a></li>
        <li><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/media_04.jpg" alt="title" width="65"/></a></li>
        <li><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/media_05.jpg" alt="title" width="100"/></a></li>-->
      </ul>
    </div>
    <?php }?>
    <div class="clear"></div>
    <nav class="leftNav txtUpper">
      <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
how_it_works">How It Works?</a></li>
        <li class="secontLi"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects">Discover Projects</a></li>
        <li class="thirdLi"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project">Innovate Projects</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
about_us">About Us</a></li>
      </ul>
    </nav>
    
    <nav class="rightNav">
      <ul>
     <?php if ($_smarty_tpl->tpl_vars['profile_name']->value!=''){?>
       <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/my_profile" title="<?php echo ucwords($_smarty_tpl->tpl_vars['profile_name']->value);?>
"><?php echo smarty_modifier_truncate(ucwords($_smarty_tpl->tpl_vars['profile_name']->value),10);?>
</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
signout">Sign out</a></li>
    <?php }else{ ?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
signin">Sign In</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
signup">Sign Up</a></li>
    <?php }?>
      </ul>
    </nav>
    <div class="searchPane">
    <form id="frm_search_header" name="frm_search_header" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/search" >
      <input type="button" id="searchbtn" name="searchbtn" onclick=" return search();">
      <input type="text" value="<?php if ($_smarty_tpl->tpl_vars['search_param']->value==''){?>Search projects<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['search_param']->value;?>
<?php }?>" id="sr_project_title" name="sr_project_title" onfocus="myFocus(this)" onblur="myBlur(this)">
      </form>
    </div>
  </div>
</header>
<?php }} ?>