/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 $(document).ready(function()
	{
            
            // business add page
          
            var countryID   =   $('#businessCountryID').val();
            var state  =   $('#statehidValue').val();
            listStates(countryID,state);
            var businessTypeID   =   $('#businessTypeID').val();
            var businessSubTypeID=  $('#hidBusinessSubTypeID').val();
            getSubType(businessTypeID,businessSubTypeID);
            //listing page
             $(".tooltip").each(function(){
                
				$(this).hide();
            });
         
            // business locations page
            var countryLocID   =   $('#locCountryID').val();
            if(countryLocID){
            listStates(countryLocID,state);
            }
            $('#adNewBusinessLocation').hide();
//            var businessLocID   =    $('#businessLocID').val();
//            var submitted   =    $('#showAddFromSub').val();
//            if (businessLocID>0 || submitted){
//              $('#adNewBusinessLocation').show();
//             $('#showAddNewBusinessLocation').hide();
//            }


            $('#showAddNewBusinessLocation').click(function(){
                 $('#adNewBusinessLocation').show();
                 findAddress("US",'');
               //clearForm("frmBusinessLocation");
                 $('#businessLocID').val('');
            });
			 $("#cancelPassword").hide();
             $("#changePassword").live("click",function (){
				 $("#changePassword").hide();
				 $("#cancelPassword").show();
				 $("#passwordNotify").show();
				  $("#paswdChanged").val('1');
				 $("#businessPassword").attr("readonly",""); 
				 $("#businessPassword").removeClass("disabled");
			 });
			 $("#cancelPassword").live("click",function (){
				 $("#changePassword").show();
				 $("#cancelPassword").hide();
				 $("#passwordNotify").show();
				  $("#businessPassword").val($("#hidPaswd").val());
				 $("#paswdChanged").val('0');
				 $("#businessPassword").attr("readonly","readonly"); 
				 $("#businessPassword").addClass("disabled");
				 $("#div_err_frmBusiness_businessPassword").addClass("hide");
			 });
			 if($("#paswdChanged").val()!='0'){
				
			  $("#changePassword").hide();
				 $("#cancelPassword").show();
				 $("#passwordNotify").show();
				 $("#businessPassword").attr("readonly",""); 
				 $("#businessPassword").removeClass("disabled");	
			}
            $("ul li:first-child").addClass("first-one");
		$("ul li:last-child").addClass("last-one");
		
// active/inactive btn
        $('.switch .cb-disable').live('click', function() {
  		var parent = $(this).parents('.switch');
		$('.cb-enable',parent).removeClass('selected');
		$(this).addClass('selected');
		$('.switch .cb-disable.selected span ').css("background-position","right -210px");
		var cb_value= $(this).attr("rel");
		var cb_hidden_field=$(this).closest('.switch').attr("rel");
		$("#"+cb_hidden_field).val(cb_value);
            });

	$('.switch .cb-enable').live('click',function(){
		var parent = $(this).parents('.switch');
		$('.cb-disable',parent).removeClass('selected');
		$(this).addClass('selected');
		$('.switch .cb-disable span ').css("background-position","right -180px");
		var cb_value= $(this).attr("rel");
		var cb_hidden_field=$(this).closest('.switch').attr("rel");
		$("#"+cb_hidden_field).val(cb_value);
	});

	$('.switch label').removeClass('selected');
	$('.switch label').each(function(index) {
			 var cb_hidden_field=$(this).closest('.switch').attr("rel");
			 var cb_hidden_field_value = $("#"+cb_hidden_field).val();
			 if(cb_hidden_field_value==$(this).attr("rel")) {
				$(this).addClass('selected');
			 }

    });
        //check box validation to update status
        $(".update_btn_table").click(function(){
                   var ListAllCheckedCount = $(".ListAll:checked").size(); 
				   var businessStatus= $('#businessStatusList').val();
		   if($(".ListAll:checked").size()==0){
			   jAlert("Select at least one item");
                           return false;
		   } else if(businessStatus==""){
			   jAlert("Select a status");
                           return false; 
		   }
                  
                  
                    if(businessStatus=='Deleted')
                    {
					  jConfirm('Are you sure you want to delete this?', 'Alert', function(r) {
                                            if(r==true) {
                                                    $('#formBusiness').submit();
                                            }
                                    });
                    } else	{
                            return true;
                    }
                    return false;

         });
		  //check box validation to update status
        $("#submitSearch").click(function(){
          if($('#businessTypeID').val()=="" &&  jQuery.trim($('#businessName').val())==""  ){
			   jAlert("Please enter any one of the search criteria");
                           return false;
		   }
                  
                            return true;      

         });

        //initialise fancybox

          $(".add_link").fancybox({
				'autoScale'			: true,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'			: 'iframe',
				'height'		: '98%',
                                'width'                 : '90%',
                                'titleShow'             : false,
				'iframe_page'		: "",
                                'onClosed': function() {
                                   parent.location.reload(true);
                                }
			});
    $("#ListStatusLinkCheckbox").attr("checked",false);
	
		    
  });
