<?php /* Smarty version Smarty-3.1.8, created on 2013-06-24 04:32:38
         compiled from "/home/fundinno/public_html/application/views/projects/innovate_projects_videos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:763233367515acd89c49446-30298310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1d884daccbddee0fa1bf88565fe96eb227a76f0' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/innovate_projects_videos.tpl',
      1 => 1372059008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '763233367515acd89c49446-30298310',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515acd8a072154_58099055',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'project_status' => 0,
    'proj_videos' => 0,
    'vid' => 0,
    'cnt' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515acd8a072154_58099055')) {function content_515acd8a072154_58099055($_smarty_tpl) {?><link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/css/uploadify.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/js/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/datepicker/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/projects.js"></script>
 <style>
 .play_img{
   left: 120px;
    position: absolute;
   top: 60px;
	}
 </style>
  
<script type="text/javascript">
	var baseurl="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
";	
	var loadingimage='<img  src="'+baseurl+'images/ajax_loader_upload.gif" />';		
	var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
$(window).load(function(){	

$('#link').attr("disabled","disabled");
				//$('#video_ad').hide();
				$('#link').val('');
				$('.chooseBtnPane').show();
var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
$('#vid_upload').uploadify({
				'fileTypeExts' : '*.mp4;*.mp3;*.avi;*.wmv;*.flv;',
				'swf'      : baseurl+'uploadify/uploadify.swf',
				'uploader' : baseurl+'upload_video',
				'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
				'folder'    : baseurl+'uploads/',
				'auto'      : true,
				'multi'     : false,
				'onUploadStart' : function(file) {
				  // alert('Starting to upload ' + file.name);
				 // $('#vid_upload').uploadify('disable', true);
				  $("#youtubevideoLoadingimg").show().html('<div class="clear" style="padding-top:10px;"/><span><span>'+loadingimage+'</span></span>');
				  $('#link').val(file.name);
				},
				'onUploadError' : function(file, errorCode, errorMsg, errorString) {
				  alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
				},
				'onUploadSuccess' : function(file, data, response) {
					   if((data=='failed')||(data=='ERROR:could not create image handle')||(data=='ERROR:Invalid width or height')|| (data=='ERROR:invalid upload'))
						  {
							  $('#error_popup').show();openpPopup();
							// p_popupOpen('img_size_alert');
							 $('#link').val('');
							$("#youtubevideoLoadingimg").hide().html();
							 $('#errpop_cntnt').html('Error occured while uploading , please try another video.'); 
						  }
					   else
						{
							//alert(data);
								$("#vide_error").remove();	
							var files=data.split('|');
							$('#hidVideofile').val(files[1]);
				 			$('#hidVidImgfile').val(files[0]);
							
							$("#youtubevideoLoadingimg").hide().html();
							$("#youtubevideoimg").hide().html();
							
						//alert(data);
						/* var files=data.split('|');
						  var image   =  baseurl+'uploads/projects/videos/original/'+files[0];
						 $('#vid_div').html("<img style='width:150px; height:150p' src='"+image+"' />");
						  // $('#removeImage').show();
						   $('#hidVideofile').val(files[1]);
							$('#hidVidImgfile').val(files[0]);*/
						}
				   }
				// Put your options here
			});
		//$('#vimeo_case').hide();
 		
      $('#video_ad').click(function() {	   
		var rad_val = $('input:radio[name=video_type]:checked').val();
		
		/* 
			Function 	:	Fetch Youtube video details based on provided url.
			Created  on	: 	20-07-2012.
		
		*/
		if(rad_val==0)
		 {
			 		
					if(validate_video_title() & validate_video_url() )
					{
					
					var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
					var domainArray=["youtube.com"];
					//************Regular Expression for Validating the URL***************************
					var RegExp = /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
					var youtubeurl=$("#link").val();
					var videoIdregExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
					var match = youtubeurl.match(videoIdregExp);
			
					if(RegExp.test(youtubeurl))
					{
						//************Retrieving the Domain from the URL******************
							var domainname=(youtubeurl.match(/:\/\/(.[^/]+)/)[1]).replace('www.','');
							if(jQuery.inArray(domainname,domainArray) ==-1)
							{
								
									$("#link").after('<span class="error" id="image_error1"  ><span>Please enter youtube video only </span></span>');
									return false;
								
							}
							
							else if(match&&match[7].length==11)
							{
								
								var loadingimage='<img  src="'+baseurl+'images/ajax_loader_upload.gif" />';					
								//$("#youtubevideoimg").hide();
								$("#youtubevideoLoadingimg").show().html('<div class="clear" style="padding-top:10px;"/><span><span>'+loadingimage+'</span></span>');
								
								var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
								var vid_title=$('#vid_title').val();
								uploadurl=baseurl+"project/add_youtube_video/"+project_id;
								$.ajax(
								{
								type:'POST', 
								url:uploadurl,
								data:"you_tube_url="+youtubeurl+"&baseurl="+baseurl+"&vid_title="+vid_title,
								success: function(videoinformation)
								{
									
									//console.log(videoinformation)
								
									//$('#video_ad').hide();
									//$('.cancel').hide();
									var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
									var youTubevideoInfo=$.parseJSON(videoinformation)
									var errorcode=youTubevideoInfo.errorcode;
									
									if(errorcode > 0)
									{
										$("#youtubevideoLoadingimg").hide().empty();
										var message="Video is either blocked or deleted.";
										$("#msg_error").show();
										$("#msg_error").html(message);
										setTimeout(function() {hideResponseMsg('msg_error');}, 3000); 
										
									}
									else
									{
										var videoThumbnail=youTubevideoInfo.thumbnail;
										//var videoTitle=youTubevideoInfo.title;
										//var videoDesc=youTubevideoInfo.description;
										$('#video_ad').attr('disabled','disabled');
										$("#youtubevideoLoadingimg").hide().empty();
										//$("#youtube_link").val('');
										var message="Youtube Video Added Successfully";
										$('#msg').show();
										$("#msg").html(message);
										setTimeout(function() {hideResponseMsg('msg');}, 3000); 
										
										//$("#youtubevideoimg").show().html('<div class="clear" style="padding-top:2px;"/><span><span><img src='+videoThumbnail+'></span><br/><span style="text-decoration:underline;font-weight:bold;"></span><br/><span style="font-weight:normal;"></span></span>');
										setTimeout(function() {
											window.location.href=baseurl+'project/innovate_project_videos/'+project_id;},6000);
									}
								}
								});
							}
							else
							{
								
									$("#link").after('<span class="error" id="image_error1" ><span>Please enter valid youtube video url </span></span>');
									return false;
								
							}
						
						
					}
						
					
				  //$('#target').submit();			
					}
		 }
		 else if(rad_val ==2){
			 if(validate_vimeo_video_url() & validate_video_title())
				{
					
					var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
					var domainArray=["vimeo.com"];
					//************Regular Expression for Validating the URL***************************
					var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
					var RegExp = /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
					var vimeourl=$("#link").val();
					//alert(vimeourl)
					//var videoIdregExp = /^.*((vimeo\/)|(v\/)|(\/u\/\w\/)|(\/)|(\?))\??v?=?([^#\&\?]*).*/;
				//	var match = vimeourl.match(videoIdregExp);
						//alert(vimeourl);		
					if(RegExp.test(vimeourl))
					{
						//************Retrieving the Domain from the URL******************
							var domainname=(vimeourl.match(/:\/\/(.[^/]+)/)[1]).replace('www.','');
							//alert(domainname);
							if(jQuery.inArray(domainname,domainArray) == -1)
							{
									$("#link").after('<span class="error" id="image_error2"  ><span>Please enter vimeo video only </span></span>');
									return false;
								
							}
							else 
							{
								var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
								var loadingimage='<img  src="'+baseurl+'images/ajax_loader_upload.gif" />';					
								//$("#youtubevideoimg").hide().html();
								$("#youtubevideoLoadingimg").show().html('<div class="clear" style="padding-top:10px;"/><span><span>'+loadingimage+'</span></span>');
								
								
								var vid_title=$('#vid_title').val();
								uploadurl=baseurl+"project/add_vimeo_video/"+project_id;
								$.ajax(
								{
								type:'POST', 
								url:uploadurl,
								data:"vimeo_url="+vimeourl+"&baseurl="+baseurl+"&vid_title="+vid_title,
								success: function(videoinformation)
								{
									
									//console.log(videoinformation)
									//$('#video_ad').attr('disabled','disabled');
									//$('#video_ad').hide();
								//	$('.cancel').hide();
								var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
									var vimeovideoInfo=$.parseJSON(videoinformation)
									var errorcode=vimeovideoInfo.errorcode;
									
									if(errorcode > 0)
									{
										$("#youtubevideoLoadingimg").hide().empty();
										var message="Video is either blocked or deleted.";
										$("#msg_error").show();
										$("#msg_error").html(message);
										
										//$("#msg").html(message);
										setTimeout(function() {hideResponseMsg('msg_error');}, 3000); 
										//setTimeout("hideResponseMsg();", 1500); 
										
									}
									else
									{
										var videoThumbnail=vimeovideoInfo.thumbnail;
										//var videoTitle=youTubevideoInfo.title;
										//var videoDesc=youTubevideoInfo.description;
										$('#video_ad').attr('disabled','disabled');
										$("#youtubevideoLoadingimg").hide().empty();
										//$("#youtube_link").val('');
										var message="Vimeo Video Added Successfully";
										$("#msg").show();
										$("#msg").html(message);
										setTimeout(function() {hideResponseMsg('msg');}, 3000); 
										//setTimeout("hideResponseMsg();", 2500); 
										
										/*$("#youtubevideoimg").show().html('<div class="clear" style="padding-top:2px;"/><span><span><img src='+videoThumbnail+'></span><br/><span style="text-decoration:underline;font-weight:bold;"></span><br/><span style="font-weight:normal;"></span></span>');*/
										setTimeout(function() {
											window.location.href=baseurl+'project/innovate_project_videos/'+project_id;},6000);
									
									}
								}
								});
							}
							
						
					}
						
					
				  //$('#target').submit();			
					}
			 
		}
		 else
		 {
			 if(validate_video_title() & validate_video_file()){
			 			var video_type=1;
							var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
							var videofile  = $('#hidVideofile').val();
							var vidImgfile = $('#hidVidImgfile').val();
							//alert(videofile);
							var vid_title  = $('#vid_title').val();
							var $url = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'+"project/create_video";
							var baseurl ='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
							$.ajax(
							{
								type:'POST', 
								url:$url,
								data:"project_id="+project_id+"&video_type="+video_type+"&video_file="+videofile+"&vidImgfile="+vidImgfile+"&vid_title="+vid_title,
								success: function(message)
								{
									//$('.cancel').hide();
									$('#video_ad').attr('disabled','disabled');
									var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
									$("#msg").show().html(message);
									setTimeout(function() {hideResponseMsg('msg');}, 3000); 
									$('#vid_upload').uploadify('disable', false);
                                                                         $('#popHead').html('Notice.');
                                                                         $('#error_popup').show();openpPopup();
                                                                         $('#errpop_cntnt').html('Uploading will take some time, please try to play video after some time.'); 
									 setTimeout(function() {
									 window.location.href=baseurl+'project/innovate_project_videos/'+project_id;},6000);
								}
							});
			 }
			 
			 /*
			 		$("#youtubevideoLoadingimg").hide().html();
					$("#youtubevideoimg").hide().html();
					//$('#target').submit();	
					var video_type=1;
					var videofile  = $("#hidVideofile").val();
					var vidImgfile = $("#hidVidImgfile").val();
					//var videotitle=$("#videotitle").val();
					
					var $url= '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'+"admin/project/create_video";
				$.ajax(
						{
						type:'POST', 
						url:$url,
						data:"project_id="+project_id+"&video_type="+video_type+"&video_file="+videofile+"&vidImgfile="+vidImgfile,
						success: function(message)
						{
							//$('#video_ad').hide();
							$('.cancel').hide();
							$("#msg").show().html(message);
							setTimeout("hideResponseMsg();", 2500);
							 setTimeout(window.location.href=baseurl+'admin/project/add_project/'+project_id,9000);
						}
						});
				//}*/
		 }
   });

	
	
});

