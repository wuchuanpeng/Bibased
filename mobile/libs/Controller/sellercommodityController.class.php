<?php 
	class sellercommodityController{
		public $sellerId;
		public function __construct(){
			if(!(isset($_SESSION['loginseller']))){
				header("Location:admin.php");
				exit;
			}else{
				$this->sellerId=isset($_SESSION['seller_id'])?$_SESSION['seller_id']:array();
			}
		}

		function index(){
			$sellerobj=M("sellercommodity");
			$data=$sellerobj->sellerMsg($this->sellerId);
			VIEW::assign(array('shopImg' => $data['S_ShopImgUrl'], 
							  'shopName' => $data['S_ShopName']));
			VIEW::display('seller/seller-commodity.php');
		}
//动态引入酒店的数据
		function ajaxHotel(){
			$sellerobj=M("sellercommodity");
			$data=$sellerobj->HotelMsg($this->sellerId);
			// var_dump($data['hotelRoomImg']);
			VIEW::assign(array('hotelRoomType' => $data['hotelRoomType'], 
							   'restRoomNum' => $data['restRoomNum'],
							   'hotelRoomImg' => $data['hotelRoomImg'],
							   'totalRoomNum' => $data['totalRoomNum']));
			VIEW::display('seller/hotel-manage.php');
		}

		function ajaxProduct(){
			$sellerobj=M("sellercommodity");
			$data=$sellerobj->ProductMsg($this->sellerId);
			VIEW::assign(array('productKinds' => $data['productKinds'], 
							   'agrProduct' => $data['agrProduct'],
							   'agrProductImg' => $data['agrProductImg']));
			VIEW::display('seller/produce-manage.php');
		}


		function location_addCommodity(){
			$sellerobj=M("sellercommodity");
			$productKinds=$sellerobj->ProductKind($this->sellerId);
			// var_dump($productKinds);
			if($productKinds==""){
				$defaulttype="";
			}else{
				$defaulttype=$productKinds[0]['K_Name'];
			}
			VIEW::assign(array('defaulttype' => $defaulttype));
			VIEW::display('seller/add-product.php');
		}
//为新添加的农产品选择分类
		public function showpage()
		{
			$sellerobj=M("sellercommodity");
			$productKinds=$sellerobj->ProductKind($this->sellerId);
			VIEW::assign(array('productKinds' => $productKinds));
			VIEW::display('seller/select-newprotype.php');
		}
//ajax保存新添加的分类
		function save_newType(){
			$back = array();
			$newTypeName=$_POST['newTypeName'];
			$sellerobj=M("sellercommodity");
			$back=$sellerobj->saveNewType($newTypeName,$this->sellerId);
			echo json_encode($back);
		}
//ajax删除农产品的分类
		function delete_AgrType(){
			$deleteAgrType=$_POST['deleteAgrType'];
			$sellerobj=M("sellercommodity");
			$back=$sellerobj->deleteAgrType($deleteAgrType,$this->sellerId);
			echo json_encode($back);
		}

		//新商品名称的判断,是否重复...酒店
		function ajaxHotelNameJudge(){
			$back = array();
			$newHotelName=$_POST['newHotelName'];
			$sellerobj=M("sellercommodity");
			$back=$sellerobj->HotelNameJudge($newHotelName,$this->sellerId);
			echo json_encode($back);
		}
		//新商品名称的判断,是否重复...农产品
		function ajaxAgrNameJudge(){
			$back = array();
			$newAgrName=$_POST['newAgrName'];
			$sellerobj=M("sellercommodity");
			$back=$sellerobj->AgrNameJudge($newAgrName,$this->sellerId);
			echo json_encode($back);
		}

		function delete_defaultRoom(){
			$rtid=$_POST['rtid'];
			$sellerobj=M("sellercommodity");
			$back=$sellerobj->deleteDefaultRoom($rtid);
			echo json_encode($back);
		}

//添加新的商品信息,修改信息
		function add_newProduct(){
			$agrHotel=$_POST['agr-hotel'];//获取隐藏表单域值,表示是添加农产品还是房间
			$commodityname=$_POST['commodity-name'];
			$commodityremain=$_POST['commodity-remain'];
			$commodityprice=$_POST['commodity-price'];
			$commodityimg=$_FILES['upload-photo'];
            $indexObj = M("index");
			$commodityimg = $indexObj->upload_imag($commodityimg);
			$sellerobj=M("sellercommodity");
			if($agrHotel=="hotel"){
				$hotelroom=$_POST['room-no'];
				$roomNum=explode(",",$hotelroom);
			}else{
				$agrtype=$_POST['agr-kind'];
			}

			$operation=$_GET['operation'];//获取action中传过来的值区分是新增还是修改
			if($operation=="add"){
				if($agrHotel=="hotel"){
					$back=$sellerobj->saveNewHotelCommodity($commodityname,$commodityremain,$commodityprice,$commodityimg,$roomNum,$this->sellerId);
				}else{
					$back=$sellerobj->saveNewAgrCommodity($commodityname,$commodityremain,$commodityprice,$commodityimg,$agrtype,$this->sellerId);
				}
			}else{
				if($commodityimg==null){
					$commodityimg=$_POST['default-img'];
				}
				$commodityid=$_POST['commodity-id'];
				if($agrHotel=="hotel"){
					$back=$sellerobj->modHotelCommodity($commodityname,$commodityremain,$commodityprice,$commodityimg,$roomNum,$commodityid,$this->sellerId);
				}else{
					$back=$sellerobj->modAgrCommodity($commodityname,$commodityremain,$commodityprice,$commodityimg,$agrtype,$commodityid,$this->sellerId);
				}
			}
			if($back){
				header("Location:admin.php?controller=sellercommodity&method=index");
			}
		}



	    function location_reviseProduct(){
	    	$commodityId=$_GET['id'];
	    	$commodMsg=explode('-',$commodityId);
	    	if($commodMsg[0]=="agrProduct"){
	    		$agrId=$commodMsg[1];//获取农产品的id
	    		$sellerobj=M("sellercommodity");
				$data=$sellerobj->reviseAgrMsg($agrId);
				VIEW::assign(array('defaultKind' => $data['K_Name'],
									'defaultName' => $data['P_Name'],
									'defaultPrice' => $data['P_Price'],
									'defaultRemain' => $data['P_Remain'],
									'defaultImg' => $data['L_ImgUrl'],
									'defaultId' => $agrId,
	    					  		'commodType' => "农产品"));
	    	}else{
	    		$roomTypeId=$commodMsg[1];//获取房间类型的id
	    		$sellerobj=M("sellercommodity");
				$data=$sellerobj->reviseHotelMsg($roomTypeId);
				// var_dump($data['roomdata']);
				VIEW::assign(array('defaultName' => $data['T_Name'],
									'defaultPrice' => $data['T_Price'],
									'defaultRemain' => count($data['roomdata']),
									'defaultRoomNum' => $data['roomdata'],
									'defaultImg' => $data['L_ImgUrl'],
									'defaultId' => $roomTypeId,
	    					  		'commodType' => "酒店房间"));
	    	}
	    	VIEW::display('seller/revise-product.php');
	    }
	
	    function delete_commodity(){
	    	$id=$_POST['id'];
	    	$type=$_POST['type'];
	    	$sellerobj=M("sellercommodity");
	    	$back=$sellerobj->deleteCommodity($id,$type);
	    	echo json_encode($back);
	    }

		private function showmessage($info){
			echo "<script>alert('$info');</script>";
			exit;
		}
}?>