<?php /* Smarty version Smarty-3.1.8, created on 2013-02-15 11:24:48
         compiled from "/var/www/fundinnovations/application/views/profile/funded_projects_main_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37221308350f0fbdc0ff576-07047984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7dcfab40b04d77e04614a07ea0fa417ccc6f30d' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/funded_projects_main_page.tpl',
      1 => 1360907680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37221308350f0fbdc0ff576-07047984',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50f0fbdc138098_80815166',
  'variables' => 
  array (
    'page_type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f0fbdc138098_80815166')) {function content_50f0fbdc138098_80815166($_smarty_tpl) {?>
<script type="text/javascript" charset="utf-8">
 $(document).ready(function(){	
 //alert('p');
 var page_type ='<?php echo $_smarty_tpl->tpl_vars['page_type']->value;?>
';
 load_projects(page_type);
 });
function load_projects(type){
	
		var startp=0;
	    var limitp=5;
		
		
		var url='';
		if(type=='refunded')
		url= baseurl+"user/refunded_project";
		else if(type =='referral')
		url= baseurl+"user/referral_project";
		else if(type =='reinvested')
		url= baseurl+"user/reinvested_project";
		
		//alert(type);
		$.ajax({
		type: "POST",
		url: url,
		data: "startp="+startp+"&limitp="+limitp, 
		success: function(msg){
			if(msg)
			{
				$('#ajx_load').empty();
				$("#ajx_load").html(msg);
				var startp 		= $('#hid_startp').val();
				var limitp		= 5;

				var project_cnt = $('#hid_projects_list_cnt').val();
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
				data: "startp="+page_ind+"&limitp="+limitp, 
				success: function(msg){
					if(msg)
					{
						$('#ajx_load').empty();
						$("#ajx_load").html(msg);
					}
				 }
				});
		}  
		
	
		/*** pageselectCallback ****/				
		
		/*** End pageselectCallback ****/
				
}
</script>

<div id="ajx_load">

</div>
<div class="clear"></div>
<div id="Pagination_pop" style="padding: 10px 10px 0;"></div>
 <div class="clear"></div><?php }} ?>