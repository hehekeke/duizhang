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
        $time = date("Ym",time());
        $this->assign("time",$time);
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

    /*
     * 到达账单下载页面
     */
    public function Bill_toDown(){
        $this->display("Bill_Down");
    }
    /*
     * 账单下载
     */
    public function Bill_Down(){
        $xm_yuefen = $_POST['xm_yuefen'];
        $duizhangdan = M("duizhangdan");
        $res = $duizhangdan->where("xm_yuefen='".$xm_yuefen."'")->select();
        if(count($res) == 0){
            $this->assign('success',$xm_yuefen.'无账单数据');
            $this->display("Bill_Down");
        }else{
            $str = "译员名称\t项目编号\t项目名称\t翻译方向\t承接时间\t提交时间\t价格类型\t字数\t金额\t总价\t状态\t日期\t金额\t备注\n";
            $str = iconv('utf-8','gb2312',$str);
            $User = M("user_db");
            for($i=0;$i<count($res);$i++){
                $xm_id = iconv('utf-8','gb2312',$res[$i]['xm_id']);
                $xm_myd= iconv('utf-8','gb2312',$res[$i]['xm_myd']);
                $xm_fyfx = iconv('utf-8','gb2312',$res[$i]['xm_fyfx']);
                $xm_cjsj = iconv('utf-8','gb2312',$res[$i]['xm_cjsj']);
                $xm_tjsj = iconv('utf-8','gb2312',$res[$i]['xm_tjsj']);
                $danjia = iconv('utf-8','gb2312',"单价");
                $xm_zs = iconv('utf-8','gb2312',$res[$i]['xm_zs']);
                $xm_dj = iconv('utf-8','gb2312',$res[$i]['xm_dj']);
                $xm_je = iconv('utf-8','gb2312',$res[$i]['xm_je']);
                //这个是寻找对应的用户民称
                $user_data =$User->where("u_id=".$res[$i]['xm_userid'])->field("u_mingzi")->find();
                unset($xm_userid);
                $xm_userid = $user_data["u_mingzi"];
                $xm_userid = iconv('utf-8','gb2312',$xm_userid);


                $str .=  $xm_userid."\t".$xm_id ."\t".$xm_myd ."\t".$xm_fyfx."\t".$xm_cjsj."\t".$xm_tjsj."\t".
                    $danjia."\t".$xm_zs."\t".$xm_dj."\t".$xm_je."\t\n";
            }
            $filename = $xm_yuefen.'.xls';
            $this->exportExcel($filename,$str);
        }

    }

    function exportExcel($filename,$content){
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/vnd.ms-execl");
        header("Content-Type: application/force-download");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Content-Transfer-Encoding: binary");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $content;
    }

    /*
     * 到达账单删除页面
     */
    public function Bill_todel(){
        $time = date("Ym",time());
        $this->assign("time",$time);
        $this->display("Bill_del");
    }
    /*
     * 删除账单
     */
    public function bill_del_byDate(){
        $xm_yuefen = $_POST['xm_yuefen'];
        $duizhangdan = M("duizhangdan");
        $result = $duizhangdan->where("xm_yuefen = '".$xm_yuefen."'")->delete();
//        echo $duizhangdan->getLastSql();
        if($result == false){
           echo "删除错误";
        }else{
            //这个需要对跳转优化
            $this->assign('success','删除成功');
            $this->assign("time",$xm_yuefen);
            $this->display("Bill_del");
        }
    }
    /*
     * 下载模版
     */

    public function down_moban(){
        $file = "moban.xls";
        if(is_file($file)) {
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=".basename($file));
            readfile($file);
            exit;
        }else{
            echo "文件不存在！";
            exit;
        }
    }
    /*
     * 到达
     */
    public function Bill_tochange(){
     $this->display("Bill_change");
    }

    public function Bill_change(){
        $duizhangdan = M("duizhangdan");
        $duizhangdan->where('xm_fkzt=1')->save(array('xm_fkzt'=>'3'));
        echo 1;

    }
    /*
     * Bill_tickling  反馈页面
     */
    public function Bill_tickling(){

        $duizhangdan = M("duizhangdan");
        $User = M("user_db");
        $res_count= $duizhangdan->count();
        $Page = new  \Think\Page($res_count,8);
        $show = $Page->show();// 分页显示输出
        $res = $duizhangdan->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();

        for($i=0;$i<count($res);$i++){
            $user_data =$User->where("u_id=".$res[$i]['xm_userid'])->field("u_mingzi")->find();
            unset($res[$i]['xm_userid']);
            $res[$i]['xm_userid'] = $user_data["u_mingzi"];
        }
        $this->assign('page',$show);
        $this->assign("list",$res);

        $this->display("Bill_tickling");

    }
    /*
     * Bill_tickling_toupdate  反馈页面
     */
    public function  Bill_tickling_toupdate(){
        $bill_id = $_GET['id'];
        $duizhangdan = M("duizhangdan");
        $res = $duizhangdan->where('id = '.$bill_id)->order("id desc")->select();
        $this->assign("BillInfo",$res);
        $this->display("Bill_tickling_update");
    }
    public function Bill_tickling_update(){
        $duizhangdan = M("duizhangdan");
        $duizhangdan->create();
        $duizhangdan->save();
        $this->Bill_tickling();
    }

    public function Bill_benqi_list(){
        $user = session('user');
        $duizhangdan = M("duizhangdan");
        $User = M("user_db");
        $res_count= $duizhangdan->where("xm_userid=".$user['u_id'])->count();
        $Page = new  \Think\Page($res_count,8);
        $show = $Page->show();// 分页显示输出
        $res = $duizhangdan->where("xm_userid=".$user['u_id'])->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();

        for($i=0;$i<count($res);$i++){
            $user_data =$User->where("u_id=".$res[$i]['xm_userid'])->field("u_mingzi")->find();
            unset($res[$i]['xm_userid']);
            $res[$i]['xm_userid'] = $user_data["u_mingzi"];
        }
        $this->assign('page',$show);
        $this->assign("list",$res);

        $this->display("Bill_benqi_list");
    }

    public function Bill_confirm(){
        $id = $_POST['id'];
        $duizhangdan = M("duizhangdan");
        $data['xm_fkzt'] = '1';
        $duizhangdan->where('id='.$id)->data($data)->save();
        echo 1;
    }
    public function Bill_fankui(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $data['xm_fkzt'] = '2';
        $data['xm_fkyy'] = $name;
        $duizhangdan = M("duizhangdan");
        $duizhangdan->where('id='.$id)->data($data)->save();
        echo 1;
    }

    public function Bill_all_list(){
        $user = session('user');
        $duizhangdan = M("duizhangdan");
        $User = M("user_db");
        $conditon['xm_userid'] = $user['u_id'];
        $res_count= $duizhangdan->where($conditon)->count();
        $Page = new  \Think\Page($res_count,8);
        $show = $Page->show();// 分页显示输出
        $res = $duizhangdan->where($conditon)->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();
        for($i=0;$i<count($res);$i++){
            $user_data =$User->where("u_id=".$res[$i]['xm_userid'])->field("u_mingzi")->find();
            unset($res[$i]['xm_userid']);
            $res[$i]['xm_userid'] = $user_data["u_mingzi"];
        }
        $this->assign('page',$show);
        $this->assign("list",$res);

        $this->display("Bill_all_list");

}


    public function Bill_yijie_pt(){
        $user = session('user');
        $duizhangdan = M("duizhangdan");
        $User = M("user_db");
        $conditon['xm_userid'] = $user['u_id'];
        $conditon['xm_fkzt'] = "3";
        $res_count= $duizhangdan->where($conditon)->count();
        $Page = new  \Think\Page($res_count,8);
        $show = $Page->show();// 分页显示输出
        $res = $duizhangdan->where($conditon)->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();

        for($i=0;$i<count($res);$i++){
            $user_data =$User->where("u_id=".$res[$i]['xm_userid'])->field("u_mingzi")->find();
            unset($res[$i]['xm_userid']);
            $res[$i]['xm_userid'] = $user_data["u_mingzi"];
        }
        $this->assign('page',$show);
        $this->assign("list",$res);

        $this->display("Bill_yijie_pt");
    }

    public function Bill_fk_list(){
        $user = session('user');
        $duizhangdan = M("duizhangdan");
        $User = M("user_db");
        $conditon['xm_userid'] = $user['u_id'];
        $conditon['xm_fkzt'] = "2";
        $res_count= $duizhangdan->where($conditon)->count();
        $Page = new  \Think\Page($res_count,8);
        $show = $Page->show();// 分页显示输出
        $res = $duizhangdan->where($conditon)->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();

        for($i=0;$i<count($res);$i++){
            $user_data =$User->where("u_id=".$res[$i]['xm_userid'])->field("u_mingzi")->find();
            unset($res[$i]['xm_userid']);
            $res[$i]['xm_userid'] = $user_data["u_mingzi"];
        }
        $this->assign('page',$show);
        $this->assign("list",$res);

        $this->display("Bill_yijie_pt");
    }
    public function Bill_confirm_list(){
        $user = session('user');
        $duizhangdan = M("duizhangdan");
        $User = M("user_db");
        $conditon['xm_userid'] = $user['u_id'];
        $conditon['xm_fkzt'] = "1";
        $res_count= $duizhangdan->where($conditon)->count();
        $Page = new  \Think\Page($res_count,8);
        $show = $Page->show();// 分页显示输出
        $res = $duizhangdan->where($conditon)->limit($Page->firstRow.','.$Page->listRows)->order("id desc")->select();

        for($i=0;$i<count($res);$i++){
            $user_data =$User->where("u_id=".$res[$i]['xm_userid'])->field("u_mingzi")->find();
            unset($res[$i]['xm_userid']);
            $res[$i]['xm_userid'] = $user_data["u_mingzi"];
        }
        $this->assign('page',$show);
        $this->assign("list",$res);

        $this->display("Bill_confirm_pt");
    }

}