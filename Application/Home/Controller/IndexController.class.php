<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $user_session = session('user');
        if(empty($user_session)){
            $this->redirect('Login/toLogin');
        }else{
            $quanxian = session('quanxian');
            $this->assign("name",$user_session['u_name']);
            if($quanxian == '1'){
                $this->display("index");
            }else if($quanxian == '2'){
                $this->display("index_pt");
            }

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

	            $this->assign('username',S('u_name'));
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