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
	<link rel="stylesheet" href="dist/css/sign_min.css">
</head>
<body>
		
	<div id="admin-box">
		<div id="imgbg" data-imgsrc="dist/images/domeimg/sign/signbg_2.jpg|dist/images/domeimg/sign/signbg_9.jpg">
			<img src="dist/images/domeimg/sign/signbg_2.jpg" width="100%" height="100%" alt="">	
		</div>

		<section class="login-box" id="js-signWrapBox">
			<header class="clearfix">
				<a href="/" title="BOBO logo" class="fl"><img src="dist/images/styleimg/logo.png" height="60" width="170" alt="BOBO"></a>
			</header>

			<div class="bo-valid clearfix">
				<section class="operal-box">
					<h3>用户后台登录</h3>
					<div class="operal-form mt20">
						<form action="#" method="post" id="js-adminSigninform" novalidate="novalidate" autofocus autocomplete="off">
							<div class="input-group">
								<i class="login-icon icon-name position-left"></i>
								<div class="input-wrap">
									<input type="text" name="phone" id="js-adminLoginPhone" class="phone" placeholder="请输入手机号" autocomplete="off">
								</div>
							</div>

							<div class="input-group">
								<i class="login-icon icon-password position-left"></i>
								<div class="input-wrap">
									<input type="password" name="password" id="js-adminLoginPassword" class="password" placeholder="请输入密码">
								</div>
							</div>

							<p class="submit mb30">
								<em>
									<span><input type="submit" id="js-submitAdminLoginForm" value="SIGN IN"></span>
								</em>
							</p>
						</form>
					</div>
				</section>
			</div>

			<footer>
				<div class="f-copyrit fl">Copyright 2016-2017 yuanbo88.com All Rights Reserved.</div>
			</footer>
		</section>

	</div>


	<!-- foot js -->
	<script src="dist/minjs/plug.min.js"></script>
	<script src="dist/minjs/common.min.js"></script>

	<script>
		$LAB.setGlobalDefaults({BasePath:"dist/minjs/"})
	</script>

	<script>
		$LAB.script("jquery.validate.min.js")
			.wait(function(){
				(function(){
					var _href = window.location.href;

					if(_href.split('?')[1] === "type=0"){
						GLOBAL.PopObj.alert({content: '您没有发表文章的权限，请注册申请！'});
					}
				})();
			})
			.script("sign.min.js?2016081101")
	</script>

</body>
</html>