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
<h1>Javascript中的 “&” 和 “|” 你知多少？</h1>

<style>
	.v-top{ position: relative; top: -5px; font-size: 12px;}
</style>
<h3><strong>一、前言：</strong></h3>
<section>
<div>
	<p>在文章开始之前，先出几个题目给大家看看：</p>
	<pre class="brush:js;">
		var num1 = 1 & 0;
		console.log(num1); // 0

		var num2 = 'string' & 1;
		console.log(num2); // 0

		var num3 = true & 1;
		console.log(num3); // 1

		var num4 = undefined | false;
		console.log(num4); // 0

		var num5 = undefined | true;
		console.log(num5); // 1

		var num6 = 23 & 5;
		console.log(num6); // 5

		var num7 = 23 | 5;
		console.log(num7); // 23
	</pre>
</div>
<p>
	上面的题目大家都做对了吗？我们之前有总结过 <a href="http://www.yuanbo88.com/article-j-36.html" target="_blank">《说说javascript中的“&&”和“||”》</a>，“&&” 和 “||” 是逻辑运算表达式中的操作符。那么一个 “&” 或者一个 “|” 又代表什么含义呢？有什么特性呢？接下来，我们就来一一揭秘。
</p>
<p><span class="fb-black">首先，我们得清楚 “&” 和 “|” 是位运算操作符。</span></p>
<p>
	<small style="font-size: 14px;">
		位运算符用于在最基本的层次上，即按内存中表示数值的位来操作数值。ECMAScript中的所有数值都以IEEE-754 64位格式存储，但位操作符并不直接操作64位的值。而是先将64位的值转换成32位的整数，然后执行操作，最后再将结果转换为64位。对于开发人员来说，由于64位存储格式是透明的，因此整个过程就像是只存在32位的整数一样。<br/>
		对于有符号的整数，32位中的前31位用于表示整数的值。第32位表示数值的符号：0表示正数，1表示负数。这个表示符号的位叫做符号位，符号位的值决定了其他位数值的格式。其中，正数以纯二进制格式存储，31位中的每一位都表示2的幂。第一位（叫做位0）表示2<span class="v-top">0</span>，第二位表示2<span class="v-top">1</span>，以此类推。没有用到的位以0表示，即忽略不计。例如，数值18的二进制表示是0000 0000 0000 0000 0000 0000 0001 0010，或者更简洁的10010。这是5个有效位，这5位本身就决定了实际的值。<br/>
		负数同样以二进制码存储，但使用的格式是二进制补码。计算一个数值的二进制补码，需要经过下列3个步骤：<br/>
		(1)求这个数值绝对值的二进制码（例如，要求-18的二进制补码，先求18的二进制码）；<br/>
		(2)求二进制反码，即将0替换为1，将1替换为0；<br/>
		(3)得到的二进制反码加1。<br/>
		这样，求得了-18的二进制表示，即1111 1111 1111 1111 1111 1111 1110 1110。<br/>
		......在ECMAScript中，当对数值应用位操作符时，后台会发生如下转换过程：64位的数值被转换成32位数值，然后执行位操作，最后再将32位的结果转换回64位数值。这样，表面上看起来就好像是在操作32位数值，就跟在其他语言中以类似方式执行二进制操作一样。但这个转换过程也导致了一个严重的副效应，即在对特殊的NaN和Infinity值应用位操作时，这两个值都会被当成0来处理。<br/>
		<span class="fb-black">如果对非数值应用位操作符，会先使用Number()函数将该值转换为一个数值（自动完成），然后再应用位操作。得到的结果将是一个数值。</span>
		......（截取自《Javascript高级程序设计》）
	</small>
</p>
</section><br/>

<h3><strong>二、“&”（按位与AND）：</strong></h3>
<section>
<p><span class="fb-black">按位与操作符由一个和号字符（&）表示，它有两个操作符数。从本质上来讲，按位与操作就是将两个数值的每一位对齐，对相同位置上的两个数执行AND操作。</span></p>
<p><strong>按位与AND操作规则：只有两个数值的对应位都是1时才返回1，任何一位是0，结果都是0。</strong></p>
<p>前面已经把理论性的东西说的太多了，但是我觉得理论又很有必要。接下来，直接分析例子吧！</p>

<p>	
	我们先看上面题目中的 num1,num2,num3以及num6。我们尝试结合上面的理论来分析为什么会输出最终的结果。
