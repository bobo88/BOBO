<?php
 header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
 //建立数据库连接
 require_once 'mysql_connect.php';

 $msg = array('status'=>0,'msg'=>'');

//取得文章发表的数据
$author = isset($_REQUEST['author']) ? $_REQUEST['author'] : 1;                             //文章author
$sort = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : 1;                                   //文章分类sort
$title = addslashes(isset($_REQUEST['title']) ? $_REQUEST['title'] : '');                   //文章标题title
$summary = addslashes(isset($_REQUEST['summary']) ? $_REQUEST['summary'] : '');             //文章简介summary
$content = addslashes(isset($_REQUEST['content']) ? $_REQUEST['content'] : '');             //文章内容content
$keyword = addslashes(isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '');             //文章keyword
$hot = isset($_REQUEST['hot']) ? $_REQUEST['hot'] : 0;                                      //文章热度hot
$isTop = isset($_REQUEST['isTop']) ? $_REQUEST['isTop'] : 0;                                //文章是否置顶isTop
$fromUrl = addslashes(isset($_REQUEST['fromUrl']) ? $_REQUEST['fromUrl'] : '');           //文章参考地址fromUrl
$fromTitle = addslashes(isset($_REQUEST['fromTitle']) ? $_REQUEST['fromTitle'] : '');     //文章参考标题fromTitle
$littleImg = addslashes(isset($_REQUEST['littleImg']) ? $_REQUEST['littleImg'] : '');     //文章小插图littleImg
$bigImg = addslashes(isset($_REQUEST['bigImg']) ? $_REQUEST['bigImg'] : '');              //文章大插图bigImg

//处理插入结果
$sql = "INSERT INTO article(author, sort, title, summary, content, keyword, hot, isTop, fromUrl, fromTitle, littleImg, bigImg) VALUES('".$author."', '".$sort."', '".$title."', '".$summary."', '".$content."', '".$keyword."', '".$hot."', '".$isTop."', '".$fromUrl."', '".$fromTitle."', '".$littleImg."', '".$bigImg."')";//插入文章数据
$results = $link->query($sql);
if($results){
    $msg['msg'] = '文章发表成功!';
    $msg['status'] = 1;
    $str = json_encode($msg);
    echo $str;
}else{
    $msg['msg'] = '文章发表失败!'.$link->error;
    $msg['status'] = 0;
    $str = json_encode($msg);
    echo $str;
}

 

//关闭数据库连接
$link->close();

exit(); 
?>