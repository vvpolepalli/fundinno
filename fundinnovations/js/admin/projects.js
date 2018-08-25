function projects_list(baseurl, currP) {
		var proj_title	= $("#hid_proj_title").val();
		var category	= $("#hid_category").val();
		var project_status	= $("#hid_project_status").val();
		//var urlType		= $('#hid_usrType').val();
		var location 	= $('#hid_location').val();
		var fund_goal 	= $('#hid_fund_goal').val();
		var status 	    = $('#hid_status').val();
		 
			
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
		load_projects_list(baseurl,startp,limitp);						  		

		$.ajax({
			type:"POST",
			url:baseurl+"admin/project/searchCount",
			data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status,
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
			
			
			var proj_title	= $("#hid_proj_title").val();
			var category	= $("#hid_category").val();
			var project_status	= $("#hid_project_status").val();
			var location 	= $('#hid_location').val();
			var fund_goal 	= $('#hid_fund_goal').val();
			var status 	    = $('#hid_status').val();
			var orderBy 	= $('#hid_orderBy').val();
			
			$.ajax({			
				type: "POST",
				url: baseurl+'admin/project/project_list', 
				data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
				$('#load_projects').empty();				 
				$('#load_projects').html(msg);			 				
			}				
			});	
	}  
	/*** End pageselectCallback ****/
}
function load_projects_list(baseurl,startp,limitp) {
	
	var proj_title	= $("#hid_proj_title").val();
	var category	= $("#hid_category").val();
	var project_status	= $("#hid_project_status").val();
	var location 	= $('#hid_location').val();
	var fund_goal 	= $('#hid_fund_goal').val();
	var status 	    = $('#hid_status').val();
	var orderBy 	= $('#hid_orderBy').val();
	
	$.ajax({
	type: "POST",
	url: baseurl + "admin/project/project_list",
	data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp,
	success: function (msg) {
		$('#load_projects').empty();
		$('#load_projects').html(msg);
	}
	});
}

