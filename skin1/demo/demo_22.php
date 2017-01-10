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
        .icon-ex{ display: inline-block; background: url('images/demo_22/exclusive_icon.png') no-repeat; *display: inline;*zoom: 1;}
        
        .exclusive-wrap{ padding-bottom: 50px; width: 100%; min-width: 1000px; font-family: Arial; font-size: 12px; background: #fdef0a url('images/demo_22/banner.jpg') top center no-repeat;}
        .banner{ width: 100%; min-width: 1000px; height: 450px;}
        
        .share-sec{ margin: 0 auto 80px; width: 1000px;}
        .share-sec .tit{ margin-bottom: 30px; height: 50px; line-height: 50px; color: #fe6600; font-size: 30px; text-align: center;}
        .share-box-wrap{ padding: 50px 30px 40px 30px; width: 940px; background: #d953d7; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
            box-shadow: 0 10px 30px 0 rgba(188,10,165,0.5);
        }
        .share-top-sec{ height: 280px;}
        .share-top-sec .share-rule{ padding-left: 30px; width: 400px;}
        .share-top-sec .share-rule .rule-tit{ margin-bottom: 10px; height: 40px; line-height: 40px; color: #ffdf00; font-size: 20px;}
        .share-top-sec .share-rule p{}
        .share-top-sec .share-rule p span{ margin-bottom: 15px; display: block; line-height: 25px; color: #fff; font-size: 16px;}
        .share-top-sec .share-rule p span strong{ color: #ffdf00; font-weight: bold;}
        .share-top-sec .share-top-pro{ width: 480px;}
        .share-top-sec .share-top-pro li{ position: relative; z-index: 1; float: left; margin-left: 20px; width: 220px; height: 280px;}
        .share-top-sec .share-top-pro .pro-img{ padding: 40px 10px; width: 200px; height: 200px;}
        .share-top-sec .share-top-pro .pro-img img{ width: 200px; height: 200px;}
        .share-top-sec .share-top-pro .layer-box{ display: none; position: absolute; z-index: 2; top: 0; left: 0; padding: 25px; width: 170px; height: 230px; background: #8a30e6; background: rgba(139,48,230,0.8);}
        .share-top-sec .share-top-pro li:hover .layer-box{ display: block;}
        .layer-box .coupon-code{ color: #ffdf00; font-size: 14px; text-align: center;}
        .layer-box .coupon-code span{ display: block; height: 16px; line-height: 16px;}
        .layer-box .coupon-code strong{ height: 20px; line-height: 20px; font-size: 16px; font-weight: bold;}

        .layer-box a{ color: #fff; text-decoration: none;}
        .layer-box .line-icon{ position: relative; z-index: 1; margin: 0 auto 23px; width: 32px; height: 2px; background: #ffdf01;}
        .layer-box .line-icon i{position: absolute; top: 0; left: 10px; display: inline-block; width: 0; height: 0; border:6px solid transparent;zoom:1;border-top: 6px solid #ffdf01;}
        .layer-box .pro-title{ margin-bottom: 14px; height: 36px; line-height: 18px; font-size: 14px; color: #fff; overflow: hidden; text-align: center;}
        .layer-box .price-box-wrap{ margin: 0 auto 10px; width: 170px;}
        .layer-box .price-box-wrap .name{ display: block; line-height: 14px; font-size: 12px;}
        .layer-box .price-box-wrap .my_shop_price{ margin-bottom: 6px; line-height: 20px; font-size: 20px;}
        .layer-box .price-box-wrap .normal-price{ color: #fff;}
        .layer-box .price-box-wrap .coupon-price{ padding-left: 10px; color: #ffdf01; border-left: 1px solid #ffdf01;}
        .layer-box .price-box-wrap .coupon-price .my_shop_price{ font-weight: bold;}
        .layer-box .buy-now-btn{ margin: 0 auto 10px; display: block; width: 168px; height: 22px; line-height: 22px; border: 1px solid #fff; text-align: center;}
        .layer-box .share-wrap{ margin: 0 auto; padding: 7px 0; width: 170px; height: 26px; text-align: center; background: #fed066;}
        .layer-box .share-wrap a{ position: relative; z-index: 1; margin: 0 5px; display: inline-block;*display: inline;*zoom:1; width: 27px; height: 26px; text-indent: -9999px;
            -webkit-transition: 0.28s;  -moz-transition: 0.28s;  -o-transition: 0.28s;  -ms-transition: 0.28s;  transition: 0.28s;
        }
        .layer-box .share-wrap a:hover{ -webkit-transform: translateY(-3px); -moz-transform: translateY(-3px); transform: translateY(-3px);}
        .fb-btn{ background-position: -60px 0;}
        .tumb-btn{ background-position: -110px 0;}
        .google-btn{ background-position: -160px 0;}
        .twitt-btn{ background-position: -210px 0;}
        .share-list{ margin: 0 auto; width: 960px;}
        .share-list li{ float: left; margin: 30px 20px 0 0; padding: 10px 0; width: 214px; height: 354px; text-align: center; border:3px solid #ba09a8;-webkit-transition: 0.28s;  -moz-transition: 0.28s;  -o-transition: 0.28s;  -ms-transition: 0.28s;  transition: 0.28s;}
        .share-list li:hover{-webkit-transform: translateY(-5px); -moz-transform: translateY(-5px); transform: translateY(-5px);}
        .share-list li .line-icon{ margin-bottom: 13px;}
        .share-list li a:hover{ text-decoration: underline;}
        .share-list li .price-box-wrap .coupon-price{ border-left: 1px solid #bb0aa6;}
        .share-list li .pro-img{ margin: 0 auto 5px; width: 160px; height: 160px;}
        .share-list li .pro-title{ color: #fff; font-size: 14px; overflow: hidden;}

        .brand-sec{ margin: 0 auto 70px; width: 1000px;}
        .brand-sec .tit{ margin: 0 auto 21px; width: 618px; height: 79px; background: url('images/demo_22/brand_list.png') no-repeat; text-indent: -9999px;}
        .brand-sec .brand-1-tit{ background-position: 0 0;}
        .brand-sec .brand-2-tit{ background-position: 0 -100px;}
        .brand-sec .brand-3-tit{ background-position: 0 -200px;}
        .brand-sec .brand-4-tit{ background-position: 0 -300px;}
        .brand-sec .brand-5-tit{ background-position: 0 -400px;}
        .brand-sec .brand-6-tit{ background-position: 0 -500px;}
        .brand-sec .brand-7-tit{ background-position: 0 -600px;}
        .brand-sec .brand-8-tit{ background-position: 0 -700px;}
        .brand-sec .brand-1-cont{}
        .brand-sec .brand-1-cont .brand-pro{ float: left; width: 420px; height: 320px;}
        .brand-sec .brand-1-cont .brand-video{ float: right; width: 570px; height: 320px;}
        
        .brand-pro-list{ width: 1000px;}
        .brand-pro-list ul{ width: 1016px;}
        .brand-pro-list ul li{ position: relative; z-index: 1; float: left; margin: 0 14px 14px 0; padding: 8px; width: 224px; height: 344px; background: #fff;}
        .brand-pro-list ul li .goods-discount{ position: absolute; z-index: 2; top: 10px; right: 10px; padding: 3px 0; width: 40px; height: 34px; line-height: 14px; color: #fe6600; font-size: 12px; text-align: center; background: #ffdf00; -webkit-border-radius: 20px; -moz-border-radius: 20px; border-radius: 20px;}
        .brand-pro-list ul li .goods-discount .db{ display: block; height: 20px; line-height: 20px; font-size: 14px; font-weight: bold;}
        .brand-pro-list ul li .goods-discount .db b{ font-size: 18px; font-weight: bold;}
        .brand-pro-list ul li .goods-img{ width: 224px; height: 224px;}
        .brand-pro-list ul li .goods-title{ margin-bottom: 10px; height: 36px; line-height: 36px; color: #333; font-size: 14px; text-align: center;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
        .brand-pro-list ul li .goods-title a{ color: #333; text-decoration: none;}
        .brand-pro-list ul li .goods-title a:hover{text-decoration: underline;}
        .brand-pro-list ul li .goods-price{ margin-bottom: 6px; height: 30px; line-height: 30px; text-align: center; vertical-align: middle;}
        .brand-pro-list ul li .goods-price .market-price{ color: #7a7a7a; font-size: 12px; vertical-align: middle;}
        .brand-pro-list ul li .goods-price .shop-price{ margin-left: 15px; color: #fe6600; font-size: 20px; vertical-align: middle;}
        .brand-pro-list ul li .goods-price .shop-price b{ font-weight: bold;}
        .brand-pro-list ul li .goods-buy{margin: 0 auto; width: 190px; height: 32px; line-height: 32px; font-size: 16px; font-weight: bold; text-align: center;}
        .brand-pro-list ul li .goods-buy a{ display: block; width: 190px; height: 32px; color: #fff; background: #fe6600; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;}
        .brand-pro-list ul li .goods-buy a:hover{background: #842ee6;}

        .foot-banner-sec{ margin: 0 auto; width: 1000px; height: 350px;}

        .right-nav{ display: none; position: fixed; z-index: 9999; top: 30px; right: 30px; width: 170px;}
        .right-nav .nav-top{ margin: 0 auto; display: block; width: 145px; height: 59px; background-position: -60px -50px;}
        .right-nav .go-top{ margin: 5px 72px; width: 26px; height: 19px; background-position: 0 -50px;}
        .floor-list{}
        .floor-list li{ margin-bottom: 10px; height: 32px; line-height: 32px; border: 1px dashed #fe6600; text-align: center;}
        .floor-list li a{ display: block; width: 100%; height: 32px; color: #ff5d5e; text-decoration: none;}
        .floor-list li:hover, .floor-list li.active{border: 1px solid #fe6600;}
        .floor-list li:hover a, .floor-list li.active a{ color: #ffdf00; background: #fe6600;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>
    
    <div class="exclusive-wrap">
        <div class="banner"></div>
        
        <section class="share-sec js-floorTarget">
            <h3 class="tit">SHARE AND SHOW YOU THE EPIC COUPON</h3>
            <div class="share-box-wrap">
                <div class="share-top-sec clearfix">
                    <div class="share-rule fl">
                        <h4 class="rule-tit">Rules:</h4>
                        <p>
                            <span>1.Click the share button under the product. Once you've
                            shared it, The corresponding coupon code will appear.</span>
                            <span>2.Everyone can share different product to get different coupon code. </span>
                            <span>3.Your COUPON takes effect during <strong>DEC 1 @9:00 UTC TO DEC 17 @17:00 UTC</strong>. SO BE FAST TO GRAB IT!</span>
                        </p>
                    </div>

                    <ul class="share-top-pro fr clearfix">
                        <li>
                            <div class="pro-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" alt="园博吧Exclusive"></div>
                            <div class="layer-box">
                                <p class="coupon-code">
                                    <span>COUPON CODE: </span>
                                    <strong class="js-couponBox" data-coupon="">???</strong>
                                </p>
                                <p class="line-icon"><i></i></p>
                                <p class="pro-title">Gocomma Roidmi 2S Car Charger</p>
                                <div class="clearfix price-box-wrap">
                                    <p class="normal-price fl">
                                       <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span>
                                       <span class="name">Normal Price</span>
                                    </p>
                                    <p class="coupon-price fr">
                                        <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span>
                                        <span class="name">Coupon Price</span>
                                    </p>
                                </div>
                                <a href="#" class="buy-now-btn">BUY NOW</a>
                                <div class="share-wrap" data-goodsid="328232" data-sharehref="#">
                                    <a href="javascript:;" class="icon-ex fb-btn js-shareFB">Facebook</a>
                                    <a href="javascript:;" class="icon-ex tumb-btn js-shareTumb">Tumblr</a>
                                    <a href="javascript:;" class="icon-ex google-btn js-shareGoogle">Google+</a>
                                    <a href="javascript:;" class="icon-ex twitt-btn js-shareTwitt">Twitter</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="pro-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" alt="园博吧Exclusive"></div>
                            <div class="layer-box">
                                <p class="coupon-code">
                                    <span>COUPON CODE: </span>
                                    <strong class="js-couponBox" data-coupon="">???</strong>
                                </p>
                                <p class="line-icon"><i></i></p>
                                <p class="pro-title">Gocomma Roidmi 2S Car Charger</p>
                                <div class="clearfix price-box-wrap">
                                    <p class="normal-price fl">
                                       <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span>
                                       <span class="name">Normal Price</span>
                                    </p>
                                    <p class="coupon-price fr">
                                        <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span>
                                        <span class="name">Coupon Price</span>
                                    </p>
                                </div>
                                <a href="#" class="buy-now-btn">BUY NOW</a>
                                <div class="share-wrap" data-goodsid="328232" data-sharehref="#">
                                    <a href="javascript:;" class="icon-ex fb-btn js-shareFB">Facebook</a>
                                    <a href="javascript:;" class="icon-ex tumb-btn js-shareTumb">Tumblr</a>
                                    <a href="javascript:;" class="icon-ex google-btn js-shareGoogle">Google+</a>
                                    <a href="javascript:;" class="icon-ex twitt-btn js-shareTwitt">Twitter</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div><!-- .share-top-sec -->

                <div class="share-list clearfix">
                    <ul class="clearfix">
                        <li class="layer-box">
                            <p class="coupon-code">
                                <span>COUPON CODE: </span>
                                <strong class="js-couponBox" data-coupon="">???</strong>
                            </p>
                            <p class="line-icon"><i></i></p>
                            <p class="pro-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="160" alt="园博吧Exclusive"></p>
                            <p class="pro-title">Gocomma Roidmi 2S Car Charger</p>
                            <div class="clearfix price-box-wrap">
                                <p class="normal-price fl">
                                   <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span>
                                   <span class="name">Normal Price</span>
                                </p>
                                <p class="coupon-price fr">
                                    <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span>
                                    <span class="name">Coupon Price</span>
                                </p>
                            </div>
                            <div class="share-wrap" data-goodsid="328232" data-sharehref="#">
                                <a href="javascript:;" class="icon-ex fb-btn js-shareFB">Facebook</a>
                                <a href="javascript:;" class="icon-ex tumb-btn js-shareTumb">Tumblr</a>
                                <a href="javascript:;" class="icon-ex google-btn js-shareGoogle">Google+</a>
                                <a href="javascript:;" class="icon-ex twitt-btn js-shareTwitt">Twitter</a>
                            </div>
                        </li>
                        <li class="layer-box">
                            <p class="coupon-code">
                                <span>COUPON CODE: </span>
                                <strong class="js-couponBox" data-coupon="">???</strong>
                            </p>
                            <p class="line-icon"><i></i></p>
                            <p class="pro-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="160" alt="园博吧Exclusive"></p>
                            <p class="pro-title">Gocomma Roidmi 2S Car Charger</p>
                            <div class="clearfix price-box-wrap">
                                <p class="normal-price fl">
                                   <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span>
                                   <span class="name">Normal Price</span>
                                </p>
                                <p class="coupon-price fr">
                                    <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span>
                                    <span class="name">Coupon Price</span>
                                </p>
                            </div>
                            <div class="share-wrap" data-goodsid="328232" data-sharehref="#">
                                <a href="javascript:;" class="icon-ex fb-btn js-shareFB">Facebook</a>
                                <a href="javascript:;" class="icon-ex tumb-btn js-shareTumb">Tumblr</a>
                                <a href="javascript:;" class="icon-ex google-btn js-shareGoogle">Google+</a>
                                <a href="javascript:;" class="icon-ex twitt-btn js-shareTwitt">Twitter</a>
                            </div>
                        </li>
                        <li class="layer-box">
                            <p class="coupon-code">
                                <span>COUPON CODE: </span>
                                <strong class="js-couponBox" data-coupon="">???</strong>
                            </p>
                            <p class="line-icon"><i></i></p>
                            <p class="pro-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="160" alt="园博吧Exclusive"></p>
                            <p class="pro-title">Gocomma Roidmi 2S Car Charger</p>
                            <div class="clearfix price-box-wrap">
                                <p class="normal-price fl">
                                   <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span>
                                   <span class="name">Normal Price</span>
                                </p>
                                <p class="coupon-price fr">
                                    <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span>
                                    <span class="name">Coupon Price</span>
                                </p>
                            </div>
                            <div class="share-wrap" data-goodsid="328232" data-sharehref="#">
                                <a href="javascript:;" class="icon-ex fb-btn js-shareFB">Facebook</a>
                                <a href="javascript:;" class="icon-ex tumb-btn js-shareTumb">Tumblr</a>
                                <a href="javascript:;" class="icon-ex google-btn js-shareGoogle">Google+</a>
                                <a href="javascript:;" class="icon-ex twitt-btn js-shareTwitt">Twitter</a>
                            </div>
                        </li>
                        <li class="layer-box">
                            <p class="coupon-code">
                                <span>COUPON CODE: </span>
                                <strong class="js-couponBox" data-coupon="">???</strong>
                            </p>
                            <p class="line-icon"><i></i></p>
                            <p class="pro-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="160" alt="园博吧Exclusive"></p>
                            <p class="pro-title">Gocomma Roidmi 2S Car Charger</p>
                            <div class="clearfix price-box-wrap">
                                <p class="normal-price fl">
                                   <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span>
                                   <span class="name">Normal Price</span>
                                </p>
                                <p class="coupon-price fr">
                                    <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span>
                                    <span class="name">Coupon Price</span>
                                </p>
                            </div>
                            <div class="share-wrap" data-goodsid="328232" data-sharehref="#">
                                <a href="javascript:;" class="icon-ex fb-btn js-shareFB">Facebook</a>
                                <a href="javascript:;" class="icon-ex tumb-btn js-shareTumb">Tumblr</a>
                                <a href="javascript:;" class="icon-ex google-btn js-shareGoogle">Google+</a>
                                <a href="javascript:;" class="icon-ex twitt-btn js-shareTwitt">Twitter</a>
                            </div>
                        </li>
                        <li class="layer-box">
                            <p class="coupon-code">
                                <span>COUPON CODE: </span>
                                <strong class="js-couponBox" data-coupon="">???</strong>
                            </p>
                            <p class="line-icon"><i></i></p>
                            <p class="pro-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="160" alt="园博吧Exclusive"></p>
                            <p class="pro-title">Gocomma Roidmi 2S Car Charger</p>
                            <div class="clearfix price-box-wrap">
                                <p class="normal-price fl">
                                   <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span>
                                   <span class="name">Normal Price</span>
                                </p>
                                <p class="coupon-price fr">
                                    <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span>
                                    <span class="name">Coupon Price</span>
                                </p>
                            </div>
                            <div class="share-wrap" data-goodsid="328232" data-sharehref="#">
                                <a href="javascript:;" class="icon-ex fb-btn js-shareFB">Facebook</a>
                                <a href="javascript:;" class="icon-ex tumb-btn js-shareTumb">Tumblr</a>
                                <a href="javascript:;" class="icon-ex google-btn js-shareGoogle">Google+</a>
                                <a href="javascript:;" class="icon-ex twitt-btn js-shareTwitt">Twitter</a>
                            </div>
                        </li>
                        <li class="layer-box">
                            <p class="coupon-code">
                                <span>COUPON CODE: </span>
                                <strong class="js-couponBox" data-coupon="">???</strong>
                            </p>
                            <p class="line-icon"><i></i></p>
                            <p class="pro-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="160" alt="园博吧Exclusive"></p>
                            <p class="pro-title">Gocomma Roidmi 2S Car Charger</p>
                            <div class="clearfix price-box-wrap">
                                <p class="normal-price fl">
                                   <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span>
                                   <span class="name">Normal Price</span>
                                </p>
                                <p class="coupon-price fr">
                                    <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span>
                                    <span class="name">Coupon Price</span>
                                </p>
                            </div>
                            <div class="share-wrap" data-goodsid="328232" data-sharehref="#">
                                <a href="javascript:;" class="icon-ex fb-btn js-shareFB">Facebook</a>
                                <a href="javascript:;" class="icon-ex tumb-btn js-shareTumb">Tumblr</a>
                                <a href="javascript:;" class="icon-ex google-btn js-shareGoogle">Google+</a>
                                <a href="javascript:;" class="icon-ex twitt-btn js-shareTwitt">Twitter</a>
                            </div>
                        </li>
                        <li class="layer-box">
                            <p class="coupon-code">
                                <span>COUPON CODE: </span>
                                <strong class="js-couponBox" data-coupon="">???</strong>
                            </p>
                            <p class="line-icon"><i></i></p>
                            <p class="pro-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="160" alt="园博吧Exclusive"></p>
                            <p class="pro-title">Gocomma Roidmi 2S Car Charger</p>
                            <div class="clearfix price-box-wrap">
                                <p class="normal-price fl">
                                   <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span>
                                   <span class="name">Normal Price</span>
                                </p>
                                <p class="coupon-price fr">
                                    <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span>
                                    <span class="name">Coupon Price</span>
                                </p>
                            </div>
                            <div class="share-wrap" data-goodsid="328232" data-sharehref="#">
                                <a href="javascript:;" class="icon-ex fb-btn js-shareFB">Facebook</a>
                                <a href="javascript:;" class="icon-ex tumb-btn js-shareTumb">Tumblr</a>
                                <a href="javascript:;" class="icon-ex google-btn js-shareGoogle">Google+</a>
                                <a href="javascript:;" class="icon-ex twitt-btn js-shareTwitt">Twitter</a>
                            </div>
                        </li>
                        <li class="layer-box">
                            <p class="coupon-code">
                                <span>COUPON CODE: </span>
                                <strong class="js-couponBox" data-coupon="">???</strong>
                            </p>
                            <p class="line-icon"><i></i></p>
                            <p class="pro-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="160" alt="园博吧Exclusive"></p>
                            <p class="pro-title">Gocomma Roidmi 2S Car Charger</p>
                            <div class="clearfix price-box-wrap">
                                <p class="normal-price fl">
                                   <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span>
                                   <span class="name">Normal Price</span>
                                </p>
                                <p class="coupon-price fr">
                                    <span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span>
                                    <span class="name">Coupon Price</span>
                                </p>
                            </div>
                            <div class="share-wrap" data-goodsid="328232" data-sharehref="#">
                                <a href="javascript:;" class="icon-ex fb-btn js-shareFB">Facebook</a>
                                <a href="javascript:;" class="icon-ex tumb-btn js-shareTumb">Tumblr</a>
                                <a href="javascript:;" class="icon-ex google-btn js-shareGoogle">Google+</a>
                                <a href="javascript:;" class="icon-ex twitt-btn js-shareTwitt">Twitter</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- .share-box-wrap -->
        </section><!-- .share-sec -->

        <section class="brand-sec js-floorTarget">
            <h3 class="tit brand-1-tit">zanflare</h3>
            
            <div class="brand-1-cont clearfix">
                <p class="fl brand-pro"><a href="#"><img src="images/demo_22/brand_1_pro.jpg" width="420" height="320" alt="园博吧Exclusive"></a></p>
                <div class="brand-video fr">
                    <iframe width="570" height="320" src="https://www.youtube.com/embed/hbDpOEfUIrI" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
        </section><!-- .brand-sec -->

        <section class="brand-sec js-floorTarget">
            <h3 class="tit brand-2-tit">zan.style</h3>

            <div class="brand-pro-list">
                <ul class="clearfix">
                    <li class="pr">              
                        <p class="goods-discount"><span class="db"><b>37</b>%</span>OFF</p>                                 
                        <p class="goods-img pr">
                            <a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="224" height="224"></a>
                        </p>                
                        <p class="goods-title">
                            <a href="#" target="special">ZANSTYLE Women Long Down Jacket</a>
                        </p>               
                        <p class="goods-price">
                            <del class="market-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span></del>
                            <span class="shop-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span></span>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">BUY NOW</a></p>               
                    </li>
                    <li class="pr">              
                        <p class="goods-discount"><span class="db"><b>37</b>%</span>OFF</p>                                 
                        <p class="goods-img pr">
                            <a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="224" height="224"></a>
                        </p>                
                        <p class="goods-title">
                            <a href="#" target="special">ZANSTYLE Women Long Down Jacket</a>
                        </p>               
                        <p class="goods-price">
                            <del class="market-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span></del>
                            <span class="shop-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span></span>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">BUY NOW</a></p>               
                    </li>
                    <li class="pr">              
                        <p class="goods-discount"><span class="db"><b>37</b>%</span>OFF</p>                                 
                        <p class="goods-img pr">
                            <a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="224" height="224"></a>
                        </p>                
                        <p class="goods-title">
                            <a href="#" target="special">ZANSTYLE Women Long Down Jacket</a>
                        </p>               
                        <p class="goods-price">
                            <del class="market-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span></del>
                            <span class="shop-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span></span>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">BUY NOW</a></p>               
                    </li>
                    <li class="pr">              
                        <p class="goods-discount"><span class="db"><b>37</b>%</span>OFF</p>                                 
                        <p class="goods-img pr">
                            <a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="224" height="224"></a>
                        </p>                
                        <p class="goods-title">
                            <a href="#" target="special">ZANSTYLE Women Long Down Jacket</a>
                        </p>               
                        <p class="goods-price">
                            <del class="market-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span></del>
                            <span class="shop-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span></span>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">BUY NOW</a></p>               
                    </li>
                </ul>
            </div>
        </section><!-- .brand-sec -->

        <section class="brand-sec js-floorTarget">
            <h3 class="tit brand-3-tit">zanmini</h3>

            <div class="brand-pro-list">
                <ul class="clearfix">
                    <li class="pr">              
                        <p class="goods-discount"><span class="db"><b>37</b>%</span>OFF</p>                                 
                        <p class="goods-img pr">
                            <a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="224" height="224"></a>
                        </p>                
                        <p class="goods-title">
                            <a href="#" target="special">ZANSTYLE Women Long Down Jacket</a>
                        </p>               
                        <p class="goods-price">
                            <del class="market-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span></del>
                            <span class="shop-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span></span>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">BUY NOW</a></p>               
                    </li>
                </ul>
            </div>
        </section><!-- .brand-sec -->

        <section class="brand-sec js-floorTarget">
            <h3 class="tit brand-4-tit">ALFAWISE</h3>

            <div class="brand-pro-list">
                <ul class="clearfix">
                    <li class="pr">              
                        <p class="goods-discount"><span class="db"><b>37</b>%</span>OFF</p>                                 
                        <p class="goods-img pr">
                            <a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="224" height="224"></a>
                        </p>                
                        <p class="goods-title">
                            <a href="#" target="special">ZANSTYLE Women Long Down Jacket</a>
                        </p>               
                        <p class="goods-price">
                            <del class="market-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span></del>
                            <span class="shop-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span></span>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">BUY NOW</a></p>               
                    </li>
                </ul>
            </div>
        </section><!-- .brand-sec -->

        <section class="brand-sec js-floorTarget">
            <h3 class="tit brand-5-tit">Gocomma</h3>

            <div class="brand-pro-list">
                <ul class="clearfix">
                    <li class="pr">              
                        <p class="goods-discount"><span class="db"><b>37</b>%</span>OFF</p>                                 
                        <p class="goods-img pr">
                            <a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="224" height="224"></a>
                        </p>                
                        <p class="goods-title">
                            <a href="#" target="special">ZANSTYLE Women Long Down Jacket</a>
                        </p>               
                        <p class="goods-price">
                            <del class="market-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span></del>
                            <span class="shop-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span></span>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">BUY NOW</a></p>               
                    </li>
                </ul>
            </div>
        </section><!-- .brand-sec -->

        <section class="brand-sec js-floorTarget">
            <h3 class="tit brand-6-tit">FuriBee</h3>

            <div class="brand-pro-list">
                <ul class="clearfix">
                    <li class="pr">              
                        <p class="goods-discount"><span class="db"><b>37</b>%</span>OFF</p>                                 
                        <p class="goods-img pr">
                            <a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="224" height="224"></a>
                        </p>                
                        <p class="goods-title">
                            <a href="#" target="special">ZANSTYLE Women Long Down Jacket</a>
                        </p>               
                        <p class="goods-price">
                            <del class="market-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span></del>
                            <span class="shop-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span></span>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">BUY NOW</a></p>               
                    </li>
                </ul>
            </div>
        </section><!-- .brand-sec -->

        <section class="brand-sec js-floorTarget">
            <h3 class="tit brand-7-tit">Utorch</h3>

            <div class="brand-pro-list">
                <ul class="clearfix">
                    <li class="pr">              
                        <p class="goods-discount"><span class="db"><b>37</b>%</span>OFF</p>                                 
                        <p class="goods-img pr">
                            <a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="224" height="224"></a>
                        </p>                
                        <p class="goods-title">
                            <a href="#" target="special">ZANSTYLE Women Long Down Jacket</a>
                        </p>               
                        <p class="goods-price">
                            <del class="market-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="88.88">$88.88</b></span></del>
                            <span class="shop-price"><span><b class="bizhong">USD</b><b class="my_shop_price" orgp="47.99">$47.99</b></span></span>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">BUY NOW</a></p>               
                    </li>
                </ul>
            </div>
        </section><!-- .brand-sec -->

        <p class="foot-banner-sec">
            <a href="#"><img src="images/demo_22/foot_banner.jpg" width="1000" height="350" alt="园博吧Exclusive"></a>
        </p><!-- .foot-banner-sec -->
    </div><!-- .exclusive-wrap -->

    <nav class="right-nav" id="js-rightNav">
        <div class="nav-top icon-ex"></div>
        <ul class="floor-list">
            <li><a href="javascript:;">share to see the code</a></li>
            <li><a href="javascript:;">Zanflare</a></li>
            <li><a href="javascript:;">zanstyle</a></li>
            <li><a href="javascript:;">zanmini</a></li>
            <li><a href="javascript:;">ALFAWISE</a></li>
            <li><a href="javascript:;">Gocomma</a></li>
            <li><a href="javascript:;">FuriBee</a></li>
            <li><a href="javascript:;">Utorch</a></li>
        </ul>
        <a href="javascript:;" class="go-top icon-ex js-goTop"></a>
    </nav>

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->

<script>
$LAB.script("")
    .wait(function(){
        $(function(){
            //window scroll show OR hide fixedNav
            $(window).scroll(function(event) {
                var $wind = $(window),
                    floorTargetArr = $('.js-floorTarget'),
                    $rightNav = $('#js-rightNav'),
                    rightNavLiArr = $('#js-rightNav').find('li'),
                    firstTarget = floorTargetArr.eq(0).offset().top,
                    windowScrollH = $wind.scrollTop();

                if(windowScrollH >= firstTarget){
                    $rightNav.fadeIn();
                }else{
                    $rightNav.fadeOut();
                }

                $.each(floorTargetArr, function(index, val) {
                    var that = $(val);
                    if(windowScrollH >= that.offset().top){
                        rightNavLiArr.eq(index).addClass('active').siblings('li').removeClass('active');  
                    }else{
                        rightNavLiArr.eq(index).removeClass('active');
                    }
                });
            });

            //Floor click
            $('#js-rightNav').on('click','li',function(){
              var $this = $(this);
              var index = $('#js-rightNav').find('li').index($this);
              var scrollH = $('.js-floorTarget').eq(index).offset().top;
                $('html,body').animate({scrollTop: scrollH},500);
            });
            $('.js-goTop').click(function(){
              $('html,body').animate({scrollTop: 0},500);
            });
        });
    })
</script>

</body>
</html>