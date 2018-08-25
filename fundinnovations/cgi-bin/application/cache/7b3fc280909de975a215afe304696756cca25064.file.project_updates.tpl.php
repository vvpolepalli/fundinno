<?php /* Smarty version Smarty-3.1.8, created on 2013-02-21 13:55:40
         compiled from "/var/www/fundinnovations/application/views/admin/projects/project_updates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180853378450a0c8d0032002-94741064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b3fc280909de975a215afe304696756cca25064' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/projects/project_updates.tpl',
      1 => 1361435138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180853378450a0c8d0032002-94741064',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a0c8d00d0b44_35757281',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'project_updates' => 0,
    'comments' => 0,
    'update_privilage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a0c8d00d0b44_35757281')) {function content_50a0c8d00d0b44_35757281($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
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
		url: baseurl+"admin/project/update_proj_update", 
		data:"comment_id="+comment_id+"&proj_id="+proj_id+"&comment="+comment,
		success: function(msg){
			 $("#tabs").tabs( "load", 5 );
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

/*function delete_comment(comment_id){
	
	var proj_id= $('#hid_proj_id').val();
		$.ajax({		
		type: "POST",
		url: baseurl+"admin/project/delete_project_update", 
		data:"comment_id="+comment_id+"&proj_id="+proj_id,
		success: function(msg){
			 $("#tabs").tabs( "load", 5 );
			//$('#comment_div_'+comment_id).show();
			//$('#edit_div_'+comment_id).hide();
			}
		});
		
}*/
$('#chk_allow_comment').click(function ()
{
	var proj_id= $('#hid_proj_id').val();
	var allow='';
	if($(this).is(':checked'))
	{
		allow=1;
	}else{
		allow=0;
		}
		$.ajax({		
		type: "POST",
		url: baseurl+"admin/project/update_update_permission", 
		data:"privilage="+allow+"&proj_id="+proj_id,
		success: function(msg){
			 $("#tabs").tabs( "load", 5 );
			//$('#comment_div_'+comment_id).show();
			//$('#edit_div_'+comment_id).hide();
			}
		});
	});
	
function post_admin_update(project_id){
	//var proj_id= $('#hid_proj_id').val();
		var comment=$.trim($('#admin_update').val());
		//alert(comment);
		$.ajax({		
		type: "POST",
		url: baseurl+"admin/project/post_admin_update", 
		data:"comment="+comment+"&proj_id="+project_id,
		success: function(msg){
			 $("#tabs").tabs( "load", 5 );
			//$('#comment_div_'+comment_id).show();
			//$('#edit_div_'+comment_id).hide();
			}
		});
	
}
</script>
<input type="hidden" id="hid_proj_id" name="hid_proj_id" value="<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
"/>
<div class="shadow_outer">
  <div class="shadow_inner" > <?php if (count($_smarty_tpl->tpl_vars['project_updates']->value)>0){?>
    <ul>
    
      <?php  $_smarty_tpl->tpl_vars['comments'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comments']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_updates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comments']->key => $_smarty_tpl->tpl_vars['comments']->value){
$_smarty_tpl->tpl_vars['comments']->_loop = true;
?>
      
      <li id="prof_<?php echo $_smarty_tpl->tpl_vars['comments']->value['user_id'];?>
">
        <div> <?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_name'];?>
<br />
          
          <div id="comment_div_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['comments']->value['project_update']);?>
</div><br />
          <div id="edit_div_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" style="display:none">
            <textarea id="edit_text_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['comments']->value['project_update'];?>
</textarea>
            <input type="button" id="updatebtn_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" name="updatebtn_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" value="Update" onclick="update_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)"/>
          </div>
          <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comments']->value['date']);?>

          </div>
        <span style="cursor:pointer" onclick="edit_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)">Edit</span>
       <!-- <span  onclick="delete_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)" style="cursor:pointer" >Delete</span> -->
        </li>
      <?php } ?>
       
    </ul><?php }else{ ?>
     <textarea id="admin_update" name="admin_update"></textarea>
     <input type="button" id="post_update" name="post_update" value="Post" onclick="post_admin_update(<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
)"/>
    <?php }?>
   <br /> <input type="checkbox" id="chk_allow_comment" name="chk_allow_comment" value="allow" <?php if ($_smarty_tpl->tpl_vars['update_privilage']->value==1){?> checked <?php }?> /> Allow project owner to enter updates
    </div>
</div><?php }} ?>