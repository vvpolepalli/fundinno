<div class="investPropopup">
	<form name="frmback" id="frmback" method="post" action="{$baseurl}archive_projects/payment_form" >
    <input type="hidden" id="proj_id" name="proj_id" value="{$project_id}" />
      
		<!--<h5>Pledge amount: </h5>-->
        <span id="error_spn" style="color:#C33"></span>
		<ul>
			<!--<li id="tabs">
				<div id="nav">
					<input type="radio" id="no_reward" name="reward" value="no" onclick="change_fn(this)" checked="checked" class="div1" />
					<label>No reward.</label>
					<div class="contentField"  style="width:auto">I just want to support this project.</div>
                    <br />
            
					<div class="clear"></div>
				</div>
				<div id="div1" class="tab" style="display:block">
					<input type="text" style="float:left;" class="textBoxStyle" id="pledge_amt" name="pledge_amt"  value="">
				</div>
				<div class="clear"></div>
			</li>-->
              {if $project_rewards|@count gt 0}
            {foreach from=$project_rewards item='reward' key=k}
            {if $min_pledge_amount gt 0}
            {if $reward.pledge_amount gt $min_pledge_amount}
			<li>
				<input type="radio" id="reward{$reward.id}" name="reward" value="{$reward.id}" onclick="change_fn(this)" />
				<label><span class="WebRupee">Rs. </span>{$reward.pledge_amount}</label>
                <div class="clear"></div>
				<div class="contentField" style="width:auto">{$reward.description}</div><br />
                <p style="padding:10px 0 0;color:#666;">Estimated delivery :{$reward.delivery_date|date_format}</p>
				<div class="clear"></div>
			</li>
            {/if}
            {else}
            <li>
				<input type="radio" id="reward{$reward.id}" name="reward" value="{$reward.id}" {if $k eq 0}checked="checked" {/if} onclick="change_fn(this)" />
				<label><span class="WebRupee">Rs. </span>{$reward.pledge_amount}</label>
                <div class="clear"></div>
				<div class="contentField"  style="width:auto">{$reward.description}</div><br />
                <p style="padding:10px 0 0;color:#999;">Estimated delivery :{$reward.delivery_date|date_format}</p>
				<div class="clear"></div>
			</li>
            {/if}
            {/foreach}
            {else}
            No Pre-Order items found.
            {/if}
			<!--<li>
				<input type="radio" id="reward1" name="reward" value="1" onclick="change_fn(this)" />
				<label>2</label>
				<div class="contentField">content</div>
				<div class="clear"></div>
			</li>-->
           {if $project_rewards|@count gt 0}  
			<li class="submitPane">
				<ul>
					<li style="float:left; clear:none">
						<!--<input type="button" id="invest" name="invest" class="blueBtn" value="Invest" onClick="invest_project_page()">-->
                        <input type="button" id="invest" name="invest" class="blueBtn" value="Continue" onClick="return invest_project_page()">
					</li>
						<li style="float:left; clear:none">
						<input type="button" id="cancel" name="cancel" class="grayBtn" value="Cancel" onClick="close_pop('back_popup');">
					</li>
				</ul>
				<div class="clear"></div>
			</li>
              {/if}
		</ul>
	</form>
	<div class="clear"></div>
</div>
{literal}
<script type="text/javascript" charset="utf-8">
var baseurl='{/literal}{$baseurl}{literal}';
function change_fn(ths){
	if($(ths).val() == 'no'){
		$('#div1').show();
	}else{
		$('#div1').hide();
	}
}
function invest_project_page(){
	var min_pledge_amount = '{/literal}{$min_pledge_amount}{literal}';
	var proj_id =$('#proj_id').val();
	//alert($("input:radio[name=reward]:checked").val());
	var pledged_option    = $("input:radio[name=reward]:checked").val();
	var pledge_amt='';
	$('#error_spn').html('');
    min_pledge_amount=min_pledge_amount;
	var uid='{/literal}{$user_id}{literal}';
	if(uid ==''){
		//$('#alert_popup').show();openpPopup()
		//$('#alert_pop_cntnt').html('Please login first...');
		//var proj_id=proj_id;
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
		if(pledged_option !=''){
		if(pledged_option == 'no'){
			pledge_amt = $('#pledge_amt').val();
			$("#pledge_amt_error").remove();
			if(pledge_amt == '' || pledge_amt==0)
			{
				//alert("Enter Billing  Name");
				//$("#pledge_amt").focus();
				$("#pledge_amt").after('<span class="error" style="clear:both" id="pledge_amt_error"><span>This field is required</span></span>');
				return false;	
			} 
			else if(isNaN(parseFloat(pledge_amt)))
			  {
					$("#pledge_amt").after('<div  class="error" style="clear:both"  id="pledge_amt_error"><span>Numeric Values only</span></div>');
				  return false;	
			  }
			else{
				$("#pledge_amt_error").remove();
			if(min_pledge_amount >0){
			if(parseFloat(pledge_amt)  < parseFloat(min_pledge_amount)){
				//alert(min_pledge_amount);alert(pledge_amt);
				$('#error_spn').html('Please enter amount more than minimum pledge amount.');
				return false;
				}
				else{
					
					$('#back_pop_cntnt').slideUp();
							$('#back_terms_pop_cntnt').slideDown();
					$.ajax({
						type: "POST",
						url: baseurl+"archive_projects/get_backing_terms",
						data: {project_id:proj_id,amount:pledge_amt}, 
						success: function(msg){
						//$('#back_popup').hide();
							//$('#back_terms_popup').show();openpPopup();
							
							$('#back_terms_pop_cntnt').html(msg);
							//close_pop('back_popup');
							
						}
					});
				}
			
			}else{
				$.ajax({
					type: "POST",
					url: baseurl+"archive_projects/get_backing_terms",
					data: {project_id:proj_id,amount:pledge_amt}, 
					success: function(msg){
						//$('#back_popup').hide();
						/*$('#back_terms_popup').show();openpPopup();*/
						$('#back_pop_cntnt').slideUp();
							$('#back_terms_pop_cntnt').slideDown();
						$('#back_terms_pop_cntnt').html(msg);
						//close_pop('back_popup');
						
					}
				});
			}
			}
		}else{
				$.ajax({
					type: "POST",
					url: baseurl+"archive_projects/get_backing_terms",
					data: {project_id:proj_id,amount:pledge_amt}, 
					success: function(msg){
						//$('#back_popup').hide();
						/*$('#back_terms_popup').show();openpPopup();*/
						$('#back_pop_cntnt').slideUp();
						$('#back_terms_pop_cntnt').slideDown();
						$('#back_terms_pop_cntnt').html(msg);
						//close_pop('back_popup');
						
					}
				});
			}
		
	
	}
}
	//alert($('reward').val())
}


/*function IsNumeric(strString)
		{
		   var strValidChars = "0123456789";
		   var strChar;
		   var blnResult = true;
		   if (strString.length == 0) return false;
		
		   for (i = 0; i < strString.length && blnResult == true; i++)
			  {
			  strChar = strString.charAt(i);
			  if (strValidChars.indexOf(strChar) == -1)
					{
					 blnResult = false;
					}
			  }
		   return blnResult;
		}*/

  </script> 
{/literal}

<!--<div id="back_terms_popup" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner">
     <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('back_terms_popup');close_pop('back_popup')">Close</a>
      <div class="popTitle">
        <h4>Terms to invest a project</h4></div>
        <div id="back_terms_pop_cntnt" class="prodeForm"></div>
      
    </div>
    <div class="clear"></div>
  </div>
 </div>
</div>-->