<?php /* Smarty version Smarty-3.1.8, created on 2013-02-21 16:59:19
         compiled from "/var/www/fundinnovations/application/views/projects/payment_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46987341150efe5e01926b7-77421879%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8441edb2817021a3219deba7ec7da3fa7b62ee8f' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/payment_form.tpl',
      1 => 1361444658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46987341150efe5e01926b7-77421879',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50efe5e01dc109_62088904',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_id' => 0,
    'fundinnovation_cash' => 0,
    'transfer_amnt' => 0,
    'amount' => 0,
    'reward_selected' => 0,
    'pledge_amount' => 0,
    'account_id' => 0,
    'return_url' => 0,
    'mode' => 0,
    'secure_hash' => 0,
    'reference_no' => 0,
    'description' => 0,
    'sel_country' => 0,
    'cntry' => 0,
    'cities' => 0,
    'c' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50efe5e01dc109_62088904')) {function content_50efe5e01dc109_62088904($_smarty_tpl) {?><section class="innerMidWrap">
<div class="">
  <div class="contentBlock"> 

   <!-- <form id="frm_payment" name="frm_payment" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/continue_payment" onSubmit="return validate()" method="post" >-->
    <form  method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">
    <input type="hidden" id="proj_id" name="proj_id" value="<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
" />
     <input type="hidden" id="fundinnovation_cash" name="fundinnovation_cash" value="<?php echo $_smarty_tpl->tpl_vars['fundinnovation_cash']->value;?>
" />
     <!-- <input type="hidden" id="transfer_amnt" name="transfer_amnt" value="<?php echo $_smarty_tpl->tpl_vars['transfer_amnt']->value;?>
" />-->
      <input type="hidden" id="funding_amount" name="funding_amount" value="<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
" />
      <input type="hidden" id="reward_selected" name="reward_selected" value="<?php echo $_smarty_tpl->tpl_vars['reward_selected']->value;?>
" />
      <div style="margin:0 auto;width:999px" class="paymentFoRee">
      <table   cellpadding="8" cellspacing="8" border="0"  style="border-spacing:8px;border-collapse: inherit;margin-left:-8px;">
        <tr>
          <td><label>Pre-Order Amount </label></td>
          <td> <span class="WebRupee">Rs. </span><?php echo $_smarty_tpl->tpl_vars['pledge_amount']->value;?>
 </td>
        </tr>
        <tr>
          <td><label>Fundinnovation cash </label></td>
          <td> <span class="WebRupee">Rs. </span><?php echo $_smarty_tpl->tpl_vars['fundinnovation_cash']->value;?>
 </td>
        </tr>
        <tr>
          <td><label>Amount Payable</label></td>
          <td> <span class="WebRupee">Rs. </span><?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
 </td>
        </tr>
  <tr><td colspan="2">&nbsp;<h3>Note:<span> Amount payable = Pre-Order Amount – FundInnovations Cash.</span> </h3></td></tr>
                                <!--EBS Payment Variables -->
                                
                                <input name="account_id" id="account_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['account_id']->value;?>
">     
                                <input name="return_url" type="hidden" size="60" value="<?php echo $_smarty_tpl->tpl_vars['return_url']->value;?>
" />
                                <input name="mode" type="hidden" size="60" value="<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
" />
                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['secure_hash']->value;?>
" size="60" name="secure_hash">
                                <input name="reference_no" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['reference_no']->value;?>
" />
                                <input name="amount" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
"/>
                                <input name="description" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" /> 
                                
                               
                               
                                  <tr> <td colspan="3"><h5 style="padding:20px 0 10px;border-bottom:1px solid #ddd;margin-bottom:12px">Enter Billing Address</h5></td></tr>
                               <!-- <table width="70%" border="0" cellspacing="0" cellpadding="0">-->
                                
                                <tr>
                                <td width="30%"><label>Name <span class="redstar">*</span></label></td>
                                <td width="40%" colspan="2">
                                <div class="fieldTxP ">
                                <input name="name" type="text" value="" class="textBoxStyle" id="name"/>
                                </div>
                                </td>
                                </tr>
                                <tr>
                                <td><label>Address<span class="redstar">*</span></label></td>
                                <td colspan="2">
                                <div class="fieldTxP ">
                                <textarea name="address" class="textBoxStyle height120"  id="address"></textarea>
                                </div>
                                </td>
                                </tr>
                                <tr>
                                <td><label>Country<span class="redstar">*</span></label></td>
                                <td colspan="2">
                                 <div class="fieldTxP ">
                                 <select name="country" id="country" class="selectBx" onchange="getCountry(this.value)" />
                    			<?php  $_smarty_tpl->tpl_vars['cntry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cntry']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sel_country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cntry']->key => $_smarty_tpl->tpl_vars['cntry']->value){
$_smarty_tpl->tpl_vars['cntry']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['cntry']->key;
?>
            					<option value="<?php echo $_smarty_tpl->tpl_vars['cntry']->value->countryid;?>
" <?php if ($_smarty_tpl->tpl_vars['cntry']->value->countryid==113){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cntry']->value->country;?>
</option>
            					<?php } ?>
            					</select>
                                </div>
                                    <!--<select name="country" id="country" class="selectBx">
                                    <option value="" selected="">Select Country</option>
                                    <option value="ABW">Aruba</option>
                                    <option value="AFG">Afghanistan</option>
                                    <option value="AGO">Angola</option>
                                    <option value="AIA">Anguilla</option>
                                    <option value="ALA">Åland Islands</option>
                                    <option value="ALB">Albania</option>
                                    <option value="AND">Andorra</option>
                                    <option value="ANT">Netherlands Antilles</option>
                                    <option value="ARE">United Arab Emirates</option>
                                    <option value="ARG">Argentina</option>
                                    <option value="ARM">Armenia</option>
                                    <option value="ASM">American Samoa</option>
                                    <option value="ATA">Antarctica</option>
                                    <option value="ATF">French Southern Territories</option>
                                    <option value="ATG">Antigua and Barbuda</option>
                                    <option value="AUS">Australia</option>
                                    <option value="AUT">Austria</option>
                                    <option value="AZE">Azerbaijan</option>
                                    <option value="BDI">Burundi</option>
                                    <option value="BEL">Belgium</option>
                                    <option value="BEN">Benin</option>
                                    <option value="BFA">Burkina Faso</option>
                                    <option value="BGD">Bangladesh</option>
                                    <option value="BGR">Bulgaria</option>
                                    <option value="BHR">Bahrain</option>
                                    <option value="BHS">Bahamas</option>
                                    <option value="BIH">Bosnia and Herzegovina</option>
                                    <option value="BLM">Saint Barthélemy</option>
                                    <option value="BLR">Belarus</option>
                                    <option value="BLZ">Belize</option>
                                    <option value="BMU">Bermuda</option>
                                    <option value="BOL">Bolivia</option>
                                    <option value="BRA">Brazil</option>
                                    <option value="BRB">Barbados</option>
                                    <option value="BRN">Brunei Darussalam</option>
                                    <option value="BTN">Bhutan</option>
                                    <option value="BVT">Bouvet Island</option>
                                    <option value="BWA">Botswana</option>
                                    <option value="CAF">Central African Republic</option>
                                    <option value="CAN">Canada</option>
                                    <option value="CCK">Cocos (Keeling) Islands</option>
                                    <option value="CHE">Switzerland</option>
                                    <option value="CHL">Chile</option>
                                    <option value="CHN">China</option>
                                    <option value="CIV">Côte d`Ivoire</option>
                                    <option value="CMR">Cameroon</option>
                                    <option value="COD">Congo, the Democratic Republic of the</option>
                                    <option value="COG">Congo</option>
                                    <option value="COK">Cook Islands</option>
                                    <option value="COL">Colombia</option>
                                    <option value="COM">Comoros</option>
                                    <option value="CPV">Cape Verde</option>
                                    <option value="CRI">Costa Rica</option>
                                    <option value="CUB">Cuba</option>
                                    <option value="CXR">Christmas Island</option>
                                    <option value="CYM">Cayman Islands</option>
                                    <option value="CYP">Cyprus</option>
                                    <option value="CZE">Czech Republic</option>
                                    <option value="DEU">Germany</option>
                                    <option value="DJI">Djibouti</option>
                                    <option value="DMA">Dominica</option>
                                    <option value="DNK">Denmark</option>
                                    <option value="DOM">Dominican Republic</option>
                                    <option value="DZA">Algeria</option>
                                    <option value="ECU">Ecuador</option>
                                    <option value="EGY">Egypt</option>
                                    <option value="ERI">Eritrea</option>
                                    <option value="ESH">Western Sahara</option>
                                    <option value="ESP">Spain</option>
                                    <option value="EST">Estonia</option>
                                    <option value="ETH">Ethiopia</option>
                                    <option value="FIN">Finland</option>
                                    <option value="FJI">Fiji</option>
                                    <option value="FLK">Falkland Islands (Malvinas)</option>
                                    <option value="FRA">France</option>
                                    <option value="FRO">Faroe Islands</option>
                                    <option value="FSM">Micronesia, Federated States of</option>
                                    <option value="GAB">Gabon</option>
                                    <option value="GBR">United Kingdom</option>
                                    <option value="GEO">Georgia</option>
                                    <option value="GGY">Guernsey</option>
                                    <option value="GHA">Ghana</option>
                                    <option value="GIN">N Guinea</option>
                                    <option value="GIB">Gibraltar</option>
                                    <option value="GLP">Guadeloupe</option>
                                    <option value="GMB">Gambia</option>
                                    <option value="GNB">Guinea-Bissau</option>
                                    <option value="GNQ">Equatorial Guinea</option>
                                    <option value="GRC">Greece</option>
                                    <option value="GRD">Grenada</option>
                                    <option value="GRL">Greenland</option>
                                    <option value="GTM">Guatemala</option>
                                    <option value="GUF">French Guiana</option>
                                    <option value="GUM">Guam</option>
                                    <option value="GUY">Guyana</option>
                                    <option value="HKG">Hong Kong</option>
                                    <option value="HMD">Heard Island and McDonald Islands</option>
                                    <option value="HND">Honduras</option>
                                    <option value="HRV">Croatia</option>
                                    <option value="HTI">Haiti</option>
                                    <option value="HUN">Hungary</option>
                                    <option value="IDN">Indonesia</option>
                                    <option value="IMN">Isle of Man</option>
                                    <option value="IND">India</option>
                                    <option value="IOT">British Indian Ocean Territory</option>
                                    <option value="IRL">Ireland</option>
                                    <option value="IRN">Iran, Islamic Republic of</option>
                                    <option value="IRQ">Iraq</option>
                                    <option value="ISL">Iceland</option>
                                    <option value="ISR">Israel</option>
                                    <option value="ITA">Italy</option>
                                    <option value="JAM">Jamaica</option>
                                    <option value="JEY">Jersey</option>
                                    <option value="JOR">Jordan</option>
                                    <option value="JPN">Japan</option>
                                    <option value="KAZ">Kazakhstan</option>
                                    <option value="KEN">Kenya</option>
                                    <option value="KGZ">Kyrgyzstan</option>
                                    <option value="KHM">Cambodia</option>
                                    <option value="KIR">Kiribati</option>
                                    <option value="KNA">Saint Kitts and Nevis</option>
                                    <option value="KOR">Korea, Republic of</option>
                                    <option value="KWT">Kuwait</option>
                                    <option value="LAO">Lao People`s Democratic Republic</option>
                                    <option value="LBN">Lebanon</option>
                                    <option value="LBR">Liberia</option>
                                    <option value="LBY">Libyan Arab Jamahiriya</option>
                                    <option value="LCA">Saint Lucia</option>
                                    <option value="LIE">Liechtenstein</option>
                                    <option value="LKA">Sri Lanka</option>
                                    <option value="LSO">Lesotho</option>
                                    <option value="LTU">Lithuania</option>
                                    <option value="LUX">Luxembourg</option>
                                    <option value="LVA">Latvia</option>
                                    <option value="MAC">Macao</option>
                                    <option value="MAF">Saint Martin (French part)</option>
                                    <option value="MAR">Morocco</option>
                                    <option value="MCO">Monaco</option>
                                    <option value="MDA">Moldova</option>
                                    <option value="MDG">Madagascar</option>
                                    <option value="MDV">Maldives</option>
                                    <option value="MEX">Mexico</option>
                                    <option value="MHL">Marshall Islands</option>
                                    <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
                                    <option value="MLI">Mali</option>
                                    <option value="MLT">Malta</option>
                                    <option value="MMR">Myanmar</option>
                                    <option value="MNE">Montenegro</option>
                                    <option value="MNG">Mongolia</option>
                                    <option value="MNP">Northern Mariana Islands</option>
                                    <option value="MOZ">Mozambique</option>
                                    <option value="MRT">Mauritania</option>
                                    <option value="MSR">Montserrat</option>
                                    <option value="MTQ">Martinique</option>
                                    <option value="MUS">Mauritius</option>
                                    <option value="MWI">Malawi</option>
                                    <option value="MYS">Malaysia</option>
                                    <option value="MYT">Mayotte</option>
                                    <option value="NAM">Namibia</option>
                                    <option value="NCL">New Caledonia</option>
                                    <option value="NER">Niger</option>
                                    <option value="NFK">Norfolk Island</option>
                                    <option value="NGA">Nigeria</option>
                                    <option value="NIC">Nicaragua</option>
                                    <option value="NOR">R Norway</option>
                                    <option value="NIU">Niue</option>
                                    <option value="NLD">Netherlands</option>
                                    <option value="NPL">Nepal</option>
                                    <option value="NRU">Nauru</option>
                                    <option value="NZL">New Zealand</option>
                                    <option value="OMN">Oman</option>
                                    <option value="PAK">Pakistan</option>
                                    <option value="PAN">Panama</option>
                                    <option value="PCN">Pitcairn</option>
                                    <option value="PER">Peru</option>
                                    <option value="PHL">Philippines</option>
                                    <option value="PLW">Palau</option>
                                    <option value="PNG">Papua New Guinea</option>
                                    <option value="POL">Poland</option>
                                    <option value="PRI">Puerto Rico</option>
                                    <option value="PRK">Korea, Democratic People`s Republic of</option>
                                    <option value="PRT">Portugal</option>
                                    <option value="PRY">Paraguay</option>
                                    <option value="PSE">Palestinian Territory, Occupied</option>
                                    <option value="PYF">French Polynesia</option>
                                    <option value="QAT">Qatar</option>
                                    <option value="REU">Réunion</option>
                                    <option value="ROU">Romania</option>
                                    <option value="RUS">Russian Federation</option>
                                    <option value="RWA">Rwanda</option>
                                    <option value="SAU">Saudi Arabia</option>
                                    <option value="SDN">Sudan</option>
                                    <option value="SEN">Senegal</option>
                                    <option value="SGP">Singapore</option>
                                    <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                    <option value="SHN">Saint Helena</option>
                                    <option value="SJM">Svalbard and Jan Mayen</option>
                                    <option value="SLB">Solomon Islands</option>
                                    <option value="SLE">Sierra Leone</option>
                                    <option value="SLV">El Salvador</option>
                                    <option value="SMR">San Marino</option>
                                    <option value="SOM">Somalia</option>
                                    <option value="SPM">Saint Pierre and Miquelon</option>
                                    <option value="SRB">Serbia</option>
                                    <option value="STP">Sao Tome and Principe</option>
                                    <option value="SUR">Suriname</option>
                                    <option value="SVK">Slovakia</option>
                                    <option value="SVN">Slovenia</option>
                                    <option value="SWE">Sweden</option>
                                    <option value="SWZ">Swaziland</option>
                                    <option value="SYC">Seychelles</option>
                                    <option value="SYR">Syrian Arab Republic</option>
                                    <option value="TCA">Turks and Caicos Islands</option>
                                    <option value="TCD">Chad</option>
                                    <option value="TGO">Togo</option>
                                    <option value="THA">Thailand</option>
                                    <option value="TJK">Tajikistan</option>
                                    <option value="TKL">Tokelau</option>
                                    <option value="TKM">Turkmenistan</option>
                                    <option value="TLS">Timor-Leste</option>
                                    <option value="TON">Tonga</option>
                                    <option value="TTO">Trinidad and Tobago</option>
                                    <option value="TUN">Tunisia</option>
                                    <option value="TUR">Turkey</option>
                                    <option value="TUV">Tuvalu</option>
                                    <option value="TWN">Taiwan, Province of China</option>
                                    <option value="TZA">Tanzania, United Republic of</option>
                                    <option value="UGA">Uganda</option>
                                    <option value="UKR">Ukraine</option>
                                    <option value="UMI">United States Minor Outlying Islands</option>
                                    <option value="URY">Uruguay</option>
                                    <option value="USA">United States</option>
                                    <option value="UZB">Uzbekistan</option>
                                    <option value="VAT">Holy See (Vatican City State)</option>
                                    <option value="VCT">Saint Vincent and the Grenadines</option>
                                    <option value="VEN">Venezuela</option>
                                    <option value="VGB">Virgin Islands, British</option>
                                    <option value="VIR">Virgin Islands, U.S.</option>
                                    <option value="VNM">Viet Nam</option>
                                    <option value="VUT">Vanuatu</option>
                                    <option value="WLF">Wallis and Futuna</option>
                                    <option value="WSM">Samoa</option>
                                    <option value="YEM">Yemen</option>
                                    <option value="ZAF">South Africa</option>
                                    <option value="ZMB">Zambia</option>
                                    <option value="ZWE">Zimbabwe</option>
                                    </select>--> 
                                </td>
                                </tr>
                                 <tr>
                                <td><label>State/Province<span class="redstar">*</span></label></td>
                                <td colspan="2">
                                <div class="fieldTxP ">
                                <div id="state_load">
             					 <select name="state" id="state" class="selectBx" />
                                 <option value="" selected="">Select State</option>
              					<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
             					 <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['city_id'];?>
"  ><?php echo $_smarty_tpl->tpl_vars['c']->value['city_name'];?>
</option>
             					 <?php } ?> </select>
            					</div>
                                </div>
                                <!--<input name="state" class="textBoxStyle" type="text" id="state"/>--></td>
                                </tr>
                                <tr>
                                <td><label>City<span class="redstar">*</span></label></td>
                                <td width="10%">
                                <div class="fieldTxP ">
                                <input autocomplete="off" name="city" type="text" class="textBoxStyle" id="city"/>
                                <div id="suggestions" style="display:none; z-index:9999999; background:#999; position:absolute; width:485px">
           			 		<ul id="autoSuggestionsList" style="max-height:18w5px;overflow-y:auto"></ul>
            
            				</div>
                            </div>
                            </td>
                                
                                </tr>
                               
                                 <tr>
                                <td><label>Zip/Postal Code<span class="redstar">*</span></label></td>
                                <td colspan="2">
                                <div class="fieldTxP ">
                                <input name="postal_code" class="textBoxStyle" type="text" id="postal_code" />
                                </div>
                                </td>
                                </tr>
                                
                                
                                 <tr>
                                <td><label>Email<span class="redstar">*</span></label></td>
                                <td colspan="2">
                                <div class="fieldTxP ">
                                <input name="email" type="text" class="textBoxStyle" id="email"/>
                                </div>
                                </td>
                                </tr>
                                
                                 <tr>
                                <td><label>Telephone<span class="redstar">*</span></label></td>
                                <td colspan="2">
                                <div class="fieldTxP ">
                                <input name="phone" type="text" class="textBoxStyle" maxlength="20" id="phone"/>
                                </div>
                                </td>
                                </tr>
                               
                                
                                <!--<tr>
                                <td colspan="2"><input type="checkbox" name="check" id="check" value='1'/>
                                I agree to estateace.com <a href="#">Terms and conditions.</a></td>
                                </tr>-->
                              
                                <tr>
                                <td>&nbsp;</td>
                                <td>
                                <div class="submitPane" style="padding-left:0;padding-top:0;">
                                <ul>
				<li class="blueBtnLi">
                                <input type="button" class="blueBtn"value="Pay Now"
                                 onclick="javascript:submitform()"/>
                                 </li>
                                 <li class="blueBtnLi"><input type="button" class="blueBtn" value="Cancel" onclick="javascript:window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['proj_id']->value;?>
';"/></li>
	</ul></div></td>
                               <td>&nbsp;</td>
                                </tr>
                              
        
      </table>
      </div>
       <!--<ul>
				<li class="blueBtnLi">
					<input type="submit" class="blueBtn" id="continue" name="continue"  value="Continue">
				</li>
	</ul>-->
    </form>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>

<script type="text/javascript" charset="utf-8">
var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
 function submitform()
  {
	  if(validate())
	  {
		  document.frmTransaction.submit();
	  }
  }
/*function validate(){
	var card_no=$('#card_no').val();
	$('#err_cardno').html('');
	$('#err_name').html('');
	var name =$('#contact_holder_name').val();
	if(card_no ==''){
		$('#err_cardno').html('Please enter crad no.');
		
		return false;
	}
	if(name ==''){
		$('#err_name').html('Please enter card holder name.');
		return false;
	}
	if(name !='' && card_no !=''){
		
	}
}*/
function validate(){
	
			var frm = document.frmTransaction;
			var aName = Array();
			$("#first_name_error").remove();
			if($("#name").val()=='')
			{
				//alert("Enter Billing  Name");
				$("#name").focus();
				$("#name").after('<span class="error" id="first_name_error"><span>This field is required</span></span>');
				return false;	
			}
			else
			{
				
			}
			
			
			$("#first_name_invalid").remove();
			if(!ValidateString($("#name").val()))
			{
				//alert("Name should be CHARACTER");
				$("#name").focus();
				$("#name").after('<span class="error" id="first_name_invalid"><span>Invalid Name</span></span>');
				return false;
			}
			else
			{
				
			}
			$("#billing_address_error").remove();
			if($("#address").val()=='')
			{
				//alert("Enter Billing Address ");
				$("#address").focus();
				$("#address").after('<span class="error" id="billing_address_error"><span>This field is required</span></span>');
				return false;	
			}
			else
			{
				
			}
			$("#billing_city_error").remove();
			if($("#city").val()=='')
			{
				//alert("Enter Billing City ");
				$("#city").focus();
				$("#city").after('<span class="error" id="billing_city_error"><span>This field is required</span></span>');
				return false;	
			}
			else
			{
				
			}
			$("#billing_city_invalid").remove();	
		
			if(!ValidateString($("#city").val()))
			{
				//alert("City should be CHARACTER");
				$("#city").focus();
				$("#city").after('<span class="error" id="billing_city_invalid"><span>Invalid Billing City</span></span>');
				return false;
			}
			else
			{
				
				
			}
			
			$("#billing_state_error").remove();	
			if($("#state").val()=='')
			{
				//alert("Enter Billing state ");
				$("#state").focus();
				$("#state").after('<span class="error" id="billing_state_error"><span>This fied is required</span></span>');
				return false;	
			}
			else
			{
				
			}
			$("#billing_postatlcode_error").remove();
			if($("#postal_code").val()=='')
			{
				//alert("Enter Billing Postal Code ");
				$("#postal_code").focus();
				$("#postal_code").after('<span class="error" id="billing_postatlcode_error"><span>This fied is required</span></span>');
				return false;	
			}else if(!validateNumeric($("#postal_code").val()))
			{
				//alert("Invalid Phone number");
				
				$("#postal_code").focus();
				$("#postal_code").after('<span class="error" id="billing_postatlcode_error"><span>Invalid Zip code</span></span>');
				return false;
			}
		    /*else if ($("#postal_code").val().length < 4 )
			{
				$("#postal_code").focus();
				$("#postal_code").after('<span class="error" id="billing_postatlcode_error"><span>Invalid Zip code</span></span>');
				return false;
          	}*/
			else
			{
				
			}
			
			$("#billing_country_error").remove();	
			if($("#country").val()=='')
			{
				//alert("Select Billing Country ");
				$("#country").focus();
				$("#country").after('<span class="error" id="billing_country_error"><span>This fied is required</span></span>');
				return false;	
			}
			else
			{
				
				
			}
	$("#billing_email_error").remove();	
			if($("#email").val()=='')
			{
				//alert("Enter Billing Email Id ");
				
				$("#email").focus();
				$("#email").after('<span class="error" id="billing_email_error"><span>This field is required</span></span>');
				return false;	
			}
			else
			{
				
			}
			
			$("#billing_email_invalid").remove();	
			if(!validateUserEmail($("#email").val()))
			{
				//alert("Invalid Email Id");
				$("#email").focus();
				$("#email").after('<span class="error" id="billing_email_invalid"><span>Invalid Email</span></span>');
				return false;
			}
			else
			{
				
			}
			$("#billing_phone_error").remove();	
			if($("#phone").val()=='')
			{
				//alert("Enter Billing Phone number ");
				$("#phone").focus();
				$("#errorPayment").remove();
				$("#phone").after('<span class="error" id="billing_phone_error"><span>This field is required</span></span>');
				return false;	
			}
			else
			{
				
				
			}
			$("#billing_phone_invalid").remove();
			if(!validateNumeric($("#phone").val()))
			{
				//alert("Invalid Phone number");
				
				$("#phone").focus();
				$("#phone").after('<span class="error" id="billing_phone_invalid"><span>Invalid Phone Number</span></span>');
				return false;
			}
		    else if ($("#phone").val().length > 10 || $("#phone").val().length < 10)
			{
				$("#phone").focus();
				$("#phone").after('<span class="error" id="billing_phone_invalid"><span>Invalid Phone Number</span></span>');
				return false;
          	}
			else
			{
				
			}
			
		
			
			/*if (document.frmTransaction.check.checked == false )
			{
				$("#check").focus();
				$("#check").after('<span class="error" id="check_error"><span>Please Check Terms & Conditions</span></span>');
				return false;	
			}
			else
			{
				$("#check_error").remove();	
			}*/
		
		return true;
}

	function validateNumeric(numValue){
		if (!numValue.toString().match(/^[-]?\d*\.?\d*$/)) 
				return false;
		return true;		
	}

