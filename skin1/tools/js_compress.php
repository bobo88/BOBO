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
		.js-css-compress-title .tools-icon{ margin-right: 10px; display: inline-block;*display: inline;*zoom:1; width: 30px; height: 30px; background: url('../dist/images/domeimg/tools/js.png') no-repeat; background-size: 30px; vertical-align: middle;}
	</style>
</head>
<body>
	<header id="header">
		<? include '../public_top.php'; ?>
	</header>

<div class="w1200 js-css-compress-wrap clearfix">
	<div class="fl left-content">
		<h1 class="js-css-compress-title"><i class="tools-icon"></i>JS压缩,解压,美化工具:</h1>
		<input type="hidden" id="js-contentCodeHidden"/>
		<textarea id="content" class="f_t1 js-contentCode ml20">
/*   美化：格式化代码，使之容易阅读			*/
/*   净化：去掉代码中多余的注释、换行、空格等	*/
/*   压缩：将代码压缩为更小体积，便于传输		*/
/*   解压：将压缩后的代码转换为人可以阅读的格式	*/
/*   javascript在线美化、净化、压缩、解压：http://www.yuanbo88.com/tools/js_compress.php/   */
/*   以下是演示代码		*/
var getPositionLite = function(el) {        
	var x = 0, y = 0;        
	while (el) {           
		x += el.offsetLeft || 0;            
		y += el.offsetTop || 0;            
		el = el.offsetParent        
	}        
	return { x: x, y: y};
};
		</textarea>
		<div class="b1_2 ml20">    
			<input id="btnJSFormat" type="button" value="美化" class="button square lan">    
			<input id="btnJSYS" type="button" value="净化" class="button square red">    
			<input id="btn" type="button" value="压缩" class="button square juhuang">    
			<input id="btnDecode" type="button" value="解压" class="button square qing">    
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