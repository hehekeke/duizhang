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
        $User = M("user_db");
        $res_count= $duizhangdan->count();
        $Page = new  \Think\Page($res_count,10);
        $show = $Page->show();// 分页显示输出
        $res = $duizhangdan->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();

        for($i=0;$i<count($res);$i++){
            $user_data =$User->where("u_id=".$res[$i]['xm_userid'])->field("u_mingzi")->find();
            unset($res[$i]['xm_userid']);
            $res[$i]['xm_userid'] = $user_data["u_mingzi"];
        }
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
        $xm_username = $_GET['xm_userid'];//这个是用户名称
        $xm_user_id = '';
        $xm_id = $_GET['xm_id'];//这个项目编号
        if(!empty($xm_username)){
            $User = M("user_db");
            $user_data =$User->where("u_mingzi='".$xm_username."'")->field("u_id")->find();
            $xm_user_id = $user_data['u_id'];
        }
        if(empty($xm_user_id) && empty($xm_id)){
            $condition['1'] = '1';
        }else if(!empty($xm_user_id) && empty($xm_id) ){
            $condition['xm_userid'] = $xm_user_id;
        }else if(empty($xm_user_id) && !empty($xm_id) ){
            $condition['xm_id'] = $xm_id;
        }else if(!empty($xm_user_id) && !empty($xm_id) ){
            $condition['xm_userid'] = $xm_user_id;
            $condition['xm_id'] = $xm_id;
        }

        $res_count= $duizhangdan->where($condition)->count();

        $Page = new  \Think\Page($res_count,10);
        $show = $Page->show();// 分页显示输出
        $map['xm_userid'] = $_GET['xm_userid'];
        $map['xm_id'] = $_GET['xm_id'];
        foreach($map as $key=>$val) {
            $Page->parameter .= "$key=".urlencode($val)."&";
        }
        $res = $duizhangdan->where($condition)->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();
        $User = M("user_db");
        for($i=0;$i<count($res);$i++){
            $user_data =$User->where("u_id=".$res[$i]['xm_userid'])->field("u_mingzi")->find();
            unset($res[$i]['xm_userid']);
            $res[$i]['xm_userid'] = $user_data["u_mingzi"];
        }
        $this->assign('xm_id',$xm_id);
        $this->assign('xm_userid',$xm_username);
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


    /*
     * 到达 对账单导入
     */
    public function to_import(){
        $this->display("import");
    }
    /*
     * 到达  对账单
     */
    public function import(){
        require_once 'reader.php';
        $data_exl = new \Spreadsheet_Excel_Reader();
        $data_exl->setOutputEncoding('UTF-8');
        $tmp = $_FILES['import'];
        if (empty ($tmp['name'])) {
            echo '请选择要导入的Excel文件！';
            exit;
        }
        $data_exl->read($tmp["tmp_name"]);
        $list=array();
        for ($i = 2; $i <= $data_exl->sheets[0]['numRows']; $i++) {
            $data['xm_userid'] = $data_exl->sheets[0]['cells'][$i][1];
            $data['xm_id'] = $data_exl->sheets[0]['cells'][$i][2];
            $data['xm_myd'] = $data_exl->sheets[0]['cells'][$i][3];
            $data['xm_cjfw'] = $data_exl->sheets[0]['cells'][$i][4];
            $data['xm_fyfx'] = $data_exl->sheets[0]['cells'][$i][5];
            $data['xm_cjsj'] = $data_exl->sheets[0]['cells'][$i][6];
            $data['xm_tjsj'] = $data_exl->sheets[0]['cells'][$i][7];
            $data['xm_dj'] = $data_exl->sheets[0]['cells'][$i][8];
            $data['xm_zs'] = $data_exl->sheets[0]['cells'][$i][9];
            $data['xm_je'] = $data_exl->sheets[0]['cells'][$i][10];
            array_push($list,$data);
        }
        $this->assign("list",$list);
        $this->display("import_data_list");
    }

}