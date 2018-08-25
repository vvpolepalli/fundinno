<script type="text/javascript" src="{$baseurl}/js/admin/jquery-ui-1.9.1.custom/jquery-ui-1.9.1.custom.min.js"></script>
<link href="{$baseurl}/js/admin/jquery-ui-1.9.1.custom/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css" media="screen" />
<div class="header_container_top">
  <div class="right fixing_right textto_right font_trebuchet" style=" width: 100%;">
    <div class="welcome_txt "> Welcome {$adminid}!!! </div>
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
    <h1><a href="{$baseurl}admin/home">Fundinnovation</a></h1>
  </div>
  <div class="optinMacc">
  {include file=$leftpane}
 </div> 
  <!--End:Logo Container-->
  <div class="clear"></div>
</div>
<!--End:Header Container Middle-->

<div class="header_container_bottom">
  <div class="main_menu sidemain_menu" id="main_menu_id">
    <ul>
      <li class="nav01"><a href="{$baseurl}admin/home" class="selected" ><i></i><span>Home</span> </a></li>
      <li class="nav02"><a href="javascript:void(0);"><i></i>Users</a>
        <ul>
          <li><a href="{$baseurl}admin/users/manage_siteusers">List All Users</a> </li>
          <li><a href="{$baseurl}admin/users/add_user">Add New User</a> </li>
        </ul>
      </li>
      <li class="nav03"><a href="javascript:void(0);" ><i></i><span>Category</span></a>
        <ul>
          <li><a href="{$baseurl}admin/category">List All Categories</a></li>
          <li><a style="cursor:pointer;" href="{$baseurl}admin/category/add_new_category">Add New Category</a></li>
        </ul>
      </li>
      <li class="nav04"><a href="javascript:void(0);" ><i></i><span>Projects</span></a>
        <ul>
          <li><a style="cursor:pointer;" href="{$baseurl}admin/project" >List All Projects</a> </li>
          <li><a style="cursor:pointer;" href="{$baseurl}admin/project/add_project" >Create New Project</a></li>
         <!-- <li><a style="cursor:pointer;" href="{$baseurl}admin/ads/manage_side_bottom_ads/bottom/" >Staff Pick</a></li>-->
          <li><a style="cursor:pointer;" href="{$baseurl}admin/project/refund_cash" >Refund Cash</a></li>
        </ul>
      </li>
      <li class="nav05"><a href="javascript:void(0);" ><i></i><span>CMS</span></a>
        <ul >
          <li><a href="{$baseurl}admin/Cms/ListCms">List CMS</a></li>
          <li><a href="{$baseurl}admin/home/homepage_image_banner">Home Page Image Banner</a></li>
          <li><a href="{$baseurl}admin/home/media_cms">Media Content Management</a></li>
        </ul>
      </li>
      <li class="nav06"><a href="javascript:void(0);" ><i></i><span>Order History</span></a>
        <ul >
          <li><a href="{$baseurl}admin/payment">View Payments</a>
        </ul>
      </li>
      
      <!--  <li class="nav07"><a href="javascript:void(0);" ><i></i><span>Manage Enquiry</span></a>
             <ul>
              <li><a href="{$baseurl}admin/Enquiry/enquiry_lists">View Enquiries</a></li>                 
             </ul> 
         </li>      -->
      
      <li class="nav08"><a  href="javascript:void(0);"><i></i><span>News Letter</span></a>
        <ul>
          <li><a href="{$baseurl}admin/Cms/add_news_letter">Add News Letter</a>
          <li><a href="{$baseurl}admin/Cms/send_news_letter">Send News Letter</a>
          <li><a  href="{$baseurl}admin/Cms/news_letter" >List News Letters</a>
		  <li><a  href="{$baseurl}admin/Cms/add_email_address" >Add Email Address</a>
        </ul>
      </li>
      <li class="nav09"><a href="javascript:void(0);"><i></i><span>Manage City</span></a>
        <ul>
          <li><a href="{$baseurl}admin/city/add_city">Add City</a>
          <li><a href="{$baseurl}admin/city">List City</a>
        </ul>
      </li>
      <li class="nav01"><a href="javascript:void(0);"><i></i><span>Manage Settings</span></a>
        <ul>
          <!--<li><a href="{$baseurl}admin/resources/reward_points">Change Password</a>-->
          <li><a href="{$baseurl}admin/home/change_email_id">Change Email id</a>
        </ul>
      </li>
      <!-- <li class="nav09"><a href="javascript:void(0);"><i></i><span>Resources</span></a>
             <ul>
              <li><a href="{$baseurl}admin/resources/reward_points">Reward Point Settings</a>
              <li><a href="{$baseurl}admin/resources/user_badges">User Badge Settings</a>
              <li><a href="{$baseurl}admin/resources/manage_blogs">Blogs</a>
                      <ul>
                                 <li><a style="cursor:pointer;" href="{$baseurl}admin/resources/manage_blogs">List Blogs</a></li>
                                 <li><a style="cursor:pointer;" href="{$baseurl}admin/resources/add_new_blog">Add New</a></li>                               
                     </ul>
             </li>   
           
               <li><a href="{$baseurl}admin/resources/manage_questions">Question &amp; Answer</a>
               <li><a style="cursor:pointer;" href="{$baseurl}admin/resources/manage_abuse_question">Abused Q &amp; A</a>
                <ul>
                         <li><a style="cursor:pointer;" href="{$baseurl}admin/resources/manage_abuse_question">Abused Questions</a></li>
                         <li><a style="cursor:pointer;" href="{$baseurl}admin/resources/manage_abuse_report">Abused Answers</a></li>   
                         
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
