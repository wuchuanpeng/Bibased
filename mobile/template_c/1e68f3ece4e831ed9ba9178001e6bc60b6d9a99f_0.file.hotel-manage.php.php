<?php
/* Smarty version 3.1.31, created on 2017-04-28 02:56:03
  from "D:\wamp\www\Bibased\mobile\tpl\seller\hotel-manage.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5902af43a96013_94080530',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e68f3ece4e831ed9ba9178001e6bc60b6d9a99f' => 
    array (
      0 => 'D:\\wamp\\www\\Bibased\\mobile\\tpl\\seller\\hotel-manage.php',
      1 => 1493348160,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5902af43a96013_94080530 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php ';?>header("Content-type: text/html; charset=utf-8"); <?php echo '?>';?>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-commodity.css"/>
	</head>
	<body> 
		
		
		<ul class="hotel-content">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hotelRoomType']->value, 'value', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
			<li class="hotel-detail clearfloat" id="hotel-<?php echo $_smarty_tpl->tpl_vars['value']->value['T_ID'];?>
">
				<div class="detail-left">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hotelRoomImg']->value, 'Ivalue');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Ivalue']->value) {
?>
					<?php if ($_smarty_tpl->tpl_vars['value']->value['T_ID'] == $_smarty_tpl->tpl_vars['Ivalue']->value['L_SpecificID']) {?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['Ivalue']->value['L_ImgUrl'];?>
"/>
					<?php
break 1;?>
					<?php }?>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				</div>
				<ul class="detail-right">
					<li class="item1 clearfloat">
						<span class="right-item"><?php echo $_smarty_tpl->tpl_vars['value']->value['T_Name'];?>
</span>
						<span class="right-item">共<?php echo $_smarty_tpl->tpl_vars['totalRoomNum']->value[$_smarty_tpl->tpl_vars['k']->value];?>
间</span>
					</li>
					<li class="item2 clearfloat">
						<span class="right-item">¥<?php echo $_smarty_tpl->tpl_vars['value']->value['T_Price'];?>
</span>
						<span class="right-item">剩<?php echo $_smarty_tpl->tpl_vars['restRoomNum']->value[$_smarty_tpl->tpl_vars['k']->value];?>
间</span>
					</li>
				</ul>
			</li>
		<?php
}
} else {
?>

			nothing
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

		</ul>
	</body>
</html><?php }
}
