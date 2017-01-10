<!DOCTYPE html>
<html lang="en">
<head>

	<? include 'top.html'; ?>
	<link rel="stylesheet" href="dist/css/sign_min.css">
</head>
<body>
	
	<div id="sign-box" class="pr">
		<div id="imgbg" data-imgsrc="dist/images/domeimg/sign/signbg_1.jpg|dist/images/domeimg/sign/signbg_2.jpg|dist/images/domeimg/sign/signbg_3.jpg|dist/images/domeimg/sign/signbg_4.jpg|dist/images/domeimg/sign/signbg_5.jpg|dist/images/domeimg/sign/signbg_6.jpg|dist/images/domeimg/sign/signbg_7.jpg|dist/images/domeimg/sign/signbg_8.jpg|dist/images/domeimg/sign/signbg_9.jpg|dist/images/domeimg/sign/signbg_10.jpg">
			<img src="dist/images/domeimg/sign/signbg_2.jpg" width="100%" height="100%" alt="">	
		</div>

		<section class="login-box" id="js-signWrapBox">
			<header class="clearfix">
				<a href="/" title="园博吧" class="fl"><img src="dist/images/styleimg/logo.png" height="60" width="170" alt="园博吧"></a>
			</header>

			<?php
				$refUrl = isset($_GET['ref']) ? $_GET['ref']:'';
				$refUrl = urldecode($refUrl);
			?>
			<input type="hidden" id="ref" value="<?php echo $refUrl; ?>" />

			<div class="bo-valid clearfix">
<?php
	//isset()检测变量是否设置 
	$type = isset($_GET["type"]) ? $_GET["type"] : "1";
	if($type == 1){//2表示注册，1或者null表示登录页面
?>
				<section class="operal-box operal-box-L">
					<h3>Sign In</h3>
					<div class="operal-form mt20">
						<form action="#" method="post" id="js-signinform" novalidate="novalidate" autofocus autocomplete="off">
							<div class="input-group mb20">
								<i class="login-icon icon-name position-left"></i>
								<div class="input-wrap">
									<input type="text" name="phone" id="js-loginPhone" class="phone" placeholder="请输入手机号" autocomplete="off">
								</div>
							</div>

							<div class="input-group mb20">
								<i class="login-icon icon-password position-left"></i>
								<div class="input-wrap">
									<input type="password" name="password" id="js-loginPassword" class="password" placeholder="请输入密码">
								</div>
							</div>

							<p class="submit mb30">
								<em>
									<span><input type="submit" id="js-submitLoginForm" value="SIGN IN"></span>
								</em>
							</p>
						</form>
					</div>
				</section>
				<section class="operal-box operal-box-R">
					<h3>New to 园博吧?</h3>
					<p class="tips">Get started now. It's fast and easy!</p>
					<div class="goto-btn">
						<a href="sign.html?type=2">
							<span>REGISTER</span>
						</a>
					</div>
				</section>
<?php
	}else{
?>
				<section class="operal-box operal-box-L">
					<h3>REGISTER</h3>
					<div class="operal-form mt20">
						<form method="post" action="#" id="js-signupform" novalidate="novalidate" autofocus autocomplete="off">
							<div class="input-group mb20">
								<i class="login-icon icon-name position-left"></i>
								<div class="input-wrap">
									<input type="text" name="phone" id="js-regPhone" class="phone" placeholder="请输入手机号" autocomplete="off">
								</div>
							</div>

							<div class="input-group mb20">
								<i class="login-icon icon-nickname position-left"></i>
								<div class="input-wrap">
									<input type="text" name="nickname" id="js-nickname" class="nickname" placeholder="请输入昵称" autocomplete="off">
								</div>
							</div>

							<div class="input-group regcode-group mb20 clearfix">
								<i class="login-icon icon-regcode position-left"></i>
								<div class="input-wrap">
									<input type="text" name="regcode" id="js-regCode" class="regcode" placeholder="请输入验证码" maxlength="4">
								</div>
								<div class="code-img-wrap pa">
									<img id="js-checkpic" data-src="/m-code-reg.html" src="/m-code-reg.html" />
								</div>
							</div>

							<div class="input-group mb20">
								<i class="login-icon icon-password position-left"></i>
								<div class="input-wrap">
									<input type="password" name="password" id="js-regPassword" class="password" placeholder="请输入密码">
								</div>
							</div>

							<div class="input-group mb20">
								<i class="login-icon icon-password position-left"></i>
								<div class="input-wrap">
									<input type="password" name="password_confirm" id="js-regPasswordConfirm" class="password_confirm" placeholder="确认登录密码">
								</div>
							</div>

							<p class="submit mb30">
								<em>
									<span><input type="submit" id="js-submitRegForm" value="REGISTER"></span>
								</em>
							</p>
						</form>
					</div>
				</section>
				<section class="operal-box operal-box-R">
					<h3>Return to Login</h3>
					<p class="tips">Already have an account?</p>
					<div class="goto-btn">
						<a href="sign.html?type=1">
							<span>SIGN IN</span>
						</a>
					</div>
				</section>
<?php
	}
?>
			</div>

			<footer>
				<div class="f-copyrit fl">Copyright ©2016-2017 yuanbo88.com All Rights Reserved.</div>
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
			.wait(function(){})
			.script("sign.min.js")
	</script>

</body>
</html>