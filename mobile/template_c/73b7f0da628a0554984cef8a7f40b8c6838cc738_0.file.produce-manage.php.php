<?php
/* Smarty version 3.1.31, created on 2017-04-28 02:56:56
  from "D:\wamp\www\Bibased\mobile\tpl\seller\produce-manage.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5902af7858dde3_19934957',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73b7f0da628a0554984cef8a7f40b8c6838cc738' => 
    array (
      0 => 'D:\\wamp\\www\\Bibased\\mobile\\tpl\\seller\\produce-manage.php',
      1 => 1493348209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5902af7858dde3_19934957 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php 
';?>header("Content-type: text/html; charset=utf-8"); <?php echo '?>';?>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-commodity.css"/>
	</head>
	<body> 
		
		<ul class="hotel-content">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['agrProduct']->value, 'value', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
			<li class="hotel-detail clearfloat" id="agrProduct-<?php echo $_smarty_tpl->tpl_vars['value']->value['P_ID'];?>
">
				<div class="detail-left">
					<img src="<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['agrProductImg']->value, 'avalue');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['avalue']->value) {
?>
							<?php if ($_smarty_tpl->tpl_vars['value']->value['P_ID'] == $_smarty_tpl->tpl_vars['avalue']->value['L_SpecificID']) {?>
								<?php echo $_smarty_tpl->tpl_vars['avalue']->value['L_ImgUrl'];?>

								<?php
break 1;?>
							<?php }?>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
"/>
				</div>
				<ul class="detail-right">
					<li class="item1 clearfloat">
						<span class="right-item"><?php echo $_smarty_tpl->tpl_vars['value']->value['P_Name'];?>
</span>
						<span class="right-item">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productKinds']->value, 'pvalue');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pvalue']->value) {
?>
							<?php if ($_smarty_tpl->tpl_vars['value']->value['P_KID'] == $_smarty_tpl->tpl_vars['pvalue']->value['K_ID']) {?>
								<?php echo $_smarty_tpl->tpl_vars['pvalue']->value['K_Name'];?>

								<?php
break 1;?>
							<?php }?>
							
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


						</span>
					</li>
					<li class="item2 clearfloat">
						<span class="right-item">¥<?php echo $_smarty_tpl->tpl_vars['value']->value['P_Price'];?>
/斤</span>
						<span class="right-item"><?php echo $_smarty_tpl->tpl_vars['value']->value['P_Remain'];?>
斤</span>
					</li>
				</ul>
			</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

		</ul>
	</body>
</html><?php }
}
