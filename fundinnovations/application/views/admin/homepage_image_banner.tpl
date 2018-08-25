
<link rel="stylesheet" type="text/css" href="{$baseurl}uploadify/css/uploadify.css" />
<script type="text/javascript" src="{$baseurl}uploadify/js/jquery.uploadify-3.1.min.js"></script>


{literal}
<script type="text/javascript" >
var baseurl ='{/literal}{$baseurl}{literal}';
$(document).ready(function() {
	
	$('#addphotobtn').click(function() {
	  
		//var baseurl =$('#hid_baseurl').val();
		//var proj_id =$('#hid_proj_id').val();
		if(validateImage())
     	{
			
			var image	= $("#hidphotofile").val();
			//var img_title = $('#img_title').val();
			//if(id == '') {
				$.ajax({		
				type: "POST",
				url: baseurl+"admin/home/insert_banner_photos", 
				data:"image="+image,
				success: function(msg){
					//alert(msg);
				if(msg)
				{ 
                 $("#display").after('<tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span>Success fully inserted.</span></td></tr>');
				 //$('#addphotobtn').attr('disabled', 'disabled');
				setTimeout(function(){
					 window.location.href=baseurl+'admin/home/homepage_image_banner'
				 },3000);
				 // setTimeout(window.location.href=baseurl+'admin/project',9000);
				 
				}
		}
	   
	});
			//}
	 	}
	});
	
	
$('#img_banner_upload').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
        'fileTypeExts' : '*.gif; *.jpg; *.png',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'uploadify/image_banner_upload.php',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/image_banner',
		'auto'      : true,
		'multi'     : false,
		'onUploadStart' : function(file) {
           //alert('Starting to upload ' + file.name);
        },
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
		'onUploadSuccess' : function(file, data, response) {
			   if((data=='failed')||(data=='Please upload images of size, Minimum 850 X 281')||(data=='Invalid file formats..!'))
			      {
					  alert(data);
					//  p_popupOpen('img_size_alert');
					// $('#alert_cntnt').html(data); 
				  }
			   else
			    {
			//	alert(data);
			$("#image_error").remove();	
				  var image   =  baseurl+'uploads/image_banner/thumb/'+data;
				   $('.thumb_img').html("<img  src='"+image+"' />");
				   $('#hidphotofile').val(data);
				//  var image   =  baseurl+'uploads/image_banner/thumb/'+data;
				  // $('#img_div').html("<img  src='"+image+"' />");
				  // $('#img_div').html("<span class='propertyImgSpan' style='top:8px;'><img style='padding: 5px; width: 210px; height: 128px; opacity: 1;' src='"+image+"'><span class='cls-a'><a onclick='remove_property_image("+image+");' href='javascript:void(0);' title='Delete'></a></span></span>");
				  //$('#removeImage').show();
			      //window.location.href=baseurl+'admin/home/homepage_image_banner';
				  // $('#hidphotofile').val(data);
				}
           }
        // Put your options here
    });    });
	
	
function remove_img(id)
 {
	// var project_id = '{/literal}{$proj_id}{literal}';
	 var conf=confirm('Are You Sure You Want to Delete?');
			if(conf)
			{
	 var $url= '{/literal}{$baseurl}{literal}'+"admin/home/remove_banner_img";
	$.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"photo_id="+id,
			  success: function(message)
			  {
				    window.location.href=baseurl+'admin/home/homepage_image_banner';
				  // $("#tabs").tabs( "load", 2 );
				  //$('#vid_li_'+vid).remove();
				 // window.location.href=baseurl+'admin/project';
			  }
			  });
			}
 }
 function validateImage() {
	$("#image_error").remove();	

	if($("#hidphotofile").val()=='')
	{	//alert('sasas');
		$("#hidphotofile").after('<div class="clear"/><span class="error" id="image_error"><span>Upload photo</span></span>');
		return false;
	}
	else
	{
		
		$("#hidphotofile").after('<div class="clear"/><span class="checked" id="image_error"><span></span></span>');
		return true;
	}
}
	</script> 
{/literal}
<div class="shadow_outer">
        <div class="shadow_inner" >
          {if $banner_images|@count gt 0}
          <ul class="homePageBanner-slides">
  {foreach from=$banner_images item=photo}
  <li id="photo_li_{$photo.id}"> 
  <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                    <td valign="middle" align="center" height="100"> 
  <img  src="{$baseurl}uploads/image_banner/thumb/{$photo.image}" class="previewimg"><span style="cursor:pointer" class="uploadClose" onclick="remove_img({$photo.id})" >Remove this image</span>
  </td></tr></tbody></table>
  </li> {/foreach}</ul>
  {/if}
            <input type="hidden" name="hid_baseurl" id="hid_baseurl" value="{$baseurl}">
       <div class="clear" style="height:12px"></div>
        <div class="table_listing font_segoe " >
            <form  name="frm_img_banner" id="frm_img_banner" method="post" enctype="multipart/form-data" >
           <!-- type=> bottom or rside hidden value-->
            
         
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                    
                    <th colspan="2" align="left"><h2 style="margin-left:5px;">Manage home page image banner</h2></th>
                    </tr>
                    
                    <tr id="field_header">
                    
                    
                    <td valign="top" colspan="2" align="left" >Fields marked with <span class="star">*</span>  are required</td>
                    </tr>
                    <tr>
                    <td align="left" valign="top" colspan="2">
                    <div id="display">{if $updated_msg neq ''}{$updated_msg}{/if}</div>
                    </td>
                    </tr>
                  
                    
                    <tr class="shade01"> 
                    <td width="29%" align="left" valign="top">Upload photos<span  style="color:#F00">*</span><p style="font-size:10px;">Please upload images of size, Minimum:850x281 </p>  </td>
                    <td width="71%" align="left" valign="top" >
                    <div style="display: none; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;"></div>
			            	
                   <div class="chooseBtnPane" >
                    <input type="file" id="img_banner_upload" name="img_banner_upload" />
                  </div>
                  <input type="hidden" id="hidphotofile" name="hidphotofile" value="" />
                
                  <div style="position:relative"> <br />
                    <div id="thumbnails" class="thumb_img"> </div>
                  </div>
                    </td>
                    </tr>
                     
                    <tr >
                    <td valign="top" align="left">&nbsp;</td>
                    <td valign="top" align="left">
                    <span class="btnlayout">
               
                    <input type="button"  value="Add" id="addphotobtn" class="button" name="addphotobtn"   />
                    </span>
                    <span class="btnlayout ">
                       <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='{$baseurl}admin/home/homepage_image_banner'"/>
                    </span>
                    </td>
                    </tr>                    
                    </tbody>
                </table>
            
            </form>
        </div>
                </div>
      </div>