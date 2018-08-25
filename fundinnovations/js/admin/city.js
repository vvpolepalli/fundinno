function city_list(baseurl, currP) {
		var city_name	= $("#hid_city_name").val();
		var country	= $("#hid_country").val();
		var state 	= $('#hid_state').val();
		//var fund_goal 	= $('#hid_fund_goal').val();
	//	var status 	    = $('#hid_status').val();
		 
			
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
		load_city_list(baseurl,startp,limitp);						  		

		$.ajax({
			type:"POST",
			url:baseurl+"admin/city/searchCount",
			data:"city_name="+city_name+"&country="+country+"&state="+state,
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
			
			
			var city_name	= $("#hid_city_name").val();
			var country		= $("#hid_country").val();
			var state 		= $('#hid_state').val();
			var orderBy 	= $('#hid_orderBy').val();
			
			$.ajax({			
				type: "POST",
				url: baseurl+'admin/city/city_list', 
				data:"city_name="+city_name+"&country="+country+"&state="+state+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
				$('#load_city').empty();				 
				$('#load_city').html(msg);			 				
			}				
			});	
	}  
	/*** End pageselectCallback ****/
}

function load_city_list(baseurl,startp,limitp) {
	
	var city_name	= $("#hid_city_name").val();
	var country		= $("#hid_country").val();
	var state 		= $('#hid_state').val();
	var orderBy 	= $('#hid_orderBy').val();
	
	$.ajax({
	type: "POST",
	url: baseurl+'admin/city/city_list', 
	data:"city_name="+city_name+"&country="+country+"&state="+state+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp,
	success: function (msg) {
		$('#load_city').empty();
		$('#load_city').html(msg);
	}
	});
}

function search_city(baseurl,orderBy)
{
	if(orderBy) 
	{	
		orderBy = orderBy;
	}
	else {
		orderBy = '';	
	}
	
	//alert(orderBy);
	//if(validateEmail() && isDate('start_on') && isDate('end_on'))
  //  {
		var startp=0;
	    var limitp=10;
		
		var city_name	= $.trim($("#city_name").val());
		var country		= $("#country").val();
		var state 		= $('#state').val();
	
		//alert(profileName);
		$('#hid_orderBy').val(orderBy);
		$('#hid_city_name').val(city_name);
		$('#hid_country').val(country);
		$('#hid_state').val(state);
		
		if(city_name == '' && country=='' && state =='') {
			$('#hid_search').val(0);
		} else {
			$('#hid_search').val(1);
		}
		
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl+'admin/city/city_list', 
		data: "city_name="+city_name+"&country="+country+"&state="+state+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				
				$('#load_city').empty();
				$("#load_city").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/city/searchCount",
		data:"city_name="+city_name+"&country="+country+"&state="+state,
		success:function(msg)
		{
			if(msg!=0) {
				$("#Pagination").css('display','block');
				// Create pagination element
				$("#Pagination").pagination(msg, {
				num_edge_entries: 2,
				num_display_entries: 3,
				callback: pageselectCallbackSearch,
				items_per_page:10
				});	
			}
			else {
				$("#Pagination").css('display','none');
			}
		}
		
		});
	//}
		
	/*** pageselectCallback ****/				
		function pageselectCallbackSearch(page_index, jq)
		{
				var page_ind = parseInt(page_index)*parseInt(limitp);
				
				var city_name	= $("#hid_city_name").val();
				var country		= $("#hid_country").val();
				var state 		= $('#hid_state').val();
				var orderBy 	= $('#hid_orderBy').val();
					//alert(state);			
				$.ajax({	
				type: "POST",
				url: baseurl+'admin/city/city_list', 
				data: "city_name="+city_name+"&country="+country+"&state="+state+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
					$('#load_city').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/			

}
function sort_city(baseurl,orderBy)
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
		
		var city_name	= $("#hid_city_name").val();
		var country		= $("#hid_country").val();
		var state 		= $('#hid_state').val();
			
			
		$('#hid_orderBy').val(orderBy);
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl+'admin/city/city_list', 
		data: "city_name="+city_name+"&country="+country+"&state="+state+"&order_by="+orderBy+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				$('#load_city').empty();
				$("#load_city").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/city/searchCount",
		data:"city_name="+city_name+"&country="+country+"&state="+state,
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
				
				var city_name	= $("#hid_city_name").val();
				var country		= $("#hid_country").val();
				var state 		= $('#hid_state').val();
		
				var orderBy 	= $('#hid_orderBy').val();
			
			
				$.ajax({			
				
				type: "POST",
				url: baseurl+'admin/city/city_list',  
				data:"city_name="+city_name+"&country="+country+"&state="+state+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
					$('#load_city').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
				

}

function delete_city(baseurl, ctrlfnt)	
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
		
			var city_name	= $("#hid_city_name").val();
			var country		= $("#hid_country").val();
			var state 		= $('#hid_state').val();
		
			var orderBy 	= $('#hid_orderBy').val();
		
			
			
		$.ajax({
					type: "POST",
					url: baseurl+ctrlfnt,  
					data: "startp="+startp+"&limitp="+limitp+"&city_name="+city_name+"&country="+country+"&state="+state+"&order_by="+orderBy,  
					success: function(msg){
						//alert(msg);
						if(msg)
						{  
						
							$('#load_city').empty();
							$('#load_city').html(msg);
							$.ajax({
							type:"POST",
							url:baseurl+"admin/city/searchCount",
							data:"city_name="+city_name+"&country="+country+"&state="+state,
							success:function(msg)
							{
								//alert(msg);
								if(msg !=0) { 
									var current_page = $("[class='current']").html();
									// Create pagination element
									$("#Pagination").pagination(msg, {
									num_edge_entries: 2,
									num_display_entries: 3,
									callback: pageselectCallbackCity,
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
						function pageselectCallbackCity(page_index, jq)
						{
								var page_ind = parseInt(page_index)*parseInt(limitp);
								
								var city_name	= $("#hid_city_name").val();
								var country		= $("#hid_country").val();
								var state 		= $('#hid_state').val();
		
								
								$.ajax({			
									type: "POST",
									url: baseurl+'admin/city/city_list',  
									data:"city_name="+city_name+"&country="+country+"&state="+state+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
									success: function(msg){	
									$('#load_city').empty();				 
									$('#load_city').html(msg);		
									 				
								}				
								});	
						}  
						/*** End pageselectCallback ****/
						
						}
					}
					
				});
  }
