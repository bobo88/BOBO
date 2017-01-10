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
                                <a href="javascript:;" class="current">我的资料</a>
                            </li>
                        </ul>
		        	</div>

		            <section class="article-item-warp right-content-wrap">
						<form action="" id="user-profile-form" class="user-global-form" method="post" novalidate="novalidate">
	                        <label>
	                            <span class="form-label">用户昵称：</span>
	                            <span>
	                                <input type="text" name="nickname" value="<?php echo $currentNickname; ?>" maxlength="25" placeholder="长度不超过25个字符" class="valid">
	                            </span>
	                        </label>
	                        <label>
	                            <span class="form-label">登陆密码：</span>
	                            <span>
	                                <input type="text" name="password" disabled="" placeholder="***************" value="***************">
	                                <a href="/m-change_password.html" class="color-increase ml10">修改密码 &gt;</a>
	                            </span>
	                        </label>
	                        <label>
	                            <span class="form-label">绑定手机：</span>
	                            <span class="verified">
	                                <?php echo $currentName; ?> <span class="prompt">已验证</span>
	                            </span>
	                        </label>
	                        <label>
	                            <span class="form-label">绑定邮箱：</span>
								<span>
									<input type="text" name="email" value="<?php echo $currentEmail; ?>" placeholder="填写邮箱">
								</span>
							</label>
							<label>
	                            <span class="form-label">验证码：</span>
								<span>
									<input type="text" name="profilecode" value="" class="profilecode" placeholder="请输入验证码" id="js-myProfileCode" maxlength="4">
								</span>
								<span class="code-img-wrap">
									<img id="js-checkpic" data-src="/m-code-profile.html" src="/m-code-profile.html" />
								</span>
							</label>
	       
	                        <p class="mt30">
	                            <span class="form-label">&nbsp;</span>
	                            <a class="btn btn-default js_submit" href="javascript:;">保存</a>
	                        </p>
	                    </form>

	                    <!-- 隐藏弹窗，-->
	                    <div id="js_pop" class="tc pt30 none">
	                        <p>
	                            <i class="user-icon icon-big-success"></i>
	                        </p>
	                        <p class="bold18 mt10">个人资料已更新</p>
	                        <p class="mt20">
	                            <a href="/my-profile.html" class="btn btn-default">查看个人资料</a>
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
				USER.profile.profileForm($("#user-profile-form"));
			});
	</script>

</body>
</html>