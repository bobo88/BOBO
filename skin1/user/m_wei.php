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
                                <a href="javascript:;" class="current">微话题管理</a>
                            </li>
                        </ul>
		        	</div>

    	        	<?php
    	            	if($userRights === 1){
    	            ?>

    	        		<ul class="pb-righttop-nav clearfix" id="js-pbRighttopNav">
                            <li class="current">
                                <a href="javascript:;">新增微话题</a>
                            </li>
                            <li>
                                <a href="javascript:;">更改微话题</a>
                            </li>
                            <li>
                                <a href="javascript:;">删除微话题</a>
                            </li>
                        </ul><!-- .home-banner-nav -->


    		            <section class="right-content-wrap js-pbRightContent" style="margin-top: 0; border:1px solid #3498db;">
    						<!-- 新增微话题 -->
    			            <form action="" id="user-add-wei-form" class="user-global-form" method="post" novalidate="novalidate">
    	                        <label>
    	                            <span class="form-label">weiBimg:</span>
    	                            <span>
    	                                <input type="text" name="weibimg" value="" placeholder="请输入微话题的大banner图">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>微话题大banner，1920*420</span>
    	                        </label>
    	                        <label>
    	                            <span class="form-label">weiLimg:</span>
    	                            <span>
    	                                <input type="text" name="weilimg" value="" placeholder="请输入微话题的小banner图">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>微话题小banner，280*120</span>
    	                        </label>
    	                        <label>
    	                            <span class="form-label">weiSummary:</span>
    	                            <span>
    	                                <input type="text" name="weisummary" value="" placeholder="请输入微话题的简介">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>微话题简介</span>
    	                        </label>
    	                        <label>
    	                            <span class="form-label">weiTitle:</span>
    	                            <span>
    	                                <input type="text" name="weititle" value="" placeholder="请输入微话题的标题">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>微话题标题title</span>
    	                        </label>

    	                        <p class="mt30">
    	                            <span class="form-label">&nbsp;</span>
    	                            <a class="btn btn-default js_submitAdd" href="javascript:;">保存</a>
    	                        </p>
    	                    </form>

    						<!-- 更改微话题 -->
        		            <form action="" id="user-change-wei-form" class="user-global-form none" method="post" novalidate="novalidate">
                                <label>
                                    <span class="form-label">weiId：</span>
                                    <span>
                                        <input type="text" name="weiid" value="" placeholder="请输入微话题的id">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>微话题id</span>
                                </label>
                                <label>
                                    <span class="form-label">weiBimg:</span>
                                    <span>
                                        <input type="text" name="weibimg" value="" placeholder="请输入微话题的大banner图">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>微话题大banner，1920*420</span>
                                </label>
                                <label>
                                    <span class="form-label">weiLimg:</span>
                                    <span>
                                        <input type="text" name="weilimg" value="" placeholder="请输入微话题的小banner图">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>微话题小banner，280*120</span>
                                </label>
                                <label>
                                    <span class="form-label">weiSummary:</span>
                                    <span>
                                        <input type="text" name="weisummary" value="" placeholder="请输入微话题的简介">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>微话题简介</span>
                                </label>
                                <label>
                                    <span class="form-label">weiTitle:</span>
                                    <span>
                                        <input type="text" name="weititle" value="" placeholder="请输入微话题的标题">
                                    </span>
                                    <span class="span-form-tips"><strong>*</strong>微话题标题title</span>
                                </label>

                                <p class="mt30">
                                    <span class="form-label">&nbsp;</span>
                                    <a class="btn btn-default js_submitChange" href="javascript:;">保存</a>
                                </p>
                            </form>

    						<!-- 删除微话题 -->
    			            <form action="" id="user-remove-wei-form" class="user-global-form none" method="post" novalidate="novalidate">
    	                        <label>
    	                            <span class="form-label">weiId：</span>
    	                            <span>
    	                                <input type="text" name="weiid" value="" placeholder="请输入微话题的id">
    	                            </span>
    	                            <span class="span-form-tips"><strong>*</strong>微话题id</span>
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
    	                        <p class="bold18 mt10">微话题已调整完成</p>
    	                        <p class="mt20">
    	                            <a href="/catewei.html" class="btn btn-default">查看微话题列表</a>
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
					// user-add-wei-form
					window.USER.wei.addWeiTopicForm($('#user-add-wei-form'));

					// user-change-wei-form
					window.USER.wei.changeWeiTopicForm($('#user-change-wei-form'));

					// user-remove-wei-form
					window.USER.wei.removeWeiTopicForm($('#user-remove-wei-form'));
				});
			});
	</script>

</body>
</html>