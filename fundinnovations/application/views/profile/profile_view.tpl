<link rel="stylesheet" href="{$baseurl}styles/jquery-ui.css" />
<script src="{$baseurl}js/jquery-ui.js"></script>
<style type="text/css">
body {
	min-width:1142px !important;
	}
</style>
{literal} 
<script type="text/javascript">
var baseurl ="{/literal}{$baseurl}{literal}";
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
{/literal}
<section class="myAccount">
	<div class="myAccountInner">
		<h4 class="font16">{$profile_det.profile_name}</h4>
		<b>{$profile_det.cityname}</b><br>
		<span class="dateTxt">Join Date :  {$profile_det.joined_date|date_format:"%B %Y"}</span>
		<div class="clear"></div>
		<div class="profilePic"><a href="{$baseurl}profile/index/{$profile_det.id}">
        {if $profile_det.profile_imgurl neq ''}
        <img src="{$profile_det.profile_imgurl}"  align="user">
                    {else}
	   <img src="{$baseurl}images/prof_no_img.png" align="user">
                    {/if}
                    </a></div>
		<div class="prfileContent">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="first" width="24%"><div><span class="label2">Innovation Made</span><br>
							<span class="details2">{$profile_det.innovation_cnt}</span></div></td>
					<td width="24%"><div><span class="label2">Project Funded</span><br>
							<span class="details2">{$profile_det.funded_cnt}</span></div></td>
					<td width="24%"><div><span class="label2">Starred</span><br>
							<span class="details2">{$profile_det.stared_cnt}</span></div></td>
							<td width="28%" class="emptyTd">&nbsp;  </td>
				</tr>
			</table>
			<p><span class="color2">About Me :</span> {$profile_det.about_me|stripslashes}</p>
			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</section>
