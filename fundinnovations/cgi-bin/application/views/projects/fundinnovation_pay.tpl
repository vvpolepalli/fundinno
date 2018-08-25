<section class="innerMidWrap">
  <div class="">
    <div class="contentBlock"> 
      
       <form id="frmTransaction" name="frmTransaction" action="{$baseurl}archive_projects/continue_payment" onSubmit="return submitform()" method="post" >
      <!--<form  method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">-->
        <input type="hidden" id="proj_id" name="proj_id" value="{$proj_id}" />
        <input type="hidden" id="fundinnovation_cash" name="fundinnovation_cash" value="{$fundinnovation_cash}" />
        <!-- <input type="hidden" id="transfer_amnt" name="transfer_amnt" value="{$transfer_amnt}" />
        <input type="hidden" id="funding_amount" name="funding_amount" value="{$amount}" />-->
        <input type="hidden" id="reward_selected" name="reward_selected" value="{$reward_selected}" />
        <div style="margin:0 auto;width:999px">
          <table   cellpadding="8" cellspacing="8" border="0"  style="border-spacing:8px;border-collapse: inherit;margin-left:-8px;">
            <tr>
              <td><label>Pre-Order Amount </label></td>
              <td> <span class="WebRupee">Rs. </span>{$pledge_amount} </td>
            </tr>
            <tr>
              <td><label>Fundinnovation cash </label></td>
              <td><span class="WebRupee">Rs. </span> {$fundinnovation_cash} </td>
            </tr>
            <tr>
              <td><label>Amount Payable</label></td>
              <td> <span class="WebRupee">Rs. </span>{$amount} </td>
            </tr>
            <tr><td colspan="2">&nbsp;<h3>Note:<span> Amount payable = Pre-Order Amount – FundInnovations Cash.</span> </h3></td></tr>
            <!--EBS Payment Variables -->
            
          <!--  <input name="account_id" id="account_id" type="hidden" value="{$account_id}">-->
            <input name="return_url" type="hidden" size="60" value="{$return_url}" />
           <!-- <input name="mode" type="hidden" size="60" value="{$mode}" />
            <input type="hidden" value="{$secure_hash}" size="60" name="secure_hash">
            <input name="reference_no" type="hidden" value="{$reference_no}" />-->
            <input name="amount" type="hidden" value="{$amount}"/>
            <input name="description" type="hidden" value="{$description}" />
            <tr>
              <td>&nbsp;</td>
              <td><div class="submitPane" style="padding-left:0;padding-top:0;">
                  <ul>
                    <li class="blueBtnLi">
                      <input type="button" class="blueBtn"value="Pay Now"
                                 onclick="javascript:submitform()"/>
                    </li>
                    <li class="blueBtnLi">
                      <input type="button" class="blueBtn" value="Cancel" onclick="javascript:window.location.href='{$baseurl}archive_projects/cancel_order/{$proj_id}';" />
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
{literal}
<script type="text/javascript" charset="utf-8">
var baseurl='{/literal}{$baseurl}{literal}';
 function submitform()
  {
	  //if(validate())
	  //{
		  document.frmTransaction.submit();
	 /// }
  }
   </script> 
{/literal}