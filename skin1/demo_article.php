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
<h1>如何使用Babel将ES6转码为ES5？</h1>

<h3><strong>一、前言：</strong></h3>
<section>
<p class="notes">当我们还在沉迷于ES5的时候，殊不知ES6早就已经发布几年了。时代在进步，WEB前端技术也在日新月异，是时候做些改变了！</p>
<p class="mb10">
	ECMAScript 6(ES6)的发展速度非常之快，但现代浏览器对ES6新特性支持度不高，所以要想在浏览器中直接使用ES6的新特性就得借助别的工具来实现。<br/>
	Babel是一个广泛使用的转码器，babel可以将ES6代码完美地转换为ES5代码，所以我们不用等到浏览器的支持就可以在项目中使用ES6的特性。
</p>

<p>
	<span class="fb-black">babel 6与之前版本的区别：</span><br/>
	<span class="focus">之前版本只要安装一个babel就可以用了，所以之前的版本包含了一大堆的东西，这也导致了下载一堆不必要的东西。但在babel 6中，将babel拆分成两个包：babel-cli和babel-core。如果你想要在CLI(终端或REPL)使用babel就下载babel-cli，如果想要在node中使用就下载babel-core。
	babel 6已结尽可能的模块化了，如果还用babel 6之前的方法转换ES6，它会原样输出，并不会转化，因为需要安装插件。如果你想使用箭头函数，那就得安装箭头函数插件npm install  babel-plugin-transform-es2015-arrow-functions。</span><br/>
	<small>本文中，我们不讨论ES6的语法特性，重点讲的是如何将ES6代码转码为ES5代码。</small>
</p>
</section><br/>

<h3><strong>二、Babel转码：</strong></h3>
<section>
<p>如果你并没有接触过ES6，当你看到下面的代码时，肯定是有点懵逼的（这是什么鬼？心中一万头神兽奔腾而过），但是你没看错，这就是ES6。不管你看不看它，它都在这里。</p>
<pre class="brush:js;">
	var a = (msg) =&gt; () =&gt; msg;

	var bobo = {
	  _name: "BoBo",
	  _friends: [],
	  printFriends() {
	    this._friends.forEach(f =&gt;
	      console.log(this._name + " knows " + f));
	  }
	};
</pre>
<p>实际上，上面的这段代码通过Babel转换后，会变成：</p>
<pre class="brush:js;">
	"use strict";

	var a = function a(msg) {
	  return function () {
	    return msg;
	  };
	};

	var bobo = {
	  _name: "BoBo",
	  _friends: [],
	  printFriends: function printFriends() {
	    var _this = this;

	    this._friends.forEach(function (f) {
	      return console.log(_this._name + " knows " + f);
	    });
	  }
	};
</pre>
<p>好，言归正传，我们尝试下用一些方法来实现上面的转码效果吧。</p>


<h5 class="fb-black line-d">1、直接安装Babel法：</h5>
<p class="focus">1.1) 首先全局安装Babel。</p>
<pre class="brush:js;">
	$ npm install -g babel-cli

	//也可以通过直接将Babel安装到项目中，在项目根目录下执行下面命令，同时它会自动在package.json文件中的devDependencies中加入babel-cli
	//在执行安装到项目中命令之前，要先在项目根目录下新建一个package.json文件。
	$ npm install -g babel-cli --save-dev
</pre>
<p>如果将babel直接安装到项目中，它会自动在package.json文件中的devDependencies中加入babel-cli。如下所示：</p>
<pre class="brush:js;">
	//......
	{
	  "devDependencies": {
	    "babel-cli": "^6.22.2"
	  }
	}
</pre>
<p class="focus">1.2) Babel的配置文件是.babelrc，存放在项目的根目录下。使用Babel的第一步，就是配置这个文件。</p>
<p><small>这个文件的完整文件名是 “.babelrc”，注意最前面是有个“.”的。由于我的电脑是Windows系统，所以在新建这个文件的时候老是提示 “必须键入文件名” 的错误。后来谷歌了下，发现创建这个文件的时候，把文件名改成“.babelrc.”，注意是前后都有一个点，这样就可以保存成功了</small></p>
<pre class="brush:js;">
	{
	  "presets": [],
	  "plugins": []
	}
