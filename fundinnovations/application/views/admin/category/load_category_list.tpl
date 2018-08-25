{literal}
<script type="text/javascript">
var baseurl = '{/literal}{$baseurl}{literal}';
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
			var conf=confirm('Are You Sure You Want to Delete? It may delete child categories also and affect projects related to this category.');
			if(conf)
			{
		
				var baseurl = '{/literal}{$baseurl}{literal}';
				
				var category	= $("#hid_category").val();
				var orderBy 	= $('#hid_orderBy').val();
				
				$.ajax({
							type: "POST",
							url: baseurl+"admin/category/del_select_category",  
							data: "category_ids="+clists+"&startp="+startp+"&limitp="+limitp+"&category="+category+"&order_by="+orderBy,  
							success: function(msg){
								if(msg)
								{  
										$('#load_categorylist').html(msg);
										var cnt=$.ajax({
										type:"POST",
										url:baseurl+"admin/category/searchCount",
										data:"category="+category,
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
								
									/*** End pageselectCallback ****/
									
									
								}
							}
							
						});
			}//end of confirm
		}
	});
	 
	 
	 
});
function staff_pick_pop(id,category)
{
		
				$.ajax({
					  type: "POST",
					  url: baseurl+"admin/category/get_projects_bycatid",  
					  data: "category_id="+id+"&category="+category,  
					  success: function(msg){
						  $('#popup_content').html(msg);
						  $( "#dialog-confirm" ).dialog({
							resizable: false,
							//height:140,
							modal: true,
							buttons: {
								"Save": function() {
									change_staff_pick(id);
									$( this ).dialog( "close" );
								},
								Cancel: function() {
									$( this ).dialog( "close" );
								}
							}
						});
					}
				});
 
}
function change_staff_pick(id){
	var project_id= $('#project_list').val();
	if(project_id != '')
	$.ajax({
			type: "POST",
			url: baseurl+"admin/category/change_staff_pick",  
			data: "category_id="+id+"&project_id="+project_id,  
			success: function(msg){
				window.location.href=baseurl+'admin/category'
			}
	});
}
</script>
{/literal}
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                 {if $category_list_count < 1}
             <tr >
                    <td colspan="5" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
                  {else}
                     <thead>
                    <tr>
                    <th  width="10" style="padding-right:7px" align="left" valign="middle" class="checkbox_column"><input type="checkbox" name="checkall" id="checkall" /></th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_category('{$baseurl}', '{if $orderBy == DESC_NAME}{'ASC_NAME'}{else $orderBy == ASC_NAME}{'DESC_NAME'}{/if}');" >Category {if $orderBy eq 'DESC_NAME'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" />{/if}</a>
                    </th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_category('{$baseurl}', '{if $orderBy == DESC_PARENT}{'ASC_PARENT'}{else}{'DESC_PARENT'}{/if}');" >Parent {if $orderBy eq 'DESC_PARENT'}<img src="{$baseurl}/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By parent category" />{else}<img src="{$baseurl}/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By parent category" />{/if}</a>
                    </th>
                    <th width="" align="left" valign="middle">
                   Staff pick
                    </th>
                    <th width="90" align="right" valign="middle">Options</th>
                     
                    </tr>
                    </thead> 
                    <tbody> 
                    {assign var="i" value="1"} 
                    {foreach from=$category_list key=kk item=category}
                  
                   
                    <tr {if $i%2 eq 0}class="shade01"{/if}>
                    <td  style="padding-right:7px" align="left" valign="middle" class="checkbox_column">
                    <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="{$category->id}" class="check" /></td>
                    <td align="left" valign="top">{$category->category_name}</td>
                    <td align="left" valign="top">{$category->parent}</td>
                    <td align="left" valign="top">{if $category->parent_id eq 0}<a href="javascript:void(0)" onclick="staff_pick_pop({$category->id},'{$category->category_name}')" >{if $category->staff_pick_project eq ''}Add staff pick project {else}{$category->staff_pick_project}{/if}</a>{/if}</td>
                     <td align="right" valign="middle">
                     <a href='{$baseurl}admin/category/edit_category/{$category->id}'><img src="{$baseurl}images/admin/tablelisting/edit_icon.gif" height="18" width="18" alt="Edit" title="Edit" /></a>
                     
                    <span><a onclick="return confirm('Are You Sure You Want to Delete? It may delete child categories also and affect projects related to this.!')" href="javascript:delete_category('{$baseurl}','admin/category/delete_category/{$category->id}')"><img src="{$baseurl}images/admin/tablelisting/close.png" alt="Delete" title="Delete" height="16" width="16" /></a></span>
                    </td>
                    </tr>
                    {assign var="i" value=$i+1}
                    {/foreach}
                    
                     </tbody>
                     <tfoot>
                    <tr>
                    
                    <td colspan="5" valign="middle" class="borderButtonTop">
                    <span class="btnlayout ">
                 <input type="button" value="Delete" class="button" name="btn_delete" id="btn_delete" />
                 <input type="hidden" name="userscount" id="userscount"  value="{$category_list_count}" />
                  </span>
                  <!--<span class="select" style="padding-left:20px; ">
                     <select name="action" id="action" style="width:190px; margin-top:6px;" >
                     <option value="1">Active</option>
                     <option value="2">Inactive</option>
                 
                     </select>                                       
                  </span>   
                  <span class="btnlayout" style="float:right; margin-right:560px;">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="change_action('{$baseurl}');" />
                     </span>-->
                    </td></tr>
                   </tfoot>
                    {/if}
                </table>
<div id="dialog-confirm" title="Select staff pick">
    <div id="popup_content">
    
    </div>
</div>