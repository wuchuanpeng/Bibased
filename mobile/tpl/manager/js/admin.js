
function opFormat(value, row) {

	var str='<a  style="text-decoration:none;" href="#" onclick="showModal(this';
	for(var i in row){
		str+=",'";
		eval("str+=row."+i+";");
		str+="'";
	}
	str+=')">修改</a>';
    return str;
}
function messageFormat(value, row) {

	var str='<a  style="text-decoration:none;" href="javascript:;"  onclick="toDeleteMessage('+row.M_ID+')">删除</a>';

    return str;
}

function showModal(obj,id,shopname,shopaddr,shopowner,shoptel,sdesc,spassword,uid){
	$("#myModalLabel").html(shopname);

	$("#sid").val(id);
    $("#uid").val(uid);
	$("#sname").val(shopname);
	$("#shop-addr").val(shopaddr);
	$("#person-name").val(shopowner);
	$("#person-tel").val(shoptel);
	$("#user-pwd").val(spassword);
	$("#desc").val(sdesc);

	$("#myModal").modal('show');

}

function submit(){
	$("#admin_alert_msg").text("");
    var sid = $("#sid").val();
    var uid = $("#uid").val();
    var shopName = $("#sname").val();
    var shopAddr = $("#shop-addr").val();
    var shopOwner = $("#person-name").val();
    var shopTel = $("#person-tel").val();
    var sPwd = $("#user-pwd").val();
    var sDesc = $("#desc").val();
    if(shopName == ''){
        $("#admin_alert_msg").text("店铺名称不能为空");
        return false;
	}else if(shopAddr == ""){
        $("#admin_alert_msg").text("店铺地址不能为空");
        return false;
	}else if(shopOwner == ""){
        $("#admin_alert_msg").text("店主不能为空");
        return false;
    }else if(shopTel == ""){
        $("#admin_alert_msg").text("联系电话不能为空");
        return false;
    }else if(sPwd == ""){
        $("#admin_alert_msg").text("登录密码不能为空");
        return false;
    }else{
        $.ajax({
            url:"manager.php?controller=root&method=saveUpdateSeller",
            type:"post",
            data:{
                S_ID:sid,
                S_ShopName:shopName,
                S_Address:shopAddr,
                S_Name:shopOwner,
                S_Tel:shopTel,
                S_Desc:sDesc,
                password:sPwd,
                uid:uid
            },
            success:function(data){
                if(data==1){
                    //$("#myModal").modal('hide');
                    $("#admin_alert_msg").text("修改成功");
                    refresh();
                }else{
                    $("#myModal").modal('hide');
                    myAlert("提交失败");
                }
            },
            error:function(){
                console.log("ajax错误");
            }
        });
	}

}


function toDelete(){
	$("#myModal").modal('hide');
	myConfirm("删除后不能撤回,确定删除吗?","deletea()");
}

function deletea(){
	$.ajax({
		url:"manager.php?controller=root&method=deleteSeller",
		type:"post",
		data:{
			uid:$("#uid").val(),
			sid:$("#sid").val()
		},
		success:function(data){
			if(data==1){
				$("#myConfirm").modal('hide');
				myAlert("删除成功");
				refresh();
			}else{
				$("#myConfirm").modal('hide');
				myAlert("删除失败");
			}
		},
		error:function(){
			console.log("ajax错误啊");
		}
	});
}

function refresh(){
	$("#systemLogTable").bootstrapTable("refresh");
}

/*************user js*************/
// function userFormat(value,row){
// 	//console.log(row);
// 	var update='<a  style="text-decoration:none;" href="#" onclick="toUserUpdate(this';
// 	for(var i in row){
// 		update+=",'";
// 		//console.log(i);
// 		eval("update+=row."+i+";");
// 		update+="'";
// 	}
// 	update+=')">查看</a>&nbsp;';
// 	var del='<a  style="text-decoration:none;" href="#" onclick="toUserDelete('+row.U_ID+')">删除</a>';
//     return update+del;
// }

function phoneFormat(value,row){
	var str="<a href='tel:"+row.U_Phone+"'>"+row.U_Phone+"</a>";
	return str;
}

