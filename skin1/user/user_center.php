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
	            <div class="user-info">
	                <div class="user-info-wrap">
	                    <div class="avatar">
	                        <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="100" height="100">
	                    </div>
	                    <div class="user-info-detail">
	                        <table class="user-table-info table">
	                            <tbody>
	                                <tr>
	                                    <td colspan="3">
	                                        <h2 class="bold16"><?php echo $currentNickname; ?>，欢迎你！</h2>
	                                    </td>
	                                </tr>
	                                <tr class="user-info-cash">
	                                    <td>专注WEB前端开发 - BOBO园博吧</td>
	                                </tr>
	                                <tr class="user-info-child-border">
	                                    <td>园博吧资源网 - 专注web前端开发，包括web前端开发教程、书籍、api手册、前端框架、前端面试题、前端问答以及一些系列前端开发资源分享，是一个专业技术交流、资源共享平台！</td>
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	            <section class="order-item-warp overview-warp">
	                
	            </section>
	        </div>

	        
	        <?include 'user_leftside.php'; ?>

		</div><!-- .user-index-wrap -->

	</div><!-- #user-index -->
	

	<footer id="footer">
		<? include '../foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$LAB.script("jquery.validate.min.js")
			.wait(function(){
				(function(){
					var _href = window.location.href;

					if(_href.split('?')[1] === "type=0"){
						GLOBAL.PopObj.alert({content: '您没有发表文章的权限，请注册申请！'});
					}
				})();
			});
	</script>

</body>
</html>