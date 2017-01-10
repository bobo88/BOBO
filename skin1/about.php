<?php
session_start();
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';
//关闭数据库连接
$link->close(); 
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
	
	
	<div class="about-me-wrap">
		<section class="bobo-info-wrap">
			<div class="info-box w1200 pr">
				<div class="bobo-img"><span><img src="dist/images/domeimg/about/bobo2.jpg" width="248" height="248" alt="ABOUT BOBO"></span></div>
				<div class="bobo-info">
					<h3 class="name">I'M YUAN BO</h3>
					<span class="line"></span>
					<p class="jobs">FRONT-END WEB DEVELOPER</p>
				</div>
			</div>
		</section>

		<section class="case-list-wrap">
			<div class="case-box w1200">
				<h4 class="case-tit">Some Case</h4>
				<ul class="clearfix case-list">
					<li>
						<img src="dist/images/domeimg/about/case_1.jpg" alt="CASE" class="bg">
						<div class="hover">
							<h5 class="project-name">Project Name</h5>
							<p class="works">五洲会</p>
							<p class="jobs">WEB FRONT END DEVELOPMENT</p>
							<a href="http://www.wzhouhui.com/" class="view" target="_blank">VIEW</a>
						</div>
					</li>
					<li>
						<img src="dist/images/domeimg/about/case_2.jpg" alt="CASE" class="bg">
						<div class="hover">
							<h5 class="project-name">Project Name</h5>
							<p class="works">GEARBESE</p>
							<p class="jobs">WEB FRONT END DEVELOPMENT</p>
							<a href="http://www.gearbest.com" class="view" target="_blank">VIEW</a>
						</div>
					</li>
					<li>
						<img src="dist/images/domeimg/about/case_3.jpg" alt="CASE" class="bg">
						<div class="hover">
							<h5 class="project-name">Project Name</h5>
							<p class="works">ZHIYINGDA</p>
							<p class="jobs">WEB FRONT END DEVELOPMENT</p>
							<a href="http://www.zhiyd.com.cn/" class="view" target="_blank">VIEW</a>
						</div>
					</li>
					<li>
						<img src="dist/images/domeimg/about/case_4.jpg" alt="CASE" class="bg">
						<div class="hover">
							<h5 class="project-name">Project Name</h5>
							<p class="works">园博吧</p>
							<p class="jobs">WEB FRONT END DEVELOPMENT</p>
							<a href="http://www.yuanbo88.com/" class="view" target="_blank">VIEW</a>
						</div>
					</li>
				</ul>
			</div>
		</section>

		<div class="bo-introduction w1200">
			<ul class="clearfix">
				<li>
					<h4 class="intro-tit"><span>About Me</span></h4>
					<div class="about-me">
						<p class="clearfix"><i class="iconfont">&#xe60d;</i><span>帅</span></p>
						<p class="clearfix"><i class="iconfont">&#xe60d;</i><span>专注</span></p>
						<p class="clearfix"><i class="iconfont">&#xe60d;</i><span>很勤奋</span></p>
						<p class="clearfix"><i class="iconfont">&#xe60d;</i><span>会写代码</span></p>
						<p class="clearfix"><i class="iconfont">&#xe60d;</i><span>有一点逗比</span></p>
						
					</div>
				</li>
				<li>
					<h4 class="intro-tit"><span>Contact Me</span></h4>
					<div class="contact-me">
						<p class="clearfix"><i class="iconfont">&#xe694;:</i><span>yuanboi88@163.com</span></p>
						<p class="clearfix"><i class="iconfont">&#x3433;:</i><span><img src="http://www.yuanbo88.com/dist/images/qrcode_258.jpg" height="150" width="150" alt="关注“园博吧”微信公众号"></span></p>
					</div>
				</li>
				<li>
					<h4 class="intro-tit"><span>Skills</span></h4>
					<div class="skills">
						<p><span style="width:90%;"><b>HTML&CSS</b></span></p>
						<p><span style="width:80%;"><b>JS</b></span></p>
						<p><span style="width:70%;"><b>PS</b></span></p>
						<p><span style="width:50%;"><b>PHP</b></span></p>
					</div>
				</li>
			</ul>
		</div>

	</div><!-- .about-me-wrap -->
	
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