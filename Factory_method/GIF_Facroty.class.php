<?php
/**
 * Author: Lying
 * Data: 2016-11-30
 * description: 图片工厂
 */
require_once 'Factory.class.php';
require_once 'Image.class.php';
require 'GIF.class.php';
class GIF_Facroty extends Factory{

	public function getObj(){
		return new GIF();
	}
}

?>