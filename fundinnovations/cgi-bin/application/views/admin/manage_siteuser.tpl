<script type="text/javascript" src="{$baseurl}js/admin/users.js"></script>
<script type="text/javascript" src="{$baseurl}js/admin/datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="{$baseurl}js/admin/datepicker/jquery.ui.datepicker.js"></script>
<link href="{$baseurl}styles/admin/datepicker/jquery.ui.all.css" rel="stylesheet" type="text/css" media="screen" />

{literal} 
<script type="text/javascript">
$(document).ready(function(){
	  var baseurl = '{/literal}{$baseurl}{literal}';
	  siteuserslist(baseurl);
	  
	  
});
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
			baseurl = '{/literal}{$baseurl}{literal}';
			 $.ajax({
					type: "POST",
					url: baseurl+"admin/users/get_cities/"+stid,  
					data: "", 
					success: function(msg){
						document.getElementById('city_load').innerHTML=msg;
					}
				});
		}
function getCityBox(val) {
	if(val=='other') {
		document.getElementById('city_load').innerHTML='<input name="city" id="city" type="text" />';
	}
}
$(document).ready(function(){
	$(function() {
 		var dates1 = $( "#start_on, #end_on" ).datepicker({
		   // defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			dateFormat: "dd-mm-yy",
			numberOfMonths: 1,
			firstDay: 1,
			//minDate: "+0d",
			
			onSelect: function( selectedDate ) {
					var option = this.id == "start_on" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
					instance.settings.dateFormat ||
					$.datepicker._defaults.dateFormat,
					selectedDate, instance.settings );
					dates1.not( this ).datepicker( "option", option, date );
					isDate('start_on');
					isDate('end_on');
			}
		});
	});
	$('#start_on').blur(function() {
		isDate('start_on');
	});
	$('#end_on').blur(function() {
		isDate('end_on');
	});
});
</script> 
{/literal}
<div class="shadow_outer" id="manage_siteusers">
  <div class="shadow_inner" >
    <h2 style="margin-left:5px;" id="manage_head">Manage {$page_headline} Site Users</h2>
    <div class="table_listing font_segoe" id="search_users">
      <form method="post" name="search" id="search" >
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <th colspan="2" align="left">Search User</th>
              <th align="left">&nbsp;</th>
              <th align="left">&nbsp;</th>
              <th colspan="2" align="right"><a href="{$baseurl}admin/users/add_user">Add New Site User</a></th>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="6"><div id="display">{if $updated_msg neq ''}{$updated_msg}{/if}</div></td>
            </tr>
            <tr class="shade01">
              <td width="9%" valign="middle" align="right"  >Email Id</td>
              <td width="25%" valign="middle" align="left"  ><div  style="position:relative">
                  <input type="text" name="emailId" id="emailId" class="textbox" style="width:180px;" />
                </div></td>
              <td width="12%" valign="middle" align="right" >Name</td>
              <td width="25%" valign="middle" align="left" ><input type="text" name="profileName" id="profileName" class="textbox" style="width:180px;" /></td>
              <td width="9%" valign="middle" align="right"  >Status</td>
              <td  width="25%" valign="middle" align="left" ><span class="select">
                <select name="user_fil_status" id="user_fil_status" style="width:180px;" >
                  <option value="">Select Status</option>
                  <option value="0">Not Verified</option>
                  <option value="1">Active</option>
                  <option value="2">Inactive</option>
                </select>
                </span></td>
              <!--{if $hide_type neq 1}	
                    <td width="12%" valign="middle" align="left"  >User Type</td>                    
                    <td width="25%" valign="middle" align="left" ><span class="select">
                     <select name="user_type" id="user_type" style="width:180px;" >
                     <option value="">Select User Type</option>
                     <option value="4">Individual</option>
                     <option value="5">Agent / Broker</option>
                     <option value="6">Builder / Developer</option>
                     </select>                                       
                  </span>  </td>
                  {else}
                  <td width="16%" valign="middle" colspan="2" align="left" >
                  <input type="hidden" name="user_type" id="user_type" /></td>
                  {/if}--> 
              
            </tr>
            <tr class="shade01">
              <td width="12%" valign="middle" align="right" >Date From</td>
              <td width="25%" valign="middle" align="left"><div  style="position:relative">
                  <input type="text" name="start_on" id="start_on" class="textbox" style="width:180px;" />
                </div></td>
              <td width="12%" valign="middle" align="right">To</td>
              <td width="25%" valign="middle" align="left"><div  style="position:relative">
                  <input type="text" name="end_on" id="end_on" class="textbox" style="width:180px;" />
                </div></td>
              <td width="12%" valign="middle" align="right"  >Contact No</td>
              <td width="25%" valign="middle" align="left" ><input type="text" name="contact_no" id="contact_no" class="textbox" style="width:180px;" /></td>
            </tr>
            <tr class="shade01">
              <td width="12%" valign="middle" align="right" >Country</td>
              <td width="25%" valign="middle" align="left"><select name="country" id="country" class="user_select" onchange="getCountry(this.value)"  />
                
                <option value="">Select country</option>
                {foreach from=$sel_country key=k item=cntry }
                <option value="{$cntry->countryid}"  >{$cntry->country}</option>
                {/foreach}
                </select></td>
              <td width="12%" valign="middle" align="right">State </td>
              <td width="25%" valign="middle" align="left"><div class="formValidation" id="state_load">
              <select name="state" id="state" class="user_select" onchange="getCities(this.value)"  />
                
                <option value="">Select State</option>
                {foreach from=$sel_states key=k item=st }
                <option value="{$st->st_id}" >{$st->state}</option>
                {/foreach}
                </select></div></td>
              <td width="12%" valign="middle" align="right">City </td>
              <td width="25%" valign="middle" align="left"><div  style="position:relative" id="city_load">
                  <select name="city" id="city" class="user_select"  onchange="getCityBox(this.value)"/>
                  
                  <option value="">Select City</option>
                  {foreach from=$sel_city key=k item=ct }
                  <option value="{$ct->city_id}" >{$ct->city_name}</option>
                  {/foreach}
                  {if $sel_city|@count gt 0}
                  <option value="other">Other</option>
                  {/if}
                  </select>
                </div></td>
              <!----> 
            </tr>
             <tr class="shade01">
             <td colspan="6" width="12%" valign="middle" align="left"  ><input type="checkbox" id="include_inactive" name="include_inactive"  value="include_inactive"/>  Include active users not logged for than 30 days</td> 
             </tr>
            <tr>
              <td align="right" colspan="6"><span class="btnlayout">
                <input type="button" value="Search" class="button" name="search_user" id="search_user" onclick="return search_siteusers('{$baseurl}');"/>
                </span></td>
            </tr>
            <tr>
              <td colspan="6" align="left" valign="top" height="8"></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="table_listing font_segoe" id="load_siteusers"> </div>
  </div>
  <!--End:Border 3-->
  <div id="Pagination" style="width:100%;float:left;top:2px;"></div>
</div>
<!--  <input type="hidden" name="hid_usrType" id="hid_usrType" value="{$url_type}" />-->
<input type="hidden" name="hid_currP" id="hid_currP" value="{$hidcurrP}" />
<input type="hidden" name="hid_orderBy" id="hid_orderBy" value="" />
<input type="hidden" name="hid_search" id="hid_search" value="" />
<input type="hidden" name="hid_email" id="hid_email" value="" />
<input type="hidden" name="hid_name" id="hid_name" value="" />
<input type="hidden" name="hid_user" id="hid_user" value="" />
<input type="hidden" name="hid_user_fil_status" id="hid_user_fil_status" value="" />
<input type="hidden" name="hid_start_on" id="hid_start_on" value="" />
<input type="hidden" name="hid_end_on" id="hid_end_on" value="" />
<input type="hidden" name="hid_country" id="hid_country" value="" />
<input type="hidden" name="hid_state" id="hid_state" value="" />
<input type="hidden" name="hid_city" id="hid_city" value="" />
<input type="hidden" name="hid_include_inactive" id="hid_include_inactive" value="" />
<input type="hidden" name="hid_contact_no" id="hid_contact_no" value="" />
<!--End:Border 2--> 
