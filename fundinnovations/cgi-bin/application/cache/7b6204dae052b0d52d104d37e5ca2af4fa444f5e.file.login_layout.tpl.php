<?php /* Smarty version Smarty-3.1.8, created on 2013-04-17 22:42:23
         compiled from "/home/fundinno/public_html/application/views/login_layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1395556786515986148ca2b1-98236275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b6204dae052b0d52d104d37e5ca2af4fa444f5e' => 
    array (
      0 => '/home/fundinno/public_html/application/views/login_layout.tpl',
      1 => 1366260141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1395556786515986148ca2b1-98236275',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515986149e2255_84824955',
  'variables' => 
  array (
    'baseurl' => 0,
    'rediderect_url' => 0,
    'header' => 0,
    'middlecontent' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515986149e2255_84824955')) {function content_515986149e2255_84824955($_smarty_tpl) {?><!DOCTYPE HTML>
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
js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery.jcarousel.js"></script>

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


<script type="text/javascript" src="https://platform.linkedin.com/in.js?async=false">
  api_key: nozeubnjj3ts
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
		$('#error_pop_cntnt').html('Sorry, we are unable to receive details from  LinkedIn. Please contact site administrator or try again later.');
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
					var rediderect_url = $('#rediderect_url').val();
					if(rediderect_url =='')
						window.location='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/my_profile';
					else
					window.location=rediderect_url;
									//window.location='user/my_profile';
				  //alert(profile_picture_path)
				  
			  }
			 else if(data=="duplicate")
				{
					$('#error_popup').show();openpPopup();
					$('#error_pop_cntnt').html('Email you entered, is already registered with us, please try registering with a different Email. Thank you.');
				}
				if(data==0)
				{
					$('#error_popup').show();openpPopup();
					$('#error_pop_cntnt').html('Sorry, we are unable to receive details from  LinkedIn. Please contact site administrator or try again later.');
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
	appId:'316458278483601', cookie:true,
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
						if(email=='undefined' || email=='' || userid =='undefined')
						  {
							  $('#error_popup').show();openpPopup();
							  $('#error_pop_cntnt').html('Sorry, we are unable to receive details from FB. Please contact site administrator or try again later.');
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
								
								//alert(data)//alert(data) || data ==0
								if(data==1)
								{
									var rediderect_url = $('#rediderect_url').val();
									if(rediderect_url =='')
										window.location='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/my_profile';
									else
									window.location=rediderect_url;
								}
								else if(data=="duplicate")
								{
									$('#error_popup').show();openpPopup();
									$('#error_pop_cntnt').html('Email you entered, is already registered with us, please try registering with a different Email. Thank you.');
								}
								else if(data==0)
								{
									$('#error_popup').show();openpPopup();
									$('#error_pop_cntnt').html('Sorry, we are unable to receive details from FB. Please contact site administrator or try again later.');
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
<input type="hidden" name="rediderect_url" id="rediderect_url" value="<?php echo $_smarty_tpl->tpl_vars['rediderect_url']->value;?>
" />
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['middlecontent']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>