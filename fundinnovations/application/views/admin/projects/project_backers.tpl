<input type="hidden" id="hid_proj_id" name="hid_proj_id" value="{$proj_id}"/>
<div class="shadow_outer">
  <div class="shadow_inner" > {if $project_backers|@count gt 0}
    <ul>
      {foreach from=$project_backers item=backers}
      <li class="userComent" id="prof_{$backers.user_id}"> {if $backers.backers_details.profile_image neq ''}
      <div class="userImgBlk"> <img title="{$backers.profile_name}" src="{$backers.backers_details.profile_imgurl}" class="previewimg">
      </div>{else} <div class="userImgBlk"><img title="{$backers.profile_name}" src="{$baseurl}images/no_image.png" class="previewimg"> </div>{/if}
  <div class="commentBlk"> {$backers.backers_details.profile_name}<br />
         <!-- <div class="postedDate">{$backers.date|date_format}</div>-->
          Pre- ordered amount :{$backers.amount}<br />
           </div>
       <div class="clear"></div>
       </li>
      {/foreach}
    </ul>
    {else}No Supportes.
    {/if}
    <div class="clear"></div>
    </div>
</div>
