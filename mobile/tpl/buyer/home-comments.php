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
    		<a href="#" onclick="commentsubmit()" class="comment-submit">提交</a>
		</header>
		<div class="comment-content" style="padding-top: 45px;">
                <div class="mui-input-row" style="margin: 0 10px;">
                    <input name="id-type" id="id-type" value="{$idtype}" type="hidden">
                    <textarea id="textarea-comment" rows="5" placeholder="请留下您的宝贵意见和建议,我们将努力改进"></textarea>
                    <textarea id="textarea-tel" rows="1" placeholder="请留下手机号码,以便我们回复您"></textarea>
                </div>
		</div>
		
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
    <script src="buyerstyle/js/jquery.js"></script>
    <script src="buyerstyle/js/func.js"></script>
	<script type="text/javascript">
		mui.init()
		function commentsubmit(){
			var usercomment = document.getElementById("textarea-comment").value;
			var usertel = document.getElementById("textarea-tel").value;
			var idtype = $("#id-type").val();
			if(usercomment == ""){
			    mui.alert("请输入您的建议");
			    return false;
            }else if(usertel == ""){
			    mui.alert("请输入号码");
			    return false;
            }else{
                if(idtype == 1){
                    url = "admin.php?controller=userhome&method=saveUserMsg";
                }else{
                    url = "admin.php?controller=sellerhome&method=saveUserMsg";
                }
                ajaxoper(url,usercomment,usertel);
            }
		}
		function ajaxoper(url,usercomment,usertel) {
            doajax(url,{
                usercomment:usercomment,
                usertel:usertel
            },"json",function (msg) {
                if(msg){
                    mui.alert("我们已将您的建议上传,感谢您的建议");
                    document.getElementById("textarea-comment").value = "";
                    document.getElementById("textarea-tel").value = "";
                }
            });
        }
	</script>
</html>