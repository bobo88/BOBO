<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//取得演示案例的数据
$democaseid = isset($_REQUEST['democaseid']) ? $_REQUEST['democaseid'] : 1;									   //请输入演示案例的id

//处理插入结果
$sql = "DELETE FROM democase WHERE caseid='".$democaseid."'";//删除演示案例
$results = $link->query($sql);
if($results){
    $msg['msg'] = '演示案例删除成功!';
    $msg['status'] = 1;
    $str = json_encode($msg);
    echo $str;
}else{
    $msg['msg'] = '演示案例删除失败!'.$link->error;
    $msg['status'] = 0;
    $str = json_encode($msg);
    echo $str;
}

 

//关闭数据库连接
$link->close();

exit(); 
?>