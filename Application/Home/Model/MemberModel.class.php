<?php 
namespace Home\Model;
use Think\Model;
class MemberModel extends Model {
	 protected $trueTableName = 'user_db'; 
	 // $rules = array(
	 // 	//  array('u_name','require','用户名必须！'), //默认情况下用正则进行验证
	 // 	//  array('u_pass','require','密码必须！'), //默认情况下用正则进行验证
		//  // array('u_name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一    
		//  // // array('u_pass','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
		//  // array('u_name','checkName','帐号错误！',1,'function',4),  // 只在登录时候验证
		//  array('u_pass','checkPwd','密码错误！',1,'function',4), // 只在登录时候验证
	 // );

	
	
}