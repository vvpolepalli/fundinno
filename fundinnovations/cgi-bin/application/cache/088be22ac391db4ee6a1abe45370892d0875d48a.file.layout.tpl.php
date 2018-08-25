<?php /* Smarty version Smarty-3.1.8, created on 2013-01-21 17:09:49
         compiled from "/var/www/fundinnovations/application/views/admin/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1166227440507654c061d9e2-00596901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '088be22ac391db4ee6a1abe45370892d0875d48a' => 
    array (
      0 => '/var/www/fundinnovations/application/views/admin/layout.tpl',
      1 => 1358768376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1166227440507654c061d9e2-00596901',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_507654c06fe441_37822519',
  'variables' => 
  array (
    'baseurl' => 0,
    'header' => 0,
    'middlecontent' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507654c06fe441_37822519')) {function content_507654c06fe441_37822519($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin : Settings</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/main.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/listing.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/inettuts.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/new_updates.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/jquery.js"></script> 


<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/ddsmoothmenu.js"></script> 
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/menu.plugin.js"></script> 
<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/common_admin.js"></script>-->
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/jquery.pagination.js"></script>


<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/siteuser.js"></script>-->
<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/user_reqst.js"></script> -->
<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/common.js"></script> 
-->
<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
js/admin/member.js"></script> 
-->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/admin/pagination.css"/>	
</head>


<body>
<div class="outer_container">
 <div class="header_container"><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
 <!--End:Header Container--> <!--***********************************************************************END HEADER CONTAINER******************************************************-->
 <div class="content_container">
    <div class="dashboard" id="columns">
    <!--End:Left Block-->   
    <div class="rightblock01" style=" width: 82%;"><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['middlecontent']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>      
    <!--End:Dash Boaddiv--> 
  </div>
 </div>
  <!--End:Content Container--> 
  
</div>
<!--End:Outer Container--> 

  
<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
      DD_belatedPNG.fix('img,div,ul,li,li a,a,input,p,blockquote,span,h1,h2,h3,.last-child');
</script>
<![endif]-->
<!--[if IE]>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/adminadmin/admin/iefix.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]--><!--[if IE]>
<link href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
styles/adminadmin/admin/iefix.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
</body>
</html>


  
<?php }} ?>