<?php 
	class userhomeModel{
		function userMsg($uid){
			$sql="select * from R_Buyer where B_Status>0 and B_UID=".$uid;
			return DB::findOne($sql);
		}
		function saveNewName($newName,$uid){
			$table="R_Buyer";
			$newArr = array('B_Name' => $newName,
							'B_Update' => time());
			$where="B_Status>0 and B_UID=".$uid;
			DB::update($table,$newArr,$where);
			return;
		}
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
		function uploadUserImg($newImg,$uid){
            $updateArr = array('B_ImgUrl' => $newImg,
                                'B_Update' => time());
            $where = "B_Status = 1 AND B_UID = ".$uid;
            $table = "R_Buyer";
            return DB::update($table,$updateArr,$where);
        }
	}

 ?>