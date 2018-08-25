
{literal} 
<script type="text/javascript">
	var baseurl="{/literal}{$baseurl}{literal}";	
		
$(document).ready(function(){	

		$('#vimeo_case').hide();
 		var project_id = '{/literal}{$proj_id}{literal}';
      $('#video_ad').click(function() {	   
		var rad_val = $('input:radio[name=video_type]:checked').val();
		
		/* 
		
			Function 	:	Fetch Youtube video details based on provided url.
			Created  on	: 	20-07-2012.
			
		
		*/
		if(rad_val==0)
		 {
			 		
					if(validate_video_title() & validate_video_url())
					{
					
					var baseurl='{/literal}{$baseurl}{literal}';
					var domainArray=["youtube.com"];
					//************Regular Expression for Validating the URL***************************
					var RegExp = /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
					var youtubeurl=$("#youtube_link").val();
					var videoIdregExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
					var match = youtubeurl.match(videoIdregExp);
			
								
					
					if(RegExp.test(youtubeurl))
					{
						//************Retrieving the Domain from the URL******************
							var domainname=(youtubeurl.match(/:\/\/(.[^/]+)/)[1]).replace('www.','');
							if(jQuery.inArray(domainname,domainArray) ==-1)
							{
								
									$("#youtube_link").after('<div class="clear"/><span class="error" id="image_error1" style="bottom:-20px;"><span>Please enter youtube video only</span></span>');
									return false;
								
							}
							
							else if(match&&match[7].length==11)
							{
								
								var loadingimage='<img  src="'+baseurl+'images/admin/ajax-loader-bar.gif" />';					
								$("#youtubevideoimg").hide().html();
								$("#youtubevideoLoadingimg").show().html('<div class="clear" style="padding-top:10px;"/><span><span>'+loadingimage+'</span></span>');
								
								var vid_title = $('#vid_title').val();
								
								uploadurl=baseurl+"admin/project/add_youtube_video/"+project_id;
								$.ajax(
								{
								type:'POST', 
								url:uploadurl,
								data:"you_tube_url="+youtubeurl+"&baseurl="+baseurl+"&vid_title="+vid_title,
								success: function(videoinformation)
								{
									
									//console.log(videoinformation)
									//$('#video_ad').attr('disabled','disabled');
									//$('#video_ad').hide();
									$('.cancel').hide();
									var youTubevideoInfo=$.parseJSON(videoinformation)
									var errorcode=youTubevideoInfo.errorcode;
									
									if(errorcode > 0)
									{
										$("#youtubevideoLoadingimg").hide().html();
										var message="Video is either blocked or deleted.";
										$("#msg").html(message);
										setTimeout("hideResponseMsg();", 1500); 
										
									}
									else
									{
										var videoThumbnail=youTubevideoInfo.thumbnail;
										//var videoTitle=youTubevideoInfo.title;
										//var videoDesc=youTubevideoInfo.description;
										
										$("#youtubevideoLoadingimg").hide().html();
										//$("#youtube_link").val('');
										var message="Youtube Video Added Successfully";
										$("#msg").html(message);
										setTimeout("hideResponseMsg();", 2500); 
										
										$("#youtubevideoimg").show().html('<div class="clear" style="padding-top:2px;"/><span><span><img src='+videoThumbnail+'></span><br/><span style="text-decoration:underline;font-weight:bold;"></span><br/><span style="font-weight:normal;"></span></span>');
									 $("#tabs").tabs( "load", 1 );//setTimeout(window.location.href=baseurl+'admin/project/add_project/'+project_id,9000);
									}
								}
								});
							}
							else
							{
								
									$("#youtube_link").after('<div class="clear"/><span class="error" id="image_error1" style="bottom:-20px;"><span>Not a youtube video url </span></span>');
									return false;
								
							}
						
						
					}
						
					
				  //$('#target').submit();			
					}
		 }
		 else if(rad_val ==2){
			 if(validate_video_title() &  validate_vimeo_video_url())
			{
					
					var baseurl='{/literal}{$baseurl}{literal}';
					var domainArray=["vimeo.com"];
					//************Regular Expression for Validating the URL***************************
					
					var RegExp = /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
					var vimeourl=$("#vimeo_link").val();
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
								
								
									$("#vimeo_link").after('<div class="clear"/><span class="error" id="image_error2" style="bottom:-20px;"><span>Please enter vimeo video only </span></span>');
									return false;
								
							}
							else 
							{
								
								var loadingimage='<img  src="'+baseurl+'images/admin/ajax-loader-bar.gif" />';					
								$("#youtubevideoimg").hide().html();
								$("#youtubevideoLoadingimg").show().html('<div class="clear" style="padding-top:10px;"/><span><span>'+loadingimage+'</span></span>');
								
								
								var vid_title = $('#vid_title').val();
								uploadurl=baseurl+"admin/project/add_vimeo_video/"+project_id;
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
									$('.cancel').hide();
									var vimeovideoInfo=$.parseJSON(videoinformation)
									var errorcode=vimeovideoInfo.errorcode;
									
									if(errorcode > 0)
									{
										$("#youtubevideoLoadingimg").hide().html();
										var message="Video is either blocked or deleted.";
										$("#msg").html(message);
										setTimeout("hideResponseMsg();", 1500); 
										
									}
									else
									{
										var videoThumbnail=vimeovideoInfo.thumbnail;
										//var videoTitle=youTubevideoInfo.title;
										//var videoDesc=youTubevideoInfo.description;
										
										$("#youtubevideoLoadingimg").hide().html();
										//$("#youtube_link").val('');
										var message="Vimeo Video Added Successfully";
										$("#msg").html(message);
										setTimeout("hideResponseMsg();", 2500); 
										
										$("#youtubevideoimg").show().html('<div class="clear" style="padding-top:2px;"/><span><span><img src='+videoThumbnail+'></span><br/><span style="text-decoration:underline;font-weight:bold;"></span><br/><span style="font-weight:normal;"></span></span>');
										 $("#tabs").tabs( "load", 1 );
										//setTimeout(window.location.href=baseurl+'admin/project/add_project/'+project_id,9000);
									
									}
								}
								});
							}
							/*else
							{
								
									$("#vimeo_link").after('<div class="clear"/><span class="error" id="image_error2" style="bottom:-20px;"><span>Please enter valid vimeo video url </span></span>');
									return false;
								
							}*/
						
						
					}
						
					
				  //$('#target').submit();			
					}
			 
		}
		 else
		 {
			 	
				if( validate_video_title() && validate_video_file())
				{
					$("#youtubevideoLoadingimg").hide().html();
					$("#youtubevideoimg").hide().html();
					//$('#target').submit();	
					var video_type=1;
					var videofile  = $("#hidVideofile").val();
					var vidImgfile = $("#hidVidImgfile").val();
					var vid_title=$("#vid_title").val();
					
					var $url= '{/literal}{$baseurl}{literal}'+"admin/project/create_video";
				$.ajax(
						{
						type:'POST', 
						url:$url,
						data:"project_id="+project_id+"&video_type="+video_type+"&video_file="+videofile+"&vidImgfile="+vidImgfile+"&vid_title="+vid_title,
						success: function(message)
						{
							//$('#video_ad').hide();
							$('.cancel').hide();
							$("#msg").show().html(message);
                                                          alert('Uploading will take some time, please try to play video after some time.');
							setTimeout("hideResponseMsg();", 2500);
							 $("#tabs").tabs( "load", 1 );
							 //setTimeout(window.location.href=baseurl+'admin/project/add_project/'+project_id,9000);
						}
						});
				}
		 }
   });

	
	
});

