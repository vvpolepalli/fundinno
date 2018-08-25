<?php /* Smarty version Smarty-3.1.8, created on 2013-02-05 17:35:51
         compiled from "/var/www/fundinnovations/application/views/site_vid_player.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12777844615108dcfd026be0-47773780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8bae62425cb1c02a6b35013c6672d919768f976' => 
    array (
      0 => '/var/www/fundinnovations/application/views/site_vid_player.tpl',
      1 => 1360064443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12777844615108dcfd026be0-47773780',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5108dcfd076cf8_26724861',
  'variables' => 
  array (
    'baseurl' => 0,
    'videolink' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5108dcfd076cf8_26724861')) {function content_5108dcfd076cf8_26724861($_smarty_tpl) {?><object id="player" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="player"  width="590" height="350">

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