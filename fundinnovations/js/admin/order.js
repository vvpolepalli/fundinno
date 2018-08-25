function initial_load_order(baseurl,currP) 
{
	
		var project_title = $('#hid_project_title').val();
		var order_id = $('#hid_order_id').val();
		var backed_profile_name = $('#hid_backed_profile_name').val();
		var proj_status = $('#hid_proj_status').val();
		var pledge_amount = $('#hid_pledge_amount').val();
	//	var hidCurrP = $('#hid_currP').val();
		var order_status	=	$('#hid_order_status').val();
		var orderBy = 	$('#hid_orderBy').val();
		
		//var paymentperiod=$('#hid_paymentperiod').val();
		//var paymethod=$("#hid_paymethod").val();
		var limitp=10;
		if(currP) {
			var hidCurrP 	=currP;
		} else {
			var hidCurrP 	= $('#hid_currP').val();
		}
		if(hidCurrP) 
		{
				var startp;
				if(hidCurrP==1)
				{
				startp=0;
				}
				else
				{
				startp = (hidCurrP-1)*limitp;
				}
				
		} 
		else 
		{
				var startp=0;
		}
		
		load_all_payment(baseurl,startp,limitp);						  		

		$.ajax({
			type:"POST",
			url:baseurl+"admin/payment/orderCount",
			data:"order_id="+order_id+"&project_title="+project_title+"&order_by="+orderBy+"&backed_profile_name="+backed_profile_name+"&proj_status="+proj_status+"&order_status="+order_status+"&pledge_amount="+pledge_amount,
			success:function(msg)
			{
				
				if(msg !=0) 
				{
					if(hidCurrP) 
					{ 
						hidCurrP = hidCurrP; 
					} else 
					{
						hidCurrP =1;	
					}
					// Create pagination element
					$("#Pagination").show();
					$("#Pagination").pagination(msg, {
					num_edge_entries: 2,
					num_display_entries: 5,
					callback: pageselectCallbackUsers,
					items_per_page:10,
					current_page:hidCurrP-1
					});
				}
				else
				{
					$("#Pagination").hide();
				}
				
			}
				
		});
	/*** pageselectCallback ****/				
	function pageselectCallbackUsers(page_index, jq)
	{
		
			var page_ind = parseInt(page_index)*parseInt(limitp);
			/*var trans_id = 	$('#hid_trans_id').val();
			var order_id = 	$('#hid_order_id').val();
			var datetime = 	$('#hid_datetime').val();
			var datetimeto = $('#hid_datetimeto').val();
			var orderBy = 	$('#hid_orderBy').val();
			var status	=	$('#hid_status').val();
			var paymethod=$("#hid_paymethod").val();
			var paymentperiod=$('#hid_paymentperiod').val();*/
			var project_title = $('#hid_project_title').val();
			var order_id = $('#hid_order_id').val();
			var backed_profile_name = $('#hid_backed_profile_name').val();
			var proj_status = $('#hid_proj_status').val();
			var pledge_amount = $('#hid_pledge_amount').val();
			var hidCurrP = $('#hid_currP').val();
			
			var order_status	=	$('#hid_order_status').val();
			var orderBy = 	$('#hid_orderBy').val();
			$.ajax({
			type: "POST",
			url: baseurl + "admin/payment/load_all_payment/",
			data:"order_id="+order_id+"&project_title="+project_title+"&order_by="+orderBy+"&backed_profile_name="+backed_profile_name+"&proj_status="+proj_status+"&order_status="+order_status+"&pledge_amount="+pledge_amount+"&startp="+page_ind+"&limitp="+limitp,
			success: function (msg) {
			$('#load_orders').empty();
			$('#load_orders').html(msg);
			}
			});	
	}  
	/*** End pageselectCallback ****/
}



function load_all_payment(baseurl,startp,limitp) {
	/*var trans_id = $('#hid_trans_id').val();
	var order_id = $('#hid_order_id').val();
	var datetime = $('#hid_datetime').val();
	var datetimeto = $('#hid_datetimeto').val();
	var paymethod=$("#hid_paymethod").val();
	var status=		$('#paystatus').val();
	var pledge_amount = $('#hid_pledge_amount').val();
	var paymentperiod=$('#hid_paymentperiod').val();
	var orderBy 	= $('#hid_orderBy').val();*/
	var project_title = $('#hid_project_title').val();
	var order_id = $('#hid_order_id').val();
	var backed_profile_name = $('#hid_backed_profile_name').val();
	var proj_status = $('#hid_proj_status').val();
	var pledge_amount = $('#hid_pledge_amount').val();
	var hidCurrP = $('#hid_currP').val();
	var order_status	=	$('#hid_order_status').val();
	var orderBy = 	$('#hid_orderBy').val();
			
	$.ajax({
	type: "POST",
	url: baseurl + "admin/payment/load_all_payment/",
	data:"order_id="+order_id+"&project_title="+project_title+"&order_by="+orderBy+"&pledge_amount="+pledge_amount+"&backed_profile_name="+backed_profile_name+"&proj_status="+proj_status+"&order_status="+order_status+"&startp="+startp+"&limitp="+limitp,
	success: function (msg) {
		$('#load_orders').empty();
		$('#load_orders').html(msg);
	}
	});
}



