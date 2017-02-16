<?php
/**
 * Author: Lying
 * Data: 2017-02-14
 * description: php实现适配器模式
 * 详解在我的博客：http://pengchaoling.com/a/subject/pattern/
 */

interface Target {
	//原来的类里面有的方法
	public function writeTxt();
	//需要扩展的新功能的方法
	public function writeXml();
}


class LogToTxt{
	//保存需要写入的信息
	private  $info;

	function __construct($info){
		$this->info = $info;
	}
	//把日志写到txt里
	public function writeTxt(){
		//本案例只是为了演示适配器的原理，这里不具体实现，有兴趣者可自行实现
		//doWrite
		echo "已经把信息：". $this->info."写入到txt文件中"; 

	}
}

//新建一个适配器 把新的功能写进去，并把之前那个继承过来
class LogAdapter extends LogToTxt implements Target{
	private  $info;
	private $Object;  //用来保存传过来的原来的类的对象

	function __construct($info,$Object){	
		$this->info = $info;
		$this->Object = $Object;
	}
	//直接继承自原来那个类的那啥
	public function writeTxt(){
		$this->Object->writeTxt();  //通过委托调用
	}

	//适配器中新增加的方法
	public function writeXml(){
		echo "已经把信息：". $this->info."写入到XML文件中"; 
	}
}


	//Client调用
	$log_to_txt = new LogToTxt("200 sussess");
	$logObj = new LogAdapter("404 not found",$log_to_txt);
	$logObj->writeXml();	//写到xml里
	$logObj->writeTxt();





?>
