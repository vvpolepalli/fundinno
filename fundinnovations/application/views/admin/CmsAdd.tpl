{literal}
<script type="text/javascript" src="{/literal}{$baseurl}{literal}js/jquery.form.js"></script>{/literal}
{if $id neq 19}{literal}
<script type="text/javascript" src="{/literal}{$baseurl}{literal}/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
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

		plugins : "autolink,lists,pagebreak,style,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,imageupload",

		// Theme options
		theme_advanced_buttons1 : "newdocument,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,imageupload,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
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
</script>{/literal}{/if}
{literal}
<script type="text/javascript">
 $(document).ready(function()
 {
	var content='{/literal}{$content}{literal}';	
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
{/literal}

<div class="shadow_outer">
        <div class="shadow_inner" >  
        <div class="table_listing font_segoe ">
            <form name="frmContent" id="frmContent" method="post" action="{$baseurl}admin/Cms/updateCmsAjax/{$id}" onsubmit="return validate_form();">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                    <th colspan="2" align="left"><h2 style="margin-left:5px;">{if $id eq ''}Add New Page{else}Edit Page{/if}</h2></th>
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
                    <input type="text" name="pagename" id="pagename" class="styletxt40perc " tabindex="1" value="{$CmsContent[0]->page_name}"/>
                    </div>
                    </td>
                    </tr>
                    
                    <tr class="shade01">
                    <td  align="left" valign="top">Page Title <span class="color_r">*</span> </td>
                    <td  align="left" valign="top">
                    <div class="formValidation">
                    <input type="text" name="pagetitle" id="pagetitle" class="styletxt40perc " tabindex="1" value="{$CmsContent[0]->page_title}"/>
                    </div>
                    </td>
                    </tr>
                   
                    <tr class="">
                    <td width="282" valign="top" align="left" ><div align="left"> Content <span class="color_r">*</span> </div></td>
                    <td  class="required" valign="top" align="left">
                    <div class="formValidation_large">
                    <div align="left">
                   
                   <textarea id="content" name="content" >{$CmsContent[0]->page_content}</textarea>
                    </div>
                    </div>
                    </td>
                    </tr>
                   
                    <tr class="">
                    <td valign="top" align="left"><div align="left">Meta Keyword</div></td>
                    <td valign="top" align="left">
                    <div class="formValidation" style="height:auto">
                    <div align="left">
                    <input type="text" name="metaKeyword" id="metaKeyword" class="styletxt40perc "  value="{$CmsContent[0]->meta_keywords}"/>
                    
                    </div>
                    </div>
                    </td>
                    </tr>
                    <tr class="shade01">
                    <td valign="top" align="left"><div align="left">Meta Description</div></td>
                    <td valign="top" align="left">
                    <div class="formValidation" style="height:auto">
                    <div align="left">
                    <input type="text" name="metaDescription" id="metaDescription" class="styletxt40perc "  value="{$CmsContent[0]->meta_description}"/>
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
                       <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='{$baseurl}admin/Cms/ListCms';"/>
                    </span>
                    </td>
                    </tr>
                    
                    </tbody>
                </table>
            
            </form>
            
        </div>

                </div>
      
      </div>