<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title></title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/homepage.css"/>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000000"></a>
    		<h1 class="mui-title">新反馈</h1>
    		<a href="javascript:commentsubmit();" class="comment-submit">提交</a>
		</header>
		<div class="comment-content" style="padding-top: 45px;">
			<div class="mui-input-row" style="margin: 0 10px;">
				<textarea id="textarea-comment" rows="5" placeholder="请留下您的宝贵意见和建议,我们将努力改进"></textarea>
				<textarea id="textarea-tel" rows="1" placeholder="请留下手机号码,以便我们回复您"></textarea>
			</div>
		</div>
		
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
	<script type="text/javascript">
		mui.init()
		function commentsubmit(){
			var usercomment=document.getElementById("textarea-comment").value;
			var usertel=document.getElementById("textarea-tel").value;
			console.log(usercomment);
			console.log(usertel);
			mui.toast("成功")
		}
	</script>
</html>