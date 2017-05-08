<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>店铺设置</title>
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/scss/seller-home.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>
	        <h1 class="mui-title" style="color: #fff;">店铺设置</h1>
            <a href="javascript:shopNameMod();" class="newset-submit">确定</a>
        </header>
        <div class="mui-content">
            <form method = "post" name="shopNameForm" action = "admin.php?controller=sellerhome&method=save_NewShopName">
                <ul class = "mui-table-view" style = "margin-top: 0;">
                    <li class = "mui-table-view-cell set-info">
                        <p class = "set-name">店铺名称</p>
                        <input type = "text" name = "shopname-new" id = "shopname-new" placeholder = "{$shopnameOld}" value="{$shopnameOld}" />
                    </li>
                </ul>
            </form>
		</div>
	</body>
	<script src="buyerstyle/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
        function shopNameMod() {
            if(document.getElementById('shopname-new').value==""){
                mui.alert("名称不能为空");
                return false;
            }else if(document.getElementById('shopname-new').value=="{$shopnameOld}"){
                mui.alert("名称重复");
                return false;
            }else{
                document.shopNameForm.submit();
            }

        }
	</script>
</html>