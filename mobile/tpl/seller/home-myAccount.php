<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<title>营业额</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/seller-home.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
	</head>
	<body>  
		<div class="myAccount-profit">
			<span class="profit-left">我的营业额</span>
			<span class="profit-right"><span id="right-money">0.00</span>元</span>
		</div>
		<!--余额为零,那么提现按钮不可用-->
		<div class="func-btn">
			<a class="deposit-record" href="">记录</a>
			<button id="btn-deposit" type="button">提现</button>
		</div>
	</body>
	<script src="../js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		mui.init();
	</script>	
</html>