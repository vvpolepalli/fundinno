<?php /* Smarty version Smarty-3.1.8, created on 2013-06-09 02:18:24
         compiled from "/home/fundinno/public_html/application/views/admin/newsletter/edit_news_letter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206016801451b43a5067edd8-85277041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac373a6395d13684e49d0449b986b584b5b04490' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/newsletter/edit_news_letter.tpl',
      1 => 1361190559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206016801451b43a5067edd8-85277041',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'newsdt' => 0,
    'baseurl' => 0,
    'currP' => 0,
    'order_by' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51b43a50780f36_17159342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b43a50780f36_17159342')) {function content_51b43a50780f36_17159342($_smarty_tpl) {?>
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

		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,autosave,advlist,imageupload",

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
		//content_css : "css/content.css",

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
   $("#news_title").keyup(validateNewsTitle);
   $("#news_subject").keyup(validateNewsSubject);
   
	
 });

function validate_newsForm(baseurl) {
   if(validateNewsTitle() & validateNewsSubject() & validateNewsContent())
   {	
   		var newsId	= $("#hid_newsid").val();
		var currP	= $("#hid_page").val();
		var order	= $("#hid_order").val();
		var title	= $("#news_title").val();
		var subject	= $("#news_subject").val();
		var content	= $.trim(tinyMCE.get('news_content').getContent());	
	   $.ajax({		
			type: "POST",
			url: baseurl+"admin/Cms/update_news_letter_content", 
			data:"news_title="+title+"&news_subject="+subject+"&news_content="+content+"&news_id="+newsId,
			success: function(msg){
				
				if(msg)
				{ 
					 if(msg == 'no') 
						{		
					$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="error_response_msg" colspan=2 align=left ><span><font color=red>News Content cannot be empty</font></span></td></tr>');	
						$("#common_message").slideUp(4000).delay(500);
						}
						
						if(msg == 'yes') 
						{		
						 setTimeout('back_to_newsletter(\''+baseurl+'\','+currP+',\''+order+'\');', 500);
						}
					
				}
			}
	   
		});
	}
	else {
		return false;	
	}
}
	 
//function for validating News title
function validateNewsTitle()
{
		
		$("#news_title_error").hide();	
		if($.trim($("#news_title").val())=='')
		{
		$("#news_title").after('<div class="clear"/><span class="error" id="news_title_error"><span>This field is required</span></span>');
		return false;
		}
		else
		{

		
		$("#news_title").after('<div class="clear"/><span class="checked" id="news_title_error"><span></span></span>');
		return true;						
		
		}
}
				
				
//function for validating NewsSubject 
function validateNewsSubject()
{
		$("#news_subject_error").hide();	
		if($.trim($("#news_subject").val())=='')
		{
		$("#news_subject").after('<div class="clear"/><span class="error" id="news_subject_error"><span>This field is required</span></span>');
		return false;
		}
		else
		{						
		$("#news_subject").after('<div class="clear"/><span class="checked" id="news_subject_error"><span></span></span>');
		return true;							
		}
}

//function for validating NewsSubject 
function validateNewsContent()
{
		/*$("#news_content_error").hide();	
		if($.trim(tinyMCE.get('news_content').getContent())=='')
		{
		$("#news_content").after('<div class="clear"/><span class="error" id="news_content_error" style="bottom:25px;"><span>This field is required</span></span>');
		setTimeout('hide_error();', 2500);
		return false;
		}
		else
		{						
		$("#news_content").after('<div class="clear"/><span class="checked" id="news_content_error"><span></span></span>');
		return true;							
		}*/
		
		$("#proDescError").html('');	
	$("#proDescError").hide();
	if($.trim(tinyMCE.get('news_content').getContent())=='')
	{
		$("#proDescError").show();
	$("#proDescError").html('<span>This field is required</span>');
	return false;
	}
	else
	{
		
		return true;
	}
}	
function hide_error() {
	$("#news_content_error").toggle(1000);
}

	
</script>

            <form name="frmNews" id="frmNews" method="post" action="" >
                <table width="100%" cellspacing="0" cellpadding="0" border="0" >
                    <tbody>
                    <tr>
                    <th colspan="2" align="left"><h2 style="margin-left:5px;">Update News Letter</h2></th>
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
                    <td width="25%" align="left" valign="top">Title <span class="color_r">*</span> </td>
                    <td  align="left" valign="top">
                    <div class="formValidation">
                    <input type="text" name="news_title" id="news_title" class="styletxt40perc " tabindex="1" value="<?php echo $_smarty_tpl->tpl_vars['newsdt']->value[0]->news_title;?>
" />
                    </div>
                    </td>
                    </tr>
                    
                    <tr class="shade01">
                    <td  align="left" valign="top">Subject <span class="color_r">*</span> </td>
                    <td  align="left" valign="top">
                    <div class="formValidation">
                    <input type="text" name="news_subject" id="news_subject" class="styletxt40perc "  tabindex="1" value="<?php echo $_smarty_tpl->tpl_vars['newsdt']->value[0]->subject;?>
" />
                    </div>
                    </td>
                    </tr> 
                    
                    <tr class="">
                    <td width="282" valign="top" align="left" ><div align="left"> Page Content <span class="color_r">*</span> </div></td>
                    <td  class="required" valign="top" align="left">
                    <div class="formValidation_large">
                    <div align="left">
                   <textarea id="news_content" name="news_content" ><?php echo stripslashes($_smarty_tpl->tpl_vars['newsdt']->value[0]->news_content);?>
</textarea>
                   <div class="error " id="proDescError"></div>  </div>
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td valign="top" align="left">&nbsp;</td>
                    <td valign="top" align="left">
                    <span class="btnlayout">
               
                    <input type="button" value="Update" id="newsAddbtn" class="button" name="newsAddbtn" onClick="return validate_newsForm('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');" />
                    </span>
                    <span class="btnlayout ">
                       <input type="button" class="cancel" value="Cancel" name="text3" onclick="back_to_newsletter('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['currP']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_by']->value;?>
')"/>
                    </span>
                    </td>
                    </tr>
                    
                    </tbody>
                </table>
                <input type="hidden" name="hid_newsid" id="hid_newsid" value="<?php echo $_smarty_tpl->tpl_vars['newsdt']->value[0]->news_id;?>
">
                <input type="hidden" name="hid_page" id="hid_page" value="<?php echo $_smarty_tpl->tpl_vars['currP']->value;?>
">
                <input type="hidden" name="hid_order" id="hid_order" value="<?php echo $_smarty_tpl->tpl_vars['order_by']->value;?>
">
            </form>
<?php }} ?>