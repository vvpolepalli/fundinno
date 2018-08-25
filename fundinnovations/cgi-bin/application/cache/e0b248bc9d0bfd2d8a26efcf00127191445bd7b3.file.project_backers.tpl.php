<?php /* Smarty version Smarty-3.1.8, created on 2013-02-14 16:29:04
         compiled from "/var/www/fundinnovations/application/views/admin/projects/project_backers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149562280550a0dbe4c4f3f5-47511734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0b248bc9d0bfd2d8a26efcf00127191445bd7b3' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/projects/project_backers.tpl',
      1 => 1360839518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149562280550a0dbe4c4f3f5-47511734',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a0dbe4cd5c96_84528231',
  'variables' => 
  array (
    'proj_id' => 0,
    'project_backers' => 0,
    'backers' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a0dbe4cd5c96_84528231')) {function content_50a0dbe4cd5c96_84528231($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?><input type="hidden" id="hid_proj_id" name="hid_proj_id" value="<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
"/>
<div class="shadow_outer">
  <div class="shadow_inner" > <?php if (count($_smarty_tpl->tpl_vars['project_backers']->value)>0){?>
    <ul>
      <?php  $_smarty_tpl->tpl_vars['backers'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['backers']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_backers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['backers']->key => $_smarty_tpl->tpl_vars['backers']->value){
$_smarty_tpl->tpl_vars['backers']->_loop = true;
?>
      <li class="userComent" id="prof_<?php echo $_smarty_tpl->tpl_vars['backers']->value['user_id'];?>
"> <?php if ($_smarty_tpl->tpl_vars['backers']->value['backers_details']['profile_image']!=''){?>
      <div class="userImgBlk"> <img title="<?php echo $_smarty_tpl->tpl_vars['backers']->value['profile_name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['backers']->value['backers_details']['profile_imgurl'];?>
" class="previewimg">
      </div><?php }else{ ?> <div class="userImgBlk"><img title="<?php echo $_smarty_tpl->tpl_vars['backers']->value['profile_name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/no_image.png" class="previewimg"> </div><?php }?>
  <div class="commentBlk"> <?php echo $_smarty_tpl->tpl_vars['backers']->value['backers_details']['profile_name'];?>
<br />
         <!-- <div class="postedDate"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['backers']->value['date']);?>
</div>-->
          Pre- ordered amount :<?php echo $_smarty_tpl->tpl_vars['backers']->value['amount'];?>
<br />
           </div>
       <div class="clear"></div>
       </li>
      <?php } ?>
    </ul>
    <?php }else{ ?>No Supportes.
    <?php }?>
    <div class="clear"></div>
    </div>
</div>
<?php }} ?>