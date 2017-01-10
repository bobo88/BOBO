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
        .fall-bonanza-wrap{ padding-bottom: 50px; width: 100%; min-width: 1200px; background: #ff9612;}
        .bottom-shadow{-webkit-box-shadow: 10px 60px 70px #e37718; -moz-box-shadow: 10px 60px 70px #e37718; box-shadow: 10px 60px 70px #e37718;}
        .banner{ background:url(images/demo_4/fall_banner.jpg) top center no-repeat; height:756px;}
        .flash-sale-wrap{ margin: 0 auto 100px; width: 1200px;}
        .flash-sale-wrap .fs-title{ height: 203px;}
        .flash-sale-wrap .fs-box{ padding: 50px 50px 30px 50px; width: 1100px; background: #c5551e; }
        .flash-sale-wrap .fs-top-box{}
        .flash-sale-wrap .fs-top-box .fs-top-pro{ padding: 20px; width: 500px; height: 240px; background:#ffbf09 url(images/demo_4/fs_t_bg.jpg) top center no-repeat;}
        .fs-top-pro .pro-img{ float: left; padding: 20px; width: 200px; height: 200px; background: #fff;}
        .fs-top-pro .pro-info{ padding-top: 30px; width: 250px; text-align: center;}
        .fs-top-pro .pro-info .fs{ margin-bottom: 5px; height: 40px; line-height: 40px; color: #633710; font-size: 34px; font-weight: bold;}
        .fs-top-pro .pro-info .pro-title{ margin-bottom: 5px; height: 40px; line-height: 20px; font-size: 16px; overflow: hidden;}
        .fs-top-pro .pro-info .pro-title a{ color: #633710; text-decoration: none;}
        .fs-top-pro .pro-info .pro-price{ height: 50px; line-height: 50px; color: #fb2f1c; font-size: 30px; overflow: hidden;}
        .fs-top-pro .pro-info .pro-price strong{ font-size: 40px; font-weight: bold;}
        .fs-top-pro .pro-info .buy-btn{ margin: 0 auto; display: block; width: 150px; height: 34px; line-height: 34px; color: #fff; font-size: 18px; -webkit-border-radius: 17px; -moz-border-radius: 17px; -ms-border-radius: 17px; border-radius: 17px; background: #fb6512;}
        .section-bottom-tips{ padding: 20px 0; height: 30px; line-height: 30px; color: #fff; font-size: 24px; text-align: center;}

        .pl-box{}
        .pl-box .slider{ padding-top: 30px; width: 1120px;}
        .pl-box li{ float: left; padding: 20px; width: 220px; margin-right: 20px; margin-bottom: 20px; background-color: #fff; padding-bottom: 15px; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pl-box li:hover{
            -webkit-transform: translate(0,-10px);
            -moz-transform: translate(0,-10px);
        }
        .goods-time{height:30px; color:#fff;font-size:14px;background-color:#666666;text-align:center;}
        .goods-time span{display:inline-block;vertical-align:middle;height:30px;line-height:30px;padding:0 5px;}

        .goods-img{width:170px;height:170px;margin:5px auto 0; padding-bottom: 5px; border-bottom: 1px solid #e7dfb5;}
        .goods-img a{display:block;width:170px;height:170px;overflow:hidden;}
        .goods-img img{height:170px;width:auto;display:inline;vertical-align:top;}

        .goods-title{font-size:14px;width:210px;margin:auto;height:32px;line-height:16px;overflow:hidden;text-align:center;margin-top:10px;}
        .goods-title a{color:#6d6d6d;}
        .goods-title a:hover{color:#333;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#987643;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#fb2f1c;font-size:22px; font-weight: bold;}

        .goods-limit{width:200px;margin:5px auto 0;height:50px;position:relative;}
        .pl-box .goods-limit .market-price{ color: #797979; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#797979;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #fb2f1c;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .goods-limit-tips{
            position:absolute;left:0;top:-30px;width:95px; height:20px;font:normal 12px/20px Arial;
            background:#fff;border:1px solid #fb2f1c;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-limit-tips b{color:#fb2f1c;padding-right:5px;}
        .goods-limit-tips em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .goods-limit-tips em.tri_bd{border-color:#fb2f1c transparent transparent transparent;bottom:-11px;z-index:1;}
        .goods-limit-tips em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}
        .goods-nolimit{text-align:center;font-size:14px;margin-top:15px;color:#fb2f1c;}
        .goods-buy{text-align:center;margin-top:10px;}
        .goods-buy a{
            display:inline-block;width:130px;height:24px;text-align:center;line-height:24px;background:#fb6512;text-transform:uppercase;
            color:#fff;font-weight:bold;font-size:16px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a.coming-soon{background:#666!important;}
        .goods-buy a.deal-end{background:#666!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}

        .share-fb-wrap{ margin: 0 auto 126px; width: 1200px;}
        .sfb-icon-bg{ display: inline-block; *display: inline;*zoom:1; background:url(images/demo_4/sfb_icon_bg.png) no-repeat;}
        .share-fb-wrap .sfb-tit-img{ margin-bottom: 70px; width: 1200px; height: 353px;}
        .share-fb-wrap .sfb-title{ height: 70px; line-height: 70px; color: #633710; font-size: 40px; font-weight: bold; text-align: center;}
        .share-fb-wrap .sfb-time{ margin: 0 auto 30px; width: 300px; height: 40px; line-height: 40px; color: #c5551e; font-size: 30px; text-align: center; border: 1px solid #c5551e;}
        .share-fb-wrap .sfb-pro-box{ padding: 50px 50px 20px 50px; background: #ffbd00; overflow: hidden;}
        .share-fb-wrap .sfb-prolist{ width: 1120px;}
        .share-fb-wrap .sfb-prolist li{ float: left; margin-right: 9px; padding: 15px 14px; width: 240px; height: 370px; text-align: center;}
        .share-fb-wrap .sfb-prolist .pro-1{ background-position: 0 0;}
        .share-fb-wrap .sfb-prolist .pro-2{ background-position: -300px 0;}
        .share-fb-wrap .sfb-prolist .pro-3{ background-position: -600px 0;}
        .share-fb-wrap .sfb-prolist .pro-4{ background-position: -900px 0;}
        .share-fb-wrap .sfb-prolist li .pro-img{ margin: 0 auto 10px; padding: 35px; width: 150px; height: 150px; background: #fff; border-radius: 110px;}
        .share-fb-wrap .sfb-prolist li .pro-price{ margin-bottom: 10px; height: 40px; line-height: 40px; color: #ffde00; font-size: 36px;}
        .share-fb-wrap .sfb-prolist li .pro-price .bizhong{ padding-right: 5px; font-size: 24px;}
        .share-box-wrap{}
        .share-box-wrap .share-before{}
        .share-box-wrap .share-before p{ margin-bottom: 10px; height: 30px; line-height: 30px; color: #fff; font-size: 24px;}
        .share-box-wrap .share-before .share-btn{ display: block; margin: 0 auto; width: 206px; height: 56px; background-position: -1200px -150px;}
        .share-box-wrap .share-before .share-btn:active{ background: url(images/demo_4/sfb_icon_bg.png) no-repeat;background-position: -1200px -150px;}
        .share-box-wrap .share-after{}
        .share-box-wrap .share-after .sfb-icon-bg{ display: block; margin: 0 auto; width: 222px; height: 90px; background-position: -1200px 0;}
        .share-box-wrap .share-after p{ height: 40px; line-height: 40px; color: #000; font-size: 18px;}
        .share-box-wrap .share-after .coupon{ margin: 0 auto; display: block; width: 170px; height: 34px; line-height: 34px; color: #fb2f1c; font-size: 28px; border: 1px dashed #fb2f1c;}

        .ultimate-brands-zone-wrap{ margin: 0 auto 126px; padding-top: 370px; width: 1200px; background: url(images/demo_4/ultimate_brands_zone.jpg) top center no-repeat;}
        .brands-zone-pro-wrap{ margin: 0 auto; padding: 190px 50px 50px 50px; width: 1000px; background: #c5551e;}
        .brands-zone-pro-wrap .slider{ position: relative; z-index: 1;}
        .ub-prolist{ width: 1015px;}
        .ub-prolist .pro-box{ position: relative; float: left; margin: 0 13px 13px 0; padding: 10px; width: 220px; height: 350px; background: #fff; text-align: center; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .ub-prolist .pro-box:hover{
            -webkit-transform: translate(0,-10px);
            -moz-transform: translate(0,-10px);
        }
        .ub-prolist .pro-box .goods-img{ margin: 0; padding: 10px; width: 200px; height: 200px; border: none;}
        .ub-prolist .pro-box .goods-img a{ width: 200px; height: 200px;}
        .ub-prolist .pro-box .goods-img img{ width: 200px; height: 200px;}
        .ub-prolist .pro-box .goods-img .zhekou{ position: absolute; top: -10px; left: -10px; display: block; padding: 17px 0 0 16px; width: 60px; height:70px; color: #fb2f1c; font-size: 24px; font-weight: bold; background: url(images/demo_4/zhekou.png) top center no-repeat; text-align: left;}
        .ub-prolist .pro-box .goods-title{ margin-top: 15px;}
        .ub-prolist .pro-box .goods-price{ margin-top: 15px;}
        .ub-prolist .pro-box .goods-title a{ color: #6d6d6d;}
        
        .top-position-box{ top: -320px; left: 0; width: 1000px; height: 260px;}
        .top-position-box a{ position: absolute; z-index: 2; display: block;}
        .top-position-box .btn-1,.top-position-box .btn-4,.top-position-box .btn-7{ top: 0; left: 0; width: 350px; height: 260px;}
        .top-position-box .btn-2,.top-position-box .btn-5,.top-position-box .btn-8{ width: 120px; height: 30px;}
        .top-position-box .btn-3,.top-position-box .btn-6,.top-position-box .btn-9{ width: 200px; height: 230px;}
        .top-position-box .btn-2{ top: 200px; left: 509px;}
        .top-position-box .btn-3{ top: 18px; left: 770px;}
        .top-position-box .btn-5{ top: 193px; left: 511px;}
        .top-position-box .btn-6{ top: 18px; left: 770px;}
        .top-position-box .btn-8{ top: 200px; left: 529px;}
        .top-position-box .btn-9{ top: 18px; left: 770px;}
        .brands-zone-pro-wrap .control-nav{ position: absolute; z-index: 4; left: 0; top: -50px; height: 15px; width: 100%; text-align: center;}
        .brands-zone-pro-wrap .control-nav li { display: inline-block;*display: inline;*zoom: 1; margin: 0 5px; width: 10px; vertical-align: middle;}
        .brands-zone-pro-wrap .control-nav a{display: inline-block;*display: inline;*zoom: 1; height: 10px; width: 10px; border-radius: 10px; vertical-align: middle; font-size: 0; cursor: pointer; background:#e2aa8f;}
        .brands-zone-pro-wrap .control-nav a.active { border: 1px solid #fff; background: #fff;}
        
        .pro-sort-wrap{ margin: 0 auto 126px; width: 1200px;}
        .pro-sort-wrap .pro-sort-list{ position: relative; margin: 0 auto; padding: 150px 50px 50px 50px; width: 1000px; background: #c5551e;}
        .sort-tit{ position: absolute; top: 50px; height: 50px; background:url(images/demo_4/sort_tit.png) no-repeat; text-indent: -9999px;}
        .sort-tit-1{ left: 392px; width: 316px; background-position: 0 0;}
        .sort-tit-2{ left: 354px; width: 392px; background-position: 0 -100px;}
        .sort-tit-3{ left: 401px; width: 297px; background-position: 0 -200px;}
        .sort-tit-4{ left: 301px; width: 498px; background-position: 0 -300px;}
        .sort-tit-5{ left: 385px; width: 330px; background-position: 0 -400px;}
        .sort-tit-6{ left: 361px; width: 378px; background-position: 0 -500px;}
        .sort-tit-7{ left: 393px; width: 313px; background-position: 0 -600px;}
        .sort-tit-8{ left: 392px; width: 317px; background-position: 0 -700px;}

        .right-nav{ display: none; position: fixed; z-index: 9999; top: 50px; right: 0; padding-top: 130px; width: 203px; height: 500px; background:url(images/demo_4/right_nav.png) top center no-repeat; text-align: center;}
        .promotion-time{ height: 20px; line-height: 20px; color: #633710; font-size: 16px;}
        .go-top{ position: absolute; bottom: 40px; left: 50px; width: 100px; height: 40px;}
        .nav-list{ padding-left: 16px;}
        .nav-list li{ margin-bottom: 6px; width: 160px; height: 30px; line-height: 30px; background: #fff; border-radius: 3px;}
        .nav-list li a{ display: block; height: 30px; color: #633710; font-size: 14px; text-decoration: none; background: #fff;}
        .nav-list li a:hover{ color: #fff; background: #fb6512;}
        .nav-list li a.flash-sale{ color: #ffde00; font-weight: bold; background: #c5551e;}
        .nav-list li a.amazingcoupon{ color: #3b579d; font-weight: bold;}
        .nav-list li a.amazingcoupon:hover{ color:#3b579d; background: #fff;}
        .nav-list li a.amazingcoupon i{ display: inline-block;*display: inline;*zoom: 1; width: 26px; height: 26px; background:url(images/demo_4/icon_fb.png) top center no-repeat; vertical-align: middle;}
        
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>



   <div id="fb-root"></div>
    <div class="fall-bonanza-wrap">
        <div class="banner"></div>
        
        <!-- 1: flash sale -->
        <section class="flash-sale-wrap js-floorTarget" id="js-firstTargetBox">
            <div class="fs-title">
                <img src="images/demo_4/fs_title.jpg" height="203" alt="">
            </div>

            <div class="fs-box bottom-shadow">
                <div class="clearfix fs-top-box">
                    <div class="fl fs-top-pro clearfix">
                        <p class="pro-img fl">
                            <a href="#"><img src="images/demo_4/demo_pro.jpg" width="200" height="200" alt=""></a>
                        </p>
                        
                        <div class="pro-info fr">
                            <p class="fs">FLASH SALE</p>
                            <p class="pro-title"><a href="#">HUAWEI MateBook 2 in 1 Tablet PC Intel Core m3-6Y30</a></p>
                            <p class="pro-price">from USD <strong>9.90</strong></p>
                            <a href="#" class="buy-btn">Grab Deal ></a>
                        </div>
                    </div>
                    <div class="fr fs-top-pro clearfix">
                        <p class="pro-img">
                            <a href="#"></a><img src="images/demo_4/demo_pro.jpg" width="200" height="200" alt=""></a>
                        </p>
                        <div class="pro-info fr">
                            <p class="fs">FLASH SALE</p>
                            <p class="pro-title"><a href="#">HUAWEI MateBook 2 in 1 Tablet PC Intel Core m3-6Y30</a></p>
                            <p class="pro-price">from USD <strong>9.90</strong></p>
                            <a href="#" class="buy-btn">Grab Deal ></a>
                        </div>
                    </div>
                </div>

                <div class="pl-box fs-limit-prolist">
                    <ul class="slider clearfix">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_4/demo_pro.jpg">
                                </a>
                            </p>
                            <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
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

                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_4/demo_pro.jpg">
                                </a>
                            </p>
                            <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
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

                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_4/demo_pro.jpg">
                                </a>
                            </p>
                            <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
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

                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_4/demo_pro.jpg">
                                </a>
                            </p>
                            <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
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

                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_4/demo_pro.jpg">
                                </a>
                            </p>
                            <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
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

                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>
                </div>

                <p class="section-bottom-tips">Limit: 1 Unit per customer</p>
            </div>
        </section>

        <!-- 2: share FB -->
        <section class="share-fb-wrap js-floorTarget">
            <div class="sfb-tit-img bottom-shadow">
                <img src="images/demo_4/sfb_title.jpg" height="353" alt="">
            </div>
            <h3 class="sfb-title">Share on FACEBOOK, Get the Exclusive Price</h3>
            <p class="sfb-time">VALID: SEP 19 - 27</p>

            <div class="sfb-pro-box bottom-shadow">
                <ul class="clearfix sfb-prolist" id="js-shareProWrap">
                    <li class="pro-1 sfb-icon-bg">
                        <p class="pro-img"><a href="#"><img src="images/demo_4/demo_pro.jpg" width="150" height="150" alt=""></a></p>
                        <p class="pro-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="139.99">139.99</b></p>
                        <div class="share-box-wrap">
                            <div class="share-before">
                                <p>SHARE ON</p>
                                <a href="javascript:;" class="share-btn sfb-icon-bg js-shareBtn" data-share-url="http://www.yuanbo88.com/demo/demo_4.php"></a>
                            </div>

                            <div class="share-after none">
                                <div class="sfb-icon-bg">
                                    <p>COUPON PRICE</p>
                                    <strong class="coupon">???</strong>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="pro-2 sfb-icon-bg">
                        <p class="pro-img"><a href="#"><img src="images/demo_4/demo_pro.jpg" width="150" height="150" alt=""></a></p>
                        <p class="pro-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="89.99">89.99</b></p>
                        <div class="share-box-wrap">
                            <div class="share-before">
                                <p>SHARE ON</p>
                                <a href="javascript:;" class="share-btn sfb-icon-bg js-shareBtn" data-share-url="http://www.yuanbo88.com/demo/demo_4.php"></a>
                            </div>

                            <div class="share-after none">
                                <div class="sfb-icon-bg">
                                    <p>COUPON PRICE</p>
                                    <strong class="coupon">???</strong>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="pro-3 sfb-icon-bg">
                        <p class="pro-img"><a href="#"><img src="images/demo_4/demo_pro.jpg" width="150" height="150" alt=""></a></p>
                        <p class="pro-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="28.88">28.88</b></p>
                        <div class="share-box-wrap">
                            <div class="share-before">
                                <p>SHARE ON</p>
                                <a href="javascript:;" class="share-btn sfb-icon-bg js-shareBtn" data-share-url="http://www.yuanbo88.com/demo/demo_4.php"></a>
                            </div>

                            <div class="share-after none">
                                <div class="sfb-icon-bg">
                                    <p>COUPON PRICE</p>
                                    <strong class="coupon">???</strong>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="pro-4 sfb-icon-bg">
                        <p class="pro-img"><a href="#"><img src="images/demo_4/demo_pro.jpg" width="150" height="150" alt=""></a></p>
                        <p class="pro-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="21.33">21.33</b></p>
                        <div class="share-box-wrap">
                            <div class="share-before">
                                <p>SHARE ON</p>
                                <a href="javascript:;" class="share-btn sfb-icon-bg js-shareBtn" data-share-url="http://www.yuanbo88.com/demo/demo_4.php"></a>
                            </div>

                            <div class="share-after none">
                                <div class="sfb-icon-bg">
                                    <p>COUPON PRICE</p>
                                    <strong class="coupon">???</strong>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <p class="section-bottom-tips">Limit: 1 Unit per customer</p>
            </div>
        </section>

        <!-- 3: ultimate_brands_zone -->
        <section class="ultimate-brands-zone-wrap js-floorTarget">
            <div class="brands-zone-pro-wrap bottom-shadow">
                <div class="slider" id="js-ultimateBrandsZone">
                    <ul class="slideList clearfix">
                        <li class="pr">
                            <div class="ub-prolist clearfix">
                                <div class="pro-box">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="images/demo_4/demo_pro.jpg">
                                        </a>
                                        <span class="zhekou">58</span>
                                    </p>
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
                                    <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                                </div>
                            </div>

                            <div class="top-position-box pa">
                                <img src="images/demo_4/oukitel_top.jpg" height="260" alt="">
                                <a href="#" class="btn-1"></a>
                                <a href="#" class="btn-2"></a>
                                <a href="#" class="btn-3"></a>
                            </div>
                        </li>
                        <li class="none">
                            <div class="ub-prolist clearfix">
                                <div class="pro-box">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="images/demo_4/demo_pro.jpg">
                                        </a>
                                        <span class="zhekou">58</span>
                                    </p>
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
                                    <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                                </div>
                                <div class="pro-box">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="images/demo_4/demo_pro.jpg">
                                        </a>
                                        <span class="zhekou">58</span>
                                    </p>
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
                                    <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                                </div>
                            </div>

                            <div class="top-position-box pa">
                                <img src="images/demo_4/teclast_top.jpg" height="260" alt="">
                                <a href="#" class="btn-4"></a>
                                <a href="#" class="btn-5"></a>
                                <a href="#" class="btn-6"></a>
                            </div>
                        </li>
                        <li class="none">
                            <div class="ub-prolist clearfix">
                                <div class="pro-box">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="images/demo_4/demo_pro.jpg">
                                        </a>
                                        <span class="zhekou">58</span>
                                    </p>
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
                                    <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                                </div>
                                <div class="pro-box">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="images/demo_4/demo_pro.jpg">
                                        </a>
                                        <span class="zhekou">58</span>
                                    </p>
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
                                    <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                                </div>
                                <div class="pro-box">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="images/demo_4/demo_pro.jpg">
                                        </a>
                                        <span class="zhekou">58</span>
                                    </p>
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
                                    <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                                </div>
                                <div class="pro-box">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="images/demo_4/demo_pro.jpg">
                                        </a>
                                        <span class="zhekou">58</span>
                                    </p>
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
                                    <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                                </div>
                            </div>

                            <div class="top-position-box pa">
                                <img src="images/demo_4/xiaomi_top.jpg" height="260" alt="">
                                <a href="#" class="btn-7"></a>
                                <a href="#" class="btn-8"></a>
                                <a href="#" class="btn-9"></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 4: -->
        <section class="pro-sort-wrap js-floorTarget">
            <div class="pro-sort-list bottom-shadow">
                <h3 class="sort-tit sort-tit-1">Top Cell Phones</h3>
                <ul class="ub-prolist clearfix">
                    <li class="pro-box">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_4/demo_pro.jpg">
                            </a>
                            <span class="zhekou">58</span>
                        </p>
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
                        <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- 5: -->
        <section class="pro-sort-wrap js-floorTarget">
            <div class="pro-sort-list bottom-shadow">
                <h3 class="sort-tit sort-tit-2">Powerhouse Tablets</h3>
                <ul class="ub-prolist clearfix">
                    <li class="pro-box">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_4/demo_pro.jpg">
                            </a>
                            <span class="zhekou">58</span>
                        </p>
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
                        <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- 6: -->
        <section class="pro-sort-wrap js-floorTarget">
            <div class="pro-sort-list bottom-shadow">
                <h3 class="sort-tit sort-tit-3">Smart Watches</h3>
                <ul class="ub-prolist clearfix">
                    <li class="pro-box">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_4/demo_pro.jpg">
                            </a>
                            <span class="zhekou">58</span>
                        </p>
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
                        <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- 7: -->
        <section class="pro-sort-wrap js-floorTarget">
            <div class="pro-sort-list bottom-shadow">
                <h3 class="sort-tit sort-tit-4">Computers & Networking</h3>
                <ul class="ub-prolist clearfix">
                    <li class="pro-box">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_4/demo_pro.jpg">
                            </a>
                            <span class="zhekou">58</span>
                        </p>
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
                        <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- 8: -->
        <section class="pro-sort-wrap js-floorTarget">
            <div class="pro-sort-list bottom-shadow">
                <h3 class="sort-tit sort-tit-5">Cool Electronics</h3>
                <ul class="ub-prolist clearfix">
                    <li class="pro-box">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_4/demo_pro.jpg">
                            </a>
                            <span class="zhekou">58</span>
                        </p>
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
                        <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- 9: -->
        <section class="pro-sort-wrap js-floorTarget">
            <div class="pro-sort-list bottom-shadow">
                <h3 class="sort-tit sort-tit-6">Fun Toy & Hobbies</h3>
                <ul class="ub-prolist clearfix">
                    <li class="pro-box">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_4/demo_pro.jpg">
                            </a>
                            <span class="zhekou">58</span>
                        </p>
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
                        <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- 10: -->
        <section class="pro-sort-wrap js-floorTarget">
            <div class="pro-sort-list bottom-shadow">
                <h3 class="sort-tit sort-tit-7">Home & Beauty</h3>
                <ul class="ub-prolist clearfix">
                    <li class="pro-box">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_4/demo_pro.jpg">
                            </a>
                            <span class="zhekou">58</span>
                        </p>
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
                        <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- 11: -->
        <section class="pro-sort-wrap js-floorTarget">
            <div class="pro-sort-list bottom-shadow">
                <h3 class="sort-tit sort-tit-8">Other Top Deals</h3>
                <ul class="ub-prolist clearfix">
                    <li class="pro-box">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_4/demo_pro.jpg">
                            </a>
                            <span class="zhekou">58</span>
                        </p>
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
                        <p class="goods-buy"><a href="#" target="special">shop now</a></p>
                    </li>
                </ul>
            </div>
        </section>

    </div><!-- .fall-bonanza-wrap -->
    
    <div class="right-nav" id="js-rightNav">
        <p class="promotion-time">Starts: Sep 19 - 27</p>
        <ul class="nav-list">
            <li><a href="javascript:;" class="flash-sale">FLASH SALE</a></li>
            <li><a href="javascript:;" class="amazingcoupon">Amazing Coupon <i></i></a></li>
            <li><a href="javascript:;">Ultimate Brands Zone</a></li>
            <li><a href="javascript:;">Top Cell Phones</a></li>
            <li><a href="javascript:;">Powerhouse Tablets</a></li>
            <li><a href="javascript:;">Smart Watches</a></li>
            <li><a href="javascript:;">Computers & Networking</a></li>
            <li><a href="javascript:;">Cool Electronics</a></li>
            <li><a href="javascript:;">Fun Toy & Hobbies</a></li>
            <li><a href="javascript:;">Home & Beauty</a></li>
            <li><a href="javascript:;">Other Top Deals</a></li>
        </ul>
        <a href="javascript:;" class="go-top js-goTop"></a>
    </div>

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->


<script>
$LAB.script("jquery.flexslider.min.js")
    .wait(function(){
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

                if(status === 1){//start
                    returnObj = {
                        title:'PROMO STARTS IN',
                        cDay: CDay,
                        CHour: CHour,
                        CMinute: CMinute,
                        CSecond: CSecond
                    };
                }else{//not start
                    returnObj = {
                        title:'PROMO BEGINS IN',
                        cDay: CDay,
                        CHour: CHour,
                        CMinute: CMinute,
                        CSecond: CSecond
                    };
                }

                return returnObj;
            }

            (function($){
                var $flexBox = $('#js-ultimateBrandsZone');
                $flexBox.flexslider({
                    namespace:"",
                    animation: "fade",
                    selector: ".slideList > li",
                    pauseOnAction:false,
                    controlNav: true,
                    directionNav: false, 
                    slideshowSpeed: 10000
                });
            })(jQuery);

            (function(){
                var timeCounter = $('.js-timeCounter');
                $.each(timeCounter, function(index, val) {
                    var that = $(val);
                    var time = parseInt(that.attr('data-time'));
                    var status = parseInt(that.attr('data-status'));
                    var limitObj = {};

                    var nailInterval = setInterval(function(){
                        time--;
                        if(time > 0){
                            var preS = status === 1 ? 'Ends In:' : 'Begins In:';
                            limitObj = limitTime(time, status);
                            that.html(preS + '<span>'+ limitObj.cDay +'</span>:<span>'+ limitObj.CHour +'</span>:<span>'+ limitObj.CMinute +'</span>:<span>'+ limitObj.CSecond +'</span>');
                        }else{
                            clearInterval(nailInterval);
                        }
                    },1000);
                });
            })();

            //show hide right-nav
            $(window).scroll(function(event) {
                var $wind = $(window),
                    windScrollH = $(window).scrollTop(),
                    firstTargetTop = $('#js-firstTargetBox').offset().top;
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

            $('.js-goTop').click(function(){
                $('html,body').animate({scrollTop: 0},500); 
            });


            function shareSuc(self,index){
                var that = self;
                $.ajax({
                    url: '../demo/images/demo_4/demo.json',
                    type: 'get',
                    dataType: 'json',
                    success: function(data){
                        if(data.status == 1){
                            GLOBAL.PopObj.alert({content: 'Thank you for sharing!'});
                            that.parents('.share-before').hide().siblings('.share-after').show().find('.coupon').html(data.data[index]);
                        }else{
                            GLOBAL.PopObj.alert({content: data.msg});
                        }
                    }
                })
            }    

            function shareDalod(self,index){
                var _self = self;
                var index = index;
                var href = _self.attr("data-share-url");

                // FB.ui({
                //    display: 'popup',
                //    method: 'share',
                //    href: window.location.href,
                // }, function(response){
                //     if(response && !response.error_code){
                        shareSuc(self,index);
                //     }
                // });
            };

            $("#js-shareProWrap").on('click', '.js-shareBtn', function() {
                var that = $(this),
                    index = $("#js-shareProWrap").find('.js-shareBtn').index(that);

                if($.cookie('username')){//user is sign
                    shareDalod(that,index);
                }else{
                    window.location.href = 'http://www.yuanbo88.com/sign.php?ref=' + encodeURIComponent(window.location.href);
                }
            });
        });
    })
</script>

</body>
</html>