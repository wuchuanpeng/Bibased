<?php
    session_start();

    /**
    *@作者(author) SamanLan
    *生成验证码，支持全数字，全英文，英文+数字，算术验证码
    *生成图片格式：png
    *使用方法：在图片路径写"该文件路径+文件名.php?code_type=值&width=值&height=值&code_num=值
    *@param integer code_type 验证码类型，1数字，2英文，3英文+数字，4算术，5前面所有随机
    *@param integer width 宽度
    *@param integer height 高度，不能低于30，否则显示有问题
    *@param integer code_num 验证码位数，最多为6，算术验证码只有两个数操作
    */
    class check_code{
        static private $image;
        static private $width;
        static private $height;
        static public $value="";
        static private $font_address="fonts/arial.ttf";//字体文件地址

        //生成数字验证码时高度不能低于30
        static public function get_image($code_type,$width,$height,$code_num){
            //=$_SESSION['code'];

            if(!is_numeric($width)||!is_numeric($height)||!is_numeric($code_type)||!is_numeric($code_num)){
                exit;
            }
            if($code_num>7)
                $code_num=7;

            self::$width=$width;
            self::$height=$height;
            self::$image=imagecreatetruecolor($width,$height);//创建一张图片，默认输出黑色背景
            $bgcolor=imagecolorallocate(self::$image,255,255,255);//申请颜色
            imagefill(self::$image,0,0,$bgcolor);//区域填充
            do{
                $bool=false;
                if($code_type==1)
                    self::code_num($code_num);
                else if($code_type==2)
                    self::code_letter($code_num);
                else if($code_type==3)
                    self::code_letter_num($code_num);
                else if($code_type==4)
                    self::arithmetic();
                else if($code_type==5){
                    $code_type=rand(1,4);
                    $bool=true;
               } 
            }while($bool);
            self::draw_point();
            self::draw_line();

            $_SESSION['password_code']=self::$value;


            header('content-type:image/png');//输出图片前必须输出图片header信息
            imagepng(self::$image);//输出图片

            imagedestroy($image);//释放资源
        }

        /*
        *画干扰点
        */
        static private function draw_point(){
            for($i=0;$i<self::$width*self::$height/20;$i++){
                $pointcolor=imagecolorallocate(self::$image,rand(50,200),rand(50,200),rand(50,200));//50,200是代表随机的浅色颜色
                imagesetpixel(self::$image,rand(1,self::$width),rand(1,self::$height),$pointcolor);
            }
        }

        /*
        *画干扰线
        */
        static private function draw_line(){
            for($i=0;$i<4;$i++){
                $linecolor=imagecolorallocate(self::$image,rand(80,220),rand(80,220),rand(80,220));//80,220是代表随机的更浅色颜色
                imageline(self::$image,rand(1,self::$width),rand(1,self::$height),rand(1,self::$width),rand(1,self::$height),$linecolor);
            }
        }

        /*
        *数字随机验证码
        *@param integer $num 产生多少位的随机数验证码
        */
        static private function code_num($num){
            for($i=0;$i<$num;$i++){
                $fontsize=self::$height>self::$width/$num?self::$width/$num-20:self::$height-20;//字体大小
                if($fontsize<12){
                    $fontsize=16;
                }
                $fontcolor=imagecolorallocate(self::$image,rand(0,120),rand(0,120),rand(0,120));//0,120是代表随机的深色颜色
                self::$value.=$fontcontent=rand(0,9);//0-9随机数内容
                $x=$i*self::$width/$num+rand(5,10);//x坐标
                $y=rand(self::$height-20,self::$height-10);
                $anger=rand(-20,20);
                ImageTTFText(self::$image,$fontsize,$anger,$x,$y,$fontcolor,self::$font_address,$fontcontent);
            }
        }

        /*
        *英文随机验证码
        *@param integer $num 产生多少位的随机英文验证码
        */
        static private function code_letter($num){
            $data="abcdefghjkmnopqrstuvwxyABCDEFGHJKMNPQRSTUVWXYZ";
            for($i=0;$i<$num;$i++){
                $fontsize=self::$height>self::$width/$num?self::$width/$num-20:self::$height-20;//字体大小
                if($fontsize<12){
                    $fontsize=16;
                }
                $fontcolor=imagecolorallocate(self::$image,rand(0,120),rand(0,120),rand(0,120));//0,120是代表随机的深色颜色
                $fontcontent=substr($data,rand(0,strlen($data)-1),1);//随机英文内容
                if(is_numeric($fontcontent)){
                    self::$value.=$fontcontent;//随机英文内容
                }else{
                    self::$value.=strtolower($fontcontent);//随机英文内容
                }
                $x=$i*self::$width/$num+rand(5,10);//x坐标
                $y=rand(self::$height-20,self::$height-10);
                $anger=rand(-20,20);
                ImageTTFText(self::$image,$fontsize,$anger,$x,$y,$fontcolor,self::$font_address,$fontcontent);
            }
        }

        /*
        *英文和数字随机验证码
        *@param integer $num 产生多少位的随机英文和数字验证码
        */
        static private function code_letter_num($num){
            $data="abcdefghjkmnopqrstuvwxyABCDEFGHJKMNPQRSTUVWXYZ23456789";
            for($i=0;$i<$num;$i++){
                $fontsize=self::$height>self::$width/$num?self::$width/$num-20:self::$height-20;//字体大小
                if($fontsize<12){
                    $fontsize=16;
                }
                $fontcolor=imagecolorallocate(self::$image,rand(0,120),rand(0,120),rand(0,120));//0,120是代表随机的深色颜色
                $fontcontent=substr($data,rand(0,strlen($data)-1),1);//随机英文数字内容
                if(is_numeric($fontcontent)){
                    self::$value.=$fontcontent;//随机英文数字内容
                }else{
                    self::$value.=strtolower($fontcontent);//随机英文数字内容
                }
                $x=$i*self::$width/$num+rand(5,10);//x坐标
                $y=rand(self::$height-20,self::$height-10);
                $anger=rand(-20,20);
                ImageTTFText(self::$image,$fontsize,$anger,$x,$y,$fontcolor,self::$font_address,$fontcontent);
            }
        }

        /*
        *算术验证码
        */
        static private function arithmetic(){
            $fontsize=self::$height>self::$width/4?self::$width/4-20:self::$height-20;//字体大小
                if($fontsize<12){
                    $fontsize=16;
                }
            $fontcolor=imagecolorallocate(self::$image,rand(0,120),rand(0,120),rand(0,120));//0,120是代表随机的深色颜色
            $how="+-*";
            $fontcontent=rand(0,9);//0-9随机数内容
            $how=substr($how,rand(0,2),1);
            $fontcontent_1=rand(0,9);//0-9随机数内容
            $x=self::$width/4;//x坐标
            $y=rand(self::$height-20,self::$height-10);
            $anger=rand(-20,20);
            ImageTTFText(self::$image,$fontsize,$anger,$x*0+rand(5,10),$y,$fontcolor,self::$font_address,$fontcontent);
            $anger=rand(-20,20);
            ImageTTFText(self::$image,$fontsize,$anger,$x*1+rand(5,10),$y,$fontcolor,self::$font_address,$how);
            $anger=rand(-20,20);
            ImageTTFText(self::$image,$fontsize,$anger,$x*2+rand(5,10),$y,$fontcolor,self::$font_address,$fontcontent_1);
            $anger=rand(-20,20);
            ImageTTFText(self::$image,$fontsize,$anger,$x*3+rand(5,10),$y,$fontcolor,self::$font_address,"=");
            if($how=="+"){
                self::$value=$fontcontent+$fontcontent_1;
            }else if($how=="-"){
                self::$value=$fontcontent-$fontcontent_1;
            }else if($how=="*"){
                self::$value=$fontcontent*$fontcontent_1;
            }
        }
    }
    if(isset($_GET['code_type'])){
        check_code::get_image($_GET['code_type'],$_GET['width'],$_GET['height'],$_GET['code_num']);
    }
?>

