<?php
//引入数据库配置文件
require_once 'db_config.php';
//1.连接数据库
$link = new mysqli($db_info['db_host'] . ':' . $db_info['db_port'], $db_info['db_user'], $db_info['db_pswd']);
if(false == $link){
	die("数据库连接失败： ".mysqli_error());
}
//2.1选择数据库
$link->select_db($db_info['db_name']) or die('select db error: '.mysqli_error());
//2.2设置数据库连接所采用的字符编码
$link->set_charset($db_info['db_charset']);
?>