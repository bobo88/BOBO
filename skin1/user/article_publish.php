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
                                <a href="javascript:;" class="current">文章发表</a>
                            </li>
                        </ul>
		        	</div>

		            <section class="article-item-warp right-content-wrap">
			            <?php
			            	if($userRights === 1){
			            ?>
			                <div id="article-publish-box">
			                	<section class="article-publish-content">

			                		<div class="publish-options-wrap">
			                			<form action="" method="post" class="user-global-form" id="js-articlePublishForm" novalidate="novalidate" autofocus autocomplete="off">
			                				<label class="clearfix options">
			                					<span class="title">文章author：</span>
			                					<span class="cont">
			                						<select name="author" id="author">
			                							<option value="1">1</option>
			                							<option value="2">2</option>
			                						</select>
			                					</span>
			                					<span class="tips"><strong>*</strong>1:BOBO, 2:JunFang。-----与user表中的name进行对应</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章分类sort：</span>
			                					<span class="cont">
			                						<select name="sort" id="sort">
			                							<option value="0">0</option>
			                							<option value="1">1</option>
			                							<option value="2">2</option>
			                							<option value="3">3</option>
			                							<option value="4">4</option>
			                							<option value="5">5</option>
			                							<option value="6">6</option>
			                						</select>
			                					</span>
			                					<span class="tips"><strong>*</strong>表示文章系列-----1:HTML, 2:css, 3:js, 4:node, 5:vue, 6:react, 0:other。</span>
			                				</label>
			                				<label class="clearfix options">
			                					<span class="title">文章大类category：</span>
			                					<span class="cont">
			                						<select name="category" id="category">
			                							<option value="1">1</option>
			                							<option value="2">2</option>
			                						</select>
			                					</span>
			                					<span class="tips"><strong>*</strong>表示文章大类-----1:前端开发，2:前端扩展。</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章标题title：</span>
			                					<span class="cont">
			                						<input type="text" name="title" id="title" placeholder="请输入文章标题内容，字符控制在50以内">
			                					</span>
			                					<span class="tips"><strong>*</strong>文章标题内容，字数为50以内。</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章简介summary：</span>
			                					<span class="cont">
			                						<input type="text" name="summary" id="summary" placeholder="请输入文章简介内容，字符控制在200以内">
			                					</span>
			                					<span class="tips"><strong>*</strong>文章简介内容，字数为200以内。</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章内容content：</span>
			                					<span class="cont">
			                						<textarea name="content" id="content" cols="30" rows="10"></textarea>
			                					</span>
			                					<span class="tips" style="height: 80px;line-height: 20px;"><strong>*</strong>文章内容，一般用p标签，特殊的代码格式用：<br/>&lt;pre class="brush: js;"&gt;代码内容&lt;/pre&gt;。<br/>注意：brush后面的js，可以替换成css , js(jscript/javascript) , php , sass(scss) , sql, xml等，会输入相对应的代码格式。</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章关键词：</span>
			                					<span class="cont">
			                						<input type="text" name="keyword" id="keyword">
			                					</span>
			                					<span class="tips"><strong>*</strong>文章关键词：不能为空，多个关键词用空格隔开</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章热度hot：</span>
			                					<span class="cont">
			                						<input type="text" name="hot" id="hot">
			                					</span>
			                					<span class="tips"><strong>*</strong>文章热度：默认值为0</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章是否置顶isTop：</span>
			                					<span class="cont">
			                						<select name="isTop" id="isTop">
			                							<option value="0">0</option>
			                							<option value="1">1</option>
			                						</select>
			                					</span>
			                					<span class="tips"><strong>*</strong>文章是否置顶：默认值为0。0表示不置顶，1表示置顶。</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章参考地址fromUrl：</span>
			                					<span class="cont">
			                						<input type="text" name="fromUrl" id="fromUrl">
			                					</span>
			                					<span class="tips"><strong>*</strong>文章参考地址：默认值为NULL。不填写该地址，则表示文章原创。</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章参考标题fromTitle：</span>
			                					<span class="cont">
			                						<input type="text" name="fromTitle" id="fromTitle">
			                					</span>
			                					<span class="tips"><strong>*</strong>文章参考标题：默认值为NULL，若文章属于借鉴参考，这里填写对应文章标题。不填写该地址，则表示文章原创。</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章小插图littleImg：</span>
			                					<span class="cont">
			                						<input type="text" name="littleImg" id="littleImg">
			                					</span>
			                					<span class="tips"><strong>*</strong>文章小插图：默认值为NULL，如果有，大小宽度为64*64。</span>
			                				</label>

			                				<label class="clearfix options">
			                					<span class="title">文章大插图bigImg：</span>
			                					<span class="cont">
			                						<input type="text" name="bigImg" id="bigImg">
			                					</span>
			                					<span class="tips"><strong>*</strong>文章大插图：默认值为NULL，如果有，大小宽度为320*280。</span>
			                				</label>
			                				
			                				<p class="submit">
			                					<em>
			                						<span><input type="submit" class="js_submit" value="发表"></span>
			                					</em>
			                				</p>
			                			</form>
			                			
			                		</div><!-- .publish-options-wrap -->
			                	</section>	

			                </div><!-- #article-publish-box -->
			            <?php
			            	}else{
			            ?>
							<div class="no-permission">
								<p class="img"><img src="dist/images/domeimg/user/no_permission_icon.png" width="100" alt="对不起！该版块您暂无权限操作..."></p>
								<p class="tips warn">对不起！该版块您暂无权限操作...</p>
							</div>
			            <?php
			            	}
			            ?>

			            <!-- 隐藏弹窗，-->
			            <div id="js_pop" class="tc pt30 none">
			                <p>
			                    <i class="user-icon icon-big-success"></i>
			                </p>
			                <p class="bold18 mt10">文章发表成功</p>
			                <p class="mt20">
			                    <a href="/m-article-publish.html" class="btn btn-default">返回文章发表页面</a>
			                </p>
			            </div>
			            <!-- 隐藏弹窗，-->

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
				USER.article.articlePublishForm($("#js-articlePublishForm"));
			});
	</script>

</body>
</html>