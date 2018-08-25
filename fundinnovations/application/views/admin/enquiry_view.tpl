
  <div class="shadow_outer">
        <div class="shadow_inner" >
        <div class="table_listing font_segoe ">
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
               
                    <tbody>
                    <tr>
                    
                    <th colspan="3" align="left"><h2 style="margin-left:5px;">View Enquiry</h2></th>
                    </tr>
                    {foreach from=$enquiryList key=kk item=data}
                    
                    <tr class="">
                    <td width="18%" align="left" valign="top">First Name  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->first_name} </td>
                     
                    </tr>
                                       
                   <tr class="shade01">
                    <td width="18%" align="left" valign="top">E-mail Id </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->email} </td>
                    </tr>
                    
                    
                    
                     <tr class="">
                    <td width="18%" align="left" valign="top">Contact number  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->contact_no}</td>
                    </tr>
                    
                    
                    <tr class="shade01">
                    <td width="18%" align="left" valign="top">Enquiry Type  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->enquiry_type}</td>
                    </tr>
                    <tr class="">
                    <td width="18%" align="left" valign="top">Subject  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->subject}</td>
                    </tr>
                    
                     <tr class="shade01">
                    <td width="18%" align="left" valign="top">Enquiry Content  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top" > {$data->enquiry_content}</td>
                    </tr>
                    
                     <tr class="">
                    <td width="18%" align="left" valign="top">Posted date  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->datetime|date_format}</td>
                    </tr>
                    
                     <tr class="shade01">
                    <td width="18%" align="left" valign="top">Reply Status  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {if $data->reply_status ==0}<span style="color:#C00">Not yet Replied</span>{else}<span style="color:#007100">Replied</span>{/if}</td>
                    </tr>
                    
                    <tr class="" >
                    <td colspan="3" align="center" valign="top" >
                      <span class="btnlayout">                   
                      <input type="button" onclick="window.location.href='{$baseurl}admin/Enquiry/sendreply/{$data->enquiry_id}'" name="sendBtn" class="button" id="sendBtn" value="Reply">
                    <!-- <input type="button" onclick="view_siteproperty_type('{$baseurl}','admin/Enquiry/viewproperty_type_for_reply/{$data->enquiry_id}/{$from_page}')" name="sendBtn" class="button" id="sendBtn" value="Reply">-->
                     
                     
                      </span>
                      <span class="btnlayout">
                      <!--<input type="button" class="cancel" value="Back" name="text3" onclick="window.location.href='{$baseurl}admin/Enquiry/'"/>-->
                      <input type="button" class="cancel" value="Back" name="text3"onclick="return view_to_manageproperty_types('{$baseurl}','{$fromPage}','{$currP}','{$order_by}')"/>
                      </span> 
                      
                      </td>
                    </tr>
                    {/foreach}
                    <tr>
                    <td colspan="3"></tbody>
                </table>
            
</div>

                </div>
        <!--End:Border 3--> 
      </div>
      <!--End:Border 2--> 
      