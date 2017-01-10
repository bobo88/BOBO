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
        .nav-bg-icon{ display: inline-block;*display: inline;*zoom: 1; background: url(images/demo_9/lifestyle/nav_bg.png) no-repeat;}
        .two11-lifestyle-wrap{ width: 100%; min-width: 1100px; background: #d8e7ba;}
        .two11-lifestyle-wrap .banner-box{ width: 100%; min-width: 1100px; height: 480px; background: url(images/demo_9/lifestyle/lifestyle_banner.jpg) top center no-repeat;}
        .radius-3{-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;}
        .radius-5{-webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; border-radius: 5px;}

        .coupon-list-wrap{ margin-bottom: 60px; width: 100%; min-width: 1100px; height: 160px; background: url(images/demo_9/lifestyle/coupon_bg_repeat.gif) repeat-x;}
        .coupon-list-box{ margin: 0 auto; width: 1100px; height: 160px;}
        .coupon-list{ padding: 22px 0; width: 1110px; height: 116px;}
        .coupon-list li{ float: left; margin-right: 10px; width: 267px; height: 116px; background: url(images/demo_9/lifestyle/coupon_bg.png) top center no-repeat;}
        .coupon-content{}
        .coupon-content .coupon-num{ position: relative; z-index: 1; float: left; padding: 28px 10px 28px 15px; width: 80px; height: 60px; color: #ff7800; text-align: center;}
        .coupon-content .coupon-num h5{ height: 60px; line-height: 60px; font-size: 36px; font-weight: bold;}
        .coupon-content .coupon-num .num-status{ position: absolute; z-index: 2; top: 40px; left: 15px; height: 20px; line-height: 20px; font-size: 18px;}
        .coupon-content .coupon-detail{ float: right; padding: 15px 0; width: 160px;}
        .coupon-content .coupon-detail .detail-tit{ height: 16px; line-height: 16px; color: #ff7800; font-size: 12px; font-weight: bold;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
        .coupon-content .coupon-detail p{ margin-bottom: 3px; height: 45px; line-height: 15px; color: #231b38; font-size: 12px; overflow: hidden;}
        .coupon-content .coupon-detail .coupon-btn{ display: block; width: 120px; height: 20px; line-height: 20px; color: #fff; font-size: 14px; font-weight: bold; text-align: center; background: #ff7800;
          -webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px;
        }
        .coupon-content .coupon-detail .coupon-btn.show-coupon{ background: #524498;}
        .coupon-disabled .coupon-num, .coupon-disabled .coupon-detail .detail-tit, .coupon-disabled .coupon-detail p{ color: #a0a0a0;}
        .coupon-disabled .coupon-detail .coupon-btn{ background: #a0a0a0;}

        .flash-sale-sec{ margin: 0 auto 60px; width: 1100px;}
        .lifestyle-tit{ margin-bottom: 60px; width: 100%; height: 60px; line-height: 60px; color: #524498; font-size: 38px; font-weight: bold; text-align: center; background: url(images/demo_9/lifestyle/lifestyle_tit_bg.png) center center no-repeat;}

        .pro-list-wrap .slider{ width: 1110px;}
        .border-wrap{ padding-bottom: 15px; border: 1px solid #c9c9c9;}
        .pro-list-wrap li{ float: left; width: 215px; margin-right: 6px; margin-bottom: 8px; background-color: #fff; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pro-list-wrap li:hover{
            -webkit-transform: translate(0,-5px);
            -moz-transform: translate(0,-5px);
        }
        .goods-time{height:30px; color:#fef5d8;font-size:14px;background-color:#76a210;text-align:center;}
        .goods-time span{display:inline-block;vertical-align:middle;height:30px;line-height:30px;padding:0 5px;}

        .goods-img{width:170px;height:170px;margin:5px auto 0; padding-bottom: 5px; border-bottom: 1px solid #e7dfb5;}
        .goods-img a{display:block;width:170px;height:170px;overflow:hidden;}
        .goods-img img{height:170px;width:auto;display:inline;vertical-align:top;}

        .goods-title{font-size:14px;width:210px;margin:auto;height:32px;line-height:16px;overflow:hidden;text-align:center;margin-top:10px;}
        .goods-title a{color:#000; text-decoration: none;}
        .goods-title a:hover{color:#333; text-decoration: underline;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#b1b0b4;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#ff362f;font-size:22px; font-weight: bold;}

        .goods-limit{width:200px;margin:5px auto 0;height:50px;position:relative;}
        .goods-limit .market-price{ color: #b1b0b4; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#f9dc1f;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #76a210;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .goods-limit-tips{
            position:absolute;left:0;top:-30px;width:95px; height:20px;font:normal 12px/20px Arial;
            background:#fff;border:1px solid #76a210;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-limit-tips b{color:#76a210;padding-right:5px;}
        .goods-limit-tips em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .goods-limit-tips em.tri_bd{border-color:#76a210 transparent transparent transparent;bottom:-11px;z-index:1;}
        .goods-limit-tips em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}
        .goods-nolimit{text-align:center;font-size:14px;margin-top:15px;color:#987643;}
        .goods-buy{text-align:center;margin-top:10px;}
        .goods-buy a{
            display:inline-block;width:130px;height:24px;text-align:center;line-height:24px;background:#76a210;text-transform:uppercase;
            color:#fff;font-weight:bold;font-size:14px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a i{ display: inline-block; *display: inline; *zoom: 1; margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fff;}
        .goods-buy a.coming-soon{background:#efb202!important;}
        .goods-buy a.deal-end{ color: #5d5d5d; background:#b7b7b3!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}
        .sold-out{ display: none; position: absolute; z-index: 9; top: 0; left: 0; width: 100%; height: 100%; background: #000; background: rgba(0,0,0,.5); text-align: center;}
        .sold-out span{ display: block; padding-top: 90px; line-height: 30px; color: #fff; font-size: 24px; font-weight: bold; text-transform: uppercase;}

        .top-brands-sec{ margin: 0 auto 60px; width: 1100px;}
        .top-brands-box{ padding: 14px 12px; width: 1070px; border:3px solid #61850d; background: #76a210;}
        .top-brands-box .brands-pro-wrap{ position: relative; z-index: 1; padding-right: 910px; width: 160px;}
        .brands-nav{}
        .brands-nav li{ position: relative; z-index: 11; margin-bottom: 12px; width: 116px; height: 116px;}
        .brands-nav li .trig-right{ display: none; position: absolute; top: 43px; right: -42px; border:15px solid transparent; border-left:15px solid #f9dc1f;}
        .brands-nav li strong{ display: block;}
        .brands-nav li .maxza{ padding: 38px 8px; width: 80px; height: 19px; background: url(images/demo_9/lifestyle/maxza.png) center center no-repeat;}
        .brands-nav li .nexbox{ padding: 42px 3px; width: 90px; height: 12px; background: url(images/demo_9/lifestyle/nexbox.png) center center no-repeat;}
        .brands-nav li .onda{ padding: 41px 8px; width: 80px; height: 13px; background: url(images/demo_9/lifestyle/onda.png) center center no-repeat;}
        .brands-nav li .beelink{ padding: 38px 2px; width: 92px; height: 19px; background: url(images/demo_9/lifestyle/beelink.png) center center no-repeat;}
        .brands-nav li .lmi{ padding: 36px 12px; width: 72px; height: 23px; background: url(images/demo_9/lifestyle/lmi.png) center center no-repeat;}
        .brands-nav li a{ padding: 10px; display: block; width: 96px; height: 96px;}
        .brands-nav li a span{ display: block; width: 96px; height: 96px; background: #fff; text-indent: -9999px;
          -webkit-border-radius: 96px; -moz-border-radius: 96px; -ms-border-radius: 96px; -o-border-radius: 96px; border-radius: 96px;
        }
        .brands-nav li.on{}
        .brands-nav li.on a, .brands-nav li:hover a{ background: #f9dc1f;
          -webkit-border-radius: 116px; -moz-border-radius: 116px; -ms-border-radius: 116px; -o-border-radius: 116px; border-radius: 116px;
        }
        .brands-nav li.on span, .brands-nav li:hover span{ background: #f9dc1f;}
        .brands-nav li.on .trig-right, .brands-nav li:hover .trig-right{ display: block;}
        .brands-pro-list{ position: absolute; top: -40px; right: 0; width: 910px; height: 660px; background: #f3f3f3;}
        .pro-list{ padding: 30px 20px; width: 878px;}
        .pro-list li{ position: relative; float: left; margin-right: 5px; margin-bottom: 5px; width: 214px; height: 300px; background: #fff; text-align: center;-webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pro-list li:hover{-webkit-transform: translate(0,-3px);
            -moz-transform: translate(0,-3px);}
        .pro-list li .pro-img{ margin: 0 auto; padding: 10px; width: 160px; height: 160px;}
        .pro-list li .pro-img a{ display: block; width: 160px; height: 160px;}
        .pro-list li .pro-img img{ width: 160px; height: 160px;}
        .pro-list li .pro-detail{ position: relative; z-index: 1; padding: 10px; width: 194px; height: 100px; background: #76a210;}
        .pro-list li .pro-detail .goto-cart{ position: absolute; bottom: 0; right: 0; padding: 12px 2px 2px 12px; width: 24px; height: 24px; background: #f9dc1f;
          -webkit-border-radius: 38px 0 0 0; -moz-border-radius: 38px 0 0 0; -ms-border-radius: 38px 0 0 0; -o-border-radius: 38px 0 0 0; border-radius: 38px 0 0 0;
        }
        .pro-list li .pro-title{ margin-bottom: 10px; width: 100%; height: 16px; line-height: 16px; color: #fff; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
        .pro-list li .pro-title a{ color: #fff; font-size: 12px; text-decoration: none;}
        .pro-list li .pro-title a:hover{ text-decoration: underline;}
        .pro-list li .pro-price{}
        .pro-list li .market-price{ display: block; height: 20px; line-height: 20px; color: #fff; font-size: 12px;}
        .pro-list li .shop-price{ display: block; height: 30px; line-height: 30px; color: #f9dc1f; font-size: 24px; font-weight: bold;}
        .pro-list li .buy-now{ margin: 0 auto; display: block; width: 112px; height: 24px; line-height: 24px; color: #000; font-size: 16px; font-weight: bold; background: #f9dc1f; text-decoration: none;}

        .tb-banner{ width: 1070px; height: 250px; background: #fff; overflow: hidden;}
        .icon-cart{ display: inline-block;*display: inline;*zoom: 1; width: 24px; height: 24px; background: url(images/demo_9/lifestyle/icon_cart.png) center center no-repeat;}

        .hot-deals-sec{ margin: 0 auto 60px; width: 1100px;}
        .hot-deals-nav{ width: 1110px; height: 60px;}
        .hot-deals-nav li{ position: relative; z-index: 1; float: left; margin-right: 10px; width: 360px; height: 60px; line-height: 60px; text-align: center; background: #61850d;
          -webkit-border-radius: 10px 10px 0 0; -moz-border-radius: 10px 10px 0 0; -ms-border-radius: 10px 10px 0 0; -o-border-radius: 10px 10px 0 0; border-radius: 10px 10px 0 0;
        }
        .hot-deals-nav li a{ display: block; width: 360px; height: 60px; color: #fff; font-size: 20px; text-decoration: none;}
        .hot-deals-nav li.on{ top: -20px; width: 354px; height: 80px; background: #76a210; border:3px solid #61850d; border-bottom: none;}
        .hot-deals-nav li.on a{ height: 80px; line-height: 80px; color: #f9dc1f;}

        .hot-deals-pro-list{ padding: 30px; border: 3px solid #61850d; background: #76a210;
          -webkit-border-radius: 0 0 10px 10px; -moz-border-radius: 0 0 10px 10px; -ms-border-radius: 0 0 10px 10px; -o-border-radius: 0 0 10px 10px; border-radius: 0 0 10px 10px;
        }
        .hot-deals-pro-list .pro-list{ padding: 0; width: 1050px;}
        .hot-deals-pro-list .pro-list li{ width: 204px;}
        .hot-deals-pro-list .pro-list li .pro-title{ color: #000;}
        .hot-deals-pro-list .pro-list li .pro-title a{ color: #000;}
        .hot-deals-pro-list .pro-list li .market-price{color: #b1b0b4;}
        .hot-deals-pro-list .pro-list li .shop-price{color: #ff362f;}
        .hot-deals-pro-list .pro-list li .pro-detail{ width: 184px; background: #fff;}
        .hot-deals-pro-list .pro-list li .buy-now{ width: 100px; color: #fff; background: #ff362f;}

        .keywords{ margin: 0 auto; padding-bottom: 60px; height: 30px; line-height: 30px; text-align: center;}
        .keywords a{ display: inline-block; *display: inline;*zoom: 1; margin-right: 50px; color: #000; font-size: 18px; text-decoration: underline;}

        .right-nav-wrap{ display: none; position: fixed; z-index: 9999; top: 50px; right: 20px; width: 130px; height: 300px;}
        .nav-fix-box{ position: absolute; z-index: 3; top: 0; left: 0; width: 100%; background: #524498;}
        .nav-fix-box ul{ padding: 0 5px; width: 120px;}
        .nav-fix-box ul li{ margin-bottom: 10px; width: 100%; height: 26px; line-height: 26px; border: 1px dashed #fff; text-align: center;}
        .nav-fix-box ul li a{ display: block; width: 100%; height: 100%; color: #f9dc1f; font-size: 14px;}
        .nav-fix-box ul li a:hover{ color: #231b38; background: #f9dc1f;}
        .nav-fix-box ul li a.salestorm{ color: #524498; font-weight: bold; background: #fff;}
        .nav-fix-box ul li a.salestorm:hover{ color: #524498; background: #fff;}
        .nav-topic-wrap{ padding-top: 9px;}
        .nav-sort-wrap{ padding: 5px 0 6px;}
        .nav-topic{ width: 64px; height: 31px; background-position: 0 0;}
        .nav-sort{ width: 115px; height: 19px; background-position: -100px -90px;}
        .goto-top{ margin: 0 auto; width: 45px; height: 29px; background-position: 0 -50px;}
        .nav-btm{ position: absolute; z-index: 1; bottom: 0; left: 30px;}
        .nav-btmicon{ width: 66px; height: 35px; background-position: 0 -100px;}
        .nav-salestorm-wrap{ position: relative; z-index: 9999; width: 100%; height: 70px;}
        .nav-salestorm{ position: absolute; top: -90px; left: -20px; width: 169px; height: 138px; background-position: 0 -150px;}

        .left-nav-wrap{ display: none; position: fixed; z-index: 9999; top: 100px; left: 20px; width: 130px; height: 440px;}

        .foot-banner-wrap{ margin: 0 auto 60px; width: 1100px;}
        .foot-banner-wrap ul{ width: 1130px; height: 200px;}
        .foot-banner-wrap ul li{ float: left; margin-right: 20px; width: 260px; height: 200px;}
        .foot-banner-wrap ul li a,.foot-banner-wrap ul li img{ display: block; width: 260px; height: 200px;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>


    <div class="two11-lifestyle-wrap">
      <div class="banner-box"></div>

      <section class="coupon-list-wrap">
        <div class="coupon-list-box">
          <ul class="coupon-list clearfix">
            <li>
              <div class="coupon-content clearfix coupon-disabled">
                <div class="coupon-num">
                  <h5>50</h5>
                  <span class="num-status">$</span>
                </div>

                <div class="coupon-detail">
                  <h4 class="detail-tit">Automobiles & Motorcycle</h4>
                  <p>
                    · Min Order:$50<br/>
                    · HK-2 Warehouse Only<br/>
                    · NOV 7-15 (UTC) <br/>
                  </p>
                  <div class="js-couponStatus">
                    <a href="javascript:;" class="coupon-btn">Unavalable Now</a>
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="coupon-content clearfix">
                <div class="coupon-num">
                  <h5>100</h5>
                  <span class="num-status">$</span>
                </div>

                <div class="coupon-detail">
                  <h4 class="detail-tit">Automobiles & Motorcycle</h4>
                  <p>
                    · Min Order:$50<br/>
                    · HK-2 Warehouse Only<br/>
                    · NOV 7-15 (UTC) <br/>
                  </p>
                  <div class="js-couponStatus">
                    <a href="#" target="special" class="coupon-btn show-coupon">TEST889</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="coupon-content clearfix">
                <div class="coupon-num">
                  <h5>20</h5>
                  <span class="num-status">$</span>
                </div>

                <div class="coupon-detail">
                  <h4 class="detail-tit">Automobiles & Motorcycle</h4>
                  <p>
                    · Min Order:$50<br/>
                    · HK-2 Warehouse Only<br/>
                    · NOV 7-15 (UTC) <br/>
                  </p>
                  <div class="js-couponStatus">
                    <a href="javascript:;" class="coupon-btn js-getCouponBtn">Discover Deals</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="coupon-content clearfix">
                <div class="coupon-num">
                  <h5>20</h5>
                  <span class="num-status">$</span>
                </div>

                <div class="coupon-detail">
                  <h4 class="detail-tit">Automobiles & Motorcycle</h4>
                  <p>
                    · Min Order:$50<br/>
                    · HK-2 Warehouse Only<br/>
                    · NOV 7-15 (UTC) <br/>
                  </p>
                  <div class="js-couponStatus">
                    <a href="javascript:;" class="coupon-btn js-getCouponBtn">Discover Deals</a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>
      
      <!-- Flash Sale -->
      <section class="flash-sale-sec js-floorTarget">
        <h3 class="lifestyle-tit">Flash Sale</h3>

        <div class="pro-list-wrap">
          <ul class="slider clearfix">
            <li class="pr">
                <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                </p>
                <div class="border-wrap">
                  <p class="goods-img pr">
                      <a href="#" target="special">
                          <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
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
                </div>
                <p class="sold-out"><span>sold <br/> out</span></p>
            </li>
            <li class="pr">
                <p class="goods-time"><span class="js-timeCounter" data-time="888888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                </p>
                <div class="border-wrap">
                  <p class="goods-img pr">
                      <a href="#" target="special">
                          <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
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
                </div>
                <p class="sold-out"><span>sold <br/> out</span></p>
            </li>
            <li class="pr">
                <p class="goods-time"><span class="js-timeCounter" data-time="888888" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                </p>
                <div class="border-wrap">
                  <p class="goods-img pr">
                      <a href="#" target="special">
                          <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
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
                </div>
                <p class="sold-out"><span>sold <br/> out</span></p>
            </li>
            <li class="pr">
                <p class="goods-time"><span class="js-timeCounter" data-time="888888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                </p>
                <div class="border-wrap">
                  <p class="goods-img pr">
                      <a href="#" target="special">
                          <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
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
                </div>
                <p class="sold-out"><span>sold <br/> out</span></p>
            </li>
            <li class="pr">
                <p class="goods-time"><span class="js-timeCounter" data-time="888888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                </p>
                <div class="border-wrap">
                  <p class="goods-img pr">
                      <a href="#" target="special">
                          <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
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
                </div>
                <p class="sold-out"><span>sold <br/> out</span></p>
            </li>
            <li class="pr">
                <p class="goods-time"><span class="js-timeCounter" data-time="888888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                </p>
                <div class="border-wrap">
                  <p class="goods-img pr">
                      <a href="#" target="special">
                          <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
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
                </div>
                <p class="sold-out"><span>sold <br/> out</span></p>
            </li>
            <li class="pr">
                <p class="goods-time"><span class="js-timeCounter" data-time="888888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                </p>
                <div class="border-wrap">
                  <p class="goods-img pr">
                      <a href="#" target="special">
                          <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
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
                </div>
                <p class="sold-out"><span>sold <br/> out</span></p>
            </li>
            <li class="pr">
                <p class="goods-time"><span class="js-timeCounter" data-time="888888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                </p>
                <div class="border-wrap">
                  <p class="goods-img pr">
                      <a href="#" target="special">
                          <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
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
                </div>
                <p class="sold-out"><span>sold <br/> out</span></p>
            </li>
            <li class="pr">
                <p class="goods-time"><span class="js-timeCounter" data-time="888888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                </p>
                <div class="border-wrap">
                  <p class="goods-img pr">
                      <a href="#" target="special">
                          <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
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
                </div>
                <p class="sold-out"><span>sold <br/> out</span></p>
            </li>
            <li class="pr">
                <p class="goods-time"><span class="js-timeCounter" data-time="888888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                </p>
                <div class="border-wrap">
                  <p class="goods-img pr">
                      <a href="#" target="special">
                          <img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg">
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
                </div>
                <p class="sold-out"><span>sold <br/> out</span></p>
            </li>
          </ul>
        </div>
      </section>

      <!-- Top Brands -->
      <section class="top-brands-sec js-floorTarget">
        <h3 class="lifestyle-tit">Top Brands</h3>
        
        <div class="top-brands-box radius-5">
          <div class="brands-pro-wrap">
            <ul class="brands-nav" id="js-brandsNav">
              <li><a href="javascript:;"><span><strong class="maxza">maxza</strong></span></a> <i class="trig-right"></i></li>
              <li><a href="javascript:;"><span><strong class="nexbox">nexbox</strong></span></a> <i class="trig-right"></i></li>
              <li><a href="javascript:;"><span><strong class="onda">onda</strong></span></a> <i class="trig-right"></i></li>
              <li><a href="javascript:;"><span><strong class="beelink">beelink</strong></span></a> <i class="trig-right"></i></li>
              <li><a href="javascript:;"><span><strong class="lmi">lmi</strong></span></a> <i class="trig-right"></i></li>
            </ul>
            
            <div class="brands-pro-list radius-5 js-topBrandsTarget">
              <ul class="pro-list clearfix">
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
              </ul>
            </div>

            <div class="brands-pro-list radius-5 js-topBrandsTarget none">
              <ul class="pro-list clearfix">
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">222222222222222222222222222222222</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
              </ul>
            </div>

            <div class="brands-pro-list radius-5 js-topBrandsTarget none">
              <ul class="pro-list clearfix">
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">3333333333333333333333333333333333</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
              </ul>
            </div>

            <div class="brands-pro-list radius-5 js-topBrandsTarget none">
              <ul class="pro-list clearfix">
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">444444444444444444444444444</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
              </ul>
            </div>

            <div class="brands-pro-list radius-5 js-topBrandsTarget none">
              <ul class="pro-list clearfix">
                <li>
                  <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
                  <div class="pro-detail">
                    <p class="pro-title"><a href="#" target="special">555555555555555555555555555555555</a></p>
                    <div class="pro-price">
                      <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                      <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                    </div>
                    <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                    <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
                  </div>
                </li>
              </ul>
            </div>

          </div>

          <div class="tb-banner radius-5">
            <a href="#" target="special"><img src="images/demo_9/lifestyle/tb_banner.jpg" width="1070" height="250" alt="家居会场"></a>
          </div>
        </div>
      </section>

      <!-- Hot Deals -->
      <section class="hot-deals-sec js-floorTarget">
        <h3 class="lifestyle-tit">Hot Deals</h3>

        <ul class="hot-deals-nav clearfix" id="js-hotDealsNav">
          <li class="on"><a href="javascript:;">Musical Instruments</a></li>
          <li><a href="javascript:;">Puzzle & Educational</a></li>
          <li><a href="javascript:;">Remote Control Toys</a></li>
        </ul>
        
        <div class="hot-deals-pro-list js-hotDealsTarget">
          <ul class="pro-list clearfix">
            <li>
              <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
              <div class="pro-detail">
                <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                <div class="pro-price">
                  <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                  <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                </div>
                <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
              </div>
            </li>
            <li>
              <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
              <div class="pro-detail">
                <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                <div class="pro-price">
                  <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                  <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                </div>
                <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
              </div>
            </li>
            <li>
              <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
              <div class="pro-detail">
                <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                <div class="pro-price">
                  <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                  <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                </div>
                <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
              </div>
            </li>
            <li>
              <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
              <div class="pro-detail">
                <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                <div class="pro-price">
                  <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                  <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                </div>
                <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
              </div>
            </li>
            <li>
              <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
              <div class="pro-detail">
                <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                <div class="pro-price">
                  <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                  <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                </div>
                <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
              </div>
            </li>
            <li>
              <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
              <div class="pro-detail">
                <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                <div class="pro-price">
                  <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                  <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                </div>
                <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
              </div>
            </li>
            <li>
              <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
              <div class="pro-detail">
                <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                <div class="pro-price">
                  <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                  <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                </div>
                <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
              </div>
            </li>
            <li>
              <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
              <div class="pro-detail">
                <p class="pro-title"><a href="#" target="special">XIAOMI Redmi Note 3 Pro 16GB 4G Phablet</a></p>
                <div class="pro-price">
                  <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                  <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                </div>
                <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
              </div>
            </li>
          </ul>
        </div>

        <div class="hot-deals-pro-list js-hotDealsTarget none">
          <ul class="pro-list clearfix">
            <li>
              <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
              <div class="pro-detail">
                <p class="pro-title"><a href="#" target="special">w22222222222222222222222</a></p>
                <div class="pro-price">
                  <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                  <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                </div>
                <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
              </div>
            </li>
          </ul>
        </div>

        <div class="hot-deals-pro-list js-hotDealsTarget none">
          <ul class="pro-list clearfix">
            <li>
              <p class="pro-img"><a href="#" target="special"><img src="http://www.yuanbo88.com/demo/images/demo_1/demo_1_4.jpg" alt="家居会场"></a></p>
              <div class="pro-detail">
                <p class="pro-title"><a href="#" target="special">33333333333333333333333</a></p>
                <div class="pro-price">
                  <del class="market-price"><span class="bizhong"></span><span class="my_shop_price" orgp="199.9">199.9</span></del>
                  <span class="shop-price"><span class="bizhong"></span><span class="my_shop_price" orgp="100.2">100.2</span></span>
                </div>
                <a href="#" target="special" class="buy-now radius-3">BUY NOW</a>
                <a href="javascript:;" class="goto-cart"><i class="icon-cart"></i></a>
              </div>
            </li>
          </ul>
        </div>

      </section>
      

        <div class="foot-banner-wrap">
            <ul class="clearfix">
                <li><a href="#" target="special"><img src="images/demo_9/lifestyle/foot_banner1.jpg" alt="家居会场"></a></li>
                <li><a href="#" target="special"><img src="images/demo_9/lifestyle/foot_banner2.jpg" alt="家居会场"></a></li>
                <li><a href="#" target="special"><img src="images/demo_9/lifestyle/foot_banner3.jpg" alt="家居会场"></a></li>
                <li><a href="#" target="special"><img src="images/demo_9/lifestyle/foot_banner4.jpg" alt="家居会场"></a></li>
            </ul>
        </div>

      <!-- Top Search -->
      <div class="keywords js-floorTarget">
        <a href="#" target="special">Guanjianzi</a>
        <a href="#" target="special">Guanjianzi</a>
        <a href="#" target="special">Guanjianzi</a>
        <a href="#" target="special">Guanjianzi</a>
        <a href="#" target="special">Guanjianzi</a>
        <a href="#" target="special">Guanjianzi</a>
      </div>

    </div><!-- .two11-lifestyle-wrap -->

    <div class="right-nav-wrap" id="js-rightNav">
      <div class="right-nav-box nav-fix-box radius-5">
        <p class="nav-topic-wrap tc"><span class="nav-bg-icon nav-topic"></span></p>
        <p class="nav-sort-wrap tc"><span class="nav-bg-icon nav-sort"></span></p>
        <ul>
          <li><a href="javascript:;">Flash Sale</a></li>
          <li><a href="javascript:;">Top Brands</a></li>
          <li><a href="javascript:;">Hot Deals</a></li>
          <li><a href="javascript:;">Top Search</a></li>
        </ul>
        <p class="tc"><a href="javascript:;" class="goto-top nav-bg-icon js-goTop"></a></p>
      </div>
      
      <p class="nav-btm tc"><span class="nav-bg-icon nav-btmicon"></span></p>
    </div>

    <div class="left-nav-wrap" id="js-leftNav">
      <div class="left-nav-box nav-fix-box radius-5">
        <p class="nav-salestorm-wrap tc"><span class="nav-bg-icon nav-salestorm"></span></p>
        <ul>
          <li><a href="javascript:;" class="salestorm">SALE STORM</a></li>
          <li><a href="http://www.yuanbo88.com/demo/demo_9.php" target="special">服装会场</a></li>
          <li><a href="http://www.yuanbo88.com/demo/demo_10.php" target="special">玩具会场</a></li>
          <li><a href="http://www.yuanbo88.com/demo/demo_11.php" target="special">数码会场</a></li>
          <li><a href="http://www.yuanbo88.com/demo/demo_12.php" target="special">家居会场</a></li>
          <li><a href="http://www.yuanbo88.com/demo/demo_13.php" target="special">手机会场</a></li>
          <li><a href="http://www.yuanbo88.com/demo/demo_8.php" target="special">领券页面</a></li>
          <li><a href="javascript:;">Gift Rain</a></li>
        </ul>
        <p class="tc"><a href="javascript:;" class="goto-top nav-bg-icon js-goTop"></a></p>
      </div>
      
      <p class="nav-btm tc"><span class="nav-bg-icon nav-btmicon"></span></p>
    </div>
   


<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->


<script>
$LAB.script("")
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

          //brands nav tab change
          $('#js-brandsNav').on('click', 'li', function(){
            var that = $(this);
            var index = $('#js-brandsNav').find('li').index(that);
            that.addClass('on').siblings('li').removeClass('on');
            $('.js-topBrandsTarget').eq(index).show().siblings('.js-topBrandsTarget').hide();
          });

          //hot-deals
          $('#js-hotDealsNav').on('click', 'li', function(){
            var that = $(this);
            var index = $('#js-hotDealsNav').find('li').index(that);
            that.addClass('on').siblings('li').removeClass('on');
            $('.js-hotDealsTarget').eq(index).show().siblings('.js-hotDealsTarget').hide();
          });
          
          //get coupon
          $('.js-getCouponBtn').click(function(){
            var that = $(this);
            var thatParent = that.parents('.js-couponStatus');

            if($.cookie('username')){
                $.ajax({
                    url: 'demo.json',
                    type: 'POST',
                    dataType: 'json',
                    data: {winNum: winNum},
                    success: function(data){
                        var coupon = data.coupon;
                        var str = '<a href="#" target="special" class="coupon-btn show-coupon">BOBO</a>';

                        thatParent.html(str);
                    }
                });
            }else{//sign first
                window.location.href = 'http://www.yuanbo88.com/sign.php?ref=' + encodeURIComponent(window.location.href);
            } 
          });

          //window scroll show OR hide fixedNav
          $(window).scroll(function(event) {
            var $wind = $(window),
                firstTarget = $('.js-floorTarget').eq(0).offset().top,
                windowScrollH = $wind.scrollTop();

            if(windowScrollH >= firstTarget){
              $('#js-rightNav').show();
              $('#js-leftNav').show();
            }else{
              $('#js-rightNav').hide();
              $('#js-leftNav').hide();
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
    })
</script>

</body>
</html>