function show_items()
{	

	        var radio=$('input:radio[name=video_type]:checked').val();
			$("#youtubevideoLoadingimg").hide();
			//$("#youtubevideoimg").hide().html();
			//$('#video_ad').show();
			$('.cancel').show();
			$("#msg").empty();
			$(".error").hide();
			
            if(radio==1)
			{				
				/*$('#youtube_case').hide();
				$('#vimeo_case').hide();
				$('#normal_case').show();*/
				$('#link').attr("disabled","disabled");
				//$('#video_ad').hide();
				$('#link').val('');
				$('.chooseBtnPane').show();
				
	   }
	   else if(radio == 2){
		   
		   $('#link').removeAttr("disabled");
		    $('#link').val('');
		   //$('#video_ad').show();
		   $('.chooseBtnPane').hide();
				
		 /*  $('#vimeo_case').show();
		   $('#youtube_case').hide();
		   $('#normal_case').hide();*/
		}
	   else
	   {
		    $('#link').removeAttr("disabled");
		   // $('#video_ad').show();
		    $('.chooseBtnPane').hide();
		    $('#link').val('');
		  
			//$('.cancel').show();
			/*$('#vimeo_case').hide();
		    $('#youtube_case').show();
			$('#normal_case').hide();*/	
			//$('#normal_case_title').hide();	  
			 
	   }
		
}


