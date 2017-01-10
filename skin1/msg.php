<?php
session_start();
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
		
	<div class="msg-main w1200">
		<!-- success:表示成功，failure：表示失败，warning：表示警告 -->
		<p class="title"><i class="msg-status success"></i></p>
		<div class="msg-content">
			<p class="con-tit">修改成功！</p>
		</div>
		<p class="btn-wrap clearfix">
			<a href="http://www.yuanbo88.com">返回首页</a>
	        <a href="<?php echo $msg['link']; ?>" class="color-main">返回</a>
	                                   					
		</p>		 
	</div>

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