<section class="creative">
 {if $projects_funded|@count gt 0}
	<h3 class="categoryTitle categoryTitlePdBtmZero"><span>Projects Funded</span></h3>
	<div class="contentPane contentPanemarBtn">
    {if $projects_funded|@count gt 3}
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
		<ul  {if $projects_funded|@count gt 3} id="carousel1" class="jcarousel-skin-content" {elseif $projects_funded|@count eq 1} class="centeAlignOne" {elseif $projects_funded|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree" {/if} >
        {foreach from=$projects_funded item=funded}
    	  <li>
        <div class="article">
        {if $funded.remaining_days gt 0}
       {assign var="class" value=ongoing}
        {assign var="status" value=ongoing}
        {elseif $funded.remaining_days lte 0 && $funded.pledged_amount gte $funded.funding_goal}
       {assign var="class" value=sucess}
        {assign var="status" value=success}
       {elseif $funded.remaining_days lte 0 && $funded.pledged_amount lt $funded.funding_goal}
       {assign var="class" value=unsucess}
       {assign var="status" value=unsucess}
       {/if}
          <!--<div class="fundStatus {$class}">{$status}</div>-->
          
          <div class="imgPane"><a href="{$baseurl}archive_projects/project_details/{$funded.id}"><img src="{$baseurl}uploads/projects/images/medium/{$funded.project_image}" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$funded.id}">{$funded.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span><a href="{$baseurl}profile/index/{$funded.user_id}" >{$funded.profile_name|ucwords}</a></span></div>
            <div class="right">{$funded.category_name|ucwords}</div>
            <div class="clear"></div>
            <div>{$funded.city_name}</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p>{$funded.short_description|truncate:100}...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            {math equation="(x * y)/100" x=$funded.backd_per y=234 assign=width format="%.0f"}
            {if $width gt 234}
            {assign var="width" value=234}
            {/if} 
            <!--  <div class="progressImg">
            <img src="{$baseurl}images/progress_top58.png" style="padding-left:5px;" ><span class="progressPer">58%</span>-->
            <div class="progressBar" >
              <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
              <span class="progressPer">{$funded.backd_per}%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt">{$funded.funding_goal}</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt">{$funded.backers_cnt}</span></div>
              <div class="valueCont">{if $status eq 'ongoing'}
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $funded.remaining_days gt 0}{$funded.remaining_days}{else}0{/if}</span>
               {else}
                {if $status eq 'success'}
                   <h4>successful</h4>
                   {else}
                   <h4>unsuccessful</h4>
                   {/if}
                {/if}</div>
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
	</div>
    {/if}
      {if $projects_innovated|@count gt 0}
	<h3 class="categoryTitle categoryTitlePdBtmZero"><span>Projects Innovated</span></h3>
	<div class="clear"></div>
	<div class="contentPane contentPanemarBtn">
     {if $projects_innovated|@count gt 3}
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
	<ul {if $projects_innovated|@count gt 3} id="carousel2" class="jcarousel-skin-content" {elseif $projects_innovated|@count eq 1} class="centeAlignOne" {elseif $projects_innovated|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree" {/if}  >
        {foreach from=$projects_innovated item=innovated}
      <li>
       <div class="article">
        {if $innovated.remaining_days gt 0}
       {assign var="class" value=ongoing}
        {assign var="status" value=ongoing}
        {elseif $innovated.remaining_days lte 0 && $innovated.pledged_amount gte $innovated.funding_goal}
       {assign var="class" value=sucess}
        {assign var="status" value=success}
       {elseif $innovated.remaining_days lte 0 && $innovated.pledged_amount lt $innovated.funding_goal}
       {assign var="class" value=unsucess}
       {assign var="status" value=unsucess}
       {/if}
         <!-- <div class="fundStatus {$class}">{$status}</div>-->
          
          <div class="imgPane"><a href="{$baseurl}archive_projects/project_details/{$innovated.id}"><img src="{$baseurl}uploads/projects/images/medium/{$innovated.project_image}" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$innovated.id}">{$innovated.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span><a href="{$baseurl}profile/index/{$innovated.user_id}" >{$innovated.profile_name|ucwords}</a></span></div>
            <div class="right">{$innovated.category_name|ucwords}</div>
            <div class="clear"></div>
            <div>{$innovated.city_name}</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p>{$innovated.short_description|truncate:100}...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            {math equation="(x * y)/100" x=$innovated.backd_per y=234 assign=width format="%.0f"}
            {if $width gt 234}
            {assign var="width" value=234}
            {/if} 
            <div class="progressBar" >
             <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
              <span class="progressPer">{$innovated.backd_per}%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt">{$innovated.funding_goal}</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt">{$innovated.backers_cnt}</span></div>
              <div class="valueCont">
              {if $status eq 'ongoing'}
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $innovated.remaining_days gt 0}{$innovated.remaining_days}{else}0{/if}</span>
               {else}
                {if $status eq 'success'}
                   <h4>successful</h4>
                   {else}
                   <h4>unsuccessful</h4>
                   {/if}
                {/if}
                
              <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{$innovated.remaining_days}</span>-->
                </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      </li> {/foreach} 
			
		</ul>
        <div class="clear"></div>
	</div>
    {/if}
    {if $projects_stared|@count gt 0}
	<h3 class="categoryTitle categoryTitlePdBtmZero"><span>Projects Followed</span></h3>
	<div class="clear"></div>
	<div class="contentPane contentPanemarBtn">
    {if $projects_stared|@count gt 3}
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
		<ul {if $projects_stared|@count gt 3} id="carousel3" class="jcarousel-skin-content" {elseif $projects_stared|@count eq 1} class="centeAlignOne" {elseif $projects_stared|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree" {/if} >
			{foreach from=$projects_stared item=stared}
     		 <li>
       <div class="article">
       {if $stared.remaining_days gt 0}
       {assign var="class" value=ongoing}
        {assign var="status" value=ongoing}
        {elseif $stared.remaining_days lte 0 && $stared.pledged_amount gte $stared.funding_goal}
       {assign var="class" value=sucess}
        {assign var="status" value=success}
       {elseif $stared.remaining_days lte 0 && $stared.pledged_amount lt $stared.funding_goal}
       {assign var="class" value=unsucess}
       {assign var="status" value=unsucess}
       {/if}
          <!--<div class="fundStatus {$class}">{$status}</div>-->
          
          <div class="imgPane"><a href="{$baseurl}archive_projects/project_details/{$stared.id}"><img src="{$baseurl}uploads/projects/images/medium/{$stared.project_image}" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$stared.id}">{$stared.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span><a href="{$baseurl}profile/index/{$stared.user_id}" >{$stared.profile_name|ucwords}</a></span></div>
            <div class="right">{$stared.category_name|ucwords}</div>
            <div class="clear"></div>
            <div>{$stared.city_name}</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p>{$stared.short_description|truncate:100}...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            {math equation="(x * y)/100" x=$stared.backd_per y=234 assign=width format="%.0f"}
            {if $width gt 234}
            {assign var="width" value=234}
            {/if} 
            <div class="progressBar" >
              <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
              <span class="progressPer">{$stared.backd_per}%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt">{$stared.funding_goal}</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt">{$stared.backers_cnt}</span></div>
              <div class="valueCont">
               {if $status eq 'ongoing'}
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $stared.remaining_days gt 0}{$stared.remaining_days}{else}0{/if}</span>
               {else}
                {if $status eq 'success'}
                   <h4>successful</h4>
                   {else}
                   <h4>unsuccessful</h4>
                   {/if}
                {/if}
                <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{$stared.remaining_days}</span>--></div>
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
	</div>
    {/if}
	<div class="clear"></div>
</section>