function validate_video_file() {
	$("#vide_error").remove();	
	if($("#hidVideofile").val()=='')
	{
		 $('#link').after('<span class="error" id="vide_error"><span>Please upload a video </span></span>');
		return false;
	}
	else
	{
		 $('#link').after('<span class="checked" id="vide_error"><span></span></span>');
		return true;
	}
}
function validate_video_title() {
	$("#vid_title_error").remove();	
	//alert($("#vid_title").val());
	if($("#vid_title").val()=='')
	{
		$("#vid_title").after('<span class="error" id="vid_title_error"><span>Please enter caption. </span></span>');
		return false;
	}
	else
	{
		//$("#vid_title").html('<span class="checked" id="vid_title_error"><span></span></span>');
		return true;
	}
}

function validate_video_url()
{
	$("#image_error1").hide();	
	if($.trim($("#link").val())=='')
	{
		$("#link").after('<span class="error" id="image_error1" ><span>Please enter youtube url</span></span>');
		return false;
	}
	else
	{
	   if(/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#link").val()))
	   {
		   $("#link").after('<span class="checked" id="image_error1"><span></span></span>');
		   return true;        
       } 
	  else
	    { 
		 $("#link").after('<span class="error" id="image_error1" ><span>Please enter valid url</span></span>');
		     return false;
		}

    }
  
}

function validate_vimeo_video_url()
{
	$("#image_error2").remove();	
	if($.trim($("#link").val())=='')
	{
		$("#link").after('<span class="error" id="image_error2" ><span>Please enter vimeo url</span></span>');
		return false;
	}
	else
	{
	   if(/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#link").val()))
	   {
		   $("#link").after('<span class="checked" id="image_error2"><span></span></span>');
		   return true;        
       } 
	  else
	    {
			 $("#link").after('<span class="error" id="image_error2" ><span>Please enter valid url</span></span>');
		     return false;
		}

    }
  
}


function hideResponseMsg(id)
  {
	  $("#"+id).slideToggle('slow');
	 // $("#msg").slideToggle('slow');
	  //window.location.href="manage_video";
	  
  }
  
   function close_pop(id){
	 $('#'+id).hide();
	$('#pop_cntnt').empty();
	closepPopup();
	// $('#save').attr('onclick','');
 	}
	 function confirm_pop(id){
		$('#alert_popup').show();openpPopup();
		$('#hid_vid_id').val(id);
		///$('#confirm').attr('onclick',"remove_img('"+id+"')");
	}
 function remove_vid()
 {
	 var vid=$('#hid_vid_id').val();
	 var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
	 var $url= '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'+"\project/remove_proj_video";
	$.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"project_id="+project_id+"&vid="+vid,
			  success: function(message)
			  {
				  // $("#tabs").tabs( "load", 1 );
				  $('#vid_li_'+vid).remove();
				  var message="Video Deleted Successfully";
				  $("#msg").show();
				  $("#msg").html(message);
				  setTimeout(function() {hideResponseMsg('msg');}, 2500); 
				  close_pop('alert_popup');closepPopup();
				 // window.location.href=baseurl+'admin/project';
			  }
			  });
 }
 $(".preview").live('click',function(e){
			$videotype=$(this).attr("type");
			$videolink=$(this).attr('rel');
			var videotitle=$(this).attr('title');
			$('#vid_captn').html(videotitle);
                        var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
			//var dealid=$(this).attr('rel');
                        
                                        $('#player_popup').show();openpPopup();
                                        var playerurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/play_videos';
                                        $('#pop_cntnt').load(playerurl,{videolink:$videolink,videotype:$videotype},function(){

                                                //$(".preview").hide();	
                                        });
                                        
		}) ;
		
		
		
