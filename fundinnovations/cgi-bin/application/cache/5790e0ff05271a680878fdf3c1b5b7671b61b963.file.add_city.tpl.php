<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 05:00:49
         compiled from "/home/fundinno/public_html/application/views/admin/city/add_city.tpl" */ ?>
<?php /*%%SmartyHeaderCode:508819318515c0be1e8bed4-53351199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5790e0ff05271a680878fdf3c1b5b7671b61b963' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/city/add_city.tpl',
      1 => 1358849921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '508819318515c0be1e8bed4-53351199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'city_arr' => 0,
    'updated_msg' => 0,
    'sel_country' => 0,
    'cntry' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c0be20982d7_52463326',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c0be20982d7_52463326')) {function content_515c0be20982d7_52463326($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery.form.js"></script>

 
<script type="text/javascript" >

	$(document).ready(function() {
		var baseurl=$('#baseurl').val();
		var country_id='<?php echo $_smarty_tpl->tpl_vars['city_arr']->value['CountryID'];?>
';
		var state_id='<?php echo $_smarty_tpl->tpl_vars['city_arr']->value['state_id'];?>
';
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
		baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
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
			/*baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
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

<div class="shadow_outer">
  <div class="shadow_inner" > 
    <!--<input type="hidden" name="imgpath" id="imgpath" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
swfupload/">-->
    <input type="hidden" name="baseurl" id="baseurl" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
">
    <input type="hidden" name="city_id" id="city_id" value="<?php echo $_smarty_tpl->tpl_vars['city_arr']->value['city_id'];?>
">
    <div class="table_listing font_segoe "> 
       <form  name="addcity" id="addcity" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/city/<?php if (count($_smarty_tpl->tpl_vars['city_arr']->value)>0&&$_smarty_tpl->tpl_vars['city_arr']->value!=0){?>update_city/<?php echo $_smarty_tpl->tpl_vars['city_arr']->value['city_id'];?>
<?php }else{ ?>add_city<?php }?>" enctype="multipart/form-data" >
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
              <tbody>
                <tr>
                  <th colspan="2" align="left"><h2 style="margin-left:5px;"><?php if ($_smarty_tpl->tpl_vars['city_arr']->value['city_id']!=''){?>Update <?php }else{ ?>Add  <?php }?> city</h2></th>
                </tr>
                <tr id="field_header">
                  <td valign="top" colspan="2" align="left" >Fields marked with <span class="star">*</span> are required</td>
                </tr>
                <tr>
                  <td align="left" valign="top" colspan="2"><div id="display"><?php if ($_smarty_tpl->tpl_vars['updated_msg']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['updated_msg']->value;?>
<?php }?></div></td>
                </tr>
           
                <tr  class="shade01">

                  <td  align="right" valign="top">Country<span style="color:#F00">*</span></td>
                  <td  align="left" valign="top">
                   <div class="formValidation" >
              <select name="country" id="country" class="" onchange="getCountry(this.value)" style="width: 300px;" />
                
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
                      <input type="text" name="city"  class="textbox" style="width: 300px;"  id="city" value="<?php echo $_smarty_tpl->tpl_vars['city_arr']->value['city_name'];?>
" />
                    </div></td>
       
                  
                </tr>
                
                <tr>
                  <td valign="top" align="left">&nbsp;</td>
                  <td valign="top" align="left"><span class="btnlayout">
                    <input type="button" value="Save" id="savebtn" class="button" name="savebtn" onClick="return save_city();"   />
                    </span> <span class="btnlayout ">
                    <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/city'"/>
                    </span></td>
                </tr>
              </tbody>
            </table>
          </form>
       
         
    
    </div>
  </div>
  
  
</div>
<!--End:Border 2--> <?php }} ?>