<?php /* Smarty version Smarty-3.1.8, created on 2013-04-05 04:54:42
         compiled from "/home/fundinno/public_html/application/views/projects/back_reward_pop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1839280843515c07f25790a2-52330210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9458be59468f128fa7dce6f65aa8269224039377' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/back_reward_pop.tpl',
      1 => 1365158767,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1839280843515c07f25790a2-52330210',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c07f269be69_02578378',
  'variables' => 
  array (
    'baseurl' => 0,
    'project_id' => 0,
    'project_rewards' => 0,
    'min_pledge_amount' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c07f269be69_02578378')) {function content_515c07f269be69_02578378($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?><div class="investPropopup">
	<form name="frmback" id="frmback" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/payment_form" >
    <input type="hidden" id="proj_id" name="proj_id" value="<?php echo $_smarty_tpl->tpl_vars['project_id']->value;?>
" />
      <input type="hidden" id="reward" name="reward" value="<?php echo $_smarty_tpl->tpl_vars['project_rewards']->value['id'];?>
" />
		
       
		<ul><li style="border-bottom:none;padding-bottom:0; margin-bottom:0px; "><h5>Pre-Order amount: <span class="WebRupee">Rs. </span><?php echo $_smarty_tpl->tpl_vars['project_rewards']->value['pledge_amount'];?>
</h5>
 <span id="error_spn"></span></li>
			<?php if ($_smarty_tpl->tpl_vars['min_pledge_amount']->value>0){?> <li id="tabs">
				<div id="nav">
					
               <p> Minimum amount for pledge is <?php echo $_smarty_tpl->tpl_vars['min_pledge_amount']->value;?>
.</p>
					<div class="clear"></div>
				</div>
				
				<div class="clear"></div>
			</li><?php }?>
              <?php if (count($_smarty_tpl->tpl_vars['project_rewards']->value)>0){?>
           
            <?php if ($_smarty_tpl->tpl_vars['min_pledge_amount']->value>0){?>
            <?php if ($_smarty_tpl->tpl_vars['project_rewards']->value['pledge_amount']>$_smarty_tpl->tpl_vars['min_pledge_amount']->value){?>
			<li>
				
				<div class="contentField" style="width:auto"><?php echo $_smarty_tpl->tpl_vars['project_rewards']->value['description'];?>
</div><br />
                <p style="padding:10px 0 0;color:#999;">Estimated delivery :<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['project_rewards']->value['delivery_date']);?>
</p>
				<div class="clear"></div>
			</li>
            <?php }?>
            <?php }else{ ?><li>
				
				<div class="contentField" style="width:auto"><?php echo $_smarty_tpl->tpl_vars['project_rewards']->value['description'];?>
</div><br />
                <p style="padding:10px 0 0;color:#999;">Estimated delivery :<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['project_rewards']->value['delivery_date']);?>
</p>
				<div class="clear"></div>
			</li>
            <?php }?>
            
			<?php }?>
            
			<li class="submitPane">
				<ul>
					<li style="float:left; clear:none">
						<!--<input type="button" id="invest" name="invest" class="blueBtn" value="Invest" onClick="invest_project_page()">-->
                        <input type="button" id="invest" name="invest" class="blueBtn" value="Pre-order" onClick="return invest_project_page()">
					</li>
					<li style="float:left; clear:none">
						<input type="button" id="cancel" name="cancel" class="grayBtn" value="Cancel" onClick="close_pop('back_popup');">
					</li>
				</ul>
				<div class="clear"></div>
			</li>
		</ul>
	</form>
	<div class="clear"></div>
</div>

<script type="text/javascript" charset="utf-8">
var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';

function invest_project_page(){
	var min_pledge_amount = '<?php echo $_smarty_tpl->tpl_vars['min_pledge_amount']->value;?>
';
	var proj_id =$('#proj_id').val();
	//alert($("input:radio[name=reward]:checked").val());
	//var pledged_option    = $("input:radio[name=reward]:checked").val();
	var pledge_amt='<?php echo $_smarty_tpl->tpl_vars['project_rewards']->value['pledge_amount'];?>
';
	$('#error_spn').html('');
    min_pledge_amount=min_pledge_amount;
	var uid='<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';
	if(uid ==''){
		//$('#alert_popup').show();openpPopup();
		//$('#alert_pop_cntnt').html('Please login first.');
			$.ajax({
				type: "POST",
				url: baseurl+"archive_projects/save_redirect_page",
				data: {project_id:proj_id}, 
				success: function(msg){
					window.location.href=baseurl+'signin';
					}
				});
	}
	else {
			$.ajax({
					type: "POST",
					url: baseurl+"archive_projects/get_backing_terms",
					data: {project_id:proj_id,amount:pledge_amt}, 
					success: function(msg){
						//$('#back_popup').hide();
						$('#back_pop_cntnt').slideUp();
						$('#back_terms_pop_cntnt').slideDown();
						$('#back_terms_pop_cntnt').html(msg);
						
						/*$('#back_terms_popup').show();openpPopup();
						$('#back_terms_pop_cntnt').html(msg);*/
						//close_pop('back_popup');
						
					}
				});
		
	
}
	//alert($('reward').val())
}
  
  </script> 


<!--<div id="back_terms_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('back_terms_popup')">Close</a>
      <div class="popTitle">
        <h4>Terms to invest a project</h4></div>
        <div id="back_terms_pop_cntnt" class="prodeForm">></div>
      
    </div>
    <div class="clear"></div>
  </div>
  </div>
</div>--><?php }} ?>