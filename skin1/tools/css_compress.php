<?php
session_start(); 
//建立数据库连接
require_once '../mysql_connect.php';
require_once '../inc_session.php';
//关闭数据库连接
$link->close(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<? include '../top.html'; ?>
	<script src="jsCompress/js/bo.min.js"></script>
	<link rel="stylesheet" href="jsCompress/css/bo_min.css">
	<style>
		.line{margin-bottom:20px; line-height: 25px;}
		/* 复制提示 */
		.copy-tips{position:fixed;z-index:999;bottom:50%;left:50%;margin:0 0 -20px -80px;background-color:rgba(0, 0, 0, 0.2);filter:progid:DXImageTransform.Microsoft.Gradient(startColorstr=#30000000, endColorstr=#30000000);padding:6px;}
		.copy-tips-wrap{padding:10px 20px; color: #008000; text-align:center;border:1px solid #008000;background-color:#FFFDEE;font-size:14px;}
		.input{ padding: 3px 5px; border: 1px solid #008000; -webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;}
		.js-css-compress-title .tools-icon{ margin-right: 10px; display: inline-block;*display: inline;*zoom:1; width: 30px; height: 30px; background: url('../dist/images/domeimg/tools/css.png') no-repeat; background-size: 30px; vertical-align: middle;}
	</style>
</head>
<body>
	<header id="header">
		<? include '../public_top.php'; ?>
	</header>

<div class="w1200 js-css-compress-wrap clearfix">

	<div class="fl left-content">
		
	
		<h1 class="js-css-compress-title"><i class="tools-icon"></i>CSS压缩,解压美化工具:</h1>
		<input type="hidden" id="js-contentCodeHidden"/>
		<textarea id="content" class="f_t1 js-contentCode ml20">
/*   解压美化：格式化代码，使之容易阅读			*/
/*   压缩：将代码压缩为更小体积，便于传输		*/
/*   CSS压缩、解压美化：http://www.yuanbo88.com/tools/css_compress.php/   */
/*   以下是演示代码		*/
.page-404 { margin:0 auto; padding-top:150px; width:1200px;
	font-family:Arial;
	text-align:center;
}
.page-404 .img-404 {
	margin-bottom:40px;
}
.page-404 .img-404 img {
	position:relative;
	right:-2000px;
}</textarea>
		<div class="b1_2 ml20">      
			<input id="btnCSSFormat" type="button" value="CSS格式化" class="button square zi">    
			<input id="btnCSSYS" type="button" value="CSS压缩" class="button square lv">  
			<input type="button" value="一键复制" class="button square black js-btnCopy">    
		</div>
	</div><!-- .left-content -->

	<div class="fr right-content">
		<h3 class="other-tools">其他小工具：</h3>
		<ul>
			<li>
				<p class="t-img"><a href="http://www.yuanbo88.com/tools/jsonformat.html" title="JSON格式化" target="_blank"><img src="http://www.yuanbo88.com/dist/images/domeimg/tools/json.png" width="60" height="60" alt="JSON格式化"></a></p>
				<p class="t-tit"><a href="http://www.yuanbo88.com/tools/jsonformat.html" title="JSON格式化" target="_blank">JSON格式化</a></p>
			</li>
			<li>
				<p class="t-img"><a href="http://www.yuanbo88.com/tools/js_compress.html" title="JS格式化" target="_blank"><img src="http://www.yuanbo88.com/dist/images/domeimg/tools/js.png" width="60" height="60" alt="JS格式化"></a></p>
				<p class="t-tit"><a href="http://www.yuanbo88.com/tools/js_compress.html" title="JS格式化" target="_blank">JS格式化</a></p>
			</li>
			<li>
				<p class="t-img"><a href="http://www.yuanbo88.com/tools/css_compress.html" title="CSS格式化" target="_blank"><img src="http://www.yuanbo88.com/dist/images/domeimg/tools/css.png" width="60" height="60" alt="CSS格式化"></a></p>
				<p class="t-tit"><a href="http://www.yuanbo88.com/tools/css_compress.html" title="CSS格式化" target="_blank">CSS格式化</a></p>
			</li>
		</ul>
	</div>
</div><!-- .js-css-compress-wrap -->

	<footer id="footer">
		<? include '../foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$(function(){
			$('#js-contentCodeHidden').attr('value',$("#content").val());

			$(".js-btnCopy").zclip({
		        path: "../dist/minjs/ZeroClipboard.swf",
		        copy: function(){
		        	return $('#js-contentCodeHidden').val();
		        },
		        beforeCopy:function(){/* 按住鼠标时的操作 */
		            $(this).css("color","#f00");
		        },
		        afterCopy:function(){/* 复制成功后的操作 */
		            var $copyUrl = $("<div class='copy-tips'><div class='copy-tips-wrap'>☺ 复制成功</div></div>");
		            $("body").find(".copy-tips").remove().end().append($copyUrl);
		            $(".copy-tips").fadeOut(3000);
		        }
		    });
		});
	</script>

</body>
</html>