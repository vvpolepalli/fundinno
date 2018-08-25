
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
function delete_project(){
	var pid=$('#hid_pr_id').val();
	$.ajax({
		type: "POST",
		url: baseurl+"user/delete_project",
		data: "proj_id="+pid, 
		success: function(msg){
			close_pop('alert_popup');
			load_page('innovation_history','#lnk2');
			}
		});
}
function delete_project_pop(pid){
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

<div  class="creative">
  <div class="contentPane contentPaneNoSLide contentPaneTab">
    <ul >
     <!-- <input type="hidden" name="hid_startp" id="hid_startp" value="{$startp}" />
      <input type="hidden" name="hid_projects_list_cnt" id="hid_projects_list_cnt" value="{$projects_list_cnt}" />-->
       {assign var="list_count" value=1}
       {foreach from=$projects_innovated item=pr}
      <li  {if $list_count % 3 eq 0} class="rightaligned" {/if} >
        <div class="article">
         	 {if $pr.status eq 'incomplete'}
             {assign var="class" value=incompleted}
               {assign var="status" value=incompleted}
             {else if $pr.status eq 'rejected'}
             {assign var="class" value=rejected}
               {assign var="status" value=rejected}
              {else if $pr.status eq 'pending'}
             {assign var="class" value=pending}
               {assign var="status" value=pending}
             {else}
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
       {/if}
          <div class="fundStatus {$class}">{$status}</div>
          <div class="imgPane">
              {if $pr.project_image neq ''}<img src="{$baseurl}uploads/projects/images/medium/{$pr.project_image}" alt="title">{else}
                  <img src="{$baseurl}images/no_image_project.jpg" alt="title">
              {/if}
          <div class="viewEditBlk" {if $class eq 'incompleted' || $class eq 'rejected' || $class eq 'pending'}{else}style="padding-left:103px;"{/if}>
           <table cellpadding="0" cellspacing="0" align="left" border="0" width="100">
           <tr valign="middle" align="center">
           {if $class eq 'incompleted' || $class eq 'rejected' || $class eq 'pending'}
            <td align="left"><a class="editvipopLink" href="{$baseurl}archive_projects/project_details/{$pr.id}">View</a></td>
            <td align="right"><a class="editvipopLink" href="{$baseurl}project/innovate_project/{$pr.id}">edit</a></td>
            {else}
               <td align="right"><a class="editvipopLink" href="{$baseurl}archive_projects/project_details/{$pr.id}">View</a></td>
          <!--  <td align="right"><a class="editvipopLink" href="{$baseurl}project/innovate_project/{$pr.id}">edit</a></td>-->
            {/if}
           </tr> 
           </table>
          </div>
          
          </div>
          <div class="innerContent">
            <h4><a href="{$baseurl}archive_projects/project_details/{$pr.id}">{$pr.project_title}</a></h4>
            <div class="innovatorName">Innovator : <span>{$pr.profile_name|ucwords}</span></div>
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
              <div {if $width eq 0} class="progressBarPer progressBarPer-empty"{else} class="progressBarPer" {/if} style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" style="height:7px;margin-top:3px;margin-left:3px;width:{$width}px" ></div>
              <span class="progressPer">{$pr.backd_per}%</span></div>
            <div class="clear"></div>
            <div class="valuePane">
              <div class="valueCont"><span class="title txtUpper">Goal Amount</span><br>
                <span class="WebRupee">Rs. </span><span class="amt">{$pr.funding_goal}</span></div>
              <div class="valueCont"><span class="title txtUpper">Supporters</span><br>
                <span class="amt">{$pr.backers_cnt}</span></div>
              <div class="valueCont">
              {if $status eq 'ongoing' ||   $pr.status eq 'incomplete' ||  $pr.status eq 'pending' ||  $pr.status eq 'rejected'}
              <span class="title txtUpper">Days to Go</span><br>
                <span class="amt">
                {if $pr.remaining_days lt 0 || $pr.remaining_days eq ''}
              {if $pr.created_date eq '' || $pr.created_date eq '0000-00-00 00:00:00'}-{/if}
              {else}
              {if $pr.remaining_days gt $pr.fund_duration}
              -
              {else}
              {$pr.remaining_days}
              {/if}
              {/if}
                <!--{if $pr.remaining_days gt 0}{$pr.remaining_days}{else}0{/if}-->
                </span>
               {else}
                {if $status eq 'success'}
                   <h4>successful</h4>
                   {else}
                   <h4>unsuccessful</h4>
                   {/if}
                {/if}
              <!--<span class="title txtUpper">Days to Go</span><br>
                <span class="amt">{if $pr.remaining_days gt 0}{$pr.remaining_days}{else}0{/if}</span>-->
                </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div> 

        </div> 
        <div class="btm"></div>
    <!--{if $pr.status eq 'incomplete'}<a href="javascript:void(0);" class="removeBtn" id="deleteProj" onClick="delete_project_pop({$pr.id})"><span class="spriteImg removeIco"></span>Delete Project</a>{/if}-->
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
				
				<h4>Are you sure you want delete this project.</h4></div>
				<div id="alert_pop_cntnt"  class="prodeForm"> 
                
			<div class="submitPane">
						<ul>
					<li style="border-left: 0px none;">
								<input type="button" onclick="delete_project()" value="Confirm" class="blueBtn" name="confirm" id="confirm">
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
