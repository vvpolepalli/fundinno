<?php /* Smarty version Smarty-3.1.8, created on 2013-02-20 20:49:41
         compiled from "/var/www/fundinnovations/application/views/admin/payment/allpayment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44486292350f15e2c608f54-55942375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a455f924ba22bd964d76048ef45c0e98a93aea07' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/payment/allpayment.tpl',
      1 => 1361373108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44486292350f15e2c608f54-55942375',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50f15e2c676426_47771932',
  'variables' => 
  array (
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f15e2c676426_47771932')) {function content_50f15e2c676426_47771932($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/datepicker/jquery.ui.core.js"></script>
<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/datepicker/jquery.ui.datepicker.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/datepicker/jquery.ui.all.css" rel="stylesheet" type="text/css" media="screen" />-->
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/order.js"></script> 
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/jquery.alerts.js"></script> 

 <!--hosted links for jquery datepicker-->
 <!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>-->


<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->
<script type="text/javascript">


 $(document).ready(function(){
	 
	 var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	 initial_load_order(baseurl);
	/* $(function() {
		$( "#datetime,#datetimeto" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "dd-mm-yy",
			firstDay: 1,
			maxDate: "+0d",
			onSelect:function(){
			$('#datetimeto').removeClass("dateError");
			
			
		}
			//defaultDate: +7
		});
	});*/
	
/*	$(function() {
 		var dates1 = $( "#datetime, #datetimeto" ).datepicker({
		   // defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			dateFormat: "dd-mm-yy",
			numberOfMonths: 1,
			firstDay: 1,
			//minDate: "+0d",
			
			onSelect: function( selectedDate ) {
					var option = this.id == "datetime" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
					instance.settings.dateFormat ||
					$.datepicker._defaults.dateFormat,
					selectedDate, instance.settings );
					dates1.not( this ).datepicker( "option", option, date );
					
					isDate('datetime');
					isDate('datetimeto');
					
			}
		});
	});

	  
	$('#datetime').blur(function() {
		isDate('datetime');
	});
	$('#datetimeto').blur(function() {
		isDate('datetimeto');
	});
	*/
	// to export
	 /*$("#download_xls").click( function() {
		$.ajax({
			type: "POST",
			url: baseurl + "admin/payment/export_payment",
			data: "", 
			success: function(msg){
				//alert(msg);
			}
		});
	 });*/
});
	 </script>
     <style type="text/css">
	 
	 .dateError{
			color:red;
		 }
	 
	 </style>
  
<div class="shadow_outer">
        <div class="shadow_inner" >
         
             <div class="table_listing font_segoe" id="search_payment_details">
              <div id="display"></div>
              <form method="post" name="search" id="search">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <thead>
                  <tr>
                        <th colspan="4" align="left"><h2 style="margin-left:5px;">Manage Order List</h2></th>
                   </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th colspan="4" align="left">Search Order</th>
                  </tr>
                    <tr>
                    <td align="left" valign="top" colspan="4">
                    <div id="display"></div>
                    </td>
                    </tr>
                  
                    
                        <tr style="border:none;">
                        
                        <td style="border:none;" align="right"  width="10%">Order Id</td>
                        <td valign="middle" style="border:none;" width="10%">
                        <input type="text" name="order_id" id="order_id" class="textbox"  />
                        </td>
                        <td style="border:none;" align="right" width="10%">Project title</td>
                        <td valign="middle" align="left" style="border:none;" width="10%">
                        <input type="text" name="project_title" id="project_title" class="textbox"  />
                        
                        </tr>
                        <tr style="border:none;">
                        <td style="border:none; " align="right" width="10%">Pre-order amount</td>
                        <td valign="middle" align="left" style="border:none;" width="10%"><div style="position:relative;">
                        <input type="text" name="pledge_amount" id="pledge_amount" class="textbox"   /></div>
                        </td>
                        
                         <td style="border:none; " align="right" width="10%">Supporter  profile name</td>
                        <td valign="middle" align="left" style="border:none;" width="10%"><div style="position:relative;">
                        <input type="text" name="backed_profile_name" id="backed_profile_name" class="textbox"  maxlength="10" /></div>
                        </td>
                        </tr>
                        <tr style="border:none;">
                     
                        <td style="border:none; " align="right" width="10%">Order status</td>
                        <td valign="middle"  align="left" style="border:none;" width="10%">
                        <select name="order_status" id="order_status" style="width:auto;">
                        <option value="">Select Option</option>
                        <option value="pending">pending</option>
                        <option value="completed">completed</option>
                       <option value="error">error</option>
                   <!--  <option value="deleted">deleted</option>-->
                        </select>
                        </td>
                        <td style="border:none; " align="right" width="10%">Project status</td>
                        <td valign="middle" align="left" style="border:none;" width="10%"><div style="position:relative;">
                       <select name="proj_status" id="proj_status" style="width:auto;">
                        <option value="">Select Option</option>
                        <option value="ongoing">ongoing</option>
                        <option value="failed">failed</option>
                       <option value="success">success</option>
                    
                        </select></div>
                        </td>
                        </tr>
                        
                        
                      <tr style="border:none;">
                        <td >&nbsp;</td>
                        <td style="border:none; padding: 2px 5px;" width="2%" colspan="3">
                        <span class="btnlayout">
                        <input type="button" value="Search" class="button" name="text3" onclick="return search_order('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');"/>
                        </span>
                        </td>
     
                        </tr>
                        </tbody>
                        </table>
                 </form>
   </div>
  				 <div id="load_orders" class="table_listing font_segoe "> <!-- Seartch Result-->      
                        
                 </div>
            <!-- <br />
     
              <div style="margin:5px 0 0 5px;"> </div>
                  <div style="clear:both;"></div>-->
                 

        </div>
        <!--End:Border 3--> 
        
         <div id="Pagination" style="width:1000px;float:left;top:2px;"></div>
       
      	</div>  

<div id="dialog-confirm" title="Change status">
      <div id="popup_sel_cntnt">
    
    </div>
  
   
</div>
 <div id="alert_box" title="Alert">
      <div id="popup_content">
    
    </div>
   
</div>
	 
   <input type="hidden" name="hid_currP" id="hid_currP" value="" />
   <input type="hidden" name="hid_orderBy" id="hid_orderBy" value="" />
   <input type="hidden" name="hid_delPage" id="hid_delPage" value="" />
   <input type="hidden" name="hid_order_status" id="hid_order_status" value="" />
   <input type="hidden" name="hid_order_id" id="hid_order_id" value="" />
   <input type="hidden" name="hid_project_title" id="hid_project_title" value="" />
   <input type="hidden" name="hid_backed_profile_name" id="hid_backed_profile_name" value="" />
   <input type="hidden" name="hid_proj_status" id="hid_proj_status" value="" />
   <input type="hidden" name="hid_pledge_amount" id="hid_pledge_amount" value="" />
       <?php }} ?>