//*********************************//
//Function To Search Member
function user_reqstsearch(baseurl, ctrlfnt)
	{
		var startp=0;
	    var limitp=4;
		var useremail=$('#emailId').val();
		
		//alert(sentdate);
		
		$.ajax({
		type: "POST",
		url: baseurl+ctrlfnt,  
		data: "useremail="+useremail+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
		if(msg)
		{
					  
		  $("#reqstreslt").html(msg);
		}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/home/count_reqstuser1",
		data:"useremail="+useremail,
		success:function(msg)
		{
			//alert(msg);
			// Create pagination element
			$("#Pagination").pagination(msg, {
			num_edge_entries: 2,
			num_display_entries: 5,
			callback: pageselectedCallbrqstusers,
			items_per_page:4
			});	
		}
		
		});
		

	/*** pageselectCallback ****/				
function pageselectedCallbrqstusers(page_index, jq)
{
	//alert("hi");
		var page_ind = parseInt(page_index)*parseInt(limitp);
		var useremail=$('#emailId').val();
		
		$.ajax({			
		type: "POST",
		url: baseurl+'admin/home/search_rqstusers', 
		data:"useremail="+useremail+"&startp="+page_ind+"&limitp="+limitp,
		success: function(msg){	
		//alert(msg)
		$('#reqstreslt').html('');				 
		$('#reqstreslt').html(msg);			 				
		}				
		});	
}  
/*** End pageselectCallback ****/
				
				
		
}

function loadnrqstuser(baseurl,ctrlfnt,startp,limitp)
{
	  var useremail=$('#emailId').val();
		
		//alert(sale_city);
	
	 $.ajax({
		type: "POST",
		url: baseurl+ctrlfnt, 
		data:"useremail="+useremail+"&startp="+startp+"&limitp="+limitp,
		success: function(msg){
			if(msg)
			{ 
				//alert(msg);
				$('#reqstreslt').html('');				 
				$('#reqstreslt').html(msg);		
			}
		}                   
	});
}