<?php 
	class usershopController{
		public function __construct(){
			if(!(isset($_SESSION['loginuser']))){
				header("Location:admin.php");
				exit;
			}
		}
		//引入usershop页面
		function index(){
			VIEW::display('buyer/user-shop.php');
		}

		function clickRestaurant(){
			VIEW::display('buyer/restaurant.php');
		}

	}
 ?>