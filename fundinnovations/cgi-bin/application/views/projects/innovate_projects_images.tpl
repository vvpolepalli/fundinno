<link rel="stylesheet" type="text/css" href="{$baseurl}uploadify/css/uploadify.css" />
<script type="text/javascript" src="{$baseurl}uploadify/js/jquery.uploadify-3.1.min.js"></script>
<!--<script type="text/javascript" src="{$baseurl}js/fancyBox/lib/jquery-1.9.0.min.js"></script>-->

<!--<script type="text/javascript" src="{$baseurl}js/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>-->

<link rel="stylesheet" type="text/css" href="{$baseurl}js/fancyBox/source/jquery.fancybox.css?v=2.1.4" media="screen" />

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="{$baseurl}js/fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<link rel="stylesheet" type="text/css" href="{$baseurl}js/fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />

<!-- Add Media helper (this is optional) -->

{literal} <script type="text/javascript">
		$(document).ready(function() {
			$("#image_title").blur(validate_image_title);
			/*
			 *  Simple image gallery. Uses default settings
			 */
  $.getScript('{/literal}{$baseurl}{literal}js/fancyBox/lib/jquery-1.9.0.min.js', function() {
	   $.getScript('{/literal}{$baseurl}{literal}js/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js', function() {
	    $.getScript('{/literal}{$baseurl}{literal}js/fancyBox/source/jquery.fancybox.js?v=2.1.4', function() {
			 $.getScript('{/literal}{$baseurl}{literal}js/fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7', function() {
			$('.fancybox').fancybox();
			});
			});
			});
			});
			

		});
		</script>{/literal}
    
{literal} 
		<script type="text/javascript" >
var baseurl ='{/literal}{$baseurl}{literal}';
var proj_id=$('#hid_proj_id').val();
$(function() {
$('#img_upload').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
		'height'   : 192,
		'width'   : 320,
		'buttonImage' : baseurl+'images/upload_img_big_trans.png',
        'fileTypeExts' : '*.gif; *.jpg; *.png',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'upload_project_images',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/projects/images',
		'auto'      : true,
		'multi'     : false,
		'onUploadStart' : function(file) {
           //alert('Starting to upload ' + file.name);
        },
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
		'onUploadSuccess' : function(file, data, response) {
			   if((data=='failed')||(data=='Please select image with hieght 400px and width 700px..!')||(data=='Invalid file formats..!'))
			      {
					//  p_popupOpen('img_size_alert');
					// $('#alert_cntnt').html(data); 
				  }
			   else
			    {
				//alert(data);
				$('#hidProjImg').val(data);
				 var image   =  baseurl+'uploads/projects/images/medium/'+data;
				   $('#img_div').html("<img  src='"+image+"' />");
				   $("#pro_img_error").remove();
				 
			}
           }
        // Put your options here
    });
	 });
