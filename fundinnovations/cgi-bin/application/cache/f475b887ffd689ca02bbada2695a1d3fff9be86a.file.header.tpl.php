<?php /* Smarty version Smarty-3.1.8, created on 2013-07-17 12:34:43
         compiled from "/home/fundinno/public_html/application/views/admin/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1612967671515a87238d8e07-58340098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f475b887ffd689ca02bbada2695a1d3fff9be86a' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/header.tpl',
      1 => 1373787581,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1612967671515a87238d8e07-58340098',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515a8723aac136_26752130',
  'variables' => 
  array (
    'baseurl' => 0,
    'adminid' => 0,
    'leftpane' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515a8723aac136_26752130')) {function content_515a8723aac136_26752130($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/js/admin/jquery-ui-1.9.1.custom/jquery-ui-1.9.1.custom.min.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/js/admin/jquery-ui-1.9.1.custom/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css" media="screen" />
<div class="header_container_top">
  <div class="right fixing_right textto_right font_trebuchet" style=" width: 100%;">
    <div class="welcome_txt "> Welcome <?php echo $_smarty_tpl->tpl_vars['adminid']->value;?>
!!! </div>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<!--End:Right top link-->
<div class="left font_tahoma"></div>
<!--End:Left top link-->
<div class="clear"></div>

<!--End:Header Container Top-->
<div class="header_container_middle"> 

  <!--End:Quick Links -->
  <div class="logo fixing_left">
    <h1><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home">Fundinnovation</a></h1>
  </div>
  <div class="optinMacc">
  <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['leftpane']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 </div> 
  <!--End:Logo Container-->
  <div class="clear"></div>
</div>
<!--End:Header Container Middle-->

<div class="header_container_bottom">
  <div class="main_menu sidemain_menu" id="main_menu_id">
    <ul>
      <li class="nav01"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home" class="selected" ><i></i><span>Home</span> </a></li>
      <li class="nav02"><a href="javascript:void(0);"><i></i>Users</a>
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/users/manage_siteusers">List All Users</a> </li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/users/add_user">Add New User</a> </li>
        </ul>
      </li>
      <li class="nav03"><a href="javascript:void(0);" ><i></i><span>Category</span></a>
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/category">List All Categories</a></li>
          <li><a style="cursor:pointer;" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/category/add_new_category">Add New Category</a></li>
        </ul>
      </li>
      <li class="nav04"><a href="javascript:void(0);" ><i></i><span>Projects</span></a>
        <ul>
          <li><a style="cursor:pointer;" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project" >List All Projects</a> </li>
          <li><a style="cursor:pointer;" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/add_project" >Create New Project</a></li>
         <!-- <li><a style="cursor:pointer;" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/ads/manage_side_bottom_ads/bottom/" >Staff Pick</a></li>-->
          <li><a style="cursor:pointer;" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/refund_cash" >Refund Cash</a></li>
        </ul>
      </li>
      <li class="nav05"><a href="javascript:void(0);" ><i></i><span>CMS</span></a>
        <ul >
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/ListCms">List CMS</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home/homepage_image_banner">Home Page Image Banner</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home/media_cms">Media Content Management</a></li>
        </ul>
      </li>
      <li class="nav06"><a href="javascript:void(0);" ><i></i><span>Order History</span></a>
        <ul >
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/payment">View Payments</a>
        </ul>
      </li>
      
      <!--  <li class="nav07"><a href="javascript:void(0);" ><i></i><span>Manage Enquiry</span></a>
             <ul>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Enquiry/enquiry_lists">View Enquiries</a></li>                 
             </ul> 
         </li>      -->
      
      <li class="nav08"><a  href="javascript:void(0);"><i></i><span>News Letter</span></a>
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/add_news_letter">Add News Letter</a>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/send_news_letter">Send News Letter</a>
          <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/news_letter" >List News Letters</a>
		  <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/add_email_address" >Add Email Address</a>
        </ul>
      </li>
      <li class="nav09"><a href="javascript:void(0);"><i></i><span>Manage City</span></a>
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/city/add_city">Add City</a>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/city">List City</a>
        </ul>
      </li>
      <li class="nav01"><a href="javascript:void(0);"><i></i><span>Manage Settings</span></a>
        <ul>
          <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/resources/reward_points">Change Password</a>-->
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home/change_email_id">Change Email id</a>
        </ul>
      </li>
      <!-- <li class="nav09"><a href="javascript:void(0);"><i></i><span>Resources</span></a>
             <ul>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/resources/reward_points">Reward Point Settings</a>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/resources/user_badges">User Badge Settings</a>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/resources/manage_blogs">Blogs</a>
                      <ul>
                                 <li><a style="cursor:pointer;" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/resources/manage_blogs">List Blogs</a></li>
                                 <li><a style="cursor:pointer;" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/resources/add_new_blog">Add New</a></li>                               
                     </ul>
             </li>   
           
               <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/resources/manage_questions">Question &amp; Answer</a>
               <li><a style="cursor:pointer;" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/resources/manage_abuse_question">Abused Q &amp; A</a>
                <ul>
                         <li><a style="cursor:pointer;" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/resources/manage_abuse_question">Abused Questions</a></li>
                         <li><a style="cursor:pointer;" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/resources/manage_abuse_report">Abused Answers</a></li>   
                         
                    </ul>     
               		
               </li> 
                 
               			 
               </li>             
            </ul>
          </li>-->
      
    </ul>
    <div class="clear"></div>
  </div>
  
  <!--End:Header Container Bottom--> 
</div>
<?php }} ?>