<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';


//查询参考书籍列表数据
// $sql = "SELECT wt.topicid, wt.limg, wt.title, COUNT(DISTINCT w.uid) AS len FROM wei_topic AS wt LEFT JOIN wei AS w ON wt.topicid = w.topicid WHERE 1 GROUP BY wt.topicid ORDER BY wt.topicid DESC";
$sql = "SELECT b.id, b.bookimg, b.summary, b.bookname FROM booklist AS b ORDER BY b.id DESC";
$results = $link->query($sql);
$hasResultBookList = $results->num_rows;

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
		
	<div class="booklist-wrap">
		<div class="path">
			<i class="icon-path"></i>
			当前位置：<a href="/">首页</a><span> > </span>参考书籍列表
		</div>


		<?php
			if($hasResultBookList > 0){
		?>
			<section class="booklist-box">
				<ul class="booklist clearfix">

				<?php
					while ($row = $results->fetch_array()){
				?>
					<li>
						<a href="/bookdetail.html?bid=<?php echo $row['id']; ?>" target="_blank" title="<?php echo $row['bookname']; ?>">
							<span class="bookimg"><img src="dist/images/domeimg/lazyload.gif" data-original="<?php echo $row['bookimg']; ?>" alt="<?php echo $row['bookname']; ?>"></span>
							<strong class="bookname"><?php echo $row['bookname']; ?></strong>
							<span class="booksummary"><?php echo $row['summary']; ?></span>
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