<?php
/**
 * Author: Lying
 * Data: 2016-11-26
 * description: 单例模式数据库类
 */	
class DB{
	//静态成员变量，用来返回对象
	private static $_instance;
	//私有变量 用来保存连接信息
	private $link;
	//私有的构造方法，防止类在外部被实例化
	private function __construct(){
			//创建新连接
			$this->link = new mysqli('localhost','root','','caiji','3306');
			//数据库链接错误
			if($this->link->connect_error){
				echo "数据库链接错误"; die;
			} 	
			//数据库编码
			$this->link->set_charset('uft-8');

	}

	//私有的克隆方法，防止被克隆
	private function __clone(){}

	//返回对象
	public static function getLink(){
		if(is_null(self::$_instance)){
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	//查询方法
	public function query($sql){
		
		$result = $this->link->query($sql);
		//出错
		if($this->link->errno){
			print('Mysql错误：'.$this->link->error.'<br>SQL: '.$sql);
			die;
		} 
		//把结果集组装成数组返回
		while($row = $result->fetch_assoc()){
			$rows[] = $row;
		}
		//释放结果集
		$result->free();
		return $rows;
	}

}

//使用例子
$M = DB::getLink();
$ifis = $M->query("select * from iris");
print_r($ifis);
?>

