<?php
/**
 * Author: Lying
 * Data: 2016-11-29
 * description: 客户端使用工厂
 */
require "PNG_Facroty.class.php";
require "GIF_Facroty.class.php";
$_png = new PNG_Facroty();
echo($_png->getObj()->getWidth());


$_gif = new GIF_Facroty();
echo($_gif->getObj()->getWidth());

?>