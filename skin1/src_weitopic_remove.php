<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//取得微话题的数据
$weiid = isset($_REQUEST['weiid']) ? $_REQUEST['weiid'] : 1;									   //请输入微话题的id

//处理插入结果
$sql = "DELETE FROM wei_topic WHERE topicid='".$weiid."'";//删除微话题
$results = $link->query($sql);
if($results){
    $msg['msg'] = '微话题删除成功!';
    $msg['status'] = 1;
    $str = json_encode($msg);
    echo $str;
}else{
    $msg['msg'] = '微话题删除失败!'.$link->error;
    $msg['status'] = 0;
    $str = json_encode($msg);
    echo $str;
}

 

//关闭数据库连接
$link->close();

exit(); 
?>