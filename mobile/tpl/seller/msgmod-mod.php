<?php header("Content-type: text/html; charset=utf-8"); ?>
<html>

	<head>
		<title>用户名和密码修改</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="buyerstyle/css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="buyerstyle/css/homepage.css"/>
	</head>

	<body>
		<div id="name-mod" style="display: none;">
			<header class="mui-bar mui-bar-nav">
				<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000000"></a>
	    		<h1 class="mui-title">修改用户名</h1>
	    		<a href="javascript:sellernewnamesub();" class="newname-submit">确定</a>
			</header>
			<div class="mod-name-content" style="padding-top: 45px;">
                <form action="admin.php?controller=sellerhome&method=save_newName" method="post" name="nameForm">
                    <div class="newname-div mui-input-row">
                        <label class="label-name">用户名:</label>
                        <input type="text" class="mui-input-clear" id="newname" name="newname" placeholder="新的用户名" value="{$sellerName}"/>
                    </div>
                    <p class="newname-prompt">以英文字母或汉字开头,限4-16个字符,1个汉字为2个字符</p>
                </form>
			</div>
		</div>
		
		<div id="pwd-mod" style="display: none;">
			<header class="mui-bar mui-bar-nav">
				<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" style="color: #000000"></a>
	    		<h1 class="mui-title">修改密码</h1>
			</header>
			<div class="mod-pwd-content" style="padding-top: 55px;">
				<div class="newpwd-div mui-input-row">
					<input type="text" class="mui-input-clear" id="oldpwd" placeholder="当前密码" value=""/>
				</div>
				<div class="newpwd-div mui-input-row">
					<input type="text" class="mui-input-clear" id="newpwd" placeholder="新密码" value=""/>
				</div>
				<div class="newpwd-div mui-input-row">
					<input type="text" class="mui-input-clear" id="newpwd-config" placeholder="确认新密码" value=""/>
				</div>
				<button type="button" id="btn-pwdconfig" class="mui-btn mui-btn-block" disabled="disabled" style="background-color: #ccc;color: #fff;">确认提交</button>
			</div>
		</div>
			
	</body>
	<script src="buyerstyle/js/mui.min.js"></script>
    <script src="buyerstyle/js/jquery.js"></script>
    <script src="buyerstyle/js/func.js"></script>
	<script type="text/javascript">
		mui.init();
//		姓名修改js
		function sellernewnamesub(){
			var newname=document.getElementById("newname").value;
			if(newname==""){
			    mui.alert("姓名不能为空");
			    return false;
            }else{
                document.nameForm.submit();
            }
		}
	</script>
	<script type="text/javascript">
//		密码修改js
		var oldpwd=document.getElementById("oldpwd");
		var newpwd=document.getElementById("newpwd");
		var newpwdconfig=document.getElementById("newpwd-config");
		var btnconfig=document.getElementById("btn-pwdconfig");
		function lightbtn(){
			if(oldpwd.value==""||newpwd.value==""||newpwdconfig.value==""){
				btnconfig.disabled="disabled";
				btnconfig.style.backgroundColor="#ccc";
				btnconfig.style.color="#fff";
			}else{
				btnconfig.removeAttribute("disabled");
				btnconfig.style.backgroundColor="#ffd565";
				btnconfig.style.color="#000";
			}
		}
		document.getElementById("oldpwd").addEventListener("input",function(){
			lightbtn();
		});
		document.getElementById("newpwd").addEventListener("input",function(){
			lightbtn();
		});
		document.getElementById("newpwd-config").addEventListener("input",function(){
			lightbtn();
		});
		
		
		btnconfig.addEventListener("tap",function(){
		    if($('#newpwd').val()==$('#newpwd-config').val()){
                doajax("admin.php?controller=sellerhome&method=save_newPassword",{
                    oldpwd:$('#oldpwd').val(),
                    newpwd:$('#newpwd').val()
                },"json",function (msg) {
                    if(msg['oldcheck']==0){
                        mui.toast('旧密码输入错误,请重新输入');
                    }else{
                        if(msg['ischecksql']==0){
                            window.location.href="admin.php?controller=sellerhome&method=location_msgMod";
                        }else{
                            mui.toast('修改成功');
                            window.location.href="admin.php";
                        }
                    }
                });
            }else{
                mui.toast("请确认密码一致");
            }
		});
	</script>
	<script type="text/javascript">
//		根据上个页面传过来的参数对修改姓名和修改密码进行区分
		function GetRequest() { 
			var url = location.search; //获取url中"?"符后的字串 
			var theRequest = new Object(); 
			if (url.indexOf("?") != -1) { 
				var str = url.substr(1); 
				strs = str.split("&"); 
				for(var i = 0; i < strs.length; i ++) { 
					theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]); 
				} 
			} 
			return theRequest; 
		} 
		var Request = new Object(); 
		Request = GetRequest(); 
		var paramflag=Request['flag'];
		if(paramflag==1){
			document.getElementById("name-mod").style.display="block";
		}if(paramflag==2){
			document.getElementById("pwd-mod").style.display="block";
		}
	</script>
</html>