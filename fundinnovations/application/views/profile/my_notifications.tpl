{literal}
<script type="application/javascript">
$(document).ready(function() {
	
	var res='{/literal}{$update_notify}{literal}';
	if(res == 'updated'){
		setTimeout(function(){
		$('.msgLi').hide();
		},3000);
	}
});
function close_pop(id){
	 $('#'+id).hide();
	 $('#pop_cntnt').empty();
 	}
</script>
{/literal}

<section class="innerMidWrap funding_EditP">
  <div class="innerMidContent">
  {if $update_notify eq 'updated'}
           <div class="msgLi">
            <div class="mini-success">Successfully updated.</div>
           </div> 
        {/if}
      <div class="funding_tabEditP">
      <ul class="fundTab">
        <li><a  href="{$baseurl}user/edit_profile">Edit profile<span class="arrow"></span></a></li>
        <li><a  href="{$baseurl}user/account_settings" >Account Settings<span class="arrow"></span></a></li>
        <li><a class="active" href="{$baseurl}user/my_notifications" >My Notifications<span class="arrow"></span></a></li>
        
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
   <div id="ajx_load_cntnt">
    <div class="prodeForm">
    <form id="frm_notifn" name="frm_notifn" action="{$baseurl}user/my_notifications" method="post" >
    <ul class="left">
        <h5>My Notifications</h5>
        <label>Notify me by email when: </label>
        <ul >
          <li>
            <input type="checkbox"  id="follower" name="follower" {if $notifications.new_follower eq 1} checked="checked"{/if} value="new_follower"> I get new followers.
          </li>
          <li>
             <input type="checkbox"  id="funded" name="funded" {if $notifications.others_funded eq 1} checked="checked"{/if}  value="others_funded"> Others fund my supported projects.
            
          </li>
          <li>
          <input type="checkbox"  id="comments" name="comments" {if $notifications.new_comments eq 1} checked="checked"{/if}  value="comments_recieve"> New comments received.
          </li>
          <li>
           <input type="checkbox"  id="project_update" name="project_update"  {if $notifications.project_update eq 1} checked="checked"{/if} value="update_project"> A project I supported has been updated.
          </li>
          
        </ul>
         <label>Newsletter: </label>
          <ul >
          <li>
            <input type="checkbox"  id="newsletter" name="newsletter" {if $notifications.news_letter  eq 1} checked="checked"{/if} value="news_letter"> Subscribe newsletter.
          </li>
          </ul>
         <div class="clear"></div>
        <div class="submitPane">
          <ul>
            <li class="blueBtnLi">
              <input type="submit" class="blueBtn" id="save" name="save"  value="Save">
              
            </li>
          </ul>
        </div>
        </ul>
        </form>
        <div class="clear"></div>
      </div>
   
    <div class="clear"></div>
</div>
      
   
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>
