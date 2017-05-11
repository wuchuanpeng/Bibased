/**
 * 弹出警告框.并消失
 */
function myAlert(str){
	$("#alert-message").html(str);
	$("#alert-div").css("display","block");
	setTimeout(function(){
		$("#alert-div").css("display","none");
	},1000);
}

/**
 *登出
 */
function logout(){
	$.ajax({
		url: 'logout.php',
		type: 'post',
		success:function(data){
			if(data==1){
				window.location.href="../index.php";
			}
		}
	});
}

function myConfirm(body,fun){
	$("#myConfirmBody").html(body);
	$("#myConfirmOk").attr("onclick",fun);
	$("#myConfirm").modal("show");
}


function isMobile(){
    var browser={    
        versions:function(){     
               var u = navigator.userAgent, app = navigator.appVersion;     
               return {//移动终端浏览器版本信息     
                    trident: u.indexOf('Trident') > -1, //IE内核    
                    presto: u.indexOf('Presto') > -1, //opera内核    
                    webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核    
                    gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核    
                    mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端    
                    ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端    
                    android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器    
                    iPhone: u.indexOf('iPhone') > -1 , //是否为iPhone或者QQHD浏览器    
                    iPad: u.indexOf('iPad') > -1, //是否iPad      
                    webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部    
                };    
             }(),    
             language:(navigator.browserLanguage || navigator.language).toLowerCase()    
        }     
        
        if(browser.versions.mobile || browser.versions.ios || browser.versions.android ||     
          browser.versions.iPhone || browser.versions.iPad){          
             return true;     
        }else{
          return false;
        }
  }