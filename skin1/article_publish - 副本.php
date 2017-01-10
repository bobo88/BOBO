<?php
session_start(); 
if(isset($_SESSION['username'])){
	if($_SESSION['username'] !== "敲代码的怪蜀黍"){
		//type=0表示没有权限
		header("Location: /admin.php?type=0\n");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<? include 'public_user_top.php'; ?>
	<link rel="stylesheet" href="dist/css/other_min.css">
</head>
<body>
	
	<?php
		if($_SESSION['username'] !== "敲代码的怪蜀黍"){
			//type=0表示没有权限
			header("Location: /admin.php?type=0\n");
			exit;
		}else{
	?>
		<div id="user-index" class="user-center-wrap">
			<p class="top-nav">
				<a href="/">园博吧</a>
				&gt;
				<a href="/user_center.html">个人中心</a>
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
		                                        <h2 class="bold16">Albert，欢迎你！</h2>
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

		                <div id="article-publish-box">
		                	<section class="article-publish-content">
		                		<header class="clearfix">
		                			<a href="/" title="BOBO logo" class="fl"><img src="dist/images/styleimg/logo.png" height="60" width="170" alt="BOBO"></a>
		                		</header>

		                		<h3>文章发表页面</h3>
		                				
		                		<div class="publish-options-wrap">
		                			<form action="#" method="post" id="js-articlePublishForm" novalidate="novalidate" autofocus autocomplete="off">
		                				<ul class="clearfix options">
		                					<li class="title">文章author：</li>
		                					<li class="cont">
		                						<select name="author" id="author">
		                							<option value="1">1</option>
		                							<option value="2">2</option>
		                						</select>
		                					</li>
		                					<li class="tips"><strong>*</strong>1:BOBO, 2:JunFang。-----与user表中的name进行对应</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章分类sort：</li>
		                					<li class="cont">
		                						<select name="sort" id="sort">
		                							<option value="1">1</option>
		                							<option value="2">2</option>
		                							<option value="3">3</option>
		                						</select>
		                					</li>
		                					<li class="tips"><strong>*</strong>表示文章类型-----1:HTML&CSS, 2:Javascript&jQuery, 3:其他类型。</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章标题title：</li>
		                					<li class="cont">
		                						<input type="text" name="title" id="title" placeholder="请输入文章标题内容，字符控制在50以内">
		                					</li>
		                					<li class="tips"><strong>*</strong>文章标题内容，字数为50以内。</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章简介summary：</li>
		                					<li class="cont">
		                						<input type="text" name="summary" id="summary" placeholder="请输入文章简介内容，字符控制在200以内">
		                					</li>
		                					<li class="tips"><strong>*</strong>文章简介内容，字数为200以内。</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章内容content：</li>
		                					<li class="cont">
		                						<textarea name="content" id="content" cols="30" rows="10"></textarea>
		                					</li>
		                					<li class="tips"><strong>*</strong>文章内容，一般用p标签，特殊的代码格式用：<br/>&lt;pre class="brush: js;"&gt;代码内容&lt;/pre&gt;。<br/>注意：brush后面的js，可以替换成ccss , js(jscript/javascript) , php , sass(scss) , sql, xml等，会输入相对应的代码格式。</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章关键词：</li>
		                					<li class="cont">
		                						<input type="text" name="keyword" id="keyword">
		                					</li>
		                					<li class="tips"><strong>*</strong>文章关键词：不能为空，多个关键词用空格隔开</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章热度hot：</li>
		                					<li class="cont">
		                						<input type="text" name="hot" id="hot">
		                					</li>
		                					<li class="tips"><strong>*</strong>文章热度：默认值为0</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章是否置顶isTop：</li>
		                					<li class="cont">
		                						<select name="isTop" id="isTop">
		                							<option value="0">0</option>
		                							<option value="1">1</option>
		                						</select>
		                					</li>
		                					<li class="tips"><strong>*</strong>文章是否置顶：默认值为0。0表示不置顶，1表示置顶。</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章参考地址fromUrl：</li>
		                					<li class="cont">
		                						<input type="text" name="fromUrl" id="fromUrl">
		                					</li>
		                					<li class="tips"><strong>*</strong>文章参考地址：默认值为NULL。不填写该地址，则表示文章原创。</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章参考标题fromTitle：</li>
		                					<li class="cont">
		                						<input type="text" name="fromTitle" id="fromTitle">
		                					</li>
		                					<li class="tips"><strong>*</strong>文章参考标题：默认值为NULL，若文章属于借鉴参考，这里填写对应文章标题。不填写该地址，则表示文章原创。</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章小插图littleImg：</li>
		                					<li class="cont">
		                						<input type="text" name="littleImg" id="littleImg">
		                					</li>
		                					<li class="tips"><strong>*</strong>文章小插图：默认值为NULL，如果有，大小宽度为64*64。</li>
		                				</ul>

		                				<ul class="clearfix options">
		                					<li class="title">文章大插图bigImg：</li>
		                					<li class="cont">
		                						<input type="text" name="bigImg" id="bigImg">
		                					</li>
		                					<li class="tips"><strong>*</strong>文章大插图：默认值为NULL，如果有，大小宽度为320*280。</li>
		                				</ul>
		                				
		                				<p class="submit">
		                					<em>
		                						<span><input type="submit" id="js-submitPublishForm" value="发表"></span>
		                					</em>
		                				</p>
		                			</form>
		                			
		                		</div><!-- .publish-options-wrap -->
		                	</section>	

		                </div><!-- #article-publish-box -->

		            </section>
		        </div>

		        <aside class="user-sidebar fl">
				    <ul>
				        <li class="user-center-li"><a href="/m-users-a-index.htm" class="user-center">个人中心</a></li>
				        <li><a href="#"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-order"></i>我的资料</span></a></li>

				        <li><a href="#"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-order"></i>文章管理</span></a></li>
				        <li><a href="#"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-order"></i>首页管理</span></a></li>
				        <li><a href="#"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-order"></i>参考书籍管理</span></a></li>
				        <li><a href="#"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-order"></i>微话题管理</span></a></li>
				        <li><a href="#"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-order"></i>演示案例</span></a></li>
				        <li><a href="#"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-order"></i>关于我</span></a></li>

				        <!-- <li class="no-user-rights"><a href="#"><span class="bg-layer"></span><span class="sidebar-text"><i class="user-icon icon-order"></i>关于我</span></a></li> -->
				    </ul>
				</aside>            
			</div><!-- .user-index-wrap -->

		</div><!-- #user-index -->
	<?php
		}
	?>


	<footer id="footer">
		<? include 'foot.html'; ?>	
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
							    	url: 'src_publish.php',
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