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
<h1>Javascript中的URI编码方法</h1>


<style>
	.url-input{ width: 420px !important;}
</style>
<h3><strong>一、前言：</strong></h3>
<section>
<p>在我们编写js代码的过程中，难免会碰到如何将URL地址进行编码的时候。比如，我在工作中就经常会涉及到Facebook、twitter分享，分享地址不能直接带有空格、斜杠等内容，这时候就需要用到URI编码方法了。</p>
<p><small>Javascript中的URI编码方法很简单，这里只是简单的总结下，用以抛砖引玉。</small></p>
</section><br/>

<h3><strong>二、URI编码方法：</strong></h3>
<section>
<p class="mb10">在ECMAScript中有一个非常特别的对象<span class="fb-black">Global</span>，这个对象是一个全局对象。实际上，没有全局变量或者全局函数，所有在全局作用域中定义的属性和函数，都是Global对象的属性。而我们今天要说的URI编码，恰恰就是Global的方法。接下来，对URI方法进行逐一说明。</p>


<h5><span class="fb-black">1、编码：encodeURI()和encodeURIComponent()</span></h5>
<p>
	<small>encodeURI()不会对本身属于URI的特殊字符进行编码，例如冒号、正斜杠、问号和井字号；</small><br/>
	<small>encodeURIComponent()则会对它发现的任何非标准字符进行编码。</small>
</p>
<p>编码示例：（注意url地址中有空格）</p>
<div class="mb10">
	<input type="text" value="http://www.yuanbo88.com/demo-uri.html ?name=bobo" id="js-encodeURIText" class="input-normal url-input">
	<a href="javascript:;" class="btn-normal" id="js-encodeURIBtn">encodeURI</a>
	<input type="text" placeholder="点击encodeURI按钮查看最终生成的效果" class="input-normal url-input" id="js-encodeURILast">
</div>
<div class="mb10">
	<input type="text" value="http://www.yuanbo88.com/demo-uri.html ?name=bobo" id="js-encodeURIComponentText" class="input-normal url-input">
	<a href="javascript:;" class="btn-normal" id="js-encodeURIComponentBtn">encodeURIComponent</a>
	<input type="text" placeholder="点击encodeURIComponent按钮查看最终生成的效果" class="input-normal url-input" id="js-encodeURIComponentLast">
</div>

<h5><span class="fb-black">2、解码：decodeURI()和decodeURIComponent()</span></h5>
<p>
	<small>decodeURI()只能对使用encodeURI()替换的字符进行解码；</small><br/>
	<small>decodeURIComponent()则可以解码任何特殊字符的编码。</small>
</p>
<p>解码示例：</p>
<div class="mb10">
	<input type="text" value="http%3A%2F%2Fwww.yuanbo88.com%2Fdemo-uri.html%20%3Fname%3Dbobo" id="js-decodeURIText" class="input-normal url-input">
	<a href="javascript:;" class="btn-normal" id="js-decodeURIBtn">decodeURI</a>
	<input type="text" placeholder="点击decodeURI按钮查看最终生成的效果" class="input-normal url-input" id="js-decodeURILast">
</div>
<div class="mb10">
	<input type="text" value="http%3A%2F%2Fwww.yuanbo88.com%2Fdemo-uri.html%20%3Fname%3Dbobo" id="js-decodeURIComponentText" class="input-normal url-input">
	<a href="javascript:;" class="btn-normal" id="js-decodeURIComponentBtn">decodeURIComponent</a>
	<input type="text" placeholder="点击decodeURIComponent按钮查看最终生成的效果" class="input-normal url-input" id="js-decodeURIComponentLast">
</div>

<p>
	<span class="fb-black">从上面的两组示例，我们可以看出，一般情况下，我们使用encodeURIComponent()编码以及decodeURIComponent()解码会更多一点，因为在实践中更常见的是对查询字符串参数而不是对基础URI进行编码处理。</span>
</p>


<pre class="brush:js;">
	window.onload = function(){
		//获取编码（解码）前输入框中的URL内容
		var txt1 = document.getElementById('js-encodeURIText').value,
			txt2 = document.getElementById('js-encodeURIComponentText').value,
			txt3 = document.getElementById('js-decodeURIText').value,
			txt4 = document.getElementById('js-decodeURIComponentText').value;
		
		//获取点击按钮
		var btn1 = document.getElementById('js-encodeURIBtn'),
			btn2 = document.getElementById('js-encodeURIComponentBtn'),
			btn3 = document.getElementById('js-decodeURIBtn'),
			btn4 = document.getElementById('js-decodeURIComponentBtn');
		
		//获取编码（解码）后的输入框
		var lastInput1 = document.getElementById('js-encodeURILast'),
			lastInput2 = document.getElementById('js-encodeURIComponentLast'),
			lastInput3 = document.getElementById('js-decodeURILast'),
			lastInput4 = document.getElementById('js-decodeURIComponentLast');
		
		//点击事件处理
		btn1.onclick = function(){
			var encodeTxt1 = encodeURI(txt1);
			lastInput1.value = encodeTxt1;
		}
		
		btn2.onclick = function(){
			var encodeTxt2 = encodeURIComponent(txt2);
			lastInput2.value = encodeTxt2;
		}

		btn3.onclick = function(){
			var encodeTxt3 = decodeURI(txt3);
			lastInput3.value = encodeTxt3;
		}

		btn4.onclick = function(){
			var encodeTxt4 = decodeURIComponent(txt4);
			lastInput4.value = encodeTxt4;
		}
	}
</pre>
</section><br/>
<script>	
	window.onload = function(){
		//获取编码（解码）前输入框中的URL内容
		var txt1 = document.getElementById('js-encodeURIText').value,
			txt2 = document.getElementById('js-encodeURIComponentText').value,
			txt3 = document.getElementById('js-decodeURIText').value,
			txt4 = document.getElementById('js-decodeURIComponentText').value;
		
		//获取点击按钮
		var btn1 = document.getElementById('js-encodeURIBtn'),
			btn2 = document.getElementById('js-encodeURIComponentBtn'),
			btn3 = document.getElementById('js-decodeURIBtn'),
			btn4 = document.getElementById('js-decodeURIComponentBtn');
		
		//获取编码（解码）后的输入框
		var lastInput1 = document.getElementById('js-encodeURILast'),
			lastInput2 = document.getElementById('js-encodeURIComponentLast'),
			lastInput3 = document.getElementById('js-decodeURILast'),
			lastInput4 = document.getElementById('js-decodeURIComponentLast');

		//点击事件处理
		btn1.onclick = function(){
			var encodeTxt1 = encodeURI(txt1);
			lastInput1.value = encodeTxt1;
		}
		
		btn2.onclick = function(){
			var encodeTxt2 = encodeURIComponent(txt2);
			lastInput2.value = encodeTxt2;
		}

		btn3.onclick = function(){
			var encodeTxt3 = decodeURI(txt3);
			lastInput3.value = encodeTxt3;
		}

		btn4.onclick = function(){
			var encodeTxt4 = decodeURIComponent(txt4);
			lastInput4.value = encodeTxt4;
		}
	}
</script>

<h3><strong>三、“|”（按位或OR）：</strong></h3>
<section>

</section><br/>

<h3><strong>四、其他：</strong></h3>
<section>
	<div id="demo">http://www.yuanbo88.com/demo-test.html?id=3&name=bobo</div>
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