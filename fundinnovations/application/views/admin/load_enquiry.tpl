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
		  alert(" Please select atleast one checkbox to delete");
		  return false;
		}
		else
		{ 
			var conf=confirm('Do you want to delete?');
			if(conf)
			{
		
				var baseurl = '{/literal}{$baseurl}{literal}';
				var first_name = $('#hid_first_name').val();
				var email = $('#hid_email ').val();
				var datetime = $('#hid_datetime').val();
				var orderBy 	= $('#hid_orderBy').val();
				$.ajax({
							type: "POST",
							url: baseurl+"admin/Enquiry/delselected_enquiry/",  
							data: "id="+clists+"&startp="+startp+"&limitp="+limitp+"&order_by="+orderBy+"&first_name="+first_name+"&email="+email+"&datetime="+datetime,  
							success: function(msg){
								if(msg)
								{  
										$('#load_propertyTypes').html(msg);
										var cnt=$.ajax({
										type:"POST",
										url:baseurl+"admin/Enquiry/searchCount",
										data:"first_name="+first_name+"&email="+email+"&datetime="+datetime,
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
											var first_name = $('#hid_first_name').val();
											var email = $('#hid_email ').val();
											var datetime = $('#hid_datetime').val();
											var orderBy 	= $('#hid_orderBy').val();
											$.ajax({			
											type: "POST",
											url: baseurl + "admin/Enquiry/propertyTypes_list/",
											data: "first_name="+first_name+"&email="+email+"&datetime="+datetime+"&startp="+page_ind+"&limitp="+limitp+"&order_by="+orderBy,  											success: function(msg){	
											//alert(msg)
											$('#load_propertyTypes').html('');				 
											$('#load_propertyTypes').html(msg);			 				
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
                {if $enquiryCount gt 0}
              <thead>
              <tr>
                <th width="22" valign="middle" align="center" class="checkbox_column" > 
                      <input type="checkbox" name="checkall" id="checkall" />
				</th>
                <th width="295" align="left" valign="middle">
               
                <a href="javascript:void(0)" onclick="sort_enquiry('{$baseurl}', '{if $orderBy == DESC_NAME}{'ASC_NAME'}{else}{'DESC_NAME'}{/if}');" >Name of sender {if $orderBy eq 'DESC_NAME'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" />{/if}</a>
                
                </th>  
                <th width="295" align="left" valign="middle"><a href="javascript:void(0)" onclick="sort_enquiry('{$baseurl}', '{if $orderBy == DESC_EMAIL}{'ASC_EMAIL'}{else}{'DESC_EMAIL'}{/if}');" >E-mail id {if $orderBy eq 'DESC_EMAIL'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" />{/if}</a>
                
                </th> 
                <th width="295" align="left" valign="middle"><a href="javascript:void(0)" onclick="sort_enquiry('{$baseurl}', '{if $orderBy == DESC_SUB}{'ASC_SUB'}{else}{'DESC_SUB'}{/if}');" >Subject {if $orderBy eq 'DESC_SUB'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" />{/if}</a>
                </th>  
                 
                
                             
                <th width="147" align="left" valign="middle"><a href="javascript:void(0)" onclick="sort_enquiry('{$baseurl}', '{if $orderBy == DESC_DATE}{'ASC_DATE'}{else}{'DESC_DATE'}{/if}');" >Date {if $orderBy eq 'DESC_DATE'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Date" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Date" />{/if}</a>
                </th>
                <th width="125" align="left" valign="middle">Reply Status</th>
                <th width="125" align="left" valign="middle">Option</th>
               
			  </tr>
              </thead>
              {/if}
              <tbody>
              {if $enquiryCount gt 0}
              {assign var=i value=1} 
                 {foreach from=$searchenquiry item=enquiryList key=k}  
                               
                  <tr {if $i%2 eq 0} class="shade01" {/if} >
                  <td width="3%" valign="middle" align="center" class="checkbox_column"> 
                  <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="{$enquiryList->enquiry_id}" class="check" />
                  </td>
                  <td width="22%">{$enquiryList->first_name|stripslashes}</td>  
                  <td width="22%">{$enquiryList->email|stripslashes}</td>  
                  <td width="18%">{$enquiryList->subject|stripslashes}</td> 
                  <td width="11%">{$enquiryList->datetime|date_format}</td>
                   <td width="12%">{if $enquiryList->reply_status == 0} <p style="color:#C00">Not Replied</p>{elseif $enquiryList->reply_status == 1} <p style="color:#007100">Replied</p> {/if}</td>  
                   <td width="10%">
                        <!--<a href="{$baseurl}admin/Enquiry/enquiry_list/{$enquiryList->enquiry_id}" style="display: inline-block;
    vertical-align: text-top;"><img src="{$baseurl}/images/admin/tablelisting/view.png" width='15' height='16' alt='View' title="View" /></a>-->
                        <a href="javascript:view_siteproperty_type('{$baseurl}','admin/Enquiry/viewproperty_type/{$enquiryList->enquiry_id}/{$from_page}')"><img src="{$baseurl}/images/admin/tablelisting/view.png" width='18' height='18' alt='View' title="View" /></a>
                         &nbsp;&nbsp;
                         
                         <a href="javascript:delete_propertyType('{$baseurl}','admin/Enquiry/delete_enquiry/{$enquiryList->enquiry_id}')" onclick="return confirm('Do you want to delete?')"><img src="{$baseurl}/images/admin/tablelisting/close.png" alt="Delete" title="Delete" height="16" width="16"/></a>                       
                        
                        
                        </td>
                 
                  </tr>
                   {assign var=i value=$i+1} 
                  {/foreach}
                  <tr>
                    <td valign="top" align="left" colspan="7" class="borderButtonTop">
                     <span class="btnlayout">
                     <input type="button" value="Delete" class="button" name="btn_delete" id="btn_delete" />
                     <input type="hidden" name="enquiryCount" id="enquiryCount"  value="{$enquiryCount}" />
                      </span>
                      <!-- <span class="select">
                     <select name="action" id="action" style="width:190px;" >
                     <option value="Active">Active</option>
                     <option value="Deactive">Deactive</option>
                     </select>                                       
                  </span>   
                  <span class="btnlayout ">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="update_action('{$baseurl}', 'admin/home/update_status');" />
                     </span>-->
                      
                    </td>
               	</tr>
                 {else}
                 <tr>
                 	<td colspan="7" align="center" style="color:red;">No Results Found</td>
                 </tr>
               
            {/if}
               </tbody>
              
             </table>

     