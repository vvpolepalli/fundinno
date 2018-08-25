<section  class="filter">
<div style=" clear: both;
    display: block;
    margin-left: 0;
    padding: 23px 28px 29px;
    width: 1010px;">

	{if $msg eq 'success'}
    <div class="signUpresponse">We have sent a confirmation email to your {if $sign_up_email_id neq ''}{$sign_up_email_id} account{else} mail id{/if}. Request you to click on the link given in mail to confirm your email address submitted with us. Please do add our official email address in the address book in order to prevent the mail land on your Spam folder. Please <a href="{$baseurl}signin">Login</a>
   </div>
    {else if $msg eq 'error'}
   <div class="signUpresponse">There is error occured in sign up. Please try again.</div>
    {/if}
	
	<div class="clear"></div>
    </div>
    
</section>