<!--
    function toggle_visibility(id) {
		var txtBoxPane = 'txtBoxPane_'+id;
       var e = document.getElementById(txtBoxPane);
       if(e.style.display == 'block'){
          e.style.display = 'none';
		  $('#captnBlk_'+id).show();
	   }
       else{
          e.style.display = 'block';
		  $('#vid_caption_'+id).val($('#captn'+id).html());
		    $('#captnBlk_'+id).hide();
	   }
    }
//-->
function update_caption(id){
	var txtBoxPane= 'txtBoxPane_'+id;
	var caption=$('#vid_caption_'+id).val();
	var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
	var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	var $url    = baseurl+"project/update_video_caption";
	$.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"project_id="+project_id+"&vid="+id+"&caption="+caption,
			  success: function(message)
			  {
				  $('#captnBlk_'+id).show();
				  $('#'+txtBoxPane).hide();
				   $('#captn'+id).html(caption);
				  // $("#tabs").tabs( "load", 1 );
				 // $('#vid_li_'+vid).remove();
				 // var message="Video Deleted Successfully";
				//  $("#msg").show();
				//  $("#msg").html(message);
				  //setTimeout(function() {hideResponseMsg('msg');}, 2500); 
				 // close_pop('alert_popup');
				 // window.location.href=baseurl+'admin/project';
			  }
			  });
}
function video_stschk(vid){
                var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
			$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/video_sts_chk",
				data: {video:vid}, 
				success: function(msg){
                                        if(msg=='yes'){
					$('#notice_popup').show();openpPopup();
                                        $('#notice_pop_cntnt').html('Video uploading is in progess. Please refresh after some time and try to play.');
                                        }else{
                                            $('#notice_popup').show();openpPopup();
                                        $('#notice_pop_cntnt').html('Video uploading is completed. Page will reload now.');
                                            window.location.reload();   
                                        }
					}
				});
        }
	</script> 

