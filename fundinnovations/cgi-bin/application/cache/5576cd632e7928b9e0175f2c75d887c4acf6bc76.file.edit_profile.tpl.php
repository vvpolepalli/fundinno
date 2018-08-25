<?php /* Smarty version Smarty-3.1.8, created on 2013-03-05 19:34:26
         compiled from "/var/www/fundinnovations/application/views/profile/edit_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1593863150e2c8508a19b3-55741440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5576cd632e7928b9e0175f2c75d887c4acf6bc76' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/edit_profile.tpl',
      1 => 1361517556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1593863150e2c8508a19b3-55741440',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50e2c8508d8163_90635376',
  'variables' => 
  array (
    'baseurl' => 0,
    'update_profile' => 0,
    'my_profile_det' => 0,
    'fbuser' => 0,
    'user_details' => 0,
    'category_list' => 0,
    'cat' => 0,
    'liked_category_ids' => 0,
    'child' => 0,
    'ext' => 0,
    'sel_country' => 0,
    'cntry' => 0,
    'cities' => 0,
    'c' => 0,
    'project_det' => 0,
    'ext2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50e2c8508d8163_90635376')) {function content_50e2c8508d8163_90635376($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?><link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/css/uploadify.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/js/jquery.uploadify-3.1.min.js"></script>

 
<script type="text/javascript">
				
$(window).load(function(){
		documentload();
	
});

function documentload(){	
	var res='<?php echo $_smarty_tpl->tpl_vars['update_profile']->value;?>
';
	if(res == 'updated'){
		setTimeout(function(){
		$('.msgLi').hide();
		},3000);
	}
	
		//var baseurl =$('#hid_baseurl').val();
		var cntry_id='<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['country_id'];?>
';
	//	alert(cntry_id);
	 var state_id= '<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['state_id'];?>
';
	  var city_id= '<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['city_id'];?>
';
	if(city_id !='' && city_id !=0 && state_id !='' && state_id !=0 && cntry_id !='' && cntry_id !=0)
	getCntryStCt(cntry_id,state_id,city_id); 
	else
	{
		getCountry(113);
	}
	 
	 $("#profileName").blur(validateprofileName);
	 $("#mob_no").blur(validateMobNo);
	 $("#fb_prof_link").blur(validateFb_lnk);
	 $('#tw_prof_link').blur(validateTw_lnk);
	  $('#websites').blur(validate_url);
	var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';

	$('#id_proof').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
        'fileTypeExts' : '*.doc; *.pdf; *.docx; *.gif; *.jpg; *.jpeg; *.png',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'user_idproof_upload',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/user_id_proof',
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
			//	alert(data); <span id="dwn_idpf" >{if $my_profile_det.address_id_proof neq ''}
          //<a href="{$baseurl}admin/download_file/download_address_proof/{$my_profile_det.address_id_proof}">Click here to download</a>
			var ext = data.split('.').pop();
			var lnk=  baseurl+"admin/download_file/download_idproof/"+data;
			ext =ext.toLowerCase();
				if(ext =='gif' || ext == 'jpg' || ext == 'JPG' || ext == 'png' ){
				  var image   =  baseurl+'uploads/user_id_proof/'+data;
				  // $('#id_proof_div').html("<img  src='"+image+"' />");
				  var img_path='uploads/user_id_proof/thumb';
				  var link_path='admin/download_file/download_idproof/'+data;
			 $('#dwn_idpf').html('<a href="javascript:void(0);" onclick="view_image(\''+img_path+'\',\''+link_path+'\')">View Image / Download</a>');
				   // $('#view_idpf').show();
				}else if(ext =='doc' || ext == 'docx'){
					 //$('#view_idpf').hide();
					 $('#dwn_idpf').html('<a href="'+lnk+'">Download file</a>');
				}else if(ext =='pdf' ){
					// $('#view_idpf').hide();
					 $('#dwn_idpf').html('<a href="'+lnk+'">Download file</a>');
				}
				
				
				   //$('#removeIdProof').show();
				  
				   $('#hid_id_proof').val(data);
				   $("#id_proof_error").remove();	
				}
           }
        // Put your options here
    });	
	$('#addr_proof').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
        'fileTypeExts' : '*.doc; *.pdf; *.docx; *.gif; *.jpg; *.jpeg; *.png',
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
			     // alert(data);
				  var lnk=  baseurl+"admin/download_file/download_address_proof/"+data;
				  var image   =  baseurl+'uploads/user_address_proof/'+data;
				  var ext = data.split('.').pop();
				  ext =ext.toLowerCase();
				if(ext =='gif' || ext == 'jpg' || ext == 'png' ){
				  var image   =  baseurl+'uploads/user_address_proof/'+data;
				    var img_path='uploads/user_address_proof/thumb';
				   //$('#id_proof_div').html("<img  src='"+image+"' />");
				    var link_path='admin/download_file/download_address_proof/'+data;
			 $('#dwn_addrpf').html('<a href="javascript:void(0);" onclick="view_addr_image(\''+img_path+'\',\''+link_path+'\')">View Image / Download</a>');
				   // $('#view_addrpf').show();
				   
				}else if(ext =='doc' || ext == 'docx'){
					 // $('#view_addrpf').hide();
					 $('#dwn_addrpf').html('<a href="'+lnk+'">Download file</a>');
				}else if(ext =='pdf' ){
					$('#dwn_addrpf').html('<a href="'+lnk+'">Download file</a>');
				}
				
				  $('#hid_addr_proof').val(data);
				  $("#addr_proof_error").remove();	
				}
           }
        // Put your options here
    });	
	$('#prof_img_upload').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
		'height'   : 140,
		'width'   : 233,
		'buttonImage' : baseurl+'images/upload_img_trans.gif',
        'fileTypeExts' : '*.gif; *.jpg; *.jpeg; *.png',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'profile_img_upload',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/site_users',
		'auto'      : true,
		'multi'     : false,
		'onUploadStart' : function(file) {
           //alert('Starting to upload ' + file.name);
		   // $('#prof_img_upload').uploadify('disable', true);
        },
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
		'onUploadSuccess' : function(file, data, response) {
			   if((data=='ERROR:invalid upload')||(data=='Please upload images of size, Minimum 98 X 98')||(data=='ERROR:Could not resize image' || (data == 'ERROR:could not create image handle '+file.name)))
			      {
					 $('#size_alert').show();
					$('#alert_cntnt').html(data); 
				  }
			   else
			    {
				//alert(data);
				   var image   =  baseurl+'uploads/site_users/thumb/'+data;
				   $('#img_div').html("<img style='width:233px;height:140px' src='"+image+"' />");
				   $('#removeImg').show();
				   $('#profile_timg').val(data);
				}
           }
        // Put your options here
    });
	
	$('#removeIdProof').click(function() {
	var baseurl ='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	//alert(baseurl);
	//  var vid    =  $('#hidVidFile').val();
	  var image  =  $('#hid_id_proof').val();
	if(image) {
		//var project_id=$('#project_id').val();
		//if(project_id =='')
		//project_id='';unlink_project_image
		$('#hid_id_proof').val('');
		$('#view_idpf').hide();
		//$('#id_proof').uploadify('disable', false);
		// $('#img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
		 $('#removeIdProof').hide();
		/*$.ajax({
			type: "POST",
			url: baseurl+"user/unlink_idproof", 
			data: "image="+image,
			success: function(msg){
				if(msg)
				{ 
					
					if(msg==1) {
					//	var img=baseurl+"images/add_img.jpg";
						 $('#hid_id_proof').val('');
						$('#view_idpf').hide();
						//$('#id_proof').uploadify('disable', false);
						// $('#img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
						 $('#removeIdProof').hide();
						}
				}
			}
		   
		});*/
	}
		
});


	$('#removeImg').click(function() {
	var baseurl ='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	//alert(baseurl);
	//  var vid    =  $('#hidVidFile').val();
	  var image  =  $('#profile_timg').val();
	if(image) {
		//var project_id=$('#project_id').val();
		//if(project_id =='')
		//project_id='';
		var img=baseurl+"images/add_img.jpg";
		 $('#profile_timg').val('');
		
		 $('#prof_img_upload').uploadify('disable', false);
		 $('#img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
		 $('#removeImg').hide();
		$('#prof_img_upload').uploadify('disable', false);			 
		/*$.ajax({
			type: "POST",
			url: baseurl+"user/unlink_profile_image", 
			data: "image="+image,
			success: function(msg){
				if(msg)
				{ 
					
					if(msg==1) {
						var img=baseurl+"images/add_img.jpg";
						 $('#profile_timg').val('');
						
						 $('#prof_img_upload').uploadify('disable', false);
						 $('#img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
						 $('#removeImg').hide();
						}
				}
			}
		   
		});*/
	}
		
});

}
	function getCountry(cid)
		{
			baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
			 $.ajax({
					type: "POST",
					url: baseurl+"user/get_country/"+cid,  
					data: "", 
					success: function(msg){
						document.getElementById('state_load').innerHTML=msg;
					}
				});
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
	function getCountryBySid(cid,stid)
		{
			baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
			 $.ajax({
					type: "POST",
					url: baseurl+"user/get_country/"+cid,  
					data: "", 
					success: function(msg){
						document.getElementById('state_load').innerHTML=msg;
						$('#state').val(stid); 
						getCities(stid);
					}
				});
		}
		
		function getCntryStCt(cntry_id,state_id,city_id){
			getCountryBySid(cntry_id,state_id);
			setTimeout(function() {
				
				$('#city').val(city_id); 
     		 // Do something after 5 seconds
			}, 1000);
			}
			
	function close_pop(id){
	 $('#'+id).hide();
	 $('#pop_cntnt').empty();
	 closepPopup();
 	}
	function view_image(path,down_path){
		 var image  =  $('#hid_id_proof').val();
		 var baseurl =$('#baseurl').val();
		 if(image)
		 $('#pop_cntnt').html('<center><img src="'+baseurl+path+'/'+image+'"/><a class="d_icon"  href="'+baseurl+down_path+'">Download</a></center>');
		 else{
			  $('#pop_cntnt').html('No address proof..!');
			}
		 $('#image_popup').show();openpPopup();
	}
	//
	
	function view_addr_image(path,down_path){
		 var image  =  $('#hid_addr_proof').val();
		 var baseurl =$('#baseurl').val();
		 if(image)
		 $('#pop_cntnt').html('<center><img src="'+baseurl+path+'/'+image+'"/><a class="d_icon" href="'+baseurl+down_path+'">Download</a></center>');
		 else{
			  $('#pop_cntnt').html('No address proof..!');
			}
		 $('#image_popup').show();openpPopup();
	}
	function validate_form(){
		if(validateprofileName()   & validateFb_lnk() & validateMobNo() & validateTw_lnk() & validate_url()){
			
		}
		else{
			return false;
		}
	}
	function validateIdproof()
	{
	
		$("#id_proof_error").remove();	
		if($("#hid_id_proof").val()=='')
		{
		$("#hid_id_proof").after('<div class="clear"/><span class="error" id="id_proof_error"><span>This field is required</span></span>');
		return false;
		}
		
		else
		{
		
		//$("#hid_id_proof").after('<div class="clear"/><span class="checked" id="username_error"><span></span></span>');
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
	function checkURL() 
	{
		var sites=$('#websites').val().split(',');
		var flag=true;
		// var urlregex = new RegExp("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
		var urlregex = new RegExp("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.){1}([0-9A-Za-z]+\.)");
		 for(var i=0;i<sites.length;i++){
			 
			 if(urlregex.test(sites[i])) {
			 flag=true;
       		// return (true);
   			 }else
			 flag=false;
   			 //return (false);
    	}
		return flag;
	}
	function validateFb_lnk()
	{
	 var FBurl = /^(http|https)\:\/\/www.facebook.com\/.*/i;
	 var enteredURL= $("#fb_prof_link").val();
		$("#fb_prof_link_error").remove();	
		if($("#fb_prof_link").val()=='')
		{
		//$("#fb_prof_link").after('<div class="clear"/><span class="error" id="fb_prof_link_error"><span>This field is required</span></span>');
		return true;
		}
 	else if(!enteredURL.match(FBurl)) {
      //alert("This is not a Facebook URL");
	  $("#fb_prof_link").after('<div class="clear"/><span class="error" id="fb_prof_link_error"><span>This is not a Facebook URL</span></span>');
		return false;
      }
 	else
		{
		//$("#lastName").after('<div class="clear"/><span class="checked" id="lastname_error"><span></span></span>');
		return true;
		}
	}
	function validateTw_lnk()
	{
	 var TWurl = /^(http|https)\:\/\/twitter.com\/.*/i;
	 var enteredURL= $("#tw_prof_link").val();
		$("#tw_prof_link_error").remove();	
		if($("#tw_prof_link").val()=='')
		{
		//$("#fb_prof_link").after('<div class="clear"/><span class="error" id="fb_prof_link_error"><span>This field is required</span></span>');
		return true;
		}
 	else if(!enteredURL.match(TWurl)) {
      //alert("This is not a Facebook URL");
	  $("#tw_prof_link").after('<span class="error" id="tw_prof_link_error"><span>This is not a Twitter URL</span></span>');
		return false;
      }
 	else
		{
		//$("#lastName").after('<div class="clear"/><span class="checked" id="lastname_error"><span></span></span>');
		return true;
		}
	}
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
	//function for validating Mob number
	  function validateMobNo()
	  {
	  
	  $("#mobno_error").hide();	
	  if($("#mob_no").val()=='')
	  {
	//  $("#mob_no").after('<div class="clear"/><span class="error" id="mobno_error"><span>This field is required</span></span>');
	  return true;
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
	</script> 

<section class="innerMidWrap funding_EditP">
  <div class="innerMidContent">
  <?php if ($_smarty_tpl->tpl_vars['update_profile']->value=='updated'){?>
      	  <div class="msgLi">
        	 <div class="mini-success">Profile Updated successfully.</div>
       	 </div>
        <?php }?> 
    <div class="funding_tabEditP">
      <ul class="fundTab">
        <li><a class="active" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/edit_profile">Edit profile<span class="arrow"></span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/account_settings" >Account Settings<span class="arrow"></span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/my_notifications" >My Notifications<span class="arrow"></span></a></li>
        
        
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div id="ajx_load_cntnt">
      <div class="prodeForm"> 
      <input type="hidden" id="baseurl" name="baseurl" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
" />
        <h5>Profile Information</h5>
        <form id="frm_edit_profile" name="frm_edit_profile" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/edit_profile" method="post" onsubmit="return validate_form();">
        <ul class="left">
          <li class="fieldTxP">
            <label>Name *</label>
            <input type="text"  id="profileName" name="profileName" class="textBoxStyle" value="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['profile_name'];?>
">
          </li>
          <li class="fieldTxP">
            <label>About Me </label>
            <textarea id="about_me" name="about_me" class="textBoxStyle height120"><?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['about_me'];?>
</textarea>
            <!--<input type="text" id="email_id" name="email_id" class="textBoxStyle" value="<?php if ($_smarty_tpl->tpl_vars['fbuser']->value!=0){?><?php echo $_smarty_tpl->tpl_vars['user_details']->value[0]['email_id'];?>
 <?php }?>">--> 
          </li>
          <li class="fieldTxP">
            <label>Contact no. </label>
            <input type="text" id="mob_no" name="mob_no" class="textBoxStyle" value="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['contact_no'];?>
">
          </li>
          <li class="fieldTxP">
            <label>Website(seperate with commas) </label>
            <input type="text" id="websites" name="websites" class="textBoxStyle" value="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['websites'];?>
">
          </li>
          <li class="fieldTxP">
            <label>Facebook Profile Link  </label>
            <input type="text" id="fb_prof_link" name="fb_prof_link" class="textBoxStyle" value="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['fb_link'];?>
">
          </li>
          <li class="fieldTxP">
            <label>Twitter Profile Link  </label>
            <input type="text" id="tw_prof_link" name="tw_prof_link" class="textBoxStyle" value="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['twitter_link'];?>
">
          </li>
          <li class="fieldTxP">
            <label>Intereseted Category </label>
           <?php $_smarty_tpl->tpl_vars["liked_category_ids"] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['my_profile_det']->value['liked_category']), null, 0);?>

              <select name="category_list[]" id="category_list[]"  multiple="multiple" class="multipleSEd" style="width:484px"/>
               
              <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['cat']->value['id'],$_smarty_tpl->tpl_vars['liked_category_ids']->value)){?> selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['cat']->value['category_name'];?>
</option>
             
          <?php if ($_smarty_tpl->tpl_vars['cat']->value['child_category']!=0){?>
          <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value['child_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['child']->value['id'],$_smarty_tpl->tpl_vars['liked_category_ids']->value)){?> selected="selected"<?php }?> >>><?php echo $_smarty_tpl->tpl_vars['child']->value['category_name'];?>
</option>
           
          <?php } ?>
          <?php }?>
         	  <?php } ?> 
              </select>
            
          </li>
            <li class="fieldTxP">
        <label>Upload Identity Proof (Passport/Driving License/PAN Card)  </label>
        <div class="chooseBtnPaneqq" style="padding:10px 0 0;">
        <div style="height: 32px;width: 94px;overflow:hidden;float:left">
          <input type="file" id="id_proof" name="id_proof" />
        </div> 
        <?php $_smarty_tpl->tpl_vars["ext"] = new Smarty_variable(pathinfo($_smarty_tpl->tpl_vars['my_profile_det']->value['address_proof_image'],@PATHINFO_EXTENSION), null, 0);?>
         <?php $_smarty_tpl->tpl_vars["ext"] = new Smarty_variable(mb_strtolower($_smarty_tpl->tpl_vars['ext']->value, 'UTF-8'), null, 0);?>
          <!--<span id="view_idpf"  
          <?php if ($_smarty_tpl->tpl_vars['my_profile_det']->value['address_proof_image']==''){?>  
          style="cursor: pointer;display:none;float: left;padding: 10px 10px 0 10px;"
           <?php }else{ ?>
           <?php if ($_smarty_tpl->tpl_vars['ext']->value=='jpg'||$_smarty_tpl->tpl_vars['ext']->value=='png'||$_smarty_tpl->tpl_vars['ext']->value=='gif'){?> 
            style="cursor: pointer;display: block;float: left;padding: 10px 10px 0 10px;" 
            <?php }else{ ?> style="cursor: pointer;display:none;float: left;padding: 10px 10px 0 10px;"
            <?php }?>
           <?php }?>  onclick="view_image('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/user_id_proof/thumb')" >View existing copy </span>--> 
         
          <span id="dwn_idpf" style="display: block;float: left;padding: 9px 0 0 10px;"><?php if ($_smarty_tpl->tpl_vars['my_profile_det']->value['address_proof_image']!=''){?>
          <?php if ($_smarty_tpl->tpl_vars['ext']->value=='jpg'||$_smarty_tpl->tpl_vars['ext']->value=='png'||$_smarty_tpl->tpl_vars['ext']->value=='gif'){?>
           <a href="javascript:void(0);" onclick="view_image( 'uploads/user_id_proof/thumb','admin/download_file/download_idproof/<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['address_proof_image'];?>
')">View Image / Download</a>
           <?php }else{ ?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/download_file/download_idproof/<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['address_proof_image'];?>
">Download file</a>
          <?php }?>
          <?php }?></span>
         <div class="clear"></div>
          <input type="hidden" name="hid_id_proof" id="hid_id_proof" value="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['address_proof_image'];?>
