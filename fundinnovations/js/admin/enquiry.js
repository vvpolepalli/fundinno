function sitePropertytypelist(baseurl) {
	
		var first_name = $('#hid_first_name').val();
		var email = $('#hid_email ').val();
		var datetime = $('#hid_datetime').val();
		var urlType = $('#hid_usrType').val();
		var hidCurrP = $('#hid_currP').val();
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
		load_propertyTypes_list(baseurl,startp,limitp);						  		

		$.ajax({
			type:"POST",
			url:baseurl+"admin/Enquiry/searchCount",
			data:"first_name="+first_name+"&email="+email+"&datetime="+datetime,
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
					num_display_entries: 5,
					callback: pageselectCallbackUsers,
					items_per_page:10,
					current_page:hidCurrP-1
					});
				}
				
			}
				
		});
	/*** pageselectCallback ****/				
	function pageselectCallbackUsers(page_index, jq)
	{
			var page_ind = parseInt(page_index)*parseInt(limitp);
			var first_name = $('#hid_first_name').val();
			var email = $('#hid_email ').val();
			var datetime = $('#hid_datetime').val();
			var orderBy 	= $('#hid_orderBy').val();
			$.ajax({			
				type: "POST",
				url: baseurl+'admin/Enquiry/propertyTypes_list', 
				data:"first_name="+first_name+"&email="+email+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
				$('#load_propertyTypes').html('');				 
				$('#load_propertyTypes').html(msg);			 				
			}				
			});	
	}  
	/*** End pageselectCallback ****/
}



function load_propertyTypes_list(baseurl,startp,limitp) {
	var first_name = $('#hid_first_name').val();
	var email = $('#hid_email ').val();
	var datetime = $('#hid_datetime').val();
	var orderBy 	= $('#hid_orderBy').val();
	$.ajax({
	type: "POST",
	url: baseurl + "admin/Enquiry/propertyTypes_list/",
	data:"first_name="+first_name+"&email="+email+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp,
	success: function (msg) {
		$('#load_propertyTypes').html('');
		$('#load_propertyTypes').html(msg);
	}
	});
}



//Function To Search enquiry
function search_enquiry(baseurl,orderBy)
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
		if(isDate('datetime')) {
		var first_name = $('#first_name').val();
		var email = $('#email ').val();
		var datetime = $('#datetime').val();
		$('#hid_orderBy').val(orderBy);
		$('#hid_first_name').val(first_name);
		$('#hid_email').val(email);
		$('#hid_datetime').val(datetime);
		
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/Enquiry/propertyTypes_list/",
		data: "first_name="+first_name+"&email="+email+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				$('#load_propertyTypes').html('');
				$("#load_propertyTypes").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/Enquiry/searchCount",
		data:"first_name="+first_name+"&email="+email+"&datetime="+datetime+"&order_by="+orderBy,
		success:function(msg)
		{
			if(msg!=0) {
				$("#Pagination").css('display','block');
				// Create pagination element
				$("#Pagination").pagination(msg, {
				num_edge_entries: 2,
				num_display_entries: 5,
				callback: pageselectCallbackSearch,
				items_per_page:10
				});	
			}else {
					$("#Pagination").css('display','none');
			}
		}
		
		});
		}
	
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
				url: baseurl+'admin/Enquiry/propertyTypes_list', 
				data:"first_name="+first_name+"&email="+email+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
					$('#load_propertyTypes').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
				

}