<section  class="innerMidWrap">
  <ul class="innerMidTab">
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Details</a></li>
    <li><a class="active" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project_videos/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Videos<span class="arrowtabs"></span></a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project_images/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Images</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project_comments/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Comments</a></li>
     <?php if ($_smarty_tpl->tpl_vars['project_status']->value['project_status']=='success'){?>
    <!--<li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project_updates/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Updates</a></li>--><?php }?>
     <li><a  target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/edit_profile">Edit Profile</a></li>
  </ul>
  <div class="clear"></div>
  <div class="innerMidContent"> <?php if ($_smarty_tpl->tpl_vars['proj_id']->value!=''){?>
    <form>
      <div class="imgUpload">
       <h5>Upload Video</h5>
   		<?php if (count($_smarty_tpl->tpl_vars['proj_videos']->value)>0){?><ul>
        <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable("1", null, 0);?>
 	 	<?php  $_smarty_tpl->tpl_vars['vid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vid']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proj_videos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vid']->key => $_smarty_tpl->tpl_vars['vid']->value){
$_smarty_tpl->tpl_vars['vid']->_loop = true;
?>
        
          <li id="vid_li_<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['cnt']->value%3==0){?> class="last" <?php }?> >
          <div class="videoDetailsPane">
           <span class="delBtn" style="cursor:pointer" onclick="confirm_pop(<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
)" >Remove this video</span>
          <?php if ($_smarty_tpl->tpl_vars['vid']->value['type']==1){?>
            <?php if ($_smarty_tpl->tpl_vars['vid']->value['vid_sts']=='yes'){?>
                <a rel="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_link'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_title'];?>
" type="<?php echo $_smarty_tpl->tpl_vars['vid']->value['type'];?>
"  onclick="video_stschk('<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_link'];?>
')"   class="pirobox_gall1" >
                    <img class="play_img" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/play_b.png">
          <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['vid']->value['thumb_image'];?>
" style="width: 318px;height: 189px;"  alt="project images" /> 
                    </a>
           <?php }else{ ?>
         <a rel="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_link'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_title'];?>
" type="<?php echo $_smarty_tpl->tpl_vars['vid']->value['type'];?>
" class="pirobox_gall1 preview"   >
          <img class="play_img" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/play_b.png">
          <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['vid']->value['thumb_image'];?>
" style="width: 318px;height: 189px;"  alt="project images" /> </a>
          <?php }?>
           <?php }elseif($_smarty_tpl->tpl_vars['vid']->value['type']==0){?>
           <a rel="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_external_id'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_title'];?>
" type="<?php echo $_smarty_tpl->tpl_vars['vid']->value['type'];?>
"   class="pirobox_gall1 preview"  >
            <img  class="play_img" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/play_b.png">
            <img src="<?php echo $_smarty_tpl->tpl_vars['vid']->value['thumb_image'];?>
" alt="project images" style="width: 318px;height: 189px;"  /> </a>
            <?php }else{ ?>
           <a rel="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_external_id'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_title'];?>
" type="<?php echo $_smarty_tpl->tpl_vars['vid']->value['type'];?>
"  class="pirobox_gall1 preview"  >
            <img class="play_img" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/play_b.png">
            <img src="<?php echo $_smarty_tpl->tpl_vars['vid']->value['thumb_image'];?>
" alt="project images" style="width: 318px;height: 189px;" /> </a>
           <?php }?>
           </div>
           <div class="vCaption"><div id="captnBlk_<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
"><span id="captn<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vid']->value['video_title'];?>
</span> <a  onclick="toggle_visibility(<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
);" class="editLinkNew" href="javascript:void(0)">Edit</a></div>
		   <div class="clear"></div>
		   <div class="txtBoxPane" id="txtBoxPane_<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
