<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/22
 * Time: 13:40
 */

namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{

    /*
     * 到达用户登录的页面
     */

    public  function index(){
        $this->display("login");
    }
    /*
     * 用户的登录
     */
    public function login(){
       $usrname = $_POST["username"];
       $pwd = $_POST["pwd"];
       $user = M("user");
       $res= $user->where("username='".$usrname."' and password='".$pwd."'")->find();
       if($res == null){
            $data["status"] = "0";
           $data["msg"] = "你的用户名或者密码错误";
           $data['data']="";
       }else if($res != null){
           $_SESSION['user'] = array('usernam'=>$usrname,'pwd'=>$pwd);
           $data["status"] = "1";
           $data["msg"] = "";
           $data['data']="";
       }
       echo json_encode($data);
    }
    /*
     * 退出登录 layout
     */
    public function layout(){
        unset($_SESSION['user']);
        $this->index();
    }
}