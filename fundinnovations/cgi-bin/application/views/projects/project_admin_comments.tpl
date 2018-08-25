{literal} 
<script type="text/javascript">
var baseurl='{/literal}{$baseurl}{literal}';

function post_comment(proj_id){
	var comment= $('#post_text_'+proj_id).val();
	if(comment !=''){
		
		$.ajax({
			type: "POST",
			url: baseurl+"archive_projects/post_comment", 
			data:"proj_id="+proj_id+"&comment="+comment+'&type=admin',
			success: function(msg){
				 window.location.reload();
				}
		});
	}
	else{
		$('#pop_cntnt').html('Please enter the comment.');
		$('#alert_popup').show();openpPopup();
		}
}
function close_pop(id){
	 $('#'+id).hide();
	 $('#pop_cntnt').empty();
 	}
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
		url: baseurl+"project/update_project_comment", 
		data:"comment_id="+comment_id+"&proj_id="+proj_id+"&comment="+comment,
		success: function(msg){
			// $("#tabs").tabs( "load", 3 );
			window.location.reload();
			//$('#comment_div_'+comment_id).show();
			//$('#edit_div_'+comment_id).hide();
			}
		});
	}
	else
	{
	$('#pop_cntnt').html('Please enter the comment...!');
	$('#alert_popup').show();
	}
	
}
function confirm_pop(id){
		$('#alert_delete_popup').show();openpPopup();
		$('#hid_comment_id').val(id);
		///$('#confirm').attr('onclick',"remove_img('"+id+"')");
	}
function delete_comment(){
	var comment_id = $('#hid_comment_id').val();
	var proj_id= $('#hid_proj_id').val();
		$.ajax({		
		type: "POST",
		url: baseurl+"project/delete_project_comment", 
		data:"comment_id="+comment_id+"&proj_id="+proj_id,
		success: function(msg){
			window.location.reload();
			// $("#tabs").tabs( "load", 3 );
			//$('#comment_div_'+comment_id).show();
			//$('#edit_div_'+comment_id).hide();
			}
		});
		
}
</script>{/literal}
<section class="innerMidWrap">
	<ul class="innerMidTab">
		<li><a href="{$baseurl}archive_projects/project_details/{$proj_id}">Project Details</a></li>
    <li><a href="{$baseurl}archive_projects/project_backers/{$proj_id}">Supporters <span class="value">({$project_det_counts.backers_cnt})</span></a></li>
    <li><a href="{$baseurl}archive_projects/project_videos/{$proj_id}">Videos <span class="value">({$project_det_counts.videos_cnt})</span></a></li>
    <li><a href="{$baseurl}archive_projects/project_images/{$proj_id}">Images <span class="value">({$project_det_counts.images_cnt+1})</span></a></li>
    <li><a  href="{$baseurl}archive_projects/project_comments/{$proj_id}">Comments <span class="value">({$project_det_counts.comments_cnt})</span> </a> </li>
    {if $project_status.project_status eq 'success'}
    <li><a href="{$baseurl}archive_projects/project_updates/{$proj_id}">Project Updates </a></li>{/if}
    {if $project_status.user_id eq $user_id && $user_id neq ''}
		<li><a class="active" href="{$baseurl}archive_projects/project_admin_commets/{$proj_id}">Admin Comments<span class="value">({$project_det_counts.admin_comments_cnt})</span><span class="arrowtabs arrowComment"></span></a></li>{/if}
           
	</ul>
	<div class="clear"></div>
	<div class="innerMidContent">
		<div class="bakersBlock">
        <input type="hidden" id="hid_proj_id" name="hid_proj_id" value="{$proj_id}"/>
        {if $user_id eq ''}<b>Please <a href="{$baseurl}signin">Login</a> to leave comment</b>{/if}
      {if $proj_comments|@count gt 0}
      {foreach from=$proj_comments item=comments}
			<div class="userComent" id="cmnt_{$comments.id}">
				<div class="userImgBlk"> 
        {if $comments.profile_image neq ''}
        		<img title="{$comments.profile_name}" src="{$baseurl}uploads/site_users/thumb/{$comments.profile_image}" >
        {else}
       			<img src="{$baseurl}images/prof_no_img.png" alt="">
        {/if}
       </div>
				<div class="commentBlk">
					<h4> {$comments.profile_name|ucwords}</h4>
					<div class="postedDate">{$comments.date|date_format}</div>
                    <div id="comment_div_{$comments.id}">{$comments.comment|nl2br}</div>
                    {if $comments.user_id eq $user_id}
          <div id="edit_div_{$comments.id}" class="editCommentBkl" style="display:none">
            <textarea id="edit_text_{$comments.id}" class="postReplyPaneTxtarea">{$comments.comment|stripslashes}</textarea>
            <div class="clear" style="height:12px"></div>
            <span class="btnlayout">
            <input type="button" id="updatebtn_{$comments.id}" class="updateBtnP" name="updatebtn_{$comments.id}" value="Update" onclick="update_comment({$comments.id})"/>
            </span>
          </div>
          <div class="clear" style="height:12px"></div>
          <span id="edit_{$comments.id}" onclick="edit_comment({$comments.id})" style="cursor:pointer">Edit</span> | 
          <span id="delete_{$comments.id}"  onclick="confirm_pop({$comments.id})" style="cursor:pointer">Delete</span>
          {/if}
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
            
			
            {/foreach}
      {/if}
			 {if $user_id neq ''}
			<div class="postReplyPane postReplyPanelarge">
				<div class="userImgBlk"><img src="{$baseurl}images/no_img.jpg" alt="" width="55"></div>
				<div class="commentBlk">
                 <textarea class="postReplyPaneTxtarea adminTxtArea" id="post_text_{$proj_id}"></textarea>
					
					<div class="moreProBtnPane "><a href="javascript:void(0);" onClick="post_comment({$proj_id})">post</a> </div>
				</div>
				<div class="clear"></div>
			</div>
             {/if}
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</section>

<div id="alert_popup" style="display:none">
<div id="inlineContent1" class="white_content">
  <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick = "close_pop('alert_popup');closepPopup();">Close</a>
    <div >
    <div class="popTitle"><h4 id="head_cntnt">Alert</h4></div>
      <div id="pop_cntnt" class="prodeForm"></div>
     
      </div>
  </div>
  <div class="clear"></div>
</div>
<div id="fade" class="black_overlay"></div>
</div>

<div id="alert_delete_popup"  class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('alert_delete_popup')">Close</a>
      <div class="popTitle">
        <h4>Are you sure you want delete this coment.</h4></div>
          <input type="hidden" id="hid_comment_id" name="hid_comment_id" value="" />
        <div id="alert_del_pop_cntnt" class="prodeForm">
        <div class="submitPane">
       <ul>
                    <li style="border-left: 0px none;">
            <input type="button" onclick="delete_comment()" value="Confirm" class="blueBtn" name="confirm" id="confirm">
          </li>
          <li>
            <input type="button" onclick="close_pop('alert_delete_popup')" value="Cancel" class="grayBtn" name="cancel" id="cancel">
          </li>
                  
        </ul>
         </div>
         <div class="clear"></div>
        </div>
      
    </div>
    <div class="clear"></div>
  </div>
 </div>
</div>