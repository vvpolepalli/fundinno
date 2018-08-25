<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 22:34:38
         compiled from "/home/fundinno/public_html/application/views/admin/projects/load_refund_cash.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1548506311515bb15e227bc0-39691761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ceca8a0ec8766f5c331e2ca473bb0f141ddefea3' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/projects/load_refund_cash.tpl',
      1 => 1361358338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1548506311515bb15e227bc0-39691761',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'refund_cashcount' => 0,
    'orderBy' => 0,
    'refund_cash' => 0,
    'i' => 0,
    'cash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bb15e470927_70081941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bb15e470927_70081941')) {function content_515bb15e470927_70081941($_smarty_tpl) {?>
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
                 <?php if ($_smarty_tpl->tpl_vars['refund_cashcount']->value<1){?>
             <tr >
                    <td colspan="7" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
                  <?php }else{ ?>
                     <thead>
                    <tr>
                    <th width="3%" align="left" valign="middle" class="checkbox_column"><input type="checkbox" name="checkall" id="checkall" /></th>
                    <th width="17%" align="left" valign="middle">
                    <a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><?php echo 'ASC_NAME';?>
<?php }else{ ?><?php echo 'DESC_NAME';?>
<?php }?>');" >Profile Name <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By title" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By title" /><?php }?></a>
                    </th>
                    <th width="15%" align="center" valign="middle">
                   <span class="WebRupee">Rs. </span> <a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_RFND_CASH'){?><?php echo 'ASC_RFND_CASH';?>
<?php }else{ ?><?php echo 'DESC_RFND_CASH';?>
<?php }?>');" >Refund Cash <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_RFND_CASH'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By creater name" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By creater name" /><?php }?></a>
                    </th>
                     <th width="15%" align="center" valign="middle"> <span class="WebRupee">Rs. </span><a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_REF'){?><?php echo 'ASC_REF';?>
<?php }else{ ?><?php echo 'DESC_REF';?>
<?php }?>');" >Referral Cash<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_REF'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By fund" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By fund" /><?php }?></a></th>
                      <th width="15%" align="center" valign="middle"><span class="WebRupee">Rs. </span>
                    <a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_REIN'){?><?php echo 'ASC_REIN';?>
<?php }else{ ?><?php echo 'DESC_REIN';?>
<?php }?>');" >Reordered Amount <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_REIN'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Date" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Date" /><?php }?></a>
                    </th>
                     <th width="15%" align="center" valign="middle"><span class="WebRupee">Rs. </span>Withdraw
                     </th>
                    <th width="15%" align="center" valign="middle"><span class="WebRupee">Rs. </span>
                   <!-- <a href="javascript:void(0)" onclick="sort_project('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_FUND'){?><?php echo 'ASC_FUND';?>
<?php }else{ ?><?php echo 'DESC_FUND';?>
<?php }?>');" >-->Fundinnovation Cash<!-- <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_FUND'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Date" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Date" /><?php }?></a>-->
                    </th>
                     
                    </tr>
                    </thead>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("1", null, 0);?> 
                    <?php  $_smarty_tpl->tpl_vars['cash'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cash']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['refund_cash']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cash']->key => $_smarty_tpl->tpl_vars['cash']->value){
$_smarty_tpl->tpl_vars['cash']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['cash']->key;
?>
                                        
                    <tbody> 
                    <tr <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>class="shade01"<?php }?>>
                    <td align="left" valign="middle" class="checkbox_column">
                    <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="<?php echo $_smarty_tpl->tpl_vars['cash']->value['user_id'];?>
" class="check" /></td>
                    <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['cash']->value['profile_name'];?>
</td>
                    <td  align="center" valign="top"><?php echo $_smarty_tpl->tpl_vars['cash']->value['refunded_cash'];?>
</td>
                    <td   align="center" valign="top"><?php echo $_smarty_tpl->tpl_vars['cash']->value['referral_cash'];?>
</td>
                    <td align="center" valign="top"><?php echo $_smarty_tpl->tpl_vars['cash']->value['reinvested_cash'];?>
</td>
                    <td  align="center" valign="top"> <?php echo -1*$_smarty_tpl->tpl_vars['cash']->value['withdrawn_cash'];?>
</td>
                	 <td  align="center" valign="top"><?php echo $_smarty_tpl->tpl_vars['cash']->value['fund_cash'];?>
</td>
                    </tr>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                    <?php } ?>
                    <tr>
                    <td colspan="7" valign="middle" class="borderButtonTop">
                    <span class="btnlayout ">
                 <input type="hidden" name="projectscount" id="projectscount"  value="<?php echo $_smarty_tpl->tpl_vars['refund_cashcount']->value;?>
" />
                  </span>
                  <span class="select" style="padding-left:20px; ">
                     <select name="action" id="action" style="width:190px; margin-top:6px;" >
                     <option value="refund_delete">Refund fundinnovation cash</option>
                     <!--<option value="2">Block</option>-->
                     </select>                                       
                  </span>   
                  <span class="btnlayout" style="float:right; margin-right:560px;">
                  <input type="button" value="Update" class="button" name="selectact" id="selectact" onclick="change_action('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');" />
                     </span>
                    </td></tr>
                    </tbody>
                    <?php }?>
                </table>

<?php }} ?>