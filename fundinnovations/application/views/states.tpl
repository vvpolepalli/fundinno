<select name="state" id="state" class="selectBx" onChange="getCities(this.value)" />

<option value="">Select State</option>
{foreach from=$sel_states key=k item=st }
<option value="{$st->st_id}" >{$st->state}</option>
{/foreach}
</select>
