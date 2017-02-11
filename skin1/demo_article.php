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



 <img src="dist/images/domeimg/lazyload.gif" data-original="dist/images/domeimg/article/2016/livereload/livereload_2.png" alt="ʹ��gulpʵ��ǰ���Զ�����������֮������Զ�ˢ��">
<a href="javascript:;" class="btn-normal js-addMethod">�����ִ��add����</a>
<img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="">
<input type="text" class="input-normal">
#1ab5e3    blue

#28AF59    green

#FF5F09    yellow
<br/>
<!-- <h1>��̽Flexbox���Ժ��Ӳ���</h1> -->
<h1>���ʹ��Babel��ES6ת��ΪES5��</h1>

<h3><strong>һ��ǰ�ԣ�</strong></h3>
<section>
<p class="notes">�����ǻ��ڳ�����ES5��ʱ���ⲻ֪ES6����Ѿ����������ˡ�ʱ���ڽ�����WEBǰ�˼���Ҳ���������죬��ʱ����Щ�ı��ˣ�</p>
<p class="mb10">
	ECMAScript 6(ES6)�ķ�չ�ٶȷǳ�֮�죬���ִ��������ES6������֧�ֶȲ��ߣ�����Ҫ�����������ֱ��ʹ��ES6�������Ծ͵ý�����Ĺ�����ʵ�֡�<br/>
	Babel��һ���㷺ʹ�õ�ת������babel���Խ�ES6����������ת��ΪES5���룬�������ǲ��õȵ��������֧�־Ϳ�������Ŀ��ʹ��ES6�����ԡ�
</p>

<p>
	<span class="fb-black">babel 6��֮ǰ�汾������</span><br/>
	<span class="focus">֮ǰ�汾ֻҪ��װһ��babel�Ϳ������ˣ�����֮ǰ�İ汾������һ��ѵĶ�������Ҳ����������һ�Ѳ���Ҫ�Ķ���������babel 6�У���babel��ֳ���������babel-cli��babel-core���������Ҫ��CLI(�ն˻�REPL)ʹ��babel������babel-cli�������Ҫ��node��ʹ�þ�����babel-core��
	babel 6�ѽᾡ���ܵ�ģ�黯�ˣ��������babel 6֮ǰ�ķ���ת��ES6������ԭ�������������ת������Ϊ��Ҫ��װ������������ʹ�ü�ͷ�������Ǿ͵ð�װ��ͷ�������npm install  babel-plugin-transform-es2015-arrow-functions��</span><br/>
	<small>�����У����ǲ�����ES6���﷨���ԣ��ص㽲������ν�ES6����ת��ΪES5���롣</small>
</p>
</section><br/>

<h3><strong>����Babelת�룺</strong></h3>
<section>
<p>����㲢û�нӴ���ES6�����㿴������Ĵ���ʱ���϶����е��±Ƶģ�����ʲô������һ��ͷ���ޱ��ڶ�������������û���������ES6�������㿴�����������������</p>
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
<p>ʵ���ϣ��������δ���ͨ��Babelת���󣬻��ɣ�</p>
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
<p>�ã��Թ����������ǳ�������һЩ������ʵ�������ת��Ч���ɡ�</p>


<h5 class="fb-black line-d">1��ֱ�Ӱ�װBabel����</h5>
<p class="focus">1.1) ����ȫ�ְ�װBabel��</p>
<pre class="brush:js;">
	$ npm install -g babel-cli

	//Ҳ����ͨ��ֱ�ӽ�Babel��װ����Ŀ�У�����Ŀ��Ŀ¼��ִ���������ͬʱ�����Զ���package.json�ļ��е�devDependencies�м���babel-cli
	//��ִ�а�װ����Ŀ������֮ǰ��Ҫ������Ŀ��Ŀ¼���½�һ��package.json�ļ���
	$ npm install -g babel-cli --save-dev
</pre>
<p>�����babelֱ�Ӱ�װ����Ŀ�У������Զ���package.json�ļ��е�devDependencies�м���babel-cli��������ʾ��</p>
<pre class="brush:js;">
	//......
	{
	  "devDependencies": {
	    "babel-cli": "^6.22.2"
	  }
	}
</pre>
<p class="focus">1.2) Babel�������ļ���.babelrc���������Ŀ�ĸ�Ŀ¼�¡�ʹ��Babel�ĵ�һ����������������ļ���</p>
<p><small>����ļ��������ļ����� ��.babelrc����ע����ǰ�����и���.���ġ������ҵĵ�����Windowsϵͳ���������½�����ļ���ʱ��������ʾ ����������ļ����� �Ĵ��󡣺����ȸ����£����ִ�������ļ���ʱ�򣬰��ļ����ĳɡ�.babelrc.����ע����ǰ����һ���㣬�����Ϳ��Ա���ɹ���</small></p>
<pre class="brush:js;">
	{
	  "presets": [],
	  "plugins": []
	}
