function validateProject_title()
{
	$("#proj_title_error").remove();	
	if($("#proj_title").val()=='')
	{
	$("#proj_title").after('<div class="clear"/><span class="error" id="proj_title_error"><span>This field is required</span></span>');
	return false;
	}
	else
	{
		$("#proj_title").after('<div class="clear"/><span class="checked" id="proj_title_error"><span></span></span>');
		return true;
	}
}

function validateCategory_list()
{
	$("#category_list_error").remove();	
	//alert($("#category_list").val());
	if($("#category_list").val()=='' || $("#category_list").val() ==null)
	{
	$("#category_list").after('<span class="error" id="category_list_error"><span>This field is required</span></span>');
	return false;
	}
	else
	{
		$("#category_list").after('<div class="clear"/><span class="checked" id="category_list_error"><span></span></span>');
		return true;
	}
}
function validateFundingGoal(){
	
	$("#funding_goal_error").remove();	
	if($("#funding_goal").val()=='')
	{
	$("#funding_goal").after('<div  class="error" id="funding_goal_error"><span>This field is required</span></div>');
	return false;
	}
	  else if(IsNumeric($("#funding_goal").val())==false)
	  {
			$("#funding_goal").after('<div  class="error" id="funding_goal_error"><span>Numeric Values only</span></div>');
		  return false;	
	  }
	else
	{
		return true;
	}
}
function validate_max_sponsers(){
	$("#max_sponsors_error").remove();	
	if($("#max_sponsors").val()=='')
	{
	//$("#max_sponsors").after('<div  class="error" id="max_sponsors_error"><span>This field is required</span></div>');
	return true;
	}
	  else if(IsNumeric($("#max_sponsors").val())==false)
	  {
			$("#max_sponsors").after('<div  class="error" id="max_sponsors_error"><span>Numeric Values only</span></div>');
		  return false;	
	  }
	else
	{
		return true;
	}
	
	}
	
function validate_min_amnt(){
$("#min_pledge_amnt_error").remove();	
	if($("#min_pledge_amnt").val()=='')
	{
	//$("#max_sponsors").after('<div  class="error" id="max_sponsors_error"><span>This field is required</span></div>');
	return true;
	}
	  else if(IsNumeric($("#min_pledge_amnt").val())==false)
	  {
			$("#min_pledge_amnt").after('<div  class="error" id="min_pledge_amnt_error"><span>Numeric Values only</span></div>');
		  return false;	
	  }
	else
	{
		return true;
	}
	
}
function IsNumeric(strString)
		{
		   var strValidChars = "0123456789";
		   var strChar;
		   var blnResult = true;
		   if (strString.length == 0) return false;
		
		   for (i = 0; i < strString.length && blnResult == true; i++)
			  {
			  strChar = strString.charAt(i);
			  if (strValidChars.indexOf(strChar) == -1)
					{
					 blnResult = false;
					}
			  }
		   return blnResult;
		}
function validateSDesc()
{
	$("#short_description_error").remove();	
	if($("#short_description").val()=='')
	{
	$("#short_description").after('<div class="clear"/><span class="error" id="short_description_error"><span>This field is required</span></span>');
	return false;
	}
	else
	{
		$("#short_description").after('<div class="clear"/><span class="checked" id="short_description_error"><span></span></span>');
		return true;
	}
}


function validateFDuration()
{
	$("#funding_duration_error").remove();	
	if($("#funding_duration").val()=='')
	{
	$("#funding_duration").after('<div class="clear"/><span class="error" id="funding_duration_error"><span>This field is required</span></span>');
	return false;
	}
	else
	{
		$("#funding_duration").after('<div class="clear"/><span class="checked" id="funding_duration_error"><span></span></span>');
		return true;
	}
}

function validateDesc()
{
	$("#proDescError").html('');	
	$("#proDescError").hide();
	if($.trim(tinyMCE.get('project_desc').getContent())=='')
	{
		$("#proDescError").show();
	$("#proDescError").html('<span>This field is required</span>');
	return false;
	}
	else
	{
		
		return true;
	}
	
	
	/*$("#project_desc_error").remove();	
	if($.trim(tinyMCE.get('project_desc').getContent())=='')
	{
	$("#project_desc").after('<div class="clear"/><span class="error" id="project_desc_error" ><span>This field is required</span></span>');
	setTimeout('hide_error("project_desc_error");', 2500);
	return false;
	}
	else
	{
		$("#project_desc").after('<div class="clear"/><span class="checked" id="project_desc_error"><span></span></span>');
		return true;
	}*/
}

function validateCity()
{
	$("#city_error").remove();	
	var city_type = $('#city').attr('type');
	if(city_type!='text') {
	if($("#city").val()=='' || $("#city").val()=='other' )
	{
	$("#city").after('<span class="error" id="city_error"><span>This field is required</span></span>');
	return false;
	}
	else
	{
		//$("#city").after('<span class="checked" id="city_error"><span></span></span>');
		$("#city_error").remove();	
		return true;
	}
	}else {
		if ($("#city").val()=='' || $("#city").val()=='other' ) {
			$("#city").after('<span class="error" id="city_error" style="bottom:-15px; left:3px;" ><span>This field is required</span></span>');
			return false;
		}
		else if(ValidateString($("#city").val())==false)
		{
			$("#city").after('<span class="error" id="city_error" style="bottom:-15px; left:3px;"><span>Characters Only</span></span>');
			return false;	
		}
		else
		{	
			//$("#city").after('<span class="checked" id="city_error"><span></span></span>');
			$("#city_error").remove();	
			return true;
		}
	}
}



function hide_error(id) {
	$("#"+id).toggle(1000);
}