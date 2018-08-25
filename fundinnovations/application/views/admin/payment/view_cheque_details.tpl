

                <table width="100%" cellspacing="0" cellpadding="0" border="0">
               
                    <tbody>
                    <tr>
                    
                    <th colspan="2" align="left"><h2 style="margin-left:5px;">View Cheque Details</h2></th>
                    </tr>
                    
                    <tr class="shade01">
                    <td width="29%" align="left" valign="top">Depositor Name  </td>
                    <td width="71%" align="left" valign="top">: {$depositor_name} </td>
                    </tr>
                    <tr class="">
                    <td width="29%" align="left" valign="top">Cheque Number  </td>
                    <td width="71%" align="left" valign="top">: {$chequeno} </td>
                    </tr>
                    <tr class="shade01">
                    <td width="29%" align="left" valign="top">Issuing Bank</td>
                    <td width="71%" align="left" valign="top">: {$issue_bank}</td>
                    </tr>
                    
                    <tr class="">
                    <td width="29%" align="left" valign="top">Branch Name  </td>
                    <td width="71%" align="left" valign="top">: {$issue_branch} </td>
                    </tr>
                    <tr class="shade01">
                    <td width="29%" align="left" valign="top">Cheque Amount</td>
                    <td width="71%" align="left" valign="top">:(Rs){$cheque_amt|string_format:"%.2f"}</td>
                    </tr>
                    
                    <tr class="">
                    <td width="29%" align="left" valign="top">Issue Date  </td>
                    <td width="71%" align="left" valign="top">: {$issue_date|date_format} </td>
                    </tr>
                  
                    
                  
                    <tr class="shade01">
                    <td colspan="2" align="left" valign="top">
                      <span class="btnlayout">
                      {if $traceback neq ''}
                     <input type="button" class="cancel" value="Back" name="text3"onclick="return view_to_all_payments('{$baseurl}','{$fromPage}','{$currP}','{$order_by}')"/>
                      
                      {/if}
                      </span> 
                      
                      </span>                    </td>
                    </tr>
                    
                    </tbody>
                </table>
      
      