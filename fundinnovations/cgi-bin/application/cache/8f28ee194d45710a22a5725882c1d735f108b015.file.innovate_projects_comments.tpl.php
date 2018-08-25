<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 22:12:50
         compiled from "/home/fundinno/public_html/application/views/projects/innovate_projects_comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1979616681515bac4236ac53-27403861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f28ee194d45710a22a5725882c1d735f108b015' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/innovate_projects_comments.tpl',
      1 => 1360672402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1979616681515bac4236ac53-27403861',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'project_status' => 0,
    'user_id' => 0,
    'proj_comments' => 0,
    'comments' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bac42678ae7_85574558',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bac42678ae7_85574558')) {function content_515bac42678ae7_85574558($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?> 
<script type="text/javascript">
var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
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
    <li><a class="active"  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project_comments/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Comments<span class="arrowtabs"></span></a></li>
    <?php if ($_smarty_tpl->tpl_vars['project_status']->value['project_status']=='success'){?>
   <!-- <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project_updates/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
">Project Updates</a></li>--><?php }?>
     <li><a  target="_blank"  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/edit_profile">Edit Profile</a></li>
	</ul>
	<div class="clear"></div>
    <div class="innerMidContent">
    <div class="bakersBlock">
	<!--<div class="innerMidContent">-->
    <?php if ($_smarty_tpl->tpl_vars['proj_id']->value!=''){?>
     <h5>Comments</h5>
      <input type="hidden" id="hid_proj_id" name="hid_proj_id" value="<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
"/>
       <?php if ($_smarty_tpl->tpl_vars['user_id']->value==''){?><b>Please <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
signin">Login</a> to leave comment</b><?php }?>
      <?php if (count($_smarty_tpl->tpl_vars['proj_comments']->value)>0){?>
      <?php  $_smarty_tpl->tpl_vars['comments'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comments']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['proj_comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comments']->key => $_smarty_tpl->tpl_vars['comments']->value){
$_smarty_tpl->tpl_vars['comments']->_loop = true;
?>
      <div class="userComent" id="cmnt_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
">
        <div class="userImgBlk">
        <?php if ($_smarty_tpl->tpl_vars['comments']->value['profile_imgurl']!=''){?>
        <img title="<?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_imgurl'];?>
" >
        <?php }else{ ?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/prof_no_img.png" alt="">
        <?php }?></div>
        <div class="commentBlk">
          <h4><?php echo $_smarty_tpl->tpl_vars['comments']->value['profile_name'];?>
</h4>
          <div class="postedDate"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comments']->value['date']);?>
</div>
          <div id="comment_div_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
"><?php echo nl2br($_smarty_tpl->tpl_vars['comments']->value['comment']);?>
</div>
          <?php if ($_smarty_tpl->tpl_vars['comments']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value){?>
          <div id="edit_div_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" class="editCommentBkl" style="display:none">
            <textarea id="edit_text_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" class="postReplyPaneTxtarea"><?php echo $_smarty_tpl->tpl_vars['comments']->value['comment'];?>
</textarea>
            <div class="clear" style="height:12px"></div>
            <span class="btnlayout">
            <input type="button" class="updateBtnP" id="updatebtn_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" name="updatebtn_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" value="Update" onclick="update_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)"/>
            </span>
          </div>
          <div class="clear" style="height:12px"></div>
          <span id="edit_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
" onclick="edit_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)" style="cursor:pointer">Edit</span> | 
          <span id="delete_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
"  onclick="confirm_pop(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)" style="cursor:pointer">Delete</span>
          <?php }?>
        </div>
        <div class="clear"></div>
      </div>
         <?php if ($_smarty_tpl->tpl_vars['comments']->value['child_comments']!=0){?>
      <div class="commentreplyOuter">
      <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value['child_comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
        <div class="commentreply">
          <div class="userImgBlk">
          <?php if ($_smarty_tpl->tpl_vars['child']->value['profile_imgurl']!=''){?>
          <img style="height:55px;width:55px" title="<?php echo $_smarty_tpl->tpl_vars['child']->value['profile_name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['child']->value['profile_imgurl'];?>
" >
          <?php }else{ ?>
          <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/no_img.jpg" alt="">
          <?php }?>
          </div>
          <div class="commentBlk">
            <h4><?php echo $_smarty_tpl->tpl_vars['child']->value['profile_name'];?>
</h4>
            <div id="comment_div_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"> <?php echo nl2br($_smarty_tpl->tpl_vars['child']->value['comment']);?>
</div>
            <?php if ($_smarty_tpl->tpl_vars['child']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value){?>
            <div id="edit_div_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" class="editCommentBkl" style="display:none">
              <textarea id="edit_text_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" class="postReplyPaneTxtarea"><?php echo $_smarty_tpl->tpl_vars['child']->value['comment'];?>
</textarea>
              <div class="clear" style="height:12px"></div>
              <span class="btnlayout">
              <input type="button" class="updateBtnP" id="updatebtn_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" name="updatebtn_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" value="Update" onclick="update_comment(<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
)"/>
              </span>
            </div>
            <div class="clear" style="height:12px"></div>
             <span id="edit_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" onclick="edit_comment(<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
)" style="cursor:pointer">Edit</span> | 
          	<span id="delete_<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"  onclick="confirm_pop(<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
)" style="cursor:pointer">Delete</span>
            <?php }?>
            </div>
          <div class="clear"></div>
        </div>
        <?php } ?> 
        <div class="clear"></div>
      </div>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['user_id']->value!=''){?>
      <div class="postReplyPane">
        <div class="userImgBlk"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/no_img.jpg" alt=""></div>
        <div class="commentBlk">
          <textarea class="postReplyPaneTxtarea" id="reply_text_<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
"></textarea>
          <div class="moreProBtnPane "><a href="javascript:void(0);" onClick="reply_comment(<?php echo $_smarty_tpl->tpl_vars['comments']->value['id'];?>
)">Reply</a> </div>
        </div>
        <div class="clear"></div>
      </div>
      <?php }?>
      <div class="clear"></div>
      <?php } ?>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['user_id']->value!=''){?>
      <div class="postReplyPane postReplyPanelarge">
        <div class="userImgBlk"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/no_img.jpg" alt=""></div>
        <div class="commentBlk">
          <textarea class="postReplyPaneTxtarea" id="post_text_<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
"></textarea>
          <div class="moreProBtnPane "><a  href="javascript:void(0);" onClick="post_comment(<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
)">Post</a> </div>
        </div>
        <div class="clear"></div>
      </div>
       <?php }?>
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
        <?php }else{ ?>
    <div class="WarMsg">Please create project first.</div>
    <?php }?>
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
</div><?php }} ?>