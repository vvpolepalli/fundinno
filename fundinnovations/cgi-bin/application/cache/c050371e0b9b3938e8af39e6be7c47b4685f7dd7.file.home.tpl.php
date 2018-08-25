<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 06:13:36
         compiled from "/home/fundinno/public_html/application/views/admin/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1037594310515a8723ae42d0-00302669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c050371e0b9b3938e8af39e6be7c47b4685f7dd7' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/home.tpl',
      1 => 1364991213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1037594310515a8723ae42d0-00302669',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515a8723beba76_91058470',
  'variables' => 
  array (
    'tot_siteusers' => 0,
    'active_siteusers' => 0,
    'users_not_logged_last_30' => 0,
    'not_verified_users' => 0,
    'inactive_users' => 0,
    'projects_cnts' => 0,
    'projects_funds' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515a8723beba76_91058470')) {function content_515a8723beba76_91058470($_smarty_tpl) {?> <ul  id="column1" class="column ui-sortable">
      <li class="widget color-light">
         
        <div class="shadow_outer">
          <div class="shadow_inner  ">
         <div class="heading_style widget-head">
              <h3 class="fixing_left">Dashboard</h3>
              <div class="clear"></div>
            </div>
           
           <table cellpadding="0" cellspacing="5" border="0" width="100%" >
           <tr valign="top">
           <td>
            <div class="sorting_table_dashboad_styles font_segoe widget-content">
             <h3 >Users</h3>
              <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="borderfi">
                <tr>
                <!--<th width="75%" align="left" valign="top" >Total registered users </th>-->
                  <td width="75%" align="left" valign="top" >Total registered users </td>
                  <td width="25%" align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['tot_siteusers']->value;?>
</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Active users </td>
                  <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['active_siteusers']->value;?>
</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Active users not logged more than 30 days.</td>
                  <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['users_not_logged_last_30']->value;?>
</td>
                </tr>
                 <tr>
                  <td align="left" valign="top">Not verified users</td>
                  <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['not_verified_users']->value;?>
</td>
                </tr>
                 <tr>
                  <td align="left" valign="top">Inactive users</td>
                  <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['inactive_users']->value;?>
</td>
                </tr>
              </table>
               <div class="clear"></div>
            </div>
            </td>
            <td>
             <div class="sorting_table_dashboad_styles font_segoe widget-content">
            <h3>Projects</h3>
              <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="borderfi">
                <tr>
               
                  <td width="75%" align="left" valign="top" >Total number of projects </td>
                  <td width="25%" align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['projects_cnts']->value['tot_projs'];?>
</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Approved projects</td>
                  <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['projects_cnts']->value['approved_projs'];?>
</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Pending for projects</td>
                  <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['projects_cnts']->value['pending_projs'];?>
</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Rejected projects</td>
                  <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['projects_cnts']->value['rejected_projs'];?>
</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Incomplete projects</td>
                  <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['projects_cnts']->value['incomplete_projs'];?>
</td>
                </tr>
              </table>
              <div class="clear"></div>
               </div>
  			</td>
           </tr> 
           <tr valign="top">
           <td> 
            <div class="sorting_table_dashboad_styles font_segoe widget-content">
            <h3>Status of projects</h3>
              <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="borderfi">
                <tr>
               
                  <td width="75%" align="left" valign="top" >Successfull projects </td>
                  <td width="25%" align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['projects_cnts']->value['success_projs'];?>
</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Unsuccessfull projects</td>
                  <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['projects_cnts']->value['failed_projs'];?>
</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Ongoing projects</td>
                  <td align="left" valign="top"><?php echo $_smarty_tpl->tpl_vars['projects_cnts']->value['ongoing_projs'];?>
</td>
                </tr>
               
              </table>
              <div class="clear"></div>
               </div>
			</td>
           <td>            
            <div class="sorting_table_dashboad_styles font_segoe widget-content">
            <h3>Funds</h3>
              <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="borderfi">
                <tr>
               
                  <td width="75%" align="left" valign="top" >Total funds collected </td>
                  <td width="25%" align="left" valign="top"><span class="WebRupee">Rs</span><span><?php if ($_smarty_tpl->tpl_vars['projects_funds']->value['total_cash']>0){?><?php echo $_smarty_tpl->tpl_vars['projects_funds']->value['total_cash'];?>
<?php }else{ ?>0<?php }?></span></td>
                </tr>
                <tr>
                  <td align="left" valign="top">Funds from successfull projects</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span><?php echo $_smarty_tpl->tpl_vars['projects_funds']->value['succes_cash'];?>
</span></td>
                </tr>
               
                <tr>
                  <td align="left" valign="top">Funds from unsuccessfull projects</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span><?php echo $_smarty_tpl->tpl_vars['projects_funds']->value['failed_cash'];?>
</span></td>
                </tr>
                  <tr>
                  <td align="left" valign="top">Funds from ongoing projects</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span><?php if ($_smarty_tpl->tpl_vars['projects_funds']->value['ongoing_cash']==''){?>0<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['projects_funds']->value['ongoing_cash'];?>
<?php }?></span></td>
                </tr>
                 <tr>
                  <td align="left" valign="top">Refunded</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span><?php echo $_smarty_tpl->tpl_vars['projects_funds']->value['refunded_cash'];?>
</span></td>
                </tr>
               <tr>
                  <td align="left" valign="top">Funds reordered</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span><?php if ($_smarty_tpl->tpl_vars['projects_funds']->value['reinvested_cash']>0){?><?php echo $_smarty_tpl->tpl_vars['projects_funds']->value['reinvested_cash'];?>
<?php }else{ ?>0<?php }?></span></td>
                </tr>
                 <tr>
                  <td align="left" valign="top">Funds withdrawn</td>
                  <td align="left" valign="top"><span class="WebRupee">Rs</span><span><?php echo -1*$_smarty_tpl->tpl_vars['projects_funds']->value['withdrawn_cash'];?>
</span></td>
                </tr>
              </table>
              <div class="clear"></div>
               </div>
           </td>
          </tr>     
		</table>	
          </div>
          <!--  End:Border3  using for shadow effect-->
        </div>
        <!--End:Border_2  using for shadow effect-->
 
     
      <!--End:Right Block-->
      <div class="clear"></div>
      
      <!--End:Left Block-->
      <div class="rightblock01">
        
      <!--End:Border_2  using for shadow effect--> 
      </div>
      <!--End:Right Block-->
      <div class="clear"></div>
<?php }} ?>