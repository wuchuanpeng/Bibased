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

        /*
         * 功     能：单文件上传upload_imag
         * 返回值类型：数组
         * 参     数：$pic_msg：获取上传文件信息，必填
                 $ext_arr：指定文件上传类型，为数组，可选
                  $size：限制上传文件大小默认2M，可选
                  $dir：文件上传的目录名称，可选
                  $name: 文件名，留空则随机取名不带后缀名  可选
         */
        function upload_imag($pic_msg,$dir='buyerstyle/uploadimgs',$name='',$ext_arr=array('jpg','png','gif','jpeg'),$size=20971520){
            if($pic_msg['size']>0){
                if(!is_dir($dir)){
                    mkdir($dir);
                }
                $arrs=explode('.',$pic_msg['name']);
                $ext=$arrs[count($arrs)-1];
                if(!in_array($ext,$ext_arr)){
                    echo '文件格式错误！';
                    exit;
                }
                if($pic_msg['size']>$size){
                    echo '文件大小已超出限制范围！';
                    exit;
                }
                if(empty($name)){
                    $newname=date('YmdHis',time()).rand(1000,9999).'.'.$ext;
                }else{
                    $newname=$name.'.'.$ext;
                }
                $upload_img=copy($pic_msg['tmp_name'],$dir.'/'.$newname);
                if($upload_img==false){
                    echo '文件上传失败！';
                    exit;
                }
                return $dir.'/'.$newname;//上传成功，返回文件名
            }
        }
	}
 ?>