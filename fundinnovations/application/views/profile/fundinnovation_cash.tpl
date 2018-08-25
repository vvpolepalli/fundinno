{literal}
<script type="text/javascript" charset="utf-8">
var baseurl ='{/literal}{$baseurl}{literal}';
function open_refunded_pop(type){
	$('#refunded_proj_cntnt').empty();
	$('#refunded_projects').show();openpPopup();
	$.ajax({
		type:'POST',
		data:'page_type='+type,
		url :baseurl+'user/load_pop_page',
		success:function(msg){
			if(type=='refunded')
			$('#heading').html('Refunded projects');
			else if(type=='referral')
			$('#heading').html('Referral projects');
			else if(type=='reinvested')
			$('#heading').html('Reordered projects');
			$('#refunded_proj_cntnt').html(msg);
			}
		});
	
}
function close_pop(id){
	 $('#'+id).hide();
	  if($("#refunded_projects").is(":visible") ){
	 } 
	 else{	 
	 closepPopup();
	 }
	 //$('#refunded_proj_cntnt').empty();
	 //$('#alert_pop_cntnt').empty();
 	}
</script>
{/literal}

<section class="creative">
<div class="funding">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="45%">Refund Amount </td>
		<td width="5%">:</td>
		<th width="50%"><span class="WebRupee">Rs</span><span style="cursor:pointer" {if $fundinnovation_cash_det.refunded_cash gt 0} onclick="open_refunded_pop('refunded')" {/if}> {if $fundinnovation_cash_det.refunded_cash eq ''}0{else}{$fundinnovation_cash_det.refunded_cash}{/if}</span></th>
	</tr>
	<tr>
		<td>Referral Amount </td>
		<td>:</td>
		<th><span class="WebRupee">Rs</span> <span style="cursor:pointer"  {if $fundinnovation_cash_det.referral_cash gt 0} onclick="open_refunded_pop('referral')" {/if}>{if $fundinnovation_cash_det.referral_cash eq ''}0{else}{$fundinnovation_cash_det.referral_cash}{/if}</span></th>
	</tr>
	<tr>
		<td>Reordered Amount </td>
		<td>:</td>
		<th><span class="WebRupee">Rs</span> <span style="cursor:pointer" {if $fundinnovation_cash_det.reinvested_cash gt 0} onclick="open_refunded_pop('reinvested')" {/if}>{if $fundinnovation_cash_det.reinvested_cash eq ''}0 {else}{$fundinnovation_cash_det.reinvested_cash}{/if}</span></th>
	</tr>
	<tr>
		<td>Withdraw </td>
		<td>:</td>
		<th><span class="WebRupee">Rs</span> <span >{if $fundinnovation_cash_det.withdrawn_cash eq ''}0 {else}{-1*$fundinnovation_cash_det.withdrawn_cash}{/if}</span></th>
	</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="brdTable" style="margin-bottom:0;">
	<tr>
		<td width="45%">Fundinnovation Cash *</td>
		<td width="4%">:</td>
		<th width="50%"><span class="WebRupee">Rs</span> {if $fundinnovation_cash_det.fund_cash eq ''}0{else}{$fundinnovation_cash_det.fund_cash}{/if}</th>
	</tr> 
</table>
<div class="fundingFormula">* Fund Innovation Cash = (Refund Amount + Referral Amount – Reordered Amount – Withdraw)</div>
</div>

<div class="clear"></div>

</section>

<div id="refunded_projects" class="popFixed"  style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('refunded_projects')">Close</a>
       <div class="popTitle">
        <h4 id="heading">Refunded projects</h4> </div>
        <div id="refunded_proj_cntnt"></div>
     
    </div>
    <div class="clear"></div>
  </div>
</div>
</div>

