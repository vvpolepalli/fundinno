<?php /* Smarty version Smarty-3.1.8, created on 2013-06-26 03:41:55
         compiled from "/home/fundinno/public_html/application/views/admin/media_cms.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178472811515c0b43d5af33-62740065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6729ec3baea238c3b2c6d40b35dfa9d95ab93277' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/media_cms.tpl',
      1 => 1372239201,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178472811515c0b43d5af33-62740065',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c0b43e6a8a1_68853923',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'media_images' => 0,
    'photo' => 0,
    'updated_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c0b43e6a8a1_68853923')) {function content_515c0b43e6a8a1_68853923($_smarty_tpl) {?>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/css/uploadify.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/js/jquery.uploadify-3.1.min.js"></script>



<script type="text/javascript" >
var baseurl ='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
$(document).ready(function() {
$('#addphotobtn').click(function() {
	  
		var baseurl =$('#hid_baseurl').val();
		//$("#media_url").blur(validate_mediaurl());
	//	var proj_id =$('#hid_proj_id').val();
		if(validateImage() & validate_mediaurl())
     	{
			
			var image	= $("#hidphotofile").val();
			var media_url=$.trim($("#media_url").val());
			//if(id == '') {
				$.ajax({		
				type: "POST",
				url: baseurl+"admin/home/insert_media_image", 
				data:"image="+image+"&media_url="+media_url,
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
		 
		// alert($("#fb_prof_link").val());+
		var med_url=$.trim($("#media_url").val());
		if($.trim($("#media_url").val())=='')
		{
			$("#media_url").after('<div class="clear"/><span class="error" id="media_url_error" ><span>Please enter media url</span></span>');
			return false;
		}
		else
		{
		   //if(!validateURL(med_url))
		   //{
			//   $("#media_url").after('<div class="clear"/><span class="error" id="media_url_error" ><span>Please enter valid url</span></span>');
			//   return false;        
		   //} 
		 // else
			//{
				 $("#media_url_error").remove();	
				 //$("#media_url").after('<div class="clear"/><span class="error" id="media_url_error" ><span>Please enter valid url</span></span>');
				 return true;
			//}
	
		}
		 
		}
		function validateURL(textval) {
 		// var urlregex = new RegExp("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
		//var urlregex = new RegExp("^(http:\/\/|https:\/\/|ftp:\/\/|){1}([0-9A-Za-z]+\.)");
		var urlregex = new RegExp("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
		
  		//alert(urlregex.test(textval));
		 return urlregex.test(textval);
		}
	function validateImage() {
	$("#image_error").remove();	

	if($("#hidphotofile").val()=='')
	{
		$("#img_banner_upload").after('<div class="clear"/><span class="error" id="image_error"><span>Please upload image.</span></span>');
		return false;
	}
	else
	{
		
		//$("#img_banner_upload").after('<div class="clear"/><span class="checked" id="image_error"><span></span></span>');
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
	
	
function remove_img(id)
 {
	// var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
	 var $url= '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'+"admin/home/remove_media_img";
	$.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"photo_id="+id,
			  success: function(message)
			  {
				    window.location.href=baseurl+'admin/home/media_cms';
				  // $("#tabs").tabs( "load", 2 );
				  //$('#vid_li_'+vid).remove();
				 // window.location.href=baseurl+'admin/project';
			  }
			  });
 }
	</script> 

<div class="shadow_outer">
        <div class="shadow_inner" >
          <?php if (count($_smarty_tpl->tpl_vars['media_images']->value)>0){?>
         <ul class="homePageBanner-slides">
  <?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['photo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['media_images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
$_smarty_tpl->tpl_vars['photo']->_loop = true;
?>
  <li id="photo_li_<?php echo $_smarty_tpl->tpl_vars['photo']->value['id'];?>
"> 
  <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                    <td valign="middle" align="center" height="100"> 
 	<a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home/edit_media/<?php echo $_smarty_tpl->tpl_vars['photo']->value['id'];?>
"><img style="height:35px;width:43px" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/media_images/<?php echo $_smarty_tpl->tpl_vars['photo']->value['image'];?>
" class="previewimg" ></a><span style="cursor:pointer" onclick="remove_img(<?php echo $_smarty_tpl->tpl_vars['photo']->value['id'];?>
)"  class="uploadClose">Remove this image</span>
    </td>
    </tr>
    </tbody></table>
  </li> <?php } ?></ul>
  <div class="clear" style="height:12px"></div>
  <?php }?>
            <input type="hidden" name="hid_baseurl" id="hid_baseurl" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
">
           
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
                    <div id="display"><?php if ($_smarty_tpl->tpl_vars['updated_msg']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['updated_msg']->value;?>
<?php }?></div>
                    </td>
                    </tr>
                  
                    <tr class="shade01"> 
                    <td width="25%"  align="left" valign="top">Media Content Div Id<span  style="color:#F00">*</span><!--<p style="font-size:10px;">Please upload images of size, Minimum: </p>-->  </td>
                    <td  align="left" valign="top" >
                    
                  <input type="text" id="media_url" name="media_url" class="styletxt40perc " value="" />
                    </td>
                    </tr>
                    
                    <tr > 
                    <td  align="left" valign="top">Upload photos <span  style="color:#F00">*</span>
                        <p style="font-size:10px;">(Max height- 35px, Max width - 100px)</p> </td>
                    <td  align="left" valign="top" >
                    <div style="display: none; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;"></div>
			            	
                   <div class="chooseBtnPane" >
                    <input type="file" id="img_banner_upload" name="img_banner_upload" />
                  </div>
                  <input type="hidden" id="hidphotofile" name="hidphotofile" value="" />
                
                  <div style="position:relative"> <br />
                    <div id="thumbnails1" class="thumb_img1"> </div>
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
                       <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home/media_cms'"/>
                    </span>
                    </td>
                    </tr>  
                    <tr >
                        <td  colspan="2">&nbsp;
                    <p style="font-size:10px;">Intro video should be in mp4 format.</p></td></tr>  
                    </tbody>
                </table>
            
            </form>
        </div>
                </div>
      </div><?php }} ?>