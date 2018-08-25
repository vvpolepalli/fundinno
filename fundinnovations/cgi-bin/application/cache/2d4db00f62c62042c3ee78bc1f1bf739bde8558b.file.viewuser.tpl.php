<?php /* Smarty version Smarty-3.1.8, created on 2013-02-14 18:27:08
         compiled from "/var/www/fundinnovations/application/views/admin/viewuser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2048235741508a5dcf737507-94570223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d4db00f62c62042c3ee78bc1f1bf739bde8558b' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/viewuser.tpl',
      1 => 1360846566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2048235741508a5dcf737507-94570223',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_508a5dcf892a78_51414154',
  'variables' => 
  array (
    'baseurl' => 0,
    'users' => 0,
    'user' => 0,
    'ext' => 0,
    'ext2' => 0,
    'traceback' => 0,
    'fromPage' => 0,
    'currP' => 0,
    'order_by' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508a5dcf892a78_51414154')) {function content_508a5dcf892a78_51414154($_smarty_tpl) {?>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery_lightbox/css/jquery.lightbox-0.5.css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/jquery_lightbox/js/jquery.lightbox-0.5.js"></script>
 
<script type="text/javascript">
var baseurl=''
 $(function() {
     $('a.aproof').lightBox();
	   $('a.aproof2').lightBox();
	 baseurl= $('#baseURl4js').val(); 
    });
	</script> 
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
" name="baseURl4js" id="baseURl4js" />
                <table width="100%" cellspacing="0" cellpadding="0" border="0">
               
                    <tbody>
                    <tr>
                    
                    <th colspan="2" align="left"><h2 style="margin-left:5px;">View User</h2></th>
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['user']->key;
?>
                    
                    <tr class="shade01">
                    <td width="25%" align="left" valign="top">Name  </td>
                    <td width="" align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->profile_name;?>
 </td>
                     
                    </tr>
                    <tr class="">
                    <td align="left" valign="top">Email Id </td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->email_id;?>
</td>
                    </tr>
                    <tr class="shade01">
                    <td align="left" valign="top">About me</td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->about_me;?>
</td>
                    </tr>
                    <tr class="">
                    <td align="left" valign="top">Address</td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->address;?>
</td>
                    </tr>
                   <tr class="shade01">
                    <td align="left" valign="top">City </td>
                    <td align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->city;?>
 </td>
                    </tr>
                    
                   <tr class="">
                    <td align="left" valign="top">State </td>
                    <td align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->state;?>
</td>
                    </tr>  
                     
                    
                    
                     <!--<tr class="">
                    <td  align="left" valign="top">City  </td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->city;?>
</td>
                    </tr>
                    -->
                    
                    <tr class="shade01">
                    <td  align="left" valign="top">Country  </td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->country;?>
</td>
                    </tr>
                    <tr >
                    <td  align="left" valign="top">Websites  </td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->websites;?>
</td>
                    </tr>
                    
                     <tr class="shade01">
                    <td  align="left" valign="top">Contact no(Mob)  </td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->contact_no;?>
</td>
                    </tr>
                     <tr >
                    <td  align="left" valign="top">Created projects  </td>
                    <td  align="left" valign="top">:  <?php echo $_smarty_tpl->tpl_vars['user']->value->created_projs;?>
</td>
                    </tr>
                    <tr class="shade01">
                    <td  align="left" valign="top">Backed projects  </td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->backed_projs;?>
</td>
                    </tr>
                     <tr >
                    <td  align="left" valign="top">FB link  </td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->fb_link;?>
</td>
                    </tr>
                    
                     <tr class="shade01">
                    <td  align="left" valign="top">Twitter link  </td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->twitter_link;?>
</td>
                    </tr>
                     <tr >
                    <td  align="left" valign="top">Status  </td>
                    <td  align="left" valign="top">: <?php echo $_smarty_tpl->tpl_vars['user']->value->status;?>
</td>
                    </tr>    
                    </tr>
                    
                    <tr class="shade01">
                    <td  valign="middle" align="left" >Id proof image</td>
                    <td class="tdWidth250" valign="top" align="left">
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->address_proof_image==''){?>
                    : No Id proof
                    <?php }else{ ?>
                    <div class="profileImg">
                    <?php $_smarty_tpl->tpl_vars["ext"] = new Smarty_variable(pathinfo($_smarty_tpl->tpl_vars['user']->value->address_proof_image,@PATHINFO_EXTENSION), null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->address_proof_image!=''){?>
                    <?php if ($_smarty_tpl->tpl_vars['ext']->value=='jpg'||$_smarty_tpl->tpl_vars['ext']->value=='png'||$_smarty_tpl->tpl_vars['ext']->value=='gif'){?>
                   <a class='aproof' href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/user_id_proof/thumb/<?php echo $_smarty_tpl->tpl_vars['user']->value->address_proof_image;?>
" ><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value->idProof;?>
" width="97" height="95" /></a>
                    <?php }elseif($_smarty_tpl->tpl_vars['ext']->value=='pdf'){?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/pdf_img.png" width="97" height="95" />
                    <?php }else{ ?>
                     <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/Word.png" width="97" height="95" />
                    <?php }?><?php }else{ ?>
                    
                    <?php }?></div><?php }?>
                     
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->address_proof_image!=''){?><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/download_file/download_idproof/<?php echo $_smarty_tpl->tpl_vars['user']->value->address_proof_image;?>
">Click here to download</a><?php }?>
                    </td>
                    </tr>
                   <tr >
                    <td  valign="middle" align="left" >Address proof image</td>
                    <td class="tdWidth250" valign="top" align="left">
                     <?php if ($_smarty_tpl->tpl_vars['user']->value->address_id_proof==''){?>
                    : No Address proof
                    <?php }else{ ?>
                    <?php $_smarty_tpl->tpl_vars["ext2"] = new Smarty_variable(pathinfo($_smarty_tpl->tpl_vars['user']->value->address_id_proof,@PATHINFO_EXTENSION), null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['ext2']->value=='jpg'||$_smarty_tpl->tpl_vars['ext2']->value=='png'||$_smarty_tpl->tpl_vars['ext2']->value=='gif'){?>
                   <a class='aproof2' href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/user_address_proof/thumb/<?php echo $_smarty_tpl->tpl_vars['user']->value->address_id_proof;?>
" ><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
uploads/user_address_proof/thumb/<?php echo $_smarty_tpl->tpl_vars['user']->value->address_id_proof;?>
" width="97" height="95" /></a>
                    <?php }elseif($_smarty_tpl->tpl_vars['ext2']->value=='pdf'){?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/pdf_img.png" width="97" height="95" />
                    <?php }else{ ?>
                     <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/Word.png" width="97" height="95" />
                    <?php }?>
                    <?php }?>
                  <!-- <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('unsucess', null, 0);?> <div class="profileImg"><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value->idProof;?>
" width="97" height="95" /></div>-->
                 
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->address_id_proof!=''){?><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/download_file/download_address_proof/<?php echo $_smarty_tpl->tpl_vars['user']->value->address_id_proof;?>
">Click here to download</a><?php }?>
                    </td>
                    </tr>
                    <tr class="shade01">
                    <td  valign="middle" align="left" >&nbsp; Profile image</td>
                    <td class="tdWidth250" valign="top" align="left">&nbsp;<div class="profileImg"><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value->user_image;?>
" width="97" height="95" /></div></td>
                    </tr>
                    
                    <tr class="shade01">
                    <td colspan="2" align="left" valign="top">
                      <span class="btnlayout">
                      <?php if ($_smarty_tpl->tpl_vars['traceback']->value==''){?>
                      <input type="button" class="cancel" value="Back" name="text3" onclick="return view_to_manageusers('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fromPage']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['currP']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_by']->value;?>
')" />
                      <?php }else{ ?>
                      
                      <input type="button" class="cancel" value="Back" name="text3"onclick="return "/>
                      
                      <?php }?>
                      </span> 
                      
                      </span> </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
      
      <?php }} ?>