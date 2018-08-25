<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 05:00:00
         compiled from "/home/fundinno/public_html/application/views/admin/newsletter/send_news_letter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1096723169515c0bb0900c04-39403042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec1b607c21b86368e370b9c508a97355f57382a7' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/newsletter/send_news_letter.tpl',
      1 => 1359470146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1096723169515c0bb0900c04-39403042',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'resp' => 0,
    'baseurl' => 0,
    'sel_news' => 0,
    'nl' => 0,
    'cnt' => 0,
    'projects' => 0,
    'i' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c0bb0a7f5c3_78012560',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c0bb0a7f5c3_78012560')) {function content_515c0bb0a7f5c3_78012560($_smarty_tpl) {?> 
<script type="text/javascript">
 $(document).ready(function()
 {
   $("#news_title").change(validateNewsTitle);
  // $("#user_status").change(validateUserStatus);

   var resp='<?php echo $_smarty_tpl->tpl_vars['resp']->value;?>
';	
	if(resp == '0') 
	{		
$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="error_response_msg" colspan=2 align=left ><span><font color=red>Mail Not send</font></span></td></tr>');	
	$("#common_message").slideUp(4000).delay(500);
	}
	
	if(resp == '1') 
	{		
$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span><font color=green>Mail sent Successfully</font></span></td></tr>');	
	$("#common_message").slideUp(4000).delay(300);
	}
 });

function validate_newsSendForm() {
	
   if(validateNewsTitle() )
   {
	  // alert('coming Soon');		   
	   document.sendNews.submit();
   }
}
	 
//function for validating News title
function validateNewsTitle()
{
		$("#news_title_error").hide();	
		if($.trim($("#news_title").val())=='')
		{
		$("#news_title").after('<div class="clear"/><span class="error" id="news_title_error"><span>This field is required</span></span>');
		return false;
		}
		else
		{
		
		$("#news_title").after('<div class="clear"/><span class="checked" id="news_title_error"><span></span></span>');
		return true;						
		
		}
}
				
				
//function for validating status 
function validateUserStatus()
{
		$("#status_error").hide();	
		if($.trim($("#user_status").val())=='')
		{
		$("#user_status").after('<div class="clear"/><span class="error" id="status_error"><span>This field is required</span></span>');
		return false;
		}
		else
		{						
		$("#user_status").after('<div class="clear"/><span class="checked" id="status_error"><span></span></span>');
		return true;							
		}
}
	
</script> 

<div class="shadow_outer">
  <div class="shadow_inner" >
    <div class="table_listing font_segoe ">
      <form name="sendNews" id="sendNews" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/send_news_letter_action" onsubmit="return validate_newsSendForm();">
        <table width="100%" cellspacing="0" cellpadding="0" border="0" >
          <tbody>
            <tr>
              <th colspan="2" align="left"><h2 style="margin-left:5px;">Send News Letter</h2></th>
            </tr>
            <tr id="field_header">
              <td valign="top" colspan="2" align="left" >Fields marked with <span class="color_r">*</span> are required</td>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="2"><div id="display"></div></td>
            </tr>
           
            
            <tr class="shade01">
              <td width="29%" align="left" valign="top">Select Newsletter Title <span class="color_r">*</span></td>
              <td width="71%" align="left" valign="top"><div class="formValidation">
                  <select name="news_title" id="news_title" class="user_select" style="width:300px !important;"/>
                  
                  <option value="">Please choose the news letter</option>
                  <?php  $_smarty_tpl->tpl_vars['nl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nl']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sel_news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nl']->key => $_smarty_tpl->tpl_vars['nl']->value){
$_smarty_tpl->tpl_vars['nl']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['nl']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['nl']->value->news_id;?>
" ><?php echo $_smarty_tpl->tpl_vars['nl']->value->news_title;?>
</option>
                  <?php } ?>
                  </select>
                </div></td>
            </tr>
            <tr> 
              <!-- <td width="282" valign="top" align="left" >Select status <span class="color_r">*</span> </td>-->
              <td  valign="top" align="left" colspan="2"><div class="formValidation_large">
                  <input type="checkbox" id="include_project_title" name="include_project_title" value="true" />
                  <span> Include project title.</span> 
                  <!--<select name="user_status" id="user_status" class="user_select" style="width:300px !important;"/>
                    <option value="">Please choose the status</option>
                    <option value="all">All</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                    <option value="2">Blocked</option>
                    </select>--> 
                  
                </div></td>
            </tr>
            <tr class="shade01"> 
              <!--<td width="29%" align="left" valign="top">Select Newsletter Title <span class="color_r">*</span> </td>-->
              <td width="100%" align="left" valign="top"  colspan="2">
              <div><table>
                  <?php $_smarty_tpl->tpl_vars["cnt"] = new Smarty_variable("6", null, 0);?>
                  <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("0", null, 0);?>
                  
                  <?php if ($_smarty_tpl->tpl_vars['cnt']->value%4==0){?>
                  <?php $_smarty_tpl->tpl_vars["n_r"] = new Smarty_variable(($_smarty_tpl->tpl_vars['cnt']->value/4), null, 0);?>
                  <?php }else{ ?>
                  <?php $_smarty_tpl->tpl_vars["n_r"] = new Smarty_variable(ceil(($_smarty_tpl->tpl_vars['cnt']->value/4)), null, 0);?>
                  <?php }?> 
                  <!--<pre><?php echo print_r($_smarty_tpl->tpl_vars['sel_news']->value);?>
</pre>--> 
                  
                  <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['n']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['i']->value==0){?>
                  <tr> <?php }?>
                    <td><input  type="checkbox" name="chk_group[]" value="<?php echo $_smarty_tpl->tpl_vars['n']->value->id;?>
" />
                      <?php echo $_smarty_tpl->tpl_vars['n']->value->project_title;?>
</td>
                    <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['i']->value>=4){?> </tr>
                  <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable(0, null, 0);?>
                  <?php }?>
                  
                  <?php } ?> 
                  <!--<tr>
                    <td> <input  type="checkbox" name="chk_group[]" value="5" />  Project 1</td>
                    <td><input  type="checkbox" name="chk_group[]" value="6" />  Project 2</td>
                    <td><input  type="checkbox" name="chk_group[]" value="7" />  Project 3</td>
                    <td></td>
                  </tr>-->
                  
                </table></div></td>
            </tr>
            <tr>
              <td valign="top" align="left">&nbsp;</td>
              <td valign="top" align="left"><span class="btnlayout">
                <input type="button" value="Send" id="newsSendbtn" class="button" name="newsSendbtn" onClick="return validate_newsSendForm();" />
                </span> <span class="btnlayout ">
                <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/news_letter';"/>
                </span></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<?php }} ?>