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

        function getEvaluateList($uid){
            $sql = "SELECT B_Name,B_ImgUrl,B_ID FROM R_Buyer WHERE B_Status = 1 AND B_UID = ".$uid;
            $buyerMsg = DB::findOne($sql);
            $sql = "SELECT O_ID,O_FID,E_ID,E_Score,E_Content,E_Date FROM R_Order,R_Evaluate WHERE O_Status = 1 AND E_Status = 1 AND E_ReplyID = -1 AND O_BID = ".$buyerMsg['B_ID']." AND O_ID = E_OID";
            $evalList = DB::findAll($sql);
            if($evalList != ""){
                foreach ($evalList as $key => $value){
                    $sql = "SELECT E_Content,E_Date FROM R_Evaluate WHERE E_Status = 1 AND E_ReplyID = 1 AND E_OID = ".$value['O_ID'];
                    $sellerReply = DB::findOne($sql);
                    $evalList[$key]['E_Date'] = date("Y-m-d H:i",$evalList[$key]['E_Date'] );
                    $evalList[$key]['E_FULL'] = (int)$evalList[$key]['E_Score'] - 1;
                    $evalList[$key]['E_NONE'] = 4 - (int)$evalList[$key]['E_Score'];
                    if($sellerReply != ""){
                        $evalList[$key]['sellerReply'] = $sellerReply['E_Content'];
                        $evalList[$key]['sellerReplyTime'] = date("Y-m-d H:i",$sellerReply['E_Date'] );
                    }
                    $sql = "SELECT L_ImgUrl FROM R_UploadFiles WHERE L_Type = 2 AND L_Status = 1 AND L_SpecificID = ".$value['E_ID'];
                    $Img = DB::findOne($sql);
                    if($Img != ""){
                        $evalList[$key]['L_ImgUrl'] = $Img['L_ImgUrl'];
                    }
                    $sql = "SELECT S_ID,S_ShopName FROM R_Seller,R_FarmShop WHERE S_Status = 1 AND F_Status = 1 AND F_SID = S_ID AND F_ID = ".$value['O_FID'];
                    $sellerMsg = DB::findOne($sql);
                    if($sellerMsg != ""){
                        $evalList[$key]['S_ID'] = $sellerMsg['S_ID'];
                        $evalList[$key]['S_ShopName'] = $sellerMsg['S_ShopName'];
                    }
                }
            }
            return array('buyerMsg' => $buyerMsg,
                         'evalList' => $evalList);
        }
	}

 ?>