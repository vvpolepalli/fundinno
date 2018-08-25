<?php /* Smarty version Smarty-3.1.8, created on 2012-12-27 18:18:32
         compiled from "/var/www/fundinnovations/application/views/projects/projects_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165788271950dc1f42946e82-93833420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9821a04f8c5990c745ebbbafa9d0107339176c76' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/projects_list.tpl',
      1 => 1356612510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165788271950dc1f42946e82-93833420',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50dc1f429a6623_74752960',
  'variables' => 
  array (
    'baseurl' => 0,
    'category_list' => 0,
    'cnt' => 0,
    'cat' => 0,
    'city_list' => 0,
    'count' => 0,
    'c' => 0,
    'recently_added' => 0,
    'recent' => 0,
    'width' => 0,
    'most_funded' => 0,
    'fund' => 0,
    'staff_pick' => 0,
    'staf' => 0,
    'succ_projects' => 0,
    'succ' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dc1f429a6623_74752960')) {function content_50dc1f429a6623_74752960($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_function_math')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/function.math.php';
?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/jquery-ui.css" />
<!-- <script src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-1.8.3.js"></script>-->
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-ui.js"></script>
 
<script type="text/javascript">
$(function() {
        // setup master volume
        $( ".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });
	/*$("input:checkbox").click(function() {
		if ($(this).attr("checked") === true) {
			var group = "input:checkbox[name='" + $(this).attr("name") + "']";
			$(group).attr("checked", false);
			$(this).attr("checked", true);
		} else {
			$(this).attr("checked", false);
		} 
		});*/
		
});
function check_box(ths){
if ($(ths).attr("checked") === true) {
			var group = "input:checkbox[name='" + $(ths).attr("name") + "']";
			$(group).attr("checked", false);
			$(ths).attr("checked", true);
		} else {
			$(ths).attr("checked", false);
		} 
}
$(document).ready(function() {
		
		$('#carousel1').jcarousel({        
			auto: 2,
			wrap: 'last',
			initCallback: mycarousel_initCallback
		});
		$('#carousel2').jcarousel({        
			 auto: 2,
			 wrap: 'last',
			 animation: 'slow',
			 initCallback: mycarousel_initCallback
		});
		$('#carousel3').jcarousel({        
			 auto: 2,
			 wrap: 'last',
			 animation: 'slow',
			 initCallback: mycarousel_initCallback
		});
		$('#carousel4').jcarousel({        
			auto: 2,
			wrap: 'last',
			animation: 'slow',
			initCallback: mycarousel_initCallback
		});
		
	});

	</script> 

<section class="filter">
  <div class="filterInner">
    <h5>Filter Projects</h5>
    <ul>
      <li class="left">
      <b>Category</b>
      <div class="filterListing">
        <ul>
          <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable("1", null, 0);?>
          <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
          <li <?php if ($_smarty_tpl->tpl_vars['cnt']->value%2==0){?> class="even" <?php }else{ ?> class="odd" <?php }?> >
          <input type="checkbox" name="category_list" id="category_list" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" />
          <?php echo $_smarty_tpl->tpl_vars['cat']->value['category_name'];?>

          </li>
          <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable($_smarty_tpl->tpl_vars['cnt']->value+1, null, 0);?>
          <?php } ?> 
        </ul>
      </div>
      </li>
      <li class="left mid"><b>Sort Option</b>
        <div class="filterListing">
          <ul>
            <li class="odd">
              <input type="checkbox" id="sort_option[]" name="sort_option[]" value="success" onClick="check_box(this)" >
              Successful projects</li>
            <li class="even">
              <input type="checkbox" id="sort_option[]" name="sort_option[]" value="staff_pick" onClick="check_box(this)" >
              Staff pick </li>
            <li class="odd">
             <input type="checkbox" id="sort_option[]" name="sort_option[]" value="most_funded" onClick="check_box(this)" >
              Most funded </li>
            <li class="even">
                <input type="checkbox" id="sort_option[]" name="sort_option[]" value="recent" onClick="check_box(this)">
              Recently launched </li>
          
          </ul>
        </div>
      </li>
      <li   class="left"><b>Location</b>
        <div class="filterListing">
          <ul>
          <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable("1", null, 0);?>
          <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
          <li   <?php if ($_smarty_tpl->tpl_vars['count']->value%2==0){?> class="even" <?php }else{ ?> class="odd" <?php }?> >
          <input type="checkbox" name="city_list" id="city_list" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['city_id'];?>
" />
          <?php echo $_smarty_tpl->tpl_vars['c']->value['city_name'];?>

          </li>
          <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+1, null, 0);?>
          <?php } ?> 
           
          </ul>
        </div>
      </li>
    </ul>
    <div class="clear"></div>
    <input type="button" class="blueBtn" value="Search">
    <div class="clear"></div>
  </div>
</section>
<section class="creative">
<?php if (count($_smarty_tpl->tpl_vars['recently_added']->value)>0){?>
  <h3><span>Recently Launched Projects </span></h3>
  <div class="contentPane">
    <ul id="carousel1" class="jcarousel-skin-content">
     <?php  $_smarty_tpl->tpl_vars['recent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recent']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recently_added']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recent']->key => $_smarty_tpl->tpl_vars['recent']->value){
$_smarty_tpl->tpl_vars['recent']->_loop = true;
?>
      <li>
       <article>
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['recent']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['recent']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><?php echo $_smarty_tpl->tpl_vars['recent']->value['project_title'];?>
</h4>
            <div class="innovatorName">Innovator : <span><?php echo $_smarty_tpl->tpl_vars['recent']->value['profile_name'];?>
</span></div>
            <div class="right"><?php echo $_smarty_tpl->tpl_vars['recent']->value['category_name'];?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['recent']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['recent']->value['short_description'],100);?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['recent']->value['backd_per'],'y'=>243,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>243){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(243, null, 0);?>
            <?php }?> 
            <div class="progressBar" >
              <div class="progressBarPer" style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" ></div>
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
              <div class="valueCont"><span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['recent']->value['remaining_days'];?>
