<link rel="stylesheet" href="{$baseurl}styles/jquery-ui.css" />
<!-- <script src="{$baseurl}js/jquery-1.8.3.js"></script>-->
<link rel="stylesheet" href="{$baseurl}styles/pagination.css"/>
<script type="text/javascript" src="{$baseurl}js/admin/jquery.pagination.js"></script>
<script src="{$baseurl}js/jquery-ui.js"></script>
<style type="text/css">
body {
	min-width:1142px !important;
	}
</style>
{literal} 
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

	


var baseurl ="{/literal}{$baseurl}{literal}";
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
		var ptype ="{/literal}{$ptype}{literal}";
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
{/literal}
<section class="myAccount">
  <div class="myAccountInner">
    <div class="editProfile"><a href="{$baseurl}user/edit_profile"><span class="editIco"></span>Edit Profile</a></div>
    <h4 class="font16">{$my_profile_det.profile_name}</h4>
    <b>{if $my_profile_det.cityname neq ''}{$my_profile_det.cityname},{/if}{$my_profile_det.countryname}</b><br>
    <span class="dateTxt">Join Date :  {$my_profile_det.joined_date|date_format:"%B %e, %Y"}</span>
    <div class="clear"></div>
    <div class="profilePic"><a href="{$baseurl}user/my_profile">{if $my_profile_det.profile_imgurl neq ''}<img src="{$my_profile_det.profile_imgurl}" align="user">
                    {else}
                    <img src="{$baseurl}images/prof_no_img.png" align="user">
                    {/if}</a>
                 </div>
    <div class="prfileContent">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="first" width="24%"><div><span class="label2">Innovation Made</span><br>
              <span class="details2" style="cursor:pointer;" onclick="fun('innovation_history')">{$my_profile_det.innovation_cnt}</span></div></td>
          <td width="24%"><div><span class="label2">Projects Supported</span><br>
              <span class="details2"  style="cursor:pointer;" onclick="fun('funding_history')">{$my_profile_det.funded_cnt}</span></div></td>
          <td width="24%"><div><span class="label2">My Starred</span><br>
              <span class="details2"  style="cursor:pointer;" onclick="fun('my_stared')" >{$my_profile_det.stared_cnt}</span></div></td>
          <td width="28%"><div><span class="label2">Remaining Fundinnovations Cash</span><br/>
         
              <span class="details2" style="cursor:pointer;" onclick="fun('funding_cash');"><span class="WebRupee">Rs.</span> {if $my_profile_det.fundinnovation_cash eq ''}0{elseif $my_profile_det.fundinnovation_cash lt 0}0{else}{$my_profile_det.fundinnovation_cash}{/if}</span></div></td>
        </tr>
      </table>
      <p><span class="color2">About Me :</span>{$my_profile_det.about_me|stripslashes} <!--There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or--></p>
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
{if $recently_added|@count gt 0}
  <h3 class="categoryTitle categoryTitlePdBtmZero"><span>Projects You May Like</span></h3>
  <div class="contentPane contentPanemarBtn">
   {if $recently_added|@count gt 3}
  {literal}<script type="text/javascript">
	$(document).ready(function() {
		$('#carousel1').jcarousel({        
		auto: 2,
        wrap: 'circular',
		animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});
	});
	</script>{/literal}
  {/if}
  
    <ul {if $recently_added|@count gt 3} id="carousel1" class="jcarousel-skin-content" {elseif $recently_added|@count eq 1} class="centeAlignOne" {elseif $recently_added|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree" {/if}  >
      {foreach from=$recently_added item=recent}
      <li>
       <div class="article">
       {if $recent.remaining_days gt 0}
       {assign var="class" value=ongoing}
        {assign var="status" value=ongoing}
        {elseif $recent.remaining_days lte 0 && $recent.pledged_amount gte $recent.funding_goal}
       {assign var="class" value=sucess}
        {assign var="status" value=success}
       {elseif $recent.remaining_days lte 0 && $recent.pledged_amount lt $recent.funding_goal}
       {assign var="class" value=unsucess}
       {assign var="status" value=unsucess}
       {/if}
          <!--<div class="fundStatus {$class}">{$status}</div>-->
          
          <div class="imgPane"><a href="{$baseurl}archive_projects/project_details/{$recent.id}"><img src="{$baseurl}uploads/projects/images/medium/{$recent.project_image}" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$recent.id}">{$recent.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span><a href="{$baseurl}profile/index/{$recent.user_id}" >{$recent.profile_name}</a></span></div>
            <div class="right">{$recent.category_name}</div>
            <div class="clear"></div>
            <div>{$recent.city_name}</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p>{$recent.short_description|truncate:100}...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            {math equation="(x * y)/100" x=$recent.backd_per y=234 assign=width format="%.0f"}
            {if $width gt 234}
            {assign var="width" value=234}
            {/if} 
            <div class="progressBar" >
             <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
              <span class="progressPer">{$recent.backd_per}%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt">{$recent.funding_goal}</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt">{$recent.backers_cnt}</span></div>
              <div class="valueCont">
              {if $status eq 'ongoing'}
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $recent.remaining_days gt 0}{$recent.remaining_days}{else}0{/if}</span>
               {else}
                {if $status eq 'success'}
                   <h4>successful</h4>
                   {else}
                   <h4>unsuccessful</h4>
                   {/if}
                {/if}
                
             <!-- <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{$recent.remaining_days}</span>-->
                </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      </li> {/foreach} 
    </ul>
  </div>
  
  <div class="clear"></div>{/if}
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
              {assign var="cnt" value="1"}
              {foreach from=$category_list item=cat}
              <li {if $cnt % 2 eq 0} class="even"   {else} class="odd" {/if} >
              <input type="checkbox" name="category_list[]" id="category_list{$cat.id}" value="{$cat.id}" />
              {$cat.category_name}
              </li>
               {assign var="cnt" value=$cnt+1}
          {if $cat.child_category neq 0}
          {foreach from=$cat.child_category item=child}
          <li {if $cnt % 2 eq 0} class="even"   {else} class="odd" {/if} >
          <input type="checkbox" name="category_list[]" id="category_list{$child.id}" value="{$child.id}" />
          >>{$child.category_name}
          </li>
           {assign var="cnt" value=$cnt+1}
          {/foreach}
          {/if}
         
              {/foreach}
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
              {assign var="count" value="1"}
              {foreach from=$city_list item=c}
              <li  {if $count % 2 eq 0} class="even" {else} class="odd" {/if} >
              <input type="checkbox" name="city_list" id="city_list{$c.city_id}" value="{$c.city_id}" />
              {$c.city_name}
              </li>
              {assign var="count" value=$count+1}
              {/foreach}
            </ul>
          </div>
          </li>
        </ul>
        <div class="clear"></div>
        <input type="button" class="blueBtn" value="Search" onclick="search_projects('{$baseurl}')" />
      </form>
      <input type="hidden" id="hid_category_list" name="hid_category_list" value=""/>
      <input type="hidden" id="hid_sort_option" name="hid_sort_option" value=""/>
      <input type="hidden" id="hid_city_list" name="hid_city_list" value=""/>
      <input type="hidden" id="hid_search" name="hid_search" value=""/>
      <input type="hidden" id="hid_search_param" name="hid_search_param" value="{$search_param}"/>
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
</div>