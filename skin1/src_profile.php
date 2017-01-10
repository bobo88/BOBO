<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';

$msg = array('status'=>0,'msg'=>'');

//isset()检测变量是否设置 
if(isset($_REQUEST['profilecode'])){ 
    //strtolower()小写函数 
    if(strtolower($_REQUEST['profilecode'])== $_SESSION['verificode_myprofile']){ //1、验证码是否正确
        $nickname = addslashes(isset($_REQUEST['nickname']) ? $_REQUEST['nickname'] : '');
        $email = addslashes(isset($_REQUEST['email']) ? $_REQUEST['email'] : '');

        //2、处理查询结果
        $sql_nickname = "SELECT * FROM user WHERE FIND_IN_SET('".$nickname."', name)";//取用户昵称
        $results_nickname = $link->query($sql_nickname);

        //如果昵称重复，提示昵称已经被占用
        if($results_nickname->num_rows>0){
            if($currentNickname === $nickname){//用户没有改用户昵称
                $sql2 = "UPDATE user SET name='".$nickname."', email='".$email."' WHERE name='".$currentNickname."'";//修改昵称
                $results2 = $link->query($sql2);
                if($results2){
                    $msg['msg'] = '个人资料更新成功!';
                    $msg['status'] = 1;
                    $str = json_encode($msg);
                    echo $str;
                }else{
                    echo $link->error;
                }
            }else{
                $msg['msg'] = '该昵称已经被使用，请换一个更加酷炫吊炸天的吧!';
                $str = json_encode($msg);
                echo $str;
            }
        }else{
            $sql2 = "UPDATE user SET name='".$nickname."', email='".$email."' WHERE name='".$currentNickname."'";//修改昵称
            $results2 = $link->query($sql2);
            if($results2){
                $msg['msg'] = '个人资料更新成功!';
                $msg['status'] = 1;
                $str = json_encode($msg);
                echo $str;
            }else{
                echo $link->error;
            }
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