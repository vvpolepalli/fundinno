<?php /* Smarty version Smarty-3.1.8, created on 2013-01-23 11:20:27
         compiled from "/var/www/fundinnovations/application/views/admin/city/manage_city.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212918758050a498f5257ff3-37757018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '388cac743af8a46801ea7b2d4ad1a7ab42aa065b' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/city/manage_city.tpl',
      1 => 1358849911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212918758050a498f5257ff3-37757018',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a498f52e38f6_96582445',
  'variables' => 
  array (
    'baseurl' => 0,
    'updated_msg' => 0,
    'sel_country' => 0,
    'cntry' => 0,
    'url_type' => 0,
    'hidcurrP' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a498f52e38f6_96582445')) {function content_50a498f52e38f6_96582445($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/city.js"></script>

 
<script type="text/javascript">
$(document).ready(function(){
	  var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	city_list(baseurl);
	  
	  
});
function getCountry(cid)
		{
			baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
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
			baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
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
              <th colspan="2" align="right"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/city/add_city">Add new city</a></th>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="6"><div id="display"><?php if ($_smarty_tpl->tpl_vars['updated_msg']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['updated_msg']->value;?>
<?php }?></div></td>
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
                <?php  $_smarty_tpl->tpl_vars['cntry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cntry']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sel_country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cntry']->key => $_smarty_tpl->tpl_vars['cntry']->value){
$_smarty_tpl->tpl_vars['cntry']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['cntry']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['cntry']->value->countryid;?>
"  ><?php echo $_smarty_tpl->tpl_vars['cntry']->value->country;?>
</option>
                <?php } ?>
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
                <input type="button" value="Search" class="button" name="search_user" id="search_user" onclick="return search_city('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');"/>
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
<!--  <input type="hidden" name="hid_usrType" id="hid_usrType" value="<?php echo $_smarty_tpl->tpl_vars['url_type']->value;?>
" />-->
<input type="hidden" name="hid_currP" id="hid_currP" value="<?php echo $_smarty_tpl->tpl_vars['hidcurrP']->value;?>
" />
<input type="hidden" name="hid_orderBy" id="hid_orderBy" value="" />
<input type="hidden" name="hid_search" id="hid_search" value="" />
<input type="hidden" name="hid_city_name" id="hid_city_name" value="" />
<input type="hidden" name="hid_country" id="hid_country" value="" />
<input type="hidden" name="hid_state" id="hid_state" value="" />
<input type="hidden" name="hid_status" id="hid_status" value="" />
<!--End:Border 2--> 
<?php }} ?>