function search_projects(baseurl,orderBy)
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
		
		var proj_title	= $.trim($("#proj_title").val());
		var location	= $.trim($("#location").val());
		var fund_goal	= $.trim($("#fund_goal").val());
		//var urlType		= $('#hid_usrType').val();
		var category 	= $('#category_list').val();
		var project_status 	= $('#project_status').val();
	    var status 	    = $('#status').val();
		
		//alert(profileName);
		$('#hid_orderBy').val(orderBy);
		$('#hid_proj_title').val(proj_title);
		$('#hid_category').val(category);
		$('#hid_project_status').val(project_status);
		$('#hid_location').val(location);
		$('#hid_fund_goal').val(fund_goal);
	    $('#hid_status').val(status);
				
		if(proj_title == '' && category=='') {
			$('#hid_search').val(0);
		} else {
			$('#hid_search').val(1);
		}
		
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl+"admin/project/project_list/",
		data: "proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				
				$('#load_projects').empty();
				$("#load_projects").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/project/searchCount",
		data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status,
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
				
				var proj_title	= $("#hid_proj_title").val();
				var category	= $("#hid_category").val();
				var project_status	= $("#hid_project_status").val();
				var location 	= $('#hid_location').val();
				var fund_goal 	= $('#hid_fund_goal').val();
				var status 	    = $('#hid_status').val();
				var orderBy 	= $('#hid_orderBy').val();
								
				$.ajax({	
				type: "POST",
				url: baseurl+'admin/project/project_list', 
				data: "proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
					$('#load_projects').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
				

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
		
		var proj_title	= $("#hid_proj_title").val();
		var category	= $("#hid_category").val();
		var project_status	= $("#hid_project_status").val();
		var location 	= $('#hid_location').val();
		var fund_goal 	= $('#hid_fund_goal').val();
		var status 	    = $('#hid_status').val();
			
			
		$('#hid_orderBy').val(orderBy);
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/project/project_list",
		data: "proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				$('#load_projects').empty();
				$("#load_projects").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/project/searchCount",
		data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status,
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
				
				var proj_title	= $("#hid_proj_title").val();
				var category	= $("#hid_category").val();
				var project_status	= $("#hid_project_status").val();
				var location 	= $('#hid_location').val();
				var fund_goal 	= $('#hid_fund_goal').val();
				var status 	    = $('#hid_status').val();
			
				var orderBy 	= $('#hid_orderBy').val();
			
			
				$.ajax({			
				
				type: "POST",
				url: baseurl+'admin/project/project_list', 
				data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
					$('#load_projects').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
				

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
		
	
	  // var useremail=$('#emailId').val();
		
	
	
	var action=$('#action').val();
	var clists = $('input[name="ListStatusLinkCheckbox[]"]:checked').map(function(){return this.value;}).get();
//alert(clists);
		//alert(citylist);
		if(clists=='')
		  {
			  alert("Please select at least one check box"); 
			  return false;
		  }
			else{
				$.ajax({
								type: "POST",
								url: baseurl+"admin/project/change_status", 
								data: "startp="+startp+"&limitp="+limitp+"&pid="+clists+"&action="+action,
								success: function(msg){
									if(msg)
									{ 
										//load_siteusers_list(baseurl,startp,limitp);
										projects_list(baseurl, current_page);	
									}
								}
							   
							});
			}
}

function delete_project(baseurl, ctrlfnt)	
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
		
			var proj_title	= $("#hid_proj_title").val();
			var category	= $("#hid_category").val();
			var project_status	= $("#hid_project_status").val();
			var location 	= $('#hid_location').val();
			var fund_goal 	= $('#hid_fund_goal').val();
			var status 	    = $('#hid_status').val();
				
			var orderBy 	= $('#hid_orderBy').val();
			
			
		$.ajax({
					type: "POST",
					url: baseurl+ctrlfnt,  
					data: "startp="+startp+"&limitp="+limitp+"&proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status+"&order_by="+orderBy,  
					success: function(msg){
						//alert(msg);
						if(msg)
						{  
						
							$('#load_projects').empty();
							$('#load_projects').html(msg);
							$.ajax({
							type:"POST",
							url:baseurl+"admin/project/searchCount",
							data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status, 
							success:function(msg)
							{
								//alert(msg);
								if(msg !=0) { 
									var current_page = $("[class='current']").html();
									// Create pagination element
									$("#Pagination").pagination(msg, {
									num_edge_entries: 2,
									num_display_entries: 3,
									callback: pageselectCallbackProjects,
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
						function pageselectCallbackProjects(page_index, jq)
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
									url: baseurl+'admin/project/project_list', 
									data:"proj_title="+proj_title+"&category="+category+"&project_status="+project_status+"&location="+location+"&fund_goal="+fund_goal+"&status="+status+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp,
									/*data: "email_id="+useremail+"&profileName="+profileName+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no, */
									success: function(msg){	
									$('#load_projects').empty();				 
									$('#load_projects').html(msg);		
									 				
								}				
								});	
						}  
						/*** End pageselectCallback ****/
						
						}
					}
					
				});
  }
  
  
function view_project(baseurl, ctrlfnt)	
{
	    var current_page = $("[class='current']").html();
		var orderBy 	= $('#hid_orderBy').val();
		$.ajax({			
				type: "POST",
				url: baseurl+ctrlfnt,  
				data: "currP=" + current_page + "&order_by="+orderBy, 
				success: function(msg){	
				//$('#manage_siteusers').html('');
				$('#manage_head').css('display','none');
				$('#search_projects').css('display','none');
				$('#Pagination').css('display','none');
					
				$('#load_projects').empty();				 
				$('#load_projects').html(msg);	
					 				
			}				
			});	
		
}

/*function view_properties(baseurl, ctrlfnt)	
{
	var current_page = $("[class='current']").html();
	var orderBy 	= $('#hid_orderBy').val();
	$.ajax({			
			type: "POST",
			url: baseurl+ctrlfnt,  
			data: "currP=" + current_page + "&order_by="+orderBy, 
			success: function(msg){	
			//$('#manage_siteusers').html('');
			$('#manage_head').css('display','none');
			$('#search_properties').css('display','none');
			$('#Pagination').css('display','none');
				
			$('#properties_list').html('');				 
			$('#properties_list').html(msg);	
								
		}				
		});	
		
}*/
function back_to_projects(baseurl, fromPage, currp, order){
	$('#manage_head').css('display','block');
	$('#search_projects').css('display','block');
	$('#Pagination').css('display','block');
	$('#hid_currP').val(currp);
	$('#hid_urlType').val(fromPage);
	$('#hid_orderBy').val(order);
	projects_list(baseurl);
	
}