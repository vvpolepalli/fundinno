<?php /* Smarty version Smarty-3.1.8, created on 2013-06-18 12:33:06
         compiled from "/home/fundinno/public_html/application/views/profile/funded_projects_main_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33556370351c0a7e28b9c39-15466613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4a17efca16389f823f7deb415f28ddadb5cc100' => 
    array (
      0 => '/home/fundinno/public_html/application/views/profile/funded_projects_main_page.tpl',
      1 => 1360907680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33556370351c0a7e28b9c39-15466613',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51c0a7e297d344_69618879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c0a7e297d344_69618879')) {function content_51c0a7e297d344_69618879($_smarty_tpl) {?>
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