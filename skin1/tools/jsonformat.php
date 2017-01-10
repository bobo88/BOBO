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
	<script src="jsonformat/js/j2.js"></script>
	<script src="jsonformat/js/h.js"></script>
	<script src="jsonformat/js/c.js"></script>
	<link rel="stylesheet" href="jsonformat/css/s.css">
	<link rel="stylesheet" href="jsonformat/css/codemirror.css">
	<link rel="stylesheet" href="jsonformat/css/material.css">
	<style>
		.json-format-wrap{ margin: 0 auto; padding-bottom: 50px; width: 1200px;}
		.json-format-title{ padding: 50px 0 20px; margin-left: 20px; width: 1000px; height: 30px; line-height: 30px; color: #d9342b; font-size: 18px;}
		.json-format-title .tools-icon{ margin-right: 10px; display: inline-block;*display: inline;*zoom:1; width: 30px; height: 30px; background: url('../dist/images/domeimg/tools/json.png') no-repeat; background-size: 30px; vertical-align: middle;}

		.right-content{}
		.right-content .other-tools{ margin-bottom: 10px; padding: 50px 0 20px; width: 100px; font-size: 16px; text-align: center;}
		.right-content ul li{ margin-bottom: 15px;}
		.right-content ul li:hover .t-img{ -webkit-transform:translateY(-5px); -moz-transform:translateY(-5px); -ms-transform:translateY(-5px); transform:translateY(-5px);}
		.right-content ul li:hover a{ color: #d9342b;}
		.right-content ul li a{ display: block; font-size: 12px; text-align: center;}
		.t-img{ position: relative; z-index: 1; margin: 0 auto; width: 60px; height: 60px;
			-webkit-transition: transform .6s ease;
			   -moz-transition: transform .6s ease;
			    -ms-transition: transform .6s ease;
				    transition: transform .6s ease;
		}
		.t-tit{ height: 20px; line-height: 20px; font-size: 12px; text-align: center;}
		.t-tit a{ color: #333; text-decoration: none;}
	</style>
</head>
<body>
	<header id="header">
		<? include '../public_top.php'; ?>
	</header>



<div class="w1200 json-format-wrap clearfix">
	<div class="fl left-content">
		<h1 class="json-format-title"><i class="tools-icon"></i>贴入要格式化或校验的JSON代码:</h1>
	
		<div class="HeadersRow">
			<textarea placeholder="贴入要格式化或校验JSON代码" style="height: 300px;" id="RawJson">{"tools": [
			{ "name":"css format" , "site":"http://www.yuanbo88.com/csscompression.php" },
			{ "name":"json format" , "site":"http://www.yuanbo88.com/jsonformat.php" },
			{ "name":"hash MD5" , "site":"http://www.yuanbo88.com/hash.php" }
		]
}</textarea>
		</div>

		<script type="text/javascript">
		document.getElementById("RawJson").focus();
		document.getElementById("RawJson").select();
		// var editor = CodeMirror.fromTextArea(document.getElementById("RawJson"), {
  //   		lineNumbers: true,
  //   		mode: "text/javascript",
  //   		styleActiveLine: true,
  //   		theme: 'material',
  //   		lineWrapping: true,
  // 		});
  // 		editor.setSize('100%', 400);
		</script>

		<div style="margin-left: 20px;" id="ControlsRow">
			<button class="button primary small" onclick="javascript:Process();">验证JSON</button>
			<span id="TabSizeHolder">
				缩进量
				<select class="select" style="width:auto;" id="TabSize" onchange="TabSizeChanged();">
					<option value="1">1</option>
					<option value="2" selected="true">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
			</span>
			<label for="QuoteKeys">
				<input type="checkbox" id="QuoteKeys" onclick="QuoteKeysClicked();" checked="true"> 
					引号
			</label>&nbsp; 
			<a href="javascript:void(0);" onclick="SelectAllClicked();">全选</a>
			&nbsp;
			<span id="CollapsibleViewHolder">
				<label for="CollapsibleView">
					<input type="checkbox" id="CollapsibleView" onclick="CollapsibleViewClicked();" checked="true"> 
						显示控制
				</label>
			</span>
			<span id="CollapsibleViewDetail">
				<a href="javascript:void(0);" onclick="ExpandAllClicked();">展开</a>
				<a href="javascript:void(0);" onclick="CollapseAllClicked();">叠起</a>
				<a href="javascript:void(0);" onclick="CollapseLevel(3);">2级</a>
				<a href="javascript:void(0);" onclick="CollapseLevel(4);">3级</a>
				<a href="javascript:void(0);" onclick="CollapseLevel(5);">4级</a>
				<a href="javascript:void(0);" onclick="CollapseLevel(6);">5级</a>
				<a href="javascript:void(0);" onclick="CollapseLevel(7);">6级</a>
				<a href="javascript:void(0);" onclick="CollapseLevel(8);">7级</a>
				<a href="javascript:void(0);" onclick="CollapseLevel(9);">8级</a>
			</span>
		</div>

		<div id="Canvas" class="Canvas"></div>
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
</div><!-- .json-format-wrap -->

	<footer id="footer">
		<? include '../foot.html'; ?>	
	</footer><!--end #footer -->

	<script>
		$LAB.script("")
			.wait(function(){})
			.script("")
	</script>

</body>
</html>