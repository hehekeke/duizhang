<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-10
 * Time: 下午1:40
 */
namespace Home\Controller;
use Think\Controller;

class AdminController extends Controller{

  public function admin_list(){

  	$this->queryAdmin();

    $this->display('admin_list');
  }

  //查询管理员数据
  public function queryAdmin(){

      //实例化
      $member =  new \Home\Model\AdminModel();
      //分页
      $res_count= $member->where('u_quanxian=1')->count();
      $Page = new  \Think\Page($res_count,5);
      $show = $Page->show();// 分页显示输出

      $res = $member->limit($Page->firstRow.','.$Page->listRows)->where('u_quanxian=1')->select();
      $this->assign('page',$show);
      $this->assign("list",$res);
      // var_dump($data);exit();
      // $this->assign('member',$data);
  }

//编辑用户信息
  public function editMember(){
    //
    $member =  new \Home\Model\MemberModel();
    $where = 'u_id='.$_GET['id'];
    $res = $member->where($where)->select();
    $this->assign('userinfo',$res);
    $this->display('edit');
  }

  public function submitEditMember(){
    $_id = $_POST['id'];
    $_uname = $_POST['username'];
    $_mingzi = $_POST['realname'];
    $_kaitong = $_POST['status'];

  $member =  new \Home\Model\MemberModel();
    $data = array("u_name"=>"$_uname","u_mingzi"=>"$_mingzi","u_kaitong"=>"$_kaitong");

    
    if($member->where("u_id=$_id")->setField($data)){
      $this->success('修改成功','/index.php/Home/Member/yiyuan_list');
    }
  }

    public function deleteMember(){
      $_id = $_GET['id'];
      $member =  new \Home\Model\MemberModel();
      if($member->where("u_id=$_id")->delete()){
      $this->success('删除成功','/index.php/Home/Member/yiyuan_list');
    }
    }

}