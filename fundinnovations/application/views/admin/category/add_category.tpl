{literal} 
<script type="text/javascript">
 $(document).ready(function()
 {	
   var baseurl='{/literal}{$baseurl}{literal}'; 
   /*$("#current_password").blur(validatepassword);
   $("#new_password").blur(validatenewpassword); */
   $("#category").blur(validatecategory); 
   
   $('#btnSave').click(function()
   {	    
	   //if(validatecategory())
	  // {		       	   
		  //document.forms["change_pwd"].submit();
		  $.when(validatecategory()).done(function(a1){
			  if(a1 ==0){
				$.ajax({
				type: 'POST',
				url: baseurl+"admin/category/insert_category/",		
				data: $('#add_category').serialize(),
				success:function(msg)
				{
					if(msg=='failed')
					{
						$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="error_response_msg" colspan=2 align=left ><span><font color=red>Failed</font></span></td></tr>');	
	                    $("#common_message").slideUp(2000).delay(500);					 
					}
					else
					{
						$("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span><font color=green>Category inserted successfully</font></span></td></tr>');	
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
				var baseurl='{/literal}{$baseurl}{literal}'; 
				if($.trim($("#category").val())!=''){
					var cat=$.trim($("#category").val());
					return $.ajax({
					type: 'POST',
					url: baseurl+"admin/category/check_category",		
					data:"cat="+cat,
					success:function(msg)
					{
						$("#tag_error").remove();	
						if(msg==1){
						$("#category").after('<div class="clear"/><span class="error" id="tag_error"><span>This category is exists.</span></span>');
						//return false;
						}else{
							$("#tag_error").remove();	
							//return true;
						}
					}
					});
				} 
				else{
					$("#tag_error").remove();	
							//return true;
					return 0;	
				}
			
			
			}
	}
</script> 
{/literal}
 
 <div class="shadow_outer">
  <div class="shadow_inner" >
    <div class="table_listing font_segoe ">
      <form name="add_category" id="add_category" method="post" action="{$baseurl}admin/category/insert_category" onsubmit="return validate_form();">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <th colspan="2" align="left"><h2 style="margin-left:5px;">Add category</h2></th>
            </tr>
            <tr id="field_header">
              <td valign="top" colspan="2" align="left" >Fields marked with <span class="color_r">*</span> are required</td>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="2"><div id="display"></div></td>
            </tr>
            <tr class="shade01">
              <td  align="left" valign="top">Category <span class="color_r">*</span></td>
              <td  align="left" valign="top"><div class="formValidation">
                  <input type="text" name="category" id="category" class="styletxt40perc" tabindex="1" value=""/>
                </div></td>
            </tr>
             <tr >
              <td  align="left" valign="top">Parent <!--<span class="color_r">*</span>--></td>
              <td  align="left" valign="top"><div class="formValidation">
                <select name="parent_category" id="parent_category" class="styletxt40perc"  />
                  
                  <option value="">Select Parent</option>
                  {foreach from=$cat_list key=k item=cat }
                  <option value="{$cat.id}" >{$cat.category_name}</option>
                  {/foreach}
                  </select>
               
                </div></td>
            </tr>
            <tr class="shade01">
              <td  align="left" valign="top">Description<!-- <span class="color_r">*</span>--></td>
              <td  align="left" valign="top"><div class="formValidation" style="height:auto">
              <textarea id="description" name="description"  style="height:80px"></textarea>
                </div></td>
            </tr>
            <tr>
              <td valign="top" align="left">&nbsp;</td>
              <td valign="top" align="left"><span class="btnlayout">
                <input type="button" value="Save" id="btnSave" class="button" name="btnSave"/>
                </span> <span class="btnlayout ">
                <input type="button" class="cancel" value="Cancel" name="text3" onclick="window.location.href='{$baseurl}admin/category';"/>
                </span></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>