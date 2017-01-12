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
<br/>
<!-- <h1>初探Flexbox弹性盒子布局</h1> -->
<h1>JS设计模式之装饰者模式</h1>



<h3><strong>一、前言：</strong></h3>
<section>
<p>最近在做一个案例，在代码中有一个</p>
</section><br/>

<h3><strong>二、.gitignore详解：</strong></h3>
<section>
<p>
	<span class="fb-black">注意：这个文件的完整文件名是 “.gitignore”，注意最前面是有个“.”的。由于我的电脑是Windows系统，所以在新建这个文件的时候老是提示 “必须键入文件名” 的错误。后来谷歌了下，发现创建这个文件的时候，把文件名改成“.gitigonore.”，注意是前后都有一个点，这样就可以保存成功了。</span>
</p>
<p class="mb10">
	一般来说，每个Git项目都需要一个 “.gitignore” 文件，这样我们可以更加自由的选择哪些文件是不需要添加到Git版本管理中去的。
</p>


<p>文件 .gitignore 的格式规范如下：</p>
<p class="mb10">
	-- 所有空行或者以注释符号 ＃ 开头的行都会被 Git 忽略。<br/>
	-- 可以使用标准的 glob 模式匹配。<br/>
	-- 匹配模式最后跟反斜杠（/）说明要忽略的是目录。<br/>
	-- 要忽略指定模式以外的文件或目录，可以在模式前加上惊叹号（!）取反。<br/>
	-- 所谓的 glob 模式是指 shell 所使用的简化了的正则表达式。星号（*）匹配零个或多个任意字符；[abc] 匹配任何一个列在方括号中的字符（这个例子要么匹配一个 a，要么匹配一个 b，要么匹配一个 c）；问号（?）只匹配一个任意字符；如果在方括号中使用短划线分隔两个字符，表示所有在这两个字符范围内的都可以匹配（比如 [0-9] 表示匹配所有 0 到 9 的数字）。
</p>
<p>我们再看一个 .gitignore 文件的例子：</p>
<pre class="brush:xml;">
	# 此为注释 – 将被 Git 忽略
	    # 忽略所有 .a 结尾的文件
	    *.a
	    # 但 lib.a 除外
	    !lib.a
	    # 仅仅忽略项目根目录下的 BOBO 文件，不包括 yuanbo/BOBO
	    /BOBO
	    # 忽略 src/ 目录下的所有文件
	    src/
	    # 会忽略 doc/notes.txt 但不包括 doc/server/arch.txt
	    doc/*.txt
	    # 会忽略掉 doc/ 里面所有的txt文件，包括子目录下的（**/ 从 Git 1.8.2 之后开始支持 **/ 匹配模式，表示递归匹配子目录下的文件）
	    doc/**/*.txt
</pre>
<p>总之，我们的项目做Git管理时，首先就要配置 “.gitignore” 文件，养成良好习惯，因为项目一旦push到GitHub上面，要过滤掉它们就相对来说会麻烦很多。</p>


</section><br/>

<script>

</script>


<h3><strong>四、其他：</strong></h3>
<section>


</section><br/>




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