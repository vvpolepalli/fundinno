{literal}
<script type="text/javascript" charset="utf-8">
 $(document).ready(function(){	
 //alert('p');
 var proj_id ='{/literal}{$proj_id}{literal}';
 load_referral_users(proj_id);
 });
function load_referral_users(proj_id){
	
		var startp=0;
	    var limitp=5;
		
		
		var url='';
		/*if(type=='refunded')
		url= baseurl+"user/refunded_project";
		else if(type =='referral')
		url= baseurl+"user/referral_project";
		else if(type =='reinvested')*/
		url= baseurl+"user/referral_users";
		
		//alert(type);
		$.ajax({
		type: "POST",
		url: url,
		data: "proj_id="+proj_id+"&startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				$('#ajx_users_load').empty();
				$("#ajx_users_load").html(msg);
				var startp 		= $('#hid_user_startp').val();
				var limitp		= 5;

				var project_cnt = $('#hid_referral_users_cnt').val();
				project_cnt=parseInt(project_cnt);
				if(project_cnt!=0) {
				$("#Pagination_pop").css('display','block');
				// Create pagination element
				$("#Pagination_pop").pagination(project_cnt, {
				num_edge_entries: 2,
				num_display_entries: 5,
				callback: pageselectCallbackSearchMore,
				items_per_page:5
				});	
				}
				else {
				$("#Pagination_pop").css('display','none');
				}
			}
		}
		
		});
		function pageselectCallbackSearchMore(page_index, jq)
		{
				var page_ind = parseInt(page_index)*parseInt(limitp);
				//return false
				//var cat_lists 	= $('#hid_category_list').val();
				//var sort_option	= $('#hid_sort_option').val();
				//var city_lists	= $('#hid_city_list').val();
				$.ajax({
				type: "POST",
				url:  url,
				data: "proj_id="+proj_id+"&startp="+page_ind+"&limitp="+limitp, 
				success: function(msg){
					if(msg)
					{
						$('#ajx_users_load').empty();
						$("#ajx_users_load").html(msg);
					}
				 }
				});
		}  
		
	
		/*** pageselectCallback ****/				
		
		/*** End pageselectCallback ****/
				
}
</script>
{/literal}
<div id="ajx_users_load">

</div>
<div class="clear"></div>
<div id="Pagination_pop" style="padding: 10px 10px 0;"></div>
 <div class="clear"></div>