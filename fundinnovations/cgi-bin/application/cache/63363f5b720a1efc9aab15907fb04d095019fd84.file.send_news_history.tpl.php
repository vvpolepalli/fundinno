<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 04:58:36
         compiled from "/home/fundinno/public_html/application/views/admin/newsletter/send_news_history.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206999271515c0b5c196da5-40815411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63363f5b720a1efc9aab15907fb04d095019fd84' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/newsletter/send_news_history.tpl',
      1 => 1351599651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206999271515c0b5c196da5-40815411',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'history_dtls' => 0,
    'baseurl' => 0,
    'currP' => 0,
    'order_by' => 0,
    'news_sent_count' => 0,
    'news_sentdt' => 0,
    'i' => 0,
    'newsSent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c0b5c2c9931_83858924',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c0b5c2c9931_83858924')) {function content_515c0b5c2c9931_83858924($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?><div><h2 style="margin-left:5px; width:855px; line-height: 30px;">Sent History of <?php echo $_smarty_tpl->tpl_vars['history_dtls']->value[0]->news_title;?>
</h2>
                        
<span style="width:37px; padding-bottom:10px; float:right; background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><a href="javascript:void(0);" onClick="back_to_newsletter('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['currP']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_by']->value;?>
')">Back</a></span>
<div class="clear"></div></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
             <?php if ($_smarty_tpl->tpl_vars['news_sent_count']->value<1){?>
        <tr >
          <td colspan="4" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Records Found</td>
        </tr>
        <?php }else{ ?>                
            <thead>
            
              <tr>               
                <th width="51" valign="middle" align="left">No</th>
                <th width="663" valign="middle" align="left">Sent To  </th>
                <th width="166" valign="middle" align="center">Send Date</th>               
                <th width="128" align="center" valign="middle">Option</th>
			  </tr>
              </thead>
              <tbody>
              <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("1", null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['newsSent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsSent']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['news_sentdt']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsSent']->key => $_smarty_tpl->tpl_vars['newsSent']->value){
$_smarty_tpl->tpl_vars['newsSent']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['newsSent']->key;
?>
                <tr <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>class="shade01"<?php }?>>         
                        <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['newsSent']->value->sent_to;?>
</td>
                        <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['newsSent']->value->send_date);?>
</td>                        
                        <td align="center"><a onclick="return confirm('Are You Sure You Want to Delete?')" href="javascript:delete_newsletter_history('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/Cms/delete_newsletter_history/<?php echo $_smarty_tpl->tpl_vars['newsSent']->value->id;?>
')"><img width="20" height="20" title="Delete" alt="Delete" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/remove-icon.gif"></a></td>
                      </tr>
                <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
        		<?php } ?>  
              </tbody>
              <?php }?>
              </table>
               <input type="hidden" name="hid_newsid" id="hid_newsid" value="<?php echo $_smarty_tpl->tpl_vars['history_dtls']->value[0]->news_id;?>
">
               <input type="hidden" name="hid_page" id="hid_page" value="<?php echo $_smarty_tpl->tpl_vars['currP']->value;?>
">
               <input type="hidden" name="hid_order" id="hid_order" value="<?php echo $_smarty_tpl->tpl_vars['order_by']->value;?>
"><?php }} ?>