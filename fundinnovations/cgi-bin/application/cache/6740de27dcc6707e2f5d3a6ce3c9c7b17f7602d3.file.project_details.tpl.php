<?php /* Smarty version Smarty-3.1.8, created on 2013-06-27 03:33:43
         compiled from "/home/fundinno/public_html/application/views/projects/project_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195343408515a6b21d24ca6-18123007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6740de27dcc6707e2f5d3a6ce3c9c7b17f7602d3' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/project_details.tpl',
      1 => 1372325504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195343408515a6b21d24ca6-18123007',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515a6b22575b95_05414814',
  'variables' => 
  array (
    'baseurl' => 0,
    'user_id' => 0,
    'project_det' => 0,
    'proj_id' => 0,
    'project_det_counts' => 0,
    'project_status' => 0,
    'web' => 0,
    'backers' => 0,
    'share_contant' => 0,
    'reward' => 0,
    'back_sts' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515a6b22575b95_05414814')) {function content_515a6b22575b95_05414814($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/pirobox_extended.js"></script>


<style>
 .play_img{
   left: 254px;
    position: absolute;
    top: 285px;
	}
 </style>
<script type="text/javascript">
var baseurl ='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
function loadIframe(){
//$('#proj_cntnt').height(parseInt($('#proj_cntnt').contents().find('body').height())+'px');
//$('#proj_cntnt').attr('height',parseInt($('#proj_cntnt').contents().find('body').height())+12);
//$('#proj_cntnt').css('height',parseInt($('#proj_cntnt').contents().find('body').height())+'px');
}

 $(document).ready(function(){	

/* flowplayer("project_player", "<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/flowplayer/flowplayer-3.2.15.swf",{
      clip:  {
          autoPlay: false,
          autoBuffering: true
      }
	  
 });*/
  $('#backer-carousel').jcarousel({        
		auto: 2,
        wrap: 'last',
        initCallback: mycarousel_initCallback
	});
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

	$(document).ready(function() {
		jQuery('#content-carousel').jcarousel({        
		auto: 2,
        wrap: 'last',
		 animation: 'slow',
        initCallback: mycarousel_initCallback
	});
	$(document).ready(function() {
		jQuery('#popular-carousel').jcarousel({        
		auto: 2,
        wrap: 'last',
		 animation: 'slow',
        initCallback: mycarousel_initCallback
	});});
	$(document).ready(function() {
		jQuery('#recent-carousel').jcarousel({        
		auto: 2,
        wrap: 'last',
		 animation: 'slow',
        initCallback: mycarousel_initCallback
	});});
	});
	
