<?php /* Smarty version Smarty-3.1.8, created on 2013-04-05 04:52:22
         compiled from "/home/fundinno/public_html/application/views/projects/fundinnovation_pay.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2132408045515bb83527de89-72593020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '794b3130650f974a9bf121f1e748a7df1b60f5d0' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/fundinnovation_pay.tpl',
      1 => 1365158277,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2132408045515bb83527de89-72593020',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bb835367542_91051959',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'fundinnovation_cash' => 0,
    'transfer_amnt' => 0,
    'amount' => 0,
    'reward_selected' => 0,
    'pledge_amount' => 0,
    'account_id' => 0,
    'return_url' => 0,
    'mode' => 0,
    'secure_hash' => 0,
    'reference_no' => 0,
    'description' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bb835367542_91051959')) {function content_515bb835367542_91051959($_smarty_tpl) {?><section class="innerMidWrap">
  <div class="">
    <div class="contentBlock"> 
      
       <form id="frmTransaction" name="frmTransaction" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/continue_payment" onSubmit="return submitform()" method="post" >
      <!--<form  method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">-->
        <input type="hidden" id="proj_id" name="proj_id" value="<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
" />
        <input type="hidden" id="fundinnovation_cash" name="fundinnovation_cash" value="<?php echo $_smarty_tpl->tpl_vars['fundinnovation_cash']->value;?>
" />
        <!-- <input type="hidden" id="transfer_amnt" name="transfer_amnt" value="<?php echo $_smarty_tpl->tpl_vars['transfer_amnt']->value;?>
" />
        <input type="hidden" id="funding_amount" name="funding_amount" value="<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
" />-->
        <input type="hidden" id="reward_selected" name="reward_selected" value="<?php echo $_smarty_tpl->tpl_vars['reward_selected']->value;?>
" />
        <div style="margin:0 auto;width:999px">
          <table   cellpadding="8" cellspacing="8" border="0"  style="border-spacing:8px;border-collapse: inherit;margin-left:-8px;">
            <tr>
              <td><label>Pre-Order Amount </label></td>
              <td> <span class="WebRupee">Rs. </span><?php echo $_smarty_tpl->tpl_vars['pledge_amount']->value;?>
 </td>
            </tr>
            <tr>
              <td><label>Fundinnovation cash </label></td>
              <td><span class="WebRupee">Rs. </span> <?php echo $_smarty_tpl->tpl_vars['fundinnovation_cash']->value;?>
 </td>
            </tr>
            <tr>
              <td><label>Amount Payable</label></td>
              <td> <span class="WebRupee">Rs. </span><?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
 </td>
            </tr>
            <tr><td colspan="2">&nbsp;<h3>Note:<span> Amount payable = Pre-Order Amount – FundInnovations Cash.</span> </h3></td></tr>
            <!--EBS Payment Variables -->
            
          <!--  <input name="account_id" id="account_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['account_id']->value;?>
">-->
            <input name="return_url" type="hidden" size="60" value="<?php echo $_smarty_tpl->tpl_vars['return_url']->value;?>
" />
           <!-- <input name="mode" type="hidden" size="60" value="<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
" />
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['secure_hash']->value;?>
" size="60" name="secure_hash">
            <input name="reference_no" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['reference_no']->value;?>
" />-->
            <input name="amount" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
"/>
            <input name="description" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
            <tr>
              <td>&nbsp;</td>
              <td><div class="submitPane" style="padding-left:0;padding-top:0;">
                  <ul>
                    <li class="blueBtnLi">
                      <input type="button" class="blueBtn"value="Pay Now"
                                 onclick="javascript:submitform()"/>
                    </li>
                    <li class="blueBtnLi">
                      <input type="button" class="blueBtn" value="Cancel" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/cancel_order/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';" />
                    </li>
                  </ul>
                </div></td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </div>
      </form>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>

<script type="text/javascript" charset="utf-8">
var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
 function submitform()
  {
	  //if(validate())
	  //{
		  document.frmTransaction.submit();
	 /// }
  }
   </script> 
<?php }} ?>