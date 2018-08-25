<?php /* Smarty version Smarty-3.1.8, created on 2013-02-21 14:36:43
         compiled from "/var/www/fundinnovations/application/views/profile/profile_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21828821850e58175dbb7e9-46732072%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c8257bb7a98954da1ec84078af4162d9d9b7989' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/profile_view.tpl',
      1 => 1361436493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21828821850e58175dbb7e9-46732072',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e58176036890_50971786',
  'variables' => 
  array (
    'baseurl' => 0,
    'profile_det' => 0,
    'projects_funded' => 0,
    'funded' => 0,
    'class' => 0,
    'status' => 0,
    'width' => 0,
    'projects_innovated' => 0,
    'innovated' => 0,
    'projects_stared' => 0,
    'stared' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e58176036890_50971786')) {function content_50e58176036890_50971786($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_function_math')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/function.math.php';
?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/jquery-ui.css" />
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-ui.js"></script>
<style type="text/css">
body {
	min-width:1142px !important;
	}
</style>
 
<script type="text/javascript">
var baseurl ="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
";
$(function() {
	/*$( ".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });*/
		
		
});

<!--carousel-->
function mycarousel_initCallback(carousel){
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });
    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
       carousel.startAuto();
    });
	};

	$(document).ready(function() {
		jQuery('#content-carousel').jcarousel({        
		auto: 2,
        wrap: 'last',
		  animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});
	$(document).ready(function() {
		jQuery('#popular-carousel').jcarousel({        
		auto: 2,
        wrap: 'last',
		  animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});});
	$(document).ready(function() {
		jQuery('#recent-carousel').jcarousel({        
		auto: 2,
        wrap: 'last',
		  animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});});
	});
<!--li style-->

			</script> 

<section class="myAccount">
	<div class="myAccountInner">
		<h4 class="font16"><?php echo $_smarty_tpl->tpl_vars['profile_det']->value['profile_name'];?>
</h4>
		<b><?php echo $_smarty_tpl->tpl_vars['profile_det']->value['cityname'];?>
</b><br>
		<span class="dateTxt">Join Date :  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['profile_det']->value['joined_date'],"%B %Y");?>
</span>
		<div class="clear"></div>
		<div class="profilePic"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['profile_det']->value['id'];?>
">
        <?php if ($_smarty_tpl->tpl_vars['profile_det']->value['profile_imgurl']!=''){?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['profile_det']->value['profile_imgurl'];?>
"  align="user">
                    <?php }else{ ?>
	   <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/prof_no_img.png" align="user">
                    <?php }?>
                    </a></div>
		<div class="prfileContent">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="first" width="24%"><div><span class="label2">Innovation Made</span><br>
							<span class="details2"><?php echo $_smarty_tpl->tpl_vars['profile_det']->value['innovation_cnt'];?>
</span></div></td>
					<td width="24%"><div><span class="label2">Project Funded</span><br>
							<span class="details2"><?php echo $_smarty_tpl->tpl_vars['profile_det']->value['funded_cnt'];?>
</span></div></td>
					<td width="24%"><div><span class="label2">Starred</span><br>
							<span class="details2"><?php echo $_smarty_tpl->tpl_vars['profile_det']->value['stared_cnt'];?>
</span></div></td>
							<td width="28%" class="emptyTd">&nbsp;  </td>
				</tr>
			</table>
			<p><span class="color2">About Me :</span> <?php echo stripslashes($_smarty_tpl->tpl_vars['profile_det']->value['about_me']);?>
</p>
			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</section>
