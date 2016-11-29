<?php
/**
 * Author: Lying
 * Data: 2016-11-29
 * description: 客户端使用工厂
 */
require "Factory.class.php";
$_png = Factory::getImage('123.png');
echo($_png->getWidth());
?>