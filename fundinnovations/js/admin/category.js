function categorylist(baseurl, currP) {
		var category	= $("#hid_category").val();
		
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
		load_category_list(baseurl,startp,limitp);						  		

		$.ajax({
			type:"POST",
			url:baseurl+"admin/category/searchCount",
			data:"category="+category,
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
					callback: pageselectCallbackCategory,
					items_per_page:10,
					current_page:hidCurrP-1
					});
				}
				 else {
					$("#Pagination").css('display','none');
				}
				
			}
				
		});
	function pageselectCallbackCategory(page_index, jq)
	{
			var page_ind = parseInt(page_index)*parseInt(10);
			var category	= $("#hid_category").val();
				
			$.ajax({			
				type: "POST",
				url: baseurl+'admin/category/category_list', 
				data:"category="+category+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
				$('#load_categorylist').empty();				 
				$('#load_categorylist').html(msg);			 				
			}				
			});	
	}  
	
}

/*** pageselectCallback ****/				
	
	/*** End pageselectCallback ****/

function load_category_list(baseurl,startp,limitp) {
	
	var category	= $("#hid_category").val();
	
	$.ajax({
	type: "POST",
	url: baseurl + "admin/category/category_list",
	data:"category="+category+"&startp="+startp+"&limitp="+limitp,
	success: function (msg) {
		$('#load_categorylist').empty();
		$('#load_categorylist').html(msg);
	}
	});
}

function delete_category(baseurl, ctrlfnt)	
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
		
			var category	= $("#hid_category").val();
			var orderBy 	= $('#hid_orderBy').val();
			
			
			
		$.ajax({
					type: "POST",
					url: baseurl+ctrlfnt,  
					data: "startp="+startp+"&limitp="+limitp+"&category="+category,  
					success: function(msg){
						//alert(msg);
						if(msg)
						{  
						
							$('#load_categorylist').empty('');
							$('#load_categorylist').html(msg);
							$.ajax({
							type:"POST",
							url:baseurl+"admin/category/searchCount",
							data:"category="+category, 
							success:function(msg)
							{
								//alert(msg);
								if(msg !=0) { 
									var current_page = $("[class='current']").html();
									// Create pagination element
									$("#Pagination").pagination(msg, {
									num_edge_entries: 2,
									num_display_entries: 3,
									callback: pageselectCallbackCategory,
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
				
	function pageselectCallbackCategory(page_index, jq)
	{
			var page_ind = parseInt(page_index)*parseInt(10);
			var category	= $("#hid_category").val();
				
			$.ajax({			
				type: "POST",
				url: baseurl+'admin/category/category_list', 
				data:"category="+category+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
				$('#load_categorylist').empty();				 
				$('#load_categorylist').html(msg);			 				
			}				
			});	
	} 
  }
  
  
function sort_category(baseurl,orderBy)
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
		
		var category	= $("#hid_category").val();
		//var orderBy 	= $('#hid_orderBy').val();
		
		$('#hid_orderBy').val(orderBy);
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/category/category_list",
		data: "category="+category+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				$('#load_categorylist').empty('');
				$("#load_categorylist").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/category/searchCount",
		data:"category="+category,
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
	}
	
	/*** pageselectCallback ****/				
	function pageselectCallbackSort(page_index, jq)
	{
			var page_ind = parseInt(page_index)*parseInt(limitp);
			
			var useremail	= $("#hid_category").val();
			
			//var urlType 	= $('#hid_usrType').val();
			var orderBy 	= $('#hid_orderBy').val();
					
			$.ajax({			
			
			type: "POST",
			url: baseurl+'admin/category/category_list', 
			data:"category="+category+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
			success: function(msg){	
				$('#load_categorylist').html(msg);			 				
			}				
			});	
	}  
		/*** End pageselectCallback ****/
		
function search_category(baseurl,orderBy)
{
	if(orderBy) 
	{	
		orderBy = orderBy;
	}
	else {
		orderBy = '';	
	}
	
	//alert(orderBy);
	//if( $("#category").val() !='')
   // {
		var startp=0;
	    var limitp=10;
		
		var category	= $.trim($("#category").val());
				
		//alert(profileName);
		$('#hid_orderBy').val(orderBy);
		$('#hid_category').val(category);
		
		
		if(category=='') {
			$('#hid_search').val(0);
		} else {
			$('#hid_search').val(1);
		}
		
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/category/category_list/",
		data: "category="+category+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				
				$('#load_categorylist').empty();
				$("#load_categorylist").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/category/searchCount",
		data:"category="+category,
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
		

}	
	/*** pageselectCallback ****/				
		function pageselectCallbackSearch(page_index, jq)
		{
				var page_ind = parseInt(page_index)*parseInt(limitp);
				
				var category	= $("#hid_category").val();
				var orderBy 	= $('#hid_orderBy').val();
				
				$.ajax({			
				
				type: "POST",
				url: baseurl+'admin/users/siteusers_list', 
				data:"category="+category+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
					$('#load_categorylist').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
					