<section class="creative">
 <?php if (count($_smarty_tpl->tpl_vars['projects_funded']->value)>0){?>
	<h3 class="categoryTitle categoryTitlePdBtmZero"><span>Projects Funded</span></h3>
	<div class="contentPane contentPanemarBtn">
    <?php if (count($_smarty_tpl->tpl_vars['projects_funded']->value)>3){?>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#carousel1').jcarousel({        
		auto: 2,
        wrap: 'circular',
		animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});
	});
	</script>
    <?php }?>
		<ul  <?php if (count($_smarty_tpl->tpl_vars['projects_funded']->value)>3){?> id="carousel1" class="jcarousel-skin-content" <?php }elseif(count($_smarty_tpl->tpl_vars['projects_funded']->value)==1){?> class="centeAlignOne" <?php }elseif(count($_smarty_tpl->tpl_vars['projects_funded']->value)==2){?>  class="centeAlignTwo" <?php }else{ ?>class="centeAlignThree" <?php }?> >
        <?php  $_smarty_tpl->tpl_vars['funded'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['funded']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects_funded']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['funded']->key => $_smarty_tpl->tpl_vars['funded']->value){
$_smarty_tpl->tpl_vars['funded']->_loop = true;
?>
    	  <li>
        <div class="article">
        <?php if ($_smarty_tpl->tpl_vars['funded']->value['remaining_days']>0){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('ongoing', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('ongoing', null, 0);?>
        <?php }elseif($_smarty_tpl->tpl_vars['funded']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['funded']->value['pledged_amount']>=$_smarty_tpl->tpl_vars['funded']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('sucess', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('success', null, 0);?>
       <?php }elseif($_smarty_tpl->tpl_vars['funded']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['funded']->value['pledged_amount']<$_smarty_tpl->tpl_vars['funded']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('unsucess', null, 0);?>
       <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('unsucess', null, 0);?>
       <?php }?>
          <!--<div class="fundStatus <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</div>-->
          
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['funded']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['funded']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['funded']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['funded']->value['project_title'];?>
</a></h4>
            <div class="innovatorName">Innovator : <span><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['funded']->value['user_id'];?>
" ><?php echo ucwords($_smarty_tpl->tpl_vars['funded']->value['profile_name']);?>
</a></span></div>
            <div class="right"><?php echo ucwords($_smarty_tpl->tpl_vars['funded']->value['category_name']);?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['funded']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['funded']->value['short_description'],100);?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['funded']->value['backd_per'],'y'=>234,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>234){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(234, null, 0);?>
            <?php }?> 
            <!--  <div class="progressImg">
            <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/progress_top58.png" style="padding-left:5px;" ><span class="progressPer">58%</span>-->
            <div class="progressBar" >
              <div style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" <?php if ($_smarty_tpl->tpl_vars['width']->value==0){?> class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"<?php }else{ ?> class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" <?php }?>   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
              <span class="progressPer"><?php echo $_smarty_tpl->tpl_vars['funded']->value['backd_per'];?>
%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt"><?php echo $_smarty_tpl->tpl_vars['funded']->value['funding_goal'];?>
</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['funded']->value['backers_cnt'];?>
</span></div>
              <div class="valueCont"><?php if ($_smarty_tpl->tpl_vars['status']->value=='ongoing'){?>
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php if ($_smarty_tpl->tpl_vars['funded']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['funded']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?></span>
               <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['status']->value=='success'){?>
                   <h4>successful</h4>
                   <?php }else{ ?>
                   <h4>unsuccessful</h4>
                   <?php }?>
                <?php }?></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      </li>
      <?php } ?> 
			
		</ul>
        <div class="clear"></div>
	</div>
    <?php }?>
      <?php if (count($_smarty_tpl->tpl_vars['projects_innovated']->value)>0){?>
	<h3 class="categoryTitle categoryTitlePdBtmZero"><span>Projects Innovated</span></h3>
	<div class="clear"></div>
	<div class="contentPane contentPanemarBtn">
     <?php if (count($_smarty_tpl->tpl_vars['projects_innovated']->value)>3){?>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#carousel2').jcarousel({        
		auto: 2,
        wrap: 'circular',
		animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});
	});
	</script>
    <?php }?>
	<ul <?php if (count($_smarty_tpl->tpl_vars['projects_innovated']->value)>3){?> id="carousel2" class="jcarousel-skin-content" <?php }elseif(count($_smarty_tpl->tpl_vars['projects_innovated']->value)==1){?> class="centeAlignOne" <?php }elseif(count($_smarty_tpl->tpl_vars['projects_innovated']->value)==2){?>  class="centeAlignTwo" <?php }else{ ?>class="centeAlignThree" <?php }?>  >
        <?php  $_smarty_tpl->tpl_vars['innovated'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['innovated']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects_innovated']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['innovated']->key => $_smarty_tpl->tpl_vars['innovated']->value){
$_smarty_tpl->tpl_vars['innovated']->_loop = true;
?>
      <li>
       <div class="article">
        <?php if ($_smarty_tpl->tpl_vars['innovated']->value['remaining_days']>0){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('ongoing', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('ongoing', null, 0);?>
        <?php }elseif($_smarty_tpl->tpl_vars['innovated']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['innovated']->value['pledged_amount']>=$_smarty_tpl->tpl_vars['innovated']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('sucess', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('success', null, 0);?>
       <?php }elseif($_smarty_tpl->tpl_vars['innovated']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['innovated']->value['pledged_amount']<$_smarty_tpl->tpl_vars['innovated']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('unsucess', null, 0);?>
       <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('unsucess', null, 0);?>
       <?php }?>
         <!-- <div class="fundStatus <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</div>-->
          
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['innovated']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['innovated']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['innovated']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['innovated']->value['project_title'];?>
</a></h4>
            <div class="innovatorName">Innovator : <span><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['innovated']->value['user_id'];?>
" ><?php echo ucwords($_smarty_tpl->tpl_vars['innovated']->value['profile_name']);?>
</a></span></div>
            <div class="right"><?php echo ucwords($_smarty_tpl->tpl_vars['innovated']->value['category_name']);?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['innovated']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['innovated']->value['short_description'],100);?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['innovated']->value['backd_per'],'y'=>234,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>234){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(234, null, 0);?>
            <?php }?> 
            <div class="progressBar" >
             <div style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" <?php if ($_smarty_tpl->tpl_vars['width']->value==0){?> class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"<?php }else{ ?> class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" <?php }?>   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
              <span class="progressPer"><?php echo $_smarty_tpl->tpl_vars['innovated']->value['backd_per'];?>
%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt"><?php echo $_smarty_tpl->tpl_vars['innovated']->value['funding_goal'];?>
</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['innovated']->value['backers_cnt'];?>
</span></div>
              <div class="valueCont">
              <?php if ($_smarty_tpl->tpl_vars['status']->value=='ongoing'){?>
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php if ($_smarty_tpl->tpl_vars['innovated']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['innovated']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?></span>
               <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['status']->value=='success'){?>
                   <h4>successful</h4>
                   <?php }else{ ?>
                   <h4>unsuccessful</h4>
                   <?php }?>
                <?php }?>
                
              <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['innovated']->value['remaining_days'];?>
</span>-->
                </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      </li> <?php } ?> 
			
		</ul>
        <div class="clear"></div>
	</div>
    <?php }?>
    <?php if (count($_smarty_tpl->tpl_vars['projects_stared']->value)>0){?>
	<h3 class="categoryTitle categoryTitlePdBtmZero"><span>Projects Followed</span></h3>
	<div class="clear"></div>
	<div class="contentPane contentPanemarBtn">
    <?php if (count($_smarty_tpl->tpl_vars['projects_stared']->value)>3){?>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#carousel3').jcarousel({        
		auto: 2,
        wrap: 'circular',
		animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});
	});
	</script>
    <?php }?>
		<ul <?php if (count($_smarty_tpl->tpl_vars['projects_stared']->value)>3){?> id="carousel3" class="jcarousel-skin-content" <?php }elseif(count($_smarty_tpl->tpl_vars['projects_stared']->value)==1){?> class="centeAlignOne" <?php }elseif(count($_smarty_tpl->tpl_vars['projects_stared']->value)==2){?>  class="centeAlignTwo" <?php }else{ ?>class="centeAlignThree" <?php }?> >
			<?php  $_smarty_tpl->tpl_vars['stared'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stared']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects_stared']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stared']->key => $_smarty_tpl->tpl_vars['stared']->value){
