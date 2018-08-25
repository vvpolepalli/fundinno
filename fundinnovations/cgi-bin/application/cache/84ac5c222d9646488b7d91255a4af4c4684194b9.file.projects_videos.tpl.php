<?php /* Smarty version Smarty-3.1.8, created on 2013-02-20 18:11:02
         compiled from "/var/www/fundinnovations/application/views/projects/projects_videos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24504439050db0206545659-58978072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84ac5c222d9646488b7d91255a4af4c4684194b9' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/projects_videos.tpl',
      1 => 1361364060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24504439050db0206545659-58978072',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50db02066083e6_80124768',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'project_det_counts' => 0,
    'project_status' => 0,
    'user_id' => 0,
    'proj_videos' => 0,
    'vid' => 0,
    'cnt' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50db02066083e6_80124768')) {function content_50db02066083e6_80124768($_smarty_tpl) {?><style>
.play_img {
	left: 120px;
	position: absolute;
	top: 60px;
}
</style>

 
<script type="text/javascript">
	var baseurl="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
";
	
 $(".preview").live('click',function(e){
			$videotype=$(this).attr("type");
			$videolink=$(this).attr('rel');
		//	var dealid=$(this).attr('rel');
			var videotitle=$(this).attr('title');
			$('#vid_captn').html(videotitle);
			$('#player_popup').show();
			openpPopup();
			var playerurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/play_videos';
			$('#pop_cntnt').load(playerurl,{videolink:$videolink,videotype:$videotype},function(){
				
				//$(".preview").hide();	
			})
		}) ;
		
		function close_pop(id){
	 $('#'+id).hide();
	 $('#pop_cntnt').empty();
	 closepPopup();
 	}
	</script> 
    <section class="innerMidWrap">
  <ul class="innerMidTab">
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
" >Project Details</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_backers/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Supporters <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['backers_cnt'];?>
)</span></a></li>
        <li><a class="active" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_videos/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Videos <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['videos_cnt'];?>
)</span> <span class="arrowtabs arrowvideo"></span></a></li>
        <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
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
">Project Updates </a></li>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['project_status']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value&&$_smarty_tpl->tpl_vars['user_id']->value!=''){?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_admin_commets/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Admin Comments<span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['admin_comments_cnt'];?>
)</span></a></li>
        <?php }?>
      </ul>
  <div class="clear"></div>
  <div class="innerMidContent">
        <div class="discovervideo">
      <h5>Videos</h5>
      <?php if (count($_smarty_tpl->tpl_vars['proj_videos']->value)>0){?>
      <ul>
            <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable("1", null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['vid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vid']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proj_videos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vid']->key => $_smarty_tpl->tpl_vars['vid']->value){
$_smarty_tpl->tpl_vars['vid']->_loop = true;
?>
            <li id="vid_li_<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['cnt']->value%3==0){?> class="last" <?php }?> >
          <div class="videoDetailsPane"> <?php if ($_smarty_tpl->tpl_vars['vid']->value['type']==1){?> <a rel="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_link'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_title'];?>
" type="<?php echo $_smarty_tpl->tpl_vars['vid']->value['type'];?>
" href="javascript:void(0);" class="pirobox_gall1 preview" > <img class="play_img" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/play_b.png"> <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['vid']->value['thumb_image'];?>
" style="width: 317px;height: 188px;" alt="project images" /> </a> <?php }elseif($_smarty_tpl->tpl_vars['vid']->value['type']==0){?> <a rel="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_external_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_title'];?>
" type="<?php echo $_smarty_tpl->tpl_vars['vid']->value['type'];?>
"   class="pirobox_gall1 preview"  > <img  class="play_img" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/play_b.png"> <img src="<?php echo $_smarty_tpl->tpl_vars['vid']->value['thumb_image'];?>
" alt="project images" style="width: 317px;height: 188px;" /> </a><?php }else{ ?> <a rel="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_external_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vid']->value['video_title'];?>
" type="<?php echo $_smarty_tpl->tpl_vars['vid']->value['type'];?>
"  class="pirobox_gall1 preview"  > <img class="play_img" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/play_b.png"> <img src="<?php echo $_smarty_tpl->tpl_vars['vid']->value['thumb_image'];?>
" alt="project images" style="width: 317px;height: 188px;" /> </a> <?php }?> </div>
          <div class="vCaption">
                <div id="captnBlk_<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
"><span id="captn<?php echo $_smarty_tpl->tpl_vars['vid']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vid']->value['video_title'];?>
</span></div>
              </div>
        </li>
            <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable($_smarty_tpl->tpl_vars['cnt']->value+1, null, 0);?>
            <?php }
if (!$_smarty_tpl->tpl_vars['vid']->_loop) {
?>
            
            No videos
            <?php } ?>
          </ul>
      <?php }else{ ?>
      <div class="noDataFound">No videos.</div>
      <?php }?>
      <div class="clear"></div>
    </div>
        <div class="clear"></div>
        <div class="clear"></div>
      </div>
  <div class="clear"></div>
</section>
    <div id="player_popup" class="popFixed" style="display:none">
  <div class="popabs">
        <div id="inlineContent1" class="white_content"  style="width:650px !important">
      <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick = "close_pop('player_popup')">Close</a>
          
            <div class="popTitle" > <h4 id="vid_captn"></h4></div>
          <div id="pop_cntnt">loading...</div>
       
          </div>
      <div class="clear"></div>
    </div>
      </div>
</div>
<?php }} ?>