" />
        </div>
        </li>
        </ul>
        <ul class="right">
          <li class="fieldTxP">
            <label>Joined Date </label>
            <input type="text"  id="name" name="name" class="textBoxStyle" disabled="disabled" value='<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['my_profile_det']->value['joined_date']);?>
'>
          </li>
          <li class="fieldTxP">
            <label>Address </label>
            <textarea id="address" name="address" class="textBoxStyle height120"><?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['address'];?>
</textarea>
            <!--<input type="text" id="email_id" name="email_id" class="textBoxStyle" value="<?php if ($_smarty_tpl->tpl_vars['fbuser']->value!=0){?><?php echo $_smarty_tpl->tpl_vars['user_details']->value[0]['email_id'];?>
 <?php }?>">--> 
          </li>
          <li class="fieldTxP">
            <label>Country </label>
            <select name="country" id="country" class="selectBx" onchange="getCountry(this.value)" />
            
            <?php  $_smarty_tpl->tpl_vars['cntry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cntry']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sel_country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cntry']->key => $_smarty_tpl->tpl_vars['cntry']->value){
$_smarty_tpl->tpl_vars['cntry']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['cntry']->key;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['cntry']->value->countryid;?>
" <?php if ($_smarty_tpl->tpl_vars['my_profile_det']->value['country_id']==$_smarty_tpl->tpl_vars['cntry']->value->countryid){?> selected="selected" <?php }elseif($_smarty_tpl->tpl_vars['cntry']->value->countryid==113){?>selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['cntry']->value->country;?>
</option>
            <?php } ?>
            </select>
          </li>
          <li class="fieldTxP">
            <label>State </label>
            <div id="state_load">
              <select name="state" id="state" class="selectBx" />
              
              <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['city_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['city_id']==$_smarty_tpl->tpl_vars['c']->value['city_id']){?> selected="selected" <?php }?>  ><?php echo $_smarty_tpl->tpl_vars['c']->value['city_name'];?>
</option>
              <?php } ?>
              </select>
            </div>
          </li>
          <li class="fieldTxP">
            <label>City </label>
            <div id="city_load">
              <select name="city" id="city" class="selectBx" />
              
              <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
              <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['city_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['city_id']==$_smarty_tpl->tpl_vars['c']->value['city_id']){?> selected="selected" <?php }?>  ><?php echo $_smarty_tpl->tpl_vars['c']->value['city_name'];?>
</option>
              <?php } ?>
              </select>
            </div>
          </li>
          <li class="fieldTxP" style="height:165px">
          <label>Profile Photo </label>
            <div style="position:relative;width:235px">
              <input type="file" id="prof_img_upload" name="prof_img_upload">
              <div id="img_div" style="width:233px;height:140px;position:absolute;top:1px;left:1px;"> <?php if ($_smarty_tpl->tpl_vars['my_profile_det']->value['profile_imgurl']!=''){?> <img style="width:233px;height:140px"  src="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['profile_imgurl'];?>
"> <?php }else{ ?> <img style="width:233px;height:140px" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/add_img.jpg" /> <?php }?> </div>
              <a id="removeImg" class="removeBtnProfileImg"  href="javascript:void(0);"  <?php if ($_smarty_tpl->tpl_vars['my_profile_det']->value['profile_image']==''){?> style="display:none;" <?php }?> ></a>
              <input type="hidden" id="profile_timg" name="profile_timg" value="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['profile_image'];?>
