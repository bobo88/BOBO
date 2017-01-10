<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta content="telephone=no" name="format-detection" />
	<meta content="black-translucent" name="apple-mobile-web-app-status-bar-style"  />
	<meta content="false" id="twcClient" name="twcClient" />
	<meta content="yes" name="apple-mobile-web-app-capable"  />
	<? include 'top.html'; ?>
	<link rel="stylesheet" href="dist/css/other_min.css">
	<style>
		body{ width: 100%; overflow: hidden;}
		#header{ width: 100%; min-width: auto;}
		#top .top-content{ width: 100%;}
		#top .top-content .logo{ float: left; width: 40%; max-width: 170px; max-height: 60px;}
		#top .top-content .logo img{ max-width: 170px; max-height: 60px;}
		#top .top_r dl{ float: right; height: 20px; line-height: 20px;}
		#top .top_r dl dt,#top .top_r dl dd{ height: 20px; line-height: 20px;}
		#top .top_r dl a{ display: block; height: 20px;}
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
					<dl class="js-isNotLogin">
						<dd><a href="http://www.yuanbo88.com/sign.html">登录</a></dd>
						<dd><a href="http://www.yuanbo88.com/sign.html?type=2">注册</a></dd>
					</dl>
					<dl class="js-isLogin" style="display:none;">
						<dd>欢迎你！<span class="js-userName"></span></dd>
						<dd><a href="javascript:;" class="js-logout">退出登录</a></dd>
					</dl>
				</div>
			</div>
		</div><!-- #top -->
	</header>


<?php
//建立数据库连接
// require_once 'mysql_connect.php';

// //获取当前数据表中的总页码数
// $sql = "SELECT * FROM article";
// $results = $link->query($sql);
// $results->free_result();

// //执行数据库查询======================前端开发
// $sql = "SELECT a.id, a.title, a.content, a.isTop, a.bigImg FROM article AS a WHERE a.isTop=1 AND a.sort!=3 ORDER BY a.id DESC LIMIT 1";//取文章页面数据
// $results = $link->query($sql);

$isNoResult = 0;
// if(!$results){//查询失败
	// $isNoResult = 1;
// }

//关闭数据库连接
// $link->close(); 
?>

<?php  
if($isNoResult){//如果没有数据，直接到404页面
	$url = "http://www.yuanbo88.com/404.html";  
	echo "<script>";  
	echo "window.location.href='$url'";  
	echo "</script>"; 
}
?>
	
	<div class="tea-wrap">
		
	</div><!-- .tea-wrap -->
	
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