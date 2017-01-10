<?php
session_start(); 
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//isset()检测变量是否设置 
if(isset($_REQUEST['phone']) && isset($_REQUEST['password'])){ 

    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
    $pswd = isset($_REQUEST['password']) ? md5($_REQUEST['password']) : '';

    //处理查询结果
    $sql = "SELECT * FROM user WHERE FIND_IN_SET('".$phone."', username)";//取手机号码数据
    $results = $link->query($sql);

	if($results){
		if($results->num_rows>0){ //查到结果，手机号码已经注册过
            while ($row = $results->fetch_array()){
                if ($row['password'] == $pswd){
                    //仅对BOBO开放权限
                    if($row['username'] == '18826535280'){
                        $_SESSION['username'] = $row['name'];
                        $msg['msg'] = '登录成功!';
                        $msg['status'] = 1;
                        $msg['username'] = $row['username'];
                        $str = json_encode($msg);
                        echo $str;
                    }else{
                        $msg['msg'] = '对不起，您暂时没有权限!';
                        $str = json_encode($msg);
                        echo $str;
                    }
                }else{//如果密码输入错误
                    $msg['msg'] = '用户密码错误,请重新输入!';
                    $str = json_encode($msg);
                    echo $str;
                }
            }
		}else{ //查询结果为空，表示手机号码未被注册过
			$msg['msg'] = '用户不存在,请先注册!';
			$msg['status'] = 0;
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