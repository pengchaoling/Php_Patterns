<?php
/**
 * Author: Lying
 * Data: 2016-11-30
 * description: 图片工厂
 */
require_once 'Factory.class.php';
require_once 'Image.class.php';
require_once 'Down.class.php';
require_once 'PNG_Down.class.php';
require_once 'PNG.class.php';
class PNG_Facroty extends Factory{
	//图片信息对象
	public function getImage(){
		return new PNG();
	}
	//图片下载对象
	public function getDown(){
		return new 	PNG_Down();
	}

}

?>