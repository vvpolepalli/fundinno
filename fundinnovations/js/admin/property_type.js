function sitePropertytypelist(baseurl) {
	
		var property_type_name = $('#hid_property_type_name').val();
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
			url:baseurl+"admin/Properties/searchCount",
			data:"property_type_name="+property_type_name,
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
			var property_type_name = $('#hid_property_type_name').val();
			var orderBy 	= $('#hid_orderBy').val();
			$.ajax({			
				type: "POST",
				url: baseurl+'admin/Properties/propertyTypes_list', 
				data:"property_type_name="+property_type_name+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
				$('#load_propertyTypes').html('');				 
				$('#load_propertyTypes').html(msg);			 				
			}				
			});	
	}  
	/*** End pageselectCallback ****/
}



function load_propertyTypes_list(baseurl,startp,limitp) {
	var property_type_name = $('#hid_property_type_name').val();
	var orderBy 	= $('#hid_orderBy').val();
	$.ajax({
	type: "POST",
	url: baseurl + "admin/Properties/propertyTypes_list/",
	data:"property_type_name="+property_type_name+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp,
	success: function (msg) {
		$('#load_propertyTypes').html('');
		$('#load_propertyTypes').html(msg);
	}
	});
}



//Function To Search property type
function search_propertyTypes(baseurl,orderBy)
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
		var property_type_name = $('#property_type_name').val();
		$('#hid_orderBy').val(orderBy);
		//alert(firstName);
		$('#hid_property_type_name').val(property_type_name);
		
		if(property_type_name=='') {
			$('#hid_search').val(0);
		} else {
			$('#hid_search').val(1);
		}
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/Properties/propertyTypes_list/",
		data: "property_type_name="+property_type_name+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp, 
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
		url:baseurl+"admin/Properties/searchCount",
		data:"property_type_name="+property_type_name+"&order_by="+orderBy,
		success:function(msg)
		{
			if(msg!=0) {
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
	
		/*** pageselectCallback ****/				
		function pageselectCallbackSearch(page_index, jq)
		{
				var page_ind = parseInt(page_index)*parseInt(limitp);
				
				var property_type_name = $('#hid_property_type_name').val();
				var orderBy 	= $('#hid_orderBy').val();
				
				$.ajax({			
				
				type: "POST",
				url: baseurl+'admin/Properties/propertyTypes_list', 
				data:"property_type_name="+property_type_name+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
					$('#load_propertyTypes').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
				

}

//Function To sort property type
function sort_propertyTypes(baseurl,orderBy)
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
		var property_type_name = $('#hid_property_type_name').val();
		$('#hid_orderBy').val(orderBy);
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/Properties/propertyTypes_list/",
		data: "property_type_name="+property_type_name+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp, 
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
		url:baseurl+"admin/Properties/searchCount",
		data:"property_type_name="+property_type_name+"&order_by="+orderBy,
		success:function(msg)
		{
			if(msg!=0) {
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
				
				var property_type_name = $('#hid_property_type_name').val();
				var orderBy 	= $('#hid_orderBy').val();
				
				$.ajax({			
				
				type: "POST",
				url: baseurl+'admin/Properties/propertyTypes_list', 
				data:"property_type_name="+property_type_name+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
					$('#load_propertyTypes').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
				

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
		
		
		  	var property_type_name = $('#hid_property_type_name').val();
			var urlType = $('#hid_usrType').val();
			var orderBy 	= $('#hid_orderBy').val();
				
		$.ajax({
					type: "POST",
					url: baseurl+ctrlfnt,  
					data: "startp="+startp+"&limitp="+limitp+"&property_type_name="+property_type_name+"&order_by="+orderBy, 
					success: function(msg){
						//alert(msg);
						if(msg)
						{  
						
							$('#load_propertyTypes').html('');
							$('#load_propertyTypes').html(msg);
							$.ajax({
							type:"POST",
							url:baseurl+"admin/Properties/searchCount",
							data:"url_type="+urlType,
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
								var property_type_name = $('#hid_property_type_name').val();
								var orderBy 	= $('#hid_orderBy').val();
								
								$.ajax({			
									type: "POST",
									url: baseurl + "admin/Properties/propertyTypes_list/",
									data: "property_type_name="+property_type_name+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp, 
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

function view_siteproperty_type(baseurl, ctrlfnt)	
{
	
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

