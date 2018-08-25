<script type="text/javascript" src="{$baseurl}js/signup.js"></script>
<style>
 .play_img{
   left: 305px;
    position: absolute;
    top: 366px;
	}
 </style>
{literal}
<script type="text/javascript">

$(document).ready(function(){
	
	 $("#u_name").blur(validateUName);
	 $("#email_id").blur(validateDupEmailId);
	 $("#paswrd").keyup(validatePass);
	 $("#confirm_pass").keyup(confirmPass);
	 
	 
});	
function new_captcha(path)
{
var c_currentTime = new Date();
var c_miliseconds = c_currentTime.getTime();
document.getElementById('captcha').src = path+'captcha/image/'+ c_miliseconds;
document.getElementById('captcha_code').value = "";
$('#captcha_error').html('');
}
function close_pop(id){
	 $('#'+id).hide();
	 closepPopup();
	$('#pop_cntnt').empty();
 	}
	 $(".preview1").live('click',function(e){
			$videotype=$(this).attr("type");
			$videolink=$(this).attr('rel');
			var dealid=$(this).attr('rel');
			$('#site_player_popup').show();
			var playerurl='{/literal}{$baseurl}{literal}home/play_sitevideo';
			$('#site_player_pop_cntnt').load(playerurl,{videolink:$videolink,videotype:$videotype},function(){
				
				//$(".preview").hide();	
			})
		}) ;
</script>
{/literal}

<section class="innerMidWrap">
	<div class="signupAsideLeft">
		 <h5>{$cms_content.page_name}</h5>
    <div>
    {$cms_content.page_content}
            <div class="">
   <!--[if lt IE 9]> 
{literal} 
<script type="text/javascript">
$(function() {
		  flowplayer("player", {
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

    <a href="{$baseurl}video/main_video.mp4" style="display:block;width:509px;height:250px"  id="player"> 
		</a>
 <![endif]-->
 <![if gte IE 9]>
 <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="509" height="250"
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
			<!--<a rel="3.flv" type="1" class="pirobox_gall1 preview" >--><!--<img class="play_img" src="{$baseurl}images/play_b.png">--><!--<img src="{$baseurl}video/preview.jpg" alt="project images"></a>--></div>
	</div>
	<div class="signupAsideRight">
		<ul class="innerMidTab">
			<li><a href="{$baseurl}signin">Sign In</a></li>
			<li><a  class="active" href="{$baseurl}signup">Sign Up<span class="arrowtabs arrowImg"></span></a></li>
		</ul>
		<div class="clear"></div>
		<article class="signupPane">
		<h6><span class="font15">New to Fundinnovation?</span><br>

Sign up Now</h6>
<input type="hidden" id="hid_baseurl" name="hid_baseurl" value="{$baseurl}" />
			<form id="frm_signup" name="frm_signup" action="" method="post" >
			<ul>
				<li class="fieldTxP">
					<label>Name *</label>
					<input type="text"  id="u_name" name="u_name" class="textBoxStyle" value="">
				</li>
				<li class="fieldTxP">
					<label>Email Address  *</label>
					<input type="text" id="email_id" name="email_id" class="textBoxStyle" value="">
				</li>
				<li class="fieldTxP">
					<label>Password *</label>
					<input type="password" id="paswrd" name="paswrd" class="textBoxStyle" value="">
				</li>
				<li class="fieldTxP">
					<label>Confirm Password  *</label>
					<input type="password" id="confirm_pass" name="confirm_pass" class="textBoxStyle" value="">
				</li>
				<li id="err" class="fieldTxP"><label>Enter Code *</label>
				<div class="clear"></div>
				<input type="text" class="textBoxStyle left" id="captcha_code" name="captcha_code" value="" style="width:142px"> <img src="{$baseurl}captcha/image" onclick="new_captcha('{$baseurl}')" id="captcha" class="left" alt="captcha" />
				<div class="clear"></div>
                <div id="captcha_error"></div>
				</li>
                
				<li class="blueBtnLi">
					<input type="button" class="blueBtn" id="signup" name="signup" onclick="sign_up('{$baseurl}')" value="Sign Up">
				</li>
			</ul>
            </form>
			<!--<div class="orLine"><span>Or</span></div>
			<div class="fbConect"><a href="javascript:void(0)" onclick="javascript:go_fblogin();" > <span class="spriteImg fbConnectIco"></span>Connect with Facebook</a></div>
            <div class="linkedinConect"><a href="#"><span class="spriteImg linkedinConnectIco"></span>Connect with Linked In</a></div>-->
			
			<div class="clear"></div>
		</article>
		<div class="aside_brd"></div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</section>
<input type="hidden" name="purchasetraceback" id="purchasetraceback" value=""/>
<input type="hidden" name="fb_profile_link" id="fb_profile_link" value=""/>
<input type="hidden" name="fb_profile_image"  id="fb_profile_image" value="" />
<input type="hidden" name="fb_userid"  id="fb_userid" value="0"/>

<div id="response_popup" class="popFixed" style="display:none">
<div class="popabs">
<div id="inlineContent2" class="white_content">
  <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('response_popup')">Close</a>
    <div ><h4></h4>
      <div id="error_pop_cntnt">We sent an email to your mail. Please click on the link in that email to confirm your email address. Be sure to check your spam folder</div>
     
      </div>
  </div>
  <div class="clear"></div>
</div>
</div>
</div>


