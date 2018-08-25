{literal}
<script type="text/javascript" src="{/literal}{$baseurl}{literal}js/jquery.form.js"></script>
<script type="text/javascript" src="{/literal}{$baseurl}{literal}/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

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
	var content='{/literal}{$content}{literal}';	
	var baseurl='{/literal}{$baseurl}{literal}';	
	if(content == 'no') 
	{		
$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="error_response_msg" colspan=2 align=left ><span><p style="margin-left:15px; color:red">Page Content cannot be empty</p></span></td></tr>');	
	$("#common_message").delay(500);
	}
	
	if(content == 'yes') 
	{		
$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span><font color=green>E-mail has been sent</font></span></td></tr>');	
	$("#common_message").delay(300);
	setTimeout(function(){myTimer(baseurl)}, 2500);
	}
	
	
   
   $('#btnSendMail').click(function()
   {	    
	   		   
		   document.forms["frmSendreply"].submit();
	  	   
   });
   
   
 });
function myTimer(baseurl){
				
		window.location=baseurl+'admin/Enquiry/enquiry_lists';
}
 
	 

	
</script>
{/literal}

<div class="shadow_outer">
        <div class="shadow_inner" >  
        <div class="table_listing font_segoe ">
            <form name="frmSendreply" id="frmSendreply" method="post" action="{$baseurl}admin/Enquiry/sendreply_action/{$enquiryList[0]->enquiry_id}" onsubmit="return validate_form();">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                    <th colspan="2" align="left"><h2 style="margin-left:5px;">Send an E-mail</h2></th>
                    </tr>
                   <tr>
                    <td align="left" valign="top" colspan="2">
                    <div id="display"></div>
                    </td>
                    </tr>
                   
                    <tr class="shade01">
                    <td width="214" align="left" valign="top">To</td>
                    <td width="875" align="left" valign="top">
                    <div class="formValidation">
                    <input type="text" name="email" id="email" class="textbox" style="width:200px;" tabindex="1" value="{$enquiryList[0]->email}" readonly="readonly"/>
                    </div>
                    </td>
                    </tr>
                    
                    <tr class="shade01">
                    <td width="214" align="left" valign="top">Subject</td>
                    <td width="875" align="left" valign="top">
                    <div class="formValidation">
                    <input type="text" name="subject" id="subject" class="textbox" style="width:200px;" tabindex="1" value="Re: {$enquiryList[0]->subject}" readonly="readonly"/>
                    </div>
                    </td>
                    </tr>
                   
                    <tr class="">
                    <td width="214" valign="top" align="left" ><div align="left"> Message </td>
                    <td  class="required" valign="top" align="left">
                    <div class="formValidation_large">
                    <div align="left">
                   
                   <textarea id="enquiry_content" name="enquiry_content">--On {$enquiryList[0]->datetime|date_format}, {$enquiryList[0]->email} wrote, <br />{$enquiryList[0]->enquiry_content} </textarea>
                    </div>
                    </div>
                    </td>
                    </tr>
                   
                    
                    <tr>
                    <td valign="top" align="left">&nbsp;</td>
                    <td valign="top" align="left">
                    <span class="btnlayout">
               
                    <input type="button" value="Send E-mail" id="btnSendMail" class="button" name="btnSendMail"/>
                    </span>
                    <span class="btnlayout ">
                       <input type="button" class="back" value="Cancel" name="text3" onclick="window.location.href='{$baseurl}admin/Enquiry/enquiry_lists';"/>
                    </span>
                    </td>
                    </tr>
                    
                    </tbody>
                </table>
            
            </form>
            
        </div>

                </div>
      
      </div>