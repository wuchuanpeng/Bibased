<?php 
	class usershopController{
	    public $userId;
	    public $userObj;
		public function __construct(){
			if(!(isset($_SESSION['loginuser']))){
				header("Location:admin.php");
				exit;
			}else{
                $this->userId=isset($_SESSION['buyer_id'])?$_SESSION['buyer_id']:array();
                $this->userObj=M('usershop');
            }
		}
		//引入usershop页面
		function index(){
			VIEW::display('buyer/user-shop.php');
		}

        /**
         * 点击进入页面
         */
		function clickRestaurant(){
		    $data = array();
		    $data["sid"] = $_GET['sid'];
		    $sellerInfo = $this -> userObj -> getSellerInfoById($_GET['sid'], $this->userId);
		    $data["sellerInfo"] = $sellerInfo;
		    VIEW::assign($data);
			VIEW::display('buyer/restaurant.php');
		}

        /**
         * 获取商户列表
         */
        function getSellerList() {
		    $startItem = $_POST["startItem"];
		    $listNum = $_POST["listNum"];
            $back=$this -> userObj->getSellerList($startItem, $listNum);
            echo json_encode($back);
        }
        /**
         * 设置是否收藏
         */
        function setCollection() {
            $isCollection = $_POST['isCollection'];
            $sid = $_POST['sid'];
            echo $this->userObj->setCollection($sid, $this->userId, $isCollection);
        }
        /**
         * 获取优惠信息
         */
        function getDiscountBySID() {
            $result = $this -> userObj -> getDiscountBySID($_POST['sid']);
            echo json_encode($result);
        }

        /**
         * 获取商品信息
         */
        function getProducts() {
            $sid  = $_POST["sid"];
            $result = $this -> userObj -> getProducts($sid);
            echo json_encode($result);
        }
	}
 ?>