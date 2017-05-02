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
	}
 ?>