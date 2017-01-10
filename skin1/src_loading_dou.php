<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');
 $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';

 $pageSize = 5;//每一页显示5条数据
 $pageBegin = ($page - 1) * $pageSize + 20;//当前页面记录在数据表中的开始下标，因为第一页有25条数据，所以要加上（25-5=20）
//isset()检测变量是否设置 
if($page){ 
	//处理查询结果
	$sql = "SELECT d.id, d.content FROM dou AS d ORDER BY d.id DESC LIMIT {$pageBegin}, {$pageSize}";//取当前分页数据
	$results = $link->query($sql);

	if($results){
		if($results->num_rows>0){ //查到结果
            $content = '';
            while ($row = $results->fetch_array()){
                $content .= addslashes('<p><i>'.$row['id'].'</i>'.$row['content'].'</p>');
            }
            $msg['msg'] = 'loading成功！';
            $msg['status'] = 1;
            $msg['content'] = $content;
            $str = json_encode($msg);
            echo $str;
		}else{ //查询结果为空
            $msg['msg'] = '我是有底线的......';
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