/*	 $(".preview").live('click',function(e){
			$videotype=$(this).attr("type");
			$videolink=$(this).attr('rel');
			var dealid=$(this).attr('rel');
			$('#player_popup').show();
			var playerurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/play_videos';
			$('#pop_cntnt').load(playerurl,{videolink:$videolink,videotype:$videotype},function(){
				
				//$(".preview").hide();	
			})
		}) ;*/
	});
	function close_pop(id){
	 $('#'+id).hide();
	 if($("#back_popup").is(":visible") ){
	 } 
	 else{	 
	 closepPopup();
	 }
	 $('#pop_cntnt').empty();
	 $('#back_pop_cntnt').empty();
	 
	 $('#alert_pop_cntnt').empty();
 	}
	function star_project(proj_id,type){
		var user_id='<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		if(user_id ==''){
			$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/save_redirect_page",
				data: {project_id:proj_id}, 
				success: function(msg){
					window.location.href=baseurl+'signin';
					}
				});
		//$('#alert_popup').show();
		//openpPopup();
		//$('#alert_pop_cntnt').html('Please login to star this project');
		}
		else{
		$.ajax({
		type: "POST",
		url: baseurl+"archive_projects/star_project",
		data: "proj_id="+proj_id+"&type="+type, 
		success: function(msg){
		//	$('#lnk_star').removeAttr('onclick',''); 
			if(msg =='remove_star')
			$('#lnk_star_div').html('<a id="lnk_star" href="javascript:void(0);" onclick="star_project(\''+proj_id+'\',\''+msg+'\')" >Remove star</a>');
			else
			$('#lnk_star_div').html('<a id="lnk_star" href="javascript:void(0);" onclick="star_project(\''+proj_id+'\',\''+msg+'\')" >Star this project</a>');
			
			}
		});
		}
	}
	function create_promote_lnk(proj_id){
		var user_id ='<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		var proj_img='<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_image'];?>
';
		var title =$('#proj_title').val();
		var descpn =$('#proj_shortdesc').val();
		
		
		if(user_id){
		$.ajax({
		type: "POST",
		url: baseurl+"archive_projects/create_promote_lnk",
		data: "proj_id="+proj_id, 
		success: function(msg){
			//alert(msg)
			if(msg == 'not funded'){
				$('#alert_popup').show();openpPopup();
				$('#alert_pop_cntnt').html('Please support the project before promoting.')
			}else if(msg == 'duplicate'){
				$('#alert_popup').show();openpPopup();
				$('#alert_pop_cntnt').html('You have already created promote link for this project.')
			}else if(msg != 'duplicate' && msg !=''){
				$('#promote_lnk_txt').val(msg);
				$('#hid_promote_lnk').val(msg);
				addthis.button('.addthis_toolbox', {}, {url: msg, title:title,description:descpn});;
				
				$('#add_thissec').attr('addthis:url',msg);
				$('#add_thissec').attr('addthis:title', title);
				$('#add_thissec').attr('addthis:description', descpn);
 				$('#add_thissec').attr('onclick', "return addthis_sendto()");
				addthis.toolbox("#add_thissec");
				var proj_id='<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
				var	hrf="https://www.facebook.com/dialog/feed?app_id=316458278483601&link="+msg+"&picture="+baseurl+"uploads/projects/images/medium/"+proj_img+"&name="+title+"&caption="+title+"&description="+descpn+"&redirect_uri="+baseurl+"archive_projects/project_details/"+proj_id+"";
				$('.fb.show_soc').attr('href',hrf);
				var inhrf="http://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url="+msg+"";
				$('.in.show_soc').attr('href',inhrf);
			
			//	$('.show_soc').show();
				$('.socialShareblck').show();
				$("#promote_lnk_txt").attr("readonly", true); 
			}
			else{
				//$('#alert_popup').show();openpPopup();
				//$('#alert_pop_cntnt').html('Please login to get promote link.');
				var proj_id='<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
				$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/save_redirect_page",
				data: {project_id:proj_id}, 
				success: function(msg){
					 window.location.href=baseurl+'signin';
					}
				});
			}
		}
		});
		}else{
			//$('#alert_popup').show();openpPopup();
			//$('#alert_pop_cntnt').html('Please login to get promote link.');
			var proj_id='<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
			$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/save_redirect_page",
				data: {project_id:proj_id}, 
				success: function(msg){
					 window.location.href=baseurl+'signin';
					}
				});
		}
	}
	function open_mail_pop(lnk)
	{
		var user_id ='<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		var lnk=$('#hid_promote_lnk').val();
		$("#to_emailid").val('');
		//$('#promote_lnk_txt').val('');
		$('#message_cntnt').val('');	
		$('#subject').val('');
		$('#attach_lnk').html('');
		if(user_id){
		$('#send_mail_popup').show();openpPopup();
		$('#email_error').html('');
		$('#attach_lnk').html(lnk);
		}else{
			$('#alert_popup').show();openpPopup();
			$('#alert_pop_cntnt').html('Please login to share link.');
		}
	}
	function checkEmailSet() 
	{
		var to_emailids=$('#to_emailid').val().split(',');
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var flag=true;
		// var urlregex = new RegExp("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
		//var urlregex = new RegExp("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.){1}([0-9A-Za-z]+\.)");
		 for(var i=0;i<to_emailids.length;i++){
			 
			 if(emailReg.test($.trim(to_emailids[i]))) {
			 flag=true;
       		// return (true);
   			 }else
			 flag=false;
   			 //return (false);
    	}
		return flag;
	}
	
	function send_mail(){
		
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		$("#email_error").html('');	
		$("#subject_error").html('');	
		$("#message_error").html('');
		var proj_id="<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
";
		if($("#to_emailid").val()=='')
		{
			$("#email_error").html('<div class="error"><span>Please enter email id.</span></div>');
		//$("#to_emailid").after('<div class="clear"/><span class="error" id="email_error"><span>This field is required</span></span>');
		return false;
		}
		else if(!checkEmailSet()) 
		{
			$("#email_error").html('<div class="error"><span>Please enter valid email id.</span></div>');
		
		}
		else if($("#subject").val()=='')
		{
			$("#subject_error").html('<div class="error"><span>Please enter subject.</span></div>');
		
		return false;
		}
		else if($("#message_cntnt").val()=='')
		{
			$("#message_error").html('<div class="error"><span>Please enter message.</span></div>');
		
		return false;
		}
		else{
			var to_emailids = $("#to_emailid").val();
			//var attach_lnk = $('#promote_lnk_txt').val();
			var attach_lnk = $('#hid_promote_lnk').val();
			//alert(attach_lnk);
			var message_cntnt = $('#message_cntnt').val();	
			var subject = $('#subject').val();	
			var dat ={to_emailids:to_emailids,attach_lnk:attach_lnk,subject:subject,message_cntnt:message_cntnt,proj_id:proj_id}
			$.ajax({
			type: "POST",
			url: baseurl+"archive_projects/send_mail",
			data: dat, 
			success: function(msg){
				if(msg){
					
					$('#sendmail_resmsg').html('Your mail sent successfully.');
					$('#sendmail_resmsg').show();
					setTimeout(function() {
						$('#sendmail_resmsg').hide();
						close_pop('send_mail_popup');closepPopup();},2000);
				
				}
				else{
					close_pop('send_mail_popup');closepPopup();
				$('#alert_popup').show();openpPopup();
				$('#alert_pop_cntnt').html('Please login to share link.');
				}
			}
			});
		}
	}
	function contact_pop(){
		var user_id ='<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		$('#contact_message').val('');	
		$('#contact_subject').val('');
		$("#subj_error").html('');
		$("#subj_error").hide();
		$("#mess_error").html('');
		$("#mess_error").hide();
		var proj_id="<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
";
		if(user_id){
		$('#contact_popup').show();openpPopup();
		}else{
			//else{
			$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/save_redirect_page",
				data: {project_id:proj_id}, 
				success: function(msg){
					window.location.href=baseurl+'signin';
					}
				});
			
			//$('#alert_popup').show();
			//$('#alert_pop_cntnt').html('Please login first...');
		//}
		//	$('#alert_popup').show();openpPopup();
			//$('#alert_pop_cntnt').html('Please login first...');
		}
	}
	function contact_creater(){
		$("#subj_error").html('');
		$("#subj_error").hide();
		$("#mess_error").html('');
		$("#mess_error").hide();
		var subj	   = $.trim($('#contact_subject').val());
		var messge	   = $.trim($('#contact_message').val());	
		var to_emailid = '<?php echo $_smarty_tpl->tpl_vars['project_det']->value['email_id'];?>
';
		if(subj ==''){
		$("#subj_error").show();
		$("#subj_error").html('<span>Please enter subject</span>');
		return false;
		}else{
			$("#subj_error").hide();
			$("#subj_error").html('');
			}
		if(messge ==''){
			$("#mess_error").show();
		$("#mess_error").html('<span>Please enter message</span>');
		return false;
		}
		else{
			$("#mess_error").html('');
			$("#mess_error").hide();
			}
		if(messge !='' && subj !=''){
			var dat ={to_emailid:to_emailid,subject:subj,message_cntnt:messge}
			$.ajax({
			type: "POST",
			url: baseurl+"archive_projects/conatct_creator",
			data: dat, 
			success: function(msg){
				if(msg){
					$('#contact_resmsg').html('Your message sent successfully.');
					$('#contact_resmsg').show();
					setTimeout(function() {
						$('#contact_resmsg').hide();
						close_pop('contact_popup');closepPopup();},2000);
					
				}
				else{
					close_pop('contact_popup');closepPopup();
				$('#alert_popup').show();openpPopup();
				$('#alert_pop_cntnt').html('Please login.');
				}
			}
			});
			}
	} 
	function fund_project_pop(proj_id){
		var user_id ='<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		if(user_id){
		$('#back_popup').show();openpPopup();
		var min_pledge_amount=$('#min_pledge_amount').val();
		//var dat ={to_emailid:to_emailid,subject:subj,message_cntnt:messge}
			$.ajax({
			type: "POST",
			url: baseurl+"archive_projects/fund_project_page",
			data: {project_id:proj_id,min_pledge_amount:min_pledge_amount}, 
			success: function(msg){
				$('#back_pop_cntnt').show();
				$('#back_pop_cntnt').html(msg);
				
				$('#back_terms_pop_cntnt').hide();
			}
			});
			
		}else{
			var proj_id='<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
			$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/save_redirect_page",
				data: {project_id:proj_id}, 
				success: function(msg){
					window.location.href=baseurl+'signin';
					}
				});
			
			//$('#alert_popup').show();
			//$('#alert_pop_cntnt').html('Please login first...');
		}
		
	}
	function fund_reward_pop(proj_id,reward_id){
		var user_id ='<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
		if(user_id){
		$('#back_popup').show();openpPopup();
		var min_pledge_amount=$('#min_pledge_amount').val();
		//var dat ={to_emailid:to_emailid,subject:subj,message_cntnt:messge}
			$.ajax({
			type: "POST",
			url: baseurl+"archive_projects/fund_reward_page",
			data: {project_id:proj_id,min_pledge_amount:min_pledge_amount,reward_id:reward_id}, 
			success: function(msg){
				$('#back_pop_cntnt').show();
				$('#back_pop_cntnt').html(msg);
				
				$('#back_terms_pop_cntnt').hide();
			}
			});
			
		}else{
			//$('#alert_popup').show();openpPopup();
			//$('#alert_pop_cntnt').html('Please login first.');
			
			var proj_id='<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
			$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/save_redirect_page",
				data: {project_id:proj_id}, 
				success: function(msg){
					 window.location.href=baseurl+'signin';
					}
				});
			
			//$('#alert_popup').show();
			//$('#alert_pop_cntnt').html('Please login first...');
		
		}
		
	}
        function video_stschk(vid){
                var proj_id='<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
			$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/video_sts_chk",
				data: {project_id:proj_id,video:vid}, 
				success: function(msg){
                                        if(msg=='yes'){
					$('#alert_popup').show();openpPopup();
                                        $('#alert_pop_cntnt').html('Video uploading progessing. Please try after some time');
                                        }
					}
				});
        }
	 </script> 

