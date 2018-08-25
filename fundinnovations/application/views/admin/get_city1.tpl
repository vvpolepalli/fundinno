<select name="city" id="city" class="user_select"  onchange="getCityBox(this.value)"/>
<option value="">Select City</option>
{foreach from=$sel_city key=k item=ct }
<option value="{$ct->city_id}" "{if $cityId}{if $cityId == $ct->city_id}}" selected="selected" "{/if}{/if}">{$ct->city_name}</option>
{/foreach}
{if $sel_city|@count gt 0}
<option value="other">Other</option>
{/if}
</select>