function validate_pro_img(){
	$("#pro_img_error").remove();
	var pro_img=$('#hidProjImg').val();	
	if(pro_img=='')
	{
	$("#hidProjImg").after('<div style="bottom:11px; right:10px !important;" class="error" id="pro_img_error"><span>Please upload project image.</span></div>');
	return false;
	}
	else
	{
		return true;
	}
} 
function validate_image_title() {
	$("#img_title_error").remove();	
	//alert($("#vid_title").val());
	if($("#image_title").val()=='')
	{
		$("#image_title").after('<span class="error" id="img_title_error"><span>Please enter caption. </span></span>');
		return false;
	}
	else
	{
		//$("#vid_title").html('<span class="checked" id="vid_title_error"><span></span></span>');
		return true;
	}
}
 function save_image(){
	 var proj_id='{/literal}{$proj_id}{literal}';
	$('#save').attr('disabled', 'disabled' );
	 if(validate_pro_img() & validate_image_title()){
		var img= $('#hidProjImg').val();
		  var image_title =$('#image_title').val();
		  if(img !='undefined'){
			$.ajax({
			type: "POST",
			url: baseurl+"project/insert_project_photos", 
			data:"image="+img+"&proj_id="+proj_id+"&image_title="+image_title,
			success: function(msg){
				 var message="Image Uploaded Successfully";
			  $("#msg").show();
			  $("#msg").html(message);
			   setTimeout(function() { $("#msg").hide();
			   }, 2500); 
				 
			setTimeout(window.location.href=baseurl+'project/innovate_project_images/'+proj_id,9000);
				/* var image   =  baseurl+'uploads/projects/images/200x150/'+data;
				   $('#img_ul').append("<img style='width:233px;height:140px' src='"+image+"' />");
				   $('#hidImage').val(data);*/
			}
			});
		  }
	 }else{
		 $('#save').removeAttr('disabled');
		}
 }
 function confirm_pop(id){
		$('#alert_popup').show();openpPopup();
		openpPopup();
		$('#hid_img_id').val(id);
		///$('#confirm').attr('onclick',"remove_img('"+id+"')");
	}
 function remove_img()
 {
	 var project_id = '{/literal}{$proj_id}{literal}';
	 var $url= '{/literal}{$baseurl}{literal}'+"project/remove_proj_photos";
	 var id= $('#hid_img_id').val();
	$.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"project_id="+project_id+"&photo_id="+id,
			  success: function(message)
			  {
				  
				  close_pop('alert_popup');closepPopup();
				  var message="Image Deleted Successfully";
				  $("#msg").show();
				  $("#msg").html(message);
				   setTimeout(function() { $("#msg").hide();
				   }, 2500); 
				   
				   setTimeout(window.location.href=baseurl+'project/innovate_project_images/'+project_id,9000);
			  }
			  });
 }
 function close_pop(id){
	 $('#'+id).hide();
	 closepPopup();
	 //$('#alert_pop_cntnt').empty();
	// $('#save').attr('onclick','');
 	}
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
		  $('#img_caption_'+id).val($('#captn'+id).html());
		    $('#captnBlk_'+id).hide();
	   }
    }
