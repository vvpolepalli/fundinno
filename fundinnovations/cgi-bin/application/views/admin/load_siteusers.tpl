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
				
				var email_id	= $("#hid_email").val();
				var first_name	= $("#hid_name").val();
				var user_type	= $("#hid_user").val();
				var urlType 	= $('#hid_usrType').val();
				var orderBy 	= $('#hid_orderBy').val();
				
				$.ajax({
							type: "POST",
							url: baseurl+"admin/users/del_select_siteusers/",  
							data: "uid="+clists+"&startp="+startp+"&limitp="+limitp+"&email_id="+email_id+"&first_name="+first_name+"&user_type="+user_type+"&url_type="+urlType+"&order_by="+orderBy,  
							success: function(msg){
								if(msg)
								{  
										$('#load_siteusers').html(msg);
										var cnt=$.ajax({
										type:"POST",
										url:baseurl+"admin/users/searchCount",
										data:"email_id="+email_id+"&first_name="+first_name+"&user_type="+user_type+"&url_type="+urlType,
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
											
											var useremail	= $("#hid_email").val();
											var first_name	= $("#hid_name").val();
											var user_type	= $("#hid_user").val();
											var urlType 	= $('#hid_usrType').val();
											var orderBy 	= $('#hid_orderBy').val();
											
											$.ajax({			
											type: "POST",
											url: baseurl + "admin/users/siteusers_list/",
											data: "email_id="+useremail+"&first_name="+first_name+"&user_type="+user_type+"&url_type="+urlType+"&startp="+page_ind+"&limitp="+limitp+"&order_by="+orderBy,
											success: function(msg){	
											//alert(msg)
											$('#load_siteusers').html('');				 
											$('#load_siteusers').html(msg);			 				
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
                 {if $userscount < 1}
             <tr >
                    <td colspan="7" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
                  {else}
                     <thead>
                    <tr>
                    <th width="10" style="padding-right:7px" align="left" valign="middle" class="checkbox_column"><input type="checkbox" name="checkall" id="checkall" /></th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_siteusers('{$baseurl}', '{if $orderBy == DESC_NAME}{'ASC_NAME'}{else $orderBy == ASC_NAME}{'DESC_NAME'}{/if}');" >Name {if $orderBy eq 'DESC_NAME'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" />{/if}</a>
                    </th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_siteusers('{$baseurl}', '{if $orderBy == DESC_EMAIL}{'ASC_EMAIL'}{else}{'DESC_EMAIL'}{/if}');" >Email ID {if $orderBy eq 'DESC_EMAIL'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Email" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Email" />{/if}</a>
                    </th>
                     <th width="" align="left" valign="middle">City</th>
                    <th width="110" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_siteusers('{$baseurl}', '{if $orderBy == DESC_DATE}{'ASC_DATE'}{else}{'DESC_DATE'}{/if}');" >Date of Join {if $orderBy eq 'DESC_DATE'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Date" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Date" />{/if}</a>
                    </th>
                     <th width="100"  align="left" valign="middle">Contact No</th>
                    <th width="" align="center" valign="middle">Created/Supported projects</th>
                    <th width="75" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_siteusers('{$baseurl}', '{if $orderBy == DESC_STATUS}{'ASC_STATUS'}{else}{'DESC_STATUS'}{/if}');" >Status {if $orderBy eq 'DESC_STATUS'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Status" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Status" />{/if}</a>
                    </th>
                    <th width="90" align="right" valign="middle">Options</th>
                     
                    </tr>
                    </thead>
                    <tbody> 
                    {assign var="i" value="1"} 
                    {foreach from=$users key=kk item=user}
                    {if $user->status eq 1}
                    {assign var="userStatus" value="Active"}
                    {elseif $user->status eq 2}
                    {assign var="userStatus" value="Inactive"}
                    {elseif $user->status eq 0}
                    {assign var="userStatus" value="Not Verified"}
                    {/if}
                    
                    
                    
                    <tr {if $i%2 eq 0}class="shade01"{/if}>
                    <td align="left"  style="padding-right:7px"  valign="middle" class="checkbox_column">
                    <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="{$user->id}" class="check" /></td>
                    <td align="left" valign="top">{$user->profile_name|ucwords}</td>
                    <td align="left" valign="top">{$user->email_id}</td>
                    <td align="left" valign="top">{$user->city_name}</td>
                    <td align="left" valign="top">{$user->joined_date|date_format}</td>
                    <td align="left" valign="top">{$user->contact_no}</td>
                   <!-- <td width="15%" align="left" valign="top">{$user->contact_no}</td>-->
                    <td align="center" valign="top">{$user->created_projs}/{$user->backed_projs}</td>
                    <td align="left" valign="top">{$userStatus} {if $user->status eq 1 && $user->inactive_30days eq 1}<img src="{$baseurl}images/admin/tablelisting/reject.png"/>{/if}</td>
                    <td align="right" valign="middle"><!--<a href="{$baseurl}admin/users/viewuser/{$user->user_id}/{$from_page}"> </a>-->
                    <a href="javascript:view_siteuser('{$baseurl}','admin/users/viewuser/{$user->id}/{$from_page}')"><img src="{$baseurl}images/admin/tablelisting/view.png" height="18" width="18" alt="View" title="View" /></a>
                    
                     <a href='{$baseurl}admin/users/edituser/{$user->id}'><img src="{$baseurl}images/admin/tablelisting/edit_icon.gif" height="18" width="18" alt="Edit" title="Edit" /></a>
                     
                    <span ><a onclick="return confirm('Are You Sure You Want to Delete?')" href="javascript:delete_siteuser('{$baseurl}','admin/users/delete_siteuser/{$user->id}')"><img src="{$baseurl}images/admin/tablelisting/close.png" alt="Delete" title="Delete" height="16" width="16" /></a></span>
                    </td>
                    </tr>
                    {assign var="i" value=$i+1}
                    {/foreach}
                    </tbody>
                    <tfoot>
                    <tr>
                    <td colspan="9" valign="middle" class="borderButtonTop">
                    <span class="btnlayout ">
                 <input type="button" value="Delete" class="button" name="btn_delete" id="btn_delete" />
                 <input type="hidden" name="userscount" id="userscount"  value="{$userscount}" />
                  </span>
                  <span class="select" style="padding-left:20px; ">
                     <select name="action" id="action" style="width:190px; margin-top:6px;" >
                     <option value="1">Active</option>
                     <option value="2">Inactive</option>
                     <!--<option value="2">Block</option>-->
                     </select>                                       
                  </span>   
                  <span class="btnlayout" style="float:right; margin-right:560px;">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="change_action('{$baseurl}');" />
                     </span>
                    </td></tr>
                     </tfoot>
                    {/if}
                   
                </table>
