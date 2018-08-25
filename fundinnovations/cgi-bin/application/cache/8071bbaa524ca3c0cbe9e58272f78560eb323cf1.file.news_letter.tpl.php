<?php /* Smarty version Smarty-3.1.8, created on 2013-01-22 15:38:21
         compiled from "/var/www/fundinnovations/application/views/admin/newsletter/news_letter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2037920643508f5f86dbf736-50962975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8071bbaa524ca3c0cbe9e58272f78560eb323cf1' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/newsletter/news_letter.tpl',
      1 => 1358849299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2037920643508f5f86dbf736-50962975',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_508f5f86e2b031_85366663',
  'variables' => 
  array (
    'baseurl' => 0,
    'hidcurrP' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508f5f86e2b031_85366663')) {function content_508f5f86e2b031_85366663($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/newsletter.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/datepicker/jquery.ui.datepicker.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/datepicker/jquery.ui.all.css" rel="stylesheet" type="text/css" media="screen" />
 <!--for auto suggest starts-->
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
autosuggest/jquery.autocomplete.css" rel="stylesheet" type="text/css" media="screen" />


<script type="text/javascript">
$(document).ready(function(){
	  var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	  NewsletterList(baseurl);
	  
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

<div class="shadow_outer">
        <div class="shadow_inner" >
           <h2 id="manage_head">Manage News Letter</h2>
           
           <div id="display"></div>
           
          <div class="table_listing font_segoe" id="news_links">
          <div style="float:right">
          <span class="btnlayout">
                      <input type="button" value="Send News Letter" class="button" name="btn_send_news" id="btn_send_news" onClick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/send_news_letter'" />
                    </span>
          
          <span class="btnlayout">
                      <input type="button" value="Add News Letter" class="button" name="btn_add_news" id="btn_add_news" onClick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/add_news_letter'"/>
                    </span></div>
        <div class="clear"></div>            
        </div>
        
        <div class="table_listing font_segoe" id="search_ads">
   
        <form method="post" name="search" id="search" >
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        
            <tr>
            <th colspan="7" align="left">Search</th>
            </tr>
            <tr class="shade01">
            <td width="8%" valign="middle" align="right" style="border:none;">Name</td>
            <td width="22%" valign="middle" align="left" style="border:none;">
            <input type="text" name="newsletter_name" id="newsletter_name" class="textbox" style="width:175px;" />
            </td> 
            <td width="25%" valign="middle" align="right" style="padding-left:15px;">Date From</td>
            <td width="9%" valign="middle" align="left"><div  style="position:relative"><input type="text" name="start_on" id="start_on" class="textbox" style="width:175px;" /></div></td>
            <td width="19%" valign="middle" align="right">To</td>
            <td width="9%" valign="middle" align="left"><div  style="position:relative"><input type="text" name="end_on" id="end_on" class="textbox" style="width:175px;" /></div></td>
            <td width="20%" valign="middle" align="left">
            <span class="btnlayout">
            <input type="button" value="Search" class="button" name="text3" onclick="return search_newsletter('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');"/>
            </span>
            </td>
            </tr>
            <tr>
            <td colspan="7" align="left" valign="top" height="8"></td>
            </tr>
                   
        </tbody>
        </table>
        </form>
      </div>
      <div style="clear:both;"></div>
      <div class="table_listing font_segoe " id="newsletter_list">
              
              
   </div>
             <br />
     
              <div style="margin:5px 0 0 5px;"> </div>
                  <div style="clear:both;"></div>
                 

        </div>
        <!--End:Border 3--> 
        
         <div id="Pagination" style="width:1000px;float:left;top:2px;"></div>
         
      </div>  
<input type="hidden" name="hid_currP" id="hid_currP" value="<?php echo $_smarty_tpl->tpl_vars['hidcurrP']->value;?>
" />
<input type="hidden" name="hid_orderBy" id="hid_orderBy" value="" /> 
<input type="hidden" name="hid_newsletter_name" id="hid_newsletter_name" value="" />     
<input type="hidden" name="hid_start_on" id="hid_start_on" value="" />
<input type="hidden" name="hid_end_on" id="hid_end_on" value="" /> <?php }} ?>