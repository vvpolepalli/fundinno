<script type="text/javascript" src="{$baseurl}tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
{literal} 
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
	</script>{/literal} 
<section class="innerMidWrap">
  <ul class="innerMidTab">
    <li><a href="{$baseurl}archive_projects/project_details/{$proj_id}" >Project Details</a></li>
    <li><a href="{$baseurl}archive_projects/project_backers/{$proj_id}">Supporters <span class="value">({$project_det_counts.backers_cnt})</span></a></li>
    <li><a  href="{$baseurl}archive_projects/project_videos/{$proj_id}">Videos <span class="value">({$project_det_counts.videos_cnt})</span></a></li>
    <li><a  href="{$baseurl}archive_projects/project_images/{$proj_id}">Images <span class="value">({$project_det_counts.images_cnt})</span></a></li>
    <li><a href="{$baseurl}archive_projects/project_comments/{$proj_id}">Comments <span class="value">({$project_det_counts.comments_cnt})</span> </a></li>
    {if $project_status.project_status eq 'success'}
    <li><a class="active" href="{$baseurl}archive_projects/project_updates/{$proj_id}">Project Updates <span class="arrowtabs arrowvideo"></span></a></li>
    {/if}
    {if $project_status.user_id eq $user_id && $user_id neq ''}
    <li><a  href="{$baseurl}archive_projects/project_admin_commets/{$proj_id}">Admin Comments<span class="value">({$project_det_counts.admin_comments_cnt})</span></a></li>
    {/if}
  </ul>
  <div class="clear"></div>
  <div class="innerMidContent">
    <div class="updateBlock"> 
    <div id="shwbox">{foreach from=$proj_updates item=update}
      {$update.project_update }
      {foreachelse}
      <div class="no_results"> No updates. </div>
      {/foreach}
      </div>
      <div class="clear"></div>
      {if $project_view_st.project_update_privilage eq 1 && $project_view_st.user_id eq $user_id}
      <input type="button" id="editbtn" name="editbtn" class="blueBtn" value="Edit" onclick="open_edit()">
        <div class="clear"></div>
      <form> 
       <div id="edit_block" style="display:none"> 
        <label>Project Description *</label>
        <textarea name="project_update" id="project_update"  style="width:1001px" >{$proj_updates.0.project_update|stripslashes}
        </textarea>
        <div class="submitPane">
          <ul>
            {if $proj_updates|@count gt 0 && $proj_updates neq 0}
            <li>
              <input type="button" id="update" name="update" class="blueBtn" value="Update" onClick="return update_projects_update('{$baseurl}',{$proj_id},'update');">
            </li>
            {else}
            <li>
              <input type="button" id="save" name="update" class="blueBtn" value="Update" onClick="return update_projects_update('{$baseurl}',{$proj_id},'save');">
            </li>
            {/if}
            <li>
              <input type="button" class="grayBtn" id="btn_cancel" name="btn_cancel" onclick="reset_fn()" value="Cancel">
            </li>
          </ul>
        </div>
        </div>
      </form>
      {/if} 
   
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>
