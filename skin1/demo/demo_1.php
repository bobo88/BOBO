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
        .banner-wrap .top-tips {
          -webkit-animation:top-tips 5s ease-in-out 0s infinite;
          -moz-animation:top-tips 5s ease-in-out 0s infinite;
          -ms-animation:top-tips 5s ease-in-out 0s infinite;
          animation:top-tips 5s ease-in-out 0s infinite;
          -webkit-transform-origin:50% 0;
          -moz-transform-origin:50% 0;
          -ms-transform-origin:50% 0;
          transform-origin:50% 0;
        }
        
        @-webkit-keyframes top-tips{
            0% { -webkit-transform: rotate(0);}
            10% { -webkit-transform: rotate(20deg);}
            20% { -webkit-transform: rotate(-16deg);}
            30% { -webkit-transform: rotate(12deg);}
            40% { -webkit-transform: rotate(-8deg);}
            50% { -webkit-transform: rotate(4deg);}
            60% { -webkit-transform: rotate(-5deg);}
            70% { -webkit-transform: rotate(4deg);}
            80% { -webkit-transform: rotate(-3deg);}
            90% { -webkit-transform: rotate(2deg);}
            100% { -webkit-transform: rotate(0);}
        }

        @-moz-keyframes top-tips{
            0% { -moz-transform: rotate(0);}
            10% { -moz-transform: rotate(20deg);}
            20% { -moz-transform: rotate(-16deg);}
            30% { -moz-transform: rotate(12deg);}
            40% { -moz-transform: rotate(-8deg);}
            50% { -moz-transform: rotate(4deg);}
            60% { -moz-transform: rotate(-5deg);}
            70% { -moz-transform: rotate(4deg);}
            80% { -moz-transform: rotate(-3deg);}
            90% { -moz-transform: rotate(2deg);}
            100% { -moz-transform: rotate(0);}
        }

        @-ms-keyframes top-tips{
            0% { -ms-transform: rotate(0);}
            10% { -ms-transform: rotate(20deg);}
            20% { -ms-transform: rotate(-16deg);}
            30% { -ms-transform: rotate(12deg);}
            40% { -ms-transform: rotate(-8deg);}
            50% { -ms-transform: rotate(4deg);}
            60% { -ms-transform: rotate(-5deg);}
            70% { -ms-transform: rotate(4deg);}
            80% { -ms-transform: rotate(-3deg);}
            90% { -ms-transform: rotate(2deg);}
            100% { -ms-transform: rotate(0);}
        }
        .fantastic-wrap{ width: 100%; min-width: 1200px; font-family: Arial; background: #cdb000;}
        .fantastic-wrap a{ text-decoration: none;}
        .pr{ position: relative;}
        .pa{ position: absolute;}
        .inline-block{display: inline-block; *display: inline; *zoom: 1;}
        .w1200{ margin: 0 auto; width: 1200px;}
        .radius-10{-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .radius-top-10{-webkit-border-radius: 10px 10px 0 0; -moz-border-radius: 10px 10px 0 0; -ms-border-radius: 10px 10px 0 0; border-radius: 10px 10px 0 0;}

        .banner-wrap{ width: 100%; min-width: 1200px; height: 674px; background: url(images/demo_1/banner.jpg) top center no-repeat;}
        .banner-wrap .top-tips{ margin-left: 250px; margin-bottom: 300px; width: 103px; height: 154px;}
        .banner-wrap .top-limit-box{ margin-left:400px;}
        .banner-wrap .top-limit-box .limit-title{ padding-left: 48px; height: 20px; line-height: 20px; color: #716b0f; font-size: 12px;}
        .banner-wrap .top-limit-box .limit-time{ padding-left: 48px; height: 70px; line-height: 70px; color: #646802; font-size: 46px; font-weight: bold;}
        .banner-wrap .top-limit-box .limit-time span{ margin-right: 18px; letter-spacing: 10px;}

        .sign-win-box{ margin-bottom: 60px; padding: 40px 0; width: 100%; background: #964301; text-align: center;}
        .trig-bottom{ position: absolute; bottom: -60px; left: 50%; margin-left: -50px; display: inline-block; *display: inline; *zoom: 1; width: 0; height: 0; border: 50px solid transparent; border-bottom: 30px solid transparent; border-top: 30px solid #964301;}
        .sign-win-box .title{ height: 50px; line-height: 50px; color: #f9f2c8; font-size: 40px; font-weight: bold;}
        .sign-win-box .tips{ margin-bottom: 20px; padding: 13px 0; height: 24px; line-height: 24px; color: #f9f2c8; font-size: 14px;}
        .sign-win-box .sign-win-step-box{ margin: 0 auto; width: 1058px; height: 173px; border: 2px solid #b29200;}
        .sign-win-box .sign-win-step-box .step-wrap{ position: absolute; top: -20px; left: 30px; width: 999px; height: 100px; background: url(images/demo_1/sign_win_bg.png) top center no-repeat;}
        .step-list{ padding: 4px;}
        .step-list li{ position: relative; z-index: 1; margin-left: 38px; padding: 10px 0; float: left; width: 157px; height: 72px; cursor: pointer;}
        .step-list li.li-1{ margin-left: 0; width: 195px;}
        .step-list li.li-5{ width: 173px;}
        .step-list li .trig-right{ position: absolute; top: 0; right: -64px; width: 0; height: 0; border: 46px solid transparent; border-right: 32px solid transparent; border-left: 32px solid #b7b7b3;}
        .step-list li .trig-left-min-t{ position: absolute; top: 0; left: -32px; width: 0; height: 0; border: 22px solid transparent; border-top: 32px solid #b7b7b3; border-right: 16px solid #b7b7b3;}
        .step-list li .trig-left-min-b{ position: absolute; bottom: 0; left: -32px; width: 0; height: 0; border: 22px solid transparent; border-bottom: 32px solid #b7b7b3; border-right: 16px solid #b7b7b3;}
        .step-list li.is-wined,.step-list li:hover{ background: #ffdb00;}
        .step-list li.is-wined .trig-right,.step-list li:hover .trig-right{ border-left: 32px solid #ffdb00;}
        .step-list li.is-wined .trig-left-min-t,.step-list li:hover .trig-left-min-t{ border-top: 32px solid #ffdb00; border-right: 16px solid #ffdb00;}
        .step-list li.is-wined .trig-left-min-b,.step-list li:hover .trig-left-min-b{ border-bottom: 32px solid #ffdb00; border-right: 16px solid #ffdb00;}
        .step-list li .pro-sort{ line-height: 20px; color: #5d5d5d; font-size: 14px;}
        .step-list li .zhekou{ line-height: 32px; color: #5d5d5d; font-size: 26px; font-weight: bold;}
        .step-list li .time{ margin: 0 auto; width: 80px; line-height: 20px; color: #ddd; font-size: 12px; background: #707070; -webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .step-list li.is-wined .pro-sort,.step-list li:hover .pro-sort{ color: #646802;}
        .step-list li.is-wined .zhekou,.step-list li:hover .zhekou{ color: #964301;}
        .step-list li.is-wined .time,.step-list li:hover .time{ color: #f6d404; background: #665800;}
        .icon-prize{ background: url(images/demo_1/win_prize.png) no-repeat;}
        .win-prize-box{ position: absolute; z-index: 2; bottom: -20px; left: 50%; margin-left: -55px; width: 110px; height: 107px; background-position: 0 0;}
        .win-prize-box .txt-tips-1{ position: absolute; top: 40px; left: -370px; width: 330px; height: 26px; line-height: 26px; color: #964301; font-size: 14px; background: #f9f2c8; -webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; border-radius: 5px;}
        .win-prize-box .txt-tips-1 i{ position: absolute; top: 2px; right: -16px; width: 0; height: 0; border: 10px solid transparent; border-left: 10px solid #f9f2c8;}
        .win-prize-box .txt-tips-2{ position: absolute; top: 20px; left: 130px; width: 149px; height: 47px; background-position: -150px 0;}

        .flash-sale-wrap{}
        .flash-sale-wrap .flash-sale-rules-box{ margin: 0 auto; width: 1100px; height: 529px; background: url(images/demo_1/flash_deals.jpg) top center no-repeat;}
        .pro-list-wrap{ width: 1200px; height: 850px; background: #ebdec8; -webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; border-radius: 5px;}
        .flash-sale-rules-box .fs-tips{ margin-bottom: 10px; padding-top: 260px; line-height: 25px; color: #fff; font-size: 16px; text-align: center;}
        .flash-sale-rules-box .fs-tips strong{ font-weight: bold;}
        .flash-sale-rules-box .fs-times{ margin-bottom: 40px; padding-left: 80px; color: #fff; font-size: 18px;}
        .flash-sale-rules-box .fs-times span{ width: 300px; height: 25px; line-height: 25px;}
        .flash-sale-rules-box .fs-times span.span-m{ width: 380px;}
        .flash-sale-rules-box .utc-time{ margin: 0 auto 42px; width: 430px; height: 4px; background: #d5c211;}
        .flash-sale-rules-box .utc-time .utc-title{ position: absolute; top: -8px; left: -80px; color: #ffdb02; font-size: 14px; font-weight: bold;}
        .flash-sale-rules-box .utc-time .nail-time{ position: absolute; top: -14px; left: 0; width: 500px; height: 32px;}
        .flash-sale-rules-box .utc-time .nail-time li{ float: left; margin-right: 30px; width: 68px; height: 32px; line-height: 32px; color: #964301; font-size: 16px; font-weight: bold; background: #ffdb02; text-align: center; -webkit-border-radius: 15px; -moz-border-radius: 15px; -ms-border-radius: 15px; border-radius: 15px;}

        .pl-nav-status{ text-align: center;}
        .pl-nav-status .left-status{ float: left; width: 548px; height: 98px; background: #fbeed8; cursor: pointer;}
        .pl-nav-status .left-status.is-not-begin{ background: #7a6e64;}
        .pl-nav-status .right-status{ float: right; margin-top: 26px; width: 548px; height: 72px; background: #7a6e64; cursor: pointer;}
        .pl-nav-status .status-title{ display: block; margin-bottom: 5px; padding-top: 20px; height: 30px; line-height: 30px; color: #987643; font-size: 24px; font-weight: bold;}
        .pl-nav-status .fs-limit-time{ margin: 0 auto; width: 230px; height: 24px; line-height: 24px; color: #fbeed8; font-size: 16px; background: #987643;}
        .pl-nav-status .fs-limit-time span{ padding: 0 5px;}
        .pl-nav-status .right-status .status-title{ margin: 0; padding-top: 10px; color: #dad1c2; font-size: 20px; font-weight: normal;}
        .pl-nav-status .right-status .fs-limit-time{ color: #eccd97; font-size: 16px; background: none;}

        .pro-list-wrap .pl-box{ padding: 0 50px;}
        .pro-list-wrap .pl-box .slider{ padding-top: 30px; width: 1120px;}
        .pro-list-wrap .pl-box li{ float: left; width: 210px; margin-right: 12px; margin-bottom: 20px; background-color: #fff; padding-bottom: 15px; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pro-list-wrap .pl-box li:hover{
            -webkit-transform: translate(0,-10px);
            -moz-transform: translate(0,-10px);
        }
        .goods-time{height:30px; color:#fce6b2;font-size:14px;background-color:#7a6e64;text-align:center;}
        .goods-time span{display:inline-block;vertical-align:middle;height:30px;line-height:30px;padding:0 5px;}

        .goods-img{width:170px;height:170px;margin:5px auto 0; padding-bottom: 5px; border-bottom: 1px solid #e7dfb5;}
        .goods-img a{display:block;width:170px;height:170px;overflow:hidden;}
        .goods-img img{height:170px;width:auto;display:inline;vertical-align:top;}

        .goods-title{font-size:14px;width:210px;margin:auto;height:32px;line-height:16px;overflow:hidden;text-align:center;margin-top:10px;}
        .goods-title a{color:#987643;}
        .goods-title a:hover{color:#333;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#987643;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#ff7100;font-size:22px; font-weight: bold;}

        .goods-limit{width:200px;margin:5px auto 0;height:50px;position:relative;}
        .pl-box .goods-limit .market-price{ color: #987643; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#987643;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #edc385;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .goods-limit-tips{
            position:absolute;left:0;top:-30px;width:95px; height:20px;font:normal 12px/20px Arial;
            background:#fff;border:1px solid #987643;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-limit-tips b{color:#987643;padding-right:5px;}
        .goods-limit-tips em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .goods-limit-tips em.tri_bd{border-color:#987643 transparent transparent transparent;bottom:-11px;z-index:1;}
        .goods-limit-tips em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}
        .goods-nolimit{text-align:center;font-size:14px;margin-top:15px;color:#987643;}
        .goods-buy{text-align:center;margin-top:10px;}
        .goods-buy a{
            display:inline-block;width:130px;height:24px;text-align:center;line-height:24px;background:#987643;text-transform:uppercase;
            color:#fce6b2;font-weight:bold;font-size:14px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a i{ margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fce6b2;}
        .goods-buy a.coming-soon{background:#666!important;}
        .goods-buy a.deal-end{background:#666!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}

        .top-deals-wrap{ margin-bottom: 40px;}
        .top-deals-wrap .t-d-nav{ padding: 235px 70px 0; width: 1065px; height: 97px; background: url(images/demo_1/top_deals.jpg) top center no-repeat;}
        .top-deals-wrap .t-d-nav li{ float: left; margin-top: 25px; margin-right: 5px; width: 350px; height: 72px; background: #7a6e64; text-align: center;}
        .top-deals-wrap .t-d-nav li a{ display: block; padding: 25px 0; width: 100%; height: 22px; line-height: 22px; color: #dad1c2; font-size: 18px; text-decoration: underline;}
        .top-deals-wrap .t-d-nav li.on{ margin-top: 0; height: 97px;}
        .top-deals-wrap .t-d-nav li.on a{ padding: 35px 0; height: 27px; line-height: 27px;}
        .top-deals-wrap .t-d-nav li.on,.top-deals-wrap .t-d-nav li:hover{ background: #fbeed8;}
        .top-deals-wrap .t-d-nav li.on a{ color: #987643; font-size: 24px; font-weight: bold;}
        .top-deals-wrap .t-d-nav li:hover a{ color: #987643;}
       
        .top-deals-wrap .pro-list-wrap{ height: 750px;}
        .top-deals-wrap .pro-list-wrap .pl-box .slider { padding-top: 40px;}

        .hot-brands-wrap{ padding: 258px 50px 0; width: 1100px; overflow: hidden; background: url(images/demo_1/hot_brands.jpg) top center no-repeat;}
        .hot-brands-wrap .h-t-box{ margin-bottom: 35px; padding: 20px 0; background: #ffdb02;}
        .brands-logo-wrap{ margin: 0 auto; padding-bottom: 20px; width: 1066px; height: 103px; }
        .brands-logo-wrap li{ position: relative; z-index: 1; float: left; height: 52px;}
        .brands-logo-wrap li a{ position: absolute; z-index: 3; display: block; height: 52px; background: url(images/demo_1/brands_logo.png) no-repeat; text-indent: -9999px;}
        .brands-logo-wrap li .circle-bg{ position: absolute; z-index: 2; top: 24px; left: 50%; margin-left: -2px; width: 4px; height: 4px; border-radius: 4px; background:rgba(255,248,207,0);}
        .brands-logo-wrap li:hover .circle-bg{
            background:rgba(255,248,207,1);
              -webkit-transform: scale(10);
                -moz-transform: scale(10);
                -o-transform: scale(10);
                -ms-transform: scale(10);
                transform: scale(10);
           -moz-transition: transform 0.5s ease-out,background 0.5s ease-out;
              -webkit-transition: transform 0.5s ease-out,background 0.5s ease-out;
              -o-transition: transform 0.5s ease-out,background 0.5s ease-out;
              transition: transform 0.5s ease-out,background 0.5s ease-out;
        }
        .brands-logo-wrap .brands-logo-1{ margin-right: 26px; width: 38px;}
        .brands-logo-wrap .brands-logo-1 a{ width: 38px; background-position: 0 0;}
        .brands-logo-wrap .brands-logo-2{ margin-right: 30px; width: 135px;}
        .brands-logo-wrap .brands-logo-2 a{ width: 135px; background-position: -64px 0;}
        .brands-logo-wrap .brands-logo-3{ margin-right: 26px; width: 95px;}
        .brands-logo-wrap .brands-logo-3 a{ width: 95px; background-position: -229px 0;}
        .brands-logo-wrap .brands-logo-4{ margin-right: 30px; width: 65px;}
        .brands-logo-wrap .brands-logo-4 a{ width: 65px; background-position: -350px 0;}
        .brands-logo-wrap .brands-logo-5{ margin-right: 27px; width: 57px;}
        .brands-logo-wrap .brands-logo-5 a{ width: 57px; background-position: -445px 0;}
        .brands-logo-wrap .brands-logo-6{ margin-right: 17px; width: 130px;}
        .brands-logo-wrap .brands-logo-6 a{ width: 130px; background-position: -529px 0;}
        .brands-logo-wrap .brands-logo-7{ margin-right: 25px; width: 96px;}
        .brands-logo-wrap .brands-logo-7 a{ width: 96px; background-position: -676px 0;}
        .brands-logo-wrap .brands-logo-8{ margin-right: 26px; width: 47px;}
        .brands-logo-wrap .brands-logo-8 a{ width: 47px; background-position: -797px 0;}
        .brands-logo-wrap .brands-logo-9{ margin-right: 25px; width: 113px;}
        .brands-logo-wrap .brands-logo-9 a{ width: 113px; background-position: -870px 0;}
        .brands-logo-wrap .brands-logo-10{ margin-right: 0; width: 51px;}
        .brands-logo-wrap .brands-logo-10 a{ width: 51px; background-position: -1008px 0;}

        .brands-logo-wrap .brands-logo-11{ margin-right: 22px; width: 104px;}
        .brands-logo-wrap .brands-logo-11 a{ width: 104px; background-position: 0 -60px;}
        .brands-logo-wrap .brands-logo-12{ margin-right: 31px; width: 101px;}
        .brands-logo-wrap .brands-logo-12 a{ width: 101px; background-position: -126px -60px;}
        .brands-logo-wrap .brands-logo-13{ margin-right: 19px; width: 73px;}
        .brands-logo-wrap .brands-logo-13 a{ width: 73px; background-position: -258px -60px;}
        .brands-logo-wrap .brands-logo-14{ margin-right: 24px; width: 96px;}
        .brands-logo-wrap .brands-logo-14 a{ width: 96px; background-position: -350px -60px;}
        .brands-logo-wrap .brands-logo-15{ margin-right: 29px; width: 74px;}
        .brands-logo-wrap .brands-logo-15 a{ width: 74px; background-position: -470px -60px;}
        .brands-logo-wrap .brands-logo-16{ margin-right: 17px; width: 71px;}
        .brands-logo-wrap .brands-logo-16 a{ width: 71px; background-position: -573px -60px;}
        .brands-logo-wrap .brands-logo-17{ margin-right: 18px; width: 55px;}
        .brands-logo-wrap .brands-logo-17 a{ width: 55px; background-position: -661px -60px;}
        .brands-logo-wrap .brands-logo-18{ margin-right: 18px; width: 100px;}
        .brands-logo-wrap .brands-logo-18 a{ width: 100px; background-position: -734px -60px;}
        .brands-logo-wrap .brands-logo-19{ margin-right: 19px; width: 119px;}
        .brands-logo-wrap .brands-logo-19 a{ width: 119px; background-position: -852px -60px;}
        .brands-logo-wrap .brands-logo-20{ margin-right: 0; width: 76px;}
        .brands-logo-wrap .brands-logo-20 a{ width: 76px; background-position: -990px -60px;}
        
        .brands-pro-all-wrap{ position: relative; z-index: 1; margin: 0 auto; padding: 30px 100px 10px; width: 888px; background: #fff;}
        .brands-pro-list-box{ height: 335px; overflow: hidden; background: #fff;}
        .brands-pro-list-box.pro-list-wrap{ margin: 0 auto; width: 888px; height: 335px;}
        .brands-pro-list-box.pro-list-wrap .pl-box{ position: relative; z-index: 1; padding: 0; height: 335px; overflow: hidden;}
        .brands-pro-list-box.pro-list-wrap .pl-box li{ position: relative; z-index: 2; margin-bottom: 0;}
        .brands-pro-list-box .control-nav{ display: none;}
        .brands-pro-list-box .direction-nav{ margin: 0 auto; width: 888px;}
        .brands-pro-list-box .direction-nav a{ display: block; position: absolute; width: 50px; height:120px; top: 120px; background: url(images/demo_1/direction_bg.png) no-repeat; cursor: pointer; z-index: 10; text-indent: -9999px;}
        .brands-pro-list-box .direction-nav a.prev{ background-position: 0 0; left: 10px;}
        .brands-pro-list-box .direction-nav a.prev:hover{ background-position: 0 -160px;}
        .brands-pro-list-box .direction-nav a.next{ background-position: -100px 0; right: 10px;}
        .brands-pro-list-box .direction-nav a.next:hover{ background-position: -100px -160px;}
        
        .hot-brand-banner{ margin: 0 auto 50px; width: 1100px; height: 250px; line-height: 250px; color: #964301; font-size: 40px; background: #ebdec8; text-align: center;}

        .zone-099-wrap{ margin-bottom: 50px;}
        .zone-099-wrap .pro-list-wrap{ height: 760px;}
        .zone-099-wrap .pro-list-wrap .pl-box .slider{ padding-top: 40px;}
        .zone-099-wrap .zone-title{ margin: 0 auto; padding: 20px 0; width: 609px; height: 146px;}
        .zone-099-wrap .zone-nav{ margin: 0 auto; width: 1100px;}
        .zone-nav li{ float: left; margin-top: 25px; margin-right: 5px; width: 270px; height: 72px; background: #7a6e64; text-align: center;}
        .zone-nav li a{ display: block; padding: 25px 0; width: 100%; height: 22px; line-height: 22px; color: #dad1c2; font-size: 18px;}
        .zone-nav li a span{ padding: 2px 5px; border: 1px solid #c3baac;}
        .zone-nav li.on{ margin-top: 0; height: 97px;}
        .zone-nav li.on a{ padding: 35px 0; height: 27px; line-height: 27px;}
        .zone-nav li.on a span{ border: 2px solid #c3ac8b;}
        .zone-nav li.on,.zone-nav li:hover{ background: #fbeed8;}
        .zone-nav li.on a{ color: #987643; font-size: 24px; font-weight: bold;}
        .zone-nav li:hover a{ color: #987643;}

        .cool-category-wrap{ position: relative; z-index: 1; margin-bottom: 50px; padding-top: 390px; background: url(images/demo_1/cool_cate_bg.jpg) top center no-repeat;}
        .cool-category-wrap .c-c-nav{ position: absolute;z-index: 2; top: 173px; left: 45px; padding: 10px; width: 1090px; height: 290px; background: #ffdb02;}
        .cool-category-wrap .c-c-nav li{ float: left; margin: 0 2px 2px 0; width: 216px; height: 86px; line-height: 86px; background: #fbea87; text-align: center;}
        .cool-category-wrap .c-c-nav li.cool-cate-center{ padding-top: 20px; height: 96px; width: 652px; line-height: 30px; color: #964301; font-size: 30px;}
        .cool-category-wrap .c-c-nav li.cool-cate-center span{ margin: 10px auto 0; display: block; width: 200px; height: 30px; color: #fff8cf; font-size: 20px; background:#964301;}
        .cool-category-wrap .c-c-nav li.li-middle{ height: 116px; line-height: 30px;}
        .cool-category-wrap .c-c-nav li.li-middle a{ padding-top: 26px; height: 90px;}
        .cool-category-wrap .c-c-nav li.sort:hover,.cool-category-wrap .c-c-nav li.sort.on{ background: #964301;}
        .cool-category-wrap .c-c-nav li.sort:hover a,.cool-category-wrap .c-c-nav li.sort.on a{ color: #ffdb02;}
        .cool-category-wrap .c-c-nav a{ display: block; width: 100%; height: 100%; color: #964301; font-size: 16px;}
        .cool-category-wrap .pro-list-wrap{ padding: 10px; width: 1180px; height: 835px; background: #ffdb02;}
        .cool-category-wrap .pro-list-wrap .pl-box{ padding: 100px 40px 0 40px; width: 1100px; height: 735px; background: #fff;}
        
        .brands-clearance-banner{margin: 0 auto 20px; width: 1200px; height: 253px;}
        .brands-clearance-banner a{ display: block; width: 1200px; height: 253px;}
        .country-banner{margin: 0 auto 50px; width: 1200px; height: 254px;}
        .country-banner div{ width: 590px; height: 254px;}
        .country-banner div a{ display: block; width: 590px; height: 254px;}

        .get-free-wrap{ margin-bottom: 50px;}
        .get-free-wrap .pro-list-wrap{ height: 760px;}
        .get-free-wrap .pro-list-wrap .pl-box .slider{ padding-top: 50px;}
        .get-free-wrap .pro-list-wrap .pl-box .slider li{ height: 317px;}
        .get-free-wrap .pro-list-wrap .pl-box .slider li.get-free-banner{ background: none; overflow: visible;}
        .get-free-wrap .pro-list-wrap .pl-box .slider li.get-free-banner a{ position: absolute;top: -20px; left: -70px; width: 261px; height: 368px;}
        .get-free-wrap .goods-buy a{ background: #964301;}

        .app-exclusive-price{ margin-bottom: 35px; padding-top: 170px;}
        .app-exclusive-price .app-e-title{ position: absolute; top: 5px; left: 50%; margin-left: -210px; width: 420px; height: 197px; background: #cdb000 url(images/demo_1/app_price_bg.png) top center no-repeat;}
        .app-exclusive-price .app-e-title img{ position: absolute; top: 60px; left: 153px;}
        .app-exclusive-price .app-e-title .andriod{ position: absolute; top: 65px; left: 303px; width: 114px; height: 51px;}
        .app-exclusive-price .app-e-title .ios{ position: absolute; top: 121px; left: 303px; width: 114px; height: 53px;}
        .app-exclusive-cont{ margin: 0 auto; padding: 0 20px 10px 20px; width: 900px; border: 2px solid #ffdb02;}
        .app-exclusive-cont .pro-list-wrap{ width: 900px; height: 385px; background: none; overflow: hidden;}
        .app-exclusive-cont .pro-list-wrap li{ border-bottom: 2px solid #ff7100;}
        .app-exclusive-cont .pro-list-wrap .pl-box{ padding: 0 12px;}
        .app-exclusive-cont .pro-list-wrap .pl-box .slider { width: 900px;}
        .app-exclusive-cont .shop-price{ color: #987643;}
        .app-exclusive-cont .goods-app-price{ margin: 20px auto 0; padding-left: 70px; width: 100px; color: #ff7100; font-size: 20px;font-weight: bold; text-align: center; background: url(images/demo_1/app_price_icon.png) top left no-repeat;}
        .app-exclusive-cont .goods-app-price span{ display: block; width: 100px; height: 25px; line-height: 25px; border: 1px solid #ff7100;}
        .app-exclusive-cont .goods-img{ width: 180px; height: 160px;}
        .app-exclusive-cont .goods-img a{ width: 180px; height: 160px; text-align: center;}
        .app-exclusive-cont .goods-img img{ width: 150px; height: 150px;}

        .foot-wrap-cont{ padding-top: 100px; width: 100%; height: 389px; background:url(images/demo_1/foot_bg.jpg) bottom center no-repeat;}
        .foot-banner-box{ position: absolute; top: -100px; left: 50px; width: 1100px;}
        .foot-banner-box li{ float: left; margin-right: 8px; width: 212px; height: 200px;}

        .right-nav-bg{ background:url(images/demo_1/right_nav.png) no-repeat;}
        .right-nav-wrap{ display: none; position: fixed; z-index: 9999; top: 50px; right: 30px;}
        .right-nav-wrap .nav-top{ width: 160px; height: 69px; background-position: 0 0;}
        .right-nav-wrap .nav-foot{ position: relative; z-index: 1; width: 150px; height: 214px; background-position: 0 -100px;}
        .right-nav-wrap .nav-foot a{ position: absolute; z-index: 2;}
        .right-nav-wrap .nav-foot a span{ display: none; position: absolute; z-index: 3; top: 3px; left: 30px; padding:3px 0 3px 7px; width: 44px; height: 30px; line-height: 12px; color: #ffdb02; font-size: 12px; background: #924508; background:url(images/demo_1/share_num_bg.png) top center no-repeat; text-align: center;}
        .right-nav-wrap .nav-foot a:hover span{ display: block;}
        .right-nav-wrap .nav-foot .share-btn{ display: block; width: 37px; height: 37px;}
        .right-nav-wrap .nav-foot .share-fb{ top: 56px; left: 11px;}
        .right-nav-wrap .nav-foot .share-vk{ top: 56px; left: 57px;}
        .right-nav-wrap .nav-foot .share-tw{ top: 56px; left: 103px;}
        .right-nav-wrap .nav-foot .share-google{ top: 101px; left: 11px;}
        .right-nav-wrap .nav-foot .share-reddit{ top: 101px; left: 57px;}
        .right-nav-wrap .nav-foot .goto-top{ top: 163px; left: 50px; width: 51px; height: 51px;}
        .right-nav-wrap .nav-cont{}
        .right-nav-wrap .nav-cont li{ margin-bottom: 3px; width: 150px; height: 26px;}
        .right-nav-wrap .nav-cont li a{ display: block; width: 150px; height: 26px; line-height: 26px; color: #964301; font-size: 14px; -webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; border-radius: 5px; text-align: center; background: #ffdb02; text-decoration: none;}
        .right-nav-wrap .nav-cont li a:hover{ color: #ffdb02; background: #964301;}

        #popShowBox{width: 400px; padding: 20px; text-align: center; background:#fff;}
        #popShowBox .f24{font-size: 24px;}
        #popShowBox strong{font-weight: bold; color: #fe114f;}
        #popShowBox .btns a{width: 120px; height: 36px; line-height: 36px; display: block; margin-left: auto; margin-right: auto; background-color: #000; border-radius: 3px; font-size: 18px; font-weight: bold; color: #fff; text-transform: uppercase; text-decoration:none;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>



<div class="fantastic-wrap">
    <section class="banner-wrap">
        <div class="w1200">
           <p class="top-tips"><img src="images/demo_1/top_tips.png" alt="Fantastic 4 fall guide"></p>
           <div class="top-limit-box">
               <h3 class="limit-title" id="js-topLimitTitle">PROMO BEGINS IN</h3>
               <p class="limit-time" data-start-time="12" data-end-time="58" id="js-topLimitTime"><span>00</span><span>00</span><span>00</span><span>00</span></p>
           </div> 
        </div>
    </section>

    <section class="sign-win-box pr" id="js-signWinBox">
        <div class="w1200">
            <div class="title">SIGN & WIN</div>
            <p class="tips">Click + Sign in on these dates for your coupon code: Coupon only can be used from SEP 13-15.</p>
            
            <div class="sign-win-step-box pr">
                <div class="step-wrap">
                    <ul class="clearfix step-list">
                        <li class="li-1 is-wined">
                            <p class="pro-sort">Apparel</p>
                            <p class="zhekou">15% OFF</p>
                            <p class="time">SEP 08</p>
                            <i class="trig-right inline-block"></i>
                        </li>
                        <li class="li-2">
                            <p class="pro-sort">Smart Watch Phones</p>
                            <p class="zhekou">9% OFF</p>
                            <p class="time">SEP 09</p>
                            <i class="trig-right inline-block"></i>
                            <i class="trig-left-min-t inline-block"></i>
                            <i class="trig-left-min-b inline-block"></i>
                        </li>
                        <li class="li-3">
                            <p class="pro-sort">Smart Watch Phones</p>
                            <p class="zhekou">12% OFF</p>
                            <p class="time">SEP 10</p>
                            <i class="trig-right inline-block"></i>
                            <i class="trig-left-min-t inline-block"></i>
                            <i class="trig-left-min-b inline-block"></i>
                        </li>
                        <li class="li-4">
                            <p class="pro-sort">Car & Motorbike Gear</p>
                            <p class="zhekou">10% OFF</p>
                            <p class="time">SEP 11</p>
                            <i class="trig-right inline-block"></i>
                            <i class="trig-left-min-t inline-block"></i>
                            <i class="trig-left-min-b inline-block"></i>
                        </li>
                        <li class="li-5">
                            <p class="pro-sort">Home & Garden</p>
                            <p class="zhekou">9% OFF</p>
                            <p class="time">SEP 12</p>
                            <i class="trig-left-min-t inline-block"></i>
                            <i class="trig-left-min-b inline-block"></i>
                        </li>
                    </ul>
                </div>
                <div class="win-prize-box icon-prize inline-block">
                    <p class="txt-tips-1">Please mouse over to view the reward details <i class="inline-block"></i></p>
                    <p class="txt-tips-2 icon-prize inline-block"></p>
                </div>    
            </div>
        </div>
        <i class="trig-bottom inline-block pa"></i>
    </section>
    
    <section class="flash-sale-wrap w1200 js-floorTarget js-tabNavWrap">
        <div class="flash-sale-rules-box">
            <p class="fs-tips">
                <strong>Daily Flash Time</strong> @ SEP 13-15: Limited Qty at the LOWEST Price (Max: 1 per customer)<br/>
                Be Fast! Price will go back up after Lowest Price items are snapped up!
            </p>
            <div class="fs-times clearfix">
                <span class="inline-block tr">SEP 13: 24H MVP(Up to 50%)</span>
                <span class="inline-block tc span-m">SEP 14: New Arrivals(from $0.01)</span>
                <span class="inline-block">SEP 15: Hot Brands</span>
            </div>

            <div class="utc-time pr">
                <span class="utc-title">UTC Time:</span>
                <ul class="nail-time clearfix">
                    <li>16:00</li>
                    <li>19:00</li>
                    <li>21:00</li>
                    <li>11:00</li>
                    <li>14:00</li>
                </ul>
            </div>

            <div class="pl-nav-status clearfix">
                <!-- add: is-not-begin -->
                <div class="left-status radius-top-10 js-nav">
                    <span class="status-title">PROMO BEGINS IN:</span>
                    <p class="fs-limit-time js-flashLimitTime" data-time="88888" data-status="1"><span>00</span>:<span>00</span>:<span>00</span></p>
                </div>

                <div class="right-status radius-top-10 js-nav">
                    <span class="status-title">PROMO BEGINS IN:</span>
                    <p class="fs-limit-time js-flashLimitTime" data-time="888888" data-status="0"><span>00</span>:<span>00</span>:<span>00</span></p>
                </div>
            </div>
        </div>

        <div class="pro-list-wrap js-flashSaleTarget js-tabTarget">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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

        <div class="pro-list-wrap none js-flashSaleTarget js-tabTarget">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        <p class="goods-time"><span class="js-timeCounter" data-time="888888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                        </p>
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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

    <section class="top-deals-wrap w1200 js-floorTarget js-tabNavWrap">
        <ul class="t-d-nav clearfix">
            <li class="radius-top-10 on js-nav"><a href="javascript:;">INTEL</a></li>
            <li class="radius-top-10 js-nav"><a href="javascript:;">XIAOMI</a></li>
            <li class="radius-top-10 js-nav"><a href="javascript:;">24 HOUR MVP</a></li>
        </ul>

        <div class="js-tabTarget pro-list-wrap">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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

        <div class="js-tabTarget pro-list-wrap none">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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

        <div class="js-tabTarget pro-list-wrap none">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
    </section>

    <section class="hot-brands-wrap w1200 js-floorTarget js-tabNavWrap">
        <div class="h-t-box radius-10">
            <ul class="brands-logo-wrap">
                <li class="js-nav brands-logo-1"><i class="circle-bg inline-block"></i><a href="javascript:;">1</a></li>
                <li class="js-nav brands-logo-2"><i class="circle-bg inline-block"></i><a href="javascript:;">2</a></li>
                <li class="js-nav brands-logo-3"><i class="circle-bg inline-block"></i><a href="javascript:;">3</a></li>
                <li class="js-nav brands-logo-4"><i class="circle-bg inline-block"></i><a href="javascript:;">4</a></li>
                <li class="js-nav brands-logo-5"><i class="circle-bg inline-block"></i><a href="javascript:;">5</a></li>
                <li class="js-nav brands-logo-6"><i class="circle-bg inline-block"></i><a href="javascript:;">6</a></li>
                <li class="js-nav brands-logo-7"><i class="circle-bg inline-block"></i><a href="javascript:;">7</a></li>
                <li class="js-nav brands-logo-8"><i class="circle-bg inline-block"></i><a href="javascript:;">8</a></li>
                <li class="js-nav brands-logo-9"><i class="circle-bg inline-block"></i><a href="javascript:;">9</a></li>
                <li class="js-nav brands-logo-10"><i class="circle-bg inline-block"></i><a href="javascript:;">10</a></li>
                <li class="js-nav brands-logo-11"><i class="circle-bg inline-block"></i><a href="javascript:;">11</a></li>
                <li class="js-nav brands-logo-12"><i class="circle-bg inline-block"></i><a href="javascript:;">12</a></li>
                <li class="js-nav brands-logo-13"><i class="circle-bg inline-block"></i><a href="javascript:;">13</a></li>
                <li class="js-nav brands-logo-14"><i class="circle-bg inline-block"></i><a href="javascript:;">14</a></li>
                <li class="js-nav brands-logo-15"><i class="circle-bg inline-block"></i><a href="javascript:;">15</a></li>
                <li class="js-nav brands-logo-16"><i class="circle-bg inline-block"></i><a href="javascript:;">16</a></li>
                <li class="js-nav brands-logo-17"><i class="circle-bg inline-block"></i><a href="javascript:;">17</a></li>
                <li class="js-nav brands-logo-18"><i class="circle-bg inline-block"></i><a href="javascript:;">18</a></li>
                <li class="js-nav brands-logo-19"><i class="circle-bg inline-block"></i><a href="javascript:;">19</a></li>
                <li class="js-nav brands-logo-20"><i class="circle-bg inline-block"></i><a href="javascript:;">20</a></li>
            </ul>
            
            <div class="brands-pro-all-wrap">
                <div class="js-tabTarget brands-pro-list-box pro-list-wrap js-brandsProListBox">
                    <ul class="clearfix pl-box slideList">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 1111111</a>
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
                                    <img src="images/demo_1/demo_1_3.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 222222222</a>
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
                                    <img src="images/demo_1/demo_1_2.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 333333333333</a>
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
                                    <img src="images/demo_1/demo_1_1.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 444444444</a>
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
                                    <img src="images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 555555555</a>
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
                                    <img src="images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 66666666</a>
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
                                    <img src="images/demo_1/demo_1_2.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 77777777</a>
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
                                    <img src="images/demo_1/demo_1_1.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 888888</a>
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

                    <ul class="direction-nav"><li><a class="prev" href="javascript:;">Previous</a></li><li><a class="next" href="javascript:;">Next</a></li></ul>
                </div>
                <div class="js-tabTarget brands-pro-list-box pro-list-wrap js-brandsProListBox none">
                    <ul class="clearfix pl-box slideList">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_1/demo_1_1.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 1111111</a>
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
                                    <img src="images/demo_1/demo_1_2.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 222222222</a>
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
                                    <img src="images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 333333333333</a>
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
                                    <img src="images/demo_1/demo_1_2.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 444444444</a>
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
                                    <img src="images/demo_1/demo_1_3.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 555555555</a>
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
                                    <img src="images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 66666666</a>
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
                                    <img src="images/demo_1/demo_1_2.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 77777777</a>
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
                                    <img src="images/demo_1/demo_1_1.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 888888</a>
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

                    <ul class="direction-nav"><li><a class="prev" href="javascript:;">Previous</a></li><li><a class="next" href="javascript:;">Next</a></li></ul>
                </div>
                <div class="js-tabTarget brands-pro-list-box pro-list-wrap js-brandsProListBox none">
                    <ul class="clearfix pl-box slideList">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_1/demo_1_3.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 1111111</a>
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
                                    <img src="images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 222222222</a>
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
                                    <img src="images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 333333333333</a>
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
                                    <img src="images/demo_1/demo_1_1.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 444444444</a>
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
                                    <img src="images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 555555555</a>
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
                                    <img src="images/demo_1/demo_1_4.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 66666666</a>
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
                                    <img src="images/demo_1/demo_1_2.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 77777777</a>
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
                                    <img src="images/demo_1/demo_1_1.jpg">
                                </a>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">title 888888</a>
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

                    <ul class="direction-nav"><li><a class="prev" href="javascript:;">Previous</a></li><li><a class="next" href="javascript:;">Next</a></li></ul>
                </div>
            </div>
        </div>
    </section>
        
    <div class="hot-brand-banner radius-10"><a href="#"><img src="images/demo_1/hot_brand_banner.jpg" alt="FANT4STIC FALL"></a></div>

    <section class="zone-099-wrap w1200 js-floorTarget js-tabNavWrap">
        <div class="zone-title"><img src="images/demo_1/zone_099.png" alt="FANT4STIC FALL"></div>
        <ul class="zone-nav clearfix">
            <li class="js-nav radius-top-10 on"><a href="javascript:;"><span>$0.99</span></a></li>
            <li class="js-nav radius-top-10"><a href="javascript:;"><span>$2.99</span></a></li>
            <li class="js-nav radius-top-10"><a href="javascript:;"><span>$5.99</span></a></li>
            <li class="js-nav radius-top-10"><a href="javascript:;"><span>$9.99</span></a></li>
        </ul>

        <div class="js-tabTarget pro-list-wrap">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
        <div class="js-tabTarget pro-list-wrap none">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        2222222222
                    </li> 
                </ul>
            </div>
        </div>
        <div class="js-tabTarget pro-list-wrap none">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        33333333
                    </li> 
                </ul>
            </div>
        </div>
        <div class="js-tabTarget pro-list-wrap none">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        444444444444
                    </li> 
                </ul>
            </div>
        </div>
    </section>

    <section class="cool-category-wrap w1200 js-floorTarget js-tabNavWrap">
        <div class="c-c-nav radius-10">
            <ul class="clearfix">
                <li class="js-nav sort on"><a href="javascript:;">Home & Garden</a></li>
                <li class="js-nav sort"><a href="javascript:;">Cool Tablets</a></li>
                <li class="js-nav sort"><a href="javascript:;">Consumer Electronics</a></li>
                <li class="js-nav sort"><a href="javascript:;">Computers & Networking</a></li>
                <li class="js-nav sort"><a href="javascript:;">Outdoors & Sports</a></li>
                <li class="js-nav li-middle sort"><a href="javascript:;">Phones &<br/> Mobile Accessories</a></li>
                <li class="cool-cate-center">
                    Cool Category Deals
                    <span>Up to 70% OFF</span>
                </li>
                <li class="js-nav li-middle sort"><a href="javascript:;">Automobiles &<br/> Motorcycle</a></li>
                <li class="js-nav sort"><a href="javascript:;">LED Lights & Flashlights</a></li>
                <li class="js-nav sort"><a href="javascript:;">Toys & Hobbies</a></li>
                <li class="js-nav sort"><a href="javascript:;">Electrical & Tools</a></li>
                <li class="js-nav sort"><a href="javascript:;">Watches & Jewelry</a></li>
                <li class="js-nav sort"><a href="javascript:;">Stylish Apparel</a></li>

            </ul>
        </div>

        <div class="js-tabTarget pro-list-wrap">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                                <img src="images/demo_1/demo_1_4.jpg">
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
                       
                    </li>
                </ul>
            </div>
        </div>
        <div class="js-tabTarget pro-list-wrap none">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        222222222222222
                    </li>
                </ul>
            </div>
        </div>
        <div class="js-tabTarget pro-list-wrap none">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        33333333333
                    </li>
                </ul>
            </div>
        </div>
        <div class="js-tabTarget pro-list-wrap none">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="pr">
                        4444444444444444
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div class="brands-clearance-banner radius-10 js-floorTarget"><a href="#"><img src="images/demo_1/brands_clearance.jpg" alt="FANT4STIC FALL"></a></div>
    <div class="brands-clearance-banner radius-10 js-floorTarget"><a href="#"><img src="images/demo_1/zhekou_banner.jpg" alt="FANT4STIC FALL"></a></div>
    <div class="clearfix w1200 country-banner js-floorTarget">
        <div class="fl left-banner radius-10"><a href="#"><img src="images/demo_1/us.jpg" alt="FANT4STIC FALL"></a></div>
        <div class="fr right-banner radius-10"><a href="#"><img src="images/demo_1/eu.jpg" alt="FANT4STIC FALL"></a></div>
    </div>

    <section class="get-free-wrap w1200 radius-10 js-floorTarget">
        <div class="pro-list-wrap">
            <div class="pl-box">
                <ul class="slider clearfix">
                    <li class="get-free-banner pr">
                        <a href="#" class="pa"><img src="images/demo_1/get_free_banner.png" alt="FANT4STIC FALL"></a>
                    </li>
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                        <p class="goods-buy"><a href="#" target="special">Get it FREE <i class="inline-block"></i></a></p>
                    </li> 
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                        <p class="goods-buy"><a href="#" target="special">Get it FREE <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                        <p class="goods-buy"><a href="#" target="special">Get it FREE <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                        <p class="goods-buy"><a href="#" target="special">Get it FREE <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                        <p class="goods-buy"><a href="#" target="special">Get it FREE <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                        <p class="goods-buy"><a href="#" target="special">Get it FREE <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                        <p class="goods-buy"><a href="#" target="special">Get it FREE <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                        <p class="goods-buy"><a href="#" target="special">Get it FREE <i class="inline-block"></i></a></p>
                    </li>
                    <li class="pr">
                        <p class="goods-img pr">
                            <a href="#" target="special">
                                <img src="images/demo_1/demo_1_4.jpg">
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
                        <p class="goods-buy"><a href="#" target="special">Get it FREE <i class="inline-block"></i></a></p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="app-exclusive-price w1200 pr js-floorTarget">
        <div class="app-e-title">
            <img src="http://www.yuanbo88.com/dist/images/qrcode_258.jpg" width="114" height="114" alt="FANT4STIC FALL">
            <a href="#" class="andriod"></a>
            <a href="#" class="ios"></a>
        </div>

        <div class="app-exclusive-cont radius-10">
            <div class="pro-list-wrap">
                <div class="pl-box">
                    <ul class="slider clearfix">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_1/demo_1_4.jpg" width="150" height="150">
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
                            <p class="goods-app-price"><span class="app-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="188.99">188.99</b></span></p>
                        </li> 
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_1/demo_1_4.jpg" width="150" height="150">
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
                            <p class="goods-app-price"><span class="app-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="188.99">188.99</b></span></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_1/demo_1_4.jpg" width="150" height="150">
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
                            <p class="goods-app-price"><span class="app-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="188.99">188.99</b></span></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_1/demo_1_4.jpg" width="150" height="150">
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
                            <p class="goods-app-price"><span class="app-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="188.99">188.99</b></span></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="foot-wrap-cont">
        <div class="w1200 pr">
            <ul class="foot-banner-box clearfix">
                <li><a href="#"><img src="images/demo_1/foot_banner_1.jpg" alt="FANT4STIC FALL"></a></li>
                <li><a href="#"><img src="images/demo_1/foot_banner_2.jpg" alt="FANT4STIC FALL"></a></li>
                <li><a href="#"><img src="images/demo_1/foot_banner_3.jpg" alt="FANT4STIC FALL"></a></li>
                <li><a href="#"><img src="images/demo_1/foot_banner_4.jpg" alt="FANT4STIC FALL"></a></li>
                <li><a href="#"><img src="images/demo_1/foot_banner_5.jpg" alt="FANT4STIC FALL"></a></li>
            </ul>
        </div>
    </section>

    <section class="right-nav-wrap" id="js-rightNav">
        <div class="nav-top right-nav-bg"></div>
        
        <ul class="nav-cont">
            <li><a href="javascript:;">Flash Deals</a></li>
            <li><a href="javascript:;">24H Top Deals</a></li>
            <li><a href="javascript:;">Hot Brands</a></li>
            <li><a href="javascript:;">$0.99 Zone</a></li>
            <li><a href="javascript:;">Category Deals</a></li>
            <li><a href="javascript:;">Brand Clearance</a></li>
            <li><a href="javascript:;">EU / US Warehouse</a></li>
            <li><a href="javascript:;">Get it FREE</a></li>
            <li><a href="javascript:;">App Exclusives</a></li>
        </ul>

        <div class="nav-foot right-nav-bg js-shareWrap" data-sharehref="http://www.yuanbo88.com/demo/demo_1.php">
            <a href="javascript:;" class="share-fb share-btn js-shareFB"><span>0<br/>shares</span></a>
            <a href="javascript:;" class="share-vk share-btn js-shareVK"><span>1<br/>shares</span></a>
            <a href="javascript:;" class="share-tw share-btn js-shareTwitt"><span>2<br/>shares</span></a>
            <a href="javascript:;" class="share-google share-btn js-shareGoogle"><span>3<br/>shares</span></a>
            <a href="javascript:;" class="share-reddit share-btn js-shareReddit"><span>4<br/>shares</span></a>
            <a href="javascript:;" class="goto-top js-goTop"></a>
        </div>
    </section>

</div><!-- .fantastic-wrap -->

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->


<script>
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

        //top limit now
        (function(){
            var $topLimitTime = $('#js-topLimitTime'),
                $topLimitTitle = $('#js-topLimitTitle'),
                startTime = parseInt($topLimitTime.attr('data-start-time')),
                endTime = parseInt($topLimitTime.attr('data-end-time'));
            var startObj = {},
                endObj = {};

            var topInterval = setInterval(function(){
                if(startTime > 0){
                    startTime--;
                    if (startTime >= 0) {
                        startObj = limitTime(startTime, 0);
                        $topLimitTitle.html(startObj.title);
                        $topLimitTime.html('<span>'+ startObj.cDay +'</span><span>'+ startObj.CHour +'</span><span>'+ startObj.CMinute +'</span><span>'+ startObj.CSecond +'</span>');
                    }  
                }else if(startTime == 0 && endTime > 0){
                    endTime--;
                    if (endTime >= 0) {
                        endObj = limitTime(endTime, 1);
                        $topLimitTitle.html(endObj.title);
                        $topLimitTime.html('<span>'+ endObj.cDay +'</span><span>'+ endObj.CHour +'</span><span>'+ endObj.CMinute +'</span><span>'+ endObj.CSecond +'</span>');
                    }
                }else{// end
                    $topLimitTime.html('<span>00</span><span>00</span><span>00</span><span>00</span>');
                    clearInterval(topInterval);
                }
            },1000);
        })();

        //flash sale limit
        (function(){
            var flashLimitArr = $('.js-flashLimitTime');
            $.each(flashLimitArr, function(index, val) {
                var that = $(val);
                var time = parseInt(that.attr('data-time'));
                var status = parseInt(that.attr('data-status'));
                var limitObj = {};

                var nailInterval = setInterval(function(){
                    time--;
                    if(time > 0){
                        limitObj = limitTime(time, status);
                        that.siblings('.status-title').html(limitObj.title);
                        if(parseInt(limitObj.cDay) > 0){
                            that.html('over&nbsp;'+ parseInt(limitObj.cDay) +'&nbsp;Days&nbsp;'+ parseInt(limitObj.CHour) +'&nbsp;hour');
                        }else{
                          that.html('<span>'+ limitObj.cDay +'</span>:<span>'+ limitObj.CHour +'</span>:<span>'+ limitObj.CMinute +'</span>:<span>'+ limitObj.CSecond +'</span>');  
                        }
                    }else{
                        window.location.href = window.location.href;
                        clearInterval(nailInterval);
                    }
                },1000);
            });
        })();

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
                        window.location.href = window.location.href;
                        clearInterval(nailInterval);
                    }
                },1000);
            });
        })();

        //sign & win
        $('#js-signWinBox').on('click', 'li', function(){
            var $this = $(this);
            var winNum = $('#js-signWinBox').find('li').index($this);
            if($.cookie('username')){
                $.ajax({
                    url: 'demo.json',
                    type: 'POST',
                    dataType: 'json',
                    data: {winNum: winNum},
                    success: function(data){
                        if(data.status == 1){
                            $('#js-signWinBox').find('li').eq(winNum).addClass('is-wined');
                        }else{
                            alert(data.msg);
                        }
                    }
                });
            }else{//sign first
                window.location.href = 'http://www.yuanbo88.com/sign.php?ref=' + encodeURIComponent(window.location.href);
            } 
        });

        $.each($('.js-brandsProListBox'), function(index, val) {
            var that = $(val);
            var liLen = that.find('.pl-box li').length;
            var Wid = liLen*222;
            that.find('.slideList').css('width',Wid);
        });
        //click prev
        $('.js-brandsProListBox').on('click', '.prev', function(){
            var Parent = $(this).parents('.js-brandsProListBox');
            var proUlBox = Parent.find('.pl-box');
            var firstLi = '';
                firstLi += '<li class="pr">'+Parent.find('.pl-box li').eq(0).html()+'</li>';
                firstLi += '<li class="pr">'+Parent.find('.pl-box li').eq(1).html()+'</li>';
                firstLi += '<li class="pr">'+Parent.find('.pl-box li').eq(2).html()+'</li>';
                firstLi += '<li class="pr">'+Parent.find('.pl-box li').eq(3).html()+'</li>';
            proUlBox.css('left','-888px').append(firstLi);
            proUlBox.find('li').eq(0).remove();
            proUlBox.find('li').eq(0).remove();
            proUlBox.find('li').eq(0).remove();
            proUlBox.find('li').eq(0).remove();
            proUlBox.css('left',0);
        });
        //click next
        $('.js-brandsProListBox').on('click', '.next', function(){
            var Parent = $(this).parents('.js-brandsProListBox');
            var proUlBox = Parent.find('.pl-box');
            var liLen = proUlBox.find('li').length;
            var lastLi = '';
                lastLi += '<li class="pr">'+Parent.find('.pl-box li').eq(liLen-4).html()+'</li>';
                lastLi += '<li class="pr">'+Parent.find('.pl-box li').eq(liLen-3).html()+'</li>';
                lastLi += '<li class="pr">'+Parent.find('.pl-box li').eq(liLen-2).html()+'</li>';
                lastLi += '<li class="pr">'+Parent.find('.pl-box li').eq(liLen-1).html()+'</li>';
            proUlBox.css('left','888px').prepend(lastLi);
            proUlBox.find('li').eq(liLen).remove();
            proUlBox.find('li').eq(liLen).remove();
            proUlBox.find('li').eq(liLen).remove();
            proUlBox.find('li').eq(liLen).remove();
            proUlBox.css('left',0);
        });

        //show hide right-nav
        $(window).scroll(function(event) {
            var $wind = $(window),
                windScrollH = $(window).scrollTop(),
                firstTargetTop = $('#js-signWinBox').offset().top;
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

        //change tab click
        var tabWrapArr = $('.js-tabNavWrap');
        $.each(tabWrapArr, function(index, val) {
            var $this = $(val);
            $this.on('click','.js-nav',function(){
                var that = $(this);
                var index = $this.find('.js-nav').index(that);
                that.addClass('on').siblings('.js-nav').removeClass('on');
                $this.find('.js-tabTarget').eq(index).show().siblings('.js-tabTarget').hide();
            });
        });

        //share click
        //Facebook
        var shareUrl = $('.js-shareWrap').attr('data-sharehref');
        $(".js-shareFB").click(function(){
            shareDalod($(this));
        });

        //Vk分享
        $(".js-shareVK").click(function(){
            var that = $(this);
            shareSuc(2); //tips
            window.open("http://vk.com/share.php?url="+shareUrl);
        });

        //Twitter
        $(".js-shareTwitt").on('click', function(event){
            shareSuc(3); //tips
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

</script>

</body>
</html>