<section  class="innerMidWrap">
  <ul class="innerMidTab">
    <li><a class="active" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Details</a> <span class="arrowtabs"></span></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_backers/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Supporters <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['backers_cnt'];?>
)</span></a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_videos/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Videos <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['videos_cnt'];?>
)</span></a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_images/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Images <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['images_cnt'];?>
)</span></a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_comments/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Comments <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['comments_cnt'];?>
)</span> </a></li>
    <?php if ($_smarty_tpl->tpl_vars['project_status']->value['project_status']=='success'){?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_updates/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Updates </a></li>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['project_det']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value){?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_admin_commets/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Admin Comments<span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['admin_comments_cnt'];?>
)</span></a></li>
    <?php }?>
  </ul>
  <div class="clear"></div>
   <input type="hidden" id="min_pledge_amount" name="min_pledge_amount" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['min_pledge_amount'];?>
" />
   <input type="hidden" id="proj_title" name="proj_title" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
" />
   <input type="hidden" id="proj_shortdesc" name="proj_title" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['project_det']->value['short_description']);?>
" />
  <div class="innerMidContent">
    <div class="disProDetailsLeft">
      <h4><?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
</h4>
      <span class="creterplace"><?php echo $_smarty_tpl->tpl_vars['project_det']->value['city_name'];?>
