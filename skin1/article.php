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

$cateTitUrl = 'category-h-1.html';
$cateSort = 'HTML系列';
$sortShort = 'h';
//得到当前文章所属分类
if(isset($_GET['sort'])) {
	$sortShort = $_GET['sort'];
	switch ($sortShort) {
		case 'h':
			$cateSort = 'HTML系列';
			$cateTitUrl = 'category-h-1.html';
			$keyNum = 1;
			break;
		case 'c':
			$cateSort = 'CSS系列';
			$cateTitUrl = 'category-c-1.html';
			$keyNum = 2;
			break;
		case 'j':
			$cateSort = 'Javascript系列';
			$cateTitUrl = 'category-j-1.html';
			$keyNum = 3;
			break;
		case 'n':
			$cateSort = 'NodeJS系列';
			$cateTitUrl = 'category-n-1.html';
			$keyNum = 4;
			break;
		case 'v':
			$cateSort = 'VueJS系列';
			$cateTitUrl = 'category-v-1.html';
			$keyNum = 5;
			break;
		case 'r':
			$cateSort = 'React系列';
			$cateTitUrl = 'category-r-1.html';
			$keyNum = 6;
			break;
		case 'o':
			$cateSort = '其他';
			$cateTitUrl = 'category-o-1.html';
			$keyNum = 0;
			break;
		default:
			$cateSort = '其他';
			$cateTitUrl = 'category-o-1.html';
			$keyNum = 0;
			break;
	}
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

	
	$sql4 = "SELECT * FROM article AS a WHERE a.sort='".$keyNum."' AND a.id <'".$rid."' ORDER BY a.id DESC LIMIT 1";//看是否有当前文章页面上一页数据
	$results4 = $link->query($sql4);
	$hasResultPrev = $results4->num_rows;

	$sql5 = "SELECT * FROM article AS a WHERE a.sort='".$keyNum."' AND a.id >'".$rid."' ORDER BY a.id ASC LIMIT 1";//看是否有当前文章页面下一页数据
	$results5 = $link->query($sql5);
	$hasResultNext = $results5->num_rows;
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
		@media screen and (max-width: 959px){
			#header{min-width: 100%;}
			#top .top-content{width: 100%;}
			#topMian{width: 100%;}
			#topMian .logo{left: 50%; -webkit-transform: translateX(-50%); transform: translateX(-50%);}
			#topMian .topm_nav, .search-warp{ display: none;}
			.top-main-wrap{ min-width: auto;}
			.btn-normal{ float: left;margin-bottom: 5px !important;}
		}
		@media screen and (min-width: 768px) and (max-width: 959px) {
		  .article-wrap{ width: 900px;}
		  .foot-wrap{ min-width: 900px;}
		}
		@media only screen and (min-width: 480px) and (max-width: 767px) {
		  .article-wrap{ width: 450px;}
		  .foot-wrap{ min-width: 450px;}
		}
		@media only screen and (max-width: 479px) {
		  .article-wrap{ width: 350px;}
		  .foot-wrap{ min-width: 350px;}
		}
	</style>
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

			<a href="<?php echo $cateTitUrl ;?>"><?php echo $cateSort; ?></a>
			
			<span> > </span><?php echo $title; ?>
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
					<p>转载请注明： 文章转载自：园博吧资源网 <a href="http://www.yuanbo88.com/article-<?php echo $sortShort; ?>-<?php echo $rid; ?>.html">http://www.yuanbo88.com/article-<?php echo $sortShort; ?>-<?php echo $rid; ?>.html</a></p>
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
					while ($row = $results4->fetch_array()){
					?>
						<a class="btn-normal mr100" href="http://www.yuanbo88.com/article-<?php echo $sortShort; ?>-<?php echo $row['id']; ?>.html"><span>上一篇:</span>&nbsp;&nbsp;<?php echo $row['title']; ?></a>
				<?php
					}
				}
				?>

				<?php
				if($hasResultNext > 0){
				?>
				
					<?php
					while ($row = $results5->fetch_array()){
					?>
						<a class="btn-normal" href="http://www.yuanbo88.com/article-<?php echo $sortShort; ?>-<?php echo $row['id']; ?>.html"><span>下一篇:</span>&nbsp;&nbsp;<?php echo $row['title']; ?></a>
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

	<!-- Go to www.addthis.com/dashboard to customize your tools --> 
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53e9df045fc56166"></script> 

	<script>
		$LAB.script("")
			.wait(function(){})
			.script("")
	</script>

</body>
</html>
