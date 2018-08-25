<?php /* Smarty version Smarty-3.1.8, created on 2013-02-01 16:58:23
         compiled from "/var/www/fundinnovations/application/views/profile/main_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179851405250e43b5da218e5-54800351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2acb112bac3b28f42168d0a1157a8a8a0e4bc2a' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/main_page.tpl',
      1 => 1359718100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179851405250e43b5da218e5-54800351',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e43b5da6df07_13179747',
  'variables' => 
  array (
    'baseurl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e43b5da6df07_13179747')) {function content_50e43b5da6df07_13179747($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
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
	if(page =='current_projects_funded'){
		load_page(page,'#lnk1');
	}else if(page =='funding_cash'){
			load_page(page,'#lnk3');
	}
	else if(page =='funding_history'){
			load_page(page,'#lnk2');
	}
	});
	function load_page(page,ths){
		var url = '';
		if(page=='current_projects_funded'){
			$(ths).addClass('active');
			$('#lnk2').removeClass('active');
			$('#lnk3').removeClass('active');
			url=baseurl+'user/current_projects_funded';
		}else if(page=='funding_history'){
			$(ths).addClass('active');
			$('#lnk1').removeClass('active');
			$('#lnk3').removeClass('active');

			url=baseurl+'user/funding_history';
		}
		else if(page=='funding_cash'){
			$(ths).addClass('active');
			$('#lnk1').removeClass('active');
			$('#lnk2').removeClass('active');
			url=baseurl+'user/fundinnovation_cash';
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
			<li><a id="lnk1" class="active" href="javascript:void(0)" onclick="load_page('current_projects_funded',this)">Current Projects Funded<span class="arrow"></span></a></li>
			<li><a id="lnk2" href="javascript:void(0)" onclick="load_page('funding_history',this)">Funding History<span class="arrow"></span></a></li>
			<li><a id="lnk3" href="javascript:void(0)" onclick="load_page('funding_cash',this)">Fund Innovation Cash<span class="arrow"></span></a></li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
    <div id="project_list">
    
    </div>
	
</section><?php }} ?>