<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';

$sort = '';
$cateTitUrl = 'category.html?type=1';
$type = 1;
//得到当前列表页分类:1为前端开发，2为前端扩展
if(isset($_GET['type'])) {
	$cateType = ($_GET['type']==1) ? '前端开发' : '前端扩展';
	$cateTitUrl = ($_GET['type']==1) ? 'category.html?type=1' : 'category.html?type=2';
	$sort = ($_GET['type']==1) ? '' : 3;
	$type = $_GET['type'] ? $_GET['type'] : 1;
}else{
	$cateType = '前端开发'; //默认是前端开发
}

$keyNum = 0;

//得到关键词key
if(isset($_GET['key'])) {
	$keyword = $_GET['key'];
	if($keyword=='h5'){
		$keyNum = 1;
		$keySortTit = 'HTML(5)/CSS(3)';
	}else if($_GET['key']=='js'){
		$keyNum = 2;
		$keySortTit = 'Javascript/jQuery';
	}else if($_GET['key']=='other'){
		$keyNum = 3;
		$keySortTit = 'Other';
	}
}

//得到当前页码
if(isset($_GET['page'])) {
	$page = $_GET['page'];
}else{
	$page = 1;
}

$pageSize = 7;//每一页显示5条数据

//获取当前数据表中的总页码数
if(!$sort){
	if($keyNum == 1){
		$sql = "SELECT a.id, a.littleImg, a.title, a.summary FROM article AS a WHERE a.sort=1 ORDER BY a.id DESC";
	}else if($keyNum == 2){
		$sql = "SELECT a.id, a.littleImg, a.title, a.summary FROM article AS a WHERE a.sort=2 ORDER BY a.id DESC";
	}else{
		$sql = "SELECT a.id, a.littleImg, a.title, a.summary FROM article AS a WHERE a.sort!=3 ORDER BY a.id DESC";
	}
}else{
	$sql = "SELECT a.id, a.littleImg, a.title, a.summary FROM article AS a WHERE a.sort=3 ORDER BY a.id DESC";
}
$results = $link->query($sql);
$pageMaxNumber = ceil((float)($results->num_rows) / $pageSize);
$results->free_result();

//rid参数的健壮性处理
if($page < 1){ //rid为负数
	$page = 1;
}else if($page > $pageMaxNumber){ //page超过范围
	$page = 1;
}
//定义上一页和下一页的页码
$prevPage = $page - 1;
$nextPage = $page + 1;

$pageBegin = ($page - 1) * $pageSize;//当前页面记录在数据表中的开始下标
//取分页数据
if(!$sort){
	if($keyNum == 1){
		$sql = "SELECT a.id, a.littleImg, a.title, a.time, a.summary FROM article AS a WHERE a.sort=1 ORDER BY a.id DESC LIMIT {$pageBegin}, {$pageSize}";
	}else if($keyNum == 2){
		$sql = "SELECT a.id, a.littleImg, a.title, a.time, a.summary FROM article AS a WHERE a.sort=2 ORDER BY a.id DESC LIMIT {$pageBegin}, {$pageSize}";
	}else{
		$sql = "SELECT a.id, a.littleImg, a.title, a.time, a.summary FROM article AS a WHERE a.sort!=3 ORDER BY a.id DESC LIMIT {$pageBegin}, {$pageSize}";
	}
}else{
	$sql = "SELECT a.id, a.littleImg, a.title, a.time, a.summary FROM article AS a WHERE a.sort=3 ORDER BY a.id DESC LIMIT {$pageBegin}, {$pageSize}";
}
$results = $link->query($sql);

$isNoResult = 0;
if(!$results){//查询失败
	$isNoResult = 1;
}

//查询article表中的keyword字段，取出现次数最多的30个字段
// $sql4 = "SELECT a.keyword FROM article AS a";
// $results4 = $link->query($sql4);
// $allKeywordArr = [];
// while ($row = $results4->fetch_array()){
// 	$arr = explode(' ', $row['keyword']);//explode() 函数把字符串分割为数组
// 	$num = count($arr);
// 	for($j=0; $j<$num; ++$j){
// 		array_push($allKeywordArr, $arr[$j]);//array_push() 函数向第一个参数的数组尾部添加一个或多个元素（入栈），然后返回新数组的长度。
// 	}
// }
// $arrayCountValuesArr = array_count_values($allKeywordArr);//array_count_values()是统计数组中所有值出现的次数，返回一个数组
// arsort($arrayCountValuesArr);//arsort() 函数对关联数组按照键值进行降序排序。

$sql5 = "SELECT a.id, a.title FROM article AS a ORDER BY a.hot DESC LIMIT 10";
$results5 = $link->query($sql5);

$sql6 = "SELECT a.id, a.title FROM article AS a ORDER BY a.hot DESC LIMIT 10,10";
$results6 = $link->query($sql6);

