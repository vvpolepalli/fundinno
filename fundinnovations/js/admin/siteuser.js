//included in search_siteuser.tpl
function siteuser(baseurl, ctrlfnt) {
	$('#rightblock01').empty().html('<img style="margin-top:150px;margin-left:531px;" src="'+baseurl+'images/bigLoader.gif" />');
	var startp=0;
	var limitp=10;
//$("#new").html("Fetching data...........");	
	    
     		 $.ajax({
                    type: "POST",
                    url: baseurl+ctrlfnt, 
                    success: function(msg){
                        if(msg)
                        { 		
													        
							$('.rightblock01').html('');
                            $('.rightblock01').html(msg);
							
							  loadSiteUsers(baseurl,'admin/home/searchsite_user',startp,limitp);						  		
							   <!--end-->
                           $.ajax({
								type:"POST",
								url:baseurl+"admin/home/countUser",
								data:"",
								success:function(msg)
								{
									// Create pagination element
									$("#Pagination").pagination(msg, {
									num_edge_entries: 2,
									num_display_entries: 12,
									callback: pageselectCallbacks,
									items_per_page:10
									});
								}
									
							});

                           
						}
					}
						   
				});
				
				
/*** pageselectCallback ****/				
function pageselectCallbacks(page_index, jq)
{
		var page_ind = parseInt(page_index)*parseInt(limitp);
		var firstName = $('#firstName').val();
		var lastName = $('#lastName').val();
		var userCity = $('#userCity').val();
		var email=$('#emailId').val();
		
		$.ajax({			
		type: "POST",
		url: baseurl+'admin/home/searchsite_user', 
		data:"firstName="+firstName+"&lastName="+lastName+"&city="+userCity+"&emailId="+email+"&startp="+page_ind+"&limitp="+limitp,
		success: function(msg){	
		//alert(msg)
		$('#searchresult').html('');				 
		$('#searchresult').html(msg);			 				
		}				
		});	
}  
/*** End pageselectCallback ****/
				
				
		
}

function loadSiteUsers(baseurl, ctrlfnt,startp,limitp)
{
	var firstName = $('#firstName').val();
	var lastName = $('#lastName').val();
	var userCity = $('#userCity').val();
	var email=$('#emailId').val();
	
	
    //$('#new').empty().html('<img style="margin-top:60px;margin-left:531px;" src="'+baseurl+'images/bigLoader.gif" />');
   				 $.ajax({
                    type: "POST",
                    url: baseurl+ctrlfnt, 
                    data:"firstName="+firstName+"&lastName="+lastName+"&city="+userCity+"&emailId="+email+"&startp="+startp+"&limitp="+limitp,
                    success: function(msg){
                        if(msg)
                        { 
                            //alert(msg);
							$('#searchresult').html('');				 
		                    $('#searchresult').html(msg);		
                        }
                    }                   
                });
}

