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

        /**
         * @param $newimg 新的头像图片url
         * @param $uid
         * @return mixed
         */
        function saveNewImage($newimg,$uid){
            $table = "R_Seller";
            $newArr = array('S_ImgUrl' => $newimg,
                            'S_Update' => time());
            $where = "S_Status>0 and S_UID=" .$uid;
            $back = DB::update($table, $newArr, $where);
            return $back;
        }

        /**
         * @param $startItem 开始的序号
         * @param $listNum 取得条数
         * @param $uid
         * @return array 返回的数据数组
         */
        function getEvaluateList($startItem,$listNum,$uid){
            $eval = array();
            $sellerMsg = self::sellerMsg($uid);
            $sql = "SELECT * FROM R_FarmShop WHERE F_Status = 1 AND F_SID = ".$sellerMsg['S_ID'];
            $result = DB::findAll($sql);
            $sql = "SELECT * FROM R_Order WHERE O_Status = 1 AND ( O_FID = ".$result[0]['F_ID']." OR O_FID = ".$result[1]['F_ID']." ) ORDER BY O_ID DESC LIMIT $startItem,$listNum";
            $res = DB::findAll($sql);
            if($res!=""){
                foreach($res as $key => $value) {
                    $oid = $value['O_ID'];
                    $bid = $value['O_BID'];
                    $sql = "SELECT * FROM R_Buyer WHERE B_Status =1 AND B_ID = ".$bid;
                    $resu = DB::findOne($sql);
                    $sql = "SELECT * FROM R_Evaluate WHERE E_Status = 1 AND E_ReplyID = -1 AND E_OID = ".$oid;
                    $data = DB::findOne($sql);
                    if (!$data) {
                        $eval[$key]['E_ID'] = "";
                        $eval[$key]['E_Score'] = "";
                        $eval[$key]['E_Content'] = "该用户暂无评价";
                        $eval[$key]['E_Date'] = "";
                        $eval[$key]['seller_Reply'] = "";
                        $eval[$key]['eval_Pic'] = "";
                    }else{
                        $eval[$key]['E_ID'] = $data['E_ID'];
                        $eval[$key]['E_Score'] = $data['E_Score'];
                        $eval[$key]['E_Content'] = $data['E_Content'];
                        $eval[$key]['E_Date'] = $data['E_Date'];
                        $sql = "SELECT * FROM R_Evaluate WHERE E_Status = 1 AND E_ReplyID = 1 AND E_OID = " . $oid;
                        $rs = DB::findOne($sql);
                        $eval[$key]['seller_Reply'] = (!$rs) ? "" : $rs['E_Content'];
                        $sql = "SELECT * FROM R_UploadFiles WHERE L_Status = 1 AND L_Type = 2 AND L_SpecificID = " . $data['E_ID'];
                        $rs = DB::findOne($sql);
                        $eval[$key]['eval_Pic'] = (!$rs) ? "" : $rs['L_ImgUrl'];
                    }
                    $eval[$key]['buyer_Img'] = $resu['B_ImgUrl'];
                    $eval[$key]['buyer_Name'] = $resu['B_Name'];
                }
            }
            return $eval;
        }

        /**
         * 保存商家回复
         * @param $reply
         * @param $eid
         * @return mixed
         */
        function saveSellerReply($reply,$eid){
            $sql = "SELECT * FROM R_Evaluate WHERE E_Status =1 AND E_ID = ".$eid;
            $res = DB::findOne($sql);
            $newEvalArr = array('E_OID' => $res['E_OID'],
                                'E_Content' => $reply,
                                'E_ReplyID' => 1,
                                'E_Date' => time());
            $table = "R_Evaluate";
            $insertId = DB::insert($table,$newEvalArr);
            return $insertId;
        }

        function saveSellerMsg($comment,$tel,$uid){
            $sql = "SELECT S_Name FROM R_Seller WHERE S_Status = 1 AND S_UID = ".$uid;
            $res = DB::findOne($sql);
            $newArr = array('G_UID' => $uid,
                            'G_Name' => $res['S_Name'],
                            'G_Content' => $comment,
                            'G_Phone' => $tel,
                            'G_State' => 0,
                            'G_Date' => time());
            $table = "R_Suggest";
            return DB::insert($table,$newArr);
        }
	}
 ?>