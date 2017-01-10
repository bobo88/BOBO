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
                                <a href="javascript:;" class="current">参考书籍管理</a>
                            </li>
                        </ul>
		        	</div>

    	        	<?php
    	            	if($userRights === 1){
    	            ?>

    	        		<ul class="pb-righttop-nav clearfix" id="js-pbRighttopNav">
                            <li class="current">
                                <a href="javascript:;">新增参考书籍</a>
                            </li>
                            <li>
                                <a href="javascript:;">更改参考书籍</a>
                            </li>
                            <li>
                                <a href="javascript:;">删除参考书籍</a>
                            </li>
                        </ul><!-- .home-banner-nav -->


    		            <section class="right-content-wrap js-pbRightContent" style="margin-top: 0; border:1px solid #3498db;">
    						<!-- 新增参考书籍 -->
    			            <form action="" id="user-add-refbook-form" class="user-global-form" method="post" novalidate="novalidate">
    	                        <label>
    	                            <span class="form-label">bookAddress:</span>
    	                            <span>
    	                                <input type="text" name="bookaddress" value="" placeholder="请输入参考书籍的百度云盘地址">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>参考书籍的百度云盘url地址</span>
    	                        </label>
    	                        <label>
    	                            <span class="form-label">bookName:</span>
    	                            <span>
    	                                <input type="text" name="bookname" value="" placeholder="请输入参考书籍的书名">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>参考书籍的书名</span>
    	                        </label>
    	                        <label>
    	                            <span class="form-label">bookImg:</span>
    	                            <span>
    	                                <input type="text" name="bookimg" value="" placeholder="请输入参考书籍的封面图片">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>参考书籍的封面图片url地址</span>
    	                        </label>
    	                        <label>
    	                            <span class="form-label">bookPwd:</span>
    	                            <span>
    	                                <input type="text" name="bookpwd" value="" placeholder="请输入参考书籍的下载密码">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>参考书籍的下载密码</span>
    	                        </label>
    	                        <label>
    	                            <span class="form-label">bookSummary:</span>
    	                            <span>
    	                                <input type="text" name="booksummary" value="" placeholder="请输入参考书籍的简介">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>参考书籍的简介</span>
    	                        </label>

    	                        <p class="mt30">
    	                            <span class="form-label">&nbsp;</span>
    	                            <a class="btn btn-default js_submitAdd" href="javascript:;">保存</a>
    	                        </p>
    	                    </form>

    						<!-- 更改参考书籍 -->
        		            <form action="" id="user-change-refbook-form" class="user-global-form none" method="post" novalidate="novalidate">
                                <label>
                                    <span class="form-label">bookId：</span>
                                    <span>
                                        <input type="text" name="bookid" value="" placeholder="请输入参考书籍的id">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>参考书籍id</span>
                                </label>
                                <label>
                                    <span class="form-label">bookAddress:</span>
                                    <span>
                                        <input type="text" name="bookaddress" value="" placeholder="请输入参考书籍的百度云盘地址">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>参考书籍的百度云盘url地址</span>
                                </label>
                                <label>
                                    <span class="form-label">bookName:</span>
                                    <span>
                                        <input type="text" name="bookname" value="" placeholder="请输入参考书籍的书名">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>参考书籍的书名</span>
                                </label>
                                <label>
                                    <span class="form-label">bookImg:</span>
                                    <span>
                                        <input type="text" name="bookimg" value="" placeholder="请输入参考书籍的封面图片">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>参考书籍的封面图片url地址</span>
                                </label>
                                <label>
                                    <span class="form-label">bookPwd:</span>
                                    <span>
                                        <input type="text" name="bookpwd" value="" placeholder="请输入参考书籍的下载密码">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>参考书籍的下载密码</span>
                                </label>
                                <label>
                                    <span class="form-label">bookSummary:</span>
                                    <span>
                                        <input type="text" name="booksummary" value="" placeholder="请输入参考书籍的简介">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>参考书籍的简介</span>
                                </label>
                               

                                <p class="mt30">
                                    <span class="form-label">&nbsp;</span>
                                    <a class="btn btn-default js_submitChange" href="javascript:;">保存</a>
                                </p>
                            </form>

    						<!-- 删除参考书籍 -->
    			            <form action="" id="user-remove-refbook-form" class="user-global-form none" method="post" novalidate="novalidate">
    	                        <label>
    	                            <span class="form-label">bookId：</span>
    	                            <span>
    	                                <input type="text" name="bookid" value="" placeholder="请输入参考书籍的id">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>参考书籍id</span>
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
    	                        <p class="bold18 mt10">参考书籍已调整完成</p>
    	                        <p class="mt20">
    	                            <a href="/booklist.html" class="btn btn-default">查看参考书籍列表</a>
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
					// user-add-refbook-form
					window.USER.refbook.addRefBookForm($('#user-add-refbook-form'));

					// user-change-refbook-form
					window.USER.refbook.changeRefBookForm($('#user-change-refbook-form'));

					// user-remove-refbook-form
					window.USER.refbook.removeRefBookForm($('#user-remove-refbook-form'));
				});
			});
	</script>

</body>
</html>