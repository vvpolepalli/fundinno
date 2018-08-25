<?php /* Smarty version Smarty-3.1.8, created on 2013-04-01 23:16:15
         compiled from "/home/fundinno/public_html/application/views/profile/main_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1095073743515a699f4ce509-10196375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37a6083544d0e6fa145cc53271c3902e9a416b4f' => 
    array (
      0 => '/home/fundinno/public_html/application/views/profile/main_page.tpl',
      1 => 1359718100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1095073743515a699f4ce509-10196375',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515a699f557b92_35618349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515a699f557b92_35618349')) {function content_515a699f557b92_35618349($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
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