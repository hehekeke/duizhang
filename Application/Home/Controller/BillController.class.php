<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-13
 * Time: 下午2:46
 */
namespace Home\Controller;
use Think\Controller;
class BillController extends Controller {
    public function Bill_list(){
        $duizhangdan = M("duizhangdan");
        $res_count= $duizhangdan->count();
        $Page = new  \Think\Page($res_count,10);
        $show = $Page->show();// 分页显示输出
        $res = $duizhangdan->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();
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



    public function queryBill(){
        $duizhangdan = M("duizhangdan");
        $xm_yuefen = $_GET['xm_yuefen'];
        if(empty($xm_yuefen)){
            $res_count= $duizhangdan->count();
        }else{
            $res_count= $duizhangdan->where("xm_yuefen ='".$xm_yuefen."'")->count();
        }

        $Page = new  \Think\Page($res_count,10);
        $show = $Page->show();// 分页显示输出
        $map['xm_yuefen'] = $_GET['xm_yuefen'];

        foreach($map as $key=>$val) {
            $Page->parameter .= "$key=".urlencode($val)."&";
        }
        if(empty($xm_yuefen)){
            $res = $duizhangdan->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();
        }else{
            $res = $duizhangdan->where("xm_yuefen ='".$xm_yuefen."'")->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();
        }
        $this->assign('xm_yuefen',$xm_yuefen);
        $this->assign('page',$show);
        $this->assign("list",$res);
        $this->display("Bill_list");
    }
    /*
     * 到达修改页面
     */

    public function Bill_toupdate(){
        $bill_id = $_GET['id'];
        $duizhangdan = M("duizhangdan");
        $res = $duizhangdan->where('id = '.$bill_id)->order("id desc")->select();
        $this->assign("BillInfo",$res);
        $this->display("Bill_update");
    }
    /*
     * 修改
     */
    public function Bill_update(){
        $duizhangdan = M("duizhangdan");
       $duizhangdan->create();
        $duizhangdan->save();
        $this->Bill_list();
    }
}