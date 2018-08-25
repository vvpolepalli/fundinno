<div  style="margin-bottom:0;">
    
    <input type="hidden" name="hid_user_startp" id="hid_user_startp" value="{$startp}" />
    <input type="hidden" name="hid_referral_users_cnt" id="hid_referral_users_cnt" value="{$referral_users_cnt}" />
    <table class="tabStylee" style="border-collapse: inherit;border-spacing: 0;" cellspacing="0" width="100%" align="center" >
 <tr> <th align="left">User</th><th align="left">Pre-ordered Amount</th><th align="left">Referral Amount</th></tr>
       {foreach from=$referral_users item=usr}
      <tr>
      <td  align="left" valign="top">
      <a href="{$baseurl}profile/index/{$usr.user_id}" style="float:left;">
      {if $usr.profile_image neq ''}<img src="{$usr.profile_image}" height="50" width="50"/>{else}
      
      <img src="{$baseurl}images/prof_no_img.png" height="50" width="50"/>
      {/if}</a>
      <!--<a href="{$baseurl}archive_projects/project_details/{$usr.id}" style="color:hsl(210, 46%, 46%)">-->
      <span style="padding-left:10px">{$usr.profile_name}</span>
      <!-- </a> --></td>
      <td align="left" valign="top"> {$usr.back_amnt}</td>
      <td align="left" valign="top"> {$usr.ref_amnt}</td>
      </tr>
      {/foreach}
      </table>
</div>