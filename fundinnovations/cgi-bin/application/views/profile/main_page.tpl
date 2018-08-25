<link rel="stylesheet" href="{$baseurl}styles/jquery-ui.css" />
<script src="{$baseurl}js/jquery-ui.js"></script>
{literal} 
<script type="text/javascript">
var baseurl='{/literal}{$baseurl}{literal}';
$(document).ready(function() {
	var page='{/literal}{$page}{literal}';//
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
{/literal}
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
	
</section>