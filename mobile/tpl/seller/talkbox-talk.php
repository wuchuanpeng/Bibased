 <?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title>聊天界面</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/seller-home.css"/>
	</head>

	<body>
	    <div class="talk-content">
	    	<!--下拉刷新容器-->
			<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
				<ul class="mui-scroll pull-content">
			    	<li class="talk-center tttt clearfloat">
			    		<div class="talk-time">
				    		<span>2017-06-22 19:23</span>
			    		</div>
			    	</li>
			    	<li class="talk-left tttt clearfloat">
			    		<div class="left-head">
			    			<img src="../img/headimg.jpeg"/>
			    		</div>
			    		<div class="talk-box">
			    			<span class="box-text">好的,我们会尽快发货,亲放心哈</span>
			    		</div>
			    	</li>
			    	<li class="talk-right tttt clearfloat">
			    		<div class="left-head">
			    			<img src="../img/headimg.jpeg"/>
			    		</div>
			    		<div class="talk-box">
			    			<span class="box-text">谢谢啦</span>
			    		</div>
			    	</li>
				</ul>
			</div>
			<div class="talk-input">
				<input type="text" name="input-content" id="input-content" value="" />
				<input type="button" id="input-button" value="发送" onclick="msgSend()" disabled="disabled" style="color: #fff;background-color: #ccc;"/>
			</div>
	    </div>
	</body>
	<script src="../js/mui.min.js"></script>
	<script type="text/javascript">
		mui.init({
		  pullRefresh : {
		    container:"#pullrefresh",//下拉刷新容器标识，querySelector能定位的css选择器均可，比如：id、.class等
		    down : {
		      height:50,//可选,默认50.触发下拉刷新拖动距离,
		      auto: false,//可选,默认false.自动下拉刷新一次
		      contentdown : "",//可选，在下拉可刷新状态时，下拉刷新控件上显示的标题内容
		      contentover : "",//可选，在释放可刷新状态时，下拉刷新控件上显示的标题内容
		      contentrefresh : "正在加载...",//可选，正在刷新状态时，下拉刷新控件上显示的标题内容
		      callback :pulldownRefresh //必选，刷新函数，根据具体业务来编写，比如通过ajax从服务器获取新数据；
		    }
		  }
		});

		
		//下拉加载具体业务实现
		function pulldownRefresh() {
		setTimeout(function() {
			var table = document.body.querySelector('.pull-content');
			var cells = document.body.querySelectorAll('.tttt');
			for (var i = cells.length, len = i + 5; i < len; i++) {
				var li = document.createElement('li');
				li.className = 'talk-right tttt clearfloat';
				li.innerHTML = '<div class="left-head">'+
					    			'<img src="../img/headimg.jpeg"/>'+
					    		'</div>'+
					    		'<div class="talk-box">'+
					    			'<span class="box-text">在不</span>'+
					    		'</div>';
				//下拉刷新，新纪录插到最前面；
				table.insertBefore(li, table.firstChild);
			}
			mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //refresh completed
		}, 1500);
	}
	</script>
	<script type="text/javascript">
		function checkEmpty(){
			if(document.getElementById("input-content").value==""){
				document.getElementById("input-button").style.backgroundColor="#ccc";
				document.getElementById("input-button").style.color="#fff";
				document.getElementById("input-button").disabled="disabled";
			}
		}
		
		document.getElementById("input-content").addEventListener("input",function(){
			document.getElementById("input-button").style.backgroundColor="#ffd565";
			document.getElementById("input-button").style.color="#000";
			document.getElementById("input-button").removeAttribute("disabled");
			checkEmpty();
		});
		function msgSend(){
			mui.toast("已发送");
			document.getElementById("input-content").value="";
			checkEmpty();
		}
	</script>
</html>