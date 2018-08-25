<?php /* Smarty version Smarty-3.1.8, created on 2013-02-21 15:51:39
         compiled from "/var/www/fundinnovations/application/views/admin/projects/viewprojects.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133438583050a4f28abedf70-68343380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad842fe3b97a3e2b8eb4821af683cfe485499cc9' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/projects/viewprojects.tpl',
      1 => 1361442095,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133438583050a4f28abedf70-68343380',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a4f28addc8a6_81665695',
  'variables' => 
  array (
    'baseurl' => 0,
    'proj_details' => 0,
    'k' => 0,
    'rew' => 0,
    'fromPage' => 0,
    'currP' => 0,
    'order_by' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a4f28addc8a6_81665695')) {function content_50a4f28addc8a6_81665695($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/fundinnovations/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?><!--script for showing image on mouse over-->
<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/preview.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/main_large.js"></script>-->

<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody>
    <tr>
      <th colspan="3" align="left"><h2 style="margin-left:5px;">View project details</h2></th>
    </tr>
    
    <!-- <pre> <?php echo print_r($_smarty_tpl->tpl_vars['proj_details']->value);?>
   </pre>-->
    <tr class="shade01">
      <td align="left" width="16%" valign="top">Project image </td>
      <td align="left" width="1%" valign="top">:</td>
      <td align="left" width="83%" valign="top"><div class="thumbnails_property"><img src="<?php echo $_smarty_tpl->tpl_vars['proj_details']->value['proj_image'];?>
" alt='Preview' title="Preview"  /></div></td>
    </tr>
    <tr >
      <td width="16%" align="left" valign="top">Project title</td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> <?php echo stripslashes($_smarty_tpl->tpl_vars['proj_details']->value['project_title']);?>
</td>
    </tr>
    <tr class="shade01">
      <td width="16%" align="left" valign="top">Short description </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> <?php echo stripslashes($_smarty_tpl->tpl_vars['proj_details']->value['short_description']);?>
</td>
    </tr>
    <tr >
      <td width="16%" align="left" valign="top">Category </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> <?php echo $_smarty_tpl->tpl_vars['proj_details']->value['category'];?>
 </td>
    </tr>
    <tr class="shade01">
      <td width="16%" align="left" valign="top">Fund duration </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> <?php echo $_smarty_tpl->tpl_vars['proj_details']->value['fund_duration'];?>
 days</td>
    </tr>
    <tr >
      <td width="16%" align="left" valign="top">City </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"><?php echo $_smarty_tpl->tpl_vars['proj_details']->value['city_name'];?>
 </td>
    </tr>
   <!-- <tr class="shade01">
      <td width="16%" align="left" valign="top">Max sponsor </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> <?php echo $_smarty_tpl->tpl_vars['proj_details']->value['max_sponsors'];?>
</td>
    </tr>-->
    <tr class="shade01" >
      <td width="16%" align="left" valign="top">Funding goal </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> <?php echo $_smarty_tpl->tpl_vars['proj_details']->value['funding_goal'];?>
 </td>
    </tr>
    <tr >
      <td width="16%" align="left" valign="top">Access only for logged in users </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> <?php if ($_smarty_tpl->tpl_vars['proj_details']->value['access_status']=='1'){?> Yes<?php }else{ ?> No <?php }?></td>
    </tr>
    <!--<tr >
      <td width="16%" align="left" valign="top">Min pledge amount </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"><?php echo $_smarty_tpl->tpl_vars['proj_details']->value['min_pledge_amount'];?>
 </td>
    </tr>-->
    <tr class="shade01">
      <td width="16%" align="left" valign="top">Created by </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> <?php echo $_smarty_tpl->tpl_vars['proj_details']->value['profile_name'];?>
</td>
    </tr>
    <tr >
      <td width="16%" align="left" valign="top">Introduction video </td>
      <td width="1%" align="left" valign="top">:</td>
      <td align="left" width="83%" valign="top"> <?php if ($_smarty_tpl->tpl_vars['proj_details']->value['intro_video']!=''){?> <span rel="<?php echo $_smarty_tpl->tpl_vars['proj_details']->value['intro_video'];?>
"  class="preview" style="display: block;"> <img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/videoBtn.png"> </span> <img  style="width:100px;height:80px;" src="<?php echo $_smarty_tpl->tpl_vars['proj_details']->value['video_image'];?>
" class="previewimg"> <?php }?> </td>
    </tr>
    
    <!-- <tr class="shade01">
                    <td colspan="3" valign="top" height="10" align="center">&nbsp;</td>
                    </tr>-->
					<tr  class="shade01"><td colspan="3"></td></tr>
    <tr><!-- class="shade01"-->
      <td valign="top" height="10" align="left">Project description </td><td width="1%" align="left" valign="top">:</td>
      <td align="left" valign="top" style="background:#fff; padding:10px"> <iframe id="proj_cntnt" frameborder="0" width="100%" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/project/project_description/<?php echo $_smarty_tpl->tpl_vars['proj_details']->value['id'];?>
"></iframe> </td>
    </tr>
	<tr  class="shade01"><td colspan="3"></td></tr>
  <?php if ($_smarty_tpl->tpl_vars['proj_details']->value['rewards']!=0&&count($_smarty_tpl->tpl_vars['proj_details']->value['rewards'])!=0){?>
  <?php  $_smarty_tpl->tpl_vars['rew'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rew']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['proj_details']->value['rewards']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rew']->key => $_smarty_tpl->tpl_vars['rew']->value){
$_smarty_tpl->tpl_vars['rew']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['rew']->key;
?>
  <tr >
    <td colspan="2" valign="middle" height="10" align="left">Product <?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
    <td align="left" valign="top"><div id="reward_div" >
        <input type="hidden" id="reward<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" name="reward<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
" value="<?php echo $_smarty_tpl->tpl_vars['rew']->value['id'];?>
" />
        <ul id="reward_ul_<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
">
          <li>Product Selling Price : <?php echo $_smarty_tpl->tpl_vars['rew']->value['pledge_amount'];?>

          </li>
          <li>Description : <?php echo $_smarty_tpl->tpl_vars['rew']->value['description'];?>

          </li>
          <li>Est. delivery date : <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rew']->value['delivery_date'],'%G-%m-%e');?>

          </li>
          <li>Limiting users for product : <?php echo $_smarty_tpl->tpl_vars['rew']->value['users_limit'];?>

          </li>
        </ul>
      </div></td>
  </tr>
  <?php } ?>
  <?php }?> 
  

  
  <tr class="shade01">
    <td align="left" valign="top" colspan="3"><span class="btnlayout">
      <input type="button" class="cancel" value="Back" name="text3" onclick="return back_to_projects('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['fromPage']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['currP']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_by']->value;?>
')" />
      </span></td>
  </tr>
    
  
</table>
<?php }} ?>