<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//取得首页banner的数据
$bannerid = isset($_REQUEST['bannerid']) ? $_REQUEST['bannerid'] : 1;                             //首页bannerID

//处理插入结果
$sql = "DELETE FROM indexbanner WHERE id='".$bannerid."'";//删除首页banner
$results = $link->query($sql);
if($results){
    $msg['msg'] = '首页banner删除成功!';
    $msg['status'] = 1;
    $str = json_encode($msg);
    echo $str;
}else{
    $msg['msg'] = '首页banner删除失败!'.$link->error;
    $msg['status'] = 0;
    $str = json_encode($msg);
    echo $str;
}

 

//关闭数据库连接
$link->close();

exit(); 
?>