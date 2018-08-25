<?php /* Smarty version Smarty-3.1.8, created on 2013-03-15 17:47:08
         compiled from "/var/www/fundinnovations/application/views/admin/category/manage_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1330502865090e37ac7f6c8-22268720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0451ef3d36b90ccc1819d2722fcb9feac95052a0' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/category/manage_category.tpl',
      1 => 1363327294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1330502865090e37ac7f6c8-22268720',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5090e37ad30679_27734278',
  'variables' => 
  array (
    'baseurl' => 0,
    'updated_msg' => 0,
    'hidcurrP' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5090e37ad30679_27734278')) {function content_5090e37ad30679_27734278($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/category.js"></script>
 
<script type="text/javascript">
$(document).ready(function(){
	  var baseurl = '<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
';
	  categorylist(baseurl);
	  
	  
});

</script> 

<div class="shadow_outer" id="manage_siteusers">
  <div class="shadow_inner" >
    <h2 style="margin-left:5px;" id="manage_head">Manage category</h2>
    <div class="table_listing font_segoe" id="search_users">
      <form method="post" name="search" id="search" onsubmit="return false;" >
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
              <th colspan="2" align="left">Search Category</th>
              <th align="right"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
admin/category/add_new_category">Add new category</a></th>
            </tr>
            <tr>
              <td align="left" valign="top" colspan="3"><div id="display"><?php if ($_smarty_tpl->tpl_vars['updated_msg']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['updated_msg']->value;?>
<?php }?></div></td>
            </tr>
            <tr class="shade01">
              <td width="" valign="middle" align="right"  >Category Name</td>
              <td width="250" valign="middle" align="left"  ><div  style="position:relative">
                  <input type="text" name="category" id="category" class="textbox" style="width:280px;" />
                </div></td>
              <td width="" valign="middle" align="left" ><span class="btnlayout">
                <input type="button" value="Search" class="button" name="search_user" id="search_user" onclick="return search_category('<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
');"/>
                </span></td>
            </tr>
            <tr>
              <td colspan="3" align="left" valign="top" height="8"></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div class="table_listing font_segoe" id="load_categorylist"> </div>
  </div>
  <!--End:Border 3-->
  <div id="Pagination" style="width:100%;float:left;top:2px;"></div>
</div>
<input type="hidden" name="hid_currP" id="hid_currP" value="<?php echo $_smarty_tpl->tpl_vars['hidcurrP']->value;?>
" />
<input type="hidden" name="hid_category" id="hid_category" value="" />
<input type="hidden" name="hid_orderBy" id="hid_orderBy" value="" />
<input type="hidden" name="hid_search" id="hid_search" value="" /><?php }} ?>