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

		$this->getNews();

		$this->display('news');
	}

	//查询新闻
	public function getNews(){
		
		$_news = new  \Home\Model\NewsModel();
		$data_news = $_news->select();
		// var_dump($data_newstitle);
		// var_dump($data_news);
		$this->assign('news',$data_news);
	}
	
}