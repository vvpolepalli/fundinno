<?php /* Smarty version Smarty-3.1.8, created on 2013-03-06 14:00:39
         compiled from "/var/www/fundinnovations/application/views/profile/innovation_history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100329653250e54f3f5ca507-18946384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8c37f2d8e435198af13e8136a034429176d9cb4' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/innovation_history.tpl',
      1 => 1362558626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100329653250e54f3f5ca507-18946384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e54f3f6d4cd5_30074526',
  'variables' => 
  array (
    'baseurl' => 0,
    'startp' => 0,
    'projects_list_cnt' => 0,
    'projects_innovated' => 0,
    'list_count' => 0,
    'pr' => 0,
    'class' => 0,
    'status' => 0,
    'width' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e54f3f6d4cd5_30074526')) {function content_50e54f3f6d4cd5_30074526($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_function_math')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/function.math.php';
?>
 
<script type="text/javascript">
var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
$(document).ready(function() {
	 $( ".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });
});
function delete_project(){
	var pid=$('#hid_pr_id').val();
	$.ajax({
		type: "POST",
		url: baseurl+"user/delete_project",
		data: "proj_id="+pid, 
		success: function(msg){
			close_pop('alert_popup');
			load_page('innovation_history','#lnk2');
			}
		});
}
function delete_project_pop(pid){
	$('#hid_pr_id').val(pid);
	$('#alert_popup').show();
	openpPopup();
}
 function close_pop(id){
	 $('#'+id).hide();
	 closepPopup();
 	}
	
	</script> 


<div  class="creative">
  <div class="contentPane contentPaneNoSLide contentPaneTab">
    <ul >
     <!-- <input type="hidden" name="hid_startp" id="hid_startp" value="<?php echo $_smarty_tpl->tpl_vars['startp']->value;?>
" />
      <input type="hidden" name="hid_projects_list_cnt" id="hid_projects_list_cnt" value="<?php echo $_smarty_tpl->tpl_vars['projects_list_cnt']->value;?>
" />-->
       <?php $_smarty_tpl->tpl_vars["list_count"] = new Smarty_variable(1, null, 0);?>
       <?php  $_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects_innovated']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->key => $_smarty_tpl->tpl_vars['pr']->value){
$_smarty_tpl->tpl_vars['pr']->_loop = true;
?>
      <li  <?php if ($_smarty_tpl->tpl_vars['list_count']->value%3==0){?> class="rightaligned" <?php }?> >
        <div class="article">
         	 <?php if ($_smarty_tpl->tpl_vars['pr']->value['status']=='incomplete'){?>
             <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('incompleted', null, 0);?>
               <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('incompleted', null, 0);?>
             <?php }elseif($_smarty_tpl->tpl_vars['pr']->value['status']=='rejected'){?>
             <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('rejected', null, 0);?>
               <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('rejected', null, 0);?>
              <?php }elseif($_smarty_tpl->tpl_vars['pr']->value['status']=='pending'){?>
             <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('pending', null, 0);?>
               <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('pending', null, 0);?>
             <?php }else{ ?>
         <?php if ($_smarty_tpl->tpl_vars['pr']->value['remaining_days']>0){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('ongoing', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('ongoing', null, 0);?>
        <?php }elseif($_smarty_tpl->tpl_vars['pr']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['pr']->value['pledged_amount']>=$_smarty_tpl->tpl_vars['pr']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('sucess', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('success', null, 0);?>
       <?php }elseif($_smarty_tpl->tpl_vars['pr']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['pr']->value['pledged_amount']<$_smarty_tpl->tpl_vars['pr']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('unsucess', null, 0);?>
       <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('unsucess', null, 0);?>
       <?php }?>
       <?php }?>
          <div class="fundStatus <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</div>
          <div class="imgPane"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['pr']->value['project_image'];?>
" alt="title">
          <div class="viewEditBlk" <?php if ($_smarty_tpl->tpl_vars['class']->value=='incompleted'||$_smarty_tpl->tpl_vars['class']->value=='rejected'||$_smarty_tpl->tpl_vars['class']->value=='pending'){?><?php }else{ ?>style="padding-left:103px;"<?php }?>>
           <table cellpadding="0" cellspacing="0" align="left" border="0" width="100">
           <tr valign="middle" align="center">
           <?php if ($_smarty_tpl->tpl_vars['class']->value=='incompleted'||$_smarty_tpl->tpl_vars['class']->value=='rejected'||$_smarty_tpl->tpl_vars['class']->value=='pending'){?>
            <td align="left"><a class="editvipopLink" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
">View</a></td>
            <td align="right"><a class="editvipopLink" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project/<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
">edit</a></td>
            <?php }else{ ?>
               <td align="right"><a class="editvipopLink" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
">View</a></td>
          <!--  <td align="right"><a class="editvipopLink" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
project/innovate_project/<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
">edit</a></td>-->
            <?php }?>
           </tr> 
           </table>
          </div>
          
          </div>
          <div class="innerContent">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['pr']->value['project_title'];?>
</a></h4>
            <div class="innovatorName">Innovator : <span><?php echo ucwords($_smarty_tpl->tpl_vars['pr']->value['profile_name']);?>
</span></div>
            <div class="right"><?php echo $_smarty_tpl->tpl_vars['pr']->value['category_name'];?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['pr']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo stripslashes(smarty_modifier_truncate($_smarty_tpl->tpl_vars['pr']->value['short_description'],100));?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['pr']->value['backd_per'],'y'=>234,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>234){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(234, null, 0);?>
            <?php }?>
            <div class="progressBar" >
              <div <?php if ($_smarty_tpl->tpl_vars['width']->value==0){?> class="progressBarPer progressBarPer-empty"<?php }else{ ?> class="progressBarPer" <?php }?> style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" ></div>
              <span class="progressPer"><?php echo $_smarty_tpl->tpl_vars['pr']->value['backd_per'];?>
%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt"><?php echo $_smarty_tpl->tpl_vars['pr']->value['funding_goal'];?>
</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['pr']->value['backers_cnt'];?>
</span></div>
              <div class="valueCont">
              <?php if ($_smarty_tpl->tpl_vars['status']->value=='ongoing'||$_smarty_tpl->tpl_vars['pr']->value['status']=='incomplete'||$_smarty_tpl->tpl_vars['pr']->value['status']=='pending'||$_smarty_tpl->tpl_vars['pr']->value['status']=='rejected'){?>
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">
                <?php if ($_smarty_tpl->tpl_vars['pr']->value['remaining_days']<0||$_smarty_tpl->tpl_vars['pr']->value['remaining_days']==''){?>
              <?php if ($_smarty_tpl->tpl_vars['pr']->value['created_date']==''||$_smarty_tpl->tpl_vars['pr']->value['created_date']=='0000-00-00 00:00:00'){?>-<?php }?>
              <?php }else{ ?>
              <?php if ($_smarty_tpl->tpl_vars['pr']->value['remaining_days']>$_smarty_tpl->tpl_vars['pr']->value['fund_duration']){?>
              -
              <?php }else{ ?>
              <?php echo $_smarty_tpl->tpl_vars['pr']->value['remaining_days'];?>

              <?php }?>
              <?php }?>
                <!--<?php if ($_smarty_tpl->tpl_vars['pr']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['pr']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?>-->
                </span>
               <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['status']->value=='success'){?>
                   <h4>successful</h4>
                   <?php }else{ ?>
                   <h4>unsuccessful</h4>
                   <?php }?>
                <?php }?>
              <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php if ($_smarty_tpl->tpl_vars['pr']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['pr']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?></span>-->
                </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div> 

        </div> 
        <div class="btm"></div>
    <!--<?php if ($_smarty_tpl->tpl_vars['pr']->value['status']=='incomplete'){?><a href="javascript:void(0);" class="removeBtn" id="deleteProj" onClick="delete_project_pop(<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
)"><span class="spriteImg removeIco"></span>Delete Project</a><?php }?>-->
      </li>
      <?php $_smarty_tpl->tpl_vars["list_count"] = new Smarty_variable($_smarty_tpl->tpl_vars['list_count']->value+1, null, 0);?>
      <?php }
if (!$_smarty_tpl->tpl_vars['pr']->_loop) {
?>
      <div class="no_results">
         No results found.
      </div>
     
      <?php } ?> 
     
    </ul>
     <div class="clear"></div>
  </div> 
  <div class="clear"></div>
</div> 

<div id="alert_popup" class="popFixed" style="display:none">
<div class="popabs">
<div id="inlineContent2" class="white_content">
		<div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('alert_popup')">Close</a>
        <input type="hidden" id="hid_pr_id" name="hid_pr_id" value="" />
<div class="popTitle">
				
				<h4>Are you sure you want delete this project.</h4></div>
				<div id="alert_pop_cntnt"  class="prodeForm"> 
                
			<div class="submitPane">
						<ul>
					<li style="border-left: 0px none;">
								<input type="button" onclick="delete_project()" value="Confirm" class="blueBtn" name="confirm" id="confirm">
							</li>
					<li>
								<input type="button" onclick="close_pop('alert_popup')" value="Cancel" class="grayBtn" name="cancel" id="cancel">
							</li>
				</ul><div class="clear"></div>
					</div>
                    <div class="clear"></div>
			</div>
			
</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<?php }} ?>