<script type="text/javascript" src="{$baseurl}js/jquery.form.js"></script>

{literal} 
<script type="text/javascript" >

	$(document).ready(function() {
		var baseurl=$('#baseurl').val();
		var country_id='{/literal}{$city_arr.CountryID}{literal}';
		var state_id='{/literal}{$city_arr.state_id}{literal}';
		if(country_id !='' & state_id !=''){
			getCountrystate(country_id,state_id);
			
			//$('#country').val(country_id);
		}
		
	$("#state").change(validateState);
	
	$('#country').change(validateCountry);

	$('#city').blur(validateCity);

	

	});
	
	
	function save_city() {
	//var PlanSel = $("#main_list").val();
	if(validateState() & validateCountry() & validateCity())
			document.addcity.submit();
	//} 
	}
	
	function getCountrystate(cid,sid)
	{
		baseurl = '{/literal}{$baseurl}{literal}';
		 $.ajax({
				type: "POST",
				url: baseurl+"admin/users/get_country/"+cid,  
				data: "", 
				success: function(msg){
					document.getElementById('state_load').innerHTML=msg;
					$('#country').val(cid);
					$("#state").val(sid);
				}
			});
	}
	
	function getCountry(cid)
	{
		baseurl = '{/literal}{$baseurl}{literal}';
		 $.ajax({
				type: "POST",
				url: baseurl+"admin/users/get_country/"+cid,  
				data: "", 
				success: function(msg){
					document.getElementById('state_load').innerHTML=msg;
				}
			});
	}
		function getCities(stid)
		{
			/*baseurl = '{/literal}{$baseurl}{literal}';
			 $.ajax({
					type: "POST",
					url: baseurl+"admin/users/get_cities/"+stid,  
					data: "", 
					success: function(msg){
						//document.getElementById('city_load').innerHTML=msg;
					}
				});*/
		}
		
		//function for validating State
		function validateState()
		{
		
			$("#state_error").hide();	
			if($("#state").val()=='')
			{
			$("#state").after('<div class="clear"/><span class="error" id="state_error"><span>This field is required</span></span>');
			return false;
			}
			else
			{
			
			$("#state").after('<div class="clear"/><span class="checked" id="state_error"><span></span></span>');
			return true;
			
			
			}
		}
		
		
		//function for validating Country
		function validateCountry()
		{
		
			$("#country_error").hide();	
			if($("#country").val()=='')
			{
			$("#country").after('<div class="clear"/><span class="error" id="country_error"><span>This field is required</span></span>');
			return false;
			}
			else
			{
			
			$("#country").after('<div class="clear"/><span class="checked" id="country_error"><span></span></span>');
			return true;
			
			
			}
		}
		
		
		//function for validating City
	  function validateCity()
	  {
	  
	  $("#city_error").hide();	
	  var city_type = $('#city').attr('type');
		  if(city_type!='text') {	
			  if($("#city").val()=='')
			  {
			  $("#city").after('<div class="clear"/><span class="error" id="city_error"><span>This field is required</span></span>');
			  return false;
			  }
			  else
			  {
			  
			  $("#city").after('<div class="clear"/><span class="checked" id="city_error"><span></span></span>');
			  return true;
			  }
		  } else {
			  if($("#city").val()=='')
			  {
				  $("#city").after('<div class="clear"/><span class="error" id="city_error"><span>This field is required</span></span>');
				  return false;
			  }
			  else if($("#city").val()=='other')
			  {
				  $("#city").after('<div class="clear"/><span class="error" id="city_error"><span>Enter valid City</span></span>');
				  return false;
			  }
			  else if(ValidateString($("#city").val())==false)
			  {
				  $("#city").after('<div class="clear"/><span class="error" id="city_error"><span>Characters Only</span></span>');
				  return false;	
			  }
			  else
			  {
			  $("#city").after('<div class="clear"/><span class="checked" id="city_error"><span></span></span>');
			  return true;
			  }
		  }
	  }
	  
	  function ValidateString(str){    
			re = /^[A-Za-z ]+$/;
			if(re.test(str))
			{
			   return true;
			}
			else
			{
			   return false;
			}
	 }
		

    </script> 
{/literal}
<div class="shadow_outer">
  <div class="shadow_inner" > 
    <!--<input type="hidden" name="imgpath" id="imgpath" value="{$baseurl}swfupload/">-->
    <input type="hidden" name="baseurl" id="baseurl" value="{$baseurl}">
    <input type="hidden" name="city_id" id="city_id" value="{$city_arr.city_id}">
    <div class="table_listing font_segoe "> 
       <form  name="addcity" id="addcity" method="post" action="{$baseurl}admin/city/{if $city_arr|@count gt 0 && $city_arr neq 0}update_city/{$city_arr.city_id}{else}add_city{/if}" enctype="multipart/form-data" >
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
              <tbody>
                <tr>
                  <th colspan="2" align="left"><h2 style="margin-left:5px;">{if $city_arr.city_id neq ''}Update {else}Add  {/if} city</h2></th>
                </tr>
                <tr id="field_header">
                  <td valign="top" colspan="2" align="left" >Fields marked with <span class="star">*</span> are required</td>
                </tr>
                <tr>
                  <td align="left" valign="top" colspan="2"><div id="display">{if $updated_msg neq ''}{$updated_msg}{/if}</div></td>
                </tr>
           
                <tr  class="shade01">

                  <td  align="right" valign="top">Country<span style="color:#F00">*</span></td>
                  <td  align="left" valign="top">
                   <div class="formValidation" >
              <select name="country" id="country" class="" onchange="getCountry(this.value)" style="width: 300px;" />
                
                <option value="">Select country</option>
                {foreach from=$sel_country key=k item=cntry }
                <option value="{$cntry->countryid}"  >{$cntry->country}</option>
                {/foreach}
                </select></div></td>

                </tr>
                <tr  >

                  <td valign="top" align="right">State <span style="color:#F00">*</span></td>
                    
                  <td valign="top" align="left"><div class="formValidation loadCityfixWidth" id="state_load">
              <select name="state" id="state" class="" style="width: 300px;" />
                <option value="">Select State</option>
              </select>
              </div></td>

                </tr>
                <tr class="shade01">
               
                  <td valign="top" align="right">City <span style="color:#F00">*</span></td>
                    
                  <td  align="left" valign="top"><div class="formValidation">
                      <input type="text" name="city"  class="textbox" style="width: 300px;"  id="city" value="{$city_arr.city_name}" />
                    </div></td>
       
                  
                </tr>
                
                <tr>
                  <td valign="top" align="left">&nbsp;</td>
                  <td valign="top" align="left"><span class="btnlayout">
                    <input type="button" value="Save" id="savebtn" class="button" name="savebtn" onClick="return save_city();"   />
                    </span> <span class="btnlayout ">
                    <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='{$baseurl}admin/city'"/>
                    </span></td>
                </tr>
              </tbody>
            </table>
          </form>
       
         
    
    </div>
  </div>
  
  
</div>
<!--End:Border 2--> 