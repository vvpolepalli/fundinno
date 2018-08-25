<?php /* Smarty version Smarty-3.1.8, created on 2013-02-18 12:22:52
         compiled from "/var/www/fundinnovations/application/views/profile/my_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154479250450e2b7091f7b14-01457066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38d57190ada9add242710a8ac8e5e7f17279e303' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/my_profile.tpl',
      1 => 1361170367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154479250450e2b7091f7b14-01457066',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e2b709330385_91026754',
  'variables' => 
  array (
    'baseurl' => 0,
    'ptype' => 0,
    'my_profile_det' => 0,
    'recently_added' => 0,
    'recent' => 0,
    'class' => 0,
    'status' => 0,
    'width' => 0,
    'category_list' => 0,
    'cnt' => 0,
    'cat' => 0,
    'child' => 0,
    'city_list' => 0,
    'count' => 0,
    'c' => 0,
    'search_param' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e2b709330385_91026754')) {function content_50e2b709330385_91026754($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_function_math')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/function.math.php';
?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/jquery-ui.css" />
<!-- <script src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-1.8.3.js"></script>-->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/pagination.css"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/jquery.pagination.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-ui.js"></script>
<style type="text/css">
body {
	min-width:1142px !important;
	}
</style>
 
<script type="text/javascript">

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

	


var baseurl ="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
";
$(function() {
        // setup master volume
        /*$( ".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });*/
		var startp 		= $('#hid_startp').val();
		var limitp		= 9;
		var ptype ="<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
";
		 if(ptype=='innovation_history'){
			 fun(ptype);
		}
		 else{
			var project_cnt = $('#hid_projects_list_cnt').val();
			project_cnt=parseInt(project_cnt);
					
			if(project_cnt !=0)
			search_projects(baseurl);
		 }
	
		
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

function fun(page){
	if(page=='my_funding'){
	    $('#sub_page_div').load(baseurl+'user/my_funding');
		$('#my_fund').removeClass('blueBtn').addClass('whiteBtn');
		$('#my_innov').removeClass('whiteBtn').addClass('blueBtn');
		$('#my_star').removeClass('whiteBtn').addClass('blueBtn'); 		 
	}
	else if(page =='my_innovation'){
		$('#sub_page_div').load(baseurl+'user/my_innovations');
		$('#my_innov').removeClass('blueBtn').addClass('whiteBtn');
		$('#my_fund').removeClass('whiteBtn').addClass('blueBtn');
		$('#my_star').removeClass('whiteBtn').addClass('blueBtn'); 	
	}
	else if(page =='my_stared'){
		$('#sub_page_div').load(baseurl+'user/my_stared');
		$('#my_star').removeClass('blueBtn').addClass('whiteBtn');
		$('#my_fund').removeClass('whiteBtn').addClass('blueBtn');
		$('#my_innov').removeClass('whiteBtn').addClass('blueBtn'); 	
	}
	else if(page == 'funding_cash'){
		$('#sub_page_div').load(baseurl+'user/my_funding/funding_cash');
		$('#my_fund').removeClass('blueBtn').addClass('whiteBtn');
		$('#my_innov').removeClass('whiteBtn').addClass('blueBtn');
		$('#my_star').removeClass('whiteBtn').addClass('blueBtn'); 		
	}
	else if(page == 'funding_history'){
		$('#sub_page_div').load(baseurl+'user/my_funding/funding_history');
		$('#my_fund').removeClass('blueBtn').addClass('whiteBtn');
		$('#my_innov').removeClass('whiteBtn').addClass('blueBtn');
		$('#my_star').removeClass('whiteBtn').addClass('blueBtn'); 		
	}
	else if(page == 'innovation_history'){
		$('#sub_page_div').load(baseurl+'user/my_innovations/innovation_history');
		$('#my_innov').removeClass('blueBtn').addClass('whiteBtn');
		$('#my_fund').removeClass('whiteBtn').addClass('blueBtn');
		$('#my_star').removeClass('whiteBtn').addClass('blueBtn'); 	
	} 
}

