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
<h1>Javascript动态添加属性Form不能提交的坑</h1>


<h3><strong>一、前言：</strong></h3>
<section>
<p>
	前几天，在帮后台处理一个表单提交的时候，发现有个坑，在这里做个简单的记录，一是理顺下这个坑到底是什么情况，二是提醒下阅读此文的朋友避开这个坑。<br/>
	后台管理系统主要是用table布局的，也不知道是谁写的，这是坑存在的前提。<br/>
	<small>结论是：代码一定要符合WEB标准，否则很容易出现奇葩的问题而不自知。</small>
</p>
</section><br/>

<h3><strong>二、案例对比：</strong></h3>
<section>
<div class="mb10">
	<p><span class="fb-black">原始代码：</span></p>
	<pre class="brush: xml;">
		&lt;table&gt;
			&lt;form action="/"&gt;
				&lt;tbody&gt;
					&lt;tr&gt;
						&lt;td&gt;&lt;input class="input-normal" type="text" value="" name="name" placeholder="请输入姓名"&gt;&lt;/td&gt;
						&lt;td&gt;&lt;input class="input-normal" type="text" value="" name="password" placeholder="请输入密码"&gt;&lt;/td&gt;
						&lt;td&gt;&lt;a href="javascript:;" class="btn-normal js-addAgeInput"&gt;添加一个输入年龄的input框&lt;/a&gt;&lt;/td&gt;
						&lt;td&gt;&lt;button class="btn-normal js-submitForm"&gt;提交表单&lt;/button&gt;&lt;/td&gt;
					&lt;/tr&gt;
				&lt;/tbody&gt;
			&lt;/form&gt;
		&lt;/table&gt;
	</pre>

	<table>
		<form action="/">
			<tbody>
				<tr>
					<td><input class="input-normal" type="text" value="" name="name" placeholder="请输入姓名"></td>
					<td><input class="input-normal" type="text" value="" name="password" placeholder="请输入密码"></td>
					<td><a href="javascript:;" class="btn-normal js-addAgeInput">添加一个输入年龄的input框</a></td>
					<td><button class="btn-normal js-submitForm">提交表单</button></td>
				</tr>
			</tbody>
		</form>
	</table>
	<p>我们可以看出，你输入的内容根本没法获取到，我们审查元素可以看出 <strong>Form表单里面的input等元素并没有包裹在form标签里面</strong> ，这样的HTML标签写法是不规范的。审查结果如下图所示：</p>
	<p><img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/article/2017/nestedForm/nested_form.jpg" alt="Javascript动态添加属性Form不能提交的坑"></p>
</div>

<div class="mb10">
	<p><span class="fb-black">调整后的代码：</span></p>
	<pre class="brush: xml;">
		&lt;form action="/"&gt;
			&lt;table&gt;
				&lt;tbody&gt;
					&lt;tr&gt;
						&lt;td&gt;&lt;input class="input-normal" type="text" value="" name="name" placeholder="请输入姓名"&gt;&lt;/td&gt;
						&lt;td&gt;&lt;input class="input-normal" type="text" value="" name="password" placeholder="请输入密码"&gt;&lt;/td&gt;
						&lt;td&gt;&lt;a href="javascript:;" class="btn-normal js-addAgeInput"&gt;添加一个输入年龄的input框&lt;/a&gt;&lt;/td&gt;
						&lt;td&gt;&lt;button class="btn-normal js-submitForm"&gt;提交表单&lt;/button&gt;&lt;/td&gt;
					&lt;/tr&gt;
				&lt;/tbody&gt;
			&lt;/table&gt;
		&lt;/form&gt;
	</pre>

	<form action="/">
		<table>
			<tbody>
				<tr>
					<td><input class="input-normal" type="text" value="" name="name" placeholder="请输入姓名"></td>
					<td><input class="input-normal" type="text" value="" name="password" placeholder="请输入密码"></td>
					<td><a href="javascript:;" class="btn-normal js-addAgeInput">添加一个输入年龄的input框</a></td>
					<td><button class="btn-normal js-submitForm">提交表单</button></td>
				</tr>
			</tbody>
		</table>
	</form>
	<p>代码调整后，我们可以看到，你输入任何内容，表单提交后都能正常的获取到。<strong>所以，我们写HTML标签的时候，一定要注意标签的嵌套要符合W3C的WEB标准</strong>。</p>
</div>
</section><br/>

<script>
	$('.js-addAgeInput').click(function(event) {
		var ageInput = '<td><input class="input-normal" type="text" value="" name="age" placeholder="请输入年龄"></td>',
			$this = $(this);

		if(parseInt($this.attr('data-isadded')) === 1 ){
			GLOBAL.PopObj.alert({content: '你已经添加了输入age的input框！'});
			return false;
		}
		$this.parent('td').before(ageInput);
		$this.attr('data-isadded', 1);
	});
	$('.js-submitForm').click(function(event) {
		event.preventDefault();
		var $this = $(this),
			name = $this.parents('form').find('input[name="name"]').val(),
			psw = $this.parents('form').find('input[name="password"]').val(),
			age = $this.parents('form').find('input[name="age"]').val();
		GLOBAL.PopObj.alert({content: '姓名:' + name +', 密码:' + psw + ', 年龄:' + age});
	});
</script>




<h3><strong>三、其他：</strong></h3>
<section>
<p></p>

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