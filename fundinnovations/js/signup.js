function getCities(stid, baseurl)
{
	 $.ajax({
			type: "POST",
			url: baseurl+"signup/get_cities/"+stid,  
			data: "", 
			success: function(msg){
				document.getElementById('city_load').innerHTML=msg;
				validateCity();
			}
		});
}

function getCityBox(val) {
	validateCity();
	if(val=='other') {
		document.getElementById('city_load').innerHTML='<input name="city" id="city" type="text" class="width200" />';
		validateCity();
		$('#city').keyup(validateCity);
	}
}

	

function sign_up(baseurl) {
	//alert(validateUserName());
	if( validateEmailId() & validateUName() & validatePass() & confirmPass()) {
		$('#signup').attr('disabled', 'disabled' );
		$.when(validateDupEmailId()).done(function(a1){
		if(a1==0){
		$("#emailid_error").remove();
		validate_registration1(baseurl);
		}else{
			$('#signup').removeAttr('disabled');
		return false;	
		}
		});
	}
	else {
		return false;	
	}
}

function validate_registration1(baseurl) {
	$('#captcha_error').html('');
if( validateUName() &  validatePass() & confirmPass()) {
			
			var name		= $("#u_name").val();
			var email_id	= $("#email_id").val();
			var userPassword= $("#paswrd").val();
			var captcha_code=$("#captcha_code").val();
			/*var profImag	= $("#profile_img").val();*/
			var fb_userid	= $("#fb_userid").val();
			var fb_profile_link	= $("#fb_profile_link").val();
			//var userStatus 	= '1';
			//alert('p');
			
			var data={name:name,userPassword:userPassword,email_id:email_id,captcha_code:captcha_code}
			$.ajax({		
				type: "POST",
				url: baseurl+"home/user_registration", 
				data:data,
				success: function(msg){
					//alert(msg);
					if(msg!=1)
					{ 
						$('#captcha_error').html('');
						
						//$('#response_popup').show();
						window.location.href=baseurl+"signup_response"
						//setTimeout('hideResponseMsgSuccess(\''+baseurl+'\',"signin");', 5000);
					}
					else{
						$('#signup').removeAttr('disabled');
						new_captcha(baseurl);
						$("#captcha_error").html('<span class="error" id="captcha_error"><span>Security code is incorrect.</span></span>');		
					}
				}
		   
			});
		} else {
			return false;	
		}	
}

// updating user

function myacoount_updation(baseurl) {
	if(validateFirstName() & validateLastName() & validateUserType() & validateAddress1() & validateState() & validateCity() & validateZip() & validateMobNo() & validateResNo() & validateOfficeNo()) {
		var firstName	= $("#firstName").val();
		var lastName	= $("#lastName").val();
		var state 		= $("#state").val();
		var city		= $("#city").val();	
		var zip			= $("#zip").val();	
		var mob_no		= $("#mob_no").val();	
		var resi_no		= $("#resi_no").val();	
		var office_no	= $("#office_no").val();
		var address1	= $("#address1").val();	
		var address2	= $("#address2").val();	
		var userType	= $("#user_type").val();	
		var profImag	= $("#profile_img").val();
	
		$.ajax({		
			type: "POST",
			url: baseurl+"signup/update_siteuser", 
			data:"firstName="+firstName+"&lastName="+lastName+"&city="+city+"&state="+state+"&zip="+zip+"&mob_no="+mob_no+"&resi_no="+resi_no+"&office_no="+office_no+"&address1="+address1+"&address2="+address2+"&userType="+userType+"&profile_img="+profImag,
			success: function(msg){
				if(msg)
				{ 
					 $("#display_msg").html('<div id="common_message" class="success-message">'+msg+'</div>'); 
					 $('#common_message').show();
					 setTimeout('hideResponseMsgSuccess(\''+baseurl+'\',"signup/my_account");', 4500);
				}
			}
	   
		});
	}
	else {
		return false;	
	}
	
}


// Updating user



function hideResponseMsgSuccess(baseurl, path)
{
	$("#common_message").hide();
	setTimeout(window.location.href=baseurl+path,6000);
}

function hideResponseMsg()
{
	$("#common_message").hide();
	
}

function ValidateString(str){    
    re = /^[A-Za-z ]+$/;
    if(re.test(str))
    {
	   return true;
    }
    else
    {
	   return false;
    }
}




//function for validating First Name
function validateUName()
{
	$("#firstname_error").remove();	
	//alert($("#u_name").val());
	if($.trim($("#u_name").val())=='')
	{
	$("#u_name").after('<span class="error" id="firstname_error"><span>This field is required</span></span>');
	return false;
	}
	else if(ValidateString($("#u_name").val())==false)
	{
		$("#u_name").after('<span class="error" id="firstname_error"><span>Characters Only</span></span>');
		return false;	
	}
	else
	{
	
		//$("#name").after('<div class="clear"/><span class="checked" id="firstname_error"><span></span></span>');
		return true;
	}
}

