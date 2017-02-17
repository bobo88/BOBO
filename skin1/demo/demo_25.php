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
        
        .o-ellipses{ overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
        .translate-up{}
        .translate-up li{ position: relative; z-index: 1; -webkit-transition: 0.5s;  -moz-transition: 0.5s;  -o-transition: 0.5s;  -ms-transition: 0.5s;  transition: 0.5s;}
        .translate-up li:hover{ -webkit-transform: translate(0,-5px); -moz-transform: translate(0,-5px); transform: translate(0,-5px);}
        .box-shadow li{ box-shadow: 0 1px 3px -2px rgba(0,0,0,0.12),0 1px 2px rgba(0,0,0,0.24);}
        .box-shadow li:hover{
            -webkit-box-shadow: 0 14px 28px rgba(0,0,0,0.25),0 10px 10px rgba(0,0,0,0.1);
            -moz-box-shadow: 0 14px 28px rgba(0,0,0,0.25),0 10px 10px rgba(0,0,0,0.1);
            box-shadow: 0 14px 28px rgba(0,0,0,0.25),0 10px 10px rgba(0,0,0,0.1);
        }

        .active-main{ width: 100%; min-width: 1000px; font-family: Arial; background: #f6f6f6;}
        .active-banner-bg{ margin-bottom: 60px; width: 100%; min-width: 1000px; height: 600px; background: url('images/demo_25/banner.jpg') top center no-repeat;}

        .active-coupon-list-wrap, .active-collocation-products-wrap, .active-top-brands-wrap{ padding-bottom: 30px; margin: 0 auto; width: 1000px;}
        .coupon-list{ width: 1015px;}
        .coupon-list li{ float: left; margin: 0 13px 20px 0; padding: 20px 30px 0; width: 180px; height: 200px; background: url('images/demo_25/coupon_bg.png') center center no-repeat;}
        .coupon-value{ height: 40px; line-height: 40px; color: #cc0000; font-size: 36px; font-weight: bold;}
        .coupon-use-classification{ height: 34px; line-height: 34px; color: #505050; font-size: 20px; font-weight: bold;}
        .coupon-use-rules{ margin-bottom: 14px; padding-bottom: 6px; height: 60px; line-height: 20px; color: #505050; font-size: 14px; overflow: hidden;}
        .coupon-use-rules span{ display: block; height: 20px; line-height: 20px;}
        .coupon-operating{ display: block; width: 180px; height: 30px; line-height: 30px; color: #fff; font-size: 14px; font-weight: bold; text-align: center; -webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;}
        .status-ok{ background: #cc0000;}
        .status-alltoken{ background: #828282;}
        .status-received{ background: #ff6600;}
        .status-expired{ background: #b4b4b4;}
        
        .active-pro-list-wrap{ margin: 0 auto; padding-bottom: 10px; width: 1000px;}
        .sec-tit{ height: 90px; line-height: 90px; color: #000; font-size: 32px; font-weight: bold; text-align: center;}
        .pro-list{ width: 1015px;}
        .pro-list li{ position: relative; z-index: 1; float: left; margin: 0 13px 20px 0; width: 240px; height: 360px; background: #fff; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pro-list li:hover{
            -webkit-transform: translate(0,-5px);
            -moz-transform: translate(0,-5px);
        }
        .pro-limit-list li{ height: 460px;}
        .pro-coupon-list li{ height: 420px;}

        .pro-content{ width: 240px;}
        
        .goods-discount{ position: absolute; z-index: 2; top: 10px; right: 10px; padding-top: 4px; width: 40px; height: 36px; line-height: 12px; color: #fff; font-size: 12px; background: #ff6600; -webkit-border-radius: 20px; -moz-border-radius: 20px; -ms-border-radius: 20px; border-radius: 20px; text-align: center;}
        .goods-discount .db{ display: block; height: 20px; line-height: 20px;}
        .goods-discount .db b{ font-size: 18px; font-weight: bold;}
        .goods-time{ padding: 0 10px; height:36px; color:#fff;font-size:14px;background-color:#505050;text-align:center;}
        .goods-time i{display:inline-block; width: 22px; height: 23px; vertical-align:middle; background: url('images/demo_25/clock_ico.png') center center no-repeat;}
        .goods-time span{display:inline-block;vertical-align:middle;height:36px;line-height:36px;padding:0 5px;}

        .goods-img{ padding: 10px; width:220px;height:220px;margin:0 auto;}
        .goods-img a{display:block;width:220px;height:220px;overflow:hidden; text-align: center;}
        .goods-img img{height:220px;width:auto;display:inline;vertical-align:top;}

        .goods-title{ padding: 0 15px; font-size:14px; width:210px;margin:auto; height:20px; line-height:20px; color: #000;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
        .goods-title a{color:#3f4a0d; text-decoration: none;}
        .goods-title a:hover{text-decoration: underline;}

        .goods-price{ padding: 5px 10px; text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{ display: block; height: 20px; line-height: 20px; color:#787878;font-size:14px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{ display: block; height: 24px; line-height: 24px; color:#cc0000;font-size:20px; font-weight: bold;}
        .goods-price .shop-price b{ font-weight: bold;}

        .goods-limit{ padding: 0 10px; width:180px;margin:0 auto 10px;height:50px;position:relative;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#dcdcdc;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #ff6600;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .goods-limit-tips{
            position:absolute;left:0;top:-30px;width:95px; height:20px;font:normal 12px/20px Arial;color: #000;
            background:#fff;border:1px solid #dcdcdc;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-limit-tips b{color:#ff6600; padding-right:5px; font-size: 14px; font-weight: bold;}
        .goods-limit-tips em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .goods-limit-tips em.tri_bd{border-color:#dcdcdc transparent transparent transparent;bottom:-11px;z-index:1;}
        .goods-limit-tips em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}

        .goods-coupon{ margin: 0 auto 10px; padding: 3px 0; width: 188px; height: 36px; border:1px dashed #dcdcdc; text-align: center;}        
        .goods-coupon span{ display: block; height: 16px; line-height: 16px; color: #000; font-size: 12px;}   
        .goods-coupon strong{ display: block; height: 20px; line-height: 20px; color: #ff6600; font-size: 14px; font-weight: bold;}

        .goods-buy{ padding: 0 10px; text-align:center;}
        .goods-buy a{
            display:inline-block;width:190px;height:30px;text-align:center;line-height:30px;background:#ff6600;text-transform:uppercase;
            color:#fff;font-weight:bold;font-size:16px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a i{ display: inline-block; *display: inline; *zoom: 1; margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fff;}
        .goods-buy a.coming-soon{background:#cc0000!important;}
        .goods-buy a.deal-end{ color: #fff; background:#828282!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}

        .collocation-product-box{ margin-bottom: 20px; padding: 20px 30px; width: 940px; height: 280px; background: #fff;}
        .collocation-product-box .goods-img{ margin-bottom: 6px; padding: 0;}
        .collocation-product-box .market-price, .collocation-product-box .shop-price{ padding: 0 5px; display: inline-block;}
        .main-product, .plus-ico, .accessories-product, .total-more{ float: left;}
        .main-product,.accessories-product{ width: 220px; height: 280px;}
        .plus-ico{ padding-top: 95px; width: 150px; height: 185px; text-align: center;}
        .total-more{ margin-left: 50px; padding: 30px 0; width: 300px; height: 220px; text-align: center; background: #ffa200;}
        .old-total{ height: 24px; line-height: 24px; color: #fff; font-size: 16px;}
        .you-save{ height: 36px; line-height: 36px; color: #fff; font-size: 24px; font-weight: bold;}
        .dividing-line{ position: relative; z-index: 1; margin: 0 auto 20px; width: 200px; height: 7px; border-bottom: 1px solid #cc0000;}
        .dividing-line:after{ content: ''; position: absolute; z-index: 2; bottom: -11px; left: 50%; margin-left: -5px; border:5px solid transparent; border-top: 5px solid #cc0000;}
        .final-price{ margin-bottom: 7px;}
        .final-price span{ display: block; height: 20px; line-height: 20px; color: #cc0000; font-size: 16px;}
        .final-price strong{ display: block; height: 60px; line-height: 60px; color: #cc0000; font-size: 40px; font-weight: bold;}
        .view-more-main{ display: block; margin: 0 auto; width: 200px; height: 36px; line-height: 36px; color: #ff8800; font-size: 18px; font-weight: bold; background: #cc0000; -webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px; text-transform: uppercase;}
        .view-more-main:hover{opacity:0.9;filter:alpha(opacity=90);}

        .brands-nav{ margin-bottom: 15px;}
        .brands-nav li{ position: relative; z-index: 1; float: left; margin: 0 2px 2px 0; width: 123px; height: 72px; border-bottom: 2px solid transparent; background: #fff;}
        .brands-nav li a{ display: block; padding: 14px 16px 13px 17px; width: 90px; height: 45px;}
        .brands-nav li img{ width: 90px; height: 45px;}
        .brands-nav li:after{ content: ''; position: absolute; z-index: 2; bottom: -2px; left: 0; width: 123px; height: 2px; background: #ff8533; opacity: 0;
            -webkit-transition: all 0.8s cubic-bezier(.165,.84,.44,1); -moz-transition: all 0.8s cubic-bezier(.165,.84,.44,1); -ms-transition: all 0.8s cubic-bezier(.165,.84,.44,1); transition: all 0.8s cubic-bezier(.165,.84,.44,1);
            -webkit-transform: scaleX(0); -moz-transform: scaleX(0); -ms-transform: scaleX(0); transform: scaleX(0);
            -webkit-transform-origin: 50% 50%; -moz-transform-origin: 50% 50%; -ms-transform-origin: 50% 50%; transform-origin: 50% 50%;
        }
        .brands-nav li.active:after, .brands-nav li:hover:after{ -webkit-transform: scaleX(1); -moz-transform: scaleX(1); -ms-transform: scaleX(1); transform: scaleX(1); opacity: 1;}

        .pro-list .pro-coupon-wrap{ position: relative; z-index: 1; padding-top: 60px; width: 240px; height: 300px; background: #fff url('images/demo_25/brand_coupon_bg.jpg') top center no-repeat;}
        .pro-limit-list .pro-coupon-wrap{ height: 400px;}
        .pro-list .pro-coupon-wrap:after{ content: ''; position: absolute; z-index: 2; bottom: 0; left: 0; width: 240px; height: 2px; background: #ff6600;}
        .b-coupon-value{ padding-left: 30px; height: 70px; line-height: 70px; color: #ff6600; font-size: 48px;}
        .b-coupon-use-classification{ padding-left: 30px; height: 34px; line-height: 34px; color: #505050; font-size: 20px; font-weight: bold;}
        .b-coupon-use-rules{ margin: 0 auto 15px; padding: 0 12px 15px; width: 180px; height: 60px; line-height: 20px; color: #505050; font-size: 14px; overflow: hidden; border-bottom: 1px dashed #dcdcdc;}
        .b-coupon-use-rules span{ display: block; height: 20px; line-height: 20px;}
        .b-coupon-operating{ margin: 0 auto; display: block; width: 180px; height: 30px; line-height: 30px; color: #fff; font-size: 14px; font-weight: bold; text-align: center; -webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;}
        .b-status-ok{ color: #cc0000; border: 1px solid #cc0000;}
        .b-status-alltoken{ color: #828282; border: 1px solid #828282;}
        .b-status-received{ color: #ff6600; border: 1px solid #ff6600;}
        .b-status-expired{ color: #b4b4b4; border: 1px solid #b4b4b4;}

        .active-nav{ position: fixed; z-index: 9999; top: 50%; left: 50%; margin-left: 520px; width: 160px; background: #ff6600;}
        .active-nav li{ height: 36px; line-height: 36px; border-bottom: 1px solid #ffa200; text-align: center;}
        .active-nav li a{ display: block; width: 100%; height: 36px; color: #fff; font-size: 14px;}
        .active-nav .floor-nav.active a, .active-nav .floor-nav:hover a{ background: #ffa200;}
        .active-nav .back-top{ padding: 5px 0; height: 26px;}
        .active-nav .back-top a{ margin: 0 auto; width: 45px; height: 26px; background: url('images/demo_25/top_ico.png') top center no-repeat;}
        
        .active-nav .side-share-wrap{ padding-top: 10px; height: 80px;}
        .active-nav .share-btn{ margin: 0 6px 6px; display:inline-block; width: 33px; height: 33px; border-radius: 50%; *display: inline; *zoom:1; -webkit-transition: 0.5s; transition: 0.5s; background: url('images/demo_25/share_icon.png') no-repeat; vertical-align: middle;}
        .active-nav .share-btn:hover{ -webkit-transform: translate(0, -5px); transform: translate(0, -5px); }
        .active-nav .share-fb{ background-position: 0 0;}
        .active-nav .share-vk{ background-position: -50px 0;}
        .active-nav .share-tw{ background-position: -100px 0;}
        .active-nav .share-google{ background-position: -150px 0;}
        .active-nav .share-reddit{ background-position: -200px 0;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>

    <section class="active-main">
        <div class="active-banner-bg"></div>

        <section class="active-coupon-list-wrap" id="floor1">
            <ul class="coupon-list clearfix translate-up box-shadow">
                <li>
                    <p class="coupon-value o-ellipses">10%</p>
                    <p class="coupon-use-classification o-ellipses">xiaomi</p>
                    <p class="coupon-use-rules">
                        <span class="o-ellipses">· HK ,HK-2,China</span>
                        <span class="o-ellipses">· 12/31/2016 - 12/31/2016</span>
                    </p>
                    <a href="javascript:;" class="coupon-operating status-ok">Discover Deals</a>
                </li>
                <li>
                    <p class="coupon-value o-ellipses">$100</p>
                    <p class="coupon-use-classification o-ellipses">xiaomi</p>
                    <p class="coupon-use-rules">
                        <span class="o-ellipses">· min order $10</span>
                        <span class="o-ellipses">· HK ,HK-2,China</span>
                        <span class="o-ellipses">· 12/31/2016 - 12/31/2016</span>
                    </p>
                    <a href="javascript:;" class="coupon-operating status-alltoken">All Taken</a>
                </li>
                <li>
                    <p class="coupon-value o-ellipses">10%</p>
                    <p class="coupon-use-classification o-ellipses">xiaomi</p>
                    <p class="coupon-use-rules">
                        <span class="o-ellipses">· HK ,HK-2,China</span>
                        <span class="o-ellipses">· 12/31/2016 - 12/31/2016</span>
                    </p>
                    <a href="javascript:;" class="coupon-operating status-received">Already Received</a>
                </li>
                <li>
                    <p class="coupon-value o-ellipses">$100</p>
                    <p class="coupon-use-classification o-ellipses">xiaomi</p>
                    <p class="coupon-use-rules">
                        <span class="o-ellipses">· min order $10</span>
                        <span class="o-ellipses">· HK ,HK-2,China</span>
                        <span class="o-ellipses">· 12/31/2016 - 12/31/2016</span>
                    </p>
                    <a href="javascript:;" class="coupon-operating status-expired">Have Expired</a>
                </li>
            </ul>
        </section><!-- .active-coupon-list-wrap -->

        <section class="active-pro-list-wrap" id="floor2">
            <h3 class="sec-tit">Tablet PCs</h3>

            <ul class="pro-list clearfix">
                <li>
                    <div class="pro-content">
                        <p class="goods-discount"><span class="db"><b>52</b>%</span>OFF</p>
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-discount"><span class="db"><b>52</b>%</span>OFF</p>
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-discount"><span class="db"><b>52</b>%</span>OFF</p>
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-discount"><span class="db"><b>52</b>%</span>OFF</p>
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                    </div>
                </li>
            </ul>
        </section><!-- .active-pro-list-wrap -->

        <section class="active-pro-list-wrap" id="floor3">
            <h3 class="sec-tit">Cell phones</h3>

            <ul class="pro-list clearfix pro-limit-list">
                <li>
                    <div class="pro-content">
                        <p class="goods-time">
                            <i></i>
                            <span class="js-timeCounter" data-time="121225" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-time">
                            <i></i>
                            <span class="js-timeCounter" data-time="9999" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-time">
                            <i></i>
                            <span class="js-timeCounter" data-time="0" data-status="2">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-time">
                            <i></i>
                            <span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
            </ul>
        </section><!-- .active-pro-list-wrap -->

        <section class="active-pro-list-wrap" id="floor4">
            <h3 class="sec-tit">Smart Watch</h3>

            <ul class="pro-list clearfix pro-coupon-list">
                <li>
                    <div class="pro-content">
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-coupon">
                            <span>After Coupon:</span>
                            <strong>test20170204</strong>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-coupon">
                            <span>After Coupon:</span>
                            <strong>test20170204</strong>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-coupon">
                            <span>After Coupon:</span>
                            <strong>test20170204</strong>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-coupon">
                            <span>After Coupon:</span>
                            <strong>test20170204</strong>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-coupon">
                            <span>After Coupon:</span>
                            <strong>test20170204</strong>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-coupon">
                            <span>After Coupon:</span>
                            <strong>test20170204</strong>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-coupon">
                            <span>After Coupon:</span>
                            <strong>test20170204</strong>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-coupon">
                            <span>After Coupon:</span>
                            <strong>test20170204</strong>
                        </p>
                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
            </ul>
        </section><!-- .active-pro-list-wrap -->

        <section class="active-collocation-products-wrap" id="floor5">
            <h3 class="sec-tit">Collocation  Products</h3>
            
            <div class="collocation-product-box clearfix">
                <div class="main-product">
                    <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                </div>

                <div class="plus-ico">
                    <img src="images/demo_25/plus_ico.png" alt="专题通用模板">
                </div>

                <div class="accessories-product">
                    <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="专题通用模板"></a></p>

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
                </div>

                <div class="total-more">
                    <p class="old-total o-ellipses">Total: $179.52</p>
                    <p class="you-save o-ellipses">You Save: $19.23</p>
                    <p class="dividing-line"></p>
                    <p class="final-price">
                        <span>FINAL PRICE:</span>
                        <strong>$160.30</strong>
                    </p>
                    <a href="#" target="special" class="view-more-main">VIEW MORE</a>
                </div>
            </div>

            <div class="collocation-product-box clearfix">
                <div class="main-product">
                    <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                </div>

                <div class="plus-ico">
                    <img src="images/demo_25/plus_ico.png" alt="专题通用模板">
                </div>

                <div class="accessories-product">
                    <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="专题通用模板"></a></p>

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
                </div>

                <div class="total-more">
                    <p class="old-total o-ellipses">Total: $179.52</p>
                    <p class="you-save o-ellipses">You Save: $19.23</p>
                    <p class="dividing-line"></p>
                    <p class="final-price">
                        <span>FINAL PRICE:</span>
                        <strong>$160.30</strong>
                    </p>
                    <a href="#" target="special" class="view-more-main">VIEW MORE</a>
                </div>
            </div>
        </section><!-- .active-collocation-products-wrap -->

        <section class="active-top-brands-wrap" id="floor6">
            <h3 class="sec-tit">Top Brands</h3>

            <ul class="brands-nav clearfix js-brandsNav">
                <li class="active"><a href="javascript:;"><img src="images/demo_25/brand_logo1.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo2.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo3.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo5.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo4.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo6.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo8.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo7.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo9.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo2.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo1.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo3.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo6.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo5.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo7.jpg" alt="专题通用模板"></a></li>
                <li><a href="javascript:;"><img src="images/demo_25/brand_logo4.jpg" alt="专题通用模板"></a></li>
            </ul>

            <ul class="pro-list clearfix js-brandsItem">
                <li class="pro-coupon-wrap">
                    <p class="b-coupon-value o-ellipses">10%</p>
                    <p class="b-coupon-use-classification o-ellipses">xiaomi</p>
                    <p class="b-coupon-use-rules">
                        <span class="o-ellipses">· HK ,HK-2,China</span>
                        <span class="o-ellipses">· 12/31/2016 - 12/31/2016</span>
                    </p>
                    <a href="javascript:;" class="b-coupon-operating b-status-ok">Discover Deals</a>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-discount"><span class="db"><b>52</b>%</span>OFF</p>
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-discount"><span class="db"><b>52</b>%</span>OFF</p>
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-discount"><span class="db"><b>52</b>%</span>OFF</p>
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                    </div>
                </li>
            </ul>

            <ul class="pro-list clearfix js-brandsItem pro-limit-list none">
                <li class="pro-coupon-wrap">
                    <p class="b-coupon-value o-ellipses">$100</p>
                    <p class="b-coupon-use-classification o-ellipses">xiaomi</p>
                    <p class="b-coupon-use-rules">
                        <span class="o-ellipses">· min order $10</span>
                        <span class="o-ellipses">· HK ,HK-2,China</span>
                        <span class="o-ellipses">· 12/31/2016 - 12/31/2016</span>
                    </p>
                    <a href="javascript:;" class="b-coupon-operating b-status-received">Already Received</a>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-time">
                            <i></i>
                            <span class="js-timeCounter" data-time="9999" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-time">
                            <i></i>
                            <span class="js-timeCounter" data-time="0" data-status="2">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
                <li>
                    <div class="pro-content">
                        <p class="goods-time">
                            <i></i>
                            <span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt="专题通用模板"></a></p>

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
                        <p class="goods-limit">             
                            <span class="process-bar">
                            <em class="process-inner" style="width:20%"></em>
                            <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>PCs Left</span>
                            </span>
                        </p>

                        <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                    </div>
                </li>
            </ul>
        </section><!-- .active-top-brands-wrap -->

    </section><!-- .active-main -->

    <nav class="active-nav" id="js-sideNav">
        <ul> 
            <li class="floor-nav"><a href="#floor1">Coupon List</a></li>
            <li class="floor-nav"><a href="#floor2">Tablet PCs</a></li>
            <li class="floor-nav"><a href="#floor3">Cell phones</a></li>
            <li class="floor-nav"><a href="#floor4">Smart Watch</a></li>
            <li class="floor-nav"><a href="#floor5">Collocation Products</a></li>
            <li class="floor-nav"><a href="#floor6">Top Brands</a></li>
            <li class="side-share-wrap">
                <a href="javascript:;" class="share-btn share-fb"></a>
                <a href="javascript:;" class="share-btn share-vk"></a>
                <a href="javascript:;" class="share-btn share-tw"></a>
                <a href="javascript:;" class="share-btn share-google"></a>
                <a href="javascript:;" class="share-btn share-reddit"></a>
            </li>
            <li class="back-top"><a href="#top"></a></li>
        </ul>
    </nav>

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

        //Limit Time
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

        //Brands Change
        $('.js-brandsNav').on('click', 'li', function(){
            var _this = $(this),
                brandsNav = $('.js-brandsNav'),
                index = brandsNav.find('li').index(_this),
                brandsNavSiblings = brandsNav.siblings('.js-brandsItem');

            _this.addClass('active').siblings('li').removeClass('active');
            brandsNavSiblings.eq(index).show().siblings('.js-brandsItem').hide();
        });

        //Floor Click
        (function($){
          var sideNav = $("#js-sideNav");
          $(window).on("scroll",function(){
            if($(this).scrollTop()>=$(".active-banner-bg").outerHeight(true)){
              sideNav.show();
            }
            else{
              sideNav.hide();
            }
          });

          sideNav.css({
            "margin-top":-sideNav.height()/2
          });
          
          sideNav.find("li").find("a").on("click",function(e){
            e.preventDefault();
            var aHash = this.hash;
            $("html,body").animate({
              scrollTop: aHash=="#top" ? 0 : $(aHash).offset().top - 30
            });
          });
        })(jQuery);
    })
</script>

</body>
</html>