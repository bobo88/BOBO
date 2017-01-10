<?php
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';

$msg = array('status'=>0,'msg'=>'');

$nickname = isset($_REQUEST['username']) ? addslashes($_REQUEST['username']) : '';
$commenttext = isset($_REQUEST['commenttext']) ? addslashes($_REQUEST['commenttext']) : '';
$topic = isset($_REQUEST['topic']) ? addslashes($_REQUEST['topic']) : '';
$floor = isset($_REQUEST['floor']) ? addslashes($_REQUEST['floor']) : '';

//isset()检测变量是否设置 
if($nickname){
    $sql = "SELECT id FROM user WHERE FIND_IN_SET('".$nickname."', name)";//取昵称数据
    $results = $link->query($sql);

    $id_sql = "SELECT id FROM user WHERE name='$nickname'";
    $id_results = $link->query($id_sql);

    if($results){
        if($results->num_rows>0){ //查到结果，昵称数据存在
            while ($row = $id_results->fetch_array()){
                $uid = $row['id'];
            }
            $sql2 = "INSERT INTO wei(topicid, uid, content, floor) VALUES('$topic', '$uid', '$commenttext', '$floor')";//插入数据
            $results2 = $link->query($sql2);

            if($results2){
                $msg['msg'] = '评论成功!';
                $msg['status'] = 1;
                $str = json_encode($msg);
                echo $str;
            }else{
                echo $link->error;
            }
        }else{ //查询结果为空，表示昵称不存在
            $msg['msg'] = '用户名不存在，请检查下是否处于正确的登录状态！！！';
            $str = json_encode($msg);
            echo $str;
        }
    }else{ //查询失败
        echo $link->error;
    }

}


//关闭数据库连接
$link->close();

exit(); 
?>