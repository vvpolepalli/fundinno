<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 22:10:28
         compiled from "/home/fundinno/public_html/application/views/admin/add_siteuser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:559217388515c23ea71b8d6-51123637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0d42e3062c3c577e517b6fa7087a3d3d599393a' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/add_siteuser.tpl',
      1 => 1364996821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '559217388515c23ea71b8d6-51123637',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c23ea8c5ad8_66081358',
  'variables' => 
  array (
    'baseurl' => 0,
    'updated_msg' => 0,
    'sel_country' => 0,
    'cntry' => 0,
    'sel_states' => 0,
    'st' => 0,
    'my_profile_det' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c23ea8c5ad8_66081358')) {function content_515c23ea8c5ad8_66081358($_smarty_tpl) {?><!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
swfupload/swfupload/swfupload.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
swfupload/js/handlers.js"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/css/uploadify.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/js/jquery.uploadify-3.1.min.js"></script>


<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery_lightbox/js/jquery.lightbox-0.5.js"></script>
 
<script type="text/javascript">
 $(function() {
     $('a.aproof').lightBox();
	  $('a.aproof1').lightBox();
	 baseurl= $('#baseURl4js').val(); 
    });
// profile image upload starts
var imgpath;		
		var swfu;		
	$(function() {
			//imgpath=document.getElementById('imgpath').value;		
			
	var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	
	   $('#id_proof').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
        'fileTypeExts' :  '*.doc; *.pdf; *.docx; *.gif; *.jpg; *.png',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'user_idproof_upload',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/user_id_proof/',
		'auto'      : true,
		'multi'     : false,
		'onUploadStart' : function(file) {
         // alert('Starting to upload ' + file.name);
        },
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
		'onUploadSuccess' : function(file, data, response) {
			   if((data=='failed')||(data=='Invalid file type.')) {
					 // alert(data);
					//  p_popupOpen('img_size_alert');
					// $('#alert_cntnt').html(data); 
				  }
			   else
			    {
			//	alert(data);
				  //var image   =  baseurl+'uploads/user_id_proof/thumb/'+data;
				   //$('#id_proof_div').html("<img  src='"+image+"' />");
				   var ext = data.split('.').pop();
				if(ext =='gif' || ext == 'jpg' || ext == 'png' ){
				  var image   =  baseurl+'uploads/user_id_proof/thumb/'+data;
				  var largimg= baseurl+'uploads/user_id_proof/thumb/'+data;
				   $('#id_proof_div').html("<a class='aproof' href='"+largimg+"' ><img  src='"+image+"' /></a>");
				   baseurl= $('#baseURl4js').val(); 
				    $('a.aproof').lightBox();
				}else if(ext =='doc' || ext == 'docx'){
					 var image   =  baseurl+'images/Word.png';
					 $('#id_proof_div').html("<img height='100' src='"+image+"' />");
				}else if(ext =='pdf' ){
					 var image   =  baseurl+'images/pdf_img.png';
					 $('#id_proof_div').html("<img height='100' src='"+image+"' />");
				}
				
				//$('#removeIdProof').show();
				   $('#hid_id_proof').val(data);
				}
           }
        // Put your options here
    });	
	$('#addr_proof').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
        'fileTypeExts' : '*.doc; *.pdf; *.docx; *.gif; *.jpg; *.png',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'address_proof_upload',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/user_address_proof',
		'auto'      : true,
		'multi'     : false,
		'onUploadStart' : function(file) {
         // alert('Starting to upload ' + file.name);
        },
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
		'onUploadSuccess' : function(file, data, response) {
			   if((data=='failed')||(data=='Invalid file type.')) {
					  
					//  p_popupOpen('img_size_alert');
					// $('#alert_cntnt').html(data); 
				  }
			   else
			    {
			      //alert(data);
				 // var image   =  baseurl+'uploads/user_address_proof/'+data;
				   //$('#id_proof_div').html("<img  src='"+image+"' />");
				   //$('#removeIdProof').show();
				    var image   =  baseurl+'uploads/user_address_proof/thumb/'+data;
					 var ext = data.split('.').pop();
				if(ext =='gif' || ext == 'jpg' || ext == 'png' ){
				  var image   =  baseurl+'uploads/user_address_proof/thumb/'+data;
				  var largimg= baseurl+'uploads/user_address_proof/thumb/'+data;
				   $('#address_proof_div').html("<a class='aproof1' href='"+largimg+"' ><img  src='"+image+"' /></a>");
				   baseurl= $('#baseURl4js').val(); 
				   // $('a.aproof').lightBox();
					 $('a.aproof1').lightBox();
				}else if(ext =='doc' || ext == 'docx'){
					 var image   =  baseurl+'images/Word.png';
					 $('#address_proof_div').html("<img height='100' src='"+image+"' />");
				}else if(ext =='pdf' ){
					 var image   =  baseurl+'images/pdf_img.png';
					 $('#address_proof_div').html("<img height='100' src='"+image+"' />");
				}
				
				   //$('#address_proof_div').html("<img  src='"+image+"' />");
					//$('#removeIdProof').show();
				   $('#hid_addr_proof').val(data);
				   
				  /* $('#view_addrpf').show();
				   $('#hid_addr_proof').val(data);
				   $("#addr_proof_error").remove();	*/
				}
           }
        // Put your options here
    });	
    $('#prof_img_upload').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
        'fileTypeExts' : '*.gif; *.jpg; *.png',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'profile_img_upload',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/site_users',
		'auto'      : true,
		'multi'     : false,
		'onUploadStart' : function(file) {
         // alert('Starting to upload ' + file.name);
        },
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
		'onUploadSuccess' : function(file, data, response) {
			   if((data=='ERROR:invalid upload')||(data=='Please upload images of size, Minimum 98 X 98')||(data=='ERROR:Could not resize image' || (data == 'ERROR:could not create image handle '+file.name)))
			   {
					// alert(data); 
					//  p_popupOpen('img_size_alert');
					// $('#alert_cntnt').html(data); 
				}
			   else
			    {
			//	alert(data);
				  var image   =  baseurl+'uploads/site_users/thumb/'+data;
				   $('#prof_img_div').html("<img  src='"+image+"' />");
				   $('#removeImg').show();
				   $('#profile_timg').val(data);
				}
           }
        // Put your options here
    });	
			
});
		
		// profile image upload ends
		
		
		 
 //validation for adduser
 $(document).ready(function(){
	 var exst_res = "";
	 $("#profileName").blur(validateprofileName);
	 //$("#firstName").keyup(validateFirstName);
	 $("#email_id").blur(validateDupEmail);
	 $("#country").blur(validateCountry);
	// $("#userEmail").keyup(validateEmail);
	// $("#lastName").blur(validateLastName);
	// $("#lastName").keyup(validateLastName);
	 $("#userPassword").blur(validatePass);
	 //$("#userPassword").keyup(validatePass);
	 $("#c_password").blur(confirmPass);
	 //$("#c_password").keyup(confirmPass);
	 $("#user_type").blur(validateUserType);
	 $("#state").blur(validateState);
	 $("#city").blur(validateCity);
	 $("#zip").blur(validateZip);
	 $("#mob_no").blur(validateMobNo);
	 $("#fb_prof_link").blur(validate_fburl);
	// $("#office_no").blur(validateOfficeNo);
	// $("#address").blur(validateAddress1);
	 $("#tw_prof_link").keyup(validate_twter_url);
	 //$("#email_id").blur(validateUserName);
	 //$("#userName").keyup(validateUserName);
	 
	  var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	  //**************************************//
	//function called on form submit
	$('#addbtn').click(function() {
		$('#addbtn').attr('disabled', 'disabled' );
		if(validateprofileName() & validateEmail() & validate_fburl() & validate_twter_url()   & validatePass() & confirmPass() & validateCountry() & validateState() & validateCity()  & validateMobNo() )
     {	
	 	
		
		$.when(validateDupEmail()).done(function(a1){
		if(a1==0){
		$("#email_error").remove();	
		
		var profileName	= $("#profileName").val();
	//	var lastName	= $("#lastName").val();
		var email_id	= $("#email_id").val();
		var userEmail	= $("#email_id").val();
		var userPassword= $("#userPassword").val();
		var id_proof_file_name	= $("#hid_id_proof").val();
		var country 		= $("#country").val();
		var state 		= $("#state").val();
		var city		= $("#city").val();	
		//var zip			= $("#zip").val();	
		var mob_no		= $("#mob_no").val();	
		var profile_timg= $("#profile_timg").val();	
		var web_site_url= $("#web_site").val();
		var fb_prof_link= $("#fb_prof_link").val();	
		var tw_prof_link= $("#tw_prof_link").val();	
		var addr_proof	= $("#hid_addr_proof").val();
		var address = $("#address").val();	
		var userStatus 	= '1';
		var fb_userid	= 0;
		$.ajax({		
				type: "POST",
				url: baseurl+"admin/users/insert_siteuser", 
				data:"country="+country+"&profileName="+profileName+"&userEmail="+userEmail+"&userPassword="+userPassword+"&email_id="+email_id+"&city="+city+"&state="+state+"&mob_no="+mob_no+"&id_proof_file_name="+id_proof_file_name+"&profile_timg="+profile_timg+"&web_site_url="+web_site_url+"&fb_prof_link="+fb_prof_link+"&tw_prof_link="+tw_prof_link+"&address="+address+"&addr_proof="+addr_proof,
				success: function(msg){
			if(msg)
			{ 
			//alert(msg);
                 $("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span>'+msg+'</span></td></tr>');
				 $('#addbtn').attr('disabled', 'disabled');
				 setTimeout("hideResponseMsg('#adduser',$('#addbtn'),'#common_message');", 4500); 
				
				 setTimeout(window.location.href=baseurl+'admin/users/manage_siteusers',6000);
				
				
				   
			}
		}
	   
	});	
		}else{
				$('#addbtn').removeAttr('disabled');
				return false;	
		}
		});	
}

else {
	$('#addbtn').removeAttr('disabled');
	return false;
	}

});

	
	//**********************************//
	$('#removeIdProof').click(function() {
	var baseurl ='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	//alert(baseurl);
	//  var vid    =  $('#hidVidFile').val();
	  var image  =  $('#hid_id_proof').val();
	if(image) {
		var user_id=$('#hid_uid').val();
		//if(project_id =='')
		//project_id='';unlink_project_image
		
		$.ajax({
			type: "POST",
			url: baseurl+"admin/users/unlink_idproof", 
			data: "image="+image+"&user_id="+user_id,
			success: function(msg){
				if(msg)
				{ 
					
					if(msg==1) {
					//	var img=baseurl+"images/add_img.jpg";
					var img=baseurl+"images/no_image.png";
						$('#id_proof_div').html('<img src="'+img+'" />');
						 $('#hid_id_proof').val('');
						
						 $('#id_proof').uploadify('disable', false);
						// $('#img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
						 $('#removeIdProof').hide();
						}
				}
			}
		   
		});
	}
		
});


	$('#removeImg').click(function() {
	var baseurl ='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	//alert(baseurl);
	//  var vid    =  $('#hidVidFile').val();
	  var image  =  $('#profile_timg').val();
	if(image) {
		var user_id=$('#hid_uid').val();
		//var project_id=$('#project_id').val();
		//if(project_id =='')
		//project_id='';
		$.ajax({
			type: "POST",
			url: baseurl+"admin/users/unlink_profile_image", 
			data: "image="+image+"&user_id="+user_id,
			success: function(msg){
				if(msg)
				{ 
					
					if(msg==1) {
						var img=baseurl+"images/no_image.png";
						 $('#profile_timg').val('');
						
						 $('#prof_img_upload').uploadify('disable', false);
						  $('#prof_img_div').html("<img  src='"+img+"' />");
						// $('#img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
						 $('#removeImg').hide();
						}
				}
			}
		   
		});
	}
		
});
function validate_url(){
		 var enteredURL= $("#websites").val();
		$("#websites_error").remove();	
		if($("#websites").val()=='')
		{
		//$("#fb_prof_link").after('<div class="clear"/><span class="error" id="fb_prof_link_error"><span>This field is required</span></span>');
		return true;
		}
 	else if(!checkURL()) {
      //alert("This is not a Facebook URL");
	  $("#websites").after('<span class="error" id="websites_error"><span>This is not a valid URL</span></span>');
		return false;
      }
 	else
		{
		//$("#lastName").after('<div class="clear"/><span class="checked" id="lastname_error"><span></span></span>');
		return true;
		}
	}
	
	function validateAdrproof()
	{
	
		$("#addr_proof_error").remove();	
		if($("#hid_addr_proof").val()=='')
		{
		$("#hid_addr_proof").after('<div class="clear"/><span class="error" id="addr_proof_error"><span>This field is required</span></span>');
		return false;
		}
		
		else
		{
		
		//$("#hid_id_proof").after('<div class="clear"/><span class="checked" id="username_error"><span></span></span>');
		return true;
		}
	}
	function validate_url(url)
	{
		
		if(/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(url))
		   {
			  
			   return true;        
		   } 
		  else
			{
				 return false;
			}
	
	  
	}
	 function validate_fburl(){
		 $("#fb_prof_link_error").remove();	
		// alert($("#fb_prof_link").val());
		var FBurl = /^(http|https)\:\/\/www.facebook.com\/.*/i;
		var enteredURL = $.trim($("#fb_prof_link").val());
		if($.trim($("#fb_prof_link").val())=='')
		{
			//$("#fb_prof_link").after('<div class="clear"/><span class="error" id="fb_prof_link_error" ><span>Please enter fb url</span></span>');
			return true;
		}
		else
		{
		   if(enteredURL.match(FBurl))
		   {
			   //$("#fb_prof_link").after('<div class="clear"/><span class="checked" id="fb_prof_link_error"><span></span></span>');
			   return true;        
		   } 
		  else
			{
				 $("#fb_prof_link").after('<div class="clear"/><span class="error" id="fb_prof_link_error" ><span>Please enter valid url</span></span>');
				 return false;
			}
	
		}
		 
		}
		
		 function validate_twter_url(){
		 $("#tw_prof_link_error").hide();	
		// alert($("#fb_prof_link").val());
		if($.trim($("#tw_prof_link").val())=='')
		{
			//$("#fb_prof_link").after('<div class="clear"/><span class="error" id="fb_prof_link_error" ><span>Please enter fb url</span></span>');
			return true;
		}
		else
		{
		   if(validate_url($("#tw_prof_link").val()))
		   {
			   $("#tw_prof_link").after('<div class="clear"/><span class="checked" id="tw_prof_link_error"><span></span></span>');
			   return true;        
		   } 
		  else
			{
				 $("#tw_prof_link").after('<div class="clear"/><span class="error" id="tw_prof_link_error" ><span>Please enter valid url</span></span>');
				 return false;
			}
	
		}
		 
		}
		
		
		
		
	 	//function for validating First Name
		function validateprofileName()
		{
				
				$("#username_error").hide();	
				if($("#profileName").val()=='')
				{
				$("#profileName").after('<div class="clear"/><span class="error" id="username_error"><span>This field is required</span></span>');
				return false;
				}
				else if(ValidateString($("#profileName").val())==false)
				{
					$("#profileName").after('<div class="clear"/><span class="error" id="username_error"><span>Characters Only</span></span>');
					return false;	
				}
				else
				{
				
				$("#profileName").after('<div class="clear"/><span class="checked" id="username_error"><span></span></span>');
				return true;
				
				
				}
				}
				
				
				
				
				function validateSite_url()
				{
				
				$("#web_site_error").remove();	
				if($("#web_site_link").val()=='')
				{
				$("#web_site_link").after('<div class="clear"/><span class="error" id="web_site_error"><span>This field is required</span></span>');
				return false;
				}
				else if(validate_url($("#web_site_link").val())==false)
				{
					$("#web_site_link").after('<div class="clear"/><span class="error" id="lastname_error"><span>Characters Only</span></span>');
					return false;	
				}
				else
				{
				//$("#lastName").after('<div class="clear"/><span class="checked" id="lastname_error"><span></span></span>');
				return true;
				}
				}
				
				//function for validating Last Name
				function validateLastName()
				{
				
				$("#lastname_error").hide();	
				if($("#lastName").val()=='')
				{
				$("#lastName").after('<div class="clear"/><span class="error" id="lastname_error"><span>This field is required</span></span>');
				return false;
				}
				else if(ValidateString($("#lastName").val())==false)
				{
					$("#lastName").after('<div class="clear"/><span class="error" id="lastname_error"><span>Characters Only</span></span>');
					return false;	
				}
				else
				{
				
				$("#lastName").after('<div class="clear"/><span class="checked" id="lastname_error"><span></span></span>');
				return true;
				
				
				}
				}
				//function for validating User Name
				function validateUserName()
				{
					
				
					$("#email_error").hide();	
					
					if($("#email_id").val() !=='')
					{
						var email_id = $("#email_id").val();
						$.ajax({
						type: "POST",
						url: baseurl+"admin/users/check_siteemail_id/",  
						data: "email_id="+email_id, 
						success: function(msg){
							if(msg==1)
							{
								$("#email_id").after('<div class="clear"/><span class="error" id="email_error"><span>User Already Exist</span></span>');				exst_res = 'false';
								//return false;
							}
							else
							{
								$("#email_id").after('<div class="clear"/><span class="checked" id="email_error"><span></span></span>');
								
								exst_res = 'true';
								//return true;
							}
						//alert('h iiii '+ exst_res);
						//return exst_res;
						}
						});
						var span_check = $('#email_error').attr('class');
						if(span_check=='error')
							return false;
						else
							return true;
						//return exst_res;
 					}
					else
					{
					$("#email_id").after('<div class="clear"/><span class="error" id="email_error"><span>This field is required</span></span>');
					return false;
					}
				}
				//function for validating the email
				function validateEmail()
				{
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				$("#email_error").remove();	
				if($("#email_id").val()=='')
				{
				$("#email_id").after('<div class="clear"/><span class="error" id="email_error"><span>This field is required</span></span>');
				return false;
				}
				else if(!emailReg.test($("#email_id").val())) 
				{
				
				$("#email_id").after('<div class="clear"/><span class="error" id="email_error"><span>Enter valid Email Id</span></span>');
				return false;
				}
				else
					{
						$("#email_error").remove();	
						return true;
					}
				}
				function validateDupEmail()
				{
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				$("#email_error").remove();	
				if($("#email_id").val()=='')
				{
				$("#email_id").after('<div class="clear"/><span class="error" id="email_error"><span>This field is required</span></span>');
				return false;
				}
				else if(!emailReg.test($("#email_id").val())) 
				{
				
				$("#email_id").after('<div class="clear"/><span class="error" id="email_error"><span>Enter valid Email Id</span></span>');
				return false;
				}
				else if($("#email_id").val() !=='')
					{
						var email_id = $("#email_id").val();
						return $.ajax({
						type: "POST",
						url: baseurl+"admin/users/check_siteemail_id/",  
						data: "email_id="+email_id, 
						success: function(msg){
							if(msg==1)
							{
								$("#email_id").after('<div class="clear"/><span class="error" id="email_error"><span>User Already Exist</span></span>');				
								//exst_res = 'false';
								//return false;
							}
							else
							{
								$("#email_error").remove();	
								//exst_res = 'true';
								//return true;
							}
						//alert('h iiii '+ exst_res);
						//return exst_res;
						}
						});
						
							}
					else
					{
						$("#email_error").remove();	
						//$("#email_id").after('<div class="clear"/><span class="checked" id="email_error"><span></span></span>');
						return 0;
					}
		}
				//function for validating user type
				function validateUserType()
				{
				
					$("#usertype_error").hide();	
					if($("#user_type").val()=='')
					{
					$("#user_type").after('<div class="clear"/><span class="error" id="usertype_error"><span>This field is required</span></span>');
					return false;
					}
					else
					{
						$("#user_type").after('<div class="clear"/><span class="checked" id="usertype_error"><span></span></span>');
						return true;
					}
				}
				
				function validateCountry()
				{
				
				$("#country_error").remove();	
				if($("#country").val()=='')
				{
				$("#country").after('<div class="clear"/><span class="error" id="country_error"><span>This field is required</span></span>');
				return false;
				}
				else
				{
				
			//	$("#country").after('<div class="clear"/><span class="checked" id="country_error"><span></span></span>');
				return true;
				
				
				}
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
				//function for validating Zip
				function validateZip()
				{
				
				$("#zip_error").hide();	
				if($("#zip").val()=='')
				{
				$("#zip").after('<div class="clear"/><span class="error" id="zip_error"><span>This field is required</span></span>');
				return false;
				}
				else if(IsNumeric($("#zip").val())==false)
 				{
					$("#zip").after('<div class="clear"/><span class="error" id="zip_error"><span>Numeric Values only</span></span>');
					return false;	
				}
				else if($("#zip").val().length <6) {
					$("#zip").after('<div class="clear"/><span class="error" id="zip_error"><span>Enter Valid Zip</span></span>');
					return false;
				}
				else
				{
				
				$("#zip").after('<div class="clear"/><span class="checked" id="zip_error"><span></span></span>');
				return true;
				}
				}
				
				//function for validating Mob number
				function validateMobNo()
				{
				
				$("#mobno_error").hide();	
				if($("#mob_no").val()=='')
				{
				$("#mob_no").after('<div class="clear"/><span class="error" id="mobno_error"><span>This field is required</span></span>');
				return false;
				}
				else if(IsNumeric($("#mob_no").val())==false)
 				{
					$("#mob_no").after('<div class="clear"/><span class="error" id="mobno_error"><span>Numeric Values only</span></span>');
					return false;	
				}
				else if($("#mob_no").val().length <10) {
					$("#mob_no").after('<div class="clear"/><span class="error" id="mobno_error"><span>Enter Valid One</span></span>');
					return false;
				}
				else
				{
				
				$("#mob_no").after('<div class="clear"/><span class="checked" id="mobno_error"><span></span></span>');
				return true;
				
				
				}
				}
				//function for validating Resi number
				function validateResNo()
				{
				
					$("#resino_error").hide();	
					if($("#resi_no").val()!=='')
					{
						if(IsNumeric($("#resi_no").val())==false)
						{
							$("#resi_no").after('<div class="clear"/><span class="error" id="resino_error"><span>Numeric Values only</span></span>');
							return false;	
						}
						else if($("#resi_no").val().length <10) {
							$("#resi_no").after('<div class="clear"/><span class="error" id="resino_error"><span>Enter Valid One</span></span>');
							return false;
						}
						else
						{
							$("#resi_no").after('<div class="clear"/><span class="checked" id="resino_error"><span></span></span>');
							return true;
						}
					
					} else {
						return true;
					}
				}
				//function for validating Office number
				function validateOfficeNo()
				{
				
					$("#officeno_error").hide();	
					if($("#office_no").val()!=='')
					{
						if(IsNumeric($("#office_no").val())==false)
						{
							$("#office_no").after('<div class="clear"/><span class="error" id="officeno_error"><span>Numeric Values only</span></span>');
							return false;	
						}
						else if($("#office_no").val().length <10) {
							$("#office_no").after('<div class="clear"/><span class="error" id="officeno_error"><span>Enter Valid One</span></span>');
							return false;
						}
						else
						{
						
						$("#office_no").after('<div class="clear"/><span class="checked" id="officeno_error"><span></span></span>');
						return true;
						
						
						}
					}
					else {
						return true;
					}
				}
				
				//function for validating Address
				function validateAddress1()
				{
				
				$("#address1_error").hide();	
				if($("#address").val()=='')
				{
				$("#address").after('<div class="clear"/><span class="error" id="address1_error"><span>This field is required</span></span>');
				return false;
				}
				else
				{
				
				$("#address").after('<div class="clear"/><span class="checked" id="address1_error"><span></span></span>');
				return true;
				
				
				}
				}
				
				
			//function for validating Admin Login Name
				function validatePassword(password) 
				{   
				 	var passwordPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])./;    
					 return passwordPattern.test(password) ;
			  	} 
				function validatePass()
				{
				
				$("#pass_error").hide();
				var invalid = " "; // Invalid character is a space
				var minLength = 6; // Minimum length
				var ck_password = /^[A-Za-z0-9!@#$%^&*()_]{5,10}$/;
				
  
				var pwd=$("#userPassword").val();

	
				//alert(document.adduser.userPassword.value.length);
				if($("#userPassword").val()=='')
				{
				$("#userPassword_error").after('<div class="clear"/><span class="error" id="pass_error"><span>This field is required</span></span>');
				return false;
				}
				else if(pwd.length<5) 
				{
					$("#userPassword_error").after('<div class="clear"/><span class="error" id="pass_error""><span>Must be 5 to 10 characters</span></span>');
					return false;
				
				}
				else if(!ck_password.test($("#userPassword").val())) 
		       {
			
			   $("#userPassword_error").after('<div class="clear"/><span class="error" id="pass_error""><span>Enter valid Password.</span></span>');
			   return false;
			
		       }
				else
				{
				
				$("#userPassword_error").after('<div class="clear"/><span class="checked" id="pass_error"><span></span></span>');
				return true;
				
				
				}
				}
				//function for validating confirm password and password match
				function confirmPass()
				{
				$("#confirm_pass_error").hide();
				
				
					if($("#c_password").val()==0)
					{
					
					$("#c_password").after('<div class="clear"/><span class="error" id="confirm_pass_error"><span>Confirm the Password</span></span>');
					return false;
					
					}
					else if($("#userPassword").val() != $("#c_password").val())
					{
					
					$("#c_password").after('<div class="clear"/><span class="error" id="confirm_pass_error"><span>Password mismatch</span></span>');
					return false;
					
					}
					
					else 
					{
					
					$("#c_password").after('<div class="clear"/><span class="checked" id="confirm_pass_error"><span></span></span>');
					return true;
					
					}
				
				
				}
				
	
		});
		//function to hide the displayed message,to clear the form and to enable the Button[Modified on 10-08-2011]
		function hideResponseMsg(formID,buttonID,msg)
		{
		
				$("#common_message").slideToggle('slow');
				if(formID!=null)
				//formID.clearForm();
				buttonID.removeAttr('disabled');
		
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
		function getCityBox(val) {
			if(val=='other') {
				document.getElementById('city_load').innerHTML='<input name="city" id="city" type="text" />';
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
			</script> 

<div class="shadow_outer">
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
" name="baseURl4js" id="baseURl4js" />
  <div class="shadow_inner" >
    <input type="hidden" name="imgpath" id="imgpath" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
swfupload/">
    <div class="table_listing font_segoe ">
      <form  name="adduser" id="adduser" method="post" enctype="multipart/form-data" >
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          
          <tbody>
            <tr>
              <th colspan="2" align="left"><h2 style="margin-left:5px;">Add New Site User</h2></th>
            </tr>
            <tr id="field_header" >
              <td valign="top" colspan="2" align="left" >Fields marked with <span class="star">*</span> are required</td>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="2"><div id="display"><?php if ($_smarty_tpl->tpl_vars['updated_msg']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['updated_msg']->value;?>
<?php }?></div></td>
            </tr>
            <tr  class="shade01">
              <td width="25%" align="left" valign="top">Profile name <span style="color:#F00">*</span></td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" name="profileName" id="profileName" value="" class="styletxt40perc" />
                </div></td>
            </tr>
            <!--<tr >
              <td  align="left" valign="top">Last Name <span style="color:#F00">*</span></td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" name="lastName" id="lastName" value=""/>
                </div></td>
            </tr>-->
            <tr >
              <td  align="left" valign="top">Email <span style="color:#F00">*</span></td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" name="email_id" id="email_id" class="styletxt40perc" value=""/>
                </div></td>
            </tr>
            <tr  class="shade01">
              <td valign="top" align="left">Password <span style="color:#F00">*</span></td>
              <td valign="top" align="left"><div class="formValidation">
                  <input type="password" name="userPassword"  id="userPassword" class="styletxt40perc" minlength="5" maxlength="10"/>
                  <span style="font-family:Verdana, Geneva, sans-serif;font-size:10px;color:#999;" id="userPassword_error">(must be 5 to 10 characters, !@#$%^&*()_ are allowed) </span> </div></td>
            </tr>
            <tr >
              <td valign="top" align="left">Confirm password <span style="color:#F00">*</span></td>
              <td valign="top" align="left"><div class="formValidation">
                  <input type="password" class="styletxt40perc" name="c_password" id="c_password" minlength="5" maxlength="10"/>
                </div></td>
            </tr>
            <tr class="shade01" style="height:100px">
              <td valign="top" align="left">Address <span style="color:#F00"></span></td>
              <td valign="top" align="left"><div class="formValidation">
                  <textarea id="address" name="address" style="width:355px; height: 70px;" ></textarea>
                </div></td>
            </tr>
            
            <tr  >
              <td  align="left" valign="top">Facebook profile link <span style="color:#F00"></span></td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" class="styletxt40perc" name="fb_prof_link" id="fb_prof_link" />
                </div></td>
            </tr>
            <tr class="shade01">
              <td  align="left" valign="top">Twitter profile link</td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" class="styletxt40perc" name="tw_prof_link" id="tw_prof_link" />
                </div></td>
            </tr>
            <tr >
              <td  align="left" valign="top">Country <span style="color:#F00">*</span></td>
              <td  align="left" valign="top"><div class="formValidation">
                  <select name="country" id="country" class="styletxt40perc" onchange="getCountry(this.value)" />
                  
                  <option value="">Select country</option>
                  <?php  $_smarty_tpl->tpl_vars['cntry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cntry']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sel_country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cntry']->key => $_smarty_tpl->tpl_vars['cntry']->value){
$_smarty_tpl->tpl_vars['cntry']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['cntry']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['cntry']->value->countryid;?>
" ><?php echo $_smarty_tpl->tpl_vars['cntry']->value->country;?>
</option>
                  <?php } ?>
                  </select>
                </div></td>
            </tr>
            <tr  class="shade01">
              <td  align="left" valign="top">State <span style="color:#F00">*</span></td>
              <td  align="left" valign="top"><div class="formValidation" id="state_load">
                  <select name="state" id="state" class="styletxt40perc" onchange="getCities(this.value)" />
                  
                  <option value="">Select State</option>
                  <!--<?php  $_smarty_tpl->tpl_vars['st'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['st']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sel_states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['st']->key => $_smarty_tpl->tpl_vars['st']->value){
$_smarty_tpl->tpl_vars['st']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['st']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['st']->value->st_id;?>
" ><?php echo $_smarty_tpl->tpl_vars['st']->value->state;?>
</option>
                  <?php } ?>-->
                  </select>
                </div></td>
            </tr>
            <tr  >
              <td  align="left" valign="top">City <span style="color:#F00">*</span></td>
              <td  align="left" valign="top"><div class="formValidation" id="city_load">
                  <select name="city" id="city" class="styletxt40perc" />
                  
                  <option value="">Select City</option>
                  </select>
                </div></td>
            </tr>
           <!-- <tr>
              <td  align="left" valign="top">Zip <span style="color:#F00">*</span></td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" name="zip" id="zip" maxlength="10" />
                </div></td>
            </tr>-->
            <tr class="shade01" >
              <td  align="left" valign="top">Contact no(Mob) <span style="color:#F00">*</span></td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" class="styletxt40perc" name="mob_no" id="mob_no" maxlength="16"/>
                </div></td>
            </tr>
            <tr >
              <td  align="left" valign="top">Web site </td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" class="styletxt40perc" name="web_site" id="web_site" />
                </div></td>
            </tr>
            <tr class="shade01">
            <td  align="left" valign="top">Profile Image </td>
              <td  align="left" valign="top"><div class="selectImg">
                  <div id="prof_img_div"> </div>
                  <a id="removeImg" class="uploadClose" style="display:none;" >Remove image</a>
                  <div class="chooseBtnPane">
                    <input type="file" id="prof_img_upload" name="prof_img_upload" />
                    <!--<a class="curve3 btnGradientGrn chooseBtn txtShadowGrn" id="img_upload" href="javascript:void(0);">Choose</a>--> 
                    
                  </div>
                  <div class="clear"></div>
                  <!--<p style="float: right;margin-top: -21px;">Please upload 700X400 jpeg image</p>--> 
                  
                </div>
                <input type="hidden" name="profile_timg" id="profile_timg" value="" /></td>
             
            </tr>
            <tr >
               <td  align="left" valign="top">Upload id proof <span style="font-family:Verdana, Geneva, sans-serif;font-size:10px;color:#999;" id="idProof_error">(Any scanned copy of passport, id card or pancard) </span></td>
              <td  align="left" valign="top"><div class="selectImg">
                  <div id="id_proof_div"> </div>
                  <a id="removeIdProof" class="uploadClose" style="display:none;" >Remove id proof</a>
                  <div class="chooseBtnPane">
                  <input type="file" name="id_proof" id="id_proof" />
              
                 </div>
                  <div class="clear"></div> </div>
                  <input type="hidden" name="hid_id_proof" id="hid_id_proof" value="" /></td>
            </tr>
            <tr class="shade01">
               <td  align="left" valign="top">Upload address proof <span style="font-family:Verdana, Geneva, sans-serif;font-size:10px;color:#999;" id="addProof_error">(Passport/Driving License)</span></td>
              <td  align="left" valign="top"><div class="selectImg">
               <div id="address_proof_div"> </div>
          <input type="file" id="addr_proof" name="addr_proof" />
          <input type="hidden" name="hid_addr_proof" id="hid_addr_proof" value="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['address_id_proof'];?>
" />
        </div>
        </td></tr>
            
           <tr >
              <td valign="top" align="left">&nbsp;</td>
              <td valign="top" align="left"><span class="btnlayout">
                <input type="button" value="Add" id="addbtn" class="button" name="addbtn"   />
                </span> <span class="btnlayout ">
                <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/users/manage_siteusers'"/>
                </span></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  <!--End:Border 3--> 
</div>
<!--End:Border 2--> 
<?php }} ?>