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

  //查询用户数据
  public function queryMember(){

  	//实例化
  	$member =  new \Home\Model\MemberModel();
  	//分页
  	$res_count= $member->where('u_quanxian=2')->count();
    $Page = new  \Think\Page($res_count,12);
    $show = $Page->show();// 分页显示输出

    $res = $member->limit($Page->firstRow.','.$Page->listRows)->where('u_quanxian=2')->order('u_id desc')->select();
    $this->assign('page',$show);
    $this->assign("list",$res);
  	// var_dump($data);exit();
  	// $this->assign('member',$data);
  }
  
  public function addMember(){
    
      
      $this->display('add');

  }
  //新增用户
  public function add(){

  $member =  new \Home\Model\MemberModel();

  // 根据表单提交的POST数据创建数据对象

    if(!$member->create()){   
         // 如果主键是自动增长型 成功后返回值就是最新插入的值       
       exit($member->getError());
     
        
    }else{
      //上传头像
       $this->upload();
       $member->add();
       $this->yiyuan_list();
    }

  }
  //上传图片的方法
  public function upload(){    

    $upload = new \Think\Upload();// 实例化上传类    

    $upload->maxSize   =     3145728 ;// 设置附件上传大小    
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
    $upload->savePath  =      './Uploads/'; // 设置附件上传目录    
    // 上传文件     
    $info   =   $upload->upload();    
    if(!$info) {// 上传错误提示错误信息        
      $this->error($upload->getError());    
    }else{
      $uploadList[0]['savename'];
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
  	$_id = $_POST['id'];
  	$_uname = $_POST['username'];
  	$_mingzi = $_POST['realname'];
  	$_kaitong = $_POST['status'];

	$member =  new \Home\Model\MemberModel();
  	$data = array("u_name"=>"$_uname","u_mingzi"=>"$_mingzi","u_kaitong"=>"$_kaitong");

  	
  	if($member->where("u_id=$_id")->setField($data)){
  		$this->yiyuan_list();
  	}
  }

  	public function deleteMember(){
  		$_id = $_GET['id'];
  		$member =  new \Home\Model\MemberModel();
  		if($member->where("u_id=$_id")->delete()){
			$this->success('删除成功','/index.php/Home/Member/admin_list');
		}
  	}

}