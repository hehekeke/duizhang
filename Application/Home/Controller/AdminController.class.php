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

   //账号状态禁止
  public function ban(){
    $member =  new \Home\Model\MemberModel();
    $_id = $_GET['id'];
    $data = array("u_kaitong"=>0);

    if($member->where("u_id=$_id")->setField($data)){
      $this->admin_list();
    }
  }
  //账号状态开通
  public function recover(){
      $member =  new \Home\Model\MemberModel();
      $_id = $_GET['id'];
      $data = array("u_kaitong"=>1);

      if($member->where("u_id=$_id")->setField($data)){
        $this->admin_list();
      }
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
  }

    public function addMember(){
    
      
      $this->display('add');

  }
  //新增用户
  public function add(){
      $member =  new \Home\Model\MemberModel();

      if(!$member->create()){
          exit($member->getError());
      }else{
          if( $member->u_pic == null){
              $member->add();
              $this->Admin_list();
          }else{
              $this->upload($member);
              $member->add();
              $this->Admin_list();
          }
      }
  }

  //上传图片的方法
  public function upload($member){    

    $upload = new \Think\Upload();// 实例化上传类    

    $upload->maxSize   =     3145728 ;// 设置附件上传大小    
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
    $upload->savePath  =      '/Uploads/'; // 设置附件上传目录    
    // 上传文件     
    $info = $upload->upload();    
  
    if(!$info) {// 上传错误提示错误信息
//      $this->error($upload->getError());
      $this->addMember();
    }else{
       foreach($info as $file){
         $member->u_pic = $file['savepath'].$file['savename'];
        }

    }
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

    $member =  new \Home\Model\MemberModel();

    $member->create();

    if($member->save()){
      $this->admin_list();
    }else{
      $this->error($member->getError()); 
    }
  }

    public function deleteMember(){
      $_id = $_POST['id'];
      $member =  new \Home\Model\MemberModel();
      if($member->where("u_id=$_id")->delete()){
        echo 0;
    }else{
          echo 1;
      }

    }



}