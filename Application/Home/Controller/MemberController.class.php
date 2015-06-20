<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-10
 * Time: 下午1:40
 */
namespace Home\Controller;
use Think\Controller;

class MemberController extends Controller{

  public function yiyuan_list(){
    $this->queryMember();
    $this->display('yiyuan_list');
  }

  //账号状态禁止
  public function ban(){

    $member =  new \Home\Model\MemberModel();
    $_id = $_GET['id'];
    $data = array("u_kaitong"=>0);
    
    if($member->where("u_id=$_id")->setField($data)){
      $this->yiyuan_list();
    }
  }
  
  //账号状态开通
  public function recover(){

    $member =  new \Home\Model\MemberModel();
    $_id = $_GET['id'];
    $data = array("u_kaitong"=>1);

    if($member->where("u_id=$_id")->setField($data)){
      $this->yiyuan_list();
    }
  }

  //查询用户数据
  public function queryMember(){

  	$member =  new \Home\Model\MemberModel();
  	$res_count= $member->where('u_quanxian=2')->count();
    $Page = new  \Think\Page($res_count,12);
    $show = $Page->show();
    $res = $member->limit($Page->firstRow.','.$Page->listRows)->where('u_quanxian=2')->order('u_id desc')->select();
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
      //上传头像
        if( $member->u_pic == null){
            $member->add();
            $this->yiyuan_list();
        }else{
            $this->upload($member);
            $member->add();
            $this->yiyuan_list();
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
    if(!$info) {
//      $this->error($upload->getError());
      $this->addMember();  
    }else{
       foreach($info as $file){
         $member->u_pic = $file['savepath'].$file['savename'];
       }
    }
  }

//搜索
  public function search(){

    $member =  new \Home\Model\MemberModel();
    $where['u_name']=array('like',"%{$_GET['u_name']}%");
    $data = $member->where($where)->select();
    $this->assign('list',$data);
    $this->display('yiyuan_list');
  }

//编辑用户信息
  public function editMember(){
  	
  	$member =  new \Home\Model\MemberModel();
  	$where = 'u_id='.$_GET['id'];
  	$res = $member->where($where)->select();
  	$this->assign('userinfo',$res);
  	$this->display('edit');
  }

//提交编译好的用户信息
  public function submitEditMember(){

	  $member =  new \Home\Model\MemberModel();
    $member->create();

  	if($member->save()){
  		$this->yiyuan_list();
  	}else{
      $this->error($member->getError()); 
    }
  }

	public function deleteMember(){
		$_id = $_GET['id'];
		$member =  new \Home\Model\MemberModel();
		if($member->where("u_id=$_id")->delete()){
		  $this->yiyuan_list();
	  }
	}

  //个人信息模块
  public function personal(){
    $this->queryPersonal();
    $this->display('personal');
  }

  //查询个人信息
  public function queryPersonal(){

    $member =  new \Home\Model\MemberModel();
    $user_session = session('user');
    $name = $user_session['u_name'];
    $res = $member->where("u_name='$name'")->select();
    
    $this->assign("list",$res);
  }

  //编辑个人信息
  public function editPersonal(){
    
    $member =  new \Home\Model\MemberModel();
    $where = 'u_id='.$_GET['id'];
    $res = $member->where($where)->select();
    $this->assign('userinfo',$res);
    $this->display('personal_edit');
  }

  //提交更改
  public function submitPersonalEdit(){

    $member =  new \Home\Model\MemberModel();
    $member->create();

    if($member->save()){
      $this->personal();
    }else{
      $this->error($member->getError()); 
    }
  }
  
}