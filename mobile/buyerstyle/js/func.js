//reg.php对用户注册进行判断
function reg(){
	var bPwd=document.getElementById("bpassword").value;
	var bPwdCon=document.getElementById("bpassword_confirm").value;
	var bTel = document.getElementById("btel").value; 
	// if(!(/^1[3|5|8][0-9]\d{4,8}$/.test(bTel))){ 
	//     mui.toast("不是正确的手机号码"); 
	//     return false; 
	// }else if(bPwd==""||bPwd.substr(0,1).toLowerCase()<'a'||bPwd.substr(0,1).toLowerCase()>'z'||bPwd.length<6||bPwd.length>12){
	// 	mui.toast("密码不规范,请重新填写");
	// 	return false;
	// }else if(bPwdCon!=bPwd){
	// 	mui.toast("密码不一致,请重新填写");
	// 	return false;
	// }
	codeJudge();
}

/**  
* ajax post提交封装  
* @param url  
* @param param  
* @param datat 为html,json,text  
* @param callback回调函数  
* @return  
*/  
function doajax(url, param, datat, callback) {  
    $.ajax({  
        type: "post",  
        url: url,  
        data: param,  
        dataType: datat,  
        success: callback,  
        error: function () {  
            alert("ajax error"); 
        }  
    });  
}  

//reg.php后台判断验证码是否正确,正确就后台数据库保存,错误就刷新验证码
function codeJudge(){
	doajax("admin.php?controller=index&method=regCodeJudge",{inputcode:$("#code").val()},"json",function(msg){
		if(msg['iscode']==1){
			sqlReg();
		}else{
			mui.toast("验证码错误");
			document.getElementById("code_image").src="buyerstyle/getcode.php?code_type=3&width=100&height=35&code_num=4";
		}
	});
}

//reg.php数据库保存用户的注册信息
function sqlReg(){
	doajax("admin.php?controller=index&method=regUserSave",{inputname:$("#bname").val(),inputsex:$("#bsex").val(),inputpwd:$("#bpassword").val(),inputtel:$("#btel").val()},"json",function(msg){
		// console.log(msg);
		if(msg['isexist']==1){
			mui.toast("该号码已被注册");
		}else{
			mui.alert("注册成功");
			window.location.href="admin.php";
		}
	});
}

//login.php用户登录账号判断
function userlogin(){
	doajax("admin.php?controller=index&method=validateLogon",{account:$("#account").val(),password:$("#login_password").val()},"json",function(msg){
		if(msg['isuser']==0){
			mui.toast("没有该用户");
		}else{
			if(msg['isaccount']==1){
				mui.toast("登陆成功");
				window.location.href="admin.php?controller=usershop&method=index";
			}else{
				mui.toast("密码错误");
			}
		}
	});
	
}
function sellerlogin(){
	doajax("admin.php?controller=index&method=sellerLogin",{saccount:$("#account").val(),spassword:$("#login_password").val()},"json",function(msg){
		if(msg['isuser']==0){
			mui.toast("没有该商户");
		}else{
			if(msg['isaccount']==1){
				mui.toast("登陆成功");
				window.location.href="admin.php?controller=sellercommodity&method=index";
			}else{
				mui.toast("密码错误");
			}
		}
	});
	
}

function sqlModName(newname){
	doajax("admin.php?controller=userhome&method=save_newName",{newname:newname},"json",function(msg){
		mui.toast("修改成功");
		window.location.href="admin.php?controller=userhome&method=userMessage";
	});
}


function sqlModPwd(oldpwd,newpwd){
	doajax("admin.php?controller=userhome&method=save_newPassword",{oldpwd:oldpwd,newpwd:newpwd},"json",function(msg){
		
		if(msg['oldPsdCorrect']==0){
			mui.alert("旧密码输入不正确,请重新输入并确认");
		}else{
			mui.toast("修改成功");
			window.location.href="admin.php";
		}
	});
}

/**
 * approx distance between two points on earth ellipsoid
 * @param {Object} lat1
 * @param {Object} lng1
 * @param {Object} lat2
 * @param {Object} lng2
 */
function getFlatternDistance(lat1,lng1,lat2,lng2){

    var f = (lat1 + lat2) / 2 * Math.PI / 180.0;
    var g = (lat1 - lat2) / 2 * Math.PI / 180.0;
    var l = (lng1 - lng2) / 2 * Math.PI / 180.0;

    var sg = Math.sin(g);
    var sl = Math.sin(l);
    var sf = Math.sin(f);

    var s,c,w,r,d,h1,h2;
    var a = 6378137.0;
    var fl = 1/298.257;

    sg = sg*sg;
    sl = sl*sl;
    sf = sf*sf;

    s = sg*(1-sl) + (1-sf)*sl;
    c = (1-sg)*(1-sl) + sf*sl;

    w = Math.atan(Math.sqrt(s/c));
    r = Math.sqrt(s*c)/w;
    d = 2*w*a;
    h1 = (3*r -1)/2/c;
    h2 = (3*r +1)/2/s;

    return d*(1 + fl*(h1*sf*(1-sg) - h2*(1-sf)*sg));
}


