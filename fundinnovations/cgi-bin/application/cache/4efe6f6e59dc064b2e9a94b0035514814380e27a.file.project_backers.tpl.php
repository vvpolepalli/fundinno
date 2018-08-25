<?php /* Smarty version Smarty-3.1.8, created on 2013-02-20 18:11:09
         compiled from "/var/www/fundinnovations/application/views/projects/project_backers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8808054050db1099c12a08-55258118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4efe6f6e59dc064b2e9a94b0035514814380e27a' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/project_backers.tpl',
      1 => 1361363977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8808054050db1099c12a08-55258118',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50db1099cd20e2_46371857',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'project_det_counts' => 0,
    'project_status' => 0,
    'user_id' => 0,
    'proj_backers' => 0,
    'cnt' => 0,
    'backer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50db1099cd20e2_46371857')) {function content_50db1099cd20e2_46371857($_smarty_tpl) {?><section class="innerMidWrap">
	<ul class="innerMidTab">
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Details</a></li>
		<li><a class="active" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_backers/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Supporters <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['backers_cnt'];?>
)</span> <span class="arrowtabs arrowvideo"></span></a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_videos/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Videos <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['videos_cnt'];?>
)</span></a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_images/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Images <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['images_cnt']+1;?>
)</span></a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_comments/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Comments <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['comments_cnt'];?>
)</span> </a></li>
		<?php if ($_smarty_tpl->tpl_vars['project_status']->value['project_status']=='success'){?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_updates/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Updates </a></li><?php }?>
   <?php if ($_smarty_tpl->tpl_vars['project_status']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value&&$_smarty_tpl->tpl_vars['user_id']->value!=''){?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_admin_commets/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Admin Comments<span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['admin_comments_cnt'];?>
)</span></a></li><?php }?>
	</ul>
	<div class="clear"></div>
	<div class="innerMidContent">
		<div class="bakersBlock">
			<h5>Supporters</h5>
            <?php if ($_smarty_tpl->tpl_vars['proj_backers']->value!=0){?>
            
			<ul><?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable("1", null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['backer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['backer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proj_backers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['backer']->key => $_smarty_tpl->tpl_vars['backer']->value){
$_smarty_tpl->tpl_vars['backer']->_loop = true;
?>
				<li <?php if ($_smarty_tpl->tpl_vars['cnt']->value%3==0){?> class="last" <?php }?> >
					<div class="bakerImg">
                   <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['backer']->value['backers_details']['id'];?>
"> <?php if ($_smarty_tpl->tpl_vars['backer']->value['backers_details']['profile_imgurl']!=''){?><img src="<?php echo $_smarty_tpl->tpl_vars['backer']->value['backers_details']['profile_imgurl'];?>
" height="112" align="bakers">
                    <?php }else{ ?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/prof_no_img.png" align="bakers">
                    <?php }?></a></div>
					<div class="rightCntnt">
						<h4><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['backer']->value['backers_details']['id'];?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['backer']->value['backers_details']['profile_name']);?>
</a></h4>
						<p><?php echo $_smarty_tpl->tpl_vars['backer']->value['backers_details']['city_name'];?>
</p>
						<p class="font15">Supported Projects : <b><?php echo $_smarty_tpl->tpl_vars['backer']->value['backed_proj_cnt'];?>
</b></p>
					</div>
					<div class="clear"></div>
				</li>
                 <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable($_smarty_tpl->tpl_vars['cnt']->value+1, null, 0);?>
                 <?php }
if (!$_smarty_tpl->tpl_vars['backer']->_loop) {
?>
                  <div class="noDataFound">No supporters.</div>
                 <?php } ?>
                
				
			</ul><?php }else{ ?>
            <div class="noDataFound">No supporters.</div>
            <?php }?><div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</section><?php }} ?>