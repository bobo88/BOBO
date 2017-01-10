<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<? include 'top.html'; ?>
</head>
<body>
	<header id="header">
		<? include 'public_top.php'; ?>
	</header>

	<canvas id="canvas" style="border:1px solid #aaa; display:block; margin:50px auto;">
		您的浏览器不支持canvas，请更换浏览器！
	</canvas>

	<footer id="footer">
		<? include 'foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$(function(){
			var canvas = $('#canvas')[0];
			canvas.width = 400;
			canvas.height = 400;
			var context = canvas.getContext('2d');

		});
	</script>

</body>
</html>