</pre>
<p class="focus">1.3) presets�ֶ��趨ת����򣬹ٷ��ṩ���µĹ��򼯣�����Ը�����Ҫ��װ��</p>
<p>����˴���Babel���Ĺ���presets����ҳ�棺<a href="http://babeljs.cn/docs/plugins/" class="alink" target="_blank">Babel Plugins</a></p>
<pre class="brush:js;">
	# ES2015ת�����
	$ npm install --save-dev babel-preset-es2015

	# reactת�����
	$ npm install --save-dev babel-preset-react

	# ES7��ͬ�׶��﷨�᰸��ת����򣨹���4���׶Σ���ѡװһ��
	$ npm install --save-dev babel-preset-stage-0
	$ npm install --save-dev babel-preset-stage-1
	$ npm install --save-dev babel-preset-stage-2
	$ npm install --save-dev babel-preset-stage-3
</pre>
<p class="focus">1.4) ���ݹ�������ʾ����������npm��װ����Щ�������֮��������Ҫ����Щ������뵽.babelrc��ȥ��������ʾ��</p>
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
<p class="focus">1.5) ת�롢ת��Ĺ���</p>
<pre class="brush:js;">
	# ת�����������׼���
	$ babel test.js

	# ת����д��һ���ļ�
	# --out-file �� -o ����ָ������ļ�
	$ babel a.js --out-file b.js
	# ����
	$ babel a.js -o b.js

	# ����Ŀ¼ת��
	# --out-dir �� -d ����ָ�����Ŀ¼
	$ babel src --out-dir lib
	# ����
	$ babel src -d lib

	# -s ��������source map�ļ�
	$ babel src -d lib -s
</pre>

<h5 class="fb-black line-d">2���������÷���</h5>
<p>ʵ���ϣ����ǿ���ͨ��ǰ���Զ����ĺܶ๤����ʵ��ES6��ת�����ã����磬������grunt��gulp��Webpack��Node�ȡ������Ҿͼ򵥵�˵���ҽ�Ϊ��Ϥ��gulp���÷���</p>
<p>����˴���Babel���Ĺ���Tool����ҳ�棺<a href="http://babeljs.cn/docs/setup/" class="alink" target="_blank">Babel Tool</a></p>
<p class="focus">2.1) ���ȣ�������Ҫ����Ŀ�а�װgulp��</p>
<pre class="brush:js;">
	$ npm install gulp --save-dev
</pre>

<p class="focus">2.2) Ȼ��������Ҫ����Ŀ�а�װgulp-babel��</p>
<pre class="brush:js;">
	$ npm install --save-dev gulp-babel
</pre>
<p>��ִ���������������������ǻᷢ�ָ�Ŀ¼�µ�package.json�ļ������Ѿ����Զ��޸ĳɣ�</p>
<pre class="brush:js;">
	{
	  "devDependencies": {
	    "babel-cli": "^6.22.2",
	    "gulp": "^3.9.1",
	    "gulp-babel": "^6.1.2"
	  }
	}
</pre>

<p class="focus">2.3) ��дgulpfile.js�ļ����ļ�����������ʾ��</p>
<pre class="brush:js;">
	var gulp = require("gulp");
	var babel = require("gulp-babel");

	gulp.task("default", function () {
	  return gulp.src("src/a.js")
	    .pipe(babel())
	    .pipe(gulp.dest("lib"));
	});
</pre>
<p>�������ڵ�ǰ��ĿĿ¼��������������󣬻ᷢ��ԭ����src�ļ����е�a.js(����ES6��׼��д��)�ļ��Ѿ���ת���ES5��׼��a.js����������lib�ļ������档</p>
<pre class="brush:js;">
	$ gulp default

	#���������������Ҳ��
	$ gulp
</pre>
</section><br/>

<h3><strong>����������</strong></h3>
<section>
<p class="notes">�������ַ��������ұ����ײ���Ч����Ȼ�������ѡ����������Ĺ�����������;ͬ�飬Anyway��������һ����ӵ��ES6�ɣ�</p>
<p>��Ȼ����Ҳ����ѡ������ת�루���������ã�����ַ�ǣ�<a href="http://babeljs.cn/repl/" target="_blank" class="alink">http://babeljs.cn/repl/</a>��</p>
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