function validateCode()
{
		$('#captcha_error').html('');
	var baseurl = $('#hid_baseurl').val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	//$("#captcha_error").hide();	
	if($("#captcha_code").val()=='')
	{
		$("#captcha_code").html('<span class="error" id="captcha_error"><span>This field is required</span></span>');
		return false;
	}
	else if($("#captcha_code").val()!=='')
	{
		var captcha_code = $("#captcha_code").val();
		$.ajax({
		type: "POST",
		url: baseurl+"home/check_captcha_code",  
		data: "captcha_code="+captcha_code, 
		success: function(msg){
			if(msg==1)
			{
				$("#captcha_code").html('<span class="error" id="captcha_error"><span>Security code is incorrect.</span></span>');		
				return false;
			}
			else
			{$('#captcha_error').html('');
				return true;
				//$("#email_id").after('<span class="checked" id="username_error"><span></span></span>');
			}
		}
		});
	}
	else
	{
		$('#captcha_error').html('');
		return true;
		//$("#email_id").after('<span class="checked" id="emailid_error"><span></span></span>');
	}
}
function validateEmailId(){
	$('#emailid_error').remove();
	var baseurl = $('#hid_baseurl').val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	//$("#emailid_error").hide();	
	if($.trim($("#email_id").val())=='')
	{
		$("#email_id").after('<span class="error" id="emailid_error"><span>This field is required</span></span>');
		return false;
	}
	else if(!emailReg.test($("#email_id").val())) 
	{
		$("#email_id").after('<span class="error" id="emailid_error"><span>Enter valid Email Id</span></span>');
		return false;
	}
	else{
		$('#emailid_error').remove();
		return true;
	}
}
function validateDupEmailId()
{
		$('#emailid_error').remove();
	var baseurl = $('#hid_baseurl').val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	//$("#emailid_error").hide();	
	if($.trim($("#email_id").val())=='')
	{
		$("#email_id").after('<span class="error" id="emailid_error"><span>This field is required</span></span>');
		return 1;
	}
	else if(!emailReg.test($("#email_id").val())) 
	{
		$("#email_id").after('<span class="error" id="emailid_error"><span>Enter valid Email Id</span></span>');
		return 1;
	}
	else if($("#email_id").val()!=='')
	{
		var email_id = $("#email_id").val();
		return $.ajax({
		type: "POST",
		url: baseurl+"home/check_already_registered/",  
		data: "email_id="+email_id, 
		success: function(msg){
			if(msg==1)
			{
				$("#email_id").after('<span class="error" id="emailid_error"><span>User Already Exist</span></span>');		
				//return false;
			}
			else
			{
				$('#emailid_error').remove();
				//return true;
				//$("#email_id").after('<span class="checked" id="username_error"><span></span></span>');
			}
		}
		});
	}
	else
	{
		$('#emailid_error').remove();
		return 0;
		//$("#email_id").after('<span class="checked" id="emailid_error"><span></span></span>');
	}
	//var span_check = $('#emailid_error').attr('class');
	//if(span_check=='error') {
		//return false;
	//}
	//else {
	//	return true;
	//}
}
//function for validating the email
function validateUserEmail()
{
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	$("#email_error").remove();	
	if($("#userName").val()=='')
	{
		$("#userName").after('<div class="clear"/><span class="error" id="email_error"><span>This field is required</span></span>');
		return false;
	}
	else if(!emailReg.test($("#userName").val())) 
	{
		$("#userName").after('<div class="clear"/><span class="error" id="email_error"><span>Enter valid Email Id</span></span>');
		return false;
	}
	else
	{
		$("#userName").after('<div class="clear"/><span class="checked" id="email_error"><span></span></span>');
		return true;
	}
}

