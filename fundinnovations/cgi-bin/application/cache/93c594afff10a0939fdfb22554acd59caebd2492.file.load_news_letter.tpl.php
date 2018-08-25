<?php /* Smarty version Smarty-3.1.8, created on 2013-04-03 04:58:32
         compiled from "/home/fundinno/public_html/application/views/admin/newsletter/load_news_letter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:614349883515c0b58af77f5-50637845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93c594afff10a0939fdfb22554acd59caebd2492' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/newsletter/load_news_letter.tpl',
      1 => 1359972229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '614349883515c0b58af77f5-50637845',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'newsletter_count' => 0,
    'baseurl' => 0,
    'orderBy' => 0,
    'newsletter' => 0,
    'i' => 0,
    'pstart' => 0,
    'newsLetter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c0b58c80a40_11380275',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c0b58c80a40_11380275')) {function content_515c0b58c80a40_11380275($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/fundinno/public_html/application/libraries/Smarty/libs/plugins/modifier.date_format.php';
?><table width="100%" cellspacing="0" cellpadding="0" border="0">
         <?php if ($_smarty_tpl->tpl_vars['newsletter_count']->value<1){?>
        <tr >
          <td colspan="4" align="center" valign="middle" class="checkbox_column" style="font-family:Verdana, Geneva, sans-serif;font-size:14px;color:#F00;">No Records Found..</td>
        </tr>
        <?php }else{ ?>                       
            <thead>
            
              <tr>               
                <th width="51" align="left" valign="middle">No</th>
                <th width="588" align="left" valign="middle"><a href="javascript:void(0)" onclick="sort_newsletter('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
', '<?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_TITLE'){?><?php echo 'ASC_TITLE';?>
<?php }else{ ?><?php echo 'DESC_TITLE';?>
<?php }?>');" >News Letter Title <?php if ($_smarty_tpl->tpl_vars['orderBy']->value=='DESC_TITLE'){?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/desc.gif" alt='Descending order' title="Sort the result By Title" /><?php }else{ ?><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/input_bg/asc.gif" alt='Ascending order' title="Sort the result By Title" /><?php }?></a> </th>
                <th width="101" align="center" valign="middle">Send History</th>       
                <th width="102" align="center" valign="middle">Date</th>                
                <th align="right" width="80" valign="middle">Option</th>
			  </tr>
              </thead>
              <tbody>
              
                <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable("1", null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['newsLetter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsLetter']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['newsletter']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsLetter']->key => $_smarty_tpl->tpl_vars['newsLetter']->value){
$_smarty_tpl->tpl_vars['newsLetter']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['newsLetter']->key;
?>
                <tr <?php if ($_smarty_tpl->tpl_vars['i']->value%2==0){?>class="shade01"<?php }?>>                     
                        <td width="4%"><?php echo $_smarty_tpl->tpl_vars['pstart']->value+$_smarty_tpl->tpl_vars['i']->value;?>
</td>
                        <td width="44%"><?php echo $_smarty_tpl->tpl_vars['newsLetter']->value->news_title;?>
</td>
                        <td width="12%" align="center"><a href="javascript:view_sent_history('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/Cms/sent_newsletter_history/<?php echo $_smarty_tpl->tpl_vars['newsLetter']->value->news_id;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/tablelisting/sent_history.gif" width='23' height='27' alt='View Hystory' title="View Hystory" /></a></td>                        
                        <td width="25%" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['newsLetter']->value->news_added);?>
</td>
                        <td width="15%" align="right">
                        <a href="javascript:view_newsletter('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/Cms/view_newsletter/<?php echo $_smarty_tpl->tpl_vars['newsLetter']->value->news_id;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/tablelisting/view.png" width='15' height='16' alt='View' title="View" /></a>                       
                        <a href="javascript:update_newsletter('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/Cms/update_newsletter/<?php echo $_smarty_tpl->tpl_vars['newsLetter']->value->news_id;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
/images/admin/tablelisting/edit_icon.gif" width='15' height='16' alt='Edit' title="Edit" /></a>
                        <a href="javascript:delete_newsletter('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','admin/Cms/delete_newsletter/<?php echo $_smarty_tpl->tpl_vars['newsLetter']->value->news_id;?>
')" onclick="return confirm('Are You Sure You Want to Delete?')"><img src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/admin/tablelisting/remove-icon.gif" alt="Delete" title="Delete" height="20" width="20" /></a>
                        </td>
                      </tr>
                 <?php $_smarty_tpl->tpl_vars["i"] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
        		<?php } ?>    
              </tbody>
              <?php }?>
             </table><?php }} ?>