function search_projects(baseurl)
{
	/*if(orderBy) 
	{	
		orderBy = orderBy;
	}
	else {
		orderBy = '';	
	}*/
	orderBy = '';	
	var cat_lists 	= $('input[name="category_list[]"]:checked').map(function(){return this.value;}).get();
	var sort_option = $('input[name="sort_option"]:checked').val();
	var city_lists 	= $('input[name="city_list"]:checked').map(function(){return this.value;}).get();
	//alert(city_lists)
	if(sort_option)
	sort_option=sort_option;
	else
	sort_option=''
		var startp=0;
	    var limitp=9;
		
		//alert(profileName);
		$('#hid_category_list').val(cat_lists);
		$('#hid_sort_option').val(sort_option);
		$('#hid_city_list').val(city_lists);
		
		$('#hid_orderBy').val(orderBy);
		
				
		if(cat_lists == '' && sort_option=='' && city_lists=='') {
			$('#hid_search').val(0);
		} else {
			$('#hid_search').val(1);
		}
		var search_param =$('#hid_search_param').val();
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl+"archive_projects/search_projects",
		data: "cat_lists="+cat_lists+"&sort_option="+sort_option+"&city_lists="+city_lists+"&search_param="+search_param+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				$('#sr_project_list').empty();
				$("#sr_project_list").html(msg);
				var startp 		= $('#hid_startp').val();
				var limitp		= 9;

				var project_cnt = $('#hid_projects_list_cnt').val();
				project_cnt=parseInt(project_cnt);
				if(project_cnt!=0) {
				$("#Pagination").css('display','block');
				// Create pagination element
				$("#Pagination").pagination(project_cnt, {
				num_edge_entries: 2,
				num_display_entries: 5,
				callback: pageselectCallbackSearch,
				items_per_page:9
				});	
				}
				else {
				$("#Pagination").css('display','none');
				}
			}
		}
		
		});
		function pageselectCallbackSearch(page_index, jq)
		{
				var page_ind = parseInt(page_index)*parseInt(limitp);
				
				var search_param =$('#hid_search_param').val();
				var cat_lists 	= $('#hid_category_list').val();
				var sort_option	= $('#hid_sort_option').val();
				var city_lists	= $('#hid_city_list').val();
				$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/search_projects",
				data: "cat_lists="+cat_lists+"&sort_option="+sort_option+"&city_lists="+city_lists+"&search_param="+search_param+"&startp="+page_ind+"&limitp="+limitp, 
				success: function(msg){
					if(msg)
					{
						$('#sr_project_list').empty();
						$("#sr_project_list").html(msg);
					}
				 }
				});
		}  
		
	
		/*** pageselectCallback ****/				
		
		/*** End pageselectCallback ****/
				

}
	</script> 

<section class="myAccount">
  <div class="myAccountInner">
    <div class="editProfile"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/edit_profile"><span class="editIco"></span>Edit Profile</a></div>
    <h4 class="font16"><?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['profile_name'];?>
</h4>
    <b><?php if ($_smarty_tpl->tpl_vars['my_profile_det']->value['cityname']!=''){?><?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['cityname'];?>
,<?php }?><?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['countryname'];?>
</b><br>
    <span class="dateTxt">Join Date :  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['my_profile_det']->value['joined_date'],"%B %Y");?>
</span>
    <div class="clear"></div>
    <div class="profilePic"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/my_profile"><?php if ($_smarty_tpl->tpl_vars['my_profile_det']->value['profile_imgurl']!=''){?><img src="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['profile_imgurl'];?>
" align="user">
                    <?php }else{ ?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/prof_no_img.png" align="user">
                    <?php }?></a>
                 </div>
    <div class="prfileContent">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="first" width="24%"><div><span class="label2">Innovation Made</span><br>
              <span class="details2" style="cursor:pointer;" onclick="fun('innovation_history')"><?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['innovation_cnt'];?>
</span></div></td>
          <td width="24%"><div><span class="label2">Projects Supported</span><br>
              <span class="details2"  style="cursor:pointer;" onclick="fun('funding_history')"><?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['funded_cnt'];?>
</span></div></td>
          <td width="24%"><div><span class="label2">My Starred</span><br>
              <span class="details2"  style="cursor:pointer;" onclick="fun('my_stared')" ><?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['stared_cnt'];?>
</span></div></td>
          <td width="28%"><div><span class="label2">Remaining Fundinnovations Cash</span><br/>
         
              <span class="details2" style="cursor:pointer;" onclick="fun('funding_cash');"><span class="WebRupee">Rs.</span> <?php if ($_smarty_tpl->tpl_vars['my_profile_det']->value['fundinnovation_cash']==''){?>0<?php }elseif($_smarty_tpl->tpl_vars['my_profile_det']->value['fundinnovation_cash']<0){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['fundinnovation_cash'];?>
<?php }?></span></div></td>
        </tr>
      </table>
      <p><span class="color2">About Me :</span><?php echo stripslashes($_smarty_tpl->tpl_vars['my_profile_det']->value['about_me']);?>
 <!--There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or--></p>
      <div class="submitPane">
        <ul>
          <li>
            <input type="button" id="my_fund" class="blueBtn txtUpper" onclick="fun('my_funding')" value="My Funding">
          </li>
          <li>
            <input type="button" id="my_innov" class="blueBtn txtUpper" onclick="fun('my_innovation')" value="My Innovations">
          </li>
          <li>
            <input type="button" id="my_star" class="blueBtn txtUpper"  onclick="fun('my_stared')" value="My Starred">
          </li>
        </ul>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</section>