</span> <span class="creterfield"><?php echo ucwords($_smarty_tpl->tpl_vars['project_det']->value['category_name']);?>
</span>
      <div class="clear"></div>
      <div class="sharePane addthis_toolbox_new ">
        <div class="moreProBtnPane left" id="lnk_star_div"><?php if ($_smarty_tpl->tpl_vars['project_det']->value['user_id']!=$_smarty_tpl->tpl_vars['user_id']->value){?>
          <?php if ($_smarty_tpl->tpl_vars['project_det']->value['stared_status']==0){?> <a id="lnk_star" href="javascript:void(0);" onclick="star_project(<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
,'star')" >Star this project </a> <?php }else{ ?> <a id="lnk_star" href="javascript:void(0);" onclick="star_project(<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
,'remove_star')"  >Remove star </a> <?php }?><?php }?> </div>
        <div class="addthis_toolbox_new " 
        addthis:url="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
"
        addthis:title="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
"
        addthis:description="<?php echo stripslashes($_smarty_tpl->tpl_vars['project_det']->value['short_description']);?>
">
          <div class="custom_images">
            <ul class="socialShare">
              <li>Share With :</li>
              <li><a class="addthis_button_facebook fb" style="cursor:pointer"><img src="" alt="fb" /></a></li>
             <!-- <li><a class="addthis_button_twitter twit" style="cursor:pointer"><img src="" alt="twit" /></a></li>-->
             <li><a class=" twit" target="_blank" href="https://twitter.com/share?text=<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['project_det']->value['short_description']);?>
" data-text="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
" data-count="none" ><img src="" alt="twit" /></a></li>
              <li>
              <a class="in" target="_blank" href="http://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url=<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
" style="cursor:pointer">
             
              </a>
             
         
<!--<a class="addthis_button_linkedin in" style="cursor:pointer"><img src="" alt="in" /></a>--></li>
              <!--<a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
" data-count="none">Tweet</a>-->

              <!--<li><a class="fb" href="#">fb</a></li>
          <li><a class="twit" href="#">twit</a></li>
          <li><a class="in" href="#">in</a></li>-->
            </ul>
          </div>
        </div>
        <script type="text/javascript">//var addthis_config = {"data_track_addressbar":true};
        </script> 
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ead062198b3ae6"></script> 
         
        <!-- AddThis Button END --> 
      </div>
      <div class="clear"></div>
      <?php if ($_smarty_tpl->tpl_vars['project_det']->value['intro_video']!=''){?>
      <div class="videoBigPane" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['vid_sts']=='no'){?> onclick="video_stschk('<?php echo $_smarty_tpl->tpl_vars['project_det']->value['intro_video'];?>
')" <?php }?>>
   <!--[if lt IE 9]> 
 
<script type="text/javascript">
$(function() {
		  flowplayer("project_player", {
                src:"<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/flowplayer/flowplayer-3.2.15.swf",
                wmode:"transparent"
            } ,{
      clip:  {
          autoPlay: false,
          autoBuffering: true
      }
 	 });
	});
</script>


    <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['intro_video'];?>
" style="display:block;width:560px;height:340px"  id="project_player"> 
		</a>
 <![endif]-->
 <![if gte IE 9]>
 <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="560" height="340"
      poster="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['video_thumb_image'];?>
"
      data-setup="{}">
    <source src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['intro_video'];?>
" type='video/flv' />
   <!-- <track kind="captions" src="captions.vtt" srclang="en" label="English" />-->
  </video> <![endif]>

        
        <!--<img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/video_big.jpg" > --> 
      </div>
      
      <?php }elseif($_smarty_tpl->tpl_vars['project_det']->value['project_image']!=''){?>
       <div class="videoBigPane">
       <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_image'];?>
" style="display:block;width:560px;height:340px" />
       </div>
      <?php }?>
      <div class="title"><?php echo stripslashes($_smarty_tpl->tpl_vars['project_det']->value['short_description']);?>
</div>
      <iframe id="proj_cntnt" frameborder="0"    width="560" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_description/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['project_det']->value['project_description']);?>
