<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 00:39:27
         compiled from "/home/fundinno/public_html/application/views/admin/projects/project_backers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:722942693515bce9f1c8056-69731972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8483b1f188e070fbd01c9d0d16cdb6695e12fd2e' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/projects/project_backers.tpl',
      1 => 1360839518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '722942693515bce9f1c8056-69731972',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'proj_id' => 0,
    'project_backers' => 0,
    'backers' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bce9f2bbce7_46641338',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bce9f2bbce7_46641338')) {function content_515bce9f2bbce7_46641338($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
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