
/*改变一个框宽高或者透明度*/

//从外联css中获取属性
function getStyle(obj,attr){
	if(obj.currentStyle){
		return obj.currentStyle[attr];
	}else{
		return getComputedStyle(obj,false)[attr];
	}
}
//透明度和一般属性改变
function startMove(obj,attr,iTarget,fn){
	clearInterval(obj.timer);
	obj.timer=setInterval(function(){
		var icur=0;
		
	//取出css中attr的属性值
		if(attr=="opacity"){
			icur=Math.round(parseFloat(getStyle(obj,attr))*100);
		}else{
			icur=parseInt(getStyle(obj,attr));
		}
		var speed=(iTarget-icur)/8;
		
		
	//如果为正就向上取整,负向下取整,算速度
		speed=speed>0?Math.ceil(speed):Math.floor(speed);
	
	
	
	//达到要求的属性值时操作,检测停止
		if(icur==iTarget){
			clearInterval(obj.timer);
			if(fn){
				fn();
			}
		}else{
			if(attr=="opacity"){
				obj.style.filter="alpha(opacity:"+(icur+speed)+")";
				obj.style.opacity=(icur+speed)/100;
			}else{
				obj.style[attr]=icur+speed+'px';
			}
		}
	},30);
}