</iframe>
      <div class="clear"></div>
    </div>
    <div class="disProDetailsRight">
      <div class="disProBrd"></div>
      <h5>Project Innovator</h5>
      <div class="createrDetails">
        <div class="createrPane" > <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['user_id'];?>
"><?php if ($_smarty_tpl->tpl_vars['project_det']->value['profile_imgurl']!=''){?> <img  src="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['profile_imgurl'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['profile_name'];?>
"> <?php }else{ ?> <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/prof_no_img.png" title="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['profile_name'];?>
"> <?php }?></a></div>
        <ul>
          <li class="createrName"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['user_id'];?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['project_det']->value['profile_name']);?>
</a></li>
          <li>
            <div class="label"><span class="left">Facebook Profile</span><span class="right">:</span></div>
            <div class="details"><?php if ($_smarty_tpl->tpl_vars['project_det']->value['fb_link']!=''){?><a href="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['fb_tinyurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['project_det']->value['fb_tinyurl'];?>
</a><?php }else{ ?>-<?php }?></div>
            <div class="clear"></div>
          </li>
          <li>
            <div class="label"><span class="left">Twitter Profile</span><span class="right">:</span></div>
            <div class="details"><?php if ($_smarty_tpl->tpl_vars['project_det']->value['twitter_link']!=''){?><a href="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['tw_tinyurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['project_det']->value['tw_tinyurl'];?>
</a><?php }else{ ?>-<?php }?></div>
            <div class="clear"></div>
          </li>
          <li>
            <div class="label"><span class="left">Website</span><span class="right">:</span></div>
            <div class="details"><?php if ($_smarty_tpl->tpl_vars['project_det']->value['web_tinyurls']!=''){?>
            <?php  $_smarty_tpl->tpl_vars['web'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['web']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_det']->value['web_tinyurls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['web']->key => $_smarty_tpl->tpl_vars['web']->value){
$_smarty_tpl->tpl_vars['web']->_loop = true;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['web']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['web']->value;?>
</a><br />
            <?php } ?><?php }else{ ?>-<?php }?></div>
            <div class="clear"></div>
          </li>
        </ul>
        <div class="clear"></div>
        <div class="moreProBtnPane "><?php if ($_smarty_tpl->tpl_vars['project_det']->value['user_id']!=$_smarty_tpl->tpl_vars['user_id']->value){?><a href="javascript:void(0)" onclick="contact_pop()">Contact Innovator</a> <?php }?></div>
        <div class="clear"></div>
      </div>
      <div class="createrDetails">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th width="50%" scope="col"><span class="label1">Supporters</span> <br>
              <span class="derails1"><?php echo $_smarty_tpl->tpl_vars['project_det']->value['backers_cnt'];?>
</span></th>
            <th width="50%" scope="col"><span class="label1">Days to go</span> <br>
              <span class="derails1"><?php if ($_smarty_tpl->tpl_vars['project_det']->value['remaining_days']<=0||$_smarty_tpl->tpl_vars['project_det']->value['remaining_days']==''){?>
              <?php if ($_smarty_tpl->tpl_vars['project_det']->value['created_date']==''||$_smarty_tpl->tpl_vars['project_det']->value['created_date']=='0000-00-00 00:00:00'){?>-<?php }else{ ?>-<?php }?>
              <?php }else{ ?>
              <?php if ($_smarty_tpl->tpl_vars['project_det']->value['remaining_days']>$_smarty_tpl->tpl_vars['project_det']->value['fund_duration']){?>
              -
              <?php }else{ ?>
              <?php echo $_smarty_tpl->tpl_vars['project_det']->value['remaining_days'];?>

              <?php }?>
              <?php }?></span></th>
          </tr>
          <tr>
            <td><div><span class="label1">Pre-Ordered Amount</span> <br>
                <span class="derails1"><span class="WebRupee">Rs. </span><?php echo $_smarty_tpl->tpl_vars['project_det']->value['pledged_amount'];?>