</pre>
<p class="focus">1.3) presets字段设定转码规则，官方提供以下的规则集，你可以根据需要安装。</p>
<p>点击此处到Babel中文官网presets配置页面：<a href="http://babeljs.cn/docs/plugins/" class="alink" target="_blank">Babel Plugins</a></p>
<pre class="brush:js;">
	# ES2015转码规则
	$ npm install --save-dev babel-preset-es2015

	# react转码规则
	$ npm install --save-dev babel-preset-react

	# ES7不同阶段语法提案的转码规则（共有4个阶段），选装一个
	$ npm install --save-dev babel-preset-stage-0
	$ npm install --save-dev babel-preset-stage-1
	$ npm install --save-dev babel-preset-stage-2
	$ npm install --save-dev babel-preset-stage-3
</pre>
<p class="focus">1.4) 根据官网的提示，当我们用npm安装好这些插件工具之后，我们需要将这些规则加入到.babelrc中去。如下所示：</p>
<pre class="brush:js;">
	{
	    "presets": [
	      "es2015",
	      "react",
	      "stage-2"
	    ],
	    "plugins": []
	  }
</pre>
<p class="focus">1.5) 转码、转码的规则：</p>
<pre class="brush:js;">
	# 转码结果输出到标准输出
	$ babel test.js

	# 转码结果写入一个文件
	# --out-file 或 -o 参数指定输出文件
	$ babel a.js --out-file b.js
	# 或者
	$ babel a.js -o b.js

	# 整个目录转码
	# --out-dir 或 -d 参数指定输出目录
	$ babel src --out-dir lib
	# 或者
	$ babel src -d lib

	# -s 参数生成source map文件
	$ babel src -d lib -s
</pre>

<h5 class="fb-black line-d">2、工具配置法：</h5>
<p>实际上，我们可以通过前端自动化的很多工具来实现ES6的转码配置，比如，常见的grunt、gulp、Webpack和Node等。下面我就简单的说下我较为熟悉的gulp配置法。</p>
<p>点击此处到Babel中文官网Tool配置页面：<a href="http://babeljs.cn/docs/setup/" class="alink" target="_blank">Babel Tool</a></p>
<p class="focus">2.1) 首先，我们需要在项目中安装gulp：</p>
<pre class="brush:js;">
	$ npm install gulp --save-dev
</pre>

<p class="focus">2.2) 然后，我们需要在项目中安装gulp-babel：</p>
<pre class="brush:js;">
	$ npm install --save-dev gulp-babel
</pre>
<p>当执行完上面的两个命令后，我们会发现根目录下的package.json文件内容已经被自动修改成：</p>
<pre class="brush:js;">
	{
	  "devDependencies": {
	    "babel-cli": "^6.22.2",
	    "gulp": "^3.9.1",
	    "gulp-babel": "^6.1.2"
	  }
	}
</pre>

<p class="focus">2.3) 编写gulpfile.js文件，文件内容如下所示：</p>
<pre class="brush:js;">
	var gulp = require("gulp");
	var babel = require("gulp-babel");

	gulp.task("default", function () {
	  return gulp.src("src/a.js")
	    .pipe(babel())
	    .pipe(gulp.dest("lib"));
	});
</pre>
<p>当我们在当前项目目录下运行如下命令后，会发现原本在src文件夹中的a.js(按照ES6标准编写的)文件已经被转码成ES5标准的a.js，并放在了lib文件夹里面。</p>
<pre class="brush:js;">
	$ gulp default

	#或者用下面的命令也行
	$ gulp
</pre>
</section><br/>

<h3><strong>三、其他：</strong></h3>
<section>
<p class="notes">以上两种方法，在我本地亲测有效。当然，你可以选择更多其他的工具来处理，殊途同归，Anyway，让我们一起来拥抱ES6吧！</p>
<p>当然，你也可以选择在线转码（测试体验用），地址是：<a href="http://babeljs.cn/repl/" target="_blank" class="alink">http://babeljs.cn/repl/</a>。</p>
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