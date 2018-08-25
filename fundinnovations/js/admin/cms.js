function delete_Cms(baseurl, ctrlfnt)	
{
	
	 var current_page = $("[class='current']").html();
	//alert(current_page);
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
		
	$.ajax({
					type: "POST",
					url: baseurl+ctrlfnt,  
					data: "startp="+startp+"&limitp="+limitp, 
					success: function(mesg){
						if(mesg)
						{  
						    /* msg	 ="1$$<font color=red>Page deleted Successfully</font>";
							 var res = msg.split('$$');			
							 $("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span>'+res[1]+'</span></td></tr>');
							 $("#common_message").slideUp(2000).delay(300);*/
							 //window.location.href=baseurl+'admin/Cms/ListCms';
							
							 $('#searchresult').html(mesg);
							
						}
					}
					
				});
}


		///Change action
function change_actioncms(baseurl, ctrlfnt) 
{
	//alert('sdfs');
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
		
	
	  
		
	
	
	var action=$('#action').val();
	//alert(action);
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
								url: baseurl+ctrlfnt, 
								data: "startp="+startp+"&limitp="+limitp+"&cid="+clists+"&action="+action,
								success: function(msg){
									if(msg)
									{ 
									//alert(msg)
										
										$('#searchresult').html('');
										$('#searchresult').html(msg);
										// window.location.href=baseurl+'admin/Cms/ListCms';
									}
								}
							   
							});
			}
			
			
}