" style="display:none"><input class="textBoxStyle" type="text" id="vid_caption_<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
" name="vid_caption_<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
" maxlength="38"><input type="button" class="blueBtn" id="update<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
" onclick="update_caption(<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
)" value="Update"></div>
		   </div>
           </li>
           <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable($_smarty_tpl->tpl_vars['cnt']->value+1, null, 0);?>
          <!--<li> <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/upload_img01.jpg" rel="gallery" title="2" class="pirobox_gall"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/upload_vid02.jpg" alt="project images"></a> </li>
          <li class="last"> <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/upload_img01.jpg" rel="gallery" title="3"  class="pirobox_gall"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/upload_vid03.jpg" alt="project images"></a> </li>-->
        <?php } ?>
        </ul>
        
        <?php }?>
      </div>
      <div class="clear"></div>
      <div id="msg" class="success_msg" style="display:none;"></div>
       <div id="msg_error" class="error_msg" style="display:none;"></div>
      <div class="videoUpload">
        <ul>
           <li><input type='radio' name='video_type' value="1" id="normal_type" checked="checked" onclick="show_items();" />
               Normal
                
           </li>
          <li>
             <input type='radio' name='video_type' value="0" id="youtube_type"  onclick="show_items();" /> Youtube
                </li>
          <li>
          <input type="radio" id="vimeo_type" name="video_type" value="2" onClick="show_items()" />
          Vimeo Video 
                
             </li>
            
        </ul>
        <div class="clear"></div>
        <div class="width490">
          <label>Video Caption</label>
          <div class="valFix fieldTxP">
          <input type="text" class="textBoxStyle left width383" id="vid_title" name="vid_title" maxlength="38" value="">
          </div>
          </div>
          <div class="clear"></div>
        <div class="width490">
          <label>Upload Video</label>
          <div class="valFix fieldTxP">
          <input type="text" class="textBoxStyle left width383" id="link"  name="link" value="">
          </div>
          <div class="chooseBtnPane right" style="display:none">
                <input type="file" id="vid_upload" name="vid_upload" />
                 <input type="hidden" id="hidVideofile" name="hidVideofile" value="" />
            <input type="hidden" id="hidVidImgfile" name="hidVidImgfile" value="" />
           </div>
            <div class="clear"></div><br />
           <input type="button" id="video_ad" name="video_ad" class="blueBtn" value="Add" >
           
             <div id="youtubevideoLoadingimg" style="display:none;"></div>
         
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="hrLine1"></div>
        <div class="clear"></div>
      </div>
    </form>
    <?php }else{ ?>
    <div class="bakersBlock">
    <div class="WarMsg">Please create project first.</div>
    </div>
    <?php }?>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>

