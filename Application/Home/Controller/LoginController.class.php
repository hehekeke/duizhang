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

		$this->display();
	}
	//退出
	public function logout(){
		S('username',null);
		$this->display('login');
	}
}