</span></div></td>
            <td><div><span class="label1">Goal Amount</span> <br>
                <span class="derails1"><span class="WebRupee">Rs. </span><?php echo $_smarty_tpl->tpl_vars['project_det']->value['funding_goal'];?>
</span></div></td>
          </tr>
        </table>
        <div class="clear"></div>
       
        <ul class="details2">
          <li>
          <div class="label"><span class="left">Project start date</span><span class="right">:</span></div>
            <div class="details"><?php if ($_smarty_tpl->tpl_vars['project_det']->value['created_date']==''||$_smarty_tpl->tpl_vars['project_det']->value['created_date']=='0000-00-00 00:00:00'){?><?php }else{ ?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['project_det']->value['created_date']);?>
<?php }?></div>
            <div class="clear"></div>
            <div class="label"><span class="left">Project ends on</span><span class="right">:</span></div>
            <div class="details"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['project_det']->value['end_date']);?>
</div>
            <div class="clear"></div>
          </li>
        </ul>
        <div class="clear"></div>
         
        
       
        <div class="blueBtnLi left">
          <input type="button" class="blueBtn" id="btn_fund_project" name="btn_fund_project"  <?php if ($_smarty_tpl->tpl_vars['project_det']->value['user_id']!=$_smarty_tpl->tpl_vars['user_id']->value){?> 
          <?php if ($_smarty_tpl->tpl_vars['project_det']->value['project_status']=='ongoing'&&$_smarty_tpl->tpl_vars['project_det']->value['status']!='rejected'){?>
          <?php if ($_smarty_tpl->tpl_vars['project_det']->value['remaining_days']>0&&$_smarty_tpl->tpl_vars['project_det']->value['remaining_days']<=$_smarty_tpl->tpl_vars['project_det']->value['fund_duration']){?>
        <?php if ($_smarty_tpl->tpl_vars['project_det']->value['backers_cnt']<$_smarty_tpl->tpl_vars['project_det']->value['max_sponsors']||$_smarty_tpl->tpl_vars['project_det']->value['max_sponsors']==0){?>
        
          onclick="fund_project_pop(<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
)"
          <?php }?> <?php }?> <?php }?><?php }?> value="Pre-Order Items">
        </div>
        
       <!-- <div class="minAmt">Minimum Pledge <span class="WebRupee">Rs. </span><?php echo $_smarty_tpl->tpl_vars['project_det']->value['min_pledge_amount'];?>
</div>-->
        <div class="empty23"></div>
        <div class="clear"></div>
      </div>
      <?php if (count($_smarty_tpl->tpl_vars['project_det']->value['backers_details'])>0){?>
      <div class="bakers">
        <div class="bakerInner">
          <h5>Supporters</h5>
          
          <ul id="backer-carousel" class="jcarousel-skin-baker">
            <?php  $_smarty_tpl->tpl_vars['backers'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['backers']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_det']->value['backers_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['backers']->key => $_smarty_tpl->tpl_vars['backers']->value){
$_smarty_tpl->tpl_vars['backers']->_loop = true;
?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['backers']->value['id'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['backers']->value['profile_imgurl']!=''){?> 
            <img style="height:55px;width:55px;"  src="<?php echo $_smarty_tpl->tpl_vars['backers']->value['profile_imgurl'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['backers']->value['profile_name'];?>
"> 
            <?php }else{ ?> 
            <img style="height:55px;width:55px;" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/prof_no_img.png" title="<?php echo $_smarty_tpl->tpl_vars['backers']->value['profile_name'];?>
"> 
            <?php }?>
         
            </a></li>
            <?php } ?>
          </ul>
          </div>
        <div class="clear"></div>
      </div> <?php }?>
     
      <div class="promotePane">
        <div class="promotePaneInner">
         <?php if ($_smarty_tpl->tpl_vars['project_det']->value['user_id']!=$_smarty_tpl->tpl_vars['user_id']->value&&$_smarty_tpl->tpl_vars['project_det']->value['project_status']=='ongoing'){?>
          <h4>Promote the project</h4>
         Simply hit the promote button, and grab your own customised promoter link. You will earn the following referral bonus every time someone uses your link to pre-order products.
          <div class="moreProBtnPane"><a class="left" href="javascript:void(0)" onclick="create_promote_lnk(<?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
)">Promote</a>
            <input class="refTxtBox" type="text" id="promote_lnk_txt" name="promote_lnk_txt" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['promote_link']!=''){?> readonly="readonly" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['promote_link'];?>
" />
            <input  type="hidden" id="hid_promote_lnk" name="hid_promote_lnk" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['promote_link'];?>
" />
            <div class="clear"></div>
          </div>
           
           <div id="ajx_share_icons" >
            <?php $_smarty_tpl->tpl_vars["share_contant"] = new Smarty_variable(stripslashes($_smarty_tpl->tpl_vars['project_det']->value['short_description']), null, 0);?>
          <div class="addthis_toolbox " id="add_thissec"  addthis:url="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['promote_link'];?>
"
addthis:title="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
"
        addthis:description="<?php echo $_smarty_tpl->tpl_vars['share_contant']->value;?>
">
            <div class="custom_images">
              <ul class="socialShare socialShareblck" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['promote_link']==''){?>  style="display:none;" <?php }?>>
                <li>
                <a target="_blank" class="fb show_soc" href="https://www.facebook.com/dialog/feed?app_id=316458278483601&link=<?php echo $_smarty_tpl->tpl_vars['project_det']->value['promote_link'];?>
