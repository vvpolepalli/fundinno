<?php /* Smarty version Smarty-3.1.8, created on 2013-08-11 22:06:08
         compiled from "/home/fundinno/public_html/application/views/projects/project_updates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1303634595515bb4de7841b4-35166544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24917545c1a5c64d266e6996ac2ba501eb08c71e' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/project_updates.tpl',
      1 => 1366360686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1303634595515bb4de7841b4-35166544',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bb4de939a07_41971896',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'project_det_counts' => 0,
    'project_status' => 0,
    'user_id' => 0,
    'proj_updates' => 0,
    'update' => 0,
    'project_view_st' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bb4de939a07_41971896')) {function content_515bb4de939a07_41971896($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
 
<script type="text/javascript" >

tinyMCE.init({
		// General options
		height : "280",
		verify_html : false,
        cleanup : false,
        cleanup_on_startup : false,
		mode : "exact",
		theme : "advanced",
		elements : 'project_update',
        convert_urls : false,

		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,imageupload",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,imageupload,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		//content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		//template_external_list_url : "lists/template_list.js",
		//external_link_list_url : "lists/link_list.js",
		//external_image_list_url : "lists/image_list.js",
		//media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
	
	function update_projects_update(baseurl,proj_id,action){
	var update= $.trim(tinyMCE.get('project_update').getContent());
	var data={update:update,proj_id:proj_id,action:action};
		
		$.ajax({
			type: "POST",
			url: baseurl+"project/update_projects_update", 
			data:data,
			success: function(msg){
				 window.location.reload();
				}
		});
	}
	function reset_fn(){
		tinyMCE.get('project_update').setContent('');
	}
	function open_edit(){
		$('#edit_block').show();
		$('#shwbox').hide();
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
    <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_videos/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Videos <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['videos_cnt'];?>
)</span></a></li>
    <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_images/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Images <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['images_cnt'];?>
)</span></a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_comments/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Comments <span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['comments_cnt'];?>
)</span> </a></li>
    <?php if ($_smarty_tpl->tpl_vars['project_status']->value['project_status']=='success'){?>
    <li><a class="active" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_updates/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Updates <span class="arrowtabs arrowvideo"></span></a></li>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['project_status']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value&&$_smarty_tpl->tpl_vars['user_id']->value!=''){?>
    <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_admin_commets/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Admin Comments<span class="value">(<?php echo $_smarty_tpl->tpl_vars['project_det_counts']->value['admin_comments_cnt'];?>
)</span></a></li>
    <?php }?>
  </ul>
  <div class="clear"></div>
  <div class="innerMidContent">
    <div class="updateBlock"> 
    <div id="shwbox"><?php  $_smarty_tpl->tpl_vars['update'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['update']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proj_updates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['update']->key => $_smarty_tpl->tpl_vars['update']->value){
$_smarty_tpl->tpl_vars['update']->_loop = true;
?>
      <?php echo $_smarty_tpl->tpl_vars['update']->value['project_update'];?>

      <?php }
if (!$_smarty_tpl->tpl_vars['update']->_loop) {
?>
      <div class="no_results"> No updates. </div>
      <?php } ?>
      </div>
      <div class="clear"></div>
      <?php if ($_smarty_tpl->tpl_vars['project_view_st']->value['project_update_privilage']==1&&$_smarty_tpl->tpl_vars['project_view_st']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value){?>
      <input type="button" id="editbtn" name="editbtn" class="blueBtn" value="Edit" onclick="open_edit()">
        <div class="clear"></div>
      <form> 
       <div id="edit_block" style="display:none"> 
        <label>Project Description *</label>
        <textarea name="project_update" id="project_update"  style="width:1001px" ><?php echo stripslashes($_smarty_tpl->tpl_vars['proj_updates']->value[0]['project_update']);?>

        </textarea>
        <div class="submitPane">
          <ul>
            <?php if (count($_smarty_tpl->tpl_vars['proj_updates']->value)>0&&$_smarty_tpl->tpl_vars['proj_updates']->value!=0){?>
            <li>
              <input type="button" id="update" name="update" class="blueBtn" value="Update" onClick="return update_projects_update('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
',<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
,'update');">
            </li>
            <?php }else{ ?>
            <li>
              <input type="button" id="save" name="update" class="blueBtn" value="Update" onClick="return update_projects_update('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
',<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
,'save');">
            </li>
            <?php }?>
            <li>
              <input type="button" class="grayBtn" id="btn_cancel" name="btn_cancel" onclick="reset_fn()" value="Cancel">
            </li>
          </ul>
        </div>
        </div>
      </form>
      <?php }?> 
   
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>
<?php }} ?>