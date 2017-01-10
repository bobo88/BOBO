<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';

$msg = array('status'=>0,'msg'=>'');

//isset()检测变量是否设置 
if(isset($_REQUEST['security_code'])){ 
    //strtolower()小写函数 
    if(strtolower($_REQUEST['security_code'])== $_SESSION['verificode_myprofile']){ //1、验证码是否正确
        $current_password = isset($_REQUEST['current_password']) ? md5($_REQUEST['current_password']) : '';
        $password = isset($_REQUEST['password']) ? md5($_REQUEST['password']) : '';

        //2、处理查询结果
        $sql_nickname = "SELECT * FROM user WHERE password='".$current_password."' AND name='".$currentNickname."'";//取用户昵称
        $results_nickname = $link->query($sql_nickname);
        if($results_nickname->num_rows>0){
            $sql = "UPDATE user SET password='".$password."' WHERE name='".$currentNickname."'";//修改昵称
            $results = $link->query($sql);
            if($results){
                $msg['msg'] = '密码重置成功!';
                $msg['status'] = 1;
                $str = json_encode($msg);
                echo $str;
            }else{
                echo $link->error;
            }
        }else{
            $msg['msg'] = '当前密码不对!';
            $str = json_encode($msg);
            echo $str;
        }
    }else{ 
        $msg['msg'] = '验证码不正确!';
        $str = json_encode($msg);
        echo $str;
    } 
} 

//关闭数据库连接
$link->close();

exit(); 
?>