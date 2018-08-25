<?php /* Smarty version Smarty-3.1.8, created on 2013-02-21 16:37:07
         compiled from "/var/www/fundinnovations/application/views/profile/fundinnovation_cash.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1252788550e542b4b4fc06-00334984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5de1fb305bbb7f3f1c8394127264dadbc61e0808' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/fundinnovation_cash.tpl',
      1 => 1361444821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1252788550e542b4b4fc06-00334984',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e542b4b8e761_42879198',
  'variables' => 
  array (
    'baseurl' => 0,
    'fundinnovation_cash_det' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e542b4b8e761_42879198')) {function content_50e542b4b8e761_42879198($_smarty_tpl) {?>
<script type="text/javascript" charset="utf-8">
var baseurl ='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
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


<section class="creative">
<div class="funding">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="45%">Refund Amount </td>
		<td width="5%">:</td>
		<th width="50%"><span class="WebRupee">Rs</span><span style="cursor:pointer" <?php if ($_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['refunded_cash']>0){?> onclick="open_refunded_pop('refunded')" <?php }?>> <?php if ($_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['refunded_cash']==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['refunded_cash'];?>
<?php }?></span></th>
	</tr>
	<tr>
		<td>Referral Amount </td>
		<td>:</td>
		<th><span class="WebRupee">Rs</span> <span style="cursor:pointer"  <?php if ($_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['referral_cash']>0){?> onclick="open_refunded_pop('referral')" <?php }?>><?php if ($_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['referral_cash']==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['referral_cash'];?>
<?php }?></span></th>
	</tr>
	<tr>
		<td>Reordered Amount </td>
		<td>:</td>
		<th><span class="WebRupee">Rs</span> <span style="cursor:pointer" <?php if ($_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['reinvested_cash']>0){?> onclick="open_refunded_pop('reinvested')" <?php }?>><?php if ($_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['reinvested_cash']==''){?>0 <?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['reinvested_cash'];?>
<?php }?></span></th>
	</tr>
	<tr>
		<td>Withdraw </td>
		<td>:</td>
		<th><span class="WebRupee">Rs</span> <span ><?php if ($_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['withdrawn_cash']==''){?>0 <?php }else{ ?><?php echo -1*$_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['withdrawn_cash'];?>
<?php }?></span></th>
	</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="brdTable" style="margin-bottom:0;">
	<tr>
		<td width="45%">Fundinnovation Cash *</td>
		<td width="4%">:</td>
		<th width="50%"><span class="WebRupee">Rs</span> <?php if ($_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['fund_cash']==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['fundinnovation_cash_det']->value['fund_cash'];?>
<?php }?></th>
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

<?php }} ?>