</span></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </article>
        <div class="btm"></div>
      </li> <?php } ?> 
    </ul>
    <div class="moreProBtnPane"><a href="#">More Projects</a> </div>
  </div>
  <div class="clear"></div>
  <?php }?>
  <?php if (count($_smarty_tpl->tpl_vars['most_funded']->value)>0){?>
  <h3><span>Most Funded Projects </span></h3>
  <div class="contentPane">
    <ul id="carousel2" class="jcarousel-skin-content">
     <?php  $_smarty_tpl->tpl_vars['fund'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fund']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['most_funded']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fund']->key => $_smarty_tpl->tpl_vars['fund']->value){
$_smarty_tpl->tpl_vars['fund']->_loop = true;
?>
      <li>
       <article>
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['fund']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['fund']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><?php echo $_smarty_tpl->tpl_vars['fund']->value['project_title'];?>
</h4>
            <div class="innovatorName">Innovator : <span><?php echo $_smarty_tpl->tpl_vars['fund']->value['profile_name'];?>
</span></div>
            <div class="right"><?php echo $_smarty_tpl->tpl_vars['fund']->value['category_name'];?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['fund']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['fund']->value['short_description'],100);?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['fund']->value['backd_per'],'y'=>243,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>243){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(243, null, 0);?>
            <?php }?> 
            <div class="progressBar" >
              <div class="progressBarPer" style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" ></div>
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
              <div class="valueCont"><span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['fund']->value['remaining_days'];?>
</span></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </article>
        <div class="btm"></div>
      </li> <?php } ?> 
     
    </ul>
    <div class="moreProBtnPane"><a href="#">More Projects</a> </div>
  </div>
  <div class="clear"></div>
  <?php }?>
  <?php if (count($_smarty_tpl->tpl_vars['staff_pick']->value)>0){?>
  <h3><span>Staff Picks </span></h3>
  <div class="contentPane">
    <ul id="carousel3" class="jcarousel-skin-content">
    <?php  $_smarty_tpl->tpl_vars['staf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['staf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['staff_pick']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['staf']->key => $_smarty_tpl->tpl_vars['staf']->value){
$_smarty_tpl->tpl_vars['staf']->_loop = true;
?>
      <li>
       <article>
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['staf']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['staf']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><?php echo $_smarty_tpl->tpl_vars['staf']->value['project_title'];?>
</h4>
            <div class="innovatorName">Innovator : <span><?php echo $_smarty_tpl->tpl_vars['staf']->value['profile_name'];?>
</span></div>
            <div class="right"><?php echo $_smarty_tpl->tpl_vars['staf']->value['category_name'];?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['staf']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['staf']->value['short_description'],100);?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['staf']->value['backd_per'],'y'=>243,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>243){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(243, null, 0);?>
            <?php }?> 
            <div class="progressBar" >
              <div class="progressBarPer" style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" ></div>
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
              <div class="valueCont"><span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['staf']->value['remaining_days'];?>
</span></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </article>
        <div class="btm"></div>
      </li> <?php } ?> 
      
    </ul>
    <div class="moreProBtnPane"><a href="#">More Projects</a> </div>
  </div>
  <div class="clear"></div>
  <?php }?>
  <?php if (count($_smarty_tpl->tpl_vars['succ_projects']->value)>0){?>
  <h3><span>Successful Projects </span></h3>
  <div class="contentPane">
    <ul id="carousel4" class="jcarousel-skin-content">
    <?php  $_smarty_tpl->tpl_vars['succ'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['succ']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['succ_projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['succ']->key => $_smarty_tpl->tpl_vars['succ']->value){
$_smarty_tpl->tpl_vars['succ']->_loop = true;
?>
      <li>
       <article>
          <div class="imgPane"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['succ']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/medium/<?php echo $_smarty_tpl->tpl_vars['succ']->value['project_image'];?>
" alt="title"></a></div>
          <div class="innerContent">
            <h4><?php echo $_smarty_tpl->tpl_vars['succ']->value['project_title'];?>
</h4>
            <div class="innovatorName">Innovator : <span><?php echo $_smarty_tpl->tpl_vars['succ']->value['profile_name'];?>
</span></div>
            <div class="right"><?php echo $_smarty_tpl->tpl_vars['succ']->value['category_name'];?>
</div>
            <div class="clear"></div>
            <div><?php echo $_smarty_tpl->tpl_vars['succ']->value['city_name'];?>
</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['succ']->value['short_description'],100);?>
...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['succ']->value['backd_per'],'y'=>243,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>243){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(243, null, 0);?>
            <?php }?> 
            <div class="progressBar" >
              <div class="progressBarPer" style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" ></div>
              <span class="progressPer"><?php echo $_smarty_tpl->tpl_vars['succ']->value['backd_per'];?>
%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt"><?php echo $_smarty_tpl->tpl_vars['succ']->value['funding_goal'];?>
</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['succ']->value['backers_cnt'];?>
</span></div>
              <div class="valueCont"><span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['succ']->value['remaining_days'];?>
</span></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </article>
        <div class="btm"></div>
      </li>
       <?php } ?> 
      
    </ul>
    <div class="moreProBtnPane"><a href="#">More Projects</a> </div>
  </div>
  <div class="clear"></div>
  <?php }?>
</section><?php }} ?>