<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';

//得到当前参考书籍的id
if(isset($_GET['bid'])) {
	$bid = $_GET['bid'];
}else{
	$bid = 1; //假设显示第一页
}

//bid参数的健壮性处理
if($bid < 1){ //bid为负数
	$bid = 1;
}

$isNoResult = 0;

//判断是否登录
if(isset($_SESSION["userid"]) && isset($currentNickname) ){
	$isLogin = 1;
}else{
	$isLogin = 0;	
}

$sql2 = "SELECT * FROM booklist WHERE id=".$bid;//看是否有当前参考书籍
$results2 = $link->query($sql2);
$hasResult = $results2->num_rows;
if($hasResult > 0){
	//执行数据库查询
	$sql3 = "SELECT b.id, b.address, b.bookname, b.bookimg, b.pwd, b.summary FROM booklist AS b WHERE b.id={$bid}";//取书籍页面数据
	$results3 = $link->query($sql3);

	while ($row = $results3->fetch_array()){
		$address = $row['address'];
		$bookname = $row['bookname'];
		$bookimg = $row['bookimg'];
		$pwd = $row['pwd'];
		$summary = $row['summary'];
	}

}else{ //查询失败
	$isNoResult = 1;
}

$sql5 = "SELECT b.id, b.bookname FROM booklist AS b ORDER BY b.id DESC LIMIT 10";
$results5 = $link->query($sql5);

$sql6 = "SELECT b.id, b.bookname FROM booklist AS b ORDER BY b.id DESC LIMIT 10,10";
$results6 = $link->query($sql6);

//关闭数据库连接
$link->close(); 
?>

<?php  
if($isNoResult){//如果没有数据，直接到404页面
	$url = "http://www.yuanbo88.com/404.html";  
	echo "<script>";  
	echo "window.location.href='$url'";  
	echo "</script>"; 
}
?>

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
			<span> > </span><a href="http://www.yuanbo88.com/booklist.html">参考书籍列表</a>
			<span> > </span><?php echo $bookname; ?>
		</div>
		
		<div class="book-detail">
			<h1 class="book-name"><?php echo $bookname; ?></h1>
			<p class="book-img"><img src="dist/images/domeimg/lazyload.gif" data-original="<?php echo $bookimg; ?>" alt="<?php echo $bookname; ?>"></p>

			<div class="book-summary">
				<?php echo $summary; ?>
			</div>
			
			<div class="book-download-wrap clearfix">
				<a href="<?php echo $address; ?>" target="_blank" class="fl"><?php echo $bookname; ?></a>

				<?php
					if($isLogin == 1){
				?>
					<!-- show psw -->
					<a href="javascript:;" class="copyBtn fr js-copyPswBtn" data-psw="<?php echo $pwd; ?>">一键复制获取密码</a>
					<span class="fr">密码：<strong><?php echo $pwd; ?></strong></span>
				<?php
					}else{
				?>
					<!-- Login First -->
					<a class="fr sign-first" href="http://www.yuanbo88.com/sign.html?ref=bookdetail.html%3Fbid%3D<?php echo $bid;?>">登录后获取参考书籍秘钥</a>
				<?php
					}
				?>
				
			</div>

			<div class="statement">
				<small>备注：参考资料来源于网络，如有涉及版权问题，请直接与我联系（邮箱地址yuanboi88@163.com），本人将尽快处理！</small>
			</div>

			<!-- 其他推荐书籍列表 -->
			<div class="right-content-box">
				<div class="other-book-wrap" id="js-otherBookList">
					<h3>最新书籍</h3>
					<ul class="booklist clearfix firstList">
						<?php
							while ($row = $results5->fetch_array()){
						?>
							<li><a href="http://www.yuanbo88.com/bookdetail.html?bid=<?php echo $row['id']; ?>" title="<?php echo $row['bookname']; ?>" target="_blank"><?php echo $row['bookname']; ?></a></li>
						<?php
							}
						?>	
					</ul>
					<ul class="booklist clearfix none">
						<?php
							while ($row = $results6->fetch_array()){
						?>
							<li><a href="http://www.yuanbo88.com/bookdetail.html?bid=<?php echo $row['id']; ?>" title="<?php echo $row['bookname']; ?>" target="_blank"><?php echo $row['bookname']; ?></a></li>
						<?php
							}
						?>
					</ul>
					<p class="change-group tc js-changeGroup" data-current="0"><a href="javascript:;">换一批</a></p>
				</div><!-- .other-book-wrap -->

				<div class="github-list">
					<h3>Github开源项目</h3>
					<ul>
						<li>
							<a href="https://github.com/bobo88/BOBO" target="_blank">BOBO</a>
							<p>园博吧网站源代码，需要建站的朋友可以在此基础上快速建立基于php的网站。</p>
						</li>
						<li>
							<a href="https://github.com/bobo88/Robo-Advisor.git" target="_blank">vue项目</a>
							<p>vue + webpack结合做的一个智能投顾后台管理界面项目。</p>
						</li>
						<li>
							<a href="https://github.com/bobo88/ForJS" target="_blank">ForJS</a>
							<p>园博吧系列文章，所有案例与效果文章仅用来作来学习JavaScript使用。</p>
						</li>
						<li>
							<a href="https://github.com/bobo88/plugin" target="_blank">plugin</a>
							<p>Javascript相关插件，有兴趣的朋友可以根据实际情况直接下载使用。</p>
						</li>
					</ul>
				</div><!-- .github-list -->
			</div><!-- .right-content-box -->
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