function show_items()
{	

			var loadingimage='<img  src="'+baseurl+'images/ajax_loader_upload.gif" />';	
	        var radio=$('input:radio[name=video_type]:checked').val();
			$("#youtubevideoLoadingimg").hide().html();
			$("#youtubevideoimg").hide().html();
		//	$('#video_ad').show();
			$('.cancel').show();
			$("#msg").empty().html('');
			$(".error").hide();
            if(radio==1)
			{				
				$('#youtube_case').hide();
				$('#vimeo_case').hide();
				$('#normal_case').show();
				//$('#normal_case_title').show();
				//$('#video_ad').removeAttr("disabled");
			
				$('.chooseBtnPane').show();
				$('#vid_upload').uploadify({
				'fileTypeExts' : '*.mp4;*.mp3;*.avi;*.wmv;*.flv;',
				'swf'      : baseurl+'uploadify/uploadify.swf',
				'uploader' : baseurl+'upload_video',
				'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
				'folder'    : baseurl+'uploads/',
				'auto'      : true,
				'multi'     : false,
				'onUploadStart' : function(file) {
				   //alert('Starting to upload ' + file.name);
				    $('#vid_upload').uploadify('disable', true);
				  $("#youtubevideoLoadingimg").show().html('<div class="clear" style="padding-top:10px;"/><span><span>'+loadingimage+'</span></span>');
				},
				'onUploadError' : function(file, errorCode, errorMsg, errorString) {
				  alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
				},
				'onUploadSuccess' : function(file, data, response) {
					
					   if((data=='failed') || (data=='ERROR:could not create image handle')||(data=='ERROR:Invalid width or height') || (data=='ERROR:invalid upload'))
						  {
							  alert('Error occured while uploading , please try another video.');
							  $('#vid_upload').uploadify('disable', false);
							// p_popupOpen('img_size_alert');
							// $('#alert_cntnt').html(data); 
						  }
					   else
						{
						//alert(data);
						 var files=data.split('|');
						 $("#youtubevideoLoadingimg").hide().html();
						 $("#youtubevideoimg").hide().html();
						  var image   =  baseurl+'uploads/projects/videos/thumb/'+files[0];
						  $("#youtubevideoimg").show().html('<div class="clear" style="padding-top:2px;"/><span><span><img src='+image+'></span><br/><span style="text-decoration:underline;font-weight:bold;"></span><br/><span style="font-weight:normal;"></span></span>');
						// $('#vid_div').show();
						 //$('#vid_div').html("<img style='width:150px; height:150p' src='"+image+"' />");
						  // $('#removeImage').show();
						   $('#hidVideofile').val(files[1]);
							$('#hidVidImgfile').val(files[0]);
						}
				   }
				// Put your options here
			});
	   }
	   else if(radio == 2){
		   $('#vimeo_case').show();
		   $('#youtube_case').hide();
		   $('#normal_case').hide();
		    // $('#vid_div').hide();
		}
	   else
	   {
		   $('.chooseBtnPane').hide();
			$("#youtube_link").val('');
			// $('#vid_div').hide();
			//$('#video_ad').removeAttr("disabled");
			//$('#video_ad').show();
			$('.cancel').show();
			$('#vimeo_case').hide();
		    $('#youtube_case').show();
			$('#normal_case').hide();	
			//$('#normal_case_title').hide();	  
			 
	   }
		
}


