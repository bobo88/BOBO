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
        .atention-wrap{ width: 100%; min-width: 1200px; font-family: Impact, Myriad Pro, Arial; background: #b9e4f7;}
        .atention-wrap .banner{ width: 100%; min-width: 1200px; height: 691px; background: url('images/demo_5/atention_banner.jpg') top center no-repeat;}
        .s-1-nav{ width: 100%; height: 166px; background: #35548b;}
        .s-1-nav ul{ margin: 0 auto; padding: 0 100px; width: 1000px; height: 166px;
          -webkit-transform: skew(-25deg);
          -moz-transform: skew(-25deg);
          transform: skew(-25deg);
        }
        .s-1-nav ul li{ float: left; padding: 33px 0 33px 10px; width: 205px; height: 100px; border-right: 20px solid #172133; text-align: center; cursor: pointer;}
        .s-1-nav ul li.first-li{ border-left: 20px solid #172133;}
        .s-1-nav ul li.last-li{ width: 230px;}
        .s-1-nav ul li .nav-cont{ position: relative; z-index: 1; height: 100px;
          -webkit-transform: skew(25deg);
          -moz-transform: skew(25deg);
          transform: skew(25deg);
        }
        .s-1-nav ul li .nav-cont .nav-price{ height: 100px; line-height: 100px; color: #ffd800; font-size: 84px;} 
        .s-1-nav ul li .nav-cont .nav-price i{ font-size: 48px;} 
        .s-1-nav ul li .nav-cont em{ position: absolute; top: 20px; left: 110px; padding: 0 5px; height: 20px; line-height: 20px; color: #172133; font-family: Arial; font-size: 16px; background: #ffd800;
          -webkit-border-radius: 5px;
          -moz-border-radius: 5px;
          -ms-border-radius: 5px;
          border-radius: 5px;
        } 
        .s-1-nav ul li.last-li .nav-cont em{ left: 140px;}
        .s-1-nav ul li.cur{ background: #ffd800;}
        .s-1-nav ul li.cur .nav-price{ color: #172133;}
        .s-1-nav ul li.cur .nav-cont em{ color: #ffd800; background: #172133;}
        .s-1-nav ul li.cur .nav-cont .line{ position: absolute; display: inline-block; *display: inline;*zoom: 1; width: 190px; height: 0; border-top: 1px solid #ffe65a; border-bottom: 1px solid #edc900;
        }
        .s-1-nav ul li.cur .nav-cont .line-top{ top: 0; left: 25px; *left:0;}
        .s-1-nav ul li.cur .nav-cont .line-bottom{ bottom: 0; left: -20px; *left:0;}
        .s-1-nav ul li.cur .nav-cont .lightning{ position: absolute; top: -20px; right: -35px; display: block; width: 49px; height: 78px; background: url('images/demo_5/lightning.png') top center no-repeat;}

        .s-1-pro-wrap{ margin: 0 auto; width: 1200px;}
        .pro-list-wrap .pl-box{ font-family: Arial;}
        .pro-list-wrap .pl-box .pro-top{ position: absolute; top: -10px; left: -5px; width: 115px; height: 69px; background: url('images/demo_5/pro_top.png') top center no-repeat;}
        .pro-list-wrap .pl-box .slider{ padding-top: 30px; width: 1230px;}
        .pro-list-wrap .pl-box li{ float: left; width: 216px; margin-right: 24px; margin-bottom: 20px; background-color: #fff; padding-bottom: 15px; -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s; border: 2px solid #35548b;}
        .pro-list-wrap .pl-box li:hover{
            -webkit-transform: translate(0,-10px);
            -moz-transform: translate(0,-10px);
        }
        .goods-time{ padding: 3px 0 3px 110px; height:40px; color:#fff;font-size:14px;background-color:#35548b;text-align:center;}
        .goods-time em{display:block; height: 20px; line-height: 20px;}
        .goods-time span{display:inline-block;vertical-align:middle;height:20px;line-height:20px;padding:0 3px;}

        .goods-img{width:200px;height:170px;margin:5px auto 0; padding-bottom: 5px; border-bottom: 1px solid #e7dfb5; text-align: center;}
        .goods-img .free{ position: absolute; top: -5px; right: -8px; width: 55px; height: 70px; background: url('images/demo_5/free.png') no-repeat;}
        .goods-img a{display:block;width:200px;height:170px;overflow:hidden;}
        .goods-img img{height:170px;width:auto;display:inline;vertical-align:top;}

        .goods-title{font-size:14px;width:200px;margin:auto;height:20px;line-height:20px;overflow:hidden;text-align:center;margin-top:5px;text-overflow: ellipsis;white-space: nowrap;}
        .goods-title a{color:#35548b; text-decoration: none;}
        .goods-title a:hover{color:#333; text-decoration: underline;}

        .goods-price{margin-top:10px;line-height:1;text-align:center;}
        .goods-price .my_shop_price{margin:0;}
        .goods-price i{vertical-align:baseline;}
        .goods-price .market-price{color:#35548b;font-size:14px;padding-right:10px;}
        .goods-price .market-price b{ font-weight:normal;}
        .goods-price .shop-price{color:#df0000;font-size:22px; font-weight: bold;}

        .goods-limit{width:200px;margin:5px auto 0;height:50px;position:relative;}
        .pl-box .goods-limit .market-price{ color: #35548b; position: absolute; top: 10px; right: 0;}
        .process-bar{display:block;position:absolute;left:0;bottom:0;width:100%;background:#35548b;height:11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .process-inner{position:absolute;left:0;top:0;display:block;background: #ffd800;width:0%;height: 11px;-webkit-border-radius: 10px; -moz-border-radius: 10px; -ms-border-radius: 10px; border-radius: 10px;}
        .goods-limit-tips{
            position:absolute;left:0;top:-30px;width:85px; height:20px; color: #35548b; font:normal 12px/20px Arial;
            background:#fff;border:1px solid #35548b;text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-limit-tips em{position:absolute;display:block;bottom:-10px;left:10px;border-width:5px;border-style:solid;}
        .goods-limit-tips em.tri_bd{border-color:#35548b transparent transparent transparent;bottom:-11px;z-index:1;}
        .goods-limit-tips em.tri_bg{border-color:#fff transparent transparent transparent;z-index:2;}
        .goods-nolimit{text-align:center;font-size:14px;margin-top:15px;color:#35548b;}
        .goods-buy{text-align:center;margin-top:10px;}
        .goods-buy a{
            display:inline-block;width:140px;height:24px;text-align:center;line-height:24px;background:#35548b;text-transform:uppercase;
            color:#fff;font-weight:bold;font-size:12px;text-decoration:none; padding-top:2px;-webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; border-radius: 3px;
        }
        .goods-buy a i{ display: inline-block; *display: inline; *zoom: 1; margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fff;}
        .goods-buy a:hover{opacity:0.9;filter:alpha(opacity=90);}
        .end-status{ display: none; position: absolute; z-index: 9999; top: 0; left: 0; width: 100%; height: 100%; background: url('images/demo_5/end.png') center center no-repeat;}
        .end-status a{ display: block; width: 100%; height: 100%;}

        .section-2{ width: 100%; min-width: 1200px; height: 740px; background: url('images/demo_5/section_2_bg.jpg') center center no-repeat;}
        .s-2-wrap{ margin: 0 auto; padding: 100px 0 0 270px; width: 930px; height: 600px;}
        .s-2-wrap ul{ width: 950px; height: 600px; font-family: Arial;}
        .s-2-wrap ul li{ float: left; padding: 10px; margin-right: 9px; margin-bottom: 12px; width: 206px; background: #fff;
          -webkit-transition: 0.5s; -moz-transition: 0.5s; -o-transition: 0.5s; -ms-transition: 0.5s; transition: 0.5s;
        }
        .s-2-wrap ul li:hover{
          -webkit-transform: translate(0,-10px);
          -moz-transform: translate(0,-10px);
        }
        .s-2-wrap ul li .goods-img{ height: 180px; border-bottom: 1px solid #c2cbdc;}
        .s-2-wrap ul li .goods-img a{ height: 180px;}
        .s-2-wrap ul li .goods-img img{ height: 180px;}
        .s-2-wrap ul li .goods-img .free{ top: -15px; right: -12px;}
        .s-2-wrap ul li .goods-price{ width: 130px; text-align: left;}
        .s-2-wrap ul li .goods-price em{margin-right: 5px; display: inline-block; *display: inline; *zoom: 1; width: 20px; height: 16px; line-height: 16px; color: #fff; font-size: 12px; background: #35548b; text-align: center; vertical-align: middle;
          -webkit-border-radius: 3px;
          -moz-border-radius: 3px;
          -ms-border-radius: 3px;
          border-radius: 3px;
        }
        .s-2-wrap ul li .goods-price .shop-price{ padding-top: 4px; display: block; height: 20px; line-height: 20px; font-size: 18px;}
        .s-2-wrap ul li .goods-price .shop-price em{ height: 20px; line-height: 20px; font-size: 14px; background: #df0000;}
        .s-2-wrap ul li .goods-buy{ width: 74px; height: 34px; line-height: 17px;}
        .s-2-wrap ul li .goods-buy a{ width: 74px; height: 34px; line-height: 17px;}

        .section-3{ font-family: Arial;}
        .s3-tit-bg{ margin: 0 auto; width: 1360px; height: 280px; background: url('images/demo_5/s_3_bg.png') left center no-repeat;}
        .s3-pro-wrap{ margin: 0 auto; margin-top: -77px; padding: 0 30px; width: 1140px; background: #ffd800;}
        .s3-nav{ padding: 50px 0 25px 0;}
        .s3-nav li{ position: relative; z-index: 1; float: left; margin-bottom: 25px; margin-left: 10px; width: 180px; height: 25px; text-align: center;
          -webkit-border-radius: 3px;
          -moz-border-radius: 3px;
          -ms-border-radius: 3px;
          border-radius: 3px;
        }
        .s3-nav li a{ display: block; width: 180px; height: 25px; line-height: 25px; color: #35548b; font-size: 14px; text-decoration: none;}
        .s3-nav li.cur,.s3-nav li:hover{ background: #35548b;}
        .s3-nav li.cur a,.s3-nav li:hover a{ color: #ffd800;}
        .s3-nav li.cur i,.s3-nav li:hover i{ position: absolute; top: -34px; left: -20px; display: block; width: 63px; height: 58px; background: url('images/demo_5/person_icon.png') no-repeat;}
        .s3-pro-wrap .pro-list-wrap .pl-box .slider{ padding-top: 0; width: 1170px;}
        .s3-pro-wrap .pro-list-wrap .pl-box li{ margin-right: 10px; width: 220px; border: none;}
        .s3-pro-wrap .pro-list-wrap .pl-box li .goods-img{ height: 200px; border-bottom: 1px solid #c2cbdc;}
        .s3-pro-wrap .pro-list-wrap .pl-box li .goods-img a{ height: 200px;}
        .s3-pro-wrap .pro-list-wrap .pl-box li .goods-img img{ height: 200px;}
        .s3-pro-wrap .pro-list-wrap .pl-box li .goods-price{ margin-top: 5px; padding: 0 20px; height: 25px; line-height: 25px;}
        
        .section-4{ width: 100%; height: 386px; background: url('images/demo_5/foot_bg.jpg') center center no-repeat;}
        .foot-banner-wrap{ margin: 0 auto; padding-top: 58px; width: 1200px;}
        .foot-banner-wrap p{ width: 590px;}

        .right-nav-wrap{ position: fixed; z-index: 9999; top: 50px; right: 60px; width: 2px; height: 250px; background: #4f71a1;}
        .right-nav-wrap ul{ position: absolute; top: 0; left: -22px; width: 46px;}
        .right-nav-wrap ul li{ margin-bottom: 7px; width: 46px; height: 46px; line-height: 46px; text-align: center;}
        .right-nav-wrap ul li a{ display: block; width: 46px; height: 46px; color: #b9e4f7; font-size: 20px; background: #4f71a1; text-decoration: none;
          -webkit-border-radius: 46px;
          -moz-border-radius: 46px;
          -ms-border-radius: 46px;
          border-radius: 46px;
        }
        .right-nav-wrap ul li a:hover{ color: #35548b; background: #ffd800;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>


    <div class="atention-wrap">
      <div class="banner"></div>

      <section class="section-1 js-rightNavTarget">
        <div class="s-1-nav" id="js-s1Nav">
          <ul class="clearfix">
            <li class="first-li cur">
              <div class="nav-cont">
                <span class="line line-top"></span>
                <span class="nav-price">10<i>.99€</i></span>
                <em>Menos de</em>
                <span class="line line-bottom"></span>
                <span class="lightning"></span>
              </div>
            </li>
            <li>
              <div class="nav-cont">
                <span class="line line-top"></span>
                <span class="nav-price">50<i>.99€</i></span>
                <em>Menos de</em>
                <span class="line line-bottom"></span>
                <span class="lightning"></span>
              </div>
            </li>
            <li>
              <div class="nav-cont">
                <span class="line line-top"></span>
                <span class="nav-price">80<i>.99€</i></span>
                <em>Menos de</em>
                <span class="line line-bottom"></span>
                <span class="lightning"></span>
              </div>
            </li>
            <li class="last-li">
              <div class="nav-cont">
                <span class="line line-top"></span>
                <span class="nav-price">100<i>.99€</i></span>
                <em>Menos de</em>
                <span class="line line-bottom"></span>
                <span class="lightning"></span>
              </div>
            </li>
          </ul>
        </div>

        <div class="s-1-pro-wrap" id="js-s1ProWrap">
          <div class="pro-list-wrap js-tabTarget">
              <div class="pl-box">
                  <ul class="slider clearfix">
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="0" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                  </ul>
              </div>
          </div>

          <div class="pro-list-wrap js-tabTarget none">
              <div class="pl-box">
                  <ul class="slider clearfix">
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="0" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                  </ul>
              </div>
          </div>

          <div class="pro-list-wrap js-tabTarget none">
              <div class="pl-box">
                  <ul class="slider clearfix">
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="0" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                  </ul>
              </div>
          </div>

          <div class="pro-list-wrap js-tabTarget none">
              <div class="pl-box">
                  <ul class="slider clearfix">
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="88888" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                      <li class="pr">
                          <p class="pro-top"><img src="images/demo_5/pro_top.png" alt="ATENTION"></p>
                          <p class="goods-time">
                            <span class="js-timeCounter" data-time="0" data-status="1">
                              <em>Acaban En:</em>
                              <span>00</span>|<span>00</span>|<span>00</span>|<span>00</span>
                            </span>
                          </p>
                          <p class="goods-img pr">
                              <a href="#" target="special">
                                  <img src="images/demo_5/demo_pro.jpg">
                              </a>
                              <span class="free"></span>
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
                              <span class="goods-limit-tips"><em class="tri_bd"></em><em class="tri_bg"></em>Quedan 10</span>
                              </span>  
                              <del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>      
                          </p>

                          <p class="goods-buy"><a href="#" target="special">Comprar Ahora <i></i></a></p>
                          <p class="end-status"><a href="#"></a></p>
                      </li>
                  </ul>
              </div>
          </div>
        </div>
      </section>

      <section class="section-2 js-rightNavTarget">
        <div class="s-2-wrap">
          <ul class="clearfix">
            <li class="pr">
                <p class="goods-img pr">
                    <a href="#" target="special">
                        <img src="images/demo_5/demo_pro.jpg">
                    </a>
                    <span class="free"></span>
                </p>
                <p class="goods-title">
                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                </p>

                <div class="clearfix">
                  <p class="goods-price fl">
                      <em>pc</em><del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>
                      <span class="shop-price">
                          <em>M</em>
                          <b class="bizhong">$</b>
                          <b class="my_shop_price" orgp="200.99">200.99</b>
                      </span>
                  </p>

                  <p class="goods-buy fr"><a href="#" target="special">Comprar<br/>Ahora <i></i></a></p>
                </div>
            </li>
            <li class="pr">
                <p class="goods-img pr">
                    <a href="#" target="special">
                        <img src="images/demo_5/demo_pro.jpg">
                    </a>
                    <span class="free"></span>
                </p>
                <p class="goods-title">
                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                </p>

                <div class="clearfix">
                  <p class="goods-price fl">
                      <em>pc</em><del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>
                      <span class="shop-price">
                          <em>M</em>
                          <b class="bizhong">$</b>
                          <b class="my_shop_price" orgp="200.99">200.99</b>
                      </span>
                  </p>

                  <p class="goods-buy fr"><a href="#" target="special">Comprar<br/>Ahora <i></i></a></p>
                </div>
            </li>
            <li class="pr">
                <p class="goods-img pr">
                    <a href="#" target="special">
                        <img src="images/demo_5/demo_pro.jpg">
                    </a>
                    <span class="free"></span>
                </p>
                <p class="goods-title">
                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                </p>

                <div class="clearfix">
                  <p class="goods-price fl">
                      <em>pc</em><del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>
                      <span class="shop-price">
                          <em>M</em>
                          <b class="bizhong">$</b>
                          <b class="my_shop_price" orgp="200.99">200.99</b>
                      </span>
                  </p>

                  <p class="goods-buy fr"><a href="#" target="special">Comprar<br/>Ahora <i></i></a></p>
                </div>
            </li>
            <li class="pr">
                <p class="goods-img pr">
                    <a href="#" target="special">
                        <img src="images/demo_5/demo_pro.jpg">
                    </a>
                    <span class="free"></span>
                </p>
                <p class="goods-title">
                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                </p>

                <div class="clearfix">
                  <p class="goods-price fl">
                      <em>pc</em><del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>
                      <span class="shop-price">
                          <em>M</em>
                          <b class="bizhong">$</b>
                          <b class="my_shop_price" orgp="200.99">200.99</b>
                      </span>
                  </p>

                  <p class="goods-buy fr"><a href="#" target="special">Comprar<br/>Ahora <i></i></a></p>
                </div>
            </li>
            <li class="pr">
                <p class="goods-img pr">
                    <a href="#" target="special">
                        <img src="images/demo_5/demo_pro.jpg">
                    </a>
                    <span class="free"></span>
                </p>
                <p class="goods-title">
                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                </p>

                <div class="clearfix">
                  <p class="goods-price fl">
                      <em>pc</em><del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>
                      <span class="shop-price">
                          <em>M</em>
                          <b class="bizhong">$</b>
                          <b class="my_shop_price" orgp="200.99">200.99</b>
                      </span>
                  </p>

                  <p class="goods-buy fr"><a href="#" target="special">Comprar<br/>Ahora <i></i></a></p>
                </div>
            </li>
            <li class="pr">
                <p class="goods-img pr">
                    <a href="#" target="special">
                        <img src="images/demo_5/demo_pro.jpg">
                    </a>
                    <span class="free"></span>
                </p>
                <p class="goods-title">
                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                </p>

                <div class="clearfix">
                  <p class="goods-price fl">
                      <em>pc</em><del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>
                      <span class="shop-price">
                          <em>M</em>
                          <b class="bizhong">$</b>
                          <b class="my_shop_price" orgp="200.99">200.99</b>
                      </span>
                  </p>

                  <p class="goods-buy fr"><a href="#" target="special">Comprar<br/>Ahora <i></i></a></p>
                </div>
            </li>
            <li class="pr">
                <p class="goods-img pr">
                    <a href="#" target="special">
                        <img src="images/demo_5/demo_pro.jpg">
                    </a>
                    <span class="free"></span>
                </p>
                <p class="goods-title">
                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                </p>

                <div class="clearfix">
                  <p class="goods-price fl">
                      <em>pc</em><del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>
                      <span class="shop-price">
                          <em>M</em>
                          <b class="bizhong">$</b>
                          <b class="my_shop_price" orgp="200.99">200.99</b>
                      </span>
                  </p>

                  <p class="goods-buy fr"><a href="#" target="special">Comprar<br/>Ahora <i></i></a></p>
                </div>
            </li>
            <li class="pr">
                <p class="goods-img pr">
                    <a href="#" target="special">
                        <img src="images/demo_5/demo_pro.jpg">
                    </a>
                    <span class="free"></span>
                </p>
                <p class="goods-title">
                    <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                </p>

                <div class="clearfix">
                  <p class="goods-price fl">
                      <em>pc</em><del class="market-price"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>
                      <span class="shop-price">
                          <em>M</em>
                          <b class="bizhong">$</b>
                          <b class="my_shop_price" orgp="200.99">200.99</b>
                      </span>
                  </p>

                  <p class="goods-buy fr"><a href="#" target="special">Comprar<br/>Ahora <i></i></a></p>
                </div>
            </li>
          </ul>
        </div>
      </section>

      <section class="section-3 js-rightNavTarget">
        <div class="s3-tit-bg"></div>
        <div class="s3-pro-wrap">
          <div class="s3-nav">
            <ul class="clearfix" id="js-s3Nav">
              <li class="cur"><a href="javascript:;"><i></i>Teléfono Móvil</a></li>
              <li><a href="javascript:;"><i></i>Tablet PC</a></li>
              <li><a href="javascript:;"><i></i>Reloj Inteligente</a></li>
              <li><a href="javascript:;"><i></i>iPhone y iPad y iPod</a></li>
              <li><a href="javascript:;"><i></i>Accesorios para Celurares</a></li>
              <li><a href="javascript:;"><i></i>Aficiones y Juguetes</a></li>
              <li><a href="javascript:;"><i></i>Accesorios para coche</a></li>
              <li><a href="javascript:;"><i></i>Al Aire Libre</a></li>
              <li><a href="javascript:;"><i></i>Linternas</a></li>
              <li><a href="javascript:;"><i></i>Electrónicas de Consumo</a></li>
              <li><a href="javascript:;"><i></i>Computadores y Redes</a></li>
              <li><a href="javascript:;"><i></i>Jogar y oficinal</a></li>
            </ul>
          </div>

          <div class="s3-pro-list">
            <div class="pro-list-wrap js-s3TabTarget">
                <div class="pl-box">
                    <ul class="slider clearfix">
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_5/demo_pro.jpg">
                                </a>
                                <span class="free"></span>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price clearfix">
                                <span class="shop-price fl">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                                <del class="market-price fr"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>  
                            </p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_5/demo_pro.jpg">
                                </a>
                                <span class="free"></span>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price clearfix">
                                <span class="shop-price fl">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                                <del class="market-price fr"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>  
                            </p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_5/demo_pro.jpg">
                                </a>
                                <span class="free"></span>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price clearfix">
                                <span class="shop-price fl">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                                <del class="market-price fr"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>  
                            </p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_5/demo_pro.jpg">
                                </a>
                                <span class="free"></span>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price clearfix">
                                <span class="shop-price fl">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                                <del class="market-price fr"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>  
                            </p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_5/demo_pro.jpg">
                                </a>
                                <span class="free"></span>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price clearfix">
                                <span class="shop-price fl">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                                <del class="market-price fr"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>  
                            </p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_5/demo_pro.jpg">
                                </a>
                                <span class="free"></span>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price clearfix">
                                <span class="shop-price fl">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                                <del class="market-price fr"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>  
                            </p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_5/demo_pro.jpg">
                                </a>
                                <span class="free"></span>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price clearfix">
                                <span class="shop-price fl">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                                <del class="market-price fr"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>  
                            </p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_5/demo_pro.jpg">
                                </a>
                                <span class="free"></span>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price clearfix">
                                <span class="shop-price fl">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                                <del class="market-price fr"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>  
                            </p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_5/demo_pro.jpg">
                                </a>
                                <span class="free"></span>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price clearfix">
                                <span class="shop-price fl">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                                <del class="market-price fr"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>  
                            </p>
                        </li>
                        <li class="pr">
                            <p class="goods-img pr">
                                <a href="#" target="special">
                                    <img src="images/demo_5/demo_pro.jpg">
                                </a>
                                <span class="free"></span>
                            </p>
                            <p class="goods-title">
                                <a href="#" target="special">CubeWork 10 Flagship Tablet PC Ultrabook</a>
                            </p>
                            <p class="goods-price clearfix">
                                <span class="shop-price fl">
                                    <b class="bizhong">$</b>
                                    <b class="my_shop_price" orgp="200.99">200.99</b>
                                </span>
                                <del class="market-price fr"><b class="bizhong">$</b><b class="my_shop_price" orgp="279.51">279.51</b></del>  
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pro-list-wrap js-s3TabTarget none">
                <div class="pl-box">
                    <ul class="slider clearfix">
                        <li class="pr">
                            2222222222
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pro-list-wrap js-s3TabTarget none">
                <div class="pl-box">
                    <ul class="slider clearfix">
                        <li class="pr">
                            3333333
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pro-list-wrap js-s3TabTarget none">
                <div class="pl-box">
                    <ul class="slider clearfix">
                        <li class="pr">
                            44444444
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pro-list-wrap js-s3TabTarget none">
                <div class="pl-box">
                    <ul class="slider clearfix">
                        <li class="pr">
                            555555555
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pro-list-wrap js-s3TabTarget none">
                <div class="pl-box">
                    <ul class="slider clearfix">
                        <li class="pr">
                            66666666666
                        </li>
                    </ul>
                </div>
            </div>

          </div>
        </div>
      </section>

      <section class="section-4 js-rightNavTarget">
        <div class="foot-banner-wrap clearfix">
          <p class="fl"><a href="#"><img src="images/demo_5/foot_banner_1.jpg" width="590" alt="ATENTION"></a></p>
          <p class="fr"><a href="#"><img src="images/demo_5/foot_banner_2.jpg" width="590" alt="ATENTION"></a></p>
        </div>
      </section>

    </div><!-- .atention-wrap -->
    
    <div class="right-nav-wrap none" id="js-rightNav">
      <ul>
        <li><a href="javascript:;">1</a></li>
        <li><a href="javascript:;">2</a></li>
        <li><a href="javascript:;">3</a></li>
        <li><a href="javascript:;">4</a></li>
        <li><a href="javascript:;">TOP</a></li>
      </ul>
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
                          var preS = 'Acaban En:';
                          limitObj = limitTime(time, status);
                          that.html('<em>'+preS + '</em><span>'+ limitObj.cDay +'</span>|<span>'+ limitObj.CHour +'</span>|<span>'+ limitObj.CMinute +'</span>|<span>'+ limitObj.CSecond +'</span>');
                      }else{
                        that.parents('li').find('.end-status').show();
                          clearInterval(nailInterval);
                      }
                  },1000);
              });
          })();

          $('#js-s1Nav').on('click', 'li', function(){
            var $this = $(this);
            var index = $('#js-s1Nav').find('li').index($this);
            $this.addClass('cur').siblings('li').removeClass('cur');
            $('.js-tabTarget').eq(index).show().siblings('.js-tabTarget').hide();
          });

          $('#js-s3Nav').on('click', 'li', function(){
            var $this = $(this);
            var index = $('#js-s3Nav').find('li').index($this);
            $this.addClass('cur').siblings('li').removeClass('cur');
            $('.js-s3TabTarget').eq(index).show().siblings('.js-s3TabTarget').hide();
          });

          $(window).scroll(function(event) {
            var $wind = $(window),
                firstTarget = $('.js-rightNavTarget').eq(0).offset().top,
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
            var scrollH = 0;
            if(index < 4){
              scrollH = $('.js-rightNavTarget').eq(index).offset().top;
              $('html,body').animate({scrollTop: scrollH},500);
            }else{
              $('html,body').animate({scrollTop: 0},500);
            }
          });
        });
    })
</script>

</body>
</html>