&picture=<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_image'];?>
&name=<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
&caption=<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
&description=<?php echo $_smarty_tpl->tpl_vars['share_contant']->value;?>
&redirect_uri=<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
">share</a>
                <!--<a class="addthis_button_facebook fb show_soc"  style="display:block;cursor:pointer"  ><img src="" alt="fb" /></a>--></li>
                <li><a class="addthis_button_twitter twit show_soc" style="display:block;cursor:pointer"  ><img src="" alt="twit" /></a></li>
                <li><a class="in show_soc" target="_blank" href=" http://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url=<?php echo $_smarty_tpl->tpl_vars['project_det']->value['promote_link'];?>
"  style="display:block;cursor:pointer" ><img src="" alt="in" /></a></li>
                <li><a class="email show_soc"  style="display:block;cursor:pointer"  onclick="open_mail_pop('<?php echo $_smarty_tpl->tpl_vars['project_det']->value['promote_link'];?>
');"><img src="" alt="email" /></a></li>
                
              </ul>
            </div>
          </div>
          </div>
          <?php }?>
          
          <div class="infobox_sm"><h3>Referral Bonus</h3><h2><?php echo $_smarty_tpl->tpl_vars['project_det']->value['referrer_percentage'];?>
%</h2></div>
          <!--<ul class="socialShare">
            <li><a class="fb" href="#">fb</a></li>
            <li><a class="twit" href="#">twit</a></li>
            <li><a class="in" href="#">in</a></li>
            <li><a class="email" href="#">email</a></li>
            <li>Referal Bonus <?php echo $_smarty_tpl->tpl_vars['project_det']->value['referrer_percentage'];?>
%</li>
          </ul>-->
          <div class="clear"></div>
        </div>
      </div>
      
       <?php $_smarty_tpl->tpl_vars["back_sts"] = new Smarty_variable('', null, 0);?>
      <?php if ($_smarty_tpl->tpl_vars['project_det']->value['project_status']=='ongoing'&&$_smarty_tpl->tpl_vars['project_det']->value['status']!='rejected'){?>
     <?php if ($_smarty_tpl->tpl_vars['project_det']->value['remaining_days']>0&&$_smarty_tpl->tpl_vars['project_det']->value['remaining_days']<=$_smarty_tpl->tpl_vars['project_det']->value['fund_duration']){?>
       <?php if ($_smarty_tpl->tpl_vars['project_det']->value['backers_cnt']<$_smarty_tpl->tpl_vars['project_det']->value['max_sponsors']||$_smarty_tpl->tpl_vars['project_det']->value['max_sponsors']==0){?>
      <?php $_smarty_tpl->tpl_vars["back_sts"] = new Smarty_variable('yes', null, 0);?>
     <?php }?>
      <?php }?>
       <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['project_det']->value['rewards']!=0){?>
      <?php  $_smarty_tpl->tpl_vars['reward'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['reward']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_det']->value['rewards']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['reward']->key => $_smarty_tpl->tpl_vars['reward']->value){
$_smarty_tpl->tpl_vars['reward']->_loop = true;
?>
    
      <div class="pledgeMorePane">
        <h4   <?php if ($_smarty_tpl->tpl_vars['project_det']->value['user_id']!=$_smarty_tpl->tpl_vars['user_id']->value){?>
        <?php if ($_smarty_tpl->tpl_vars['reward']->value['taken_cnt']>=$_smarty_tpl->tpl_vars['reward']->value['users_limit']&&$_smarty_tpl->tpl_vars['reward']->value['users_limit']!=0){?>
        <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['back_sts']->value=='yes'){?>
         <?php if ($_smarty_tpl->tpl_vars['reward']->value['click_sts']==1){?>
         onclick="fund_reward_pop(<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['reward']->value['id'];?>
)" style="cursor:pointer;padding-bottom:5px;"
         <?php }?>
         <?php }?>
         <?php }?>
          <?php }?>  >Pre-Order <span class="WebRupee">Rs. </span><?php echo $_smarty_tpl->tpl_vars['reward']->value['pledge_amount'];?>
