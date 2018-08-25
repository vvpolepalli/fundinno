<?php /* Smarty version Smarty-3.1.8, created on 2013-01-31 11:28:36
         compiled from "/var/www/fundinnovations/application/views/signin_layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1972084744510a0728a60a18-59543472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ee18ed5bcd7291bf14c3e28eddfd5f8e0351146' => 
    array (
      0 => '/var/www/fundinnovations/application/views/signin_layout.tpl',
      1 => 1359611910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1972084744510a0728a60a18-59543472',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_510a0728abaae4_96430330',
  'variables' => 
  array (
    'baseurl' => 0,
    'header' => 0,
    'middlecontent' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510a0728abaae4_96430330')) {function content_510a0728abaae4_96430330($_smarty_tpl) {?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" >
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
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery.jcarousel.js"></script>


<script type="text/javascript" src="https://platform.linkedin.com/in.js?async=false">
  api_key: j3w117vy2pmr
  authorize: false
</script>
<script type="text/javascript">
$(document).ready(function(){
$("#mylinkedin").click(function () {
  IN.UI.Authorize().params({"scope":["r_fullprofile", "r_emailaddress","r_contactinfo"]}).place();
  IN.Event.on(IN, "auth", onLinkedInAuth);
});
});
function onLinkedInAuth() {    
    IN.API.Profile("me").fields([ "id","firstName", "location","lastName","skills","positions","educations","languages","phone-numbers","certifications","emailAddress","mainAddress","pictureUrl","public-profile-url"]).result(displayProfiles);
   // IN.User.logout(); //After we take the data, we do a log out
   // $.get("https://api.linkedin.com/uas/oauth/invalidateToken");
}

function displayProfiles(profiles) {
     member = profiles.values[0];
	//console.log(member);
	 var email_id  = member.emailAddress;
	 var firstName = member.firstName;
	 var lastName  = member.lastName;
	 var in_user_id= member.id;
	 var pictureUrl= member.pictureUrl;
	 //var picture_urls= member.picture-urls;
	 if(email_id=='undefined' || email_id=='')
	{
		$('#error_popup').show();
		$('#error_pop_cntnt').html('Unable to get profile details from linkedIn..');
	}	
	else{
	 var url='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
home/in_register'
	 var post_data={firstName:firstName,lastName:lastName,in_user_id:in_user_id,email_id:email_id,pictureUrl:pictureUrl}
	  $.ajax(
	  {
		  type:'POST', 
		  url:url,
		  data:post_data,
		  success: function(data)
		  {
			  
			  if(data==1)
			  {
					window.location='user/my_profile';
				  //alert(profile_picture_path)
				  
			  }
			 else if(data=="duplicate")
				{
					$('#error_popup').show();
					$('#error_pop_cntnt').html('This emaid id already registered with this site..');
				}
				if(data==0)
				{
					$('#error_popup').show();
					$('#error_pop_cntnt').html('Unable to get profile details from linkedIn..');
				}
		  }
	  });
	}
	 //console.log(member);
    // document.getElementById("profiles").innerHTML = 
        //  "<p id=\"" + member.id + "\">Hello " +  member.firstName + " " + member.lastName + "</p>";
}
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


		
		
</script>


<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
	FB.init({
	appId:'461303437265872', cookie:true,
	status:true, xfbml:true
	});
	
	FB.logout(function(response) {
		
		$("#purchasetraceback").val('');
  		
});
</script>

<script language="Javascript">
     function go_fblogin() {       
      FB.login(function(response) {
                  FB.getLoginStatus(function(response) {
                      
                      if (response.status === 'connected'){
                         FB.api('/me', function(response) {
                  		 
						 var username=response.username;
						 var userid=response.id;
						 var name=response.name;
						 var email=response.email;
						 var user_fname=response.first_name;
						 var user_lname=response.last_name;
						 var profile_link=response.link;
						// var pic_square=response.pic_square;
						// alert(pic_square);
						 var profile_picture_path=response.picture;
						 var purchasetracebackurl=$("#purchasetraceback").val();
						 if(purchasetracebackurl=='undefined')
						 	purchasetracebackurl='';
						if(email=='undefined' || email=='')
						  {
							  $('#error_popup').show();
							  $('#error_pop_cntnt').html('Unable to get profile details from facebook..');
						  }	
						  else{
						 var url='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
home/fb_register'
						$.ajax(
						{
							
							type:'POST', 
							url:url,
							data:"username="+username+"&fb_userid="+userid+"&name="+name+"&email="+email+"&fb_profile_link="+profile_link,
							success: function(data)
							{
								//alert(data) || data ==0
								if(data==1)
								{
										window.location='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/my_profile';
									
								}
								else if(data=="duplicate")
								{
									$('#error_popup').show();
									$('#error_pop_cntnt').html('This emaid id already registered with this site..');
								}
								else if(data==0)
								{
									$('#error_popup').show();
									$('#error_pop_cntnt').html('Unable to get profile details from facebook..');
								}
							}
						});
						}
				 });
                        }
                     });
 			 }, {scope: 'email,user_likes'});
     }
     
   
    </script>


</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['middlecontent']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>