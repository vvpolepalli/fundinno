function validateProject_title()
{
	$("#proj_title_error").remove();	
	if($("#proj_title").val()=='')
	{
	$("#proj_title").after('<div  class="error" id="proj_title_error"><span>This field is required</span></div>');
	return false;
	}
	else
	{
		$("#proj_title").after('<div  class="checked" id="proj_title_error"><span></span></div>');
		return true;
	}
}

function validateCategory_list()
{
	$("#category_list_error").remove();	
	//alert($("#category_list").val());
	if($("#category_list").val() =='' || $("#category_list").val()==null)
	{
	$("#category_list").parent('li').find('.multi_select').after('<div class="error" id="category_list_error"><span>This field is required</span></div>');
	return false;
	}
	else
	{
		
		return true;
	}
}

function validateSDesc()
{
	$("#short_description_error").remove();	
	if($("#short_description").val()=='')
	{
	$("#short_description").after('<div  class="error" id="short_description_error"><span>This field is required</span></div>');
	return false;
	}
	else
	{
		return true;
	}
}


function validateFDuration()
{
	$("#funding_duration_error").remove();	
	if($("#funding_duration").val()=='')
	{
	$("#funding_duration").after('<div  class="error" id="funding_duration_error"><span>This field is required</span></div>');
	return false;
	}
	else
	{
		$("#funding_duration").after('<div  class="checked" id="funding_duration_error"><span></span></div>');
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
}

function validateCity()
{
	$("#city_error").remove();	
	var city_type = $('#city').attr('type');
	if(city_type!='text') {
	if($("#city").val()=='' || $("#city").val()=='other' )
	{
	$("#city").after('<div class="error" id="city_error"><span>This field is required</span></div>');
	return false;
	}
	else
	{
		//$("#city").after('<span class="checked" id="city_error"><span></span></div>');
		$("#city_error").remove();	
		return true;
	}
	}else {
		if ($("#city").val()=='' || $("#city").val()=='other' ) {
			$("#city").after('<div  class="error" id="city_error"  ><span>This field is required</span>');
			return false;
		}
		else if(ValidateString($("#city").val())==false)
		{
			$("#city").after('<div  class="error" id="city_error" ><span>Characters Only</span></div>');
			return false;	
		}
		else
		{	
			//$("#city").after('<span class="checked" id="city_error"><span></span></div>');
			$("#city_error").remove();	
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
function validateFundingGoal(){
	
	$("#funding_goal_error").remove();	
	if($("#funding_goal").val()=='')
	{
	$("#funding_goal").after('<div  class="error" id="funding_goal_error"><span>This field is required</span></div>');
	return false;
	}
	else if(isNaN($("#funding_goal").val()))
	  {
		 
			$("#funding_goal").after('<div  class="error" id="funding_goal_error"><span>Numeric Values only</span></div>');
		  return false;	
	  }
	  else if(parseFloat($("#funding_goal").val())<=0){
		  $("#funding_goal").after('<div  class="error" id="funding_goal_error"><span>Enter valid amount</span></div>');
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
function validate_pro_img(){
	$("#pro_img_error").remove();
	var pro_img=$('#hidImage').val();	
	if(pro_img=='')
	{
	$("#hidImage").after('<div  class="error" id="pro_img_error"><span>Please upload project image.</span></div>');
	return false;
	}
	else
	{
		return true;
	}
}
function validate_pro_video(){
	//hidVidFile hidVidThumb
	$("#pro_video_error").remove();
	var VidFile=$('#hidVidFile').val();	
	if(VidFile=='')
	{
	$("#hidVidFile").after('<div  class="error" id="pro_video_error"><span>Please upload project video.</span></div>');
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
function hide_error(id) {
	$("#"+id).toggle(1000);
}

function save_projects(baseurl,type) 
	{
		var project_mdesc=$.trim(tinyMCE.get('project_desc').getContent());
		//jQuery.ajaxSettings.traditional = true;
		
		var n = Object();
		var m =Object();
		var myObject=$('#addproject').serializeArray();
		n.name='action';
		n.value=type;
		m.name='project_mdesc';
		m.value=project_mdesc;
		myObject[myObject.length] = n;
		myObject[myObject.length] = m;
		if(type =='save'){
                 var chckvar = validateProject_title() & validateCity() & validate_reward_fields();
                }else{
		 var chckvar = validate_pro_img() & validate_pro_video() & validateCategory_list() & validateProject_title() & validateFundingGoal() &  validateSDesc() & validateFDuration() & validateDesc() & validateCity() & validate_reward_fields() & $('#hidImage').val() !='' ;
                }
               
                if( chckvar){   //changed on 19/4/13 requested by client
			//alert(type);
                                     
			//$('#reward_ck').attr('checked',false)
			//if($('#reward_ck').is(':checked'))
			//{
				//if(validate_reward_fields()){
					$('.blueBtn').attr('disabled', 'disabled' );
					$.ajax({
					type: "POST",
					url: baseurl+"project/post_project",
					data: myObject,
				//data:'action='+type+'&project_mdesc='+project_mdesc,
					success: function(msg){
						$('.blueBtn').attr('disabled', 'disabled' );
					//$('#alert_pop_cntnt').html('Project saved succeessfully..');
					//$('#alert_popup').show();user/my_profile
					var con_res='';
					if(type =='save'){
						
						con_res='Project saved successfully.';
						$('#msg').show();
						$('#msg').html(con_res);
						$(window).scrollTop($('#msg').offset().top-10);
						setTimeout(function() {
      					window.location.href=baseurl+'project/innovate_project_videos/'+msg;
					}, 3000);
					}else{
						close_pop('terms_popup');
						con_res='Project sent for admin approval.';
						
						$('#msg').show();
						$('#msg').html(con_res);
						$(window).scrollTop($('#msg').offset().top-10);
						setTimeout(function() {
      					window.location.href=baseurl+'user/my_profile/innovation_history';
					}, 3000);
					}
					
					}
				});
				//}
			//}
			
//			else {
//				$('.blueBtn').attr('disabled', 'disabled' );
//				$.ajax({
//				type: "POST",
//				url: baseurl+"project/post_project",
//				data: myObject,
//				//data:'action='+type+'&project_mdesc='+project_mdesc,
//				success: function(msg){
//					
//					//$('#alert_pop_cntnt').html('Project saved succeessfully..');
//					//$('#alert_popup').show();
//					var con_res='';
//					if(type =='save'){
//						con_res='Project saved successfully.';
//						$('#msg').show();
//						$('#msg').html(con_res);
//						$(window).scrollTop($('#msg').offset().top-10);
//						setTimeout(function() {
//      					window.location.href=baseurl+'project/innovate_project_videos/'+msg;
//					}, 3000);
//					}else{
//						close_pop('terms_popup');
//						con_res='Project sent for admin approval.';
//						
//						$('#msg').show();
//						$('#msg').html(con_res);
//						$(window).scrollTop($('#msg').offset().top-10);
//						setTimeout(function() {
//      					window.location.href=baseurl+'user/my_profile/innovation_history';
//					}, 3000);
//					}
//					
//					/*$('#msg').show();
//					$('#msg').html('Project saved successfully.');
//					$(window).scrollTop($('#msg').offset().top-10);
//
//					setTimeout(function() {
//      					window.location.href=baseurl+'project/innovate_project_videos/'+msg;
//					}, 3000);*/
//					
//					}
//				});
//			}
		}
		else{
			
			
     $(window).scrollTop($('.error').offset().top-30);
			//alert
		}
	//document.addproject.submit();
	
	}
	
	function update_projects(baseurl,proj_id,type,idsts) 
	{
		var project_mdesc=$.trim(tinyMCE.get('project_desc').getContent());
		//jQuery.ajaxSettings.traditional = true;
		var proj_id=proj_id;
		var n = Object();
		var m =Object();
		var myObject=$('#addproject').serializeArray();
		n.name='action';
		n.value=type;
		m.name='project_mdesc';
		m.value=project_mdesc;
		//alert(myObject.length);
		myObject[myObject.length] = n;
		//alert(myObject.length);
		myObject[myObject.length] = m;
		if(type =='save'){
                 var chckvar = validateProject_title() & validateCity() & validate_reward_fields();
                }else{
		 var chckvar = validate_pro_img() & validate_pro_video() & validateCategory_list() & validateProject_title() & validateFundingGoal() &  validateSDesc() & validateFDuration() & validateDesc() & validateCity() & validate_reward_fields() & $('#hidImage').val() !='' ;
                }
               
                if( chckvar){ 
		//if(validate_pro_img() & validate_pro_video() & validateCategory_list() & validateProject_title() & validateFundingGoal() &  validateSDesc() & validateFDuration() & validateDesc() & validateCity() & $('#hidImage').val() !=''  ){
                    //if($('#reward_ck').is(':checked'))
			//{
			//if(validate_reward_fields()){
			$('.blueBtn').attr('disabled', 'disabled' );
			$.ajax({
				type: "POST",
				url: baseurl+"project/post_project/"+proj_id, 
				data: myObject,
				success: function(msg){
					
					//$('#alert_pop_cntnt').html('Project updated succeessfully..');
					//$('#alert_popup').show();
					//window.location.href='#proj_title';
					/**/
					if(idsts ==''){
						$('#msg').show();
						$('#msg').html('Project updated successfully.');
						$(window).scrollTop($('#msg').offset().top-10);
					
						setTimeout(function() {
      					window.location.href=baseurl+'user/edit_profile';
					}, 3000);
					}
					else {
						var con_res='';
						if(type =='save'){
							con_res='Project updated successfully.';
							$('#msg').show();
							$('#msg').html(con_res);
							$(window).scrollTop($('#msg').offset().top-10);
							setTimeout(function() {
	      					window.location.href=baseurl+'project/innovate_project_videos/'+proj_id;
						}, 3000);
						}else{
							close_pop('terms_popup');
							con_res='Project sent for admin approval.';
							
							$('#msg').show();
							$('#msg').html(con_res);
							$(window).scrollTop($('#msg').offset().top-10);
							setTimeout(function() {
	      					window.location.href=baseurl+'user/my_profile/innovation_history';
						}, 3000);
						}
						/*setTimeout(function() {
      					window.location.href=baseurl+'project/innovate_project_videos/'+proj_id;
					}, 3000);*/
					}
					}
				});
				//}
			//}
//                        else{
//				$('.blueBtn').attr('disabled', 'disabled' );
//				$.ajax({
//				type: "POST",
//				url: baseurl+"project/post_project/"+proj_id, 
//				data: myObject,
//				success: function(msg){
//					
//					/*	$('#msg').show();
//						
//					$('#msg').html('Project updated succeessfully.');
//					window.location.href='#msg';
//					$(window).scrollTop($('#msg').offset().top-10);
//					setTimeout(function() {
//      					window.location.href=baseurl+'project/innovate_project_videos/'+proj_id;
//					}, 3000);*/
//						var con_res='';
//						if(type =='save'){
//							con_res='Project updated successfully.';
//							$('#msg').show();
//							$('#msg').html(con_res);
//							$(window).scrollTop($('#msg').offset().top-10);
//							setTimeout(function() {
//	      					window.location.href=baseurl+'project/innovate_project_videos/'+proj_id;
//						}, 3000);
//						}else{
//							close_pop('terms_popup');
//							con_res='Project sent for admin approval.';
//							
//							$('#msg').show();
//							$('#msg').html(con_res);
//							$(window).scrollTop($('#msg').offset().top-10);
//							setTimeout(function() {
//	      					window.location.href=baseurl+'user/my_profile/innovation_history';
//						}, 3000);
//						}
//						
//					}
//				});
//			}
		}
		else{
			
			
     $(window).scrollTop($('.error').offset().top-30);
			//alert
		}
	//document.addproject.submit();
	
	}
	
 function view_terms(baseurl,proj_id,id_sts){
	
	/* if($('#hidImage').val() ==''){
		  $('#alert_pop_cntnt').html('Please upload project image.');
		 $('#alert_popup').show();
		//alert('Please upload project image');
	 }
	 else */if( validate_pro_img() & validate_pro_video() & validateCategory_list() & validateProject_title() & validateFundingGoal() &  validateSDesc() & validateFDuration() & validateDesc() & validateCity() & validate_reward_fields() & $('#hidImage').val() !=''   ){
		 
	if(id_sts ==''){
		//window.location.href='#proj_title';
		$('#msg').show();
		$('#msg').html('Please upload your id proof and address proof, project will be saved.');
		$(window).scrollTop($('#msg').offset().top-10);
		if(proj_id !=''){	
		 setTimeout(function(){
		 update_projects(baseurl,proj_id,"save",id_sts);
		},4000);
		}else{
			
			 setTimeout(function(){
		 save_projects(baseurl,"save");
		},4000);
		}
	}else{
		//if($('#reward_ck').is(':checked'))
			//{
				//if(validate_reward_fields()){
			 $.ajax({
				type: "POST",
				url: baseurl+"project/view_termsofuse", 
				data : 'proj_id='+proj_id,
				success: function(msg){
					$('#pop_cntnt').html(msg);
					$('#terms_popup').show();
					openpPopup();
					}
				});
				//}
				//}
//                                else{
//					 $.ajax({
//					type: "POST",
//					url: baseurl+"project/view_termsofuse", 
//					data : 'proj_id='+proj_id,
//					success: function(msg){
//						$('#pop_cntnt').html(msg);
//						$('#terms_popup').show();
//						openpPopup();
//						}
//					});
//				}
	}
		}else{
			
     $(window).scrollTop($('.error').offset().top-30);
			//alert
		}
	
 }
 
 function close_pop(id){
	 $('#'+id).hide();
	 $('#pop_cntnt').empty();
	  $('#alert_pop_cntnt').empty();
	 
	// if($('.black_overlay').is(":visible")){
	 //}else{
		 closepPopup();
		//}
 }
	