$sql7 = "SELECT a.id, a.title FROM article AS a ORDER BY a.hot DESC LIMIT 20,10";
$results7 = $link->query($sql7);

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
	<link rel="stylesheet" href="dist/css/category_min.css">
</head>
<body>
	<header id="header">
		<? include 'public_top.php'; ?>
	</header>
		
	<div class="category-main-wrap">
		<div class="path">
			<i class="icon-path"></i>
			当前位置：<a href="/">首页</a><span> > </span>
			<a href="<?php echo $cateTitUrl; ?>"><?php echo $cateType; ?></a>

			<?php
				if($keyNum > 0){
			?>
				<span> > </span>
				<?php echo $keySortTit; ?>
			<?php
				}
			?>
		</div>

		<div class="article-list">
			<?php
				while ($row = $results->fetch_array()){
			?>
				<section>
					<div class="person-img">
						<img src="dist/images/domeimg/default_user.jpg" width="64" height="64" alt="用户头像">
					</div>
					<div class="article-content">
						<h3 class="title"><a href="/article.html?rid=<?php echo $row['id']; ?>" target="_blank"><?php echo $row['title']; ?></a></h3>
						<p class="time"><?php echo $row['time']; ?></p>
						<p class="summary"><?php echo $row['summary']; ?></p>
					</div>
				</section>
			<?php
				}
			?>

			<!-- 热门搜索关键词 -->
			<div class="other-keyword-wrap" id="js-otherBookList">
				<h3>热门文章Keyword</h3>
				<ul class="keywordlist clearfix">
					<?php
						foreach(array_slice($arrayCountValuesArr, 0 , 10) as $k=>$v){
					?>
						<li><a href="http://www.yuanbo88.com/search.html?key=<?php echo $k; ?>" target="_blank"><?php echo $k; ?></a></li>
					<?php
						}
					?>
				</ul>
				<ul class="keywordlist clearfix none">
					<?php
						foreach(array_slice($arrayCountValuesArr, 11 , 10) as $k=>$v){
					?>
						<li><a href="http://www.yuanbo88.com/search.html?key=<?php echo $k; ?>" target="_blank"><?php echo $k; ?></a></li>
					<?php
						}
					?>
				</ul>
				<ul class="keywordlist clearfix none">
					<?php
						foreach(array_slice($arrayCountValuesArr, 21 , 10) as $k=>$v){
					?>
						<li><a href="http://www.yuanbo88.com/search.html?key=<?php echo $k; ?>" target="_blank"><?php echo $k; ?></a></li>
					<?php
						}
					?>
				</ul>
				<p class="change-group mb25 tc js-changeGroup" data-current="0"><a href="javascript:;">换一批</a></p>
			</div><!-- .other-keyword-wrap -->
		</div>

		<div id="pageing">
			<?php
				if($page > 1){ //不是第一页，显示“上一页”
			?>
				<?php 
					if($keyNum){ 
				?>
					<a href="http://www.yuanbo88.com/category.html?type=<?php echo $type; ?>&key=<?php echo $keyword; ?>&page=<?php echo $prevPage; ?>">上一页</a>
				<?php 
					}else{ 
				?>
					<a href="http://www.yuanbo88.com/category.html?type=<?php echo $type; ?>&page=<?php echo $prevPage; ?>">上一页</a>
				<?php 
					} 
				?>
			<?php
				}
			?>

			<?php
				if($page < $pageMaxNumber){ //如果不是最后一页，显示“下一页”
			?>
				<?php 
					if($keyNum){ 
				?>
					<a href="http://www.yuanbo88.com/category.html?type=<?php echo $type; ?>&key=<?php echo $keyword; ?>&page=<?php echo $nextPage; ?>">下一页</a>
				<?php 
					}else{ 
				?>
					<a href="http://www.yuanbo88.com/category.html?type=<?php echo $type; ?>&page=<?php echo $nextPage; ?>">下一页</a>
				<?php 
					} 
				?>	
			<?php
				}
			?>
		</div><!-- #pageing -->

	</div><!-- .category-main-wrap -->

	<footer id="footer">
		<? include 'foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$LAB.script("")
			.wait(function(){
				(function(){
					$('.js-changeGroup').click(function(){
						var current = parseInt($(this).attr('data-current'));
						var bookListArr = $('#js-otherBookList').find('.keywordlist');
						var allGroupNum = bookListArr.length;

						if(current < allGroupNum - 1){
							bookListArr.eq(++current).show().siblings('.keywordlist').hide();
							$(this).attr('data-current', current++);
						}else{
							bookListArr.eq(0).show().siblings('.keywordlist').hide();
							$(this).attr('data-current', 0);
						}
					});
				})();
			})
			.script("")
	</script>

</body>
</html>