//Function To Search enquiry
function search_order(baseurl,orderBy)
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
		//var trans_id = $('#trans_id').val();
		var order_id = $('#order_id').val();
		var project_title = $('#project_title').val();
		var backed_profile_name = $('#backed_profile_name').val();
		var proj_status=$("#proj_status").val();
		var order_status=		$('#order_status').val();
		var orderBy 	= $('#hid_orderBy').val();
		var hidCurrP = $('#hid_currP').val();
		var pledge_amount = $('#pledge_amount').val();
			$('#hid_orderBy').val(orderBy);
			$('#hid_project_title').val(project_title);
			$('#hid_order_id').val(order_id);
			$('#hid_backed_profile_name').val(backed_profile_name);
			$('#hid_proj_status').val(proj_status);
			$('#hid_order_status').val(order_status);
			$('#hid_pledge_amount').val(pledge_amount);
			
			$.ajax({
			type: "POST",
			url: baseurl + "admin/payment/load_all_payment/",
			data:"order_id="+order_id+"&project_title="+project_title+"&order_by="+orderBy+"&pledge_amount="+pledge_amount+"&backed_profile_name="+backed_profile_name+"&proj_status="+proj_status+"&order_status="+order_status+"&startp="+startp+"&limitp="+limitp,
			success: function(msg){
				if(msg)
				{
					$('#load_orders').empty();
					$('#load_orders').html(msg);
				}
			}
			
			});
			$.ajax({
				type:"POST",
				url:baseurl+"admin/payment/orderCount",
				data:"order_id="+order_id+"&project_title="+project_title+"&order_by="+orderBy+"&pledge_amount="+pledge_amount+"&backed_profile_name="+backed_profile_name+"&proj_status="+proj_status+"&order_status="+order_status,
				success:function(msg)
				{
					
					if(msg !=0)
					 {
						if(hidCurrP) { 
							hidCurrP = hidCurrP; 
						} else {
							hidCurrP =1;	
						}
						// Create pagination element
						$("#Pagination").show();
						$("#Pagination").pagination(msg, {
						num_edge_entries: 2,
						num_display_entries: 5,
						callback: pageselectCallbackSearch,
						items_per_page:10,
						current_page:hidCurrP-1
						});
					}
					else
					{
						$("#Pagination").hide();
					}
					
				}
			
			});
		
		
		/*** pageselectCallback ****/				
	function pageselectCallbackSearch(page_index, jq)
	{
			var page_ind = parseInt(page_index)*parseInt(limitp);
			/*var trans_id = 	$('#hid_trans_id').val();
			var order_id = 	$('#hid_order_id').val();
			var datetime = 	$('#hid_datetime').val();
			var datetimeto = $('#hid_datetimeto').val();
			var paymethod=$("#hid_paymethod").val();
			var orderBy = 	$('#hid_orderBy').val();
			var status	=	$('#hid_status').val();
			var paymentperiod=$('#hid_paymentperiod').val();*/
			var project_title = $('#hid_project_title').val();
			var order_id = $('#hid_order_id').val();
			var backed_profile_name = $('#hid_backed_profile_name').val();
			var proj_status = $('#hid_proj_status').val();
			var pledge_amount = $('#hid_pledge_amount').val();
			var hidCurrP = $('#hid_currP').val();
			var order_status	=	$('#hid_order_status').val();
			var orderBy = 	$('#hid_orderBy').val();
			$.ajax({
			type: "POST",
			url: baseurl + "admin/payment/load_all_payment/",
			data:"order_id="+order_id+"&project_title="+project_title+"&order_by="+orderBy+"&pledge_amount="+pledge_amount+"&backed_profile_name="+backed_profile_name+"&order_status="+order_status+"&proj_status="+proj_status+"&startp="+page_ind+"&limitp="+limitp,
			success: function (msg) 
			{
			$('#load_orders').empty();
			$('#load_orders').html(msg);
			}
			});	
	}  
	/*** End pageselectCallback ****/

}

