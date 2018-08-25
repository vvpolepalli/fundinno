<?php /* Smarty version Smarty-3.1.8, created on 2013-02-09 10:45:46
         compiled from "/var/www/fundinnovations/application/views/admin/projects/add_photos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82607556509c8eb340a5d5-00653299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ef56b3feaec62c7a0533f8d80102f0bf57df6fc' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/projects/add_photos.tpl',
      1 => 1360386939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82607556509c8eb340a5d5-00653299',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_509c8eb34b9512_15215877',
  'variables' => 
  array (
    'proj_id' => 0,
    'baseurl' => 0,
    'proj_photos' => 0,
    'photo' => 0,
    'id' => 0,
    'updated_msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_509c8eb34b9512_15215877')) {function content_509c8eb34b9512_15215877($_smarty_tpl) {?> 
<style type="text/css">
#thumbnails img{
	width:auto;
	height:auto;
	padding:10px;	
}
</style>
<script type="text/javascript">
				
$(document).ready(function(){
		var baseurl =$('#hid_baseurl').val();
		$('#img_title').blur(validateTitle);
	  $('#photo_upload').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
        'fileTypeExts' : '*.gif; *.jpg; *.png',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'upload_project_images',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/projects/images/200x150/',
		'auto'      : true,
		'multi'     : false,
		'onUploadStart' : function(file) {
			 $('.thumb_img').empty();
           //alert('Starting to upload ' + file.name);
        },
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
		'onUploadSuccess' : function(file, data, response) {
			   if((data=='failed')||(data=='Please select image..!')||(data=='Invalid file formats..!'))
			      {
					//  p_popupOpen('img_size_alert');
					// $('#alert_cntnt').html(data); 
				  }
			   else
			    {
				$("#image_error").remove();	
				  var image   =  baseurl+'uploads/projects/images/200x150/'+data;
				   $('.thumb_img').html("<img  src='"+image+"' />");
				   $('#hidphotofile').val(data);
				}
           }
        // Put your options here
    });
	
	$('#addphotobtn').click(function() {
	  
		var baseurl =$('#hid_baseurl').val();
		var proj_id =$('#hid_proj_id').val();
		if(validateImage() & validateTitle())
     	{
			
			var image	= $("#hidphotofile").val();
			var img_title = $('#img_title').val();
			//if(id == '') {
				$.ajax({		
				type: "POST",
				url: baseurl+"admin/project/insert_project_photos", 
				data:"image="+image+"&proj_id="+proj_id+"&img_title="+img_title,
				success: function(msg){
					//alert(msg);
				if(msg)
				{ 
                 $("#display1").after('<tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span>'+msg+'</span></td></tr>');
				 $('#addphotobtn').attr('disabled', 'disabled');
				setTimeout(function(){
					  $("#tabs").tabs( "load", 2 );
				 },3000);
				 // setTimeout(window.location.href=baseurl+'admin/project',9000);
				 
				}
		}
	   
	});
			//}
	 	}
	});
});
function validateImage() {
	$("#image_error").remove();	

	if($("#hidphotofile").val()=='')
	{	//alert('sasas');
		$("#hidphotofile").after('<div class="clear"/><span class="error" id="image_error"><span>Please upload photo</span></span>');
		return false;
	}
	else
	{
		
		$("#hidphotofile").after('<div class="clear"/><span class="checked" id="image_error"><span></span></span>');
		return true;
	}
}

function validateTitle() {
	$("#img_title_error").remove();	

	if($("#img_title").val()=='')
	{
		$("#img_title").after('<div class="clear"/><span class="error" id="img_title_error"><span>Please enter caption.</span></span>');
		return false;
	}
	else
	{
		//$('#img_title_error').remove();
		//$("#img_title").after('<div class="clear"/><span class="checked" id="image_error"><span></span></span>');
		return true;
	}
} 
 function remove_img(id)
 {
	 var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
	 var $url= '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'+"admin/project/remove_proj_photos";
	 var conf=confirm('Are You Sure You Want to Delete?');
			if(conf)
			{
	$.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"project_id="+project_id+"&photo_id="+id,
			  success: function(message)
			  {
				  
				   $("#display1").after('<tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span>Deleted successfully.</span></td></tr>');
				   setTimeout(function(){
				   $("#tabs").tabs( "load", 2 );
				   },3000
				   );
				  //$('#vid_li_'+vid).remove();
				 // window.location.href=baseurl+'admin/project';
			  }
			  });
			}
 }
  function edit_title_pop3(img_id,title){
	 // var $url= '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'+"admin/project/edit_imgtitle_page";
	   $('#img_caption_pop_error').remove();
	   $('#imgcaption_pop').val(title);
	   
	   $('#hid_imgid').val(img_id);
	   $('#edit_imgtitle_pop').show();
		 $('#edit_imgtitle_pop').css('left',$(window).width()/2-150)
		 $('#edit_imgtitle_pop').css('top',$(window).height()/2-160);
	  /* $.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"img_caption="+title,
			  success: function(message)
			  {
				  $('#popup_content').html(message);
				  
				 //$( "#edit_imgtitle_pop" ).dialog({
//							resizable: false,
//							//height:140,
//							modal: true,
//							buttons: {
//								"Save": function() {
//									//$('#vid_caption_pop').val(title);
//									
//									//$( this ).dialog( "close" );
//								},
//								Cancel: function() {
//									$( this ).dialog( "close" );
//								}
//							}
//						});
						
			  }
			 });*/
	
						
	}
	function  update_imgtitle(){
		
	 var project_id = '<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
	 var img_id=$('#hid_imgid').val();
	 var $url= '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'+"admin/project/update_proj_image_title";
	 var img_caption = $('#imgcaption_pop').val();
	 //alert(vid_caption);
	 if(img_caption == '')
	 {
		$("#img_caption_pop").after('<span class="error" id="img_caption_pop_error"><span>Please enter caption. </span></span>');
		return false;
	 }
	 else
	 {
		 $('#img_caption_pop_error').remove();
		$.ajax(
			{
			  type:'POST', 
			  url:$url,
			  data:"project_id="+project_id+"&img_id="+img_id+"&img_caption="+img_caption,
			  success: function(message)
			  {
				   $("#tabs").tabs( "load", 2 );
				    $('#edit_imgtitle_pop').hide();
				    //$( "#edit_imgtitle_pop").dialog( "close" );
					
				  //$('#vid_li_'+vid).remove();
				 // window.location.href=baseurl+'admin/project';
			  }
			  });
	 }
	}
	</script> 

