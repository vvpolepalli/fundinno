<?php /* Smarty version Smarty-3.1.8, created on 2013-02-20 17:39:43
         compiled from "/var/www/fundinnovations/application/views/admin/payment/load_allpayment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78145821250f15e2d3db553-95810434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de58a9e581cc6be38ed68e732dc84bf0b4265d99' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/payment/load_allpayment.tpl',
      1 => 1361362178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78145821250f15e2d3db553-95810434',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50f15e2d522950_83298872',
  'variables' => 
  array (
    'baseurl' => 0,
    'paymentCount' => 0,
    'orderBy' => 0,
    'orders' => 0,
    'i' => 0,
    'orderList' => 0,
    'from_page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f15e2d522950_83298872')) {function content_50f15e2d522950_83298872($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?><style>
.table_listing table td {
    font-size: 13px;
    padding: 8px !important;
}
</style>
<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/member.js"></script> -->




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
	 $('#btn_update1').click( function() {
		 
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
		  alert(" Please select atleast one checkbox to update");
		  return false;
		}
		else
		{ 
			var conf=confirm('Do you want to update?');
			if(conf)
			{
		
				var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
				var trans_id = $('#trans_id').val();
				var order_id = $('#order_id').val();
				var datetime = $('#datetime').val();
				var status=		$('#paystatus').val();
				var paymentperiod=$('#paymentperiod').val();
				var orderBy 	= $('#hid_orderBy').val();
				var hidCurrP = $('#hid_currP').val();
				$.ajax({
							type: "POST",
							url: baseurl+"admin/payment/update_bulk_status/",  
							data:"id="+clists+"&trans_id="+trans_id+"&order_id="+order_id+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp+"&status="+status+"&paymentperiod="+paymentperiod,
							success: function(msg){
								if(msg)
								{  
										$('#load_orders').html(msg);
										var cnt=$.ajax({
										type:"POST",
										url:baseurl+"admin/payment/orderCount",
										data:"trans_id="+trans_id+"&order_id="+order_id+"&datetime="+datetime+"&order_by="+orderBy+"&status="+status+'&paymentperiod='+paymentperiod,
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
										var trans_id = 	$('#hid_trans_id').val();
										var order_id = 	$('#hid_order_id').val();
										var datetime = 	$('#hid_datetime').val();
										var orderBy = 	$('#hid_orderBy').val();
										var status	=	$('#hid_status').val();
										var paymentperiod=$('#hid_paymentperiod').val(paymentperiod);
										$.ajax({
										type: "POST",
										url: baseurl + "admin/payment/load_all_payment/",
										data:"trans_id="+trans_id+"&order_id="+order_id+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp+"&status="+status+"&paymentperiod="+paymentperiod,
										success: function (msg) 
										{
										$('#load_orders').html('');
										$('#load_orders').html(msg);
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
function change_action(baseurl,id) 
{
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
		
	
	  // var useremail=$('#emailId').val();
		
	
	
	//var action=$('#action').val();
	var action=$('#action_bx :selected').val();
	//alert(action);
	//var clists = $('input[name="ListStatusLinkCheckbox[]"]:checked').map(function(){return this.value;}).get();
	var clists=id;

		//alert(citylist);
		if(action=='')
		  {
			  alert("Please select any option"); 
			  return false;
		  }
			else{
			$.ajax({
							type: "POST",
							url: baseurl+"admin/payment/change_status", 
							data: "startp="+startp+"&limitp="+limitp+"&pid="+clists+"&action="+action,
							success: function(msg){
								if(msg)
								{ 
									//load_siteusers_list(baseurl,startp,limitp);
									action='';
									if(msg =='updated'){
									initial_load_order(baseurl, current_page);
									 $( "#dialog-confirm").dialog( "close" );}	
									else if(msg =='completed'){
										//alert('Th');
										$('#popup_content').html('You can not change the status,this project is completed');
										$( "#alert_box" ).dialog({
										resizable: false,
										//height:140,
										modal: true,
										buttons: {
											OK: function() {
												$( this ).dialog( "close" );
											}
										}
										});
									}
									else if(msg =='deleted'){
										//alert('Th');
										$('#popup_content').html('You can not change the status,this order id deleted.');
										$( "#alert_box" ).dialog({
										resizable: false,
										//height:140,
										modal: true,
										buttons: {
											OK: function() {
												$( this ).dialog( "close" );
											}
										}
										});
									}
								}
							}
						   
						});
			}
}
function open_sts_pop(id,sts){
	var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	//$('#action').show();
			$.ajax({
					type: "POST",
					url: baseurl+"admin/payment/change_status_cntnt", 
					data: "id="+id,
					success: function(msg){
						$('#popup_sel_cntnt').html(msg);
						//$('#update_btn').
						 $( "#dialog-confirm").dialog({
							resizable: false,
							modal: true,
							/*buttons: {
								"Update": function() {
									change_action(baseurl,id);
									$( this ).dialog( "close" );
									//$('#action').hide();
								},
								Cancel: function() {
									$( this ).dialog( "close" );
									//$('#action').hide();
								}
							}*/
						});
						}
					});
							

}
function close_fn(){
	$('#popup_sel_cntnt').empty();
	 $( "#dialog-confirm").dialog( "close" );
}
</script>

                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <?php if ($_smarty_tpl->tpl_vars['paymentCount']->value>0){?>
              <thead>
              <tr>
                <!--<th width="10" valign="middle" align="center" class="checkbox_column" > 
                      <input type="checkbox" name="checkall" id="checkall" />
				</th>-->
              
                <th width="125" align="left" valign="middle"><div >Order Id.</div> </th>
                <th width="125" align="left" valign="middle"><div ><a href="javascript:void(0)" onclick="sort_order('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_PTIT'){?><?php echo 'ASC_PTIT';?>
<?php }elseif($_smarty_tpl->tpl_vars['orderBy']->value=='ASC_PTIT'){?><?php echo 'DESC_PTIT';?>
<?php }else{ ?><?php echo 'DESC_PTIT';?>
<?php }?>');" >Project title<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_PTIT'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" /><?php }?>
                </a></div></th> 
               <!-- <th width="125" align="left" valign="middle"><div style="width:90px;">
                <a href="javascript:void(0)" onclick="sort_order('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><?php echo 'ASC_NAME';?>
