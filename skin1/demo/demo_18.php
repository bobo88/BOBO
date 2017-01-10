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
        a{ text-decoration: none;}
        .icon-wrap{ display: block;}
        .icon-wrap i{ margin: 0 auto; display: inline-block; background: url(images/demo_18/icon_cate.png) no-repeat; *display: inline;*zoom:1;}
        
        .icon-erji, .icon-computer{ padding: 8px 0; height: 34px;}
        .icon-tshirt, .icon-sport{ padding: 6px 0 5px; height: 39px;}
        .icon-watch, .icon-phone, .icon-ipad{ padding: 4px 0 3px; height: 43px;}
        .icon-apple{ padding: 3px 0; height: 44px;}
        .icon-led, .icon-home{ padding: 2px 0 1px; height: 47px;}
        .icon-elr{ padding: 9px 0; height: 32px;}
        .icon-toys{ padding: 11px 0 10px; height: 29px;}

        .icon-wrap.icon-erji i{ width: 38px; height: 34px; background-position: -500px 0;}
        .icon-wrap.icon-watch i{ width: 24px; height: 43px; background-position: 0 -100px;}
        .icon-wrap.icon-apple i{ width: 14px; height: 44px; background-position: -100px -100px;}
        .icon-wrap.icon-led i{ width: 41px; height: 47px; background-position: -200px -100px;}
        .icon-wrap.icon-elr i{ width: 43px; height: 32px; background-position: -300px -100px;}
        .icon-wrap.icon-home i{ width: 28px; height: 47px; background-position: -400px -100px;}
        .icon-wrap.icon-tshirt i{ width: 43px; height: 39px; background-position: -500px -100px;}
        .icon-wrap.icon-phone i{ width: 24px; height: 43px; background-position: 0 0;}
        .icon-wrap.icon-ipad i{ width: 32px; height: 43px; background-position: -100px 0;}
        .icon-wrap.icon-toys i{ width: 43px; height: 29px; background-position: -200px 0;}
        .icon-wrap.icon-sport i{ width: 38px; height: 39px; background-position: -300px 0;}
        .icon-wrap.icon-computer i{ width: 41px; height: 34px; background-position: -400px 0;}

        .boxing-day-wrap i { font-family: 'icomoon' !important; speak: none; font-style: normal; font-weight: normal; font-variant: normal; text-transform: none; line-height: 1; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}
        .boxing-day-wrap .my_shop_price i { font-family: Arial !important;}
        .boxing-day-wrap .shopPrice i {font-weight: bold;}

        .boxing-day-wrap{ position: relative; z-index: 1; padding-bottom: 100px; width: 100%; min-width: 1100px; font-family:Arial; background: #fec107;}
        .w1100{ margin: 0 auto; width: 1100px;}
        .banner-wrap{ padding-top: 300px; width: 100%; min-width: 1100px; height: 400px; background: url(images/demo_18/banner_bg.jpg) top center no-repeat;}
        .box-gif-list{ width: 1150px;}
        .box-gif-list li{ position: relative; z-index: 1; float: left; text-align: center;}
        .box-gif-list li.box-1{ padding: 15px 0 0 10px; width: 337px;}
        .box-gif-list li.box-1 .left-hand{ top: 110px; left: 20px; z-index: -1;
            -webkit-animation:shake1 0.28s ease 0s infinite;
            -moz-animation:shake1 0.28s ease 0s infinite;
            -ms-animation:shake1 0.28s ease 0s infinite;
            animation:shake1 0.28s ease 0s infinite;
            -webkit-transform-origin:bottom right;
            -moz-transform-origin:bottom right;
            -ms-transform-origin:bottom right;
            transform-origin:bottom right;
        }
        .box-gif-list li.box-2{ padding: 15px 0 0 10px; width: 360px;}
        .box-gif-list li.box-2 a img{ position: relative;z-index: 1; top: 10px;left: -10px;
            -webkit-animation:shake2 .5s ease 0s infinite;
            -moz-animation:shake2 .5s ease 0s infinite;
            -ms-animation:shake2 .5s ease 0s infinite;
            animation:shake2 .5s ease 0s infinite;
        }
        .box-gif-list li.box-2 .box2-leg{ top: 312px; left: 160px; z-index: -1;}
        .box-gif-list li.box-3{ padding: 15px 0 0; width: 390px;}
        .box-gif-list li.box-3 .left-hand{ left: 20px; top: 80px; z-index: -1;
            -webkit-animation:shake3 0.2s ease 0s infinite;
            -moz-animation:shake3 0.2s ease 0s infinite;
            -ms-animation:shake3 0.2s ease 0s infinite;
            animation:shake3 0.2s ease 0s infinite;
            -webkit-transform-origin:bottom right;
            -moz-transform-origin:bottom right;
            -ms-transform-origin:bottom right;
            transform-origin:bottom right;
        }
        .box-gif-list li.box-3 .right-hand{ right: 21px; top: 110px; z-index: -1;
            -webkit-animation:shake4 0.2s ease 0s infinite;
            -moz-animation:shake4 0.2s ease 0s infinite;
            -ms-animation:shake4 0.2s ease 0s infinite;
            animation:shake4 0.2s ease 0s infinite;
            -webkit-transform-origin:bottom left;
            -moz-transform-origin:bottom left;
            -ms-transform-origin:bottom left;
            transform-origin:bottom left;
        }
        @-webkit-keyframes shake1{
            0%{ -webkit-transform: rotate(-30deg);}
            50%{ -webkit-transform: rotate(0deg);}
            100%{ -webkit-transform: rotate(-30deg);}
        }
        @-moz-keyframes shake1{
            0%{ -moz-transform: rotate(-30deg);}
            50%{ -moz-transform: rotate(0deg);}
            100%{ -moz-transform: rotate(-30deg);}
        }
        @-ms-keyframes shake1{
            0%{ -ms-transform: rotate(-30deg);}
            50%{ -ms-transform: rotate(0deg);}
            100%{ -ms-transform: rotate(-30deg);}
        }

        @-webkit-keyframes shake2{
            0%{ -webkit-transform: rotate(-15deg);}
            50%{ -webkit-transform: rotate(0deg);}
            100%{ -webkit-transform: rotate(-15deg);}
        }
        @-moz-keyframes shake2{
            0%{ -moz-transform: rotate(-15deg);}
            50%{ -moz-transform: rotate(0deg);}
            100%{ -moz-transform: rotate(-15deg);}
        }
        @-ms-keyframes shake2{
            0%{ -ms-transform: rotate(-15deg);}
            50%{ -ms-transform: rotate(0deg);}
            100%{ -ms-transform: rotate(-15deg);}
        }

        @-webkit-keyframes shake3{
            0%{ -webkit-transform: rotate(-15deg);}
            50%{ -webkit-transform: rotate(0deg);}
            100%{ -webkit-transform: rotate(-15deg);}
        }
        @-moz-keyframes shake3{
            0%{ -moz-transform: rotate(-15deg);}
            50%{ -moz-transform: rotate(0deg);}
            100%{ -moz-transform: rotate(-15deg);}
        }
        @-ms-keyframes shake3{
            0%{ -ms-transform: rotate(-15deg);}
            50%{ -ms-transform: rotate(0deg);}
            100%{ -ms-transform: rotate(-15deg);}
        }

        @-webkit-keyframes shake4{
            0%{ -webkit-transform: rotate(15deg);}
            50%{ -webkit-transform: rotate(0deg);}
            100%{ -webkit-transform: rotate(15deg);}
        }
        @-moz-keyframes shake4{
            0%{ -moz-transform: rotate(15deg);}
            50%{ -moz-transform: rotate(0deg);}
            100%{ -moz-transform: rotate(15deg);}
        }
        @-ms-keyframes shake4{
            0%{ -ms-transform: rotate(15deg);}
            50%{ -ms-transform: rotate(0deg);}
            100%{ -ms-transform: rotate(15deg);}
        }

        .box-gif-list li a{}
        .box-gif-list li .box-tips{ position: absolute; z-index: 2; color: #0ec3ff; font-size: 20px; font-weight: bold;}
        .box-gif-list li .box-1-tips{ top: 70px; left: -20px; -webkit-transform: rotate(-20deg); -moz-transform: rotate(-20deg); transform: rotate(-20deg); opacity: 0;
            -webkit-animation:fontsizeChange 1.2s ease 0s infinite;
            -moz-animation:fontsizeChange 1.2s ease 0s infinite;
            -ms-animation:fontsizeChange 1.2s ease 0s infinite;
            animation:fontsizeChange 1.2s ease 0s infinite;
        }
        .box-gif-list li .box-2-tips{ top: 50px; left: 10px; -webkit-transform: rotate(-20deg); -moz-transform: rotate(-20deg); transform: rotate(-20deg); opacity: 0;
            -webkit-animation:fontsizeChange 1.2s ease 1s infinite;
            -moz-animation:fontsizeChange 1.2s ease 1s infinite;
            -ms-animation:fontsizeChange 1.2s ease 1s infinite;
            animation:fontsizeChange 1.2s ease 1s infinite;
        }
        .box-gif-list li .box-3-tips{ top: 60px; right: -20px; -webkit-transform: rotate(20deg); -moz-transform: rotate(20deg); transform: rotate(20deg); opacity: 0;
            -webkit-animation:fontsizeChange2 1.2s ease 2.5s infinite;
            -moz-animation:fontsizeChange2 1.2s ease 2.5s infinite;
            -ms-animation:fontsizeChange2 1.2s ease 2.5s infinite;
            animation:fontsizeChange2 1.2s ease 2.5s infinite;
        }

        @-webkit-keyframes fontsizeChange{
            0%{ -webkit-transform: rotate(-20deg) scale(1); opacity: 0;}
            50%{ -webkit-transform: rotate(-20deg) scale(1.4); opacity: 1;}
            100%{ -webkit-transform: rotate(-20deg) scale(1); opacity: 0;}
        }
        @-moz-keyframes fontsizeChange{
            0%{ -moz-transform: rotate(-20deg) scale(1); opacity: 0;}
            50%{ -moz-transform: rotate(-20deg) scale(1.4); opacity: 1;}
            100%{ -moz-transform: rotate(-20deg) scale(1); opacity: 0;}
        }
        @-ms-keyframes fontsizeChange{
            0%{ -ms-transform: rotate(-20deg) scale(1); opacity: 0;}
            50%{ -ms-transform: rotate(-20deg) scale(1.4); opacity: 1;}
            100%{ -ms-transform: rotate(-20deg) scale(1); opacity: 0;}
        }

        @-webkit-keyframes fontsizeChange2{
            0%{ -webkit-transform: rotate(20deg) scale(1); opacity: 0;}
            50%{ -webkit-transform: rotate(20deg) scale(1.4); opacity: 1;}
            100%{ -webkit-transform: rotate(20deg) scale(1); opacity: 0;}
        }
        @-moz-keyframes fontsizeChange2{
            0%{ -moz-transform: rotate(-20deg) scale(1); opacity: 0;}
            50%{ -moz-transform: rotate(-20deg) scale(1.4); opacity: 1;}
            100%{ -moz-transform: rotate(-20deg) scale(1); opacity: 0;}
        }
        @-ms-keyframes fontsizeChange2{
            0%{ -ms-transform: rotate(-20deg) scale(1); opacity: 0;}
            50%{ -ms-transform: rotate(-20deg) scale(1.4); opacity: 1;}
            100%{ -ms-transform: rotate(-20deg) scale(1); opacity: 0;}
        }
        
        .pro-list-wrap{ width: 1060px;}
        .pro-list-wrap li{ float: left; width: 260px; margin-right: 4px; margin-bottom: 16px; background-color: #fff; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pro-list-wrap li:hover{
            -webkit-transform: translate(0,-5px);
            -moz-transform: translate(0,-5px);
        }
        .goods-time{height:30px; color:#fff;font-size:14px;background-color:#524498;text-align:center;}
        .goods-time span{display:inline-block;vertical-align:middle;height:30px;line-height:30px;padding:0 5px;}

        .goods-img{width:170px;height:170px;margin:0 auto; padding: 5px 0; border-bottom: 1px solid #e7dfb5;}
        .goods-img a{display:block;width:170px;height:170px;overflow:hidden; text-align: center;}
        .goods-img img{height:170px;width:auto;display:inline;vertical-align:top;}

        .goods-title{font-size:14px;width:210px;margin:auto;height:32px;line-height:16px;overflow:hidden;text-align:center;margin-top:10px;}
        .goods-title a{color:#524498; text-decoration: none;}
        .goods-title a:hover{text-decoration: underline;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#b1b0b4;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#ff1627;font-size:22px; font-weight: bold;}

        .goods-limit{width:200px;margin:5px auto 0;height:50px;position:relative;}
        .goods-limit .market-price{ color: #b1b0b4; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#fec107;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #524498;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .goods-limit-tips{
            position:absolute;left:0;top:-30px;width:95px; height:20px;font:normal 12px/20px Arial; color: #524498;
            background:#fff;border:1px solid #524498;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-limit-tips b{color:#524498;padding-right:5px;}
        .goods-limit-tips em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .goods-limit-tips em.tri_bd{border-color:#524498 transparent transparent transparent;bottom:-11px;z-index:1;}
        .goods-limit-tips em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}
        .goods-nolimit{text-align:center;font-size:14px;margin-top:15px;color:#987643;}
        .goods-buy{text-align:center;margin-top:10px;}
        .goods-buy a{
            display:inline-block;width:130px;height:24px;text-align:center;line-height:24px;background:#524498;text-transform:uppercase;
            color:#fff;font-weight:bold;font-size:14px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a i{ display: inline-block; *display: inline; *zoom: 1; margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fff;}
        .goods-buy a.coming-soon{background:#efb202!important;}
        .goods-buy a.deal-end{ color: #fff; background:#b7b7b3!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}

        .pro-list-wrap .toCart { position: absolute; bottom: 0; right: 0; width: 47px; height: 47px; display: inline-block; vertical-align: bottom; background: no-repeat; background-size: cover; float: right; overflow: hidden; cursor: pointer;}
        .pro-list-wrap .toCart:hover:before { width: 150%; height: 150%; background: #ffe432;}
        .pro-list-wrap .toCart:before { content: ''; position: absolute; background: #ffe432; border-radius: 50%; width: 200%; height: 200%; left: 0; top: 0; -webkit-transition: all .2s ease-in-out; transition: all .2s ease-in-out }
        .pro-list-wrap .toCart:after { content: url(images/demo_18/cart4.png); width: 47px; height: 47px; position: absolute; left: 2px; top: 0;}

        .border-wrap{ padding-bottom: 12px; border: 1px solid #c9c9c9;}

        .rule-tips{ margin: 0 auto 25px; padding: 13px 0; width: 1000px; height: 60px; line-height: 30px; color: #ca1919; font-size: 16px; background: #ffd900; text-align: center;}

        .best-gift-ever-wrap{}
        .best-gift-ever-wrap .tit{ position: relative; z-index: 1; width: 100%; height: 72px; line-height: 72px; color: #fff; font-size: 38px; text-align: center; background: url(images/demo_18/gift_tit_bg.png) top center no-repeat;}
        .best-gift-ever-wrap .tit .snowing{ position: absolute; z-index: 2;top: 0; left: 150px; display: block; width: 800px; height: 72px; background: url(images/demo_18/snowing72.gif) top center no-repeat;}
        .best-gift-ever-wrap .tit .tit-txt{ position: relative; z-index: 3;}
        .best-gift-pro-box{ padding: 25px 25px 10px; background: #ef3e36; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}

        .category-display-wrap{}
        .category-display-wrap .tit{ padding-top: 199px; width: 100%; height: 60px; line-height: 60px; color: #fff; font-size: 38px; text-align: center; background: url(images/demo_18/cate_display_tit_yellow.gif) bottom center no-repeat;}
        .cate-display-box{ padding: 25px 25px 10px; background: #ef3e36; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}

        .cate-sort-wrap{ position: relative; z-index: 1; margin: 0 auto; width: 1124px;}
        .prolist-redbg{ position: relative; z-index: 1; width: 1060px;}
        .prolist-redbg .pro-list-wrap li{ margin-bottom: 9px; height: 380px; background: #ff9000;}
        .prolist-redbg .pro-list-wrap li .goods-img{ padding: 20px 0; width: 100%; height: 200px; background: #fff;}
        .prolist-redbg .pro-list-wrap li .goods-img a{ margin: 0 auto; height: 200px;}
        .prolist-redbg .pro-list-wrap li .goods-img a img{ height: 200px;}
        .prolist-redbg .pro-list-wrap li .goods-title{ height: 16px; line-height: 16px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #fff;}
        .prolist-redbg .pro-list-wrap li .goods-title a{ color: #fff;}
        .prolist-redbg .pro-list-wrap li .market-price{ display: block; padding-bottom: 10px; color: #fff;}
        .prolist-redbg .pro-list-wrap li .shop-price{ color: #ffe372;}
        .prolist-redbg .pro-list-wrap li .goods-buy a{ width: 140px; color: #e92a2a; background: #ffe372;}

        .cate-sort-nav{ margin-bottom: 10px; padding: 20px 21px; width: 1008px; background: #fff;}
        .category { font-size: 0; width: 1008px; margin: auto;}
        .category span { position: relative; z-index: 1; margin-right: 2px; margin-bottom: 10px; display: inline-block; width: 166px; height: 80px; color: #333; font-size: 14px; text-align: center; cursor: pointer;}
        .category span.active, .category span:hover { background: #fff; -webkit-box-shadow: 0 6px 10px rgba(102,102,102,.5); -moz-box-shadow: 0 6px 10px rgba(102,102,102,.5); box-shadow: 0 6px 10px rgba(102,102,102,.5);}
        
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>
    
    <div class="boxing-day-wrap">
        <div class="banner-wrap">
            <div class="w1100">
                <ul class="box-gif-list clearfix">
                    <li class="box-1">
                        <span class="box-tips box-1-tips">Look here!</span>
                        <a href="javascript:;"><img src="images/demo_18/box_1.png" width="335" alt="Boxing Day"></a>
                        <span class="left-hand pa"><img src="images/demo_18/box_1_lefthand.png" width="53" alt="Boxing Day"></span>
                    </li>
                    <li class="box-2">
                        <span class="box-tips box-2-tips">Hi~baby~</span>
                        <a href="javascript:;"><img src="images/demo_18/box_2.png" width="330" alt="Boxing Day"></a>
                        <span class="box2-leg pa"><img src="images/demo_18/box_2_leg.png" width="80" alt="Boxing Day"></span>
                    </li>
                    <li class="box-3">
                        <span class="box-tips box-3-tips">Click me!</span>
                        <span class="left-hand pa"><img src="images/demo_18/box_3_lefthand.png" width="50" alt="Boxing Day"></span>
                        <a href="javascript:;"><img src="images/demo_18/box_3.png" width="368" alt="Boxing Day"></a>
                        <span class="right-hand pa"><img src="images/demo_18/box_3_righthand.png" width="83" alt="Boxing Day"></span>
                    </li>
                </ul>
            </div>
        </div><!-- .banner-wrap -->

        <div class="rule-tips">
            <p>
                Rules: 1. Click the gift boxes to win coupons!<br/>
                2.Share this event to your friends to win one more chance to open boxes!
            </p>
        </div>

        <section class="best-gift-ever-wrap w1100">
            <h3 class="tit"><span class="snowing"></span><span class="tit-txt">BEST GIFTS EVER</span></h3>
            <div class="best-gift-pro-box">
                <ul class="clearfix prolist pro-list-wrap">
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <div class="border-wrap">
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
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
                        </div>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <div class="border-wrap">
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
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
                        </div>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="2">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <div class="border-wrap">
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
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
                        </div>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <div class="border-wrap">
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
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
                        </div>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <div class="border-wrap">
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
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
                        </div>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <div class="border-wrap">
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
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
                        </div>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <div class="border-wrap">
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
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
                        </div>
                    </li>
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <div class="border-wrap">
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
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
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="category-display-wrap w1100">
            <h3 class="tit"><span>CATEGORY DISPLAY</span></h3>

            <div class="cate-display-box">
                <div class="cate-sort-nav js-sortNav">
                    <div class="clearfix category">
                        <span class="js-navItem"><em class="icon-wrap icon-phone"><i></i></em> Mobile Phones</span>
                        <span class="js-navItem"><em class="icon-wrap icon-ipad"><i></i></em>Tablet PC & Accessories </span>
                        <span class="js-navItem"><em class="icon-wrap icon-toys"><i></i></em>Toys & Hobbies</span>
                        <span class="js-navItem"><em class="icon-wrap icon-sport"><i></i></em>Outdoors & Sports</span>
                        <span class="js-navItem"><em class="icon-wrap icon-computer"><i></i></em>Computers & Networking</span>
                        <span class="js-navItem"><em class="icon-wrap icon-erji"><i></i></em>Consumer Electronics</span>

                        <span class="js-navItem"><em class="icon-wrap icon-watch"><i></i></em>Watches & Jewelry</span>
                        <span class="js-navItem"><em class="icon-wrap icon-apple"><i></i></em>Apple Accessories</span>
                        <span class="js-navItem"><em class="icon-wrap icon-led"><i></i></em>Lights & Flashlights</span>
                        <span class="js-navItem"><em class="icon-wrap icon-elr"><i></i></em>Electrical & Tools</span>
                        <span class="js-navItem"><em class="icon-wrap icon-home"><i></i></em>Home & Garden</span>
                        <span class="js-navItem"><em class="icon-wrap icon-tshirt"><i></i></em>Apparel</span>
                    </div>
                </div>
                
                <div class="prolist-redbg js-sortItem">
                    <ul class="clearfix pro-list-wrap">
                        <li class="pr">
                            <div>
                                <p class="goods-img pr">
                                    <a href="#" target="special">
                                        <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
                                    </a>
                                </p>
                                <p class="goods-title">
                                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                                </p>
                                <p class="goods-price">
                                    <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                                    <span class="shop-price">
                                        <b class="bizhong">$</b>
                                        <b class="my_shop_price" orgp="200.99">200.99</b>
                                    </span>
                                </p>             

                                <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <div>
                                <p class="goods-img pr">
                                    <a href="#" target="special">
                                        <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
                                    </a>
                                </p>
                                <p class="goods-title">
                                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                                </p>
                                <p class="goods-price">
                                    <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                                    <span class="shop-price">
                                        <b class="bizhong">$</b>
                                        <b class="my_shop_price" orgp="200.99">200.99</b>
                                    </span>
                                </p>             

                                <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <div>
                                <p class="goods-img pr">
                                    <a href="#" target="special">
                                        <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
                                    </a>
                                </p>
                                <p class="goods-title">
                                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                                </p>
                                <p class="goods-price">
                                    <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                                    <span class="shop-price">
                                        <b class="bizhong">$</b>
                                        <b class="my_shop_price" orgp="200.99">200.99</b>
                                    </span>
                                </p>             

                                <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <div>
                                <p class="goods-img pr">
                                    <a href="#" target="special">
                                        <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
                                    </a>
                                </p>
                                <p class="goods-title">
                                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                                </p>
                                <p class="goods-price">
                                    <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                                    <span class="shop-price">
                                        <b class="bizhong">$</b>
                                        <b class="my_shop_price" orgp="200.99">200.99</b>
                                    </span>
                                </p>             

                                <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <div>
                                <p class="goods-img pr">
                                    <a href="#" target="special">
                                        <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
                                    </a>
                                </p>
                                <p class="goods-title">
                                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                                </p>
                                <p class="goods-price">
                                    <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                                    <span class="shop-price">
                                        <b class="bizhong">$</b>
                                        <b class="my_shop_price" orgp="200.99">200.99</b>
                                    </span>
                                </p>             

                                <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <div>
                                <p class="goods-img pr">
                                    <a href="#" target="special">
                                        <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
                                    </a>
                                </p>
                                <p class="goods-title">
                                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                                </p>
                                <p class="goods-price">
                                    <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                                    <span class="shop-price">
                                        <b class="bizhong">$</b>
                                        <b class="my_shop_price" orgp="200.99">200.99</b>
                                    </span>
                                </p>             

                                <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <div>
                                <p class="goods-img pr">
                                    <a href="#" target="special">
                                        <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
                                    </a>
                                </p>
                                <p class="goods-title">
                                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                                </p>
                                <p class="goods-price">
                                    <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                                    <span class="shop-price">
                                        <b class="bizhong">$</b>
                                        <b class="my_shop_price" orgp="200.99">200.99</b>
                                    </span>
                                </p>             

                                <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <div>
                                <p class="goods-img pr">
                                    <a href="#" target="special">
                                        <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg">
                                    </a>
                                </p>
                                <p class="goods-title">
                                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                                </p>
                                <p class="goods-price">
                                    <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                                    <span class="shop-price">
                                        <b class="bizhong">$</b>
                                        <b class="my_shop_price" orgp="200.99">200.99</b>
                                    </span>
                                </p>             

                                <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .cate-display-box -->
        </section>




    </div><!-- .boxing-day-wrap -->

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->

<script>
$LAB.script("")
    .wait(function(){
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

             if(status === 1){//start
                 returnObj = {
                     title:'PROMO ENDS IN:',
                     cDay: CDay,
                     CHour: CHour,
                     CMinute: CMinute,
                     CSecond: CSecond
                 };
             }else{//not start
                 returnObj = {
                     title:'PROMO BEGINS IN:',
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
                        // thatParents.find('.sold-out').show();
                        clearInterval(nailInterval);
                    }
                },1000);
            });
        })();

        $('.js-sortNav').on('click', '.js-navItem', function(){
            var that = $(this);
            var thatParents = that.parents('.js-sortNav');
            var index = thatParents.find('.js-navItem').index(that);
            that.addClass('active').siblings('.js-navItem').removeClass('active');

            thatParents.siblings('.js-sortItem').eq(index).show().siblings('.js-sortItem').hide();
        });
    })
</script>

</body>
</html>