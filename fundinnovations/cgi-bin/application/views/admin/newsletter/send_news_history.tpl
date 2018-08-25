<div><h2 style="margin-left:5px; width:855px; line-height: 30px;">Sent History of {$history_dtls[0]->news_title}</h2>
                        
<span style="width:37px; padding-bottom:10px; float:right; background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><a href="javascript:void(0);" onClick="back_to_newsletter('{$baseurl}','{$currP}','{$order_by}')">Back</a></span>
<div class="clear"></div></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
             {if $news_sent_count < 1}
        <tr >
          <td colspan="4" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Records Found</td>
        </tr>
        {else}                
            <thead>
            
              <tr>               
                <th width="51" valign="middle" align="left">No</th>
                <th width="663" valign="middle" align="left">Sent To  </th>
                <th width="166" valign="middle" align="center">Send Date</th>               
                <th width="128" align="center" valign="middle">Option</th>
			  </tr>
              </thead>
              <tbody>
              {assign var="i" value="1"}
                {foreach from=$news_sentdt key=k item=newsSent}
                <tr {if $i%2 eq 0}class="shade01"{/if}>         
                        <td>{$i}</td>
                        <td>{$newsSent->sent_to}</td>
                        <td align="center">{$newsSent->send_date|date_format}</td>                        
                        <td align="center"><a onclick="return confirm('Are You Sure You Want to Delete?')" href="javascript:delete_newsletter_history('{$baseurl}','admin/Cms/delete_newsletter_history/{$newsSent->id}')"><img width="20" height="20" title="Delete" alt="Delete" src="{$baseurl}images/admin/tablelisting/remove-icon.gif"></a></td>
                      </tr>
                {assign var="i" value=$i+1}
        		{/foreach}  
              </tbody>
              {/if}
              </table>
               <input type="hidden" name="hid_newsid" id="hid_newsid" value="{$history_dtls[0]->news_id}">
               <input type="hidden" name="hid_page" id="hid_page" value="{$currP}">
               <input type="hidden" name="hid_order" id="hid_order" value="{$order_by}">