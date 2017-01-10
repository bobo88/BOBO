<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//isset()检测变量是否设置 
if(isset($_REQUEST['regcode'])){ 
    session_start(); 
    //strtolower()小写函数 
    if(strtolower($_REQUEST['regcode'])== $_SESSION['verificode']){ //1、验证码是否正确
    	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
        $pswd = isset($_REQUEST['password']) ? md5($_REQUEST['password']) : '';
    	$nickname = addslashes(isset($_REQUEST['nickname']) ? $_REQUEST['nickname'] : '');

    	//2、手机号码是否已经注册过
    	//处理查询结果
    	$sql = "SELECT * FROM user WHERE FIND_IN_SET('".$phone."', username)";//取手机号码数据
    	$results = $link->query($sql);

        $sql_nickname = "SELECT * FROM user WHERE FIND_IN_SET('".$nickname."', name)";//取用户昵称
        $results_nickname = $link->query($sql_nickname);

    	if($results){
    		if($results->num_rows>0){ //查到结果，手机号码已经注册过
    			$msg['msg'] = '该用户已经注册过，请直接登录!';
    			$str = json_encode($msg);
    			echo $str;
    		}else{ //查询结果为空，表示手机号码未被注册过
                //如果昵称重复，提示昵称已经被占用
                if($results_nickname->num_rows>0){
                    $msg['msg'] = '该昵称已经被使用，请换一个更加酷炫吊炸天的吧!';
                    $str = json_encode($msg);
                    echo $str;
                }else{
                    $sql2 = "INSERT INTO user(id, username, name, password) VALUES(NULL, '$phone', '$nickname', '$pswd')";//插入手机号码数据
                    $results2 = $link->query($sql2);
                    if($results2){
                        $msg['msg'] = '注册成功!';
                        $msg['status'] = 1;
                        $str = json_encode($msg);
                        echo $str;
                    }else{
                        echo $link->error;
                    }
                }
    		}
    	}else{ //查询失败
    		echo $link->error;
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