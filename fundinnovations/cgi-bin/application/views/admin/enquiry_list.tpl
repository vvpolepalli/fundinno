<script type="text/javascript" src="{$baseurl}js/admin/datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="{$baseurl}js/admin/datepicker/jquery.ui.datepicker.js"></script>
<link href="{$baseurl}styles/admin/datepicker/jquery.ui.all.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="{$baseurl}js/admin/enquiry.js"></script> 
 <!--hosted links for jquery datepicker-->
 <!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>-->
{literal}

<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>-->
<script type="text/javascript">


 $(document).ready(function(){
	 
	 var baseurl = '{/literal}{$baseurl}{literal}';
	 sitePropertytypelist(baseurl);
	 $(function() {
		$( "#datetime" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "dd-mm-yy",
			firstDay: 1,
			maxDate: "+0d", 
			//defaultDate: +7
			onSelect: function( selectedDate ) {
				isDate('datetime');
			}
		});
	});
	$('#datetime').blur(function() {
		isDate('datetime');
	});
});
	 </script>
 {/literal} 
<div class="shadow_outer">
        <div class="shadow_inner" >
         
             <div class="table_listing font_segoe" id="search_property_types">
              <div id="display">{if $updated_msg neq ''}{$updated_msg}{/if}</div>
              <form method="post" name="search" id="search" action="">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <thead>
                  <tr>
                        <th colspan="7" align="left"><h2 style="margin-left:5px;">Manage Enquiry List</h2></th>
                   </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <th colspan="7" align="left">Search Enquiry</th>
                  </tr>
                    <tr>
                    <td align="left" valign="top" colspan="7">
                    <div id="display">{if $updated_msg neq ''}{$updated_msg}{/if}</div>
                    </td>
                    </tr>
                  
                    
                    	<tr style="border:none;">
                        	<td style="border:none; padding: 8px 10px;" width="10%">Name</td>
                    		<td valign="middle" align="left" style="border:none;" width="15%">
                   				<input type="text" name="first_name" id="first_name" class="textbox" style="width:175px;" />
                    		</td>
                            <td style="border:none; padding: 8px 10px;" width="13%">E-mail</td>
                    		<td valign="middle" align="left" style="border:none;" width="15%">
                   				<input type="text" name="email" id="email" class="textbox" style="width:175px;" />
                    		</td>
                            <td style="border:none; padding: 8px 10px;" width="10%">Date</td>
                    		<td valign="middle" align="left" style="border:none;" width="15%"><div style="position:relative">
                   				<input type="text" name="datetime" id="datetime" class="textbox" style="width:175px;" /></div>
                    		</td>
                    		<td style="border:none; padding: 8px 10px;" width="22%">
                    			<span class="btnlayout">
                      		<input type="button" value="Search" class="button" name="text3" onclick="return search_enquiry('{$baseurl}');"/>
                      			</span>
                      		</td>
                     
                  </tr>
                
                
                 </tbody>
                 </table>
                 </form>
   </div>
   <div id="load_propertyTypes" class="table_listing font_segoe "> <!-- Seartch Result-->      
                        
                 </div>
            <!-- <br />
     
              <div style="margin:5px 0 0 5px;"> </div>
                  <div style="clear:both;"></div>-->
                 

        </div>
        <!--End:Border 3--> 
        {if $propCount > 0}
         <div id="Pagination" style="width:1000px;float:left;top:2px;"></div>
         {/if}
      </div>  

        <input type="hidden" name="hid_usrType" id="hid_usrType" value="{$url_type}" />
   <input type="hidden" name="hid_currP" id="hid_currP" value="{$hidcurrP}" />
   <input type="hidden" name="hid_orderBy" id="hid_orderBy" value="" />
   <input type="hidden" name="hid_delPage" id="hid_delPage" value="" />
   <input type="hidden" name="hid_first_name" id="hid_first_name" value="" />
   <input type="hidden" name="hid_email" id="hid_email" value="" />
   <input type="hidden" name="hid_datetime" id="hid_datetime" value="" />