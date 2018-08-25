<section  class="filter">
<div style=" clear: both;
    display: block;
    margin-left: 0;
    padding: 23px 28px 29px;
    width: 1010px;">

	{if $msg eq 'success'}
    <div class="signUpresponse">Dear member, you have successfully unsubscribed from newsletter subscription service. You will no longer receive any newsletter from us.</div>
     
    {else if $msg eq 'error'}
   <div class="signUpresponse">There is error occured. Please try again.</div>
    {/if}
	
	<div class="clear"></div>
    </div>
    
</section>