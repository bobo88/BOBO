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
        .icon-coupon{ display: inline-block; background: url('images/demo_23/icon.png') no-repeat; *display: inline; *zoom: 1;}
        
        .coupon-carnival-wrap{ padding-bottom: 50px; width: 100%; min-width: 1000px; font-family: Arial; font-size: 12px; background: #c42026 url('images/demo_23/banner.jpg') top center no-repeat;}
        .banner{ width: 100%; min-width: 1000px; height: 541px;}

        .nav-box{ margin-bottom: 30px; width: 100%; height: 60px; background: #3f040a;}
        .nav-box .nav-list{ margin: 0 auto; width: 1000px; height: 60px;}
        .nav-box .nav-list li{ float: left; width: 200px; height: 60px; text-align: center;}
        .nav-box .nav-list li a{ display: block; width: 100%; height: 60px; line-height: 60px; color: #fff; font-size: 16px;}
        .nav-box .nav-list li.active a,.nav-box .nav-list li:hover a{ background: #c42026;}
        
        .sort-item-sec{ margin: 0 auto; width: 1000px;}

        .super-deal-wrap{ position: relative; z-index: 1; width: 100%; height: 360px; background: #fff;}
        .icon-tips{ position: absolute; top: 0; right: -1px; width: 237px; height: 82px; background-position: -100px 0;}
        .pro-img{ position: relative; z-index: 1; float: left; padding: 30px 0; width: 500px; height: 300px; text-align: center;}
        .pro-img .discount{ position: absolute; z-index: 2; top: 12px; left: 95px; width: 62px; height: 63px; background-position: 0 0;}
        .pro-img .discount em{ display: block; line-height: 20px; color: #fff; font-size: 16px; font-weight: bold;}
        .pro-img .discount strong{ display: block; font-weight: bold;}
        .pro-img .discount .bizhong{ color: #c60e19;}
        .pro-content{ float: left; padding: 70px 100px 0 25px; width: 375px; height: 290px;}
        .pro-content .title{ margin-bottom: 10px; height: 40px;}
        .pro-content .title a{ display: block; height: 40px; line-height: 40px; color: #000; font-size: 14px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
        .pro-content .title a:hover{ text-decoration: underline;}

        .coupon-detail{}
        .coupon-detail .coupon-tit{ height: 24px; line-height: 24px; color: #000; font-size: 14px;}
        .coupon-detail .after-coupon-price{ height: 50px; line-height: 50px; color: #c60e19; font-size: 42px; font-weight: bold;}
        .coupon-detail .the-coupon{ display: inline-block; padding: 0 12px; height: 40px; line-height: 40px; color: #c42026; font-size: 28px; font-weight: bold; background: #ffe793; border:1px dashed #efcc53; text-align: center; *display: inline;*zoom:1; }
        .coupon-detail .limit-tips{ height: 30px; line-height: 30px; color: #000; font-size: 12px;}
        .buy-now{ display: inline-block; width: 174px; height: 32px; line-height: 32px; color: #fff; font-family: Open Sans,Arial; font-size: 14px; font-weight: bold; background: #c42026; text-align: center; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;-webkit-transition: 0.28s;  -moz-transition: 0.28s;  -o-transition: 0.28s;  -ms-transition: 0.28s;  transition: 0.28s; *display: inline;*zoom:1;}
        .buy-now:hover{ background: #3f040a;
            -webkit-transform: translate(5px,0); -moz-transform: translate(5px,0); transform: translate(5px,0);
        }
        .buy-now .icon-arrow-r{display: inline-block; margin-left: 5px; width: 0; height: 0; border: 5px solid transparent; border-left: 5px solid #fff;*display: inline;*zoom:1;-webkit-transition: 0.28s;  -moz-transition: 0.28s;  -o-transition: 0.28s;  -ms-transition: 0.28s;  transition: 0.28s;}
        .buy-now:hover .icon-arrow-r{
            -webkit-transform: translate(10px,0); -moz-transform: translate(10px,0); transform: translate(10px,0);
        }

        .sort-pro-list{ width: 1012px;}
        .sort-pro-list li{ float: left; margin: 12px 12px 0 0; width: 494px; height: 262px; background: #fff;
            box-shadow: 0 1px 3px -2px rgba(0,0,0,0.12),0 1px 2px rgba(0,0,0,0.24);
            -webkit-transition: 0.28s;  -moz-transition: 0.28s;  -o-transition: 0.28s;  -ms-transition: 0.28s;  transition: 0.28s;
        }
        .sort-pro-list li:hover{
            -webkit-transform: translate(0,-5px); -moz-transform: translate(0,-5px); transform: translate(0,-5px);
            -webkit-box-shadow: 0 14px 28px rgba(84,3,6,0.25),0 10px 10px rgba(84,3,6,0.2);
            -moz-box-shadow: 0 14px 28px rgba(84,3,6,0.25),0 10px 10px rgba(84,3,6,0.2);
            box-shadow: 0 14px 28px rgba(84,3,6,0.25),0 10px 10px rgba(84,3,6,0.2);
        }
        .sort-pro-list li .pro-item-box{ padding: 11px 12px; width: 470px; height: 240px;}
        .pro-item-box .pro-img{ padding: 20px 0; width: 240px; height: 200px;}
        .pro-item-box .pro-img .discount{ top: 0; left: 0;}
        .pro-item-box .pro-content{ padding: 30px 0 0 10px; width: 220px; height: 210px;}
        .pro-item-box .pro-content .title{ height: 30px;}
        .pro-item-box .pro-content .title a{ height: 30px; line-height: 30px;}
        .pro-item-box .coupon-detail .after-coupon-price{ height: 40px; line-height: 40px; font-size: 30px;}
        .pro-item-box .coupon-detail .the-coupon{ height: 26px; line-height: 26px; font-size: 18px;}
        .pro-item-box .buy-now{ width: 124px; height: 24px; line-height: 24px;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>
    
    <section class="coupon-carnival-wrap">
        <div class="banner"></div>
        
        <nav class="clearfix nav-box">
            <ul class="clearfix nav-list js-navList">
                <li class="active"><a href="javascript:;">Toy & Hobbies</a></li>
                <li><a href="javascript:;">Smart Life</a></li>
                <li><a href="javascript:;">Outdoors & Sports</a></li>
                <li><a href="javascript:;">Automobiles & Motorcycle</a></li>
                <li><a href="javascript:;">LED Light & Flashglights</a></li>
            </ul>
        </nav>

        <section class="sort-item-sec js-sortItem">
            <section class="super-deal-wrap clearfix">
                <div class="icon-tips icon-coupon"></div>

                <p class="pro-img fl">
                    <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="300" height="300" alt="园博吧 2017 coupon carnival"></a>
                    <span class="discount icon-coupon">
                        <em class="bizhong">USD</em>
                        <em><strong>21.00</strong>OFF</em>
                    </span>
                </p>

                <div class="pro-content fl">
                    <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                    <div class="coupon-detail mb15">
                        <p class="coupon-tit">Price After Coupon: </p>
                        <p class="after-coupon-price">HK$2994.85</p>
                        <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                        <p class="limit-tips">Total 50PCS Limited</p>
                    </div>

                    <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                </div>
            </section>

            <ul class="sort-pro-list clearfix">
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </section><!-- .sort-item-sec -->

        <section class="sort-item-sec none js-sortItem">
            <section class="super-deal-wrap clearfix">
                <div class="icon-tips icon-coupon"></div>

                <p class="pro-img fl">
                    <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="300" height="300" alt="园博吧 2017 coupon carnival"></a>
                    <span class="discount icon-coupon">
                        <em class="bizhong">USD</em>
                        <em><strong>21.00</strong>OFF</em>
                    </span>
                </p>

                <div class="pro-content fl">
                    <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                    <div class="coupon-detail mb15">
                        <p class="coupon-tit">Price After Coupon: </p>
                        <p class="after-coupon-price">HK$2994.85</p>
                        <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                        <p class="limit-tips">Total 50PCS Limited</p>
                    </div>

                    <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                </div>
            </section>

            <ul class="sort-pro-list clearfix">
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </section><!-- .sort-item-sec -->

        <section class="sort-item-sec none js-sortItem">
            <section class="super-deal-wrap clearfix">
                <div class="icon-tips icon-coupon"></div>

                <p class="pro-img fl">
                    <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="300" height="300" alt="园博吧 2017 coupon carnival"></a>
                    <span class="discount icon-coupon">
                        <em class="bizhong">USD</em>
                        <em><strong>21.00</strong>OFF</em>
                    </span>
                </p>

                <div class="pro-content fl">
                    <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                    <div class="coupon-detail mb15">
                        <p class="coupon-tit">Price After Coupon: </p>
                        <p class="after-coupon-price">HK$2994.85</p>
                        <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                        <p class="limit-tips">Total 50PCS Limited</p>
                    </div>

                    <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                </div>
            </section>

            <ul class="sort-pro-list clearfix">
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </section><!-- .sort-item-sec -->

        <section class="sort-item-sec none js-sortItem">
            <section class="super-deal-wrap clearfix">
                <div class="icon-tips icon-coupon"></div>

                <p class="pro-img fl">
                    <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="300" height="300" alt="园博吧 2017 coupon carnival"></a>
                    <span class="discount icon-coupon">
                        <em class="bizhong">USD</em>
                        <em><strong>21.00</strong>OFF</em>
                    </span>
                </p>

                <div class="pro-content fl">
                    <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                    <div class="coupon-detail mb15">
                        <p class="coupon-tit">Price After Coupon: </p>
                        <p class="after-coupon-price">HK$2994.85</p>
                        <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                        <p class="limit-tips">Total 50PCS Limited</p>
                    </div>

                    <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                </div>
            </section>

            <ul class="sort-pro-list clearfix">
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </section><!-- .sort-item-sec -->

        <section class="sort-item-sec none js-sortItem">
            <section class="super-deal-wrap clearfix">
                <div class="icon-tips icon-coupon"></div>

                <p class="pro-img fl">
                    <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="300" height="300" alt="园博吧 2017 coupon carnival"></a>
                    <span class="discount icon-coupon">
                        <em class="bizhong">USD</em>
                        <em><strong>21.00</strong>OFF</em>
                    </span>
                </p>

                <div class="pro-content fl">
                    <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                    <div class="coupon-detail mb15">
                        <p class="coupon-tit">Price After Coupon: </p>
                        <p class="after-coupon-price">HK$2994.85</p>
                        <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                        <p class="limit-tips">Total 50PCS Limited</p>
                    </div>

                    <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                </div>
            </section>

            <ul class="sort-pro-list clearfix">
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="clearfix pro-item-box">
                        <p class="pro-img fl">
                            <a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" width="200" height="200" alt="园博吧 2017 coupon carnival"></a>
                            <span class="discount icon-coupon">
                                <em class="bizhong">USD</em>
                                <em><strong>21.00</strong>OFF</em>
                            </span>
                        </p>

                        <div class="pro-content fl">
                            <h3 class="title"><a href="#">UHD Virtual Reality 3D PC Headset  -  WITH EARPHONES </a></h3>
                            <div class="coupon-detail">
                                <p class="coupon-tit">Price After Coupon: </p>
                                <p class="after-coupon-price">HK$2994.85</p>
                                <p><span class="the-coupon">COUPON: ABCDEF</span></p>
                                <p class="limit-tips">Total 50PCS Limited</p>
                            </div>

                            <p><a href="#" class="buy-now">BUY NOW <i class="icon-arrow-r"></i></a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </section><!-- .sort-item-sec -->

    </section><!-- .coupon-carnival-wrap -->

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->

<script>
$LAB.script("")
    .wait(function(){
        $(function(){
            //Tab change
            $('.js-navList').on('click','li',function(){
                var $this = $(this);
                var index = $('.js-navList').find('li').index($this);
                
                $this.addClass('active').siblings('li').removeClass('active');
                $('.js-sortItem').eq(index).show().siblings('.js-sortItem').hide();
            });
        });
    })
</script>

</body>
</html>