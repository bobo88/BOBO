<?php
session_start(); 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';
//获取当前数据表中的总页码数
$sql = "SELECT * FROM article";
$results = $link->query($sql);
$results->free_result();

//执行数据库查询======================前端开发
$sql = "SELECT * FROM article AS a WHERE a.isTop=1 AND a.category=1 ORDER BY a.id DESC LIMIT 1";//取文章页面数据
$results = $link->query($sql);

//执行数据库查询2
$sql2 = "SELECT * FROM article AS a WHERE a.isTop=0 AND a.category=1 ORDER BY a.id DESC LIMIT 3";//取文章页面数据
$results2 = $link->query($sql2);

//执行数据库查询3
$sql3 = "SELECT * FROM article AS a WHERE a.isTop=0 AND a.category=1 ORDER BY a.id DESC LIMIT 3,8";//取文章页面数据
$results3 = $link->query($sql3);

//执行数据库查询======================前端扩展
$sql4 = "SELECT * FROM article AS a WHERE a.isTop=1 AND a.category=2 ORDER BY a.id DESC LIMIT 1";//取文章页面数据
$results4 = $link->query($sql4);

//执行数据库查询2
$sql5 = "SELECT * FROM article AS a WHERE a.isTop=0 AND a.category=2 ORDER BY a.id DESC LIMIT 3";//取文章页面数据
$results5 = $link->query($sql5);

//执行数据库查询3
$sql6 = "SELECT * FROM article AS a WHERE a.isTop=0 AND a.category=2 ORDER BY a.id DESC LIMIT 3,8";//取文章页面数据
$results6 = $link->query($sql6);

//查询首页banner
$bannersql = "SELECT b.id, b.burl, b.bimg, b.btitle FROM indexbanner AS b ORDER BY b.id DESC LIMIT 5";
$bannerresults = $link->query($bannersql);
$hasResultbanner = $bannerresults->num_rows;


//查询微话题数据
$sql7 = "SELECT wt.topicid, wt.limg, wt.title, COUNT(DISTINCT w.uid) AS len FROM wei_topic AS wt LEFT JOIN wei AS w ON wt.topicid = w.topicid WHERE 1 GROUP BY wt.topicid ORDER BY wt.topicid DESC LIMIT 4";
$results7 = $link->query($sql7);
$hasResultWei = $results7->num_rows;

//执行数据库查询
$sql8 = "SELECT w.time, w.content, u.name FROM wei AS w, user AS u WHERE u.id=w.uid ORDER BY w.id DESC LIMIT 5";
$results8 = $link->query($sql8);
$hasResultCommentNum = $results8->num_rows;

//查询演示案例数据
$demosql = "SELECT d.title, d.demoUrl, d.demoImg FROM democase AS d ORDER BY d.caseid DESC LIMIT 6";
$demoresults = $link->query($demosql);
$hasResultdemo = $demoresults->num_rows;

//查询参考书籍数据
$booksql = "SELECT b.id, b.bookname FROM booklist AS b ORDER BY b.id DESC LIMIT 12";
$bookresults = $link->query($booksql);
$hasResultbook = $bookresults->num_rows;

//如果没有微言大义列表数据
if($hasResultCommentNum > 0){
	$hasNoWeiComment = 1;
}

