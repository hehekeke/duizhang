<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if ($this->checklogin()) {
    	
       		$this->display("Index");
    	}else{
    		$this->redirect('/Home/Login/login');
    	}
    }

    //验证登录
    function checklogin(){
      
        if(empty($_POST)){
            return false;
	    }else{
	        $info = new \Home\Model\MemberModel();
	        $res=$info->select();
	        $u_name=$_POST['u_name'];
	        $u_pass=$_POST['u_pass'];
	        $ver=0;
	        foreach($res as $key => $value){
	            if($res[$key]['u_name']==$u_name&&$res[$key]['u_pass']==$u_pass){
	                $ver++;
	            }
	        }
	        if($ver){
	            S('u_name',$u_name);
	            // S('u_pass',$u_pass);
	            $this->assign('username',S('u_name'));
	            // $this->assign('password',S('u_pass'));
	            return true;
	            // $this->success("登录成功",U('Index/index'));
	        }else{
	            // echo "<h5 style="'color:" black;'="">用户名或密码错误</h5>";
	            $this->assign("error_info","用户名或密码错误");
	            return false;
	        }
    	}
    }
}