function validatePass()
{

	$("#pass_error").remove();
	var invalid = " "; // Invalid character is a space
	var minLength = 6; // Minimum length
	var ck_password = /^[A-Za-z0-9!?@#$%^&*()_\s]{5,}$/;
	
	var pwd=$("#paswrd").val();
	
	if($("#paswrd").val()=='')
	{
		
		$("#paswrd").after('<span class="error" id="pass_error"><span>This field is required</span></span>');
		return false;
	}
	else if(pwd.length<5) 
	{
		$("#paswrd").after('<span class="error" id="pass_error"><span>It should be atleast 5 letters.</span></span>');
		return false;
	
	}
	else if(!$("#paswrd").val().match(ck_password)) 
	{	
		$("#paswrd").after('<span class="error" id="pass_error"><span>Enter valid Password.</span></span>');
		return false;
	
	
	}else
	{
		//$("#pass_error").remove();
		return true;
	}
}

//function for validating confirm password and password match
function confirmPass()
{
	$("#confirm_pass_error").remove();


	if($("#confirm_pass").val().length==0)
	{
	
	$("#confirm_pass").after('<span class="error" id="confirm_pass_error"><span>Confirm Password</span></span>');
	return false;
	
	}
	else if($("#paswrd").val() != $("#confirm_pass").val())
	{
	
	$("#confirm_pass").after('<span class="error" id="confirm_pass_error"><span>Password mismatch</span></span>');
	return false;
	
	}
	
	else 
	{
	
	//$("#confirm_pass_error").remove();
	return true;
	
	}
}
//function for validating user type
function validateUserType()
{

	$("#usertype_error").hide();	
	if($("#user_type").val()=='')
	{
	$("#user_type").after('<div class="clear"/><span class="error" id="usertype_error"><span>This field is required</span></span>');
	return false;
	}
	else
	{
		$("#user_type").after('<div class="clear"/><span class="checked" id="usertype_error"><span></span></span>');
		return true;
	}
}

function IsNumeric(strString)
{
   var strValidChars = "0123456789";
   var strChar;
   var blnResult = true;
   if (strString.length == 0) return false;

   for (i = 0; i < strString.length && blnResult == true; i++)
	  {
	  strChar = strString.charAt(i);
	  if (strValidChars.indexOf(strChar) == -1)
			{
			 blnResult = false;
			}
	  }
   return blnResult;
}

// function to chnage password for user

function change_password(baseurl) {
	if(validateCurrPass() & validateNewPass() & validateconfirmPass()) {
		var curr_psw 	= $("#curr_psw").val();
		var new_psw		= $("#new_pass").val();
		
		$.ajax({		
			type: "POST",
			url: baseurl+"signup/change_user_password", 
			data:"curr_psw="+curr_psw+"&new_psw="+new_psw,
			success: function(msg){
				
				if(msg ==1)
				{ 
					 $("#display_msg").html('<div id="common_message" class="success-message">Password changed successfully</div>');
					 $('#common_message').show(); 
					 setTimeout('hideResponseMsgSuccess(\''+baseurl+'\',"signup/my_account");', 4500); 
					 
				} else {
					 $("#display_msg").html('<div id="common_message" class="error-message">Invalid Current password</div>');
					 $('#common_message').show();
					 setTimeout("hideResponseMsg();", 4500); 
				}
			}
	   
		});
	}
		
}



function validateCurrPass()
{

	$("#pass_error").hide();
	var invalid = " "; // Invalid character is a space
	var minLength = 6; // Minimum length
	var ck_password = /^[A-Za-z0-9!@#$%^&*()_]{5,10}$/;
	
	var pwd=$("#curr_psw").val();
	
	
	//alert(document.adduser.userPassword.value.length);
	if($("#curr_psw").val()=='')
	{
		$("#curr_psw").after('<div class="clear"/><span class="error" id="pass_error"><span>This field is required</span></span>');
		return false;
	}
	else if(pwd.length<5) 
	{
		$("#curr_psw").after('<div class="clear"/><span class="error" id="pass_error" style="width:116px;"><span>Password should be mimum 5 letters.</span></span>');
		return false;
	
	}
	else if(!ck_password.test($("#curr_psw").val())) 
	{
		$("#curr_psw").after('<div class="clear"/><span class="error" id="pass_error" style="width:116px;"><span>Enter valid Password.</span></span>');
		return false;
	
	}
	else
	{
		$("#curr_psw").after('<div class="clear"/><span class="checked" id="pass_error"><span></span></span>');
		return true;
	}
}
function validateNewPass()
{

	$("#newpass_error").hide();
	var invalid = " "; // Invalid character is a space
	var minLength = 6; // Minimum length
	var ck_password = /^[A-Za-z0-9!@#$%^&*()_]{5,10}$/;
	
	var pwd=$("#new_pass").val();
	
	
	//alert(document.adduser.userPassword.value.length);
	if($("#new_pass").val()=='')
	{
		$("#new_pass").after('<div class="clear"/><span class="error" id="newpass_error"><span>This field is required</span></span>');
		return false;
	}
	else if(pwd.length <5)
	{
		$("#new_pass").after('<div class="clear"/><span class="error" id="newpass_error" style="width:116px;"><span>Password should be mimum 5 letters.</span></span>');
		return false;
	
	}
	else if(!ck_password.test($("#curr_psw").val())) 
	{
		$("#new_pass").after('<div class="clear"/><span class="error" id="newpass_error" style="width:116px;"><span>Enter valid Password.</span></span>');
		return false;
	
	}
	
	else
	{
		$("#new_pass").after('<div class="clear"/><span class="checked" id="newpass_error"><span></span></span>');
		return true;
	}
}

//function for validating confirm password and password match
function validateconfirmPass()
{
	$("#confirm_pass_error").hide();

	if($("#cnf_new_pasw").val()==0)
	{
	
	$("#cnf_new_pasw").after('<div class="clear"/><span class="error" id="confirm_pass_error"><span>Confirm Password</span></span>');
	return false;
	
	}
	else if($("#new_pass").val() != $("#cnf_new_pasw").val())
	{
		$("#newpass_error").hide();
		$("#new_pass").after('<div class="clear"/><span class="error" id="newpass_error" style="width:240px;"><span>Mismatch New password and Confirm Password</span></span>');
		$("#cnf_new_pasw").after('<div class="clear"/><span class="error" id="confirm_pass_error" style="width:240px;"><span>Mismatch New password and Confirm Password</span></span>');
		return false;
	
	}
	
	else 
	{
	
		$("#cnf_new_pasw").after('<div class="clear"/><span class="checked" id="confirm_pass_error"><span></span></span>');
		return true;
	
	}
}
