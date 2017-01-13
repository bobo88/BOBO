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
<h1>Javascript设计模式之装饰者模式详解篇</h1>


<script>
	// //需要装饰的类（函数）
	// function Macbook() {
	//     this.cost = function () {
	//         return 1000;
	//     };
	// }

	// function Memory(macbook) {
	//     this.cost = function () {
	//         return macbook.cost() + 75;
	//     };
	// }

	// function BlurayDrive(macbook) {
	//     this.cost = function () {
	//         return macbook.cost() + 300;
	//     };
	// }


	// function Insurance(macbook) {
	//     this.cost = function () {
	//         return macbook.cost() + 250;
	//     };
	// }


	// // 用法
	// var myMacbook = new Insurance(new BlurayDrive(new Memory(new Macbook())));
	// console.log(myMacbook.cost());
	






	// function ConcreteClass() {
	//     this.performTask = function () {
	//         this.preTask();
	//         console.log('doing something');
	//         this.postTask();
	//     };
	// }

	// function AbstractDecorator(decorated) {
	//     this.performTask = function () {
	//         decorated.performTask();
	//     };
	// }

	// function ConcreteDecoratorClass(decorated) {
	//     this.base = AbstractDecorator;
	//     this.base(decorated);// add performTask method

	//     decorated.preTask = function () {
	//         console.log('pre-calling..');
	//     };

	//     decorated.postTask = function () {
	//         console.log('post-calling..');
	//     };

	// }

	// var concrete = new ConcreteClass();//
	// var decorator1 = new ConcreteDecoratorClass(concrete);//
	// var decorator2 = new ConcreteDecoratorClass(decorator1);
	// decorator2.performTask();
	// //pre-calling..
	// //doing something
	// //post-calling..






	// var tree = {};
	// tree.decorate = function () {
	//     console.log('Make sure the tree won\'t fall');
	// };

	// tree.getDecorator = function (deco) {
	//     tree[deco].prototype = this;
	//     return new tree[deco];
	// };

	// tree.RedBalls = function () {
	//     this.decorate = function () {
	//         this.RedBalls.prototype.decorate(); // 第7步：先执行原型（这时候是Angel了）的decorate方法
	//         console.log('Put on some red balls'); // 第8步 再输出 red
	//         // 将这2步作为RedBalls的decorate方法
	//     }
	// };

	// tree.BlueBalls = function () {
	//     this.decorate = function () {
	//         this.BlueBalls.prototype.decorate(); // 第1步：先执行原型的decorate方法，也就是tree.decorate()
	//         console.log('Add blue balls'); // 第2步 再输出blue
	//         // 将这2步作为BlueBalls的decorate方法
	//     }
	// };

	// tree.Angel = function () {
	//     this.decorate = function () {
	//         this.Angel.prototype.decorate(); // 第4步：先执行原型（这时候是BlueBalls了）的decorate方法
	//         console.log('An angel on the top'); // 第5步 再输出angel
	//         // 将这2步作为Angel的decorate方法
	//     }
	// };

	// tree = tree.getDecorator('BlueBalls'); // 第3步：将BlueBalls对象赋给tree，这时候父原型里的getDecorator依然可用
	// 		//tree['BlueBalls'].prototype = this(this是空对象tree); return new tree['BlueBalls'];
	// tree = tree.getDecorator('Angel'); // 第6步：将Angel对象赋给tree，这时候父原型的父原型里的getDecorator依然可用
	// 		//tree['Angel'].prototype = this(this是第三步的tree，也就是)
	// tree = tree.getDecorator('RedBalls'); // 第9步：将RedBalls对象赋给tree

	// tree.decorate(); // 第10步：执行RedBalls对象的decorate方法

	// //Make sure the tree won't fall
	// //Add blue balls
	// //An angel on the top
	// //Put on some red balls

	// //装饰者模式是为已有功能动态地添加更多功能的一种方式，把每个要装饰的功能放在单独的函数里，然后用该函数包装所要装饰的已有函数对象，因此，当需要执行特殊行为的时候，调用代码就可以根据需要有选择地、按顺序地使用装饰功能来包装对象。优点是把类（函数）的核心职责和装饰功能区分开了。
	


	//装饰者模式中，可以在运行时动态添加附加功能到对象中。当处理静态类时，这可能是一个挑战。在Javascript中，由于对象是可变的，因此，添加功能到对象中的过程本身并不是问题。
	//装饰者模式的一个比较方便的特征在于其预期行为的可定制和可配置特性。可以从仅具有一些基本功能的普通对象开始，然后从可用装饰资源池中选择需要用于增强普通对象的哪些功能，并且按照顺序进行装饰，尤其是当装饰顺序很重要的时候。
	//实现装饰者模式的其中一个方法是使得每个装饰者成为一个对象，并且该对象包含了应该被重载的方法。每个装饰者实际上继承了目前已经被前一个装饰者进行增强后的对象。每个装饰方法在uber（继承的对象）上调用了同样的方法并获取其值，此外它还继续执行了一些操作。
	//


</script>


<h3><strong>一、前言：</strong></h3>
<section>
<p><small>装饰者模式（Decorator Pattern）：在不改变原类和继承的情况下动态扩展对象功能，通过包装一个对象来实现一个新的具有原对象相同接口的新的对象。</small></p>
<p>
	装饰者模式的特点：<br/>
    1. 在不改变原对象的原本结构的情况下进行功能添加。<br/>
    2. 装饰对象和原对象具有相同的接口，可以使客户以与原对象相同的方式使用装饰对象。<br/>
    3. 装饰对象中包含原对象的引用，即装饰对象是真正的原对象经过包装后的对象。
</p>

</section><br/>

<h3><strong>二、Javascript装饰者模式详解：</strong></h3>
<section>
<p>
	
</p>
<pre class="brush:js;">
	
</pre>

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