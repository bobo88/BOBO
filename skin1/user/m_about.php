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
                                <a href="javascript:;" class="current">关于我</a>
                            </li>
                        </ul>
		        	</div>

		            <section class="article-item-warp right-content-wrap">
			            <div class="no-permission">
			            	<p class="img"><img src="dist/images/domeimg/user/in_development_icon.png" width="100" alt="模块开发中！敬请期待..."></p>
			            	<p class="tips">模块开发中！敬请期待...</p>
			            </div>
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
					var $publishForm = $("#js-articlePublishForm");
					if($publishForm.length > 0){
						$publishForm.validate({
							rules: {
								title: {
									required: true
								},
							    summary: {
							        required: true,
							        maxlength: 200,
							        minlength: 10
							    },
							    content: {
							    	required: true,
							    	minlength: 200
							    },
							    keyword: {
							    	required: true
							    }
							},
							messages: {
								title: {
									required: '请输入文章标题'
								},
							    summary: {
							        required:  '请输入文章简介',
							        maxlength: '文章简介不能大于200个字符',
							        minlength: '文章简介不能小于10个字符'
							    },
							    content: {
							    	required: '请输入文章内容',
							    	minlength: '文章内容不能小于200个字符'
							    },
							    keyword: {
							    	required: '请输入关键词'
							    }
							},
							submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form 
								var $submitPublishForm = $('#js-submitPublishForm');
							    $submitPublishForm.attr('disabled','disabled');
							    $.ajax({
							    	url: '../src_publish.php',
							    	type: 'POST',
							    	dataType: 'json',
							    	data: $('#js-articlePublishForm').serialize(),
							    })
							    .done(function(data) {
							    	//status:0 表示发表不成功，弹出msg
							    	if(data.status === 1){
							    		GLOBAL.PopObj.alert({content: data.msg});
							    	}else{
							    		GLOBAL.PopObj.alert({content: data.msg});
							    	}
							    	$submitPublishForm.attr('disabled',false);
							    });  
							}, 
							errorPlacement:function(error,element){
							    element.parent().find("label.checked").remove();
							    error.appendTo(element.parent());
						    },
							success: function(label) {
							    label.remove();
							}
					    });
					}
				})();

				$("#js-articlePublishForm").find("input,select,textarea").on("focus",function(){
					var $this = $(this),
						$thisParent = $this.parents(".options");
					$thisParent.addClass('active').siblings('.options').removeClass('active');
				});
			})
			.script("")
	</script>

</body>
</html>