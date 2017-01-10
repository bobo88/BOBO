<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';

//当前页面Url地址
$locationUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];

//得到当前文章的id页码
if(isset($_GET['rid'])) {
	$rid = $_GET['rid'];
}else{
	$rid = 1; //假设显示第一页
}

//rid参数的健壮性处理
if($rid < 1){ //rid为负数
	$rid = 1;
}

//得到当前文章所属分类
if(isset($_GET['sort'])) {
	$cateSort = $_GET['sort'];
}else{
	$cateSort = 1; //默认是HTML&CSS分类
}

$isNoResult = 0;

$sql2 = "SELECT * FROM article WHERE id=".$rid;//看是否有当前文章页面数据
$results2 = $link->query($sql2);
$hasResult = $results2->num_rows;
if($hasResult > 0){

	//执行数据库查询
	$sql3 = "SELECT a.id, u.name, a.sort, a.time, a.title, a.content, a.hot, a.isTop, a.fromUrl, a.fromTitle FROM article AS a, user AS u WHERE a.author=u.id AND a.id={$rid}";//取文章页面数据
	$results3 = $link->query($sql3);

	while ($row = $results3->fetch_array()){
		$title = $row['title'];
		$name = $row['name'];
		$sort = $row['sort'];
		$time = $row['time'];
		$content = $row['content'];
		$hot = $row['hot'];
		$isTop = $row['isTop'];
		$fromUrl = $row['fromUrl'] ? $row['fromUrl'] : '';
		$fromTitle = $row['fromTitle'] ? $row['fromTitle'] : '';
	}

	//阅读量加一
	$hotNum = $hot + 1;
	$sqlPlus = "UPDATE article SET hot='".$hotNum."' WHERE id=".$rid;
	$resultsPlus = $link->query($sqlPlus);

	
	$rid_1 = $rid-1;
	$sql4 = "SELECT * FROM article WHERE id=".$rid_1;//看是否有当前文章页面上一页数据
	$results4 = $link->query($sql4);
	$hasResultPrev = $results4->num_rows;
	if($hasResultPrev > 0){
		//执行数据库查询
		$sql5 = "SELECT a.title FROM article AS a, user AS u WHERE a.author=u.id AND a.id={$rid_1}";//取文章页面上一页数据
		$results5 = $link->query($sql5);
	}

	$rid1 = $rid+1;
	$sql6 = "SELECT * FROM article WHERE id=".$rid1;//看是否有当前文章页面下一页数据
	$results6 = $link->query($sql6);
	$hasResultNext = $results6->num_rows;
	if($hasResultNext > 0){
		//执行数据库查询
		$sql7 = "SELECT a.title FROM article AS a, user AS u WHERE a.author=u.id AND a.id={$rid1}";//取文章页面下一页数据
		$results7 = $link->query($sql7);
	}
}else{ //查询失败
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
	<script src="dist/minjs/shBrushPlug.min.js"></script>
	<link rel="stylesheet" href="dist/css/shCore/shCoreDefault.css">
	<script>SyntaxHighlighter.all();</script>
	<script>SyntaxHighlighter.defaults['auto-links'] = false;</script>
	<script src="dist/minjs/jquery.zclip.js"></script>
	<style>
		@media screen and (min-width: 768px) and (max-width: 959px) {
		  #header{min-width: 100%;}
		  #top .top-content{width: 100%;}
		  #topMian{width: 100%;}
		  #topMian .logo{left: 50%; -webkit-transform: translateX(-50%); transform: translateX(-50%);}
		  #topMian .topm_nav, .search-warp{ display: none;}
		  .btn-normal{ float: left;margin-bottom: 5px !important;}
		  .article-wrap{ width: 900px;}
		  .foot-wrap{ min-width: 900px;}
		}
		@media only screen and (min-width: 480px) and (max-width: 767px) {
		  #header{min-width: 100%;}
		  #top .top-content{width: 100%;}
		  #topMian{width: 100%;}
		  #topMian .logo{left: 50%; -webkit-transform: translateX(-50%); transform: translateX(-50%);}
		  #topMian .topm_nav, .search-warp{ display: none;}
		  .btn-normal{ float: left;margin-bottom: 5px !important;}
		  .article-wrap{ width: 450px;}
		  .foot-wrap{ min-width: 450px;}
		}
		@media only screen and (max-width: 479px) {
		  #header{min-width: 100%;}
		  #top .top-content{width: 100%;}
		  #topMian{width: 100%;}
		  #topMian .logo{left: 50%; -webkit-transform: translateX(-50%); transform: translateX(-50%);}
		  #topMian .topm_nav, .search-warp{ display: none;}
		  .btn-normal{ float: left;margin-bottom: 5px !important;}
		  .article-wrap{ width: 350px;}
		  .foot-wrap{ min-width: 350px;}
		}
	</style>

	<!-- Go to www.addthis.com/dashboard to customize your tools --> 
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53e9df045fc56166"></script> 
</head>
<body>
	<header id="header">
		<? include 'public_top.php'; ?>
	</header>

<!-- css , js(jscript/javascript) , php , sass(scss) , sql -->
<!-- article rid start -->
	<div class="article-wrap">
		<div class="path">
			<i class="icon-path"></i>
			当前位置：<a href="/">首页</a>
			<span> > </span>

			<?php 
				if($sort == 1 || $sort == 2){
			?>
				<a href="category.html?type=1">前端开发</a>
			<?php
				}else if($sort == 3){
			?>
				<a href="category.html?type=2">前端扩展</a>
			<?php
				}
			?>

			<span> > </span>

			<?php 
				if($sort == 1){
			?>
				<a href="category.html?type=1&key=h5">HTML(5)/CSS(3)</a>
			<?php
				}else if($sort == 2){
			?>
				<a href="category.html?type=1&key=js">Javascript/jQuery</a>
			<?php
				}else if($sort == 3){
			?>
				<a href="category.html?type=2&key=other">Other</a>
			<?php	
				}
			?>
			
			<span> > </span>正文
		</div>
		<h1><?php echo $title; ?></h1>
		<div class="article-info">
			<span class="author">作者：<strong><?php echo $name; ?></strong></span>
			<!-- <span class="time">时间：<strong><?php echo $time; ?></strong></span> -->
			<span id="hits">阅读量：<strong><?php echo $hot; ?></strong></span>
		</div>

		<div class="mt10 mb10 tc">
			<div class="addthis_sharing_toolbox"></div>
		</div>

		<div class="article-content">
			<?php echo $content;?>
			
			<div class="reference">
				<?php
					if($fromTitle){
				?>
					<h4>Reference:</h4>
					<ul>
						<li><?php echo $fromTitle; ?>: <a href="<?php echo $fromUrl; ?>" target="_blank"><?php echo $fromUrl; ?></a></li>
					</ul>
				<?php
					}else{
				?>
					<h4>本站欢迎任何形式的转载，但请务必注明出处，尊重他人劳动成果。</h4>
					<p>转载请注明： 文章转载自：园博吧资源网 <a href="<?php echo $locationUrl; ?>"><?php echo $locationUrl; ?></a></p>
				<?php	
					}
				?>
			</div>


			<!-- 上一页 & 下一页 -->
			<div class="page clearfix">
				<?php
				if($hasResultPrev > 0){
				?>
					<?php
					while ($row = $results5->fetch_array()){
					?>
						<a class="btn-normal mr100" href="http://www.yuanbo88.com/article.html?rid=<?php echo $rid_1; ?>"><span>上一篇:</span>&nbsp;&nbsp;<?php echo $row['title']; ?></a>
				<?php
					}
				}
				?>

				<?php
				if($hasResultNext > 0){
				?>
				
					<?php
					while ($row = $results7->fetch_array()){
					?>
						<a class="btn-normal" href="http://www.yuanbo88.com/article.html?rid=<?php echo $rid1; ?>"><span>下一篇:</span>&nbsp;&nbsp;<?php echo $row['title']; ?></a>
				<?php
					}
				}
				?>
			</div><!-- .page -->
		</div>

		
	</div><!-- .article-wrap -->

<!-- article rid end -->

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
