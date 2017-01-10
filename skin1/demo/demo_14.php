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
        .popular-king-wrap{ position: relative; z-index: 1; padding-bottom: 100px; width: 100%; min-width: 1200px; font-family:Arial; background: #140025;}
        .w1200{ margin: 0 auto; width: 1200px;}
        .king-icon{ display: inline-block; background: url(images/demo_14/king_icon.png) no-repeat; *display: inline;*zoom:1;}
        .banner-wrap{ width: 100%; height: 740px; background: url(images/demo_14/banner_bg.jpg) top center no-repeat;}
        .btn-status{ margin: 0 auto 20px; padding-top: 440px; text-align: center;}
        .btn-status .btn-stauts-normal{ display: inline-block; width: 250px; background: url(images/demo_14/btn_bg.png) no-repeat; *display: inline;*zoom:1;}
        /*  .btn-status-1:figth for friends; 
            .btn-status-2:share; 
            .btn-status-3:start game; 
            .btn-status-4:fight for friends(grey); 
            .btn-status-5:game over; 
        */
        .btn-status .btn-status-1,.btn-status .btn-status-2,.btn-status .btn-status-3{ margin-top: -19px; height: 69px;}
        .btn-status .btn-status-4,.btn-status .btn-status-5{ height: 50px;}
        .btn-status .btn-status-1{ background-position: -300px 0;}
        .btn-status .btn-status-2{ background-position: -300px -80px;}
        .btn-status .btn-status-3{ background-position: -300px -160px;}
        .btn-status .btn-status-4{ background-position: 0 0;}
        .btn-status .btn-status-5{ background-position: 0 -80px;}

        .to-my-game{ margin-bottom: 100px; height: 30px; line-height: 30px; text-align: center;}
        .to-my-game a{ position: relative; z-index: 1; display: inline-block; padding-right: 46px; height: 30px; line-height: 30px; color: #f4d28e; font-size: 18px; font-weight: bold; text-align: center;*display: inline;*zoom:1; vertical-align: middle;}
        .to-my-game a:hover .arrow{ right: -5px;}
        .to-my-game a .arrow{ position: absolute; z-index: 2; top: 2px; right: 0; width: 46px; height: 27px; background-position: 0 0;
            transition: right 0.5s;
        }
        .to-my-game a .arrow2{ background-position: 0 -40px;}
        
        .game-rule-tit{ margin: 0 auto; width: 230px; height: 40px; line-height: 40px; color: #9c5ad3; font-size: 24px; font-weight: bold; border:4px solid #8a63ab; text-align: center; text-transform: uppercase; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px;
            -webkit-text-shadow:0px 0px 20px rgba(157,44,243,1); -moz-text-shadow:0px 0px 20px rgba(157,44,243,1); text-shadow:0px 0px 20px rgba(157,44,243,1);
        }
        
        .game-rule-wrap{}
        .game-points-wrap{ margin: 0 auto; padding: 10px 0; width: 1000px;}
        .game-points-wrap span{ float: left; display: inline-block; width: 20%; height: 30px; *display: inline;*zoom:1; text-align: center;}
        .game-points-wrap em{ margin: 0 auto; display: inline-block; width: 134px; height: 30px; line-height: 30px; color: #856240; font-size: 16px; font-weight: bold; font-style: normal; background: #e8e8a2; box-shadow:0px 0px 30px rgba(93,29,147,1); vertical-align: middle; *display: inline;*zoom:1; -webkit-border-radius: 25px; -moz-border-radius: 25px; border-radius: 25px; text-align: center;}
        .progress-bar-wrap{ padding: 23px 0; width: 1200px; height: 14px;}
        .progress-bar-bg{ position: relative; z-index: 1; width: 1192px; height: 6px; background: #13000f; border: 4px solid #8a63ab;-webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;}
        .progress-bar{ height: 6px; background: #bbaa78;-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
        .progress-bar-step{ position: absolute; z-index: 2; top: -7px; left: 0; width: 1200px; height: 20px;}
        .progress-bar-step li{ float: left; width: 200px; text-align: right;}
        .progress-bar-step li span{ margin-right: -10px; display: inline-block; width: 20px; height: 20px; background-position: -50px 0; *display: inline;*zoom:1;}
        .progress-bar-step li.get-points span{ margin-right: -22px; position: relative; top: -12px; display: inline-block; width: 44px; height: 44px; background-position: -90px 0; *display: inline;*zoom:1;}

        .prize-list-wrap{ margin: 0 auto 70px; padding: 10px 0; width: 1000px;}
        .prize-list-wrap li{float: left; display: inline-block; width: 20%; *display: inline;*zoom:1; text-align: center;}
        .prize-list-wrap li .prize-img{}
        .prize-list-wrap li .get-prize-btn{}
        .prize-list-wrap li .get-prize-btn a{ display: inline-block; width: 84px; height: 25px; line-height: 25px; color: #fff; font-size: 14px; font-weight: bold; background: #999; *display: inline;*zoom:1;-webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px;}
        .prize-list-wrap li .get-prize-btn.is-ok a{ color: #856240; background: url(images/demo_14/king_icon.png) no-repeat; background-position: -50px -44px;}

        .winner-wrap{ margin: 0 auto 110px; padding: 80px 50px 50px; width: 1000px; height: 680px; border:2px solid #9466b6; -webkit-box-shadow:0 0 20px rgba(148,102,182,1); -moz-box-shadow:0 0 20px rgba(148,102,182,1); box-shadow:0 0 20px rgba(148,102,182,1); background: url(images/demo_14/winner_bg.jpg) repeat; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
        .fantastic-helpers-wrap{ position: relative; z-index: 1; width: 500px; height: 680px; border:1px solid #9a68be;-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
        .fantastic-helpers-wrap .fh-tit{ position: absolute; z-index: 2; top: -20px; left: 90px; padding: 0 30px; width: 260px; height: 40px; line-height: 40px; color: #9c5ad3; font-size: 24px; text-align: center; background: url(images/demo_14/winner_bg.jpg) repeat;
        -webkit-text-shadow:0px 0px 20px rgba(157,44,243,1); -moz-text-shadow:0px 0px 20px rgba(157,44,243,1); text-shadow:0px 0px 20px rgba(157,44,243,1);
        }
        .fh-content{ padding: 40px 60px; width: 380px; height: 600px;}
        .user-img{ margin: 0 auto; width: 110px; height: 110px; border: 2px solid #8a63ab;-webkit-border-radius: 57px; -moz-border-radius: 57px; border-radius: 57px; overflow: hidden;
            -webkit-box-shadow:0 0 20px rgba(148,102,182,1); -moz-box-shadow:0 0 20px rgba(148,102,182,1); box-shadow:0 0 20px rgba(148,102,182,1);
        }

        .winner-list-wrap{ position: relative; z-index: 1; padding-top: 60px; width: 450px; height: 620px; border: 1px solid #734699; background: url(images/demo_14/winner_bg2.jpg) repeat;-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
        .winner-list-wrap .wl-tit{ position: absolute; z-index: 2; top: -27px; left: 112px; width: 222px; height: 54px; line-height: 54px; color: #9c5ad3; font-size: 24px; text-align: center; border: 2px solid #8a63ab; background: url(images/demo_14/winner_bg.jpg) repeat;
        -webkit-border-radius: 54px; -moz-border-radius: 54px; border-radius: 54px;
        -webkit-box-shadow:0 0 20px rgba(148,102,182,1); -moz-box-shadow:0 0 20px rgba(148,102,182,1); box-shadow:0 0 20px rgba(148,102,182,1);
        -webkit-text-shadow:0px 0px 20px rgba(157,44,243,1); -moz-text-shadow:0px 0px 20px rgba(157,44,243,1); text-shadow:0px 0px 20px rgba(157,44,243,1);}

        .game-points{ margin-bottom: 20px; height: 50px; line-height: 50px; color: #ebeba4; font-size: 18px; text-align: center;}
        .game-points strong{ color: #b562fa; font-weight: bold;}
        .fh-content .infoBoxIni{ width: 380px; height: 400px; overflow: hidden;}
        .add-points-list{height: 100%; overflow: hidden;}
        .add-points-list li{ position: relative; z-index: 1; padding-bottom: 16px; padding-left: 80px; width: 300px; height: 64px; vertical-align: middle;}
        .add-points-list li .add-img{ position: absolute; z-index: 2; top: 0; left: 0; width: 64px; height: 64px;-webkit-border-radius: 64px; -moz-border-radius: 64px; border-radius: 64px; overflow: hidden;}
        .add-points-list li .add-detail{ display: inline-block; width: 300px; height: 64px; line-height: 64px; color: #ebeba4; font-size: 14px; vertical-align: middle; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; *display: inline;*zoom: 1;}
        .winner-list-wrap .infoBoxIni{ height: 600px; overflow:hidden;}
        .winner-list{ height: 100%; overflow: hidden;}
        .winner-list li{ position: relative; z-index: 1; padding-bottom: 20px; height: 30px; line-height: 30px; color: #9a68be; font-size: 14px; text-align: center; overflow: hidden; text-overflow:ellipsis; white-space:nowrap;}

        .brands-display-wrap{ position: relative; z-index: 1; margin: 0 auto 110px; padding: 80px 50px 25px; width: 1000px; border:2px solid #6d45ea;-webkit-box-shadow:0 0 50px rgba(24,24,96,1); -moz-box-shadow:0 0 50px rgba(24,24,96,1); box-shadow:0 0 50px rgba(24,24,96,1); -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background: url(images/demo_14/brands_bg.jpg) repeat;}
        .tit-brandsdisplay{ position: absolute; z-index: 2; top: -42px; left: 208px; width: 686px; height: 84px; background: url(images/demo_14/tit_branddisplay.png) top center no-repeat;}
        .brands-list{ width: 1025px;}
        .brands-list li{ float: left; margin: 0 21px 18px 0; width: 180px; height: 80px; border:2px solid #3a23ad; background: url(images/demo_14/brands_bg2.jpg) repeat;}
        .brands-list li:hover{-webkit-box-shadow:0 0 50px rgba(69,71,188,1); -moz-box-shadow:0 0 50px rgba(69,71,188,1); box-shadow:0 0 50px rgba(69,71,188,1);}
        .brands-list li .view-more{ display: block; padding: 20px 15px; width: 150px; height: 40px; line-height: 40px; color: #592de8; font-size: 24px; font-weight: bold; text-align: center;-webkit-text-shadow:0px 0px 20px rgba(45,45,235,1); -moz-text-shadow:0px 0px 20px rgba(45,45,235,1); text-shadow:0px 0px 20px rgba(45,45,235,1);}

        .for-bf-wrap{ position: relative; z-index: 1; margin: 0 auto 110px; padding: 80px 50px 50px; width: 1000px; border:2px solid #9165b4;-webkit-box-shadow:0 0 20px rgba(133,70,187,1); -moz-box-shadow:0 0 20px rgba(133,70,187,1); box-shadow:0 0 20px rgba(133,70,187,1); -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background: url(images/demo_14/bf_bg.png) repeat;}
        .tit-for-bf{ position: absolute; z-index: 2; top: -42px; left: 208px; width: 686px; height: 84px; background: url(images/demo_14/tit_forblackfriday.png) top center no-repeat;}
        .bf-list{ width: 1000px; border-top: 2px solid #956aba; border-left: 2px solid #956aba;}
        .bf-list li{ float: left; padding: 0 19px; width: 160px; height: 334px; border-right:2px solid #956aba; border-bottom:2px solid #956aba; background: url(images/demo_14/bf_bg2.png) repeat;}
        .bf-list li .pro-img{ padding: 18px 0 10px; width: 160px; height: 160px;}
        .bf-list li .pro-title{ margin-bottom: 10px; width: 100%; height: 20px; line-height: 20px; font-size: 12px;}
        .bf-list li .pro-title a{ display: block; width: 100%; color: #faf2c1; overflow: hidden; text-overflow: ellipsis; white-space:nowrap;}
        .bf-list li .pro-price{ margin-bottom: 20px; height: 30px; line-height: 30px; color: #f0d21c; font-size: 24px;}
        .bf-list li .buy-now-btn{ margin: 0 auto; display: block; width: 148px; height: 34px; line-height: 34px; color: #f0eaa8; font-size: 16px; text-align: center; border: 2px solid #9a68be; text-transform: uppercase; background: url(images/demo_14/buy_btn_bg.png) no-repeat; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;-webkit-box-shadow:0 0 10px rgba(133,70,187,1); -moz-box-shadow:0 0 10px rgba(133,70,187,1); box-shadow:0 0 10px rgba(133,70,187,1);}
        .bf-list li:hover{ position: relative; z-index: 2; margin-top: -2px; margin-left: -2px; border: 2px solid #b9a3aa;-webkit-box-shadow:0 0 20px rgba(216,202,207,1); -moz-box-shadow:0 0 20px rgba(216,202,207,1); box-shadow:0 0 20px rgba(216,202,207,1);}

        .more-funs-wrap{ position: relative; z-index: 1; margin: 0 auto 110px; padding: 80px 50px 25px; width: 1000px; border:2px solid #6d45ea;-webkit-box-shadow:0 0 50px rgba(24,24,96,1); -moz-box-shadow:0 0 50px rgba(24,24,96,1); box-shadow:0 0 50px rgba(24,24,96,1); -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background: url(images/demo_14/brands_bg.jpg) repeat;}
        .tit-morefuns{ position: absolute; z-index: 2; top: -42px; left: 208px; width: 686px; height: 84px; background: url(images/demo_14/tit_morefuns.png) top center no-repeat;}
        .morefuns-list{ width: 1035px;}
        .morefuns-list li{ float: left; margin: 0 34px 18px 0; width: 220px; height: 300px; border:2px solid #3a23ad; background: url(images/demo_14/morefuns_bg.png) repeat;}
        .morefuns-list li:hover{-webkit-box-shadow:0 0 50px rgba(69,71,188,1); -moz-box-shadow:0 0 50px rgba(69,71,188,1); box-shadow:0 0 50px rgba(69,71,188,1);}
        
        .right-nav-wrap{ display: none; position: fixed; z-index: 9999; top: 100px; right: 20px; padding: 10px 12px 90px; width: 150px; height: ; border:4px solid #fd6f4e; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background: url(images/demo_14/winner_bg.jpg) repeat; -webkit-box-shadow:0 0 20px rgba(255,0,0,1); -moz-box-shadow:0 0 20px rgba(255,0,0,1); box-shadow:0 0 20px rgba(255,0,0,1);}
        .right-nav-wrap .goto-top{ position: absolute; z-index: 2; bottom: 0; left: 50%; margin-left: -56px; width: 111px; height: 106px; background:url(images/demo_14/goto_top.png) top center no-repeat;}
        .right-nav-wrap ul{ position: relative; z-index: 3;}
        .right-nav-wrap ul li{ margin-top: 14px; width: 146px; height: 38px; line-height: 38px; border:2px solid #6a3d9b; text-align: center; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background: url(images/demo_14/nav_bg.png) repeat;}
        .right-nav-wrap ul li:hover{ border-color: #3a23ad; background: url(images/demo_14/nav_hover_bg.png) repeat;-webkit-box-shadow:0 0 20px rgba(122,83,254,1); -moz-box-shadow:0 0 20px rgba(122,83,254,1); box-shadow:0 0 20px rgba(122,83,254,1);}
        .right-nav-wrap ul li a{ display: block; width: 100%; height: 100%; color: #a579f3; font-size: 16px;}

        .pb-foot{ position: absolute; z-index: -5; bottom: 0; left: 50%; margin-left: -500px; width: 1000px; height:210px; background: url(images/demo_14/pb_foot.jpg) no-repeat;}
        .pb-right{ position: absolute; z-index: -5; right: 0; bottom: 220px; width: 360px; height:1400px; background: url(images/demo_14/pb_right.jpg) no-repeat;}
        .pb-left{ position: absolute; z-index: -5; left: 0; top: 1070px; width: 360px; height:1440px; background: url(images/demo_14/pb_left.jpg) no-repeat;}

        /*弹窗*/
        .share-icon{ margin: 0 12px; display: inline-block; width: 41px; height: 40px; background:url(images/demo_14/share_icon.png) no-repeat; vertical-align: middle; *display: inline;*zoom: 1;}
        .share-fb{ background-position: 0 0;}
        .share-tw{ background-position: -60px 0;}
        .share-vk{ background-position: -120px 0;}
        .share-google{ background-position: -180px 0;}
        .share-reddit{ background-position: -240px 0;}
        .show-tanchuang-box{margin:0 auto; position:relative; z-index: 9999; background:url(images/demo_14/winner_bg.jpg) repeat; width:500px; height:350px; border:2px solid #9165b4;-webkit-box-shadow:0 0 20px rgba(133,70,187,1); -moz-box-shadow:0 0 20px rgba(133,70,187,1); box-shadow:0 0 20px rgba(133,70,187,1); -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
        .show-tanchuang-box .close-btn{ position:absolute; display:block; top:-30px; right:-30px; background:url(images/demo_14/close_btn.png) no-repeat scroll top center; width:56px; height:56px;}

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
        /* .xubox_page_0{ overflow:visible;}
        .layui-layer{ background: none;}
        .layui-layer-content{ padding-top: 30px;} */
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

                <p class="to-my-game"><a href="#">START MY GAME <span class="arrow king-icon js-changeArrow" data-arrow="0"></span></a></p>

                <p class="game-rule-tit">game rules</p>
            </div>
        </div><!-- .banner-wrap -->

        <section class="game-rule-wrap w1200 js-floorTarget" id="js-gameProgressBar" data-getpoints="25">
            <div class="game-points-wrap clearfix">
                <span><em>100 Game Points</em></span>
                <span><em>200 Game Points</em></span>
                <span><em>250 Game Points</em></span>
                <span><em>300 Game Points</em></span>
                <span><em>400 Game Points</em></span>
            </div><!-- .game-points-wrap -->
            
            <div class="progress-bar-wrap">
                <div class="progress-bar-bg">
                    <div class="progress-bar" id="js-progressBarWidth" style="width:0%;"></div>
                    <ul class="progress-bar-step clearfix js-progressBarStep">
                        <li><span class="king-icon"></span></li>
                        <li><span class="king-icon"></span></li>
                        <li><span class="king-icon"></span></li>
                        <li><span class="king-icon"></span></li>
                        <li><span class="king-icon"></span></li>
                    </ul>
                </div>
            </div><!-- .progress-bar-wrap -->

            <ul class="prize-list-wrap clearfix js-prizeListWrap">
                <li data-needpoints="100">
                    <p class="prize-img"><a href="#"><img src="images/demo_14/prize_1.png" width="133" height="133" alt="Black Friday"></a></p>
                    <p class="get-prize-btn king-icon"><a href="javascript:;">Get Prize</a></p>
                </li>
                <li data-needpoints="200">
                    <p class="prize-img"><a href="#"><img src="images/demo_14/prize_2.png" width="133" height="133" alt="Black Friday"></a></p>
                    <p class="get-prize-btn king-icon"><a href="javascript:;">Get Prize</a></p>
                </li>
                <li data-needpoints="250">
                    <p class="prize-img"><a href="#"><img src="images/demo_14/prize_3.png" width="133" height="133" alt="Black Friday"></a></p>
                    <p class="get-prize-btn king-icon"><a href="javascript:;">Get Prize</a></p>
                </li>
                <li data-needpoints="300">
                    <p class="prize-img"><a href="#"><img src="images/demo_14/prize_4.png" width="133" height="133" alt="Black Friday"></a></p>
                    <p class="get-prize-btn king-icon"><a href="javascript:;">Get Prize</a></p>
                </li>
                <li data-needpoints="400">
                    <p class="prize-img"><a href="#"><img src="images/demo_14/prize_5.png" width="133" height="133" alt="Black Friday"></a></p>
                    <p class="get-prize-btn king-icon"><a href="javascript:;">Get Prize</a></p>
                </li>
            </ul><!-- .prize-list-wrap -->
            
            <div class="winner-wrap clearfix">
                <div class="fantastic-helpers-wrap fl">
                    <h4 class="fh-tit">FANTASTIC HELPERS</h4>

                    <div class="fh-content">
                        <h5 class="user-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="110" alt="Black Friday"></h5>
                        <p class="game-points"><span>Friend's</span> game points: <strong>800</strong></p>
                        
                        <div id="js_infoBox" class="infoBoxIni">
                            <ul class="add-points-list">
                                <li>
                                    <span class="add-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="64" height="64" alt="Black Friday"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="64" height="64" alt="Black Friday"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="64" height="64" alt="Black Friday"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="64" height="64" alt="Black Friday"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="64" height="64" alt="Black Friday"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="64" height="64" alt="Black Friday"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                                <li>
                                    <span class="add-img"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="64" height="64" alt="Black Friday"></span>
                                    <span class="add-detail">rainbow_1**@163.com adds XX Game Points</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .fantastic-helpers-wrap -->
                
                <div class="winner-list-wrap fr">
                    <h4 class="wl-tit">WINNER LIST</h4>
                    
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


        <section class="brands-display-wrap js-floorTarget">
            <h4 class="tit-brandsdisplay"></h4>
            <ul class="brands-list clearfix">
                <li><img src="images/demo_14/brands_1.jpg" width="180" height="80" alt="Black Friday"></li>
                <li><img src="images/demo_14/brands_2.jpg" width="180" height="80" alt="Black Friday"></li>
                <li><img src="images/demo_14/brands_3.jpg" width="180" height="80" alt="Black Friday"></li>
                <li><img src="images/demo_14/brands_4.jpg" width="180" height="80" alt="Black Friday"></li>
                <li><img src="images/demo_14/brands_1.jpg" width="180" height="80" alt="Black Friday"></li>
                <li><img src="images/demo_14/brands_4.jpg" width="180" height="80" alt="Black Friday"></li>
                <li><img src="images/demo_14/brands_3.jpg" width="180" height="80" alt="Black Friday"></li>
                <li><img src="images/demo_14/brands_2.jpg" width="180" height="80" alt="Black Friday"></li>
                <li><img src="images/demo_14/brands_1.jpg" width="180" height="80" alt="Black Friday"></li>
                <li><a href="#" class="view-more">VIEW MORE</a></li>
            </ul>
        </section><!-- .brands-display-wrap -->

        <section class="for-bf-wrap js-floorTarget">
            <h4 class="tit-for-bf"></h4>
            <ul class="bf-list clearfix">
                <li>
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
                    <p class="pro-img"><a href="#"><img src="http://www.yuanbo88.com/dist/images/domeimg/default_user.jpg" width="160" height="160" alt="Black Friday"></a></p>
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
        </section><!-- .for-bf-wrap -->

        <section class="more-funs-wrap js-floorTarget">
            <h4 class="tit-morefuns"></h4>
            <ul class="morefuns-list clearfix">
                <li><img src="images/demo_14/morefuns_1.jpg" width="220" height="300" alt="Black Friday"></li>
                <li><img src="images/demo_14/morefuns_2.jpg" width="220" height="300" alt="Black Friday"></li>
                <li><img src="images/demo_14/morefuns_3.jpg" width="220" height="300" alt="Black Friday"></li>
                <li><img src="images/demo_14/morefuns_4.jpg" width="220" height="300" alt="Black Friday"></li>
            </ul>
        </section><!-- .more-funs-wrap -->

        <div class="right-nav-wrap" id="js-rightNav">
            <ul>
                <li><a href="javascript:;">Winner list</a></li>
                <li><a href="javascript:;">Brand display</a></li>
                <li><a href="javascript:;">Hot sale</a></li>
                <li><a href="javascript:;">More funs</a></li>
            </ul>
            <a href="javascript:;" class="goto-top js-goTop"></a>
        </div><!-- .right-nav-wrap -->

        <div class="pb-left"></div>
        <div class="pb-right"></div>
        <div class="pb-foot"></div>
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
               progressBarStepArr = $('.js-progressBarStep').find('li'),
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
           $('#js-progressBarWidth').css('width', progressBar);

           $.each(progressBarStepArr, function(index, val) {
               var that = $(val);
               if( (index) < maxStep){
                   that.addClass('get-points');
               }
           });
           $.each(prizeListWrapArr, function(index, val) {
               var that = $(val);
               if((index) < maxStep){
                   that.addClass('is-ok');
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
            GLOBAL.PopObj.alert({content: '你已经成功为朋友加了 '+ addStep +' 分'});
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