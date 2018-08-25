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
var baseurl ="{/literal}{$baseurl}{literal}";
var loader_img=baseurl+'images/ajax-loader_proj.gif';
$(function() {
        // setup master volume
        /*$( ".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });*/
		var search_param= $('#hid_search_param').val();
		if(search_param !='')
		search_projects(baseurl);
		
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
		$('#sr_project_list').empty().html('<center><img src="'+loader_img+'"/></center>');;
		$.ajax({
		type: "POST",
		url: baseurl+"archive_projects/search_projects",
		data: "cat_lists="+cat_lists+"&sort_option="+sort_option+"&city_lists="+city_lists+"&search_param="+search_param+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				
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
						
						$('#sr_project_list').empty().html('<center><img src="'+loader_img+'"/></center>');//ajax-loader_proj.gif
						$("#sr_project_list").html(msg);
					}
				 }
				});
		}  
		
	
		/*** pageselectCallback ****/				
		
		/*** End pageselectCallback ****/
				

}
function more_projects(sort_option){
	
		var startp=0;
	    var limitp=9;
		if(sort_option =='success')
		$('#sort_option1').attr("checked", true);
		else if(sort_option =='staff_pick')
		$('#sort_option2').attr("checked", true);
		else if(sort_option =='most_funded')
		$('#sort_option3').attr("checked", true);
		else if(sort_option =='recent')
		$('#sort_option4').attr("checked", true);
		
		$('#hid_sort_option').val(sort_option);
		//var search_param =$('#hid_search_param').val();
		//$('#hid_orderBy').val(orderBy);
		$.ajax({
		type: "POST",
		url: baseurl+"archive_projects/search_projects",
		data: "sort_option="+sort_option+"&startp="+startp+"&limitp="+limitp, 
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
				callback: pageselectCallbackSearchMore,
				items_per_page:9
				});	
				}
				else {
				$("#Pagination").css('display','none');
				}
			}
		}
		
		});
		function pageselectCallbackSearchMore(page_index, jq)
		{
				var page_ind = parseInt(page_index)*parseInt(limitp);
				//return false
				//var cat_lists 	= $('#hid_category_list').val();
				var sort_option	= $('#hid_sort_option').val();
				//var city_lists	= $('#hid_city_list').val();
				$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/search_projects",
				data: "sort_option="+sort_option+"&startp="+page_ind+"&limitp="+limitp, 
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

	/*$(document).ready(function() {
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
		 animation: 'slow',
        initCallback: mycarousel_initCallback
	});});
	$(document).ready(function() {
		jQuery('#recent-carousel').jcarousel({        
		auto: 2,
        wrap: 'last',
		  animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});});
	});*/


	</script> 
{/literal}
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
      <li   class="left"><b>Location</b>
        <div class="filterListing">
          <ul>
          {assign var="count" value="1"}
          {foreach from=$city_list item=c}
          <li   {if $count % 2 eq 0} class="even" {else} class="odd" {/if} >
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
<div id="sr_project_list">
<section class="creative creativeDiscoverProjects">
{if $recently_added|@count gt 0}
  <h3 class="categoryTitle categoryTitlePdBtmZero"><span>Recently Launched Projects </span></h3>
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
 <!--<pre> {$recently_added|print_r}</pre>-->
    <ul  {if $recently_added|@count gt 3} id="carousel1" class="jcarousel-skin-content" {elseif $recently_added|@count eq 1} class="centeAlignOne" {elseif $recently_added|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree" {/if}>
     {foreach from=$recently_added item=recent}
     <!--rightaligned -->
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
      <!-- <div class="fundStatus {$class}">{$status}</div>-->
       
          <div class="imgPane"><a href="{$baseurl}archive_projects/project_details/{$recent.id}"><img src="{$baseurl}uploads/projects/images/medium/{$recent.project_image}" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$recent.id}">{$recent.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span><a href="{$baseurl}profile/index/{$recent.user_id}">{$recent.profile_name|ucwords}</a></span></div>
            <div class="right">{$recent.category_name|ucwords}</div>
            <div class="clear"></div>
            <div>{$recent.city_name}</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p>{$recent.short_description|truncate:100|stripslashes}...</p>
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
                
              <!--{if $recent.remaining_days gt 0}<span class="title txtUpper">Days to Go</span><br>{/if}
                <span class="amt">{if $recent.remaining_days gt 0}{$recent.remaining_days}{else}{$recent.project_status|ucwords}{/if}</span>-->
               <!-- <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{$recent.remaining_days}</span>--></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      </li> {/foreach} 
    </ul>
    <div class="clear"></div>
    <div class="moreProBtnPane"><a href="javascript:void(0)" onclick="more_projects('recent')">More Projects</a> </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  {/if}
  {if $most_funded|@count gt 0}
  <h3 class="categoryTitle categoryTitlePdBtmZero"><span>Most Funded Projects </span></h3>
  <div class="contentPane contentPanemarBtn">
  {if $most_funded|@count gt 3}
    {literal}<script type="text/javascript">
	$(document).ready(function() {
		$('#carousel2').jcarousel({        
		auto: 2,
        wrap: 'circular',
		animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});
	});
	</script>{/literal}
  {/if}
    <ul {if $most_funded|@count gt 3} id="carousel2" class="jcarousel-skin-content" {elseif $most_funded|@count eq 1} class="centeAlignOne" {elseif $most_funded|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree" {/if} >
     {foreach from=$most_funded item=fund}
      <li>
       <div class="article">
       {if $fund.remaining_days gt 0}
       {assign var="class" value=ongoing}
        {assign var="status" value=ongoing}
        {elseif $fund.remaining_days lte 0 && $fund.pledged_amount gte $fund.funding_goal}
       {assign var="class" value=sucess}
        {assign var="status" value=success}
       {elseif $fund.remaining_days lte 0 && $fund.pledged_amount lt $fund.funding_goal}
       {assign var="class" value=unsucess}
       {assign var="status" value=unsucess}
       {/if}
      <!-- <div class="fundStatus {$class}">{$status}</div>-->
          <div class="imgPane"><a href="{$baseurl}archive_projects/project_details/{$fund.id}"><img src="{$baseurl}uploads/projects/images/medium/{$fund.project_image}" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$fund.id}">{$fund.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span><a href="{$baseurl}profile/index/{$fund.user_id}">{$fund.profile_name|ucwords}</a></span></div>
            <div class="right">{$fund.category_name|ucwords}</div>
            <div class="clear"></div>
            <div>{$fund.city_name}</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p>{$fund.short_description|truncate:100|stripslashes}...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            {math equation="(x * y)/100" x=$fund.backd_per y=234 assign=width format="%.0f"}
            {if $width gt 234}
            {assign var="width" value=234}
            {/if} 
            <div class="progressBar" >
              <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
              <span class="progressPer">{$fund.backd_per}%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt">{$fund.funding_goal}</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt">{$fund.backers_cnt}</span></div>
              <div class="valueCont">
              {if $status eq 'ongoing'}
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $fund.remaining_days gt 0}{$fund.remaining_days}{else}0{/if}</span>
               {else}
                {if $status eq 'success'}
                   <h4>successful</h4>
                   {else}
                   <h4>unsuccessful</h4>
                   {/if}
                {/if}
                
           <!--   {if $fund.remaining_days gt 0}<span class="title txtUpper">Days to Go</span><br>{/if}
                <span class="amt">{if $fund.remaining_days gt 0}{$fund.remaining_days}{else}{$fund.project_status|ucwords}{/if}</span>
                
                <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{$fund.remaining_days}</span>--></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      </li> {/foreach} 
     
    </ul>
    <div class="clear"></div>
    <div class="moreProBtnPane"><a href="javascript:void(0)" onclick="more_projects('most_funded')">More Projects</a> </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  {/if}
  {if $staff_pick|@count gt 0}
  <h3 class="categoryTitle categoryTitlePdBtmZero"><span>Staff Picks </span></h3>
  <div class="contentPane contentPanemarBtn">
  {if $staff_pick|@count gt 3}
  {literal}<script type="text/javascript">
	$(document).ready(function() {
		$('#carousel3').jcarousel({        
		auto: 2,
        wrap: 'circular',
		animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});
	});
	</script>{/literal}
  {/if}
    <ul {if $staff_pick|@count gt 3} id="carousel3" class="jcarousel-skin-content" {elseif $staff_pick|@count eq 1} class="centeAlignOne" {elseif $staff_pick|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree" {/if} >
    {foreach from=$staff_pick item=staf}
      <li>
       <div class="article">
       {if $staf.remaining_days gt 0}
       {assign var="class" value=ongoing}
        {assign var="status" value=ongoing}
        {elseif $staf.remaining_days lte 0 && $staf.pledged_amount gte $staf.funding_goal}
       {assign var="class" value=sucess}
        {assign var="status" value=success}
       {elseif $staf.remaining_days lte 0 && $staf.pledged_amount lt $staf.funding_goal}
       {assign var="class" value=unsucess}
       {assign var="status" value=unsucess}
       {/if}
   <!--    <div class="fundStatus {$class}">{$status}</div>-->
       
          <div class="imgPane"><a href="{$baseurl}archive_projects/project_details/{$staf.id}"><img src="{$baseurl}uploads/projects/images/medium/{$staf.project_image}" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$staf.id}">{$staf.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span><a href="{$baseurl}profile/index/{$staf.user_id}">{$staf.profile_name|ucwords}</a></span></div>
            <div class="right">{$staf.category_name|ucwords}</div>
            <div class="clear"></div>
            <div>{$staf.city_name}</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p>{$staf.short_description|truncate:100|stripslashes}...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            {math equation="(x * y)/100" x=$staf.backd_per y=234 assign=width format="%.0f"}
            {if $width gt 234}
            {assign var="width" value=234}
            {/if} 
            <div class="progressBar" >
              <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
              <span class="progressPer">{$staf.backd_per}%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt">{$staf.funding_goal}</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt">{$staf.backers_cnt}</span></div>
              <div class="valueCont">
               {if $status eq 'ongoing'}
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $staf.remaining_days gt 0}{$staf.remaining_days}{else}0{/if}</span>
               {else}
                {if $status eq 'success'}
                   <h4>successful</h4>
                   {else}
                   <h4>unsuccessful</h4>
                   {/if}
                {/if}
                <!--{if $staf.remaining_days gt 0}<span class="title txtUpper">Days to Go</span><br>{/if}
                <span class="amt">{if $staf.remaining_days gt 0}{$staf.remaining_days}{else}{$staf.project_status|ucwords}{/if}</span>-->
                
                <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{$staf.remaining_days}</span>--></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      </li> {/foreach} 
      
    </ul>
    <div class="clear"></div>
    <div class="moreProBtnPane"><a href="javascript:void(0)" onclick="more_projects('staff_pick')">More Projects</a> </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  {/if}
  {if $succ_projects|@count gt 0}
  <h3 class="categoryTitle categoryTitlePdBtmZero"><span>Successful Projects </span></h3>
  <div class="contentPane contentPanemarBtn">
  {if $succ_projects|@count gt 3}
  {literal}<script type="text/javascript">
	$(document).ready(function() {
		$('#carousel4').jcarousel({        
		auto: 2,
        wrap: 'circular',
		animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});
	});
	</script>{/literal}
  {/if}
    <ul {if $succ_projects|@count gt 3} id="carousel4" class="jcarousel-skin-content" {elseif $succ_projects|@count eq 1} class="centeAlignOne" {elseif $succ_projects|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree" {/if}  >
    {foreach from=$succ_projects item=succ}
      <li>
       <div class="article">
       {if $succ.remaining_days gt 0}
       {assign var="class" value=ongoing}
        {assign var="status" value=ongoing}
        {elseif $succ.remaining_days lte 0 && $succ.pledged_amount gte $succ.funding_goal}
       {assign var="class" value=sucess}
        {assign var="status" value=success}
       {elseif $succ.remaining_days lte 0 && $succ.pledged_amount lt $succ.funding_goal}
       {assign var="class" value=unsucess}
       {assign var="status" value=unsucess}
       {/if}
      <!-- <div class="fundStatus {$class}">{$status}</div>-->
       
          <div class="imgPane"><a href="{$baseurl}archive_projects/project_details/{$succ.id}"><img src="{$baseurl}uploads/projects/images/medium/{$succ.project_image}" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$succ.id}">{$succ.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span><a href="{$baseurl}profile/index/{$succ.user_id}">{$succ.profile_name|ucwords}</a></span></div>
            <div class="right">{$succ.category_name|ucwords}</div>
            <div class="clear"></div>
            <div>{$succ.city_name}</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p>{$succ.short_description|truncate:250|stripslashes}...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            {math equation="(x * y)/100" x=$succ.backd_per y=234 assign=width format="%.0f"}
            {if $width gt 234}
            {assign var="width" value=234}
            {/if} 
            <div class="progressBar" >
              <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
               <span class="progressPer">{$succ.backd_per}%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt">{$succ.funding_goal}</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt">{$succ.backers_cnt}</span></div>
              <div class="valueCont">
               {if $status eq 'ongoing'}
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $succ.remaining_days gt 0}{$succ.remaining_days}{else}0{/if}</span>
               {else}
                {if $status eq 'success'}
                   <h4>successful</h4>
                   {else}
                   <h4>unsuccessful</h4>
                   {/if}
                {/if}
                
             <!-- <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $succ.remaining_days gt 0}{$succ.remaining_days}{else}0{/if}</span>
                
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{$succ.remaining_days}</span>--></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div> 
        </div>
        <div class="btm"></div>
      </li>
       {/foreach} 
      
    </ul>
    <div class="clear"></div>
    <div class="moreProBtnPane"><a href="javascript:void(0)" onclick="more_projects('success')">More Projects</a> </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  {/if}
</section>

</div>
<div class="clear"></div>
<div id="Pagination" ></div>
 <div class="clear"></div>