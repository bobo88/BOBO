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
        .bizhong{ display: none;}
        
        li { list-style-type: none }
        @font-face { font-family: 'CenturyGothic'; src: url('images/demo_21/font/CenturyGothic.eot?#iefix') format('embedded-opentype'), url('images/demo_21/font/CenturyGothic.woff') format('woff'), url('images/demo_21/font/CenturyGothic.ttf') format('truetype'), url('images/demo_21/font/CenturyGothic.svg#CenturyGothic') format('svg'); font-weight: normal; font-style: normal }
        @font-face { font-family: 'CenturyGothic-Bold'; src: url('images/demo_21/font/CenturyGothic-Bold.eot?#iefix') format('embedded-opentype'), url('images/demo_21/font/CenturyGothic-Bold.woff') format('woff'), url('images/demo_21/font/CenturyGothic-Bold.ttf') format('truetype'), url('images/demo_21/font/CenturyGothic-Bold.svg#CenturyGothic-Bold') format('svg'); font-weight: normal; font-style: normal;}
        #wrap { background-color: #faf0ef; background-image: url('images/demo_21/bg.jpg'); background-position: center top; background-repeat: no-repeat; padding-top: 650px; min-width: 1200px; font-family: arial; overflow: hidden;}
        .the-section { width: 1200px; margin: auto;}
        .nav { width: 1200px; margin: auto; margin-bottom: 35px; position: relative;}
        .nav.fixed .placehold { display: block;}
        .nav.fixed ul { position: fixed; width: 1200px; top: -104px; z-index: 2;}
        .nav.fixed li img {filter:none;}

        .nav .placehold { height: 150px; width: 100%; display: none;}
        .nav ul { font-size: 0;}
        .nav li { display: inline-block; cursor: pointer; width: 171px; height: 150px; text-align: center; background-color: #e6e9b5; vertical-align: top; position: relative; line-height: 200px; text-transform: capitalize;transition: all 0.2s ease; }
        .nav li:last-of-type { width: 174px;}
        .nav li:nth-of-type(2n+2) { background-color: #b4be4d;}
        .nav li:nth-of-type(2n+2) span { color: white;}
        .nav li:nth-of-type(2n+2) img { -webkit-filter: drop-shadow(10px 10px 2px #a5ae44); filter: drop-shadow(10px 10px 2px #a5ae44);}
        .nav li img { display: inline-block; -webkit-filter: drop-shadow(10px 10px 2px #d2d69f); filter: drop-shadow(10px 10px 2px #d2d69f);}
        .nav li:hover,.nav li.active {box-shadow: -2px -2px 10px #a5ae44;}
        .nav li:hover img,.nav li.active img {filter: none;}
        .nav li:hover span,.nav li.active span{color:white;}
        .nav li span { font-family: 'CenturyGothic'; position: absolute; bottom: 7px; left: 0; width: 100%; height: 24px; font-size: 14px; color: #b4be4d; line-height: 1; display: block; text-align: center;text-overflow:ellipsis; overflow:hidden; white-space:nowrap; padding:0 5px;box-sizing: border-box;}
        .section { background-color: #b4be4d; margin-bottom: 50px;}
        .section ul { font-size: 0; width: 1140px; margin: auto;}
        .section li { width: 275px; background-color: white; margin: 10px 5px 0px 5px; text-align: center; display: inline-block; line-height: normal;transition: all 0.2s ease-in; }
        .section li:hover {transform: translateY(-8px);}
        .section .proCounter { padding: 15px; -webkit-box-sizing: border-box; box-sizing: border-box; text-align: center; position: relative; text-indent: 25px; font-size: 14px; color: black;}
        .section .proCounter:before { content: ''; width: 30px; height: 25px; display: inline-block; vertical-align: middle; position: absolute; left: 15px; top: 0; bottom: 0; margin: auto; background: url('images/demo_21/clock.png') no-repeat center center;}
        .section .proImg { overflow: hidden; width: 275px; height: 275px; display: block; margin-bottom: 12px;}
        .section .proImg img { width: 275px; height: auto;}
        .section .proText { color: #777; font-size: 14px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; display: block; padding: 0 18px; width: 100%; -webkit-box-sizing: border-box; box-sizing: border-box;}
        .section .proPrice { margin: 18px 0;}
        .section .shopPrice { font-size: 24px; color: #c13838;}
        .section .marketPrice { font-size: 14px; text-decoration: line-through; color: #bdbdbd; font-weight: normal;}
        .section b { color: inherit; font-size: inherit; font-weight: inherit;}
        .section .proBuy { font-size: 20px; color: white; text-align: center; line-height: 35px; height: 35px; background-color: #da3439; width: 160px; -webkit-border-radius: 2px; border-radius: 2px; display: inline-block; text-transform: uppercase; margin-bottom: 20px; -webkit-transition: all .2s ease; transition: all .2s ease;}
        .section .proBuy.soon { background: #b4be4d;}
        .section .proBuy.end { background: gray;}
        .section .header { height: 90px; background-color: #b4be4d; line-height: 90px;}
        .section h1 { text-transform: capitalize; color: white; font-family: 'CenturyGothic-Bold'; font-size: 56px; text-align: center; position: relative;}
        .section h1:after, .section h1:before { content: ''; display:inline-block;height: 3px; width: 197px; background-color: white; margin-right: 30px; vertical-align: middle; overflow: hidden;}
        .section h1:after {margin-right: 0;margin-left: 30px; }
        .section p { text-align: right; padding: 15px 35px;}
        .section .more { font-size: 40px; color: white; font-family: 'CenturyGothic-Bold'; text-transform: uppercase; text-decoration: underline;}
        .aside { position: fixed; right: 0; bottom: 200px;}
    </style>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>
    
    <div id="wrap">
        <div class="nav">
            <ul>
                <li>
                    <img src="images/demo_21/1.png" alt="">
                    <span title="Jackets">Jackets</span>
                </li>
                <li>
                    <img src="images/demo_21/2.png" alt="">
                    <span title="Hoodies">Hoodie</span>
                </li>
                <li>
                    <img src="images/demo_21/3.png" alt="">
                    <span title="Blouses">Blouses</span>
                </li>
                <li>
                    <img src="images/demo_21/4.png" alt="">
                    <span title="Plus Size">Plus Size</span>
                </li>
                <li>
                    <img src="images/demo_21/5.png" alt="">
                    <span title="Jeans">Jeans</span>
                </li>
                <li>
                    <img src="images/demo_21/6.png" alt="">
                    <span title="Dresses">Dresses</span>
                </li>
                <li>
                    <img src="images/demo_21/7.png" alt="">
                    <span title="Accessories">Accessories</span>
                </li>
            </ul>
            <div class="placehold"></div>
        </div>
        <div class="the-section">

            <div class="section">
                <div class="header">
                    <h1>Jackets</h1>
                </div>
                <ul>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="2" data-time="0">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="0" data-time="88888">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                </ul>
                <p><a href="#" class="more">more ></a></p>
            </div>

            <div class="section">
                <div class="header">
                    <h1>Hoodie</h1>
                </div>
                <ul>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="2" data-time="0">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="0" data-time="88888">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                </ul>
                <p><a href="#" class="more">more ></a></p>
            </div>

            <div class="section">
                <div class="header">
                    <h1>Blouses</h1>
                </div>
                <ul>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="2" data-time="0">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="0" data-time="88888">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                </ul>
                <p><a href="#" class="more">more ></a></p>
            </div>

            <div class="section">
                <div class="header">
                    <h1>Plus Size</h1>
                </div>
                <ul>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="2" data-time="0">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="0" data-time="88888">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                </ul>
                <p><a href="#" class="more">more ></a></p>
            </div>

            <div class="section">
                <div class="header">
                    <h1>Jeans</h1>
                </div>
                <ul>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="2" data-time="0">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="0" data-time="88888">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                </ul>
                <p><a href="#" class="more">more ></a></p>
            </div>

            <div class="section">
                <div class="header">
                    <h1>Dresses</h1>
                </div>
                <ul>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="2" data-time="0">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="0" data-time="88888">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                </ul>
                <p><a href="#" class="more">more ></a></p>
            </div>

            <div class="section">
                <div class="header">
                    <h1>Accessories</h1>
                </div>
                <ul>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="2" data-time="0">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="0" data-time="88888">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                    <li>
                        <div class="proCounter" data-status="1" data-time="4566256">
                            Promo Ends In: 00 | 00 | 00 | 00
                        </div>
                        <a href="{$goods.url_title}" class="proImg"><img src="http://www.yuanbo88.com/dist/images/domeimg/beauty.jpg" alt="Hooded Printed Quilted Coat"></a>
                        <a href="#" class="proText">Hooded Printed Quilted Coat</a>
                        <div class="proPrice">
                            <span class="shopPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="60.20">$60.20</b>
                            </span>
                            <span class="marketPrice">
                                <b class="bizhong">USD</b>
                                <b class="my_shop_price" orgp="100.10">$100.10</b>
                            </span>
                        </div>
                        <a href="{$goods.url_title}" class="proBuy" target="_blank">BUY NOW</a>
                    </li>
                </ul>
                <p><a href="#" class="more">more ></a></p>
            </div>

        </div>
    </div>

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->

<script>
$LAB.script("")
    .wait(function(){
        // time counter for flash
        function Counter(contain, showStatus, template,callback,other) {
            this.time = +contain.attr('data-time');
            this.text = contain.attr('data-status') == 1 ? 'Promo Ends In:' : 'Promo Begins In:';
            this.contain = contain;
            this.showStatus = showStatus;
            this.day = 0;
            this.hour =0;
            this.minute = 0;
            this.second = 0;
            this.handler = null;
            this.other = other || false;
            this.callback = callback || function(){};
            this.template = template ? template : "{day}:{hour}:{minute}:{second}";
            this.init();
        }
        Counter.prototype = {
            timing:function(){
                var self = this;
                this.handler = setTimeout(function(){
                    if (self.time <= 0) {
                        clearTimeout(self.handler);
                        self.callback(self.contain);
                        return false;
                    }
                    self.time -= 1;
                    self.day = Math.floor(self.time / 60 / 60 / 24);
                    self.hour = Math.floor(self.time / 60 / 60 % 24);
                    self.minute = Math.floor(self.time / 60 % 60);
                    self.second = Math.floor(self.time % 60);
                    self.render();
                    self.timing();
                }, 1000);
            },
            transform:function(data){
                if((''+data).length<2) {
                    return '0'+data;
                } else {
                    return data;
                }
            },
            render:function() {
                var newStr = this.template.replace(/\{day\}/g, this.transform(this.day))
                .replace(/\{hour\}/g, this.transform(this.hour))
                .replace(/\{minute\}/g, this.transform(this.minute))
                .replace(/\{second\}/g, this.transform(this.second));
                if(this.other && this.time > 86400) {
                    this.contain.html('Over ' + this.transform(this.day) + ' D ' + this.transform(this.hour) + ' H');
                } else {
                    if(this.showStatus) {
                        this.contain.html(this.text + newStr);
                    } else {
                        this.contain.html(newStr);
                    }
                }
            },
            init:function(){
                this.timing();
            }
        }
        $('.proCounter').each(function(index, el) {
            if($(el).attr('data-status') === '2') {
                $(el).siblings('.proBuy').addClass('end').html('deal ended');
            } else {
                if($(el).attr('data-status') === '0') {
                    $(el).siblings('.proBuy').addClass('soon').html('Coming Soon');
                }
                new Counter($(el),true, '{day} | {hour} | {minute} | {second}', function(contain){
                    if(contain.attr('data-status') === '0') {
                        contain.siblings('.proBuy').removeClass('soon').html('Buy Now');
                    } else {
                        contain.siblings('.proBuy').addClass('end').html('DEAL ENDED');
                    }
                });
            }
        });

        $(".scrollTop").click(function(){
            $('html,body').animate({
                scrollTop: 0
            },1000);
        });
        
        var sections = $(".section");

        function visibleItem() {
            for (var i = 0; i < sections.length; i++) {
                var rect = sections.get(i).getBoundingClientRect();
                if(rect.top < 20 && rect.bottom > 100) {
                    return i;
                }
            }
        }

        var useScrollIndentify = true;
        // sidebar scroll to target 
        $(".nav li").click(function(event) {
            useScrollIndentify = false;
            $(".nav li").removeClass('active');
            $(this).addClass('active');
            $('html,body').animate({
                scrollTop: sections.eq($(this).index()).offset().top -45
            }, 1000,function(){
                useScrollIndentify = true;
            });
        });
        $(window).scroll(function(){
            var top = $(window).scrollTop();
            var navRect = $('.nav').get(0).getBoundingClientRect();
            var currentItem = useScrollIndentify? visibleItem() : undefined;
            if(currentItem !== undefined) {
                $(".nav li").removeClass('active');
                $(".nav li").eq(currentItem).addClass('active');
            }
            if(top>0) {
                $('.scrollTop').fadeIn();
            }
            if(top <=0) {
                $('.scrollTop').fadeOut();
            }
            if(navRect.top <= -101) {
                $('.nav').addClass('fixed');
            }
            if(navRect.top > -101) {
                $('.nav').removeClass('fixed');
            }
        });
    })
</script>

</body>
</html>