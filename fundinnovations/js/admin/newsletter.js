// manage News letter starts

function NewsletterList(baseurl) {
	    $('#search_ads').show();
		var hidCurrP 	= $('#hid_currP').val();
		var limitp=10;
		if(hidCurrP!='') {
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
		load_newsletter_list(baseurl,startp,limitp);						  		
        var start_on = $('#hid_start_on').val();
	    var end_on = $('#hid_end_on').val();
	    var newsletter_name = $('#hid_newsletter_name').val();
		$.ajax({
			type:"POST",
			url:baseurl+"admin/Cms/newsletterCount",
			data:"start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name,
			success:function(msg)
			{
				if(msg !=0 && msg >limitp) {
					if(hidCurrP) { 
						hidCurrP = hidCurrP; 
					} else {
						hidCurrP =1;	
					}
					// Create pagination element
					$("#Pagination").pagination(msg, {
					num_edge_entries: 2,
					num_display_entries: 10,
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
			
			var orderBy = $('#hid_orderBy').val();
			var start_on = $('#hid_start_on').val();
	        var end_on = $('#hid_end_on').val();
	        var newsletter_name = $('#hid_newsletter_name').val();
			$.ajax({			
				type: "POST",
				url: baseurl+'admin/Cms/news_letter_list', 
				//data:"url_type="+urlType+"&startp="+page_ind+"&limitp="+limitp+"&order_by="+orderBy+"&pr_name="+pr_name+"&pr_type="+pr_type+"&pr_loc="+pr_loc+"&pr_city="+pr_city,
				data:"startp="+page_ind+"&limitp="+limitp+"&order_by="+orderBy+"&start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name,
				success: function(msg){	
				$('#newsletter_list').html('');				 
				$('#newsletter_list').html(msg);			 				
			}				
			});	
	}  
	/*** End pageselectCallback ****/
}



function load_newsletter_list(baseurl,startp,limitp) {
	var orderBy 	= $('#hid_orderBy').val();
	var start_on = $('#hid_start_on').val();
	var end_on = $('#hid_end_on').val();
	var newsletter_name = $('#hid_newsletter_name').val();
	
	$.ajax({
	type: "POST",
	url: baseurl + "admin/Cms/news_letter_list",
	//data:"url_type="+urlType+"&startp="+startp+"&limitp="+limitp+"&order_by="+orderBy+"&pr_name="+pr_name+"&pr_type="+pr_type+"&pr_loc="+pr_loc+"&pr_city="+pr_city,
	data:"startp="+startp+"&limitp="+limitp+"&order_by="+orderBy+"&start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name,
	success: function (msg) {
		$('#newsletter_list').html('');
		$('#newsletter_list').html(msg);
	}
	});
}

//Function To Sort News Letter
function sort_newsletter(baseurl,orderBy)
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
		$('#hid_orderBy').val(orderBy);
		var start_on = $('#hid_start_on').val();
	    var end_on = $('#hid_end_on').val();
	    var newsletter_name = $('#hid_newsletter_name').val();
		$.ajax({
		type: "POST",
		url: baseurl + "admin/Cms/news_letter_list",
		//data: "url_type="+urlType+"&order_by="+orderBy+"&startp="+startp+"&limitp="+limitp+"&order_by="+orderBy+"&pr_name="+pr_name+"&pr_type="+pr_type+"&pr_loc="+pr_loc+"&pr_city="+pr_city,
		data: "startp="+startp+"&limitp="+limitp+"&order_by="+orderBy+"&start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name, 
		success: function(msg){
			if(msg)
			{
				$('#newsletter_list').html('');
				$("#newsletter_list").html(msg);
			}
		}
		
		});
		$.ajax({
		type:"POST",
		url:baseurl+"admin/Cms/newsletterCount",
		//data:"url_type="+urlType+"&pr_name="+pr_name+"&pr_type="+pr_type+"&pr_loc="+pr_loc+"&pr_city="+pr_city,
		data:"start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name,
		success:function(msgCount)
		{
			//alert(msgCount);
			
			if(msgCount!=0 && msgCount > limitp) {
				$("#Pagination").css('display','block');
				// Create pagination element
				$("#Pagination").pagination(msgCount, {
				num_edge_entries: 2,
				num_display_entries: 10,
				callback: pageselectCallbackSearch,
				items_per_page:10
				});	 
			}
			if(msgCount==0) {
				$("#Pagination").css('display','none');
			}
		}
		
		});
	
		/*** pageselectCallback ****/				
		function pageselectCallbackSearch(page_index, jq)
		{
				var page_ind = parseInt(page_index)*parseInt(limitp);
				var orderBy 	= $('#hid_orderBy').val();
				var start_on = $('#hid_start_on').val();
	            var end_on = $('#hid_end_on').val();
	            var newsletter_name = $('#hid_newsletter_name').val();
				$.ajax({			
				
				type: "POST",
				url: baseurl+'admin/Cms/news_letter_list', 
				data:"startp="+page_ind+"&limitp="+limitp+"&order_by="+orderBy+"&start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name,
				success: function(msg){	
					$('#newsletter_list').html(msg);			 				
				}				
				});	
		}  
		/*** End pageselectCallback ****/
}

// function to delete news letter
function delete_newsletter(baseurl, ctrlfnt)	
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
		
		var orderBy 	= $('#hid_orderBy').val();
		var start_on = $('#hid_start_on').val();
	    var end_on = $('#hid_end_on').val();
	    var newsletter_name = $('#hid_newsletter_name').val();	
		$.ajax({
					type: "POST",
					url: baseurl+ctrlfnt,  
					data: "startp="+startp+"&limitp="+limitp+"&order_by="+orderBy+"&start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name, 
					success: function(msg){
						//alert(msg);
						if(msg)
						{  
						
							$('#newsletter_list').html('');
							$('#newsletter_list').html(msg);
							$.ajax({
							type:"POST",
							url:baseurl+"admin/Cms/newsletterCount",
							data:"start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name,
							success:function(msg)
							{
								//alert(msg);
								if(msg !=0 && msg >limitp) { 
									var current_page = $("[class='current']").html();
									
									// Create pagination element
									$("#Pagination").pagination(msg, {
									num_edge_entries: 2,
									num_display_entries: 10,
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
								var orderBy 	= $('#hid_orderBy').val();
								var start_on = $('#hid_start_on').val();
	                            var end_on = $('#hid_end_on').val();
	                            var newsletter_name = $('#hid_newsletter_name').val();						
								$.ajax({			
									type: "POST",
									url: baseurl + "admin/Cms/news_letter_list",
									data: "startp="+page_ind+"&limitp="+limitp+"&order_by="+orderBy+"&start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name, 
									success: function(msg){	
									$('#newsletter_list').html('');				 
									$('#newsletter_list').html(msg);		
									 				
								}				
								});	
						}  
						/*** End pageselectCallback ****/
						
						}
					}
					
				});
  }
  
 function update_newsletter(baseurl, ctrlfnt)	
 {
	$('#search_ads').hide();
	var current_page = $("[class='current']").html();
	if(current_page) {
	current_page = current_page;	
	} else {
		current_page =1;	
	}
	var orderBy 	= $('#hid_orderBy').val();
	$.ajax({			
			type: "POST",
			url: baseurl+ctrlfnt,  
			data: "currP=" + current_page + "&order_by="+orderBy, 
			success: function(msg){	
			$('#news_links').css('display','none');
			$('#manage_head').css('display','none');
			$('#Pagination').css('display','none');
				
			$('#newsletter_list').html('');				 
			$('#newsletter_list').html(msg);	
								
		}				
		});	
		
}

function view_newsletter(baseurl, ctrlfnt) {
	$('#search_ads').hide();
	var current_page = $("[class='current']").html();
	if(current_page) {
	current_page = current_page;	
	} else {
		current_page =1;	
	}
	var orderBy 	= $('#hid_orderBy').val();
	$.ajax({			
			type: "POST",
			url: baseurl+ctrlfnt,  
			data: "currP=" + current_page + "&order_by="+orderBy, 
			success: function(msg){	
			$('#news_links').css('display','none');
			$('#manage_head').css('display','none');
			$('#Pagination').css('display','none');
				
			$('#newsletter_list').html('');				 
			$('#newsletter_list').html(msg);	
								
		}				
		});	
}

function view_sent_history(baseurl, ctrlfnt) {
	var current_page = $("[class='current']").html();
	if(current_page) {
	current_page = current_page;	
	} else {
		current_page =1;	
	}
	var orderBy 	= $('#hid_orderBy').val();
	$.ajax({			
			type: "POST",
			url: baseurl+ctrlfnt,  
			data: "currP=" + current_page + "&order_by="+orderBy, 
			success: function(msg){	
			$('#news_links').css('display','none');
			$('#manage_head').css('display','none');
			$('#Pagination').css('display','none');
			$('#search_ads').hide();
				
			$('#newsletter_list').html('');				 
			$('#newsletter_list').html(msg);	
								
		}				
		});	
}
 
function back_to_newsletter(baseurl, currp, order){
	
	$('#manage_head').css('display','block');
	$('#news_links').css('display','block');
	$('#Pagination').css('display','block');
	
	$('#hid_currP').val(currp);
	$('#hid_orderBy').val(order);
        removeTinyMCE('news_content');
	NewsletterList(baseurl);
	
}
function removeTinyMCE(ID) {
	if ((tinyMCE==undefined)||(tinyMCE==null)) {
		return false;
	}
	if (tinyMCE.getInstanceById(ID))
	{
		tinyMCE.execCommand('mceFocus', false, ID);                    
		tinyMCE.execCommand('mceRemoveControl', false, ID);
	}
}
function delete_newsletter_history(baseurl, ctrlfnt) {
	
	var orderBy 	= $('#hid_order').val();
	var currP		= $('#hid_currP').val();
	var newsId		= $('#hid_newsid').val();
	$.ajax({			
		type: "POST",
		url: baseurl+ctrlfnt,  
		data: "currP=" + currP + "&order_by="+orderBy + "&newsId="+newsId, 
		success: function(msg){	
			$('#news_links').css('display','none');
			$('#manage_head').css('display','none');
			$('#Pagination').css('display','none');
				
			$('#newsletter_list').html('');				 
			$('#newsletter_list').html(msg);	
									
		}				
	});	
}


function search_newsletter(baseurl) {
	if(isDate('start_on') && isDate('end_on'))
    {
		var hidCurrP = $('#hid_currP').val();
		//alert(hidCurrP);
		var start_on = $('#start_on').val();
		var end_on = $('#end_on').val();
		var newsletter_name = $('#newsletter_name').val();
		$('#hid_newsletter_name').val(newsletter_name);
		$('#hid_start_on').val(start_on);
		$('#hid_end_on').val(end_on);
		
		
		var limitp=10;
		if(hidCurrP!='') {
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
		load_newsletter_list(baseurl,startp,limitp);						  		

		$.ajax({
			type:"POST",
			url:baseurl+"admin/Cms/newsletterCount",
			//data:"url_type="+urlType+"&pr_name="+pr_name+"&pr_type="+pr_type+"&pr_loc="+pr_loc+"&pr_city="+pr_city,
			data:"start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name,
			success:function(msg)
			{   
				if(msg !=0 && msg >limitp) {
					if(hidCurrP) { 
						hidCurrP = hidCurrP; 
					} else {
						hidCurrP =1;	
					}
					// Create pagination element
					$("#Pagination").pagination(msg, {
					num_edge_entries: 2,
					num_display_entries: 10,
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
			var start_on = $('#hid_start_on').val();
	        var end_on = $('#hid_end_on').val();
	        var newsletter_name = $('#hid_newsletter_name').val();
			var orderBy = $('#hid_orderBy').val();
			$.ajax({			
				type: "POST",
				url: baseurl+'admin/Cms/news_letter_list', 
				//data:"url_type="+urlType+"&startp="+page_ind+"&limitp="+limitp+"&order_by="+orderBy+"&pr_name="+pr_name+"&pr_type="+pr_type+"&pr_loc="+pr_loc+"&pr_city="+pr_city,
				data:"startp="+page_ind+"&limitp="+limitp+"&order_by="+orderBy+"&start_on="+start_on+"&end_on="+end_on+"&newsletter_name="+newsletter_name,
				success: function(msg){	
				$('#newsletter_list').html('');				 
				$('#newsletter_list').html(msg);			 				
			}				
			});	
	}  
	/*** End pageselectCallback ****/
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