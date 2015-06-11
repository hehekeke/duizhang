<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-10
 * Time: 下午2:46
 */
namespace Home\Controller;
use Think\Controller;
class BillController extends Controller {
    public function Bill_list(){
        $duizhangdan = M("duizhangdan");
        $res_count= $duizhangdan->count();
        $Page = new  \Think\Page($res_count,5);
        $show = $Page->show();// 分页显示输出

        $res = $duizhangdan->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign("list",$res);
        $this->display("Bill_list");
    }

    public  function Bill_del(){
        $bill_id = $_POST['id'];
        $duizhangdan = M("duizhangdan");
        $result = $duizhangdan->where('id = '.$bill_id)->delete();
        if($result == false){
            return 0;
        }else{
            return 1;
        }
    }


    public function Bill_toupdate(){
        $bill_id = $_GET['id'];
        $duizhangdan = M("duizhangdan");
        $res = $duizhangdan->where('id = '.$bill_id)->find();
        $this->assign("data",$res);
        $this->display("Bill_update");
    }
}