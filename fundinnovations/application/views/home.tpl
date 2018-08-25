<link rel="stylesheet" href="{$baseurl}styles/jquery-ui.css" />
<!-- <script src="{$baseurl}js/jquery-1.8.3.js"></script>-->
<script src="{$baseurl}js/jquery-ui.js"></script>
<style type="text/css">
body {
	min-width:1182px !important;
	}
</style>
{literal} 
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
{/literal}
<section >
  <div class="bannerWrap">
  <div class="bannerWrapInner">
    <div class="videoPane">
   <!--[if lt IE 9]> 
{literal} 
<script type="text/javascript">
$(function() {
		  flowplayer("player",{
                src:"{/literal}{$baseurl}{literal}video/flowplayer/flowplayer-3.2.15.swf",
                wmode:"transparent"
            } ,{
      clip:  {
          autoPlay: false,
          autoBuffering: true
      }
 	 });
	});
</script>
{/literal}

    <a href="{$baseurl}video/main_video.mp4" style="display:block;width:509px;height:281px"  id="player"> 
		</a>
 <![endif]-->
 <![if gte IE 9]>
 <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="509" height="281"
      poster=""
      data-setup="{}">
    
    <source src="{$baseurl}video/main_video.mp4" type='video/mp4' />
    <!--<track kind="captions" src="captions.vtt" srclang="en" label="English" />-->
  </video> <![endif]>

      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <h2 class="gapL273" style="position:relative; padding-right:147px; width:650px; margin:0 auto;text-align: left;">{$website_intro.page_content|truncate:100} <!--Do you think India will be the next global power? Then start the innovation revolution today...--><span style="display:inline-block; position:absolute;right:0"><a href="javascript:void(0);" onclick="$('#lern_more_popup').show();openpPopup();openpPopupFix_home();" class="lrnMrBtn gapM4">Learn more</a></span></h2>
  </div>
 </div> 
  <div id="slider-wrapper">
    <div id="slider" class="nivoSlider"> {foreach from=$imagebanner item=images} <img src="{$baseurl}uploads/image_banner/medium/{$images.image}" alt="title" /> {/foreach} 
      
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>
<section class="creative">
{if $staff_pick|@count gt 0}
  <h3 class="categoryTitle"><span>Staff Picks</span></h3>
  <div class="contentPane">
  {if $staff_pick|@count gt 3}
    {literal}<script type="text/javascript">
	$(document).ready(function() {
		$('#content-carousel').jcarousel({        
			auto: 2,
			wrap: 'circular',
			 animation: 1000,scroll:1,
			initCallback: mycarousel_initCallback
		});
		
	});	
	</script>{/literal}{/if}
    <ul {if $staff_pick|@count gt 3} id="content-carousel" class="jcarousel-skin-content" {elseif $staff_pick|@count eq 1} class="centeAlignOne"  {elseif $staff_pick|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree"{/if}>
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
          <!--<div class="fundStatus {$class}">{$status}</div>-->
          
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
            
              <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true"><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div> 
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
                </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
       {/foreach} 
      
    </ul>
  
    <div class="clear"></div>
  
  </div>
  <div class="clear"></div>
  {/if}
  {if $most_funded|@count gt 0}
  <h3 class="categoryTitle"><span>Most Funded Projects</span></h3>
  
  <div class="contentPane">
   {if $most_funded|@count gt 3}
   {literal}<script type="text/javascript">
	$(document).ready(function() {
		$('#popular-carousel').jcarousel({        
			auto: 2,
			wrap: 'circular',
			 animation: 1000,scroll:1,
			initCallback: mycarousel_initCallback
	   });
	});
	</script>{/literal}
   {/if}
    <ul {if $most_funded|@count gt 3} id="popular-carousel" class="jcarousel-skin-content" {elseif $most_funded|@count eq 1} class="centeAlignOne" {elseif $most_funded|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree" {/if} >
      {foreach from=$most_funded item=fund}
      <li>
       <div  class="article">
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
             <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true"><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div> 
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
               </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
       {/foreach} 
     
    </ul>
  </div>
  <div class="clear"></div>
  {/if}
  {if $recently_added|@count gt 0}
  <h3 class="categoryTitle"><span>Recently Added </span></h3>
  <div class="contentPane">
  {if $recently_added|@count gt 3}
  {literal}<script type="text/javascript">
	$(document).ready(function() {
		$('#recent-carousel').jcarousel({        
		auto: 2,
        wrap: 'circular',
		animation: 1000,scroll:1,
        initCallback: mycarousel_initCallback
	});
	
	});
	</script>{/literal}
  {/if}
    <ul {if $recently_added|@count gt 3}  id="recent-carousel" class="jcarousel-skin-content" {elseif $recently_added|@count eq 1} class="centeAlignOne" {elseif $recently_added|@count eq 2}  class="centeAlignTwo" {else}class="centeAlignThree" {/if} >
      {foreach from=$recently_added item=recent}
      <li>
        <div  class="article">
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
            {elseif $width eq ''}
            {assign var="width" value=0}
            {/if} 
            <div class="progressBar" >
              <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>   
              <!--<div {if $width eq 0} class="progressBarPer progressBarPer-empty"{else} class="progressBarPer" {/if} style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" ></div>-->
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
                
             <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $recent.remaining_days gt 0}{$recent.remaining_days}{else}0{/if}</span>-->
               <!-- <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{$recent.remaining_days}</span>--></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      
      {/foreach} 
    
    </ul>
  </div>
  <div class="clear"></div>
  {/if}
</section>
<section class="btmLinks"  >
  <ul>
    <li class="btmLinks-first"><a href="{$baseurl}knowledge_bank">
    <span class="icons knowledge"></span>
      <p>Knowledge Bank</p>
      <span class="moreArrow"></span>
      </a></li>
    <li><a href="{$baseurl}tools_tips">
    <span class="icons tips"></span>
      <p class="tips">Tips & Tools</p>
      <span class="moreArrow"></span>
      </a></li>
    <li class="btmLinks-last">
    <a href="{$baseurl}testimonial"><span class="icons testi"></span>
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
</div>