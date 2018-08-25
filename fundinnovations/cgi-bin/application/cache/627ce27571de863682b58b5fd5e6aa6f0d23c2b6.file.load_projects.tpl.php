<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 06:14:43
         compiled from "/home/fundinno/public_html/application/views/admin/projects/load_projects.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1256217260515acbb3d6c756-25234396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '627ce27571de863682b58b5fd5e6aa6f0d23c2b6' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/projects/load_projects.tpl',
      1 => 1361285857,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1256217260515acbb3d6c756-25234396',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'projectscount' => 0,
    'orderBy' => 0,
    'projects' => 0,
    'i' => 0,
    'pr' => 0,
    'user' => 0,
    'from_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515acbb4173cc3_29237892',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515acbb4173cc3_29237892')) {function content_515acbb4173cc3_29237892($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?>
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
		
				var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
				
				
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

                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                 <?php if ($_smarty_tpl->tpl_vars['projectscount']->value<1){?>
             <tr >
                    <td colspan="7" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
                  <?php }else{ ?>
                     <thead>
                    <tr>
                    <th style="padding-right:7px !important" width="10" align="left" valign="middle" class="checkbox_column"><input type="checkbox" name="checkall" id="checkall" /></th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_TITLE'){?><?php echo 'ASC_TITLE';?>
<?php }else{ ?><?php echo 'DESC_TITLE';?>
<?php }?>');" >Title <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_TITLE'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By title" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By title" /><?php }?></a>
                    </th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><?php echo 'ASC_NAME';?>
<?php }else{ ?><?php echo 'DESC_NAME';?>
<?php }?>');" >Innovator <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By creater name" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By creater name" /><?php }?></a>
                    </th>
                     <th width="" align="left" valign="middle"> <a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_FUND'){?><?php echo 'ASC_FUND';?>
<?php }else{ ?><?php echo 'DESC_FUND';?>
<?php }?>');" > Fund goal<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_FUND'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By fund" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By fund" /><?php }?></a><span class="WebRupee">Rs. </span></th>
                      <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_DATE'){?><?php echo 'ASC_DATE';?>
<?php }else{ ?><?php echo 'DESC_DATE';?>
<?php }?>');" >Created date <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_DATE'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Date" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Date" /><?php }?></a>
                    </th>
                    <th width="" align="left" valign="middle">
                    <!--<a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_PLEDGE'){?><?php echo 'ASC_PLEDGE';?>
<?php }else{ ?><?php echo 'DESC_PLEDGE';?>
<?php }?>');" >-->Pre-Ordered amount <span class="WebRupee">Rs.</span><!--<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_PLEDGE'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Pledge" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Pledge" /><?php }?></a>-->
                    </th>
                   
                    
                    <th width="" align="left" valign="middle">
                   <!-- <a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_REM_AMNT'){?><?php echo 'ASC_REM_AMNT';?>
<?php }else{ ?><?php echo 'DESC_REM_AMNT';?>
<?php }?>');" >-->Remaining amount <span class="WebRupee">Rs.</span><!--<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_REM_AMNT'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By remaining amount." /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By remaining amount." /><?php }?></a>-->
                    </th>
                     <th width="15" align="center" valign="middle">Supporters</th>
                     <th width="90"  align="center" valign="middle">Status</th>
                     <th width="90"  align="center" valign="middle">Project status</th>
                    <th width="90" align="right" valign="middle">Options</th>
                     
                    </tr>
                    </thead>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("1", null, 0);?> 
                                         
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pr']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->key => $_smarty_tpl->tpl_vars['pr']->value){
$_smarty_tpl->tpl_vars['pr']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['pr']->key;
?>
                    
                    <tr <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>class="shade01"<?php }?>>
                    <td style="padding-right:7px !important" align="left" valign="middle" class="checkbox_column">
                   <?php if ($_smarty_tpl->tpl_vars['pr']->value->status!='approved'){?> <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="<?php echo $_smarty_tpl->tpl_vars['pr']->value->proj_id;?>
" class="check" /><?php }?></td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['pr']->value->project_title;?>
</td>
                    <td align="left" valign="top"><?php echo ucwords($_smarty_tpl->tpl_vars['pr']->value->profile_name);?>
</td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['pr']->value->funding_goal;?>
</td>
                    <td align="left" valign="top"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['pr']->value->project_created_date);?>
</td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['pr']->value->tot_backed_amount;?>
</td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['pr']->value->remain_amnt;?>
</td>
                    <td align="center" valign="top"><?php echo $_smarty_tpl->tpl_vars['pr']->value->total_backers;?>
</td>
                    <td align="center" valign="top"><?php echo ucwords($_smarty_tpl->tpl_vars['pr']->value->status);?>
</td>
                    <td align="center" valign="top"><?php echo ucwords($_smarty_tpl->tpl_vars['pr']->value->project_status);?>
</td>
                    <td align="right" valign="middle"><!--<a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/users/viewuser/<?php echo $_smarty_tpl->tpl_vars['user']->value->user_id;?>
/<?php echo $_smarty_tpl->tpl_vars['from_page']->value;?>
"> </a>-->
                    <a href="javascript:view_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/project/viewproject/<?php echo $_smarty_tpl->tpl_vars['pr']->value->proj_id;?>
/<?php echo $_smarty_tpl->tpl_vars['from_page']->value;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/view.png" height="18" width="18" alt="View" title="View" /></a>
                    
                     <a href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/add_project/<?php echo $_smarty_tpl->tpl_vars['pr']->value->proj_id;?>
'><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/edit_icon.gif" height="18" width="18" alt="Edit" title="Edit" /></a>
                     
                    <span ><a onclick="return confirm('Are You Sure You Want to Delete?')" href="javascript:delete_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/project/delete_project/<?php echo $_smarty_tpl->tpl_vars['pr']->value->proj_id;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/close.png" alt="Delete" title="Delete" height="16" width="16" /></a></span>
                    </td>
                    </tr>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                    <?php } ?>
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
                 <input type="hidden" name="projectscount" id="projectscount"  value="<?php echo $_smarty_tpl->tpl_vars['projectscount']->value;?>
" />
                  </span>
                     
                  <span class="btnlayout">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="change_action('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');" />
                     </span>
                    </td></tr>
                    </tfoot>
                    <?php }?>
                </table>

<?php }} ?>