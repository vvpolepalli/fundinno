<section  class="filter">
<div style=" clear: both;
    display: block;
    margin-left: 0;
    padding: 23px 28px 29px;
    width: 1010px;">
<div class="signUpresponse">
								<!--<div class="" style="width:740px; height:200px;">-->
                                {if $message eq 1}
                                
                                <h3>Transaction completed sucessfully.</h3>
                               
									Your {if $transactionId neq ''}Transaction Id is <strong>{$transactionId}</strong> and {/if} Order Id is <strong>{$orderid}</strong>.For any reference use your order id and transaction id. The project Innovator will contact you through email for your shipping address when the pre-ordered product becomes ready for shipping. In the meantime you can also update your shipping address in <a href="{$baseurl}user/edit_profile" >Edit Profile</a> page. Thanks.
                                
                               {else if $message eq 2}		
							        <h3>Transaction completed sucessfully.</h3>
									<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail
								{else if $message eq 3}
								     <h3>Transaction Decline.</h3>
									 <br><br>Thank you for shopping with us.However,the transaction has been declined.
                               {else}
                                   <!-- <h3>{$message}</h3>-->
                                    {if $orderstatus eq 'invalid'}
                                   An error occurred while processing your payment. Please try again later or contact admin. 
                                    {else if $orderstatus eq 'success'}
                                    You are successfully supported this project.The project Innovator will contact you through email for your shipping address when the pre-ordered product becomes ready for shipping. In the meantime you can also update your shipping address in <a href="{$baseurl}user/edit_profile" >Edit Profile</a> page. Thanks.
                                    {else}
                                    {literal}
                                    <script type="text/javascript">
									window.location.href="{/literal}{$baseurl}{literal}";
									</script>
                                   {/literal}
                                    {/if}
                                     {/if}
                                  
								</div>
								<div class="clear"></div>
    </div>
    
</section>