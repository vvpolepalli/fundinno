<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 04:07:56
         compiled from "/home/fundinno/public_html/application/views/admin/projects/project_comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1741649853515bff7c8ca778-62432243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5982a5b7e8d720abe2108a25ef322c3d29fdd979' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/projects/project_comments.tpl',
      1 => 1360590945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1741649853515bff7c8ca778-62432243',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'proj_comments' => 0,
    'comments' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bff7cacce91_11689762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bff7cacce91_11689762')) {function content_515bff7cacce91_11689762($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?> 
<script type="text/javascript">
var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
function edit_comment(comment_id){
	
	$('#comment_div_'+comment_id).hide();
	$('#edit_div_'+comment_id).show();
}

function update_comment(comment_id){
	var comment=$.trim($('#edit_text_'+comment_id).val());
	if(comment !=''){
	var proj_id= $('#hid_proj_id').val();
		$.ajax({		
		type: "POST",
		url: baseurl+"admin/project/update_project_comment", 
		data:"comment_id="+comment_id+"&proj_id="+proj_id+"&comment="+comment,
		success: function(msg){
			 $("#tabs").tabs( "load", 3 );
			//$('#comment_div_'+comment_id).show();
			//$('#edit_div_'+comment_id).hide();
			}
		});
	}
	else
	{
	alert('Please enter comment');
	}
	
}

function delete_comment(comment_id){
	var cng=confirm('Are you sure want to delete this comment?');
	if(cng){
	var proj_id= $('#hid_proj_id').val();
		$.ajax({		
		type: "POST",
		url: baseurl+"admin/project/delete_project_comment", 
		data:"comment_id="+comment_id+"&proj_id="+proj_id,
		success: function(msg){
			 $("#tabs").tabs( "load", 3 );
			//$('#comment_div_'+comment_id).show();
			//$('#edit_div_'+comment_id).hide();
			}
		});
	}
		
}
</script>
<input type="hidden" id="hid_proj_id" name="hid_proj_id" value="<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
"/>
<div class="shadow_outer">
  <div class="shadow_inner" > <?php if (count($_smarty_tpl->tpl_vars['proj_comments']->value)>0){?>
    <ul>
      <?php  $_smarty_tpl->tpl_vars['comments'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comments']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proj_comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comments']->key => $_smarty_tpl->tpl_vars['comments']->value){
$_smarty_tpl->tpl_vars['comments']->_loop = true;
?>
      <li class="userComent" id="prof_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
"><div class="userImgBlk">
     <?php if ($_smarty_tpl->tpl_vars['comments']->value['profile_imgurl']!=''){?>
      <img title="<?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_imgurl'];?>
" class="previewimg">
        <?php }else{ ?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/prof_no_img.png" alt="">
        <?php }?>
        </div>
        <div class="commentBlk"><div style="border:1px solid #ccc; padding:10px; margin-bottom:10px"><h4><b><?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_name'];?>
</b></h4>
          <div class="postedDate"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comments']->value['date']);?>
</div>
          <div id="comment_div_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['comments']->value['comment']);?>
</div>
          <div id="edit_div_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" class="editCommentBkl" style="display:none">
            <textarea id="edit_text_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['comments']->value['comment'];?>
</textarea>
            <div class="clear" style="height:12px"></div>
            <span class="btnlayout">
            <input type="button" id="updatebtn_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" name="updatebtn_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" value="Update" onclick="update_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)"/>
            </span>
          </div> <div class="clear"></div></div>
          <?php if ($_smarty_tpl->tpl_vars['comments']->value['child_comments']!=0){?>
		   <div class="clear"></div>
          <div class="replayDiv"> <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value['child_comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px">  <div class="replayDivImg">
           <?php if ($_smarty_tpl->tpl_vars['child']->value['profile_imgurl']!=''){?>
      <img title="<?php echo $_smarty_tpl->tpl_vars['child']->value['profile_name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['child']->value['profile_imgurl'];?>
" class="previewimg">
        <?php }else{ ?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/prof_no_img.png" alt="">
        <?php }?>
        
           
           </div>
           <div class="replayDivRight">
           <h4><b><?php echo $_smarty_tpl->tpl_vars['child']->value['profile_name'];?>
</b></h4>
            <div class="postedDate"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['child']->value['date']);?>
</div>
            <div id="comment_div_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['child']->value['comment']);?>
</div>
            <div id="edit_div_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" class="editCommentBkl" style="display:none">
              <textarea id="edit_text_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['child']->value['comment'];?>
</textarea>
              <div class="clear" style="height:12px"></div>
              <span class="btnlayout">
              <input type="button" id="updatebtn_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" name="updatebtn_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" value="Update" onclick="update_comment(<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
)"/>
              </span>
            </div>
            <span style="cursor:pointer" class="commtLinks" onclick="edit_comment(<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
)" > Edit</span><span onclick="delete_comment(<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
)" class="commtLinks" style="cursor:pointer" >Delete</span>
            </div>
            <div class="clear"></div>
			</div>
             <?php } ?> </div>
          <?php }?> </div>
          <div class="clear" style="height:15px"></div>
        <span style="cursor:pointer" class="commtLinks" onclick="edit_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)">Edit</span><span  onclick="delete_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)" class="commtLinks" style="cursor:pointer" >Delete</span> </li>
       <?php }
if (!$_smarty_tpl->tpl_vars['comments']->_loop) {
?>
       No comments.
      <?php } ?>
    </ul>
    <?php }else{ ?>
    No comments.
    <?php }?></div>
</div>
<?php }} ?>