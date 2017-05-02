<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<title>营业额</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-home.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body>
        <header class="mui-bar mui-bar-nav" style="background-color: rgba(255,255,255,0.9);text-align: center;">
            <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" id="backpage" style="color: #000000"></a>
            <h1 class="mui-title">我的账户</h1>
        </header>
        <div style="padding-top: 44px;">
            <div class="myAccount-profit">
                <span class="profit-left">我的营业额</span>
                <span class="profit-right"><span id="right-money">0.00</span>元</span>
            </div>
            <!--余额为零,那么提现按钮不可用-->
            <div class="func-btn">
                <a class="deposit-record" href="">记录</a>
                <button id="btn-deposit" type="button">提现</button>
            </div>
        </div>

	</body>
	<script src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		mui.init();
	</script>	
</html>