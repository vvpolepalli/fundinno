{literal} 
<script type="text/javascript">
$(document).ready(function(){	
$('#email_id').blur(validateEmailId);

});

function validate(baseurl) 
{	
	var email_id=$('#email_id').val();
	//
	//var purchasetracebackurl=$("#purchasetraceback").val();
	if(validateEmailId())
	{
			
	}else{
		return false;
	}
	
}
function validateEmailId()
{
		$('#emailid_error').remove();
	var baseurl = $('#hid_baseurl').val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	//alert('aa');
//	$("#emailid_error").hide();	
	if($("#email_id").val()=='')
	{
		
		$("#email_id").after('<span class="error" id="emailid_error"><span>This field is required</span></span>');
		return false;
	}
	else if(!emailReg.test($("#email_id").val())) 
	{
		$("#email_id").after('<span class="error" id="emailid_error"><span>Enter valid Email Id</span></span>');
		return false;
	}
	else
	{
		$('#emailid_error').remove();
		return true;
		//$("#email_id").after('<span class="checked" id="emailid_error"><span></span></span>');
	}
	
}
function validatePass()
{

	$("#pass_error").remove();
	var invalid = " "; // Invalid character is a space
	var minLength = 6; // Minimum length
//var ck_password = /^[A-Za-z0-9!@#$%^&*()_]{5,10}$/;
	
	var pwd=$("#passwrd").val();
	
	if($("#passwrd").val()=='')
	{
		
		$("#passwrd").after('<span class="error" id="pass_error"><span>This field is required</span></span>');
		return false;
	}
	/*else if(!ck_password.test($("#passwrd").val())) 
	{	
		$("#passwrd").after('<span class="error" id="pass_error"><span>Enter valid Password.</span></span>');
		return false;
	
	
	}*/else
	{
		//$("#pass_error").remove();
		return true;
	}
}
function close_pop(id){
	 $('#'+id).hide();
	 $('#pop_cntnt').empty();
	 $('#error_pop_cntnt').empty();closepPopup();
 	}
</script> 
{/literal}
<section class="innerMidWrap">
  <div class="signupAsideLeft">
    <h5>{$cms_content.page_name}</h5>
    <div>
    {$cms_content.page_content}
      <!--<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>-->
      <div class="">
   <!--[if lt IE 9]> 
{literal} 
<script type="text/javascript">
$(function() {
		  flowplayer("player",{
                src:"{/literal}{$baseurl}{literal}video/flowplayer/flowplayer-3.2.15.swf",
                wmode:"transparent"
            } ,{
      clip:  {
          autoPlay: false,
          autoBuffering: true
      }
 	 });
	});
</script>
{/literal}

    <a href="{$baseurl}video/main_video.mp4" style="display:block;width:505px;height:250px"  id="player"> 
		</a>
 <![endif]-->
 <![if gte IE 9]>
 <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="505" height="250"
      poster=""
      data-setup="{}">
   <!-- <source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />--> 
    <source src="{$baseurl}video/main_video.mp4" type='video/mp4' />
   <!-- <track kind="captions" src="captions.vtt" srclang="en" label="English" />-->
  </video> <![endif]>

      <div class="clear"></div>
    </div>
    <br>
     <!-- <a rel="3.flv" type="1" class="pirobox_gall1 preview" ><img style="height:250px" src="{$baseurl}video/preview.jpg" alt="project images"></a>-->
     <!-- <img src="{$baseurl}images/upload_vid02.jpg" alt="project images">--> </div>
  </div>
  <div class="signupAsideRight">
    <!--<ul class="innerMidTab">
      <li><a class="active" href="{$baseurl}signin">Sign In<span class="arrowtabs arrowImg"></span></a></li>
      <li><a href="{$baseurl}signup"> Sign Up</a></li>
    </ul>-->
    <div class="clear"></div>
    <article class="signupPane">
      <form id="frm_forgot_pswrd" name="frm_forgot_pswrd" action="{$baseurl}forgot_password" onsubmit="return validate('{$baseurl}');" method="post" >
     <h5>Forgot password</h5>
     
     {if $response eq 'blocked' || $response eq 'verified' || $response eq 'send' ||  $response neq ''}
     <div id="error_msg" class="error_msg">{if $response eq 'blocked'}You are blocked by admin.{elseif $response eq 'not verified'}You didn't verified your mail id.{elseif $response eq 'send'} Your password has been changed. New password sent to your mail.{else}{$response}{/if}</div>
     {/if}
        <ul>
          <li class="fieldTxP">
            <label>Email ID </label>
            <input type="text" id="email_id" name="email_id" class="textBoxStyle" value="">
          </li>
          <!--<li>
            <label>Password </label>
            <input type="password" id="passwrd" name="passwrd" class="textBoxStyle" value="">
          </li>-->
          <li class="blueBtnLi">
            <input type="submit" class="blueBtn" id="send" name="send"  value="Send">
          </li>
          <!-- <li>
           <a href="{$baseurl}forgot_password" >Forgot password?</a>
          </li>-->
        </ul>
      </form>
      <div class="orLine"><span>Or</span></div>
      <div class="fbConect"><a href="javascript:void(0)" onclick="javascript:go_fblogin();"><span class="spriteImg fbConnectIco"></span>Connect with Facebook</a></div>
      <div class="linkedinConect" id="mylinkedin" name="mylinkedin">
      <a href="javascript:void(0)"><span class="spriteImg linkedinConnectIco" >
	<!-- <script type="IN/Login"></script>-->
      </span>Connect with Linked In</a></div>
      <div class="clear"></div>
    </article>
    <div class="aside_brd"></div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>

<div id="error_popup" style="display:none">
<div id="inlineContent2" class="white_content">
  <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('error_popup')">Close</a>
    <div ><h4>Error</h4>
      <div id="error_pop_cntnt"></div>
     
      </div>
  </div>
  <div class="clear"></div>
</div>
<div id="fade1" class="black_overlay"></div>
</div>