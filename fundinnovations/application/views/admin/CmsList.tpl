<div class="shadow_outer">
        <div class="shadow_inner" >
           <h2>CMS Pages</h2>
             <div class="table_listing font_segoe " id="searchresult">
              <div id="display">{if $updated_msg neq ''}{$updated_msg}{/if}</div>
              <table width="100%" cellspacing="0" cellpadding="0" border="0">
              {if $cmsCount < 1}
             <tr >
                    <td colspan="6" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Result Found</td>
                  </tr>
              {else}
                  
            <thead>
            
              <tr>               
                <th width="295" align="left" valign="middle">Page Name</th>               
                <th width="" align="left" valign="middle">Updated Date</th>
                <th width="90" align="right" valign="middle">Option</th>
			  </tr>
              </thead>
              <tbody>
              
                      {assign var=i value=0}
                      {foreach from=$CmsLists key=k item=CmsList}
                      <tr "{if $i%2 eq 1}" class="shade01" "{/if}">                       
                        <td>{$CmsList->page_name}</td>                        
                        <td>{$CmsList->date}</td>
                        <td align="right"><a href="{$baseurl}admin/Cms/cmsEdit/{$CmsList->page_id}"><img src="{$baseurl}/images/admin/tablelisting/edit_icon.gif" width='15' height='16' alt='Edit' title="Edit" /></a>                       
                        </td>
                      </tr>
                      
                      {assign var=i value=$i+1}
                      {/foreach}             
             
                 {/if}
             </tbody>
             </table>
   </div>
             <br />
     
              <div style="margin:5px 0 0 5px;"> </div>
                  <div style="clear:both;"></div>
                 

        </div>
        <!--End:Border 3--> 
        {if $cmsCount > 0}
         <div id="Pagination" style="width:1000px;float:left;top:2px;"></div>
         {/if}
      </div>  
<script type="text/javascript" src="{$baseurl}js/admin/cms.js"></script>
  {literal}
<script type="text/javascript">
 $(document).ready(function(){
		  var baseurl = '{/literal}{$baseurl}{literal}';
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
{/literal}   
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
       