<!-- or more--></h4>
       <div style="padding:0 0 4px;color:#999"><?php echo $_smarty_tpl->tpl_vars['reward']->value['taken_cnt'];?>
 Supporters <?php if ($_smarty_tpl->tpl_vars['reward']->value['taken_cnt']==$_smarty_tpl->tpl_vars['reward']->value['users_limit']&&$_smarty_tpl->tpl_vars['reward']->value['users_limit']!=0){?><span class="sold_out">Sold out</span><?php }?></div>
       
       
        <i><?php echo stripslashes($_smarty_tpl->tpl_vars['reward']->value['description']);?>
</i>
        <p>Estimated Delivery : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reward']->value['delivery_date'],"%B %d, %Y");?>
</p>
      </div>
     
      <?php } ?>
      <?php }?>
      </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>
<div id="player_popup" style="display:none">
  <div id="inlineContent1" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick = "close_pop('player_popup')">Close</a>
      <div >
        <div id="pop_cntnt">Loading...</div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div id="fade" class="black_overlay"></div>
</div>


<div id="alert_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('alert_popup')">Close</a>
     <div class="popTitle">
        <h4>Alert...!</h4>
        </div>
        <div id="alert_pop_cntnt" class="prodeForm">
        </div>
      
    </div>
    <div class="clear"></div>
  </div>
  </div>
</div>



<div id="back_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('back_popup')">Close</a>
      <div class="popTitle">
        <h4>Pre-Order Items</h4>  </div>
        <div  class="prodeForm">
        <div id="back_pop_cntnt"></div>
        <div id="back_terms_pop_cntnt"  style="display:none"></div>
    </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
</div>

<div id="send_mail_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('send_mail_popup')">Close</a>
    <div class="popTitle">
        <h4>Email</h4></div>
        <div id="mail_pop_cntnt">
          <form name="frmsendmail" id="frmsendmail" method="post" action="">
            <div style="display:none" class="success_msg" id="sendmail_resmsg"></div>
            <div  class="prodeForm">
          
              <ul>
                <li class="fieldTxP">
                  <label>To: </label>
                  <input type="text" id="to_emailid" name="to_emailid" class="textBoxStyle" value="">
                  <span id="email_error"></span>
                </li>
                <li class="fieldTxP">
                  <label>Subject: </label>
                  <input type="text" id="subject" name="subject" class="textBoxStyle" value="Fund Innovation : infinite possibilities">
                    <span id="subject_error"></span>
                </li>
                <li class="fieldTxP">
                  <label>Message: </label>
                  <textarea id="message_cntnt" name="message_cntnt" class="textBoxStyle height120">Check this out:</textarea>
                   <span id="message_error"></span>
                </li>
                <li class="fieldTxP">
                  <label>URL: </label>
                  <p id="attach_lnk"></p>
                </li>
              </ul>
            
                <ul>
                  <li>
                    <input type="button" id="send_message" name="send_message" class="blueBtn" value="Send" onClick="send_mail()">
                  </li>
                </ul>
              
            </div>
          </form>
        </div>
    
    </div>
    <div class="clear"></div>
  </div>
</div>
</div>

<div id="contact_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('contact_popup')">Close</a>
      <div class="popTitle">
        <h4>Contact</h4></div>
        <div id="contact_pop_cntnt">
          <form name="frmcontact" id="frmcontact" method="post" action="">
          <div style="display:none" class="success_msg" id="contact_resmsg"></div>
            <div  class="prodeForm">
             
              <ul> 
                <li class="fieldTxP">
                  <label>Subject: *</label>
                  <input type="text" id="contact_subject" name="contact_subject" class="textBoxStyle" value="">
                  <span class="error" style="display:none" id="subj_error"></span>

                </li>
                <li class="fieldTxP">
                  <label>Message: *</label>
                  <textarea id="contact_message" name="contact_message" class="textBoxStyle height120"></textarea>
                  <span class="error" style="display:none" id="mess_error"></span>
                </li>
              </ul>
                <ul>
                  <li>
                    <input type="button" id="conatct" name="conatct" class="blueBtn" value="Contact" onClick="contact_creater()">
                  </li>
                </ul>
              
            </div>
          </form>
        </div>
      
    </div>
    <div class="clear"></div>
  </div>
</div>
</div><?php }} ?>