<?php
session_start(); 
header("Content-Type:text/html;charset=utf-8");            //设置头部信息 
//建立数据库连接
require_once 'mysql_connect.php';
require_once 'inc_session.php';

//http://www.yuanbo88.com/category.html?sort=$1&page=$2
//http://www.yuanbo88.com/category-h-2.html   //h:表示html系列    keyNum = 1
//http://www.yuanbo88.com/category-c-2.html   //c:表示css系列    keyNum = 2
//http://www.yuanbo88.com/category-j-2.html   //j:表示js系列     keyNum = 3
//http://www.yuanbo88.com/category-n-2.html   //n:表示node系列   keyNum = 4
//http://www.yuanbo88.com/category-v-2.html   //v:表示vue系列    keyNum = 5
//http://www.yuanbo88.com/category-r-2.html   //r:表示react系列  keyNum = 6
//http://www.yuanbo88.com/category-o-2.html   //o:表示other系列  keyNum = 0



if(isset($_GET['category'])) {
	$category = $_GET['category'];
	switch ($category) {
		case 1:
			$cateSort = '前端开发';
			$cateTitUrl = 'category-1-1.html';
			$keyNum = 1;
			break;
		case 2:
			$cateSort = '前端扩展';
			$cateTitUrl = 'category-2-1.html';
			$keyNum = 2;
			break;
		default:
			$cateSort = '前端开发';
			$cateTitUrl = 'category-1-1.html';
			$keyNum = 0;
			break;
	}

	//得到当前页码
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	}else{
		$page = 1;
	}

	$pageSize = 7;//每一页显示5条数据

	//获取当前数据表中的总页码数
	$sql = "SELECT a.id, a.sort, u.name, a.title, a.summary FROM article AS a,user AS u WHERE a.category='".$category."' AND a.author=u.id ORDER BY a.id DESC";

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
	$sql2 = "SELECT a.id, a.sort, u.name, a.title, a.time, a.summary FROM article AS a,user AS u WHERE a.category='".$category."' AND a.author=u.id ORDER BY a.id DESC LIMIT {$pageBegin}, {$pageSize}";

	$results2 = $link->query($sql2);

}else{
	$sort = 'h';
	$cateTitUrl = 'category-h-1.html';
	$cateSort = 'HTML系列';
	$keyNum = 1;
	//得到当前列表页分类:1->css, 2->js, 3->node, 4->vue, 5->react, 0->other
	if(isset($_GET['sort'])) {
		$sort = $_GET['sort'];
		switch ($sort) {
			case 'h':
				$cateSort = 'HTML系列';
				$cateTitUrl = 'category-h-1.html';
				$keyNum = 1;
				break;
			case 'c':
				$cateSort = 'CSS系列';
				$cateTitUrl = 'category-c-1.html';
				$keyNum = 2;
				break;
			case 'j':
				$cateSort = 'Javascript系列';
				$cateTitUrl = 'category-j-1.html';
				$keyNum = 3;
				break;
			case 'n':
				$cateSort = 'NodeJS系列';
				$cateTitUrl = 'category-n-1.html';
				$keyNum = 4;
				break;
			case 'v':
				$cateSort = 'VueJS系列';
				$cateTitUrl = 'category-v-1.html';
				$keyNum = 5;
				break;
			case 'r':
				$cateSort = 'React系列';
				$cateTitUrl = 'category-r-1.html';
				$keyNum = 6;
				break;
			case 'o':
				$cateSort = '其他';
				$cateTitUrl = 'category-o-1.html';
				$keyNum = 0;
				break;
			default:
				$cateSort = '其他';
				$cateTitUrl = 'category-o-1.html';
				$keyNum = 0;
				break;
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
	$sql = "SELECT a.id, a.sort, u.name, a.title, a.summary FROM article AS a,user AS u WHERE a.sort='".$keyNum."' AND a.author=u.id ORDER BY a.id DESC";

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
	$sql2 = "SELECT a.id, a.sort, u.name, a.title, a.time, a.summary FROM article AS a,user AS u WHERE a.sort='".$keyNum."' AND a.author=u.id ORDER BY a.id DESC LIMIT {$pageBegin}, {$pageSize}";

	$results2 = $link->query($sql2);
}



$isNoResult = 0;
if(!$results2){//查询失败
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

$sql5 = "SELECT a.id, a.sort, a.title FROM article AS a ORDER BY a.hot DESC LIMIT 10";
$results5 = $link->query($sql5);

$sql6 = "SELECT a.id, a.sort, a.title FROM article AS a ORDER BY a.hot DESC LIMIT 10,10";
$results6 = $link->query($sql6);

$sql7 = "SELECT a.id, a.sort, a.title FROM article AS a ORDER BY a.hot DESC LIMIT 20,10";
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
			<a href="<?php echo $cateTitUrl; ?>"><?php echo $cateSort; ?></a>
		</div>

		<div class="article-list">
			<?php
				while ($row = $results2->fetch_array()){
			?>	
				<?php
					//如果是大分类：前端开发 OR 前端扩展
					if(isset($_GET['category'])) {
						switch ($row['sort']) {
							case 0:
								$articleSort = 'o';
								break;
							case 1:
								$articleSort = 'h';
								break;
							case 2:
								$articleSort = 'c';
								break;
							case 3:
								$articleSort = 'j';
								break;
							case 4:
								$articleSort = 'n';
								break;
							case 5:
								$articleSort = 'v';
								break;
							case 6:
								$articleSort = 'r';
								break;
							default:
								$articleSort = 'o';
								break;
						}
				?>
					<section>
						<div class="person-img">
							<img src="dist/images/domeimg/default_user.jpg" width="64" height="64" alt="用户头像">
						</div>
						<div class="article-content">
							<h3 class="title"><a href="/article-<?php echo $articleSort;?>-<?php echo $row['id']; ?>.html" target="_blank"><?php echo $row['title']; ?></a></h3>
							<p class="time"><?php echo $row['name']; ?></p>
							<p class="summary"><?php echo $row['summary']; ?></p>
						</div>
					</section>
				<?php
					}else{
				?>
					<section>
						<div class="person-img">
							<img src="dist/images/domeimg/default_user.jpg" width="64" height="64" alt="用户头像">
						</div>
						<div class="article-content">
							<h3 class="title"><a href="/article-<?php echo $sort; ?>-<?php echo $row['id']; ?>.html" target="_blank"><?php echo $row['title']; ?></a></h3>
							<p class="time"><?php echo $row['name']; ?></p>
							<p class="summary"><?php echo $row['summary']; ?></p>
						</div>
					</section>
				<?php
					}
				?>
			<?php
				}
			?>

			<!-- 热门文章 -->
			<div class="right-content-box">
				<div class="other-keyword-wrap" id="js-otherBookList">
					<h3>阅读排行榜</h3>
					<ul class="keywordlist clearfix firstList">
						<?php
							while ($row = $results5->fetch_array()){
								switch ($row['sort']) {
									case 0:
										$articleSort = 'o';
										break;
									case 1:
										$articleSort = 'h';
										break;
									case 2:
										$articleSort = 'c';
										break;
									case 3:
										$articleSort = 'j';
										break;
									case 4:
										$articleSort = 'n';
										break;
									case 5:
										$articleSort = 'v';
										break;
									case 6:
										$articleSort = 'r';
										break;
									default:
										$articleSort = 'o';
										break;
								}
						?>
							<li><a href="http://www.yuanbo88.com/article-<?php echo $articleSort; ?>-<?php echo $row['id']; ?>.html" title="<?php echo $row['title']; ?>" target="_blank"><?php echo $row['title']; ?></a></li>
						<?php
							}
						?>	
					</ul>
					<ul class="keywordlist clearfix none">
						<?php
							while ($row = $results6->fetch_array()){
								switch ($row['sort']) {
									case 0:
										$articleSort = 'o';
										break;
									case 1:
										$articleSort = 'h';
										break;
									case 2:
										$articleSort = 'c';
										break;
									case 3:
										$articleSort = 'j';
										break;
									case 4:
										$articleSort = 'n';
										break;
									case 5:
										$articleSort = 'v';
										break;
									case 6:
										$articleSort = 'r';
										break;
									default:
										$articleSort = 'o';
										break;
								}
						?>
							<li><a href="http://www.yuanbo88.com/article-<?php echo $articleSort; ?>-<?php echo $row['id']; ?>.html" title="<?php echo $row['title']; ?>" target="_blank"><?php echo $row['title']; ?></a></li>
						<?php
							}
						?>
					</ul>
					<ul class="keywordlist clearfix none">
						<?php
							while ($row = $results7->fetch_array()){
								switch ($row['sort']) {
									case 0:
										$articleSort = 'o';
										break;
									case 1:
										$articleSort = 'h';
										break;
									case 2:
										$articleSort = 'c';
										break;
									case 3:
										$articleSort = 'j';
										break;
									case 4:
										$articleSort = 'n';
										break;
									case 5:
										$articleSort = 'v';
										break;
									case 6:
										$articleSort = 'r';
										break;
									default:
										$articleSort = 'o';
										break;
								}
						?>
							<li><a href="http://www.yuanbo88.com/article-<?php echo $articleSort; ?>-<?php echo $row['id']; ?>.html" title="<?php echo $row['title']; ?>" target="_blank"><?php echo $row['title']; ?></a></li>
						<?php
							}
						?>
					</ul>
					<p class="change-group tc js-changeGroup" data-current="0"><a href="javascript:;">换一批</a></p>
				</div><!-- .other-keyword-wrap -->

				<div class="fb-page" data-href="https://www.facebook.com/yuanboba/" data-width="250" data-height="290" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><blockquote cite="https://www.facebook.com/yuanboba/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/yuanboba/">Facebook园博吧</a></blockquote></div>
			</div><!-- .right-content-box -->
		</div>

		<div id="pageing">
			<?php
				if($page > 1){ //不是第一页，显示“上一页”
			?>	
				<?php
					//如果是大分类：前端开发 OR 前端扩展
					if(isset($_GET['category'])) {
				?>
					<a href="http://www.yuanbo88.com/category-<?php echo $category; ?>-<?php echo $prevPage; ?>.html">上一页</a>
				<?php
					}else{
				?>
					<a href="http://www.yuanbo88.com/category-<?php echo $sort; ?>-<?php echo $prevPage; ?>.html">上一页</a>
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
					//如果是大分类：前端开发 OR 前端扩展
					if(isset($_GET['category'])) {
				?>
					<a href="http://www.yuanbo88.com/category-<?php echo $category; ?>-<?php echo $nextPage; ?>.html">下一页</a>
				<?php
					}else{
				?>
					<a href="http://www.yuanbo88.com/category-<?php echo $sort; ?>-<?php echo $nextPage; ?>.html">下一页</a>
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



	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/zh_CN/sdk.js#xfbml=1&version=v2.8";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>