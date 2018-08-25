<?php /* Smarty version Smarty-3.1.8, created on 2013-01-22 15:50:13
         compiled from "/var/www/fundinnovations/application/views/admin/change_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132263822507663f3c560e1-72989845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be6439a99b1d4ecb045da4e3ae2218a5a7500df3' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/change_password.tpl',
      1 => 1358850012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132263822507663f3c560e1-72989845',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_507663f3c9c0a3_14941751',
  'variables' => 
  array (
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507663f3c9c0a3_14941751')) {function content_507663f3c9c0a3_14941751($_smarty_tpl) {?>
<script type="text/javascript">
 $(document).ready(function()
 {	
   var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'; 
   $("#current_password").blur(validatepassword);
   $("#new_password").blur(validatenewpassword); 
   $("#confirm_new_password").blur(validateconfirmnewpassword); 
   
   $('#btnAddpwd').click(function()
   {	    
	   if(validatepassword() & validatenewpassword() & validateconfirmnewpassword())
	   {		       	   
		  //document.forms["change_pwd"].submit();
				$.ajax({
				type: 'POST',
				url: baseurl+"admin/login/change_user_password/",		
				data: 'current_password='+$.trim($("#current_password").val())+'&new_password='+$.trim($("#new_password").val()),
				success:function(msg)
				{
					if(msg=='fail')
					{
						$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="error_response_msg" colspan=2 align=left ><span><font color=red>Current password is wrong</font></span></td></tr>');	
	                    $("#common_message").slideUp(2000).delay(500);					 
					}
					else
					{
						$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span><font color=green>Password Updated Successfully</font></span></td></tr>');	
	                    $("#common_message").slideUp(2000).delay(300);
						$("#current_password").val('');
						$("#new_password").val('');
						$("#confirm_new_password").val('');
					}
				}
			});
	   }	   
   });
   
   
 });

 
	 
//function for validating password
	function validatepassword()
				{
						
						$("#tag_error").hide();	
						if($.trim($("#current_password").val())=='')
						{
						$("#current_password").after('<div class="clear"/><span class="error" id="tag_error"><span>This field is required</span></span>');
						return false;
						}
						else
						{
						
						$("#current_password").after('<div class="clear"/><span class="checked" id="tag_error"><span></span></span>');
						return true;						
						
						}
				}
				
				
//function for validating newpassword 
	function validatenewpassword()
				{
						
						$("#tag_error1").hide();	
						if($.trim($("#new_password").val())=='')
						{
						$("#new_password").after('<div class="clear"/><span class="error" id="tag_error1"><span>This field is required</span></span>');
						return false;
						}
						else
						{						
						$("#new_password").after('<div class="clear"/><span class="checked" id="tag_error1"><span></span></span>');
						return true;							
						}
				}	
				
				function validateconfirmnewpassword()
				{
						
						$("#tag_error2").hide();	
						if($.trim($("#confirm_new_password").val())=='')
						{
						$("#confirm_new_password").after('<div class="clear"/><span class="error" id="tag_error2"><span>This field is required</span></span>');
						return false;
						}
						
						else if($.trim($("#confirm_new_password").val())!=$.trim($("#new_password").val()))
						{
						$("#confirm_new_password").after('<div class="clear"/><span class="error" id="tag_error2"><span>New password and confirm new password should be same</span></span>');
						$("#tag_error1").hide();	
						$("#new_password").after('<div class="clear"/><span class="error" id="tag_error1"><span>New password and confirm new password should be same</span></span>');
						return false;
						}
						
						else
						{						
						$("#confirm_new_password").after('<div class="clear"/><span class="checked" id="tag_error2"><span></span></span>');
						$("#new_password").after('<div class="clear"/><span class="checked" id="tag_error1"><span></span></span>');
						return true;							
						}
				}			
		

	
</script>



<div class="shadow_outer">
        <div class="shadow_inner" >  
        <div class="table_listing font_segoe ">
            <form name="change_pwd" id="change_pwd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/login/change_user_password" onsubmit="return validate_form();">
           
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                    <th colspan="2" align="left"><h2 style="margin-left:5px;">Change Password</h2></th>
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
                    <td width="25%" align="left" valign="top">Current Password <span class="color_r">*</span> </td>
                    <td  align="left" valign="top">
                    <div class="formValidation">
                    <input type="password" name="current_password" id="current_password" class="styletxt40perc"  tabindex="1" value=""/>
                    </div>
                    </td>
                    </tr>
                     <tr >
                    <td  align="left" valign="top">New Password <span class="color_r">*</span> </td>
                    <td  align="left" valign="top">
                    <div class="formValidation">
                    <input type="password" name="new_password" id="new_password" class="styletxt40perc" tabindex="1" value=""/>
                    </div>
                    </td>
                    </tr>
                     <tr class="shade01">
                    <td  align="left" valign="top">Confirm New Password <span class="color_r">*</span> </td>
                    <td  align="left" valign="top">
                    <div class="formValidation">
                    <input type="password" name="confirm_new_password" id="confirm_new_password" class="styletxt40perc"  tabindex="1" value=""/>
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td valign="top" align="left">&nbsp;</td>
                    <td valign="top" align="left">
                    <span class="btnlayout">
               
                    <input type="button" value="Save" id="btnAddpwd" class="button" name="btnAddPropertyType"/>
                    </span>
                    <span class="btnlayout ">
                       <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home';"/>
                    </span>
                    </td>
                    </tr>
                    
                    </tbody>
                </table>
            
            </form>
            
        </div>

                </div>
      
      </div><?php }} ?>