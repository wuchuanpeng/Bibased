<?php
    class rootController{
        public $rootObj;
        function __construct()
        {
            if(!(isset($_SESSION['manager_id']))&&(PC::$method != "index" && PC::$method != "loginJudge")){
                header('Location:manager.php');
            }else{
                $this -> rootObj = M("root");
            }
        }

        function index(){
            VIEW::display("manager/login.php");
        }

        /**
         * 登录判断
         */
        function loginJudge() {
            $loginName = $_POST['loginName'];
            $loginPwd = $_POST['loginPwd'];
            if(($loginName == "9999") && ($loginPwd == "root")){
                $_SESSION['manager_id'] = 1;
                echo 1;
            }else{
                echo 0;
            }
        }
        function location_homepage(){
            VIEW::display("manager/admin.php");
        }

        /**
         * 获取商家数据
         */
        function getSellerList(){
            $sellerList = $this -> rootObj -> getSellerList();
            echo json_encode($sellerList);
        }

        /**
         * 保存更新的数据
         */
        function saveUpdateSeller(){
            $updateUserArr = array('U_Password' => $_POST['password'],
                                    'U_Update' => time());
            $uid = $_POST['uid'];
            $updateSellerArr = array('S_ShopName' => $_POST['S_ShopName'],
                                    'S_Address' => $_POST['S_Address'],
                                    'S_Name' => $_POST['S_Name'],
			                        'S_Tel' => $_POST['S_Tel'],
			                        'S_Desc' => $_POST['S_Desc'],
                                    'S_Update' => time());
            $sid = $_POST['S_ID'];
            $back = $this -> rootObj -> saveUpdateSeller($updateUserArr,$uid,$updateSellerArr,$sid);
            echo $back;
        }

        /**
         * 删除商家
         */
        function deleteSeller(){
            $updateUserArr = array('U_Status' => -1,
                                    'U_Update' => time());
            $uid = $_POST['uid'];
            $updateSellerArr = array('S_Status' => -1,
                                    'S_Update' => time());
            $sid = $_POST['sid'];
            $back = $this -> rootObj -> saveUpdateSeller($updateUserArr,$uid,$updateSellerArr,$sid);
            echo $back;
        }

        /**
         * 新商家
         */
        function saveNewSeller(){
            $insertUserArr = array('U_LoginID' => $_POST['shopTel'],
                                'U_Password' => $_POST['userPwd'],
                                'U_Right' => 0,
                                'U_Date' => time());
            $Seller = $_POST;
            $back = $this -> rootObj -> saveNewSeller($insertUserArr,$Seller);
            echo $back;
        }

        function getFeedbackList(){
            $feedbackList = $this -> rootObj -> getFeedbackList();
            echo json_encode($feedbackList);
        }
        function  updateMessage() {
            $gid = $_POST["gid"];
            echo $this -> rootObj -> updateMessageByGid($gid);
        }

        function logout(){
            $_SESSION['manager_id'] = "";
            header('Location:manager.php');
        }
    }
?>