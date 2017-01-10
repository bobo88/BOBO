<?include 'header_php.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<? include '../public_user_top.php'; ?>
</head>
<body>
	<header id="header">
		<? include '../public_top.php'; ?>
	</header>
	

		<div id="user-index" class="user-center-wrap">
			<p class="top-nav">
				<a href="/">园博吧</a>
				&gt;
				<a href="/m-user-center.html">个人中心</a>
			</p>

			<div class="user-index-wrap clearfix pb40">
		        <div class="user-conent-warp fr">
		        	<div class="user-action-menu-warp">
		        		<span class="bline"></span>
		        		<ul class="user-action-menu-list clearfix">
                            <li>
                                <a href="javascript:;" class="current">修改密码</a>
                            </li>
                        </ul>
		        	</div>

		            <section class="article-item-warp right-content-wrap">
						<form action="" id="user-changepsw-form" class="user-global-form" method="post" novalidate="novalidate">
	                        <label>
	                            <span class="form-label">当前密码：</span>
	                            <span>
	                                <input type="password" name="current_password" id="js_currentPass" placeholder="请输入当前密码" value="">
	                            </span>
	                        </label>
	                        <label>
	                            <span class="form-label">新密码：</span>
	                            <span>
	                                <input type="password" name="password" id="js_password" placeholder="请输入新密码" value="">
	                            </span>
	                        </label>
	                        <label>
	                            <span class="form-label">确认新密码：</span>
	                            <span>
	                                <input type="password" name="password_confirm" placeholder="确认新密码" value="">
	                            </span>
	                        </label>
	                        
							<label>
	                            <span class="form-label">验证码：</span>
								<span>
									<input type="text" name="security_code" value="" class="security_code" placeholder="请输入验证码" id="js-myProfileCode" maxlength="4">
								</span>
								<span class="code-img-wrap">
									<img id="js-checkpic" data-src="/m-code-profile.html" src="/m-code-profile.html" />
								</span>
							</label>
	       
	                        <p class="mt30">
	                            <span class="form-label">&nbsp;</span>
	                            <a class="btn btn-default js_submit" href="javascript:;">确认</a>
	                        </p>
	                    </form>

	                    <!-- 隐藏弹窗，-->
	                    <div id="js_pop" class="tc pt30 none">
	                        <p>
	                            <i class="user-icon icon-big-success"></i>
	                        </p>
	                        <p class="bold18 mt10">您的密码已重置</p>
	                        <p class="prompt fs12">请使用新密码</p>
	                        <p class="mt20">
	                            <a href="/sign.html" class="btn btn-default">重新登陆</a>
	                        </p>
	                    </div>
	                    <!-- 隐藏弹窗，-->

	
						<!-- <div class="no-permission">
							<p class="img"><img src="dist/images/domeimg/user/in_development_icon.png" width="100" alt="模块开发中！敬请期待..."></p>
							<p class="tips">模块开发中！敬请期待...</p>
						</div> -->

		            </section>
		        </div>


		      	<?include 'user_leftside.php'; ?>

			</div><!-- .user-index-wrap -->

		</div><!-- #user-index -->


	<footer id="footer">
		<? include '../foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$LAB.script("user.min.js")
			.wait(function(){
				USER.profile.changePassForm($("#user-changepsw-form"));
			});
	</script>

</body>
</html>