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
                 {if $projectscount < 1}
             <tr >
                    <td colspan="7" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
                  {else}
                     <thead>
                    <tr>
                    <th style="padding-right:7px !important" width="10" align="left" valign="middle" class="checkbox_column"><input type="checkbox" name="checkall" id="checkall" /></th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_TITLE}{'ASC_TITLE'}{else $orderBy == ASC_TITLE}{'DESC_TITLE'}{/if}');" >Title {if $orderBy eq 'DESC_TITLE'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By title" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By title" />{/if}</a>
                    </th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_NAME}{'ASC_NAME'}{else}{'DESC_NAME'}{/if}');" >Innovator {if $orderBy eq 'DESC_NAME'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By creater name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By creater name" />{/if}</a>
                    </th>
                     <th width="" align="left" valign="middle"> <a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_FUND}{'ASC_FUND'}{else}{'DESC_FUND'}{/if}');" > Fund goal{if $orderBy eq 'DESC_FUND'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By fund" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By fund" />{/if}</a><span class="WebRupee">Rs. </span></th>
                      <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_DATE}{'ASC_DATE'}{else}{'DESC_DATE'}{/if}');" >Created date {if $orderBy eq 'DESC_DATE'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Date" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Date" />{/if}</a>
                    </th>
                    <th width="" align="left" valign="middle">
                    <!--<a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_PLEDGE}{'ASC_PLEDGE'}{else}{'DESC_PLEDGE'}{/if}');" >-->Pre-Ordered amount <span class="WebRupee">Rs.</span><!--{if $orderBy eq 'DESC_PLEDGE'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Pledge" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Pledge" />{/if}</a>-->
                    </th>
                   
                    
                    <th width="" align="left" valign="middle">
                   <!-- <a href="javascript:void(0)" onclick="sort_project('{$baseurl}', '{if $orderBy == DESC_REM_AMNT}{'ASC_REM_AMNT'}{else}{'DESC_REM_AMNT'}{/if}');" >-->Remaining amount <span class="WebRupee">Rs.</span><!--{if $orderBy eq 'DESC_REM_AMNT'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By remaining amount." />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By remaining amount." />{/if}</a>-->
                    </th>
                     <th width="15" align="center" valign="middle">Supporters</th>
                     <th width="90"  align="center" valign="middle">Status</th>
                     <th width="90"  align="center" valign="middle">Project status</th>
                    <th width="90" align="right" valign="middle">Options</th>
                     
                    </tr>
                    </thead>
                    {assign var="i" value="1"} 
                                         
                    <tbody>
                    {foreach from=$projects key=kk item=pr}
                    
                    <tr {if $i%2 eq 0}class="shade01"{/if}>
                    <td style="padding-right:7px !important" align="left" valign="middle" class="checkbox_column">
                   {if $pr->status neq 'approved'} <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="{$pr->proj_id}" class="check" />{/if}</td>
                    <td align="left" valign="top">{$pr->project_title}</td>
                    <td align="left" valign="top">{$pr->profile_name|ucwords}</td>
                    <td align="left" valign="top">{$pr->funding_goal}</td>
                    <td align="left" valign="top">{$pr->project_created_date|date_format}</td>
                    <td align="left" valign="top">{$pr->tot_backed_amount}</td>
                    <td align="left" valign="top">{$pr->remain_amnt}</td>
                    <td align="center" valign="top">{$pr->total_backers}</td>
                    <td align="center" valign="top">{$pr->status|ucwords}</td>
                    <td align="center" valign="top">{$pr->project_status|ucwords}</td>
                    <td align="right" valign="middle"><!--<a href="{$baseurl}admin/users/viewuser/{$user->user_id}/{$from_page}"> </a>-->
                    <a href="javascript:view_project('{$baseurl}','admin/project/viewproject/{$pr->proj_id}/{$from_page}')"><img src="{$baseurl}images/admin/tablelisting/view.png" height="18" width="18" alt="View" title="View" /></a>
                    
                     <a href='{$baseurl}admin/project/add_project/{$pr->proj_id}'><img src="{$baseurl}images/admin/tablelisting/edit_icon.gif" height="18" width="18" alt="Edit" title="Edit" /></a>
                     
                    <span ><a onclick="return confirm('Are You Sure You Want to Delete?')" href="javascript:delete_project('{$baseurl}','admin/project/delete_project/{$pr->proj_id}')"><img src="{$baseurl}images/admin/tablelisting/close.png" alt="Delete" title="Delete" height="16" width="16" /></a></span>
                    </td>
                    </tr>
                    {assign var="i" value=$i+1}
                    {/foreach}
                    </tbody>
                    <tfoot>
                    <tr>
                    <td colspan="11" valign="middle" class="borderButtonTop">
                    <span class="select" style="padding-right:20px; float:left;">
                     <select name="action" id="action" style="width:190px; margin-top:6px;" >
                     <option value="approved">Approve</option>
                     <option value="rejected">Reject</option>
                     <!--<option value="2">Block</option>-->
                     </select>                                       
                  </span>
                    <span class="btnlayout ">
                 <!--<input type="button" value="Delete" class="button" name="btn_delete" id="btn_delete" />-->
                 <input type="hidden" name="projectscount" id="projectscount"  value="{$projectscount}" />
                  </span>
                     
                  <span class="btnlayout">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="change_action('{$baseurl}');" />
                     </span>
                    </td></tr>
                    </tfoot>
                    {/if}
                </table>

