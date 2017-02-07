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
        b{ font-weight: normal;}
        .bizhong{ display: none;}
        @-webkit-keyframes shake1{
            0%{ -webkit-transform: rotate(-20deg);}
            50%{ -webkit-transform: rotate(0deg);}
            100%{ -webkit-transform: rotate(-20deg);}
        }
        @-moz-keyframes shake1{
            0%{ -moz-transform: rotate(-20deg);}
            50%{ -moz-transform: rotate(0deg);}
            100%{ -moz-transform: rotate(-20deg);}
        }
        @-ms-keyframes shake1{
            0%{ -ms-transform: rotate(-20deg);}
            50%{ -ms-transform: rotate(0deg);}
            100%{ -ms-transform: rotate(-20deg);}
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
            0%{ -webkit-transform: translateY(10px);}
            50%{ -webkit-transform: translateY(0);}
            100%{ -webkit-transform: translateY(10px);}
        }
        @-moz-keyframes shake3{
            0%{ -moz-transform: translateY(10px);}
            50%{ -moz-transform: translateY(0);}
            100%{ -moz-transform: translateY(10px);}
        }
        @-ms-keyframes shake3{
            0%{ -ms-transform: translateY(10px);}
            50%{ -ms-transform: translateY(0);}
            100%{ -ms-transform: translateY(10px);}
        }

        @-webkit-keyframes shake4{
            0%{ -webkit-transform: scale(1.1);}
            50%{ -webkit-transform: scale(1);}
            100%{ -webkit-transform: scale(1.1);}
        }
        @-moz-keyframes shake4{
            0%{ -moz-transform: scale(1.1);}
            50%{ -moz-transform: scale(1);}
            100%{ -moz-transform: scale(1.1);}
        }
        @-ms-keyframes shake4{
            0%{ -ms-transform: scale(1.1);}
            50%{ -ms-transform: scale(1);}
            100%{ -ms-transform: scale(1.1);}
        }
        
        .anniversary-3-wrap{ width: 100%; min-width: 1000px; font-family: Arial; font-size: 12px; background: #e9e9e9;}
        .banner-wrap{ width: 100%; min-width: 1000px; height: 822px; background: url('images/demo_24/banner_bg.jpg') top center no-repeat;}
        .banner-box{ position: relative; z-index: 1; margin: 0 auto; padding-top: 465px; width: 1000px; height: 358px;}
        .num3, .rd, .note-1, .note-2, .note-3, .note-4, .top-limit-time-wrap{ position: absolute; z-index: 2; display: inline-block;*display: inline;*zoom:1;}
        .num3{ top: -1000px; left: 310px; opacity: 0;}
        .rd{ top: -1000px; left: 610px; opacity: 0;}
        .note-1{ display: none; top: 115px; left: 110px;
            -webkit-animation:shake1 1s ease 0s infinite;
            -moz-animation:shake1 1s ease 0s infinite;
            -ms-animation:shake1 1s ease 0s infinite;
            animation:shake1 1s ease 0s infinite;
            -webkit-transform-origin:top left;
            -moz-transform-origin:top left;
            -ms-transform-origin:top left;
            transform-origin:top left;
        }
        .note-2{ display: none; top: 275px; left: 270px;
            -webkit-animation:shake2 0.28s ease 0s infinite;
            -moz-animation:shake2 0.28s ease 0s infinite;
            -ms-animation:shake2 0.28s ease 0s infinite;
            animation:shake2 0.28s ease 0s infinite;
        }
        .note-3{ display: none; top: 310px; left: 700px;
            -webkit-animation:shake3 0.5s ease 0s infinite;
            -moz-animation:shake3 0.5s ease 0s infinite;
            -ms-animation:shake3 0.5s ease 0s infinite;
            animation:shake3 0.5s ease 0s infinite;
        }
        .note-4{ display: none; top: 340px; left: 750px;
            -webkit-animation:shake4 0.2s ease 0s infinite;
            -moz-animation:shake4 0.2s ease 0s infinite;
            -ms-animation:shake4 0.2s ease 0s infinite;
            animation:shake4 0.2s ease 0s infinite;
        }
        .top-limit-time-wrap{ top: 194px; right: -30px; width: 260px; height: 92px; background: url('images/demo_24/limit_bg.png') bottom center no-repeat;}
        .top-limit-time-wrap p{ padding: 22px 0 0 50px; height: 70px; line-height: 70px; color: #ffeac0; font-size: 14px; font-weight: bold;}
        .top-limit-time-wrap strong{ margin-left: 8px; font-size: 26px;}
        
        .marquee-wrap{ margin: 0 auto 15px; padding-top: 18px; width: 498px; height: 46px; background: url('images/demo_24/marquee_bg.png') top center no-repeat;}
        .marquee-box{ height: 46px; overflow: hidden;}
        .marquee-box a{ display: block; width: 100%; height: 46px; line-height: 46px; color: #eae1b0; font-size: 14px; text-decoration: none; text-align: center;}
        .marquee-box a:hover{ text-decoration: underline;}

        .get-coupon-list{ padding: 0 100px; width: 800px; height: 192px;}
        .get-coupon-list li{ position: relative; z-index: 1; float: left; padding: 20px 10px 0 20px; width: 155px; height: 182px; margin-left: 5px; background: url('images/demo_24/getcoupon_bg.png') top center no-repeat;-webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .get-coupon-list li:hover{
            -webkit-transform: translate(0,12px);
            -moz-transform: translate(0,12px);
        }
        .coupon-value{ height: 30px; line-height: 30px; color: #bd0900; font-size: 28px; font-weight: bold;}
        .coupon-scope{ height: 24px; line-height: 24px; color: #bd0900; font-size: 14px; font-weight: bold;}
        .coupon-country,.coupon-use-time{ height: 20px; line-height: 20px; color: #32373e; font-size: 14px;}
        .get-coupon-btn{ margin-top: 5px; width: 126px; height: 26px;}
        .get-coupon-btn a{ display: block; width: 100%; height: 26px; line-height: 26px; color: #dcd3b0; font-size: 14px; -webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px; text-align: center;}
        .get-coupon-btn .is-ok{ background: #bd0900;}
        .get-coupon-btn .is-received{ color: #f4eccb; background: #c1a551;}
        .get-coupon-btn .is-alltoken{ background: #878787;}
        .get-coupon-btn .is-expired{ color: #f2f1eb; background: #bebcb1;}


        .pro-list-wrap li{ float: left; width: 215px; margin-right: 6px; margin-bottom: 8px; background-color: #fff; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pro-list-wrap li:hover{
            -webkit-transform: translate(0,-5px);
            -moz-transform: translate(0,-5px);
        }
        .goods-time{height:30px; color:#fff;font-size:14px;background-color:#171717;text-align:center;}
        .goods-time span{display:inline-block;vertical-align:middle;height:30px;line-height:30px;padding:0 5px;}

        .goods-img{width:170px;height:170px;margin:0 auto; padding: 5px 0; border-bottom: 1px solid #e7dfb5;}
        .goods-img a{display:block;width:170px;height:170px;overflow:hidden; text-align: center;}
        .goods-img img{height:170px;width:auto;display:inline;vertical-align:top;}

        .goods-title{font-size:14px;width:210px;margin:auto;height:32px;line-height:16px;overflow:hidden;text-align:center;margin-top:10px;}
        .goods-title a{color:#333; text-decoration: none;}
        .goods-title a:hover{text-decoration: underline;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#b1b0b4;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#ff6035;font-size:22px; font-weight: bold;}

        .goods-limit{width:200px;margin:5px auto 0;height:50px;position:relative;}
        .goods-limit .market-price{ color: #b1b0b4; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#e7e7e7;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #d8c17d;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .goods-limit-tips{
            position:absolute;left:0;top:-30px;width:95px; height:20px;font:normal 12px/20px Arial;
            background:#fff;border:1px solid #000;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-limit-tips b{color:#000;padding-right:5px;}
        .goods-limit-tips em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .goods-limit-tips em.tri_bd{border-color:#000 transparent transparent transparent;bottom:-11px;z-index:1;}
        .goods-limit-tips em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}
        .goods-nolimit{text-align:center;font-size:14px;margin-top:15px;color:#987643;}
        .goods-buy{text-align:center;margin-top:10px;}
        .goods-buy a{
            display:inline-block;width:130px;height:24px;text-align:center;line-height:24px;background:#bd0900;text-transform:uppercase;
            color:#fff;font-weight:bold;font-size:14px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a i{ display: inline-block; *display: inline; *zoom: 1; margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fff;}
        .goods-buy a.coming-soon{background:#efb202!important;}
        .goods-buy a.deal-end{ color: #fff; background:#b7b7b3!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}

        .pro-list-wrap .toCart { width: 47px; height: 47px; display: inline-block; vertical-align: bottom; background: no-repeat; background-size: cover; float: right; position: relative; overflow: hidden; cursor: pointer }
        .pro-list-wrap .toCart:hover:before { width: 150%; height: 150%; background: #f9e8b6;}
        .pro-list-wrap .toCart:before { content: ''; position: absolute; background: #f9e8b6; border-radius: 50%; width: 200%; height: 200%; left: 0; top: 0; -webkit-transition: all .2s ease-in-out; transition: all .2s ease-in-out }
        .pro-list-wrap .toCart:after { content: url('images/demo_24/cart.png'); width: 47px; height: 47px; position: absolute; left: 2px; top: 0 }

        
        .flash-deals-wrap{ width: 100%; height: 1041px; background: url('images/demo_24/bg1.jpg') top center no-repeat;}
    
        .deals-wrap{ margin: 0 auto; padding-top: 66px; width: 1080px;}
        .deals-list-box{ position: relative; z-index: 1; padding: 20px 40px; width: 1000px; border-top: 23px solid #6d4c29; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background: #faefb3;}
        .deals-list-box .prolist{ width: 1000px;}
        .deals-list-box .prolist li{ float: left; margin-right: 5px; margin-bottom: 20px; width: 245px; height: 390px; background: #fff;}
        .deals-list-box .prolist li .toCart{ position: absolute; bottom: 0; right: 0;}
        .deals-nav{ position: absolute; z-index: 2; top: -86px; left: 50px; width: 1000px;}
        .deals-nav li{ float: left; margin-top: 16px; width: 500px; height: 70px; background: url('images/demo_24/deal_tit.png') bottom center no-repeat; text-align: center; cursor: pointer;}
        .deals-nav li p{ padding-top: 10px; height: 30px; line-height: 30px; color: #d8c17d; font-size: 20px;}
        .deals-nav li span{ display: block; height: 24px; line-height: 24px; color: #d8c17d; font-size: 16px;}
        .deals-nav li.active{ margin-top: 0; padding-top: 16px; background: url('images/demo_24/deal_tit_hover.png') no-repeat;}
        .deals-nav li.active p{ padding-top: 0; color: #bd0900; font-size: 24px; font-weight: bold;}
        .deals-nav li.active span{ margin: 0 auto; width: 230px; color: #fef4d6; font-size: 18px; background: #bd0900;}

    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>
    
    <section class="anniversary-3-wrap">
        <!--Banner section -->
        <section class="banner-wrap">
            <div class="banner-box">
                <span class="num3 js-num3"><img src="images/demo_24/num3.png" alt="Anniversary 3rd"></span>
                <span class="rd js-rd"><img src="images/demo_24/rd.png" alt="Anniversary 3rd"></span>
                <span class="note-1 js-note"><img src="images/demo_24/note_1.png" alt="Anniversary 3rd"></span>
                <span class="note-2 js-note"><img src="images/demo_24/note_2.png" alt="Anniversary 3rd"></span>
                <span class="note-3 js-note"><img src="images/demo_24/note_3.png" alt="Anniversary 3rd"></span>
                <span class="note-4 js-note"><img src="images/demo_24/note_4.png" alt="Anniversary 3rd"></span>
                <div class="top-limit-time-wrap">
                    <p class="time-num js-topLimitTime" data-time="10000" data-status="0">
                        <strong>00</strong>D<strong>00</strong>H<strong>00</strong>M<strong>00</strong>S
                    </p>
                </div><!-- .top-limit-time-wrap -->
                
                <div class="marquee-wrap">
                    <div class="marquee-box" id="js_infoBox">
                        <ul>
                            <li><p><a href="#">FuriBee F36 2.4GHz 4CH 6 BOBO Gyro RC Quadcopter</a></p></li>
                            <li><p><a href="#">FuriBee F36 2.BOBO 4CH 6 BO Gyro RC Quadcopter</a></p></li>
                            <li><p><a href="#">FuriBee F36 2.4GHz 4CH 6 HaHa Gyro BOBO Quadcopter</a></p></li>
                            <li><p><a href="#">FuriBee BOBO 2.4GHz 4CH 6 Axis BOBO RC Quadcopter</a></p></li>
                        </ul> 
                    </div>
                </div><!-- .marquee-wrap -->

                <ul class="get-coupon-list clearfix">
                    <li>
                        <p class="coupon-value">50%</p>
                        <p class="coupon-scope">SMART WATCHES</p>
                        <p class="coupon-country">HK,HK-2,China</p>
                        <p class="coupon-use-time">12/31/2016-12/31/2016</p>
                        <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                    </li>
                    <li>
                        <p class="coupon-value">50%</p>
                        <p class="coupon-scope">SMART WATCHES</p>
                        <p class="coupon-country">HK,HK-2,China</p>
                        <p class="coupon-use-time">12/31/2016-12/31/2016</p>
                        <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">Discover Deals</a></p>
                    </li>
                    <li>
                        <p class="coupon-value">50%</p>
                        <p class="coupon-scope">SMART WATCHES</p>
                        <p class="coupon-country">HK,HK-2,China</p>
                        <p class="coupon-use-time">12/31/2016-12/31/2016</p>
                        <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Discover Deals</a></p>
                    </li>
                    <li>
                        <p class="coupon-value">50%</p>
                        <p class="coupon-scope">SMART WATCHES</p>
                        <p class="coupon-country">HK,HK-2,China</p>
                        <p class="coupon-use-time">12/31/2016-12/31/2016</p>
                        <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Discover Deals</a></p>
                    </li>
                </ul><!-- .get-coupon-list -->
            </div>
        </section><!-- .banner-wrap -->

        <!-- Flash sale section -->
        <section class="flash-deals-wrap">
            <div class="deals-wrap">
                <div class="deals-list-box">
                    <ul class="deals-nav clearfix js-sortNav">
                        <li class="active js-navItem">
                            <p>PROMO ENDS IN:</p>
                            <span data-time="12588" data-status="1" class="js-switchTabTime">Over 3Days 1 hour</span>
                        </li>
                        <li class="js-navItem">
                            <p>PROMO ENDS IN:</p>
                            <span data-time="214740" data-status="2" class="js-switchTabTime">00:00:00</span>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem">
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
                              <a href="javascript:;" class="toCart"></a>
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
                              <a href="javascript:;" class="toCart"></a>
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
                              <a href="javascript:;" class="toCart"></a>
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
                              <a href="javascript:;" class="toCart"></a>
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
                              <a href="javascript:;" class="toCart"></a>
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
                              <a href="javascript:;" class="toCart"></a>
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
                              <a href="javascript:;" class="toCart"></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem none">
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_4.jpg">
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_4.jpg">
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="2">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_4.jpg">
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_4.jpg">
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_4.jpg">
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_4.jpg">
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_4.jpg">
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_4.jpg">
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section><!-- .flash-deals-wrap -->



    </section><!-- .anniversary-3-wrap -->
    

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->

<script type="text/javascript">
    !function(a){a.fn.kxbdSuperMarquee=function(b){var c=a.extend({},a.fn.kxbdSuperMarquee.defaults,b);return this.each(function(){function D(){var a="left"==c.direction||"right"==c.direction?"scrollLeft":"scrollTop";if(c.isMarquee){if(c.loop>0&&(A+=c.scrollAmount,A>i*c.loop))return d[a]=0,clearInterval(n);var b=d[a]+("left"==c.direction||"up"==c.direction?1:-1)*c.scrollAmount}else if(c.duration){if(!(o++<r))return b=s,clearInterval(k),m=!1,void 0;m=!0;var b=Math.ceil(H(o,p,q,r));o==r&&(b=s)}else{var b=s;clearInterval(k)}"left"==c.direction||"up"==c.direction?b>=i&&(b-=i):0>=b&&(b+=i),d[a]=b,c.isMarquee?n=setTimeout(D,c.scrollDelay):r>o?(k&&clearTimeout(k),k=setTimeout(D,c.scrollDelay)):m=!1}function E(a){m=!0;var b="left"==c.direction||"right"==c.direction?"scrollLeft":"scrollTop",e="left"==c.direction||"up"==c.direction?1:-1;z+=e,void 0==a&&c.navId&&(w.eq(y).removeClass("navOn"),y+=e,y>=u?y=0:0>y&&(y=u-1),w.eq(y).addClass("navOn"),z=y);var f=0>z?i:0;o=0,p=d[b],s=void 0!=a?a:f+c.distance*z%i,q=1==e?s>p?s-p:s+i-p:s>p?s-i-p:s-p,r=c.duration,k&&clearTimeout(k),k=setTimeout(D,c.scrollDelay)}function F(){l=setInterval(function(){E()},1e3*c.time)}function G(){clearInterval(l)}function H(a,b,c,d){return-c*(a/=d)*(a-2)+b}var k,l,m,n,o,p,q,r,s,t,u,v,w,b=a(this),d=b.get(0),e=b.width(),f=b.height(),g=b.children(),h=g.children(),i=0,j="left"==c.direction||"right"==c.direction?1:0,x=[],y=0,z=0,A=0;g.css(j?"width":"height",1e4);var B="<ul>";if(c.isEqual){t=h[j?"outerWidth":"outerHeight"](),u=h.length,i=t*u;for(var C=0;u>C;C++)x.push(C*t),B+="<li>"+(C+1)+"</li>"}else h.each(function(b){x.push(i),i+=a(this)[j?"outerWidth":"outerHeight"](),B+="<li>"+(b+1)+"</li>"});B+="</ul>",(j?e:f)>i||(g.append(h.clone()).css(j?"width":"height",2*i),c.navId&&(v=a(c.navId).append(B).hover(G,F),w=a("li",v),w.each(function(b){a(this).bind(c.eventNav,function(){m||y!=b&&(E(x[b]),w.eq(y).removeClass("navOn"),y=b,a(this).addClass("navOn"))})}),w.eq(y).addClass("navOn")),d[j?"scrollLeft":"scrollTop"]="right"==c.direction||"down"==c.direction?i:0,c.isMarquee?(n=setTimeout(D,c.scrollDelay),b.hover(function(){clearInterval(n)},function(){clearInterval(n),n=setTimeout(D,c.scrollDelay)}),c.controlBtn&&a.each(c.controlBtn,function(b,d){a(d).bind(c.eventA,function(){c.direction=b,c.oldAmount=c.scrollAmount,c.scrollAmount=c.newAmount}).bind(c.eventB,function(){c.scrollAmount=c.oldAmount})})):(c.isAuto&&(F(),b.hover(G,F)),c.btnGo&&a.each(c.btnGo,function(b,d){a(d).bind(c.eventGo,function(){1!=m&&(c.direction=b,E(),c.isAuto&&(G(),F()))})})))})},a.fn.kxbdSuperMarquee.defaults={isMarquee:!1,isEqual:!0,loop:0,newAmount:3,eventA:"mousedown",eventB:"mouseup",isAuto:!0,time:5,duration:50,eventGo:"click",direction:"left",scrollAmount:1,scrollDelay:10,eventNav:"click"},a.fn.kxbdSuperMarquee.setDefaults=function(b){a.extend(a.fn.kxbdSuperMarquee.defaults,b)}}(jQuery);
</script>

<script>
$LAB.script("")
    .wait(function(){
        //animate for 3rd
        (function(){
            $('.js-num3').animate({top: '200px', opacity: 1},1000);
            $('.js-rd').animate({top: '220px', opacity: 1},1500,function(){
                $('.js-note').fadeIn();
            });
        })();

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

        // 
        (function(){
            var topCounter = $('.js-topLimitTime');
            var time = parseInt(topCounter.attr('data-time'));
            var status = parseInt(topCounter.attr('data-status'));
            var limitObj = {};

            var nailInterval = setInterval(function(){
             time--;
             if(time > 0){
                 limitObj = limitTime(time, status);
                    topCounter.html('<strong>'+ limitObj.cDay +'</strong>D<strong>'+ limitObj.CHour +'</strong>H<strong>'+ limitObj.CMinute +'</strong>M<strong>'+ limitObj.CSecond +'</strong>S'); 
             }else{
                 limitObj = limitTime(time, status);
                 clearInterval(nailInterval);
             }
            },1000);
        })();

        (function(){
            var timeCounter = $('.js-switchTabTime');
            $.each(timeCounter, function(index, val) {
                var that = $(val);
                var thatParents = that.closest('li');
                var time = parseInt(that.attr('data-time'));
                var status = parseInt(that.attr('data-status'));
                var limitObj = {};

                var nailInterval = setInterval(function(){
                    time--;
                    if(time > 0){
                        var preS = status === 1 ? 'PROMO ENDS IN:' : 'PROMO BEGINS IN:';
                        limitObj = limitTime(time, status);
                        thatParents.find('p').html(preS);
        
                        if(parseInt(limitObj.cDay) > 0){
                            that.html('<strong>Over '+ limitObj.cDay +' Days</strong> <strong>'+ limitObj.CHour +' hour</strong>');
                        }else{
                           that.html('<strong>'+ limitObj.cDay +'</strong>:<strong>'+ limitObj.CHour +'</strong>:<strong>'+ limitObj.CMinute +'</strong>:<strong>'+ limitObj.CSecond +'</strong>'); 
                        }
                    }else{
                        limitObj = limitTime(time, status);
                        thatParents.find('p').html('PROMO ENDS IN:');
                        clearInterval(nailInterval);
                    }
                },1000);
            });
        })();


        $(function(){
            $('#js_infoBox').kxbdSuperMarquee({
                distance:46,
                time:3,
                direction:'up'
            });

            $('.js-sortNav').on('click', '.js-navItem', function(){
                var that = $(this);
                var thatParents = that.parents('.js-sortNav');
                var index = thatParents.find('.js-navItem').index(that);
                that.addClass('active').siblings('.js-navItem').removeClass('active');

                thatParents.siblings('.js-sortItem').eq(index).show().siblings('.js-sortItem').hide();
            });
        });
    })
</script>

</body>
</html>