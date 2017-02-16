<?php
/**
 * Author: Lying
 * Data: 2016-11-29
 * description: 工厂的工厂
 */
//只有抽象方法的类必须要定义为诶抽象类
abstract class Factory{
	//获取图片的对象
	public abstract function getImage();
	//获取下载对象
	public abstract function getDown();
}

?>