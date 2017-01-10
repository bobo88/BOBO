
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

	<div class="book-detail-wrap">
		<div class="path">
			<i class="icon-path"></i>
			当前位置：<a href="/">首页</a>
			<span> > </span>参考书籍详情
		</div>
		
		<div class="book-detail">
			<h1 class="book-name">JavaScript高级程序设计（第3版）</h1>
			<p class="book-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="400" height="400" alt="JavaScript高级程序设计（第3版）"></p>

			<div class="book-summary">
				《JavaScript高级程序设计》是2006年人民邮电出版社出版的图书，作者是(美)(Nicholas C.Zakas)扎卡斯。<br/>
				全书从JavaScript 语言实现的各个组成部分——语言核心、DOM、BOM、事件模型讲起，深入浅出地探讨了面向对象编程、Ajax 与Comet 服务器端通信，HTML5 表单、媒体、Canvas（包括WebGL）及Web Workers、地理定位、跨文档传递消息、客户端存储（包括IndexedDB）等新API，还介绍了离线应用和与维护、性能、部署相关的最佳开发实践。本书附录展望了未来的API 和ECMAScript Harmony 规范。<br/>
				Nicholas C.Zakas世界知名的JavaScript专家和Web开发人员。Nicholas拥有丰富的Web开发和界面设计经验，曾经参与许多世界大公司的Web解决方案开发，并与他人合作撰写了畅销书《Ajax高级程序设计》。
			</div>
			
			<div class="book-download-wrap clearfix">
				<a href="#" target="_blank" class="fl">JavaScript高级程序设计（第3版）</a>
				<a href="javascript:;" class="copyBtn fr js-copyPswBtn" data-psw="xxcgadfgaf">一键复制获取密码</a>
				<span class="fr">密码：<strong>xxcgadfgaf</strong></span>
			</div>

			<div class="statement">
				<small>备注：参考资料来源于网络，如有涉及版权问题，请直接与我联系（邮箱地址yuanboi88@163.com），本人将尽快处理！</small>
			</div>

			<!-- 其他推荐书籍列表 -->
			<div class="other-book-wrap" id="js-otherBookList">
				<ul class="booklist clearfix">
					<li><a href="javascript:;">敬请期待</a></li>
					<li><a href="javascript:;">敬请期待</a></li>
					<li><a href="javascript:;">敬请期待</a></li>
					<li><a href="javascript:;">敬请期待</a></li>
					<li><a href="javascript:;">敬请期待</a></li>
					<li><a href="javascript:;">敬请期待</a></li>
					<li><a href="javascript:;">敬请期待</a></li>
					<li><a href="javascript:;">敬请期待</a></li>
					<li><a href="javascript:;">敬请期待</a></li>
					<li><a href="javascript:;">敬请期待</a></li>
				</ul>
				<ul class="booklist clearfix none">
					<li><a href="javascript:;">敬请期待...</a></li>
					<li><a href="javascript:;">敬请期待...</a></li>
					<li><a href="javascript:;">敬请期待...</a></li>
					<li><a href="javascript:;">敬请期待...</a></li>
					<li><a href="javascript:;">敬请期待...</a></li>
					<li><a href="javascript:;">敬请期待...</a></li>
					<li><a href="javascript:;">敬请期待...</a></li>
					<li><a href="javascript:;">敬请期待...</a></li>
					<li><a href="javascript:;">敬请期待...</a></li>
					<li><a href="javascript:;">敬请期待...</a></li>
				</ul>
				<ul class="booklist clearfix none">
					<li><a href="javascript:;">再等等...</a></li>
					<li><a href="javascript:;">再等等...</a></li>
					<li><a href="javascript:;">再等等...</a></li>
					<li><a href="javascript:;">再等等...</a></li>
					<li><a href="javascript:;">再等等...</a></li>
					<li><a href="javascript:;">再等等...</a></li>
					<li><a href="javascript:;">再等等...</a></li>
					<li><a href="javascript:;">再等等...</a></li>
					<li><a href="javascript:;">再等等...</a></li>
					<li><a href="javascript:;">再等等...</a></li>
				</ul>
				<p class="change-group mb25 tc js-changeGroup" data-current="0"><a href="javascript:;">换一批</a></p>
			</div><!-- .other-book-wrap -->
		</div>
	
	</div><!-- .book-detail-wrap -->

	<footer id="footer">
		<? include 'foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$LAB.script("jquery.flexslider.min.js")
			.script("jquery.zclip.js")
			.wait(function(){

				(function(){
					$('.js-changeGroup').click(function(){
						var current = parseInt($(this).attr('data-current'));
						var bookListArr = $('#js-otherBookList').find('.booklist');
						var allGroupNum = bookListArr.length;

						if(current < allGroupNum - 1){
							bookListArr.eq(++current).show().siblings('.booklist').hide();
							$(this).attr('data-current', current++);
						}else{
							bookListArr.eq(0).show().siblings('.booklist').hide();
							$(this).attr('data-current', 0);
						}
					});
				})();

				$(".js-copyPswBtn").zclip({
		            path: "dist/minjs/ZeroClipboard.swf",
		            copy: function(){
		            return $(this).attr('data-psw');
		            },
		            beforeCopy:function(){/* 按住鼠标时的操作 */
		                $(this).css("color","#008000");
		            },
		            afterCopy:function(){/* 复制成功后的操作 */
		                var $copyUrl = $("<div class='copy-tips'><div class='copy-tips-wrap'>☺ 复制成功</div></div>");
		                $("body").find(".copy-tips").remove().end().append($copyUrl);
		                $(".copy-tips").fadeOut(3000);
		            }
		        });
				
			})
			.script("")
	</script>

</body>
</html>
