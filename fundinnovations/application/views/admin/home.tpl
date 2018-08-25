 <ul  id="column1" class="column ui-sortable">
      <li class="widget color-light">
         
        <div class="shadow_outer">
          <div class="shadow_inner  ">
         <div class="heading_style widget-head">
              <h3 class="fixing_left">Dashboard</h3>
              <div class="clear"></div>
            </div>
           
           <table cellpadding="0" cellspacing="5" border="0" width="100%" >
           <tr valign="top">
           <td>
            <div class="sorting_table_dashboad_styles font_segoe widget-content">
             <h3 >Users</h3>
              <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="borderfi">
                <tr>
                <!--<th width="75%" align="left" valign="top" >Total registered users </th>-->
                  <td width="75%" align="left" valign="top" >Total registered users </td>
                  <td width="25%" align="left" valign="top">{$tot_siteusers}</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Active users </td>
                  <td align="left" valign="top">{$active_siteusers}</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Active users not logged more than 30 days.</td>
                  <td align="left" valign="top">{$users_not_logged_last_30}</td>
                </tr>
                 <tr>
                  <td align="left" valign="top">Not verified users</td>
                  <td align="left" valign="top">{$not_verified_users}</td>
                </tr>
                 <tr>
                  <td align="left" valign="top">Inactive users</td>
                  <td align="left" valign="top">{$inactive_users}</td>
                </tr>
              </table>
               <div class="clear"></div>
            </div>
            </td>
            <td>
             <div class="sorting_table_dashboad_styles font_segoe widget-content">
            <h3>Projects</h3>
              <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="borderfi">
                <tr>
               
                  <td width="75%" align="left" valign="top" >Total number of projects </td>
                  <td width="25%" align="left" valign="top">{$projects_cnts.tot_projs}</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Approved projects</td>
                  <td align="left" valign="top">{$projects_cnts.approved_projs}</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Pending for projects</td>
                  <td align="left" valign="top">{$projects_cnts.pending_projs}</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Rejected projects</td>
                  <td align="left" valign="top">{$projects_cnts.rejected_projs}</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Incomplete projects</td>
                  <td align="left" valign="top">{$projects_cnts.incomplete_projs}</td>
                </tr>
              </table>
              <div class="clear"></div>
               </div>
  			</td>
           </tr> 
           <tr valign="top">
           <td> 
            <div class="sorting_table_dashboad_styles font_segoe widget-content">
            <h3>Status of projects</h3>
              <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="borderfi">
                <tr>
               
                  <td width="75%" align="left" valign="top" >Successfull projects </td>
                  <td width="25%" align="left" valign="top">{$projects_cnts.success_projs}</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Unsuccessfull projects</td>
                  <td align="left" valign="top">{$projects_cnts.failed_projs}</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Ongoing projects</td>
                  <td align="left" valign="top">{$projects_cnts.ongoing_projs}</td>
                </tr>
               
              </table>
              <div class="clear"></div>
               </div>
			</td>
           <td>            
            <div class="sorting_table_dashboad_styles font_segoe widget-content">
            <h3>Funds</h3>
              <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="borderfi">
                <tr>
               
                  <td width="75%" align="left" valign="top" >Total funds collected </td>
                  <td width="25%" align="left" valign="top"><span class="WebRupee">Rs</span><span>{if $projects_funds.total_cash gt 0}{$projects_funds.total_cash}{else}0{/if}</span></td>
                </tr>
                <tr>
                  <td align="left" valign="top">Funds from successfull projects</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span>{$projects_funds.succes_cash}</span></td>
                </tr>
               
                <tr>
                  <td align="left" valign="top">Funds from unsuccessfull projects</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span>{$projects_funds.failed_cash}</span></td>
                </tr>
                  <tr>
                  <td align="left" valign="top">Funds from ongoing projects</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span>{if $projects_funds.ongoing_cash eq ''}0{else}{$projects_funds.ongoing_cash}{/if}</span></td>
                </tr>
                 <tr>
                  <td align="left" valign="top">Refunded</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span>{$projects_funds.refunded_cash}</span></td>
                </tr>
               <tr>
                  <td align="left" valign="top">Funds reordered</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span>{if $projects_funds.reinvested_cash gt 0}{$projects_funds.reinvested_cash}{else}0{/if}</span></td>
                </tr>
                 <tr>
                  <td align="left" valign="top">Funds withdrawn</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span>{-1*$projects_funds.withdrawn_cash}</span></td>
                </tr>
              </table>
              <div class="clear"></div>
               </div>
           </td>
          </tr>     
		</table>	
          </div>
          <!--  End:Border3  using for shadow effect-->
        </div>
        <!--End:Border_2  using for shadow effect-->
 
     
      <!--End:Right Block-->
      <div class="clear"></div>
      
      <!--End:Left Block-->
      <div class="rightblock01">
        
      <!--End:Border_2  using for shadow effect--> 
      </div>
      <!--End:Right Block-->
      <div class="clear"></div>
