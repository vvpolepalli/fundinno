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
                 {if $citiescount < 1}
             <tr >
                    <td colspan="4" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
                  {else}
                     <thead>
                    <tr>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_city('{$baseurl}', '{if $orderBy == DESC_NAME}{'ASC_NAME'}{else $orderBy == ASC_NAME}{'DESC_NAME'}{/if}');" >City {if $orderBy eq 'DESC_NAME'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" />{/if}</a>
                    </th>
                    <th width="25%" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_city('{$baseurl}', '{if $orderBy == DESC_STATE}{'ASC_STATE'}{else}{'DESC_STATE'}{/if}');" >State {if $orderBy eq 'DESC_STATE'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By State" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By State" />{/if}</a>
                    </th>
                   
                    <th width="25%" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_city('{$baseurl}', '{if $orderBy == DESC_COUNTRY}{'ASC_COUNTRY'}{else}{'DESC_COUNTRY'}{/if}');" >Country {if $orderBy eq 'DESC_COUNTRY'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Country" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Country" />{/if}</a>
                    </th>
                    <th width="80" align="right" valign="middle">Options</th>
                     
                    </tr>
                    </thead>
                    {assign var="i" value="1"} 
                    {foreach from=$cities key=kk item=city}
                    
                    
                    <tbody> 
                    <tr {if $i%2 eq 0}class="shade01"{/if}>
                    <td width="20%" align="left" valign="top">{$city->city_name}</td>
                    <td width="19%" align="left" valign="top">{$city->state}</td>
                    <td  width="15%" align="left" valign="top">{$city->country}</td>
                    
                    <td align="right" valign="middle">
                    
                     <a href='{$baseurl}admin/city/update_city/{$city->city_id}'><img src="{$baseurl}images/admin/tablelisting/edit_icon.gif" height="18" width="18" alt="Edit" title="Edit" /></a>
                     
                    <span ><a onclick="return confirm('Are You Sure You Want to Delete?')" href="javascript:delete_city('{$baseurl}','admin/city/delete_city/{$city->city_id}')"><img src="{$baseurl}images/admin/tablelisting/close.png" alt="Delete" title="Delete" height="16" width="16" /></a></span>
                    </td>
                    </tr>
                    {assign var="i" value=$i+1}
                    {/foreach}
                    <!--<tr>
                    <td colspan="7" valign="middle" class="borderButtonTop">
                    <span class="btnlayout ">
                 <input type="button" value="Delete" class="button" name="btn_delete" id="btn_delete" />
                 <input type="hidden" name="userscount" id="userscount"  value="{$userscount}" />
                  </span>
                  <span class="select" style="padding-left:20px; ">
                     <select name="action" id="action" style="width:190px; margin-top:6px;" >
                     <option value="1">Active</option>
                     <option value="2">Inactive</option>
                   
                     </select>                                       
                  </span>   
                  <span class="btnlayout" style="float:right; margin-right:560px;">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="change_action('{$baseurl}');" />
                     </span>
                    </td></tr>-->
                    </tbody>
                    {/if}
                </table>