function validate_video_file() {
	$("#image_error").hide();	
	if($("#hidVideofile").val()=='')
	{
		$("#vid_upload").after('<div class="clear"/><span class="error" id="image_error"><span>Please upload a video </span></span>');
		return false;
	}
	else
	{
		$("#vid_upload").after('<div class="clear"/><span class="checked" id="image_error"><span></span></span>');
		return true;
	}
}

function validate_video_url()
{
	$("#image_error1").hide();	
	if($.trim($("#youtube_link").val())=='')
	{
		$("#youtube_link").after('<div class="clear"/><span class="error" id="image_error1" style="bottom:-20px;"><span>Please enter youtube url</span></span>');
		return false;
	}
	else
	{
	   if(/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#youtube_link").val()))
	   {
		   $("#youtube_link").after('<div class="clear"/><span class="checked" id="image_error1"><span></span></span>');
		   return true;        
       } 
	  else
	    {
			 $("#youtube_link").after('<div class="clear"/><span class="error" id="image_error1" style="bottom:-20px;"><span>Please enter valid url</span></span>');
		     return false;
		}

    }
  
}

function validate_vimeo_video_url()
{
	$("#image_error2").remove();	
	if($.trim($("#vimeo_link").val())=='')
	{
		$("#vimeo_link").after('<div class="clear"/><span class="error" id="image_error2" style="bottom:-20px;"><span>Please enter vimeo url</span></span>');
		return false;
	}
	else
	{
	   if(/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#vimeo_link").val()))
	   {
		   $("#vimeo_link").after('<div class="clear"/><span class="checked" id="image_error2"><span></span></span>');
		   return true;        
       } 
	  else
	    {
			 $("#vimeo_link").after('<div class="clear"/><span class="error" id="image_error2" style="bottom:-20px;"><span>Please enter valid url</span></span>');
		     return false;
		}

    }
  
}

/*function validate_video_title() {
	$("#image_error").hide();	
	if($("#videotitle").val()=='')
	{
	
		$("#videotitle").after('<div class="clear"/><span class="error" id="title_error"><span>Please Enter Video Title </span></span>');
		return false;
	}
	else
	{
		$("#videotitle").after('<div class="clear"/><span class="checked" id="title_error"><span></span></span>');
		return true;
	}
	
}*/
function validate_video_title() {
	$("#vid_title_error").remove();	
	//alert($("#vid_title").val());
	if($("#vid_title").val()=='')
	{
		$("#vid_title").after('<span class="error" id="vid_title_error"><span>Please enter caption.</span></span>');
		return false;
	}
	else
	{
		//$("#vid_title").html('<span class="checked" id="vid_title_error"><span></span></span>');
		return true;
	}
}
function hideResponseMsg()
  {
	  $("#msg").slideToggle('slow');
	  //window.location.href="manage_video";
	  
  }
  
 function remove_vid(vid)
 {
	 var project_id = '{/literal}{$proj_id}{literal}';
	 var $url= '{/literal}{$baseurl}{literal}'+"admin/project/remove_proj_video";
	 var cng=confirm('Are you sure want to delete this video.?');
	if(cng){
	$.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"project_id="+project_id+"&vid="+vid,
			  success: function(message)
			  {
				   $("#tabs").tabs( "load", 1 );
				  //$('#vid_li_'+vid).remove();
				 // window.location.href=baseurl+'admin/project';
			  }
			  });
	}
 }
 function edit_vidtitle_popfn(vid_id,title){
	  $('#vidcaption_pop').val(title);
	   
	   $('#hid_vidid').val(vid_id);
	   $('#edit_vidtitle_pop').show();
		$('#edit_vidtitle_pop').css('left',$(window).width()/2-150)
		$('#edit_vidtitle_pop').css('top',$(window).height()/2-160);
		 
	/*  var $url= '{/literal}{$baseurl}{literal}'+"admin/project/edit_title_page";
	 $.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"vid_caption="+title,
			  success: function(message)
			  {
				  $('#popup_content').html(message);
			  $( "#edit_vidtitle_pop" ).dialog({
							resizable: false,
							//height:140,
							modal: true,
							buttons: {
								"Save": function() {
									//$('#vid_caption_pop').val(title);
									update_title(vid_id,title);
									//$( this ).dialog( "close" );
								},
								Cancel: function() {
									$( this ).dialog( "close" );
								}
							}
						});
						
			  }
			 });*/
	
						
	}
	function  update_vidtitle(){
		
	 var project_id = '{/literal}{$proj_id}{literal}';
	 var $url= '{/literal}{$baseurl}{literal}'+"admin/project/update_proj_video_title";
	 var vid_caption = $('#vidcaption_pop').val();
	 //alert(vid_caption);
	 var vid_id= $('#hid_vidid').val();
	 if(vid_caption == '')
	 {
		$("#vid_caption_pop").after('<span class="error" id="vid_caption_pop_error"><span>Please enter caption. </span></span>');
		return false;
	 }
	 else
	 {
		 $('#vid_caption_pop_error').remove();
		// $( "#edit_vidtitle_pop1").dialog( "close" );
		$.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"project_id="+project_id+"&vid_id="+vid_id+"&vid_caption="+vid_caption,
			  success: function(message)
			  {
				  
				   $("#tabs").tabs( "load", 1 );
				    $('#edit_vidtitle_pop').hide();
				  //$('#vid_li_'+vid).remove();
				 // window.location.href=baseurl+'admin/project';
			  }
			  });
	 }
	}
	function reload_vid(){
		 $("#tabs").tabs( "load", 1 );
	}
	</script> 
{/literal}
<div class="shadow_outer">
  <div class="shadow_inner" >
  {if $proj_videos|@count gt 0}<ul class="homePageBanner-slides">
  {foreach from=$proj_videos item=vid}
  <li id="vid_li_{$vid.id}">  
  <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                    <td valign="middle" align="center" height="100"> 
 
                {if $vid.type eq 1}
                <span rel="{$vid.video_link}" type="{$vid.type}" class="preview" style="display: block;">
                	<img src="{$baseurl}images/videoBtn.png">
                </span>
                	<img style="width:100px;height:80px;" src="{$baseurl}uploads/projects/videos/original/{$vid.thumb_image}" class="previewimg"><span style="cursor:pointer" class="uploadClose " onclick="remove_vid({$vid.id})" >Remove this video</span>
                {elseif $vid.type eq 0}
                <span rel="{$vid.video_external_id}" type="{$vid.type}" class="preview" style="display: block;">
                	<img src="{$baseurl}images/videoBtn.png">
                </span>
       			 <img style="width:100px;height:80;" src="{$vid.thumb_image}" class="previewimg">
                 <span class="uploadClose " style="cursor:pointer" onclick="remove_vid({$vid.id})" >Remove this video</span>
                 {else}
                  <span rel="{$vid.video_external_id}" type="{$vid.type}" class="preview" style="display: block;">
                	<img src="{$baseurl}images/videoBtn.png">
                </span>
                    <img style="width:100px;height:80;" src="{$vid.thumb_image}" class="previewimg">
                    <span class="uploadClose " style="cursor:pointer" onclick="remove_vid({$vid.id})" >Remove this video</span>		   			
                {/if}
                {$vid.video_title}	<a href="javascript:void(0);" onclick="edit_vidtitle_popfn({$vid.id},'{$vid.video_title}');"><img src="{$baseurl}images/admin/tablelisting/edit_icon.gif" height="12" width="12" alt="Edit" title="Edit" /></a>
                <div style="" class="videoplayer"></div>
               </td></tr></tbody></table> 
                
                </li>
  {/foreach}
  </ul>{/if}
  <div class="clear"></div>
    <div class="table_listing font_segoe"> 
     
      <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <th colspan="2" align="left"><h2 style="margin-left:5px;">Upload project video</h2></th>
          </tr>
          <tr id="field_header">
            <td valign="top" colspan="2" align="left" >Fields marked with <span class="color_r">*</span> are required</td>
          </tr>
          <tr>
            <td width="25%" align="right" valign="top" colspan="2"><div id="display"></div>
              <div id="msg" style="color:red;width:800px;text-align:center;font-weight:bold;margin:auto;"></div></td>
          </tr>
          <tr class="shade01">
            <td width="25%" align="right" valign="top">Type of Video <span class="color_r">*</span></td>
            <td align="left" valign="top"><div class="formValidation">
             <table class="videoTypeBB" cellpadding="0" cellspacing="0" border="0" width="300">
              <tr>
              <td width="10">
                <input type='radio' name='video_type' value="0" id="youtube_type" checked="checked" onclick="show_items();" />
                </td>
              <td>
             <label for="youtube_type">Youtube</label></td>
                 <td width="10">
                <input type='radio' name='video_type' value="1" id="normal_type" onclick="show_items();" />
                </td>
                <td>
                <label for="normal_type">Normal</label>
                </td>
                 <td width="10">
                <input type="radio" id="vimeo_type" name="video_type" value="2" onClick="show_items()" />
                </td>
                <td>
                <label for="vimeo_type">Vimeo</label>
                </td>
                </tr></table>
              </div></td>
          </tr>
          <tr class="" id="normal_case_title" >
                    
                      <td  align="right" valign="top">Video Title<span class="color_r">*</span> </td>
                   <td align="left" valign="top" >
                    <div style="position:relative;">
                    <input type="text" name="vid_title" id="vid_title" style="width:500px;"  /> 
                    </div>
                    </td>
                    
                    </tr>
          
          <tr class="shade01" id="normal_case" style="display:none">
            <td  align="right" valign="top">Upload Video <span class="color_r">*</span></td>
            <td align="left" valign="top" ><div style="display: none; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;"></div>
              
              <!-- <span id="spanButtonPlaceholder" style="display:none"></span>-->
              
              <div class="chooseBtnPane" style="display:none">
                <input type="file" id="vid_upload" name="vid_upload" />
              </div>
              <input type="hidden" id="hidVideofile" name="hidVideofile" value="" />
              <input type="hidden" id="hidVidImgfile" name="hidVidImgfile" value="" />
              <div style="position:relative"> <br />
                <div id="thumbnails"> </div>
              </div></td>
          </tr>
          <tr class="shade01" id="youtube_case">
            <td align="right" valign="top">Youtube URL <span class="color_r">*</span></td>
            <td align="left" valign="top" ><div style="position:relative;">
                <input type="text" name="youtube_link" id="youtube_link" style="width:500px;"  />
              </div></td>
          </tr>
          <tr class="shade01" id="vimeo_case">
            <td align="right" valign="top">Vimeo URL <span class="color_r">*</span></td>
            <td align="left" valign="top" ><div style="position:relative;">
                <input type="text" name="vimeo_link" id="vimeo_link" style="width:500px;"  />
              </div></td>
          </tr>
          <tr>
            <td  align="left" valign="top"></td>
            <td  align="left" valign="top" ><div style="clear:both;"></div>
              <br/>
              <div id="youtubevideoLoadingimg" style="display:none;"></div>
               
              <div  id="youtubevideoimg" style="display:none;"></div></td>
          </tr>
          <tr class="shade01">
            <td valign="top" align="left">&nbsp;</td>
            <td valign="top" align="left"><span class="btnlayout">
              <input type="button"  value="Add" id="video_ad" class="button" name="video_ad" />
              </span> <span class="btnlayout ">
              <input type="button" class="cancel" value="Cancel" name="text3" onclick="reload_vid()"/>
              </span></td>
          </tr>
        </tbody>
      </table>
      <input type="hidden" name="hide_video_file" id="hide_video_file" value="" />
      <!--</form>--> 
    </div>
  </div>
  <!--End:Border 3--> 
</div>

<div id="edit_vidtitle_pop" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable ui-dialog-buttons" style="outline: 0px none; z-index: 1004; height: auto; width: 300px; top: 293.667px; left: 478px; display: none;" tabindex="-1" role="dialog" aria-labelledby="ui-id-9">
  <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span id="ui-id-9" class="ui-dialog-title">Edit caption</span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button"><span class="ui-icon ui-icon-closethick">close</span></a></div>
  <div style="width: auto; min-height: 19px; height: auto;" class="ui-dialog-content ui-widget-content" scrolltop="0" scrollleft="0">
  <input type="hidden" id="hid_vidid" name="hid_vidid" value="" />
    <div id="popup_content">
      <input type="text" value="" name="vidcaption_pop" id="vidcaption_pop" class="textbox" style="">
    </div>
  </div>
  <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
    <div class="ui-dialog-buttonset">
      <button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false" onclick="update_vidtitle();"><span class="ui-button-text">Save</span></button>
      <button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false" onclick="$('#edit_vidtitle_pop').hide();"><span class="ui-button-text">Cancel</span></button>
    </div>
  </div>
</div>
<!--
-->