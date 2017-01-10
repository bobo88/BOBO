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
        .coupon-list-wrap{ width: 100%; min-width: 1200px; background: #4f4c93;}
        .banner-box{ position: relative; z-index: 1; margin-bottom: 80px; width: 100%; height: 500px;}
        .banner-box .top-btn{ position: absolute; z-index: 2; bottom: -26px; left: 50%; margin-left: -167px; width:334px; height: 67px; background: url('images/demo_8/coupon_topbtn.png') no-repeat;}
        .banner-box .top-btn a{ display: block; width: 334px; height: 67px; line-height: 67px; color: #fff; font-size: 22px; text-align: center; text-decoration: none;}
        .banner-box .top-btn .sub-tips{ display: none; position: absolute; top: -70px; right: -160px; padding: 10px 15px; width: 260px; height: 40px; line-height: 20px; color: #cb4243; font-size: 14px; text-align: left; background: #fff9c8;
                    -webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; -o-border-radius: 5px; border-radius: 5px;}
        .banner-box .top-btn .sub-tips .trig-bottom{ position: absolute; bottom: -5px; left: 10px;
                        display: inline-block; width: 0; height: 0; *display: inline; *zoom:1; border-style: solid; border-color: transparent;
                          border-width: 5px 5px 0 5px; border-top-color: #fff9c8;}

        .coupon-tit{ margin-bottom: 30px; width: 100%; height: 60px; text-align: center; background: #4f4c93;}
        .coupon-tit .tit-name{ position: relative; z-index: 2; padding: 0 50px; height: 60px; line-height: 60px; color: #fff; font-size: 36px; font-weight: bold; background: #4f4c93;}
        .coupon-tit .line-bg{ position: relative; z-index: 1; left: 0; top: -30px; display: block; width: 100%; height: 1px; border-top: 1px solid #fff;}

        .coupon-sec{ margin: 0 auto 40px; width: 1200px;}
        .coupon-sec .coupon-content{ margin-top: 30px; width: 1200px;}
        .coupon-sec .coupon-list{ width: 1300px;}
        .coupon-sec .coupon-list li{ float: left; margin-right: 100px; margin-bottom: 30px; width: 550px; height: 150px; background: #fff; 
                    -webkit-border-radius: 5px; -moz-border-radius: 5px; -ms-border-radius: 5px; -o-border-radius: 5px; border-radius: 5px;
                    -webkit-transition: 0.5s;  -moz-transition: 0.5s;  -o-transition: 0.5s;  -ms-transition: 0.5s;  transition: 0.5s;}
        .coupon-sec .coupon-list li.bgcolor-orange{background: url('images/demo_8/coupon_bg1.png') no-repeat;}
        .coupon-sec .coupon-list li.bgcolor-orange .p-num{ color: #f4551e;}
        .coupon-sec .coupon-list li.bgcolor-orange .status-btn:hover{ background:#fff; color: #f4551e;}
        .coupon-sec .coupon-list li.bgcolor-lightblue{background: url('images/demo_8/coupon_bg3.png') no-repeat;}
        .coupon-sec .coupon-list li.bgcolor-lightblue .p-num{ color: #22d9ca;}
        .coupon-sec .coupon-list li.bgcolor-lightblue .status-btn:hover{ background:#fff; color: #22d9ca;}
        .coupon-sec .coupon-list li.bgcolor-lightred{background: url('images/demo_8/coupon_bg4.png') no-repeat;}
        .coupon-sec .coupon-list li.bgcolor-lightred .p-num{ color: #f74b4b;}
        .coupon-sec .coupon-list li.bgcolor-lightred .status-btn:hover{ background:#fff; color: #f74b4b;}
        .coupon-sec .coupon-list li.bgcolor-yellow{background: url('images/demo_8/coupon_bg5.png') no-repeat;}
        .coupon-sec .coupon-list li.bgcolor-yellow .p-num{ color: #f7c107;}
        .coupon-sec .coupon-list li.bgcolor-yellow .status-btn:hover{ background:#fff; color: #f7c107;}

        .coupon-sec .coupon-list li.bgcolor-grew{background: url('images/demo_8/coupon_bg2.png') no-repeat; color: #ddd;}
        .coupon-sec .coupon-list li.bgcolor-grew .p-num{ color: #ddd;}
        .coupon-sec .coupon-list li.bgcolor-grew .c-p-content{ border-color: #ddd;}
        .coupon-sec .coupon-list li.bgcolor-grew .only-status{ color: #ddd; border-color: #ddd;}
        .coupon-sec .coupon-list li.bgcolor-grew .coupon-rule{ color: #ddd;}
        .coupon-sec .coupon-list li.bgcolor-grew .coupon-rule .rule-tit{ color: #ddd;}
        .coupon-sec .coupon-list li.bgcolor-grew .coupon-rule p{ color: #ddd;}
        .coupon-sec .coupon-list li.bgcolor-grew .coupon-rule strong{ color: #ddd;}
        .coupon-sec .coupon-list li.bgcolor-grew .coupon-rule .icon-circle{ background: #ddd;}


        .coupon-sec .coupon-list li:hover{ -webkit-transform: translate(0,-5px); -moz-transform: translate(0,-5px); transform: translate(0,-5px);
            -webkit-box-shadow: 0 14px 28px rgba(0,0,0,0.25),0 10px 10px rgba(0,0,0,0.1);
            -moz-box-shadow: 0 14px 28px rgba(0,0,0,0.25),0 10px 10px rgba(0,0,0,0.1);
            box-shadow: 0 14px 28px rgba(0,0,0,0.25),0 10px 10px rgba(0,0,0,0.1);
        }

        .coupon-detail{}
        .coupon-detail .coupon-price{ padding: 30px 0 30px 30px; width: 115px; height: 90px; text-align: center;}
        .coupon-detail .coupon-price .c-p-content{ padding-right: 14px; width: 100px; height: 90px; border-right: 1px dashed #bbb9f2;}
        .coupon-detail .coupon-price .p-num{ position: relative; z-index: 1; height: 60px; line-height: 60px; font-size: 60px; font-weight: bold;}
        .coupon-detail .coupon-price .num-status{ position: absolute; z-index: 2; top: 0; right: -10px; height: 20px; line-height: 20px; font-size: 16px; font-style: normal; font-weight: normal;}
        .coupon-detail .coupon-price .only-status{ display: block; padding: 0 4px; width: 90px; height: 28px; line-height: 14px; color: #4f4c93; font-size: 12px; border:1px solid #4f4c93; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
            -webkit-border-radius: 3px; -moz-border-radius: 3px; -ms-border-radius: 3px; -o-border-radius: 3px; border-radius: 3px;
        }
        .coupon-detail .coupon-rule{ padding: 30px 30px 30px 15px; width: 215px; height: 90px;}
        .coupon-detail .coupon-rule .rule-tit{ height: 30px; line-height: 30px; color: #4e4d95; font-size: 16px; font-weight: bold; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
        .coupon-detail .coupon-rule p{ height: 60px; line-height: 20px; color: #7572ba; font-size: 13px; overflow: hidden;}
        .coupon-detail .coupon-rule strong{ color: #f4551e;}
        .coupon-detail .coupon-rule .icon-circle{ margin-right: 5px; display: inline-block; width: 4px; height: 4px; border-radius: 4px; background: #7572ba; vertical-align: middle; *display: inline;*zoom:1;}

        .coupon-detail .coupon-status{ position: relative; width: 140px; text-align: center;}
        .coupon-detail .coupon-status .circle-box{ padding: 10px 0; height: 90px;}
        .coupon-detail .coupon-status .already-box{ padding-top: 30px;}
        .coupon-detail .coupon-status .Expired-box{ padding-top: 40px;}
        .coupon-detail .coupon-status .Unavailable-box{ padding-top: 60px;}
        .coupon-detail .coupon-status .Discover-box{ padding-top: 60px;}
        .coupon-detail .coupon-status .circle-left{ position: absolute; top: 40px; left: 57px; line-height: 16px; color: #fff; font-size: 14px;}
        .coupon-detail .coupon-status .status-btn{ display: inline-block; padding: 0 10px; height: 24px; line-height: 24px; color: #fff; font-size: 12px; border:1px solid #fff; text-decoration: none; *display: inline;*zoom:1;
                    -webkit-border-radius: 25px; -moz-border-radius: 25px; -ms-border-radius: 25px; -o-border-radius: 25px; border-radius: 25px;
                }
        .coupon-detail .coupon-status .coupon{ margin-bottom: 10px; height: 24px; line-height: 24px; color: #fff; font-size: 20px; font-weight: bold;}
        .coupon-detail .coupon-status .use-link{ display: block; margin-top: 20px; color: #fff; font-size: 13px; text-decoration: underline;}
  
  
        .blank-bg{ width: 100%; height: 20px; background: url('images/demo_8/blank_bg.jpg') top center no-repeat;}
        .selected-topics-wrap{ width: 100%; min-width: 1200px; background: #5f5bb4;}
        .selected-topics-wrap .selected-topics-box{ margin: 0 auto; padding: 60px 0 100px; width: 1200px;}
        .selected-topics-wrap .coupon-tit{ background: #5f5bb4;}
        .selected-topics-wrap .coupon-tit .tit-name{ background: #5f5bb4;}
        .selected-topics-wrap .topic-list{ width: 1200px; height: 250px;}
        .selected-topics-wrap .topic-list li{ width: 550px; height: 250px;
            box-shadow: 0 1px 3px -2px rgba(0,0,0,0.12),0 1px 2px rgba(0,0,0,0.24);
            -webkit-transition: 0.5s;  -moz-transition: 0.5s;  -o-transition: 0.5s;  -ms-transition: 0.5s;  transition: 0.5s;
        }
        .selected-topics-wrap .topic-list li a{ display: block; width: 100%; height: 100%;}
        .selected-topics-wrap .topic-list li img{ width: 550px; height: 250px;}

        .selected-topics-wrap .topic-list li:hover{-webkit-transform: translate(0,-6px); -moz-transform: translate(0,-6px); transform: translate(0,-6px);
            -webkit-box-shadow: 0 14px 28px rgba(255,255,255,0.25),0 10px 10px rgba(255,255,255,0.1);
            -moz-box-shadow: 0 14px 28px rgba(255,255,255,0.25),0 10px 10px rgba(255,255,255,0.1);
            box-shadow: 0 14px 28px rgba(255,255,255,0.25),0 10px 10px rgba(255,255,255,0.1);
        }

        #indicatorContainer canvas{ margin: 0 auto;}
    </style>

    <script>
        /*
            radialIndicator.js v 1.0.0
            Author: Sudhanshu Yadav
            Copyright (c) 2015 Sudhanshu Yadav - ignitersworld.com , released under the MIT license.
            Demo on: ignitersworld.com/lab/radialIndicator.html
        */
        !function(t,e,n){"use strict";function r(t){var e=/^#?([a-f\d])([a-f\d])([a-f\d])$/i;t=t.replace(e,function(t,e,n,r){return e+e+n+n+r+r});var n=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(t);return n?[parseInt(n[1],16),parseInt(n[2],16),parseInt(n[3],16)]:null}function i(t,e,n,r){return Math.round(n+(r-n)*t/e)}function a(t,e,n,a,o){var u=-1!=o.indexOf("#")?r(o):o.match(/\d+/g),l=-1!=a.indexOf("#")?r(a):a.match(/\d+/g),s=n-e,h=t-e;return u&&l?"rgb("+i(h,s,l[0],u[0])+","+i(h,s,l[1],u[1])+","+i(h,s,l[2],u[2])+")":null}function o(){for(var t=arguments,e=t[0],n=1,r=t.length;r>n;n++){var i=t[n];for(var a in i)i.hasOwnProperty(a)&&(e[a]=i[a])}return e}function u(t){return function(e){if(!t)return e.toString();e=e||0;for(var n=e.toString().split("").reverse(),r=t.split("").reverse(),i=0,a=0,o=r.length;o>i&&n.length;i++)"#"==r[i]&&(a=i,r[i]=n.shift());return r.splice(a+1,r.lastIndexOf("#")-a,n.reverse().join("")),r.reverse().join("")}}function l(t,e){e=e||{},e=o({},s.defaults,e),this.indOption=e,"string"==typeof t&&(t=n.querySelector(t)),t.length&&(t=t[0]),this.container=t;var r=n.createElement("canvas");t.appendChild(r),this.canElm=r,this.ctx=r.getContext("2d"),this.current_value=e.initValue||e.minValue||0}function s(t,e){var n=new l(t,e);return n.init(),n}var h=2*Math.PI,f=Math.PI/2;l.prototype={constructor:s,init:function(){var t=this.indOption,e=this.canElm,n=this.ctx,r=2*(t.radius+t.barWidth),i=r/2;return this.formatter="function"==typeof t.format?t.format:u(t.format),this.maxLength=t.percentage?4:this.formatter(t.maxValue).length,e.width=r,e.height=r,n.strokeStyle=t.barBgColor,n.lineWidth=t.barWidth,n.beginPath(),n.arc(i,i,t.radius,0,2*Math.PI),n.stroke(),this.imgData=n.getImageData(0,0,r,r),this.value(this.current_value),this},value:function(t){if(void 0===t||isNaN(t))return this.current_value;t=parseInt(t);var e=this.ctx,n=this.indOption,r=n.barColor,i=2*(n.radius+n.barWidth),o=n.minValue,u=n.maxValue,l=i/2;t=o>t?o:t>u?u:t;var s=Math.round(100*(t-o)/(u-o)*100)/100,c=n.percentage?s+"%":this.formatter(t);if(this.current_value=t,e.putImageData(this.imgData,0,0),"object"==typeof r)for(var d=Object.keys(r),m=1,v=d.length;v>m;m++){var g=d[m-1],p=d[m],x=r[g],b=r[p],I=t==g?x:t==p?b:t>g&&p>t?n.interpolate?a(t,g,p,x,b):b:!1;if(0!=I){r=I;break}}if(e.strokeStyle=r,n.roundCorner&&(e.lineCap="round"),e.beginPath(),e.arc(l,l,n.radius,-f,h*s/100-f,!1),e.stroke(),n.displayNumber){var y=e.font.split(" "),C=n.fontWeight,O=n.fontSize||i/(this.maxLength-(Math.floor(1.4*this.maxLength/4)-1));y=n.fontFamily||y[y.length-1],e.fillStyle=n.fontColor||r,e.font=C+" "+O+"px "+y,e.textAlign="center",e.textBaseline="middle",e.fillText(c,l,l)}return this},animate:function(t){var e=this.indOption,n=this.current_value||e.minValue,r=this,i=Math.ceil((e.maxValue-e.minValue)/(e.frameNum||(e.percentage?100:500))),a=n>t;return this.intvFunc&&clearInterval(this.intvFunc),this.intvFunc=setInterval(function(){if(!a&&n>=t||a&&t>=n){if(r.current_value==n)return void clearInterval(r.intvFunc);n=t}r.value(n),n!=t&&(n+=a?-i:i)},e.frameTime),this},option:function(t,e){return void 0===e?this.option[t]:(-1!=["radius","barWidth","barBgColor","format","maxValue","percentage"].indexOf(t)&&(this.indOption[t]=e,this.init().value(this.current_value)),void(this.indOption[t]=e))}},s.defaults={radius:50,barWidth:5,barBgColor:"#eeeeee",barColor:"#99CC33",format:null,frameTime:10,frameNum:null,fontColor:null,fontFamily:null,fontWeight:"bold",fontSize:null,interpolate:!0,percentage:!1,displayNumber:!0,roundCorner:!1,minValue:0,maxValue:100,initValue:0},e.radialIndicator=s,t&&(t.fn.radialIndicator=function(e){return this.each(function(){var n=s(this,e);t.data(this,"radialIndicator",n)})})}(window.jQuery,window,document,void 0);
    </script>
</head>
<body>
    <header id="header">
        <? include '../public_top.php'; ?>
    </header>


    
    <div class="coupon-list-wrap">
        <div class="banner-box" style="background: url('images/demo_8/coupon_banner.jpg') top center no-repeat;">
            <div class="top-btn js-topSubBtn">
                <a href="javascript:;">Warning: Price Crash Ahead</a>
                <span class="sub-tips js-subTips">Click to Subscribe to 11.11,<br/> You will get an 11.11 "Email Countdown"! <i class="trig-bottom"></i></span>
            </div>
        </div>
        
        <section class="coupon-sec">
            <h3 class="coupon-tit">
                <span class="tit-name">PICNIC BUYING</span>
                <span class="line-bg"></span>
            </h3>
            
            <div class="coupon-content">
                <ul class="clearfix coupon-list">
                    <li class="bgcolor-orange">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">100 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="circle-box">
                                    <div id="indicatorContainer"></div>
                                </div>
                                <span class="circle-left">90%<br/> Left</span>
                                <a href="javascript:;" class="status-btn">Discover Deals</a>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-orange">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">50 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="already-box">
                                    <h4 class="coupon">TEST889</h4>
                                    <a href="javascript:;" class="status-btn">Already received</a>
                                </div>
                                <a href="#" class="use-link">Use Link >></a>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-grew">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">65 <i class="num-status">%</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Expired-box">
                                    <h4 class="coupon">TEST889</h4>
                                    <a href="javascript:;" class="status-btn">Coupon Expired</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-grew">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">5 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Unavailable-box">
                                    <a href="javascript:;" class="status-btn">Unavailable Now</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="coupon-sec">
            <h3 class="coupon-tit">
                <span class="tit-name">BRAND COUPONS</span>
                <span class="line-bg"></span>
            </h3>
            
            <div class="coupon-content">
                <ul class="clearfix coupon-list">
                    <li class="bgcolor-lightblue">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">100 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Discover-box">
                                    <a href="javascript:;" class="status-btn">Discover Deals</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-lightblue">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">50 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="already-box">
                                    <h4 class="coupon">TEST889</h4>
                                    <a href="javascript:;" class="status-btn">Already received</a>
                                </div>
                                <a href="#" class="use-link">Use Link >></a>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-grew">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">65 <i class="num-status">%</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Expired-box">
                                    <h4 class="coupon">TEST889</h4>
                                    <a href="javascript:;" class="status-btn">Coupon Expired</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-grew">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">5 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Unavailable-box">
                                    <a href="javascript:;" class="status-btn">Unavailable Now</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="coupon-sec">
            <h3 class="coupon-tit">
                <span class="tit-name">CATEGORY COUPONS</span>
                <span class="line-bg"></span>
            </h3>
            
            <div class="coupon-content">
                <ul class="clearfix coupon-list">
                    <li class="bgcolor-lightred">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">100 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Discover-box">
                                    <a href="javascript:;" class="status-btn">Discover Deals</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-lightred">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">50 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="already-box">
                                    <h4 class="coupon">TEST889</h4>
                                    <a href="javascript:;" class="status-btn">Already received</a>
                                </div>
                                <a href="#" class="use-link">Use Link >></a>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-grew">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">65 <i class="num-status">%</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Expired-box">
                                    <h4 class="coupon">TEST889</h4>
                                    <a href="javascript:;" class="status-btn">Coupon Expired</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-grew">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">5 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Unavailable-box">
                                    <a href="javascript:;" class="status-btn">Unavailable Now</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="coupon-sec">
            <h3 class="coupon-tit">
                <span class="tit-name">MORE COUPONS</span>
                <span class="line-bg"></span>
            </h3>
            
            <div class="coupon-content">
                <ul class="clearfix coupon-list">
                    <li class="bgcolor-yellow">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">100 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Discover-box">
                                    <a href="javascript:;" class="status-btn">Discover Deals</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-yellow">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">50 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="already-box">
                                    <h4 class="coupon">TEST889</h4>
                                    <a href="javascript:;" class="status-btn">Already received</a>
                                </div>
                                <a href="#" class="use-link">Use Link >></a>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-grew">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">65 <i class="num-status">%</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Expired-box">
                                    <h4 class="coupon">TEST889</h4>
                                    <a href="javascript:;" class="status-btn">Coupon Expired</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="bgcolor-grew">
                        <div class="coupon-detail clearfix">
                            <div class="coupon-price fl">
                                <div class="c-p-content">
                                    <h3 class="p-num">5 <i class="num-status">$</i></h3>
                                    <span class="only-status">ONLY for 1st<br/>Unit of the Item</span>
                                </div>
                            </div>

                            <div class="coupon-rule fl">
                                <h5 class="rule-tit">Automobiles & Motorcycle</h5>
                                <p>
                                    <i class="icon-circle"></i>Min Order: <strong>$50   Web Only</strong><br/>
                                    <i class="icon-circle"></i>HK-2 Warehouse Only<br/>
                                    <i class="icon-circle"></i>09/02/2016 UTC~ 09/09/2016 UTC<br/>
                                </p>
                            </div>

                            <div class="coupon-status fr">
                                <div class="Unavailable-box">
                                    <a href="javascript:;" class="status-btn">Unavailable Now</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <div class="blank-bg"></div>

        <section class="selected-topics-wrap">
            <div class="selected-topics-box">
                <h3 class="coupon-tit">
                    <span class="tit-name">SELECTED TOPICS</span>
                    <span class="line-bg"></span>
                </h3>

                <ul class="clearfix topic-list">
                    <li class="fl"><a href="#"><img src="images/demo_8/topic_1.jpg" alt=""></a></li>
                    <li class="fr"><a href="#"><img src="images/demo_8/topic_2.jpg" alt=""></a></li>
                </ul>
            </div>
        </section>

    </div><!-- .coupon-list-wrap -->
   


<footer id="footer">
    <? include '../foot.html'; ?>  
</footer><!--end #footer -->


<script>
$LAB.script("")
    .wait(function(){
        $(function(){
            $('#indicatorContainer').radialIndicator({
                barColor: '#ff7333',
                barBgColor: '#d0400e',
                fontColor: '#ffffff',
                barWidth: 5,
                initValue: 10,
                radius: 40,
                roundCorner : true,
                percentage: true,
                displayNumber: false
            }); 
            
            $('.js-topSubBtn').hover(function(){
                $('.js-subTips').show();
            },function(){
                $('.js-subTips').hide();
            });
            
        });
    })
</script>

</body>
</html>