//-->
function update_caption(id){
	var txtBoxPane= 'txtBoxPane_'+id;
	var caption=$('#img_caption_'+id).val();
	var project_id = '{/literal}{$proj_id}{literal}';
	var baseurl = '{/literal}{$baseurl}{literal}';
	var $url    = baseurl+"project/update_image_caption";
	$.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"project_id="+project_id+"&photo_id="+id+"&caption="+caption,
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
</script> 
		{/literal}
<section class="innerMidWrap">
<ul class="innerMidTab">
		<li><a  href="{$baseurl}project/innovate_project/{$proj_id}">Project Details</a></li>
		<li><a href="{$baseurl}project/innovate_project_videos/{$proj_id}">Videos</a></li>
		<li><a class="active" href="{$baseurl}project/innovate_project_images/{$proj_id}">Images<span class="arrowtabs"></span></a></li>
		<li><a href="{$baseurl}project/innovate_project_comments/{$proj_id}">Comments</a></li>
		{if $project_status.project_status eq 'success'}
		<!--<li><a  href="{$baseurl}project/innovate_project_updates/{$proj_id}">Project Updates</a></li>-->
		{/if}
		<li><a  target="_blank" href="{$baseurl}user/edit_profile">Edit Profile</a></li>
	</ul>
<div class="clear"></div>
<input type="hidden" name="hid_proj_id" id="hid_proj_id" value="{$proj_id}" />
<div class="innerMidContent">
		<div id="msg" class="success_msg" style="display:none;"></div>
		<div id="msg_error" class="error_msg" style="display:none;"></div>
		{if $proj_id neq ''}
		<form>
	<div class="imgUpload">
				<h5 style="padding-bottom: 16px;">Upload Image</h5>
				<ul id="img_ul">
			{assign var="cnt" value="1"}
			<li {if $cnt % 3 eq 0} class="last" {/if} ><!--<span class="delBtn" style="cursor:pointer" onclick="confirm_pop({$photo.id})" >Remove this image</span>--> 
						<a class="fancybox" href="{$baseurl}uploads/projects/images/gallary/{$project_main_img.project_image}" data-fancybox-group="gallery" title=""> <img src="{$baseurl}uploads/projects/images/medium/{$project_main_img.project_image}" alt="project images" /></a></li>
			{assign var="cnt" value=$cnt+1}
			
			
			{foreach from=$proj_photos item=photo key=k}
			<li {if $cnt % 3 eq 0} class="last" {/if} ><span class="delBtn" style="cursor:pointer" onclick="confirm_pop({$photo.id})" >Remove this image</span> <a class="fancybox" href="{$baseurl}uploads/projects/images/gallary/{$photo.image}" data-fancybox-group="gallery" title=""> <img src="{$baseurl}uploads/projects/images/medium/{$photo.image}" alt="project images"></a>
            
            <div class="vCaption"><div id="captnBlk_{$photo.id}"><span id="captn{$photo.id}">{$photo.image_title}</span> <a  onclick="toggle_visibility({$photo.id});" class="editLinkNew" href="javascript:void(0)">Edit</a></div>
		   <div class="clear"></div>
		   <div class="txtBoxPane" id="txtBoxPane_{$photo.id}" style="display:none"><input class="textBoxStyle" type="text" id="img_caption_{$photo.id}" name="img_caption_{$photo.id}" maxlength="38"><input type="button" class="blueBtn" id="update{$photo.id}" onclick="update_caption({$photo.id})" value="Update"></div>
		   </div>
            </li>
            
			{assign var="cnt" value=$cnt+1}
			{/foreach}
		</ul>
				<div class="clear"></div>
              
              <div  class=" fieldTxP">  
				<div style="float:left;position:relative;min-height: 177px;">
			<input type="file" id="img_upload" name="img_upload">
			<div id="img_div" style="position:absolute;top:2px;left:1px;">
            <img src="{$baseurl}images/add_img.jpg" />
             
             </div>
           <input type="hidden" id="hidProjImg" name="hidProjImg" value="" />
		</div></div>
			<div class="uploadFormPane">
			<ul>
					<li class="valFix fieldTxP"><label>Image Caption </label>
					<input type="text" id="image_title" name="image_title" maxlength="38" class="textBoxStyle">
					</li>
                    <li>
					<input type="button" onclick="save_image()" value="Save" class="blueBtn" name="save" id="save">
					<!--<input type="reset" value="Reset" class="grayBtn">-->
				</li>
					</ul>
		</div>
				<div class="clear"></div>
				<div class="hrLine1"></div>
			</div>
</form>
		{else}
		<div class="bakersBlock">
	<div class="WarMsg">Please create project first.</div>
</div>
		{/if}
		<div class="clear"></div>
	</div>
<div class="clear"></div>
</section>


<div id="alert_popup" class="popFixed" style="display:none">
<div class="popabs">
<div id="inlineContent2" class="white_content">
		<div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('alert_popup');closepPopup();">Close</a>
        <input type="hidden" id="hid_img_id" name="hid_img_id" value="" />
<div class="popTitle">
				
				<h4>Are you sure you want delete this image..</h4></div>
				<div id="alert_pop_cntnt" class="prodeForm"> 
                
			<div class="submitPane">
						<ul>
					<li style="border-left: 0px none;">
								<input type="button" onclick="remove_img()" value="Confirm" class="blueBtn" name="confirm" id="confirm">
							</li>
					<li>
								<input type="button" onclick="close_pop('alert_popup')" value="Cancel" class="grayBtn" name="cancel" id="cancel">
							</li>
				</ul>
					</div>
                    <div class="clear"></div>
			</div>
		<div class="clear"></div>	
</div>
		<div class="clear"></div>
	</div><div class="clear"></div>
</div><div class="clear"></div>
</div>
