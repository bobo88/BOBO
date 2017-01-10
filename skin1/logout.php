<?php
//使用session之前，必须先开启session
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 
$msg = array('status'=>0,'msg'=>'');

//注销session
//1、清空$_SESSION[]
unset($_SESSION['userid']);

//2、清空session文件
session_destroy();

//3、返回数据
$msg['msg'] = '注销成功!';
$msg['status'] = 1;
$str = json_encode($msg);
echo $str;
?>