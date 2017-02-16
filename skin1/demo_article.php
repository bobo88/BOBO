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
<!-- <h1>ES6如何实现模块化</h1> -->
<!-- <h1>jQuery源码探究系列之isFunction</h1> -->
<h1>Vue中 “Computed” vs “Methods”</h1>


<script src="http://www.yuanbo88.com/dist/minjs/vue.min.js"></script>

<style>
	.click-tips{ color: #28AF59;}
</style>
<h3><strong>一、前言：</strong></h3>
<section>
<p>在阅读Vue官方文档的过程中，看到 “Computed” vs “Methods”这一段，觉得原文案例有点晦涩难懂。原文地址是：<a href="http://vuejs.org/v2/guide/computed.html#Computed-Caching-vs-Methods" target="_blank">http://vuejs.org/v2/guide/computed.html#Computed-Caching-vs-Methods</a>。所以就想着做个demo模拟下，以便更好的区别，加深理解。</p>
</section><br/>

<h3><strong>二、“Computed” vs “Methods”：</strong></h3>
<section>
<p><span class="fb-black">1、Computed：#######################################################</span></p>
<pre class="brush:xml;">
	&lt;!-- HTML --&gt;
	&lt;div id="example"&gt;
	  &lt;p&gt;Original message: "{{ message }}"&lt;/p&gt;
	  &lt;p&gt;Computed reversed message: "{{ reversedMessage }}"&lt;/p&gt;
	&lt;/div&gt;
</pre>
<pre class="brush:js;">
	//JS Computed
	var vm = new Vue({
	  el: '#example',
	  data: {
	    message: 'Hello'
	  },
	  computed: {
	    // a computed getter
	    reversedMessage: function () {
	      // `this` points to the vm instance
	      return this.message.split('').reverse().join('')
	    }
	  }
	});
</pre>
<div id="example" class="mb10">
  <p>Original message: "{{ message }}"</p>
  <p>Computed reversed message: "{{ reversedMessage }}"</p>
</div>

<p><span class="fb-black">2、Methods：#######################################################</span></p>
<pre class="brush:xml;">
	&lt;!-- HTML --&gt;
	&lt;div id="example2"&gt;
	  &lt;p&gt;Original message: "{{ message }}"&lt;/p&gt;
	  &lt;p&gt;Methods reversed message: "{{ reverseMessage() }}"&lt;/p&gt;
	&lt;/div&gt;
</pre>
<pre class="brush:js;">
	//JS Methods
	var vm2 = new Vue({
		el: '#example2',
		data: {
			message: 'Hello'
		},
		methods: {
		  reverseMessage: function () {
		    return this.message.split('').reverse().join('')
		  }
		}
	});
</pre>

<div id="example2" class="mb10">
  <p>Original message: "{{ message }}"</p>
  <p>Methods reversed message: "{{ reverseMessage() }}"</p>
</div>
<p>从上面的两个demo，我们可以看出：可以通过调用表达式中的method来达到同样的效果。</p>
<p>原文中的意思是：<span class="fb-black">“不经过计算属性，我们可以在 method 中定义一个相同的函数来替代它。对于最终的结果，两种方式确实是相同的。然而，不同的是计算属性是基于它的依赖缓存。计算属性只有在它的相关依赖发生改变时才会重新取值。这就意味着只要 message 没有发生改变，多次访问 reversedMessage 计算属性会立即返回之前的计算结果，而不必再次执行函数”</span>。然后原文中又给出了一个关于Date.now()的demo，我将其拓展了一下：</p>
<pre class="brush:xml;">
	&lt;!-- HTML --&gt;
	&lt;div id="example3" class="mb10"&gt;
	  &lt;p&gt;
	  	Methods Now: 
	  	&lt;input type="text" value="{{ now() }}" class="input-normal"&gt;
	  	&lt;a href="javascript:;" @click="showMethodsNow" class="ml10 btn-normal"&gt;点我调用Methods的now&lt;/a&gt;
	  	&lt;input type="text" v-model="methodsnow" class="ml10 input-normal"&gt;
	  	&lt;span class="ml10 click-tips"&gt;点击了{{count}}次&lt;/span&gt;
	  &lt;/p&gt;
	&lt;/div&gt;

	&lt;div id="example4" class="mb10"&gt;
	  &lt;p&gt;
	  	Computed Now: 
	  	&lt;input type="text" value="{{ now }}" class="input-normal"&gt;
	  	&lt;a href="javascript:;" @click="showComputedNow" class="ml10 btn-normal"&gt;点我调用Computed的now&lt;/a&gt;
	  	&lt;input type="text" v-model="computednow" class="ml10 input-normal"&gt;
	  	&lt;span class="ml10 click-tips"&gt;点击了{{count}}次&lt;/span&gt;
	  &lt;/p&gt;
	&lt;/div&gt;
</pre>
<pre class="brush:js;">
	//JS methods now
	var vm3 = new Vue({
		el: '#example3',
		data: {
			message: 'Hello',
			methodsnow: '',
			count: 0
		},
		methods: {
		  now: function () {
		    return Date.now();
		  },
		  showMethodsNow: function(){
		  	this.count++;
		  	this.methodsnow = this.now();
		  }
		}
	});

	//JS computed now
	var vm4 = new Vue({
		el: '#example4',
		data: {
			message: 'Hello',
			computednow: '',
			count: 0
		},
		methods: {
			showComputedNow: function(){
				this.count++;
				this.computednow = this.now;
			}
		},
		computed: {
		  now: function () {
		    return Date.now();
		  }
		}
	});
</pre>
<div id="example3" class="mb10">
  <p>
  	Methods Now: 
  	<input type="text" value="{{ now() }}" class="input-normal">
  	<a href="javascript:;" @click="showMethodsNow" class="ml10 btn-normal">点我调用Methods的now</a>
  	<input type="text" v-model="methodsnow" class="ml10 input-normal">
  	<span class="ml10 click-tips">点击了{{count}}次</span>
  </p>
</div>
<div id="example4" class="mb10">
  <p>
  	Computed Now: 
  	<input type="text" value="{{ now }}" class="input-normal">
  	<a href="javascript:;" @click="showComputedNow" class="ml10 btn-normal">点我调用Computed的now</a>
  	<input type="text" v-model="computednow" class="ml10 input-normal">
  	<span class="ml10 click-tips">点击了{{count}}次</span>
  </p>
</div>

<p><span class="fb-black">从上面的demo中，我们可以看出，不管你点击调用多少次showComputedNow方法，now的值一直不变（除非你将其默认值改变，注意：Computed默认只有 getter ，不过在需要时你也可以自定义提供一个 setter ），所以能用Computed方式来缓存计算。</span></p>
<p>我们为什么需要缓存？假设我们有一个重要的计算属性 A ，这个计算属性需要一个巨大的数组遍历和做大量的计算。然后我们可能有其他的计算属性依赖于 A 。如果没有缓存，我们将不可避免的多次执行 A 的 getter ！如果你不希望有缓存，请用 method 替代。</p>

</section><br/>

<script>
	var vm = new Vue({
	  el: '#example',
	  data: {
	    message: 'Hello'
	  },
	  computed: {
	    // a computed getter
	    reversedMessage: function () {
	      // `this` points to the vm instance
	      return this.message.split('').reverse().join('')
	    }
	  }
	});

	var vm2 = new Vue({
		el: '#example2',
		data: {
			message: 'Hello'
		},
		methods: {
		  reverseMessage: function () {
		    return this.message.split('').reverse().join('')
		  }
		}
	});

	//JS methods now
	var vm3 = new Vue({
		el: '#example3',
		data: {
			message: 'Hello',
			methodsnow: '',
			count: 0
		},
		methods: {
		  now: function () {
		    return Date.now();
		  },
		  showMethodsNow: function(){
		  	this.count++;
		  	this.methodsnow = this.now();
		  }
		}
	});

	//JS computed now
	var vm4 = new Vue({
		el: '#example4',
		data: {
			message: 'Hello',
			computednow: '',
			count: 0
		},
		methods: {
			showComputedNow: function(){
				this.count++;
				this.computednow = this.now;
			}
		},
		computed: {
		  now: function () {
		    return Date.now();
		  }
		}
	});
</script>

<h3><strong>三、其他：</strong></h3>
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