{literal} 
<script type="text/javascript">
var baseurl='{/literal}{$baseurl}{literal}';
function reply_comment(c_id){
	var proj_id= $('#hid_proj_id').val();
	var comment= $.trim($('#reply_text_'+c_id).val());
	if(comment !=''){
		
		$.ajax({
			type: "POST",
			url: baseurl+"archive_projects/reply_comment", 
			data:"comment_id="+c_id+"&proj_id="+proj_id+"&comment="+comment,
			success: function(msg){
				 window.location.reload();
				}
		});
	}
	else{
		$('#pop_cntnt').html('Please enter the comment...!');
		$('#alert_popup').show();openpPopup();
		}
}
function post_comment(proj_id){
	var comment= $.trim($('#post_text_'+proj_id).val());
	if(comment !=''){
		
		$.ajax({
			type: "POST",
			url: baseurl+"archive_projects/post_comment", 
			data:"proj_id="+proj_id+"&comment="+comment,
			success: function(msg){
				 window.location.reload();
				}
		});
	}
	else{
		$('#pop_cntnt').html('Please enter the comment...!');
		$('#alert_popup').show();openpPopup();
		}
}
function close_pop(id){
	 $('#'+id).hide();
	 $('#pop_cntnt').empty();
	 closepPopup();
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
	$('#alert_popup').show();openpPopup();
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
		<li><a  href="{$baseurl}project/innovate_project/{$proj_id}">Project Details</a></li>
    <li><a  href="{$baseurl}project/innovate_project_videos/{$proj_id}">Videos</a></li>
    <li><a  href="{$baseurl}project/innovate_project_images/{$proj_id}">Images</a></li>
    <li><a class="active"  href="{$baseurl}project/innovate_project_comments/{$proj_id}">Comments<span class="arrowtabs"></span></a></li>
    {if $project_status.project_status eq 'success'}
   <!-- <li><a  href="{$baseurl}project/innovate_project_updates/{$proj_id}">Project Updates</a></li>-->{/if}
     <li><a  target="_blank"  href="{$baseurl}user/edit_profile">Edit Profile</a></li>
	</ul>
	<div class="clear"></div>
    <div class="innerMidContent">
    <div class="bakersBlock">
	<!--<div class="innerMidContent">-->
    {if $proj_id neq ''}
     <h5>Comments</h5>
      <input type="hidden" id="hid_proj_id" name="hid_proj_id" value="{$proj_id}"/>
       {if $user_id eq ''}<b>Please <a href="{$baseurl}signin">Login</a> to leave comment</b>{/if}
      {if $proj_comments|@count gt 0}
      {foreach from=$proj_comments item=comments}
      <div class="userComent" id="cmnt_{$comments.id}">
        <div class="userImgBlk">
        {if $comments.profile_imgurl neq ''}
        <img title="{$comments.profile_name}" src="{$comments.profile_imgurl}" >
        {else}
        <img src="{$baseurl}images/prof_no_img.png" alt="">
        {/if}</div>
        <div class="commentBlk">
          <h4>{$comments.profile_name}</h4>
          <div class="postedDate">{$comments.date|date_format}</div>
          <div id="comment_div_{$comments.id}">{$comments.comment|nl2br}</div>
          {if $comments.user_id eq $user_id}
          <div id="edit_div_{$comments.id}" class="editCommentBkl" style="display:none">
            <textarea id="edit_text_{$comments.id}" class="postReplyPaneTxtarea">{$comments.comment}</textarea>
            <div class="clear" style="height:12px"></div>
            <span class="btnlayout">
            <input type="button" class="updateBtnP" id="updatebtn_{$comments.id}" name="updatebtn_{$comments.id}" value="Update" onclick="update_comment({$comments.id})"/>
            </span>
          </div>
          <div class="clear" style="height:12px"></div>
          <span id="edit_{$comments.id}" onclick="edit_comment({$comments.id})" style="cursor:pointer">Edit</span> | 
          <span id="delete_{$comments.id}"  onclick="confirm_pop({$comments.id})" style="cursor:pointer">Delete</span>
          {/if}
        </div>
        <div class="clear"></div>
      </div>
         {if $comments.child_comments neq 0}
      <div class="commentreplyOuter">
      {foreach from =$comments.child_comments item= child}
        <div class="commentreply">
          <div class="userImgBlk">
          {if $child.profile_imgurl neq ''}
          <img style="height:55px;width:55px" title="{$child.profile_name}" src="{$child.profile_imgurl}" >
          {else}
          <img src="{$baseurl}images/no_img.jpg" alt="">
          {/if}
          </div>
          <div class="commentBlk">
            <h4>{$child.profile_name}</h4>
            <div id="comment_div_{$child.id}"> {$child.comment|nl2br}</div>
            {if $child.user_id eq $user_id}
            <div id="edit_div_{$child.id}" class="editCommentBkl" style="display:none">
              <textarea id="edit_text_{$child.id}" class="postReplyPaneTxtarea">{$child.comment}</textarea>
              <div class="clear" style="height:12px"></div>
              <span class="btnlayout">
              <input type="button" class="updateBtnP" id="updatebtn_{$child.id}" name="updatebtn_{$child.id}" value="Update" onclick="update_comment({$child.id})"/>
              </span>
            </div>
            <div class="clear" style="height:12px"></div>
             <span id="edit_{$child.id}" onclick="edit_comment({$child.id})" style="cursor:pointer">Edit</span> | 
          	<span id="delete_{$child.id}"  onclick="confirm_pop({$child.id})" style="cursor:pointer">Delete</span>
            {/if}
            </div>
          <div class="clear"></div>
        </div>
        {/foreach} 
        <div class="clear"></div>
      </div>
      {/if}
      {if $user_id neq ''}
      <div class="postReplyPane">
        <div class="userImgBlk"><img src="{$baseurl}images/no_img.jpg" alt=""></div>
        <div class="commentBlk">
          <textarea class="postReplyPaneTxtarea" id="reply_text_{$comments.id}"></textarea>
          <div class="moreProBtnPane "><a href="javascript:void(0);" onClick="reply_comment({$comments.id})">Reply</a> </div>
        </div>
        <div class="clear"></div>
      </div>
      {/if}
      <div class="clear"></div>
      {/foreach}
      {/if}
      {if $user_id neq ''}
      <div class="postReplyPane postReplyPanelarge">
        <div class="userImgBlk"><img src="{$baseurl}images/no_img.jpg" alt=""></div>
        <div class="commentBlk">
          <textarea class="postReplyPaneTxtarea" id="post_text_{$proj_id}"></textarea>
          <div class="moreProBtnPane "><a  href="javascript:void(0);" onClick="post_comment({$proj_id})">Post</a> </div>
        </div>
        <div class="clear"></div>
      </div>
       {/if}
        </div>
         <div class="clear"></div>
  </div>
		<!--<form>
			<div class="commentForm">
				<ul>
					<li>
						<h5>Comment</h5>
						<textarea class="textBoxStyle height120"></textarea>
					</li>
					<li>
						<input type="button" class="darkGrayBtn" value="Post">
					</li>
				</ul>
				<div class="hrLine1"></div>
			</div>
			
		</form>-->
        {else}
    <div class="WarMsg">Please create project first.</div>
    {/if}
		<div class="clear"></div>
	<!--</div>-->
	<div class="clear"></div>
    
</section>
<div id="alert_popup" class="popFixed" style="display:none">
<div class="popabs">
<div id="inlineContent1" class="white_content">
  <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick = "close_pop('alert_popup');closepPopup();">Close</a>
    <div class="popTitle"><h4 id="head_cntnt">Alert</h4></div>
      <div id="pop_cntnt" class="prodeForm"></div>
     
      
  </div>
  <div class="clear"></div>
</div>
</div>
</div>


<div id="alert_delete_popup" class="popFixed"  style="display:none">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('alert_delete_popup')">Close</a>
    <div>
      <div class="popTitle">
      <input type="hidden" id="hid_comment_id" name="hid_comment_id" value="" />
        <h4>Are you sure you want delete this coment..</h4>
       </div> 
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
    </div>
    <div class="clear"></div>
  </div>
  <div id="fade1" class="black_overlay"></div>
</div>