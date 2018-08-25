<footer>
  <div class="footerWrap">
    <div class="logo"></div>
    <div class="footLinks"><!--<a href="#">News</a>--><a href="{$baseurl}faq">FAQ</a><a href="javascript:void(0)" onclick="feedback_pop()">Feedback</a><a href="{$baseurl}home/media">Media</a><a href="{$baseurl}contact_us">Contact us</a><a href="{$baseurl}terms">Terms of use</a><a href="{$baseurl}privacy_policy">Privacy policy</a></div>
    <div class="copy">© 2013 Fundinnovation. All Rights Reserved</div>
    <div class="clear"></div>
  </div>
</footer>
{literal}
<script type="text/javascript" >
var baseurl ='{/literal}{$baseurl}{literal}';
$(document).ready(function(){
	$("#feedback_name").blur(validate_feedback_name);
	$("#feedback_email_id").blur(validate_feedback_email);
	$("#feedback_message").blur(validate_feedback_msg);
	$("#feedback_subject").blur(validate_feedback_subject);
});
function feedback_pop(){
		//var user_id ='{/literal}{$user_id}{literal}';
		$('#feedback_name').val('');	
		$('#feedback_email_id').val('');	
		$('#feedback_message').val('');	
		$('#feedback_subject').val('');
		$("#feedback_name_error").hide();
		$("#feedback_name_error").html('');
		$("#feedback_email_error").hide();
		$("#feedback_email_error").html('');
		$("#feedback_subj_error").hide();
		$("#feedback_subj_error").html('');
		$("#feedback_mess_error").hide();
		$("#feedback_mess_error").html('');
		//$("#mess_error").hide();
	//	if(user_id){
		$('#feedback_popup').show();
		openpPopup();
		
	}
function send_feedback(){
	if(validate_feedback_name() & validate_feedback_email() & validate_feedback_subject() & validate_feedback_msg() ){
			var feedback_name     = $("#feedback_name").val();
			var feedback_email_id = $("#feedback_email_id").val();
			var feedback_message  = $('#feedback_message').val();
			var feedback_subject  = $('#feedback_subject').val();	
			var subject = $('#subject').val();	
			var dat ={feedback_name:feedback_name,feedback_email_id:feedback_email_id,subject:feedback_subject,message_cntnt:feedback_message}
			$.ajax({
			type: "POST",
			url: baseurl+"home/send_feedback",
			data: dat, 
			success: function(msg){
				if(msg){
					//close_pop('send_mail_popup');
					$('#feedmsg').html('Your message sent successfully.');
					$('#feedmsg').show();
					setTimeout(function() {
						$('#feedmsg').hide();
						$('#feedback_popup').hide();closepPopup()},2000);
				}
				else{
					//close_pop('send_mail_popup');
				//$('#alert_popup').show();
				//$('#alert_pop_cntnt').html('Please login to share link...');
				}
			}
			});
	}
}
function ValidateStringFooter(str){    
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
function validate_feedback_name(){
	if($.trim($("#feedback_name").val())=='') 
		{
			$("#feedback_name_error").show();
			$("#feedback_name_error").html('<span>Please enter name.</span>');
			return false;
		}
		else if(ValidateStringFooter($.trim($("#feedback_name").val()))==false)
		{
			$("#feedback_name_error").show();
			$("#feedback_name_error").html('<span>Characters Only.</span>');
			//$("#u_name").after('<span class="error" id="firstname_error"><span>Characters Only</span></span>');
			return false;	
		}
		else 
		{
			$("#feedback_name_error").hide();
			$("#feedback_name_error").html('');
			return true;
		}
	}
function validate_feedback_email(){
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if($("#feedback_email_id").val()=='')
		{
			$("#feedback_email_error").show();
			$("#feedback_email_error").html('<span>Please enter email id.</span>');
		//$("#to_emailid").after('<div class="clear"/><span class="error" id="email_error"><span>This field is required</span></span>');
		return false;
		}
		else if(!emailReg.test($("#feedback_email_id").val())) 
		{
			$("#feedback_email_error").show();
			$("#feedback_email_error").html('<span>Please enter valid email id.</span>');
			return false;
		
		}
		else{
			$("#feedback_email_error").hide();
			$("#feedback_email_error").html('');	
			return true;
		}
	}
function validate_feedback_msg(){
	if($.trim($("#feedback_message").val())=='')
		{
			$("#feedback_mess_error").show();
			$("#feedback_mess_error").html('<span>Please enter message.</span>');
			return false;
		}
		else 
		{
			$("#feedback_mess_error").hide();
			$("#feedback_mess_error").html('');
			return true;
		}
}
function validate_feedback_subject(){
	if($.trim($("#feedback_subject").val())=='')
		{
			$("#feedback_subj_error").show();
			$("#feedback_subj_error").html('<span>Please enter Subject.</span>');
			return false;
		}
		else 
		{
			$("#feedback_subj_error").hide();
			$("#feedback_subj_error").html('');
			return true;
		}
}
function openpPopup(){
	$('body').addClass('popupEnabled')
	$('.black_overlay').show();
}
function openpPopupFix_home(){
        $('#lern_more_popup').find('.white_content').css('left','50%').css('margin-left',-$('#lern_more_popup').find('.white_content').width()/2);   
}
function closepPopup(){
	$('body').removeClass('popupEnabled')
	$('.black_overlay').hide();
}

</script> 
{/literal}

<div id="site_player_popup" class="popFixed" style="display:none">
<div class="popabs">
<div id="inlineContent2" class="white_content">
<div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('site_player_popup')">Close</a>
<div >
<div id="site_player_pop_cntnt">
</div>
 </div>
  </div>
  <div class="clear"></div>
</div>
</div>
</div>


<div id="feedback_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner" style="padding:0"> <a class="closeBtn" href = "javascript:void(0)" onclick ="javascript:$('#feedback_popup').hide();closepPopup();">Close</a>
      <div class="popTitle">
        <h4>Feedback</h4>
       </div>
       <div style="display:none" class="success_msg" id="feedmsg"></div>
        <div id="contact_pop_cntnt">
          <form name="frmfeedback" id="frmfeedback" method="post" action="">
          
            <div  class="prodeForm">
              <ul>
              <li class="fieldTxP">
					<label>Name *</label>
					<input type="text"  id="feedback_name" name="feedback_name" class="textBoxStyle" value="">
                    <span class="error" id="feedback_name_error"  style="display:none"></span>
				</li>
				<li class="fieldTxP">
					<label>Email Address  *</label>
					<input type="text" id="feedback_email_id" name="feedback_email_id" class="textBoxStyle" value="">
                    <span class="error" id="feedback_email_error"  style="display:none"></span>
				</li>
                <li class="fieldTxP">
                  <label>Subject: *</label>
                  <input type="text" id="feedback_subject" name="feedbackt_subject" class="textBoxStyle" value="">
                  <span class="error"  id="feedback_subj_error"  style="display:none" ></span>

                </li>
                <li class="fieldTxP">
                  <label>Message: *</label>
                  <textarea id="feedback_message" name="feedback_message" class="textBoxStyle height120"></textarea>
                  <span class="error"  id="feedback_mess_error" style="display:none"></span>
                </li>
              </ul>
                <ul>
                  <li>
                    <input type="button" id="btn_feedback" name="btn_feedback" class="blueBtn" value="Send" onClick="send_feedback()">
                  </li>
                </ul>
              
            </div>
          </form>
        </div>
     
    </div>
    <div class="clear"></div>
  </div>
</div>  
</div>
<div id="fade1" class="black_overlay" style="display:none;"></div>