<?php }elseif($_smarty_tpl->tpl_vars['orderBy']->value=='ASC_NAME'){?><?php echo 'DESC_NAME';?>
<?php }else{ ?><?php echo 'DESC_NAME';?>
<?php }?>');" >
                Name<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_NAME'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" /><?php }?>
                </a>
                </div>
                 </th> -->  
                <th width="125" align="left" valign="middle"><div ><a href="javascript:void(0)" onclick="sort_order('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_AMNT'){?><?php echo 'ASC_AMNT';?>
<?php }elseif($_smarty_tpl->tpl_vars['orderBy']->value=='ASC_AMNT'){?><?php echo 'DESC_AMNT';?>
<?php }else{ ?><?php echo 'DESC_AMNT';?>
<?php }?>');" >Pre-order amount<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_AMNT'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Amount" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Amount" /><?php }?>
                </a></div><span class="WebRupee">Rs. </span></th>   
                <th width="125" align="left" valign="middle"><div style="width:106px;">Project status </div></th>   
                <th width="100" align="left" valign="middle"><div ><a href="javascript:void(0)" onclick="sort_order('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_USR'){?><?php echo 'ASC_USR';?>
<?php }elseif($_smarty_tpl->tpl_vars['orderBy']->value=='ASC_USR'){?><?php echo 'DESC_USR';?>
<?php }else{ ?><?php echo 'DESC_USR';?>
<?php }?>');" >Supporter <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_USR'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Name" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Name" /><?php }?>
                </a>
                </div></th>
                
                <th width="100" align="left" valign="middle"><div >
                 <a style="position:relative;" href="javascript:void(0)" onclick="sort_order('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_STATUS'){?><?php echo 'ASC_STATUS';?>
<?php }elseif($_smarty_tpl->tpl_vars['orderBy']->value=='ASC_STATUS'){?><?php echo 'DESC_STATUS';?>
<?php }else{ ?><?php echo 'DESC_STATUS';?>
<?php }?>');" >
                Order  Status <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_STATUS'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Payment Status" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Payment Status" /><?php }?></a></div></th> 
               <th width="100" align="left" valign="middle"><div >Date
                </div></th>
                <th width="40" align="center" valign="middle"><div >Option</div></th>
			  </tr>
              </thead>
              <tbody>
              <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?> 
                 <?php  $_smarty_tpl->tpl_vars['orderList'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['orderList']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['orderList']->key => $_smarty_tpl->tpl_vars['orderList']->value){
$_smarty_tpl->tpl_vars['orderList']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['orderList']->key;
?>  
                               
                  <tr <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?> class="shade01" <?php }?> >
                  <!--<td valign="middle" align="center" class="checkbox_column"> 
                  <input type="checkbox" name="ListStatusLinkCheckbox[]" id="ListStatusLinkCheckbox[]" value="<?php echo $_smarty_tpl->tpl_vars['orderList']->value->id;?>
