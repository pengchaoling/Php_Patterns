<?php
/**
 * Author: Lying
 * Data: 2016-11-29
 * description: 客户端使用工厂
 */
require "PNG_Facroty.class.php";

$_factory = new PNG_Facroty();

//图片信息对象
$_png = $_factory->getImage();
echo $_png->getWidth();

//图片下载对象
$_pngDown = $_factory->getDown();
echo $_pngDown->getInfo();


?>