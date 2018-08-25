<?php /* Smarty version Smarty-3.1.8, created on 2013-02-04 02:11:41
         compiled from "/var/www/fundinnovations/application/views/admin/CmsAdd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198362773508f569c4cb472-95309487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44f2339d90523bb417433467af7d6f6ba6523ba7' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/CmsAdd.tpl',
      1 => 1359721821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198362773508f569c4cb472-95309487',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_508f569c5bf622_28283746',
  'variables' => 
  array (
    'baseurl' => 0,
    'content' => 0,
    'id' => 0,
    'CmsContent' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508f569c5bf622_28283746')) {function content_508f569c5bf622_28283746($_smarty_tpl) {?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		height : "480",
		verify_html : false,
        cleanup : false,
        cleanup_on_startup : false,
		mode : "textareas",
		theme : "advanced",
		elements : 'nourlconvert',
        convert_urls : false,

		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,imageupload",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,imageupload,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
	//	content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		/*template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",*/

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<script type="text/javascript">
 $(document).ready(function()
 {
	var content='<?php echo $_smarty_tpl->tpl_vars['content']->value;?>
';	
	if(content == 'no') 
	{		
$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="error_response_msg" colspan=2 align=left ><span><font color=red>Page Content cannot be empty</font></span></td></tr>');	
	$("#common_message").slideUp(2000).delay(500);
	}
	
	if(content == 'yes') 
	{		
$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span><font color=green>Page Updated Successfully</font></span></td></tr>');	
	$("#common_message").slideUp(2000).delay(300);
	}
	
	 
   $("#pagename").blur(validatepagename);
   $("#pagetitle").blur(validateTitle); 
  
   
   $('#cmsAddbtn').click(function()
   {	    
	   if(validatepagename() & validateTitle())
	   {		   
		   document.forms["frmContent"].submit();
	   }	   
   });
   
   
 });

 
	 
//function for validating page_title
	function validateTitle()
				{
						
						$("#tag_error").hide();	
						if($.trim($("#pagetitle").val())=='')
						{
						$("#pagetitle").after('<div class="clear"/><span class="error" id="tag_error"><span>This field is required</span></span>');
						return false;
						}
						else
						{
						
						$("#pagetitle").after('<div class="clear"/><span class="checked" id="tag_error"><span></span></span>');
						return true;						
						
						}
				}
				
				
//function for validating pagename 
	function validatepagename()
				{
						
						$("#tag_error1").hide();	
						if($.trim($("#pagename").val())=='')
						{
						$("#pagename").after('<div class="clear"/><span class="error" id="tag_error1"><span>This field is required</span></span>');
						return false;
						}
						else
						{						
						$("#pagename").after('<div class="clear"/><span class="checked" id="tag_error1"><span></span></span>');
						return true;							
						}
				}			

	
</script>


<div class="shadow_outer">
        <div class="shadow_inner" >  
        <div class="table_listing font_segoe ">
            <form name="frmContent" id="frmContent" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/updateCmsAjax/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" onsubmit="return validate_form();">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                    <th colspan="2" align="left"><h2 style="margin-left:5px;"><?php if ($_smarty_tpl->tpl_vars['id']->value==''){?>Add New Page<?php }else{ ?>Edit Page<?php }?></h2></th>
                    </tr>
                    <tr id="field_header">
                    <td valign="top" colspan="2" align="left" >Fields marked with <span class="color_r">*</span>  are required</td>
                    </tr>
                    <tr>
                    <td align="left" valign="top" colspan="2">
                    <div id="display"></div>
                    </td>
                    </tr>
                   
                    <tr class="shade01">
                    <td width="25%" align="left" valign="top">Page Name <span class="color_r">*</span> </td>
                    <td  align="left" valign="top">
                    <div class="formValidation">
                    <input type="text" name="pagename" id="pagename" class="styletxt40perc " tabindex="1" value="<?php echo $_smarty_tpl->tpl_vars['CmsContent']->value[0]->page_name;?>
"/>
                    </div>
                    </td>
                    </tr>
                    
                    <tr class="shade01">
                    <td  align="left" valign="top">Page Title <span class="color_r">*</span> </td>
                    <td  align="left" valign="top">
                    <div class="formValidation">
                    <input type="text" name="pagetitle" id="pagetitle" class="styletxt40perc " tabindex="1" value="<?php echo $_smarty_tpl->tpl_vars['CmsContent']->value[0]->page_title;?>
"/>
                    </div>
                    </td>
                    </tr>
                   
                    <tr class="">
                    <td width="282" valign="top" align="left" ><div align="left"> Content <span class="color_r">*</span> </div></td>
                    <td  class="required" valign="top" align="left">
                    <div class="formValidation_large">
                    <div align="left">
                   
                   <textarea id="content" name="content" ><?php echo $_smarty_tpl->tpl_vars['CmsContent']->value[0]->page_content;?>
</textarea>
                    </div>
                    </div>
                    </td>
                    </tr>
                   
                    <tr class="">
                    <td valign="top" align="left"><div align="left">Meta Keyword</div></td>
                    <td valign="top" align="left">
                    <div class="formValidation" style="height:auto">
                    <div align="left">
                    <input type="text" name="metaKeyword" id="metaKeyword" class="styletxt40perc "  value="<?php echo $_smarty_tpl->tpl_vars['CmsContent']->value[0]->meta_keywords;?>
"/>
                    
                    </div>
                    </div>
                    </td>
                    </tr>
                    <tr class="shade01">
                    <td valign="top" align="left"><div align="left">Meta Description</div></td>
                    <td valign="top" align="left">
                    <div class="formValidation" style="height:auto">
                    <div align="left">
                    <input type="text" name="metaDescription" id="metaDescription" class="styletxt40perc "  value="<?php echo $_smarty_tpl->tpl_vars['CmsContent']->value[0]->meta_description;?>
"/>
                    </div>
                    </div>
                    </td>
                    </tr>                   
                   
                    <tr>
                    <td valign="top" align="left">&nbsp;</td>
                    <td valign="top" align="left">
                    <span class="btnlayout">
               
                    <input type="button" value="Save" id="cmsAddbtn" class="button" name="cmsAddbtn"/>
                    </span>
                    <span class="btnlayout ">
                       <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/ListCms';"/>
                    </span>
                    </td>
                    </tr>
                    
                    </tbody>
                </table>
            
            </form>
            
        </div>

                </div>
      
      </div><?php }} ?>