function validateEmail(email) {
    //Validating the email field
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	//"
    if (! email.match(re)) {
        return (false);
    }
    return(true);
}


function validateUserEmail(emailid)
{
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	
	 if(!emailReg.test(emailid)) 
	{
		
		return false;
	}
	else
	return true;
	
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
function getCities(stid)
  {
	  baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	   $.ajax({
			  type: "POST",
			  url: baseurl+"user/get_cities/"+stid,  
			  data: "", 
			  success: function(msg){
				  document.getElementById('city_load').innerHTML=msg;
			  }
		  });
  }
function fill(location)
	{
		//var old_addresses = $('#addresses').val();
		//var to_val = $('#addresses').val();

		//var new_val = to_val+email+',';
		
		$('#city').val(location);
	//	var emails = $('#addresses').val();
		
		//$('#to').val(emails);
		//$('#addresses').val(new_val);
		setTimeout("$('#suggestions').hide();", 200);
	}
function city_auto_suggest(){
	var city_var=$.trim($('#city').val());
	var state=$('#state').val();
	var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	if(city_var !=''){
	$.ajax({
	type:"POST",	
	url:baseurl+'archive_projects/city_auto_suggest',
	data:"city_var="+city_var+"&state_id="+state,
	success: function(msg){
		//$('#city_list').html(msg);
		if(msg.length>0)
		  {
			  $('#suggestions').show();
			  $('#autoSuggestionsList').html(msg);
		  }
		  else
		  {
			  $('#suggestions').hide();
		  }
		}
	});	
	}else
			{
				$('#suggestions').hide();
			}
	}
 function getCountry(cid)
		{
			baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
			 $.ajax({
					type: "POST",
					url: baseurl+"archive_projects/get_country/"+cid,  
					data: "", 
					success: function(msg){
						document.getElementById('state_load').innerHTML = msg;
					}
				});
		}
		
$(document).ready(function(){
	//$('#city').blur(validateCity);
	$('#city').keyup(city_auto_suggest);
	getCountry(113);
	$("input[type=text]").focus(function() { $(".errorPayment").remove(); });

	$("#name").live('blur',function(){
			$("#first_name_error").remove();
			$("#first_name_invalid").remove();
		});
	
	
	$("#address").live('blur',function(){
			
			$("#billing_address_error").remove();
	});
	
	$("#city").live('blur',function(){
			
			$("#billing_city_error").remove();
			
			$("#billing_city_invalid").remove();	
			
	});
	
	
	$("#city").live('blur',function(){
			
			$("#billing_city_error").remove();
			
			$("#billing_city_invalid").remove();	
			
	});
	
	
	$("#state").live('blur',function(){
			
			$("#billing_state_error").remove();	
	});
	
	
	$("#postal_code").live('blur',function(){
			
			$("#billing_postatlcode_error").remove();
			
	});
	
	
	$("#country").live('blur',function(){
			
			$("#billing_country_error").remove();	
	});
	
	
	$("#email").live('blur',function(){
		
			$("#billing_email_error").remove();	
			
			$("#billing_email_invalid").remove();	
			
	});
	
	$("#phone").live('blur',function(){
			
			$("#billing_phone_error").remove();	
			
	});
	
	/*$("#check").live('blur',function(){
			
			$("#check_error").remove();	
			
	});
	
	$("#check").live('click',function(){
		
			$(".errorPayment").remove();
			$("#check_error").remove();	
			
	});*/
	
});
 </script> 
<?php }} ?>