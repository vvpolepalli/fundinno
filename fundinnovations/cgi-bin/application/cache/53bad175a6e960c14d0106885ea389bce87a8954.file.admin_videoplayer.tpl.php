<?php /* Smarty version Smarty-3.1.8, created on 2012-11-09 16:09:34
         compiled from "/var/www/fundinnovations/application/views/admin/projects/admin_videoplayer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1998013581509ccdef112606-42802147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53bad175a6e960c14d0106885ea389bce87a8954' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/projects/admin_videoplayer.tpl',
      1 => 1352457107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1998013581509ccdef112606-42802147',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_509ccdef1ab751_72875246',
  'variables' => 
  array (
    'videotype' => 0,
    'baseurl' => 0,
    'videolink' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_509ccdef1ab751_72875246')) {function content_509ccdef1ab751_72875246($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['videotype']->value==1){?>
<object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player"  width="400" height="350">

<param name="movie" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/uploadify/Mediaplayer50.swf" />
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
width="400" height="350"
allowscriptaccess="always"
allowfullscreen="true"
wmode="transparent"
flashvars="file=<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
&autostart=true"/>
</object>
<?php }elseif($_smarty_tpl->tpl_vars['videotype']->value==0){?>
        
<object width="400" height="350">
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
width="400" height="350" >
</embed>
</object>
<?php }elseif($_smarty_tpl->tpl_vars['videotype']->value==2){?>
      
        
<object width="400" height="350">
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
width="400" height="350" >
</embed>
</object>
 <?php }?><?php }} ?>