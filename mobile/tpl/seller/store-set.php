<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>店铺设置</title>
		<link href="../css/mui.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="css/seller-order.css"/>
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav" style="background: #535355;">
	   		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #ffffff"></a>
	        <h1 class="mui-title" style="color: #fff;">店铺设置</h1>
	 	 </header> 
	 	 <div class="mui-content">
	 	 	<ul class="mui-table-view"style="margin-top: 0;">
			    <li class="mui-table-view-cell set-info">
			    	<p class="set-name">店铺名称</p>
			    	<input type="text" name="" id="" placeholder="请输入要修改的店铺名称"value="" />
			    </li>
				    <li class="mui-table-view-cell set-info clearfloat">
				    	<a class="mui-navigate-right"href="#sheet1">
				        	<p class="business">是否营业</p>
				        	<p class="business-txt"id="business-txt">是</p>
				        </a>
				    	
				    </li>
			    </a>
			</ul>
	 	 </div>
	 	 
	 	 <div id="sheet1" class="mui-popover mui-popover-bottom mui-popover-action ">
		    <!-- 可选择菜单 -->
		    <ul class="mui-table-view">
		      <li class="mui-table-view-cell business-content">
		        <a href="#">是</a>
		      </li>
		      <li class="mui-table-view-cell business-content">
		        <a href="#">否</a>
		      </li>
		    </ul>
		    <!-- 取消菜单 -->
		    <ul class="mui-table-view">
		      <li class="mui-table-view-cell">
		        <a href="#sheet1"><b>取消</b></a>
		      </li>
		    </ul>
		</div>
	</body>
	<script src="../js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var buscon=document.getElementsByClassName('business-content');
		var bustxt=document.getElementById('business-txt');
		for(var i=0;i<buscon.length;i++){
			buscon[i].addEventListener('tap',function(){
				bustxt.innerText=this.children[0].innerText;
				mui('#sheet1').popover('hide');
			});
		}
	</script>
</html>