function getRequest() {   
   var url = window.location.search; //获取url中"?"符后的字串   
   var theRequest = new Object();   
   if (url.indexOf("?") != -1) {   
      var str = url.substr(1);   
      strs = str.split("&");   
      for(var i = 0; i < strs.length; i ++) {   
         theRequest[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]); 
      }   
   }   
   return theRequest;   
}
function getAddrData(){
	var Request = new Object(); 
	Request = getRequest(); 
	var addrMsg=new Array(); //具体地址,坐标,地址,城市
	addrMsg[0] = Request['addr']; 
	addrMsg[1] = Request['city'];
	addrMsg[2] = Request['name']; 
	addrMsg[3] = Request['latng']; 
	return addrMsg;
}

function getNowType(){
   var Request = new Object(); 
   Request = getRequest(); 
   var nowType=Request['nowtype'];
   return nowType;
}