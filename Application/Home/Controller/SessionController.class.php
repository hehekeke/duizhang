<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/22
 * Time: 13:40
 */

namespace Home\Controller;
use Think\Controller;

class SessionController extends Controller{
    function __construct() {
        parent::__construct();
        if($_SESSION['user'] != null){
            return true;
        }else{
            $this->redirect('User/index');
        }
    }
}