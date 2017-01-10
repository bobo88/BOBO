<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once '../mysql_connect.php';
require_once '../inc_session.php';

if(isset($_SESSION['userid'])){
	if($currentNickname === '敲代码的怪蜀黍'){
		$userRights = 1;//用户权限1：表示超级管理员
	}else{
		$userRights = 0;//用户权限0：表示普通用户
	}
}else{
	//没有登录，跳转到登录页面
	// header("Location: http://www.yuanbo88.com/sign.html?ref=m-user-center.html\n");
	// exit;
	
	$_SESSION['userid'] = null;
}

//当前页面Url地址
$locationUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];

$userLeftBarNum = 0;

if(strpos($locationUrl ,'/user/my_profile.php') !== false){
	$userLeftBarNum = 1;
}else if(strpos($locationUrl ,'/user/article_publish.php') !== false){
	$userLeftBarNum = 2;
}else if(strpos($locationUrl ,'/user/m_home.php') !== false){
	$userLeftBarNum = 3;
}else if(strpos($locationUrl ,'/user/m_refbook.php') !== false){
	$userLeftBarNum = 4;
}else if(strpos($locationUrl ,'/user/m_wei.php') !== false){
	$userLeftBarNum = 5;
}else if(strpos($locationUrl ,'/user/m_demo.php') !== false){
	$userLeftBarNum = 6;
}else if(strpos($locationUrl ,'/user/m_about.php') !== false){
	$userLeftBarNum = 7;
}
//关闭数据库连接
$link->close(); 
?>