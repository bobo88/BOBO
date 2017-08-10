<!--public public_top.php start -->
<div class="container">
	<div class="top_r">
		<?php
			if(isset($_SESSION['userid'])){
		?>
			<ul class="js-isLogin">
				<li><a href="http://www.yuanbo88.com/m-user-center.html">个人中心</a></li>
				<li>欢迎你！<a href="http://www.yuanbo88.com/m-user-center.html"><span class="js-userName"><strong><?php echo $currentNickname; ?></strong></span></a></li>
				<li><a href="javascript:;" class="js-logout">退出登录</a></li>
			</ul>
			
		<?php
			}else{
		?>
			<ul class="js-isNotLogin">
				<li><a href="http://www.yuanbo88.com/m-user-center.html">个人中心</a></li>
				<li><a href="http://www.yuanbo88.com/sign.html">登录</a></li>
				<li><a href="http://www.yuanbo88.com/sign.html?type=2">注册</a></li>
				<li class="topr-qrcode">
					<a href="javascript:;">关注 “园博吧” 微信公众号</a>
					<!-- <div class="qr-code-wrap">
						<div class="qr-code-box">
							<i class="triangle triangle_t"></i>
							<i class="triangle triangle_t2"></i>
							<p><img src="http://www.yuanbo88.com/dist/images/qrcode_258.jpg" height="150" width="150" alt="关注“园博吧”微信公众号"></p>
							<p class="txt">园博吧</p>
						</div>
					</div> -->
				</li>
			</ul>
		<?php
			}
		?>
		<ul class="">
			<li class="last"><a href="javascript:;" title="【园博吧资源网】专注WEB前端开发" rel="sidebar" onclick="addBookmark();">收藏本站</a></li>
		</ul>
	</div>
</div><!-- .top -->


<!--public public_top.php end -->