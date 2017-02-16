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

        .active-coupon-list-wrap, .active-collocation-products-wrap{ padding-bottom: 30px; margin: 0 auto; width: 1000px;}
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
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>

    <section class="active-main">
        <div class="active-banner-bg"></div>

        <section class="active-coupon-list-wrap">
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

        <section class="active-pro-list-wrap">
            <h3 class="sec-tit">Tablet PCs</h3>

            <ul class="pro-list clearfix">
                <li>
                    <div class="pro-content">
                        <p class="goods-discount"><span class="db"><b>52</b>%</span>OFF</p>
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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

        <section class="active-pro-list-wrap">
            <h3 class="sec-tit">Cell phones</h3>

            <ul class="pro-list clearfix pro-limit-list">
                <li>
                    <div class="pro-content">
                        <p class="goods-time">
                            <i></i>
                            <span class="js-timeCounter" data-time="121225" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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

                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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

        <section class="active-pro-list-wrap">
            <h3 class="sec-tit">Smart Watch</h3>

            <ul class="pro-list clearfix pro-coupon-list">
                <li>
                    <div class="pro-content">
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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
                        <p class="goods-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" alt=""></a></p>

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

        <section class="active-collocation-products-wrap">
            <h3 class="sec-tit">Collocation  Products</h3>

        </section><!-- .active-collocation-products-wrap -->

    </section><!-- .active-main -->

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
                        clearInterval(nailInterval);
                    }
                },1000);
            });
        })();


        // //倒计时
        // function timeCounter() {
        //     $(".js_timeCounter").each(function(i) {
        //         var $this = $(this),
        //         time = $this.data("time"), //时差秒数
        //         status = $this.data("status");//是开始还是结束  status="1" 正在进行 status="0" 还未开始
        //         setInterval(function(){
        //           time--;
        //           //未结束
        //           if (time > 0) {
        //               var seconds = time;
        //               var minutes = Math.floor(seconds / 60);
        //               var hours = Math.floor(minutes / 60);
        //               var days = Math.floor(hours / 24);
        //               var CDay = days;
        //               var CHour = hours % 24;
        //               var CMinute = minutes % 60;
        //               var CSecond = Math.floor(seconds % 60);
        //               if(CDay < 10) {
        //                   CDay = '0' + CDay;
        //               }
        //               if(CHour < 10) {
        //                   CHour = '0' + CHour;
        //               }
        //               if(CMinute < 10) {
        //                   CMinute = '0' + CMinute;
        //               }
        //               if(CSecond < 10) {
        //                   CSecond = '0' + CSecond;
        //               }
        //               //已开始
        //               if(status==1){
        //                 $this.html(jsLg.Other.promoEndsIn+': '+CDay+'丨'+CHour+'丨'+CMinute+'丨'+CSecond);
        //                 $this.parents("li").find(".goods-buy").find("a").removeAttr("class").text(jsLg.Other.buyNow);
        //               }              
        //               //未开始
        //               else{       
        //                   $this.html(jsLg.Other.promoStartsIn+': '+CDay+'丨'+CHour+'丨'+CMinute+'丨'+CSecond);
        //                   $this.parents("li").find(".goods-buy").find("a").addClass("coming-soon").text(jsLg.Other.comingSoon);
        //               }
        //           }
        //           //已结束
        //           else{
        //               $this.html(jsLg.Other.promoEndsIn+': 00丨00丨00 | 00');
        //               $this.parents("li").find(".goods-buy").find("a").addClass("deal-end").text(jsLg.Other.dealEnded);
        //           }
        //         },1000);
        //     });
        // }
        // timeCounter();
    })
</script>

</body>
</html>