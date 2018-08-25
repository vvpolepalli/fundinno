{literal} 
<script type="text/javascript">
var baseurl='{/literal}{$baseurl}{literal}';
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
</script>{/literal}
<input type="hidden" id="hid_proj_id" name="hid_proj_id" value="{$proj_id}"/>
<div class="shadow_outer">
  <div class="shadow_inner" > {if $admin_comments|@count gt 0}
    <ul>
      {foreach from=$admin_comments item=comments}
      <li class="userComent" id="prof_{$comments.user_id}"> {if $comments.profile_image neq ''} <div class="userImgBlk"><img title="{$comments.profile_name}" src="{$baseurl}uploads/site_users/thumb/{$comments.profile_image}" class="previewimg"></div>{else} <div class="userImgBlk"><img title="{$comments.profile_name}" src="{$baseurl}images/no_image.png" class="previewimg"></div> {/if}
        <div class="commentBlk"><h4>{$comments.profile_name}</h4>
          <div class="postedDate">{$comments.date|date_format}</div>
          <div id="comment_div_{$comments.id}">{$comments.comment|nl2br}</div>
          <div id="edit_div_{$comments.id}" style="display:none">
            <textarea id="edit_text_{$comments.id}" >{$comments.comment}</textarea>
            <input type="button" id="updatebtn_{$comments.id}" name="updatebtn_{$comments.id}" value="Update" onclick="update_comment({$comments.id})"/>
          </div>
           <div class="clear"></div>
        </div>
        <span style="cursor:pointer" class="commtLinks" onclick="edit_comment({$comments.id})">Edit</span> <span class="commtLinks" onclick="delete_comment({$comments.id})" style="cursor:pointer" >Delete</span> 
         <div class="clear"></div>
        </li>
      {/foreach}
    </ul>
    {/if}
    <textarea id="comment" name="comment" style="height:145px;margin-bottom:9px"></textarea>
    <div class="clear"></div>
    <span class="btnlayout">
          <input type="button" id="post_comment" name="post_comment" class="button" value="Post" onclick="post_admin_comment({$proj_id})"/>
       </span>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
