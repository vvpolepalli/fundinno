<?php /* Smarty version Smarty-3.1.8, created on 2013-01-01 13:51:37
         compiled from "/var/www/fundinnovations/application/views/projects/innovate_projects_updates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114924072750e1908510dc15-41454973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a78c0a68cde8531b9ca4ad4fe9caef3ea01975d9' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/innovate_projects_updates.tpl',
      1 => 1357028491,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114924072750e1908510dc15-41454973',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e1908518aea6_18030889',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'project_status' => 0,
    'proj_updates' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e1908518aea6_18030889')) {function content_50e1908518aea6_18030889($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
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

		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,imageupload",

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
	</script> 
	<section class="innerMidWrap">

	<ul class="innerMidTab">
		<li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Details</a></li>
    <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project_videos/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Videos</a></li>
    <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project_images/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Images</a></li>
    <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project_comments/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Comments</a></li>
     <?php if ($_smarty_tpl->tpl_vars['project_status']->value['project_status']=='success'){?>
    <li><a class="active"  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project_updates/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Updates<span class="arrowtabs"></span></a></li><?php }?>
	</ul>
	<div class="clear"></div>
	<div class="innerMidContent">
    <?php if ($_smarty_tpl->tpl_vars['proj_id']->value!=''){?>
		<form>
			<div class="updateBlock">
            <label>Project Description *</label>
        <textarea name="project_update" id="project_update"  style="width:1001px" ><?php echo stripslashes($_smarty_tpl->tpl_vars['proj_updates']->value['project_update']);?>
</textarea>
     <div class="submitPane"> <ul> 
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
         </li><?php }?>  <li>
            <input type="button" class="grayBtn" id="btn_cancel" name="btn_cancel" onclick="reset_fn()" value="Cancel">
          </li>
          </ul></div>
			</div>
            
		</form>
        <?php }else{ ?>
    <div class="submitPane">
    Please create project first.
    </div>
    <?php }?>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
    
</section><?php }} ?>