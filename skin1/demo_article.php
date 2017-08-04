<!DOCTYPE>
<html>
<head>
	<? include 'top.html'; ?>
	<link rel="stylesheet" href="dist/css/other_min.css">
	<script src="dist/minjs/shBrushPlug.min.js"></script>
	<link rel="stylesheet" href="dist/css/shCore/shCoreDefault.css">
	<script>SyntaxHighlighter.all();</script>
	<script>SyntaxHighlighter.defaults['auto-links'] = false;</script>
  <script src="dist/minjs/jquery.zclip.js"></script>

<!-- 	<script src="http://www.yuanbo88.com/dist/minjs/vue.min.js"></script> -->
 
</head>
<body>



<div class="article-wrap">
	<div class="article-content">



 <img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/article/2016/livereload/livereload_2.png" alt="使用gulp实现前端自动化运行任务之浏览器自动刷新">
<a href="javascript:;" class="btn-normal js-addMethod">点击我执行add方法</a>
<img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="">
<input type="text" class="input-normal">
#1ab5e3    blue

#28AF59    green

#FF5F09    yellow

<style>
	/*黑色粗体*/
	.fb-black{ color: #000; font-weight: bold;}

	/*灰色斜体*/
	.notes{ color: #999; font-style: italic;}

	/*重点内容*/
	.focus{ color: #28AF59; font-weight: bold; font-size: 14px; font-style: italic;}

	/*下划线*/
	.line-d{ text-decoration: underline;}

	/*a链接*/
	.alink{ color: #1ab5e3; text-decoration: underline; font-style: italic;} 

	/*code*/
	code{ color: #c7254e; background-color: #f9f2f4;padding: 2px 4px; font-size: 90%; border-radius: 3px; font-size: 14px;}
</style>

<br/>
<!-- <h1>初探Flexbox弹性盒子布局</h1> -->
<!-- <h1>ES6如何实现模块化</h1> -->
<!-- <h1>jQuery源码探究系列之isFunction</h1> -->
<h1>你还在使用Apache等工具构建WEB服务器吗？http://zhuanlan.51cto.com/art/201702/532212.htm</h1>


<!-- <script src="http://www.yuanbo88.com/dist/minjs/vue.min.js"></script> -->


<a href="javascript:;" class="btn-normal js-btnTest">我是测试按钮</a>

<script>
// res.setHeader('Cache-Control', "no-cache, max-age=" + 5);
// res.setHeader('Content-Type', 'text/html');
// res.writeHead('200', "OK");
	$(function(){
		$('.js-btnTest').click(function(){
			$.ajax({
				url: 'demo/demo.json',
				type: 'POST',
				dataType: 'json',
				// data: {param1: 'value1'},
				beforeSend: function(request) {
		            request.setRequestHeader('Cache-Control', "max-age=" + 100);
		            request.setRequestHeader("Test", "Chenxizhang");
		        }
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});
	});
</script>

<style>
	.row-wrap{ width: 100%;}
	.row{ 
		white-space: nowrap; /* 让div.col放置在同一行 */
	    background-color: #1ab5e3; /* 背景色，以方便观察 */
	    font-size: 0; /* 去除水平+垂直间隙 */
	    overflow: auto;
	}
	.col{
	    display: inline-block;
	    *display: inline; /* 兼容IE 6/7，模拟inline-block效果 */
	    *zoom: 1; /* 兼容IE 6/7，模拟inline-block效果 */
	    width: 20%; 
	    margin-right: 30px;
	    height: 100px;
	    background-color: #28AF59;
	    font-size: 14px; /* 覆盖父元素的font-size */
	    vertical-align: top; /* 向上对齐，同时去除垂直间隙 */
	}
</style>
<h3><strong>一、前言：</strong></h3>
<section>
<p>
	前段时间在项目中碰到一个需求：<span class="fb-black">将多个元素横向展示在同一行（超出部分带滚动条）</span>。当时初步想到的两个方法：用js途径或者css途径。js途径主要的实现方法是通过计算元素宽度，让父元素的宽度等于所有子元素加起来的宽度。
	但是我又觉得使用js途径有点麻烦，所以就想是否有css途径来解决这个问题，于是就到网上搜索相关的解决方案，还真找到一个用white-space:nowrap来实现这个需求的方法。
</p>
</section><br/>

<h3><strong>二、white-space:nowrap 的妙用：</strong></h3>
<section>
<p class="fb-black">直接上代码：</p>
<pre class="brush:xml;">
	&lt;!-- HTML Code --&gt;
	&lt;div class="row-wrap"&gt;
	    &lt;div class="row"&gt;
	        &lt;div class="col"&gt;&lt;/div&gt;
	        &lt;div class="col"&gt;&lt;/div&gt;
	        &lt;div class="col"&gt;&lt;/div&gt;
	        &lt;div class="col"&gt;&lt;/div&gt;
	        &lt;div class="col"&gt;&lt;/div&gt;
	        &lt;div class="col"&gt;&lt;/div&gt;
	    &lt;/div&gt;
	&lt;/div&gt;
</pre>

<pre class="brush:css;">
	/* CSS Code */
	.row-wrap{ width: 100%;}
	.row{ 
		white-space: nowrap; /* 让div.col放置在同一行 */
	    background-color: #1ab5e3; /* 背景色，以方便观察 */
	    font-size: 0; /* 去除水平+垂直间隙 */
	    overflow: auto;
	}
	.col{
	    display: inline-block;
	    *display: inline; /* 兼容IE 6/7，模拟inline-block效果 */
	    *zoom: 1; /* 兼容IE 6/7，模拟inline-block效果 */
	    width: 20%; 
	    margin-right: 30px;
	    height: 100px;
	    background-color: #28AF59;
	    font-size: 14px; /* 覆盖父元素的font-size */
	    vertical-align: top; /* 向上对齐，同时去除垂直间隙 */
	}
</pre>

<p class="fb-black">效果如下：</p>
<div class="row-wrap">
    <div class="row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
    </div>
</div>
<p>用纯CSS这个方法的好处是：兼容性好（IE5都正常），无须计算宽度，可任意放多个 <code>div.col</code>，而 <code>div.row</code> 的宽度等于其父元素的宽度（但IE6则会将<code>div.row</code>撑大，在IE6中，<code>width</code>如同<code>min-width</code>效果，<code>height</code>也是）。</p>
<p>附上原文地址：<a class="alink" href="https://segmentfault.com/a/1190000004909362" target="_blank">https://segmentfault.com/a/1190000004909362</a>。</p>
</section><br/>


<h3><strong>三、其他：</strong></h3>
<section>

</section><br/>


<!-- https://segmentfault.com/a/1190000004909362 -->


<pre class="brush:js;">

</pre>









<h3><strong>xxxxxxxxxxxxxxx</strong></h3>
<section>

</section><br/>

<h3><strong>xxxxxxxxxxxxxxxxx</strong></h3>
<section>

</section><br/>



	</div>
</div><!-- .article-wrap -->


 



<!-- 
<h3><strong>xxxxxxxxxxxxxxxxx</strong></h3>
<section>

</section><br/><br/>

<h3><strong>xxxxxxxxxxxxxxxxx</strong></h3>
<section>

</section><br/><br/>

<h3><strong>xxxxxxxxxxxxxxxxx</strong></h3>
<section>

</section><br/><br/>

<h3><strong>xxxxxxxxxxxxxxxxx</strong></h3>
<section>

</section><br/><br/>

<h3><strong>xxxxxxxxxxxxxxxxx</strong></h3>
<section>

</section><br/><br/>

<h3><strong>xxxxxxxxxxxxxxxxx</strong></h3>
<section>

</section><br/><br/>

<h3><strong>xxxxxxxxxxxxxxxxx</strong></h3>
<section>

</section><br/><br/>


<h3><strong>xxxxxxxxxxxxxxxxx</strong></h3>
<section>

</section><br/><br/>

<pre class="brush: js;">

</pre><br/> -->




<footer id="footer">
	<? include 'foot.html'; ?>	
</footer><!--end #footer -->
</body>
</html>