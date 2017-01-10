<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//取得首页banner的数据
$bannerid = isset($_REQUEST['bannerid']) ? $_REQUEST['bannerid'] : 1;                             //首页bannerID
$bannerurl = isset($_REQUEST['bannerurl']) ? $_REQUEST['bannerurl'] : 1;                             //首页图片对应的URL页面
$bannerimg = isset($_REQUEST['bannerimg']) ? $_REQUEST['bannerimg'] : 1;                                   //首页图片的地址
$bannertitle = addslashes(isset($_REQUEST['bannertitle']) ? $_REQUEST['bannertitle'] : '');                   //首页图片的标题

//处理插入结果
$sql = "UPDATE indexbanner SET burl='".$bannerurl."', bimg='".$bannerimg."', btitle='".$bannertitle."' WHERE id='".$bannerid."'";
//插入文章数据
$results = $link->query($sql);
if($results){
    $msg['msg'] = '首页banner更改成功!';
    $msg['status'] = 1;
    $str = json_encode($msg);
    echo $str;
}else{
    $msg['msg'] = '首页banner更改失败!'.$link->error;
    $msg['status'] = 0;
    $str = json_encode($msg);
    echo $str;
}

 

//关闭数据库连接
$link->close();

exit(); 
?>