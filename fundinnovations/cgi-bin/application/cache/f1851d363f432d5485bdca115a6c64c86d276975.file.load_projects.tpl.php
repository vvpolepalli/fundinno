<?php /* Smarty version Smarty-3.1.8, created on 2013-02-15 11:20:51
         compiled from "/var/www/fundinnovations/application/views/profile/load_projects.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210002242150f0fdd911e515-74033576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1851d363f432d5485bdca115a6c64c86d276975' => 
    array (
      0 => '/var/www/fundinnovations/application/views/profile/load_projects.tpl',
      1 => 1360907374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210002242150f0fdd911e515-74033576',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50f0fdd916f436_24063889',
  'variables' => 
  array (
    'startp' => 0,
    'project_list_cnt' => 0,
    'project_list' => 0,
    'page_type' => 0,
    'pr' => 0,
    'baseurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f0fdd916f436_24063889')) {function content_50f0fdd916f436_24063889($_smarty_tpl) {?><div  style="margin:0;">
    
    <input type="hidden" name="hid_startp" id="hid_startp" value="<?php echo $_smarty_tpl->tpl_vars['startp']->value;?>
" />
    <input type="hidden" name="hid_projects_list_cnt" id="hid_projects_list_cnt" value="<?php echo $_smarty_tpl->tpl_vars['project_list_cnt']->value;?>
" />
    <table class="tabStylee" style="border-collapse: inherit;border-spacing: 0;" cellspacing="0" width="100%" align="center" >
 <tr> <th align="left">Project Title</th><th align="left"> Amount</th></tr>
       <?php  $_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['project_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->key => $_smarty_tpl->tpl_vars['pr']->value){
$_smarty_tpl->tpl_vars['pr']->_loop = true;
?>
      <tr>
      <td  align="left" valign="top"><a  <?php if ($_smarty_tpl->tpl_vars['page_type']->value=='referral'){?> href='javascript:void(0);'  onclick="load_referral_users_pop(<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
)" <?php }else{ ?> href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
archive_projects/project_details/<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
"  <?php }?> style="color:hsl(210, 46%, 46%)"><?php echo $_smarty_tpl->tpl_vars['pr']->value['project_title'];?>
 </a>  </td>
      <td align="left" valign="top"> <?php echo $_smarty_tpl->tpl_vars['pr']->value['tot_amnt'];?>
</td>
      </tr>
      <?php } ?>
      </table>
</div>

<div id="referral_users" class="popFixed" style="display:none">
<div class="popabs">
  <div id="inlineContent2" class="white_content">
    <div class="white_contentInner"> <a class="closeBtn" href = "javascript:void(0)" onclick ="close_pop('referral_users')">Close</a>
       <div class="popTitle">
        <h4 id="hd">Referral users</h4></div>
        <div id="referral_users_cntnt"></div>
      
    </div>
    <div class="clear"></div>
  </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
function load_referral_users_pop(proj_id){
	$('#referral_users').show();openpPopup();
	$.ajax({
		type:'POST',
		data:'proj_id='+proj_id,
		url :baseurl+'user/load_referral_users_page',
		success:function(msg){
			$('#referral_users_cntnt').html(msg);
			}
		});
	}
</script>
<?php }} ?>