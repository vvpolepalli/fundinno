
  <div class="shadow_outer">
        <div class="shadow_inner" >
        <div class="table_listing font_segoe ">
        
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
               
                    <tbody>
                    <tr>
                    
                    <th colspan="3" align="left"><h2 style="margin-left:5px;">View Payment Detail&nbsp;(order#{$paymentList[0]->order_id})</h2></th>
                    </tr>
                    {foreach from=$paymentList key=kk item=data}
                    
                    
                    <tr class="shade01">
                    <td width="18%" align="left" valign="top">Order Id </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top" > {$data->order_id}</td>
                    </tr>
                    
                    <tr class="">
                    <td width="18%" align="left" valign="top">Transaction No </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top" > {$data->transaction_id}</td>
                    </tr>
                    
                    <tr class="shade01">
                     <td width="18%" align="left" valign="top">Property Name  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->property_name}</td>
                     
                    </tr>
                    
                     <tr class="">
                     <td width="18%" align="left" valign="top">Property Id  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">{$data->property_id}</td>
                     
                    </tr>
                    
                    <tr class="shade01">
                     <td width="18%" align="left" valign="top">Plan Name  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->list_name}</td>
                     
                    </tr>
                    
                    <tr class="">
                    <td width="18%" align="left" valign="top">Name  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->name} </td>
                    </tr>  
                        
                    <tr class="">
                    <td width="18%" align="left" valign="top">Contact number  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->contact_no_mob}</td>
                    </tr>
                    
                    
                    <tr class="shade01">
                    <td width="18%" align="left" valign="top">User Type  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->user_type}</td>
                    </tr>
                    
                    
                    <tr class="">
                    <td width="18%" align="left" valign="top">E-mail Id </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->email} </td>
                    </tr>
                    
                     <tr class="shade01">
                    <td width="18%" align="left" valign="top">Order placed on  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top"> {$data->payment_date|date_format}</td>
                    </tr>
                    
                     <tr class="">
                    <td width="18%" align="left" valign="top">Payment mode</td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">Credit/Debit</td>
                    </tr>
                    <tr class="">
                    <td width="18%" align="left" valign="top">Amount </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">Rs. {$data->amount}</td>
                    </tr>
                    
                     <tr class="shade01">
                    <td width="18%" align="left" valign="top">Payment Status  </td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">{$data->paymentstatus}</td>
                    </tr>
                    
                    
                    </tbody>
                    </table>
                   
                    
                    <table width="100%" cellspacing="0" cellpadding="5" border="0">
                    <tbody><tr>
                    <th colspan="3" align="left" style="margin-left:5px;padding-bottom:5px;font-weight:bold;font-size:15px;">
                    BILLING ADDRESS</th>
                    </tr>
                    
                    <tr class="shade01">
                    <td width="18%" align="left" valign="top">Name</td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">{$data->billing_name}</td>
                    </tr>
                    
                     <tr class="">
                    <td width="18%" align="left" valign="top">Address</td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">{$data->billing_address}</td>
                    </tr>
                    
                    <tr class="shade01">
                    <td width="18%" align="left" valign="top">City</td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">{$data->billing_city}</td>
                    </tr>
                    
                     <tr class="">
                    <td width="18%" align="left" valign="top">State</td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">{$data->billing_state}</td>
                    </tr>
                    
                    
                    
                   
                     
                    <tr class="shade01">
                    <td width="18%" align="left" valign="top">Postal code</td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">{$data->billing_postal_code}</td>
                    </tr>
                    
                     <tr class="">
                    <td width="18%" align="left" valign="top">Country</td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">{$data->billing_country}</td>
                    </tr>
                   
                    <tr class="shade01">
                    <td width="18%" align="left" valign="top">Phone</td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">{$data->billing_phone}</td>
                    </tr>
                     <tr class="">
                    <td width="18%" align="left" valign="top">Email</td>
                    <td width="1%" align="left" valign="top">:</td>
                    <td width="81%" align="left" valign="top">{$data->billing_email}</td>
                    </tr>
                   
                      <tr class="" >
                    <td colspan="3" align="center" valign="top" >
                      
                      <span class="btnlayout">
                      <!--<input type="button" class="cancel" value="Back" name="text3" onclick="window.location.href='{$baseurl}admin/Enquiry/'"/>-->
                      <input type="button" class="cancel" value="Back" name="text3"onclick="return view_to_all_payments('{$baseurl}','{$fromPage}','{$currP}','{$order_by}')"/>
                      </span> 
                      
                      </td>
                    </tr>
                    </tbody>
                    </table>
                    
                    
                    </td>
                    </tr>
                    
                    
                   
                    {/foreach}
                    
            
</div>

                </div>
        <!--End:Border 3--> 
      </div>
      <!--End:Border 2--> 
      