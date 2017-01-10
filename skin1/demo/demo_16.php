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
        .christmas-wrap i { font-family: 'icomoon' !important; speak: none; font-style: normal; font-weight: normal; font-variant: normal; text-transform: none; line-height: 1; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}
        .christmas-wrap .my_shop_price i { font-family: Arial !important;}
        .christmas-wrap .shopPrice i {font-weight: bold;}

        .christmas-wrap{ position: relative; z-index: 1; padding-top: 873px; width: 100%; min-width: 1100px; font-family:Arial; background: #b6ccea; background: url(images/demo_16/christmas_banner_bg.jpg) top center no-repeat; overflow: hidden;}
        .christmas-content{ position: relative; z-index: 1; padding-bottom: 190px; width: 100%; min-width: 1100px; background: #b6ccea; background: url(images/demo_16/bg.jpg) no-repeat; background-attachment: fixed;}
        .christmas-content:after{ content: url(images/demo_16/xueren.png); position: absolute; bottom: 0; left: 50%; margin-left: -177px; width: 354px;height: 188px;}
        .w1100{ margin: 0 auto; width: 1100px;}
        .coupon-list{ position: relative; z-index: 1; top: -50px; padding-bottom: 30px; width: 100%; height: 100px;}
        .coupon-list-con{}
        .coupon-list-con ul{}
        .coupon-list-con ul li{ float: left; padding: 45px 0 15px 70px; width: 205px; height: 90px; background: url(images/demo_16/coupon_bg.png) no-repeat;}
        .coupon-detail{ width: 180px; height: 90px;}
        .coupon-detail .coupon-tit{ padding-bottom: 6px; height: 14px; line-height: 14px; color: #fff; font-size: 14px; font-weight: bold; text-align: center;}
        .coupon-detail .use-rule-wrap{ position: relative; z-index: 1; margin-bottom: 5px;}
        .coupon-detail .rule-con{ width: 95px; height: 42px; line-height: 14px; color: #fff; font-size: 12px; overflow: hidden;}
        .coupon-detail .coupon-price{ position: absolute; z-index: 1; top: 0; right: 0; padding: 0 26px 0 10px; height: 42px; line-height: 42px; color: #ffe401; font-size: 26px;}
        .coupon-detail .coupon-price .icon-left{ position: absolute; z-index: 2; bottom: 0; left: 0; height: 30px; line-height: 30px; font-size: 18px;}
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
        .goods-time{height:30px; color:#fff;font-size:14px;background-color:#3f4a0d;text-align:center;}
        .goods-time span{display:inline-block;vertical-align:middle;height:30px;line-height:30px;padding:0 5px;}

        .goods-img{width:170px;height:170px;margin:0 auto; padding: 5px 0; border-bottom: 1px solid #e7dfb5;}
        .goods-img a{display:block;width:170px;height:170px;overflow:hidden; text-align: center;}
        .goods-img img{height:170px;width:auto;display:inline;vertical-align:top;}

        .goods-title{font-size:14px;width:210px;margin:auto;height:32px;line-height:16px;overflow:hidden;text-align:center;margin-top:10px;}
        .goods-title a{color:#3f4a0d; text-decoration: none;}
        .goods-title a:hover{text-decoration: underline;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#b1b0b4;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#d82425;font-size:22px; font-weight: bold;}

        .goods-limit{width:200px;margin:5px auto 0;height:50px;position:relative;}
        .goods-limit .market-price{ color: #b1b0b4; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#ffe372;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #e92a2a;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
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
        .goods-buy a.deal-end{ color: #fff; background:#b7b7b3!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}

        .pro-list-wrap .toCart { width: 47px; height: 47px; display: inline-block; vertical-align: bottom; background: no-repeat; background-size: cover; float: right; position: relative; overflow: hidden; cursor: pointer }
        .pro-list-wrap .toCart:hover:before { width: 150%; height: 150%; background: #f8dd6f;}
        .pro-list-wrap .toCart:before { content: ''; position: absolute; background: #f8dd6f; border-radius: 50%; width: 200%; height: 200%; left: 0; top: 0; -webkit-transition: all .2s ease-in-out; transition: all .2s ease-in-out }
        .pro-list-wrap .toCart:after { content: url(images/demo_16/cart3.png); width: 47px; height: 47px; position: absolute; left: 2px; top: 0 }

        
        .sec-pb{ position: relative; z-index: 1; padding: 96px 0 20px; min-height: 360px; background: url(images/demo_16/sec_bg.png) top center no-repeat;}
        .sec-pb:after{ position: absolute; z-index: 2; bottom: 0; left: 0; content: ''; display: inline-block; width: 1124px; height: 20px; background: url(images/demo_16/sec_bg.png) bottom center no-repeat;}
        .pb-tit{ position: relative; z-index: 1; top: 40px; margin: 0 auto; padding-top: 12px; width: 970px; height: 85px; line-height: 85px; color: #fff; font-size: 34px; font-weight: bold; background: url(images/demo_16/sec_tit.png) top center no-repeat; text-align: center;}

        .flash-sale-wrap{ margin-bottom: 30px; padding-top: 205px; background: url(images/demo_16/flash_sale_tit.png) top center no-repeat;}
        .flash-sale-wrap .fs-pro-list{ padding: 20px; width: 1054px; border:3px solid #e92a2a; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background: #ffe372;}
        .flash-sale-wrap .fs-pro-list ul{ width: 1060px;}
        .flash-sale-wrap .fs-pro-list ul li{ float: left; margin-right: 5px; margin-bottom: 5px; width: 260px; height: 390px; background: #fff;}
        .flash-sale-wrap .fs-pro-list ul li .toCart{ position: absolute; bottom: 0; right: 0;}

        .category { font-size: 0; width: 1000px; margin: auto;}
        .category span { position: relative; z-index: 1; color: #d72e2f; font-size: 14px; display: inline-block; width: 100px; height: 100px; padding: 0 5px; text-align: center; -webkit-box-sizing: border-box; box-sizing: border-box; margin: 0 13px 8px 12px; vertical-align: top; border-width: 1px; border-style: solid; border-color: transparent; -webkit-transition: all .2s ease; transition: all .2s ease; cursor: pointer; -webkit-border-radius: 50%; border-radius: 50%;}
        .category span .icon-cat{ position: absolute; z-index: 2; top: -20px; right: -10px; display: none; width: 59px; height: 51px; background: url(images/demo_16/sort_cat.png) no-repeat; -webkit-transition: all .2s ease; transition: all .2s ease;}
        .category span.active, .category span:hover { background: #fff; -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.5); -moz-box-shadow: 0 2px 10px rgba(0,0,0,.5); box-shadow: 0 2px 10px rgba(0,0,0,.5);}
        .category span.active .icon-cat, .category span:hover .icon-cat{ display: block; -webkit-transition: all .2s ease; transition: all .2s ease;}

        @-webkit-keyframes shake {  
            0%, 100% {-webkit-transform: translateX(0);}
            30%{-webkit-transform: translateX(-5px);}  
            60%{-webkit-transform: translateX(5px);}  
        }  
        @-moz-keyframes shake {  
            0%, 100% {-moz-transform: translateX(0);}  
            30%{-moz-transform: translateX(-5px);}  
            60%{-moz-transform: translateX(5px);}  
        }  
        .category span:hover .icon-cat{
            -webkit-animation-name:shake;  
            -webkit-animation-duration:1s;  
            -moz-animation-name:shake;  
            -moz-animation-duration:1s;
        }
        .category span:nth-of-type(2) { padding: 0 20px;}
        .category i { display: block; font-size: 24px; margin: auto; color: #516d23; text-align: center; margin-bottom: 5px;margin-top: 10px;}

        .cate-sort-wrap{ position: relative; z-index: 1; margin: 0 auto; width: 1124px;}
        .cate-sort-nav{ padding: 0 38px 0 32px; width: 1054px;}

        .prolist-redbg{ position: relative; z-index: 1; padding: 0 38px 0 32px; width: 1060px;}
        .prolist-redbg .pro-list-wrap li{ float: left; margin-right: 6px; width: 206px; height: 350px; background: #d72e2f;}
        .prolist-redbg .pro-list-wrap li .goods-img{ padding: 20px 0; width: 100%; background: #fff;}
        .prolist-redbg .pro-list-wrap li .goods-img a{ margin: 0 auto;}
        .prolist-redbg .pro-list-wrap li .goods-title{ height: 16px; line-height: 16px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #fff;}
        .prolist-redbg .pro-list-wrap li .goods-title a{ color: #fff;}
        .prolist-redbg .pro-list-wrap li .market-price{ display: block; padding-bottom: 10px; color: #fff;}
        .prolist-redbg .pro-list-wrap li .shop-price{ color: #ffe372;}
        .prolist-redbg .pro-list-wrap li .goods-buy a{ width: 90px; color: #e92a2a; background: #ffe372;}
        .prolist-redbg .pro-list-wrap .toCart{ position: absolute; bottom: 0; right: 0;}
        .prolist-redbg .pro-list-wrap .toCart:before{ background: #780000;}
        .prolist-redbg .pro-list-wrap .toCart:after{ content: url(images/demo_16/cart2.png);}

        .right-nav-bg{ background:url(images/demo_16/right_nav.png) no-repeat;}
        .right-nav-wrap{ display: none; position: fixed; z-index: 9999; top: 30px; right: 30px; width: 147px;}
        .right-nav-wrap .nav-top{ position: relative; z-index: -1; top: 20px; width: 147px; height: 158px; background-position: 0 0;}
        .right-nav-wrap .nav-foot{ position: relative; z-index: 1; margin: 0 auto; width: 130px; height: 235px; background-position: 0 -200px;}
        .right-nav-wrap .nav-foot a{ position: absolute; z-index: 2;}
        .right-nav-wrap .nav-foot a span{ display: none; position: absolute; z-index: 3; top: 0; right: 12px; padding:7px 0 6px; width: 86px; height: 24px; line-height: 12px; color: #d72e2f; font-size: 12px; background: #f8e07c; background:url(images/demo_16/share_num_bg.png) center center no-repeat; text-align: center;}
        .right-nav-wrap .nav-foot a:hover span{ display: block;}
        .right-nav-wrap .nav-foot .share-btn{ display: block; width: 37px; height: 37px;}
        .right-nav-wrap .nav-foot .share-fb{ top: 54px; left: 5px;}
        .right-nav-wrap .nav-foot .share-vk{ top: 54px; left: 46px;}
        .right-nav-wrap .nav-foot .share-tw{ top: 54px; left: 87px;}
        .right-nav-wrap .nav-foot .share-google{ top: 99px; left: 5px;}
        .right-nav-wrap .nav-foot .share-reddit{ top: 99px; left: 46px;}
        .right-nav-wrap .nav-foot .goto-top{ top: 179px; left: 40px; width: 56px; height: 56px;}
        .right-nav-wrap .nav-cont{ margin: 0 auto; width: 130px;}
        .right-nav-wrap .nav-cont li{ margin-bottom: 4px; width: 130px; height: 30px;}
        .right-nav-wrap .nav-cont li a{ display: block; width: 130px; height: 30px; line-height: 30px; color: #ffe372; font-size: 14px; -webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; border-radius: 5px; text-align: center; background: #d72e2f; text-decoration: none;}
        .right-nav-wrap .nav-cont li a:hover, .right-nav-wrap .nav-cont li.active a{ color: #e92a2a; background: #ffe372;}


        .ball-wrap{ position: absolute; z-index: 9; top: 90px; left: 50%; margin-left: -309px; width: 618px; height: 716px; background: url(images/demo_16/ball_bg.png) no-repeat;-webkit-transform-style: preserve-3d; transform-style: preserve-3d; -webkit-perspective: 4000px; perspective: 4000px; -webkit-transition: all .1s ease; transition: all .1s ease;}
        .ball-wrap .little-ad{ position: absolute; z-index: 10; bottom: 30px; left: 60px; padding: 40px 0 23px 30px; width: 459px; height: 30px; line-height: 30px; color: #feffad; font-size: 16px; background: url(images/demo_16/litter_ad_bg.png) no-repeat; text-align: center;}
        .infoBoxIni{ width: 459px; height: 30px; overflow: hidden;}
        .infoBoxIni ul{height: 100%; overflow: hidden;}
        .infoBoxIni ul li{ position: relative; z-index: 1; height: 30px; vertical-align: middle;}

        .ball-wrap .pro-flyer{ position: absolute; z-index: 11; top: 320px; left: 340px; display: inline-block; width: 89px; height: 54px; *display: inline;*zoom: 1;}
        .ball-wrap .pro-combination{ position: absolute; z-index: 11; top: 365px; left: 110px; display: inline-block; width: 228px; height: 203px; *display: inline;*zoom: 1;}
        .ball-wrap .pro-camera{ position: absolute; z-index: 11; top: 380px; left: 330px; display: inline-block; width: 91px; height: 132px; *display: inline;*zoom: 1;}
        .ball-wrap img{ margin: auto; display: block;-webkit-transform-style: preserve-3d; transform-style: preserve-3d; -webkit-perspective: 800px; perspective: 800px;  -webkit-transition: all .1s ease; transition: all .1s ease;}
        @-webkit-keyframes flyer {  
            0%{-webkit-transform: translate(0);}  
            10%{-webkit-transform: translate(0,-150px);}  
            20%{-webkit-transform: translate(100px,-150px);}  
            30%{-webkit-transform: translate(125px,-150px);}  
            40%{-webkit-transform: translate(150px,-150px);}  
            50%{-webkit-transform: translate(125px,-150px);}  
            60%{-webkit-transform: translate(100px,-150px);}  
            70%{-webkit-transform: translate(75px,-150px);}  
            80%{-webkit-transform: translate(0,-100px);}  
            90%{-webkit-transform: translate(0,-50px);}  
            100%{-webkit-transform: translate(0,0);}  
        }  
        @-moz-keyframes flyer {
            0%{-moz-transform: translate(0);}  
            10%{-moz-transform: translate(0,-150px);}  
            20%{-moz-transform: translate(100px,-150px);}  
            30%{-moz-transform: translate(125px,-150px);}  
            40%{-moz-transform: translate(150px,-150px);}  
            50%{-moz-transform: translate(125px,-150px);}  
            60%{-moz-transform: translate(100px,-150px);}  
            70%{-moz-transform: translate(75px,-150px);}  
            80%{-moz-transform: translate(0,-100px);}  
            90%{-moz-transform: translate(0,-50px);}  
            100%{-moz-transform: translate(0,0);} 
        }
        .ball-wrap .pro-flyer{
            -webkit-animation:flyer 4s linear 0s infinite;
            -moz-animation:flyer 4s linear 0s infinite;
            -ms-animation:flyer 4s linear 0s infinite;
            animation:flyer 4s linear 0s infinite;
        }

        .deals-wrap{ padding-top: 250px; background: url(images/demo_16/deals_tit.png) top center no-repeat;}
        .deals-list-box{ position: relative; z-index: 1; padding: 20px; width: 1054px; border:3px solid #e92a2a; border-top: 23px solid #e92a2a; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background: #ffe372;}
        .deals-list-box .prolist{ width: 1060px;}
        .deals-list-box .prolist li{ float: left; margin-right: 5px; margin-bottom: 5px; width: 260px; height: 390px; background: #fff;}
        .deals-list-box .prolist li .toCart{ position: absolute; bottom: 0; right: 0;}
        .deals-nav{ position: absolute; z-index: 2; top: -96px; left: 50px; width: 1000px;}
        .deals-nav li{ float: left; padding-top: 30px; width: 500px; height: 66px; background: url(images/demo_16/deal_tit.png) no-repeat; text-align: center; cursor: pointer;}
        .deals-nav li p{ height: 30px; line-height: 30px; color: #fef5d8; font-size: 20px;}
        .deals-nav li span{ display: block; height: 24px; line-height: 24px; color: #ffe372; font-size: 16px;}
        .deals-nav li.active{ background: url(images/demo_16/deal_tit_hover.png) no-repeat;}
        .deals-nav li.active p{ color: #e92a2a; font-size: 24px; font-weight: bold;}
        .deals-nav li.active span{ margin: 0 auto; width: 230px; color: #ffe372; font-size: 18px; background: #e92a2a;}

        .enter-wrap{ position: relative; z-index: 1; margin-bottom: 15px; padding-bottom: 4px; width: 1100px; height: 208px;}
        .enter-wrap .sonshu{ position: absolute; z-index: 1; top: 10px; left: -90px; display: block; width: 205px; height: 212px;background: url(images/demo_16/songshu.png) no-repeat;}
        .enter-list{ position: relative; z-index: 2; padding-left: 80px; width: 1038px;}
        .enter-list li{ float: left; margin-right: 18px; width: 328px; height: 208px; background: url(images/demo_16/enter_bg.png) no-repeat; text-align: center;}
        .enter-list li a{ display: block; padding: 33px 0 25px; height: 150px;}
        .enter-list li img{ height: 150px;}

        .santa-warehouses-wrap{ position: relative; z-index: 1; margin: 0 auto 20px; padding-top: 300px; width: 1124px; background: url(images/demo_16/santa_tit.png) top center no-repeat;}
        .santa-warehouses-wrap .sw-pro-list{}
        .empty-li{ background: none !important;}

        .country-coupon{ position: absolute; z-index: 5; width: 407px; height: 456px;}
        .eu-bg{ left: 40px; top: 20px; background: url(images/demo_16/eu_bg.png) no-repeat;}
        .us-bg{ left: 40px; top: 20px; background: url(images/demo_16/us_bg.png) no-repeat;}
        .cn-bg{ left: 100px; top: 20px; background: url(images/demo_16/cn_bg.png) no-repeat;}
        .hk-bg{ right: 100px; top: 20px; background: url(images/demo_16/hk_bg.png) no-repeat;}
        .country-coupon .show-btn{ position: absolute; z-index: 6; top: 230px; left: 23px; width: 114px; height: 24px; line-height: 24px; color: #c5000c; font-size: 14px; background: #edb665; text-align: center; border-radius: 10px;}
        .country-coupon .show-btn:hover{ color: #edb665; background: #c5000c;}
        .country-coupon .coupon-detail{ position: absolute; z-index: 6;top: 245px; left: 185px;}
        .country-coupon .coupon-detail .border-dash{ margin-bottom: 15px; padding: 2px; border: 1px dashed #edb665;}
        .country-coupon .coupon-detail .coupon-btn-wrap{ padding-right: 0;}
        .country-coupon .coupon-detail .coupon-tit{ padding: 5px 10px; text-align: left;}

        .us-warehouses-wrap{ margin: 0 auto 20px; width: 1124px;}
        .cn-hk-warehouses-wrap{ margin: 0 auto 20px; width: 1124px; height: 450px;}

        .prolist-redbg .pro-list-wrap li.more-link{ background: url(images/demo_16/more_bg.png) center bottom no-repeat;}
        .more-link a{ display: block; padding-top: 310px; height: 30px; line-height: 30px; color: #ffe372; font-size: 16px; text-align: center; text-decoration: underline;}

        .top-brand-wrap{ position: relative; z-index: 1; margin: 0 auto; width: 1124px;}
        .top-brand-nav{ padding: 0 38px 0 32px; width: 1054px;}

        .logo-category { font-size: 0; width: 1020px; margin: auto;}
        .logo-category span { position: relative; z-index: 1; color: #d72e2f; font-size: 14px; display: inline-block; width: 130px; height: 50px; text-align: center; margin: 0 8px 10px 7px; vertical-align: top; cursor: pointer;}
        .logo-category span .icon-cat{ position: absolute; z-index: 2; top: -15px; left: 50%; margin-left: -20px; display: none; width: 52px; height: 28px; background: url(images/demo_16/brand_cat.png) no-repeat; -webkit-transition: all .2s ease; transition: all .2s ease;}
        .logo-category span.active .icon-cat, .logo-category span:hover .icon-cat{ display: block; -webkit-transition: all .2s ease; transition: all .2s ease;}  
        .logo-category span:hover .icon-cat{
            -webkit-animation-name:shake;  
            -webkit-animation-duration:1s;  
            -moz-animation-name:shake;  
            -moz-animation-duration:1s;
        }
        .logo-category i { display: block; width: 130px; height: 50px; text-align: center; margin-bottom: 5px; background: url(images/demo_16/logo_icon.png) no-repeat;}
        .logo-category .icon-zanstyle{ background-position: 0 0;}
        .logo-category .icon-alfawise{ background-position: -130px 0;}
        .logo-category .icon-xiaomi{ background-position: -260px 0;}
        .logo-category .icon-onda{ background-position: -390px 0;}
        .logo-category .icon-sjcam{ background-position: -520px 0;}
        .logo-category .icon-jumper{ background-position: -650px 0;}
        .logo-category .icon-cubot{ background-position: -780px 0;}
        .logo-category .icon-ilife{ background-position: 0 -50px;}
        .logo-category .icon-chuwi{ background-position: -130px -50px;}
        .logo-category .icon-xk{ background-position: -260px -50px;}
        .logo-category .icon-homtom{ background-position: -390px -50px;}
        .logo-category .icon-syma{ background-position: -520px -50px;}
        .logo-category .icon-jxd{ background-position: -650px -50px;}
        .logo-category .icon-kukka{ background-position: -780px -50px;}
        .logo-category .icon-moto{ background-position: 0 -100px;}
        .logo-category .icon-beelink{ background-position: -130px -100px;}
        .logo-category .icon-fang{ background-position: -260px -100px;}
        .logo-category .icon-doogee{ background-position: -390px -100px;}
        .logo-category .icon-convoy{ background-position: -520px -100px;}
        .logo-category .icon-sricam{ background-position: -650px -100px;}
        .logo-category .icon-excelvan{ background-position: -780px -100px;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>


    <div id="snowfall"></div>
    
    <div class="christmas-wrap">
        <div class="ball-wrap" id="js-ballWrap">
            <span class="pb pro-flyer js-proFlyer"><img src="images/demo_16/pro_flyer.png" alt=""></span>
            <span class="pb pro-combination js-proComb"><img src="images/demo_16/pro_combination.png" alt=""></span>
            <div class="little-ad">
                <div class="infoBoxIni" id="js_infoBox">
                  <ul>
                      <li>跟着我大声念出来：园博吧，www.yuanbo88.com！</li>
                      <li>Oh, NO! This is a test!</li>
                      <li>园博吧，你值得拥有！！！</li>
                      <li>跟着我大声念出来：园博吧，www.yuanbo88.com！</li>
                      <li>Oh, NO! This is a test!</li>
                      <li>园博吧，你值得拥有！！！</li>
                      <li>跟着我大声念出来：园博吧，www.yuanbo88.com！</li>
                      <li>Oh, NO! This is a test!</li>
                      <li>园博吧，你值得拥有！！！</li>
                      <li>跟着我大声念出来：园博吧，www.yuanbo88.com！</li>
                      <li>Oh, NO! This is a test!</li>
                      <li>园博吧，你值得拥有！！！</li>
                      <li>跟着我大声念出来：园博吧，www.yuanbo88.com！</li>
                      <li>Oh, NO! This is a test!</li>
                      <li>园博吧，你值得拥有！！！</li>
                      <li>跟着我大声念出来：园博吧，www.yuanbo88.com！</li>
                      <li>Oh, NO! This is a test!</li>
                      <li>园博吧，你值得拥有！！！</li>
                      <li>跟着我大声念出来：园博吧，www.yuanbo88.com！</li>
                      <li>Oh, NO! This is a test!</li>
                      <li>园博吧，你值得拥有！！！</li>
                  </ul>  
                </div>
            </div>
        </div><!-- .ball-wrap -->


        <section class="christmas-content">
            <div class="coupon-list">
                <div class="coupon-list-con w1100">
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
            </div><!-- .coupon-list -->

            <div class="deals-wrap w1100 js-floorTarget">
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
            </div><!-- .deals-wrap -->

            <div class="flash-sale-wrap w1100 js-floorTarget">
                <div class="fs-pro-list pro-list-wrap">
                    <ul class="clearfix">
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

            <div class="enter-wrap w1100">
                <span class="sonshu"></span>
                <ul class="enter-list clearfix">
                    <li><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" alt=""></a></li>
                    <li><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" alt=""></a></li>
                    <li><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" alt=""></a></li>
                </ul>
            </div><!-- .enter-wrap -->

            <div class="santa-warehouses-wrap js-floorTarget">
                <div class="sec-pb">
                    <div class="country-coupon eu-bg">
                        <a href="#" class="show-btn">SHOP NOW ></a>
                        <div class="coupon-detail">
                            <div class="border-dash">
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
                            </div>
                            <p class="coupon-btn-wrap tc">
                                <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                            </p>
                        </div>
                    </div><!-- .country-coupon -->

                    <div class="sw-pro-list pro-list-wrap prolist-redbg">
                        <ul class="clearfix pro-list-wrap">
                            <li class="empty-li"><!-- empty --></li>
                            <li class="empty-li"><!-- empty --></li>

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
                </div>
            </div><!-- .santa-warehouses-wrap -->

            <div class="us-warehouses-wrap js-floorTarget">
                <div class="sec-pb">
                    <div class="country-coupon us-bg">
                        <a href="#" class="show-btn">SHOP NOW ></a>
                        <div class="coupon-detail">
                            <div class="border-dash">
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
                            </div>
                            <p class="coupon-btn-wrap tc">
                                <a href="javascript:;" class="get-coupon-btn js-getCoupon is-received">Already Received</a>
                            </p>
                        </div>
                    </div><!-- .country-coupon -->

                    <div class="sw-pro-list pro-list-wrap prolist-redbg">
                        <ul class="clearfix pro-list-wrap">
                            <li class="empty-li"><!-- empty --></li>
                            <li class="empty-li"><!-- empty --></li>

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
                </div>
            </div><!-- .us-warehouses-wrap -->

            <div class="cn-hk-warehouses-wrap">
                <div class="sec-pb">
                    <div class="country-coupon cn-bg js-floorTarget">
                        <a href="#" class="show-btn">SHOP NOW ></a>
                        <div class="coupon-detail">
                            <div class="border-dash">
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
                            </div>
                            <p class="coupon-btn-wrap tc">
                                <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                            </p>
                        </div>
                    </div><!-- .country-coupon -->

                    <div class="country-coupon hk-bg js-floorTarget">
                        <a href="#" class="show-btn">SHOP NOW ></a>
                        <div class="coupon-detail">
                            <div class="border-dash">
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
                            </div>
                            <p class="coupon-btn-wrap tc">
                                <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Discover Deals</a>
                            </p>
                        </div>
                    </div><!-- .country-coupon -->
                </div>
            </div><!-- .cn-hk-warehouses-wrap -->

            <div class="top-brand-wrap js-floorTarget">
                <h3 class="pb-tit">Top Xmas Brands</h3>
                <div class="sec-pb">
                    <div class="top-brand-nav js-sortNav">
                        <div class="clearfix logo-category">
                            <span class="active js-navItem"><i class="icon-zanstyle"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-alfawise"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-xiaomi"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-onda"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-sjcam"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-jumper"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-cubot"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-ilife"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-chuwi"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-xk"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-homtom"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-syma"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-jxd"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-kukka"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-moto"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-beelink"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-fang"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-doogee"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-convoy"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-sricam"></i> <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-excelvan"></i> <em class="icon-cat"></em></span>
                        </div>
                    </div>


                    <div class="prolist-redbg js-sortItem">
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

                            <li class="more-link">
                                <a href="#">LED Lights & Flashlights</a>
                            </li>
                        </ul>
                    </div>

                    <div class="prolist-redbg none js-sortItem">
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
            </div><!-- .cate-sort-wrap -->

            <div class="cate-sort-wrap js-floorTarget">
                <h3 class="fs-tit pb-tit">Christmas Gift Categories</h3>
                <div class="sec-pb">
                    <div class="cate-sort-nav js-sortNav">
                        <div class="clearfix category">
                            <span class="active js-navItem"><i class="icon-phone"></i> Mobile Phones <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-tablet"></i>Cool Tablets  <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-headphone"></i>Consumer Electronics <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-pc"></i>Computers & Networking <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-tools"></i>Electrical & Tools <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-cloth"></i>Stylish Apparel <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-airpod"></i>Mobile Accessories <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-toys"></i>Toys & Hobbies <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-home"></i>Home & Garden <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-watch"></i>Watches & Jewelry <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-bag"></i>Bags & Shoes <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-ball"></i>Outdoors & Sports <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-led"></i>LED Lights & Flashlights <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-bottle"></i>Baby & Kids <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-car"></i>Automobiles & Motorcycle <em class="icon-cat"></em></span>
                            <span class="js-navItem"><i class="icon-beauty"></i>Health & Beauty <em class="icon-cat"></em></span>
                        </div>
                    </div>


                    <div class="prolist-redbg js-sortItem">
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

                            <li class="more-link">
                                <a href="#">LED Lights & Flashlights</a>
                            </li>
                        </ul>
                    </div>

                    <div class="prolist-redbg none js-sortItem">
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
            </div><!-- .cate-sort-wrap -->

        </section>

    </div><!-- .christmas-wrap -->

    <section class="right-nav-wrap" id="js-rightNav">
        <div class="nav-top right-nav-bg"></div>
        
        <ul class="nav-cont">
            <li><a href="javascript:;">Daily Santa Deals</a></li>
            <li><a href="javascript:;">Festive Flash Sale</a></li>
            <li><a href="javascript:;">EU Grotto</a></li>
            <li><a href="javascript:;">US Grotto</a></li>
            <li><a href="javascript:;">CN Grotto</a></li>
            <li><a href="javascript:;">HK/HK-2 Grotto</a></li>
            <li><a href="javascript:;">Top Xmas Brands</a></li>
            <li><a href="javascript:;">Gift Categories</a></li>
        </ul>

        <div class="nav-foot right-nav-bg js-shareWrap" data-sharehref="">
            <a href="javascript:;" class="share-fb share-btn js-shareFB"><span>0<br/>shares</span></a>
            <a href="javascript:;" class="share-vk share-btn js-shareVK"><span>1<br/>shares</span></a>
            <a href="javascript:;" class="share-tw share-btn js-shareTwitt"><span>2<br/>shares</span></a>
            <a href="javascript:;" class="share-google share-btn js-shareGoogle"><span>3<br/>shares</span></a>
            <a href="javascript:;" class="share-reddit share-btn js-shareReddit"><span>4<br/>shares</span></a>
            <a href="javascript:;" class="goto-top js-goTop"></a>
        </div>
    </section>

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->

<script type="text/javascript">
    !function(a){a.fn.kxbdSuperMarquee=function(b){var c=a.extend({},a.fn.kxbdSuperMarquee.defaults,b);return this.each(function(){function D(){var a="left"==c.direction||"right"==c.direction?"scrollLeft":"scrollTop";if(c.isMarquee){if(c.loop>0&&(A+=c.scrollAmount,A>i*c.loop))return d[a]=0,clearInterval(n);var b=d[a]+("left"==c.direction||"up"==c.direction?1:-1)*c.scrollAmount}else if(c.duration){if(!(o++<r))return b=s,clearInterval(k),m=!1,void 0;m=!0;var b=Math.ceil(H(o,p,q,r));o==r&&(b=s)}else{var b=s;clearInterval(k)}"left"==c.direction||"up"==c.direction?b>=i&&(b-=i):0>=b&&(b+=i),d[a]=b,c.isMarquee?n=setTimeout(D,c.scrollDelay):r>o?(k&&clearTimeout(k),k=setTimeout(D,c.scrollDelay)):m=!1}function E(a){m=!0;var b="left"==c.direction||"right"==c.direction?"scrollLeft":"scrollTop",e="left"==c.direction||"up"==c.direction?1:-1;z+=e,void 0==a&&c.navId&&(w.eq(y).removeClass("navOn"),y+=e,y>=u?y=0:0>y&&(y=u-1),w.eq(y).addClass("navOn"),z=y);var f=0>z?i:0;o=0,p=d[b],s=void 0!=a?a:f+c.distance*z%i,q=1==e?s>p?s-p:s+i-p:s>p?s-i-p:s-p,r=c.duration,k&&clearTimeout(k),k=setTimeout(D,c.scrollDelay)}function F(){l=setInterval(function(){E()},1e3*c.time)}function G(){clearInterval(l)}function H(a,b,c,d){return-c*(a/=d)*(a-2)+b}var k,l,m,n,o,p,q,r,s,t,u,v,w,b=a(this),d=b.get(0),e=b.width(),f=b.height(),g=b.children(),h=g.children(),i=0,j="left"==c.direction||"right"==c.direction?1:0,x=[],y=0,z=0,A=0;g.css(j?"width":"height",1e4);var B="<ul>";if(c.isEqual){t=h[j?"outerWidth":"outerHeight"](),u=h.length,i=t*u;for(var C=0;u>C;C++)x.push(C*t),B+="<li>"+(C+1)+"</li>"}else h.each(function(b){x.push(i),i+=a(this)[j?"outerWidth":"outerHeight"](),B+="<li>"+(b+1)+"</li>"});B+="</ul>",(j?e:f)>i||(g.append(h.clone()).css(j?"width":"height",2*i),c.navId&&(v=a(c.navId).append(B).hover(G,F),w=a("li",v),w.each(function(b){a(this).bind(c.eventNav,function(){m||y!=b&&(E(x[b]),w.eq(y).removeClass("navOn"),y=b,a(this).addClass("navOn"))})}),w.eq(y).addClass("navOn")),d[j?"scrollLeft":"scrollTop"]="right"==c.direction||"down"==c.direction?i:0,c.isMarquee?(n=setTimeout(D,c.scrollDelay),b.hover(function(){clearInterval(n)},function(){clearInterval(n),n=setTimeout(D,c.scrollDelay)}),c.controlBtn&&a.each(c.controlBtn,function(b,d){a(d).bind(c.eventA,function(){c.direction=b,c.oldAmount=c.scrollAmount,c.scrollAmount=c.newAmount}).bind(c.eventB,function(){c.scrollAmount=c.oldAmount})})):(c.isAuto&&(F(),b.hover(G,F)),c.btnGo&&a.each(c.btnGo,function(b,d){a(d).bind(c.eventGo,function(){1!=m&&(c.direction=b,E(),c.isAuto&&(G(),F()))})})))})},a.fn.kxbdSuperMarquee.defaults={isMarquee:!1,isEqual:!0,loop:0,newAmount:3,eventA:"mousedown",eventB:"mouseup",isAuto:!0,time:5,duration:50,eventGo:"click",direction:"left",scrollAmount:1,scrollDelay:10,eventNav:"click"},a.fn.kxbdSuperMarquee.setDefaults=function(b){a.extend(a.fn.kxbdSuperMarquee.defaults,b)}}(jQuery);
</script>

<script>
$LAB.script("http://www.yuanbo88.com/demo/images/demo_15/new_snow.min.js")
    .wait(function(){
        $(function(){
            $('#js_infoBox').kxbdSuperMarquee({
                distance:30,
                time:3,
                direction:'up'
            });

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

            $('.js-sortNav').on('click', '.js-navItem', function(){
                var that = $(this);
                var thatParents = that.parents('.js-sortNav');
                var index = thatParents.find('.js-navItem').index(that);
                that.addClass('active').siblings('.js-navItem').removeClass('active');

                thatParents.siblings('.js-sortItem').eq(index).show().siblings('.js-sortItem').hide();
            });

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

        //下雪插件
        $(document).snowfall({round:true,minSize:4,maxSize:35,image :'http://www.yuanbo88.com/demo/images/demo_15/flake_black.png',flakeColor:'',collection:'',flakeCount:50});
    })
</script>

</body>
</html>