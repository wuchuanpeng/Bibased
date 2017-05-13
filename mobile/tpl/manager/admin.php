
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>管理员</title>
		<link href="tpl/manager/css/bootstrap.min.css" rel="stylesheet" />
		<link href="tpl/manager/css/bootstrap-table.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="tpl/manager/css/manager.css">
		<script src="tpl/manager/js/my.js"></script>
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
		<ul id="myTab" class="nav nav-tabs">
		    <li class="active">
		        <a href="#classManage" data-toggle="tab">
		            商家店铺管理
		        </a>
		    </li>
		    <li><a href="#UserFeedback" data-toggle="tab">用户反馈</a></li>
		    <a href="javascript:;" onclick="logout()" style="float: right;font-size: 16px;position:relative;top:10px;"> <span class="glyphicon glyphicon-log-out"></span>登出</a>
		</ul>
		<div id="myTabContent" class="tab-content">
		    <div class="tab-pane fade in active" id="classManage">
		        <div class="portlet box grey-cascade" style="margin-top:20px">
                    <a href="javascript:;" onclick="toUserInsert()" style="margin-bottom: -90px" class="btn btn-info">
                        添加
                    </a>
					<div class="portlet-body">
						<table id="systemLogTable"
							data-toggle="table"
							data-url="manager.php?controller=root&method=getSellerList"
							data-pagination="true"
							data-show-refresh="true"
							data-show-toggle="true"
							data-search="true" >


						    <thead>
						    <tr>
						    	<th data-field="sid" data-visible="false"></th>
						    	<th data-field="no">序号</th>
						        <th data-field="shopname">店铺名称</th>
						        <th data-field="shopaddress">店铺地址</th>
                                <th data-field="shopaccount">营业额</th>
						        <th data-field="sname">店主</th>
						        <th data-field="stel">联系电话</th>
						        <th data-field="format" data-formatter="opFormat">操作</th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
		    </div>
		    <div class="tab-pane fade in " id="UserFeedback">
		        <div class="portlet box grey-cascade" style="margin-top:20px">
					
					<div class="portlet-body">
						<table id="FeedbackTable"
							data-toggle="table"
							data-url="admin.php?controller=root&method=getFeedbackList"
							data-pagination="true"
							data-show-toggle="true"
							data-show-refresh="true"
							data-search="true" >
						    <thead>
						    <tr>
						    	<th data-field="gid" data-visible="false"></th>
						    	<th data-field="gno">序号</th>
                                <th data-field="gname">反馈人</th>
						        <th data-field="gcontent">反馈内容</th>
						        <th data-field="gphone">联系号码</th>
						        <th data-field="gdate">时间</th>
                                <th data-field="gstate">是否处理</th>
						        <th data-field="format" data-formatter="messageFormat">操作</th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
		    </div>
		    
		</div>
		<!-- 模态框（Modal） -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title" id="myModalLabel"></h4>
		            </div>
		            <div class="modal-body" id="myModalBody">
		            	<form class="form-horizontal" role="form">
		            		<div class="form-group">
			            		<label for="sname" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="shop-name">店铺名称</label>
			            		<div class="col-xs-9 col-sm-10">
			            			<input type="text" id="sname" class="form-control" value=""/>
			            		</div>
			            	</div>
			            	<div class="form-group">
			            		<label for="shop-addr" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="shop-address">店铺地址</label>
			            		<div class="col-xs-9 col-sm-10">
			            			<input type="text" id="shop-addr" class="form-control" value=""/>
			            		</div>
			            	</div>
			            	<div class="form-group">
			            		<label for="person-name" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="shop-owner">店主</label>
			            		<div class="col-xs-9 col-sm-10">
			            			<input type="text" id="person-name" class="form-control" value=""/>
			            		</div>
			            	</div>
                            <div class="form-group">
                                <label for="user-pwd" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="login-pwd">登录密码</label>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" id="user-pwd" class="form-control" value=""/>
                                </div>
                            </div>
			            	<div class="form-group">
			            		<label for="person-tel" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="shop-tel">联系电话</label>
			            		<div class="col-xs-9 col-sm-10">
			            			<input type="text" id="person-tel" class="form-control" value=""/>
			            		</div>
			            	</div>

			            	<div class="form-group">
			            		<label for="desc" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="descLabel">备注</label>
			            		<div class="col-xs-9 col-sm-10">
			            			<textarea class="form-control" id="desc" style="resize: none;"></textarea>
			            		</div>
			            	</div>
			            	<input type="hidden" value="" id="sid"/>
                            <input type="hidden" value="" id="uid"/>
		            	</form>
		            </div>
		            <div class="modal-footer">
		            	<button type="button" class="btn btn-danger" style="float: left" onclick="toDelete()">删除</button>
		                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		                <button type="button" class="btn btn-primary" onclick="submit()">提交更改</button>
			  			<p id = "admin_alert_msg" style="color:#f00"></p>
		            </div>
		        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>

		<!-- 模态框（Modal） -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title" id="myModal2Label"></h4>
		            </div>
		            <div class="modal-body" id="myModal2Body">
		            	<p id="myModal2Message" style='color:#f00'></p>
		            	<form class="form-horizontal" role="form">
		            		<div class="form-group">
			            		<label for="shopName" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="shopNameLabel">店铺名称<font style='color:#f00'>*</font></label>
			            		<div class="col-xs-9 col-sm-10">
			            			<input type="text" id="shopName" class="form-control" value=""/>
			            		</div>
			            	</div>
			            	<div class="form-group">
			            		<label for="shopAddress" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="shopAddressLabel">店铺地址<font style='color:#f00'>*</font></label>
			            		<div class="col-xs-9 col-sm-10">
			            			<input type="text" id="shopAddress" class="form-control" value="" />
			            		</div>
			            	</div>
			            	<div class="form-group">
			            		<label for="shopOwner" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="shopOwnerLabel">店主<font style='color:#f00'>*</font></label>
			            		<div class="col-xs-9 col-sm-10">
			            			<input type="text" id="shopOwner" class="form-control" value="" />
			            		</div>
			            	</div>
			            	<div class="form-group">
			            		<label for="shopTel" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="shopTelLabel">联系电话<font style='color:#f00'>*</font></label>
			            		<div class="col-xs-9 col-sm-10">
			            			<input type="text" id="shopTel" class="form-control" value=""/>
			            		</div>
			            	</div>
			            	<div class="form-group">
			            		<label for="userPwd" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="userPwdLabel">密码<font style='color:#f00'>*</font></label>
			            		<div class="col-xs-9 col-sm-10">
			            			<input type="text" id="userPwd" class="form-control" value=""/>
			            		</div>
			            	</div>
                            <div class="form-group">
                                <label for="userPwdCon" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="userPwdConLabel">确认密码<font style='color:#f00'>*</font></label>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" id="userPwdCon" class="form-control" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sdesc" class="col-xs-3 col-sm-2 control-label" style="position: relative;top:6px;" id="descLabel">备注</label>
                                <div class="col-xs-9 col-sm-10">
                                    <textarea class="form-control" id="sdesc" style="resize: none;"></textarea>
                                </div>
                            </div>
		            	</form>
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		                <button type="button" class="btn btn-primary" id="add-seller">提交</button>
		            </div>
		        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>


		<div class="modal fade" id="myConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title" id="myConfirmLabel">提示</h4>
		            </div>
		            <div class="modal-body" id="myConfirmBody">
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		                <button type="button" class="btn btn-primary" id="myConfirmOk">确定</button>
		            </div>
		        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>

		<div class="modal fade" id="admin_show_msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <label for="msgbody" class="control-label">内容</label>
					<div style="width:100%">
						<textarea id='msgbody' rows="5" class="form-control" style="resize: none;"></textarea>
					</div>
		        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>

		<script src="buyerstyle/js/jquery.js"></script>
		<script src="tpl/manager/js/bootstrap.min.js"></script>
		<script src="tpl/manager/js/bootstrap-table.min.js"></script>
		<script src="tpl/manager/js/bootstrap-table-zh-CN.min.js"></script>
		<script src="tpl/manager/js/admin.js"></script>
	</body>

</html>