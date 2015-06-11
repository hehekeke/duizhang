<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/22
 * Time: 13:40
 */

namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller{
    // 到达  固定资产采购申请  页面

   public function header(){
       $this->display("header");
   }

    public function nav(){
        $this->display("nav");
    }
}