<div id="player_popup"  class="popFixed" style="display:none">
<div class="popabs">
<div id="inlineContent1" class="white_content" style="width:650px !important">
  <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick = "close_pop('player_popup')">Close</a>
     <div class="popTitle" > <h4 id="vid_captn"></h4></div>
      <div id="pop_cntnt">Loading...</div>
  </div>
  <div class="clear"></div>
</div>
</div>
</div>

<div id="error_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('error_popup');closepPopup();">Close</a>
       <div class="popTitle">
      
           <h4 id="popHead">Error.</h4>  </div>
        <input type="hidden" id="hid_vid_id" name="hid_vid_id" value="" />
        <div id="errpop_cntnt" class="prodeForm">
       <!--  <div class="submitPane">
      <ul>
                    <li style="border-left: 0px none;">
            <input type="button" onclick="remove_vid()" value="Confirm" class="blueBtn" name="confirm" id="confirm">
          </li>
          <li>
            <input type="button" onclick="close_pop('alert_popup');closepPopup();" value="Cancel" class="grayBtn" name="cancel" id="cancel">
          </li>
                  
        </ul>
         </div>-->
         <div class="clear"></div>
        </div><div class="clear"></div>
    
    </div>
    <div class="clear"></div>
  </div><div class="clear"></div>
</div><div class="clear"></div>
</div>

<div id="alert_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('alert_popup');closepPopup();">Close</a>
       <div class="popTitle">
      
        <h4>Are you sure you want delete this video..</h4>  </div>
        <input type="hidden" id="hid_vid_id" name="hid_vid_id" value="" />
        <div id="alert_pop_cntnt" class="prodeForm">
        <div class="submitPane">
       <ul>
                    <li style="border-left: 0px none;">
            <input type="button" onclick="remove_vid()" value="Confirm" class="blueBtn" name="confirm" id="confirm">
          </li>
          <li>
            <input type="button" onclick="close_pop('alert_popup');closepPopup();" value="Cancel" class="grayBtn" name="cancel" id="cancel">
          </li>
                  
        </ul>
         </div>
         <div class="clear"></div>
        </div><div class="clear"></div>
    
    </div>
    <div class="clear"></div>
  </div><div class="clear"></div>
</div><div class="clear"></div>
</div>
    
    
    <div id="notice_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('notice_popup')">Close</a>
     <div class="popTitle">
        <h4>Alert...!</h4>
        </div>
        <div id="notice_pop_cntnt" class="prodeForm">
        </div>
      
    </div>
    <div class="clear"></div>
  </div>
  </div>
</div><?php }} ?>