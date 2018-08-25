<?php /* Smarty version Smarty-3.1.8, created on 2013-06-25 22:57:41
         compiled from "/home/fundinno/public_html/application/views/profile/referral_users_main_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172453104851ca74c5b97393-41270538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9755c6778324ebcdf075181c5e205fd25d4400e6' => 
    array (
      0 => '/home/fundinno/public_html/application/views/profile/referral_users_main_page.tpl',
      1 => 1360907742,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172453104851ca74c5b97393-41270538',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'proj_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_51ca74c5c1c2c0_86021454',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ca74c5c1c2c0_86021454')) {function content_51ca74c5c1c2c0_86021454($_smarty_tpl) {?>
<script type="text/javascript" charset="utf-8">
 $(document).ready(function(){	
 //alert('p');
 var proj_id ='<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';
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

<div id="ajx_users_load">

</div>
<div class="clear"></div>
<div id="Pagination_pop" style="padding: 10px 10px 0;"></div>
 <div class="clear"></div><?php }} ?>