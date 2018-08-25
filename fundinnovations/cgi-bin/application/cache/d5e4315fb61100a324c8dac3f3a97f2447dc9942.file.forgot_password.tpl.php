<?php /* Smarty version Smarty-3.1.8, created on 2013-02-20 16:26:00
         compiled from "/var/www/fundinnovations/application/views/forgot_password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57870094850f4d1f87fa3c2-90751278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5e4315fb61100a324c8dac3f3a97f2447dc9942' => 
    array (
      0 => '/var/www/fundinnovations/application/views/forgot_password.tpl',
      1 => 1361349616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57870094850f4d1f87fa3c2-90751278',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50f4d1f88535e1_57158788',
  'variables' => 
  array (
    'cms_content' => 0,
    'baseurl' => 0,
    'response' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f4d1f88535e1_57158788')) {function content_50f4d1f88535e1_57158788($_smarty_tpl) {?> 
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

<section class="innerMidWrap">
  <div class="signupAsideLeft">
    <h5><?php echo $_smarty_tpl->tpl_vars['cms_content']->value['page_name'];?>
</h5>
    <div>
    <?php echo $_smarty_tpl->tpl_vars['cms_content']->value['page_content'];?>

      <!--<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>-->
      <div class="">
   <!--[if lt IE 9]> 
 
<script type="text/javascript">
$(function() {
		  flowplayer("player",{
                src:"<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/flowplayer/flowplayer-3.2.15.swf",
                wmode:"transparent"
            } ,{
      clip:  {
          autoPlay: false,
          autoBuffering: true
      }
 	 });
	});
</script>


    <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/main_video.flv" style="display:block;width:509px;height:250px"  id="player"> 
		</a>
 <![endif]-->
 <![if gte IE 9]>
 <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="509" height="250"
      poster=""
      data-setup="{}">
   <!-- <source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />--> 
    <source src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/main_video.flv" type='video/flv' />
   <!-- <track kind="captions" src="captions.vtt" srclang="en" label="English" />-->
  </video> <![endif]>

      <div class="clear"></div>
    </div>
    
     <!-- <a rel="3.flv" type="1" class="pirobox_gall1 preview" ><img style="height:250px" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/preview.jpg" alt="project images"></a>-->
     <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/upload_vid02.jpg" alt="project images">--> </div>
  </div>
  <div class="signupAsideRight">
    <!--<ul class="innerMidTab">
      <li><a class="active" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
signin">Sign In<span class="arrowtabs arrowImg"></span></a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
signup"> Sign Up</a></li>
    </ul>-->
    <div class="clear"></div>
    <article class="signupPane">
      <form id="frm_forgot_pswrd" name="frm_forgot_pswrd" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
forgot_password" onsubmit="return validate('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');" method="post" >
     <h5>Forgot password</h5>
     
     <?php if ($_smarty_tpl->tpl_vars['response']->value=='blocked'||$_smarty_tpl->tpl_vars['response']->value=='verified'||$_smarty_tpl->tpl_vars['response']->value=='send'||$_smarty_tpl->tpl_vars['response']->value!=''){?>
     <div id="error_msg" class="error_msg"><?php if ($_smarty_tpl->tpl_vars['response']->value=='blocked'){?>You are blocked by admin.<?php }elseif($_smarty_tpl->tpl_vars['response']->value=='not verified'){?>You didn't verified your mail id.<?php }elseif($_smarty_tpl->tpl_vars['response']->value=='send'){?> Your password has been changed. New password sent to your mail.<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['response']->value;?>
<?php }?></div>
     <?php }?>
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
           <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
forgot_password" >Forgot password?</a>
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
</div><?php }} ?>