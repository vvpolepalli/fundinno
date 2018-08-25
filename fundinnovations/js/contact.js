function feedback_form(baseurl) {
	if(validateName() & validatePhone() & validateFormEmail() & validateMessage()) {
		var name 	= $("#feed_name").val();
		var phone	= $("#feed_phone").val();
		var email	= $("#feed_email").val();
		var message	= $("#feed_msg").val();
		var message = message.replace(/\n/g, "<br />");
		$.ajax({
			type: 'POST',
			url: baseurl+"contact/send_feedback_mail/",		
			data: 'name='+name+"&phone="+phone+"&email="+email+"&message="+message,
			success:function(msg)
			{		
			
				if(msg=='success')
				{
					$("#feed_name").val('');
					$("#feed_phone").val('');
					$("#feed_email").val('');
					$("#feed_msg").val('');
					 $('#error_msg').removeAttr('class');
					 $('#error_msg').addClass('success-message');
					 $('#error_msg').html('Feedback sent successfully.');
					 setTimeout('hideResponseMsgSuccess(\''+baseurl+'\',"contact/feedback");', 4500);
				}
				else
				{
					$('#error_msg').removeAttr('class');
					$('#error_msg').addClass('error-message');
				  	$('#error_msg').html("Feedback not send.");	
					setTimeout("hideResponseMsg();", 4500);			  
				}
			}
		});
	}
}

function contact_us_form(baseurl) {
	
	if(validateName() & validatePhone() & validateFormEmail() & validateEnquiry() & validateMessage() ) {
		
		var name 	= $("#feed_name").val();
		var phone	= $("#feed_phone").val();
		var email	= $("#feed_email").val();
		var enquiry	= $("#feed_enquiry").val();
		var message	= $("#feed_msg").val();
		var message = message.replace(/\n/g, "<br />");
		$.ajax({
			type: 'POST',
			url: baseurl+"contact/send_contactus_mail/",		
			data: 'name='+name+"&phone="+phone+"&email="+email+"&enquiry="+enquiry+"&message="+message,
			success:function(msg)
			{		
			
				if(msg=='success')
				{
					$("#feed_name").val('');
					$("#feed_phone").val('');
					$("#feed_email").val('');
					$("#feed_enquiry").val('');
					$("#feed_msg").val('');
					
					 $('#error_msg').removeAttr('class');
					 $('#error_msg').addClass('success-message');
					 $('#error_msg').html('Mail sent successfully, estateace team will contact you soon.');
					 setTimeout('hideResponseMsgSuccess(\''+baseurl+'\',"contact");', 4500);
					
				}
				else
				{
					$('#error_msg').removeAttr('class');
					$('#error_msg').addClass('error-message');	
				  	$('#error_msg').html("Contact form not send.");
					setTimeout("hideResponseMsg();", 4500);			  
				}
			}
		});
	} else {
		return false;	
	}
}
function hideResponseMsgSuccess(baseurl, path)
{
	$("#error_msg").slideToggle();
	setTimeout(window.location.href=baseurl+path,6000);
}
function hideResponseMsg()
{
	$("#error_msg").slideToggle();
	
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

function validateName()
{
	
	$("#feedname_error").hide();	
	if($("#feed_name").val()=='')
	{
	$("#feed_name").after('<div class="clear"/><span class="error" id="feedname_error"><span>This field is required</span></span>');
	return false;
	}
	else if(ValidateString($("#feed_name").val())==false)
	{
		$("#feed_name").after('<div class="clear"/><span class="error" id="feedname_error"><span>Characters Only</span></span>');
		return false;	
	}
	else
	{
	
		$("#feed_name").after('<div class="clear"/><span class="checked" id="feedname_error"><span></span></span>');
		return true;
	}
}

//function for validating Mob number
function validatePhone()
{
	$("#phoneno_error").hide();	
	if($("#feed_phone").val()=='')
	{
		$("#feed_phone").after('<div class="clear"/><span class="error" id="phoneno_error"><span>This field is required</span></span>');
		return false;
	}
	else if(IsNumeric($("#feed_phone").val())==false)
	{
		$("#feed_phone").after('<div class="clear"/><span class="error" id="phoneno_error"><span>Numeric Values only</span></span>');
		return false;	
	}
	else if($("#feed_phone").val().length <10) {
		$("#feed_phone").after('<div class="clear"/><span class="error" id="phoneno_error"><span>Enter Valid One</span></span>');
		return false;
	}
	else
	{
		$("#feed_phone").after('<div class="clear"/><span class="checked" id="phoneno_error"><span></span></span>');
		return true;
	}
}
//function for validating the email
function validateFormEmail()
{
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	$("#feedemail_error").hide();	
	if($("#feed_email").val()=='')
	{
		$("#feed_email").after('<div class="clear"/><span class="error" id="feedemail_error"><span>This field is required</span></span>');
		return false;
	}
	else if(!emailReg.test($("#feed_email").val())) 
	{
		$("#feed_email").after('<div class="clear"/><span class="error" id="feedemail_error"><span>Enter valid Email Id</span></span>');
		return false;
	}
	else
	{
		$("#feed_email").after('<div class="clear"/><span class="checked" id="feedemail_error"><span></span></span>');
		return true;
	}
}

//function for validating message
function validateMessage()
{

	$("#feed_msg_error").hide();	
	if($("#feed_msg").val()=='')
	{
	$("#feed_msg").after('<div class="clear"/><span class="error" id="feed_msg_error"><span>This field is required</span></span>');
	return false;
	}
	else
	{
		$("#feed_msg").after('<div class="clear"/><span class="checked" id="feed_msg_error"><span></span></span>');
		return true;
	}
}

//function for validating message
function validateEnquiry()
{

	$("#feed_enq_error").hide();	
	if($("#feed_enquiry").val()=='')
	{
	$("#feed_enquiry").after('<div class="clear"/><span class="error" id="feed_enq_error"><span>This field is required</span></span>');
	return false;
	}
	else
	{
		$("#feed_enquiry").after('<div class="clear"/><span class="checked" id="feed_enq_error"><span></span></span>');
		return true;
	}
}