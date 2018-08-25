function siteuserslist(baseurl, currP) {
		var email_id	= $("#hid_email").val();
		var profileName	= $("#hid_name").val();
		var user_type	= $("#hid_user").val();
		//var urlType		= $('#hid_usrType').val();
		var user_stat 	= $('#hid_user_fil_status').val();
		var start_on 	= $('#hid_start_on').val();
		var end_on 	    = $('#hid_end_on').val();
		var contact_no  = $('#hid_contact_no').val();
		var country		= $('#hid_country').val();
		var state		= $('#hid_state').val();
		var city		= $('#hid_city').val(); 
		var include_inactive = $('#hid_include_inactive').is(':checked');
		
		
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
		load_siteusers_list(baseurl,startp,limitp);						  		

		$.ajax({
			type:"POST",
			url:baseurl+"admin/users/searchCount",
			data:"email_id="+email_id+"&profileName="+profileName+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no,
			//url:baseurl+"admin/users/countUsers",
			//data:"url_type="+urlType,
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
					callback: pageselectCallbackUsers,
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
	function pageselectCallbackUsers(page_index, jq)
	{
			var page_ind = parseInt(page_index)*parseInt(limitp);
			
			var useremail	= $("#hid_email").val();
			var profileName	= $("#hid_name").val();
			var user_type	= $("#hid_user").val();
			//var urlType 	= $('#hid_usrType').val();
			var orderBy 	= $('#hid_orderBy').val();
			var user_stat 	= $('#hid_user_fil_status').val();
			var start_on 	= $('#hid_start_on').val();
		    var end_on 	    = $('#hid_end_on').val();
			var contact_no  = $('#hid_contact_no').val();
			var country		= $('#hid_country').val();
			var state		= $('#hid_state').val();
			var city		= $('#hid_city').val(); 
			var include_inactive = $('#hid_include_inactive').is(':checked');
		
			$.ajax({			
				type: "POST",
				url: baseurl+'admin/users/siteusers_list', 
				data:"email_id="+useremail+"&profileName="+profileName+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no,
				success: function(msg){	
				$('#load_siteusers').html('');				 
				$('#load_siteusers').html(msg);			 				
			}				
			});	
	}  
	/*** End pageselectCallback ****/
}



function load_siteusers_list(baseurl,startp,limitp) {
	
	var useremail	= $("#hid_email").val();
	var profileName	= $("#hid_name").val();
	var user_type	= $("#hid_user").val();
	//var urlType	 	= $('#hid_usrType').val();
	var orderBy 	= $('#hid_orderBy').val();
	var user_stat 	= $('#hid_user_fil_status').val();
	var start_on 	= $('#hid_start_on').val();
	var end_on 	    = $('#hid_end_on').val();
	var contact_no  = $('#hid_contact_no').val();
	var country		= $('#hid_country').val();
	var state		= $('#hid_state').val();
	var city		= $('#hid_city').val(); 
	var include_inactive = $('#hid_include_inactive').is(':checked');
			
	$.ajax({
	type: "POST",
	url: baseurl + "admin/users/siteusers_list/",
	data:"email_id="+useremail+"&profileName="+profileName+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no,
	success: function (msg) {
		$('#load_siteusers').html('');
		$('#load_siteusers').html(msg);
	}
	});
}



//Function To Search Member
function search_siteusers(baseurl,orderBy)
{
	if(orderBy) 
	{	
		orderBy = orderBy;
	}
	else {
		orderBy = '';	
	}
	
	//alert(orderBy);
	if(validateEmail() && isDate('start_on') && isDate('end_on'))
    {
		var startp=0;
	    var limitp=10;
		
		var email_id	= $.trim($("#emailId").val());
		var profileName	= $.trim($("#profileName").val());
		var user_type	= $.trim($("#user_type").val());
		//var urlType		= $('#hid_usrType').val();
		var user_stat 	= $('#user_fil_status').val();
		var start_on 	= $('#start_on').val();
	    var end_on 	    = $('#end_on').val();
		var contact_no  = $('#contact_no').val();
		var country		= $('#country').val();
		var state		= $('#state').val();
		var city		= $('#city').val(); 
		var include_inactive = $('#include_inactive').is(':checked');
		//var include_inactive = $('#include_inactive').val();
		
		//alert(profileName);
		$('#hid_orderBy').val(orderBy);
		$('#hid_email').val(email_id);
		$('#hid_name').val(profileName);
		$('#hid_user').val(user_type);
		$('#hid_user_fil_status').val(user_stat);
		$('#hid_start_on').val(start_on);
	    $('#hid_end_on').val(end_on);
		$('#hid_contact_no').val(contact_no);
		$('#hid_city').val(city);
		$('#hid_state').val(state);
		$('#hid_country').val(country);
		$('#hid_include_inactive').val(include_inactive);
		
		
		if(email_id=='' && profileName=='' && user_type=='') {
			$('#hid_search').val(0);
		} else {
			$('#hid_search').val(1);
		}
		
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/users/siteusers_list/",
		data: "email_id="+email_id+"&profileName="+profileName+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no, 
		success: function(msg){
			if(msg)
			{
				
				$('#load_siteusers').html('');
				$("#load_siteusers").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/users/searchCount",
		data:"email_id="+email_id+"&profileName="+profileName+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no,
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
	}
		/*** pageselectCallback ****/				
		function pageselectCallbackSearch(page_index, jq)
		{
				var page_ind = parseInt(page_index)*parseInt(limitp);
				
				var useremail	= $("#hid_email").val();
				var profileName	= $("#hid_name").val();
				var user_type	= $("#hid_user").val();
				//var urlType 	= $('#hid_usrType').val();
				var orderBy 	= $('#hid_orderBy').val();
				var user_stat 	= $('#hid_user_fil_status').val();
				var start_on 	= $('#hid_start_on').val();
	            var end_on 	    = $('#hid_end_on').val();
				var contact_no  = $('#hid_contact_no').val();
				var country		= $('#hid_country').val();
				var state		= $('#hid_state').val();
				var city		= $('#hid_city').val(); 
				var include_inactive = $('#hid_include_inactive').is(':checked');
			
				
				$.ajax({			
				
				type: "POST",
				url: baseurl+'admin/users/siteusers_list', 
				data:"email_id="+useremail+"&profileName="+profileName+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no,
				success: function(msg){	
					$('#load_siteusers').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
				

}

function sort_siteusers(baseurl,orderBy)
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
		
		var useremail	= $("#hid_email").val();
		var profileName	= $("#hid_name").val();
		var user_type	= $("#hid_user").val();
		//var urlType 	= $('#hid_usrType').val();
		var user_stat 	= $('#hid_user_fil_status').val();
		var start_on 	= $('#hid_start_on').val();
	    var end_on 	    = $('#hid_end_on').val();
		var contact_no  = $('#hid_contact_no').val();
		var country		= $('#hid_country').val();
		var state		= $('#hid_state').val();
		var city		= $('#hid_city').val(); 
		var include_inactive = $('#hid_include_inactive').is(':checked');
			
		
		$('#hid_orderBy').val(orderBy);
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl + "admin/users/siteusers_list/",
		data: "email_id="+useremail+"&profileName="+profileName+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no, 
		success: function(msg){
			if(msg)
			{
				$('#load_siteusers').html('');
				$("#load_siteusers").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/users/searchCount",
		data:"email_id="+useremail+"&profileName="+profileName+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on,
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
				
				var useremail	= $("#hid_email").val();
				var profileName	= $("#hid_name").val();
				var user_type	= $("#hid_user").val();
				//var urlType 	= $('#hid_usrType').val();
				var orderBy 	= $('#hid_orderBy').val();
				var user_stat 	= $('#hid_user_fil_status').val();
				var start_on 	= $('#hid_start_on').val();
	            var end_on 	    = $('#hid_end_on').val();
				var contact_no  = $('#hid_contact_no').val();
				var country		= $('#hid_country').val();
				var state		= $('#hid_state').val();
				var city		= $('#hid_city').val(); 
				var include_inactive = $('#hid_include_inactive').is(':checked');
			
			
				$.ajax({			
				
				type: "POST",
				url: baseurl+'admin/users/siteusers_list', 
				data:"email_id="+useremail+"&profileName="+profileName+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no,
				success: function(msg){	
					$('#load_siteusers').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
				

}

//for search site users only
function validateEmail()
{
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	$("#email_error").hide();	
	if(!emailReg.test($("#emailId").val())) 
	{
	
		$("#emailId").after('<div class="clear"/><span class="error" id="email_error" ><span>Enter valid Email Id</span></span>');
		return false;
	}
	
	else
	{
		$("#emailId").after('<div class="clear"/><span class="checked" id="email_error"><span></span></span>');
		return true;
	}
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
		
	
	   var useremail=$('#emailId').val();
		
	
	
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
								url: baseurl+"admin/users/change_user_status", 
								data: "startp="+startp+"&limitp="+limitp+"&email_id="+useremail+"&uid="+clists+"&action="+action,
								success: function(msg){
									if(msg)
									{ 
										//load_siteusers_list(baseurl,startp,limitp);
										siteuserslist(baseurl, current_page);	
									}
								}
							   
							});
			}
			
			
}
// function to delete user
function delete_siteuser(baseurl, ctrlfnt)	
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
		
			var useremail	= $("#hid_email").val();
			var profileName	= $("#hid_name").val();
		//	var user_type	= $("#hid_user").val();
		//	var urlType 	= $('#hid_usrType').val();
			var orderBy 	= $('#hid_orderBy').val();
			var user_stat 	= $('#hid_user_fil_status').val();
			var start_on 	= $('#hid_start_on').val();
	        var end_on 	    = $('#hid_end_on').val();
			var contact_no  = $('#hid_contact_no').val();
			var country		= $('#hid_country').val();
			var state		= $('#hid_state').val();
			var city		= $('#hid_city').val(); 
			var include_inactive = $('#hid_include_inactive').is(':checked');
			
			
		$.ajax({
					type: "POST",
					url: baseurl+ctrlfnt,  
					data: "startp="+startp+"&limitp="+limitp+"&email_id="+useremail+"&profileName="+profileName+"&order_by="+orderBy+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no,  
					success: function(msg){
						//alert(msg);
						if(msg)
						{  
						
							$('#load_siteusers').html('');
							$('#load_siteusers').html(msg);
							$.ajax({
							type:"POST",
							url:baseurl+"admin/users/searchCount",
							data:"email_id="+useremail+"&profileName="+profileName+"&user_stat="+user_stat, 
							success:function(msg)
							{
								//alert(msg);
								if(msg !=0) { 
									var current_page = $("[class='current']").html();
									// Create pagination element
									$("#Pagination").pagination(msg, {
									num_edge_entries: 2,
									num_display_entries: 3,
									callback: pageselectCallbackUsers,
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
						function pageselectCallbackUsers(page_index, jq)
						{
								var page_ind = parseInt(page_index)*parseInt(limitp);
								
								var useremail	= $("#hid_email").val();
								var profileName	= $("#hid_name").val();
								//var user_type	= $("#hid_user").val();
								//var urlType 	= $('#hid_usrType').val();
								var orderBy 	= $('#hid_orderBy').val();
								var user_stat 	= $('#hid_user_fil_status').val();
								var start_on 	= $('#hid_start_on').val();
	                            var end_on 	    = $('#hid_end_on').val();
								var contact_no  = $('#hid_contact_no').val();
								var country		= $('#hid_country').val();
								var state		= $('#hid_state').val();
								var city		= $('#hid_city').val(); 
								var include_inactive = $('#hid_include_inactive').is(':checked');
								
								$.ajax({			
									type: "POST",
									url: baseurl + "admin/users/siteusers_list/",
									data: "email_id="+useremail+"&profileName="+profileName+"&order_by="+orderBy+"&startp="+page_ind+"&limitp="+limitp+"&user_stat="+user_stat+"&start_on="+start_on+"&end_on="+end_on+"&country="+country+"&state="+state+"&city="+city+"&include_inactive="+include_inactive+"&contact_no="+contact_no, 
									success: function(msg){	
									$('#load_siteusers').html('');				 
									$('#load_siteusers').html(msg);		
									 				
								}				
								});	
						}  
						/*** End pageselectCallback ****/
						
						}
					}
					
				});
  }
  
function view_siteuser(baseurl, ctrlfnt)	
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
				$('#search_users').css('display','none');
				$('#Pagination').css('display','none');
					
				$('#load_siteusers').html('');				 
				$('#load_siteusers').html(msg);	
					 				
			}				
			});	
		
}
function edit_siteuser(baseurl, ctrlfnt)	
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
				$('#search_users').css('display','none');
				$('#Pagination').css('display','none');
					
				$('#load_siteusers').html('');				 
				$('#load_siteusers').html(msg);	
					 				
			}				
			});	
		
}

function view_to_manageusers(baseurl, fromPage, currp, order){
	$('#manage_head').css('display','block');
	$('#search_users').css('display','block');
	$('#Pagination').css('display','block');
	$('#hid_currP').val(currp);
	$('#hid_usrType').val(fromPage);
	$('#hid_orderBy').val(order);
	siteuserslist(baseurl,currp);
	//setTimeout(window.location.href=baseurl+'admin/users/manage_siteusers/'+fromPage+'/'+currp,6000);
	
}