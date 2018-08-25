<script type="text/javascript" src="{$baseurl}js/pirobox_extended.js"></script>

{literal}

<script type="text/javascript">
$(document).ready(function(){
	$("#name").blur(validate_name);
	$("#email_id").blur(validate_email);
	$("#cnt_message").blur(validate_msg);
	var message='{/literal}{$message}{literal}';
	if(message =='success'){
	$("#msg").show();
	$("#msg").html('Your message sent successfully.');
	 setTimeout(function() { $("#msg").hide();
	 }, 2500); 
	}
});
function validate(){
	
		$("#email_error").html('');	
		$("#email_error").hide();
		$("#name_error").html('');
		$("#name_error").hide();
		$("#msg_error").html('');
		$("#msg_error").hide();
		if(validate_name() & validate_email() & validate_msg() )
		{
		//alert('h')
		}else{
			return false;
		}
		
}
function validate_name(){
	
	if($.trim($("#name").val())=='') 
		{
			$("#name_error").show();
			$("#name_error").html('<span>Please enter name.</span>');
			return false;
		}
		else if(ValidateStringFooter($.trim($("#name").val()))==false)
		{
			$("#name_error").show();
			$("#name_error").html('<span>Characters Only.</span>');
			//$("#u_name").after('<span class="error" id="firstname_error"><span>Characters Only</span></span>');
			return false;	
		}
		else 
		{
			$("#name_error").hide();
			$("#name_error").html('');
			return true;
		}
	}
function validate_email(){
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if($("#email_id").val()=='')
		{
			$("#email_error").show();
			$("#email_error").html('<span>Please enter email id.</span>');
		//$("#to_emailid").after('<div class="clear"/><span class="error" id="email_error"><span>This field is required</span></span>');
		return false;
		}
		else if(!emailReg.test($("#email_id").val())) 
		{
			$("#email_error").show();
			$("#email_error").html('<span>Please enter valid email id.</span>');
			return false;
		
		}
		else{
			$("#email_error").hide();
			$("#email_error").html('');	
			return true;
		}
	}
function validate_msg(){
	if($.trim($("#cnt_message").val())=='')
		{
			$("#msg_error").show();
			$("#msg_error").html('<span>Please enter message.</span>');
			return false;
		}
		else 
		{
			$("#msg_error").hide();
			$("#msg_error").html('');
			return true;
		}
}
</script> 
{/literal}
<section class="innerMidWrap">
	 <div class="contentBlock">
         <h5 class="contactMsBlk">Contact Us <span id="msg" class="mini-success" style="display:none;"></span></h5>
          
       <form id="frm_contact" name="frm_contact" action="{$baseurl}contact_us" onSubmit="return validate()" method="post" > 
      
			<ul class="frm_contact" style="float:left;width: 532px;border-right:1px solid #ccc;">
				<li class="fieldTxP">
					<label>Name *</label>
					<input type="text"  id="name" name="name" class="textBoxStyle" value="">
                    <span class="error"  id="name_error" style="display:none">{$name_error}</span>
				</li>
				<li class="fieldTxP">
					<label>Email Address  *</label>
					<input type="text" id="email_id" name="email_id" class="textBoxStyle" value="">
                    <span class="error" id="email_error"  style="display:none">{$email_error}</span>
				</li>
				<li class="fieldTxP">
					<label>Contact No.  </label>
					<input type="text" id="contact_no" name="contact_no" class="textBoxStyle" value="">
				</li>
				<li class="fieldTxP">
					<label>Message *</label>
					<textarea class="textBoxStyle height120" id="cnt_message" name="cnt_message"></textarea>
                    <span class="error" id="msg_error"  style="display:none">{$msg_error}</span>
				</li>
                <li class="blueBtnLi">
					<input type="submit" class="blueBtn" id="send" name="send"  value="Send">
				</li>
                </ul>
                <div class="contactAddress">
                 {$cms_content.page_content}
                </div>
                <div class="clear"></div>
           
          
            </form>
			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	
</section>