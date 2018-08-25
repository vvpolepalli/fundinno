<?php /* Smarty version Smarty-3.1.8, created on 2013-05-29 04:05:42
         compiled from "/home/fundinno/public_html/application/views/projects/videoplayer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29064284751a5d2f675b139-90925919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c6a70f4528c111bb76de84da4caef2cf751f723' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/videoplayer.tpl',
      1 => 1360150922,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29064284751a5d2f675b139-90925919',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'videotype' => 0,
    'baseurl' => 0,
    'videolink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51a5d2f687fd18_40871580',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a5d2f687fd18_40871580')) {function content_51a5d2f687fd18_40871580($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['videotype']->value==1){?>

 <!--[if lt IE 9]> 
 
<script type="text/javascript">
$(function() {
		  flowplayer("project_player", "<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/flowplayer/flowplayer-3.2.15.swf",{
      clip:  {
          autoPlay: true,
          autoBuffering: true
      }
 	 });
	});
</script>


    <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
" style="display:block;width:590px;height:350px"  id="project_player"> 
		</a>
 <![endif]-->
 <![if gte IE 9]>
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/video_js/video-js.css">
  
<script type="text/javascript">
$(function() {
	 $.getScript('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/video_js/video.js', function() {
	 });
	});
</script>
	
 <video id="example_video_1" autoplay class="video-js vjs-default-skin" controls preload="none" width="590" height="350"
      poster=""
      data-setup="{}">
    <source src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
" type='video/flv' />
    <track kind="captions" src="captions.vtt" srclang="en" label="English" />
  </video> <![endif]>
  
<!--<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player"  width="590" height="350">

<param name="movie" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/Mediaplayer50.swf" />
<param name="allowfullscreen" value="true" />
<param name="allowscriptaccess" value="always" />
<param name="wmode" value="transparent">
<param name="flashvars" value="file=<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
&autostart=true" />
<embed type="application/x-shockwave-flash"
id="player2"
name="player2"
src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/uploadify/Mediaplayer50.swf" 
width="590" height="350"
allowscriptaccess="always"
allowfullscreen="true"
wmode="transparent"
flashvars="file=<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
&autostart=true"/>
</object>-->
<?php }elseif($_smarty_tpl->tpl_vars['videotype']->value==0){?>
        
<object width="590" height="350">
<param name="movie" value=="http://www.youtube.com/v/<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
"></param>
<param name="allowFullScreen" value="true"></param>
<param name="autoplay" value="1"></param>
<param name="allowscriptaccess" value="always"></param>
<param name="wmode" value="transparent">
<embed src="http://www.youtube.com/v/<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
?version=3&autoplay=1&amp;rel=0" 
type="application/x-shockwave-flash" allowscriptaccess="always"
allowfullscreen="true"  wmode="transparent"    
width="590" height="350" >
</embed>
</object>
<?php }elseif($_smarty_tpl->tpl_vars['videotype']->value==2){?>
      
        
<object width="590" height="350">
<param name="movie" value=="http://vimeo.com/<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
"></param>
<param name="allowFullScreen" value="true"></param>
<param name="autoplay" value="1"></param>
<param name="allowscriptaccess" value="always"></param>
<param name="wmode" value="transparent">
<embed src="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
&amp;server=vimeo.com&amp;color=00adef&amp;fullscreen=1&autoplay=1&start=1" 
type="application/x-shockwave-flash" allowscriptaccess="always"
allowfullscreen="true"  wmode="transparent"    
width="590" height="350" >
</embed>
</object>
 <?php }?><?php }} ?>