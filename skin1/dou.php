<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';

//查询微话题数据
$sql = "SELECT d.id, d.content, d.img FROM dou AS d ORDER BY d.id DESC LIMIT 25";
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
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta content="telephone=no" name="format-detection" />
	<meta content="black-translucent" name="apple-mobile-web-app-status-bar-style"  />
	<meta content="false" id="twcClient" name="twcClient" />
	<meta content="yes" name="apple-mobile-web-app-capable"  />
	<?php include 'top.html'; ?>
	<link rel="stylesheet" href="dist/css/other_min.css">
	<style>
		body{ width: 100%; overflow-x: hidden;}
		#header{ width: 100%; min-width: 0 !important; overflow: hidden;}
		#top .top-content{ width: 100%; min-width: 0;}
		#top .top-content .logo{ float: left; width: 40%; max-width: 170px; max-height: 60px;}
		#top .top-content .logo img{ max-width: 170px; max-height: 60px;}
		#top .top_r dl{ float: right; height: 20px; line-height: 20px;}
		#top .top_r dl dt,#top .top_r dl dd{ height: 20px; line-height: 20px;}
		#top .top_r dl a{ display: inline-block; height: 20px; *display: inline;*zoom:1;}
		#footer{ display: none;}
		.foot-wrap{ min-width: auto;}
		.foot-copyright{ padding: 10px 0;}
	</style>
</head>
<body>
	<header id="header">
		<div id="top">
			<div class="top-content clearfix">
				<div class="logo"><a href="http://www.yuanbo88.com/"><img src="http://www.yuanbo88.com/dist/images/styleimg/logo.png" width="100%" alt="BOBO"></a></div>

				<div class="top_r">
					<dl>
						<dt class="last"><a href="javascript:;" title="【园博吧资源网】专注WEB前端开发" rel="sidebar" onclick="addBookmark();">收藏本站</a></dt>
					</dl>
					<?php
						if(isset($_SESSION['userid'])){
					?>
						<dl class="js-isLogin">
							<dd><a href="http://www.yuanbo88.com/m-user-center.html">个人中心</a></dd>
							<dd>欢迎你！<a href="http://www.yuanbo88.com/m-user-center.html"><span class="js-userName"><strong><?php echo $currentNickname; ?></strong></span></a></dd>
							<dd><a href="javascript:;" class="js-logout">退出登录</a></dd>
						</dl>
						
					<?php
						}else{
					?>
						<dl class="js-isNotLogin">
							<dd><a href="http://www.yuanbo88.com/sign.html">登录</a></dd>
							<dd><a href="http://www.yuanbo88.com/sign.html?type=2">注册</a></dd>
						</dl>
					<?php
						}
					?>
				</div>
			</div>
		</div><!-- #top -->
	</header>
	
	<div class="dou-wrap">
		<h1 class="title">你真逗</h1>
		<p class="tips">资源：取之网络，用之网络（用手机访问本页面效果也是杠杠的哦）。</p>
		<div class="dou-box" id="js-douBox">
			<?php
				while ($row = $results->fetch_array()){
			?>
				<p>
					<i><?php echo $row['id']; ?></i><?php echo $row['content']; ?>
					
					<?php
						if(!empty($row['img'])){
						// if(strlen($row['img']) > 0){
					?>
						<img src="<?php echo $row['img']; ?>" alt="">
					<?php
						}
					?>
				</p>
			<?php
				}
			?>
		</div>
		<div class="loading-box" id="js-loadingBox" data-flag="1" data-next="2">
			<img src="dist/images/domeimg/lazyload.gif" alt="loading">
		</div>
	</div><!-- .dou-wrap -->
	
	<footer id="footer">
		<?php include 'foot.html'; ?>	
	</footer><!--end #footer -->
	
	<script>
		$(function(){
			// 初始化 sentIt
			var sentIt = true;

			function loading(){
				var $win = $(window);
				var winH = $win.height();
				var $loadingBox = $('#js-loadingBox');
				var windScroT = $win.scrollTop();
				var loadingBoxOffsetT = $loadingBox.length>0 ? $loadingBox.offset().top : 0;

				if(windScroT > loadingBoxOffsetT - winH && sentIt ){
					sentIt = false;
					// 显示正在加载模块
					$loadingBox.show();

					$.ajax({
						url: 'src_loading_dou.php',
						type: 'POST',
						dataType: 'json',
						data: {page: $loadingBox.attr('data-next')},
					})
					.done(function(data) {
						if(data.status == 1){
							$('#js-douBox').append(data.content);
							$loadingBox.attr('data-next', (parseInt($loadingBox.attr('data-next'))+1) );
						}else{
							$loadingBox.remove();
							$('#js-douBox').after('<p class="end-loading">'+data.msg+'</p>');
						}
						setTimeout(function(){
							sentIt = true;

							// 隐藏正在加载模块
							$loadingBox.hide();
						}, 500); 
					});
				}
			}
			loading();

			$(window).scroll(function(event) {
				setTimeout(function(){
					loading();
				}, 500);
			});
		});
	</script>
</body>
</html>