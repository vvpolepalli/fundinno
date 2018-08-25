<?php /* Smarty version Smarty-3.1.8, created on 2013-02-20 18:11:07
         compiled from "/var/www/fundinnovations/application/views/projects/projects_images.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78706109950db05005b6733-01228070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11208330dd176505b7195b60bc9ad6589ad3a540' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/projects_images.tpl',
      1 => 1361364051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78706109950db05005b6733-01228070',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50db0500641e08_16948988',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'project_det_counts' => 0,
    'project_status' => 0,
    'user_id' => 0,
    'cnt' => 0,
    'project_main_img' => 0,
    'proj_photos' => 0,
    'photo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50db0500641e08_16948988')) {function content_50db0500641e08_16948988($_smarty_tpl) {?><!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/fancyBox/lib/jquery-1.9.0.min.js"></script>-->

<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>-->

	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/fancyBox/source/jquery.fancybox.css?v=2.1.4" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />

	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />


	<!-- Add Media helper (this is optional) -->
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */
  $.getScript('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/fancyBox/lib/jquery-1.9.0.min.js', function() {
	   $.getScript('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js', function() {
	    $.getScript('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/fancyBox/source/jquery.fancybox.js?v=2.1.4', function() {
			 $.getScript('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7', function() {
			$('.fancybox').fancybox();
			});
			});
			});
			});
			

		});
		</script>
    
<section class="innerMidWrap">
	<ul class="innerMidTab">
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Details</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_backers/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Supporters <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['backers_cnt'];?>
)</span></a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_videos/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Videos <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['videos_cnt'];?>
)</span></a></li>
		<li><a class="active" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_images/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Images <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['images_cnt']+1;?>
)</span> <span class="arrowtabs arrowvideo"></span></a></li>
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
		<div class="discovervideo">
			<h5>Image</h5>
			<ul>
            <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable("1", null, 0);?>
         
           <li <?php if ($_smarty_tpl->tpl_vars['cnt']->value%3==0){?> class="last" <?php }?> >  
            <a class="fancybox" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/gallary/<?php echo $_smarty_tpl->tpl_vars['project_main_img']->value['project_image'];?>
" data-fancybox-group="gallery" title=""> <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['project_main_img']->value['project_image'];?>
" alt="project images"></a></li>
          <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable($_smarty_tpl->tpl_vars['cnt']->value+1, null, 0);?>
          
          <?php  $_smarty_tpl->tpl_vars['photo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['photo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['proj_photos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['photo']->key => $_smarty_tpl->tpl_vars['photo']->value){
$_smarty_tpl->tpl_vars['photo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['photo']->key;
?>
          <li <?php if ($_smarty_tpl->tpl_vars['cnt']->value%3==0){?> class="last" <?php }?> ><!--<a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['photo']->value['image'];?>
" rel="gallery" title="3"  class="pirobox_gall">-->
          <table cellpadding="0" cellpadding="0" width="100%" border="0" height="190">
          <tr><td align="center" valign="middle">
           <a class="fancybox" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/gallary/<?php echo $_smarty_tpl->tpl_vars['photo']->value['image'];?>
" data-fancybox-group="gallery" title=""> <img class="project_imgs" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['photo']->value['image'];?>
" alt="project images"></a>
           <div class="vCaption"><div id="captnBlk_<?php echo $_smarty_tpl->tpl_vars['photo']->value['id'];?>
"><span id="captn<?php echo $_smarty_tpl->tpl_vars['photo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['photo']->value['image_title'];?>
</span></div></div>
           </td></tr></table>
           </li>
          <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable($_smarty_tpl->tpl_vars['cnt']->value+1, null, 0);?>
         <?php } ?>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</section>
<?php }} ?>