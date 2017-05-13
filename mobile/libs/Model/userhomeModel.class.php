<?php 
	class userhomeModel{
        /**
         * 返回用户信息
         * @param $uid
         * @return mixed
         */
		function userMsg($uid){
			$sql="select * from R_Buyer where B_Status>0 and B_UID=".$uid;
			return DB::findOne($sql);
		}

        /**
         * 更改用户名称
         * @param $newName
         * @param $uid
         */
		function saveNewName($newName,$uid){
			$table="R_Buyer";
			$newArr = array('B_Name' => $newName,
							'B_Update' => time());
			$where="B_Status>0 and B_UID=".$uid;
			DB::update($table,$newArr,$where);
			return;
		}

        /**
         * 更改密码
         * @param $oldPsd
         * @param $newPsd
         * @param $uid
         * @return array
         */
		function saveNewPassword($oldPsd,$newPsd,$uid){
			$back=array();
			$sql="select * from R_User where U_Status>0 and U_Password='".$oldPsd."' and U_ID=".$uid;
			$result=DB::findOne($sql);
			if($result){
				$table="R_User";
				$newArr = array('U_Password' => $newPsd,
								'U_Update' => time());
				$where="U_Status>0 and U_ID=".$uid;
				DB::update($table,$newArr,$where);
				$_SESSION['reload']=1;
			}else{
				$back['oldPsdCorrect']=0;
			}
			return $back;
		}

        /**
         * 更改头像
         * @param $newImg
         * @param $uid
         * @return mixed
         */
		function uploadUserImg($newImg,$uid){
            $updateArr = array('B_ImgUrl' => $newImg,
                                'B_Update' => time());
            $where = "B_Status = 1 AND B_UID = ".$uid;
            $table = "R_Buyer";
            return DB::update($table,$updateArr,$where);
        }

        /**
         * 保存用户反馈
         * @param $comment
         * @param $tel
         * @param $uid
         * @return mixed
         */
        function saveUserMsg($comment,$tel,$uid){
            $sql = "SELECT B_Name FROM R_Buyer WHERE B_Status = 1 AND B_UID = ".$uid;
            $res = DB::findOne($sql);
            $newArr = array('G_UID' => $uid,
                            'G_Name' => $res['B_Name'],
                            'G_Content' => $comment,
                            'G_Phone' => $tel,
                            'G_State' => 0,
                            'G_Date' => time());
            $table = "R_Suggest";
            return DB::insert($table,$newArr);
        }
	}

 ?>