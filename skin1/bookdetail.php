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

//查询article表中的keyword字段，取出现次数最多的30个字段
$sql4 = "SELECT a.keyword FROM article AS a";
$results4 = $link->query($sql4);
$allKeywordArr = [];
while ($row = $results4->fetch_array()){
	$arr = explode(' ', $row['keyword']);//explode() 函数把字符串分割为数组
	$num = count($arr);
	for($j=0; $j<$num; ++$j){
		array_push($allKeywordArr, $arr[$j]);//array_push() 函数向第一个参数的数组尾部添加一个或多个元素（入栈），然后返回新数组的长度。
	}
}
$arrayCountValuesArr = array_count_values($allKeywordArr);//array_count_values()是统计数组中所有值出现的次数，返回一个数组
arsort($arrayCountValuesArr);//arsort() 函数对关联数组按照键值进行降序排序。

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
			<div class="other-book-wrap" id="js-otherBookList">
				<h3>热门文章Keyword</h3>
				<ul class="booklist clearfix">
					<?php
						foreach(array_slice($arrayCountValuesArr, 0 , 10) as $k=>$v){
					?>
						<li><a href="http://www.yuanbo88.com/search.html?key=<?php echo $k; ?>" target="_blank"><?php echo $k; ?></a></li>
					<?php
						}
					?>
				</ul>
				<ul class="booklist clearfix none">
					<?php
						foreach(array_slice($arrayCountValuesArr, 11 , 10) as $k=>$v){
					?>
						<li><a href="http://www.yuanbo88.com/search.html?key=<?php echo $k; ?>" target="_blank"><?php echo $k; ?></a></li>
					<?php
						}
					?>
				</ul>
				<ul class="booklist clearfix none">
					<?php
						foreach(array_slice($arrayCountValuesArr, 21 , 10) as $k=>$v){
					?>
						<li><a href="http://www.yuanbo88.com/search.html?key=<?php echo $k; ?>" target="_blank"><?php echo $k; ?></a></li>
					<?php
						}
					?>
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
