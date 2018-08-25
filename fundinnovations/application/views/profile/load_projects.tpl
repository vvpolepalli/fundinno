<div  style="margin:0;">
    
    <input type="hidden" name="hid_startp" id="hid_startp" value="{$startp}" />
    <input type="hidden" name="hid_projects_list_cnt" id="hid_projects_list_cnt" value="{$project_list_cnt}" />
    <table class="tabStylee" style="border-collapse: inherit;border-spacing: 0;" cellspacing="0" width="100%" align="center" >
 <tr> <th align="left">Project Title</th><th align="left"> Amount</th></tr>
       {foreach from=$project_list item=pr}
      <tr>
      <td  align="left" valign="top"><a  {if $page_type eq 'referral'} href='javascript:void(0);'  onclick="load_referral_users_pop({$pr.id})" {else} href="{$baseurl}archive_projects/project_details/{$pr.id}"  {/if} style="color:hsl(210, 46%, 46%)">{$pr.project_title} </a>  </td>
      <td align="left" valign="top"> {$pr.tot_amnt}</td>
      </tr>
      {/foreach}
      </table>
</div>

<div id="referral_users" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('referral_users')">Close</a>
       <div class="popTitle">
        <h4 id="hd">Referral users</h4></div>
        <div id="referral_users_cntnt"></div>
      
    </div>
    <div class="clear"></div>
  </div>
  </div>
</div>
{literal}
<script type="text/javascript" charset="utf-8">
function load_referral_users_pop(proj_id){
	$('#referral_users').show();openpPopup();
	$.ajax({
		type:'POST',
		data:'proj_id='+proj_id,
		url :baseurl+'user/load_referral_users_page',
		success:function(msg){
			$('#referral_users_cntnt').html(msg);
			}
		});
	}
</script>
{/literal}