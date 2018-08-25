<?php /* Smarty version Smarty-3.1.8, created on 2013-02-12 16:15:30
         compiled from "/var/www/fundinnovations/application/views/projects/order_sucess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13792090995100dfe2403659-05923746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a60ef8f04a1b7fe92d64c1a21f6749e6052f67e0' => 
    array (
      0 => '/var/www/fundinnovations/application/views/projects/order_sucess.tpl',
      1 => 1360665549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13792090995100dfe2403659-05923746',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5100dfe2464989_91224224',
  'variables' => 
  array (
    'message' => 0,
    'transactionId' => 0,
    'orderid' => 0,
    'baseurl' => 0,
    'orderstatus' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5100dfe2464989_91224224')) {function content_5100dfe2464989_91224224($_smarty_tpl) {?><section  class="filter">
<div style=" clear: both;
    display: block;
    margin-left: 0;
    padding: 23px 28px 29px;
    width: 1010px;">
<div class="signUpresponse">
								<!--<div class="" style="width:740px; height:200px;">-->
                                <?php if ($_smarty_tpl->tpl_vars['message']->value==''){?>
                                
                                <h3>Transaction completed sucessfully.</h3>
                               
									Your <?php if ($_smarty_tpl->tpl_vars['transactionId']->value!=''){?>Transaction Id is <strong><?php echo $_smarty_tpl->tpl_vars['transactionId']->value;?>
</strong> and <?php }?> Order Id is <strong><?php echo $_smarty_tpl->tpl_vars['orderid']->value;?>
</strong>.For any reference use your order id and transaction id. The project Innovator will contact you through email for your shipping address when the pre-ordered product becomes ready for shipping. In the meantime you can also update your shipping address in <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/edit_profile" >Edit Profile</a> page. Thanks.
                                    
                                   <?php }else{ ?>
                                   <!-- <h3><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h3>-->
                                    <?php if ($_smarty_tpl->tpl_vars['orderstatus']->value=='invalid'){?>
                                   An error occurred while processing your payment. Please try again later or contact admin. 
                                    <?php }elseif($_smarty_tpl->tpl_vars['orderstatus']->value=='success'){?>
                                    You are successfully supported this project.The project Innovator will contact you through email for your shipping address when the pre-ordered product becomes ready for shipping. In the meantime you can also update your shipping address in <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/edit_profile" >Edit Profile</a> page. Thanks.
                                    <?php }else{ ?>
                                    
                                    <script type="text/javascript">
									window.location.href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
";
									</script>
                                   
                                    <?php }?>
                                     <?php }?>
                                  
								</div>
								<div class="clear"></div>
    </div>
    
</section><?php }} ?>