<?php
/**
 * Author: Lying
 * Data: 2016-11-29
 * description: 工厂类
 */
require 'Image.class.php';
require 'PNG.class.php';
require 'JPEG.class.php';
require 'GIF.class.php';

class Factory{
	public static function getImage($path){
		$file = pathinfo($path);
		switch ($file['extension']) {
			case 'png' :
				return new PNG();
				break;
			case 'jpg' :
				return new JPEG();
				break;
			case 'gif' :
				return new GIF();
				break;
		}
	}
}

?>