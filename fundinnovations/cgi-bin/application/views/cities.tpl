<select name="city" id="city" class="selectBx"   />
<option value="">Select City</option>
{foreach from=$sel_city key=k item=ct }
<option value="{$ct->city_id}" >{$ct->city_name}</option>
{/foreach}
</select>