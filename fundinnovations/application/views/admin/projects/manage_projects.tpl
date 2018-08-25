<script type="text/javascript" src="{$baseurl}js/admin/projects.js"></script>
<!--<script type="text/javascript" src="{$baseurl}js/admin/datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="{$baseurl}js/admin/datepicker/jquery.ui.datepicker.js"></script>
<link href="{$baseurl}styles/admin/datepicker/jquery.ui.all.css" rel="stylesheet" type="text/css" media="screen" />-->
<style type="text/css">
.preview
{
position: absolute;
z-index:9999;
margin-top: 15px;
margin-left: 25px;
}
#basic-modal-contentinitial{
position:absolute;
left:0;
background:#000;
width:400px;;
overflow:auto;
height:365px;
display:none;
z-index:9999;
padding:20px;
border:10px solid #999;
}

#mask {
position:absolute;
left:0;
top:0;
z-index:9000;
background-color:#000;
display:none;
}
#popupdata
{
width:850px;
float:left;
}

.modalCloseImg
{
background:url(../images/x.png) no-repeat; 
width:25px; 
height:29px; 
display:none; 
z-index:9999; 
position:absolute; 
top:138px; 
cursor:pointer;
}


</style>
{literal} 
<script type="text/javascript">
$(document).ready(function(){
	  var baseurl = '{/literal}{$baseurl}{literal}';
	projects_list(baseurl);
	  
	  
});
$(".preview").live('click',function(e){
			$videotype=1;
			$videolink=$(this).attr('rel');
			
			e.preventDefault();
			$('html, body').animate({scrollTop:50}, 'fast');
			//Get the screen height and width
			var maskHeight = $(document).height();
			var maskWidth = $(window).width();
			
			//Set heigth and width to mask to fill up the whole screen
			$('#mask').css({'width':maskWidth,'height':maskHeight});
			
			//transition effect		
			$('#mask').fadeIn(1000);	
			$('#mask').fadeTo("slow",0.8);	
			
			//Get the window height and width
			var winH = $(window).height();
			var winW = $(window).width();
			
			//Set the popup window to center
			id="#basic-modal-contentinitial";
			$(id).css('top',  150);
			$(id).css('left', winW/2-$(id).width()/2);
			var leftpadding=winW/2-$(id).width()/2;
			var rightpadding=leftpadding-70;
			
			$('.modalCloseImg').css('right',rightpadding);
			//transition effect
			$(id).fadeIn(2000);
			$('.modalCloseImg').show();
			var dealid=$(this).attr('rel');
			var playerurl='{/literal}{$baseurl}{literal}admin/project/play_videos_in_admin';
			$(id).load(playerurl,{videolink:$videolink,videotype:$videotype},function(){
				
				$(".preview").hide();	
			})
		}) ;
		
		
//Method to close the popup
	function close_popupwindow() 
	{
		$('#mask').hide();
		$('.modalCloseImg').hide();
		$('#basic-modal-contentinitial').empty().hide();
		$(".preview").show();	
	}
