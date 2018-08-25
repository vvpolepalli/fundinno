<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />jquery.ui.core-->
<link rel="stylesheet" href="{$baseurl}styles/admin/datepicker/jquery.ui.datepicker.css" />
<script type="text/javascript" src="{$baseurl}js/admin/datepicker/jquery.ui.core.js"></script>
<script type="text/javascript" src="{$baseurl}tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<link rel="stylesheet" type="text/css" href="{$baseurl}uploadify/css/uploadify.css" />
<script type="text/javascript" src="{$baseurl}uploadify/js/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="{$baseurl}js/admin/datepicker/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="{$baseurl}js/projects.js"></script>
<link href="{$baseurl}styles/admin/datepicker/jquery.ui.all.css" rel="stylesheet" type="text/css" media="screen" />

<!--<script src="{$baseurl}js/jquery-ui.js"></script>
	<script src="{$baseurl}js/jquery.easy-confirm-dialog.js"></script>-->
{literal} 
<script type="text/javascript" >
//alert = function() {};
window.onbeforeunload = function() {};
$(document).ready(function() {
	
	//tinyMCE.get('project_desc').setContent('jjhjjhjhj');
	/*$("#removeImg").easyconfirm();
	$("#alert").click(function() {
		alert("You approved the action");
	});*/
});
tinyMCE.init({
		// General options
		height : "280",
		verify_html : false,
        cleanup : false,
        cleanup_on_startup : false,
		mode : "exact",
		theme : "advanced",
		elements : 'project_desc',
        convert_urls : false,

		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,imageupload",

		// Theme options
		theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,imageupload,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		//content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		//template_external_list_url : "lists/template_list.js",
		//external_link_list_url : "lists/link_list.js",
		//external_image_list_url : "lists/image_list.js",
		//media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
var baseurl='{/literal}{$baseurl}{literal}';
var loader_img= baseurl+"images/upload_loading.gif";
var vide_defimg=baseurl+'images/upload_video.jpg';
function remove_proj_image(){
	
	var baseurl ='{/literal}{$baseurl}{literal}';
	//alert(baseurl);
	//  var vid    =  $('#hidVidFile').val();
	  var image  =  $('#hidImage').val();
	if(image) {
		//var project_id=$('#project_id').val();
		//if(project_id =='')
		//project_id='';
		$.ajax({
			type: "POST",
			url: baseurl+"project/unlink_project_image", 
			data: "image="+image,
			success: function(msg){
				if(msg)
				{ 
					
					/*if(msg==1) {
						var img=baseurl+"images/add_img.jpg";
						 $('#hidImage').val('');
						
						 //$('#pro_img_upload').uploadify('disable', false);
						 $('#img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
						 $('#removeImg').hide();
						}*/
				}
			}
		   
		});
	}
		
}
$('#removeImg').click(function() {
	var baseurl ='{/literal}{$baseurl}{literal}';
	//alert(baseurl);
	//  var vid    =  $('#hidVidFile').val();
	  var image  =  $('#hidImage').val();
	if(image) {
		//var project_id=$('#project_id').val();
		//if(project_id =='')
		//project_id='';
		$.ajax({
			type: "POST",
			url: baseurl+"project/unlink_project_image", 
			data: "image="+image,
			success: function(msg){
				if(msg)
				{ 
					
					if(msg==1) {
						var img=baseurl+"images/add_img.jpg";
						 $('#hidImage').val('');
						
						 $('#pro_img_upload').uploadify('disable', false);
						 $('#img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
						 $('#removeImg').hide();
						}
				}
			}
		   
		});
	}
		
});
$(function() {
	
	var dates1 = $(".datepicker").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd",
			numberOfMonths: 1,
				minDate:+1,
				defaultDate: +1,
			firstDay: 1});
			//$('.datepicker').datepicker( "setDate", +1 );
			
$('#pro_img_upload').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
		'height'   : 140,
		'width'   : 233,
		'buttonImage' : baseurl+'images/upload_img_trans.gif',
        'fileTypeExts' : '*.gif; *.jpg; *.jpeg; *.png',
        //'fileTypeExts' : '*.mp4;*.avi;*.wmv;*.flv;',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'upload_project_images',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/projects/images/200x150/',
		'auto'      : true,
		'multi'     : false,
		'onUploadStart' : function(file) {
           //alert('Starting to upload ' + file.name);
		  //  $('#pro_img_upload').uploadify('disable', true);
        },
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
		'onUploadSuccess' : function(file, data, response) {
			   if((data=='failed')||(data=='Please select image with hieght 400px and width 700px..!')||(data=='Invalid file formats..!'))
			      {
					//  p_popupOpen('img_size_alert');
					// $('#alert_cntnt').html(data); 
				  }
			   else
			    {
				alert("data: "+data);
				//remove_proj_image();
			
				  var image   =  baseurl+'uploads/projects/images/200x150/'+data;
				   $('#img_div').html("<img style='width:233px;height:140px' src='"+image+"' />");
				  // $('#img_div').html("<span class='propertyImgSpan' style='top:8px;'><img style='padding: 5px; width: 210px; height: 128px; opacity: 1;' src='"+image+"'><span class='cls-a'><a onclick='remove_property_image("+image+");' href='javascript:void(0);' title='Delete'></a></span></span>");
				 //$('#removeImg').show();
				   $('#hidImage').val(data);
				   $("#pro_img_error").remove();
				   	//validate_pro_img();
				}
           }
    });
	
	$('#pro_video_upload').uploadify({
		'fileTypeDesc' : 'Video Files',
		'queueID'  : '',
        'fileTypeExts' : '*.mp4;*.avi;*.wmv;*.flv;',
        //'fileTypeExts' : '*.gif; *.jpg; *.jpeg; *.png',
		'height'   : 140,
		'width'   : 233,
		'buttonImage' : baseurl+'images/upload_img_trans.gif',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'upload_video',
        //'uploader' : baseurl+'upload_project_images',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/',
		'auto'      : true,
		'multi'     : false,
		//'fileSizeLimit': '60MB',
		'displayData': 'speed',
		'onUploadStart' : function(file) {
          // alert('Starting to upload ' + file.name);
		 //$('#pro_video_upload').uploadify('disable', true);
		$('.blueBtn').attr('disabled','disabled');
		   $('#vid_img_div').html("<img  src='"+loader_img+"' />");
        },
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
		'onUploadSuccess' : function(file, data, response) {
                    

			$('.blueBtn').removeAttr('disabled','disabled');
			   if((data=='failed')||(data=='ERROR:could not create image handle')||(data=='ERROR:Invalid width or height' ) || (data=='ERROR:invalid upload') )
			      {
					  $('#vid_img_div').html("<img  src='"+vide_defimg+"' />");//'images/upload_video.jpg'
					  $('#alert_popup').show();openpPopup();
					  $('#pro_video_upload').uploadify('disable', false);
					 // $('#pro_video_upload').attr("disabled", false);
					// p_popupOpen('img_size_alert');
					 $('#alert_pop_cntnt').html('Error occured while uploading , please try another video.'); 
				  }
			   else
			    {
				
				//alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
                                alert(data);
                                 var files=data.split('|');
				 $('#hidVidFile').val(files[1]);
				 $('#hidVidThumb').val(files[0]);
				  var image   =  baseurl+'uploads/projects/videos/original/'+data;
				 $('#vid_img_div').html("<img style='width:233px;height:140px' src='"+image+"' />");
				 $('#pro_video_upload').uploadify('disable', true);
				 $("#pro_video_error").remove();
				    $('#removeVid').show();
                                    $('#alert_popup').show();openpPopup();
				    $('#alert_pop_cntnt').html('Uploading will take some time, please try to play video after some time.'); 
				}
           }
    });
	
$('#removeVid').click(function() {
	var baseurl ='{/literal}{$baseurl}{literal}';
	//alert(baseurl);
	  var vid    =  $('#hidVidFile').val();
	  var image  =  $('#hidVidThumb').val();
	if(vid) {
		//var project_id=$('#project_id').val();
		//if(project_id =='')
		//project_id='';
		 $('#hidVidFile').val('');
		 $('#hidVidThumb').val('');
		var img=baseurl+"images/upload_video.jpg";
		$('#vid_img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
		$('#removeVid').hide();
		 $('#pro_video_upload').uploadify('disable', false);
	/*	$.ajax({
			type: "POST",
			url: baseurl+"project/unlink_project_video", 
			data: "image="+image+"&vid_file="+vid,
			success: function(msg){
				if(msg)
				{ 
					
					if(msg==1) {
						var img=baseurl+"images/upload_video.jpg";
						 $('#hidVidFile').val('');
						 $('#hidVidThumb').val('');
						 $('#pro_video_upload').uploadify('disable', false);
						 $('#vid_img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
						 $('#removeVid').hide();
						}
				}
			}
		   
		});*/
	}
		
});
$('#removeImg').click(function() {
	var baseurl ='{/literal}{$baseurl}{literal}';
	//alert(baseurl);
	//  var vid    =  $('#hidVidFile').val();
	  var image  =  $('#hidImage').val();
	if(image) {
		//var project_id=$('#project_id').val();
		//if(project_id =='')
		//project_id='';
		$.ajax({
			type: "POST",
			url: baseurl+"project/unlink_project_image", 
			data: "image="+image,
			success: function(msg){
				if(msg)
				{ 
					
					if(msg==1) {
						var img=baseurl+"images/add_img.jpg";
						 $('#hidImage').val('');
						
						 $('#pro_img_upload').uploadify('disable', false);
						 $('#img_div').html("<img style='width:233px;height:140px' src='"+img+"' />");
						 $('#removeImg').hide();
						}
				}
			}
		   
		});
	}
		
});
		
	$('#reward_ck').click(function ()
	{
		
//	var thisCheck = $(this);
	if($(this).is(':checked'))
	{
		//$('#reward_div_1').show()
		if($('#reward_blck .innerContent2').length ==0)
		{
			add_more_reward();
			}
		$('#rewardOption').show();
		$('.addmoreBtn').show();
		//$('#add_more_tr').show();
	// Do stuff
	}else{
		$('#rewardOption').hide();
		//$('#add_more_tr').hide();
		}
	});
	$("#category_list").change(validateCategory_list);
	$('#proj_title').blur(validateProject_title);
	$('#short_description').blur(validateSDesc);
	$('#funding_duration').change(validateFDuration);
	$('#project_desc').keyup(validateDesc);
	$('#funding_goal').keyup(validateFundingGoal);
	$('#funding_goal').blur(validateFundingGoal);
	$('#max_sponsors').blur(validate_max_sponsers);
	$('#min_pledge_amnt').blur(validate_min_amnt);
	$('#city').blur(validateCity);
	$('#city').keyup(city_auto_suggest);
	});
	function city_auto_suggest(){
	var city_var=$.trim($('#city').val());
	var baseurl='{/literal}{$baseurl}{literal}';
	if(city_var !=''){
	$.ajax({
	type:"POST",	
	url:baseurl+'project/city_auto_suggest',
	data:"city_var="+city_var,
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
	function remove_reward(i){
		//var reward_cnt=$('#hid_reward_cnt').val();
		$('#reward_div_'+i).remove();
		//alert($('#reward_blck .innerContent2').length);
		if($('#reward_blck .innerContent2').length ==0)
		{
			$('.addmoreBtn').hide();
			//add_more_reward();
			$('#reward_ck').attr('checked',false)
			
			}else{}
		/*if($('#reward'+i).val() ==''){
			$('#reward_div_'+i).hide()
			
			}else*/
			
			var baseurl='{/literal}{$baseurl}{literal}';
		if($('#reward'+i).val() !='' ){
			var proj_id='{/literal}{$project_det.id}{literal}';
			$.ajax({
			type: "POST",
			url: baseurl+"project/remove_project_reward", 
			data: "proj_id="+proj_id+"&reward_id="+$('#reward'+i).val(),
			success: function(msg){
				}
				});
			
			}
			
	}
	function add_more_reward(){
		var reward_cnt= parseInt($('#hid_reward_cnt').val())+1;
		$('.addmoreBtn').show();
		$('#hid_reward_cnt').val(reward_cnt);
		
		var content = '<input type="hidden" id="reward'+reward_cnt+'" name="reward'+reward_cnt+'" value="" /><div class="innerContent2" id="reward_div_'+reward_cnt+'"><a class="removeBtnProfileImg"  onclick="remove_reward('+reward_cnt+')"> </a><ul class="left" ><li><label>Product Selling Price *</label><input type="text" id="reward_pledge_amnt'+reward_cnt+'" name="reward_pledge_amnt'+reward_cnt+'"   class="textBoxStyle" value="" style="width:450px;"></li><li  style="width:450px;"><label>Description</label><textarea id="reward_description'+reward_cnt+'" name="reward_description'+reward_cnt+'" class="textBoxStyle height120"  style="width:450px;"></textarea></li></ul><ul class="right"><li><label>Est Delivery Date *</label><input type="text" readonly="readonly"  id="reward_del_date'+reward_cnt+'" name="reward_del_date'+reward_cnt+'" class="datepicker textBoxStyle" value=""  style="width:450px;"></li><li  style="width:450px;"><label> Limiting users for product</label><input type="text" id="reward_user_limit'+reward_cnt+'" name="reward_user_limit'+reward_cnt+'" class="textBoxStyle" value=""  style="width:450px;"></li></ul><div class="clear"></div></div>';
			
			$('#reward_blck').append(content);
			$(".datepicker").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd",
			numberOfMonths: 1,
				minDate:+1,
				defaultDate: +1,
			firstDay: 1});
			//$('.datepicker').datepicker( "setDate", +1 );
			
	}
function validate_reward_fields(){
		var reward_cnt= parseInt($('#hid_reward_cnt').val());
		var flag=true;
		var glob_flag=true;
		 var numbers = /^[0-9]+$/;  
              if($('#reward_ck').is(':checked'))
                {      
		for(i=1;i<=reward_cnt;i++){
			//alert(i);
			var pledge_val=$('#reward_pledge_amnt'+i).val();
			var reward_user_limit=$('#reward_user_limit'+i).val();
			var reward_del_date =$('#reward_del_date'+i).val();
		//	alert(pledge_val);alert(reward_user_limit);
			//alert(reward_user_limit.match(numbers));
			$("#reward_pledge_amnt_error"+i).remove();	
			$("#reward_del_date"+i+"_error").remove();	
			var reward_del_date_err_id = "reward_del_date"+i+"_error";
			//if()
			//var reward_amnt_err_id ="reward_pledge_amnt_error"+i;
			if(!isDate('reward_del_date'+i))
			{
			//$('#reward_user_limit'+i).after('<div class="fieldTxP"><div  class="error" id="'+reward_amnt_err_id+'"><span>This field is required</span></div></div>');
			
			flag= false;
			}
			else
			{
				//flag= true;
			}
			
			
			var reward_amnt_err_id ="reward_pledge_amnt_error"+i;
			if(pledge_val=='')
			{
			$('#reward_pledge_amnt'+i).after('<div class="fieldTxP"><div  class="error" id="'+reward_amnt_err_id+'"><span>This field is required</span></div></div>');
			
			flag= false;
			}
			  else if(isNaN(parseFloat(pledge_val)))
			  {
					$('#reward_pledge_amnt'+i).after('<div class="fieldTxP"><div  class="error" id="'+reward_amnt_err_id+'"><span>Numeric Values only</span></div></div>');
				flag= false;
			  }
			else
			{
				//flag= true;
			}
			
			$("#reward_user_limit_error"+i).remove();	
			var reward_user_limit_err_id ="reward_user_limit_error"+i;
		   if ($('#reward_user_limit'+i).length){
				//alert(reward_user_limit);
			if(reward_user_limit=='' )
			{
			//$('#reward_user_limit'+i).after('<div class="fieldTxP"><div  class="error" id="'+reward_user_limit_err_id+'"><span>This field is required</span></div></div>');
			
			//flag= false;
			}
			else if(reward_user_limit.match(numbers) == null)
			  {
					$('#reward_user_limit'+i).after('<div class="fieldTxP"><div  class="error" id="'+reward_user_limit_err_id+'"><span>Numeric Values only</span></div></div>');
				flag= false;
			  }
			else
			{
				//flag= true;
			}
			}
			if(flag == false)
			glob_flag=false;
		}
		setTimeout(function() {
   		// $('.errorReward').remove();
    // 3000 for 3 seconds
 	 	}, 6000);
		return glob_flag;
                }else
                    return true;
	}
function isDate(dateTimeVal)
{
  $("#"+dateTimeVal+"_error").remove();
  var currVal =  $('#'+dateTimeVal).val();
  //var currVal =  txtDate;
  if(currVal == ''){
	  $("#"+dateTimeVal).after('<div class="fieldTxP"><div  class="error" id="'+dateTimeVal+'_error"><span>Date is required</span></div>');
    	 return false;
	 }
  /*else if(currVal != '') {
	  
	  //Declare Regex  
	  var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; 
	  var dtArray = currVal.match(rxDatePattern); // is format OK?
	  if (dtArray == null) {
	  	$("#"+dateTimeVal).after('<div class="fieldTxP"><div  class="error" id="'+dateTimeVal+'_error"><span>Invalid Date</span></div>');
    	 return false;
	  }

	  //Checks for dd/mm/yyyy format.
		dtDay = dtArray[1];
		dtMonth= dtArray[3];
		dtYear = dtArray[5];
	
	  if (dtMonth < 1 || dtMonth > 12) {
		  $("#"+dateTimeVal).after('<div class="fieldTxP"><div  class="error" id="'+dateTimeVal+'_error" ><span>Invalid Date</span></div>');
		  return false;
	  }
	  else if (dtDay < 1 || dtDay> 31) {
		  $("#"+dateTimeVal).after('<div class="fieldTxP"><div  class="error" id="'+dateTimeVal+'_error" ><span>Invalid Date</span></div>');
		  return false;
	  }
	  else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) {
		  $("#"+dateTimeVal).after('<div class="fieldTxP"><span class="error" id="'+dateTimeVal+'_error" ><span>Invalid Date</span></span>');
		  return false;
	  }
	  else if (dtMonth == 2)
	  {
		 var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
		 if (dtDay> 29 || (dtDay ==29 && !isleap)) {
			 $("#"+dateTimeVal).after('<div class="fieldTxP"><div  class="error" id="'+dateTimeVal+'_error" ><span>Invalid Date</span></div>');
			  return false;
		 }
	  }
	  $("#"+dateTimeVal+"_error").remove();
 	 return true;
  }*/ else {
	  return true;
  }
}
	function call_info(){
		$('#msg').show();
		$('#msg').html('Please create the project first.');
		setTimeout(function() {
			
			$('#msg').hide();
			$('#msg').html('');
      					//window.location.href=baseurl+'project/innovate_project_videos/'+msg;
		}, 3000);
	}  
	</script> 
{/literal}
<section class="innerMidWrap">
  <input type="hidden" name="baseurl" id="baseurl" value="{$baseurl}">
  <input type="hidden" name="project_id" id="project_id" value="{$project_det.id}">
  <ul class="innerMidTab">
    <li><a class="active" href="{$baseurl}project/innovate_project/{if $project_det|@count gt 0 && $project_det neq 0}{$project_det.id}{/if}">Project Details<span class="arrowtabs"></span></a></li>
    <li><a {if $project_det|@count gt 0 && $project_det neq 0}  href="{$baseurl}project/innovate_project_videos/{if $project_det|@count gt 0 && $project_det neq 0}{$project_det.id}{/if}" {else} style="cursor:pointer" onclick="call_info()"{/if}>Videos</a></li>
    <li><a {if $project_det|@count gt 0 && $project_det neq 0} href="{$baseurl}project/innovate_project_images/{if $project_det|@count gt 0 && $project_det neq 0}{$project_det.id}{/if}"  {else} style="cursor:pointer" onclick="call_info()" {/if}>Images</a></li>
    <li><a {if $project_det|@count gt 0 && $project_det neq 0} href="{$baseurl}project/innovate_project_comments/{if $project_det|@count gt 0 && $project_det neq 0}{$project_det.id}{/if}" {else} style="cursor:pointer" onclick="call_info()" {/if}>Comments</a></li>
     {if $project_status.project_status eq 'success'}
  <!--  <li><a  href="{$baseurl}project/innovate_project_updates/{if $project_det|@count gt 0 && $project_det neq 0}{$project_det.id}{/if}">Project Updates</a></li>-->{/if}
     <li><a target="_blank" href="{$baseurl}user/edit_profile">Edit Profile</a></li>
  </ul>
  <div class="clear"></div>
  <div class="innerMidContent">
  <div id="msg" class="success_msg" style="display:none;"></div>
    <div class="clear"></div>
    <form name="addproject" id="addproject" method="post" action="">
      <div class="prodeForm">
        <ul class="left prodeForm_l">
          <li class="fieldTxP">
            <label>Project Title *</label>
            <input type="text" id="proj_title" name="proj_title" class="textBoxStyle" value="{$project_det.project_title}">
          </li>
          <li class="fieldTxP">
            <label>Funding Goal*<span class="right">INR</span></label>
            <input type="text" name="funding_goal"  id="funding_goal" class="textBoxStyle" value="{$project_det.funding_goal}">
          </li>
         <!-- <li class="fieldTxP">
            <label>Maximum Sponsors</label>
            <input type="text" name="max_sponsors"    id="max_sponsors" class="textBoxStyle" value="{$project_det.max_sponsors}">
          </li>-->
          <li class="fieldTxP">
            <label>Project Location *</label>
            <input type="text" name="city" autocomplete="off"   id="city" class="textBoxStyle" value="{$project_det.city_name}">
            <div id="suggestions" style="display:none; z-index:9999999; background:#999; position:absolute; width:100%">
            <ul id="autoSuggestionsList" ></ul>
            
            </div>
          </li>
          <li class="fieldTxP">
            <label>Short Description (maximum 250 words)*</label>
            <textarea id="short_description" name="short_description"  class="textBoxStyle height70" maxlength="250">{$project_det.short_description|stripslashes}</textarea>
          </li>
        </ul>
        <ul class="right prodeForm_r">
          <li style="min-height: 177px;" class="fieldTxP">
            <div style="float:left;width:240px;position:relative;">
              <label>Project Image *</label>
              <div style="position:relative;">
                <input type="file" id="pro_img_upload" name="pro_img_upload">
                <div id="img_div" style="width:233px;height:140px;position:absolute;top:1px;left:1px;"> {if $project_det.project_img_path neq '' && $project_det.project_image neq ''} <img style="width:233px;height:140px"  src="{$project_det.project_img_path}"> {else} <img style="width:233px;height:140px" src="{$baseurl}images/add_img.jpg" /> {/if} </div>
                <!--<a id="removeImg" class="removeBtnProfileImg"  href="javascript:void(0);"  {if $project_det.project_img_path eq ''} style="display:none;"{else}style="right: 9px;" {/if} > </a>-->
                <input type="hidden" id="hidImage" name="hidImage" value="{$project_det.project_image}" />
              </div>
            </div>
            <div style="float:right;width:240px;position:relative;">
              <label>Intro video *</label>
              <div style="position:relative;">
                <input type="file" id="pro_video_upload" name="pro_video_upload">
                <div id="vid_img_div" style="width:233px;height:140px;position:absolute;top:1px;left:1px;"> {if $project_det.video_thumb_image neq ''} <img  style="width:233px;height:140px" src="{$baseurl}uploads/projects/videos/original/{$project_det.video_thumb_image}"  /> {else} <img style="width:233px;height:140px" src="{$baseurl}images/upload_video.jpg" /> {/if} </div>
                <a id="removeVid" class="removeBtnProfileImg"   href="javascript:void(0);"  {if $project_det.video_thumb_image eq ''} style="display:none;"{else}style="right: 9px;"  {/if}   > </a>
                 <input type="hidden" id="hidVidFile" name="hidVidFile" value="{$project_det.intro_video}" />
              <input type="hidden" id="hidVidThumb" name="hidVidThumb" value="{$project_det.video_thumb_image}" /></div>
             
            </div>
            <div class="clear"></div>
          </li>
         <!-- <li class="fieldTxP">
            <label>Minimum Amount for Pledge<span class="right">INR</span></label>
            <input type="text" class="textBoxStyle" name="min_pledge_amnt"    id="min_pledge_amnt" value="{$project_det.min_pledge_amount}">
          </li>-->
          <li class="fieldTxP">
            <label>Category *</label>
            <select name="category_list" id="category_list" class='selectBx'  >
             
            {foreach  from=$category key=k item=cat}
            <option value="{$cat.id}" {if $cat.id eq $project_det.category_id }selected="selected" {/if}  > {$cat.category_name|ucwords} </option>
            {if $cat.child_category neq 0}
            {foreach  from=$cat.child_category key=k item=child}
             <option value="{$child.id}" {if $child.id eq $category_ids} selected="selected" {/if}  > >>{$child.category_name|ucwords} </option>
             {/foreach}
             {/if}
            {/foreach}
            </select>
          </li>
          <li class="fieldTxP">
            <label>Funding Duration *</label>
            <select name="funding_duration" id="funding_duration" class="selectBx">

             {foreach  from=$durations key=k item=d}
              <option value="{$d.duration}"  {if $project_det.fund_duration eq $d.duration} selected="selected" {/if} >{$d.duration} days</option>

             {/foreach}
 
            </select>
          </li>
        </ul>
        <div class="clear"></div>
        <label>Project Description *</label>
        <textarea name="project_desc" id="project_desc" class="project_desc"  >{$project_det.project_description|stripslashes}</textarea><div class="fieldTxP"><div class="error " id="proDescError"></div></div>
          <div class="clear"></div><br />
        <!--<img src="images/editor.jpg" alt="editor" style="margin-bottom:10px">-->
        <input name="reward_ck" id="reward_ck"  type="checkbox" {if $project_det.rewards neq 0} checked="checked" {/if}>
        
        Add Products 
        {if $project_det eq 0}
        {assign var="cnt" value="1"}
        {else}
        {if $project_det.rewards neq ''}
        {assign var="cnt" value=$project_det.rewards|@count}
        {else}
        {assign var="cnt" value="1"}
        {/if}
        {/if}
        <input type="hidden" id="hid_reward_cnt" name="hid_reward_cnt" value="{$cnt}" />
      
        <div id="rewardOption"  {if $project_det.rewards eq ''} style="display:none" {/if}> {foreach from=$project_det.rewards item="rew" key=k}
          <div id="reward_blck">
            <input type="hidden" id="reward{$k+1}" name="reward{$k+1}" value="{$rew.id}" />
            <div class="innerContent2" id="reward_div_{$k+1}"> <a class="removeBtnProfileImg"  onclick="remove_reward({$k+1})"> </a>
              <ul class="left" >
                <li class="fieldTxP">
                  <label>Product Selling Price *</label>
                  <input type="text" id="reward_pledge_amnt{$k+1}" name="reward_pledge_amnt{$k+1}" class="textBoxStyle" value="{$rew.pledge_amount}" style="width:450px;">
                </li>
                <li  style="width:450px;" class="fieldTxP">
                  <label>Description </label>
                  <textarea id="reward_description{$k+1}" name="reward_description{$k+1}" class="textBoxStyle height120"  style="width:450px;">{$rew.description}</textarea>
                  
                </li>
                <div id="err_div"></div>
              </ul>
              <ul class="right">
                <li class="fieldTxP">
                  <label>Est Delivery Date *</label>
                  <input type="text" id="reward_del_date{$k+1}" name="reward_del_date{$k+1}" readonly="readonly" class="datepicker textBoxStyle" value="{$rew.delivery_date|date_format:'%G-%m-%d'}"  style="width:450px;">
                </li>
                <li  style="width:462px;" class="fieldTxP">
                  <label> Limiting users for product </label>
                  <input type="text"  id="reward_user_limit{$k+1}" name="reward_user_limit{$k+1}" class="textBoxStyle" value="{$rew.users_limit}"  style="width:450px;">
                </li>
              </ul>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
          {foreachelse}
          <div id="reward_blck">
            <input type="hidden" id="reward1" name="reward1" value="" />
            <div class="innerContent2" id="reward_div_1"> <a class="removeBtnProfileImg "  onclick="remove_reward(1)"> </a>
              <ul class="left" >
                <li class="fieldTxP">
                  <label>Product Selling Price *</label>
                  <input type="text" id="reward_pledge_amnt1" name="reward_pledge_amnt1" class="textBoxStyle" value="" style="width:450px;">
                </li>
                <li  style="width:462px;" class="fieldTxP">
                  <label>Description </label>
                  <textarea id="reward_description1" name="reward_description1" class="textBoxStyle height120"  style="width:450px;"></textarea>
                </li>
              </ul>
              <ul class="right">
                <li class="fieldTxP">
                  <label>Est Delivery Date *</label>
                  <input type="text" id="reward_del_date1" name="reward_del_date1" readonly="readonly" class="datepicker textBoxStyle" value=""  style="width:450px;">
                </li>
                <li  style="width:462px;" class="fieldTxP">
                  <label> Limiting users for product </label>
                  <input type="text"  id="reward_user_limit1" name="reward_user_limit1" class="textBoxStyle" value=""  style="width:450px;">
                </li>
              </ul>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
          {/foreach} <a class="addmoreBtn" href="javascript:void(0);" onclick="add_more_reward()" ><span class="spriteImg addMoreIco"></span>Add More</a>
          <div class="clear"></div>
        </div>
        <div class="hrLine1"></div>
      </div>
      <div class="submitPane">
        <input type="checkbox" id="logged_in_user" name="logged_in_user" value="logged_users"  {if $project_det.access_status eq '1'} checked="checked" {/if}   >
        Access only for logged in users<br>
        <ul>
          {if $project_det eq 0}
          <li>
            <input type="button" id="save" name="save" class="blueBtn" value="Save" onClick="return save_projects('{$baseurl}','save');">
          </li>
          <li>
            <input type="button" id="send4approve" name="send4approve" class="blueBtn" value="Send for Admin Approval" onClick="return view_terms('{$baseurl}','','{$id_sts}');">
          </li>
          {else}
          <li>
            <input type="button" id="update" name="update" class="blueBtn" value="Update" onClick="return update_projects('{$baseurl}',{$project_det.id},'save');">
          </li>
          <li>
            <input type="button" id="send4approve" name="send4approve" class="blueBtn" value="Send for Admin Approval" onClick="return view_terms('{$baseurl}',{$project_det.id},'{$id_sts}');">
          </li>
          {/if}
          <li>
            <input type="reset" class="grayBtn"   value="Reset">
          </li>
        </ul>
        <div class="clear"></div>
      </div>
    </form>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</section>

<div id="terms_popup" class="popFixed" style="display:none">
<div class="popabs">
<div id="inlineContent1" class="white_content">
  <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick = "close_pop('terms_popup')">Close</a>
   <div class="popTitle">
      <h4>Terms of use</h4> </div>
      <div id="pop_cntnt" class="prodeForm">add popup content here</div>
     
      <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
 <div class="clear"></div>
</div>
 <div class="clear"></div>
</div>

<div id="alert_popup" class="popFixed" style="display:none">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('alert_popup')">Close</a>
       <div class="popTitle">
        <h4>Alert.</h4> </div>
        <div id="alert_pop_cntnt" class="prodeForm"></div>
     
    </div>
    <div class="clear"></div>
  </div>
 
</div>