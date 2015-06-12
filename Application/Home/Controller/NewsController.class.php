<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-6-10
 * Time: 下午1:40
 */
namespace Home\Controller;
use Think\Controller;

class NewsController extends Controller{

	public function news(){

		$this->display('news');
	}

	//查询新闻
	public function getNews(){
		
	}
	
}