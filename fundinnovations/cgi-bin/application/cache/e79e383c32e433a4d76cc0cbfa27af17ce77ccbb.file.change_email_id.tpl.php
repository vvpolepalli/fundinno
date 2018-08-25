<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 06:43:16
         compiled from "/home/fundinno/public_html/application/views/admin/change_email_id.tpl" */ ?>
<?php /*%%SmartyHeaderCode:746244048515c23e416e0d4-46047501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e79e383c32e433a4d76cc0cbfa27af17ce77ccbb' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/change_email_id.tpl',
      1 => 1358849966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '746244048515c23e416e0d4-46047501',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'email_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c23e420a181_07858226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c23e420a181_07858226')) {function content_515c23e420a181_07858226($_smarty_tpl) {?> 
<script type="text/javascript">
 $(document).ready(function()
 {	
   var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'; 
   /*$("#current_password").blur(validatepassword);
   $("#new_password").blur(validatenewpassword); */
   $("#email_id").blur(validateEmail); 
   
   $('#btnUpdateEid').click(function()
   {	    
	   if(validateEmail())
	   {		       	   
		  //document.forms["change_pwd"].submit();
				$.ajax({
				type: 'POST',
				url: baseurl+"admin/login/change_email_id/",		
				data: 'email_id='+$.trim($("#email_id").val()),
				success:function(msg)
				{
					if(msg=='fail')
					{
						$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="error_response_msg" colspan=2 align=left ><span><font color=red>Failed</font></span></td></tr>');	
	                    $("#common_message").slideUp(2000).delay(500);					 
					}
					else
					{
						$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span><font color=green>Email id updated successfully</font></span></td></tr>');	
	                    $("#common_message").slideUp(2000).delay(300);
						window.location.href=baseurl+'admin/home/change_email_id';
						//$("#current_password").val('');
						//$("#new_password").val('');
						//$("#confirm_new_password").val('');
					}
				}
			});
	   }	   
   });
   
   
 });

 

				
				

				
				
//function for validating the email
				function validateEmail()
				{
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				$("#email_error").hide();	
				if($("#email_id").val()=='')
				{
				$("#email_id").after('<div class="clear"/><span class="error" id="email_error"><span>This field is required</span></span>');
				return false;
				}
				else if(!emailReg.test($("#email_id").val())) 
				{
				
				$("#email_id").after('<div class="clear"/><span class="error" id="email_error"><span>Enter valid Email Id</span></span>');
				return false;
				}
				
				else
				{
					$("#email_id").after('<div class="clear"/><span class="checked" id="email_error"><span></span></span>');
					return true;
				}
				}
	
</script> 

<div class="shadow_outer">
  <div class="shadow_inner" >
    <div class="table_listing font_segoe ">
      <form name="change_eid" id="change_eid" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/login/change_email_id" onsubmit="return validate_form();">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <th colspan="2" align="left"><h2 style="margin-left:5px;">Change email id</h2></th>
            </tr>
            <tr id="field_header">
              <td valign="top" colspan="2" align="left" >Fields marked with <span class="color_r">*</span> are required</td>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="2"><div id="display"></div></td>
            </tr>
            <tr class="shade01">
              <td width="25%"  align="left" valign="top">Email Id <span class="color_r">*</span></td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" name="email_id" id="email_id" class="styletxt40perc"  tabindex="1" value="<?php echo $_smarty_tpl->tpl_vars['email_id']->value;?>
"/>
                </div></td>
            </tr>
            <tr>
              <td valign="top" align="left">&nbsp;</td>
              <td valign="top" align="left"><span class="btnlayout">
                <input type="button" value="Update" id="btnUpdateEid" class="button" name="btnUpdateEid"/>
                </span> <span class="btnlayout ">
                <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/home';"/>
                </span></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<?php }} ?>