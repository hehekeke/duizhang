<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-10
 * Time: 下午1:40
 */
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{
	public function login(){
        $member =  new \Home\Model\MemberModel();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $res = $member->where("u_name='".$username."'")->select();
        $config = M('config');
        $res_config = $config->find();
       //$res_config['open']  是否是超级管理员
      if($res[0]['u_pass'] ==$password ){
          //这个用户名正确
          if($res[0]['u_quanxian']=='1'){
            //这个是超级管理员
              session('user',$res[0]);
              session('quanxian',$res[0]['u_quanxian']);
              echo 1;
          }else{
            //这个是一般用户
            if($res_config['open'] == '1'){
                //一般用户可以登录
                session('user',$res[0]);
                session('quanxian',$res[0]['u_quanxian']);
                echo 1;
            }else{
                //一般用户不能登录
                echo 2;
            }
          }
      }else{
          //这个是用户名 密码错误
          echo 0;
      }
	}
    public function toLogin(){
        $this->display("login");
    }
    public function logout(){
        session('user',null);
        $this->toLogin();
    }

}