//Function To sort enquiry
function sort_enquiry(baseurl,orderBy)
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
		var first_name = $('#hid_first_name').val();
		var email = $('#hid_email ').val();
		var datetime = $('#hid_datetime').val();
		$('#hid_orderBy').val(orderBy);
		
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/Enquiry/propertyTypes_list/",
		data: "first_name="+first_name+"&email="+email+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				$('#load_propertyTypes').html('');
				$("#load_propertyTypes").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/Enquiry/searchCount",
		data:"first_name="+first_name+"&email="+email+"&datetime="+datetime+"&order_by="+orderBy,
		success:function(msg)
		{
			if(msg!=0) {
				$("#Pagination").css('display','block');
				// Create pagination element
				$("#Pagination").pagination(msg, {
				num_edge_entries: 2,
				num_display_entries: 5,
				callback: pageselectCallbackSort,
				items_per_page:10
				});	
			}else {
					$("#Pagination").css('display','none');
			}
		}
		
		});
	
		/*** pageselectCallback ****/				
		function pageselectCallbackSort(page_index, jq)
		{
				var page_ind = parseInt(page_index)*parseInt(limitp);
				
				var first_name = $('#hid_first_name').val();
				var email = $('#hid_email ').val();
				var datetime = $('#hid_datetime').val();
				var orderBy 	= $('#hid_orderBy').val();
				
				$.ajax({			
				
				type: "POST",
				url: baseurl+'admin/Enquiry/propertyTypes_list', 
				data:"first_name="+first_name+"&email="+email+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
					$('#load_propertyTypes').html(msg);			 				
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

		///Change action
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
		
	
	   var property_typeemail=$('#emailId').val();
		
	
	
	var action=$('#action').val();
	var clists = $('input[name="ListStatusLinkCheckbox[]"]:checked').map(function(){return this.value;}).get();
	//alert(clists);
		//alert(citylist);
		if(clists=='')
			{
				alert("Select Action"); 
				return false;
			}
			else{
				$.ajax({
								type: "POST",
								url: baseurl+"admin/property_types/change_property_type_status", 
								data: "startp="+startp+"&limitp="+limitp+"&email_id="+property_typeemail+"&uid="+clists+"&action="+action,
								success: function(msg){
									if(msg)
									{ 
										load_propertyTypes_list(baseurl,startp,limitp);	
									}
								}
							   
							});
			}
			
			
}
// function to delete property_type
function delete_propertyType(baseurl, ctrlfnt)	
{
	
	 var current_page = $("[class='current']").html();
	 if(current_page !=null) {
		current_page = current_page; 
	 } else {
		current_page =1; 
	 }
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
		
		  	var first_name = $('#hid_first_name').val();
			var email = $('#hid_email ').val();
			var datetime = $('#hid_datetime').val();
			var urlType = $('#hid_usrType').val();
			var orderBy	= $('#hid_orderBy').val();
				
		$.ajax({
					type: "POST",
					url: baseurl+ctrlfnt,  
					data: "first_name="+first_name+"&email="+email+"&datetime="+datetime+"&startp="+startp+"&limitp="+limitp+"&order_by="+orderBy, 
					success: function(msg){
						//alert(msg);
						if(msg)
						{  
						
							$('#load_propertyTypes').html('');
							$('#load_propertyTypes').html(msg);
							$.ajax({
							type:"POST",
							url:baseurl+"admin/Enquiry/searchCount",
							data:"url_type="+urlType+"&first_name="+first_name+"&email="+email+"&datetime="+datetime,
							success:function(msg)
							{
								//alert(msg);
								if(msg !=0) { 
									var current_page = $("[class='current']").html();
									// Create pagination element
									$("#Pagination").pagination(msg, {
									num_edge_entries: 2,
									num_display_entries: 5,
									callback: pageselectCallbackUsers,
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
						function pageselectCallbackUsers(page_index, jq)
						{
								var page_ind = parseInt(page_index)*parseInt(limitp);
								var first_name = $('#hid_first_name').val();
								var email = $('#hid_email ').val();
								var datetime = $('#hid_datetime').val();
								var orderBy 	= $('#hid_orderBy').val();
								
								$.ajax({			
									type: "POST",
									url: baseurl + "admin/Enquiry/propertyTypes_list/",
									data:"first_name="+first_name+"&email="+email+"&datetime="+datetime+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp, 
									success: function(msg){	
									$('#load_propertyTypes').html('');				 
									$('#load_propertyTypes').html(msg);		
									 				
								}				
								});	
						}  
						/*** End pageselectCallback ****/
						
						}
					}
					
				});
  }
  
function view_propertyType(baseurl, ctrlfnt)	
{
	 var current_page = $("[class='current']").html();
		
		$.ajax({			
				type: "POST",
				url: baseurl+ctrlfnt,  
				data: "currP=" + current_page, 
				success: function(msg){	
				$('#manage_propertyTypes').html('');				 
				$('#manage_propertyTypes').html(msg);	
					 				
			}				
			});	
	
		
}

function view_siteproperty_type(baseurl,ctrlfnt)	
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
				$('#search_property_types').css('display','none');
				$('#Pagination').css('display','none');
				$('#load_propertyTypes').html('');				 
				$('#load_propertyTypes').html(msg);	
					 				
			}				
			});	
		
}

function view_to_manageproperty_types(baseurl, fromPage, currp, order){
	
	
	$('#manage_head').css('display','block');
	$('#search_property_types').css('display','block');
	$('#Pagination').css('display','block');
	$('#hid_currP').val(currp);
	$('#hid_usrType').val(fromPage);
	$('#hid_orderBy').val(order);
	sitePropertytypelist(baseurl);
	//setTimeout(window.location.href=baseurl+'admin/property_types/manage_siteproperty_types/'+fromPage+'/'+currp,6000);
	
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