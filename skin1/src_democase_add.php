<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//取得演示案例的数据
$democaseurl = isset($_REQUEST['democaseurl']) ? $_REQUEST['democaseurl'] : 1;                             //请输入演示案例的url地址
$democaseimg = isset($_REQUEST['democaseimg']) ? $_REQUEST['democaseimg'] : 1;                             //请输入演示案例的小banner图
$democasetitle = addslashes(isset($_REQUEST['democasetitle']) ? $_REQUEST['democasetitle'] : '');          //请输入演示案例的标题

//处理插入结果
$sql = "INSERT INTO democase(demoUrl, demoImg, title) VALUES('".$democaseurl."', '".$democaseimg."', '".$democasetitle."')";//插入演示案例数据
$results = $link->query($sql);
if($results){
    $msg['msg'] = '演示案例新增成功!';
    $msg['status'] = 1;
    $str = json_encode($msg);
    echo $str;
}else{
    $msg['msg'] = '演示案例新增失败!'.$link->error;
    $msg['status'] = 0;
    $str = json_encode($msg);
    echo $str;
}

 

//关闭数据库连接
$link->close();

exit(); 
?>