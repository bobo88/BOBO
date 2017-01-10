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
        @font-face { font-family: 'icomoon'; src: url('images/demo_15/font/icomoon.eot?s9d7r8'); src: url('images/demo_15/font/icomoon.eot?s9d7r8#iefix') format('embedded-opentype'), url('images/demo_15/font/icomoon.ttf?s9d7r8') format('truetype'), url('images/demo_15/font/icomoon.woff?s9d7r8') format('woff'), url('images/demo_15/font/icomoon.svg?s9d7r8#icomoon') format('svg'); font-weight: normal; font-style: normal }
        .icon-tools:before { content: "\e90c";}
        .icon-bottle:before { content: "\e90d";}
        .icon-toys:before { content: "\e90e";}
        .icon-car:before { content: "\e90f";}
        .icon-airpod:before { content: "\e910";}
        .icon-led:before { content: "\e911";}
        .icon-ball:before { content: "\e912";}
        .icon-beauty:before { content: "\e913";}
        .icon-home:before { content: "\e914";}
        .icon-watch:before { content: "\e915";}
        .icon-bag:before { content: "\e916";}
        .icon-cloth:before { content: "\e917";}
        .icon-pc:before { content: "\e918";}
        .icon-headphone:before { content: "\e919";}
        .icon-tablet:before { content: "\e91a";}
        .icon-phone:before { content: "\e91b";}
        .icon-heart:before { content: "\e91c";}
        .icon-star:before { content: "\f007";}
        .icon-star-o:before { content: "\f008";}
        .icon-cart:before { content: "\f07b";}
        .icon-cat:before { content: "\e902";}
        .christmas-wrap i { font-family: 'icomoon' !important; speak: none; font-style: normal; font-weight: normal; font-variant: normal; text-transform: none; line-height: 1; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}
        .christmas-wrap .my_shop_price i { font-family: Arial !important;}
        .christmas-wrap .shopPrice i {font-weight: bold;}

        .christmas-wrap{ position: relative; z-index: 1; padding-top: 600px; width: 100%; min-width: 1000px; font-family:Arial; background: #fff; background: url(images/demo_15/christmas_bg.jpg) top center no-repeat;}
        .christmas-content{ position: relative; z-index: 1; width: 100%; min-width: 1000px; background: url(images/demo_15/christmas_repeatbg.jpg) repeat-y;}
        .w1000{ margin: 0 auto; width: 1000px;}
        .coupon-list{ padding-bottom: 250px; width: 100%; height: 150px;}
        .coupon-list-con{}
        .coupon-list-con ul{}
        .coupon-list-con ul li{ float: left; padding: 30px 15px 30px 55px; width: 180px; height: 90px;}
        .coupon-detail{ width: 180px; height: 90px;}
        .coupon-detail .coupon-tit{ padding-bottom: 6px; height: 14px; line-height: 14px; color: #fff; font-size: 14px; font-weight: bold; text-align: center;}
        .coupon-detail .use-rule-wrap{ position: relative; z-index: 1; margin-bottom: 5px;}
        .coupon-detail .rule-con{ width: 95px; height: 42px; line-height: 14px; color: #fff; font-size: 12px; overflow: hidden;}
        .coupon-detail .coupon-price{ position: absolute; z-index: 1; top: 0; right: 0; padding: 0 30px 0 15px; height: 42px; line-height: 42px; color: #ffe401; font-size: 26px;}
        .coupon-detail .coupon-price .icon-left{ position: absolute; z-index: 2; bottom: 0; left: 0; width: 14px; height: 30px; line-height: 30px; font-size: 18px;}
        .coupon-detail .coupon-price .v-top{ position: absolute; z-index: 2; top: 0; right: 0; width: 28px; line-height: 24px; height: 24px; font-size: 18px;}
        .coupon-detail .coupon-btn-wrap{ padding-right: 20px;}
        .coupon-detail .get-coupon-btn{ display: inline-block; padding: 0 5px; height: 18px; line-height: 18px; color: #9f000a; font-size: 12px; font-weight: bold; text-align: center;*display: inline;*zoom:1; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;}
        .coupon-detail .get-coupon-btn.is-ok{ background: #ffe372;}
        .coupon-detail .get-coupon-btn.is-received{ background: #fff;}
        .coupon-detail .get-coupon-btn.is-end{ padding: 0 15px; color: #666; background: #ccc;}


        .pro-list-wrap li{ float: left; width: 215px; margin-right: 6px; margin-bottom: 8px; background-color: #fff; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pro-list-wrap li:hover{
            -webkit-transform: translate(0,-5px);
            -moz-transform: translate(0,-5px);
        }
        .goods-time{height:30px; color:#fff;font-size:14px;background-color:#174569;text-align:center;}
        .goods-time span{display:inline-block;vertical-align:middle;height:30px;line-height:30px;padding:0 5px;}

        .goods-img{width:170px;height:170px;margin:0 auto; padding: 5px 0; border-bottom: 1px solid #e7dfb5;}
        .goods-img a{display:block;width:170px;height:170px;overflow:hidden; text-align: center;}
        .goods-img img{height:170px;width:auto;display:inline;vertical-align:top;}

        .goods-title{font-size:14px;width:210px;margin:auto;height:32px;line-height:16px;overflow:hidden;text-align:center;margin-top:10px;}
        .goods-title a{color:#000; text-decoration: none;}
        .goods-title a:hover{color:#333; text-decoration: underline;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#b1b0b4;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#d82425;font-size:22px; font-weight: bold;}

        .goods-limit{width:200px;margin:5px auto 0;height:50px;position:relative;}
        .goods-limit .market-price{ color: #b1b0b4; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#d72e2f;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #ffe372;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
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
            display:inline-block;width:130px;height:24px;text-align:center;line-height:24px;background:#d72e2f;text-transform:uppercase;
            color:#fff;font-weight:bold;font-size:14px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a i{ display: inline-block; *display: inline; *zoom: 1; margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fff;}
        .goods-buy a.coming-soon{background:#efb202!important;}
        .goods-buy a.deal-end{ color: #5d5d5d; background:#b7b7b3!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}

        .pro-list-wrap .toCart { width: 47px; height: 47px; display: inline-block; vertical-align: bottom; background: no-repeat; background-size: cover; float: right; position: relative; overflow: hidden; cursor: pointer }
        .pro-list-wrap .toCart:hover:before { width: 150%; height: 150% }
        .pro-list-wrap .toCart:before { content: ''; position: absolute; background: #e3f5ff; border-radius: 50%; width: 200%; height: 200%; left: 0; top: 0; -webkit-transition: all .2s ease-in-out; transition: all .2s ease-in-out }
        .pro-list-wrap .toCart:after { content: url(images/demo_15/cart.png); width: 47px; height: 47px; position: absolute; left: 2px; top: 0 }

        
        .sec-pb{ position: relative; z-index: 1; top: -40px; padding: 158px 0 155px;}
        .sec-pb:before{ position: absolute; z-index: 2; top: 0; left: -17px; content: ''; display: inline-block; width: 1034px; height: 158px; background: url(images/demo_15/sec_top.png) top center no-repeat;}
        .sec-pb:after{ position: absolute; z-index: 2; bottom: 80px; left: 0; content: ''; display: inline-block; width: 1000px; height: 155px; background: url(images/demo_15/sec_foot.png) top center no-repeat;}
        .sec-main-bg{ background: url(images/demo_15/sec_main.png) repeat-y;}
        .pb-tit{ margin: 0 auto; padding-top: 12px; width: 970px; height: 100px; line-height: 100px; color: #fff; font-size: 34px; font-weight: bold; background: url(images/demo_15/sec_tit.png) top center no-repeat; text-align: center;}
        .flash-sale-wrap{ position: relative; z-index: 1; top: -200px; left: 0;}
        .flash-sale-wrap .fs-tit{}
        .flash-sale-wrap .fs-pro-list .fs-tips{ position: absolute; z-index: 3; top: 60px; left: 0; width: 1000px; height: 30px; line-height: 30px; color: #ca2a11; font-size: 16px; font-weight: bold; text-align: center;}
        .flash-sale-wrap .fs-pro-list ul{ position: relative; z-index: 5; top: -50px; padding: 0 28px; width: 944px;}
        .flash-sale-wrap .fs-pro-list ul li{ float: left; margin-right: 6px; width: 230px; height: 390px;}
        .flash-sale-wrap .fs-pro-list ul li .toCart{ position: absolute; bottom: 0; right: 0;}

        .category { font-size: 0; width: 910px; margin: auto;}
        .category span { position: relative; z-index: 1; color: #d72e2f; font-size: 14px; display: inline-block; width: 100px; height: 100px; padding: 0 5px; text-align: center; -webkit-box-sizing: border-box; box-sizing: border-box; margin: 0 7px 8px 6px; vertical-align: top; border-width: 1px; border-style: solid; border-color: transparent; -webkit-transition: all .2s ease; transition: all .2s ease; cursor: pointer; -webkit-border-radius: 50%; border-radius: 50%;}
        .category span .icon-cat{ position: absolute; z-index: 2; top: -20px; right: -10px; display: none; width: 59px; height: 51px; background: url(images/demo_15/sort_cat.png) no-repeat; -webkit-transition: all .2s ease; transition: all .2s ease;}
        .category span.active, .category span:hover { background: #fff; -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.5); -moz-box-shadow: 0 2px 10px rgba(0,0,0,.5); box-shadow: 0 2px 10px rgba(0,0,0,.5);}
        .category span.active .icon-cat, .category span:hover .icon-cat{ display: block; -webkit-transition: all .2s ease; transition: all .2s ease;}

        @-webkit-keyframes shake {  
            0%, 100% {-webkit-transform: translateX(0);}  
            10%, 30%, 50%, 70%, 90% {-webkit-transform: translateX(-5px);}  
            20%, 40%, 60%, 80% {-webkit-transform: translateX(5px);}  
        }  
        @-moz-keyframes shake {  
            0%, 100% {-moz-transform: translateX(0);}  
            10%, 30%, 50%, 70%, 90% {-moz-transform: translateX(-5px);}  
            20%, 40%, 60%, 80% {-moz-transform: translateX(5px);}  
        }   
        .category span:hover .icon-cat{
            -webkit-animation-name:shake;  
            -webkit-animation-duration:1s;  
            -moz-animation-name:shake;  
            -moz-animation-duration:1s;
        }
        .category span:nth-of-type(2) { padding: 0 20px;}
        .category i { display: block; font-size: 24px; margin: auto; color: #234f72; text-align: center; margin-bottom: 5px;margin-top: 10px;}

        .cate-sort-wrap{ position: relative; z-index: 1; top: -300px;}
        .cate-sort-wrap .sec-pb:after{ bottom: 60px;}
        .cate-sort-nav{ position: relative; z-index: 5; top: -50px; padding: 0 48px; width: 904px;}
        .cate-sort-cont{ position: relative; z-index: 1; top: -50px; padding: 0 48px; width: 904px;}
        .cate-sort-cont .pro-list-wrap li{ float: left; margin-right: 6px; width: 220px; height: 350px; background: #d72e2f;}
        .cate-sort-cont .pro-list-wrap li .goods-img{ padding: 20px 0; width: 100%; background: #fff;}
        .cate-sort-cont .pro-list-wrap li .goods-img a{ margin: 0 auto;}
        .cate-sort-cont .pro-list-wrap li .goods-title{ height: 16px; line-height: 16px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #fff;}
        .cate-sort-cont .pro-list-wrap li .goods-title a{ color: #fff;}
        .cate-sort-cont .pro-list-wrap li .market-price{ display: block; padding-bottom: 10px; color: #fff;}
        .cate-sort-cont .pro-list-wrap li .shop-price{ color: #ffe372;}
        .cate-sort-cont .pro-list-wrap li .goods-buy a{ width: 90px; color: #e92a2a; background: #ffe372;}
        .cate-sort-cont .pro-list-wrap .toCart{ position: absolute; bottom: 0; right: 0;}
        .cate-sort-cont .pro-list-wrap .toCart:before{ background: #780000;}
        .cate-sort-cont .pro-list-wrap .toCart:after{ content: url(images/demo_15/cart2.png);}

        .brand-sort-wrap{ position: relative; z-index: 1; top: -400px;}
        .brand-sort-wrap .brandsort{}
        .brand-sort-wrap .brandsort span{ padding: 35px 0; margin: 0 40px 10px 39px; width: 102px; height: 102px;}
        /* .brand-sort-wrap .brandsort span:nth-of-type(2) { padding: 0 5px;} */
        .brand-sort-wrap .brandsort .icon-brand{ display: inline-block; width: 100px; height: 30px; *display: inline; *zoom: 1;}
        .brand-sort-wrap .brandsort .icon-cube{ background: url(images/demo_15/cube.png) no-repeat;}
        .brand-sort-wrap .brandsort .icon-jjrc{ background: url(images/demo_15/jjrc.png) no-repeat;}
        .brand-sort-wrap .brandsort .icon-neje{ background: url(images/demo_15/neje.png) no-repeat;}
        .brand-sort-wrap .brandsort .icon-ulefone{ background: url(images/demo_15/ulefone.png) no-repeat;}
        .brand-sort-wrap .brandsort .icon-vernee{ background: url(images/demo_15/vernee.png) no-repeat;}
        .brand-sort-wrap .brandsort .icon-ubsan{ background: url(images/demo_15/ubsan.png) no-repeat;}
        .brand-sort-wrap .brandsort .icon-dtno1{ background: url(images/demo_15/dtno1.png) no-repeat;}
        .brand-sort-wrap .brandsort .icon-teclast{ background: url(images/demo_15/teclast.png) no-repeat;}
        .brand-sort-wrap .brandsort .icon-sunvell{ background: url(images/demo_15/sunvell.png) no-repeat;}
        .brand-sort-wrap .brandsort .icon-oukitel{ background: url(images/demo_15/oukitel.png) no-repeat;}

        .cate-sort-cont .pro-list-wrap .brand-li-first{ background: none;}
        .cate-sort-cont .brand-left{ position: absolute; z-index: 2; left: 5px; top: -72px; width: 293px; height: 422px; background: url(images/demo_15/brand_left_bg.png) no-repeat;}
        .cate-sort-cont .brand-left .coupon-detail{ position: absolute; z-index: 2; bottom: 25px; right: 40px;}
        .cate-sort-cont .brand-left .brand-more{ position: absolute; z-index: 3; top: 40px; left: 20px;}
        .cate-sort-cont .brand-left .brand-more .brank-more-link{ position: absolute; bottom: 0; left: 25px; display: block; width: 130px; height: 26px; line-height: 26px; color: #d72e2f; font-size: 14px; font-weight: bold; background: #ffe372; text-align: center; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
        .cate-sort-cont .brand-left .cube-more-bg{ width: 234px; height: 119px; background: url(images/demo_15/cube_more.png) no-repeat;}
        .cate-sort-cont .brand-left .jjrc-more-bg{ width: 211px; height: 119px; background: url(images/demo_15/jjrc_more.png) no-repeat;}
        .cate-sort-cont .brand-left .neje-more-bg{ width: 222px; height: 119px; background: url(images/demo_15/neje_more.png) no-repeat;}
        .cate-sort-cont .brand-left .ulefone-more-bg{ width: 242px; height: 104px; background: url(images/demo_15/ulefone_more.png) no-repeat;}
        .cate-sort-cont .brand-left .vernee-more-bg{ width: 219px; height: 104px; background: url(images/demo_15/vernee_more.png) no-repeat;}
        .cate-sort-cont .brand-left .ubsan-more-bg{ width: 227px; height: 104px; background: url(images/demo_15/ubsan_more.png) no-repeat;}
        .cate-sort-cont .brand-left .dtno1-more-bg{ width: 193px; height: 119px; background: url(images/demo_15/dtno1_more.png) no-repeat;}
        .cate-sort-cont .brand-left .teclast-more-bg{ width: 248px; height: 104px; background: url(images/demo_15/teclast_more.png) no-repeat;}
        .cate-sort-cont .brand-left .sunvell-more-bg{ width: 239px; height: 104px; background: url(images/demo_15/sunvell_more.png) no-repeat;}
        .cate-sort-cont .brand-left .oukitel-more-bg{ width: 237px; height: 104px; background: url(images/demo_15/oukitel_more.png) no-repeat;}

        .find-more-wrap{ position: relative; z-index: 1; top: -500px;}
        .find-more-list{ padding: 0 42px; width: 916px;}
        .find-more-list li{
            -webkit-transition: transform 0.6s ease;
            -o-transition: transform 0.6s ease;
            transition: transform 0.6s ease;
        }
        .find-more-list li:hover{
            -webkit-transform: translateY(-5px);
                -ms-transform: translateY(-5px);
                -o-transform: translateY(-5px);
                transform: translateY(-5px);
        }
        .warehouse{ margin-bottom: 30px;}
        .warehouse li{ float: left; margin-right: 5px; width: 300px; height: 167px; background: url(images/demo_15/warehouse_bg.png) no-repeat;}
        .warehouse li a{ display: block; padding: 30px 10px 7px; width: 280px; height: 130px;}
        .warehouse li a img{ height: 130px;}
        .activity{}
        .activity li{ width: 441px; height: 167px; background: url(images/demo_15/activity_bg.png) no-repeat;}
        .activity li a{ display: block; padding: 30px 26px 7px 15px; width: 400px; height: 130px;}
        .activity li a img{ height: 130px;}

        .fixed-nav-wrap{ position: fixed; z-index: 9999; display: none; padding-top: 178px;}
        .fixed-nav-wrap a{ margin: 0 11px 6px 17px; display: block; width: 170px; height: 38px; line-height: 38px; color: #fff; font-size: 12px; text-align: center;}
        .fixed-nav-wrap .goto-top{ position: absolute; z-index: 999; bottom: 0; left: 75px; margin: 0; padding: 0; width: 56px; height: 56px; -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%;}
        .left-nav-wrap{ top: 50px; right: 50%; margin-right: 500px; width: 198px; height: 302px; background: url(images/demo_15/left_nav_bg.png) no-repeat;}

        .right-nav-wrap{ top: 50px; left: 50%; margin-left: 500px; width: 198px; height: 258px; background: url(images/demo_15/right_nav_bg.png) no-repeat;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>

    <div id="snowfall"></div>
    
    <div class="christmas-wrap">
        <section class="coupon-list">
            <div class="coupon-list-con w1000">
                <ul class="clearfix">
                    <li>
                        <div class="coupon-detail">
                            <h5 class="coupon-tit">Cell Phones</h5>
                            <div class="use-rule-wrap clearfix">
                                <p class="rule-con fl">
                                    · Min Order:$50<br/>
                                    · HK,HK-2,China<br/>
                                    · 11/30/2016<br/>
                                </p>
                                <p class="coupon-price fr">
                                    <span class="icon-left">$</span>125 <span class="v-top">.93</span>
                                </p>
                            </div>
                            <p class="coupon-btn-wrap tc">
                                <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="coupon-detail">
                            <h5 class="coupon-tit">Cell Phones</h5>
                            <div class="use-rule-wrap clearfix">
                                <p class="rule-con fl">
                                    · Min Order:$50<br/>
                                    · HK,HK-2,China<br/>
                                    · 11/30/2016<br/>
                                </p>
                                <p class="coupon-price fr">
                                    <span class="icon-left"></span>25 <span class="v-top">%</span>
                                </p>
                            </div>
                            <p class="coupon-btn-wrap tc">
                                <a href="javascript:;" class="get-coupon-btn js-getCoupon is-received">Already Received</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="coupon-detail">
                            <h5 class="coupon-tit">Cell Phones</h5>
                            <div class="use-rule-wrap clearfix">
                                <p class="rule-con fl">
                                    · Min Order:$50<br/>
                                    · HK,HK-2,China<br/>
                                    · 11/30/2016<br/>
                                </p>
                                <p class="coupon-price fr">
                                    <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                </p>
                            </div>
                            <p class="coupon-btn-wrap tc">
                                <a href="javascript:;" class="get-coupon-btn js-getCoupon is-end">All Taken</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="coupon-detail">
                            <h5 class="coupon-tit">Cell Phones</h5>
                            <div class="use-rule-wrap clearfix">
                                <p class="rule-con fl">
                                    · Min Order:$50<br/>
                                    · HK,HK-2,China<br/>
                                    · 11/30/2016<br/>
                                </p>
                                <p class="coupon-price fr">
                                    <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                </p>
                            </div>
                            <p class="coupon-btn-wrap tc">
                                <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </section><!-- .coupon-list -->

        <section class="christmas-content">
            <div class="flash-sale-wrap w1000 js-floorTarget">
                <h3 class="fs-tit pb-tit">XMAS FLASH SALE GO!</h3>
                <div class="fs-pro-list pro-list-wrap sec-pb">
                    <h4 class="fs-tips">All FLASH PRICES have LIMITED STOCK. Grab them FAST!</h4>
                    <ul class="clearfix sec-main-bg">
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
                </div>
            </div><!-- .flash-sale-wrap -->

            <div class="cate-sort-wrap w1000 js-floorTarget">
                <h3 class="fs-tit pb-tit">CATEGORY DISPLAY</h3>
                <div class="cs-pro-list sec-pb">
                    <div class="sec-main-bg">
                        <div class="cate-sort-nav js-sortNav">
                            <div class="clearfix category">
                                <span class="active"><i class="icon-phone"></i> Mobile Phones <em class="icon-cat"></em></span>
                                <span><i class="icon-tablet"></i>Cool Tablets  <em class="icon-cat"></em></span>
                                <span><i class="icon-headphone"></i>Consumer Electronics <em class="icon-cat"></em></span>
                                <span><i class="icon-pc"></i>Computers & Networking <em class="icon-cat"></em></span>
                                <span><i class="icon-tools"></i>Electrical & Tools <em class="icon-cat"></em></span>
                                <span><i class="icon-cloth"></i>Stylish Apparel <em class="icon-cat"></em></span>
                                <span><i class="icon-airpod"></i>Mobile Accessories <em class="icon-cat"></em></span>
                                <span><i class="icon-toys"></i>Toys & Hobbies <em class="icon-cat"></em></span>
                                <span><i class="icon-home"></i>Home & Garden <em class="icon-cat"></em></span>
                                <span><i class="icon-watch"></i>Watches & Jewelry <em class="icon-cat"></em></span>
                                <span><i class="icon-bag"></i>Bags & Shoes <em class="icon-cat"></em></span>
                                <span><i class="icon-ball"></i>Outdoors & Sports <em class="icon-cat"></em></span>
                                <span><i class="icon-led"></i>LED Lights & Flashlights <em class="icon-cat"></em></span>
                                <span><i class="icon-bottle"></i>Baby & Kids <em class="icon-cat"></em></span>
                                <span><i class="icon-car"></i>Automobiles & Motorcycle <em class="icon-cat"></em></span>
                                <span><i class="icon-beauty"></i>Health & Beauty <em class="icon-cat"></em></span>
                            </div>
                        </div>


                        <div class="cate-sort-cont js-sortItem">
                            <ul class="clearfix pro-list-wrap">
                                <li class="pr">
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

                        <div class="cate-sort-cont none js-sortItem">
                            <ul class="clearfix pro-list-wrap">
                                <li class="pr">
                                    <div class="border-wrap">
                                        <p class="goods-img pr">
                                            <a href="#" target="special">
                                                <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_2.jpg">
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
                    </div>
                </div>
            </div><!-- .cate-sort-wrap -->


            <div class="cate-sort-wrap brand-sort-wrap w1000 js-floorTarget">
                <h3 class="fs-tit pb-tit">SANTA BRAND PARTY</h3>
                <div class="cs-pro-list sec-pb">
                    <div class="sec-main-bg">
                        <div class="cate-sort-nav js-sortNav">
                            <div class="clearfix brandsort category">
                                <span class="active"><em class="icon-brand icon-cube"></em> <em class="icon-cat"></em></span>
                                <span><em class="icon-brand icon-jjrc"></em> <em class="icon-cat"></em></span>
                                <span><em class="icon-brand icon-neje"></em> <em class="icon-cat"></em></span>
                                <span><em class="icon-brand icon-ulefone"></em> <em class="icon-cat"></em></span>
                                <span><em class="icon-brand icon-vernee"></em> <em class="icon-cat"></em></span>
                                <span><em class="icon-brand icon-ubsan"></em> <em class="icon-cat"></em></span>
                                <span><em class="icon-brand icon-dtno1"></em> <em class="icon-cat"></em></span>
                                <span><em class="icon-brand icon-teclast"></em> <em class="icon-cat"></em></span>
                                <span><em class="icon-brand icon-sunvell"></em> <em class="icon-cat"></em></span>
                                <span><em class="icon-brand icon-oukitel"></em> <em class="icon-cat"></em></span>
                            </div>
                        </div>

                        <!-- CUBE -->
                        <div class="cate-sort-cont js-sortItem">
                            <div class="brand-left">
                                <div class="coupon-detail">
                                    <h5 class="coupon-tit">CUBE</h5>
                                    <!-- brand: cube and so on -->
                                    <div class="use-rule-wrap clearfix">
                                        <p class="rule-con fl">
                                            · Min Order:$50<br/>
                                            · HK,HK-2,China<br/>
                                            · 11/30/2016<br/>
                                        </p>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>
                                    <p class="coupon-btn-wrap tc">
                                        <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                                    </p>
                                </div>
                                <div class="brand-more cube-more-bg">
                                    <!-- cube-more-bg / jjrc-more-bg and so on-->
                                    <a href="#" class="brank-more-link">MORE DEALS ></a>
                                </div>
                            </div>

                            <ul class="clearfix pro-list-wrap">
                                <li class="pr brand-li-first"><!-- empty --></li>

                                <li class="pr">
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
                        
                        <!-- jjrc -->
                        <div class="cate-sort-cont none js-sortItem">
                            <div class="brand-left">
                                <div class="coupon-detail">
                                    <h5 class="coupon-tit">JJRC</h5>
                                    <div class="use-rule-wrap clearfix">
                                        <p class="rule-con fl">
                                            · Min Order:$50<br/>
                                            · HK,HK-2,China<br/>
                                            · 11/30/2016<br/>
                                        </p>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>
                                    <p class="coupon-btn-wrap tc">
                                        <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                                    </p>
                                </div>
                                <div class="brand-more jjrc-more-bg">
                                    <a href="#" class="brank-more-link">MORE DEALS ></a>
                                </div>
                            </div>

                            <ul class="clearfix pro-list-wrap">
                                <li class="pr brand-li-first"><!-- empty --></li>

                                <li class="pr">
                                    <div class="border-wrap">
                                        <p class="goods-img pr">
                                            <a href="#" target="special">
                                                <img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_3.jpg">
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

                        <!-- neje -->
                        <div class="cate-sort-cont none js-sortItem">
                            <div class="brand-left">
                                <div class="coupon-detail">
                                    <h5 class="coupon-tit">NEJE</h5>
                                    <div class="use-rule-wrap clearfix">
                                        <p class="rule-con fl">
                                            · Min Order:$50<br/>
                                            · HK,HK-2,China<br/>
                                            · 11/30/2016<br/>
                                        </p>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>
                                    <p class="coupon-btn-wrap tc">
                                        <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                                    </p>
                                </div>
                                <div class="brand-more neje-more-bg">
                                    <a href="#" class="brank-more-link">MORE DEALS ></a>
                                </div>
                            </div>

                            <ul class="clearfix pro-list-wrap">
                                <li class="pr brand-li-first"><!-- empty --></li>

                                <li class="pr">
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

                        <!-- ulefone -->
                        <div class="cate-sort-cont none js-sortItem">
                            <div class="brand-left">
                                <div class="coupon-detail">
                                    <h5 class="coupon-tit">ULEFONE</h5>
                                    <div class="use-rule-wrap clearfix">
                                        <p class="rule-con fl">
                                            · Min Order:$50<br/>
                                            · HK,HK-2,China<br/>
                                            · 11/30/2016<br/>
                                        </p>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>
                                    <p class="coupon-btn-wrap tc">
                                        <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                                    </p>
                                </div>
                                <div class="brand-more ulefone-more-bg">
                                    <a href="#" class="brank-more-link">MORE DEALS ></a>
                                </div>
                            </div>

                            <ul class="clearfix pro-list-wrap">
                                <li class="pr brand-li-first"><!-- empty --></li>

                                <li class="pr">
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

                        <!-- vernee -->
                        <div class="cate-sort-cont none js-sortItem">
                            <div class="brand-left">
                                <div class="coupon-detail">
                                    <h5 class="coupon-tit">VERNEE</h5>
                                    <div class="use-rule-wrap clearfix">
                                        <p class="rule-con fl">
                                            · Min Order:$50<br/>
                                            · HK,HK-2,China<br/>
                                            · 11/30/2016<br/>
                                        </p>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>
                                    <p class="coupon-btn-wrap tc">
                                        <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                                    </p>
                                </div>
                                <div class="brand-more vernee-more-bg">
                                    <a href="#" class="brank-more-link">MORE DEALS ></a>
                                </div>
                            </div>

                            <ul class="clearfix pro-list-wrap">
                                <li class="pr brand-li-first"><!-- empty --></li>

                                <li class="pr">
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

                        <!-- ubsan -->
                        <div class="cate-sort-cont none js-sortItem">
                            <div class="brand-left">
                                <div class="coupon-detail">
                                    <h5 class="coupon-tit">HUBSAN</h5>
                                    <div class="use-rule-wrap clearfix">
                                        <p class="rule-con fl">
                                            · Min Order:$50<br/>
                                            · HK,HK-2,China<br/>
                                            · 11/30/2016<br/>
                                        </p>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>
                                    <p class="coupon-btn-wrap tc">
                                        <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                                    </p>
                                </div>
                                <div class="brand-more ubsan-more-bg">
                                    <a href="#" class="brank-more-link">MORE DEALS ></a>
                                </div>
                            </div>

                            <ul class="clearfix pro-list-wrap">
                                <li class="pr brand-li-first"><!-- empty --></li>

                                <li class="pr">
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

                        <!-- dtno1 -->
                        <div class="cate-sort-cont none js-sortItem">
                            <div class="brand-left">
                                <div class="coupon-detail">
                                    <h5 class="coupon-tit">DT.NO1</h5>
                                    <div class="use-rule-wrap clearfix">
                                        <p class="rule-con fl">
                                            · Min Order:$50<br/>
                                            · HK,HK-2,China<br/>
                                            · 11/30/2016<br/>
                                        </p>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>
                                    <p class="coupon-btn-wrap tc">
                                        <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                                    </p>
                                </div>
                                <div class="brand-more dtno1-more-bg">
                                    <a href="#" class="brank-more-link">MORE DEALS ></a>
                                </div>
                            </div>

                            <ul class="clearfix pro-list-wrap">
                                <li class="pr brand-li-first"><!-- empty --></li>

                                <li class="pr">
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

                        <!-- teclast -->
                        <div class="cate-sort-cont none js-sortItem">
                            <div class="brand-left">
                                <div class="coupon-detail">
                                    <h5 class="coupon-tit">TECLAST</h5>
                                    <div class="use-rule-wrap clearfix">
                                        <p class="rule-con fl">
                                            · Min Order:$50<br/>
                                            · HK,HK-2,China<br/>
                                            · 11/30/2016<br/>
                                        </p>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>
                                    <p class="coupon-btn-wrap tc">
                                        <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                                    </p>
                                </div>
                                <div class="brand-more teclast-more-bg">
                                    <a href="#" class="brank-more-link">MORE DEALS ></a>
                                </div>
                            </div>

                            <ul class="clearfix pro-list-wrap">
                                <li class="pr brand-li-first"><!-- empty --></li>

                                <li class="pr">
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

                        <!-- sunvell -->
                        <div class="cate-sort-cont none js-sortItem">
                            <div class="brand-left">
                                <div class="coupon-detail">
                                    <h5 class="coupon-tit">SUNVELL</h5>
                                    <div class="use-rule-wrap clearfix">
                                        <p class="rule-con fl">
                                            · Min Order:$50<br/>
                                            · HK,HK-2,China<br/>
                                            · 11/30/2016<br/>
                                        </p>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>
                                    <p class="coupon-btn-wrap tc">
                                        <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                                    </p>
                                </div>
                                <div class="brand-more sunvell-more-bg">
                                    <a href="#" class="brank-more-link">MORE DEALS ></a>
                                </div>
                            </div>

                            <ul class="clearfix pro-list-wrap">
                                <li class="pr brand-li-first"><!-- empty --></li>

                                <li class="pr">
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

                        <!-- oukitel -->
                        <div class="cate-sort-cont none js-sortItem">
                            <div class="brand-left">
                                <div class="coupon-detail">
                                    <h5 class="coupon-tit">OUKITEL</h5>
                                    <div class="use-rule-wrap clearfix">
                                        <p class="rule-con fl">
                                            · Min Order:$50<br/>
                                            · HK,HK-2,China<br/>
                                            · 11/30/2016<br/>
                                        </p>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>
                                    <p class="coupon-btn-wrap tc">
                                        <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                                    </p>
                                </div>
                                <div class="brand-more oukitel-more-bg">
                                    <a href="#" class="brank-more-link">MORE DEALS ></a>
                                </div>
                            </div>

                            <ul class="clearfix pro-list-wrap">
                                <li class="pr brand-li-first"><!-- empty --></li>

                                <li class="pr">
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

                    </div>
                </div>
            </div><!-- .brand-sort-wrap -->

            <div class="find-more-wrap w1000 js-floorTarget">
                <h3 class="fm-tit pb-tit">FINDING MORE SURPRISE</h3>

                <ul class="clearfix find-more-list warehouse">
                    <li><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" height="130" alt=""></a></li>
                    <li><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_3.jpg" height="130" alt=""></a></li>
                    <li><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_4.jpg" height="130" alt=""></a></li>
                </ul>

                <ul class="clearfix find-more-list activity">
                    <li class="fl"><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_2.jpg" height="130" alt=""></a></li>
                    <li class="fr"><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_4.jpg" height="130" alt=""></a></li>
                </ul>
            </div><!-- .find-more-wrap -->

        </section>

        <div class="left-nav-wrap fixed-nav-wrap" id="js-leftNav">
            <ul class="left-nav-list">
                <li><a href="#">CHRISTMAS SALE</a></li>
                <li><a href="#">US WAREHOUSE</a></li>
                <li><a href="#">EU WAREHOUSE</a></li>
                <li><a href="#">HK WAREHOUSE</a></li>
                <li><a href="#">Christmas Gift Bonanza</a></li>
            </ul>
            <a href="javascript:;" class="goto-top js-goTop"></a>
        </div><!-- .left-nav-wrap -->

        <div class="right-nav-wrap fixed-nav-wrap" id="js-rightNav">
            <ul class="right-nav-list">
                <li><a href="javascript:;">FLASH SALE</a></li>
                <li><a href="javascript:;">CATEGORY DISPLAY</a></li>
                <li><a href="javascript:;">BRAND RECOMMENDATION</a></li>
                <li><a href="javascript:;">MORE SURPRISE</a></li>
            </ul>
            <a href="javascript:;" class="goto-top js-goTop"></a>
        </div><!-- .right-nav-wrap -->
    </div><!-- .christmas-wrap -->

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->


<script>
$LAB.script("http://www.yuanbo88.com/demo/images/demo_15/new_snow.min.js")
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
                         title:'PROMO STARTS IN:',
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
                            // status === 0 ? thatParents.find('.goods-buy a').addClass('coming-soon').html('Coming Soon') : '';
                        }else{
                            limitObj = limitTime(time, status);
                            // thatParents.find('.goods-buy a').addClass('deal-end').html('Deal Ended');
                            thatParents.find('.sold-out').show();
                            clearInterval(nailInterval);
                        }
                    },1000);
                });
            })();

            $('.js-sortNav').on('click', 'span', function(){
                var that = $(this);
                var thatParents = that.parents('.js-sortNav');
                var index = thatParents.find('span').index(that);
                that.addClass('active').siblings('span').removeClass('active');

                thatParents.siblings('.js-sortItem').eq(index).show().siblings('.js-sortItem').hide();
            });

            //window scroll show OR hide fixedNav
            $(window).scroll(function(event) {
              var $wind = $(window),
                  firstTarget = $('.js-floorTarget').eq(0).offset().top,
                  windowScrollH = $wind.scrollTop();

              if(windowScrollH >= firstTarget){
                $('#js-rightNav').fadeIn();
                $('#js-leftNav').fadeIn();
              }else{
                $('#js-rightNav').fadeOut();
                $('#js-leftNav').fadeOut();
              }
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

        //下雪插件
        $(document).snowfall({round:true,minSize:4,maxSize:35,image :'http://www.yuanbo88.com/demo/images/demo_15/flake_black.png',flakeColor:'',collection:'',flakeCount:200});
    })
</script>

</body>
</html>