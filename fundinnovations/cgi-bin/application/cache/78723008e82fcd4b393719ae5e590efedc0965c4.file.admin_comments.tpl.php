<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 00:39:25
         compiled from "/home/fundinno/public_html/application/views/admin/projects/admin_comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1718928783515bce9d815e67-86628135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78723008e82fcd4b393719ae5e590efedc0965c4' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/projects/admin_comments.tpl',
      1 => 1360590928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1718928783515bce9d815e67-86628135',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'admin_comments' => 0,
    'comments' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bce9d9767b5_85404238',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bce9d9767b5_85404238')) {function content_515bce9d9767b5_85404238($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
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
			 $("#tabs").tabs( "load", 4 );
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
			 $("#tabs").tabs( "load", 4 );
			//$('#comment_div_'+comment_id).show();
			//$('#edit_div_'+comment_id).hide();
			}
		});
	}
}
function post_admin_comment(project_id){
	//var proj_id= $('#hid_proj_id').val();
		var comment=$.trim($('#comment').val());
		$.ajax({		
		type: "POST",
		url: baseurl+"admin/project/post_admin_comment", 
		data:"comment="+comment+"&proj_id="+project_id,
		success: function(msg){
			 $("#tabs").tabs( "load", 4 );
			//$('#comment_div_'+comment_id).show();
			//$('#edit_div_'+comment_id).hide();
			}
		});
	
}
</script>
<input type="hidden" id="hid_proj_id" name="hid_proj_id" value="<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
"/>
<div class="shadow_outer">
  <div class="shadow_inner" > <?php if (count($_smarty_tpl->tpl_vars['admin_comments']->value)>0){?>
    <ul>
      <?php  $_smarty_tpl->tpl_vars['comments'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comments']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admin_comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comments']->key => $_smarty_tpl->tpl_vars['comments']->value){
$_smarty_tpl->tpl_vars['comments']->_loop = true;
?>
      <li class="userComent" id="prof_<?php echo $_smarty_tpl->tpl_vars['comments']->value['user_id'];?>
"> <?php if ($_smarty_tpl->tpl_vars['comments']->value['profile_image']!=''){?> <div class="userImgBlk"><img title="<?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/site_users/thumb/<?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_image'];?>
" class="previewimg"></div><?php }else{ ?> <div class="userImgBlk"><img title="<?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/no_image.png" class="previewimg"></div> <?php }?>
        <div class="commentBlk"><h4><?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_name'];?>
</h4>
          <div class="postedDate"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comments']->value['date']);?>
</div>
          <div id="comment_div_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['comments']->value['comment']);?>
</div>
          <div id="edit_div_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" style="display:none">
            <textarea id="edit_text_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['comments']->value['comment'];?>
</textarea>
            <input type="button" id="updatebtn_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" name="updatebtn_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" value="Update" onclick="update_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)"/>
          </div>
           <div class="clear"></div>
        </div>
        <span style="cursor:pointer" class="commtLinks" onclick="edit_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)">Edit</span> <span class="commtLinks" onclick="delete_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)" style="cursor:pointer" >Delete</span> 
         <div class="clear"></div>
        </li>
      <?php } ?>
    </ul>
    <?php }?>
    <textarea id="comment" name="comment" style="height:145px;margin-bottom:9px"></textarea>
    <div class="clear"></div>
    <span class="btnlayout">
          <input type="button" id="post_comment" name="post_comment" class="button" value="Post" onclick="post_admin_comment(<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
)"/>
       </span>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<?php }} ?>