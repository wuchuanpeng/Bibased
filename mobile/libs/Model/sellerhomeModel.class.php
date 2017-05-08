<?php 
	class sellerhomeModel{
        /**
         * @param $uid 商家在登录表中的id
         * @return mixed 返回R_Seller查出的唯一一条数据
         */
        function sellerMsg($uid){
            $sql="select * from R_Seller where S_Status>0 and S_UID=".$uid;
            return DB::findOne($sql);
        }

        /**
         * @param $uid
         * @return mixed 返回R_User查出的唯一一条数据
         */
        function sellerLogMsg($uid){
            $sql="select * from R_User where U_Status>0 and U_ID=".$uid;
            return DB::findOne($sql);
        }
        /**
         * @param $newName 要修改的新名称
         * @param $uid
         * @return $res 返回true和false
         */
        function saveNewName($newName,$uid){
            $table = "R_Seller";
            $newArr = array('S_Name' => $newName,
                            'S_Update' => time());
            $where = "S_Status>0 and S_UID=".$uid;
            $res = DB::update($table,$newArr,$where);
            return $res;
        }

        /**
         * @param $oldPsd
         * @param $newPsd
         * @param $uid
         * @return array
         */
        function saveNewPassword($newPsd,$uid)
        {
            $table = "R_User";
            $newArr = array('U_Password' => $newPsd,
                            'U_Update' => time());
            $where = "U_Status>0 and U_ID=" . $uid;
            $back = DB::update($table, $newArr, $where);
            $_SESSION['reload'] = 1;
            return $back;
        }

        /**
         * @param $newname 新的店铺名称
         * @param $uid
         * @return mixed true或者false
         */
        function saveNewShopName($newname,$uid){
            $table = "R_Seller";
            $newArr = array('S_ShopName' => $newname,
                            'S_Update' => time());
            $where = "S_Status>0 and S_UID=" . $uid;
            $back = DB::update($table, $newArr, $where);
            return $back;
        }

        function saveNewImage($newimg,$uid){
            $table = "R_Seller";
            $newArr = array('S_ImgUrl' => $newimg,
                            'S_Update' => time());
            $where = "S_Status>0 and S_UID=" .$uid;
            $back = DB::update($table, $newArr, $where);
            return $back;
        }
	}
 ?>