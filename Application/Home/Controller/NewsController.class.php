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
	//update news
	public function updateNews(){
		$this->getNews();
        $_open = D('config');
        $res = $_open->find();
        $this->assign("res",$res);
		$this->display('sysInfo');
	}
	public function update(){
		$_news = new  \Home\Model\NewsModel();
		$_news->create();
		
		$_open = D('config');
		$_open->create();
		$_open->save();
		$_news->save();
		$this->news();
	
	}
}