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
</script>{/literal}
<input type="hidden" id="hid_proj_id" name="hid_proj_id" value="{$proj_id}"/>
<div class="shadow_outer">
  <div class="shadow_inner" > {if $project_updates|@count gt 0}
    <ul>
    
      {foreach from=$project_updates item=comments}
      
      <li id="prof_{$comments.user_id}">
        <div> {$comments.profile_name}<br />
          
          <div id="comment_div_{$comments.id}">{$comments.project_update|nl2br}</div><br />
          <div id="edit_div_{$comments.id}" style="display:none">
            <textarea id="edit_text_{$comments.id}" >{$comments.project_update}</textarea>
            <input type="button" id="updatebtn_{$comments.id}" name="updatebtn_{$comments.id}" value="Update" onclick="update_comment({$comments.id})"/>
          </div>
          {$comments.date|date_format}
          </div>
        <span style="cursor:pointer" onclick="edit_comment({$comments.id})">Edit</span>
       <!-- <span  onclick="delete_comment({$comments.id})" style="cursor:pointer" >Delete</span> -->
        </li>
      {/foreach}
       
    </ul>{else}
     <textarea id="admin_update" name="admin_update"></textarea>
     <input type="button" id="post_update" name="post_update" value="Post" onclick="post_admin_update({$proj_id})"/>
    {/if}
   <br /> <input type="checkbox" id="chk_allow_comment" name="chk_allow_comment" value="allow" {if $update_privilage eq 1} checked {/if} /> Allow project owner to enter updates
    </div>
</div>