function getCountry(cid)
		{
			baseurl = '{/literal}{$baseurl}{literal}';
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
			baseurl = '{/literal}{$baseurl}{literal}';
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
 		/*var dates1 = $( "#start_on, #end_on" ).datepicker({
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
		});*/
	});
	/*$('#start_on').blur(function() {
		isDate('start_on');
	});
	$('#end_on').blur(function() {
		isDate('end_on');
	});*/
});
</script> 
{/literal}
<div class="shadow_outer" id="manage_siteusers">
  <div class="shadow_inner" >
    <h2 style="margin-left:5px;" id="manage_head">Manage projects</h2>
    <div class="table_listing font_segoe" id="search_projects">
      <form method="post" name="search" id="search" >
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <th colspan="2" align="left">Search projects</th>
              <th align="left">&nbsp;</th>
              <th align="left">&nbsp;</th>
              <th colspan="2" align="right"><a href="{$baseurl}admin/project/add_project">Add new project</a></th>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="6"><div id="display">{if $updated_msg neq ''}{$updated_msg}{/if}</div></td>
            </tr>
            <tr class="shade01">
              <td width="9%" valign="middle" align="right"  >Project title</td>
              <td width="25%" valign="middle" align="left"  ><div  style="position:relative">
                  <input type="text" name="proj_title" id="proj_title" class="textbox" style="width:180px;" />
                </div></td>
              <td width="12%" valign="middle" align="right" >Category</td>
              <td width="25%" valign="middle" align="left" >
              <span class="select">
                <select name="category_list" id="category_list" style="width:180px;" >
                  <option value="">Select category</option>
                {foreach from=$sel_category key=k item=cat }
                <option value="{$cat.id}"  >{$cat.category_name}</option>
                {/foreach}
                </select>
                </span></td>
              <td width="9%" valign="middle" align="right"  >Project status</td>
              <td  width="25%" valign="middle" align="left" ><span class="select">
                <select name="project_status" id="project_status" style="width:180px;" >
                  <option value="">Select Status</option>
                  <option value="success">Success</option>
                  <option value="ongoing">Ongoing</option>
                  <option value="failed">Failed</option>
                  
                </select>
                </span></td>
           
            </tr>
            <tr class="shade01">
              <td width="12%" valign="middle" align="right" style="padding-left:8px;">Location</td>
              <td width="25%" valign="middle" align="left"><div  style="position:relative">
                  <input type="text" name="location" id="location" class="textbox" style="width:180px;" />
                </div></td>
              <td width="12%" valign="middle" align="right">Fund goal</td>
              <td width="25%" valign="middle" align="left"><div  style="position:relative">
                  <input type="text" name="fund_goal" id="fund_goal" class="textbox" style="width:180px;" />(INR)
                </div></td>
              <td width="12%" valign="middle" align="right"  >Status</td>
              <td width="25%" valign="middle" align="left" ><span class="select">
                <select name="status" id="status" style="width:180px;" >
                  <option value="">Select Status</option>
                  <option value="approved">Approved</option>
                  <option value="incomplete">Incomplete</option>
                  <option value="rejected">Rejected</option>
                  <option value="pending">Pending</option>
                </select>
                </span></td>
            </tr>
            
             <!--<tr class="shade01">
             <td colspan="6" width="12%" valign="middle" align="left"  ><input type="checkbox" id="include_inactive" name="include_inactive"  value="include_inactive"/>  Include inactive users(Not logged in for last 30 days)</td> 
             </tr>-->
            <tr>
              <td align="right" colspan="6"><span class="btnlayout">
                <input type="button" value="Search" class="button" name="search_user" id="search_user" onclick="return search_projects('{$baseurl}');"/>
                </span></td>
            </tr>
            <tr>
              <td colspan="6" align="left" valign="top" height="8"></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="table_listing font_segoe" id="load_projects"> </div>
  </div>
  <!--End:Border 3-->
  <div id="Pagination" style="width:100%;float:left;top:2px;"></div>
</div>
<!-- Div for the Jquery PopUp-->
    <div id="popupdata">
    
    <div id="basic-modal-contentinitial"></div> 
    <div class="modalCloseImg" onclick="javascript:close_popupwindow();" ></div>
    <!-- End of Div for the Jquery Popup -->
    </div> 
   <div id="mask"></div>
   
   
<!--  <input type="hidden" name="hid_usrType" id="hid_usrType" value="{$url_type}" />-->
<input type="hidden" name="hid_currP" id="hid_currP" value="{$hidcurrP}" />
<input type="hidden" name="hid_orderBy" id="hid_orderBy" value="" />
<input type="hidden" name="hid_search" id="hid_search" value="" />
<input type="hidden" name="hid_proj_title" id="hid_proj_title" value="" />
<input type="hidden" name="hid_category" id="hid_category" value="" />
<input type="hidden" name="hid_project_status" id="hid_project_status" value="" />
<input type="hidden" name="hid_location" id="hid_location" value="" />
<input type="hidden" name="hid_fund_goal" id="hid_fund_goal" value="" />
<input type="hidden" name="hid_status" id="hid_status" value="" />
<!--End:Border 2--> 