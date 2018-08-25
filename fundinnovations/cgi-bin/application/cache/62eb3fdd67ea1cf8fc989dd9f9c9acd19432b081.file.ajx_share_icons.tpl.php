<?php /* Smarty version Smarty-3.1.8, created on 2013-02-12 10:37:31
         compiled from "/var/www/fundinnovations/application/views/projects/ajx_share_icons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:466552145119c3b5e70cf0-12760306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62eb3fdd67ea1cf8fc989dd9f9c9acd19432b081' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/ajx_share_icons.tpl',
      1 => 1360645630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '466552145119c3b5e70cf0-12760306',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5119c3b5ed2ae0_98151472',
  'variables' => 
  array (
    'project_det' => 0,
    'promote_link' => 0,
    'share_contant' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5119c3b5ed2ae0_98151472')) {function content_5119c3b5ed2ae0_98151472($_smarty_tpl) {?> <?php $_smarty_tpl->tpl_vars["share_contant"] = new Smarty_variable(stripslashes($_smarty_tpl->tpl_vars['project_det']->value['short_description']), null, 0);?>
<div class="addthis_toolbox " id="add_this"  addthis:url="<?php echo $_smarty_tpl->tpl_vars['promote_link']->value;?>
"
        addthis:title="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
"
        addthis:description="<?php echo $_smarty_tpl->tpl_vars['share_contant']->value;?>
">
            <div class="custom_images">
              <ul class="socialShare socialShareblck" <?php if ($_smarty_tpl->tpl_vars['promote_link']->value==''){?>  style="display:none;" <?php }?>>
                <li><a class="addthis_button_facebook fb show_soc"  style="display:block;cursor:pointer"  ><img src="" alt="fb" /></a></li>
                <li><a class="addthis_button_twitter twit show_soc" style="display:block;cursor:pointer"  ><img src="" alt="twit" /></a></li>
                <li><a class="addthis_button_linkedin in show_soc"  style="display:block;cursor:pointer" ><img src="" alt="in" /></a></li>
                <li><a class="email show_soc"  style="display:block;cursor:pointer"  onclick="open_mail_pop('<?php echo $_smarty_tpl->tpl_vars['promote_link']->value;?>
');"><img src="" alt="email" /></a></li>
                
              </ul>
            </div>
          </div> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ead062198b3ae6"></script>
           <script type="text/javascript">
	 $(document).ready(function() {
	  $.getScript('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50ead062198b3ae6', function() {
	  });
 });



</script> <?php }} ?>