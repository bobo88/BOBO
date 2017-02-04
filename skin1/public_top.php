<!--public public_top.php start -->
<div id="top">
	<div class="top-content clearfix">
		<div class="top_r">
			<?php
				if(isset($_SESSION['userid'])){
			?>
				<dl class="js-isLogin">
					<dd><a href="http://www.yuanbo88.com/m-user-center.html">个人中心</a></dd>
					<dd>欢迎你！<a href="http://www.yuanbo88.com/m-user-center.html"><span class="js-userName"><strong><?php echo $currentNickname; ?></strong></span></a></dd>
					<dd><a href="javascript:;" class="js-logout">退出登录</a></dd>
				</dl>
				
			<?php
				}else{
			?>
				<dl class="js-isNotLogin">
					<dd><a href="http://www.yuanbo88.com/m-user-center.html">个人中心</a></dd>
					<dd><a href="http://www.yuanbo88.com/sign.html">登录</a></dd>
					<dd><a href="http://www.yuanbo88.com/sign.html?type=2">注册</a></dd>
					<dd class="topr-qrcode">
						<a href="javascript:;">关注 “园博吧” 微信公众号</a>
						<div class="qr-code-wrap">
							<div class="qr-code-box">
								<i class="triangle triangle_t"></i>
								<i class="triangle triangle_t2"></i>
								<p><img src="http://www.yuanbo88.com/dist/images/qrcode_258.jpg" height="150" width="150" alt="关注“园博吧”微信公众号"></p>
								<p class="txt">园博吧</p>
							</div>
						</div>
					</dd>
				</dl>
			<?php
				}
			?>
			<dl>
				<dt class="last"><a href="javascript:;" title="【园博吧资源网】专注WEB前端开发" rel="sidebar" onclick="addBookmark();">收藏本站</a></dt>
			</dl>
		</div>
	</div>
</div><!-- #top -->

<div class="top-main-wrap js-topMainWrap">
	<div id="topMian">
		<div class="logo"><a href="http://www.yuanbo88.com/" title="园博吧"><img src="http://www.yuanbo88.com/dist/images/styleimg/logo.png" height="60" width="170" alt="园博吧"></a></div>
		<div class="topm_nav clearfix">
			<ul class="clearfix fl">
				<li>
					<a href="http://www.yuanbo88.com/category-1-1.html" class="s-title">前端开发</a>
					<dl>
						<dd><a href="http://www.yuanbo88.com/category-h-1.html">HTML系列</a></dd>
						<dd><a href="http://www.yuanbo88.com/category-c-1.html">CSS系列</a></dd>
						<dd><a href="http://www.yuanbo88.com/category-j-1.html">Javascript系列</a></dd>
					</dl>
				</li>
				<li>
					<a href="http://www.yuanbo88.com/category-2-1.html" class="s-title">前端扩展</a>
					<dl>
						<dd><a href="http://www.yuanbo88.com/category-n-1.html">NodeJS系列</a></dd>
						<dd><a href="http://www.yuanbo88.com/category-v-1.html">VueJS系列</a></dd>
						<!-- <dd><a href="http://www.yuanbo88.com/category-r-1.html">React系列</a></dd> -->
						<dd><a href="http://www.yuanbo88.com/category-o-1.html">其他扩展</a></dd>
					</dl>
				</li>
				<li><a href="http://www.yuanbo88.com/booklist.html" class="s-title">参考书籍<i class="icon-fire ml5"></i></a></li>
				<li><a href="http://www.yuanbo88.com/catedemo.html" class="s-title">演示案例<i class="icon-fire ml5"></i></a></li>
				<li>
					<a href="javascript:;" class="s-title">其他</a>
					<dl>
						<dd><a href="http://www.yuanbo88.com/catewei.html">微话题</a></dd>
						<dd><a href="http://www.yuanbo88.com/weiword.html">微言</a></dd>
						<dd><a href="http://www.yuanbo88.com/dou.html">你真逗</a></dd>
						<dd><a href="http://www.yuanbo88.com/about.html">关于我</a></dd>
					</dl>
				</li>
			</ul>

			<a class="demo-banner fr" href="<?php echo $demoFirstUrl; ?>" title="<?php echo $demoFirstTitle; ?>"><img src="<?php echo $demoFirstImg; ?>" alt="<?php echo $demoFirstTitle; ?>" width="75" height="40"></a>
		</div>

		<!-- <div class="topm_tel">
			<i class="befor_icon c_tagbg"></i>
			<span>1882653****</span>
		</div> -->

		<div class="search-warp clearfix fr">
			<p class="error-tips js-errorTips"></p>
	        <div class="search-area" data-search="top-banner">
	            <input class="search-input" id="js-searchInput" placeholder="请输入搜索的关键词..." type="text" autocomplete="off" onkeypress="getKey();">
	        </div>
	        <div class="showhide-search" id="js-globalSearch"><i class="iconfont">&#xf002d;</i></div>
	    </div>
	</div><!-- #topMian -->
</div>
<!--public public_top.php end -->