$_smarty_tpl->tpl_vars['stared']->_loop = true;
?>
     		 <li>
       <div class="article">
       <?php if ($_smarty_tpl->tpl_vars['stared']->value['remaining_days']>0){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('ongoing', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('ongoing', null, 0);?>
        <?php }elseif($_smarty_tpl->tpl_vars['stared']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['stared']->value['pledged_amount']>=$_smarty_tpl->tpl_vars['stared']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('sucess', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('success', null, 0);?>
       <?php }elseif($_smarty_tpl->tpl_vars['stared']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['stared']->value['pledged_amount']<$_smarty_tpl->tpl_vars['stared']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('unsucess', null, 0);?>
       <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('unsucess', null, 0);?>
       <?php }?>
          <!--<div class="fundStatus <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</div>-->
          
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['stared']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['stared']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['stared']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['stared']->value['project_title'];?>
</a></h4>
            <div class="innovatorName">Innovator : <span><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['stared']->value['user_id'];?>
" ><?php echo ucwords($_smarty_tpl->tpl_vars['stared']->value['profile_name']);?>
</a></span></div>
            <div class="right"><?php echo ucwords($_smarty_tpl->tpl_vars['stared']->value['category_name']);?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['stared']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['stared']->value['short_description'],100);?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['stared']->value['backd_per'],'y'=>234,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>234){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(234, null, 0);?>
            <?php }?> 
            <div class="progressBar" >
              <div style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" <?php if ($_smarty_tpl->tpl_vars['width']->value==0){?> class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"<?php }else{ ?> class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" <?php }?>   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
              <span class="progressPer"><?php echo $_smarty_tpl->tpl_vars['stared']->value['backd_per'];?>
%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt"><?php echo $_smarty_tpl->tpl_vars['stared']->value['funding_goal'];?>
</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['stared']->value['backers_cnt'];?>
</span></div>
              <div class="valueCont">
               <?php if ($_smarty_tpl->tpl_vars['status']->value=='ongoing'){?>
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php if ($_smarty_tpl->tpl_vars['stared']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['stared']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?></span>
               <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['status']->value=='success'){?>
                   <h4>successful</h4>
                   <?php }else{ ?>
                   <h4>unsuccessful</h4>
                   <?php }?>
                <?php }?>
                <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['stared']->value['remaining_days'];?>
</span>--></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      </li> 
            <?php } ?> 
            
		</ul>
        <div class="clear"></div>
	</div>
    <?php }?>
	<div class="clear"></div>
</section><?php }} ?>