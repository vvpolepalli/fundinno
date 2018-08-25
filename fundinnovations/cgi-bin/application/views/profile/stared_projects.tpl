{literal} 
<script type="text/javascript">
var baseurl='{/literal}{$baseurl}{literal}';
$(document).ready(function() {
	 $( ".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });
});

function removeStar(){
	var pid=$('#hid_pr_id').val();
	$.ajax({
		type: "POST",
		url: baseurl+"archive_projects/star_project",
		data: "proj_id="+pid+"&type=remove_star", 
		success: function(msg){
			close_pop('alert_popup');fun('my_stared');
			}
		});
}
function removeStar_pop(pid){
	$('#hid_pr_id').val(pid);
	$('#alert_popup').show();
	openpPopup();
}
 function close_pop(id){
	 $('#'+id).hide();
	 closepPopup();
 	}
	</script> 
{/literal}
<div class="creative">
  <div class="contentPane contentPaneNoSLide">
    <ul>
    <!--<input type="hidden" name="hid_startp" id="hid_startp" value="{$startp}" />-->
    <input type="hidden" name="hid_projects_list_cnt" id="hid_projects_list_cnt" value="{$projects_list_cnt}" />
     {assign var="list_count" value=1}
      {foreach from=$projects_stared item=pr}
      <li  {if $list_count % 3 eq 0} class="rightaligned" {/if} >
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
        <!--  <div class="fundStatus {$class}">{$status}</div>-->
          <div class="imgPane"><a href="{$baseurl}archive_projects/project_details/{$pr.id}"><img src="{$baseurl}uploads/projects/images/medium/{$pr.project_image}" alt="title"></a></div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$pr.id}">{$pr.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span><a href="{$baseurl}profile/index/{$pr.user_id}" >{$pr.profile_name}</a></span></div>
            <div class="right">{$pr.category_name}</div>
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
              <div class="progressBarPer" style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" ></div>
              <span class="progressPer">{$pr.backd_per}%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt">{$pr.funding_goal}</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt">{$pr.backers_cnt}</span></div>
              <div class="valueCont">{if $status eq 'ongoing'}
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
                <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{$pr.remaining_days}</span>--></div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="btm"></div>
        <a href="javascript:void(0);" class="removeBtn" id="removeStar" onClick="removeStar_pop({$pr.id})"><span class="spriteImg removeIco"></span>Remove Star</a>
          <!--<div class="valueCont"><span class="title txtUpper">Backed amount:</span>
                <span class="amt">{$pr.backed_by_user}</span></div>-->
      </li>
       {assign var="list_count" value=$list_count+1}
      {foreachelse}
       <div class="no_results">
         No results found.
      </div>
     
      {/foreach} 
    
    </ul>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>

<div id="alert_popup" class="popFixed" style="display:none">
<div class="popabs">
<div id="inlineContent2" class="white_content">
		<div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('alert_popup')">Close</a>
        <input type="hidden" id="hid_pr_id" name="hid_pr_id" value="" />
<div class="popTitle">
				
				<h4>Are you sure you want remove the star.</h4></div>
				<div id="alert_pop_cntnt"  class="prodeForm"> 
                
			<div class="submitPane">
						<ul>
					<li style="border-left: 0px none;">
								<input type="button" onclick="removeStar()" value="Confirm" class="blueBtn" name="confirm" id="confirm">
							</li>
					<li>
								<input type="button" onclick="close_pop('alert_popup')" value="Cancel" class="grayBtn" name="cancel" id="cancel">
							</li>
				</ul><div class="clear"></div>
					</div>
                    <div class="clear"></div>
			</div>
			
</div>
		<div class="clear"></div>
	</div>
</div>
</div>