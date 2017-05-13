<?php 
	class sellerhomeController{

		public $sellerId;
		public $sellerObj;
		public function __construct(){
			if(!(isset($_SESSION['loginseller']))){
				header("Location:admin.php");
				exit;
			}else{
				$this->sellerId=isset($_SESSION['seller_id'])?$_SESSION['seller_id']:array();
				$this->sellerObj=M("sellerhome");
			}
		}


		function index(){
            $back=$this->sellerObj->sellerMsg($this->sellerId);
            VIEW::assign(array('sellerImg' => $back['S_ImgUrl'],
                'sellerName' => $back['S_Name']));
			VIEW::display('seller/seller-home.php');
		}

		function location_orderForm(){
			VIEW::display('seller/home-orderDetail.php');
		}
		/**
         *加载我的账户详情页面
         */
		function location_myAccount(){
            $back=$this->sellerObj->sellerMsg($this->sellerId);
            VIEW::assign(array('account' => $back['S_Account']));
		    VIEW::display("seller/home-myAccount.php");
        }
        /**
         * 加载资料修改页面
         */
        function location_msgMod(){
            $back = $this -> sellerObj -> sellerMsg($this -> sellerId);
            VIEW::assign(array('sellerImg' => $back['S_ImgUrl'],
                'sellerName' => $back['S_Name'],
                'sellerTel' => $_SESSION['loginseller']));
            VIEW::display("seller/home-msgmod.php");
        }

        /**
         * 加载修改姓名的界面
         */
        function modName(){
            $back = $this->sellerObj -> sellerMsg($this -> sellerId);
            VIEW::assign(array('sellerName' => $back['S_Name']));
            VIEW::display('seller/msgmod-mod.php');
        }

        /**
         * 数据库存储新名称
         */
        function save_newName(){
            $newName = $_POST['newname'];
            $back = $this -> sellerObj -> sellerMsg($this -> sellerId);
            $oldName = $back['S_Name'];
            if($oldName==$newName){
                header("Location:admin.php?controller=sellerhome&method=location_msgMod");
            }else{
                $res=$this->sellerObj -> saveNewName($newName,$this -> sellerId);
                if($res){
                    header("Location:admin.php?controller=sellerhome&method=location_msgMod");
                }
            }
        }

        /**
         * 加载密码修改页面
         */
        function modPassword(){
            VIEW::display('seller/msgmod-mod.php');
        }
        /**
         * 数据库存储新密码
         */
        function save_newPassword(){
            $backvalue=array();
            $oldPsd = $_POST['oldpwd'];
            $newPsd = $_POST['newpwd'];
            $back = $this -> sellerObj -> sellerLogMsg($this -> sellerId);
            $oldPassword = $back['U_Password'];
            if($oldPsd == $oldPassword){
                if($oldPsd == $newPsd){
                    $backvalue['ischecksql']=0;
                }else{
                    $backvalue['ischecksql'] = $this->sellerObj->saveNewPassword($newPsd,$this->sellerId);
                }

            }else{
                $backvalue['oldcheck']=0;
            }
            echo json_encode($backvalue);
        }

        /**
         * 用户登出
         */
        function seller_loginOut(){
            $_SESSION['seller_id']="";
            $_SESSION['loginseller']="";
            header("Location:admin.php");
        }

        /**
         * 加载其他设置页面
         */
        function  location_set(){
            $res = $this -> sellerObj -> sellerMsg($this -> sellerId);
            $shopnameOld = $res['S_ShopName'];
            VIEW::assign(array('shopnameOld' => $shopnameOld));
            VIEW::display("seller/store-set.php");
        }

        /**
         * 修改商店名称
         */
        function save_NewShopName(){
            $newShopName = $_POST['shopname-new'];
            $result = $this->sellerObj -> saveNewShopName($newShopName,$this->sellerId);
            if($result){
                header("Location:admin.php?controller=sellerhome&method=index");
            }
        }

        /**
         * 修改商家用户头像
         */
        function save_NewImage(){
            $newImgUrl = $_FILES['upload-seller'];
            $indexObj = M("index");
            $newImgUrl = $indexObj -> upload_imag($newImgUrl);
            $back = $this -> sellerObj -> saveNewImage($newImgUrl,$this -> sellerId);
            if($back){
                header("Location:admin.php?controller=sellerhome&method=location_msgMod");
            }
        }

        /**
         * 显示查看店铺评价页面
         */
        function location_ShopEval(){
            VIEW::display('seller/home-shopEvaluate.php');
        }

        /**
         * 获取评论信息
         */
        function getEvaluateList(){
            $startItem = $_POST['startItem'];
            $listNum = $_POST['listNum'];
            $back = $this -> sellerObj -> getEvaluateList($startItem,$listNum,$this -> sellerId);
            echo json_encode($back);
        }

        function saveSellerReply(){
            $reply = $_POST['reply'];
            $eid = $_POST['eid'];
            $back = $this -> sellerObj -> saveSellerReply($reply,$eid);
            echo json_encode($back);
        }

        /**
         * 反馈信息页面
         */
        function location_MyComments(){
            $idtype = 0;
            VIEW::assign(array('idtype' => $idtype));
            VIEW::display('buyer/home-comments.php');
        }

        /**
         * 保存用户反馈信息
         */
        function saveUserMsg(){
            $backvalue = $this -> sellerObj -> saveSellerMsg($_POST['usercomment'],$_POST['usertel'],$this->sellerId);
            echo json_encode($backvalue);
        }
	}
 ?>