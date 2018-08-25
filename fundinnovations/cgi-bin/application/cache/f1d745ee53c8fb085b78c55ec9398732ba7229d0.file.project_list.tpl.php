<?php /* Smarty version Smarty-3.1.8, created on 2013-04-01 23:15:53
         compiled from "/home/fundinno/public_html/application/views/projects/project_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:952575851515a69891f12a8-18806776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1d745ee53c8fb085b78c55ec9398732ba7229d0' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/project_list.tpl',
      1 => 1361530710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '952575851515a69891f12a8-18806776',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'startp' => 0,
    'projects_list_cnt' => 0,
    'projects_list' => 0,
    'list_count' => 0,
    'pr' => 0,
    'class' => 0,
    'status' => 0,
    'width' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515a69894b0ac5_38178887',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515a69894b0ac5_38178887')) {function content_515a69894b0ac5_38178887($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_function_math')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/function.math.php';
?> 
<script type="text/javascript">
var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
$(document).ready(function() {
	/* $( ".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });
	var startp 		= '<?php echo $_smarty_tpl->tpl_vars['startp']->value;?>
';
	var limitp		= 3;
	//alert(startp)
	var project_cnt = '<?php echo $_smarty_tpl->tpl_vars['projects_list_cnt']->value;?>
';
	project_cnt=parseInt(project_cnt);
	if(project_cnt!=0) {
				$("#Pagination").css('display','block');
				// Create pagination element
				$("#Pagination").pagination(project_cnt, {
				num_edge_entries: 2,
				num_display_entries: 5,
				callback: pageselectCallbackSearch,
				items_per_page:3//,
				//current_page:hidCurrP-1
				});	
			}
			else {
				$("#Pagination").css('display','none');
			}*/
			
	/*** pageselectCallback ****/				
		
		/*** End pageselectCallback ****/
});
	</script> 

<div class="creative" style="width:1136px">
  <div class="contentPane contentPaneNoSLide">
    <ul>
    <input type="hidden" name="hid_startp" id="hid_startp" value="<?php echo $_smarty_tpl->tpl_vars['startp']->value;?>
" />
    <input type="hidden" name="hid_projects_list_cnt" id="hid_projects_list_cnt" value="<?php echo $_smarty_tpl->tpl_vars['projects_list_cnt']->value;?>
" />
      <?php $_smarty_tpl->tpl_vars["list_count"] = new Smarty_variable(1, null, 0);?>
      <?php  $_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->key => $_smarty_tpl->tpl_vars['pr']->value){
$_smarty_tpl->tpl_vars['pr']->_loop = true;
?>
      <li <?php if ($_smarty_tpl->tpl_vars['list_count']->value%3==0){?> class="rightaligned" <?php }?> >
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
"><?php echo ucwords($_smarty_tpl->tpl_vars['pr']->value['profile_name']);?>
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
              <div style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" <?php if ($_smarty_tpl->tpl_vars['width']->value==0){?> class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"<?php }else{ ?> class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" <?php }?>   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
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
<?php }else{ ?>0<?php }?></span>-->
               <!-- <span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['pr']->value['remaining_days'];?>
</span>-->
                </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      </li>
       <?php if ($_smarty_tpl->tpl_vars['list_count']->value%3==0){?><li class="clearBotNoslideBorder" ></li><?php }?>
      <?php $_smarty_tpl->tpl_vars["list_count"] = new Smarty_variable($_smarty_tpl->tpl_vars['list_count']->value+1, null, 0);?>
      <?php }
if (!$_smarty_tpl->tpl_vars['pr']->_loop) {
?>
       <div class="no_results">
         No results found. Please change your criteria and try.
      </div>
     
      <?php } ?> 
    
    </ul>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<?php }} ?>