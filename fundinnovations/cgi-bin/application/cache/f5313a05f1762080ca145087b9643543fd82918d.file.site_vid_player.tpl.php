<?php /* Smarty version Smarty-3.1.8, created on 2013-06-28 14:24:18
         compiled from "/home/fundinno/public_html/application/views/site_vid_player.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115575445151cdf0f201f481-64492920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5313a05f1762080ca145087b9643543fd82918d' => 
    array (
      0 => '/home/fundinno/public_html/application/views/site_vid_player.tpl',
      1 => 1360064443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115575445151cdf0f201f481-64492920',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'videolink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51cdf0f20f4b98_71445189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51cdf0f20f4b98_71445189')) {function content_51cdf0f20f4b98_71445189($_smarty_tpl) {?><object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player"  width="590" height="350">

<param name="movie" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/Mediaplayer50.swf" />
<param name="allowfullscreen" value="true" />
<param name="allowscriptaccess" value="always" />
<param name="wmode" value="transparent">
<param name="flashvars" value="file=<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
&autostart=true" />
<embed type="application/x-shockwave-flash"
id="player2"
name="player2"
src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/Mediaplayer50.swf" 
width="600" height="350"
allowscriptaccess="always"
allowfullscreen="true"
wmode="transparent"
flashvars="file=<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/<?php echo $_smarty_tpl->tpl_vars['videolink']->value;?>
&autostart=true"/>
</object><?php }} ?>