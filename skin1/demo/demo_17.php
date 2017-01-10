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
        .popular-king-wrap{ position: relative; z-index: 1; padding-bottom: 100px; width: 100%; min-width: 1200px; font-family:Arial; background: #d43b31; background: url(images/demo_17/bg.jpg) repeat-y;}
        .w1200{ margin: 0 auto; width: 1200px;}
        .ptb40{ padding: 40px 0;}
        .banner-wrap{ width: 100%; height: 705px; background: url(images/demo_17/banner_bg.jpg) top center no-repeat;}
        .btn-status{ margin: 0 auto 20px; padding-top: 430px; text-align: center;}
        .btn-status .btn-stauts-normal{ margin-left: 40px; display: inline-block; width: 250px; background: url(images/demo_17/btn_bg.png) no-repeat; *display: inline;*zoom:1;}
        /*  .btn-status-1:figth for friends; 
            .btn-status-2:share; 
            .btn-status-3:start game; 
            .btn-status-4:fight for friends(grey); 
            .btn-status-5:game over; 
        */
        .btn-status .btn-status-1,.btn-status .btn-status-2,.btn-status .btn-status-3{ width: 252px; height: 55px;}
        .btn-status .btn-status-4,.btn-status .btn-status-5{ height: 50px;}
        .btn-status .btn-status-1{ background-position: -300px 0;}
        .btn-status .btn-status-2{ background-position: -300px -80px;}
        .btn-status .btn-status-3{ background-position: -300px -160px;}
        .btn-status .btn-status-4{ background-position: 0 0;}
        .btn-status .btn-status-5{ background-position: 0 -80px;}
        

        .to-my-game-wrap{margin-bottom: 100px; height: 30px; line-height: 30px; text-align: center;}
        .to-my-game{ display: none;}
        .to-my-game a{ position: relative; z-index: 1; display: inline-block; padding-right: 46px; height: 30px; line-height: 30px; color: #f4d28e; font-size: 18px; font-weight: bold; text-align: center;*display: inline;*zoom:1; vertical-align: middle;}
        .to-my-game a:hover .arrow{ right: -5px;}
        .to-my-game a .arrow{ position: absolute; z-index: 2; top: 2px; right: 0; width: 46px; height: 27px; background-position: 0 0;
            transition: right 0.5s;
        }
        .to-my-game a .arrow2{ background-position: 0 -40px;}
        
        .game-rule-tit{ margin: 0 auto; width: 502px; height: 62px; line-height: 62px; cursor: pointer; background: url(images/demo_17/rule_btn.png) no-repeat;
        }
        
        .game-rule-wrap{}
        .game-points-wrap{ margin: 0 auto; padding: 10px 0; width: 1000px;}
        .game-points-wrap span{ float: left; display: inline-block; width: 20%; height: 70px; line-height: 30px; color: #fff; font-family:Myriad Pro,Arial; font-size: 18px; *display: inline;*zoom:1; text-align: center;}
        .game-points-wrap span.get-points{ color: #fcf676;}
        .game-points-wrap strong{ display: block; height: 40px; line-height: 40px; font-size: 36px; font-weight: bold;}
        .progress-bar-wrap{ padding: 45px 0 0; width: 1200px; height: 10px;}
        .progress-bar-bg{ position: relative; z-index: 1; width: 1200px; height: 10px; background:url(images/demo_17/bar_bg.png) no-repeat;}
        .progress-bar{ position: absolute; top: -49px; left: 0; margin-left: -25px;}

        .prize-list-wrap{ margin: 0 auto 70px; padding: 0; width: 1000px;}
        .prize-list-wrap li{float: left; display: inline-block; width: 20%; *display: inline;*zoom:1; text-align: center;}
        .prize-list-wrap li .prize-img{ margin: 0 auto 20px; padding: 100px 0 30px; width: 176px; height: 120px; background: url(images/demo_17/grey_bg.png) bottom center no-repeat; text-align: center;}
        .prize-list-wrap li .prize-img.show-green-bg{ background: url(images/demo_17/green_bg.png) bottom center no-repeat;}
        .prize-list-wrap li .prize-img img{ width: 120px; height: 120px;}
        .prize-list-wrap li .get-prize-btn{}
        .prize-list-wrap li .get-prize-btn.is-show{ display: inline-block;*display: inline;*zoom:1;}
        .prize-list-wrap li .get-prize-btn a{ display: inline-block; width: 130px; height: 25px; line-height: 25px; color: #fff; font-size: 14px; font-weight: bold; background: #999; *display: inline;*zoom:1;-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
        .prize-list-wrap li .get-prize-btn.is-ok a{ color: #fff; background: url(images/demo_17/btn_isok.png) no-repeat;}
        .prize-list-wrap li .get-prize-btn.is-end a{ color: #fff; background: #999;}

        .winner-wrap{ margin: 0 auto 110px; padding: 120px 100px 93px; width: 1000px; height: 680px; background: url(images/demo_17/winner_bg.png) no-repeat;}
        .fantastic-helpers-wrap{ position: relative; z-index: 1; width: 500px; height: 680px; border:1px solid #ed4938;-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
        .fantastic-helpers-wrap .fh-tit{ position: absolute; z-index: 2; top: -70px; left: 50px; width: 410px; height: 109px; background: url(images/demo_17/fh_tit.png) top center no-repeat;
        -webkit-text-shadow:0px 0px 20px rgba(157,44,243,1); -moz-text-shadow:0px 0px 20px rgba(157,44,243,1); text-shadow:0px 0px 20px rgba(157,44,243,1);
        }
        .fh-content{ padding: 40px 60px; width: 380px; height: 600px;}
        .user-img{ margin: 0 auto; width: 125px; height: 125px; overflow: hidden;}

        .winner-list-wrap{ position: relative; z-index: 1; padding-top: 60px; width: 450px; height: 620px; background: url(images/demo_17/winner_list_bg.png) bottom center no-repeat;}
        .winner-list-wrap .wl-tit{ position: absolute; z-index: 2; top: -40px; left: 115px; width: 249px; height: 79px; background: url(images/demo_17/wl_tit.png) center center no-repeat;}

        .game-points{ margin-bottom: 20px; height: 50px; line-height: 50px; color: #ebeba4; font-size: 18px; text-align: center;}
        .game-points strong{ color: #fff; font-size: 30px; font-weight: bold;}
        .fh-content .infoBoxIni{ width: 380px; height: 400px; overflow: hidden;}
        .add-points-list{height: 100%; overflow: hidden;}
        .add-points-list li{ position: relative; z-index: 1; padding-bottom: 10px; padding-left: 80px; width: 300px; height: 70px; vertical-align: middle;}
        .add-points-list li .add-img{ position: absolute; z-index: 2; top: 0; left: 0; width: 70px; height: 70px;-webkit-border-radius: 70px; -moz-border-radius: 70px; border-radius: 70px; overflow: hidden;}
        .add-points-list li .add-detail{ display: inline-block; width: 300px; height: 70px; line-height: 70px; color: #ebeba4; font-size: 14px; vertical-align: middle; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; *display: inline;*zoom: 1;}
        .winner-list-wrap .infoBoxIni{ height: 600px; overflow:hidden;}
        .winner-list{ height: 100%; overflow: hidden;}
        .winner-list li{ position: relative; z-index: 1; padding-bottom: 20px; height: 30px; line-height: 30px; color: #018c48; font-size: 14px; text-align: center; overflow: hidden; text-overflow:ellipsis; white-space:nowrap;}

        .for-bf-wrap{ position: relative; z-index: 1; margin: 0 auto 110px; padding: 20px 0 25px; width: 1200px; background: #d7301f;}
        .for-bf-wrap:before{ content: url(images/demo_17/sec_top.png); position: absolute; z-index: 2; top: 0; left: 0;}
        .for-bf-wrap:after{ content: url(images/demo_17/sec_foot.png); position: absolute; z-index: 2; bottom: 0; left: 0;}
        .for-bf-box{ padding: 80px 100px 60px; width: 1000px; background: url(images/demo_17/sec_main.png) repeat-y;}

        .tit-for-bf{ position: absolute; z-index: 2; top: -49px; left: 336px; width: 528px; height: 98px; background: url(images/demo_17/best_gift_tit.png) top center no-repeat;}
        .bf-list{ width: 1012px;}
        .bf-list li{ float: left; margin-right: 12px; margin-bottom: 16px; padding: 10px 11px 10px 10px; width: 220px; height: 340px; background: #fff;}
        .bf-list li .pro-img{ margin: 0 auto 5px; width: 220px; height: 220px;}
        .bf-list li .pro-img img{ width: 220px; height: 220px;}
        .bf-list li .pro-title{ margin-bottom: 5px; padding: 0 15px; height: 40px; font-size: 12px; text-align: center;}
        .bf-list li .pro-title a{ display: block; width: 100%; height: 40px; line-height: 20px; color: #333; overflow: hidden;}
        .bf-list li .pro-title a:hover{ text-decoration: underline;}
        .bf-list li .pro-price{ margin-bottom: 5px;padding: 0 15px;  height: 30px; line-height: 30px; color: #cc0000; font-size: 24px; text-align: center;}
        .bf-list li .pro-price .market-price{ margin-right: 5px; color: #7a7a7a; font-size: 12px;}
        .bf-list li .pro-price .market-price .my_shop_price{ text-decoration: line-through;}
        .bf-list li .buy-now-btn{ margin: 0 auto; display: block; width: 190px; height: 32px; line-height: 32px; color: #fff; font-size: 18px; font-weight: bold; text-align: center; text-transform: uppercase; background: url(images/demo_17/buy_btn_bg.png) no-repeat;}

        .brands-display-wrap{ position: relative; z-index: 1; margin: 0 auto 110px; padding: 100px 100px 25px; width: 1000px; height: 250px; background: url(images/demo_17/new_year_brand_bg.png) top center no-repeat;}
        .tit-brandsdisplay{ position: absolute; z-index: 2; top: -49px; left: 336px; width: 528px; height: 98px; background: url(images/demo_17/new_year_brand.png) top center no-repeat;}
        .brands-list{ width: 1025px;}
        .brands-list li{ float: left; margin: 0 25px 22px 0; padding: 5px; width: 170px; height: 70px; background: url(images/demo_17/brand_bg.png) top center no-repeat;}
        .brands-list li a{ display: block; width: 170px; height: 70px; background: #fff; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;}
        .brands-list li a.view-more{ background: #018c48;}
        .brands-list li:hover{ background: url(images/demo_17/brand_hover_bg.png) top center no-repeat;}

        .tit-morefuns{ position: absolute; z-index: 2; top: -49px; left: 336px; width: 528px; height: 98px; background: url(images/demo_17/morefuns_tit.png) top center no-repeat;}
        .morefuns-list{ margin-bottom: 20px; width: 1014px;}
        .morefuns-list li{ position: relative; float: left; margin: 0 0 18px 0; width: 338px; height: 238px; transition: .28s;}
        .morefuns-list li:hover{
            -webkit-transform: translate(0, -5px);
            transform: translate(0, -5px);
        }
        .get-it-free-banner{ width: 1000px; height: 310px;}
        .get-it-free-banner a{ display: block; margin-left: -14px; width: 1028px; height: 310px;}
        .get-it-free-banner img{ width: 1028px; height: 310px;}

        .right-nav-wrap{ display: none; position: fixed; z-index: 9999; top: 100px; right: 20px; padding-top: 191px; width: 166px; height: 277px; background: url(images/demo_17/right_nav_bg.png) bottom center no-repeat;}
        .right-nav-wrap .goto-top{ position: absolute; z-index: 2; bottom: 36px; left: 50%; margin-left: -32px; width: 63px; height: 64px; background:url(images/demo_17/goto_top.png) top center no-repeat;}
        .right-nav-wrap ul{ position: relative; z-index: 3;}
        .right-nav-wrap ul li{ width: 166px; height: 38px; line-height: 38px;text-align: center;}
        .right-nav-wrap ul li:hover{}
        .right-nav-wrap ul li a{ display: block; width: 100%; height: 100%; color: #fff; font-size: 16px;}
        .right-nav-wrap ul li a:hover{color: #fffba0;}


        /*弹窗*/
        .share-icon{ margin: 0 12px; display: inline-block; width: 41px; height: 40px; background:url(images/demo_17/share_icon.png) no-repeat; vertical-align: middle; *display: inline;*zoom: 1;}
        .share-fb{ background-position: 0 0;}
        .share-tw{ background-position: -60px 0;}
        .share-vk{ background-position: -120px 0;}
        .share-google{ background-position: -180px 0;}
        .share-reddit{ background-position: -240px 0;}
        .show-tanchuang-box{margin:0 auto; position:relative; z-index: 9999; background:url(images/demo_17/winner_bg.jpg) repeat; width:500px; height:350px; border:2px solid #9165b4;-webkit-box-shadow:0 0 20px rgba(133,70,187,1); -moz-box-shadow:0 0 20px rgba(133,70,187,1); box-shadow:0 0 20px rgba(133,70,187,1); -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
        .show-tanchuang-box .close-btn{ position:absolute; display:block; top:-30px; right:-30px; background:url(images/demo_17/close_btn.png) no-repeat scroll top center; width:56px; height:56px;}

        .show-tanchuang-box .tanc-main{ position: relative; z-index: 1; padding:40px 40px 0 40px; text-align:center;}
        .show-tanchuang-box .tanc-main p{ line-height:30px; color:#f4d28e; font-size:18px;}
        .show-tanchuang-box .tanc-main p a{ color: #f4d28e; text-decoration: underline;}
        .show-tanchuang-box .tanc-main p strong{ font-weight: bold;}
        .show-tanchuang-box .tanc-main p span{ display: block;}
        .show-tanchuang-box .tanc-main p .coupon{ display: block; height: 60px; line-height: 60px; font-size: 30px;}
        .show-tanchuang-box .tanc-main .tips{ padding-top: 30px; height: 30px; line-height: 30px; color: #fb3b00; font-size: 24px; text-transform: uppercase;
            -webkit-text-shadow:0px 0px 20px rgba(255,0,0,1); -moz-text-shadow:0px 0px 20px rgba(255,0,0,1); text-shadow:0px 0px 20px rgba(255,0,0,1);
        }
        .show-tanchuang-box .tanc-main .congratulation-tit{ position: absolute; z-index: 2; top: -30px; left: 59px; width: 382px; height: 54px; line-height: 54px; color: #b041ff; font-size: 24px; font-weight: normal; border:2px solid #9165b4;
            -webkit-box-shadow:0 0 20px rgba(133,70,187,1); -moz-box-shadow:0 0 20px rgba(133,70,187,1); box-shadow:0 0 20px rgba(133,70,187,1); 
            -webkit-border-radius: 30px; -moz-border-radius: 30px; border-radius: 30px;
            -webkit-text-shadow:0px 0px 20px rgba(157,44,243,1); -moz-text-shadow:0px 0px 20px rgba(157,44,243,1); text-shadow:0px 0px 20px rgba(157,44,243,1);
             background: #140025;}
        

    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>
    
    <div class="popular-king-wrap">
        <div class="banner-wrap">
            <div class="w1200">
                <div class="btn-status">
                    <a href="javascript:;" class="btn-stauts-normal btn-status-1" id="js-addGamePoints"></a>
                </div>

                <p class="to-my-game"><a href="#">START MY GAME <span class="arrow js-changeArrow" data-arrow="0"></span></a></p>

            </div>
        </div><!-- .banner-wrap -->

        <div class="ptb40"> 
            <p class="game-rule-tit js-showRuleCont"></p>
        </div>

        <section class="game-rule-wrap w1200 js-floorTarget" id="js-gameProgressBar" data-getpoints="125">
            <div class="game-points-wrap clearfix js-progressBarStep">
                <span><strong>100</strong> Game Points</span>
                <span><strong>250</strong> Game Points</span>
                <span><strong>350</strong> Game Points</span>
                <span><strong>600</strong> Game Points</span>
                <span><strong>1500</strong> Game Points</span>
            </div><!-- .game-points-wrap -->
            
            <div class="progress-bar-wrap">
                <div class="progress-bar-bg">
                    <div class="progress-bar-bg">
                        <div class="progress-bar" id="js-progressBarWidth" style="left:0%;"><img src="images/demo_17/icon_old.png" width="49" height="49" alt=""></div>
                    </div>
                </div>
            </div><!-- .progress-bar-wrap -->

            <ul class="prize-list-wrap clearfix js-prizeListWrap">
                <li data-needpoints="100">
                    <p class="prize-img"><a href="#"><img src="images/demo_17/prize_1.png" width="120" height="120" alt="Merry Christmas"></a></p>
                    <p class="get-prize-btn"><a href="javascript:;">Get Prize</a></p>
                </li>
                <li data-needpoints="250">
                    <p class="prize-img"><a href="#"><img src="images/demo_17/prize_2.png" width="120" height="120" alt="Merry Christmas"></a></p>
                    <p class="get-prize-btn"><a href="javascript:;">Get Prize</a></p>
                </li>
                <li data-needpoints="350">
                    <p class="prize-img"><a href="#"><img src="images/demo_17/prize_3.png" width="120" height="120" alt="Merry Christmas"></a></p>
                    <p class="get-prize-btn"><a href="javascript:;">Get Prize</a></p>
                </li>
                <li data-needpoints="600">
                    <p class="prize-img"><a href="#"><img src="images/demo_17/prize_4.png" width="120" height="120" alt="Merry Christmas"></a></p>
                    <p class="get-prize-btn"><a href="javascript:;">Get Prize</a></p>
                </li>
                <li data-needpoints="1500">
                    <p class="prize-img"><a href="#"><img src="images/demo_17/prize_5.png" width="120" height="120" alt="Merry Christmas"></a></p>
                    <p class="get-prize-btn"><a href="javascript:;">Get Prize</a></p>
                </li>
            </ul><!-- .prize-list-wrap -->
            
            <div class="winner-wrap clearfix">
                <div class="fantastic-helpers-wrap fl">
                    <h4 class="fh-tit"></h4>

                    <div class="fh-content">
                        <h5 class="user-img"><img src="images/demo_17/userimg.png" width="125" alt="Merry Christmas"></h5>
                        <p class="game-points"><span>Friend's</span> game points: <strong>800</strong></p>
                        
                        <div id="js_infoBox" class="infoBoxIni">
                            <ul class="add-points-list">
                                <li>
                                    <span class="add-img"><img src="images/demo_17/f_img.png" width="70" height="70" alt="Merry Christmas"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="images/demo_17/f_img.png" width="70" height="70" alt="Merry Christmas"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="images/demo_17/f_img.png" width="70" height="70" alt="Merry Christmas"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="images/demo_17/f_img.png" width="70" height="70" alt="Merry Christmas"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="images/demo_17/f_img.png" width="70" height="70" alt="Merry Christmas"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="images/demo_17/f_img.png" width="70" height="70" alt="Merry Christmas"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="images/demo_17/f_img.png" width="70" height="70" alt="Merry Christmas"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .fantastic-helpers-wrap -->
                
                <div class="winner-list-wrap fr">
                    <h4 class="wl-tit"></h4>
                    
                    <div id="js_infoBox2" class="infoBoxIni">
                        <ul class="winner-list">
                            <li>
                                rainbow_1**@163.com has WON 30 BOBO Points
                            </li>
                            <li>
                                rainbow_1**@163.com has WON a UMI MAX Phone
                            </li>
                            <li>
                                rainbow_1**@163.com has WON 30 BOBO Points
                            </li>
                            <li>
                                rainbow_1**@163.com has WON a UMI MAX Phone
                            </li>
                            <li>
                                rainbow_1**@163.com has WON 30 BOBO Points
                            </li>
                            <li>
                                rainbow_1**@163.com has WON a UMI MAX Phone
                            </li>
                            <li>
                                rainbow_1**@163.com has WON 30 BOBO Points
                            </li>
                            <li>
                                rainbow_1**@163.com has WON a UMI MAX Phone
                            </li>
                            <li>
                                rainbow_1**@163.com has WON 30 BOBO Points
                            </li>
                            <li>
                                rainbow_1**@163.com has WON a UMI MAX Phone
                            </li>
                            <li>
                                rainbow_1**@163.com has WON 30 BOBO Points
                            </li>
                            <li>
                                rainbow_1**@163.com has WON a UMI MAX Phone
                            </li>
                            <li>
                                rainbow_1**@163.com has WON 30 BOBO Points
                            </li>
                            <li>
                                rainbow_1**@163.com has WON a UMI MAX Phone
                            </li>
                            <li>
                                rainbow_1**@163.com has WON 30 BOBO Points
                            </li>
                            <li>
                                rainbow_1**@163.com has WON a UMI MAX Phone
                            </li>
                            <li>
                                rainbow_1**@163.com has WON 30 BOBO Points
                            </li>
                            <li>
                                rainbow_1**@163.com has WON a UMI MAX Phone
                            </li>
                            <li>
                                rainbow_1**@163.com has WON 30 BOBO Points
                            </li>
                            <li>
                                rainbow_1**@163.com has WON a UMI MAX Phone
                            </li>
                        </ul>
                    </div>
                </div><!-- .winner-list-wrap -->
            </div><!-- .winner-wrap -->
        </section><!-- .game-rule-wrap -->

        <section class="for-bf-wrap js-floorTarget">
            <h4 class="tit-for-bf"></h4>

            <div class="for-bf-box">
                <ul class="bf-list clearfix">
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                    <li>
                        <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="220" height="220" alt="Merry Christmas"></a></p>
                        <p class="pro-title"><a href="#">Ulefone Tiger 4G Phablet Ulefone Tiger 4G Phablet</a></p>
                        <p class="pro-price">
                            <span class="shop-price">
                                <b class="bizhong">$</b>
                                <b class="my_shop_price" orgp="99.99">99.99</b>
                            </span>
                        </p>
                        <a href="#" class="buy-now-btn">buy now</a>
                    </li>
                </ul>
            </div>
        </section><!-- .for-bf-wrap -->

        <section class="brands-display-wrap js-floorTarget">
            <h4 class="tit-brandsdisplay"></h4>
            <ul class="brands-list clearfix">
                <li><a href="#" target="_blank"><img src="images/demo_17/brand_zanstyle.png" alt="Merry Christmas"></a></li>
                <li><a href="#" target="_blank"><img src="images/demo_17/brand_dtno1.png" alt="Merry Christmas"></a></li>
                <li><a href="#" target="_blank"><img src="images/demo_17/brand_xiaomi.png" alt="Merry Christmas"></a></li>
                <li><a href="#" target="_blank"><img src="images/demo_17/brand_ilife.png" alt="Merry Christmas"></a></li>
                <li><a href="#" target="_blank"><img src="images/demo_17/brand_vernee.png" alt="Merry Christmas"></a></li>
                <li><a href="#" target="_blank"><img src="images/demo_17/brand_teclast.png" alt="Merry Christmas"></a></li>
                <li><a href="#" target="_blank"><img src="images/demo_17/brand_hubsan.png" alt="Merry Christmas"></a></li>
                <li><a href="#" target="_blank"><img src="images/demo_17/brand_beelink.png" alt="Merry Christmas"></a></li>
                <li><a href="#" target="_blank"><img src="images/demo_17/brand_sjcam.png" alt="Merry Christmas"></a></li>
                <li><a href="#" target="_blank" class="view-more"><img src="images/demo_17/brand_viewmore.png" alt="Merry Christmas"></a></li>
            </ul>
        </section><!-- .brands-display-wrap -->

        <section class="for-bf-wrap js-floorTarget">
            <h4 class="tit-morefuns"></h4>

            <div class="for-bf-box"> 
                <ul class="morefuns-list clearfix">
                    <li><a href="#" target="special"><img src="images/demo_17/fun_1.png" alt="Merry Christmas"></a></li>
                    <li><a href="#" target="special"><img src="images/demo_17/fun_2.png" alt="Merry Christmas"></a></li>
                    <li><a href="#" target="special"><img src="images/demo_17/fun_3.png" alt="Merry Christmas"></a></li>
                </ul>
                <p class="get-it-free-banner">
                    <a href="#" target="_blank"><img src="images/demo_17/share_banner.png" alt="Merry Christmas"></a>
                </p>
            </div>
        </section>

        <div class="right-nav-wrap" id="js-rightNav">
            <ul>
                <li><a href="javascript:;">Winner list</a></li>
                <li><a href="javascript:;">Brand display</a></li>
                <li><a href="javascript:;">Hot sale</a></li>
                <li><a href="javascript:;">More funs</a></li>
            </ul>
            <a href="javascript:;" class="goto-top js-goTop"></a>
        </div><!-- .right-nav-wrap -->

    </div><!-- .popular-king-wrap -->

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->

<script type="text/javascript">
    !function(a){a.fn.kxbdSuperMarquee=function(b){var c=a.extend({},a.fn.kxbdSuperMarquee.defaults,b);return this.each(function(){function D(){var a="left"==c.direction||"right"==c.direction?"scrollLeft":"scrollTop";if(c.isMarquee){if(c.loop>0&&(A+=c.scrollAmount,A>i*c.loop))return d[a]=0,clearInterval(n);var b=d[a]+("left"==c.direction||"up"==c.direction?1:-1)*c.scrollAmount}else if(c.duration){if(!(o++<r))return b=s,clearInterval(k),m=!1,void 0;m=!0;var b=Math.ceil(H(o,p,q,r));o==r&&(b=s)}else{var b=s;clearInterval(k)}"left"==c.direction||"up"==c.direction?b>=i&&(b-=i):0>=b&&(b+=i),d[a]=b,c.isMarquee?n=setTimeout(D,c.scrollDelay):r>o?(k&&clearTimeout(k),k=setTimeout(D,c.scrollDelay)):m=!1}function E(a){m=!0;var b="left"==c.direction||"right"==c.direction?"scrollLeft":"scrollTop",e="left"==c.direction||"up"==c.direction?1:-1;z+=e,void 0==a&&c.navId&&(w.eq(y).removeClass("navOn"),y+=e,y>=u?y=0:0>y&&(y=u-1),w.eq(y).addClass("navOn"),z=y);var f=0>z?i:0;o=0,p=d[b],s=void 0!=a?a:f+c.distance*z%i,q=1==e?s>p?s-p:s+i-p:s>p?s-i-p:s-p,r=c.duration,k&&clearTimeout(k),k=setTimeout(D,c.scrollDelay)}function F(){l=setInterval(function(){E()},1e3*c.time)}function G(){clearInterval(l)}function H(a,b,c,d){return-c*(a/=d)*(a-2)+b}var k,l,m,n,o,p,q,r,s,t,u,v,w,b=a(this),d=b.get(0),e=b.width(),f=b.height(),g=b.children(),h=g.children(),i=0,j="left"==c.direction||"right"==c.direction?1:0,x=[],y=0,z=0,A=0;g.css(j?"width":"height",1e4);var B="<ul>";if(c.isEqual){t=h[j?"outerWidth":"outerHeight"](),u=h.length,i=t*u;for(var C=0;u>C;C++)x.push(C*t),B+="<li>"+(C+1)+"</li>"}else h.each(function(b){x.push(i),i+=a(this)[j?"outerWidth":"outerHeight"](),B+="<li>"+(b+1)+"</li>"});B+="</ul>",(j?e:f)>i||(g.append(h.clone()).css(j?"width":"height",2*i),c.navId&&(v=a(c.navId).append(B).hover(G,F),w=a("li",v),w.each(function(b){a(this).bind(c.eventNav,function(){m||y!=b&&(E(x[b]),w.eq(y).removeClass("navOn"),y=b,a(this).addClass("navOn"))})}),w.eq(y).addClass("navOn")),d[j?"scrollLeft":"scrollTop"]="right"==c.direction||"down"==c.direction?i:0,c.isMarquee?(n=setTimeout(D,c.scrollDelay),b.hover(function(){clearInterval(n)},function(){clearInterval(n),n=setTimeout(D,c.scrollDelay)}),c.controlBtn&&a.each(c.controlBtn,function(b,d){a(d).bind(c.eventA,function(){c.direction=b,c.oldAmount=c.scrollAmount,c.scrollAmount=c.newAmount}).bind(c.eventB,function(){c.scrollAmount=c.oldAmount})})):(c.isAuto&&(F(),b.hover(G,F)),c.btnGo&&a.each(c.btnGo,function(b,d){a(d).bind(c.eventGo,function(){1!=m&&(c.direction=b,E(),c.isAuto&&(G(),F()))})})))})},a.fn.kxbdSuperMarquee.defaults={isMarquee:!1,isEqual:!0,loop:0,newAmount:3,eventA:"mousedown",eventB:"mouseup",isAuto:!0,time:5,duration:50,eventGo:"click",direction:"left",scrollAmount:1,scrollDelay:10,eventNav:"click"},a.fn.kxbdSuperMarquee.setDefaults=function(b){a.extend(a.fn.kxbdSuperMarquee.defaults,b)}}(jQuery);
</script>

<script>
$LAB.script("")
    .wait(function(){
        //TC
        function tanchuangBox(num){
            this.num = num;
            this._init(); 
        }
        tanchuangBox.prototype = {
            _init: function(){
                var that = this;
                var tanchuang = layer.open({
                    type : 1,
                    closeBtn: false,
                    title : false,
                    area: ['600px', '450px'],
                    content: that.tanchuangHtml()
                });

                $("html,body").on("click",".js_closeTancBtn",function(){
                    layer.close(tanchuang);
                });
            },
            tanchuangHtml: function(){
                var that = this;
                var _html = '';
                _html += '<div class="show-tanchuang-box"><a href="javascript:void(0);" class="close-btn js_closeTancBtn"></a>';
                _html += '<div class="tanc-main">';

                switch(that.num){
                    //for friend
                    case 1:
                        _html += '<p style="padding-top: 60px;"><span>You\'ve added '+ 'XX' +' game points</span><span>for your friends and you\'ve got '+ 'XX' +' game points</span><span>for yourself.  Share your own GAME LINK</span><span>to win FREE GIFT. </span></p>';
                        break;
                    //login first  
                    case 2:
                        _html += '<p style="padding-top: 110px;">Please <a href="http://www.yuanbo88.com/sign.html?ref=/demo/14.html">log in</a> first.</p>';
                        break;
                    //had got
                    case 3:
                        _html += '<p style="padding-top: 110px;">You had got one prize.</p>';
                        break;
                    case 4:
                        _html += '<p style="margin-bottom:50px;padding-top: 20px;"><span>You\'ve got '+ 'XX' +' points,</span><span>share your <strong>GAME LINK</strong> to  get more</span>Game Points and to win the <strong>BIG PRIZE</strong>!</p>';
                        _html += '<p style="margin-bottom: 20px;">Share to win FREE GIFT:</p>';
                        _html += '<div class="share-box"><a href="javascript:;" class="share-icon share-fb"></a><a href="javascript:;" class="share-icon share-tw"></a><a href="javascript:;" class="share-icon share-vk"></a><a href="javascript:;" class="share-icon share-google"></a><a href="javascript:;" class="share-icon share-reddit"></a></div>';
                        break;
                    case 5:
                        _html += '<p class="congratulation-tit">CONGRATULATIONS!</p><p style="padding-top: 60px;"><span>You\'ve <strong>WON 30 BOBO</strong> points, </span><span>you can check your BOBO points here: </span><a href="https://user.gearbest.com/my-points.html">https://user.gearbest.com/my-points.html</a>.</p>';
                        break;
                    case 6:
                        _html += '<p class="congratulation-tit">CONGRATULATIONS!</p><p style="padding-top: 60px;"><span>You\'ve WON a <strong>Key Chain</strong>.</span><span><strong>The Coupon Code is:</strong> </span><span class="coupon">TESTCSD</span></p>';
                        break;
                    case 7:
                        _html += '<p class="congratulation-tit">CONGRATULATIONS!</p><p style="padding-top: 60px;"><span>You\'ve WON a cool <strong>Xiaomi Band 2</strong>.</span><span>Get it by using this Coupon Code:</span><span class="coupon">TESTCSD</span></p>';
                        break;
                    case 8:
                        _html += '<p class="congratulation-tit">CONGRATULATIONS!</p><p style="padding-top: 60px;"><span>You\'ve WON the epic <strong>UMI MAX phone</strong>.</span><span>Get it by using this Coupon Code:</span><span class="coupon">TESTCSD</span></p><p class="tips">You are the KING of this game!</p>';
                        break;
                    default:
                        alert("error");
                        break;
                }

                _html += '</div></div>';

                return _html;
            }
        };

       $(function(){
         
         (function(){
           var $changeArrow = $('.js-changeArrow');
           setInterval(function(){
               parseInt($changeArrow.attr('data-arrow')) > 0 ? $changeArrow.addClass('arrow2') && $changeArrow.attr('data-arrow',0) : $changeArrow.removeClass('arrow2') && $changeArrow.attr('data-arrow',1);
           }, 300);
         })();

         //显示进度条函数
         function showProgressBar(){
           var getPointsNum = parseInt($('#js-gameProgressBar').attr('data-getpoints')),
               progressBarStepArr = $('.js-progressBarStep').find('span'),
               prizeListWrapArr = $('.js-prizeListWrap').find('.get-prize-btn'),
               prizeNeedPointsArr = $('.js-prizeListWrap').find('li'),
               maxStep = 0,
               progressBar = 0,
               prevNeedPoints = 0,
               nextNeedPoints = 0;

           $.each(prizeNeedPointsArr, function(index, val) {
                var currentNeedPoints = parseInt($(val).attr('data-needpoints'));
                if(getPointsNum >= currentNeedPoints){
                    maxStep = index+1;
                }
           });
           prevNeedPoints = (maxStep>0) ? parseInt(prizeNeedPointsArr.eq(maxStep-1).attr('data-needpoints')) : 0;
           nextNeedPoints = ( maxStep < prizeNeedPointsArr.length) ? parseInt(prizeNeedPointsArr.eq(maxStep).attr('data-needpoints')) : null;

           progressBar = nextNeedPoints ? ( maxStep*100/6 + (getPointsNum -prevNeedPoints) / (nextNeedPoints - prevNeedPoints) * 100/6 + '%' ) : '100%';
           // alert(maxStep+1 < prizeNeedPointsArr.length);
           // alert(getPointsNum);
           // alert(prevNeedPoints);
           // alert(nextNeedPoints);
           // alert(progressBar);
           // alert(maxStep);
           $('#js-progressBarWidth').css('left', progressBar);

           $.each(progressBarStepArr, function(index, val) {
               var that = $(val);
               if( (index) < maxStep){
                   that.addClass('get-points');
               }
           });
           $.each(prizeListWrapArr, function(index, val) {
               var that = $(val);
               if((index) < maxStep){
                   that.addClass('is-ok').parents('li').attr('data-end',1).find('.prize-img').addClass('show-green-bg');
               }
           });
         }
         //初始化调用
         showProgressBar();

         //为朋友加分
         $('#js-addGamePoints').click(function(){
            var addStep = parseInt(Math.random()*10) + 12;
            var oldGetPoints = parseInt($('#js-gameProgressBar').attr('data-getpoints'));
            var newGetPoints = oldGetPoints + addStep;


            $('#js-gameProgressBar').attr('data-getpoints', newGetPoints);
            showProgressBar();
            // GLOBAL.PopObj.alert({content: '你已经成功为朋友加了 '+ addStep +' 分'});
         });

         $('#js_infoBox').kxbdSuperMarquee({
             distance:80,
             time:3,
             direction:'up'
         });

         $('#js_infoBox2').kxbdSuperMarquee({
             distance:50,
             time:4,
             direction:'up'
         });


         //window scroll show OR hide fixedNav
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

         //Floor click
         $('#js-rightNav').on('click','li',function(){
           var $this = $(this);
           var index = $('#js-rightNav').find('li').index($this);
           var scrollH = $('.js-floorTarget').eq(index).offset().top-100;
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