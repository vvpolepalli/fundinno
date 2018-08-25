<section  class="filter">
<div class="filterInner">
	{if $response eq 'yes'}
     <span>Your Account is Activated. Please <a href="{$baseurl}signin">login</a></span>
    {else}
    <span>The Code and User id doesn't match! Account is not Activated.</span>
    {/if}
	
	<div class="clear"></div>
    </div>
    
</section>