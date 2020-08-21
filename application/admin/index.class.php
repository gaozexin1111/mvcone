<?php
if(!defined("MVC")){
    die("非法进入");
}
use \libs\smarty;
use \libs\db;
class index {
    function int(){
//        $smarty = new Smarty();
//        $smarty->setTemplateDir(TPL_PATH);
//        $smarty->setCompileDir(COMPILE_PATH);
//        $smarty->display("admin/login.html");

//        $this->smarty->display("admin/login.html");

        $smarty = new smarty();
        $smarty->display("admin/login.html");
    }

    function login(){
        //使用magic_quotes_sybase:off配置文件
        $username = addslashes($_POST["username"]);
        $pass = md5(md5($_POST["pass"]));

        if(strlen($username)<5||empty(pass)){
            echo "用户名或密码不符合规范";
            return ;
        }

//        $db = @new mysqli("localhost","root","gzx123456","wui2006","3308");
//        if($db->error){
//            die("数据库连接错误");
//        }
//
//        $db->query("set names utf8");

//        $db = $this->db;

        $database = new db();
        $db = $database->db;
        $result = $db->query("select * from mvc_user where username='$username' and pass='$pass'");

        if($result->num_rows<1){
            echo "没有相应的数据，请重新登录";
        }else{
            echo "chenggong";
            header("location:/八月/mvcone/index.php/admin/index/first");
        }

        $db->close();
    }


    function first(){
        echo "登录后台首页";
    }




}