$isNoResult = 0;
if(!$results || !$results2 || !$results3 || !$results4 || !$results5 || !$results6){//查询失败
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
	<link rel="stylesheet" href="dist/css/index_min.css">
</head>
<body>
	<header id="header">
		<? include 'public_top.php'; ?>
	</header>

	<!-- 首页 main start -->
	<div class="index-main-wrap">
		<div class="topBannerWrap clearfix">
			<div class="slider" id="js-banner">
				<ul class="slideList clearfix">
					<?php
						if($hasResultbanner > 0){
					?>
						<?php
							while ($row = $bannerresults->fetch_array()){
						?>
							<li data-id="<?php echo $row['id'];?>">
								<a href="<?php echo $row['burl'];?>" target="_blank">
									<img src="<?php echo $row['bimg'];?>" alt="<?php echo $row['btitle'];?>" height="420" width="1920" draggable="false">
								</a>
							</li>
						<?php
							}
						?>
					<?php
						}else{
					?>
						<li>
							<a href="http://www.yuanbo88.com/article.html?rid=32" target="_blank">
								<img src="dist/images/domeimg/banner/banner_nodejs.jpg" alt="如何用node.js批量给图片加水印" height="420" width="1920" draggable="false">
							</a>
						</li>
					<?php
						}
					?>
				</ul>
			</div>
		</div><!-- .topBannerWrap -->

		<section class="floor-line-con floor-1">
			<div class="floor-title clearfix">
				<span class="fl">
					<span class="titletext">1</span>
					<span class="subtitle">前端开发</span>
					<span class="hot-key"><a href="/search.html?key=html" title="HTML5" target="_blank">HTML5</a></span>
					<span class="hot-key"><a href="/search.html?key=css" title="CSS3" target="_blank">CSS3</a></span>
					<span class="hot-key"><a href="/search.html?key=javascript" title="Javascript" target="_blank">Javascript</a></span>
					<span class="hot-key"><a href="/search.html?key=jquery" title="jQuery" target="_blank">jQuery</a></span>
				</span>
				<span class="fr more"><a href="http://www.yuanbo88.com/category-1-1.html" target="_blank">更多</a></span>
			</div>
			
			<div class="clearfix floor-content-wrap mt30">
				<div class="fl category-pic">
					<ul>
					<?php
						while ($row = $results->fetch_array()){
							switch ($row['sort']) {
								case 0:
									$articleSort = 'o';
									break;
								case 1:
									$articleSort = 'h';
									break;
								case 2:
									$articleSort = 'c';
									break;
								case 3:
									$articleSort = 'j';
									break;
								case 4:
									$articleSort = 'n';
									break;
								case 5:
									$articleSort = 'v';
									break;
								case 6:
									$articleSort = 'r';
									break;
								default:
									$articleSort = 'o';
									break;
							}
					?>
						<li>
							<span class="img">
								<a href="/article-<?php echo $articleSort;?>-<?php echo $row['id']; ?>.html" target="_blank">
									<?php
										if($row['bigImg']){
									?>
									<img src="dist/images/domeimg/lazyload.gif" data-original="<?php echo $row['bigImg']; ?>" alt="<?php echo $row['title']; ?>">
									<?php
										}else{
									?>
									<img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/index/category_web.jpg" alt="<?php echo $row['title']; ?>">
									<?php
										}
									?>
								</a>
							</span>
							<span class="title"><?php echo $row['title']; ?></span>
						</li>
					<?php
						}
					?>
					</ul>
				</div>

				<div class="fl category-center-cont">
					<?php
						while ($row = $results2->fetch_array()){
							switch ($row['sort']) {
								case 0:
									$articleSort = 'o';
									break;
								case 1:
									$articleSort = 'h';
									break;
								case 2:
									$articleSort = 'c';
									break;
								case 3:
									$articleSort = 'j';
									break;
								case 4:
									$articleSort = 'n';
									break;
								case 5:
									$articleSort = 'v';
									break;
								case 6:
									$articleSort = 'r';
									break;
								default:
									$articleSort = 'o';
									break;
							}
					?>
						<div class="cont">
							<h3><a href="/article-<?php echo $articleSort;?>-<?php echo $row['id']; ?>.html" title="<?php echo $row['title']; ?>" target="_blank"><?php echo $row['title']; ?></a></h3>
							<p><?php echo $row['summary']; ?></p>
						</div>
					<?php
						}
					?>
				</div>

				<div class="fl category-new">
					<h3 class="new-title">NEW</h3>
					<ul>
					<?php
						while ($row = $results3->fetch_array()){
							switch ($row['sort']) {
								case 0:
									$articleSort = 'o';
									break;
								case 1:
									$articleSort = 'h';
									break;
								case 2:
									$articleSort = 'c';
									break;
								case 3:
									$articleSort = 'j';
									break;
								case 4:
									$articleSort = 'n';
									break;
								case 5:
									$articleSort = 'v';
									break;
								case 6:
									$articleSort = 'r';
									break;
								default:
									$articleSort = 'o';
									break;
							}
					?>
						<li>
							<a href="/article-<?php echo $articleSort;?>-<?php echo $row['id']; ?>.html" title="<?php echo $row['title']; ?>" target="_blank">
								<?php echo $row['title']; ?>
							</a>
						</li>
					<?php
						}
					?>
					</ul>
				</div>
			</div>
		</section>

		<section class="widget-box">
			<h3 class="widget-title">前端开发工具及插件</h3>
			<ul class="clearfix" id="js-widgetBox">
				<li class="first">
					<span><a href="http://www.yuanbo88.com/article.html?rid=4" title="Sublime常用插件总结" target="_blank"><img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/index/sublime.jpg" alt="Sublime常用插件总结"></a></span>
					<span class="title"><a href="http://www.yuanbo88.com/article.html?rid=4" title="Sublime常用插件总结" target="_blank">Sublime常用插件总结</a></span>
				</li>
				<li>
					<span><a href="http://www.yuanbo88.com/article.html?rid=21" title="复制到剪切板插件--jQuery ZeroClipboard" target="_blank"><img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/index/zeroclipboard.jpg" alt="复制到剪切板插件--jQuery ZeroClipboard"></a></span>
					<span class="title"><a href="http://www.yuanbo88.com/article.html?rid=21" title="复制到剪切板插件--jQuery ZeroClipboard" target="_blank">复制到剪切板插件--jQuery ZeroClipboard</a></span>
				</li>
				<li>
					<span><a href="http://www.yuanbo88.com/article.html?rid=18" title="Bootstrap之初体验" target="_blank"><img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/index/bootstrap.jpg" alt="Bootstrap之初体验"></a></span>
					<span class="title"><a href="http://www.yuanbo88.com/article.html?rid=18" title="Bootstrap之初体验" target="_blank">Bootstrap之初体验</a></span>
				</li>
				<li>
					<span><a href="http://www.yuanbo88.com/article.html?rid=13" title="代码高亮美化插件--SyntaxHighlighter" target="_blank"><img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/index/syntaxhighlighter.jpg" alt="代码高亮美化插件--SyntaxHighlighter"></a></span>
					<span class="title"><a href="http://www.yuanbo88.com/article.html?rid=13" title="代码高亮美化插件--SyntaxHighlighter" target="_blank">代码高亮美化插件--SyntaxHighlighter</a></span>
				</li>
			</ul>
		</section>

		<section class="floor-line-con floor-2">
			<div class="floor-title clearfix">
				<span class="fl">
					<span class="titletext">2</span>
					<span class="subtitle">前端扩展</span>
					<span class="hot-key"><a href="/search.html?key=php" title="PHP" target="_blank">PHP</a></span>
					<span class="hot-key"><a href="/search.html?key=node" title="NodeJS" target="_blank">NodeJS</a></span>
					<span class="hot-key"><a href="/search.html?key=gulp" title="Gulp" target="_blank">Gulp</a></span>
					<span class="hot-key"><a href="/search.html?key=react" title="React Native" target="_blank">React Native</a></span>
				</span>
				<span class="fr more"><a href="http://www.yuanbo88.com/category-2-1.html" target="_blank">更多</a></span>
			</div>
			
			<div class="clearfix floor-content-wrap mt30">
				<div class="fl category-pic">
					<ul>
					<?php
						while ($row = $results4->fetch_array()){
							switch ($row['sort']) {
								case 0:
									$articleSort = 'o';
									break;
								case 1:
									$articleSort = 'h';
									break;
								case 2:
									$articleSort = 'c';
									break;
								case 3:
									$articleSort = 'j';
									break;
								case 4:
									$articleSort = 'n';
									break;
								case 5:
									$articleSort = 'v';
									break;
								case 6:
									$articleSort = 'r';
									break;
								default:
									$articleSort = 'o';
									break;
							}
					?>
						<li>
							<span class="img">
								<a href="/article-<?php echo $articleSort;?>-<?php echo $row['id']; ?>.html" target="_blank">
									<?php
										if($row['bigImg']){
									?>
									<img src="dist/images/domeimg/lazyload.gif" data-original="<?php echo $row['bigImg']; ?>" alt="<?php echo $row['title']; ?>">
									<?php
										}else{
									?>
									<img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/index/category_other.jpg" alt="<?php echo $row['title']; ?>">
									<?php
										}
									?>
								</a>
							</span>
							<span class="title"><?php echo $row['title']; ?></span>
						</li>
					<?php
						}
					?>
					</ul>
				</div>

				<div class="fl category-center-cont">
					<?php
						while ($row = $results5->fetch_array()){
							switch ($row['sort']) {
								case 0:
									$articleSort = 'o';
									break;
								case 1:
									$articleSort = 'h';
									break;
								case 2:
									$articleSort = 'c';
									break;
								case 3:
									$articleSort = 'j';
									break;
								case 4:
									$articleSort = 'n';
									break;
								case 5:
									$articleSort = 'v';
									break;
								case 6:
									$articleSort = 'r';
									break;
								default:
									$articleSort = 'o';
									break;
							}
					?>
						<div class="cont">
							<h3><a href="/article-<?php echo $articleSort;?>-<?php echo $row['id']; ?>.html" title="<?php echo $row['title']; ?>" target="_blank"><?php echo $row['title']; ?></a></h3>
							<p><?php echo $row['summary']; ?></p>
						</div>
					<?php
						}
					?>
				</div>

				<div class="fl category-new">
					<h3 class="new-title">NEW</h3>
					<ul>
					<?php
						while ($row = $results6->fetch_array()){
							switch ($row['sort']) {
								case 0:
									$articleSort = 'o';
									break;
								case 1:
									$articleSort = 'h';
									break;
								case 2:
									$articleSort = 'c';
									break;
								case 3:
									$articleSort = 'j';
									break;
								case 4:
									$articleSort = 'n';
									break;
								case 5:
									$articleSort = 'v';
									break;
								case 6:
									$articleSort = 'r';
									break;
								default:
									$articleSort = 'o';
									break;
							}
					?>
						<li>
							<a href="/article-<?php echo $articleSort;?>-<?php echo $row['id']; ?>.html" title="<?php echo $row['title']; ?>" target="_blank">
								<?php echo $row['title']; ?>
							</a>
						</li>
					<?php
						}
					?>
					</ul>
				</div>
			</div>
		</section>

		<section class="floor-line-con floor-4">
			<div class="floor-title clearfix">
				<span class="fl">
					<span class="titletext">3</span>
					<span class="subtitle">参考书籍</span>
				</span>
				
				<span class="fr more"><a href="http://www.yuanbo88.com/booklist.html" target="_blank">更多</a></span>
			</div>

			<ul class="booklist clearfix mt30">
				<?php
					if($hasResultbook > 0){
				?>
					<?php
						while ($row = $bookresults->fetch_array()){
					?>
						<li><a href="/bookdetail.html?bid=<?php echo $row['id']; ?>" target="_blank"><?php echo $row['bookname']; ?></a></li>
					<?php
						}
					?>
				<?php
					}
				?>
			</ul>
		</section>

		<section class="floor-line-con floor-3">
			<div class="floor-title clearfix">
				<span class="fl">
					<span class="titletext">4</span>
					<span class="subtitle">演示案例</span>
				</span>
				
				<span class="fr more"><a href="http://www.yuanbo88.com/catedemo.html" target="_blank">更多</a></span>
			</div>
			
			<div class="clearfix floor-content-wrap mt30" id="js-someDemoWrap">
				<ul class="slideList clearfix">
					<?php
						if($hasResultdemo > 0){
					?>
						<?php
							while ($row = $demoresults->fetch_array()){
						?>
							<li>
								<a href="<?php echo $row['demoUrl']; ?>" target="_blank">
									<img src="<?php echo $row['demoImg']; ?>" alt="<?php echo $row['title']; ?>"/>
									<div class="demo-info">
										<h5><?php echo $row['title']; ?></h5>
									</div>
								</a>
							</li>
						<?php
							}
						?>
					<?php
						}
					?>
				</ul>
			</div>
		</section>

		

		<section class="tools-wrap clearfix">
			<div class="tools-box fl">
				<h3 class="tools-title">WEB前端小工具：</h3>
				<ul class="clearfix tools-list">
					<li>
						<p class="t-img"><a href="http://www.yuanbo88.com/tools/jsonformat.html" title="JSON格式化" target="_blank"><img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/tools/json.png" width="60" height="60" alt="JSON格式化"></a></p>
						<p class="t-tit"><a href="http://www.yuanbo88.com/tools/jsonformat.html" title="JSON格式化" target="_blank">JSON格式化</a></p>
					</li>
					<li>
						<p class="t-img"><a href="http://www.yuanbo88.com/tools/js_compress.html" title="JS格式化" target="_blank"><img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/tools/js.png" width="60" height="60" alt="JS格式化"></a></p>
						<p class="t-tit"><a href="http://www.yuanbo88.com/tools/js_compress.html" title="JS格式化" target="_blank">JS格式化</a></p>
					</li>
					<li>
						<p class="t-img"><a href="http://www.yuanbo88.com/tools/css_compress.html" title="CSS格式化" target="_blank"><img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/tools/css.png" width="60" height="60" alt="CSS格式化"></a></p>
						<p class="t-tit"><a href="http://www.yuanbo88.com/tools/css_compress.html" title="CSS格式化" target="_blank">CSS格式化</a></p>
					</li>
				</ul>
			</div>
			
			<div class="weidayi-box fr">
				<h3 class="tools-title pr">最新留言：<small>微话题</small><a href="http://www.yuanbo88.com/catewei.html" class="wd-more" target="_blank">查看详情</a></h3>
				<div id="js_infoBox2" class="infoBoxIni">
					<?php
						if($hasNoWeiComment == 1){
					?>
						<ul class="slides">
							<?php
								while ($row = $results8->fetch_array()){
							?>
								<li>
									<p>
										<i class="u-name">[<?php echo $row['name']; ?>]</i><?php echo $row['content']; ?>
										<span class="time"><?php echo $row['time']; ?></span>
									</p>
								</li>
							<?php
								}
							?>
						</ul>
					<?php
						}else{
					?>
						<ul class="slides">
							<li>
								<p>没有数据，敬请期待...</p>
							</li>
						</ul>
					<?php
						}
					?>
				</div>
			</div>
		</section>

		<!-- 微话题 -->
		<?php
			if($hasResultWei > 0){
		?>
			<section class="wei-topic-wrap">
				<h3 class="wei-title clearfix"><span class="fl">微话题：</span><span class="fr"><a href="http://www.yuanbo88.com/catewei.html" target="_blank">更多</a></span></h3>
				<ul class="clearfix">
					<?php
						while ($row = $results7->fetch_array()){
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
		
	</div><!-- .index-main-wrap -->
	<!-- 首页 main end -->

	<footer id="footer">
		<? include 'foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$LAB.script("jquery.flexslider.min.js")
			.script("kxbdSuperMarquee.min.js")
			.wait(function(){
				
				$('#js_infoBox2').kxbdSuperMarquee({
				    distance:60,
				    time:3,
				    direction:'up',
				    loop: 0
				});

				$(window).scroll(function(event) {
					var $win = $(window);
					var scrollH = $win.scrollTop();
					var headerH = $('#header').height();
					var $navBox = $('.js-topMainWrap');
					if(scrollH >=  headerH){
						$navBox.addClass('css-fixed');
					}else{
						$navBox.removeClass('css-fixed');
					}
				});
			})
			.script("index.min.js")
	</script>

</body>
</html>