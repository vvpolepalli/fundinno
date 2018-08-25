<?php /* Smarty version Smarty-3.1.8, created on 2013-07-16 23:25:31
         compiled from "/home/fundinno/public_html/application/views/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7153436415159845ff0b763-08593633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe59ac8772189970a491b3a113cb9bc7e9b61329' => 
    array (
      0 => '/home/fundinno/public_html/application/views/home.tpl',
      1 => 1374038702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7153436415159845ff0b763-08593633',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515984606ff149_87252178',
  'variables' => 
  array (
    'baseurl' => 0,
    'website_intro' => 0,
    'imagebanner' => 0,
    'images' => 0,
    'staff_pick' => 0,
    'staf' => 0,
    'class' => 0,
    'status' => 0,
    'width' => 0,
    'most_funded' => 0,
    'fund' => 0,
    'recently_added' => 0,
    'recent' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515984606ff149_87252178')) {function content_515984606ff149_87252178($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_function_math')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/function.math.php';
?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/jquery-ui.css" />
<!-- <script src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-1.8.3.js"></script>-->
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-ui.js"></script>
<style type="text/css">
body {
	min-width:1182px !important;
	}
</style>
 
<script type="text/javascript">
$(function() {

//	$('.player').show();
	 	
        // setup master volume
        /*$(".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });*/
		get_home_page_cms();
});
<!--nivo slider-->
$(window).load(function() {
     $('#slider').nivoSlider();
	 $('.nivo-controlNav').css('left',425-parseInt($('.nivo-controlNav').width())/2)
	
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
	/*$( ".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });*/
};



$(function(){ 
	$("li:first-child").css("border-left","0")
})
function get_home_page_cms(){ 
	$.ajax({
			type: "POST",
			url: baseurl+"home/get_home_page_cms",
			success: function(msg)
			{
				
				$('#lern_more_pop_cntnt').html(msg);
				if($(window).height()-275<$('#lern_more_pop_cntnt').height()){
					$('#learnMOrepopFix').css('height',$(window).height()-275)
				}
				else{
					$('#learnMOrepopFix').css('height','auto')
				}
			}
			});
}
function close_pop(id){
	 $('#'+id).hide();
	 closepPopup();
	// $('#pop_cntnt').empty();
	// $('#error_pop_cntnt').empty();
}


		</script>

<section >
  <div class="bannerWrap">
  <div class="bannerWrapInner">
    <div class="videoPane">
   <!--[if lt IE 9]> 
 
<script type="text/javascript">
$(function() {
		  flowplayer("player",{
                src:"<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/flowplayer/flowplayer-3.2.15.swf",
                wmode:"transparent"
            } ,{
      clip:  {
          autoPlay: false,
          autoBuffering: true
      }
 	 });
	});
</script>


    <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/main_video.mp4" style="display:block;width:509px;height:281px"  id="player"> 
		</a>
 <![endif]-->
 <![if gte IE 9]>
 <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="509" height="281"
      poster=""
      data-setup="{}">
    
    <source src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
video/main_video.mp4" type='video/mp4' />
    <!--<track kind="captions" src="captions.vtt" srclang="en" label="English" />-->
  </video> <![endif]>

      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <h2 class="gapL273" style="position:relative; padding-right:147px; width:650px; margin:0 auto;text-align: left;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['website_intro']->value['page_content'],100);?>
 <!--Do you think India will be the next global power? Then start the innovation revolution today...--><span style="display:inline-block; position:absolute;right:0"><a href="javascript:void(0);" onclick="$('#lern_more_popup').show();openpPopup();openpPopupFix_home();" class="lrnMrBtn gapM4">Learn more</a></span></h2>
  </div>
 </div> 
  <div id="slider-wrapper">
    <div id="slider" class="nivoSlider"> <?php  $_smarty_tpl->tpl_vars['images'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['images']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['imagebanner']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['images']->key => $_smarty_tpl->tpl_vars['images']->value){
$_smarty_tpl->tpl_vars['images']->_loop = true;
?> <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/image_banner/medium/<?php echo $_smarty_tpl->tpl_vars['images']->value['image'];?>
" alt="title" /> <?php } ?> 
      
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>
<section class="creative">
<?php if (count($_smarty_tpl->tpl_vars['staff_pick']->value)>0){?>
  <h3 class="categoryTitle"><span>Staff Picks</span></h3>
  <div class="contentPane">
  <?php if (count($_smarty_tpl->tpl_vars['staff_pick']->value)>3){?>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#content-carousel').jcarousel({        
			auto: 2,
			wrap: 'circular',
			 animation: 1000,scroll:1,
			initCallback: mycarousel_initCallback
		});
		
	});	
	</script><?php }?>
    <ul <?php if (count($_smarty_tpl->tpl_vars['staff_pick']->value)>3){?> id="content-carousel" class="jcarousel-skin-content" <?php }elseif(count($_smarty_tpl->tpl_vars['staff_pick']->value)==1){?> class="centeAlignOne"  <?php }elseif(count($_smarty_tpl->tpl_vars['staff_pick']->value)==2){?>  class="centeAlignTwo" <?php }else{ ?>class="centeAlignThree"<?php }?>>
    <?php  $_smarty_tpl->tpl_vars['staf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['staf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['staff_pick']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['staf']->key => $_smarty_tpl->tpl_vars['staf']->value){
$_smarty_tpl->tpl_vars['staf']->_loop = true;
?>
      <li>
       <div class="article">
       <?php if ($_smarty_tpl->tpl_vars['staf']->value['remaining_days']>0){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('ongoing', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('ongoing', null, 0);?>
        <?php }elseif($_smarty_tpl->tpl_vars['staf']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['staf']->value['pledged_amount']>=$_smarty_tpl->tpl_vars['staf']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('sucess', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('success', null, 0);?>
       <?php }elseif($_smarty_tpl->tpl_vars['staf']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['staf']->value['pledged_amount']<$_smarty_tpl->tpl_vars['staf']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('unsucess', null, 0);?>
       <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('unsucess', null, 0);?>
       <?php }?>
          <!--<div class="fundStatus <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</div>-->
          
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['staf']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['staf']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['staf']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['staf']->value['project_title'];?>
</a></h4>
            <div class="innovatorName">Innovator : <span><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['staf']->value['user_id'];?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['staf']->value['profile_name']);?>
</a></span></div>
            <div class="right"><?php echo ucwords($_smarty_tpl->tpl_vars['staf']->value['category_name']);?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['staf']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo stripslashes(smarty_modifier_truncate($_smarty_tpl->tpl_vars['staf']->value['short_description'],100));?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['staf']->value['backd_per'],'y'=>234,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>234){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(234, null, 0);?>
            <?php }?> 
            <div class="progressBar" >
            
              <div style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" <?php if ($_smarty_tpl->tpl_vars['width']->value==0){?> class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"<?php }else{ ?> class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" <?php }?>   aria-disabled="true"><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div> 
              <span class="progressPer"><?php echo $_smarty_tpl->tpl_vars['staf']->value['backd_per'];?>
%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt"><?php echo $_smarty_tpl->tpl_vars['staf']->value['funding_goal'];?>
</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['staf']->value['backers_cnt'];?>
</span></div>
              <div class="valueCont">
              <?php if ($_smarty_tpl->tpl_vars['status']->value=='ongoing'){?>
           
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php if ($_smarty_tpl->tpl_vars['staf']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['staf']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?></span>
               <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['status']->value=='success'){?>
                   <h4>successful</h4>
                   <?php }else{ ?>
                   <h4>unsuccessful</h4>
                   <?php }?>
                <?php }?>
                </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
       <?php } ?> 
      
    </ul>
  
    <div class="clear"></div>
  
  </div>
  <div class="clear"></div>
  <?php }?>
  <?php if (count($_smarty_tpl->tpl_vars['most_funded']->value)>0){?>
  <h3 class="categoryTitle"><span>Most Funded Projects</span></h3>
  
  <div class="contentPane">
   <?php if (count($_smarty_tpl->tpl_vars['most_funded']->value)>3){?>
   <script type="text/javascript">
	$(document).ready(function() {
		$('#popular-carousel').jcarousel({        
			auto: 2,
			wrap: 'circular',
			 animation: 1000,scroll:1,
			initCallback: mycarousel_initCallback
	   });
	});
	</script>
   <?php }?>
    <ul <?php if (count($_smarty_tpl->tpl_vars['most_funded']->value)>3){?> id="popular-carousel" class="jcarousel-skin-content" <?php }elseif(count($_smarty_tpl->tpl_vars['most_funded']->value)==1){?> class="centeAlignOne" <?php }elseif(count($_smarty_tpl->tpl_vars['most_funded']->value)==2){?>  class="centeAlignTwo" <?php }else{ ?>class="centeAlignThree" <?php }?> >
      <?php  $_smarty_tpl->tpl_vars['fund'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fund']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['most_funded']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fund']->key => $_smarty_tpl->tpl_vars['fund']->value){
$_smarty_tpl->tpl_vars['fund']->_loop = true;
?>
      <li>
       <div  class="article">
       <?php if ($_smarty_tpl->tpl_vars['fund']->value['remaining_days']>0){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('ongoing', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('ongoing', null, 0);?>
        <?php }elseif($_smarty_tpl->tpl_vars['fund']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['fund']->value['pledged_amount']>=$_smarty_tpl->tpl_vars['fund']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('sucess', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('success', null, 0);?>
       <?php }elseif($_smarty_tpl->tpl_vars['fund']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['fund']->value['pledged_amount']<$_smarty_tpl->tpl_vars['fund']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('unsucess', null, 0);?>
       <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('unsucess', null, 0);?>
       <?php }?>
         <!-- <div class="fundStatus <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</div>-->
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['fund']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['fund']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['fund']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['fund']->value['project_title'];?>
</a></h4>
            <div class="innovatorName">Innovator : <span><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['fund']->value['user_id'];?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['fund']->value['profile_name']);?>
</a></span></div>
            <div class="right"><?php echo ucwords($_smarty_tpl->tpl_vars['fund']->value['category_name']);?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['fund']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo stripslashes(smarty_modifier_truncate($_smarty_tpl->tpl_vars['fund']->value['short_description'],100));?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['fund']->value['backd_per'],'y'=>234,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>234){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(234, null, 0);?>
            <?php }?> 
            <div class="progressBar" >
             <div style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" <?php if ($_smarty_tpl->tpl_vars['width']->value==0){?> class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"<?php }else{ ?> class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" <?php }?>   aria-disabled="true"><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div> 
              <span class="progressPer"><?php echo $_smarty_tpl->tpl_vars['fund']->value['backd_per'];?>
%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt"><?php echo $_smarty_tpl->tpl_vars['fund']->value['funding_goal'];?>
</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['fund']->value['backers_cnt'];?>
</span></div>
              <div class="valueCont"> 
              <?php if ($_smarty_tpl->tpl_vars['status']->value=='ongoing'){?>
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php if ($_smarty_tpl->tpl_vars['fund']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['fund']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?></span>
               <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['status']->value=='success'){?>
                   <h4>successful</h4>
                   <?php }else{ ?>
                   <h4>unsuccessful</h4>
                   <?php }?>
                <?php }?>
               </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
       <?php } ?> 
     
    </ul>
  </div>
  <div class="clear"></div>
  <?php }?>
  <?php if (count($_smarty_tpl->tpl_vars['recently_added']->value)>0){?>
  <h3 class="categoryTitle"><span>Recently Added </span></h3>
  <div class="contentPane">
  <?php if (count($_smarty_tpl->tpl_vars['recently_added']->value)>3){?>
  <script type="text/javascript">
	$(document).ready(function() {
		$('#recent-carousel').jcarousel({        
		auto: 2,
        wrap: 'circular',
		animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});
	
	});
	</script>
  <?php }?>
    <ul <?php if (count($_smarty_tpl->tpl_vars['recently_added']->value)>3){?>  id="recent-carousel" class="jcarousel-skin-content" <?php }elseif(count($_smarty_tpl->tpl_vars['recently_added']->value)==1){?> class="centeAlignOne" <?php }elseif(count($_smarty_tpl->tpl_vars['recently_added']->value)==2){?>  class="centeAlignTwo" <?php }else{ ?>class="centeAlignThree" <?php }?> >
      <?php  $_smarty_tpl->tpl_vars['recent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recent']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recently_added']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recent']->key => $_smarty_tpl->tpl_vars['recent']->value){
$_smarty_tpl->tpl_vars['recent']->_loop = true;
?>
      <li>
        <div  class="article">
        <?php if ($_smarty_tpl->tpl_vars['recent']->value['remaining_days']>0){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('ongoing', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('ongoing', null, 0);?>
        <?php }elseif($_smarty_tpl->tpl_vars['recent']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['recent']->value['pledged_amount']>=$_smarty_tpl->tpl_vars['recent']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('sucess', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('success', null, 0);?>
       <?php }elseif($_smarty_tpl->tpl_vars['recent']->value['remaining_days']<=0&&$_smarty_tpl->tpl_vars['recent']->value['pledged_amount']<$_smarty_tpl->tpl_vars['recent']->value['funding_goal']){?>
       <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('unsucess', null, 0);?>
       <?php $_smarty_tpl->tpl_vars["status"] = new Smarty_variable('unsucess', null, 0);?>
       <?php }?>
          <!--<div class="fundStatus <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</div>-->
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['recent']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['recent']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['recent']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['recent']->value['project_title'];?>
</a></h4>
            <div class="innovatorName">Innovator : <span><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
profile/index/<?php echo $_smarty_tpl->tpl_vars['recent']->value['user_id'];?>
"><?php echo ucwords($_smarty_tpl->tpl_vars['recent']->value['profile_name']);?>
</a></span></div>
            <div class="right"><?php echo ucwords($_smarty_tpl->tpl_vars['recent']->value['category_name']);?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['recent']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo stripslashes(smarty_modifier_truncate($_smarty_tpl->tpl_vars['recent']->value['short_description'],100));?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['recent']->value['backd_per'],'y'=>234,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>234){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(234, null, 0);?>
            <?php }elseif($_smarty_tpl->tpl_vars['width']->value==''){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(0, null, 0);?>
            <?php }?> 
            <div class="progressBar" >
              <div style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" <?php if ($_smarty_tpl->tpl_vars['width']->value==0){?> class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"<?php }else{ ?> class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" <?php }?>   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>   
              <!--<div <?php if ($_smarty_tpl->tpl_vars['width']->value==0){?> class="progressBarPer progressBarPer-empty"<?php }else{ ?> class="progressBarPer" <?php }?> style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" ></div>-->
              <span class="progressPer"><?php echo $_smarty_tpl->tpl_vars['recent']->value['backd_per'];?>
%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt"><?php echo $_smarty_tpl->tpl_vars['recent']->value['funding_goal'];?>
</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['recent']->value['backers_cnt'];?>
</span></div>
              <div class="valueCont">
              <?php if ($_smarty_tpl->tpl_vars['status']->value=='ongoing'){?>
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php if ($_smarty_tpl->tpl_vars['recent']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['recent']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?></span>
               <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['status']->value=='success'){?>
                   <h4>successful</h4>
                   <?php }else{ ?>
                   <h4>unsuccessful</h4>
                   <?php }?>
                <?php }?>
                
             <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php if ($_smarty_tpl->tpl_vars['recent']->value['remaining_days']>0){?><?php echo $_smarty_tpl->tpl_vars['recent']->value['remaining_days'];?>
<?php }else{ ?>0<?php }?></span>-->
               <!-- <span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['recent']->value['remaining_days'];?>
</span>--></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      
      <?php } ?> 
    
    </ul>
  </div>
  <div class="clear"></div>
  <?php }?>
</section>
<section class="btmLinks"  >
  <ul>
    <li class="btmLinks-first"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
knowledge_bank">
    <span class="icons knowledge"></span>
      <p>Knowledge Bank</p>
      <span class="moreArrow"></span>
      </a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
tools_tips">
    <span class="icons tips"></span>
      <p class="tips">Tips & Tools</p>
      <span class="moreArrow"></span>
      </a></li>
    <li class="btmLinks-last">
    <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
testimonial"><span class="icons testi"></span>
      <p class="testi">Testimonials</p>
      <span class="moreArrow"></span>
      </a></li>
  </ul>
  <div class="clear"></div>
</section>


<div id="lern_more_popup"  class="popFixed" style="display:none">
<div class="popabs">
<div id="inlineContent2" class="white_content" style="top:209px;width:914px;margin-left: -174px;">
  <div class="white_contentInner" ><a style=" top: 0;right:0; position:absolute;margin:0 !important" class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('lern_more_popup');">Close</a>
    <div id="learnMOrepopFix"><h4></h4>
      <div id="lern_more_pop_cntnt" class="prodeForm" style="margin:12px 0">
      </div>
     
      </div>
  </div>
  <div class="clear"></div>
</div>
</div>
</div><?php }} ?>