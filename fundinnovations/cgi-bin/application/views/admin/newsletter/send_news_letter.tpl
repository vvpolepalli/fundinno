{literal} 
<script type="text/javascript">
 $(document).ready(function()
 {
   $("#news_title").change(validateNewsTitle);
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

function validate_newsSendForm() {
	
   if(validateNewsTitle() )
   {
	  // alert('coming Soon');		   
	   document.sendNews.submit();
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
      <form name="sendNews" id="sendNews" method="post" action="{$baseurl}admin/Cms/send_news_letter_action" onsubmit="return validate_newsSendForm();">
        <table width="100%" cellspacing="0" cellpadding="0" border="0" >
          <tbody>
            <tr>
              <th colspan="2" align="left"><h2 style="margin-left:5px;">Send News Letter</h2></th>
            </tr>
            <tr id="field_header">
              <td valign="top" colspan="2" align="left" >Fields marked with <span class="color_r">*</span> are required</td>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="2"><div id="display"></div></td>
            </tr>
           
            
            <tr class="shade01">
              <td width="29%" align="left" valign="top">Select Newsletter Title <span class="color_r">*</span></td>
              <td width="71%" align="left" valign="top"><div class="formValidation">
                  <select name="news_title" id="news_title" class="user_select" style="width:300px !important;"/>
                  
                  <option value="">Please choose the news letter</option>
                  {foreach from=$sel_news key=k item=nl }
                  <option value="{$nl->news_id}" >{$nl->news_title}</option>
                  {/foreach}
                  </select>
                </div></td>
            </tr>
            <tr> 
              <!-- <td width="282" valign="top" align="left" >Select status <span class="color_r">*</span> </td>-->
              <td  valign="top" align="left" colspan="2"><div class="formValidation_large">
                  <input type="checkbox" id="include_project_title" name="include_project_title" value="true" />
                  <span> Include project title.</span> 
                  <!--<select name="user_status" id="user_status" class="user_select" style="width:300px !important;"/>
                    <option value="">Please choose the status</option>
                    <option value="all">All</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                    <option value="2">Blocked</option>
                    </select>--> 
                  
                </div></td>
            </tr>
            <tr class="shade01"> 
              <!--<td width="29%" align="left" valign="top">Select Newsletter Title <span class="color_r">*</span> </td>-->
              <td width="100%" align="left" valign="top"  colspan="2">
              <div><table>
                  {assign var="cnt" value="6"}
                  {assign var="i" value="0"}
                  
                  {if $cnt % 4 eq 0}
                  {assign var="n_r" value=($cnt/4)}
                  {else}
                  {assign var="n_r" value=($cnt/4)|ceil}
                  {/if} 
                  <!--<pre>{$sel_news|print_r}</pre>--> 
                  
                  {foreach from=$projects item=n key=k}
                  {if $i eq 0}
                  <tr> {/if}
                    <td><input  type="checkbox" name="chk_group[]" value="{$n->id}" />
                      {$n->project_title}</td>
                    {assign var="i" value=$i+1}
                    {if $i gte 4} </tr>
                  {assign var="i" value=0}
                  {/if}
                  
                  {/foreach} 
                  <!--<tr>
                    <td> <input  type="checkbox" name="chk_group[]" value="5" />  Project 1</td>
                    <td><input  type="checkbox" name="chk_group[]" value="6" />  Project 2</td>
                    <td><input  type="checkbox" name="chk_group[]" value="7" />  Project 3</td>
                    <td></td>
                  </tr>-->
                  
                </table></div></td>
            </tr>
            <tr>
              <td valign="top" align="left">&nbsp;</td>
              <td valign="top" align="left"><span class="btnlayout">
                <input type="button" value="Send" id="newsSendbtn" class="button" name="newsSendbtn" onClick="return validate_newsSendForm();" />
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
