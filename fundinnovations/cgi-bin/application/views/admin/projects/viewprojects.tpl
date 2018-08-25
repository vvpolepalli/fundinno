<!--script for showing image on mouse over-->
<!--<script type="text/javascript" src="{$baseurl}js/preview.js"></script>
<script type="text/javascript" src="{$baseurl}js/admin/main_large.js"></script>-->

<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody>
    <tr>
      <th colspan="3" align="left"><h2 style="margin-left:5px;">View project details</h2></th>
    </tr>
    
    <!-- <pre> {$proj_details|print_r}   </pre>-->
    <tr class="shade01">
      <td align="left" width="16%" valign="top">Project image </td>
      <td align="left" width="1%" valign="top">:</td>
      <td align="left" width="83%" valign="top"><div class="thumbnails_property"><img src="{$proj_details.proj_image}" alt='Preview' title="Preview"  /></div></td>
    </tr>
    <tr >
      <td width="16%" align="left" valign="top">Project title</td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> {$proj_details.project_title|stripslashes}</td>
    </tr>
    <tr class="shade01">
      <td width="16%" align="left" valign="top">Short description </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> {$proj_details.short_description|stripslashes}</td>
    </tr>
    <tr >
      <td width="16%" align="left" valign="top">Category </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> {$proj_details.category} </td>
    </tr>
    <tr class="shade01">
      <td width="16%" align="left" valign="top">Fund duration </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> {$proj_details.fund_duration} days</td>
    </tr>
    <tr >
      <td width="16%" align="left" valign="top">City </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top">{$proj_details.city_name} </td>
    </tr>
   <!-- <tr class="shade01">
      <td width="16%" align="left" valign="top">Max sponsor </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> {$proj_details.max_sponsors}</td>
    </tr>-->
    <tr class="shade01" >
      <td width="16%" align="left" valign="top">Funding goal </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> {$proj_details.funding_goal} </td>
    </tr>
    <tr >
      <td width="16%" align="left" valign="top">Access only for logged in users </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> {if $proj_details.access_status eq '1'} Yes{else} No {/if}</td>
    </tr>
    <!--<tr >
      <td width="16%" align="left" valign="top">Min pledge amount </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top">{$proj_details.min_pledge_amount} </td>
    </tr>-->
    <tr class="shade01">
      <td width="16%" align="left" valign="top">Created by </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> {$proj_details.profile_name}</td>
    </tr>
    <tr >
      <td width="16%" align="left" valign="top">Introduction video </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> {if $proj_details.intro_video neq ''} <span rel="{$proj_details.intro_video}"  class="preview" style="display: block;"> <img src="{$baseurl}images/videoBtn.png"> </span> <img  style="width:100px;height:80px;" src="{$proj_details.video_image}" class="previewimg"> {/if} </td>
    </tr>
    
    <!-- <tr class="shade01">
                    <td colspan="3" valign="top" height="10" align="center">&nbsp;</td>
                    </tr>-->
					<tr  class="shade01"><td colspan="3"></td></tr>
    <tr><!-- class="shade01"-->
      <td valign="top" height="10" align="left">Project description </td><td width="1%" align="left" valign="top">:</td>
      <td align="left" valign="top" style="background:#fff; padding:10px"> <iframe id="proj_cntnt" frameborder="0" width="100%" src="{$baseurl}admin/project/project_description/{$proj_details.id}"></iframe> </td>
    </tr>
	<tr  class="shade01"><td colspan="3"></td></tr>
  {if $proj_details.rewards neq 0 && $proj_details.rewards|@count neq 0}
  {foreach from=$proj_details.rewards key=k item=rew}
  <tr >
    <td colspan="2" valign="middle" height="10" align="left">Product {$k+1}</td>
    <td align="left" valign="top"><div id="reward_div" >
        <input type="hidden" id="reward{$k+1}" name="reward{$k+1}" value="{$rew.id}" />
        <ul id="reward_ul_{$k+1}">
          <li>Product Selling Price : {$rew.pledge_amount}
          </li>
          <li>Description : {$rew.description}
          </li>
          <li>Est. delivery date : {$rew.delivery_date|date_format:'%G-%m-%e'}
          </li>
          <li>Limiting users for product : {$rew.users_limit}
          </li>
        </ul>
      </div></td>
  </tr>
  {/foreach}
  {/if} 
  

  
  <tr class="shade01">
    <td align="left" valign="top" colspan="3"><span class="btnlayout">
      <input type="button" class="cancel" value="Back" name="text3" onclick="return back_to_projects('{$baseurl}','{$fromPage}','{$currP}','{$order_by}')" />
      </span></td>
  </tr>
    
  
</table>