// 添加商家
function toUserInsert(){
	cleanInput();
	$("#myModal2Label").html("添加用户");
	$("#myModal2").modal('show');
	$("#add-seller").attr("onclick","userInsert()");
}
//数据判断
function checkInput(){
	var shopName=$("#shopName").val();
	var shopAddress=$("#shopAddress").val();
	var shopOwner=$("#shopOwner").val();
	var shopTel=$("#shopTel").val();
	var userPwd=$("#userPwd").val();
	var userPwdCon=$("#userPwdCon").val();

	if($.trim(shopName)==""){
		$("#myModal2Message").html("*店铺名称不能为空*");
		return false;
	}

	if($.trim(shopAddress)==""){
		$("#myModal2Message").html("*店铺地址不能为空*");
		return false;
	}
	
	if($.trim(shopOwner)==""){
		$("#myModal2Message").html("*店主不能为空*");
		return false;
	}
	if($.trim(shopTel)==""){
		$("#myModal2Message").html("*手机不能为空*");
		return false;
	}

	if($.trim(userPwd)==""||$.trim(userPwdCon)==""||$.trim(userPwd) != $.trim(userPwdCon)){
		$("#myModal2Message").html("*请正确输入密码及确认密码*");
		return false;
	}
	return true;
}

function userInsert(){
    var shopAddress=$("#shopAddress").val();
	if(!checkInput()){
		return false;
	}
	getLatlng(shopAddress);

}
function userInsertSave(latlng) {
    var shopName=$("#shopName").val();
    var shopAddress=$("#shopAddress").val();
    var shopOwner=$("#shopOwner").val();
    var shopTel=$("#shopTel").val();
    var userPwd=$("#userPwd").val();
    $.ajax({
        url:"manager.php?controller=root&method=saveNewSeller",
        type:"post",
        data:{
            shopName:shopName,
            shopAddress:shopAddress,
            shopOwner:shopOwner,
            shopTel:shopTel,
            userPwd:userPwd,
            latlng:latlng,
            desc:$("#desc").val()
        },
        success:function(data){
            if(data==1){
                $("#myModal2").modal('hide');
                myAlert("添加成功");
                cleanInput();
                refresh();
            }else{
                $("#myModal2").modal('hide');
                myAlert("添加失败");
            }
        },
        error:function(){
            console.log("insertUser Ajax 错误");
        }
    });
}
function cleanInput(){
	$("#myModal2Message").html("");
	$("#shopName").val("");
	$("#shopAddress").val("");
	$("#shopOwner").val("");
	$("#shopTel").val("");
	$("#userPwd").val("");
	$("#desc").val("");
}


function userRefresh(){
	$("#userTable").bootstrapTable("refresh");
}


function toUserDelete(uid){
	myConfirm("删除后不能撤回,确定删除吗?","userDeletea("+uid+")");
}

function userDeletea(uid){
	$.ajax({
		url:"userajax.php",
		type:"post",
		data:{
			U_Status:"-1",
			U_ID:uid,
			flag:2
		},
		success:function(data){
			console.log(data);
			if(data==1){
				$("#myConfirm").modal('hide');
				myAlert("删除成功");
				userRefresh();
			}else{
				$("#myConfirm").modal('hide');
				myAlert("删除失败");
			}
		},
		error:function(){
			console.log("ajax错误啊");
		}
	});
}

function toDeleteMessage(mid){
	myConfirm("删除后不能撤回,确定删除吗?","deleteMessage("+mid+")");
}
function deleteMessage(mid){
	console.info(mid);
	$.ajax({
		url:"messageajax.php",
		type:"post",
		data:{
			M_Status:"-1",
			M_ID:mid,
			flag:1
		},
		success:function(data){
			if(data==1){
				$("#myConfirm").modal('hide');
				myAlert("删除成功");
				$("#messageTable").bootstrapTable("refresh");
			}else{
				$("#myConfirm").modal('hide');
				myAlert("删除失败");
			}
		},
		error:function(){
			console.log("ajax错误啊");
		}
	});
}

function readMessage(){
	$.ajax({
		url:"messageajax.php",
		type:"post",
		data:{
			flag:2
		},
		success:function(data){
			$("#countMessage").text("0");
		},
		error:function(){
			console.log("ajax错误啊");
		}
	});
}

function getLatlng(address) {
    address=encodeURI(address);
    var latlng = "";
    $.ajax({
        url:"http://apis.map.qq.com/ws/geocoder/v1/?address="+address+"&key=2LHBZ-GGK3F-XLRJH-JZ6JT-LSEDK-Q3BOY&output=jsonp",
        type:"GET",
        dataType:"JSONP",
        success:function(data){
            if(data.status!=0){
                console.info(data.message);
                latlng = "";
            }else {
            	latlng=data.result.location.lat+","+data.result.location.lng;
			}
            userInsertSave(latlng);
        },
        error:function () {
			console.error("获取坐标ajax错误");
			latlng = "";
        }

    });
}