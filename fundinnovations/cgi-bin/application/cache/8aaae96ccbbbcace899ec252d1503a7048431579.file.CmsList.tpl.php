<?php /* Smarty version Smarty-3.1.8, created on 2013-01-22 14:59:36
         compiled from "/var/www/fundinnovations/application/views/admin/CmsList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1447792882508f55b2b83b69-01390948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8aaae96ccbbbcace899ec252d1503a7048431579' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/CmsList.tpl',
      1 => 1358846975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1447792882508f55b2b83b69-01390948',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_508f55b2c52576_95627437',
  'variables' => 
  array (
    'updated_msg' => 0,
    'cmsCount' => 0,
    'CmsLists' => 0,
    'i' => 0,
    'CmsList' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508f55b2c52576_95627437')) {function content_508f55b2c52576_95627437($_smarty_tpl) {?><div class="shadow_outer">
        <div class="shadow_inner" >
           <h2>CMS Pages</h2>
             <div class="table_listing font_segoe " id="searchresult">
              <div id="display"><?php if ($_smarty_tpl->tpl_vars['updated_msg']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['updated_msg']->value;?>
<?php }?></div>
              <table width="100%" cellspacing="0" cellpadding="0" border="0">
              <?php if ($_smarty_tpl->tpl_vars['cmsCount']->value<1){?>
             <tr >
                    <td colspan="6" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
              <?php }else{ ?>
                  
            <thead>
            
              <tr>               
                <th width="295" align="left" valign="middle">Page Name</th>               
                <th width="" align="left" valign="middle">Updated Date</th>
                <th width="90" align="right" valign="middle">Option</th>
			  </tr>
              </thead>
              <tbody>
              
                      <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
                      <?php  $_smarty_tpl->tpl_vars['CmsList'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['CmsList']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CmsLists']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['CmsList']->key => $_smarty_tpl->tpl_vars['CmsList']->value){
$_smarty_tpl->tpl_vars['CmsList']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['CmsList']->key;
?>
                      <tr "<?php if ($_smarty_tpl->tpl_vars['i']->value%2==1){?>" class="shade01" "<?php }?>">                       
                        <td><?php echo $_smarty_tpl->tpl_vars['CmsList']->value->page_name;?>
</td>                        
                        <td><?php echo $_smarty_tpl->tpl_vars['CmsList']->value->date;?>
</td>
                        <td align="right"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/Cms/cmsEdit/<?php echo $_smarty_tpl->tpl_vars['CmsList']->value->page_id;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/tablelisting/edit_icon.gif" width='15' height='16' alt='Edit' title="Edit" /></a>                       
                        </td>
                      </tr>
                      
                      <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                      <?php } ?>             
             
                 <?php }?>
             </tbody>
             </table>
   </div>
             <br />
     
              <div style="margin:5px 0 0 5px;"> </div>
                  <div style="clear:both;"></div>
                 

        </div>
        <!--End:Border 3--> 
        <?php if ($_smarty_tpl->tpl_vars['cmsCount']->value>0){?>
         <div id="Pagination" style="width:1000px;float:left;top:2px;"></div>
         <?php }?>
      </div>  
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/cms.js"></script>
  
<script type="text/javascript">
 $(document).ready(function(){
		  var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	      cmspages(baseurl);		 
		 $('.check').click(function () {
		
		$('#checkall').removeAttr('checked');
		
		});
		
	 $('#checkall').click(function(){
		if (this.checked == false) {
			
 			$('.check:checked').attr('checked', false);
		}
		else {
			
			$('.check:not(:checked)').attr('checked', true);
 
		}
		
		 
	 });

	//for pagination
	function cmspages(baseurl) {
	$('#rightblock01').empty().html('<img style="margin-top:150px;margin-left:531px;" src="'+baseurl+'images/bigLoader.gif" />');
	var startp=0;
	var limitp=10;

							
							  loadCms(baseurl,'admin/Cms/searchCms',startp,limitp);						  		
							   <!--end-->
                           $.ajax({
								type:"POST",
								url:baseurl+"admin/Cms/countCms",
								data:"",
								success:function(msg)
								{
									// Create pagination element
									$("#Pagination").pagination(msg, {
									num_edge_entries: 2,
									num_display_entries: 12,
									callback: pageselectCallbackcms,
									items_per_page:10
									});
								}
									
							});

                           
					
				
				
/*** pageselectCallback ****/				
function pageselectCallbackcms(page_index, jq)
{
	
		var page_ind = parseInt(page_index)*parseInt(limitp);
		
		$.ajax({			
		type: "POST",
		url: baseurl+'admin/Cms/searchCms', 
		data:"startp="+page_ind+"&limitp="+limitp,
		success: function(msg){	
		//alert(msg)
		$('#searchresult').html('');				 
		$('#searchresult').html(msg);			 				
		}				
		});	
}  
/*** End pageselectCallback ****/
				
				
		
}
function loadCms(baseurl, ctrlfnt,startp,limitp)
{
	//alert(limitp)
   				 $.ajax({
                    type: "POST",
                    url: baseurl+ctrlfnt, 
                    data:"startp="+startp+"&limitp="+limitp,
                    success: function(msg){
                        if(msg)
                        { 
                          // alert(msg);
							$('#searchresult').html('');				 
		                    $('#searchresult').html(msg);		
                        }
                    }                   
                });
}

	//for end of pagination
	
	var sucmsg = getCookie('suc_mesg');
	document.cookie = 'suc_mesg=-1';
	if(sucmsg==1)
	{
		
			var showmsg = '<font color=green>Page Added Successfully</font>';
		
                 $("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span>'+showmsg+'</span></td></tr>');
				 $("#common_message").slideUp(2000).delay(300);
	}
	/**/
	
	/*var msg	  ="0$$<font color=green>Page Already Exist</font>";

	var res  = msg.split('$$');	*/		
                /* $("#display").after(' <tr><td valign="top" style="border: #BD0606 1px solid;" id="common_message"  class="response_msg" colspan=2 align=left ><span>'+res[1]+'</span></td></tr>');
				 $("#common_message").slideUp(2000).delay(300);*/
				 
	/**/	
			 
});


function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
{
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}			 
 </script>   
   
<!--<div id="dialog" title="Basic dialog">
    <p>This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>
<div id="dialog-confirm" title="Empty the recycle bin?">
    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>-->

<script>
    $(function() {
       /* $( "#dialog" ).dialog({
		 resizable: false	
		});*/
    });
	 $(function() {
       /* $( "#dialog-confirm" ).dialog({
            resizable: false,
            height:140,
            modal: true,
            buttons: {
                "Delete": function() {
                    $( this ).dialog( "close" );
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });*/
    });
    </script>
       <?php }} ?>