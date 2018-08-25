<?php /* Smarty version Smarty-3.1.8, created on 2013-02-01 17:05:05
         compiled from "/var/www/fundinnovations/application/views/profile/main_innovation_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153798127150e54db93ab4d0-19475720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29f9b7a6151cf08fb7dc4bf6d30ec99d8e19e0b9' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/main_innovation_page.tpl',
      1 => 1359718464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153798127150e54db93ab4d0-19475720',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e54db93f8600_94076055',
  'variables' => 
  array (
    'baseurl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e54db93f8600_94076055')) {function content_50e54db93f8600_94076055($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/jquery-ui.css" />
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery-ui.js"></script>
 
<script type="text/javascript">
var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
$(document).ready(function() {
	var page='<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
';//
	 $( ".progressBarPer" ).slider({
            value: 100,
            orientation: "horizontal",
            range: "min",
            animate: true,
			disabled: true 
        });
	if(page =='active_innovation'){
		load_page(page,'#lnk1');
	} else if(page =='innovation_history'){
		load_page(page,'#lnk2');
	}
	});
	function load_page(page,ths){
		var url = '';
		if(page=='active_innovation'){
			$(ths).addClass('active');
			$('#lnk2').removeClass('active');
			//$('#lnk3').removeClass('active');
			url=baseurl+'user/active_innovation';
		}else if(page=='innovation_history'){
			$(ths).addClass('active');
			$('#lnk1').removeClass('active');
			//$('#lnk3').removeClass('active');

			url=baseurl+'user/innovation_history';
		}
		
		if(url){
			$.ajax({
			type: "POST",
			url: url,
			success: function(msg){
				$('#project_list').html(msg);
			}
			});
		}
	}
	</script> 

<section class="creative">
	<div class="funding">
		<ul class="fundTab">
			<li><a id="lnk1" class="active" href="javascript:void(0)" onclick="load_page('active_innovation',this)">Active Innovation<span class="arrow"></span></a></li>
			<li><a id="lnk2" href="javascript:void(0)" onclick="load_page('innovation_history',this)">Innovation History<span class="arrow"></span></a></li>
			
		</ul>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
    <div id="project_list">
    
    </div>
	
</section><?php }} ?>