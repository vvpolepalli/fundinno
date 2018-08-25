<?php /* Smarty version Smarty-3.1.8, created on 2013-02-22 16:36:39
         compiled from "/var/www/fundinnovations/application/views/profile/current_projects_funded.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201025141750e43b9442fa62-20657564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f86665934ba5deae2130e10cef94bad4ae0a8cb' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/current_projects_funded.tpl',
      1 => 1361531144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201025141750e43b9442fa62-20657564',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e43b944df776_07311339',
  'variables' => 
  array (
    'baseurl' => 0,
    'startp' => 0,
    'projects_list_cnt' => 0,
    'current_projects_funded' => 0,
    'list_count' => 0,
    'pr' => 0,
    'class' => 0,
    'status' => 0,
    'width' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e43b944df776_07311339')) {function content_50e43b944df776_07311339($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.truncate.php';
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
	</script> 

<div class="creative">
  <div class="contentPane  contentPaneNoSLide contentPaneTab" >
    <ul>
   <!-- <input type="hidden" name="hid_startp" id="hid_startp" value="<?php echo $_smarty_tpl->tpl_vars['startp']->value;?>
" />-->
    <input type="hidden" name="hid_projects_list_cnt" id="hid_projects_list_cnt" value="<?php echo $_smarty_tpl->tpl_vars['projects_list_cnt']->value;?>
" />
      <?php $_smarty_tpl->tpl_vars["list_count"] = new Smarty_variable(1, null, 0);?>
       <?php  $_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['current_projects_funded']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->key => $_smarty_tpl->tpl_vars['pr']->value){
$_smarty_tpl->tpl_vars['pr']->_loop = true;
?>
      <li  <?php if ($_smarty_tpl->tpl_vars['list_count']->value%3==0){?> class="rightaligned" <?php }?>>
        <div class="article">
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
          <!--<div class="fundStatus <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</div>-->
          
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['pr']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['pr']->value['project_title'];?>
</a></h4>
            <div class="innovatorName">Innovator : <span><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['pr']->value['user_id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['pr']->value['profile_name'];?>
</a></span></div>
            <div class="right"><?php echo ucwords($_smarty_tpl->tpl_vars['pr']->value['category_name']);?>
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
              <?php if ($_smarty_tpl->tpl_vars['status']->value=='ongoing'){?>
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php if ($_smarty_tpl->tpl_vars['pr']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['pr']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?></span>
               <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['status']->value=='success'){?>
                   <h4>successful</h4>
                   <?php }else{ ?>
                   <h4>unsuccessful</h4>
                   <?php }?>
                <?php }?>
                <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php if ($_smarty_tpl->tpl_vars['pr']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['pr']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?></span>--></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
          <div class="valueCont"><span class="title txtUpper">Supported amount:</span>
              <span class="WebRupee">Rs</span>  <span class="amt"><?php echo $_smarty_tpl->tpl_vars['pr']->value['backed_by_user'];?>
</span></div>
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
</div><?php }} ?>