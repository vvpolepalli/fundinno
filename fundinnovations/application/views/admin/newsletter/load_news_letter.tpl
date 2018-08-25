<table width="100%" cellspacing="0" cellpadding="0" border="0">
         {if $newsletter_count < 1}
        <tr >
          <td colspan="4" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Records Found..</td>
        </tr>
        {else}                       
            <thead>
            
              <tr>               
                <th width="51" align="left" valign="middle">No</th>
                <th width="588" align="left" valign="middle"><a href="javascript:void(0)" onclick="sort_newsletter('{$baseurl}', '{if $orderBy == DESC_TITLE}{'ASC_TITLE'}{else}{'DESC_TITLE'}{/if}');" >News Letter Title {if $orderBy eq 'DESC_TITLE'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Title" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Title" />{/if}</a> </th>
                <th width="101" align="center" valign="middle">Send History</th>       
                <th width="102" align="center" valign="middle">Date</th>                
                <th align="right" width="80" valign="middle">Option</th>
			  </tr>
              </thead>
              <tbody>
              
                {assign var="i" value="1"}
                {foreach from=$newsletter key=k item=newsLetter}
                <tr {if $i%2 eq 0}class="shade01"{/if}>                     
                        <td width="4%">{$pstart+$i}</td>
                        <td width="44%">{$newsLetter->news_title}</td>
                        <td width="12%" align="center"><a href="javascript:view_sent_history('{$baseurl}','admin/Cms/sent_newsletter_history/{$newsLetter->news_id}')"><img src="{$baseurl}/images/admin/tablelisting/sent_history.gif" width='23' height='27' alt='View Hystory' title="View Hystory" /></a></td>                        
                        <td width="25%" align="center">{$newsLetter->news_added|date_format}</td>
                        <td width="15%" align="right">
                        <a href="javascript:view_newsletter('{$baseurl}','admin/Cms/view_newsletter/{$newsLetter->news_id}')"><img src="{$baseurl}/images/admin/tablelisting/view.png" width='15' height='16' alt='View' title="View" /></a>                       
                        <a href="javascript:update_newsletter('{$baseurl}','admin/Cms/update_newsletter/{$newsLetter->news_id}')"><img src="{$baseurl}/images/admin/tablelisting/edit_icon.gif" width='15' height='16' alt='Edit' title="Edit" /></a>
                        <a href="javascript:delete_newsletter('{$baseurl}','admin/Cms/delete_newsletter/{$newsLetter->news_id}')" onclick="return confirm('Are You Sure You Want to Delete?')"><img src="{$baseurl}images/admin/tablelisting/remove-icon.gif" alt="Delete" title="Delete" height="20" width="20" /></a>
                        </td>
                      </tr>
                 {assign var="i" value=$i+1}
        		{/foreach}    
              </tbody>
              {/if}
             </table>