<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';


//查询微话题数据
$sql = "SELECT wt.topicid, wt.limg, wt.title, COUNT(DISTINCT w.uid) AS len FROM wei_topic AS wt LEFT JOIN wei AS w ON wt.topicid = w.topicid WHERE 1 GROUP BY wt.topicid ORDER BY wt.topicid DESC";
$results = $link->query($sql);
$hasResultWei = $results->num_rows;

$isNoResult = 0;
if(!$results){//查询失败
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
	<link rel="stylesheet" href="dist/css/other_min.css">
</head>
<body>
	<header id="header">
		<? include 'public_top.php'; ?>
	</header>
		
	<div class="catewei-wrap">
		<div class="path">
			<i class="icon-path"></i>
			当前位置：<a href="/">首页</a><span> > </span>微话题列表
		</div>


		<?php
			if($hasResultWei > 0){
		?>
			<section class="wei-topic-list">
				<ul class="clearfix">
					<?php
						while ($row = $results->fetch_array()){
					?>
						<li>
							<a href="wei.html?topic=<?php echo $row['topicid']; ?>" target="_blank">
								<img src="dist/images/domeimg/lazyload.gif" data-original="<?php echo $row['limg']; ?>" alt="<?php echo $row['title']; ?>"/>
								<div class="wei-info">
									<h5><?php echo $row['title']; ?></h5>
									<span class="wei-btn">已有<?php echo $row['len']; ?>人参与</span>
								</div>
							</a>
						</li>
					<?php
						}
					?>
				</ul>
			</section>
		<?php
			}
		?>

	</div><!-- .category-main-wrap -->

	<footer id="footer">
		<? include 'foot.html'; ?>	
	</footer><!--end #footer -->

</body>
</html>