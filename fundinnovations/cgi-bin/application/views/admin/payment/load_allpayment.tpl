<style>
.table_listing table td {
    font-size: 13px;
    padding: 8px !important;
}
</style>
<!--<script type="text/javascript" src="{$baseurl}js/admin/member.js"></script> -->

{literal}


<script type="text/javascript">

$(document).ready(function(){
		 $('.check').click(function () {
		
		$('#checkall').removeAttr('checked');
		
		});
		
	 $('#checkall').click(function(){
		if (this.checked == false) {
			
 			$('.check:checked').attr('checked', false);
		}
		else {
			
			$('.check:not(:checked)').attr('checked', true);
 
		}
		
		 
	 });
	 
	 //function called on submit Delete 
	 $('#btn_update1').click( function() {
		 
		var current_page = $("[class='current']").html();
		var startp;
		var limitp=10;
		if(current_page==1)
		{
			startp=0;
		}
		else
		{
			startp = (current_page-1)*limitp;
		}
		
		var clists = $('input[name="ListStatusLinkCheckbox[]"]:checked').map(function(){return this.value;}).get();
		//alert(citylist);
		if($('input[name="ListStatusLinkCheckbox[]"]:checked').length<1)
		{
		  alert(" Please select atleast one checkbox to update");
		  return false;
		}
		else
		{ 
			var conf=confirm('Do you want to update?');
			if(conf)
			{
		
				var baseurl = '{/literal}{$baseurl}{literal}';
				var trans_id = $('#trans_id').val();
				var order_id = $('#order_id').val();
				var datetime = $('#datetime').val();
				var status=		$('#paystatus').val();
				var paymentperiod=$('#paymentperiod').val();
				var orderBy 	= $('#hid_orderBy').val();
				var hidCurrP = $('#hid_currP').val();
				$.ajax({
							type: "POST",
							url: baseurl+"admin/payment/update_bulk_status/",  
							data:"id="+clists+"&trans_id="+trans_id+"&order_id="+order_id+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp+"&status="+status+"&paymentperiod="+paymentperiod,
							success: function(msg){
								if(msg)
								{  
										$('#load_orders').html(msg);
										var cnt=$.ajax({
										type:"POST",
										url:baseurl+"admin/payment/orderCount",
										data:"trans_id="+trans_id+"&order_id="+order_id+"&datetime="+datetime+"&order_by="+orderBy+"&status="+status+'&paymentperiod='+paymentperiod,
										success:function(msg)
										{
											if(msg !=0) { 
												// Create pagination element
												$("#Pagination").pagination(msg, {
												num_edge_entries: 2,
												num_display_entries: 5,
												callback: pageselectCallbackSearch,
												items_per_page:10,
												current_page:current_page-1
												});
														if((!$('.pagination').find('a').hasClass('current')) && (!$('.pagination').find('span').hasClass('current'))){
			 												$('.next').prev('a').addClass('current');
															$('.next').prev('a').removeAttr('href');	
														}
											} else {
												$("#Pagination").css('display','none');
											}
										}
											
									});
																	/*** pageselectCallback ****/				
								function pageselectCallbackSearch(page_index, jq)
								{
										var page_ind = parseInt(page_index)*parseInt(limitp);
										var trans_id = 	$('#hid_trans_id').val();
										var order_id = 	$('#hid_order_id').val();
										var datetime = 	$('#hid_datetime').val();
										var orderBy = 	$('#hid_orderBy').val();
										var status	=	$('#hid_status').val();
										var paymentperiod=$('#hid_paymentperiod').val(paymentperiod);
										$.ajax({
										type: "POST",
										url: baseurl + "admin/payment/load_all_payment/",
										data:"trans_id="+trans_id+"&order_id="+order_id+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp+"&status="+status+"&paymentperiod="+paymentperiod,
										success: function (msg) 
										{
										$('#load_orders').html('');
										$('#load_orders').html(msg);
										}
										});	
								}  
								/*** End pageselectCallback ****/
									
									
								}
							}
							
						});
			}//end of confirm
		}
	});
	 
	 
	 
});
function change_action(baseurl,id) 
{
	var current_page = $("[class='current']").html();
		var startp;
		var limitp=10;
		if(current_page==1)
		{
			startp=0;
		}
		else
		{
			startp = (current_page-1)*limitp;
		}
		
	
	  // var useremail=$('#emailId').val();
		
	
	
	//var action=$('#action').val();
	var action=$('#action_bx :selected').val();
	//alert(action);
	//var clists = $('input[name="ListStatusLinkCheckbox[]"]:checked').map(function(){return this.value;}).get();
	var clists=id;

		//alert(citylist);
		if(action=='')
		  {
			  alert("Please select any option"); 
			  return false;
		  }
			else{
			$.ajax({
							type: "POST",
							url: baseurl+"admin/payment/change_status", 
							data: "startp="+startp+"&limitp="+limitp+"&pid="+clists+"&action="+action,
							success: function(msg){
								if(msg)
								{ 
									//load_siteusers_list(baseurl,startp,limitp);
									action='';
									if(msg =='updated'){
									initial_load_order(baseurl, current_page);
									 $( "#dialog-confirm").dialog( "close" );}	
									else if(msg =='completed'){
										//alert('Th');
										$('#popup_content').html('You can not change the status,this project is completed');
										$( "#alert_box" ).dialog({
										resizable: false,
										//height:140,
										modal: true,
										buttons: {
											OK: function() {
												$( this ).dialog( "close" );
											}
										}
										});
									}
									else if(msg =='deleted'){
										//alert('Th');
										$('#popup_content').html('You can not change the status,this order id deleted.');
										$( "#alert_box" ).dialog({
										resizable: false,
										//height:140,
										modal: true,
										buttons: {
											OK: function() {
												$( this ).dialog( "close" );
											}
										}
										});
									}
								}
							}
						   
						});
			}
}
function open_sts_pop(id,sts){
	var baseurl='{/literal}{$baseurl}{literal}';
	//$('#action').show();
			$.ajax({
					type: "POST",
					url: baseurl+"admin/payment/change_status_cntnt", 
					data: "id="+id,
					success: function(msg){
						$('#popup_sel_cntnt').html(msg);
						//$('#update_btn').
						 $( "#dialog-confirm").dialog({
							resizable: false,
							modal: true,
							/*buttons: {
								"Update": function() {
									change_action(baseurl,id);
									$( this ).dialog( "close" );
									//$('#action').hide();
								},
								Cancel: function() {
									$( this ).dialog( "close" );
									//$('#action').hide();
								}
							}*/
						});
						}
					});
							

}
function close_fn(){
	$('#popup_sel_cntnt').empty();
	 $( "#dialog-confirm").dialog( "close" );
}
</script>
{/literal}
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                {if $paymentCount gt 0}
              <thead>
              <tr>
                <!--<th width="10" valign="middle" align="center" class="checkbox_column" > 
                      <input type="checkbox" name="checkall" id="checkall" />
				</th>-->
              
                <th width="125" align="left" valign="middle"><div >Order Id.</div> </th>
                <th width="125" align="left" valign="middle"><div ><a href="javascript:void(0)" onclick="sort_order('{$baseurl}', '{if $orderBy == DESC_PTIT}{'ASC_PTIT'}{elseif $orderBy == ASC_PTIT}{'DESC_PTIT'}{else}{'DESC_PTIT'}{/if}');" >Project title{if $orderBy eq 'DESC_PTIT'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" />{/if}
                </a></div></th> 
               <!-- <th width="125" align="left" valign="middle"><div style="width:90px;">
                <a href="javascript:void(0)" onclick="sort_order('{$baseurl}', '{if $orderBy == DESC_NAME}{'ASC_NAME'}{elseif $orderBy == ASC_NAME}{'DESC_NAME'}{else}{'DESC_NAME'}{/if}');" >
                Name{if $orderBy eq 'DESC_NAME'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" />{/if}
                </a>
                </div>
                 </th> -->  
                <th width="125" align="left" valign="middle"><div ><a href="javascript:void(0)" onclick="sort_order('{$baseurl}', '{if $orderBy == DESC_AMNT}{'ASC_AMNT'}{elseif $orderBy == ASC_AMNT}{'DESC_AMNT'}{else}{'DESC_AMNT'}{/if}');" >Pre-order amount{if $orderBy eq 'DESC_AMNT'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Amount" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Amount" />{/if}
                </a></div><span class="WebRupee">Rs. </span></th>   
                <th width="125" align="left" valign="middle"><div style="width:106px;">Project status </div></th>   
                <th width="100" align="left" valign="middle"><div ><a href="javascript:void(0)" onclick="sort_order('{$baseurl}', '{if $orderBy == DESC_USR}{'ASC_USR'}{elseif $orderBy == ASC_USR}{'DESC_USR'}{else}{'DESC_USR'}{/if}');" >Supporter {if $orderBy eq 'DESC_USR'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" />{/if}
                </a>
                </div></th>
                
                <th width="100" align="left" valign="middle"><div >
                 <a style="position:relative;" href="javascript:void(0)" onclick="sort_order('{$baseurl}', '{if $orderBy == DESC_STATUS}{'ASC_STATUS'}{elseif $orderBy == ASC_STATUS}{'DESC_STATUS'}{else}{'DESC_STATUS'}{/if}');" >
                Order  Status {if $orderBy eq 'DESC_STATUS'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Payment Status" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Payment Status" />{/if}</a></div></th> 
               <th width="100" align="left" valign="middle"><div >Date
                </div></th>
                <th width="40" align="center" valign="middle"><div >Option</div></th>
			  </tr>
              </thead>
              <tbody>
              {assign var=i value=1} 
                 {foreach from=$orders item=orderList key=k}  
                               
                  <tr {if $i%2 eq 0} class="shade01" {/if} >
                  <!--<td valign="middle" align="center" class="checkbox_column"> 
                  <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="{$orderList->id}" class="check" />
                  </td>-->
                   <td align="left">
                  <!-- <a  href="javascript:view_order_details('{$baseurl}','admin/payment/payment_detail/{$orderList->payment_id}/{$from_page}')" title="View Payment Details">{$orderList->order_id}</a>-->
                    {$orderList->order_id}
                   
                   </td> 
                   <td align="left">{$orderList->project_title}</td>
                  <td align="left">{$orderList->amount}
                  		<!--<a href="javascript:view_siteuser('{$baseurl}','admin/users/viewuser/{$orderList->user_id}/all')" title="View User Details">--><!--</a>-->
                   </td>  
                  <td align="left">{$orderList->project_status|stripslashes}</td>  
                  <td align="left">
                  {$orderList->name|ucwords}
                  
                  </td>  
                  <td align="left">{$orderList->paymentstatus|ucwords}</td>
                  
                  <td align="left" id="paymentstaus{$orderList->payment_id}"> {$orderList->date|date_format}
                   <!--{if $orderList->reward_amnt neq ''}{$orderList->reward_amnt}{else}0{/if}-->
                  </td>
              	 <td align="center"> 
                <a href="javascript:void(0);" onclick="open_sts_pop({$orderList->id},'{$orderList->paymentstatus}')">Change status</a>
                            <!--{if $orderList->paymentstatus eq 'Pending'}
                            <a id="toggleStatus{$orderList->payment_id}"  href="javascript:update_payment_status('{$baseurl}','admin/payment/update_payment_status','{$orderList->payment_id}','1');" >
                            <img src="{$baseurl}/images/admin/tablelisting/reject.png" alt="Approve payment" title="Approve" height="16" width="16"/>
                            </a>
                            
                            {else}
                            <a id="toggleStatus{$orderList->payment_id}"  href="javascript:void(0)" >
                            <img src="{$baseurl}/images/admin/tablelisting/approve_i.png" alt="Payment Approved" title="Payment Approved" height="16" width="16"/>
                            </a>
                            
                            {/if}
                -->
                                                    <!--  <a  href="javascript:view_order_details('{$baseurl}','admin/payment/payment_detail/{$orderList->payment_id}/{$from_page}')">
                                                    <img src="{$baseurl}/images/admin/tablelisting/view.png" width='18' height='18' alt='View' title="View" /
                                                    ></a>-->
                  </td>
                 
                  </tr>
                   {assign var=i value=$i+1} 
                  {/foreach}
                  <!--<tr>
                    <td valign="top" align="left" colspan="9" class="borderButtonTop">
                     <span class="btnlayout">
                     <input type="button" value="Update" class="button" name="btn_update" id="btn_update"  onclick="change_action('{$baseurl}');" />
                     <input type="hidden" name="paymentCount" id="paymentCount"  value="{$paymentCount}" />
                      </span>
                       <span class="select">
                                                         
                  </span>   
               
                      
                    </td>
               	</tr>-->
                
               </tbody>
               {else}
                 <tr>
                 	<td colspan="9" align="center" style="color:red;">No Results Found</td>
                 </tr>
               
            {/if}
             </table>