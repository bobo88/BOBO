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
        .w1100{ margin: 0 auto; width: 1100px;}
        .icon{ display: inline-block; background: url(images/demo_19/icon.png) no-repeat; *display: inline;*zoom: 1;}

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
        .newyear-2017 i { font-family: 'icomoon' !important; speak: none; font-style: normal; font-weight: normal; font-variant: normal; text-transform: none; line-height: 1; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;}
        .newyear-2017 .my_shop_price i { font-family: Arial !important;}
        .newyear-2017 .shopPrice i {font-weight: bold;}

        .newyear-2017{ width: 100%; min-width: 1100px; font-family: Bebas, Arial; font-size: 12px;}
        .banner-wrap{ width: 100%; min-width: 1100px; height: 625px; background: url(images/demo_19/banner_bg.jpg) top center no-repeat;}
        .bg{ padding-bottom: 100px; background: url(images/demo_19/bg.jpg) top center no-repeat;}

        .gift-wrap{ margin-bottom: 50px; height: 307px; background: url(images/demo_19/gift_bg.jpg) top center no-repeat;}
        .gift-tit{ margin: 0 auto 15px; padding-top: 20px; width: 1030px; height: 60px; text-align: center;}
        .gift-tit .tit-name{ position: relative; z-index: 2; padding: 0 50px; height: 60px; line-height: 60px; color: #7f4e3a; font-size: 36px; background: #efceab;}
        .gift-tit .line-bg{ position: relative; z-index: 1; left: 0; top: -30px; display: block; width: 100%; height: 1px; border-top: 1px solid #cc9a73;}

        .gift-box-list-wrap{ margin: 0 auto; width: 1030px; overflow: hidden;}
        .gift-box-list{ width: 1040px;}
        .gift-box-list li{ float: left; margin-right: 9px; width: 251px; height: 184px; text-align: center;}

        .coupon-detail-wrap{ padding: 32px 0 17px; width: 251px; height: 135px;}
        .coupon-detail{ padding: 10px 0 0 11px; width: 240px; height: 125px; font-family: Arial; background: url(images/demo_19/coupon_bg.png) center center no-repeat;}
        .coupon-detail .coupon-tit{ width: 220px; height: 26px; line-height: 26px; color: #7f4e3a; font-size: 14px; font-weight: bold; text-align: center; background: #faf1d6; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
        .coupon-detail .use-rule-wrap{ position: relative; z-index: 1;}
        .coupon-detail .rule-con{ margin-bottom: 28px; width: 150px; text-align: left;}
        .coupon-detail .rule-con .rule-con-txt{ height: 40px; line-height: 20px; color: #965c04; font-size: 14px; overflow: hidden; text-align: left;}
        .coupon-detail .coupon-price{ position: absolute; z-index: 1; top: 0; right: 10px; padding: 0 26px 0 10px; height: 42px; line-height: 42px; color: #7f4e3a; font-family: Bebas, Arial; font-size: 40px;}
        .coupon-detail .coupon-price .icon-left{ position: absolute; z-index: 2; bottom: 0; left: 0; height: 30px; line-height: 30px; font-size: 20px;}
        .coupon-detail .coupon-price .v-top{ position: absolute; z-index: 2; top: 0; right: 0; width: 28px; line-height: 24px; height: 24px; font-size: 20px;}
        .coupon-detail .coupon-btn-wrap{ padding-right: 20px;}
        .coupon-detail .get-coupon-btn{ display: inline-block; width: 110px; height: 20px; line-height: 20px; color: #fffbe4; font-size: 12px; text-align: center;*display: inline;*zoom:1; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;}
        .coupon-detail .get-coupon-btn.is-ok{ background: #7f4e3a;}
        .coupon-detail .get-coupon-btn.is-received{ background: #7f4e3a;}
        .coupon-detail .get-coupon-btn.is-end{ color: #666; background: #ccc;}

        .pro-list-wrap li{ float: left; width: 215px; margin-right: 6px; margin-bottom: 8px; background-color: #fff; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pro-list-wrap li:hover{
            -webkit-transform: translate(0,-5px);
            -moz-transform: translate(0,-5px);
        }
        .goods-time{height:30px; color:#fff;font-size:14px;background-color:#e4bc94;text-align:center;}
        .goods-time span{display:inline-block;vertical-align:middle;height:30px;line-height:30px;padding:0 5px;}

        .goods-img{ z-index: 1; width:220px;height:220px;margin:0 auto; padding-top: 15px;}
        .goods-img a{display:block;width:220px;height:220px;overflow:hidden; text-align: center;}
        .goods-img img{height:220px;width:auto;display:inline;vertical-align:top;}
        .goods-img .to-cart{ position: absolute; z-index: 2; bottom: 10px; right: 10px; display: block; padding: 10px 9px 10px 10px; width: 26px; height: 25px; background: #e6dac1; -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%;}
        .goods-img .to-cart:hover{ background: #fff;}
        .goods-img .to-cart .icon-cart{ width: 26px; height: 25px; background-position: -850px -200px;}

        .goods-title{font-size:14px;width:220px;margin:auto;height:32px;line-height:16px;overflow:hidden;text-align:center;margin-top:8px;}
        .goods-title a{color:#333333; text-decoration: none;}
        .goods-title a:hover{text-decoration: underline;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#b1b0b4;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#d82425;font-size:22px; font-weight: bold;}

        .goods-limit{width:220px;margin:5px auto 0;height:50px;position:relative;}
        .goods-limit .market-price{ color: #b1b0b4; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#f4ebcd;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #e4bc94;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .goods-limit-tips{
            position:absolute;left:0;top:-30px;width:95px; height:20px;font:normal 12px/20px Arial;
            background:#fff;border:1px solid #000;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-limit-tips b{color:#e92a2a;padding-right:5px;}
        .goods-limit-tips em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .goods-limit-tips em.tri_bd{border-color:#000 transparent transparent transparent;bottom:-11px;z-index:1;}
        .goods-limit-tips em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}
        .goods-nolimit{text-align:center;font-size:14px;margin-top:15px;color:#987643;}
        .goods-buy{text-align:center;margin-top:10px;}
        .goods-buy a{
            display:inline-block;width:170px;height:30px;text-align:center;line-height:30px;background:#e4bc94;text-transform:uppercase;
            color:#7f4e3a;font-weight:bold;font-size:16px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a i{ display: inline-block; *display: inline; *zoom: 1; margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fff;}
        .goods-buy a.coming-soon{ color: #7f4e3a; background:#f4ebcd!important;}
        .goods-buy a.deal-end{ color: #fff; background:#999999!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}

        .pb-tit{ height: 120px; line-height: 120px; color: #f6efdd; font-size: 48px; font-family: Bebas, Arial; text-align: center; text-transform: uppercase;}
        .pb-tit strong{ color: #e9e09b;}

        .flash-deals-wrap, .top8deals-wrap, .zonE99-wrap, .brandslist-wrap{ margin-bottom: 30px; font-family: Arial;}
        .newyear-cate-wrap{ margin-bottom: 70px; font-family: Arial;}

        .deals-list-box{ width: 100%;}
        .deals-list-box .prolist{ padding: 35px 25px 25px 35px; width: 1040px; -webkit-border-radius: 0 0 3px 3px; -moz-border-radius: 0 0 3px 3px; border-radius: 0 0 3px 3px; background: #f4ebcd;}
        .deals-list-box .prolist li{ float: left; margin-right: 10px; margin-bottom: 10px; width: 250px; height: 450px; background: #fff;}

        .deals-nav{ width: 100%; height: 90px;}
        .deals-nav li{ float: left; padding: 20px 0 16px; width: 550px; height: 54px; text-align: center; cursor: pointer;}
        .deals-nav li p{ height: 30px; line-height: 30px; color: #e9e09b; font-size: 24px; font-weight: bold;}
        .deals-nav li span{ display: block; height: 24px; line-height: 24px; color: #fff; font-size: 16px;}
        .deals-nav li span strong{ font-weight: bold;}
        .deals-nav li.active{ background: #f4ebcd;-webkit-border-radius: 3px 3px 0 0; -moz-border-radius: 3px 3px 0 0; border-radius: 3px 3px 0 0;}
        .deals-nav li.active p{ color: #7f4e3a; font-size: 24px; font-weight: bold;}
        .deals-nav li.active span{ margin: 0 auto; width: 230px; color: #7f4e3a; font-size: 16px;}

        .top8deals-list-box{}
        .top8deals-list-box .prolist li, .zonE99-list-box .prolist li, .brandslist-list-box .prolist li, .newyear-cate-list-box .prolist li{ height: 390px;}
        .top8deals-list-box .deals-nav li{ width: 366px;}
        .top8deals-list-box .deals-nav li.last{ width: 368px;}
        .zonE99-list-box .deals-nav li{ width: 275px;}
        .zonE99-list-box .deals-nav li p{ height: 54px; line-height: 54px; font-size: 30px;}
        
        .brandslist-nav-wrap{ padding: 0 35px; background: #f4ebcd;}
        .brandslist-nav-wrap>div{ padding: 35px 0; border-bottom: 1px solid #d8c7a5;}
        .brandslist-nav-wrap .hot-brands{ padding-right: 10px; width: 150px; height: 155px; border-right: 1px solid #d8c7a5;}
        .brandslist-nav-wrap .hot-brands p{ height: 77px;}
        .brandslist-nav-wrap .hot-brands p:first-child{ border-bottom: 1px solid #d8c7a5;}
        .brandslist-nav-wrap .hot-brands p a{ display: block; padding: 29px 0 28px; height: 20px;}
        .brandslist-nav-box{ width: 860px; height: 155px; overflow: hidden;}
        .brandslist-nav-box li{ float: left; margin-left: 10px; margin-bottom: 10px; width: 135px; height: 45px; background: #fff;}
        .brandslist-nav-box li:hover{ background: #eed9ad;}
        .brandslist-nav{ width: 870px;}
        .brandslist-nav .icon{ width: 135px; height: 45px;}

        .icon-xiaomi{ background-position: 0 0;}
        .icon-ilife{ background-position: -135px 0;}
        .icon-chuwi{ background-position: -270px 0;}
        .icon-anet{ background-position: -405px 0;}
        .icon-ele{ background-position: -540px 0;}
        .icon-teclast{ background-position: -675px 0;}
        .icon-hubsan{ background-position: 0 -45px;}
        .icon-cube{ background-position: -135px -45px;}
        .icon-vernee{ background-position: -270px -45px;}
        .icon-jjrc{ background-position: -405px -45px;}
        .icon-yi{ background-position: -540px -45px;}
        .icon-beelink{ background-position: -675px -45px;}
        .icon-asus{ background-position: 0 -90px;}
        .icon-ulefone{ background-position: -135px -90px;}
        .icon-onda{ background-position: -270px -90px;}
        .icon-jumper{ background-position: -405px -90px;}
        .icon-oukitel{ background-position: -540px -90px;}
        .icon-sjcam{ background-position: -675px -90px;}
        .icon-zanstyle{ width: 135px; height: 20px; background-position: -850px 0;}
        .icon-alfawise{ width: 134px; height: 20px; background-position: -850px -45px;}

        .brands-item-wrap{ position: relative; z-index: 1; padding: 0 35px; padding-bottom: 35px; width: 1030px; background: #f4ebcd; overflow: hidden;}
        .brands-item-wrap .wrap-box{ margin-bottom: 20px; width: 1030px; height: 425px; overflow: hidden;}
        .brands-item-wrap .prolist{ padding: 35px 0 0; width: 1040px;}
        .brands-item-wrap .brands-more{ margin: 0 auto; width: 1028px; height: 88px; font-family: Myriad Pro, Arial; border: 1px solid #d8c7a5;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;
            -webkit-transition: 0.28s;  -moz-transition: 0.28s;  -o-transition: 0.28s;  -ms-transition: 0.28s;  transition: 0.28s;
        }
        .brands-item-wrap .brands-more:hover{
            -webkit-transform: translate(0,-2px); -moz-transform: translate(0,-2px); transform: translate(0,-2px);
            -webkit-box-shadow: 0 4px 8px rgba(0,0,0,0.25),0 5px 5px rgba(0,0,0,0.1);
            -moz-box-shadow: 0 4px 8px rgba(0,0,0,0.25),0 5px 5px rgba(0,0,0,0.1);
            box-shadow: 0 4px 8px rgba(0,0,0,0.25),0 5px 5px rgba(0,0,0,0.1);
        }
        .brands-item-wrap .brands-more a{ display: block; height: 88px; line-height: 88px; color: #7f4e3a; font-size: 28px; text-transform: uppercase; text-align: center;}
        .brands-item-wrap .brands-more a strong{ font-size: 36px; font-weight: bold;}

        .brands-pro-all-wrap{  margin: 0 auto; padding: 30px 100px 10px; width: 888px; background: #fff;}

        .wrap-box .direction-nav{ display: none; margin: 0 auto; width: 1030px;}
        .wrap-box .direction-nav a{ display: block; position: absolute; width: 28px; height:56px; top: 192px; cursor: pointer; z-index: 10; text-indent: -9999px;}
        .wrap-box .direction-nav a.prev{ background-position: -850px -90px; left: 0;}
        .wrap-box .direction-nav a.next{ background-position: -972px -90px; right: 0;}
        
        .cate-sort-nav{ padding: 35px 35px 0 35px; background: #f4ebcd;}
        .category { font-size: 0; width: 1000px; height: 268px; margin: auto; overflow: hidden;}
        .category span { position: relative; z-index: 1; margin: 0 18px 8px 17px; display: inline-block; height: 130px; width: 90px; color: #7f4e3a; font-size: 14px; *display: inline;*zoom:1;}
        .category span strong{ display: block; width: 90px; height: 90px; padding: 0 5px; text-align: center; -webkit-box-sizing: border-box; box-sizing: border-box; vertical-align: top; border-width: 1px; border-style: solid; border-color: transparent; -webkit-transition: all .2s ease; transition: all .2s ease; cursor: pointer; -webkit-border-radius: 50%; border-radius: 50%; background: #f9f3e0;}
        .category span em{ display: block; padding: 4px 0; height: 32px; line-height: 16px; overflow: hidden; text-align: center;}

        .category span.active strong, .category span:hover strong { background: #eddebf;}
        .category i { display: block; font-size: 24px; margin: auto; color: #7f4e3a; text-align: center; margin-bottom: 5px;margin-top: 32px;}

        .foot-banner-wrap{ background: #f4ebcd;}
        .foot-banner-wrap a{-webkit-transition: 0.28s;  -moz-transition: 0.28s;  -o-transition: 0.28s;  -ms-transition: 0.28s;  transition: 0.28s;}
        .foot-banner-wrap a:hover{
            -webkit-transform: translate(0,-5px); -moz-transform: translate(0,-5px); transform: translate(0,-5px);
            -webkit-box-shadow: 0 14px 28px rgba(0,0,0,0.25),0 10px 10px rgba(0,0,0,0.1);
            -moz-box-shadow: 0 14px 28px rgba(0,0,0,0.25),0 10px 10px rgba(0,0,0,0.1);
            box-shadow: 0 14px 28px rgba(0,0,0,0.25),0 10px 10px rgba(0,0,0,0.1);
        }
        .little-banner-list{ padding: 35px 25px 0 35px; width: 1050px;}
        .little-banner-list li{ float: left; margin-right: 20px; margin-bottom: 20px; width: 330px; height: 200px;}
        .little-banner-list li a{ display: block; width: 330px; height: 200px;}
        .forfree-banner{ padding: 0 35px 35px; width: 1030px; height: 240px;}
        .forfree-banner a{ display: block; width: 1030px; height: 240px;}

        .right-nav-bg{}
        .right-nav-wrap{ display: none; position: fixed; z-index: 9999; top: 150px; right: 30px; padding: 95px 10px 10px; width: 138px; font-family: Arial; background: #fef9df;}
        .right-nav-wrap .nav-top{ position: absolute;z-index: 9999; top: -120px; left: -17px; width: 192px; height: 215px;}
        .right-nav-wrap .nav-top .icon-navtop{ width: 192px; height: 215px; background-position: 0 -200px;}

        .right-nav-wrap .nav-foot{ position: relative; z-index: 1; margin-bottom: 15px; width: 138px; text-align: center;}
        .right-nav-wrap .nav-foot a{ position: absolute; z-index: 2;}
        .right-nav-wrap .nav-foot .share-btn{ position: relative; z-index: 9999; margin: 0 6px 7px 7px; display: inline-block; width: 30px; height: 30px; background: #ca9d73; -webkit-border-radius: 30px; -moz-border-radius: 30px; border-radius: 30px; *display: inline;*zoom:1;
            -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;
        }
        .right-nav-wrap .nav-foot .share-btn:hover{
            background: #7f4e3a;
            -webkit-transform: translate(0, -5px);
            -moz-transform: translate(0, -5px);
            transform: translate(0, -5px);
        }
        .right-nav-wrap .nav-foot .share-btn .icon{ position: absolute; z-index: 2; top: 50%; left: 50%; -webkit-transform: translate(-50%, -50%); -moz-transform: translate(-50%, -50%); transform: translate(-50%, -50%);}
        .right-nav-wrap .nav-foot .icon-fb{ width: 10px; height: 19px; background-position: -270px -300px;}
        .right-nav-wrap .nav-foot .icon-vk{ width: 18px; height: 14px; background-position: -310px -300px;}
        .right-nav-wrap .nav-foot .icon-tw{ width: 18px; height: 11px; background-position: -350px -300px;}
        .right-nav-wrap .nav-foot .icon-google{ width: 19px; height: 12px; background-position: -390px -300px;}
        .right-nav-wrap .nav-foot .icon-reddit{ width: 18px; height: 18px; background-position: -430px -300px;}
        
        .right-nav-wrap .nav-cont{ margin-bottom: 15px; padding-top: 2px; width: 138px; height: 298px; background: #ca9d73; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; text-align: center;}
        .right-nav-wrap .nav-cont ul{ margin-bottom: 10px;}
        .right-nav-wrap .nav-cont li{ margin-top: 4px; width: 100%; height: 30px;}
        .right-nav-wrap .nav-cont li a{ display: block; width: 100%; height: 30px; line-height: 30px; color: #fff; font-size: 14px; text-decoration: none;}
        .right-nav-wrap .nav-cont li a:hover, .right-nav-wrap .nav-cont li.active a{ color: #7f4e3a;}
        .right-nav-wrap .nav-cont .goto-top{ width: 45px; height: 26px; background-position: -270px -200px;}
        .right-nav-wrap .nav-video{ position: relative; z-index: 9999; width: 100%; height: 90px; background: #ca9d73; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; cursor: pointer;}
        .right-nav-wrap .nav-video .icon-video{ position: absolute; z-index: 2; top: 50%; left: 50%; -webkit-transform: translate(-50%, -50%); -moz-transform: translate(-50%, -50%); transform: translate(-50%, -50%); width: 43px; height: 37px; background-position: -350px -200px;}

        #popShowBox{width: 400px; padding: 20px; text-align: center; background:#fff;}
        #popShowBox .f24{font-size: 24px;}
        #popShowBox strong{font-weight: bold; color: #fe114f;}
        #popShowBox .btns a{width: 120px; height: 36px; line-height: 36px; display: block; margin-left: auto; margin-right: auto; background-color: #000; border-radius: 3px; font-size: 18px; font-weight: bold; color: #fff; text-transform: uppercase; text-decoration:none;}
        
        .banner-box{ padding-top: 360px;}
        .banner-box .top-limit-time{ padding: 0 335px 0 365px; width: 400px;}
        .banner-box .top-limit-time .time-tit{ margin-bottom: 8px; height: 20px;}
        .banner-box .top-limit-time .time-tit span{ display: inline-block; margin-right: 29px; width: 71px; height: 20px; line-height: 20px; color: #6f0605; font-size: 18px; text-align: center;}
        .banner-box .top-limit-time .time-num {}
        .banner-box .top-limit-time .time-num span{ display: inline-block; margin-right: 29px; width: 71px; height: 65px; line-height: 65px; color: #fff; font-size: 48px; font-weight: bold; text-align: center; background: url(images/demo_19/icon.png) no-repeat; background-position: -470px -200px; *display: inline;*zoom: 1;}
        .new-year-tips{ display: none; color: #e8e49d; font-size: 100px; text-align: center;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>
    
    <div class="newyear-2017">
        <div class="banner-wrap">
            <div class="banner-box w1100"> 
                <div class="top-limit-time js-topTimeWrap">
                    <p class="time-tit"><span>Days</span><span>Hours</span><span>Mins</span><span>Secs</span></p>
                    <p class="time-num js-topLimitTime" data-time="10" data-status="0"><span>00</span><span>00</span><span>00</span><span>00</span></p>
                </div>

                <div class="new-year-tips js-newYearTips">2017</div>
            </div>
        </div>

        <div class="bg">
            <section class="gift-wrap w1100 js-floorTarget">
                <h3 class="gift-tit">
                    <span class="tit-name">CLAIM YOUR NEW YEAR GIFT</span>
                    <span class="line-bg"></span>
                </h3>
                
                <div class="gift-box-list-wrap">
                    <ul class="clearfix gift-box-list">
                        <li>
                            <a href="javascript:;" class="box-img none"><img src="images/demo_19/gift_box.png" height="184" alt="New Year 2017"></a>
                            
                            <div class="coupon-detail-wrap">
                                <div class="coupon-detail">
                                    <div class="use-rule-wrap clearfix">
                                        <div class="rule-con fl">
                                            <p class="rule-con-txt">
                                                - HK,HK-2,China<br/>
                                                - 12/31/2016<br/>
                                            </p>
                                            <a href="javascript:;" class="get-coupon-btn js-getCoupon is-ok">Already Received</a>
                                        </div>
                                        <p class="coupon-price fr">
                                            <span class="icon-left">$</span>25 <span class="v-top">.93</span>
                                        </p>
                                    </div>

                                    <p class="coupon-tit">Automobiles & Motorcycle</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;" class="box-img"><img src="images/demo_19/gift_box.png" height="184" alt="New Year 2017"></a>
                        </li>
                        <li>
                            <a href="javascript:;" class="box-img"><img src="images/demo_19/gift_box.png" height="184" alt="New Year 2017"></a>
                        </li>
                        <li>
                            <a href="javascript:;" class="box-img"><img src="images/demo_19/gift_box.png" height="184" alt="New Year 2017"></a>
                        </li>
                    </ul>
                </div>
            </section><!-- .gift-wrap -->

            <section class="flash-deals-wrap w1100 js-floorTarget">
                <h3 class="pb-tit"><strong>2017</strong>&nbsp;&nbsp;&nbsp;&nbsp;Flash&nbsp;&nbsp;&nbsp;&nbsp;Deals</h3>

                <div class="deals-list-box js-tabSecWrap">
                    <ul class="deals-nav clearfix js-sortNav">
                        <li class="active js-navItem">
                            <p>PROMO ENDS IN:</p>
                            <span data-time="12588" data-status="1" class="js-switchTabTime">&nbsp;</span>
                        </li>
                        <li class="js-navItem">
                            <p>PROMO ENDS IN:</p>
                            <span data-time="214740" data-status="2" class="js-switchTabTime">&nbsp;</span>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem">
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="2">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="2">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="8888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                        <li class="pr">
                            <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                            </p>
                            <div class="border-wrap">
                              <p class="goods-img pr">
                                  <a href="#" target="special">
                                      <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                  </a>
                                  <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                              <a href="javascript:;" class="toCart"></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </section><!-- .flash-deals-wrap -->

            <section class="top8deals-wrap w1100 js-floorTarget">
                <h3 class="pb-tit"><strong>2017&nbsp;&nbsp;&nbsp;&nbsp;•</strong>&nbsp;&nbsp;&nbsp;&nbsp;Top&nbsp;&nbsp;8&nbsp;&nbsp;Deals</h3>

                <div class="deals-list-box top8deals-list-box js-tabSecWrap">
                    <ul class="deals-nav clearfix js-sortNav">
                        <li class="active js-navItem">
                            <p>TOP 8</p>
                            <span>New Arrivals</span>
                        </li>
                        <li class="js-navItem">
                            <p>TOP 8</p>
                            <span>Order qualities Deals</span>
                        </li>
                        <li class="last js-navItem">
                            <p>TOP 8</p>
                            <span>Amount Deals</span>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem none">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem none">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>
                </div>
            </section><!-- .top8deals-wrap -->

            <section class="brandslist-wrap w1100 js-floorTarget">
                <h3 class="pb-tit"><strong>2017&nbsp;&nbsp;&nbsp;&nbsp;•</strong>&nbsp;&nbsp;&nbsp;&nbsp;New&nbsp;&nbsp;Year&nbsp;&nbsp;Brands</h3>

                <div class="deals-list-box brandslist-list-box js-tabSecWrap">
                    <div class="brandslist-nav-wrap">
                        <div class="clearfix">
                            <div class="fl hot-brands">
                                <p><a href="#" target="_blank"><i class="icon icon-zanstyle"></i></a></p>
                                <p><a href="#" target="_blank"><i class="icon icon-alfawise"></i></a></p>
                            </div>
                            
                            <div class="brandslist-nav-box fr">
                                <ul class="brandslist-nav clearfix js-sortNav">
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-xiaomi"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-ilife"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-chuwi"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-anet"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-ele"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-teclast"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-hubsan"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-cube"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-vernee"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-jjrc"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-yi"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-beelink"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-asus"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-ulefone"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-onda"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-jumper"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-oukitel"></a></li>
                                    <li class="js-navItem"><a href="javascript:;" class="icon icon-sjcam"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .brandslist-nav-wrap -->
                    
                    <div class="brands-item-wrap js-sortItem">
                        <div class="wrap-box js-brandsProListBox">
                            <ul class="clearfix prolist pro-list-wrap">
                                <li class="pr">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                        </a>
                                        <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
                                    </p>
                                    <p class="goods-title">
                                        <a href="#" target="special">111 1111 1111 111</a>
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
                                    <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                </li>
                                <li class="pr">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                        </a>
                                        <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
                                    </p>
                                    <p class="goods-title">
                                        <a href="#" target="special">2222 2222 222 22 2</a>
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
                                    <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                </li>
                                <li class="pr">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                        </a>
                                        <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
                                    </p>
                                    <p class="goods-title">
                                        <a href="#" target="special">333 333 3333 33</a>
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
                                    <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                </li>
                                <li class="pr">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                        </a>
                                        <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
                                    </p>
                                    <p class="goods-title">
                                        <a href="#" target="special">44 4444 444 4444 44</a>
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
                                    <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                </li>
                                <li class="pr">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                        </a>
                                        <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
                                    </p>
                                    <p class="goods-title">
                                        <a href="#" target="special">555 555 5555 555 5</a>
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
                                    <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                </li>
                                <li class="pr">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                        </a>
                                        <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
                                    </p>
                                    <p class="goods-title">
                                        <a href="#" target="special">66 666 66 666 6 66</a>
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
                                    <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                </li>
                                <li class="pr">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                        </a>
                                        <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
                                    </p>
                                    <p class="goods-title">
                                        <a href="#" target="special">7 777 777 77 777 7</a>
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
                                    <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                </li>
                                <li class="pr">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                        </a>
                                        <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
                                    </p>
                                    <p class="goods-title">
                                        <a href="#" target="special">88 88 888 8888 88</a>
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
                                    <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                </li>
                            </ul>

                            <ul class="direction-nav"><li><a class="icon prev" href="javascript:;">Previous</a></li><li><a class="icon next" href="javascript:;">Next</a></li></ul>
                        </div>
                        
                        <div class="brands-more"><a href="#"><strong>xiaomi</strong>  view more >></a></div>
                    </div><!-- .brands-item-wrap -->
                    
                    <div class="brands-item-wrap js-sortItem none">  
                        <div class="wrap-box js-brandsProListBox">
                            <ul class="clearfix prolist pro-list-wrap">
                                <li class="pr">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                        </a>
                                        <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                                    <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                </li>
                            </ul>

                            <ul class="direction-nav"><li><a class="icon prev" href="javascript:;">Previous</a></li><li><a class="icon next" href="javascript:;">Next</a></li></ul>
                        </div>

                        <div class="brands-more"><a href="#"><strong>ilife</strong>  view more >></a></div>
                    </div><!-- .brands-item-wrap -->

                    <div class="brands-item-wrap js-sortItem none"> 
                        <div class="wrap-box js-brandsProListBox">
                            <ul class="clearfix prolist pro-list-wrap">
                                <li class="pr">
                                    <p class="goods-img pr">
                                        <a href="#" target="special">
                                            <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                        </a>
                                        <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                                    <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                                </li>
                            </ul>

                            <ul class="direction-nav"><li><a class="icon prev" href="javascript:;">Previous</a></li><li><a class="icon next" href="javascript:;">Next</a></li></ul>
                        </div>
                        <div class="brands-more"><a href="#"><strong>chuwi</strong>  view more >></a></div>
                    </div><!-- .brands-item-wrap -->
                </div>
            </section><!-- .brandslist-wrap -->

            <section class="zonE99-wrap w1100 js-floorTarget">
                <h3 class="pb-tit"><strong>2017&nbsp;&nbsp;&nbsp;&nbsp;•</strong>&nbsp;&nbsp;&nbsp;&nbsp;0.99&nbsp;&nbsp;ZonE</h3>

                <div class="deals-list-box zonE99-list-box js-tabSecWrap">
                    <ul class="deals-nav clearfix js-sortNav">
                        <li class="active js-navItem">
                            <p>0.99</p>
                        </li>
                        <li class="js-navItem">
                            <p>2.99</p>
                        </li>
                        <li class="js-navItem">
                            <p>5.99</p>
                        </li>
                        <li class="js-navItem">
                            <p>9.99</p>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem none">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem none">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem none">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>
                </div>
            </section><!-- .zonE99-wrap -->

            <section class="newyear-cate-wrap w1100 js-floorTarget">
                <h3 class="pb-tit"><strong>2017&nbsp;&nbsp;&nbsp;&nbsp;•</strong>&nbsp;&nbsp;&nbsp;&nbsp;New&nbsp;&nbsp;Year&nbsp;&nbsp;Categorie</h3>

                <div class="deals-list-box newyear-cate-list-box js-tabSecWrap">
                    <div class="cate-sort-nav js-sortNav">
                        <div class="clearfix category">
                            <span class="js-navItem"><strong><i class="icon-phone"></i></strong> <em>Mobile Phones</em></span>
                            <span class="js-navItem"><strong><i class="icon-tablet"></i></strong> <em>Cool Tablets </em></span>
                            <span class="js-navItem"><strong><i class="icon-headphone"></i></strong> <em>Consumer Electronics</em></span>
                            <span class="js-navItem"><strong><i class="icon-pc"></i></strong> <em>Computers & Networking</em></span>
                            <span class="js-navItem"><strong><i class="icon-tools"></i></strong> <em>Electrical & Tools</em></span>
                            <span class="js-navItem"><strong><i class="icon-cloth"></i></strong> <em>Stylish Apparel</em></span>
                            <span class="js-navItem"><strong><i class="icon-airpod"></i></strong> <em>Mobile Accessories</em></span>
                            <span class="js-navItem"><strong><i class="icon-toys"></i></strong> <em>Toys & Hobbies</em></span>
                            <span class="js-navItem"><strong><i class="icon-home"></i></strong> <em>Home & Garden</em></span>
                            <span class="js-navItem"><strong><i class="icon-watch"></i></strong> <em>Watches & Jewelry</em></span>
                            <span class="js-navItem"><strong><i class="icon-bag"></i></strong> <em>Bags & Shoes</em></span>
                            <span class="js-navItem"><strong><i class="icon-ball"></i></strong> <em>Outdoors & Sports</em></span>
                            <span class="js-navItem"><strong><i class="icon-led"></i></strong> <em>LED Lights & Flashlights</em></span>
                            <span class="js-navItem"><strong><i class="icon-bottle"></i></strong> <em>Baby & Kids</em></span>
                            <span class="js-navItem"><strong><i class="icon-car"></i></strong> <em>Automobiles & Motorcycle</em></span>
                            <span class="js-navItem"><strong><i class="icon-beauty"></i></strong> <em>Health & Beauty</em></span>
                        </div>
                    </div>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem none">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem none">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>

                    <ul class="clearfix prolist pro-list-wrap js-sortItem none">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg">
                                </a>
                                <a class="to-cart" href="javascript:;"><span class="icon icon-cart"></span></a>
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
                            <p class="goods-buy"><a href="#" target="special">Buy Now</a></p>
                        </li>
                    </ul>
                </div>
            </section><!-- .newyear-cate-wrap -->

            <section class="foot-banner-wrap w1100 js-floorTarget">
                <ul class="little-banner-list clearfix">
                    <li><a href="#"><img src="images/demo_19/f_banner1.jpg" width="330" height="200" alt=""></a></li>
                    <li><a href="#"><img src="images/demo_19/f_banner2.jpg" width="330" height="200" alt=""></a></li>
                    <li><a href="#"><img src="images/demo_19/f_banner3.jpg" width="330" height="200" alt=""></a></li>
                    <li><a href="#"><img src="images/demo_19/f_banner4.jpg" width="330" height="200" alt=""></a></li>
                    <li><a href="#"><img src="images/demo_19/f_banner5.jpg" width="330" height="200" alt=""></a></li>
                    <li><a href="#"></a></li>
                </ul>
                <p class="forfree-banner"><a href="#"><img src="images/demo_19/forfree_banner.jpg" width="1030" height="240" alt=""></a></p>
            </section><!-- .foot-banner-wrap -->

        </div><!-- .bg -->


        <section class="right-nav-wrap" id="js-rightNav">
            <div class="nav-top"><span class="icon icon-navtop"></span></div>
            
            <div class="nav-cont">
                <ul class="clearfix">
                    <li><a href="javascript:;">New Year Gifts</a></li>
                    <li><a href="javascript:;">Flash Deals</a></li>
                    <li><a href="javascript:;">Top 8</a></li>
                    <li><a href="javascript:;">New Year Brands</a></li>
                    <li><a href="javascript:;">0.99 Zone</a></li>
                    <li><a href="javascript:;">New Year Categories</a></li>
                    <li><a href="javascript:;">More Happiness</a></li>
                </ul>
                <a href="javascript:;" class="icon goto-top js-goTop"></a>
            </div>

            <div class="nav-foot js-shareWrap" data-sharehref="">
                <a href="javascript:;" class="share-fb share-btn js-shareFB"><span class="icon icon-fb"></span></a>
                <a href="javascript:;" class="share-vk share-btn js-shareVK"><span class="icon icon-vk"></span></a>
                <a href="javascript:;" class="share-tw share-btn js-shareTwitt"><span class="icon icon-tw"></span></a>
                <a href="javascript:;" class="share-google share-btn js-shareGoogle"><span class="icon icon-google"></span></a>
                <a href="javascript:;" class="share-reddit share-btn js-shareReddit"><span class="icon icon-reddit"></span></a>
            </div>

            <p class="nav-video">
                <span class="icon icon-video"></span>
            </p>
        </section>
    </div><!-- .newyear-2017 -->

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
                    topCounter.html('<span>'+ limitObj.cDay +'</span><span>'+ limitObj.CHour +'</span><span>'+ limitObj.CMinute +'</span><span>'+ limitObj.CSecond +'</span>'); 
             }else{
                 limitObj = limitTime(time, status);
                 $('.js-topTimeWrap').hide();
                 $('.js-newYearTips').show();
                 clearInterval(nailInterval);
             }
            },1000);

        })();

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
        
                        // if(parseInt(limitObj.cDay) > 0){
                        //     that.html('<strong>Over '+ limitObj.cDay +' Days</strong> <strong>'+ limitObj.CHour +' hour</strong>');
                        // }else{
                           that.html('<strong>'+ limitObj.cDay +'</strong> day <strong>'+ limitObj.CHour +'</strong> Hour <strong>'+ limitObj.CMinute +'</strong> Min <strong>'+ limitObj.CSecond +'</strong> Sec'); 
                        // }
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
            var thatSecWrap = that.parents('.js-tabSecWrap');
            var index = thatParents.find('.js-navItem').index(that);
            that.addClass('active').siblings('.js-navItem').removeClass('active');

            thatSecWrap.find('.js-sortItem').eq(index).show().siblings('.js-sortItem').hide();
        });

        $.each($('.js-brandsProListBox'), function(index, val) {
            var that = $(val);
            var liLen = that.find('.prolist li').length;
            var Wid = liLen*250;
            that.find('.prolist').css('width',Wid);
            if(liLen > 4){
                that.find('.direction-nav').show();
            }
        });
        //click prev
        $('.js-brandsProListBox').on('click', '.prev', function(){
            var Parent = $(this).parents('.js-brandsProListBox');
            var proUlBox = Parent.find('.prolist');
            var firstLi = '';
                firstLi += '<li class="pr">'+Parent.find('.prolist li').eq(0).html()+'</li>';
                firstLi += '<li class="pr">'+Parent.find('.prolist li').eq(1).html()+'</li>';
                firstLi += '<li class="pr">'+Parent.find('.prolist li').eq(2).html()+'</li>';
                firstLi += '<li class="pr">'+Parent.find('.prolist li').eq(3).html()+'</li>';
            proUlBox.css('left','-1030px').append(firstLi);
            proUlBox.find('li').eq(0).remove();
            proUlBox.find('li').eq(0).remove();
            proUlBox.find('li').eq(0).remove();
            proUlBox.find('li').eq(0).remove();
            proUlBox.css('left',0);
        });
        //click next
        $('.js-brandsProListBox').on('click', '.next', function(){
            var Parent = $(this).parents('.js-brandsProListBox');
            var proUlBox = Parent.find('.prolist');
            var liLen = proUlBox.find('li').length;
            var lastLi = '';
                lastLi += '<li class="pr">'+Parent.find('.prolist li').eq(liLen-4).html()+'</li>';
                lastLi += '<li class="pr">'+Parent.find('.prolist li').eq(liLen-3).html()+'</li>';
                lastLi += '<li class="pr">'+Parent.find('.prolist li').eq(liLen-2).html()+'</li>';
                lastLi += '<li class="pr">'+Parent.find('.prolist li').eq(liLen-1).html()+'</li>';
            proUlBox.css('left','1030px').prepend(lastLi);
            proUlBox.find('li').eq(liLen).remove();
            proUlBox.find('li').eq(liLen).remove();
            proUlBox.find('li').eq(liLen).remove();
            proUlBox.find('li').eq(liLen).remove();
            proUlBox.css('left',0);
        });

        //show hide right-nav
        $(window).scroll(function(event) {
            var $wind = $(window),
                floorTargetArr = $('.js-floorTarget'),
                rightNavLiArr = $('#js-rightNav').find('li'),
                windScrollH = $(window).scrollTop(),
                firstTargetTop = $('.js-floorTarget').eq(0).offset().top;
            var rightNav = $('#js-rightNav');
            if(windScrollH > firstTargetTop){
                rightNav.show();
            }else{
                rightNav.hide();
            }

            $.each(floorTargetArr, function(index, val) {
                var that = $(val);
                if(windScrollH >= that.offset().top){
                    rightNavLiArr.eq(index).addClass('active').siblings('li').removeClass('active');  
                }else{
                    rightNavLiArr.eq(index).removeClass('active');
                }
            });
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
        
    })
</script>

</body>
</html>