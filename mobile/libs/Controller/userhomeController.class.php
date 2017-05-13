<?php 
	/**
	* 
	*/
	class userhomeController 
	{
		public $userId;
		public $userObj;
		public function __construct(){
			if(!(isset($_SESSION['loginuser']))){
				header("Location:admin.php");
				exit;
			}else{
				$this -> userId = isset($_SESSION['buyer_id']) ? $_SESSION['buyer_id'] : array();
                $this -> userObj = M('userhome');
			}
		}

        /**
         * 加载user-home的页面
         */
		public function index(){
			$back = $this -> userObj -> userMsg($this->userId);
			VIEW::assign(array('userImg' => $back['B_ImgUrl'],
							   'userName' => $back['B_Name']));
			VIEW::display('buyer/user-home.php');
		}

        /**
         * 修改用户信息
         */
		function userMessage(){
			$back = $this -> userObj -> userMsg($this->userId);
			VIEW::assign(array('userImg' => $back['B_ImgUrl'],
							   'userName' => $back['B_Name'],
							   'userTel' => $_SESSION['loginuser']));
			VIEW::display('buyer/home-msgmod.php');
		}
		function modName(){;
			$back = $this -> userObj ->userMsg($this->userId);
			VIEW::assign(array('userName' => $back['B_Name']));
			VIEW::display('buyer/msgmod-mod.php');
		}
		function save_newName(){
			$backvalue = array();
			$newName = $_POST['newname'];
            $this -> userObj ->saveNewName($newName,$this->userId);
			echo json_encode($backvalue);
		}

		function modPassword(){
			VIEW::display('buyer/msgmod-mod.php');
		}

        /**
         * 保存新密码
         */
		function save_newPassword(){
			$backvalue = array();
			$oldPsd = $_POST['oldpwd'];
			$newPsd = $_POST['newpwd'];
			$backvalue = $this -> userObj -> saveNewPassword($oldPsd,$newPsd,$this->userId);
			echo json_encode($backvalue);
		}
		function user_loginOut(){
			$_SESSION['buyer_id'] = "";
			$_SESSION['loginuser'] = "";
			header("Location:admin.php");
		}

		function location_Myevaluate(){
            $back = $this -> userObj -> getEvaluateList($this->userId);
            $back['buyerMsg']['count'] = count($back['evalList']);
            $star = array(1,1,1,1,1);
            VIEW::assign(array('buyerMsg' => $back['buyerMsg'],
                               'evalList' => $back['evalList'],
                                'star' => $star));
			VIEW::display('buyer/home-myevaluate.php');
		}

		function location_Mycollection(){
			VIEW::display('buyer/home-collection.php');
		}
		function location_Myaddr(){
			VIEW::display('buyer/home-myaddr.php');
		}
		function location_myaddrMod(){
			VIEW::display('buyer/myaddr-modaddr.php');
		}
		
		function location_myaddrAdd(){
			VIEW::display('buyer/myaddr-newaddr.php');
		}
		function location_MyComments(){
		    $idtype = 1;
		    VIEW::assign(array('idtype' => $idtype));
			VIEW::display('buyer/home-comments.php');
		}

        /**
         * 保存用户反馈信息
         */
		function saveUserMsg(){
            $backvalue = $this -> userObj ->saveUserMsg($_POST['usercomment'],$_POST['usertel'],$this->userId);
            echo json_encode($backvalue);
        }

		function location_MyTalkbox(){
			VIEW::display('buyer/home-talkbox.php');
		}
		function location_talkbox(){
			VIEW::display('buyer/talkbox-talk.php');
		}

        /**
         * 更改头像
         */
		function uploadUserImg(){
            $newImg = $_FILES['upload-img'];
            $indexObj = M("index");
            $newImg = $indexObj -> upload_imag($newImg);
            $back = $this -> userObj -> uploadUserImg($newImg,$this->userId);
            if($back){
                header("Location:admin.php?controller=userhome&method=userMessage");
            }

        }

	}

 ?>