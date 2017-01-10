<?php
session_start(); 
//建立数据库连接
require_once '../mysql_connect.php';
require_once '../inc_session.php';
//关闭数据库连接
$link->close(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <? include '../top.html'; ?>
    <style>
        .todays-deal-wrap{ padding-bottom: 50px; width: 100%; min-width: 1000px; background: url(images/demo_7/today_deal_bg.jpg) repeat;}
        .inline-block{display: inline-block; *display: inline; *zoom: 1;}
        img:hover{opacity: 1;filter:alpha(opacity=100);}
        .todays-deal-wrap .banner{ margin-bottom: 50px; width: 100%; min-width: 1000px; height: 500px; background: url(images/demo_7/today_deal_banner.jpg) top center no-repeat;}
        .gift-wrap{ position: relative; z-index: 1; margin: 0 auto 50px; padding: 35px 30px; width: 940px; height: 340px; background: url(images/demo_7/gift_bg.jpg) repeat;}
        .gift-wrap .left-box{ position: absolute; z-index: 3; top: 35px; left: 30px; padding: 25px; width: 385px; height: 260px; background: #fbebc0;}
        .gift-wrap .left-box .gift-tit{ height: 50px; line-height: 50px; color: #490c01; font-size: 40px; font-weight: bold; text-align: center;}
        .gift-wrap .left-box .share-box{ padding: 10px 0; text-align: center;}
        .share-icon{ display: inline-block; *display: inline;*zoom: 1; margin-right: 15px; width: 34px; height: 41px; background: url(images/demo_7/share_icon.png) no-repeat; text-indent: -9999px;
          -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;
        }
        .share-icon:hover{
          -webkit-transform: translate(0,-5px);
          -moz-transform: translate(0,-5px);
        }
        .share-facebook{ background-position: 0 0;}
        .share-twitter{ background-position: -50px 0;}
        .share-tumblr{ background-position: -100px 0;}
        .share-google{ background-position: -150px 0;}
        .share-reddit{ background-position: -200px 0;}
        .gift-pro{ width: 400px;}
        .gift-pro li{ float: left; margin-right: 30px; width: 100px; height: 143px; text-align: center;
          -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;
        }
        .gift-pro li:hover{
          -webkit-transform: translate(-2px,0);
          -moz-transform: translate(-2px,0);
        }

        .gift-wrap .right-box{ position: absolute; z-index: 2; bottom: 35px; right: 30px; padding: 25px 25px 25px 50px; width: 460px; height: 190px; line-height: 25px; color: #490c01; font-size: 14px; background: #ffba00;
          -webkit-box-shadow: 0px 5px 40px #333;
          -moz-box-shadow: 0px 5px 40px #333;
          box-shadow: 0px 5px 40px #333;
        }
        .gift-wrap .right-box a{ color: #ff3500; font-weight: bold; text-decoration: underline;}
        .gift-wrap .right-box strong{ color: #ff3500; font-weight: bold;}
        .gift-wrap .gift-img{ position: absolute; z-index: 1; top: 35px; right: 220px; padding: 65px 0 35px; width: 134px; height: 45px; color: #490c01; font-size: 20px; font-weight: bold; background: url(images/demo_7/gift.png) top center no-repeat; text-align: center;}

        .new-arrival-wrap{ margin: 0 auto 50px; width: 1000px;}
        .section-tit{ width: 1000px; height: 250px;}
        .section-tit img{ width: 1000px; height: 250px;}

        .pro-list-wrap .pl-box{ padding: 25px 25px 10px 25px; background: #fbebc0;}
        .pro-list-wrap .pl-box .slider{ width: 1000px;}
        .pro-list-wrap .pl-box li{ float: left; width: 226px; margin-right: 14px; margin-bottom: 20px; background-color: #fff; padding-bottom: 15px; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pro-list-wrap .pl-box li:hover{
            -webkit-transform: translate(0,-10px);
            -moz-transform: translate(0,-10px);
        }
        .goods-time{height:30px; color:#fce6b2;font-size:14px;background-color:#490c01;text-align:center;}
        .goods-time span{display:inline-block;vertical-align:middle;height:30px;line-height:30px;padding:0 5px;}

        .goods-img{width:170px;height:170px;margin:5px auto 0; padding-bottom: 5px; border-bottom: 1px solid #e7dfb5;}
        .goods-img a{display:block;width:170px;height:170px;overflow:hidden;}
        .goods-img img{height:170px;width:auto;display:inline;vertical-align:top;}

        .goods-title{font-size:14px;width:210px;margin:auto;height:32px;line-height:16px;overflow:hidden;text-align:center;margin-top:10px;}
        .goods-title a{color:#490c01; text-decoration: none;}
        .goods-title a:hover{color:#333; text-decoration: underline;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#490c01;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#ff7100;font-size:22px; font-weight: bold;}

        .goods-limit{width:200px;margin:5px auto 0;height:50px;position:relative;}
        .pl-box .goods-limit .market-price{ color: #490c01; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#490c01;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #ff5736;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .goods-limit-tips{
            position:absolute;left:0;top:-30px;width:95px; height:20px;font:normal 12px/20px Arial;
            background:#fff;border:1px solid #490c01;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-limit-tips b{color:#490c01;padding-right:5px;}
        .goods-limit-tips em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .goods-limit-tips em.tri_bd{border-color:#490c01 transparent transparent transparent;bottom:-11px;z-index:1;}
        .goods-limit-tips em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}
        .goods-nolimit{text-align:center;font-size:14px;margin-top:15px;color:#490c01;}
        .goods-buy{text-align:center;margin-top:10px;}
        .goods-buy a{
            display:inline-block;width:130px;height:24px;text-align:center;line-height:24px;background:#ff5736;text-transform:uppercase;
            color:#fff;font-weight:bold;font-size:14px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a i{ margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fff;}
        .goods-buy a.coming-soon{background:#ffba00!important;}
        .goods-buy a.deal-end{background:#a3a3a3!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}

        .snipe-deal-wrap{ margin: 0 auto 50px; width: 1000px;}
        .snipe-deal-wrap .snipe-tit-wrap{ padding-top: 30px; width: 100%; height: 220px; background: url(images/demo_7/tit_img2.jpg) top center no-repeat; text-align: center;}
        .snipe-tit-wrap .tit{ height: 50px; line-height: 50px; color: #490c01; font-size: 46px; font-weight: bold;}
        .snipe-tit-wrap .tips{ margin-bottom: 55px; height: 30px; line-height: 30px; color: #000; font-size: 18px;}
        .snipe-nav{ padding-left: 85px; width: 1010px;}
        .snipe-nav li{ float: left; margin-right: 170px; display: inline-block;*display: inline;*zoom: 1; width: 164px; height: 42px; line-height: 42px; color: #fff; font-size: 18px; font-weight: bold; border-radius: 20px; text-align: center;}
        .snipe-nav li a{ display: block; color: #fff; text-decoration: none;}
        .snipe-nav li.li-1{ background: #ff5736;}
        .snipe-nav li.li-2{ background: #ffba00;}
        .snipe-nav li.li-3{ background: #a3a3a3;}
        
        .category-display-wrap{ margin: 0 auto 50px; width: 1000px;}
        .category-display-wrap{}

        .c-d-nav{ background: #fbebc0;}
        .c-d-nav li{ float: left; padding-top: 10px; width:16.66666667%; height:106px; text-align:center;}
        .c-d-nav li.on,.c-d-nav li:hover{ background:#ffe401;}
        .c-d-nav li a{ position:relative; display:block; height: 106px; color:#2d3a4b; font-size:14px; text-decoration: none;}
        .c-d-nav li a:hover{ text-decoration:none;}
        .c-d-nav li span{ display:block; height: 32px; line-height:16px;}

        .icon-wrap{ margin: 0 auto; display:block; width:80px; height:64px; background:url("images/demo_7/icon_wrap.png") no-repeat center top; *display:inline;*zoom:1;}
        .icon-sort-1{ background-position:0 0;}
        .icon-sort-2{ background-position:-100px 0;}
        .icon-sort-3{ width: 60px; background-position:-200px 0;}
        .icon-sort-4{ width: 40px; background-position:-300px 0;}
        .icon-sort-5{ background-position:-400px 0;}
        .icon-sort-6{ width: 44px; background-position:-500px 0;}
        .icon-sort-7{ width: 58px; background-position:-600px 0;}
        .icon-sort-8{ background-position:-700px 0;}
        .icon-sort-9{ width: 62px; background-position:-800px 0;}
        .icon-sort-10{ background-position:-900px 0;}
        .icon-sort-11{ background-position:-1000px 0;}
        .icon-sort-12{ background-position:-1100px 0;}

        .coupon-banner-wrap{ margin: 0 auto 50px; width: 1000px; height: 300px;
          box-shadow: 0 1px 3px -2px rgba(0,0,0,0.12),0 1px 2px rgba(0,0,0,0.24);
          -webkit-transition: 0.5s;  -moz-transition: 0.5s;  -o-transition: 0.5s;  -ms-transition: 0.5s;  transition: 0.5s;
        }
        .coupon-banner-wrap:hover{-webkit-transform: translate(0,-6px); -moz-transform: translate(0,-6px);
         box-shadow: 0 14px 28px rgba(255,255,255,0.25),0 10px 10px rgba(255,255,255,0.1);
        }
        .coupon-banner-wrap a{ display: block; width: 1000px; height: 300px;}
        .coupon-banner-wrap img{ width: 1000px; height: 300px;}

        .battle-brands-wrap{ position: relative; z-index: 1; margin: 0 auto; padding-bottom: 140px; width: 1000px; height: 250px;}

        .brands-logo-wrap{ position: absolute; z-index: 2; bottom: 10px; left: 30px; margin: 0 auto; padding-top: 40px; width: 940px; height: 160px; background: #fff; overflow: hidden;}
        .brands-logo-wrap li{ position: relative; z-index: 1; float: left; margin-bottom: 40px; width: 25%; height: 40px;}
        .brands-logo-wrap li a{ display: block; width: 100%; height: 100%;}
        .brands-logo-wrap li span{ position: relative; z-index: 3; margin: 0 auto; display: block; background: url(images/demo_7/brands_logo.png) no-repeat; text-indent: -9999px;}
        .brands-logo-wrap li .circle-bg{ position: absolute; z-index: 2; top:10px; left: 50%; margin-left: -2px; width: 4px; height: 4px; border-radius: 4px; background:rgba(255,228,1,0);}
        .brands-logo-wrap li:hover .circle-bg{
            background:rgba(255,228,1,1);
              -webkit-transform: scale(10);
                -moz-transform: scale(10);
                -o-transform: scale(10);
                -ms-transform: scale(10);
                transform: scale(10);
           -moz-transition: transform 0.3s ease-out,background 0.3s ease-out;
              -webkit-transition: transform 0.3s ease-out,background 0.3s ease-out;
              -o-transition: transform 0.3s ease-out,background 0.3s ease-out;
              transition: transform 0.3s ease-out,background 0.3s ease-out;
        }
        .brands-logo-wrap .brands-logo-1 span{ width: 38px; height: 25px; background-position: 0 0;}
        .brands-logo-wrap .brands-logo-2 span{ width: 128px; height: 21px; background-position: -150px 0;}
        .brands-logo-wrap .brands-logo-3 span{ width: 66px; height: 18px; background-position: -300px 0;}
        .brands-logo-wrap .brands-logo-4 span{ width: 53px; height: 20px; background-position: -450px 0;}
        .brands-logo-wrap .brands-logo-5 span{ width: 96px; height: 30px; background-position: 0 -50px;}
        .brands-logo-wrap .brands-logo-6 span{ width: 98px; height: 22px; background-position: -150px -50px;}
        .brands-logo-wrap .brands-logo-7 span{ width: 90px; height: 14px; background-position: -300px -50px;}
        .brands-logo-wrap .brands-logo-8 span{ width: 96px; height: 28px; background-position: -450px -50px;}

        .right-nav-bg{ background:url(images/demo_7/right_nav.png) no-repeat;}
        .right-nav-wrap{ display: none; position: fixed; top: 50px; right: 20px; width: 216px; z-index: 9999;}
        .right-nav-wrap .nav-top{ width: 216px; height: 157px; background-position: 0 0;}
        .right-nav-wrap .nav-foot .goto-top{ position: relative; z-index: 2; top: -10px; margin: 0 auto; display: block; width: 52px; height: 52px; background-position: 0 -200px;}
        .right-nav-wrap .nav-cont{ position: relative; z-index: 2; top: -10px;}
        .right-nav-wrap .nav-cont li{ margin: 0 auto 6px; width: 150px; height: 26px;}
        .right-nav-wrap .nav-cont li a{ display: block; width: 150px; height: 26px; line-height: 26px; color: #490c01; font-size: 14px; -webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; border-radius: 5px; text-align: center; background: #fef5db; text-decoration: none;}
        .right-nav-wrap .nav-cont li a:hover{ color: #fef5db; background: #490c01;}

        #popShowBox{width: 400px; padding: 20px; text-align: center; background: #fff;}
        #popShowBox .f24{font-size: 24px;}
        #popShowBox strong{font-weight: bold; color: #fe114f;}
        #popShowBox .btns a{width: 120px; height: 36px; line-height: 36px; display: block; margin-left: auto; margin-right: auto; background-color: #000; border-radius: 3px; font-size: 18px; font-weight: bold; color: #fff; text-transform: uppercase; text-decoration: none;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>


    
    <div class="todays-deal-wrap">
      <div id="fb-root"></div>
      <div class="banner"></div>

      <section class="gift-wrap js-floorTarget">
        <div class="left-box">
          <h3 class="gift-tit">FREE GIFT GAME</h3>
          <div class="share-box js-shareWrap" data-sharehref="http://www.yuanbo88.com/demo/demo_7.php">
            <a href="javascript:;" class="share-icon share-facebook js-shareFB">Facebook</a>
            <a href="javascript:;" class="share-icon share-twitter js-shareTwitt">Twitter</a>
            <a href="javascript:;" class="share-icon share-tumblr js-shareTum">Tumblr</a>
            <a href="javascript:;" class="share-icon share-google js-shareGoogle">Google+</a>
            <a href="javascript:;" class="share-icon share-reddit js-shareReddit">Reddit</a>
          </div>
          <ul class="clearfix gift-pro">
            <li><a href="#" target="special"><img src="images/demo_7/gift_1.png" alt="Today's Deal"></a></li>
            <li><a href="#" target="special"><img src="images/demo_7/gift_2.png" alt="Today's Deal"></a></li>
            <li><a href="#" target="special"><img src="images/demo_7/gift_3.png" alt="Today's Deal"></a></li>
          </ul>
        </div>
        <p class="gift-img">RULES</p>
        <div class="right-box">
          1.Dear customer,here’s a FREE GIFT game, we will randomly reward 6 LUCKY Customers with FREE GIFTS.<br/>
          2.To qualify, pay for orders on BOBO at least <strong>$40</strong> from Oct 17 to Oct 21.<br/>
             Share the activity link to your social media.<br/>
          3.The list of lucky dog will be published in our <a href="#" target="special">BOBO Blog</a> on Oct 22.<br/>
             They will also receive a notification email.<br/>
          4.BOBO reserves the right to amend the rules.<br/>
        </div>
      </section>

      <section class="new-arrival-wrap js-floorTarget">
        <h3 class="new-tit section-tit"><img src="images/demo_7/tit_img1.jpg" alt="Today's Deal"></h3>
        <div class="pro-list-wrap">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                            </a>
                        </p>
                        <p class="goods-title">
                            <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                        </p>
                        <p class="goods-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="200.99">200.99</b>
                            </span>
                        </p>
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>  
                            <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                            </a>
                        </p>
                        <p class="goods-title">
                            <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                        </p>
                        <p class="goods-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="200.99">200.99</b>
                            </span>
                        </p>
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>  
                            <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                            </a>
                        </p>
                        <p class="goods-title">
                            <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                        </p>
                        <p class="goods-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="200.99">200.99</b>
                            </span>
                        </p>
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>  
                            <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                            </a>
                        </p>
                        <p class="goods-title">
                            <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                        </p>
                        <p class="goods-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="200.99">200.99</b>
                            </span>
                        </p>
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>  
                            <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                            </a>
                        </p>
                        <p class="goods-title">
                            <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                        </p>
                        <p class="goods-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="200.99">200.99</b>
                            </span>
                        </p>
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>  
                            <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                            </a>
                        </p>
                        <p class="goods-title">
                            <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                        </p>
                        <p class="goods-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="200.99">200.99</b>
                            </span>
                        </p>
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>  
                            <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                            </a>
                        </p>
                        <p class="goods-title">
                            <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                        </p>
                        <p class="goods-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="200.99">200.99</b>
                            </span>
                        </p>
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>  
                            <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                            </a>
                        </p>
                        <p class="goods-title">
                            <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                        </p>
                        <p class="goods-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="200.99">200.99</b>
                            </span>
                        </p>
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>  
                            <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                    </li>
                </ul>
            </div>
        </div>
      </section>

      <section class="snipe-deal-wrap js-floorTarget">
        <div class="snipe-tit-wrap">
          <h3 class="tit">SNIPE THE DEALS</h3>
          <p class="tips">Every product has a quantity limit,so BE FAST,catch up the lowest price. </p>
          <ul class="clearfix snipe-nav" id="js-snipeNav">
            <li class="li-1"><a href="javascript:;">@ 9:00 UTC</a></li>
            <li class="li-2"><a href="javascript:;">@ 15:00 UTC</a></li>
            <li class="li-3"><a href="javascript:;">@ 21:00 UTC</a></li>
          </ul>
        </div>

        <div class="pro-list-wrap js-snipeProList">
            <div class="pl-box">
                <ul class="slider clearfix">
                     <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                </ul>
            </div>
        </div>

        <div class="pro-list-wrap js-snipeProList none">
            <div class="pl-box">
                <ul class="slider clearfix">
                     <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special" class="coming-soon">Coming Soon</a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special" class="coming-soon">Coming Soon</a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special" class="coming-soon">Coming Soon</a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special" class="coming-soon">Coming Soon</a></p>
                        </li>
                </ul>
            </div>
        </div>

        <div class="pro-list-wrap js-snipeProList none">
            <div class="pl-box">
                <ul class="slider clearfix">
                     <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special" class="deal-end">Deal Ended</a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special" class="deal-end">Deal Ended</a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special" class="deal-end">Deal Ended</a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special" class="deal-end">Deal Ended</a></p>
                        </li>
                </ul>
            </div>
        </div>
      </section>

      <section class="category-display-wrap js-floorTarget">
        <h3 class="category-display-tit section-tit"><img src="images/demo_7/tit_img3.jpg" alt="Today's Deal"></h3>
        
        <div class="c-d-nav-wrap">
          <ul class="c-d-nav clearfix js-cdNav">
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-4"></i><span>Phones & <br/>Mobile Accessories</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-6"></i><span>Tablets PC</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-5"></i><span>Toys & <br/>Hobbies</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-12"></i><span>Outdoors & <br/>Sports</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-10"></i><span>Computers & <br/>Networking</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-2"></i><span>Consumer <br/>Electronics</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-1"></i><span>Watches & <br/>Jewelry</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-8"></i><span>Automotive <br/>Gear</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-3"></i><span>LED Lights & <br/>Flashlights</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-7"></i><span>Electrical & <br/>Tools</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-9"></i><span>Home & <br/>Garden</span></a></li>
            <li><a href="javascript:;"><i class="icon-wrap icon-sort-11"></i><span>Stylish<br/> Apparel</span></a></li>
          </ul>
        </div>

        <div class="pro-list-wrap js-categoryDisplay">
            <div class="pl-box">
                <ul class="slider clearfix">
                     <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                         <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price">
                                <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>    
                            </p>
                            <p class="goods-price">
                                <span class="shop-price">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                            </p>
                            <p class="goods-buy"><a href="#" target="special">Buy Now <i class="inline-block"></i></a></p>
                        </li>
                </ul>
            </div>
        </div>

        <div class="pro-list-wrap none js-categoryDisplay">
            <div class="pl-box">
                <ul class="slider clearfix">
                     <li class="pr">
                            222222222222222222
                        </li>
                </ul>
            </div>
        </div>

        <div class="pro-list-wrap none js-categoryDisplay">
            <div class="pl-box">
                <ul class="slider clearfix">
                     <li class="pr">
                            33333333333333333
                        </li>
                </ul>
            </div>
        </div>

        <div class="pro-list-wrap none js-categoryDisplay">
            <div class="pl-box">
                <ul class="slider clearfix">
                     <li class="pr">
                            4444444444444444444
                        </li>
                </ul>
            </div>
        </div>
      </section>

      <p class="coupon-banner-wrap">
        <a href="#" target="special"><img src="images/demo_7/coupon.jpg" alt="Today's Deal"></a>
      </p>

      <section class="battle-brands-wrap js-floorTarget">
        <h3 class="b-b-tit section-tit"><img src="images/demo_7/tit_img4.jpg" alt="Today's Deal"></h3>
        <ul class="brands-logo-wrap">
            <li class="js-nav brands-logo-1"><a href="#" target="special"><i class="circle-bg inline-block"></i><span>1</span></a></li>
            <li class="js-nav brands-logo-2"><a href="#" target="special"><i class="circle-bg inline-block"></i><span>2</span></a></li>
            <li class="js-nav brands-logo-3"><a href="#" target="special"><i class="circle-bg inline-block"></i><span>3</span></a></li>
            <li class="js-nav brands-logo-4"><a href="#" target="special"><i class="circle-bg inline-block"></i><span>4</span></a></li>
            <li class="js-nav brands-logo-5"><a href="#" target="special"><i class="circle-bg inline-block"></i><span>5</span></a></li>
            <li class="js-nav brands-logo-6"><a href="#" target="special"><i class="circle-bg inline-block"></i><span>6</span></a></li>
            <li class="js-nav brands-logo-7"><a href="#" target="special"><i class="circle-bg inline-block"></i><span>7</span></a></li>
            <li class="js-nav brands-logo-8"><a href="#" target="special"><i class="circle-bg inline-block"></i><span>8</span></a></li>
        </ul>
      </section>


      <section class="right-nav-wrap" id="js-rightNav">
          <div class="nav-top right-nav-bg"></div>
          
          <ul class="nav-cont">
              <li><a href="javascript:;">Free Gift Game</a></li>
              <li><a href="javascript:;">New arrival stars</a></li>
              <li><a href="javascript:;">Snipe the deals</a></li>
              <li><a href="javascript:;">Category display</a></li>
              <li><a href="javascript:;">Battle of the brands</a></li>
          </ul>

          <p class="nav-foot"><a href="javascript:;" class="goto-top right-nav-bg js-goTop"></a></p>
      </section>
    </div><!-- .todays-deal-wrap -->
   


<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->


<script>
$LAB.script("")
    .wait(function(){
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "http://connect.facebook.net/en_US/all.js";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));

        $(function(){
          function limitTime(time, status){
              var seconds = time,
                  minutes = Math.floor(seconds / 60),
                  hours = Math.floor(minutes / 60),
                  days = Math.floor(hours / 24),
                  CDay = days,
                  CHour = hours % 24,
                  CMinute = minutes % 60,
                  CSecond = Math.floor(seconds % 60),
                  returnObj = {};
              if(CDay < 10) {
                  CDay = '0' + CDay;
              }
              if(CHour < 10) {
                  CHour = '0' + CHour;
              }
              if(CMinute < 10) {
                  CMinute = '0' + CMinute;
              }
              if(CSecond < 10) {
                  CSecond = '0' + CSecond;
              }

              if(status === 1 || status === 2){//start
                  returnObj = {
                      title:'ENDS IN',
                      cDay: CDay,
                      CHour: CHour,
                      CMinute: CMinute,
                      CSecond: CSecond
                  };
              }else{//not start
                  returnObj = {
                      title:'BEGINS IN',
                      cDay: CDay,
                      CHour: CHour,
                      CMinute: CMinute,
                      CSecond: CSecond
                  };
              }

              return returnObj;
          }

          (function(){
              var timeCounter = $('.js-timeCounter');
              $.each(timeCounter, function(index, val) {
                  var that = $(val);
                  var thatParents = that.closest('li');
                  var time = parseInt(that.attr('data-time'));
                  var status = parseInt(that.attr('data-status'));
                  var limitObj = {};

                  var nailInterval = setInterval(function(){
                      time--;
                      if(time > 0){
                          var preS = status === 1 ? 'Ends In:' : 'Begins In:';
                          limitObj = limitTime(time, status);
                          that.html(preS + '<span>'+ limitObj.cDay +'</span>:<span>'+ limitObj.CHour +'</span>:<span>'+ limitObj.CMinute +'</span>:<span>'+ limitObj.CSecond +'</span>');
                          status === 0 ? thatParents.find('.goods-buy a').addClass('coming-soon').html('Coming Soon') : '';
                      }else{
                          limitObj = limitTime(time, status);
                          thatParents.find('.goods-buy a').addClass('deal-end').html('Deal Ended');
                          clearInterval(nailInterval);
                      }
                  },1000);
              });
          })();

          //show hide right-nav
          $(window).scroll(function(event) {
              var $wind = $(window),
                  windScrollH = $(window).scrollTop(),
                  firstTargetTop = $('.js-floorTarget').eq(0).offset().top;
              var rightNav = $('#js-rightNav');
              if(windScrollH > firstTargetTop){
                  rightNav.show();
              }else{
                  rightNav.hide();
              }
          });

          //floor click
          $('#js-rightNav').on('click','li',function(){
              var $this = $(this);
              var index = $('#js-rightNav').find('li').index($this);
              var targetScrollH = $('.js-floorTarget').eq(index).offset().top;
              $('html,body').animate({scrollTop: targetScrollH},500); 
          });

          //goTop click
          $('#js-rightNav').on('click','.js-goTop',function(){
              $('html,body').animate({scrollTop: 0},500); 
          });

          //snipe: change tab click
          var tabWrapArr = $('#js-snipeNav');
          $.each(tabWrapArr, function(index, val) {
              var $this = $(val);
              $this.on('click','li',function(){
                  var that = $(this);
                  var index = $this.find('li').index(that);
                  that.addClass('on').siblings('li').removeClass('on');
                  $('.js-snipeProList').eq(index).show().siblings('.js-snipeProList').hide();
              });
          });

          //cdNav: tab click
          var cdNavArr = $('.js-cdNav');
          $.each(cdNavArr, function(index, val) {
              var $this = $(val);
              $this.on('click','li',function(){
                  var that = $(this);
                  var index = $this.find('li').index(that);
                  that.addClass('on').siblings('li').removeClass('on');
                  $('.js-categoryDisplay').eq(index).show().siblings('.js-categoryDisplay').hide();
              });
          });

          //share click
          //Facebook
          var shareUrl = $('.js-shareWrap').attr('data-sharehref');
          $(".js-shareFB").click(function(){
              shareDalod($(this));
          });

          //Tumblr分享
          $(".js-shareTum").click(function(){
              var that = $(this);
              shareSuc(3); //tips
              window.open("http://tumblr.com/widgets/share/tool?canonicalUrl="+ shareUrl);
          });

          //Twitter
          $(".js-shareTwitt").on('click', function(event){
              shareSuc(2); //tips
              window.open("http://twitter.com/home?status=" +encodeURIComponent('#BOBOSpringDiscount '+'\n '+ shareUrl));
          });

          //Google+
          $(".js-shareGoogle").on('click', function(event){
              shareSuc(4); //tips
              window.open("https://plus.google.com/share?url="+ shareUrl);
          });
          
          //Reddit
          $(".js-shareReddit").on('click', function(event){
              shareSuc(5); //tips
              window.open("http://www.reddit.com/submit?url="+ shareUrl);
          });

          function shareDalod(self){
              FB.ui({
                 display: 'popup',
                 method: 'share',
                 href: shareUrl,
              }, function(response){
                  if(response && !response.error_code){//if share success
                      shareSuc(1);
                  }
              });
          };

          function shareSuc(num){
              $.ajax({
                  url: 'demo.json',
                  type: 'POST',
                  dataType: 'json',
                  success: function(data){
                      if(data.status == 1){
                          var html = "";
                          html = gotShowNumHtml();

                          if(html){
                              var pageBox = $.layer({
                                  shade : [0.5 , 'hsl(0, 0%, 0%)' , true],
                                  type : 1,
                                  area : ['auto','auto'],
                                  offset : ['100px' , '50%'],
                                  title : false,
                                  border : [1, 0.8, 'hsl(0, 0%, 40%)', true],
                                  page : {html : html},
                                  close : function(index){
                                      layer.close(index);
                                  }
                              });

                              $("html,body").on("click",".js_closePopShowBox",function(){
                                  layer.close(pageBox);
                              });
                          }
                      }
                  }
              });            
          };

          function gotShowNumHtml(){
              var html ='';

              html += '<div id="popShowBox">';
              html +=     '<h4 class="fb f18 pb15">Share Success!</h4>';
              html +=     '<p class="btns"><a href="javascript:;" class="js_closePopShowBox">Ok</a></p>';
              html += '</div>';

              return html;
          }
      });
    })
</script>

</body>
</html>