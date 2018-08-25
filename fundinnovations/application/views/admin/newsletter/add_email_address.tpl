{literal} 
<script type="text/javascript">
 $(document).ready(function()
 {
  /* $("#news_title").change(validateNewsTitle);
  // $("#user_status").change(validateUserStatus);

   var resp='{/literal}{$resp}{literal}';	
	if(resp == '0') 
	{		
$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="error_response_msg" colspan=2 align=left ><span><font color=red>Mail Not send</font></span></td></tr>');	
	$("#common_message").slideUp(4000).delay(500);
	}
	
	if(resp == '1') 
	{		
$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span><font color=green>Mail sent Successfully</font></span></td></tr>');	
	$("#common_message").slideUp(4000).delay(300);
	}
 });
*/
//$('#sendNews').ajaxSubmit();
  var resp='{/literal}{$resp}{literal}';	
	if(resp == 'success') 
	{		
$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="error_response_msg" colspan=2 align=left ><span><font color=red>All Mail addresses have been stored</font></span></td></tr>');	
	$("#common_message").slideUp(4000).delay(500);
	}
});
(function($){
    jQuery.fn.ajaxSubmit =
        function() {
            $(this).submit(function(event) {
			   
                event.preventDefault();
                                      
                var data = $(this).serialize();
                var baseurl ='{/literal}{$baseurl}{literal}';
				var url = baseurl+'add_email_address'; 
				alert(baseurl);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: data,
                    enctype: 'multipart/form-data',
                    success: function(msg) {
                               alert(msg);
                             }
                       });

                 return false;
             });
         };
})(jQuery);
 /*
function validate_add_mailForm() {
    //alert('');
	var filename = $("#sendNews").serialize();
	$.ajax({ 
                type: "POST",
                url: "add_email_address_action",
                enctype: 'multipart/form-data',
                data:  filename,
                success: function(response){
                     alert(response);
					 return false;
                }
      }); 
	  return false;
/*   if(validateNewsTitle() )
   {
	  // alert('coming Soon');		   
	   document.sendNews.submit();
   }
}*/
	 
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
				
				
//function for validating status 
function validateUserStatus()
{
		$("#status_error").hide();	
		if($.trim($("#user_status").val())=='')
		{
		$("#user_status").after('<div class="clear"/><span class="error" id="status_error"><span>This field is required</span></span>');
		return false;
		}
		else
		{						
		$("#user_status").after('<div class="clear"/><span class="checked" id="status_error"><span></span></span>');
		return true;							
		}
}
	
</script> 
{/literal}
<div class="shadow_outer">
  <div class="shadow_inner" >
    <div class="table_listing font_segoe ">
      <form name="sendNews" id="sendNews" method="post" action="{$baseurl}admin/Cms/add_email_address_action" enctype='multipart/form-data'>
        <table width="100%" cellspacing="0" cellpadding="0" border="0" >
          <tbody>
            <tr>
              <th colspan="2" align="left"><h2 style="margin-left:5px;">Upload Email Addresses</h2></th>
            </tr>
            <tr id="field_header">
              <td valign="top" colspan="2" align="left" >Fields marked with <span class="color_r">*</span> are required</td>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="2"><div id="display"></div></td>
            </tr>
           
            
            <tr class="shade01">
              <td width="29%" align="left" valign="top">Upload CSV File <span class="color_r">*</span></td>
              <td width="71%" align="left" valign="top"><div class="formValidation">
                  <input type="file" name="add_email_address" id= "add_email_address" value="Upload"/>
                </div></td>
            </tr>
            <tr class="shade01"> 
              <!--<td width="29%" align="left" valign="top">Select Newsletter Title <span class="color_r">*</span> </td>-->
              <td width="100%" align="left" valign="top"  colspan="2">
             </td>
            </tr>
            <tr>
              <td valign="top" align="left">&nbsp;</td>
              <td valign="top" align="left"><span class="btnlayout">
                <input type="submit" value="Upload" id="newsSendbtn" class="button" name="newsSendbtn" />
                </span> <span class="btnlayout ">
                <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='{$baseurl}admin/Cms/news_letter';"/>
                </span></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>






