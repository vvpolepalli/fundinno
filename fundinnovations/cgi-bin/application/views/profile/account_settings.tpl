{literal}
<script type="text/javascript">
$(document).ready(function() {
	//$("#email_id").blur(validateEmail);
	$("#new_pass").blur(validatePass);
	$("#confirm_pass").blur(confirmPass);
	//$("#old_pass").blur(validateOldpass);
	var res='{/literal}{$update_account}{literal}';
	if(res == 'updated'){
		setTimeout(function(){
		$('.msgLi').hide();
		},3000);
	}
});
function open_passbox()
{
	//if($(ths).attr("checked") === true) 
	//{
		$("#pass_error").remove();
		$("#confirm_pass_error").remove();
		$("#old_pass_error").remove();
		$('#passbox').toggle();
	//} else {
		//$('#passbox').hide();
	//} 
}
function validate_form(){
	
	//if($('#change_password').attr("checked") === true) 
	//{
	if(validatePass() & confirmPass()){
			
		}
		else{
			return false;
		}
	//}
	//else{
			//return false;
		//}
}
//function for validating the email
function validateEmail()
{
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	$("#email_error").remove();	
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
function validatePassword(password) 
{   
	var passwordPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])./;    
	 return passwordPattern.test(password) ;
} 
function validatePass()
{
  
  $("#pass_error").remove();
  if($('#change_password').attr("checked") === false) {
		return true;
  }
  else{
  var invalid = " "; // Invalid character is a space
  var minLength = 6; // Minimum length
  var ck_password = /^[A-Za-z0-9!?@#$%^&*()_\s]{5,10}$/;
  
  var pwd=$("#new_pass").val();
  
  
  //alert(document.adduser.userPassword.value.length);
  if($("#new_pass").val()=='')
  {
  $("#new_pass").after('<span class="error" id="pass_error"><span>This field is required</span></span>');
  return false;
  }
  else if(pwd.length<5) 
  {
	  $("#new_pass").after('<span class="error" id="pass_error""><span>Must be 5 to 10 characters</span></span>');
	  return false;
  
  }
  else if(!ck_password.test($("#new_pass").val())) 
  {
  
  $("#new_pass").after('<span class="error" id="pass_error""><span>Enter valid Password.</span></span>');
  return false;
  
  }
  else
  {
  
  $("#new_pass").after('<span class="checked" id="pass_error"><span></span></span>');
  return true;
  
  }
  }
}
//function for validating confirm password and password match
function confirmPass()
{
	$("#confirm_pass_error").remove();
	//if($("#new_pass").val() ==''){
	if($('#change_password').attr("checked") === false) {
		return true;
	}
	else{
	if($("#confirm_pass").val()=='')
	{
	
	$("#confirm_pass").after('<span class="error" id="confirm_pass_error"><span>Confirm the Password</span></span>');
	return false;
	
	}
	else if($("#confirm_pass").val() != $("#new_pass").val())
	{
	
	$("#confirm_pass").after('<span class="error" id="confirm_pass_error"><span>Password mismatch</span></span>');
	return false;
	
	}
	
	else 
	{
	
	$("#confirm_pass").after('<span class="checked" id="confirm_pass_error"><span></span></span>');
	return true;
	
	}
	}

}
function validateOldpass(){
	
	$("#old_pass_error").remove();
	//if($("#new_pass").val() ==''){
	if($('#change_password').attr("checked") === false) {
		return true;
	}
	else
	{
		if($("#old_pass").val()=='')
		{
		
		$("#old_pass").after('<span class="error" id="old_pass_error"><span>This field is required</span></span>');
		return false;
		
		}
		else 
		{
			return true;
			//var old_pass=$("#old_pass").val();
			//$
		}
	}
	
	
}
function close_pop(id){
	 $('#'+id).hide();
	 $('#pop_cntnt').empty();
 	}
</script>
{/literal}
<section class="innerMidWrap funding_EditP">
  <div class="innerMidContent">
  {if $update_account eq 'updated'}
         <div class="msgLi">
         <div class="mini-success">Your password successfully updated.</div>
         </div>
      {/if} 
    <div class="funding_tabEditP">
      <ul class="fundTab">
        <li><a  href="{$baseurl}user/edit_profile">Edit profile<span class="arrow"></span></a></li>
        <li><a class="active" href="{$baseurl}user/account_settings" >Account Settings<span class="arrow"></span></a></li>
        <li><a href="{$baseurl}user/my_notifications" >My Notifications<span class="arrow"></span></a></li>
        
      </ul>
      
      
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div id="ajx_load_cntnt">
      <div class="prodeForm">
        <h5>Acount Settings</h5>
        <form id="frm_edit_setting" name="frm_edit_setting" method="post" action="{$baseurl}user/account_settings" onsubmit="return validate_form();">
        <ul class="left">
        <span id="error_msg" class="message_validation" style="color:#C00">{$error}</span>
        <ul>
          <li class="fieldTxP">
            <label>Email </label>
            <input type="text"  id="email_id" name="email_id" class="textBoxStyle" value="{$email_id}" disabled="disabled">
          </li>
          <li class="fieldTxP">
            <label>Password </label>
           <!-- <input type="checkbox" id="change_password" name="change_password" onclick="open_passbox(this)" value="change_pass" />-->
            <a href="javascript:void(0);" onclick="open_passbox()" >Change Password </a>
          </li>
           </ul>
        <ul  id="passbox" style="display:none">
          <!--<li>
            <label>Old Password </label>
            <input type="password" id="old_pass" name="old_pass" class="textBoxStyle" autocomplete="off" value="">
          </li>-->
          <li class="fieldTxP">
            <label>New Password </label>
            <input type="password" id="new_pass" name="new_pass" class="textBoxStyle" autocomplete="off" value="">
          </li>
          <li class="fieldTxP">
            <label>Confirm Password </label>
            <input type="password" id="confirm_pass" name="confirm_pass" class="textBoxStyle" autocomplete="off" value="">
          </li>
           <li class="blueBtnLi">
              <input type="submit" class="blueBtn" id="save" name="save"  value="Save">
            </li>
        </ul>
        </ul>
         <div class="clear"></div>
        <!--<div class="submitPane">
          <ul>
            <li class="blueBtnLi">
              <input type="submit" class="blueBtn" id="save" name="save"  value="Save">
            </li>
          </ul>
        </div>-->
        </form>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>



