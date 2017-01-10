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
        /* 让banner图居中显示 */
        .newYear_bannerWrap{ width: 100%; position: relative; overflow: hidden; height: 572px; background: #f2f2f2; min-width: 1200px;}
        .newYear_bannerWrap .banner{ width: 2000px; position: absolute; left: 50%; margin-left: -1000px; height: 572px;background: url("images/demo_3/banner_bg.jpg") no-repeat;}
        .newYear_bannerWrap .banner p.banner_pic{ position: relative; margin: 0 auto; width: 1200px; background: #f2f2f2;}
        /*主体部分*/
        .mainWrap{ width: 100%; background: #fbf5f6;}
        .mainWrap .main{ margin: 0 auto; padding: 20px 0 70px; width: 1200px; overflow: hidden;}
        .mainWrap .main ul{ width: 1220px;}
        .mainWrap .main ul li{ float: left; margin: 0 16px 10px 0; width: 592px; height: 200px; text-align: center;}
        .mainWrap .main ul li a{ display: block; width: 590px; height: 200px; border: 1px solid #ddd;
        -moz-box-shadow: 0px 4px 3px #ccc;
        -webkit-box-shadow: 0px 4px 3px #ccc;
        -o-box-shadow: 0px 4px 3px #ccc;
        box-shadow: 0px 4px 3px #ccc;
        }
        .mainWrap .main ul li a:hover{ border: 1px solid #8b4785;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>



    <div class="newYearWrap">
        <div class="newYear_bannerWrap">
            <div class="banner">
                <p class="banner_pic">
                    <img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_3/banner.jpg" alt="BIG BANG"/>
                </p>
            </div><!-- .banner -->
        </div><!-- .newYear_bannerWrap -->

        <div class="mainWrap">
            <div class="main">
                <ul class="clearfix">
                    <li><a href="#"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_3/sort_1.jpg" alt="BIG BANG"/></a></li>
                    <li><a href="#"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_3/sort_2.jpg" alt="BIG BANG"/></a></li>
                    <li><a href="#"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_3/sort_3.jpg" alt="BIG BANG"/></a></li>
                    <li><a href="#"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_3/sort_4.jpg" alt="BIG BANG"/></a></li>
                    <li><a href="#"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_3/sort_5.jpg" alt="BIG BANG"/></a></li>
                    <li><a href="#"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_3/sort_6.jpg" alt="BIG BANG"/></a></li>
                    <li><a href="#"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_3/sort_7.jpg" alt="BIG BANG"/></a></li>
                    <li><a href="#"><img src="../dist/images/domeimg/lazyload.gif" data-original="images/demo_3/sort_8.jpg" alt="BIG BANG"/></a></li>
                </ul>
            </div><!-- .main -->
        </div><!-- .mainWrap -->
    </div><!-- .newYearWrap -->

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->

</body>
</html>