function getStateHiddenValue(val)
{
     $('#statehidValue').val(val);
}
function getSubTypeID(subTypeID)
{
	 $('#hidBusinessSubTypeID').val(subTypeID);
}
function getSubType(businessTypeID,businessSubTypeID)
{
 if(businessTypeID){
     $("#businessSubTypeLoadImage").append('<img src="'+GLOBAL_ROOT_PATH+'/public/default/manage/standard/images/ajax-loader.gif" id="loading_gif2"  />');
 }
         $.ajax({
           type: "POST",
           url: GLOBAL_BASE_PATH+"/business/ajaxBusinessSubtype/",
           data: "businessTypeID="+businessTypeID+"&businessSubTypeID="+businessSubTypeID,
           success: function(msg){
            $("#businessSubTypeLoadImage").empty(); 
            $('#businessSubTypeID').empty();
            $("#businessSubTypeID").append('<option value="">Select</option>'+msg);
              
           }
         });
    
}
function listStates(countryID,stateID)
{
  if(countryID){
     $("#loadProcessImage").append('<img src="'+GLOBAL_ROOT_PATH+'/public/default/manage/standard/images/ajax-loader.gif" id="loading_gif2"  />');
 } 
  $('#statehidValue').val(stateID);

  $.ajax({
   type: "POST",
   url: GLOBAL_BASE_PATH+"/city/ajaxState",
   data: "countryID="+countryID+"&stateID="+stateID,
   success: function(msg){  
 	$("#loadProcessImage").empty();
	
    if(msg!=''){
         $("#stateInput").show();
		 $('#stateID').empty();
         $("#stateProvinceInput").hide();
         $("#stateID").append('<option value="">Select</option>'+msg);
         $("#stateSelectedType").val("state");
		 $("#province").val('');
		 $("#div_err_frmBusiness_provincehidden").css("display","none");
    } else {
          $("#stateInput").hide();
          $("#stateProvinceInput").show();
		  $("#stateID").val('');
          $("#stateSelectedType").val("province");
		  $("#div_err_frmBusiness_statehidden").css("display","none");
    }
    
    }
  });
}
function listStatesSearch(countryID,stateID)
{
    if(countryID){
     $("#loaderInput").append('<span ><img src="'+GLOBAL_ROOT_PATH+'/public/default/manage/standard/images/ajax-loader.gif" id="loading_gif2"  /></span>');
 }
  $.ajax({
   type: "POST",
   url: GLOBAL_BASE_PATH+"/ajax/statesAjax",
   data: "countryID="+countryID+"&stateID="+stateID,
   success: function(msg){
    $('#stateInput').html(msg);
    $("#loaderInput").empty();
    }
  });
}

function addField(){

 //    $("#stateInput").append('<span ><img src="'+GLOBAL_ROOT_PATH+'/public/default/manage/standard/images/ajax-loader.gif" id="loading_gif2"  /></span>');

 $.ajax({
   type: "POST",
   url: GLOBAL_BASE_PATH+"/ajax/locationAdd",
   data: "",
   success: function(msg){
       $("#locationSave").show();
    $('#stateInput').append(msg);
   }
 });
}
function makeEditable(id)
{
	$('.view_'+id).hide()
	$('.edit_'+id).show()
	$('.disedit'+id).hide()
        $("#locationSave").hide();
        
        $('#stateInput').html('');
	$(".disedit").each(function()
	{
		var curid	=	$(this).attr('id');

			//alert(curid);
			$("#"+curid).hide();

	})
}
function showToolTip(businessID,section){

	$("#"+section+"_tooltip_"+businessID).show();
}
function hideToolTip(businessID,section){

	$("#"+section+"_tooltip_"+businessID).hide();
}
function ismaxlength(obj)
{
   var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
   if (obj.getAttribute && obj.value.length>mlength){
   obj.value=obj.value.substring(0,mlength)
    jAlert("Maximum of 200 characters are allowed");
	}
}