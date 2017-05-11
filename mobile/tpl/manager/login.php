<!DOCTYPE html>
<html class="ui-page-login">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>登录</title>
    <link href="tpl/manager/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="tpl/manager/css/manager.css">

    <style type="text/css">
        .control-label{
            position: relative;
            top: 6px;
            margin-top: 15px;
        }
        .form-control,.btn{
            margin-top: 15px;
        }
        .form-group{
            margin-bottom: 0px;
        }
    </style>
</head>

<body>
<div class="alert alert-warning in fade my-alert" id="alert-div">
    <p class="text-center"><strong id="alert-message"></strong></p>
</div>
<nav class="navbar navbar-default" role="navigation">
    <h3 >乡村购物后台管理</h3>
</nav>
<div class="container">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="account" class="col-xs-3 col-sm-4 control-label">账号</label>
            <div class="col-sm-4 col-xs-9">
                <input type="text" class="form-control" id="account" placeholder="请输入账号">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-xs-3 col-sm-4 control-label">密码</label>
            <div class="col-sm-4 col-xs-9">
                <input type="password" class="form-control" id="password" placeholder="请输入密码">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
                <button type="button" id="login"  class="btn btn-success  btn-block">登录</button>
            </div>
        </div>
    </form>
</div>



<script src="buyerstyle/js/jquery.js"></script>
<script src="tpl/manager/js/bootstrap.min.js"></script>
<script src="tpl/manager/js/my.js"></script>
<script type="text/javascript">
    $(function(){

        $("#login").click(function(){
            $.ajax({
                url:"manager.php?controller=root&method=loginJudge",
                type:"post",
                data:{
                    loginName: $("#account").val(),
                    loginPwd:$("#password").val()
                },
                dataType:"text",
                success:function(data){
                    console.log(data);
                    if(data==1) {
                        //登录验证成功之后跳转页面
                        window.location.href = "manager.php?controller=root&method=location_homepage";
                    }else{
                        myAlert("用户名错误或密码错误");
                    }
                }
            });
        });
    });


</script>
</body>

</html>