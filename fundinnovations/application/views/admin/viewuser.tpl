
<link rel="stylesheet" type="text/css" href="{$baseurl}js/jquery_lightbox/css/jquery.lightbox-0.5.css" />
<script type="text/javascript" src="{$baseurl}js/jquery_lightbox/js/jquery.lightbox-0.5.js"></script>
{literal} 
<script type="text/javascript">
var baseurl=''
 $(function() {
     $('a.aproof').lightBox();
	   $('a.aproof2').lightBox();
	 baseurl= $('#baseURl4js').val(); 
    });
	</script>{/literal} 
    <input type="hidden" value="{$baseurl}" name="baseURl4js" id="baseURl4js" />
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
               
                    <tbody>
                    <tr>
                    
                    <th colspan="2" align="left"><h2 style="margin-left:5px;">View User</h2></th>
                    </tr>
                    {foreach from=$users key=kk item=user}
                    
                    <tr class="shade01">
                    <td width="25%" align="left" valign="top">Name  </td>
                    <td width="" align="left" valign="top">: {$user->profile_name} </td>
                     
                    </tr>
                    <tr class="">
                    <td align="left" valign="top">Email Id </td>
                    <td  align="left" valign="top">: {$user->email_id}</td>
                    </tr>
                    <tr class="shade01">
                    <td align="left" valign="top">About me</td>
                    <td  align="left" valign="top">: {$user->about_me}</td>
                    </tr>
                    <tr class="">
                    <td align="left" valign="top">Address</td>
                    <td  align="left" valign="top">: {$user->address}</td>
                    </tr>
                   <tr class="shade01">
                    <td align="left" valign="top">City </td>
                    <td align="left" valign="top">: {$user->city} </td>
                    </tr>
                    
                   <tr class="">
                    <td align="left" valign="top">State </td>
                    <td align="left" valign="top">: {$user->state}</td>
                    </tr>  
                     
                    
                    
                     <!--<tr class="">
                    <td  align="left" valign="top">City  </td>
                    <td  align="left" valign="top">: {$user->city}</td>
                    </tr>
                    -->
                    
                    <tr class="shade01">
                    <td  align="left" valign="top">Country  </td>
                    <td  align="left" valign="top">: {$user->country}</td>
                    </tr>
                    <tr >
                    <td  align="left" valign="top">Websites  </td>
                    <td  align="left" valign="top">: {$user->websites}</td>
                    </tr>
                    
                     <tr class="shade01">
                    <td  align="left" valign="top">Contact no(Mob)  </td>
                    <td  align="left" valign="top">: {$user->contact_no}</td>
                    </tr>
                     <tr >
                    <td  align="left" valign="top">Created projects  </td>
                    <td  align="left" valign="top">:  {$user->created_projs}</td>
                    </tr>
                    <tr class="shade01">
                    <td  align="left" valign="top">Backed projects  </td>
                    <td  align="left" valign="top">: {$user->backed_projs}</td>
                    </tr>
                     <tr >
                    <td  align="left" valign="top">FB link  </td>
                    <td  align="left" valign="top">: {$user->fb_link}</td>
                    </tr>
                    
                     <tr class="shade01">
                    <td  align="left" valign="top">Twitter link  </td>
                    <td  align="left" valign="top">: {$user->twitter_link}</td>
                    </tr>
                     <tr >
                    <td  align="left" valign="top">Status  </td>
                    <td  align="left" valign="top">: {$user->status}</td>
                    </tr>    
                    </tr>
                    
                    <tr class="shade01">
                    <td  valign="middle" align="left" >Id proof image</td>
                    <td class="tdWidth250" valign="top" align="left">
                    {if $user->address_proof_image eq ''}
                    : No Id proof
                    {else}
                    <div class="profileImg">
                    {assign var="ext" value=$user->address_proof_image|pathinfo:$smarty.const.PATHINFO_EXTENSION}
                    {if $user->address_proof_image neq ''}
                    {if $ext eq 'jpg' || $ext eq 'png' || $ext eq 'gif'}
                   <a class='aproof' href="{$baseurl}uploads/user_id_proof/thumb/{$user->address_proof_image}" ><img src="{$user->idProof}" width="97" height="95" /></a>
                    {elseif $ext eq 'pdf'}
                    <img src="{$baseurl}images/pdf_img.png" width="97" height="95" />
                    {else}
                     <img src="{$baseurl}images/Word.png" width="97" height="95" />
                    {/if}{else}
                    
                    {/if}</div>{/if}
                     
                    {if $user->address_proof_image neq ''}<a href="{$baseurl}admin/download_file/download_idproof/{$user->address_proof_image}">Click here to download</a>{/if}
                    </td>
                    </tr>
                   <tr >
                    <td  valign="middle" align="left" >Address proof image</td>
                    <td class="tdWidth250" valign="top" align="left">
                     {if $user->address_id_proof eq ''}
                    : No Address proof
                    {else}
                    {assign var="ext2" value=$user->address_id_proof|pathinfo:$smarty.const.PATHINFO_EXTENSION}
                    {if $ext2 eq 'jpg' || $ext2 eq 'png' || $ext2 eq 'gif'}
                   <a class='aproof2' href="{$baseurl}uploads/user_address_proof/thumb/{$user->address_id_proof}" ><img src="{$baseurl}uploads/user_address_proof/thumb/{$user->address_id_proof}" width="97" height="95" /></a>
                    {elseif $ext2 eq 'pdf'}
                    <img src="{$baseurl}images/pdf_img.png" width="97" height="95" />
                    {else}
                     <img src="{$baseurl}images/Word.png" width="97" height="95" />
                    {/if}
                    {/if}
                  <!-- {assign var="class" value=unsucess} <div class="profileImg"><img src="{$user->idProof}" width="97" height="95" /></div>-->
                 
                    {if $user->address_id_proof neq ''}<a href="{$baseurl}admin/download_file/download_address_proof/{$user->address_id_proof}">Click here to download</a>{/if}
                    </td>
                    </tr>
                    <tr class="shade01">
                    <td  valign="middle" align="left" >&nbsp; Profile image</td>
                    <td class="tdWidth250" valign="top" align="left">&nbsp;<div class="profileImg"><img src="{$user->user_image}" width="97" height="95" /></div></td>
                    </tr>
                    
                    <tr class="shade01">
                    <td colspan="2" align="left" valign="top">
                      <span class="btnlayout">
                      {if $traceback eq ''}
                      <input type="button" class="cancel" value="Back" name="text3" onclick="return view_to_manageusers('{$baseurl}','{$fromPage}','{$currP}','{$order_by}')" />
                      {else}
                      
                      <input type="button" class="cancel" value="Back" name="text3"onclick="return "/>
                      
                      {/if}
                      </span> 
                      
                      </span> </td>
                    </tr>
                    {/foreach}
                    </tbody>
                </table>
      
      