//Function To Search users---from input
function searchsiteuser(baseurl, ctrlfnt)
{
		var startp=0;
	    var limitp=10;
		var city=$('#userCity').val();
		var lastName=$('#lastName').val();
		var firstName=$('#firstName').val();
		var email=$('#emailId').val();
		
		
		$.ajax({
		type: "POST",
		url: baseurl+ctrlfnt,  
		data: "city="+city+"&lastName="+lastName+"&firstName="+firstName+"&startp="+startp+"&limitp="+limitp+"&emailId="+email, 
		success: function(msg){
		if(msg)
		{  
		
		$("#searchresult").html(msg);
		}
		}
		
		});
		
		$.ajax({
		type:"POST",
		url:baseurl+"admin/home/countUser1",
		data:"firstName="+firstName+"&lastName="+lastName+"&city="+userCity+"&emailId="+email,
		success:function(msg)
		{
			//alert(msg);
			// Create pagination element
			$("#Pagination").pagination(msg, {
			num_edge_entries: 2,
			num_display_entries: 12,
			callback: pageselectCallbacksearch,
			items_per_page:10
			});	
		}
		
		});
		function pageselectCallbacksearch(page_index, jq)
		{	
			var page_ind = parseInt(page_index)*parseInt(limitp);
				var firstName = $('#firstName').val();
				var lastName = $('#lastName').val();
				var userCity = $('#userCity').val();
				var email=$('#emailId').val();
				
				$.ajax({			
				type: "POST",
				url: baseurl+'admin/home/searchsite_user', 
				data:"firstName="+firstName+"&lastName="+lastName+"&city="+userCity+"&emailId="+email+"&startp="+page_ind+"&limitp="+limitp,
				success: function(msg){	
				//alert(msg)
				$('#searchresult').html('');				 
				$('#searchresult').html(msg);			 				
				}				
				});	
		}  
	/*** End pageselectCallback ****/
		
}	
//Function To add users
function addsiteuser(baseurl, ctrlfnt)
{
		
		$.ajax({
		type: "POST",
		url: baseurl+ctrlfnt,  
		data: "", 
		success: function(msg){
		if(msg)
		{  
		$(".rightblock01").html(msg);
		}
		}
		
		});
}	
function delete_siteuser(baseurl, ctrlfnt)	
{
	
	 var current_page = $("[class='current']").html();
	
		var startp;
		var limitp=4;
		if(current_page==1)
		{
			startp=0;
		}
		else
		{
			startp = (current_page-1)*limitp;
		}
		
	$.ajax({
					type: "POST",
					url: baseurl+ctrlfnt,  
					data: "startp="+startp+"&limitp="+limitp, 
					success: function(msg){
						if(msg)
						{  
								$('#searchresult').html('');
								$('#searchresult').html(msg);
							
						}
					}
					
				});
}
//for requests
function siteuserreq(baseurl, ctrlfnt) {
	$('#rightblock01').empty().html('<img style="margin-top:150px;margin-left:531px;" src="'+baseurl+'images/bigLoader.gif" />');
	var startp=0;
	var limitp=10;
//$("#new").html("Fetching data...........");	
	    
     		 $.ajax({
                    type: "POST",
                    url: baseurl+ctrlfnt, 
                    success: function(msg){
                        if(msg)
                        { 		
													        
							$('.rightblock01').html('');
                            $('.rightblock01').html(msg);
							
							 loadSiteUsersReq(baseurl,'admin/home/requestlists',startp,limitp);
							 						  		
							   <!--end-->
                           $.ajax({
								type:"POST",
								url:baseurl+"admin/home/countUserReq",
								data:"",
								success:function(msg)
								{
									// Create pagination element
									$("#Pagination").pagination(msg, {
									num_edge_entries: 2,
									num_display_entries: 12,
									callback: pageselectCallbacksReq,
									items_per_page:10
									});
								}
									
							});

                           
						}
					}
						   
				});
				
				
/*** pageselectCallback ****/				
function pageselectCallbacksReq(page_index, jq)
{
		var page_ind = parseInt(page_index)*parseInt(limitp);
		var firstName = $('#firstName').val();
		var lastName = $('#lastName').val();
		var userCity = $('#userCity').val();
		var email=$('#emailId').val();
		
		$.ajax({			
		type: "POST",
		url: baseurl+'admin/home/requestlists', 
		data:"firstName="+firstName+"&lastName="+lastName+"&city="+userCity+"&emailId="+email+"&startp="+page_ind+"&limitp="+limitp,
		success: function(msg){	
		//alert(msg)
		$('#searchresult').html('');				 
		$('#searchresult').html(msg);			 				
		}				
		});	
}  
/** End pageselectCallback ***/
				
				
		
}


function loadSiteUsersReq(baseurl, ctrlfnt,startp,limitp)
{
	var firstName = $('#firstName').val();
	var lastName = $('#lastName').val();
	var userCity = $('#userCity').val();
	var email=$('#emailId').val();
	
	
    //$('#new').empty().html('<img style="margin-top:60px;margin-left:531px;" src="'+baseurl+'images/bigLoader.gif" />');
   				 $.ajax({
                    type: "POST",
                    url: baseurl+ctrlfnt, 
                    data:"firstName="+firstName+"&lastName="+lastName+"&city="+userCity+"&emailId="+email+"&startp="+startp+"&limitp="+limitp,
                    success: function(msg){
                        if(msg)
                        { 
                            //alert(msg);
							$('#searchresult').html('');				 
		                    $('#searchresult').html(msg);		
                        }
                    }                   
                });
}

//Function To Search users---from input
function searchsiteuser_req(baseurl, ctrlfnt)
{
		//alert('dsfds');
		var startp=0;
	    var limitp=10;
		var city=$('#userCity').val();
		var lastName=$('#lastName').val();
		var firstName=$('#firstName').val();
		var email=$('#emailId').val();
		//alert(firstName);
		
		$.ajax({
		type: "POST",
		url: baseurl+ctrlfnt,  
		data: "city="+city+"&lastName="+lastName+"&firstName="+firstName+"&startp="+startp+"&limitp="+limitp+"&emailId="+email, 
		success: function(msg){
		if(msg)
		{  
		//alert(msg);
		$("#searchresult").html(msg);
		}
		}
		
		});
}
	///Change action
function update_action(baseurl, ctrlfnt) 
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
		
	
	    var firstName = $('#firstName').val();
		var lastName = $('#lastName').val();
		var userCity = $('#userCity').val();
		
	
	
	var action=$('#action').val();
	
	var clists = $('input[name="ListStatusLinkCheckbox[]"]:checked').map(function(){return this.value;}).get();
	//alert(clists);
		//alert(citylist);
		if(action=='')
			{
				alert("Select Action"); 
				return false;
			}
			else{
				
					$.ajax({
									type: "POST",
									url: baseurl+ctrlfnt, 
									data: "startp="+startp+"&limitp="+limitp+"&lastName="+lastName+"&userCity="+userCity+"&firstName="+firstName+"&cid="+clists+"&action="+action,
									success: function(msg){
										if(msg)
										{ 
										//alert(msg)
											
											$('#searchresult').html('');
											$('#searchresult').html(msg);
										}
									}
								   
								});
				
			}
			
			
}
	