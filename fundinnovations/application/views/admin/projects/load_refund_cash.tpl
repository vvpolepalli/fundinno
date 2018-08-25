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
	 $('#btn_delete').click( function() {
		 
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
		  alert("Please select at least one check box");
		  return false;
		}
		else
		{ 
			var conf=confirm('Are You Sure You Want to Delete?');
			if(conf)
			{
		
				var baseurl = '{/literal}{$baseurl}{literal}';
				
				
				var proj_title	= $("#hid_proj_title").val();
				var category	= $("#hid_category").val();
				var project_status	= $("#hid_project_status").val();
				var location 	= $('#hid_location').val();
				var fund_goal 	= $('#hid_fund_goal').val();
				var status 	    = $('#hid_status').val();
				var orderBy 	= $('#hid_orderBy').val();
				
				$.ajax({
							type: "POST",
							url: baseurl+"admin/project/del_select_projects/",  
							data: "pid="+clists+"&startp="+startp+"&limitp="+limitp+"&proj_title="+proj_title+"&project_status="+project_status+"&status="+status+"&location="+location+"&order_by="+orderBy,  
							success: function(msg){
								if(msg)
								{  
										$('#load_projects').html(msg);
										var cnt=$.ajax({
										type:"POST",
										url:baseurl+"admin/project/searchCount",
										data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status,
										success:function(msg)
										{
											if(msg !=0) { 
												// Create pagination element
												$("#Pagination").pagination(msg, {
												num_edge_entries: 2,
												num_display_entries: 3,
												callback: pageselectCallbackSearch,
												items_per_page:10,
												current_page:current_page-1
												});
												if((!$('.pagination').find('a').hasClass('current')) && (!$('.pagination').find('span').hasClass('current'))) {
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
											
											var proj_title	= $("#hid_proj_title").val();
											var category	= $("#hid_category").val();
											var project_status	= $("#hid_project_status").val();
											var location 	= $('#hid_location').val();
											var fund_goal 	= $('#hid_fund_goal').val();
											var status 	    = $('#hid_status').val();
											var orderBy 	= $('#hid_orderBy').val();
											
											$.ajax({			
											type: "POST",
											url: baseurl+"admin/project/project_list/",
											data: "proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status+"&startp="+page_ind+"&limitp="+limitp+"&order_by="+orderBy,
											success: function(msg){	
											//alert(msg)
											$('#load_projects').empty();				 
											$('#load_projects').html(msg);			 				
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

</script>
{/literal}
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                 {if $refund_cashcount < 1}
             <tr >
                    <td colspan="7" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
                  {else}
                     <thead>
                    <tr>
                    <th width="3%" align="left" valign="middle" class="checkbox_column"><input type="checkbox" name="checkall" id="checkall" /></th>
                    <th width="17%" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_NAME}{'ASC_NAME'}{else $orderBy == ASC_NAME}{'DESC_NAME'}{/if}');" >Profile Name {if $orderBy eq 'DESC_NAME'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By title" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By title" />{/if}</a>
                    </th>
                    <th width="15%" align="center" valign="middle">
                   <span class="WebRupee">Rs. </span> <a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_RFND_CASH}{'ASC_RFND_CASH'}{else}{'DESC_RFND_CASH'}{/if}');" >Refund Cash {if $orderBy eq 'DESC_RFND_CASH'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By creater name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By creater name" />{/if}</a>
                    </th>
                     <th width="15%" align="center" valign="middle"> <span class="WebRupee">Rs. </span><a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_REF}{'ASC_REF'}{else}{'DESC_REF'}{/if}');" >Referral Cash{if $orderBy eq 'DESC_REF'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By fund" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By fund" />{/if}</a></th>
                      <th width="15%" align="center" valign="middle"><span class="WebRupee">Rs. </span>
                    <a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_REIN}{'ASC_REIN'}{else}{'DESC_REIN'}{/if}');" >Reordered Amount {if $orderBy eq 'DESC_REIN'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Date" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Date" />{/if}</a>
                    </th>
                     <th width="15%" align="center" valign="middle"><span class="WebRupee">Rs. </span>Withdraw
                     </th>
                    <th width="15%" align="center" valign="middle"><span class="WebRupee">Rs. </span>
                   <!-- <a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_FUND}{'ASC_FUND'}{else}{'DESC_FUND'}{/if}');" >-->Fundinnovation Cash<!-- {if $orderBy eq 'DESC_FUND'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Date" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Date" />{/if}</a>-->
                    </th>
                     
                    </tr>
                    </thead>
                    {assign var="i" value="1"} 
                    {foreach from=$refund_cash key=kk item=cash}
                                        
                    <tbody> 
                    <tr {if $i%2 eq 0}class="shade01"{/if}>
                    <td align="left" valign="middle" class="checkbox_column">
                    <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="{$cash.user_id}" class="check" /></td>
                    <td align="left" valign="top">{$cash.profile_name}</td>
                    <td  align="center" valign="top">{$cash.refunded_cash}</td>
                    <td   align="center" valign="top">{$cash.referral_cash}</td>
                    <td align="center" valign="top">{$cash.reinvested_cash}</td>
                    <td  align="center" valign="top"> {-1*$cash.withdrawn_cash}</td>
                	 <td  align="center" valign="top">{$cash.fund_cash}</td>
                    </tr>
                    {assign var="i" value=$i+1}
                    {/foreach}
                    <tr>
                    <td colspan="7" valign="middle" class="borderButtonTop">
                    <span class="btnlayout ">
                 <input type="hidden" name="projectscount" id="projectscount"  value="{$refund_cashcount}" />
                  </span>
                  <span class="select" style="padding-left:20px; ">
                     <select name="action" id="action" style="width:190px; margin-top:6px;" >
                     <option value="refund_delete">Refund fundinnovation cash</option>
                     <!--<option value="2">Block</option>-->
                     </select>                                       
                  </span>   
                  <span class="btnlayout" style="float:right; margin-right:560px;">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="change_action('{$baseurl}');" />
                     </span>
                    </td></tr>
                    </tbody>
                    {/if}
                </table>

