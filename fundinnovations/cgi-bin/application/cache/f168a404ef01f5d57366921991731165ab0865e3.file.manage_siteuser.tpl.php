<?php /* Smarty version Smarty-3.1.8, created on 2013-02-14 16:30:32
         compiled from "/var/www/fundinnovations/application/views/admin/manage_siteuser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1844366486507694bc9a4af2-00779192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f168a404ef01f5d57366921991731165ab0865e3' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/manage_siteuser.tpl',
      1 => 1360838804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1844366486507694bc9a4af2-00779192',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_507694bca3b953_73499169',
  'variables' => 
  array (
    'baseurl' => 0,
    'page_headline' => 0,
    'updated_msg' => 0,
    'hide_type' => 0,
    'sel_country' => 0,
    'cntry' => 0,
    'sel_states' => 0,
    'st' => 0,
    'sel_city' => 0,
    'ct' => 0,
    'url_type' => 0,
    'hidcurrP' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507694bca3b953_73499169')) {function content_507694bca3b953_73499169($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/users.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/datepicker/jquery.ui.datepicker.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/datepicker/jquery.ui.all.css" rel="stylesheet" type="text/css" media="screen" />

 
<script type="text/javascript">
$(document).ready(function(){
	  var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	  siteuserslist(baseurl);
	  
	  
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

<div class="shadow_outer" id="manage_siteusers">
  <div class="shadow_inner" >
    <h2 style="margin-left:5px;" id="manage_head">Manage <?php echo $_smarty_tpl->tpl_vars['page_headline']->value;?>
 Site Users</h2>
    <div class="table_listing font_segoe" id="search_users">
      <form method="post" name="search" id="search" >
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <th colspan="2" align="left">Search User</th>
              <th align="left">&nbsp;</th>
              <th align="left">&nbsp;</th>
              <th colspan="2" align="right"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/users/add_user">Add New Site User</a></th>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="6"><div id="display"><?php if ($_smarty_tpl->tpl_vars['updated_msg']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['updated_msg']->value;?>
<?php }?></div></td>
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
              <!--<?php if ($_smarty_tpl->tpl_vars['hide_type']->value!=1){?>	
                    <td width="12%" valign="middle" align="left"  >User Type</td>                    
                    <td width="25%" valign="middle" align="left" ><span class="select">
                     <select name="user_type" id="user_type" style="width:180px;" >
                     <option value="">Select User Type</option>
                     <option value="4">Individual</option>
                     <option value="5">Agent / Broker</option>
                     <option value="6">Builder / Developer</option>
                     </select>                                       
                  </span>  </td>
                  <?php }else{ ?>
                  <td width="16%" valign="middle" colspan="2" align="left" >
                  <input type="hidden" name="user_type" id="user_type" /></td>
                  <?php }?>--> 
              
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
                </select></td>
              <td width="12%" valign="middle" align="right">State </td>
              <td width="25%" valign="middle" align="left"><div class="formValidation" id="state_load">
              <select name="state" id="state" class="user_select" onchange="getCities(this.value)"  />
                
                <option value="">Select State</option>
                <?php  $_smarty_tpl->tpl_vars['st'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['st']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sel_states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['st']->key => $_smarty_tpl->tpl_vars['st']->value){
$_smarty_tpl->tpl_vars['st']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['st']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['st']->value->st_id;?>
" ><?php echo $_smarty_tpl->tpl_vars['st']->value->state;?>
</option>
                <?php } ?>
                </select></div></td>
              <td width="12%" valign="middle" align="right">City </td>
              <td width="25%" valign="middle" align="left"><div  style="position:relative" id="city_load">
                  <select name="city" id="city" class="user_select"  onchange="getCityBox(this.value)"/>
                  
                  <option value="">Select City</option>
                  <?php  $_smarty_tpl->tpl_vars['ct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ct']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sel_city']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ct']->key => $_smarty_tpl->tpl_vars['ct']->value){
$_smarty_tpl->tpl_vars['ct']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['ct']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['ct']->value->city_id;?>
" ><?php echo $_smarty_tpl->tpl_vars['ct']->value->city_name;?>
</option>
                  <?php } ?>
                  <?php if (count($_smarty_tpl->tpl_vars['sel_city']->value)>0){?>
                  <option value="other">Other</option>
                  <?php }?>
                  </select>
                </div></td>
              <!----> 
            </tr>
             <tr class="shade01">
             <td colspan="6" width="12%" valign="middle" align="left"  ><input type="checkbox" id="include_inactive" name="include_inactive"  value="include_inactive"/>  Include active users not logged for than 30 days</td> 
             </tr>
            <tr>
              <td align="right" colspan="6"><span class="btnlayout">
                <input type="button" value="Search" class="button" name="search_user" id="search_user" onclick="return search_siteusers('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
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
    <div class="table_listing font_segoe" id="load_siteusers"> </div>
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
<?php }} ?>