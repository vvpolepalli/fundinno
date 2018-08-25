<div class="investPropopup">
	<form name="frmback" id="frmback" method="post" action="{$baseurl}archive_projects/payment_form" >
    <input type="hidden" id="proj_id" name="proj_id" value="{$project_id}" />
      <input type="hidden" id="reward" name="reward" value="{$project_rewards.id}" />
		
       
		<ul><li style="border-bottom:none;padding-bottom:0; margin-bottom:0px; "><h5>Pre-Order amount: <span class="WebRupee">Rs. </span>{$project_rewards.pledge_amount}</h5>
 <span id="error_spn"></span></li>
			{if $min_pledge_amount gt 0} <li id="tabs">
				<div id="nav">
					
               <p> Minimum amount for pledge is {$min_pledge_amount}.</p>
					<div class="clear"></div>
				</div>
				
				<div class="clear"></div>
			</li>{/if}
              {if $project_rewards|@count gt 0}
           
            {if $min_pledge_amount gt 0}
            {if $project_rewards.pledge_amount gt $min_pledge_amount}
			<li>
				
				<div class="contentField" style="width:auto">{$project_rewards.description}</div><br />
                <p style="padding:10px 0 0;color:#999;">Estimated delivery :{$project_rewards.delivery_date|date_format}</p>
				<div class="clear"></div>
			</li>
            {/if}
            {else}<li>
				
				<div class="contentField" style="width:auto">{$project_rewards.description}</div><br />
                <p style="padding:10px 0 0;color:#999;">Estimated delivery :{$project_rewards.delivery_date|date_format}</p>
				<div class="clear"></div>
			</li>
            {/if}
            
			{/if}
            
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
{literal}
<script type="text/javascript" charset="utf-8">
var baseurl='{/literal}{$baseurl}{literal}';

function invest_project_page(){
	var min_pledge_amount = '{/literal}{$min_pledge_amount}{literal}';
	var proj_id =$('#proj_id').val();
	//alert($("input:radio[name=reward]:checked").val());
	//var pledged_option    = $("input:radio[name=reward]:checked").val();
	var pledge_amt='{/literal}{$project_rewards.pledge_amount}{literal}';
	$('#error_spn').html('');
    min_pledge_amount=min_pledge_amount;
	var uid='{/literal}{$user_id}{literal}';
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
{/literal}

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
</div>-->