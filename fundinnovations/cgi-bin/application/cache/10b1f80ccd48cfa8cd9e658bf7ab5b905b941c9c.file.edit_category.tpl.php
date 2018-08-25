<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 06:21:41
         compiled from "/home/fundinno/public_html/application/views/admin/category/edit_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1018861987515c1ed592e945-68423058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10b1f80ccd48cfa8cd9e658bf7ab5b905b941c9c' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/category/edit_category.tpl',
      1 => 1363931753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1018861987515c1ed592e945-68423058',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'cat_details' => 0,
    'cat_list' => 0,
    'cat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c1ed5ca8cc0_65410899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c1ed5ca8cc0_65410899')) {function content_515c1ed5ca8cc0_65410899($_smarty_tpl) {?> 
<script type="text/javascript">
 $(document).ready(function()
 {	
   var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'; 
   /*$("#current_password").blur(validatepassword);
   $("#new_password").blur(validatenewpassword); */
   $("#category").blur(validatecategory); 
   
   $('#btnUpdate').click(function()
   {	    
	   //if(validatecategory())
	   //{	
	    $.when(validatecategory()).done(function(a1){
			  if(a1 ==0){	       	   
		  //document.forms["change_pwd"].submit();
				$.ajax({
				type: 'POST',
				url: baseurl+"admin/category/update_category/",		
				data: $('#update_category').serialize(),
				success:function(msg)
				{
					if(msg=='failed')
					{
						$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="error_response_msg" colspan=2 align=left ><span><font color=red>Failed</font></span></td></tr>');	
	                    $("#common_message").slideUp(2000).delay(500);					 
					}
					else
					{
						$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span><font color=green>Category updated successfully</font></span></td></tr>');	
	                    $("#common_message").slideUp(2000).delay(300);
						window.location.href=baseurl+'admin/category';
						
					}
				}
			});
			  }
	   });	   
   });
   
   
 });
 	//function for validating category
	function validatecategory()
	{
			
			$("#tag_error").remove();	
			if($.trim($("#category").val())=='')
			{
			$("#category").after('<div class="clear"/><span class="error" id="tag_error"><span>This field is required</span></span>');
			return 1;
			}
			else
			{
			var cat_id= $('#hid_catid').val();
				var baseurl='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
'; 
				if($.trim($("#category").val())!=''){
					var cat=$.trim($("#category").val());
					return  $.ajax({
					type: 'POST',
					url: baseurl+"admin/category/check_category",		
					data:"cat="+cat+"&cat_id="+cat_id,
					success:function(msg)
					{
						if(msg==1){
						$("#category").after('<div class="clear"/><span class="error" id="tag_error"><span>This category is exists.</span></span>');
						return false;
						}else{
							$("#tag_error").remove();	
							//return true;
						}
					}
					});
				} 
				else{
					$("#tag_error").remove();	
							return 0;
				}
			
								
			
			}
	}
</script> 

 
 <div class="shadow_outer">
  <div class="shadow_inner" >
    <div class="table_listing font_segoe ">
      <form name="update_category" id="update_category" method="post" action="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/category/insert_category" onsubmit="return validatecategory();">
      <input type="hidden" id="hid_catid" name="hid_catid" value="<?php echo $_smarty_tpl->tpl_vars['cat_details']->value[0]['id'];?>
" />
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <th colspan="2" align="left"><h2 style="margin-left:5px;">Update category</h2></th>
            </tr>
            <tr id="field_header">
              <td valign="top" colspan="2" align="left" >Fields marked with <span class="color_r">*</span> are required</td>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="2"><div id="display"></div></td>
            </tr>
            <tr class="shade01">
              <td width="25%" align="left" valign="top">Category <span class="color_r">*</span></td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" name="category" id="category" class="styletxt40perc "  tabindex="1" value="<?php echo $_smarty_tpl->tpl_vars['cat_details']->value[0]['category_name'];?>
"/>
                </div></td>
            </tr>
             <tr >
              <td  align="left" valign="top">Parent <!--<span class="color_r">*</span>--></td>
              <td  align="left" valign="top"><div class="formValidation" >
                <select name="parent_category" id="parent_category" class="styletxt40perc "  />
                  
                  <option value="">Select Parent</option>
                  <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cat_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['cat']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat_details']->value[0]['parent_id']==$_smarty_tpl->tpl_vars['cat']->value['id']){?> selected="selected" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['cat']->value['category_name'];?>
</option>
                  <?php } ?>
                  </select>
               
                </div></td>
            </tr>
            <tr class="shade01">
              <td  align="left" valign="top">Description<!-- <span class="color_r">*</span>--></td>
              <td  align="left" valign="top"><div class="formValidation" style="height:auto">
              <textarea id="description" name="description" style="height:80px"><?php echo $_smarty_tpl->tpl_vars['cat_details']->value[0]['description'];?>
</textarea>
                </div></td>
            </tr>

            <tr>
              <td valign="top" align="left">&nbsp;</td>
              <td valign="top" align="left"><span class="btnlayout">
                <input type="button" value="Update" id="btnUpdate" class="button" name="btnUpdate"/>
                </span> <span class="btnlayout ">
                <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/category';"/>
                </span></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div><?php }} ?>