<div id="sub_page_div">
<section class="creative" >
<?php if (count($_smarty_tpl->tpl_vars['recently_added']->value)>0){?>
  <h3 class="categoryTitle categoryTitlePdBtmZero"><span>Projects You May Like</span></h3>
  <div class="contentPane contentPanemarBtn">
   <?php if (count($_smarty_tpl->tpl_vars['recently_added']->value)>3){?>
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
  
    <ul <?php if (count($_smarty_tpl->tpl_vars['recently_added']->value)>3){?> id="carousel1" class="jcarousel-skin-content" <?php }elseif(count($_smarty_tpl->tpl_vars['recently_added']->value)==1){?> class="centeAlignOne" <?php }elseif(count($_smarty_tpl->tpl_vars['recently_added']->value)==2){?>  class="centeAlignTwo" <?php }else{ ?>class="centeAlignThree" <?php }?>  >
      <?php  $_smarty_tpl->tpl_vars['recent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recent']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recently_added']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recent']->key => $_smarty_tpl->tpl_vars['recent']->value){
$_smarty_tpl->tpl_vars['recent']->_loop = true;
?>
      <li>
       <div class="article">
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
" ><?php echo $_smarty_tpl->tpl_vars['recent']->value['profile_name'];?>
</a></span></div>
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
            <?php echo smarty_function_math(array('equation'=>"(x * y)/100",'x'=>$_smarty_tpl->tpl_vars['recent']->value['backd_per'],'y'=>234,'assign'=>'width','format'=>"%.0f"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['width']->value>234){?>
            <?php $_smarty_tpl->tpl_vars["width"] = new Smarty_variable(234, null, 0);?>
            <?php }?> 
            <div class="progressBar" >
             <div style="height:7px;margin-top:3px;margin-left:3px;width:<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px" <?php if ($_smarty_tpl->tpl_vars['width']->value==0){?> class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"<?php }else{ ?> class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" <?php }?>   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
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
                
             <!-- <span class="title txtUpper">Days to Go</span><br>
                <span class="amt"><?php echo $_smarty_tpl->tpl_vars['recent']->value['remaining_days'];?>
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
  </div>
  
  <div class="clear"></div><?php }?>
  <div class="btd_btm"></div>
  <div class="clear"></div>
  <section class="filter">
    <div class="filterInner">
      <h5>Filter Projects</h5>
      <form id="frm_search" name="frm_search" >
        <ul>
          <li class="left" >
          <b>Category</b>
          <div class="filterListing">
            <ul>
              <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable("1", null, 0);?>
              <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
              <li <?php if ($_smarty_tpl->tpl_vars['cnt']->value%2==0){?> class="even"   <?php }else{ ?> class="odd" <?php }?> >
              <input type="checkbox" name="category_list[]" id="category_list<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" />
              <?php echo $_smarty_tpl->tpl_vars['cat']->value['category_name'];?>

              </li>
               <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable($_smarty_tpl->tpl_vars['cnt']->value+1, null, 0);?>
          <?php if ($_smarty_tpl->tpl_vars['cat']->value['child_category']!=0){?>
          <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value['child_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
          <li <?php if ($_smarty_tpl->tpl_vars['cnt']->value%2==0){?> class="even"   <?php }else{ ?> class="odd" <?php }?> >
          <input type="checkbox" name="category_list[]" id="category_list<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" />
          >><?php echo $_smarty_tpl->tpl_vars['child']->value['category_name'];?>

          </li>
           <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable($_smarty_tpl->tpl_vars['cnt']->value+1, null, 0);?>
          <?php } ?>
          <?php }?>
         
              <?php } ?>
            </ul>
          </div>
          </li>
          <li class="left mid"><b>Sort Option</b>
            <div class="filterListing">
              <ul>
                <li class="odd">
                  <input type="checkbox" id="sort_option1" name="sort_option" value="success" onClick="check_box(this)" >
                  Successful projects</li>
                <li class="even">
                  <input type="checkbox" id="sort_option2" name="sort_option" value="staff_pick" onClick="check_box(this)" >
                  Staff pick </li>
                <li class="odd">
                  <input type="checkbox" id="sort_option3" name="sort_option" value="most_funded" onClick="check_box(this)" >
                  Most funded </li>
                <li class="even">
                  <input type="checkbox" id="sort_option4" name="sort_option" value="recent" onClick="check_box(this)">
                  Recently launched </li>
              </ul>
            </div>
          </li>
          <li  class="left">
          <b>Location</b>
          <div class="filterListing">
            <ul>
              <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable("1", null, 0);?>
              <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['city_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
              <li  <?php if ($_smarty_tpl->tpl_vars['count']->value%2==0){?> class="even" <?php }else{ ?> class="odd" <?php }?> >
              <input type="checkbox" name="city_list" id="city_list<?php echo $_smarty_tpl->tpl_vars['c']->value['city_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['city_id'];?>
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
        <input type="button" class="blueBtn" value="Search" onclick="search_projects('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
')" />
      </form>
      <input type="hidden" id="hid_category_list" name="hid_category_list" value=""/>
      <input type="hidden" id="hid_sort_option" name="hid_sort_option" value=""/>
      <input type="hidden" id="hid_city_list" name="hid_city_list" value=""/>
      <input type="hidden" id="hid_search" name="hid_search" value=""/>
      <input type="hidden" id="hid_search_param" name="hid_search_param" value="<?php echo $_smarty_tpl->tpl_vars['search_param']->value;?>
"/>
      <div class="clear"></div>
    </div>
  </section>
  <div class="clear"></div>
  <div id="sr_project_list">
   
  </div>
   <div class="clear"></div>
   <div id="Pagination" ></div>
 <div class="clear"></div>
</section>
</div><?php }} ?>