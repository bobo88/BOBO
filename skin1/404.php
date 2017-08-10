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

	<?php include 'top.html'; ?>
	<link rel="stylesheet" href="http://www.yuanbo88.com/dist/css/other_min.css">
</head>
<body>
	<header id="header">
		<?php include 'public_top.php'; ?>
	</header>
	
	<div class="box-wrap-100percent">
		<div class="page-404">
			<p class="img-404"><img src="http://www.yuanbo88.com/dist/images/styleimg/404.png" class="js-img404" width="527" height="240" alt=""></p>
			<p class="tips js-tipsTxt">PAGE NOT FOUND</p>
			<div class="btns-wrap clearfix">
				<a href="http://www.yuanbo88.com/" class="btn-home">HOME PAGE</a>
				<a href="http://www.yuanbo88.com/about.html" class="btn-contact-us">CONTACT ME</a>
			</div>
		</div><!-- .page-404 -->
	</div>

	<footer id="footer">
		<?php include 'foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$(function(){
			(function(){
				$('.js-img404').addClass('animation-loading');
				$('.js-tipsTxt').addClass('animation-loading');
			})();
		});
	</script>
</body>
</html>