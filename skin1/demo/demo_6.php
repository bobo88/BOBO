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
        i{ font-style: normal;}
        .global-discounts-wrap{ width: 100%; min-width: 1200px; font-family: Arial; background: #232879 url('images/demo_6/discounts_bg.jpg') top center no-repeat;}
        .global-discounts-wrap .banner{ width: 100%; min-width: 1200px; height: 534px;}
        .pr{ position: relative;}
        .pa{ position: absolute;}
        .inline-block{display: inline-block; *display: inline; *zoom: 1;}
        .w1200{ margin: 0 auto; width: 1200px;}
        .radius-10{-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .radius-top-10{-webkit-border-radius: 10px 10px 0 0; -moz-border-radius: 10px 10px 0 0; -ms-border-radius: 10px 10px 0 0; border-radius: 10px 10px 0 0;}

        .flash-sale-wrap{}
        .pro-list-wrap{ width: 1200px; height: 870px; background: #314eaa; -webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; border-radius: 5px;}
        .flash-sale-rules-box .fs-tips{ margin-bottom: 10px; padding-top: 260px; line-height: 25px; color: #fff; font-size: 16px; text-align: center;}
        .flash-sale-rules-box .fs-tips strong{ font-weight: bold;}
        .flash-sale-rules-box .fs-times{ margin-bottom: 40px; padding-left: 80px; color: #fff; font-size: 18px;}
        .flash-sale-rules-box .fs-times span{ width: 300px; height: 25px; line-height: 25px;}
        .flash-sale-rules-box .fs-times span.span-m{ width: 380px;}
        .flash-sale-rules-box .utc-time{ margin: 0 auto 42px; width: 430px; height: 4px; background: #d5c211;}
        .flash-sale-rules-box .utc-time .utc-title{ position: absolute; top: -8px; left: -80px; color: #ffdb02; font-size: 14px; font-weight: bold;}
        .flash-sale-rules-box .utc-time .nail-time{ position: absolute; top: -14px; left: 0; width: 500px; height: 32px;}
        .flash-sale-rules-box .utc-time .nail-time li{ float: left; margin-right: 30px; width: 68px; height: 32px; line-height: 32px; color: #964301; font-size: 16px; font-weight: bold; background: #ffdb02; text-align: center; -webkit-border-radius: 15px; -moz-border-radius: 15px; -ms-border-radius: 15px; border-radius: 15px;}

        .pl-nav-status{ padding: 0 50px; width: 1100px; text-align: center;}
        .pl-nav-status .left-status{ float: left; margin-top: 26px; width: 548px; height: 72px; background: #232879; cursor: pointer;}
        .pl-nav-status .public-status.on{ margin-top: 0; height: 98px; background: #fff;}
        .pl-nav-status .left-status.is-not-begin{ background: #232879;}
        .pl-nav-status .right-status{ float: right; margin-top: 26px; width: 548px; height: 72px; background: #232879; cursor: pointer;}
        .pl-nav-status .status-title{ display: block; margin-bottom: 5px; padding-top: 10px; height: 30px; line-height: 30px; color: #fff; font-size: 20px;}
        .pl-nav-status .on .status-title{ color: #232879; font-size: 36px;}
        .pl-nav-status .fs-limit-time{ margin: 0 auto; width: 230px; height: 24px; line-height: 24px; color: #fff584; font-size: 16px; background:none;}
        .pl-nav-status .on .fs-limit-time{ color: #fff584; font-size: 16px; background: #314eaa;}
        .pl-nav-status .on .status-title{ padding-top: 20px;}
        .pl-nav-status .fs-limit-time span{ padding: 0 5px;}

        .pro-list-wrap .pl-box{ padding: 0 50px;}
        .pro-list-wrap .pl-box .slider{ padding-top: 30px; width: 1120px;}
        .pro-list-wrap .pl-box li{ float: left; width: 210px; margin-right: 12px; margin-bottom: 20px; background-color: #fff; padding-bottom: 15px; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;}
        .pro-list-wrap .pl-box li:hover{
            -webkit-transform: translate(0,-10px);
            -moz-transform: translate(0,-10px);
        }
        .goods-time{height:30px; color:#fff;font-size:14px;background-color:#232879;text-align:center;}
        .goods-time span{display:inline-block;vertical-align:middle;height:30px;line-height:30px;padding:0 5px;}

        .goods-img{width:170px;height:170px;margin:5px auto 0; padding-bottom: 5px; border-bottom: 1px solid #b2dcff;}
        .goods-img a{display:block;width:170px;height:170px;overflow:hidden;}
        .goods-img img{height:170px;width:auto;display:inline;vertical-align:top;}

        .goods-title{font-size:14px;width:210px;margin:auto;height:32px;line-height:16px;overflow:hidden;text-align:center;margin-top:10px;}
        .goods-title a{color:#04153f; text-decoration: none;}
        .goods-title a:hover{color:#333; text-decoration: underline;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#b7b7b3;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#ff7100;font-size:22px; font-weight: bold;}

        .goods-limit{width:200px;margin:5px auto 0;height:50px;position:relative;}
        .pl-box .goods-limit .market-price{ color: #b7b7b3; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#dddddd;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #ff9c00;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .goods-limit-tips{
            position:absolute;left:0;top:-30px;width:95px; height:20px;font:normal 12px/20px Arial;
            background:#fff;border:1px solid #000;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-limit-tips b{color:#ff9c00;padding-right:5px;}
        .goods-limit-tips em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .goods-limit-tips em.tri_bd{border-color:#000 transparent transparent transparent;bottom:-11px;z-index:1;}
        .goods-limit-tips em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}
        .goods-nolimit{text-align:center;font-size:14px;margin-top:15px;color:#987643;}
        .goods-buy{text-align:center;margin-top:10px;}
        .goods-buy a{
            display:inline-block;width:130px;height:24px;text-align:center;line-height:24px;background:#ff9c00;text-transform:uppercase;
            color:#fff;font-weight:bold;font-size:14px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a i{ margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fff;}
        .goods-buy a.coming-soon{background:#efb202!important;}
        .goods-buy a.deal-end{ color: #5d5d5d; background:#b7b7b3!important;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}

        .active-list{ position: relative; top:-20px; width:1200px;margin:0 auto 70px;}
        .active-list .deal-tags-bgWrap{ width: 1200px;}
        .active-list .deal-tags-bgWrap .prolist-box{ padding-bottom: 40px; background: #314eaa;}
        .active-list .deal-tags-bgWrap .deal-tags-list{ position:relative; width:1100px; background:#fff;}
        .active-list .deal-tags-bgWrap .deal-tags-title-bg{ position:relative; top: 90px; z-index: 9; margin: 0 auto; padding:115px 0; width:1100px; background:#cfdbff;}

        .active-list-title{ margin-bottom: 6px; height:40px; color: #232879; font-size:30px; font-weight:bold; padding-top:10px; text-align:center;}
        .deal-tips{ margin: 0 auto; width: 300px; height: 44px; line-height: 44px; color: #ffffff; font-size: 34px; text-align: center; background: #314eaa;}

        .active-list-product{ margin: 0 auto; width:1100px;overflow:hidden; margin-bottom:0px;}
        .active-list-product .slider{ padding-top: 90px; width: 1125px;}
        .active-list-product .slider .goods-img{ width: 200px; height: 170px; text-align: center;}
        .active-list-product .slider .goods-img a{ margin: 0 auto;}
        .active-list-product .slider .goods-title a{ color: #000;}
        .active-list-product .slider li{ padding: 0 5px; width:200px;float:left;margin-right:12px;margin-top:12px;overflow:hidden;background-color:#fff;padding-bottom:15px; -webkit-transition: 0.5s;  -moz-transition: 0.5s;  -o-transition: 0.5s;  -ms-transition: 0.5s;  transition: 0.5s;}
        .active-list-product .slider li:hover{-webkit-transform: translate(0,-10px); -moz-transform: translate(0,-10px);}

        .deal-tags-nav{}
        .deal-tags-nav li{ position:absolute; width:220px; height:108px; text-align:center;}
        .deal-tags-nav li.on,.deal-tags-nav li:hover{ background:#fff584;}
        .deal-tags-nav li a{ position:relative; display:block; padding:20px 0 0 90px; color:#22264c; font-size:14px; text-decoration: none;}
        .deal-tags-nav li a:hover{ text-decoration:none;}
        .deal-tags-nav li span{ display:block; padding:20px 0; line-height:20px;}
        .nav-1{ top:0; left:0;}
        .nav-2{ top:0; left:220px;}
        .nav-3{ top:0; left:440px;}
        .nav-4{ top:0; left:660px;}
        .nav-5{ top:0; right:0;}
        .nav-6{ top:111px; left:0;}
        .nav-7{ top:111px; right:0;}
        .nav-8{ bottom:0; left:0;}
        .nav-9{ bottom:0; left:220px;}
        .nav-10{ bottom:0; left:440px;}
        .nav-11{ bottom:0; left:660px;}
        .nav-12{ bottom:0; right:0;}
        .icon-wrap{ position:absolute; top:20px; left:20px; display:inline-block; width:80px; height:64px; background:url("images/demo_6/icon_wrap.png") no-repeat center top; *display:inline;*zoom:1;}
        .icon-sort-1{ left:30px; background-position:0 0;}
        .icon-sort-2{ left:25px; background-position:-100px 0;}
        .icon-sort-3{ left:30px; background-position:-200px 0;}
        .icon-sort-4{ left:50px; background-position:-300px 0;}
        .icon-sort-5{ background-position:-400px 0;}
        .icon-sort-6{ left:40px; background-position:-500px 0;}
        .icon-sort-7{ left:30px; background-position:-600px 0;}
        .icon-sort-8{ left:25px; background-position:-700px 0;}
        .icon-sort-9{ left:30px; background-position:-800px 0;}
        .icon-sort-10{ background-position:-900px 0;}
        .icon-sort-11{ left:30px; background-position:-1000px 0;}
        .icon-sort-12{ background-position:-1100px 0;}
        
        .warehouse-wrap{ margin: 0 auto; width: 1200px; overflow: hidden;}
        .wh-tit{ margin-bottom: 80px; width: 100%; height: 39px; background: url('images/demo_6/warehouse_tit.png') top center no-repeat;}
        .wh-banner-list{ width: 1220px;}
        .wh-banner-list li{ float: left; margin: 0 19px 21px 0; width: 387px; height: 223px;
          box-shadow: 0 1px 3px -2px rgba(0,0,0,0.12),0 1px 2px rgba(0,0,0,0.24);
          -webkit-transition: 0.5s;  -moz-transition: 0.5s;  -o-transition: 0.5s;  -ms-transition: 0.5s;  transition: 0.5s;
        }
        .wh-banner-list li:hover{-webkit-transform: translate(0,-6px); -moz-transform: translate(0,-6px);
         box-shadow: 0 14px 28px rgba(255,255,255,0.25),0 10px 10px rgba(255,255,255,0.1);
        }

        .right-nav-wrap{ display: none; position: fixed; z-index: 9999; top: 50px; right: 30px;}
        .right-nav-wrap .nav-cont{ padding: 30px 8px 40px; background: #314eaa url('images/demo_6/rightnav_tit.png') top center no-repeat;}
        .right-nav-wrap .nav-cont li{ margin-bottom: 3px; width: 160px; height: 26px;}
        .right-nav-wrap .nav-cont li a{ display: block; width: 160px; height: 26px; line-height: 26px; color: #fff; font-size: 12px; -webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; border-radius: 5px; text-align: center; background: #5a73dd; text-decoration: none;}
        .right-nav-wrap .nav-cont li a:hover{ color: #fff; background: #232879;}
        .right-nav-wrap .go-top{ position: absolute; bottom: -25px; left: 50%; margin-left: -25px; display: block; width: 50px; height: 50px; line-height: 50px; color: #fff; font-size: 14px; text-decoration: none; background: #5a73dd; text-align: center; -webkit-border-radius: 25px; -moz-border-radius: 25px; -ms-border-radius: 25px; border-radius: 25px;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>


    <div class="global-discounts-wrap">
      <div class="banner"></div>

      <section class="flash-sale-wrap w1200 js-floorTarget js-tabNavWrap">
          <div class="flash-sale-rules-box">
              <div class="pl-nav-status clearfix">
                  <!-- add: is-not-begin -->
                  <div class="left-status public-status radius-top-10 js-nav on">
                      <span class="status-title">PROMO BEGINS IN:</span>
                      <p class="fs-limit-time js-flashLimitTime" data-time="88888" data-status="1"><span>00</span>:<span>00</span>:<span>00</span></p>
                  </div>

                  <div class="right-status public-status radius-top-10 js-nav">
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
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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
                          <p class="goods-time"><span class="js-timeCounter" data-time="0" data-status="1">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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
                          <p class="goods-time"><span class="js-timeCounter" data-time="88888" data-status="0">Ends In: <span>00</span>:<span>00</span>:<span>00</span>:<span>00</span></span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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
                                  <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg">
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


      <section class="active-list js_section">
        <div class="deal-tags-bgWrap">
          <div class="deal-tags-title-bg pr js-floorTarget">
              <h1 class="active-list-title">TOP Brand Promotion</h1>
              <p class="deal-tips">Up to 50% OFF</p>

              <ul class="deal-tags-nav js_dealTagsNav">
                <li class="nav-1"><a href="javascript:;"><i class="icon-wrap icon-sort-1"></i><span>Watches & Jewelry</span></a></li>
                <li class="nav-2"><a href="javascript:;"><i class="icon-wrap icon-sort-2"></i><span>Consumer Electronics</span></a></li>
                <li class="nav-3"><a href="javascript:;"><i class="icon-wrap icon-sort-3"></i><span>LED Lights & Flashlights</span></a></li>
                <li class="nav-4"><a href="javascript:;"><i class="icon-wrap icon-sort-4"></i><span>Phones & Accessories</span></a></li>
                <li class="nav-5"><a href="javascript:;"><i class="icon-wrap icon-sort-5"></i><span>Toys & <br/>Hobbies</span></a></li>
                <li class="nav-6"><a href="javascript:;"><i class="icon-wrap icon-sort-6"></i><span>Tablets PC</span></a></li>
                <li class="nav-7"><a href="javascript:;"><i class="icon-wrap icon-sort-7"></i><span>Electrical & Tools</span></a></li>
                <li class="nav-8"><a href="javascript:;"><i class="icon-wrap icon-sort-8"></i><span>Automotive Gear</span></a></li>
                <li class="nav-9"><a href="javascript:;"><i class="icon-wrap icon-sort-9"></i><span>Home & Garden</span></a></li>
                <li class="nav-10"><a href="javascript:;"><i class="icon-wrap icon-sort-10"></i><span>Computers & Networking</span></a></li>
                <li class="nav-11"><a href="javascript:;"><i class="icon-wrap icon-sort-11"></i><span>Apparel</span></a></li>
                <li class="nav-12"><a href="javascript:;"><i class="icon-wrap icon-sort-12"></i><span>Outdoors & Sports</span></a></li>
              </ul>
          </div>
          <div class="prolist-box radius-top-10">
            <div class="active-list-product deal-tags-list js_dealTagsListWrap">
                <ul class="slider clearfix">
                  <li class="pr">
                    <p class="goods-img pr"><a href="#" target="special"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg" width="200" height="200"></a></p>
                    <p class="goods-title"><a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                    <p class="goods-price">
                      <del class="market-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="29.99">29.99</b></del>
                    </p>
                    <p class="goods-price">
                      <span class="shop-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="19.99">19.99</b></span>
                    </p>
                    <p class="goods-buy"><a href="#" target="special">BUY NOW <i class="inline-block"></i></a></p>
                  </li>
                  <li class="pr">
                    <p class="goods-img pr"><a href="#" target="special"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg" width="200" height="200"></a></p>
                    <p class="goods-title"><a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                    <p class="goods-price">
                      <del class="market-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="29.99">29.99</b></del>
                    </p>
                    <p class="goods-price">
                      <span class="shop-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="19.99">19.99</b></span>
                    </p>
                    <p class="goods-buy"><a href="#" target="special">BUY NOW <i class="inline-block"></i></a></p>
                  </li>
                  <li class="pr">
                    <p class="goods-img pr"><a href="#" target="special"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg" width="200" height="200"></a></p>
                    <p class="goods-title"><a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                    <p class="goods-price">
                      <del class="market-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="29.99">29.99</b></del>
                    </p>
                    <p class="goods-price">
                      <span class="shop-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="19.99">19.99</b></span>
                    </p>
                    <p class="goods-buy"><a href="#" target="special">BUY NOW <i class="inline-block"></i></a></p>
                  </li>
                  <li class="pr">
                    <p class="goods-img pr"><a href="#" target="special"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg" width="200" height="200"></a></p>
                    <p class="goods-title"><a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                    <p class="goods-price">
                      <del class="market-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="29.99">29.99</b></del>
                    </p>
                    <p class="goods-price">
                      <span class="shop-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="19.99">19.99</b></span>
                    </p>
                    <p class="goods-buy"><a href="#" target="special">BUY NOW <i class="inline-block"></i></a></p>
                  </li>
                  <li class="pr">
                    <p class="goods-img pr"><a href="#" target="special"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg" width="200" height="200"></a></p>
                    <p class="goods-title"><a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                    <p class="goods-price">
                      <del class="market-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="29.99">29.99</b></del>
                    </p>
                    <p class="goods-price">
                      <span class="shop-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="19.99">19.99</b></span>
                    </p>
                    <p class="goods-buy"><a href="#" target="special">BUY NOW <i class="inline-block"></i></a></p>
                  </li>
                  <li class="pr">
                    <p class="goods-img pr"><a href="#" target="special"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg" width="200" height="200"></a></p>
                    <p class="goods-title"><a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                    <p class="goods-price">
                      <del class="market-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="29.99">29.99</b></del>
                    </p>
                    <p class="goods-price">
                      <span class="shop-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="19.99">19.99</b></span>
                    </p>
                    <p class="goods-buy"><a href="#" target="special">BUY NOW <i class="inline-block"></i></a></p>
                  </li>
                  <li class="pr">
                    <p class="goods-img pr"><a href="#" target="special"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg" width="200" height="200"></a></p>
                    <p class="goods-title"><a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                    <p class="goods-price">
                      <del class="market-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="29.99">29.99</b></del>
                    </p>
                    <p class="goods-price">
                      <span class="shop-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="19.99">19.99</b></span>
                    </p>
                    <p class="goods-buy"><a href="#" target="special">BUY NOW <i class="inline-block"></i></a></p>
                  </li>
                  <li class="pr">
                    <p class="goods-img pr"><a href="#" target="special"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg" width="200" height="200"></a></p>
                    <p class="goods-title"><a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                    <p class="goods-price">
                      <del class="market-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="29.99">29.99</b></del>
                    </p>
                    <p class="goods-price">
                      <span class="shop-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="19.99">19.99</b></span>
                    </p>
                    <p class="goods-buy"><a href="#" target="special">BUY NOW <i class="inline-block"></i></a></p>
                  </li>
                  <li class="pr">
                    <p class="goods-img pr"><a href="#" target="special"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg" width="200" height="200"></a></p>
                    <p class="goods-title"><a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                    <p class="goods-price">
                      <del class="market-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="29.99">29.99</b></del>
                    </p>
                    <p class="goods-price">
                      <span class="shop-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="19.99">19.99</b></span>
                    </p>
                    <p class="goods-buy"><a href="#" target="special">BUY NOW <i class="inline-block"></i></a></p>
                  </li>
                  <li class="pr">
                    <a href="#" target="_blank"><img src="images/demo_6/view_more.png" alt=""></a>
                  </li>
                </ul>

                <ul class="slider clearfix none">
                  <li class="pr">
                    <p class="goods-img pr"><a href="#" target="special"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_1/demo_1_4.jpg" width="200" height="200"></a></p>
                    <p class="goods-title"><a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a></p>
                    <p class="goods-price">
                      <del class="market-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="29.99">29.99</b></del>
                    </p>
                    <p class="goods-price">
                      <span class="shop-price"><b class="bizhong">USD</b><b class="my_shop_price" orgp="19.99">19.99</b></span>
                    </p>
                    <p class="goods-buy"><a href="#" target="special">BUY NOW <i class="inline-block"></i></a></p>
                  </li>
                </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="warehouse-wrap js-floorTarget">
        <div class="wh-tit"></div>
        <ul class="wh-banner-list clearfix">
          <li><a href="#"><img src="images/demo_6/banner_1.jpg" alt=""></a></li>
          <li><a href="#"><img src="images/demo_6/banner_2.jpg" alt=""></a></li>
          <li><a href="#"><img src="images/demo_6/banner_3.jpg" alt=""></a></li>
          <li><a href="#"><img src="images/demo_6/banner_4.jpg" alt=""></a></li>
          <li><a href="#"><img src="images/demo_6/banner_5.jpg" alt=""></a></li>
          <li><a href="#"><img src="images/demo_6/banner_6.jpg" alt=""></a></li>
        </ul>
      </section>

    </div><!-- .global-discounts-wrap -->
    

    <section class="right-nav-wrap" id="js-rightNav">
        <ul class="nav-cont">
            <li><a href="javascript:;">HOTTEST Deals</a></li>
            <li><a href="javascript:;">TOP Brands</a></li>
            <li><a href="javascript:;">OVERSEAS Warehouse</a></li>
        </ul>
        <a class="go-top js-goTop" href="javascript:;">TOP</a>
    </section>


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
                          limitObj = limitTime(time, status);
                          that.siblings('.status-title').html(limitObj.title);
                          clearInterval(nailInterval);
                      }
                  },1000);
              });
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

          $(window).scroll(function(event) {
            var $wind = $(window),
                firstTarget = $('.js-floorTarget').eq(0).offset().top,
                windowScrollH = $wind.scrollTop();

            if(windowScrollH >= firstTarget){
              $('#js-rightNav').show();
            }else{
              $('#js-rightNav').hide();
            }
          });

          $('#js-rightNav').on('click','li',function(){
            var $this = $(this);
            var index = $('#js-rightNav').find('li').index($this);
            var scrollH = $('.js-floorTarget').eq(index).offset().top;
              $('html,body').animate({scrollTop: scrollH},500);
          });

          $('.js-goTop').click(function(){
            $('html,body').animate({scrollTop: 0},500);
          });

          // 底部deal-tags分类切换
          (function($){
            var $dealTagsNav = $(".js_dealTagsNav"),
              $dealTagsListWrap = $(".js_dealTagsListWrap");

            $dealTagsNav.on("click","li", function(){
              var $this = $(this);
              var index = $dealTagsNav.find("li").index($this);
              $this.addClass('on').siblings('li').removeClass('on');
              $dealTagsListWrap.find("ul").eq(index).show().siblings('ul').hide();
            });
          })(jQuery);
        });
    })
</script>

</body>
</html>