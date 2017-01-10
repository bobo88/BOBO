<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//取得微话题的数据
$weibimg = isset($_REQUEST['weibimg']) ? $_REQUEST['weibimg'] : 1;                             //请输入微话题的大banner图
$weilimg = isset($_REQUEST['weilimg']) ? $_REQUEST['weilimg'] : 1;                             //请输入微话题的小banner图
$weisummary = addslashes(isset($_REQUEST['weisummary']) ? $_REQUEST['weisummary'] : '');       //请输入微话题的简介
$weititle = addslashes(isset($_REQUEST['weititle']) ? $_REQUEST['weititle'] : '');             //请输入微话题的标题

//处理插入结果
$sql = "INSERT INTO wei_topic(bimg, limg, summary, title) VALUES('".$weibimg."', '".$weilimg."', '".$weisummary."', '".$weititle."')";//插入微话题数据
$results = $link->query($sql);
if($results){
    $msg['msg'] = '微话题新增成功!';
    $msg['status'] = 1;
    $str = json_encode($msg);
    echo $str;
}else{
    $msg['msg'] = '微话题新增失败!'.$link->error;
    $msg['status'] = 0;
    $str = json_encode($msg);
    echo $str;
}

 

//关闭数据库连接
$link->close();

exit(); 
?>