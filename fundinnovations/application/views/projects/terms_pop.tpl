<section class="cmsSection">
{$re.page_content} 
<div class="submitPane">
 <ul>
  {if $proj_id eq ''}
 
  <li style="clear:none"> <input type="button" class="blueBtn" id="popContinue" name="popContinue"  onclick = "save_projects('{$baseurl}','send') " value="Continue">
      </li>
   {else}
    <li style="clear:none"> <input type="button" class="blueBtn" id="popContinue" name="popContinue"  onclick = "update_projects('{$baseurl}',{$proj_id},'send');close_pop('terms_popup');" value="Continue">
      </li>
   {/if}
      <li style="clear:none">
      <input type="button" class="grayBtn"  id="popCancel" name="popCancel" onclick ="close_pop('terms_popup')" value="Cancel">
      </li>
      </ul><div class="clear"></div>
      </div>
      <div class="clear"></div>
</section>
<div class="clear"></div>