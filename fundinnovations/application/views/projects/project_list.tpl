{literal} 
<script type="text/javascript">
var baseurl='{/literal}{$baseurl}{literal}';
$(document).ready(function() {
	/* $( ".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });
	var startp 		= '{/literal}{$startp}{literal}';
	var limitp		= 3;
	//alert(startp)
	var project_cnt = '{/literal}{$projects_list_cnt}{literal}';
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
{/literal}
<div class="creative" style="width:1136px">
  <div class="contentPane contentPaneNoSLide">
    <ul>
    <input type="hidden" name="hid_startp" id="hid_startp" value="{$startp}" />
    <input type="hidden" name="hid_projects_list_cnt" id="hid_projects_list_cnt" value="{$projects_list_cnt}" />
      {assign var="list_count" value=1}
      {foreach from=$projects_list item=pr}
      <li {if $list_count % 3 eq 0} class="rightaligned" {/if} >
        <div class="article">
        {if $pr.remaining_days gt 0}
       {assign var="class" value=ongoing}
        {assign var="status" value=ongoing}
        {elseif $pr.remaining_days lte 0 && $pr.pledged_amount gte $pr.funding_goal}
       {assign var="class" value=sucess}
        {assign var="status" value=success}
       {elseif $pr.remaining_days lte 0 && $pr.pledged_amount lt $pr.funding_goal}
       {assign var="class" value=unsucess}
       {assign var="status" value=unsucess}
       {/if}
       <!--<div class="fundStatus {$class}">{$status}</div>-->
       
          <div class="imgPane"><a href="{$baseurl}archive_projects/project_details/{$pr.id}"><img src="{$baseurl}uploads/projects/images/medium/{$pr.project_image}" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$pr.id}">{$pr.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span><a href="{$baseurl}profile/index/{$pr.user_id}">{$pr.profile_name|ucwords}</a></span></div>
            <div class="right">{$pr.category_name|ucwords}</div>
            <div class="clear"></div>
            <div>{$pr.city_name}</div>
            <div class="clear"></div>
          </div>
          <div class="contentDis">
            <p>{$pr.short_description|truncate:100|stripslashes}...</p>
          </div>
          <div class="progressPane">
            <div class="txt"><b>Funded</b></div>
            {math equation="(x * y)/100" x=$pr.backd_per y=234 assign=width format="%.0f"}
            {if $width gt 234}
            {assign var="width" value=234}
            {/if}
            <div class="progressBar" >
              <div style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" {if $width eq 0} class="progressBarPer progressBarPer-empty  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled"{else} class="progressBarPer  ui-slider ui-widget ui-widget-content ui-corner-all ui-slider-disabled ui-disabled ui-slider-horizontal ui-state-disabled" {/if}   aria-disabled="true" ><div class="ui-slider-range ui-slider-range-min ui-widget-header" style="width: 100%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;" disabled="disabled"></a></div>
              <span class="progressPer">{$pr.backd_per}%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt">{$pr.funding_goal}</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt">{$pr.backers_cnt}</span></div>
              <div class="valueCont">
              {if $status eq 'ongoing'}
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $pr.remaining_days gt 0}{$pr.remaining_days}{else}0{/if}</span>
               {else}
                {if $status eq 'success'}
                   <h4>successful</h4>
                   {else}
                   <h4>unsuccessful</h4>
                   {/if}
                {/if}
                
              <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $pr.remaining_days gt 0}{$pr.remaining_days}{else}0{/if}</span>-->
               <!-- <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{$pr.remaining_days}</span>-->
                </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
      </li>
       {if $list_count % 3 eq 0}<li class="clearBotNoslideBorder" ></li>{/if}
      {assign var="list_count" value=$list_count+1}
      {foreachelse}
       <div class="no_results">
         No results found. Please change your criteria and try.
      </div>
     
      {/foreach} 
    
    </ul>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
