<?php 
	class indexModel{

		function pwdContrast($acc){
			$table='R_User';
			$sql="select * from ".$table." where U_Status>0 and U_LoginID='".$acc."'";
			return DB::findOne($sql);	
		}
		//比对登录信息
		function checkContrast($acc,$pas){
			$back=array();
			$result = self::pwdContrast($acc);
			if($result){
				if($result['U_Password']==$pas){
					if($result['U_Right']==0){
						$_SESSION['seller_id']=$result['U_ID'];//登录者在用户表中的id
						$_SESSION['loginseller']=$acc;//登录名,即手机号码

					}else if($result['U_Right']==1){
						$_SESSION['buyer_id']=$result['U_ID'];//登录者在用户表中的id
						$_SESSION['loginuser']=$acc;//登录名,即手机号码

					}
					$back['isaccount']=1;
				}else{
					$back['isaccount']=0;
				}
			}else{
				$back['isuser']=0;//不是用户
			}
			return $back;
		}
		//数据库保存新用户信息
		function saveNewUser($bTel,$bPassword,$bName,$bSex){
			$back=array();
			$time=time();
			$sql="select * from R_User where U_Status>0 and U_LoginID='".$bTel."' and U_Right=1";
			if(DB::findOne($sql)){
				$back['isexist']=1;
			}else{
				//事务,不能两者都成功的话就回滚
				mysql_query("BEGIN");
				$userArr = array('U_LoginID' => $bTel,
								 'U_Password' => $bPassword,
								 'U_Right' => "1",
								 'U_Date' => $time);

				$insertId1=DB::insert('R_User',$userArr);
				$buyerArr = array('B_UID' => $insertId1,
								 'B_Name' => $bName,
								 'B_Sex' => $bSex,
								 'B_Tel' => $bTel,
								 'B_Date' => $time);
				$insertId2=DB::insert('R_Buyer',$buyerArr);
				if($insertId1 && $insertId2){  
					mysql_query("COMMIT"); 
					$back['is_success']=1; 
				}else{  
				 	mysql_query("ROLLBACK");  
				 	$back['is_success']=0; 
				}
				mysql_query("END");

			}
			return $back;
		}
	}
 ?>