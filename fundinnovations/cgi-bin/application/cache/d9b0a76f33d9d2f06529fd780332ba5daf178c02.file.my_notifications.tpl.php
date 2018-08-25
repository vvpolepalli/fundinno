<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 05:31:50
         compiled from "/home/fundinno/public_html/application/views/profile/my_notifications.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1699902448515c132655f403-28213957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9b0a76f33d9d2f06529fd780332ba5daf178c02' => 
    array (
      0 => '/home/fundinno/public_html/application/views/profile/my_notifications.tpl',
      1 => 1360669350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1699902448515c132655f403-28213957',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'update_notify' => 0,
    'baseurl' => 0,
    'notifications' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c13266440c6_97394770',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c13266440c6_97394770')) {function content_515c13266440c6_97394770($_smarty_tpl) {?>
<script type="application/javascript">
$(document).ready(function() {
	
	var res='<?php echo $_smarty_tpl->tpl_vars['update_notify']->value;?>
';
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


<section class="innerMidWrap funding_EditP">
  <div class="innerMidContent">
  <?php if ($_smarty_tpl->tpl_vars['update_notify']->value=='updated'){?>
           <div class="msgLi">
            <div class="mini-success">Successfully updated.</div>
           </div> 
        <?php }?>
      <div class="funding_tabEditP">
      <ul class="fundTab">
        <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/edit_profile">Edit profile<span class="arrow"></span></a></li>
        <li><a  href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/account_settings" >Account Settings<span class="arrow"></span></a></li>
        <li><a class="active" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/my_notifications" >My Notifications<span class="arrow"></span></a></li>
        
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
   <div id="ajx_load_cntnt">
    <div class="prodeForm">
    <form id="frm_notifn" name="frm_notifn" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/my_notifications" method="post" >
    <ul class="left">
        <h5>My Notifications</h5>
        <label>Notify me by email when: </label>
        <ul >
          <li>
            <input type="checkbox"  id="follower" name="follower" <?php if ($_smarty_tpl->tpl_vars['notifications']->value['new_follower']==1){?> checked="checked"<?php }?> value="new_follower"> I get new followers.
          </li>
          <li>
             <input type="checkbox"  id="funded" name="funded" <?php if ($_smarty_tpl->tpl_vars['notifications']->value['others_funded']==1){?> checked="checked"<?php }?>  value="others_funded"> Others fund my supported projects.
            
          </li>
          <li>
          <input type="checkbox"  id="comments" name="comments" <?php if ($_smarty_tpl->tpl_vars['notifications']->value['new_comments']==1){?> checked="checked"<?php }?>  value="comments_recieve"> New comments received.
          </li>
          <li>
           <input type="checkbox"  id="project_update" name="project_update"  <?php if ($_smarty_tpl->tpl_vars['notifications']->value['project_update']==1){?> checked="checked"<?php }?> value="update_project"> A project I supported has been updated.
          </li>
          
        </ul>
         <label>Newsletter: </label>
          <ul >
          <li>
            <input type="checkbox"  id="newsletter" name="newsletter" <?php if ($_smarty_tpl->tpl_vars['notifications']->value['news_letter']==1){?> checked="checked"<?php }?> value="news_letter"> Subscribe newsletter.
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
<?php }} ?>