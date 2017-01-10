<?php
session_start(); 
//建立数据库连接
require_once '../mysql_connect.php';
require_once '../inc_session.php';
//关闭数据库连接
$link->close(); 
?>
<!DOCTYPE html style="font-size:33.7px;">
<html lang="en">
<head>

    <? include '../top.html'; ?>
    <style>
        a{ text-decoration: none;}
        
        .mobile-wrap{ padding: 40px 0;}
        #iframe-wrap { position: relative; height: 100%; overflow: hidden; z-index: 50;}
        #iframe-wrap *{ -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
        .mobile-width-2 { margin: 0 auto; height: 417px!important; padding: 125px 25px 159px 25px; width: 337px; background: url(images/bg_mob.png) no-repeat 0 -2217px;}
        #iframe-wrap .mobile-box{ width: 337px; height: 417px; overflow: auto;}

        input{-webkit-appearance:none;}
        textarea{resize:none;}
        a{ text-decoration: none;}
        input:-webkit-autofill {
          -webkit-box-shadow: 0 0 0 1200px #fff inset;
        }
        .search-wrap{ width: 10rem; font-size: 0.375rem;font-family: Arial; overflow: hidden;}
        .ic-search{ display: inline-block; background: url('images/demo_20/search_icon.png') no-repeat; *display: inline;*zoom: 1; background-size: 5.25rem auto;}
        .ic-goback{ width: 0.34375rem; height: 0.625rem; background-position: 0 0;}
        .ic-search-btn{ position: absolute; z-index: 2; top: 0.234375rem; left: 0.15625rem; width: 0.484375rem; height: 0.484375rem; background-position: -1.5625rem 0;}
        .ic-close-input{ position: absolute; z-index: 2; top: 0.3125rem; right: 0.375rem; width: 0.3125rem; height: 0.3125rem; background-position: -3.125rem 0;}
        .ic-close-his{ position: absolute; z-index: 2; top: -0.28125rem; right: -0.28125rem; width: 0.5625rem; height: 0.5625rem; background-position: -4.6875rem 0;}
        

        .search-top{ padding: 0.3125rem; width: 10rem; height: 1.5625rem; background: #000;}
        .go-back{ margin-right: 0.390625rem; padding: 0.15625rem;}

        .search-input-wrap{ position: relative; z-index: 1; padding: 0.1875rem 0.9375rem 0.1875rem 0.8125rem; width: 6.5625rem; height: 0.9375rem; background: #fff; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;}
        .input-wrap{ }
        .search-input-wrap input{ padding-left: 0.078125rem; display: inline-block; width: 4.6875rem; height: 0.5625rem; line-height: 0.5625rem; border: none; border: 0;}
        .search-btn{ position: absolute; z-index: 2; top: 0; left: 0; width: 0.8125rem; height: 0.9375rem; cursor: pointer;}
        .close-input{ position: absolute; z-index: 2; top: 0; right: 0; width: 0.9375rem; height: 0.9375rem; cursor: pointer;}
        .search-btn-wrap{ width: 1.5625rem; height: .9375rem; line-height: .9375rem; border:1px solid #fff; font-size: 0.4375rem; text-align: center;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;}
        .search-btn-wrap a{ display: block; color: #fff;}

        .popular-searches{ margin-bottom: 1rem;}
        .pop-s-tit{ padding: 0 0.3125rem; height: 1.359375rem; line-height: 1.359375rem; color: #000; font-size: 0.4375rem; border-bottom: 1px solid #dedede;}
        .pop-content{ padding: 0 0.3125rem;}
        .pop-content li{ padding-top: 0.46875rem; float: left; width: 50%; height: 1rem; line-height: 0.53125rem; font-size: 0.375rem;}
        .pop-content li a{ display: block; color: #5e5e5e;}
        .pop-content li:nth-child(-n+3) a span{color: #f37800;}

        .searches-history{}
        .sear-h-tit{ position: relative; z-index: 1; padding: 0 0.3125rem; height: 1.359375rem; line-height: 1.359375rem; color: #000; font-size: 0.4375rem; border-bottom: 1px solid #dedede;}
        .sear-h-tit .close-all{ position: absolute; z-index: 2; top: 0; right: 0.3125rem; color: #999;}
        .sear-content{ padding: 0.46875rem 0.3125rem;}
        .sear-content li{ position: relative; z-index: 1; float: left; margin: 0 0.625rem 0.46875rem 0;}
        .sear-content li a{ display: block; padding: 0 0.3125rem; height: 0.9375rem; line-height: 0.9375rem; color: #5e5e5e; border:1px solid #666;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;}
    </style>
    <script src='../dist/minjs/flexible.js'></script>
    <script src="../dist/minjs/jquery.cookie.min.js"></script>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>
    
    <div class="mobile-wrap">
        <div id="iframe-wrap" class="mobile-width-2">
            <div class="mobile-box">
                <div class="search-wrap">
                    <header class="search-top clearfix">
                        <p class="fl go-back"><i class="ic-search ic-goback"></i></p>

                        <div class="search-input-wrap fl">
                            <span class="search-btn"><i class="ic-search ic-search-btn"></i></span>
                            <span class="input-wrap"><input type="text" placeholder="模拟输入:记录搜索历史" id="js-inputSearch"></span>
                            <span class="close-input js-closeInput"><i class="ic-search ic-close-input"></i></span>
                        </div>
                        
                        <p class="search-btn-wrap fr">
                            <a href="javascript:;" class="js-searchSubmitBtn">搜索</a>
                        </p>
                    </header>

                    <section class="popular-searches">
                        <h3 class="pop-s-tit">Popular Searches</h3>
                        <ul class="pop-content clearfix" id="js-popSearchContent">
                            <li><a href="javascript:;"><span>1</span>.<em>meizu</em></a></li>
                            <li><a href="javascript:;"><span>2</span>.<em>xiaomi</em></a></li>
                            <li><a href="javascript:;"><span>3</span>.<em>huawei</em></a></li>
                            <li><a href="javascript:;"><span>4</span>.<em>iPhone</em></a></li>
                            <li><a href="javascript:;"><span>5</span>.<em>onePlus</em></a></li>
                            <li><a href="javascript:;"><span>6</span>.<em>OPPO</em></a></li>
                        </ul>
                    </section>

                    <section class="searches-history">
                        <h3 class="sear-h-tit">Searches History <a href="javascript:;" class="close-all js-clearAll">Clear All</a></h3>
                        <ul class="sear-content clearfix" id="js-searchHistoryCont">
                            
                        </ul>
                    </section>
                </div><!-- .search-wrap -->
            </div>
        </div>
    </div><!-- .mobile-wrap -->
   

<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->

<script>
$LAB.script("")
    .wait(function(){
        $(function(){
            window.SET_SEARCH_HISTORY_COOKIE = {
                setSearchCookie: function(oldCookie, newKeyword){
                    var newSearchHistory = '';
                    var _arrayHistory = [];

                    if(oldCookie !== null){// is have cookie
                        if(oldCookie.indexOf(newKeyword.toLowerCase()) !== -1){//is already have
                            newSearchHistory = oldCookie;
                        }else{
                            if(oldCookie.indexOf('_') !== -1){//longth no 1
                                _arrayHistory = oldCookie.split('_');
                                _arrayHistory.push(newKeyword.toLowerCase());
                                newSearchHistory = _arrayHistory.join('_');
                                $.cookie("searchhistory",newSearchHistory,{expires: 30, path: '/',domain:'www.yuanbo88.com'});
                            }else{
                                newSearchHistory = oldCookie + '_' + newKeyword.toLowerCase();
                                $.cookie("searchhistory",newSearchHistory,{expires: 30, path: '/',domain:'www.yuanbo88.com'});
                            }
                        }
                    }else{// no cookie
                        newSearchHistory = newKeyword.toLowerCase();
                        $.cookie("searchhistory",newSearchHistory,{expires: 30, path: '/',domain:'www.yuanbo88.com'});
                    }
                    this.showAllSearchCookie(newSearchHistory);
                },
                setSearchCookieEvent: function(){
                    var that = this;

                    that.clearAllSearchCookie();
                    that.otherEvent.clearSearchInput();
                    that.clearSingleSearchCookieEvent();

                    (function(){
                        that.showAllSearchCookie($.cookie("searchhistory"));
                    })();

                    //Popular Searches click
                    $('#js-popSearchContent').on('click', 'li a',function(){
                        var thisKeyword = $(this).find('em').html();
                        
                        that.setSearchCookie($.cookie("searchhistory"), thisKeyword);
                    }); 

                    //search input click
                    $('.js-searchSubmitBtn').click(function(){
                        var thisKeyword = $('#js-inputSearch').val();

                        if(thisKeyword.length > 0){
                            that.setSearchCookie($.cookie("searchhistory"), thisKeyword);
                        }
                    });
                },
                clearAllSearchCookie: function(){
                    this.clearAllSearchCookieEvent();
                },
                clearAllSearchCookieEvent: function(){
                    $('.js-clearAll').click(function(){
                        $.cookie("searchhistory",null,{expires: 30, path: '/',domain:'www.yuanbo88.com'});
                        $('#js-searchHistoryCont').html('');
                    });
                },
                clearSingleSearchCookieEvent: function(){
                    var that = this;

                    $('#js-searchHistoryCont').on('click', '.ic-close-his', function(){
                        var _array = [],
                            _newSearchHistory = [],
                            thisParent = $(this).closest('li'),
                            thisKeyword = thisParent.find('a').html().toLowerCase();
                        var oldSearchHistory = $.cookie("searchhistory");

                        if(oldSearchHistory !== null){
                            if(oldSearchHistory.indexOf('_') !== -1){
                                _array = oldSearchHistory.split('_');
                                for (var i = 0; i < _array.length; i++) {
                                   if(thisKeyword !== _array[i]){
                                        _newSearchHistory.push(_array[i].toLowerCase());
                                   }
                                }
                                $.cookie("searchhistory",_newSearchHistory.join('_'),{expires: 30, path: '/',domain:'www.yuanbo88.com'});
                                thisParent.remove();
                            }else{
                                $('.js-clearAll').trigger('click');
                            }
                        }
                    });
                },
                showAllSearchCookie: function(oldSearchHistory){
                    var _html = '';
                    var _arraySH = [];

                    if(oldSearchHistory !== null){
                        if(oldSearchHistory.indexOf('_') !== -1){
                            _arraySH = oldSearchHistory.split('_');
                            for (var i = 0; i < _arraySH.length; i++) {
                               _html +=  '<li><a href="javascript:;">'+ _arraySH[i]  +'</a><span class="ic-search ic-close-his"></span></li>';
                            }
                        }else{
                            _html =  '<li><a href="javascript:;">'+ oldSearchHistory  +'</a><span class="ic-search ic-close-his"></span></li>';
                        }
                    }
                    $('#js-searchHistoryCont').html(_html);
                },
                otherEvent: {
                    clearSearchInput: function(){
                        $('.js-closeInput').click(function(){
                            $('#js-inputSearch').val('');
                        });
                    }
                }
            };

            window.SET_SEARCH_HISTORY_COOKIE.setSearchCookieEvent();


        });
    })
</script>

</body>
</html>