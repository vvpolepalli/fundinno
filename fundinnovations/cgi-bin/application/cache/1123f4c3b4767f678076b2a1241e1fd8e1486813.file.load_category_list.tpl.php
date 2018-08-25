<?php /* Smarty version Smarty-3.1.8, created on 2013-02-05 17:09:21
         compiled from "/var/www/fundinnovations/application/views/admin/category/load_category_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14358641045090fa378d74c7-01575614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1123f4c3b4767f678076b2a1241e1fd8e1486813' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/category/load_category_list.tpl',
      1 => 1360053613,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14358641045090fa378d74c7-01575614',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5090fa37a30157_01786173',
  'variables' => 
  array (
    'baseurl' => 0,
    'category_list_count' => 0,
    'orderBy' => 0,
    'category_list' => 0,
    'i' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5090fa37a30157_01786173')) {function content_5090fa37a30157_01786173($_smarty_tpl) {?>
<script type="text/javascript">
var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
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
		
				var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
				
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

                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                 <?php if ($_smarty_tpl->tpl_vars['category_list_count']->value<1){?>
             <tr >
                    <td colspan="5" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
                  <?php }else{ ?>
                     <thead>
                    <tr>
                    <th  width="10" style="padding-right:7px" align="left" valign="middle" class="checkbox_column"><input type="checkbox" name="checkall" id="checkall" /></th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_category('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><?php echo 'ASC_NAME';?>
<?php }else{ ?><?php echo 'DESC_NAME';?>
<?php }?>');" >Category <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" /><?php }?></a>
                    </th>
                    <th width="" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_category('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_PARENT'){?><?php echo 'ASC_PARENT';?>
<?php }else{ ?><?php echo 'DESC_PARENT';?>
<?php }?>');" >Parent <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_PARENT'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By parent category" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By parent category" /><?php }?></a>
                    </th>
                    <th width="" align="left" valign="middle">
                   Staff pick
                    </th>
                    <th width="90" align="right" valign="middle">Options</th>
                     
                    </tr>
                    </thead> 
                    <tbody> 
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("1", null, 0);?> 
                    <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['category_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['category']->key;
?>
                  
                   
                    <tr <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>class="shade01"<?php }?>>
                    <td  style="padding-right:7px" align="left" valign="middle" class="checkbox_column">
                    <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
" class="check" /></td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['category']->value->category_name;?>
</td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['category']->value->parent;?>
</td>
                    <td align="left" valign="top"><?php if ($_smarty_tpl->tpl_vars['category']->value->parent_id==0){?><a href="javascript:void(0)" onclick="staff_pick_pop(<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
,'<?php echo $_smarty_tpl->tpl_vars['category']->value->category_name;?>
')" ><?php if ($_smarty_tpl->tpl_vars['category']->value->staff_pick_project==''){?>Add staff pick project <?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['category']->value->staff_pick_project;?>
<?php }?></a><?php }?></td>
                     <td align="right" valign="middle">
                     <a href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/category/edit_category/<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
'><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/edit_icon.gif" height="18" width="18" alt="Edit" title="Edit" /></a>
                     
                    <span><a onclick="return confirm('Are You Sure You Want to Delete? It may delete child categories also and affect projects related to this.!')" href="javascript:delete_category('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/category/delete_category/<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/close.png" alt="Delete" title="Delete" height="16" width="16" /></a></span>
                    </td>
                    </tr>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                    <?php } ?>
                    
                     </tbody>
                     <tfoot>
                    <tr>
                    
                    <td colspan="5" valign="middle" class="borderButtonTop">
                    <span class="btnlayout ">
                 <input type="button" value="Delete" class="button" name="btn_delete" id="btn_delete" />
                 <input type="hidden" name="userscount" id="userscount"  value="<?php echo $_smarty_tpl->tpl_vars['category_list_count']->value;?>
" />
                  </span>
                  <!--<span class="select" style="padding-left:20px; ">
                     <select name="action" id="action" style="width:190px; margin-top:6px;" >
                     <option value="1">Active</option>
                     <option value="2">Inactive</option>
                 
                     </select>                                       
                  </span>   
                  <span class="btnlayout" style="float:right; margin-right:560px;">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="change_action('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');" />
                     </span>-->
                    </td></tr>
                   </tfoot>
                    <?php }?>
                </table>
<div id="dialog-confirm" title="Select staff pick">
    <div id="popup_content">
    
    </div>
</div><?php }} ?>