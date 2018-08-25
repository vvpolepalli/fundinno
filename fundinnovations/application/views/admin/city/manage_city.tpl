<script type="text/javascript" src="{$baseurl}js/admin/city.js"></script>

{literal} 
<script type="text/javascript">
$(document).ready(function(){
	  var baseurl = '{/literal}{$baseurl}{literal}';
	city_list(baseurl);
	  
	  
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
						//document.getElementById('city_load').innerHTML=msg;
					}
				});
		}
function getCityBox(val) {
	if(val=='other') {
		document.getElementById('city_load').innerHTML='<input name="city" id="city" type="text" />';
	}
}

</script> 
{/literal}
<div class="shadow_outer" id="manage_siteusers">
  <div class="shadow_inner" >
    <h2 style="margin-left:5px;" id="manage_head">Manage City</h2>
    <div class="table_listing font_segoe" id="search_projects">
      <form method="post" name="search" id="search" >
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <th colspan="2" align="left">Search city</th>
              <th align="left">&nbsp;</th>
              <th align="left">&nbsp;</th>
              <th colspan="2" align="right"><a href="{$baseurl}admin/city/add_city">Add new city</a></th>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="6"><div id="display">{if $updated_msg neq ''}{$updated_msg}{/if}</div></td>
            </tr>
            <tr class="shade01">
              <td width="9%" valign="middle" align="right" style="" >City</td>
              <td width="25%" valign="middle" align="left" style="" ><div  style="position:relative">
                  <input type="text" name="city_name" id="city_name" class="textbox" style="width:180px;" />
                </div></td>
              <td width="12%" valign="middle" align="right" style="">Country</td>
              <td width="25%" valign="middle" align="left" style="">
              <div class="formValidation" >
              <select name="country" id="country" class="user_select" onchange="getCountry(this.value)"  />
                
                <option value="">Select country</option>
                {foreach from=$sel_country key=k item=cntry }
                <option value="{$cntry->countryid}"  >{$cntry->country}</option>
                {/foreach}
                </select></div></td>
              <td width="9%" valign="middle" align="right" style="" >State</td>
              <td  width="25%" valign="middle" align="left" style="">
              <div class="formValidation" id="state_load">
              <select name="state" id="state" class="user_select"  />
                <option value="">Select State</option>
              </select>
              </div>
              </td>
            </tr>
        
            <tr>
            <td>&nbsp;</td>
              <td align="right" colspan="5"><span class="btnlayout">
                <input type="button" value="Search" class="button" name="search_user" id="search_user" onclick="return search_city('{$baseurl}');"/>
                </span></td>
            </tr>
            <tr>
              <td colspan="6" align="left" valign="top" height="8"></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="table_listing font_segoe" id="load_city"> </div>
  </div>
  <!--End:Border 3-->
  <div id="Pagination" style="width:100%;float:left;top:2px;"></div>
</div>
<!--  <input type="hidden" name="hid_usrType" id="hid_usrType" value="{$url_type}" />-->
<input type="hidden" name="hid_currP" id="hid_currP" value="{$hidcurrP}" />
<input type="hidden" name="hid_orderBy" id="hid_orderBy" value="" />
<input type="hidden" name="hid_search" id="hid_search" value="" />
<input type="hidden" name="hid_city_name" id="hid_city_name" value="" />
<input type="hidden" name="hid_country" id="hid_country" value="" />
<input type="hidden" name="hid_state" id="hid_state" value="" />
<input type="hidden" name="hid_status" id="hid_status" value="" />
<!--End:Border 2--> 