" class="check" />
                  </td>-->
                   <td align="left">
                  <!-- <a  href="javascript:view_order_details('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/payment/payment_detail/<?php echo $_smarty_tpl->tpl_vars['orderList']->value->payment_id;?>
/<?php echo $_smarty_tpl->tpl_vars['from_page']->value;?>
')" title="View Payment Details"><?php echo $_smarty_tpl->tpl_vars['orderList']->value->order_id;?>
</a>-->
                    <?php echo $_smarty_tpl->tpl_vars['orderList']->value->order_id;?>

                   
                   </td> 
                   <td align="left"><?php echo $_smarty_tpl->tpl_vars['orderList']->value->project_title;?>
</td>
                  <td align="left"><?php echo $_smarty_tpl->tpl_vars['orderList']->value->amount;?>

                  		<!--<a href="javascript:view_siteuser('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/users/viewuser/<?php echo $_smarty_tpl->tpl_vars['orderList']->value->user_id;?>
/all')" title="View User Details">--><!--</a>-->
                   </td>  
                  <td align="left"><?php echo stripslashes($_smarty_tpl->tpl_vars['orderList']->value->project_status);?>
</td>  
                  <td align="left">
                  <?php echo ucwords($_smarty_tpl->tpl_vars['orderList']->value->name);?>

                  
                  </td>  
                  <td align="left"><?php echo ucwords($_smarty_tpl->tpl_vars['orderList']->value->paymentstatus);?>
</td>
                  
                  <td align="left" id="paymentstaus<?php echo $_smarty_tpl->tpl_vars['orderList']->value->payment_id;?>
"> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['orderList']->value->date);?>

                   <!--<?php if ($_smarty_tpl->tpl_vars['orderList']->value->reward_amnt!=''){?><?php echo $_smarty_tpl->tpl_vars['orderList']->value->reward_amnt;?>
<?php }else{ ?>0<?php }?>-->
                  </td>
              	 <td align="center"> 
                <a href="javascript:void(0);" onclick="open_sts_pop(<?php echo $_smarty_tpl->tpl_vars['orderList']->value->id;?>
,'<?php echo $_smarty_tpl->tpl_vars['orderList']->value->paymentstatus;?>
')">Change status</a>
                            <!--<?php if ($_smarty_tpl->tpl_vars['orderList']->value->paymentstatus=='Pending'){?>
                            <a id="toggleStatus<?php echo $_smarty_tpl->tpl_vars['orderList']->value->payment_id;?>
"  href="javascript:update_payment_status('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/payment/update_payment_status','<?php echo $_smarty_tpl->tpl_vars['orderList']->value->payment_id;?>
','1');" >
                            <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/tablelisting/reject.png" alt="Approve payment" title="Approve" height="16" width="16"/>
                            </a>
                            
                            <?php }else{ ?>
                            <a id="toggleStatus<?php echo $_smarty_tpl->tpl_vars['orderList']->value->payment_id;?>
"  href="javascript:void(0)" >
                            <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/tablelisting/approve_i.png" alt="Payment Approved" title="Payment Approved" height="16" width="16"/>
                            </a>
                            
                            <?php }?>
                -->
                                                    <!--  <a  href="javascript:view_order_details('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/payment/payment_detail/<?php echo $_smarty_tpl->tpl_vars['orderList']->value->payment_id;?>
/<?php echo $_smarty_tpl->tpl_vars['from_page']->value;?>
')">
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/tablelisting/view.png" width='18' height='18' alt='View' title="View" /
                                                    ></a>-->
                  </td>
                 
                  </tr>
                   <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?> 
                  <?php } ?>
                  <!--<tr>
                    <td valign="top" align="left" colspan="9" class="borderButtonTop">
                     <span class="btnlayout">
                     <input type="button" value="Update" class="button" name="btn_update" id="btn_update"  onclick="change_action('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');" />
                     <input type="hidden" name="paymentCount" id="paymentCount"  value="<?php echo $_smarty_tpl->tpl_vars['paymentCount']->value;?>
" />
                      </span>
                       <span class="select">
                                                         
                  </span>   
               
                      
                    </td>
               	</tr>-->
                
               </tbody>
               <?php }else{ ?>
                 <tr>
                 	<td colspan="9" align="center" style="color:red;">No Results Found</td>
                 </tr>
               
            <?php }?>
             </table><?php }} ?>