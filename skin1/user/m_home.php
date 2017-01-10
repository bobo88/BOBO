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
                                <a href="javascript:;" class="current">首页管理</a>
                            </li>
                        </ul>
		        	</div>

		        	<?php
		            	if($userRights === 1){
		            ?>

		        		<ul class="pb-righttop-nav clearfix" id="js-pbRighttopNav">
	                        <li class="current">
	                            <a href="javascript:;">新增首页banner</a>
	                        </li>
	                        <li>
	                            <a href="javascript:;">更改首页banner</a>
	                        </li>
	                        <li>
	                            <a href="javascript:;">删除首页banner</a>
	                        </li>
	                    </ul><!-- .home-banner-nav -->


			            <section class="right-content-wrap js-pbRightContent" style="margin-top: 0; border:1px solid #3498db;">
							<!-- 新增首页banner -->
				            <form action="" id="user-addhomebanner-form" class="user-global-form" method="post" novalidate="novalidate">
		                        <label>
		                            <span class="form-label">bannerUrl：</span>
		                            <span>
		                                <input type="text" name="bannerurl" value="" placeholder="请输入图片对应页面的地址">
		                            </span>
		                            <span class="span-form-tips"><strong>*</strong>首页banner图对应的网站页面地址，比如具体的文章页面地址等</span>
		                        </label>
		                        <label>
		                            <span class="form-label">bannerImg：</span>
		                            <span>
		                                <input type="text" name="bannerimg" value="" placeholder="请输入图片线上地址">
		                            </span>
		                            <span class="span-form-tips"><strong>*</strong>首页banner的线上图片地址</span>
		                        </label>
		                        <label>
		                            <span class="form-label">bannerTitle：</span>
		                            <span>
		                                <input type="text" name="bannertitle" value="" placeholder="请输入banner标题">
		                            </span>
		                            <span class="span-form-tips"><strong>*</strong>首页banner的标题</span>
		                        </label>
		                        
		       
		                        <p class="mt30">
		                            <span class="form-label">&nbsp;</span>
		                            <a class="btn btn-default js_submitAdd" href="javascript:;">保存</a>
		                        </p>
		                    </form>

							<!-- 更改首页banner -->
	    		            <form action="" id="user-changehomebanner-form" class="user-global-form none" method="post" novalidate="novalidate">
	                            <label>
	                                <span class="form-label">bannerId：</span>
	                                <span>
	                                    <input type="text" name="bannerid" value="" placeholder="请输入图片对应的ID">
	                                </span>
	                                <span class="span-form-tips"><strong>*</strong>首页banner图对应的ID</span>
	                            </label>
	                            <label>
	                                <span class="form-label">bannerUrl：</span>
	                                <span>
	                                    <input type="text" name="bannerurl" value="" placeholder="请输入图片对应页面的地址">
	                                </span>
	                                <span class="span-form-tips"><strong>*</strong>首页banner图对应的网站页面地址，比如具体的文章页面地址等</span>
	                            </label>
	                            <label>
	                                <span class="form-label">bannerImg：</span>
	                                <span>
	                                    <input type="text" name="bannerimg" value="" placeholder="请输入图片线上地址">
	                                </span>
	                                <span class="span-form-tips"><strong>*</strong>首页banner的线上图片地址</span>
	                            </label>
	                            <label>
	                                <span class="form-label">bannerTitle：</span>
	                                <span>
	                                    <input type="text" name="bannertitle" value="" placeholder="请输入banner标题">
	                                </span>
	                                <span class="span-form-tips"><strong>*</strong>首页banner的标题</span>
	                            </label>

	                            <p class="mt30">
	                                <span class="form-label">&nbsp;</span>
	                                <a class="btn btn-default js_submitChange" href="javascript:;">保存</a>
	                            </p>
	                        </form>

							<!-- 删除首页banner -->
				            <form action="" id="user-removehomebanner-form" class="user-global-form none" method="post" novalidate="novalidate">
		                        <label>
		                            <span class="form-label">bannerId：</span>
		                            <span>
		                                <input type="text" name="bannerid" value="" placeholder="请输入图片对应的ID">
		                            </span>
		                            <span class="span-form-tips"><strong>*</strong>首页banner图对应的ID</span>
		                        </label>

		                        <p class="mt30">
		                            <span class="form-label">&nbsp;</span>
		                            <a class="btn btn-default js_submitRemove" href="javascript:;">保存</a>
		                        </p>
		                    </form>

		                    <!-- 隐藏弹窗，-->
		                    <div id="js_pop" class="tc pt30 none">
		                        <p>
		                            <i class="user-icon icon-big-success"></i>
		                        </p>
		                        <p class="bold18 mt10">首页Banner已调整完成</p>
		                        <p class="mt20">
		                            <a href="/" class="btn btn-default">查看首页</a>
		                        </p>
		                    </div>
		                    <!-- 隐藏弹窗，-->
			            </section>

		            <?php
		            	}else{
		            ?>
		            	<section class="right-content-wrap">
							<div class="no-permission">
								<p class="img"><img src="dist/images/domeimg/user/no_permission_icon.png" width="100" alt="对不起！该版块您暂无权限操作..."></p>
								<p class="tips warn">对不起！该版块您暂无权限操作...</p>
							</div>
		         		</section>
		            <?php
		            	}
		            ?>
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
				$(function(){
					// user-addhomebanner-form
					window.USER.home.addHomeBannerForm($('#user-addhomebanner-form'));

					// user-changehomebanner-form
					window.USER.home.changeHomeBannerForm($('#user-changehomebanner-form'));

					// user-removehomebanner-form
					window.USER.home.removeHomeBannerForm($('#user-removehomebanner-form'));
				});
			});
	</script>

</body>
</html>