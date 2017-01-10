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
        .piao{position:fixed; width:116px; height:110px; bottom:250px; right: 0;  _bottom:0px; _position:absolute; _top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,0)||0)-(parseInt(this.currentStyle.marginBottom,50)||150)));}
        .piao a{ position:absolute; left: 0; top:-70px; width:115px; height:178px;}
        .piao:hover a{background:url(images/demo_2/hand.png) no-repeat right 0px;}
        .piao a:active{background:url(images/demo_2/hand.png) no-repeat right 0px;top:-50px; width:110px;}
        
        .blackFridayWrap{ width: 100%;}
        /*banner图*/
        .blackFridayWrap .blackFriday_banner{ width: 100%; height: 487px; background: #eee;}
        .blackFridayWrap .blackFriday_banner .banner{ margin: 0 auto; width: 1200px; height: 487px;}
        .mb25{ margin-bottom: 25px;}

        .proListWrap{ padding: 34px 0 70px; width: 100%; background: #ff5e01;}
        .proList_center{ margin: 0 auto; width: 1200px;}
        .proList_oneWrap{ height: 529px;}
        .twoToFive{ height: 585px;}
        .img_fl .proList ul li{ margin-left: 4px;}
        .img_fr .proList ul li{ margin-right: 4px;}

        /*区块1至6公用样式*/
        .proList ul{ width: 897px; height: 529px; overflow: hidden;}
        .proList ul li{ float: left; margin-bottom: 4px; width: 220px; height: 262px; background: #fff; text-align: center;}
        .proList ul li p.img{ width: 220px; height: 220px; text-align: center;}
        .proList ul li .pro-price{ float: left; margin: 8px 0 0 10px; display: inline-block; height: 30px; line-height: 30px; font-size: 24px; font-family: Arial;}
        .proList .buy-now{ float: right; margin: 8px 10px 0 0; height: 30px; text-align: center;}
        .proList .buy-now a{ display: block; margin: 0 auto; height: 24px; line-height: 24px; width: 80px; font-family: Arial; border: 1px solid #ff5e01; -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; color: #fff; background: #ff5e01; font-size: 14px; font-weight: bold; text-decoration: none;}

        /*区块1和6的公用样式*/
        .proList_oneWrap p{ width: 303px; height: 529px;}
        .proList_oneWrap .proList{ width: 897px; height: 529px;}
        
        /*区块2至5的公用样式*/
        .twoToFive .p{ width: 303px; height: 585px;}
        .twoToFive .proList{ width: 897px; height: 585px;}
        .twoToFive .proList ul{ margin-top: 56px;}

        .cdtc{ margin:0 auto; padding:8px 0 0;  width:572px; height:253px; background: #912228;}
        .cdtcdh{width:548px; height:32px; margin:0 auto; padding:0px; overflow:hidden; display:block;}
        .cdtcdh span{ font-family:Arial; font-size:18px; float:left; color:#FFF; padding:4px 6px;}
        .cdtcdh a{ float:right; padding:0;}
        .cdtcnr{ width:548px; height:203px; margin:6px auto; padding:0px; background:#FFF;}
        .cdtcnr h3{ margin-bottom: 10px; font-size: 18px; font-weight: bold; color: #ff5e01;}
        .cdtcnra{background:url(images/demo_2/tuzi.jpg) no-repeat; width:185px; height:192px; float:left; margin-top:10px;}
        .cdtcnrb{ font-size:14px; font-family:Arial; color:#000; width:340px; margin:0px auto; line-height:22px; float:right; margin:26px 10px 0 0;}
        .cdtcnrb span{ font-size:14px; color:#000; margin:0 auto; padding:0px; display:block;}
        .cdtcnrb span.orangeColor{ display: inline-block; color: #ff5e01;}
        .cdtcnrb span.orangeColor2{ color: #f84600; font-size: 16px; font-weight: bold;}
        .cdtcnrb span.orangeColor3{ color: #f84600; font-size: 24px; font-weight: bold;}
        .cdtcnrb span.orangeColor3 i{ font-style: normal; font-size: 14px; font-weight: normal; color: #ab6017;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>



    <div class="piao"><a href="javascript:;" id="js-clickBox"></a><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/box.png"/></div>
    <div class="blackFridayWrap">
        <div class="blackFriday_banner">
            <div class="banner"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/banner.jpg" alt="THANKS GIVING" height="487"></div>
        </div><!-- .blackFriday_banner -->

        <div class="proListWrap">
            <!-- 区块一 -->
            <section class="mb25">
                <div class="proList_oneWrap proList_center img_fl clearfix">
                    <p class="topicsImages fl"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/pro_section_1.jpg" alt="THANKS GIVING" height="529"></p>

                    <div class="proList fr">
                        <ul class="clearfix">
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .proList_oneWrap -->
            </section>

            <!-- 区块二 -->
            <section class="mb25">
                <div class="proList_center img_fr twoToFive clearfix">
                    <div class="proList fl">
                        <ul class="clearfix">
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <p class="topicsImages fr"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/pro_section_2.jpg" alt="THANKS GIVING" height="585"></p>
                </div><!-- .proList_oneWrap -->
            </section>

            <!-- 区块三 -->
            <section class="mb25">
                <div class="proList_center img_fl twoToFive clearfix">
                    <p class="topicsImages fl"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/pro_section_3.jpg" alt="THANKS GIVING" height="585"></p>

                    <div class="proList fr">
                        <ul class="clearfix">
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .proList_oneWrap -->
            </section>

            <!-- 区块四 -->
            <section class="mb25">
                <div class="proList_center img_fr twoToFive clearfix">
                    <div class="proList fl">
                        <ul class="clearfix">
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <p class="topicsImages fr"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/pro_section_4.jpg" alt="THANKS GIVING" height="585"></p>
                </div><!-- .proList_oneWrap -->
            </section>

            <!-- 区块五 -->
            <section class="mb25">
                <div class="proList_center img_fl twoToFive clearfix">
                    <p class="topicsImages fl"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/pro_section_5.jpg" alt="THANKS GIVING" height="585"></p>

                    <div class="proList fr">
                        <ul class="clearfix">
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .proList_oneWrap -->
            </section>

            <!-- 区块六 -->
            <section class="mb25">
                <div class="proList_oneWrap proList_center img_fr clearfix">
                    <div class="proList fl">
                        <ul class="clearfix">
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                            <li>
                                <p class="img"><a href="#" target="_blank"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/demo_pro.jpg" alt="THANKS GIVING" height="220"></a></p>
                                <div class="pro-price">
                                    <span class="bizhong">$</span> 
                                    <span class="my_shop_price" orgp="{$goods.shop_price}">10.70</span> 
                                </div>
                                <div class="buy-now">
                                    <a title="Buy Now" alt="Buy Now" href="#" class="addtocart" data-done="Done" id="124351" target="_blank">BUY NOW</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <p class="topicsImages fr"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/pro_section_6.jpg" alt="THANKS GIVING" height="529"></p>
                </div><!-- .proList_oneWrap -->
            </section>


        </div><!-- .proListWrap -->

    </div><!-- .blackFridayWrap -->


    <!-- 彩蛋弹窗-----开始 -->
    <div class="cdtc none" id="cdtc_popBox">
        <div class="cdtcdh"><span>Happy Easter</span><a href="javascript:;" id="js-closepopBox"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_2/gb.png"  width="19" height="19"></a></div>
        <div class="cdtcnr">
            <div class="cdtcnra"></div>
            <div class="cdtcnrb">Congratulations, you've won an Easter Prize! Simply use the following promo code for an Exclusive Easter 10% Discount! (Ends: April 21)<br><br>
            <span>Coupon Code:  luckyeaster</span>
            <a>Please copy the coupon code and apply it during checkout.</a>
            </div>
        </div>
    </div>
    <!-- 彩蛋弹窗-结束 -->

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->


<script>
$(function(){
    (function(){
        var popIndex;
        $("#js-clickBox").on('click',function(){
            popIndex = layer.open({
                type : 1,
                title : false,
                closeBtn : 0,
                shade: [0.5, '#000'],
                area : ['572px','261px'],
                content : $('#cdtc_popBox')
            });
        });
        $('#js-closepopBox').click(function(){
            layer.close(popIndex);
        });
    })();
});
</script>

</body>
</html>