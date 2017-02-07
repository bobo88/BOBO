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


<h3><strong>一、前言：</strong></h3>
<section>

</section><br/>

<h3><strong>二、URI编码方法：</strong></h3>
<section>

<pre class="brush:js">
//原型式继承
function object(o){
	function F(){}
	F.prototype = o;
	return new F();
}

//寄生组合式继承：实现基于类型继承的最有效方式
function inheritPrototype(subType, superType){
	var prototype = object(superType.prototype);
	prototype.constructor = subType;
	subType.prototype = prototype;
}

//父类型
function SuperType(name){
	this.name = name;
	this.colors = ["red", "blue", "green"];
}
//父类型的原型方法
SuperType.prototype.sayName = function(){
	console.log(this.name);
}

//子类型
function SubType(name, age){
	SuperType.call(this, name);
	this.age = age;
}

//实现继承
inheritPrototype(SubType, SuperType);

//子类型的原型方法
SubType.prototype.sayAge = function(){
	console.log(this.age);
}

//声明子类型实例
var subObj = new SubType('BOBO', 27);
subObj.sayName(); // BOBO
subObj.sayAge(); // 27	
	
</pre>

</section><br/>


<script>	
	//原型式继承
	function object(o){
		function F(){}
		F.prototype = o;
		return new F();
	}

	//寄生组合式继承：实现基于类型继承的最有效方式
	function inheritPrototype(subType, superType){
		var prototype = object(superType.prototype);
		prototype.constructor = subType;
		subType.prototype = prototype;
	}

	//父类型
	function SuperType(name){
		this.name = name;
		this.colors = ["red", "blue", "green"];
	}
	//父类型的原型方法
	SuperType.prototype.sayName = function(){
		console.log(this.name);
	}

	//子类型
	function SubType(name, age){
		SuperType.call(this, name);
		this.age = age;
	}

	//实现继承
	inheritPrototype(SubType, SuperType);

	//子类型的原型方法
	SubType.prototype.sayAge = function(){
		console.log(this.age);
	}

	//声明子类型实例
	var subObj = new SubType('BOBO', 27);
	subObj.sayName(); // BOBO
	subObj.sayAge(); // 27
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