" />
            </div>
          </li>
          <li class="fieldTxP">
          <label>Upload Address Proof (Passport/Driving License)  </label>
           <div class="chooseBtnPane" style="padding:10px 0 0;">
           <div style="height: 32px;width: 94px;overflow:hidden;float:left">
          <input type="file" id="addr_proof" name="addr_proof" />
          </div>
            <?php $_smarty_tpl->tpl_vars["ext2"] = new Smarty_variable(pathinfo($_smarty_tpl->tpl_vars['my_profile_det']->value['address_id_proof'],@PATHINFO_EXTENSION), null, 0);?>
            
          <!--<span  id="view_addrpf"  
          <?php if ($_smarty_tpl->tpl_vars['my_profile_det']->value['address_id_proof']==''){?> style="cursor: pointer;display:none;float: left;padding: 10px 10px 0 0;" 
          <?php }else{ ?>
           <?php if ($_smarty_tpl->tpl_vars['ext2']->value=='jpg'||$_smarty_tpl->tpl_vars['ext2']->value=='png'||$_smarty_tpl->tpl_vars['ext2']->value=='gif'){?>   style="cursor: pointer;display: block;float: left;padding: 10px 10px 0 10px;"
           <?php }else{ ?> style="cursor: pointer;display:none;float: left;padding: 10px 10px 0 0;" 
           <?php }?>
           <?php }?>  onclick="view_addr_image('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/user_address_proof/thumb')" >View existing copy </span> -->
           
          <span id="dwn_addrpf"  style="display: block;float: left;padding: 9px 0 0 10px;">
          <?php if ($_smarty_tpl->tpl_vars['my_profile_det']->value['address_id_proof']!=''){?>
          <?php if ($_smarty_tpl->tpl_vars['ext2']->value=='jpg'||$_smarty_tpl->tpl_vars['ext2']->value=='png'||$_smarty_tpl->tpl_vars['ext2']->value=='gif'){?>
           <a href="javascript:void(0);" onclick="view_addr_image( 'uploads/user_address_proof/thumb','admin/download_file/download_address_proof/<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['address_id_proof'];?>
')">View Image / Download</a>
           <?php }else{ ?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/download_file/download_address_proof/<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['address_id_proof'];?>
">Download file</a>
          <?php }?>
          <?php }?>
          </span>
          <div class="clear"></div>
          <input type="hidden" name="hid_addr_proof" id="hid_addr_proof" value="<?php echo $_smarty_tpl->tpl_vars['my_profile_det']->value['address_id_proof'];?>
" />
        </div>
          </li>
        </ul>
        <div class="clear"></div>
       
        <div class="submitPane">
          <ul>
            <li class="blueBtnLi">
              <input type="submit" class="blueBtn" id="save" name="save"  value="Save">
            </li>
          </ul>
        </div>
        <div class="clear"></div>
        </form>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>


<div id="image_popup" class="popFixed"  style="display:none">
<div class="popabs">
<div id="inlineContent1" class="white_content" style="width: 470px;margin-left:52.5px">
  <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick = "close_pop('image_popup')">Close</a>
    <div class="popTitle">
        <h4>Proof</h4>
       </div>
      <div id="pop_cntnt"  style="padding:18px"></div>
     
      
  </div>
  <div class="clear"></div>
</div>
</div>
</div>

<div id="size_alert"  class="popFixed" style="display:none">
<div class="popabs">
<div id="inlineContent1" class="white_content">
  <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick = "close_pop('size_alert')">Close</a>
    <div ><!--<h4 id="head_cntnt">Alert</h4>--></div>
      <div id="alert_cntnt"></div>
  </div>
  <div class="clear"></div>
</div>
</div>
</div><?php }} ?>