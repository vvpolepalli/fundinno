<?php /* Smarty version Smarty-3.1.8, created on 2013-07-08 01:30:24
         compiled from "/home/fundinno/public_html/application/views/admin/newsletter/view_news_letter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1276434549515c0babf279a2-85942011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c65b42cc4ec7a2186d7fcea6a78b30e54aec0791' => 
    array (
      0 => '/home/fundinno/public_html/application/views/admin/newsletter/view_news_letter.tpl',
      1 => 1373267869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1276434549515c0babf279a2-85942011',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515c0bac0876b9_64078502',
  'variables' => 
  array (
    'baseurl' => 0,
    'currP' => 0,
    'order_by' => 0,
    'newsdt' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_515c0bac0876b9_64078502')) {function content_515c0bac0876b9_64078502($_smarty_tpl) {?><div style="margin:0 auto;width:580px">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="background-color:#fff;border:0 !important">
  <tbody>
    <tr>
      <td valign="top" align="right" style="background-color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; padding:0;border:0 !important;"><a href="javascript:void(0);" onClick="back_to_newsletter('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['currP']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['order_by']->value;?>
')">Back</a></td>
    </tr>
    <tr>
      <td valign="top" align="left" style="background-color:#fff; padding:0"><img width="100%"  border="0" usemap="#Map" alt="top" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/top.gif"></td>
    </tr>
    <tr>
        <td valign="top" align="left" style="padding:0px 23px 10px 23px; border-left:1px solid #d1d1d1; border-right:1px solid #c8c8c8 ;"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="border:0 !important;">
          <tbody>
            <tr>
              <td valign="top" align="left" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#7a7a7a; padding:0 10px 20px 10px; line-height:25px;border:0 !important;"><p style="font-family:Verdana, Geneva, sans-serif; font-size:16px; color:#2E7CBE; border-bottom:dotted #bcbcbc 1px; font-weight:bold;"><span style="color:#7a7a7a"><?php echo $_smarty_tpl->tpl_vars['newsdt']->value[0]->news_title;?>
</span></p>
                <p align="justify"><?php echo stripslashes($_smarty_tpl->tpl_vars['newsdt']->value[0]->news_content);?>
</p>
                <p style="font-family:Tahoma, arial, verdana; font-size:11px;">Thanks,<br>
                  <strong>Fundinnovation team</strong></p></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td valign="bottom" height="10px" bgcolor="#FFFFFF" align="center" style="color:#fff; font-size:10px; font-family:Tahoma, arial, verdana; padding:0 "><img width="100%" height="39" alt="bottom" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
images/bottom.gif"></td>
    </tr>
  </tbody>
</table>
<map name="Map" id="Map">
			  <area shape="rect" coords="16,10,219,50" href="#" />
			</map>
            </div><?php }} ?>