//Function To sort enquiry
function sort_order(baseurl,orderBy)
{
	
	
	if(orderBy) 
	{	
		orderBy = orderBy;
	}
	else {
		orderBy = '';	
	}
	//alert(orderBy);
	
		var startp=0;
	    var limitp=10;
		/*var trans_id = 	$('#hid_trans_id').val();
		var order_id = 	$('#hid_order_id').val();
		var datetime = 	$('#hid_datetime').val();
		var datetimeto = $('#hid_datetimeto').val();
		var paymentperiod=$('#hid_paymentperiod').val();
		var paymethod=$("#hid_paymethod").val();
		var status	=	$('#hid_status').val();
		var hidCurrP = $('#hid_currP').val();*/
		$('#hid_orderBy').val(orderBy);
		var project_title = $('#hid_project_title').val();
		var order_id = $('#hid_order_id').val();
		var backed_profile_name = $('#hid_backed_profile_name').val();
		var proj_status = $('#hid_proj_status').val();
		var pledge_amount = $('#hid_pledge_amount').val();
		var hidCurrP = $('#hid_currP').val();
		var order_status	=	$('#hid_order_status').val();
	
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/payment/load_all_payment/",
		data:"order_id="+order_id+"&project_title="+project_title+"&order_by="+orderBy+"&pledge_amount="+pledge_amount+"&backed_profile_name="+backed_profile_name+"&proj_status="+proj_status+"&order_status="+order_status+"&startp="+startp+"&limitp="+limitp,
		success: function(msg){
			if(msg)
			{
				
				$('#load_orders').empty();
				$('#load_orders').html(msg);
			}
		}
		
		});
		$.ajax({
			type:"POST",
			url:baseurl+"admin/payment/orderCount",
			data:"order_id="+order_id+"&project_title="+project_title+"&order_by="+orderBy+"&pledge_amount="+pledge_amount+"&backed_profile_name="+backed_profile_name+"&proj_status="+proj_status+"&order_status="+order_status,
			success:function(msg)
			{
				if(msg !=0) {
					if(hidCurrP) { 
						hidCurrP = hidCurrP; 
					} else {
						hidCurrP =1;	
					}
					// Create pagination element
					$("#Pagination").show();
					$("#Pagination").pagination(msg, {
					num_edge_entries: 2,
					num_display_entries: 5,
					callback: pageselectCallbackSearch,
					items_per_page:10,
					current_page:hidCurrP-1
					});
				}
				
			}
		
		});
	
		/*** pageselectCallback ****/				
	function pageselectCallbackSearch(page_index, jq)
	{
			var page_ind = parseInt(page_index)*parseInt(limitp);
			var project_title = $('#hid_project_title').val();
			var order_id = $('#hid_order_id').val();
			var backed_profile_name = $('#hid_backed_profile_name').val();
			//var proj_status = $('#hid_proj_status').val();
			var pledge_amount = $('#hid_pledge_amount').val();
			var hidCurrP = $('#hid_currP').val();
			var order_status	=	$('#hid_order_status').val();
			var orderBy = 	$('#hid_orderBy').val();
			$.ajax({
			type: "POST",
			url: baseurl + "admin/payment/load_all_payment/",
			data:"order_id="+order_id+"&project_title="+project_title+"&order_by="+orderBy+"&pledge_amount="+pledge_amount+"&backed_profile_name="+backed_profile_name+"&order_status="+order_status+"&proj_status="+proj_status+"&startp="+page_ind+"&limitp="+limitp,
			success: function (msg) 
			{
			$('#load_orders').empty();
			$('#load_orders').html(msg);
			}
			});	
	}  
	/*** End pageselectCallback ****/
				

}

//for search site property_types only
function validateEmail()
{
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	$("#email_error").hide();	
	if(!emailReg.test($("#emailId").val())) 
	{
	
		$("#emailId").after('<div class="clear"/><span class="error" id="email_error" style="bottom:9px; left:0px; position:relative;"><span>Enter valid Email Id</span></span>');
		return false;
	}
	
	else
	{
		$("#emailId").after('<div class="clear"/><span class="checked" id="email_error"><span></span></span>');
		return true;
	}
}

	


function view_order_details(baseurl,ctrlfnt)	
{
	  //alert(ctrlfnt);
	 var current_page = $("[class='current']").html();
	 var orderBy 	= $('#hid_orderBy').val();
		$.ajax({			
				type: "POST",
				url: baseurl+ctrlfnt,  
				data: "currP=" + current_page + "&order_by="+orderBy, 
				success: function(msg){	
				//$('#manage_siteproperty_types').html('');
				$('#manage_head').css('display','none');
				$('#search_payment_details').css('display','none');
				$('#Pagination').css('display','none');
				$('#load_orders').html('');				 
				$('#load_orders').html(msg);	
					 				
			}				
			});	
		
}

function view_to_all_payments(baseurl, fromPage, currp, order){
	
	$('#manage_head').css('display','block');
	$('#search_payment_details').css('display','block');
	$('#Pagination').css('display','block');
	$('#hid_currP').val(currp);
	$('#hid_usrType').val(fromPage);
	$('#hid_orderBy').val(order);

	initial_load_order(baseurl);
	//setTimeout(window.location.href=baseurl+'admin/property_types/manage_siteproperty_types/'+fromPage+'/'+currp,6000);
	
}



