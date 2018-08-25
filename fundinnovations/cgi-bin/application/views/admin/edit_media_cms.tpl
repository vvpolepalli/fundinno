<link rel="stylesheet" type="text/css" href="{$baseurl}uploadify/css/uploadify.css" />
<script type="text/javascript" src="{$baseurl}uploadify/js/jquery.uploadify-3.1.min.js"></script>


{literal}
<script type="text/javascript" >
var baseurl ='{/literal}{$baseurl}{literal}';
$(document).ready(function() {
$('#updatebtn').click(function() {
	  
		var baseurl =$('#hid_baseurl').val();
		$("#media_url").blur(validate_mediaurl());
		var id=$('#hid_id').val();
	//	var proj_id =$('#hid_proj_id').val();
		if(validateImage() & validate_mediaurl())
     	{
			
			var image	= $("#hidphotofile").val();
			//alert(image);
			var media_url=$.trim($("#media_url").val());
			//if(id == '') {
				$.ajax({		
				type: "POST",
				url: baseurl+"admin/home/update_media_image", 
				data:"image="+image+"&media_url="+media_url+'&media_id='+id,
				success: function(msg){
				if(msg)
				{ 
               // $("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span>'+msg+'</span></td></tr>');
			//	 $('#addphotobtn').attr('disabled', 'disabled');
				  setTimeout(window.location.href=baseurl+'admin/home/media_cms',9000);
				 
				}
				}
	   
				});
			//}
	 	}
	});	
	function validate_mediaurl(){
		 $("#media_url_error").remove();	
		 
		// alert($("#fb_prof_link").val());
		if($.trim($("#media_url").val())=='')
		{
			$("#media_url").after('<div class="clear"/><span class="error" id="media_url_error" ><span>Please enter media url</span></span>');
			return false;
		}
		else
		{
		   //if(validateURL($("#media_url").val()))
		   //{
			 //  $("#media_url").after('<div class="clear"/><span class="checked" id="media_url_error"><span></span></span>');
			//   return true;        
		 //  } 
		 // else
			//{
				  $("#media_url_error").remove();
				 return true;
			//}
	
		}
		 
		}
		function validateURL(textval) {
 		// var urlregex = new RegExp("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
		var urlregex = new RegExp("^(http:\/\/|https:\/\/|ftp:\/\/|){1}([0-9A-Za-z]+\.)");
  		return urlregex.test(textval);
		}
	function validateImage() {
	$("#image_error").remove();	

	if($("#hidphotofile").val()=='')
	{
		$("#thumbnails").after('<div class="clear"/><span class="error" id="image_error"><span>Upload photo</span></span>');
		return false;
	}
	else
	{
		
		$("#thumbnails").after('<div class="clear"/><span class="checked" id="image_error"><span></span></span>');
		return true;
	}
	}	
		
$('#img_banner_upload').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
        'fileTypeExts' : '*.gif; *.jpg; *.png',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'uploadify/media_image_upload.php',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/media_images',
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
			//	alert(data);
				 var image   =  baseurl+'uploads/media_images/'+data;
				   $('.thumb_img1').html("<img  src='"+image+"' />");
			     // window.location.href=baseurl+'admin/home/media_cms';
				   $('#hidphotofile').val(data);
				}
           }
        // Put your options here
    }); 
	});
	
	</script> 
{/literal}
<div class="shadow_outer">
        <div class="shadow_inner" >
          
            <input type="hidden" name="hid_baseurl" id="hid_baseurl" value="{$baseurl}">
           <input type="hidden" name="hid_id" id="hid_id" value="{$media_image_det.0.id}">
        <div class="table_listing font_segoe ">
            <form  name="frm_img" id="frm_img" method="post" enctype="multipart/form-data" >
           <!-- type=> bottom or rside hidden value-->
            
         
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                    
                    <th colspan="2" align="left"><h2 style="margin-left:5px;">Manage media images</h2></th>
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
                    <td width="29%" align="left" valign="top">Media Content Div Id<span  style="color:#F00">*</span><!--<p style="font-size:10px;">Please upload images of size, Minimum: </p>-->  </td>
                    <td width="71%" align="left" valign="top" >
                    
                  <input type="text" id="media_url" name="media_url" value="{$media_image_det.0.link}" />
                    </td>
                    </tr>
                    
                    <tr > 
                    <td width="29%" align="left" valign="top">Upload photos<span  style="color:#F00">*</span><!--<p style="font-size:10px;">Please upload images of size, Minimum: </p>-->  </td>
                    <td width="71%" align="left" valign="top" >
                    <div style="display: none; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;"></div>
			            	
                   <div class="chooseBtnPane" >
                    <input type="file" id="img_banner_upload" name="img_banner_upload" />
                  </div>
                  <input type="hidden" id="hidphotofile" name="hidphotofile" value="{$media_image_det.0.image}" />
                
                  <div style="position:relative"> <br />
                    <div id="thumbnails1" class="thumb_img1"><img src="{$baseurl}uploads/media_images/{$media_image_det.0.image}" /></div>
                  </div>
                    </td>
                    </tr>
                     
                    <tr >
                    <td valign="top" align="left">&nbsp;</td>
                    <td valign="top" align="left">
                    <span class="btnlayout">
               
                    <input type="button"  value="Update" id="updatebtn" class="button" name="updatebtn"   />
                    </span>
                    <span class="btnlayout ">
                       <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='{$baseurl}admin/home/media_cms'"/>
                    </span>
                    </td>
                    </tr>                    
                    </tbody>
                </table>
            
            </form>
        </div>
                </div>
      </div>