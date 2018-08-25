<?php /* Smarty version Smarty-3.1.8, created on 2013-06-18 14:30:41
         compiled from "/home/fundinno/public_html/application/views/projects/order_sucess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:245268255515bb842440db5-48290870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d9c5d646479615f785ed0d28e82f2b5f510c028' => 
    array (
      0 => '/home/fundinno/public_html/application/views/projects/order_sucess.tpl',
      1 => 1371485782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245268255515bb842440db5-48290870',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_515bb842512689_67084182',
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
<?php if ($_valid && !is_callable('content_515bb842512689_67084182')) {function content_515bb842512689_67084182($_smarty_tpl) {?><section  class="filter">
<div style=" clear: both;
    display: block;
    margin-left: 0;
    padding: 23px 28px 29px;
    width: 1010px;">
<div class="signUpresponse">
								<!--<div class="" style="width:740px; height:200px;">-->
                                <?php if ($_smarty_tpl->tpl_vars['message']->value==1){?>
                                
                                <h3>Transaction completed sucessfully.</h3>
                               
									Your <?php if ($_smarty_tpl->tpl_vars['transactionId']->value!=''){?>Transaction Id is <strong><?php echo $_smarty_tpl->tpl_vars['transactionId']->value;?>
</strong> and <?php }?> Order Id is <strong><?php echo $_smarty_tpl->tpl_vars['orderid']->value;?>
</strong>.For any reference use your order id and transaction id. The project Innovator will contact you through email for your shipping address when the pre-ordered product becomes ready for shipping. In the meantime you can also update your shipping address in <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
user/edit_profile" >Edit Profile</a> page. Thanks.
                                
                               <?php }elseif($_smarty_tpl->tpl_vars['message']->value==2){?>		
							        <h3>Transaction completed sucessfully.</h3>
									<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail
								<?php }elseif($_smarty_tpl->tpl_vars['message']->value==3){?>
								     <h3>Transaction Decline.</h3>
									 <br><br>Thank you for shopping with us.However,the transaction has been declined.
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