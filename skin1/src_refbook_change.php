<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//取得参考书籍的数据
$bookid = isset($_REQUEST['bookid']) ? $_REQUEST['bookid'] : 1;									           //请输入参考书籍的id
$bookaddress = isset($_REQUEST['bookaddress']) ? $_REQUEST['bookaddress'] : 1;                             //请输入参考书籍的百度云盘地址
$bookname = isset($_REQUEST['bookname']) ? $_REQUEST['bookname'] : 1;                                      //请输入参考书籍的书名
$bookimg = addslashes(isset($_REQUEST['bookimg']) ? $_REQUEST['bookimg'] : '');                            //请输入参考书籍的封面图片
$bookpwd = addslashes(isset($_REQUEST['bookpwd']) ? $_REQUEST['bookpwd'] : '');                            //请输入参考书籍的下载密码
$booksummary = addslashes(isset($_REQUEST['booksummary']) ? $_REQUEST['booksummary'] : '');                //请输入参考书籍的简介

//处理更新结果
$sql = "UPDATE booklist SET address='".$bookaddress."', bookname='".$bookname."', bookimg='".$bookimg."', pwd='".$bookpwd."', summary='".$booksummary."' WHERE id='".$bookid."'";
$results = $link->query($sql);
if($results){
    $msg['msg'] = '参考书籍更改成功!';
    $msg['status'] = 1;
    $str = json_encode($msg);
    echo $str;
}else{
    $msg['msg'] = '参考书籍更改失败!'.$link->error;
    $msg['status'] = 0;
    $str = json_encode($msg);
    echo $str;
}

 

//关闭数据库连接
$link->close();

exit(); 
?>