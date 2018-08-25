<?php /* Smarty version Smarty-3.1.8, created on 2013-04-02 22:34:34
         compiled from "/home/fundinno/public_html/application/views/admin/projects/refund_cash_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:259026173515bb15a7661f2-56781040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '211bb727383784fe25d8f7502a01b01b81690463' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/projects/refund_cash_list.tpl',
      1 => 1358162327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '259026173515bb15a7661f2-56781040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'hidcurrP' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bb15a7dd912_07599277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bb15a7dd912_07599277')) {function content_515bb15a7dd912_07599277($_smarty_tpl) {?>
 
<script type="text/javascript">
$(document).ready(function(){
	  var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	refund_cash_list(baseurl);
	  
	  
});
function refund_cash_list(baseurl, currP) {
		
			
		if(currP) {
			var hidCurrP 	=currP;
		} else {
			var hidCurrP 	= $('#hid_currP').val();
		}
		var limitp=10;
		if(hidCurrP) {
			var startp;
			
			if(hidCurrP==1)
			{
				startp=0;
			}
			else
			{
				startp = (hidCurrP-1)*limitp;
			}
			
		} else {
			var startp=0;
		}
		load_refund_cash_list(baseurl,startp,limitp);						  		

		$.ajax({
			type:"POST",
			url:baseurl+"admin/project/refund_cash_list_count",
			//data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status,
			success:function(msg)
			{
				if(msg !=0) {
					if(hidCurrP) { 
						hidCurrP = hidCurrP; 
					} else {
						hidCurrP =1;	
					}
					// Create pagination element
					$("#Pagination").pagination(msg, {
					num_edge_entries: 2,
					num_display_entries: 3,
					callback: pageselectCallbackProjects,
					items_per_page:10,
					current_page:hidCurrP-1
					});
				}
				 else {
					$("#Pagination").css('display','none');
				}
				
			}
				
		});
	/*** pageselectCallback ****/				
	function pageselectCallbackProjects(page_index, jq)
	{
			var page_ind = parseInt(page_index)*parseInt(limitp);
			
			
		
			var orderBy 	= $('#hid_orderBy').val();
			
			$.ajax({			
				type: "POST",
				url: baseurl+'admin/project/refund_cash_list', 
				data:"order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
				$('#load_refund_cash').empty();				 
				$('#load_refund_cash').html(msg);			 				
			}				
			});	
	}  
	/*** End pageselectCallback ****/
}
function load_refund_cash_list(baseurl,startp,limitp) {
	
	var orderBy = $('#hid_orderBy').val();
	
	$.ajax({
	type: "POST",
	url: baseurl + "admin/project/refund_cash_list",
	data:"order_by="+orderBy+"&startp="+startp+"&limitp="+limitp,
	success: function (msg) {
		$('#load_refund_cash').empty();
		$('#load_refund_cash').html(msg);
	}
	});
}
function change_action(baseurl) 
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
		
	
	
	var action=$('#action').val();
	var clists = $('input[name="ListStatusLinkCheckbox[]"]:checked').map(function(){return this.value;}).get();

		if(clists=='')
		  {
			  alert("Please select at least one check box"); 
			  return false;
		  }
			else{
				$.ajax({
								type: "POST",
								url: baseurl+"admin/project/change_status_fund", 
								data: "startp="+startp+"&limitp="+limitp+"&pid="+clists+"&action="+action,
								success: function(msg){
									if(msg)
									{ 
										//load_siteusers_list(baseurl,startp,limitp);
										refund_cash_list(baseurl, current_page);	
									}
								}
							   
							});
			}
}
function sort_project(baseurl,orderBy)
{
	if(orderBy) 
	{	
		orderBy = orderBy;
	}
	else {
		orderBy = '';	
	}

		var startp=0;
	    var limitp=10;
		
	
			
			
		$('#hid_orderBy').val(orderBy);
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/project/refund_cash_list",
		data:"order_by="+orderBy+"&startp="+startp+"&limitp="+limitp,
		success: function(msg){
			if(msg)
			{
				$('#load_refund_cash').empty();
				$("#load_refund_cash").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/project/refund_cash_list_count",
		//data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status,
		//data:"email_id="+useremail+"&profileName="+profileName+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on,
		success:function(msg)
		{
			if(msg!=0) {
				// Create pagination element
				$("#Pagination").pagination(msg, {
				num_edge_entries: 2,
				num_display_entries: 3,
				callback: pageselectCallbackSort,
				items_per_page:10
				});	
			}
			else {
				$("#Pagination").css('display','none');
			}
		}
		
		});
	
		/*** pageselectCallback ****/				
		function pageselectCallbackSort(page_index, jq)
		{
				var page_ind = parseInt(page_index)*parseInt(limitp);
				
				
			
				var orderBy 	= $('#hid_orderBy').val();
			
			
				$.ajax({			
				
				type: "POST",
				url: baseurl + "admin/project/refund_cash_list",
				data:"order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
					$('#load_refund_cash').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
				

}
</script>
<div class="shadow_outer" id="manage_siteusers">
  <div class="shadow_inner" >
    <h2 style="margin-left:5px;" id="manage_head">Manage Refund cash</h2>
   
    <div class="table_listing font_segoe" id="load_refund_cash"> </div>
  </div>
  <!--End:Border 3-->
  <div id="Pagination" style="width:100%;float:left;top:2px;"></div>
</div>

<input type="hidden" name="hid_currP" id="hid_currP" value="<?php echo $_smarty_tpl->tpl_vars['hidcurrP']->value;?>
" />
<input type="hidden" name="hid_orderBy" id="hid_orderBy" value="" /><?php }} ?>