<div class="shadow_outer">
  <div class="shadow_inner" > <?php if (count($_smarty_tpl->tpl_vars['proj_photos']->value)>0){?>
    <ul class="homePageBanner-slides">
      <?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['photo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proj_photos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
$_smarty_tpl->tpl_vars['photo']->_loop = true;
?>
      <li id="photo_li_<?php echo $_smarty_tpl->tpl_vars['photo']->value['id'];?>
">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <td valign="middle" align="center" height="100"><img  src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/200x150/<?php echo $_smarty_tpl->tpl_vars['photo']->value['image'];?>
" class="previewimg"> <span style="cursor:pointer" onclick="remove_img(<?php echo $_smarty_tpl->tpl_vars['photo']->value['id'];?>
)" class="uploadClose ">Remove this image</span> <?php echo $_smarty_tpl->tpl_vars['photo']->value['image_title'];?>
<a href="javascript:void(0);" onclick="edit_title_pop3(<?php echo $_smarty_tpl->tpl_vars['photo']->value['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['photo']->value['image_title'];?>
');"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/edit_icon.gif" height="12" width="12" alt="Edit" title="Edit" /></a></td>
            </tr>
          </tbody>
        </table>
      </li>
      <?php } ?>
    </ul>
    <?php }?>
    <input type="hidden" name="hid_baseurl" id="hid_baseurl" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
">
    <input type="hidden" name="hid_proj_id" id="hid_proj_id" value="<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
" />
    <div class="clear"></div>
    <div class="table_listing font_segoe ">
      <form  name="addphoto" id="addphoto" method="post" enctype="multipart/form-data" >
        <!-- type=> bottom or rside hidden value-->
        
        <input type="hidden" name="hid_id" id="hid_id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"/>
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <th colspan="2" align="left"><h2 style="margin-left:5px;">Add project photos</h2></th>
            </tr>
            <tr id="field_header">
              <td valign="top" colspan="2" align="left" >Fields marked with <span class="star">*</span> are required</td>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="2"><div id="display1"><?php if ($_smarty_tpl->tpl_vars['updated_msg']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['updated_msg']->value;?>
<?php }?></div></td>
            </tr>
            <tr class="shade01">
              <td width="25%" align="right" valign="top">Photo caption<span  style="color:#F00">*</span></td>
              <td align="left" valign="top" ><div style="position:relative;">
                  <input type="text" name="img_title" id="img_title" style="width:500px;"  />
                </div></td>
            </tr>
            <tr>
              <td width="25%" align="right" valign="top">Upload photos<span  style="color:#F00">*</span><!--<p style="font-size:10px;">Please upload images of size, Minimum: </p>--></td>
              <td align="left" valign="top" ><div style="display: none; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;"></div>
                <div class="chooseBtnPane" >
                  <input type="file" id="photo_upload" name="photo_upload" />
                </div>
                <input type="hidden" id="hidphotofile" name="hidphotofile" value="" />
                <div style="position:relative">
                  <div id="thumbnails" class="thumb_img"> </div>
                </div></td>
            </tr>
            <tr  class="shade01">
              <td valign="top" align="left">&nbsp;</td>
              <td valign="top" align="left"><span class="btnlayout">
                <input type="button"  value="Add" id="addphotobtn" class="button" name="addphotobtn"   />
                </span> <span class="btnlayout ">
                <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project'"/>
                </span></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<div id="edit_imgtitle_pop" class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable ui-dialog-buttons" style="outline: 0px none; z-index: 1004; height: auto; width: 300px; top: 293.667px; left: 478px; display: none;" tabindex="-1" role="dialog" aria-labelledby="ui-id-9">
  <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span id="ui-id-9" class="ui-dialog-title">Edit caption</span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button"><span class="ui-icon ui-icon-closethick">close</span></a></div>
  <div style="width: auto; min-height: 19px; height: auto;"  class="ui-dialog-content ui-widget-content" scrolltop="0" scrollleft="0">
  <input type="hidden" id="hid_imgid" name="hid_imgid" value="" />
    <div id="popup_content">
      <input type="text" value="" name="imgcaption_pop" id="imgcaption_pop" class="textbox" style="">
    </div>
  </div>
  <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
    <div class="ui-dialog-buttonset">
      <button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false" onclick="update_imgtitle();"><span class="ui-button-text">Save</span></button>
      <button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false" onclick="$('#edit_imgtitle_pop').hide();"><span class="ui-button-text">Cancel</span></button>
    </div>
  </div>
</div>




<?php }} ?>