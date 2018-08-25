<script type="text/javascript" src="{$baseurl}js/pirobox_extended.js"></script>

{literal}
<style>
 .play_img{
   left: 254px;
    position: absolute;
    top: 285px;
	}
 </style>
<script type="text/javascript">
var baseurl ='{/literal}{$baseurl}{literal}';
function loadIframe(){
//$('#proj_cntnt').height(parseInt($('#proj_cntnt').contents().find('body').height())+'px');
//$('#proj_cntnt').attr('height',parseInt($('#proj_cntnt').contents().find('body').height())+12);
//$('#proj_cntnt').css('height',parseInt($('#proj_cntnt').contents().find('body').height())+'px');
}
history.forward();
 $(document).ready(function(){	

/* flowplayer("project_player", "{/literal}{$baseurl}{literal}video/flowplayer/flowplayer-3.2.15.swf",{
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
			var playerurl='{/literal}{$baseurl}{literal}archive_projects/play_videos';
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
		var user_id='{/literal}{$user_id}{literal}';
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
		var user_id ='{/literal}{$user_id}{literal}';
		var proj_img='{/literal}{$project_det.project_image}{literal}';
		var title =$('#proj_title').val();
		var descpn =$('#proj_shortdesc').val();
		//var descpn ='{/literal}{$project_det.short_description|stripslashes}{literal}';
		//http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-50ead062198b3ae6&source=tbx-300&lng=en-US&s=linkedin&url=http%3A%2F%2F182.72.141.134%2Ffundinnovations%2Farchive_projects%2Fproject_details_test%2F1&title=MAKI%20-%20The%203D%20Printable%20Humanoid%20Robot&ate=AT-ra-50ead062198b3ae6/-/-/51233ae7542123bb/2&frommenu=1&uid=51233ae7ebb36911&description=MAKI%20is%20a%20friendly%20humanoid%20robot%20designed%20specifically%20to%20be%20replicated%20using%20a%20desktop%203D%20printer.&ct=1&tt=0&captcha_provider=nucaptcha
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
				var proj_id='{/literal}{$proj_id}{literal}';
				var	hrf="https://www.facebook.com/dialog/feed?app_id=461303437265872&link="+msg+"&picture="+baseurl+"uploads/projects/images/medium/"+proj_img+"&name="+title+"&caption="+title+"&description="+descpn+"&redirect_uri="+baseurl+"archive_projects/project_details/"+proj_id+"";
				$('.fb.show_soc').attr('href',hrf);
				var inhrf="http://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url="+msg+"";
				$('.in.show_soc').attr('href',inhrf);
			/*href=" http://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url={$project_det.promote_link}"
				$.ajax({
					type: "POST",
					url: baseurl+"archive_projects/show_promote_secn",
					data: "proj_id="+proj_id+"&promote_link="+msg, 
					success: function(d){
						//$('#ajx_share_icons').html(d);
					}
				});*/
			//	$('.show_soc').show();
				$('.socialShareblck').show();
				$("#promote_lnk_txt").attr("readonly", true); 
			}
			else{
				//$('#alert_popup').show();openpPopup();
				//$('#alert_pop_cntnt').html('Please login to get promote link.');
				var proj_id='{/literal}{$proj_id}{literal}';
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
			var proj_id='{/literal}{$proj_id}{literal}';
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
		var user_id ='{/literal}{$user_id}{literal}';
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
			 
			 if(emailReg.test(to_emailids[i])) {
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
			var dat ={to_emailids:to_emailids,attach_lnk:attach_lnk,subject:subject,message_cntnt:message_cntnt}
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
		var user_id ='{/literal}{$user_id}{literal}';
		$('#contact_message').val('');	
		$('#contact_subject').val('');
		$("#subj_error").html('');
		$("#subj_error").hide();
		$("#mess_error").html('');
		$("#mess_error").hide();
		var proj_id="{/literal}{$proj_id}{literal}";
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
		var to_emailid = '{/literal}{$project_det.email_id}{literal}';
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
		var user_id ='{/literal}{$user_id}{literal}';
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
			var proj_id='{/literal}{$proj_id}{literal}';
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
		var user_id ='{/literal}{$user_id}{literal}';
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
			
			var proj_id='{/literal}{$proj_id}{literal}';
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
	 </script> 
{/literal}
<section  class="innerMidWrap">
  <ul class="innerMidTab">
    <li><a class="active" href="{$baseurl}archive_projects/project_details/{$proj_id}">Project Details</a> <span class="arrowtabs"></span></li>
    <li><a href="{$baseurl}archive_projects/project_backers/{$proj_id}">Supporters <span class="value">({$project_det_counts.backers_cnt})</span></a></li>
    <li><a href="{$baseurl}archive_projects/project_videos/{$proj_id}">Videos <span class="value">({$project_det_counts.videos_cnt})</span></a></li>
    <li><a href="{$baseurl}archive_projects/project_images/{$proj_id}">Images <span class="value">({$project_det_counts.images_cnt+1})</span></a></li>
    <li><a href="{$baseurl}archive_projects/project_comments/{$proj_id}">Comments <span class="value">({$project_det_counts.comments_cnt})</span> </a></li>
    {if $project_status.project_status eq 'success'}
    <li><a href="{$baseurl}archive_projects/project_updates/{$proj_id}">Project Updates </a></li>
    {/if}
    {if $project_det.user_id eq $user_id}
    <li><a href="{$baseurl}archive_projects/project_admin_commets/{$proj_id}">Admin Comments</a></li>
    {/if}
  </ul>
  <div class="clear"></div>
   <input type="hidden" id="min_pledge_amount" name="min_pledge_amount" value="{$project_det.min_pledge_amount}" />
   <input type="hidden" id="proj_title" name="proj_title" value="{$project_det.project_title}" />
   <input type="hidden" id="proj_shortdesc" name="proj_title" value="{$project_det.short_description|stripslashes}" />
  <div class="innerMidContent">
    <div class="disProDetailsLeft">
      <h4>{$project_det.project_title}</h4>
      <span class="creterplace">{$project_det.city_name}</span> <span class="creterfield">{$project_det.category_name}</span>
      <div class="clear"></div>
      <div class="sharePane addthis_toolbox_new ">
        <div class="moreProBtnPane left" id="lnk_star_div">{if $project_det.user_id neq $user_id}
          {if $project_det.stared_status eq 0} <a id="lnk_star" href="javascript:void(0);" onclick="star_project({$proj_id},'star')" >Star this project </a> {else} <a id="lnk_star" href="javascript:void(0);" onclick="star_project({$proj_id},'remove_star')"  >Remove star </a> {/if}{/if} </div>
        <div class="addthis_toolbox_new " 
        addthis:url="{$baseurl}archive_projects/project_details/{$proj_id}"
        addthis:title="{$project_det.project_title}"
        addthis:description="{$project_det.short_description|stripslashes}">
          <div class="custom_images">
            <ul class="socialShare">
              <li>Share With :</li>
              <li><a class=" fb" target="_blank" href="https://www.facebook.com/dialog/feed?app_id=461303437265872&link={$baseurl}archive_projects/project_details_test/{$proj_id}&picture={$baseurl}uploads/projects/images/medium/{$project_det.project_image}&name={$project_det.project_title}&caption={$project_det.project_title}&description={$project_det.short_description|stripslashes}" style="cursor:pointer"><img src="" alt="fb" /></a></li>
             <!-- <li><a class="addthis_button_twitter twit" style="cursor:pointer"><img src="" alt="twit" /></a></li>-->
             <li><a class=" twit" target="_blank" href="https://twitter.com/share?text={$project_det.project_title} {$project_det.short_description|stripslashes}" data-text="{$project_det.project_title}" data-count="none" ><img src="" alt="twit" /></a></li>
              <li><!--http://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url={$baseurl}archive_projects/project_details/{$proj_id}-->
              <a class="in" target="_blank" href="http://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url={$baseurl}archive_projects/project_details/{$proj_id}" style="cursor:pointer">
             
              </a>
              
<!--<a class="addthis_button_linkedin in" style="cursor:pointer"><img src="" alt="in" /></a>--></li>
             
              <!--<li><a class="fb" href="#">fb</a></li>
          <li><a class="twit" href="#">twit</a></li>
          <li><a class="in" href="#">in</a></li>-->
            </ul>
          </div>
        </div>
        {literal}<script type="text/javascript">//var addthis_config = {"data_track_addressbar":true};
        </script> 
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ead062198b3ae6"></script> 
        {/literal} 
        <!-- AddThis Button END --> 
      </div>
      <div class="clear"></div>
      {if $project_det.intro_video neq ''}
      <div class="videoBigPane">
   <!--[if lt IE 9]> 
{literal} 
<script type="text/javascript">
$(function() {
		  flowplayer("project_player", {
                src:"{/literal}{$baseurl}{literal}video/flowplayer/flowplayer-3.2.15.swf",
                wmode:"transparent"
            } ,{
      clip:  {
          autoPlay: false,
          autoBuffering: true
      }
 	 });
	});
</script>
{/literal}

    <a href="{$baseurl}uploads/projects/videos/original/{$project_det.intro_video}" style="display:block;width:560px;height:340px"  id="project_player"> 
		</a>
 <![endif]-->
 <![if gte IE 9]>
 <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="560" height="340"
      poster="{$baseurl}uploads/projects/videos/original/{$project_det.video_thumb_image}"
      data-setup="{}">
    <source src="{$baseurl}uploads/projects/videos/original/{$project_det.intro_video}" type='video/flv' />
   <!-- <track kind="captions" src="captions.vtt" srclang="en" label="English" />-->
  </video> <![endif]>
        

        <!--<img src="{$baseurl}images/video_big.jpg" > --> 
      </div>
      
      {elseif $project_det.project_image neq ''}
       <div class="videoBigPane">
       <img src="{$baseurl}uploads/projects/images/medium/{$project_det.project_image}" style="display:block;width:560px;height:340px" />
       </div>
      {/if}
      <div class="title">{$project_det.short_description|stripslashes}</div>
      <iframe id="proj_cntnt" frameborder="0"    width="560" src="{$baseurl}archive_projects/project_description/{$proj_id}">{$project_det.project_description|stripslashes}</iframe>
      <div class="clear"></div>
    </div>
    <div class="disProDetailsRight">
      <div class="disProBrd"></div>
      <h5>Project Innovator</h5>
      <div class="createrDetails">
        <div class="createrPane" > <a href="{$baseurl}profile/index/{$project_det.user_id}">{if $project_det.profile_imgurl neq ''} <img  src="{$project_det.profile_imgurl}" title="{$project_det.profile_name}"> {else} <img src="{$baseurl}images/prof_no_img.png" title="{$project_det.profile_name}"> {/if}</a></div>
        <ul>
          <li class="createrName"><a href="{$baseurl}profile/index/{$project_det.user_id}">{$project_det.profile_name}</a></li>
          <li>
            <div class="label"><span class="left">Facebook Profile</span><span class="right">:</span></div>
            <div class="details">{if $project_det.fb_link neq ''}<a href="{$project_det.fb_tinyurl}" target="_blank">{$project_det.fb_tinyurl}</a>{else}-{/if}</div>
            <div class="clear"></div>
          </li>
          <li>
            <div class="label"><span class="left">Twitter Profile</span><span class="right">:</span></div>
            <div class="details">{if $project_det.twitter_link neq ''}<a href="{$project_det.tw_tinyurl}" target="_blank">{$project_det.tw_tinyurl}</a>{else}-{/if}</div>
            <div class="clear"></div>
          </li>
          <li>
            <div class="label"><span class="left">Website</span><span class="right">:</span></div>
            <div class="details">{if $project_det.web_tinyurls neq ''}
            {foreach from=$project_det.web_tinyurls item=web}
            <a href="{$web}" target="_blank">{$web}</a><br />
            {/foreach}{else}-{/if}</div>
            <div class="clear"></div>
          </li>
        </ul>
        <div class="clear"></div>
        <div class="moreProBtnPane ">{if $project_det.user_id neq $user_id}<a href="javascript:void(0)" onclick="contact_pop()">Contact Innovator</a> {/if}</div>
        <div class="clear"></div>
      </div>
      <div class="createrDetails">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th width="50%" scope="col"><span class="label1">Supporters</span> <br>
              <span class="derails1">{$project_det.backers_cnt}</span></th>
            <th width="50%" scope="col"><span class="label1">Days to go</span> <br>
              <span class="derails1">{if $project_det.remaining_days lt 0}0{else}{$project_det.remaining_days}{/if}</span></th>
          </tr>
          <tr>
            <td><div><span class="label1">Pre-Ordered Amount</span> <br>
                <span class="derails1"><span class="WebRupee">Rs. </span>{$project_det.pledged_amount}</span></div></td>
            <td><div><span class="label1">Goal Amount</span> <br>
                <span class="derails1"><span class="WebRupee">Rs. </span>{$project_det.funding_goal}</span></div></td>
          </tr>
        </table>
        <div class="clear"></div>
       
        <ul class="details2">
          <li>
          <div class="label"><span class="left">Project start date</span><span class="right">:</span></div>
            <div class="details">{$project_det.created_date|date_format}</div>
            <div class="clear"></div>
            <div class="label"><span class="left">Project ends on</span><span class="right">:</span></div>
            <div class="details">{$project_det.end_date|date_format}</div>
            <div class="clear"></div>
          </li>
        </ul>
        <div class="clear"></div>
         {if $project_det.project_status eq 'ongoing' && $project_det.status neq 'rejected'}
        {if $project_det.remaining_days gte 0 && $project_det.remaining_days lte $project_det.fund_duration}
        {if $project_det.backers_cnt lt $project_det.max_sponsors || $project_det.max_sponsors eq 0}
        {if $project_det.user_id neq $user_id}
        <div class="blueBtnLi left">
          <input type="button" class="blueBtn" id="btn_fund_project" name="btn_fund_project" onclick="fund_project_pop({$proj_id})" value="Pre-Order Items">
        </div>
        {/if}{/if}{/if}{/if}
       <!-- <div class="minAmt">Minimum Pledge <span class="WebRupee">Rs. </span>{$project_det.min_pledge_amount}</div>-->
        <div class="empty23"></div>
        <div class="clear"></div>
      </div>
      {if $project_det.backers_details|@count gt 0}
      <div class="bakers">
        <div class="bakerInner">
          <h5>Supporters</h5>
          
          <ul id="backer-carousel" class="jcarousel-skin-baker">
            {foreach from=$project_det.backers_details item=backers}
            <li><a href="{$baseurl}profile/index/{$backers.id}">
            {if $backers.profile_imgurl neq ''} 
            <img style="height:55px;width:55px;"  src="{$backers.profile_imgurl}" title="{$backers.profile_name}"> 
            {else} 
            <img style="height:55px;width:55px;" src="{$baseurl}images/prof_no_img.png" title="{$backers.profile_name}"> 
            {/if}
         
            </a></li>
            {/foreach}
          </ul>
          </div>
        <div class="clear"></div>
      </div> {/if}
      {if $project_det.user_id neq $user_id}
      <div class="promotePane">
        <div class="promotePaneInner">
          <h4>Promote the project</h4>
         Simply hit the promote button, and grab your own customised promoter link. You will earn the following referral bonus every time someone uses your link to pre-order products.
          <div class="moreProBtnPane"><a class="left" href="javascript:void(0)" onclick="create_promote_lnk({$project_det.id})">Promote</a>
            <input class="refTxtBox" type="text" id="promote_lnk_txt" name="promote_lnk_txt" {if $project_det.promote_link neq ''} readonly="readonly" {/if} value="{$project_det.promote_link}" />
            <input  type="hidden" id="hid_promote_lnk" name="hid_promote_lnk" value="{$project_det.promote_link}" />
            <div class="clear"></div>
          </div>
           
           <div id="ajx_share_icons" >
            {assign var="share_contant" value=$project_det.short_description|stripslashes}
          <div class="addthis_toolbox " id="add_thissec"  addthis:url="{$project_det.promote_link}"
addthis:title="{$project_det.project_title}"
        addthis:description="{$share_contant}">
            <div class="custom_images">
              <ul class="socialShare socialShareblck" {if $project_det.promote_link eq ''}  style="display:none;" {/if}>
                <li>
                <a target="_blank" class="fb show_soc" href="https://www.facebook.com/dialog/feed?app_id=461303437265872&link={$project_det.promote_link}&picture={$baseurl}uploads/projects/images/medium/{$project_det.project_image}&name={$project_det.project_title}&caption={$project_det.project_title}&description={$share_contant}&redirect_uri={$baseurl}archive_projects/project_details/{$project_det.id}">share</a>
                <!--<a class="addthis_button_facebook fb show_soc"  style="display:block;cursor:pointer"  ><img src="" alt="fb" /></a>--></li>
                <li><a class="addthis_button_twitter twit show_soc" style="display:block;cursor:pointer"  ><img src="" alt="twit" /></a></li>
                <li><a class="in show_soc" target="_blank" href=" http://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url={$project_det.promote_link}"  style="display:block;cursor:pointer" ><img src="" alt="in" /></a></li>
                <li><a class="email show_soc"  style="display:block;cursor:pointer"  onclick="open_mail_pop('{$project_det.promote_link}');"><img src="" alt="email" /></a></li>
                
              </ul>
            </div>
          </div>
          </div>
          <div class="infobox_sm"><h3>Referral Bonus</h3><h2>{$project_det.referrer_percentage}%</h2></div>
          <!--<ul class="socialShare">
            <li><a class="fb" href="#">fb</a></li>
            <li><a class="twit" href="#">twit</a></li>
            <li><a class="in" href="#">in</a></li>
            <li><a class="email" href="#">email</a></li>
            <li>Referal Bonus {$project_det.referrer_percentage}%</li>
          </ul>-->
          <div class="clear"></div>
        </div>
      </div>
      {/if}
      {if $project_det.project_status eq 'ongoing' && $project_det.status neq 'rejected'}
     {if $project_det.remaining_days gte 0 && $project_det.remaining_days lte $project_det.fund_duration}
       {if $project_det.backers_cnt lt $project_det.max_sponsors || $project_det.max_sponsors eq 0}
       {if $project_det.user_id neq $user_id}
      {if $project_det.rewards neq 0}<!--<pre>{$project_det.rewards|print_r}</pre>-->
      {foreach from=$project_det.rewards item=reward }
     {if $reward.taken_cnt lt $reward.users_limit || $reward.users_limit eq 0}
      <div class="pledgeMorePane">
        <h4 onclick="fund_reward_pop({$proj_id},{$reward.id})" style="cursor:pointer;padding-bottom:5px;">Pre-Order <span class="WebRupee">Rs. </span>{$reward.pledge_amount}<!-- or more--></h4>
       <div style="padding:0 0 4px;color:#999">{$reward.taken_cnt} Supporters</div>
        <i>{$reward.description|stripslashes}</i>
        <p>Estimated Delivery : {$reward.delivery_date|date_format:"%B %d, %Y"}</p>
      </div>
      {/if}
      {/foreach}
      {/if}
      {/if}
      {/if}
      {/if}
       {/if}</div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>
<div id="player_popup" style="display:none">
  <div id="inlineContent1" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick = "close_pop('player_popup')">Close</a>
      <div >
        <div id="pop_cntnt">add popup content here</div>
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
</div>