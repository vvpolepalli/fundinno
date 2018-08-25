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
</script>{/literal}
<input type="hidden" id="hid_proj_id" name="hid_proj_id" value="{$proj_id}"/>
<div class="shadow_outer">
  <div class="shadow_inner" > {if $proj_comments|@count gt 0}
    <ul>
      {foreach from=$proj_comments item=comments}
      <li class="userComent" id="prof_{$comments.id}"><div class="userImgBlk">
     {if $comments.profile_imgurl neq ''}
      <img title="{$comments.profile_name}" src="{$comments.profile_imgurl}" class="previewimg">
        {else}
        <img src="{$baseurl}images/prof_no_img.png" alt="">
        {/if}
        </div>
        <div class="commentBlk"><div style="border:1px solid #ccc; padding:10px; margin-bottom:10px"><h4><b>{$comments.profile_name}</b></h4>
          <div class="postedDate">{$comments.date|date_format}</div>
          <div id="comment_div_{$comments.id}">{$comments.comment|nl2br}</div>
          <div id="edit_div_{$comments.id}" class="editCommentBkl" style="display:none">
            <textarea id="edit_text_{$comments.id}" >{$comments.comment}</textarea>
            <div class="clear" style="height:12px"></div>
            <span class="btnlayout">
            <input type="button" id="updatebtn_{$comments.id}" name="updatebtn_{$comments.id}" value="Update" onclick="update_comment({$comments.id})"/>
            </span>
          </div> <div class="clear"></div></div>
          {if $comments.child_comments neq 0}
		   <div class="clear"></div>
          <div class="replayDiv"> {foreach from =$comments.child_comments item= child}
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px">  <div class="replayDivImg">
           {if $child.profile_imgurl neq ''}
      <img title="{$child.profile_name}" src="{$child.profile_imgurl}" class="previewimg">
        {else}
        <img src="{$baseurl}images/prof_no_img.png" alt="">
        {/if}
        
           
           </div>
           <div class="replayDivRight">
           <h4><b>{$child.profile_name}</b></h4>
            <div class="postedDate">{$child.date|date_format}</div>
            <div id="comment_div_{$child.id}">{$child.comment|nl2br}</div>
            <div id="edit_div_{$child.id}" class="editCommentBkl" style="display:none">
              <textarea id="edit_text_{$child.id}" >{$child.comment}</textarea>
              <div class="clear" style="height:12px"></div>
              <span class="btnlayout">
              <input type="button" id="updatebtn_{$child.id}" name="updatebtn_{$child.id}" value="Update" onclick="update_comment({$child.id})"/>
              </span>
            </div>
            <span style="cursor:pointer" class="commtLinks" onclick="edit_comment({$child.id})" > Edit</span><span onclick="delete_comment({$child.id})" class="commtLinks" style="cursor:pointer" >Delete</span>
            </div>
            <div class="clear"></div>
			</div>
             {/foreach} </div>
          {/if} </div>
          <div class="clear" style="height:15px"></div>
        <span style="cursor:pointer" class="commtLinks" onclick="edit_comment({$comments.id})">Edit</span><span  onclick="delete_comment({$comments.id})" class="commtLinks" style="cursor:pointer" >Delete</span> </li>
       {foreachelse}
       No comments.
      {/foreach}
    </ul>
    {else}
    No comments.
    {/if}</div>
</div>
