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
        
        .anniversary-3-wrap{ width: 100%; min-width: 1080px; font-family: Arial; font-size: 12px; background: #e9e9e9;}
        .banner-wrap{ width: 100%; min-width: 1080px; height: 822px; background: url('images/demo_24/banner_bg.jpg') top center no-repeat;}
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

        .party-sec-1{ width: 100%; height: 1368px; background: url('images/demo_24/party_bg1.jpg') top center no-repeat;}
        .party-1-wrap{ position: relative; z-index: 1; margin: 0 auto; padding-top: 395px; width: 1080px; height: 973px;}

        .party-1-style{ background: url('images/demo_24/party_sec_bg.png') bottom center no-repeat;}
        .party-1-style .goods-buy a{background:#321314;}
        .party-2-style{ background: url('images/demo_24/party_sec_bg2.png') bottom center no-repeat;}
        .party-2-style .party-nav{ border-bottom: 1px solid #9d2b1d;}
        .party-2-style .party-nav li:hover a, .party-2-style .party-nav li.active a{ background: #9d2b1d;}
        .party-2-style .goods-buy a{background:#9d2b1d;}


        .note-5, .note-6, .note-7{ position: absolute; z-index: 2;
            -webkit-animation:shake4 0.2s ease 0s infinite;
            -moz-animation:shake4 0.2s ease 0s infinite;
            -ms-animation:shake4 0.2s ease 0s infinite;
            animation:shake4 0.2s ease 0s infinite;
        }
        .note-5{ top: 150px; left: 770px;}
        .note-6{ top: 140px; left: 900px;}
        .note-7{ top: 70px; left: 1030px;}
        .party-content{ padding-top: 23px; height: 950px;}
        .party-sec-tit{ margin: 0 auto 39px; background: url('images/demo_24/party_sec_tit.png') no-repeat; font-size: 0; text-indent: -9999px;}
        .ps-tit-1{ width: 506px; height: 31px; background-position: 0 0;}
        .ps-tit-2{ width: 378px; height: 31px; background-position: 0 -60px;}
        .ps-tit-3{ width: 338px; height: 31px; background-position: 0 -120px;}
        .ps-tit-4{ width: 343px; height: 31px; background-position: 0 -180px;}
        .ps-tit-5{ width: 298px; height: 31px; background-position: 0 -240px;}

        .party-pro-wrap{ position: relative; z-index: 1; padding:13px 36px 0 296px; width: 748px;}
        .party-nav{ width: 748px; height: 50px; line-height: 50px; border-bottom: 1px solid #321314;}
        .party-nav li{ float: left; text-align: center;}
        .party-nav li.line2 a{ padding: 5px; height: 40px; line-height: 20px;}
        .party-nav li a{ display: block; color: #f9e8b6; font-size: 16px; -webkit-border-radius: 3px 3px 0 0; -moz-border-radius: 3px 3px 0 0; -ms-border-radius: 3px 3px 0 0; border-radius: 3px 3px 0 0; overflow: hidden;}
        .party-nav li:hover a, .party-nav li.active a{ background: #321314;}
        .party-nav.item-5 li{ width: 20%;}
        .party-nav.item-4 li{ width: 25%;}
        .party-nav.item-3 li{ padding: 0 3%; width: 27%;}

        .party-prolist-wrap{ position: relative; z-index: 1; padding-top: 17px;}
        .party-prolist-wrap .pro-list{ width: 756px;}
        .party-prolist-wrap .pro-list li{ float: left; margin: 0 8px 12px 0; padding: 15px 17px; width: 210px; height: 350px; background: #fff; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .party-prolist-wrap .pro-list li:hover{
            -webkit-transform: translate(0,-5px);
            -moz-transform: translate(0,-5px);
        }
        .party-prolist-wrap .goods-img{ padding: 0; width: 210px; height: 210px;}
        .party-prolist-wrap .goods-img a{ width: 210px; height: 210px;}
        .party-prolist-wrap .goods-img img{ width: 210px; height: 210px;}
        .party-prolist-wrap .goods-title{}
        .party-prolist-wrap .goods-price{}
        .party-prolist-wrap .market-price{ display: block; height: 20px; line-height: 20px; color: #b1b0b4; font-size: 14px;}
        .party-prolist-wrap .shop-price{ display: block; height: 24px; line-height: 24px; font-size: 22px; color: #ff6035;}
        .party-prolist-wrap .goods-buy a{ width: 120px; height: 30px; line-height: 30px; color: #f9e8b6; font-size: 14px;}

        .party-pro-wrap .aside{ position: absolute; z-index: 2; top:64px; left: 0; padding-top: 220px; width: 260px; height: 250px;}
        .aside .aside-img{ position: absolute; z-index: 3;}
        .aside-img-1{ top: -1px; left: 14px;}
        .aside-img-2{ top: -18px; left: 20px;}
        .aside-img-3{ top: -37px; left: 34px;}
        .aside-img-4{ top: -43px; left: -4px;}
        .aside-img-5{ top: -43px; left: 8px;}

        .sort-detail{ padding: 30px 25px 0;}
        .sort-detail .sort-tit{ margin-bottom: 10px; height: 70px; line-height: 35px; color: #321314; font-size: 26px; font-weight: bold;}
        .sort-detail .sort-off{ margin-bottom: 20px; height: 80px; line-height: 26px; color: #9d2b1d; font-size: 26px; font-weight: bold;}
        .sort-detail .sort-off strong{ display: block; height: 56px; line-height: 56px; font-size: 50px; font-weight: bold;}
        .sort-detail .sort-link{ margin-bottom: 15px; width: 180px; height: 30px;}
        .sort-detail .sort-link a{ display: block; width: 180px; height: 30px; line-height: 30px; color: #f9e8b6; font-size: 14px; text-align: center; background: #321314; -webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;}
        .aside-coupon{ position: absolute; z-index: 2; top: 480px; left: -286px; margin: 0 auto; width: 244px; height: 265px; background: url('images/demo_24/aside_coupon_bg.png') top center no-repeat; text-align: center;}
        .aside-coupon .coupon-tit{ padding-top: 15px; height: 20px; line-height: 20px; color: #795e10; font-size: 14px;}
        .aside-coupon .coupon-off{ height: 60px; line-height: 60px; font-size: 50px; color: #795e10; font-weight: bold;}
        .aside-coupon .coupon-county-time{ height: 40px; line-height: 20px; color: #795e10; font-size: 14px;}
        .aside-coupon .coupon-county-time span{ display: block; height: 20px; line-height: 20px;}
        .aside-coupon .coupon-left{ position: relative; z-index: 1; margin-bottom: 30px; padding-top: 30px; height: 12px;}
        .aside-coupon .coupon-left .bar{ margin: 0 auto; width: 126px; height: 12px; background: #321314; -webkit-border-radius: 6px; -moz-border-radius: 6px; -ms-border-radius: 6px; border-radius: 6px;}
        .aside-coupon .coupon-left .bar span{ display: block; height: 12px; background: #9d2b1d; -webkit-border-radius: 6px; -moz-border-radius: 6px; -ms-border-radius: 6px; border-radius: 6px;}
        .aside-coupon .coupon-left .left-num{position:absolute;left:50px;top:0;width:60px; height:20px;font:normal 12px/20px Arial;
            background:#fff;border:1px solid #000;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;}
        .left-num b{color:#000;padding-right:5px;}
        .left-num em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .left-num em.tri_bd{border-color:#000 transparent transparent transparent;bottom:-11px;z-index:1;}
        .left-num em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}
        .aside-coupon .get-coupon-btn{ margin: 0 auto;}

        .party-sec-2{ width: 100%; height: 1087px; background: url('images/demo_24/party_bg2.jpg') top center no-repeat;}
        .party-2-wrap{ position: relative; z-index: 1; margin: 0 auto; padding-top: 114px; width: 1080px; height: 973px;}

        .party-sec-3{ width: 100%; height: 1086px; background: url('images/demo_24/party_bg3.jpg') top center no-repeat;}
        .party-3-wrap{ position: relative; z-index: 1; margin: 0 auto; padding-top: 113px; width: 1080px; height: 973px;}

        .party-sec-4{ width: 100%; height: 1087px; background: url('images/demo_24/party_bg4.jpg') top center no-repeat;}
        .party-4-wrap{ position: relative; z-index: 1; margin: 0 auto; padding-top: 114px; width: 1080px; height: 973px;}

        .party-sec-5{ width: 100%; height: 1086px; background: url('images/demo_24/party_bg5.jpg') top center no-repeat;}
        .party-5-wrap{ position: relative; z-index: 1; margin: 0 auto; padding-top: 113px; width: 1080px; height: 973px;}

        .jjg-sec{ width: 100%; height: 1013px; background: url('images/demo_24/jjg_bg.jpg') top center no-repeat;}
        .jjg-content-wrap{ margin: 0 auto; padding-top: 173px; width: 1000px;}
        .jjg-pro-list{ width: 1010px;}
        .jjg-pro-list li{ position: relative; z-index: 1; float: left; margin: 0 8px 18px 0; padding: 15px 17px; width: 210px; height: 290px; background: #fff; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .jjg-pro-list li.item-pro:hover{
            -webkit-transform: translate(0,-5px);
            -moz-transform: translate(0,-5px);
        }
        .jjg-pro-list li .icon-jjg{ position: absolute; z-index: 2; top: 0; right: 0; display: block; width: 86px; height: 86px; background: url('images/demo_24/icon_jjg.png') center center no-repeat;} 
        .jjg-pro-list li.first{ padding: 270px 17px 0; height: 50px; background: none;}
        .jjg-pro-list li.first .view-more{ height: 30px; line-height: 30px; color: #f9e8b6; font-size: 24px; font-weight: bold;}
        .jjg-pro-list li.first .view-more:hover{text-decoration: underline;}
        .jjg-pro-list li .pro-img{ margin-bottom: 10px; width: 210px; height: 210px;}
        .jjg-pro-list li .pro-img img{ width: 210px; height: 210px;}
        .jjg-pro-list li .pro-title{ height: 36px; line-height: 18px; overflow: hidden; text-align: center;}
        .jjg-pro-list li .pro-title a{ font-size: 14px; color: #171717;}
        .jjg-pro-list li .pro-price{ height: 40px; line-height: 40px; color: #ff6035; font-size: 22px; font-weight: bold; text-align: center;}

        .foot-sec-wrap{ width: 100%; height: 1562px;background: url('images/demo_24/foot_bg.jpg') top center no-repeat;}
        .foot-content-wrap{ margin: 0 auto; width: 1000px;}
        .active-sec-1, .active-sec-2, .active-sec-3{ position: relative; z-index: 1;}
        .foot-content-wrap a{ position: absolute; z-index: 2;-webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .foot-content-wrap a:hover{
            -webkit-transform: translate(0,-5px);
            -moz-transform: translate(0,-5px);
        }
        .active-sec-1{ width: 100%; height: 791px;}
        .active-sec-1 .banner-1{ top: 18px; left: 102px;}
        .active-sec-1 .banner-2{ top: 0; right: -10px;}
        .active-sec-1 .banner-3{ top: 350px; left: 0;}
        .active-sec-1 .banner-4{ top: 350px; left: 323px;}
        .active-sec-2{ margin-bottom: 42px; width: 100%; height: 370px;}
        .active-sec-2 .banner-5{ top: 0; left: 0;}
        .active-sec-2 .banner-6{ top: 0; left: 289px;}
        .active-sec-2 .banner-7{ top: 0; left: 578px;}
        .active-sec-2 .banner-8{ top: 0; right: 0;}
        .active-sec-2 .banner-9{ top: 188px; left: 578px;}
        .active-sec-2 .banner-10{ top: 188px; right: 0;}
        .active-sec-2 .note-6{top: 210px; left: 1200px;}
        .active-sec-2 .note-7{top: 150px; left: 1130px;}
        .active-sec-3{ width: 100%; height: 190px;}
        .active-sec-3 .banner-11{ top: 0; left: 0;}
        .active-sec-3 .banner-12{ top: 0; left: 336px;}
        .active-sec-3 .banner-13{ top: 0; right: 0;}
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
                        <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                    </li>
                    <li>
                        <p class="coupon-value">50%</p>
                        <p class="coupon-scope">SMART WATCHES</p>
                        <p class="coupon-country">HK,HK-2,China</p>
                        <p class="coupon-use-time">12/31/2016-12/31/2016</p>
                        <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                    </li>
                    <li>
                        <p class="coupon-value">50%</p>
                        <p class="coupon-scope">SMART WATCHES</p>
                        <p class="coupon-country">HK,HK-2,China</p>
                        <p class="coupon-use-time">12/31/2016-12/31/2016</p>
                        <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
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

        <!-- Party section 1 -->
        <section class="party-sec-1">
            <div class="party-1-wrap party-1-style">
                <span class="note-5"><img src="images/demo_24/note_5.png" alt="Anniversary 3rd"></span>
                <span class="note-6"><img src="images/demo_24/note_1.png" alt="Anniversary 3rd"></span>
                <span class="note-7"><img src="images/demo_24/note_6.png" alt="Anniversary 3rd"></span>

                <div class="party-content"> 
                    <h3 class="party-sec-tit ps-tit-1">TOP PHONES AND TABLETS</h3>   
                    
                    <div class="party-pro-wrap">
                        <ul class="party-nav clearfix item-5 js-sortNav">
                            <li class="active js-navItem"><a href="javascript:;">HOT</a></li>
                            <li class="js-navItem"><a href="javascript:;">PHONES</a></li>
                            <li class="js-navItem"><a href="javascript:;">TABLETS</a></li>
                            <li class="js-navItem"><a href="javascript:;">INTEL</a></li>
                            <li class="js-navItem"><a href="javascript:;">ACCESSORIES</a></li>
                        </ul>

                        <div class="aside">
                            <h4 class="aside-img aside-img-1"><img src="images/demo_24/sort_1.png" alt="sort 1"></h4>
                            <div class="sort-detail">
                                <p class="sort-tit">MOBILE POWERHOUSES</p>
                                <p class="sort-off">UP TO <strong>60%OFF</strong></p>
                                <p class="sort-link"><a href="javascript:;">ULTIMATE PERFORMANCE ►</a></p>
                            </div>
                        </div><!-- .aside -->

                        <div class="party-prolist-wrap js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                            </ul>
                        </div><!-- .party-prolist-wrap -->

                        <div class="party-prolist-wrap none js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                        </div><!-- .party-prolist-wrap -->

                        <div class="party-prolist-wrap none js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                        </div><!-- .party-prolist-wrap -->

                        <div class="party-prolist-wrap none js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                        </div><!-- .party-prolist-wrap -->

                        <div class="party-prolist-wrap none js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                        </div><!-- .party-prolist-wrap -->

                    </div>
                </div>
            </div>
        </section><!-- .party-sec-1 -->

        <!-- Party section 2 -->
        <section class="party-sec-2">
            <div class="party-2-wrap party-2-style">
                <div class="party-content"> 
                    <h3 class="party-sec-tit ps-tit-2">THE FUTURE IS NOW</h3>   
                    
                    <div class="party-pro-wrap">
                        <ul class="party-nav clearfix item-5 js-sortNav">
                            <li class="active js-navItem line2"><a href="javascript:;">COMPUTERS & NETWORKING</a></li>
                            <li class="js-navItem line2"><a href="javascript:;">CONSUMER ELECTRONICS</a></li>
                            <li class="js-navItem"><a href="javascript:;">3D PRINTER</a></li>
                            <li class="js-navItem"><a href="javascript:;">AUTOMOBILE</a></li>
                            <li class="js-navItem line2"><a href="javascript:;">OFFICE & SCHOOL</a></li>
                        </ul>

                        <div class="aside">
                            <h4 class="aside-img aside-img-2"><img src="images/demo_24/sort_2.png" alt="sort 2"></h4>
                            <div class="sort-detail">
                                <p class="sort-tit">CUTTING EDGE TECH</p>
                                <p class="sort-off">UP TO <strong>70%OFF</strong></p>
                                <p class="sort-link"><a href="javascript:;">GET TOP DEALS ►</a></p>
                            </div>
                        </div><!-- .aside -->

                        <div class="party-prolist-wrap js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                            </ul>
                        </div><!-- .party-prolist-wrap -->

                        <div class="party-prolist-wrap none js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                        </div><!-- .party-prolist-wrap -->
                    </div>
                </div>
            </div>
        </section><!-- .party-sec-2 -->

        <!-- Party section 3 -->
        <section class="party-sec-3">
            <div class="party-3-wrap party-1-style">
                <div class="party-content"> 
                    <h3 class="party-sec-tit ps-tit-3">YOUR SMART LIFE</h3>   
                    
                    <div class="party-pro-wrap">
                        <ul class="party-nav clearfix item-4 js-sortNav">
                            <li class="active js-navItem"><a href="javascript:;">HOME & GARDEN</a></li>
                            <li class="js-navItem"><a href="javascript:;">LED</a></li>
                            <li class="js-navItem"><a href="javascript:;">TOOLS</a></li>
                            <li class="js-navItem"><a href="javascript:;">TOYS</a></li>
                        </ul>

                        <div class="aside">
                            <h4 class="aside-img aside-img-3"><img src="images/demo_24/sort_3.png" alt="sort 3"></h4>
                            <div class="sort-detail">
                                <p class="sort-tit">LIFE MADE EASY</p>
                                <p class="sort-off">UP TO <strong>70%OFF</strong></p>
                                <p class="sort-link"><a href="javascript:;">EFFORTLESS DEALS ►</a></p>
                            </div>
                        </div><!-- .aside -->

                        <div class="party-prolist-wrap js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                            </ul>
                        </div><!-- .party-prolist-wrap -->

                        <div class="party-prolist-wrap none js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                        </div><!-- .party-prolist-wrap -->
                    </div>
                </div>
            </div>
        </section><!-- .party-sec-3 -->

        <!-- Party section 4 -->
        <section class="party-sec-4">
            <div class="party-4-wrap party-2-style">
                <div class="party-content"> 
                    <h3 class="party-sec-tit ps-tit-4">EMBRACE NATURE</h3>   
                    
                    <div class="party-pro-wrap">
                        <ul class="party-nav clearfix item-3 js-sortNav">
                            <li class="active js-navItem"><a href="javascript:;">RC</a></li>
                            <li class="js-navItem"><a href="javascript:;">OUTDOOR & SPORTS</a></li>
                            <li class="js-navItem"><a href="javascript:;">ACTION CAMS</a></li>
                        </ul>

                        <div class="aside">
                            <h4 class="aside-img aside-img-4"><img src="images/demo_24/sort_4.png" alt="sort 4"></h4>
                            <div class="sort-detail">
                                <p class="sort-tit">FOR EVERY ADVENTURE</p>
                                <p class="sort-off">UP TO <strong>70%OFF</strong></p>
                                <p class="sort-link"><a href="javascript:;">LIVE EACH MOMENT ►</a></p>
                            </div>
                        </div><!-- .aside -->

                        <div class="party-prolist-wrap js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                            </ul>
                        </div><!-- .party-prolist-wrap -->

                        <div class="party-prolist-wrap none js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                        </div><!-- .party-prolist-wrap -->
                    </div>
                </div>
            </div>
        </section><!-- .party-sec-4 -->

        <!-- Party section 5 -->
        <section class="party-sec-5">
            <div class="party-5-wrap party-1-style">
                <div class="party-content"> 
                    <h3 class="party-sec-tit ps-tit-5">FASHION TREND</h3>   
                    
                    <div class="party-pro-wrap">
                        <ul class="party-nav clearfix item-4 js-sortNav">
                            <li class="active js-navItem"><a href="javascript:;">MEN'S CLOTHING</a></li>
                            <li class="js-navItem"><a href="javascript:;">WOMEN'S CLOTHING</a></li>
                            <li class="js-navItem"><a href="javascript:;">WATCHES & JEWELRY</a></li>
                            <li class="js-navItem"><a href="javascript:;">HEALTH & BEAUTY</a></li>
                        </ul>

                        <div class="aside">
                            <h4 class="aside-img aside-img-5"><img src="images/demo_24/sort_5.png" alt="sort 5"></h4>
                            <div class="sort-detail">
                                <p class="sort-tit">PERFECT INSIDE & OUT</p>
                                <p class="sort-off">UP TO <strong>80%OFF</strong></p>
                                <p class="sort-link"><a href="javascript:;">STYLE TO GO ►</a></p>
                            </div>
                        </div><!-- .aside -->

                        <div class="party-prolist-wrap js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                            </ul>
                        </div><!-- .party-prolist-wrap -->

                        <div class="party-prolist-wrap none js-sortItem">
                            <div class="aside-coupon">
                                <h5 class="coupon-tit">UKEFONE</h5>
                                <p class="coupon-off">50%</p>
                                <p class="coupon-county-time">
                                    <span>ES-UN、ES-UN</span>
                                    <span>12/28/2016</span>
                                </p>
                                <div class="coupon-left">
                                    <span class="left-num"><em class="tri_bd"></em><em class="tri_bg"></em><b class="red">10&nbsp;</b>Left</span>
                                    <p class="bar"><span style="width: 50%;"></span></p>
                                </div>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-ok">Discover Deals</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-alltoken">All Taken</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-received">Already Received</a></p>
                                <p class="get-coupon-btn"><a href="javascript:;" class="js-getCoupon is-expired">Have Expired</a></p>
                            </div>

                            <ul class="clearfix pro-list">
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
                        </div><!-- .party-prolist-wrap -->
                    </div>
                </div>
            </div>
        </section><!-- .party-sec-5 -->

        <!-- Jjg section -->
        <section class="jjg-sec">
            <div class="jjg-content-wrap">
                <ul class="clearfix jjg-pro-list">
                    <li class="first">
                        <a href="#" class="view-more">VIEW MORE >></a>
                    </li>
                    <li class="item-pro">
                        <span class="icon-jjg"></span>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" alt=""></a></p>
                        <p class="pro-title"><a href="#">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                        <p class="pro-price">$279.51</p>
                    </li>
                    <li class="item-pro">
                        <span class="icon-jjg"></span>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" alt=""></a></p>
                        <p class="pro-title"><a href="#">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                        <p class="pro-price">$279.51</p>
                    </li>
                    <li class="item-pro">
                        <span class="icon-jjg"></span>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" alt=""></a></p>
                        <p class="pro-title"><a href="#">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                        <p class="pro-price">$279.51</p>
                    </li>
                    <li class="item-pro">
                        <span class="icon-jjg"></span>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" alt=""></a></p>
                        <p class="pro-title"><a href="#">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                        <p class="pro-price">$279.51</p>
                    </li>
                    <li class="item-pro">
                        <span class="icon-jjg"></span>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" alt=""></a></p>
                        <p class="pro-title"><a href="#">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                        <p class="pro-price">$279.51</p>
                    </li>
                    <li class="item-pro">
                        <span class="icon-jjg"></span>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" alt=""></a></p>
                        <p class="pro-title"><a href="#">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                        <p class="pro-price">$279.51</p>
                    </li>
                    <li class="item-pro">
                        <span class="icon-jjg"></span>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/demo/images/demo_14/morefuns_1.jpg" alt=""></a></p>
                        <p class="pro-title"><a href="#">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                        <p class="pro-price">$279.51</p>
                    </li>
                </ul>
            </div>
        </section><!-- .jjg-sec -->

        <!-- Foot section -->
        <section class="foot-sec-wrap">
            <div class="foot-content-wrap">
                <div class="active-sec-1">
                    <a href="#" class="banner-1"><img src="images/demo_24/banner1.png" alt=""></a>
                    <a href="#" class="banner-2"><img src="images/demo_24/banner2.png" alt=""></a>
                    <a href="#" class="banner-3"><img src="images/demo_24/banner3.png" alt=""></a>
                    <a href="#" class="banner-4"><img src="images/demo_24/banner4.png" alt=""></a>
                </div>

                <div class="active-sec-2">
                    <a href="#" class="banner-5"><img src="images/demo_24/banner5.jpg" alt=""></a>
                    <a href="#" class="banner-6"><img src="images/demo_24/banner6.jpg" alt=""></a>
                    <a href="#" class="banner-7"><img src="images/demo_24/banner7.jpg" alt=""></a>
                    <a href="#" class="banner-8"><img src="images/demo_24/banner8.jpg" alt=""></a>
                    <a href="#" class="banner-9"><img src="images/demo_24/banner9.jpg" alt=""></a>
                    <a href="#" class="banner-10"><img src="images/demo_24/banner10.jpg" alt=""></a>

                    <span class="note-6"><img src="images/demo_24/note_1.png" alt="Anniversary 3rd"></span>
                    <span class="note-7"><img src="images/demo_24/note_6.png" alt="Anniversary 3rd"></span>
                </div>

                <div class="active-sec-3">
                    <a href="#" class="banner-11"><img src="images/demo_24/banner11.jpg" alt=""></a>
                    <a href="#" class="banner-12"><img src="images/demo_24/banner12.jpg" alt=""></a>
                    <a href="#" class="banner-13"><img src="images/demo_24/banner13.jpg" alt=""></a>
                </div>
            </div>
        </section>


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