<?php /* Smarty version Smarty-3.1.8, created on 2013-06-24 11:57:45
         compiled from "/home/fundinno/public_html/application/views/admin/projects/add_project.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1458932043515bb29ea23301-12937179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7989d0deabc8d14de6e07daa320e60714d1f8eb' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/projects/add_project.tpl',
      1 => 1372065005,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1458932043515bb29ea23301-12937179',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bb29f0748b8_92187491',
  'variables' => 
  array (
    'baseurl' => 0,
    'response' => 0,
    'project_det' => 0,
    'category' => 0,
    'cat' => 0,
    'cities' => 0,
    'c' => 0,
    'durations' => 0,
    'd' => 0,
    'users' => 0,
    'u' => 0,
    'cnt' => 0,
    'k' => 0,
    'rew' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515bb29f0748b8_92187491')) {function content_515bb29f0748b8_92187491($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?><link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<!--<script src="http://code.jquery.com/jquery-1.8.2.js"></script>-->
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/common.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/css/uploadify.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploadify/js/jquery.uploadify-3.1.min.js"></script>

<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/datepicker/jquery.ui.core.js"></script>-->
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/datepicker/jquery.ui.datepicker.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/datepicker/jquery.ui.all.css" rel="stylesheet" type="text/css" media="screen" />

 
<style type="text/css">
.preview
{
position: absolute;
z-index:1000;
margin-top: 26px;
margin-left: 36px;
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
background:url(../../../images/x.png) no-repeat; 
width:25px; 
height:29px; 
display:none; 
z-index:9999; 
position:absolute; 
top:138px; 
cursor:pointer;
}


</style>

 
<script type="text/javascript" >
window.onbeforeunload = function() {};

	//var baseurl='{$baseurl}';
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
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,imageupload,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
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

    $(function() {
        $( "#tabs" ).tabs({
			beforeLoad: function( event, ui ) {
                ui.jqXHR.error(function() {
                    ui.panel.html(
                        "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                        "If this wouldn't be a demo." );
                });
				}
            });
		
		var dates1 = $(".datepicker").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd",
			numberOfMonths: 1,
				minDate:+1,
				
			firstDay: 1});
			//$('.datepicker').datepicker( "setDate", +1 );
			
			
	var baseurl=$('#baseurl').val();
	//var uid=$('#hid_uid').val();
	//var venue_id=$('#hid_venue_id').val();
//alert(baseurl)
    $('#pro_img_upload').uploadify({
		'fileTypeDesc' : 'Image Files',
		'queueID'  : '',
        'fileTypeExts' : '*.gif; *.jpg; *.png',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'upload_project_images',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/projects/images/200x150/',
		'auto'      : true,
		'multi'     : false,
		'onUploadStart' : function(file) {
           //alert('Starting to upload ' + file.name);
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
				//alert(data);
				  var image   =  baseurl+'uploads/projects/images/200x150/'+data;
				   $('#img_div').html("<img  src='"+image+"' />");
				  // $('#img_div').html("<span class='propertyImgSpan' style='top:8px;'><img style='padding: 5px; width: 210px; height: 128px; opacity: 1;' src='"+image+"'><span class='cls-a'><a onclick='remove_property_image("+image+");' href='javascript:void(0);' title='Delete'></a></span></span>");
				  //$('#removeImage').show();
				   $('#hidImage').val(data);
				}
           }
        // Put your options here
    });
	
	$('#intro_vid_upload').uploadify({
		//'fileTypeDesc' : 'Image Files',
		//'queueID'  : '',
        'fileTypeExts' : '*.mp4;*.mp3;*.avi;*.wmv;*.flv;',
        'swf'      : baseurl+'uploadify/uploadify.swf',
        'uploader' : baseurl+'upload_video',
		'cancelImg' : baseurl+'uploadify/uploadify-cancel.png',
		'folder'    : baseurl+'uploads/',
		'auto'      : true,
		'multi'     : false,
		'onUploadStart' : function(file) {
          // alert('Starting to upload ' + file.name);
        },
		'onUploadError' : function(file, errorCode, errorMsg, errorString) {
          alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
        },
		'onUploadSuccess' : function(file, data, response) {
			   if((data=='failed') || (data=='ERROR:could not create image handle')||(data=='ERROR:Invalid width or height') || (data=='ERROR:invalid upload'))
			      {
					// p_popupOpen('img_size_alert');
                                        alert(data)
					alert('Error occured while uploading , please try another video.');
					// $('#alert_cntnt').html(data); 
				  }
			   else
			    {
				//alert(data);uploads/temp_videos/
                                //alert(data)
				 var files=data.split('|');
				  var image   =  baseurl+'uploads/projects/videos/original/'+files[0];
				 $('#vid_div').html("<img style='width:150px; height:150p' src='"+image+"' />");
				    $('#removeVid').show();
				   $('#hidVidFile').val(files[1]);
				    $('#hidVidThumb').val(files[0]);
                                    alert('Uploading will take some time, please try to play video after some time.');
				}
           }
        // Put your options here
    });
	$('#removeImage').click(function() {
	var baseurl ='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	//alert(baseurl);
	  var image  =  $('#hidImage').val();
	if(image) {
		var project_id=$('#project_id').val();
		$.ajax({
			type: "POST",
			url: baseurl+"admin/project/unlink_project_image", 
			data: "image="+image+"&project_id="+project_id,
			success: function(msg){
				if(msg)
				{ 
					if(msg==1) {
						 $('#hidImage').val('');
						  $('#img_div').empty();
						//  $('#removeImage').hide();
						}
				}
			}
		   
		});
	}
		
});
	   
$('#removeVid').click(function() {
	var baseurl ='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	//alert(baseurl);
	  var vid    =  $('#hidVidFile').val();
	  var image  =  $('#hidVidThumb').val();
	if(vid) {
		var project_id=$('#project_id').val();
		$.ajax({
			type: "POST",
			url: baseurl+"admin/project/unlink_project_video", 
			data: "image="+image+"&vid_file="+vid+"&project_id="+project_id,
			success: function(msg){
				if(msg)
				{ 
					if(msg==1) {
						 $('#hidVidFile').val('');
						 $('#hidVidThumb').val('');
						 $('#vid_div').empty();
						 $('#removeVid').hide();
						}
				}
			}
		   
		});
	}
		
});
    });
	
	$(document).ready(function() {
		
  var respns="<?php echo $_smarty_tpl->tpl_vars['response']->value;?>
";
  $('#display').hide();

  if(respns !=''){
	$('#display').show();
	setTimeout(function(){
		$('#display').hide();
		},3000);
  }
			
	$('#reward_ck').click(function ()
	{
//	var thisCheck = $(this);
	if($(this).is(':checked'))
	{
		
		$('#reward_div').show();
		$('#add_more_tr').show();
	// Do stuff
	}else{
		$('#reward_div').hide();
		$('#add_more_tr').hide();
		}
	});
	
	//$("#user_type").change(validateUser_type);
	$("#category_list").change(validateCategory_list);
	//$("#plan_id").change(validatePlan_list);
	//$("#property_theme").change(validateProperty_theme);
	//$("#sell_rent").change(validateSell_rent);
	$('#proj_title').blur(validateProject_title);
	$('#short_description').blur(validateSDesc);
	$('#funding_duration').change(validateFDuration);
	$('#project_desc').keyup(validateDesc);
	$('#funding_goal').keyup(validateFundingGoal);
	$('#max_sponsors').blur(validate_max_sponsers);
	//$('#min_pledge_amnt').blur(validate_min_amnt);
	
	$('#city').blur(validateCity);

	

	});
	function save_projects() {
	//var PlanSel = $("#main_list").val();
	if($('#hidImage').val() ==''){
		alert('Please upload project image');
	}
	else if(validateCategory_list() & validateProject_title() & validateFundingGoal() &  validateSDesc() & validateFDuration() & validateDesc() & validateCity() & $('#hidImage').val() !='' ){
		if($('#reward_ck').is(':checked'))
			{
				if(validate_reward_fields()){
				document.addproject.submit();
				}
			}
			else
			document.addproject.submit();
	}
	}
	
	
	function add_more_reward(){
		var reward_cnt= parseInt($('#hid_reward_cnt').val())+1;
		$('#hid_reward_cnt').val(reward_cnt);
		var content = '<input type="hidden" id ="reward'+reward_cnt+'" name="reward'+reward_cnt+'" value="" /><table cellpadding="0" cellspacing="0" border="0" width="100%" class="reward_divtable" id="reward_ul_'+reward_cnt+'"><tr><td valign="top" colspan="2"><a href="javascript:void(0);" class="uploadClose" onclick="remove_reward('+reward_cnt+')">Remove this reward </a></td></tr><tr><td valign="top" >Product Selling Price :<span style="color:#F00">*</span></td><td valign="top" ><input type="text" id="reward_pledge_amnt'+reward_cnt+'" class="textbox" name="reward_pledge_amnt'+reward_cnt+'" value="" /></td></tr><tr><td valign="top" >Description :</td><td valign="top" ><textarea id="reward_description'+reward_cnt+'" name="reward_description'+reward_cnt+'"></textarea></td></tr><tr><td valign="top" >Est. delivery date :<span style="color:#F00">*</span></td><td valign="top" ><input type="text" class="textbox datepicker"  readonly="readonly" id="reward_del_date'+reward_cnt+'" name="reward_del_date'+reward_cnt+'" value="" /></td></tr><tr><td valign="top" >Limiting users for product :<span style="color:#F00"></span></td><td valign="top" ><input type="text"  class="textbox" id="reward_user_limit'+reward_cnt+'" name="reward_user_limit'+reward_cnt+'" value=""/></td></tr></table>';
				
			$('#reward_div').append(content);
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
			  else if(isNaN(pledge_val))
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
	function remove_reward(i){
		//var reward_cnt=$('#hid_reward_cnt').val();
			$('#reward_ul_'+i).remove();
			var baseurl=$('#baseurl').val();
		if($('#reward'+i).val() !='' ){
			var proj_id='<?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
';
			$.ajax({
			type: "POST",
			url: baseurl+"admin/project/remove_project_reward", 
			data: "proj_id="+proj_id+"&reward_id="+$('#reward'+i).val(),
			success: function(msg){
				}
				});
			
			}
			
	}
var removeValue = function(list, value, separator) {
  separator = separator || ",";
  var values = list.split(separator);
  for(var i = 0 ; i < values.length ; i++) {
    if(values[i] == value) {
      values.splice(i, 1);
      return values.join(separator);
    }
  }
  return list;
}


$(".preview").live('click',function(e){
			$videotype=$(this).attr("type");
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
			var playerurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/play_videos_in_admin';
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
    </script> 

<div class="shadow_outer">
  <div class="shadow_inner projectSection" > 
   
    <input type="hidden" name="baseurl" id="baseurl" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
">
    <input type="hidden" name="project_id" id="project_id" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
">
    <div class="table_listing font_segoe "> 

      
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Project details</a></li>
         
          <li><a href="<?php if (count($_smarty_tpl->tpl_vars['project_det']->value)>0&&$_smarty_tpl->tpl_vars['project_det']->value!=0){?><?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/add_videos/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
<?php }else{ ?>#common_error_tab<?php }?>">Videos</a></li>
          <li><a href="<?php if (count($_smarty_tpl->tpl_vars['project_det']->value)>0&&$_smarty_tpl->tpl_vars['project_det']->value!=0){?><?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/add_photos/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
<?php }else{ ?>#common_error_tab<?php }?>">Photos</a></li>
          <li><a href="<?php if (count($_smarty_tpl->tpl_vars['project_det']->value)>0&&$_smarty_tpl->tpl_vars['project_det']->value!=0){?><?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/project_comments/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
<?php }else{ ?>#common_error_tab<?php }?>">Comments</a></li>
         <li><a href="<?php if (count($_smarty_tpl->tpl_vars['project_det']->value)>0&&$_smarty_tpl->tpl_vars['project_det']->value!=0){?><?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/admin_comments/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
<?php }else{ ?>#common_error_tab<?php }?>">Admin comments</a></li>
        <?php if ($_smarty_tpl->tpl_vars['project_det']->value['project_status']=='success'){?> <li><a href="<?php if (count($_smarty_tpl->tpl_vars['project_det']->value)>0&&$_smarty_tpl->tpl_vars['project_det']->value!=0){?><?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/project_updates/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
<?php }else{ ?>#common_error_tab<?php }?>">Project updates</a></li><?php }?>
       <li><a href="<?php if (count($_smarty_tpl->tpl_vars['project_det']->value)>0&&$_smarty_tpl->tpl_vars['project_det']->value!=0){?><?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/project_backers/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
<?php }else{ ?>#common_error_tab<?php }?>">Project Supporters</a></li>
        </ul>
        <div id="tabs-1">
       
          <form  name="addproject" id="addproject" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/post_project/<?php if (count($_smarty_tpl->tpl_vars['project_det']->value)>0&&$_smarty_tpl->tpl_vars['project_det']->value!=0){?><?php echo $_smarty_tpl->tpl_vars['project_det']->value['id'];?>
<?php }?>" enctype="multipart/form-data" >
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
               <tbody>
                <tr>
                  <th colspan="4" align="left"><h2 style="margin-left:5px;"><?php if ($_smarty_tpl->tpl_vars['project_det']->value==0){?>Add <?php }else{ ?> Update <?php }?> project</h2></th>
                </tr>
                <tr id="field_header">
                  <td valign="top" colspan="4" align="left" >Fields marked with <span class="star">*</span> are required</td>
                </tr>
               <?php if ($_smarty_tpl->tpl_vars['response']->value!=''){?>  <tr>
                 <td align="left" valign="top" colspan="4">
                  <div id="display" class="response_msg" style="display:none" ><?php if ($_smarty_tpl->tpl_vars['response']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['response']->value;?>
<?php }?></div>
                  </td>
                </tr><?php }?>
                <tr class="shade01">
                  <td  align="right" valign="top">Project image <span style="color:#F00">*</span><p style="font-size:10px;">Please upload images of size, Minimum:700x415 </p></td>
                  <td  align="left" valign="top"><div class="selectImg">
                      <div id="img_div"> <?php if ($_smarty_tpl->tpl_vars['project_det']->value['project_image']!=''){?><img style="height:98px;width:98px" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/images/200x150/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_image'];?>
"><?php }?> </div>
                     <!-- <a id="removeImage" href="javascript:void(0);" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['project_image']==''){?> style="display:none;" <?php }?>>Remove image</a>-->
                      <div class="chooseBtnPane">
                        <input type="file" id="pro_img_upload" name="pro_img_upload" />
                      </div>
                      <input type="hidden" id="hidImage" name="hidImage" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_image'];?>
" />
                      <div class="clear"></div>
                    </div></td>
                  <td  align="right" valign="top">Project title <span style="color:#F00">*</span></td>
                  <td  align="left" valign="top"><div class="formValidation">
                      <input class="textbox" type="text" id="proj_title" name="proj_title" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['project_title'];?>
"/>
                    </div></td>
                </tr>
                <tr >
                  <td  align="right" valign="top">Category <span style="color:#F00">*</span></td>
                  <td  align="left" valign="top"><!--<div class="formValidation">-->
                  
                      <select name="category_list" id="category_list" class=""   onchange="" />
                      
                      <option value="">Select category</option>
                      <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['cat']->key;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['category_id']==$_smarty_tpl->tpl_vars['cat']->value['id']){?> selected="selected" <?php }?> > <?php echo $_smarty_tpl->tpl_vars['cat']->value['category_name'];?>
</option>
                      <?php } ?>
                      </select>
                     <div> </div> 
                   <!-- </div>--></td>
                  <td  align="right" valign="top">Short description <span style="color:#F00">*</span></td>
                  <td  align="left" valign="top"><div class="formValidation" >
                      <textarea class="pArea" id="short_description" name="short_description" maxlength="250"><?php echo stripslashes($_smarty_tpl->tpl_vars['project_det']->value['short_description']);?>
</textarea>
                      <div class="clear">(Max 250 charectors)</div> </div></td>
                </tr>
                <tr  class="shade01">
                  <td  align="right" valign="top">City<span style="color:#F00">*</span></td>
                  <td  align="left" valign="top"><div class="formValidation" id="city_load">
                      <select name="city" id="city" class="" />
                      
                      <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['city_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['city_id']==$_smarty_tpl->tpl_vars['c']->value['city_id']){?> selected="selected" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['c']->value['city_name'];?>
</option>
                      <?php } ?>
                      </select>
                    </div></td>
                  <td  align="right" valign="top">Funding duration <span style="color:#F00">*</span></td>
                  <td  align="left" valign="top"><div class="formValidation">
                      <select name="funding_duration" id="funding_duration" class="" />
                      
                      <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['durations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['d']->value['duration'];?>
"  <?php if ($_smarty_tpl->tpl_vars['project_det']->value['fund_duration']==$_smarty_tpl->tpl_vars['d']->value['duration']){?> selected="selected" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['d']->value['duration'];?>
 days</option>
                      <?php } ?>
                      </select>
                    </div></td>
                </tr>
                <tr  >
                <td valign="top" align="right">Funding goal <span style="color:#F00">*</span></td>
                  <td valign="top" align="left"><div class="formValidation">
                      <input type="text" name="funding_goal"  class="textbox"   id="funding_goal" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['funding_goal'];?>
"/>
                    </div></td>
                    <td  align="right" valign="top">Referral bonus</td>
                  <td  align="left" valign="top"><div class="formValidation">
                      <input type="text" name="ref_percent"  class="textbox"   id="ref_percent" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['referrer_percentage'];?>
"/>%
                    </div> 
                    </td>
                    <!--<td valign="top" align="right">Maximum sponsors </td>
                  <td valign="top" align="left"><div class="formValidation">
                      <input type="text" name="max_sponsors"  class="textbox"   id="max_sponsors" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['max_sponsors'];?>
" />
                    </div></td>-->
                    
                  <!--<td valign="top" align="right">Minimum amount for pledge</td>
                  <td valign="top" align="left"><div class="formValidation">
                      <input type="text" name="min_pledge_amnt"  class="textbox"   id="min_pledge_amnt" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['min_pledge_amount'];?>
"/>
                    </div></td>-->
                </tr>
                <tr class="shade01">
                
                  
                  
                  <td  align="right" valign="top">Users <span style="color:#F00">*</span></td>
                  <td  align="left" valign="top">
                  <div class="formValidation">
                      <select name="users" id="users" class="" >
                      <?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['u']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value){
$_smarty_tpl->tpl_vars['u']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['u']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['user_id']==$_smarty_tpl->tpl_vars['u']->value['id']){?> selected="selected" <?php }?>  > <?php echo $_smarty_tpl->tpl_vars['u']->value['email_id'];?>
 </option> 
                       <?php } ?>
                      </select>
                    </div></td>
                    <td  align="right" valign="top">Introduction video<span style="color:#F00">*</span></td>
                  <td  align="left" valign="top"><div class="selectVideo">
                      <div id="vid_div"> <?php if ($_smarty_tpl->tpl_vars['project_det']->value['video_thumb_image']!=''){?> <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/projects/videos/original/<?php echo $_smarty_tpl->tpl_vars['project_det']->value['video_thumb_image'];?>
" style='width:150px; height:150p' /> <?php }?></div>
                      <a id="removeVid" href="javascript:void(0);" class="uploadClose"  <?php if ($_smarty_tpl->tpl_vars['project_det']->value['video_thumb_image']==''){?> style="display:none;" <?php }?>>Remove</a>
                      <div class="chooseBtnPane">
                        <input type="file" id="intro_vid_upload" name="intro_vid_upload" />
                      </div>
                      <div class="clear"></div> 
                      <input type="hidden" id="hidVidFile" name="hidVidFile" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['intro_video'];?>
" />
                      <input type="hidden" id="hidVidThumb" name="hidVidThumb" value="<?php echo $_smarty_tpl->tpl_vars['project_det']->value['video_thumb_image'];?>
" />
                    </div></td>
                </tr>
                <tr >
                
                    
                  
                    <td >&nbsp;</td>
                 <td  align="left" valign="top" ><input type="checkbox" id="logged_in_user" name="logged_in_user" value="logged_users" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['access_status']=='1'){?> checked="checked" <?php }?> />
                    Access only for logged in users</td>
                </tr>
               <!-- <tr  class="shade01">
                 <td  align="left" valign="top" colspan="4"><input type="checkbox" id="logged_in_user" name="logged_in_user" value="logged_users" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['access_status']=='1'){?> checked="checked" <?php }?> />
                    Access only for logged in users</td>
                    </tr>-->
                <tr class="shade01">
                  <td colspan="4">&nbsp;</td>
                </tr>
                <tr  >
                  <td  align="right" valign="top">Project description <span style="color:#F00">*</span></td>
                  <td  align="left" valign="top" colspan="3"><div style="width:300px !important; position:relative;">
                      <textarea name="project_desc" id="project_desc" ><?php echo stripslashes($_smarty_tpl->tpl_vars['project_det']->value['project_description']);?>
</textarea>
                    </div><div class="error" style="display:none" id="proDescError"></div></td>
                </tr>
                
                <tr  >
                  <td  align="left" valign="top">
                  
                  <input type="checkbox" id="reward_ck" name="reward_ck" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['rewards']!=0){?> checked="checked" <?php }?> value="add_reward"/> Add Products 
                  </td>
                  <td  align="left" valign="top" colspan="3"></td>
                 
                </tr>
                <tr  id="add_more_tr" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['rewards']==''){?> style="display:none" <?php }?> >
                  <td  align="left" valign="top"></td>
                  <td  align="left" valign="top" colspan="2"></td>
                  <td  align="left" valign="top"><a href="javascript:void(0);" onclick="add_more_reward()">Add more reward</a></td>
                  <?php if ($_smarty_tpl->tpl_vars['project_det']->value==0){?>
                  <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable("1", null, 0);?>
                  <?php }else{ ?>
                  	<?php if ($_smarty_tpl->tpl_vars['project_det']->value['rewards']!=''){?>
                 		<?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['project_det']->value['rewards']), null, 0);?>
                	<?php }else{ ?>
                 		<?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable("1", null, 0);?>
                    <?php }?>
                  <?php }?>
                  <input type="hidden" id="hid_reward_cnt" name="hid_reward_cnt" value="<?php echo $_smarty_tpl->tpl_vars['cnt']->value;?>
" />
                </tr>
                 <tr  >
                  <td  align="left" valign="top"></td>
                  <td  align="left" valign="top" colspan="3">
                  <div id="reward_div" <?php if ($_smarty_tpl->tpl_vars['project_det']->value['rewards']==0){?>  style="display:none" <?php }?> >
                  
                  <?php  $_smarty_tpl->tpl_vars["rew"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["rew"]->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['project_det']->value['rewards']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["rew"]->key => $_smarty_tpl->tpl_vars["rew"]->value){
$_smarty_tpl->tpl_vars["rew"]->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars["rew"]->key;
?>
                  <input type="hidden" id="reward<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" name="reward<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" value="<?php echo $_smarty_tpl->tpl_vars['rew']->value['id'];?>
" />
                  <table class="reward_divtable" cellpadding="0" cellspacing="0" border="0" id="reward_ul_<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" width="100%">
                  <tr><td colspan="2"><a href="javascript:void(0);" class="uploadClose" onclick="remove_reward(<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
)">Remove this reward </a></td></tr>
                  <tr><td>Product Selling Price :<span style="color:#F00">*</span></td><td><input type="text" class="textbox" id="reward_pledge_amnt<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" name="reward_pledge_amnt<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" value="<?php echo $_smarty_tpl->tpl_vars['rew']->value['pledge_amount'];?>
" />
                  </td></tr>
                  <tr><td>Description :</td><td><textarea class="pArea" id="reward_description<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" name="reward_description<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['rew']->value['description'];?>
</textarea></td>
                  </tr>
                  <tr><td>Est. delivery date :<span style="color:#F00">*</span></td><td><input type="text" class="textbox datepicker" id="reward_del_date<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" name="reward_del_date<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"  readonly="readonly" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rew']->value['delivery_date'],'%G-%m-%d');?>
" /></td>
                  </tr>
                  <tr><td>Limiting users for product :<span style="color:#F00"></span></td><td><input type="text" class="textbox" id="reward_user_limit<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" name="reward_user_limit<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" value="<?php echo $_smarty_tpl->tpl_vars['rew']->value['users_limit'];?>
"/></td>
                  </tr>
                  </table>
                  <?php }
if (!$_smarty_tpl->tpl_vars["rew"]->_loop) {
?>
                  <input type="hidden" id="reward1" name="reward1" value="" />
                  <table cellpadding="0" cellspacing="0" border="0" id="reward_ul_1">
                  <tr><td valign="top" colspan="2"><a href="javascript:void(0);" class="uploadClose" onclick="remove_reward(1)">Remove this reward </a></td></tr>
                  <tr><td valign="top" >Product Selling Price :<span style="color:#F00">*</span></td><td valign="top" ><input type="text" id="reward_pledge_amnt1" class="textbox" name="reward_pledge_amnt1" value="" /></td>
                  </tr>
                  <tr><td valign="top" >Description :</td><td valign="top" ><textarea id="reward_description1" name="reward_description1"></textarea></td>
                  </tr>
                  <tr><td valign="top" >Est. delivery date :<span style="color:#F00">*</span></td><td valign="top" ><input type="text" class="textbox datepicker" id="reward_del_date1"  readonly="readonly" name="reward_del_date1" value="" /></td>
                  </tr>
                  <tr><td valign="top" >Limiting users for product :<span style="color:#F00"></span></td><td valign="top" ><input type="text"  class="textbox" id="reward_user_limit1" name="reward_user_limit1" value=''/></td>
                   </tr>
                  </table>
                 
                  <?php } ?>
                   </div>
                  </td>
                </tr>
                <tr>
                  <td valign="top" align="left">&nbsp;</td>
                  <td colspan="3" valign="top" align="left"><span class="btnlayout">
                    <input type="button" value="Save" id="savebtn" class="button" name="savebtn" onClick="return save_projects();"   />
                    </span> <span class="btnlayout ">
                    <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project'"/>
                    </span></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
         <div id="common_error_tab" style="display:none">
         Please create a project first.
        </div>
         
      </div>
    </div>
  </div>
  
  
   <!-- Div for the Jquery PopUp-->
    <div id="popupdata">
    
    <div id="basic-modal-contentinitial"></div> 
    <div class="modalCloseImg" onclick="javascript:close_popupwindow();" ></div>
    <!-- End of Div for the Jquery Popup -->
    </div> 
   <div id="mask"></div>
  <!--End:Border 3--> 
</div>
<!--End:Border 2--> <?php }} ?>