</p>
<pre class="brush:js;">
	// num1是1和0进行“按位与”操作后的返回值。1的二进制码简写为1，0的二进制码简写为0，根据上面的规则，第二个操作符数为0，结果是0
	var num1 = 1 & 0;
	console.log(num1); // 0
	
	// 第一个操作符数是字符串，按照前言里面的理论，对于非数值的操作符数，先使用Number()函数处理，结果返回NaN，NaN又会被当成0来处理。所以最终结果也是0
	var num2 = 'string' & 1;
	console.log(num2); // 0
	
	// true是布尔类型值，同样使用Number()函数处理，处理后得到数值1，于是表达式就相当于“1 & 1” 进行位运算，当两个数值都为1的时候，结果返回1
	var num3 = true & 1;
	console.log(num3); // 1
	
	// 23的二进制码是：...10111，5的二进制码是：...00101。然后每一位进行对齐处理，结合上面的规则，可以得出10111&00101的结果是：00101。00101就是5
	var num6 = 23 & 5;
	console.log(num6); // 5

	// 再加个例子：24的二进制码为...11000，7的二进制码为...00111，相同位置的两个数执行AND操作，结果发现结果是...00000。所以最终结果是0，你算对了吗？
	var add1 = 24 & 7;
	console.log(add1); // 0 
</pre>

</section><br/>

<h3><strong>三、“|”（按位或OR）：</strong></h3>
<section>
<p><span class="fb-black">按位或操作符由一个竖线符号（|）表示，同样有两个操作符数。从本质上来讲，按位或操作也是将两个数值的每一位对齐，对相同位置上的两个数执行OR操作。</span></p>
<p><strong>按位或OR操作规则：只要两个数值的对应位有一个是1就返回1，而只有在两个位都是0的情况下才返回0。</strong></p>

<p>	
	我们接最上面的例子来看吧！
</p>
<pre class="brush:js;">
	// 第一个操作符数为undefined，第二个操作符数是false，均不是数值，所以都要先使用Number()函数处理，处理结果都是返回NaN，NaN又会被当成0处理，于是最终结果是0
	var num4 = undefined | false;
	console.log(num4); // 0
	
	// 第一个操作符数相当于0，第二个操作符数相当于1，结合按位或的规则，最终结果是1
	var num5 = undefined | true;
	console.log(num5); // 1

	// 23的二进制码是：...10111，5的二进制码是：...00101。然后每一位进行对齐处理，结合上面的规则，可以得出10111|00101的结果是：10111。10111就是23
	var num7 = 23 | 5;
	console.log(num7); // 23

	// 再加个例子：24的二进制码为...11000，7的二进制码为...00111，相同位置的两个数执行AND操作，结果发现结果是...11111。所以最终结果是31，你算对了吗？
	var add2 = 24 | 7;
	console.log(add2); // 31
</pre>
</section><br/>

<h3><strong>四、其他：</strong></h3>
<section>
<p>相信也会有一些朋友不知道怎么把数值转换成标准的二进制码，那么有没有快速的方法呢？答案是肯定的。</p>
<p>我的网上随机找到了一个在线转换工具地址：<a href="http://www.atool.org/hexconvert.php" target="_blank">数值进制转换（点我查看）</a>。（当然，你也可以使用你找到的别的工具，不管怎样，能实现效果就是我们的最终目的）</p>
<p>最后，再附上我通过手写转换二进制过程中总结的规律图，依然可以快速将数值转换成二进制码，逼格满满哒！</p>
<p><img src="http://www.yuanbo88.com/dist/images/domeimg/lazyload.gif" data-original="http://www.yuanbo88.com/dist/images/domeimg/article/2017/Binary/binary.png" alt="二进制转换规律图"></p>
</section><br/>

<script>

	// var num1 = 1 & 0;
	// console.log(num1); // 0

	// var num2 = 'string' & 1;
	// console.log(num2); // 0

	// var num3 = true & 1;
	// console.log(num3); // 1

	// var num4 = undefined | false;
	// console.log(num4); // 0

	// var num5 = undefined | true;
	// console.log(num5); // 1

	// var num6 = 23 & 5;
	// console.log(num6); // 5

	// var num7 = 23 | 5;
	// console.log(num7); // 23

	// var add1 = 24 & 7;
	// console.log(add1); // 0
	
	var add2 = 28 | 3;
	console.log(add2); // 0 

	// var num2 = 0 & 1;
	// alert(num2); // 0

	// var num3 = 1 | 0;
	// alert(num3); // 1

	// var num4 = 0 | 1; 
	// alert(num4); // 1

	// var num5 = 2 & 3;
	// alert(num5); // 2

	// var num6 = 3 & 2;
	// alert(num6); // 2

	// var num7 = 2 | 3;
	// alert(num7); // 3

	// var num8 = 3 | 2;
	// alert(num8); // 3

	

	// var num10 = 1 & 'string';
	// alert(num10); // 0

	// var num11 = 1 & true;
	// alert(num11); // 1

	

	// var num13 = false & true;
	// alert(num13); // 0

	// var num14 = true & false;
	// alert(num14); // 0

	// var num15 = false | true;
	// alert(num15); // 1

	// var num16 = undefined | false;
	// alert(num16); // 0

	// var num17 = undefined | true;
	// alert(num17); // 1
</script>









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