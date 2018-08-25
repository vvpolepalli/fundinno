<?php /* Smarty version Smarty-3.1.8, created on 2013-01-22 15:45:27
         compiled from "/var/www/fundinnovations/application/views/admin/city/load_cities.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37170302650a499267e41a9-47703750%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3afd610408af612ea70f82b58d432065789bcbd' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/city/load_cities.tpl',
      1 => 1358849725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37170302650a499267e41a9-47703750',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a499268f93d4_53238414',
  'variables' => 
  array (
    'baseurl' => 0,
    'citiescount' => 0,
    'orderBy' => 0,
    'cities' => 0,
    'i' => 0,
    'city' => 0,
    'userscount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a499268f93d4_53238414')) {function content_50a499268f93d4_53238414($_smarty_tpl) {?>
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
                 <?php if ($_smarty_tpl->tpl_vars['citiescount']->value<1){?>
             <tr >
                    <td colspan="4" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
                  <?php }else{ ?>
                     <thead>
                    <tr>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_city('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><?php echo 'ASC_NAME';?>
<?php }else{ ?><?php echo 'DESC_NAME';?>
<?php }?>');" >City <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" /><?php }?></a>
                    </th>
                    <th width="25%" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_city('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_STATE'){?><?php echo 'ASC_STATE';?>
<?php }else{ ?><?php echo 'DESC_STATE';?>
<?php }?>');" >State <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_STATE'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By State" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By State" /><?php }?></a>
                    </th>
                   
                    <th width="25%" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_city('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_COUNTRY'){?><?php echo 'ASC_COUNTRY';?>
<?php }else{ ?><?php echo 'DESC_COUNTRY';?>
<?php }?>');" >Country <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_COUNTRY'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Country" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Country" /><?php }?></a>
                    </th>
                    <th width="80" align="right" valign="middle">Options</th>
                     
                    </tr>
                    </thead>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("1", null, 0);?> 
                    <?php  $_smarty_tpl->tpl_vars['city'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['city']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['city']->key => $_smarty_tpl->tpl_vars['city']->value){
$_smarty_tpl->tpl_vars['city']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['city']->key;
?>
                    
                    
                    <tbody> 
                    <tr <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>class="shade01"<?php }?>>
                    <td width="20%" align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['city']->value->city_name;?>
</td>
                    <td width="19%" align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['city']->value->state;?>
</td>
                    <td  width="15%" align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['city']->value->country;?>
</td>
                    
                    <td align="right" valign="middle">
                    
                     <a href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/city/update_city/<?php echo $_smarty_tpl->tpl_vars['city']->value->city_id;?>
'><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/edit_icon.gif" height="18" width="18" alt="Edit" title="Edit" /></a>
                     
                    <span ><a onclick="return confirm('Are You Sure You Want to Delete?')" href="javascript:delete_city('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/city/delete_city/<?php echo $_smarty_tpl->tpl_vars['city']->value->city_id;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/close.png" alt="Delete" title="Delete" height="16" width="16" /></a></span>
                    </td>
                    </tr>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                    <?php } ?>
                    <!--<tr>
                    <td colspan="7" valign="middle" class="borderButtonTop">
                    <span class="btnlayout ">
                 <input type="button" value="Delete" class="button" name="btn_delete" id="btn_delete" />
                 <input type="hidden" name="userscount" id="userscount"  value="<?php echo $_smarty_tpl->tpl_vars['userscount']->value;?>
" />
                  </span>
                  <span class="select" style="padding-left:20px; ">
                     <select name="action" id="action" style="width:190px; margin-top:6px;" >
                     <option value="1">Active</option>
                     <option value="2">Inactive</option>
                   
                     </select>                                       
                  </span>   
                  <span class="btnlayout" style="float:right; margin-right:560px;">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="change_action('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');" />
                     </span>
                    </td></tr>-->
                    </tbody>
                    <?php }?>
                </table>
<?php }} ?>