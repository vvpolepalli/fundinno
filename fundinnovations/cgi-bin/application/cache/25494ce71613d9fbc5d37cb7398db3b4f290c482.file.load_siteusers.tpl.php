<?php /* Smarty version Smarty-3.1.8, created on 2013-02-14 18:12:48
         compiled from "/var/www/fundinnovations/application/views/admin/load_siteusers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1411267717508a5267c4db54-36608751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25494ce71613d9fbc5d37cb7398db3b4f290c482' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/load_siteusers.tpl',
      1 => 1360845731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1411267717508a5267c4db54-36608751',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_508a5267efbb86_09597364',
  'variables' => 
  array (
    'baseurl' => 0,
    'userscount' => 0,
    'orderBy' => 0,
    'users' => 0,
    'user' => 0,
    'i' => 0,
    'userStatus' => 0,
    'from_page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508a5267efbb86_09597364')) {function content_508a5267efbb86_09597364($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
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

                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                 <?php if ($_smarty_tpl->tpl_vars['userscount']->value<1){?>
             <tr >
                    <td colspan="7" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
                  <?php }else{ ?>
                     <thead>
                    <tr>
                    <th width="10" style="padding-right:7px" align="left" valign="middle" class="checkbox_column"><input type="checkbox" name="checkall" id="checkall" /></th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_siteusers('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><?php echo 'ASC_NAME';?>
<?php }else{ ?><?php echo 'DESC_NAME';?>
<?php }?>');" >Name <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" /><?php }?></a>
                    </th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_siteusers('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_EMAIL'){?><?php echo 'ASC_EMAIL';?>
<?php }else{ ?><?php echo 'DESC_EMAIL';?>
<?php }?>');" >Email ID <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_EMAIL'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Email" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Email" /><?php }?></a>
                    </th>
                     <th width="" align="left" valign="middle">City</th>
                    <th width="110" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_siteusers('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_DATE'){?><?php echo 'ASC_DATE';?>
<?php }else{ ?><?php echo 'DESC_DATE';?>
<?php }?>');" >Date of Join <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_DATE'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Date" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Date" /><?php }?></a>
                    </th>
                     <th width="100"  align="left" valign="middle">Contact No</th>
                    <th width="" align="center" valign="middle">Created/Supported projects</th>
                    <th width="75" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_siteusers('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_STATUS'){?><?php echo 'ASC_STATUS';?>
<?php }else{ ?><?php echo 'DESC_STATUS';?>
<?php }?>');" >Status <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_STATUS'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Status" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Status" /><?php }?></a>
                    </th>
                    <th width="90" align="right" valign="middle">Options</th>
                     
                    </tr>
                    </thead>
                    <tbody> 
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("1", null, 0);?> 
                    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['user']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->status==1){?>
                    <?php $_smarty_tpl->tpl_vars["userStatus"] = new Smarty_variable("Active", null, 0);?>
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value->status==2){?>
                    <?php $_smarty_tpl->tpl_vars["userStatus"] = new Smarty_variable("Inactive", null, 0);?>
                    <?php }elseif($_smarty_tpl->tpl_vars['user']->value->status==0){?>
                    <?php $_smarty_tpl->tpl_vars["userStatus"] = new Smarty_variable("Not Verified", null, 0);?>
                    <?php }?>
                    
                    
                    
                    <tr <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>class="shade01"<?php }?>>
                    <td align="left"  style="padding-right:7px"  valign="middle" class="checkbox_column">
                    <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
" class="check" /></td>
                    <td align="left" valign="top"><?php echo ucwords($_smarty_tpl->tpl_vars['user']->value->profile_name);?>
</td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['user']->value->email_id;?>
</td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['user']->value->city_name;?>
</td>
                    <td align="left" valign="top"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value->joined_date);?>
</td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['user']->value->contact_no;?>
</td>
                   <!-- <td width="15%" align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['user']->value->contact_no;?>
</td>-->
                    <td align="center" valign="top"><?php echo $_smarty_tpl->tpl_vars['user']->value->created_projs;?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->backed_projs;?>
</td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['userStatus']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['user']->value->status==1&&$_smarty_tpl->tpl_vars['user']->value->inactive_30days==1){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/reject.png"/><?php }?></td>
                    <td align="right" valign="middle"><!--<a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/users/viewuser/<?php echo $_smarty_tpl->tpl_vars['user']->value->user_id;?>
/<?php echo $_smarty_tpl->tpl_vars['from_page']->value;?>
"> </a>-->
                    <a href="javascript:view_siteuser('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/users/viewuser/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['from_page']->value;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/view.png" height="18" width="18" alt="View" title="View" /></a>
                    
                     <a href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/users/edituser/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
'><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/edit_icon.gif" height="18" width="18" alt="Edit" title="Edit" /></a>
                     
                    <span ><a onclick="return confirm('Are You Sure You Want to Delete?')" href="javascript:delete_siteuser('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/users/delete_siteuser/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/close.png" alt="Delete" title="Delete" height="16" width="16" /></a></span>
                    </td>
                    </tr>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                    <td colspan="9" valign="middle" class="borderButtonTop">
                    <span class="btnlayout ">
                 <input type="button" value="Delete" class="button" name="btn_delete" id="btn_delete" />
                 <input type="hidden" name="userscount" id="userscount"  value="<?php echo $_smarty_tpl->tpl_vars['userscount']->value;?>
" />
                  </span>
                  <span class="select" style="padding-left:20px; ">
                     <select name="action" id="action" style="width:190px; margin-top:6px;" >
                     <option value="1">Active</option>
                     <option value="2">Inactive</option>
                     <!--<option value="2">Block</option>-->
                     </select>                                       
                  </span>   
                  <span class="btnlayout" style="float:right; margin-right:560px;">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="change_action('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');" />
                     </span>
                    </td></tr>
                     </tfoot>
                    <?php }?>
                   
                </table>
<?php }} ?>