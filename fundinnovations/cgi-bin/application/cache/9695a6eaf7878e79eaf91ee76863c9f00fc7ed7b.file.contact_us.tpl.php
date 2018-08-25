<?php /* Smarty version Smarty-3.1.8, created on 2013-02-18 14:15:24
         compiled from "/var/www/fundinnovations/application/views/contact_us.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213836425850ed5340581fa4-90372631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9695a6eaf7878e79eaf91ee76863c9f00fc7ed7b' => 
    array (
      0 => '/var/www/fundinnovations/application/views/contact_us.tpl',
      1 => 1361177117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213836425850ed5340581fa4-90372631',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50ed53405c19a1_75444618',
  'variables' => 
  array (
    'baseurl' => 0,
    'message' => 0,
    'name_error' => 0,
    'email_error' => 0,
    'msg_error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ed53405c19a1_75444618')) {function content_50ed53405c19a1_75444618($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/pirobox_extended.js"></script>



<script type="text/javascript">
$(document).ready(function(){
	$("#name").blur(validate_name);
	$("#email_id").blur(validate_email);
	$("#cnt_message").blur(validate_msg);
	var message='<?php echo $_smarty_tpl->tpl_vars['message']->value;?>
';
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

<section class="innerMidWrap">
	 <div class="contentBlock">
         <h5 class="contactMsBlk">Contact Us <span id="msg" class="mini-success" style="display:none;"></span></h5>
          
       <form id="frm_contact" name="frm_contact" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
contact_us" onSubmit="return validate()" method="post" > 
      
			<ul class="frm_contact">
				<li class="fieldTxP">
					<label>Name *</label>
					<input type="text"  id="name" name="name" class="textBoxStyle" value="">
                    <span class="error"  id="name_error" style="display:none"><?php echo $_smarty_tpl->tpl_vars['name_error']->value;?>
</span>
				</li>
				<li class="fieldTxP">
					<label>Email Address  *</label>
					<input type="text" id="email_id" name="email_id" class="textBoxStyle" value="">
                    <span class="error" id="email_error"  style="display:none"><?php echo $_smarty_tpl->tpl_vars['email_error']->value;?>
</span>
				</li>
				<li class="fieldTxP">
					<label>Contact No.  </label>
					<input type="text" id="contact_no" name="contact_no" class="textBoxStyle" value="">
				</li>
				<li class="fieldTxP">
					<label>Message *</label>
					<textarea class="textBoxStyle height120" id="cnt_message" name="cnt_message"></textarea>
                    <span class="error" id="msg_error"  style="display:none"><?php echo $_smarty_tpl->tpl_vars['msg_error']->value;?>
</span>
				</li>
                </ul>
                <div class="clear"></div>
               
                <ul>
				<li class="blueBtnLi">
					<input type="submit" class="blueBtn" id="send" name="send"  value="Send">
				</li>
				</ul>
          
            </form>
			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	
</section><?php }} ?>