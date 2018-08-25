<script type="text/javascript" src="{$baseurl}js/admin/category.js"></script>
{literal} 
<script type="text/javascript">
$(document).ready(function(){
	  var baseurl = '{/literal}{$baseurl}{literal}';
	  categorylist(baseurl);
	  
	  
});

</script> 
{/literal}
<div class="shadow_outer" id="manage_siteusers">
  <div class="shadow_inner" >
    <h2 style="margin-left:5px;" id="manage_head">Manage category</h2>
    <div class="table_listing font_segoe" id="search_users">
      <form method="post" name="search" id="search" onsubmit="return false;" >
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <th colspan="2" align="left">Search Category</th>
              <th align="right"><a href="{$baseurl}admin/category/add_new_category">Add new category</a></th>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="3"><div id="display">{if $updated_msg neq ''}{$updated_msg}{/if}</div></td>
            </tr>
            <tr class="shade01">
              <td width="" valign="middle" align="right"  >Category Name</td>
              <td width="250" valign="middle" align="left"  ><div  style="position:relative">
                  <input type="text" name="category" id="category" class="textbox" style="width:280px;" />
                </div></td>
              <td width="" valign="middle" align="left" ><span class="btnlayout">
                <input type="button" value="Search" class="button" name="search_user" id="search_user" onclick="return search_category('{$baseurl}');"/>
                </span></td>
            </tr>
            <tr>
              <td colspan="3" align="left" valign="top" height="8"></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="table_listing font_segoe" id="load_categorylist"> </div>
  </div>
  <!--End:Border 3-->
  <div id="Pagination" style="width:100%;float:left;top:2px;"></div>
</div>
<input type="hidden" name="hid_currP" id="hid_currP" value="{$hidcurrP}" />
<input type="hidden" name="hid_category" id="hid_category" value="" />
<input type="hidden" name="hid_orderBy" id="hid_orderBy" value="" />
<input type="hidden" name="hid_search" id="hid_search" value="" />