function update_payment_status(baseurl,ctrlfnt,payment_id,status)
{
		
			var setStatus=0;
			if(status==1)
			setStatus=0;
			else
			setStatus=1;
		
			$.ajax({
			type:"POST",
			url:baseurl+ctrlfnt,
			data: "payment_id=" + payment_id+'&status='+status, 
			success: function(msg){	
				
				
				if(status==1)
				{
				$("#paymentstaus"+payment_id).html("<strong>Completed</strong>");
				$("#toggleStatus"+payment_id).html('<img src='+baseurl+'/images/admin/tablelisting/approve_i.png alt="Payment Approved" title="Payment Approved" height="16" width="16"/>')
				$("#toggleStatus"+payment_id).attr('href',"javascript:void(0);")
				/*$("#toggleStatus"+payment_id).attr('href',"javascript:update_payment_status('"+baseurl+"','"+ctrlfnt+"','"+payment_id+"','"+setStatus+"')")*/
				}
				else
				{
				$("#paymentstaus"+payment_id).html("Pending");
				$("#toggleStatus"+payment_id).html('<img src='+baseurl+'/images/admin/tablelisting/reject.png alt="Approve Payment" title="Approve" height="16" width="16"/>')
				$("#toggleStatus"+payment_id).attr('href',"javascript:update_payment_status('"+baseurl+"','"+ctrlfnt+"','"+payment_id+"','"+setStatus+"')")	
				}
				
				
					 				
			}				
		});
		
	
}


function view_siteuser(baseurl, ctrlfnt)	
{
		var tracebackTo="payment";
	    var current_page = $("[class='current']").html();
		var orderBy 	= $('#hid_orderBy').val();
		$.ajax({			
				type: "POST",
				url: baseurl+ctrlfnt,  
				data: "currP=" + current_page + "&order_by="+orderBy+"&traceback="+tracebackTo, 
				success: function(msg){	
				//$('#manage_siteusers').html('');
				$('#manage_head').css('display','none');
				$('#search_payment_details').css('display','none');
				$('#Pagination').css('display','none');
				$('#load_orders').html('');				 
				$('#load_orders').html(msg);
					 				
			}				
			});	
		
}


function view_cheque_details(baseurl, ctrlfnt)	
{
		var tracebackTo="payment";
	    var current_page = $("[class='current']").html();
		var orderBy 	= $('#hid_orderBy').val();
		$.ajax({			
				type: "POST",
				url: baseurl+ctrlfnt,  
				data: "currP=" + current_page + "&order_by="+orderBy+"&traceback="+tracebackTo, 
				success: function(msg){	
				//$('#manage_siteusers').html('');
				$('#manage_head').css('display','none');
				$('#search_payment_details').css('display','none');
				$('#Pagination').css('display','none');
				$('#load_orders').html('');				 
				$('#load_orders').html(msg);
					 				
			}				
			});	
		
}

function isDate(dateTimeVal)
{
  $("#"+dateTimeVal+"_error").remove();
  var currVal =  $('#'+dateTimeVal).val();
  //var currVal =  txtDate;
  if(currVal != '') {
	  
	  //Declare Regex  
	  var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; 
	  var dtArray = currVal.match(rxDatePattern); // is format OK?
	  if (dtArray == null) {
	  	$("#"+dateTimeVal).after('<span class="error" id="'+dateTimeVal+'_error"><span>Invalid Date</span></span>');
    	 return false;
	  }

	  //Checks for dd/mm/yyyy format.
		dtDay = dtArray[1];
		dtMonth= dtArray[3];
		dtYear = dtArray[5];
	
	  if (dtMonth < 1 || dtMonth > 12) {
		  $("#"+dateTimeVal).after('<span class="error" id="'+dateTimeVal+'_error" ><span>Invalid Date</span></span>');
		  return false;
	  }
	  else if (dtDay < 1 || dtDay> 31) {
		  $("#"+dateTimeVal).after('<span class="error" id="'+dateTimeVal+'_error" ><span>Invalid Date</span></span>');
		  return false;
	  }
	  else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) {
		  $("#"+dateTimeVal).after('<span class="error" id="'+dateTimeVal+'_error" ><span>Invalid Date</span></span>');
		  return false;
	  }
	  else if (dtMonth == 2)
	  {
		 var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
		 if (dtDay> 29 || (dtDay ==29 && !isleap)) {
			 $("#"+dateTimeVal).after('<span class="error" id="'+dateTimeVal+'_error" ><span>Invalid Date</span></span>');
			  return false;
		 }
	  }
	  $("#"+dateTimeVal+"_error").remove();
 	 return true;
  } else {
	  return true;
  }
}