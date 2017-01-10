<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';

$isNoResult = 0;

$search_keyword = isset($_GET['key']) ? $_GET['key'] : '';

if(strlen($search_keyword) > 0){
	$sql = "SELECT a.id, a.littleImg, a.title, a.time, a.summary FROM article AS a WHERE a.keyword like '%".$search_keyword."%' ORDER BY a.id DESC";
	$results = $link->query($sql);

	if(!($results->num_rows)){//查询失败
		$isNoResult = 1;
	}
}else{
	$isNoResult = 1;
}

//关闭数据库连接
$link->close(); 
?>

<?php  
if($isNoResult){//如果没有数据，直接到404页面
	$url = "http://www.yuanbo88.com/404.html";  
	echo "<script>";  
	echo "window.location.href='$url'";  
	echo "</script>"; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<? include 'top.html'; ?>
	<link rel="stylesheet" href="dist/css/category_min.css">
</head>
<body>
	<header id="header">
		<? include 'public_top.php'; ?>
	</header>
		
	<div class="category-main-wrap">
		<div class="path">
			<i class="icon-path"></i>
			当前位置：<a href="/">首页</a><span> > </span>搜索结果页：
		</div>

		<div class="search-number-tips">共找到<span><?php echo $results->num_rows; ?></span>个相关内容</div>

		<div class="article-list">
			<?php
				while ($row = $results->fetch_array()){
			?>
				<section>
					<div class="person-img">
						<img src="dist/images/domeimg/default_user.jpg" width="64" height="64" alt="用户头像">
					</div>
					<div class="article-content">
						<h3 class="title"><a href="/article.html?rid=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
						<p class="time"><?php echo $row['time']; ?></p>
						<p class="summary"><?php echo $row['summary']; ?></p>
					</div>
				</section>
			<?php
				}
			?>
		</div>
	</div><!-- .category-main-wrap -->

	<footer id="footer">
		<? include 'foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$LAB.script("")
			.wait(function(){})
			.script("")
	</script>

</body>
</html>