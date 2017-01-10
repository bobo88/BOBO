<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//取得参考书籍的数据
$bookid = isset($_REQUEST['bookid']) ? $_REQUEST['bookid'] : 1;									   //请输入参考书籍的id

//处理插入结果
$sql = "DELETE FROM booklist WHERE id='".$bookid."'";//删除参考书籍
$results = $link->query($sql);
if($results){
    $msg['msg'] = '参考书籍删除成功!';
    $msg['status'] = 1;
    $str = json_encode($msg);
    echo $str;
}else{
    $msg['msg'] = '参考书籍删除失败!'.$link->error;
    $msg['status'] = 0;
    $str = json_encode($msg);
    echo $str;
}

 

//关闭数据库连接
$link->close();

exit(); 
?>