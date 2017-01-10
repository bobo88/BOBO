<?php
//获取url参数
$msgId = $_GET['id'];
//查询指定记录的留言信息
require_once 'mysql_connect.php';
require_once 'inc_session.php';
$sql = "SELECT m.title, m.content, m.time, u.username FROM msgs AS m,user1 AS u WHERE m.id = {$msgId} AND m.authorId = u.id";
$results = $link->query($sql);
$msg = $results->fetch_assoc();
$results->free_result();
$link->close();
//显示到页面中
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>显示留言</title>
</head>
<body>
	<div>留言标题：<?php echo $msg['title']; ?></div>
	<div>留言发表者：<?php echo $msg['username']; ?></div>
	<div>留言内容：<?php echo $msg['content']; ?></div>
	<div>留言发表时间：<?php echo $msg['time']; ?></div>
</body>
</html>