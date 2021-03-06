<?php
session_start(); 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';


$hasNoComment = 0;

//判断是否登录
if(isset($_SESSION["userid"]) && isset($currentNickname) ){
	$isLogin = 1;
}else{
	$isLogin = 0;	
}

//执行数据库查询
$sql2 = "SELECT w.time, w.content, w.floor, u.name FROM weiword AS w, user AS u WHERE u.id=w.uid ORDER BY w.floor DESC";//
$results2 = $link->query($sql2);
$hasResult2 = $results2->num_rows;

//如果没有评论列表数据
if($hasResult2 > 0){
	$hasNoComment = 1;
}

//关闭数据库连接
$link->close(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<?php include 'top.html'; ?>
	<link rel="stylesheet" href="dist/css/other_min.css">
</head>
<body>
	<header id="header">
		<?php include 'public_top.php'; ?>
	</header>

	<div class="wei-wrap">
		<section class="wei-topic-wrap" style="background:url(dist/images/domeimg/weiword/weiword.jpg) center center no-repeat;">
			<div class="wei-topic w1200">
				<h1 class="topic">微言大义</h1>
				<p class="tips">
					微言大义，含蓄微妙的言语，精深切要的义理。微言：精当而含义深远的话；大义：本指经书的要义，后指大道理。包含在精微语言里的深刻的道理。<br/>
					小故事，蕴含大学问！
				</p>
			</div>
		</section>

		<section class="comment">
			<h5 class="comment-toptitle"><span class="before"></span>我说两句<small>以下用户言论只代表其个人观点，不代表 园博吧（yuanbo88） 的观点或立场。</small></h5>
			<div class="comment-area pr">
				<?php
					if($isLogin == 1){
				?>
					<!-- publish comment -->
					<div id="comment-text">
						<textarea class="comment-text" name="comment-text" id="js-commentTextBox"></textarea>
						<button type="button" class="btn-comment pull-right" id="js-submitComment" data-loading="1">GO</button>
					</div>
				<?php
					}else{
				?>
					<!-- Login First -->
					<div id="comment-login">
						<div id="login-cont">
							<a href="http://www.yuanbo88.com/sign.html?ref=weiword.html">登录</a> 以后才能发表 “微言论”
						</div>	
					</div>
				<?php
					}
				?>

				<div id="comment-list">
					<?php
						if($hasNoComment == 1){
					?>
						<h5 class="titlebar weiword"><span>最新<small>微言</small></span></h5>
						<div id="comment-new">
							<?php
								while ($row = $results2->fetch_array()){
							?>
								<section id="f1" class="media">
									<img src="dist/images/domeimg/default_user.jpg" class="user" alt="user">
									<div class="media-heading">
										<span class="username"><?php echo $row['name']; ?></span>
										<span class="time"><?php echo $row['time']; ?></span>
										<span class="floor"><?php echo $row['floor']; ?></span>
									</div>
									<p><?php echo $row['content']; ?></p>
								</section>
							<?php
								}
							?>
						</div>
					<?php
						}else{
					?>
						<div id="js-emptyWei">没有数据，空沙发等你来坐!</div>
					<?php
						}
					?>
				</div>
			</div>
		</section>

	</div><!-- .wei-wrap -->
	

	<footer id="footer">
		<?php include 'foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$LAB.script("")
			.wait(function(){
				$(function(){
					$('#js-submitComment').click(function(){
						var thatBtn = $(this);
						var $commentTextBox = $('#js-commentTextBox');
						var commentTxtLen = $commentTextBox.val().length;
						var floor = $('.floor').length > 0 ? (parseInt($('.floor').eq(0).html())+1) : 1;
						var username = '<?php echo $currentNickname;?>';
						if(thatBtn.attr('data-loading') == 0){
							GLOBAL.PopObj.alert({content: '悠着点，您点击提交的次数太快了！'});
							return false;
						}

						if(!commentTxtLen){
							GLOBAL.PopObj.alert({content: '写点东西才能提交哦！'});
							return false;
						}

						if(commentTxtLen > 800){
							GLOBAL.PopObj.alert({content: '微言评论不能超过800！请再精简一下吧。'});
						}else{
							thatBtn.attr('data-loading',0);

							$.ajax({
								url: 'src_weiword.php',
								type: 'POST',
								dataType: 'json',
								data: {commenttext: $commentTextBox.val(), username: username, floor: floor},
							})
							.done(function(data) {
								var _html = '';

								if(data.status === 1){
									GLOBAL.PopObj.alert({content: data.msg});
									if(!($('.floor').length)){
										_html += '<h5 class="titlebar"><span>最新<small>微言</small></span></h5><div id="comment-new"><section id="f1" class="media"><img src="dist/images/domeimg/default_user.jpg" class="user" alt="user">';
										_html += '<div class="media-heading"><span class="username">'+ username +'</span>';
										_html += '<span class="time">刚刚</span>';
										_html += '<span class="floor">'+ floor +'</span>';
										_html += '</div><p>'+ $commentTextBox.val() +'</p>';
										_html += '</section></div>';

										$('#js-emptyWei').remove();
										$('#comment-list').prepend(_html);
									}else{
										_html += '<section id="f1" class="media"><img src="dist/images/domeimg/default_user.jpg" class="user" alt="user">';
										_html += '<div class="media-heading"><span class="username">'+ username +'</span>';
										_html += '<span class="time">刚刚</span>';
										_html += '<span class="floor">'+ floor +'</span>';
										_html += '</div><p>'+ $commentTextBox.val() +'</p>';
										_html += '</section>';
										$('#comment-new').prepend(_html);
									}
									$commentTextBox.val('');
								}else{
									GLOBAL.PopObj.alert({content: data.msg});
								}
								thatBtn.attr('data-loading',1);

							});
						}
					});
				});
			})
	</script>

</body>
</html>