// JavaScript Document
//定义空间命名
window.GLOBAL ={};

//*********************弹出框相关对象
GLOBAL.PopObj = {
    iframe : function(options){
        var defaultOpts = {
            shade : [0.8 , '#000' , true],
            type : 2,
            title : false,
            shadeClose : true,
            bgcolor : '#fff',
            closeBtn : [1 , true],
            area : ['auto','auto'],
            offset : ['100px' , '50%'],
            border : [1, 1, '#ddd', true],
            iframe : {src : ''},
            close : function(index){
                layer.close(index);
            }
        }
        defaultOpts = $.extend(true,defaultOpts,options );
        return layer.open(defaultOpts);
    },
    confirm:function(options){
        var defaultOpts = {
            shade : [0], //不显示遮罩
            area : ['auto','auto'],
            title: 'Message',
            border : [10, 0.8, '#666', false],
            dialog : {
                msg:'Are you sure?',
                btns : 2,
                type : 4,
                btn : ['Yes','No'],
                yes : function(){

                },
                no : function(index){
                    layer.close(index);
                }
            }
        }

        defaultOpts = $.extend(true,defaultOpts,options );
        return layer.open(defaultOpts);
    },
    /**
     * 模拟alert框
     * @param  {[type]} options.msg         文本 默认没有
     * @param  {[type]} options.title       标题 默认没有
     * @param  {[type]} options.shade       遮罩层 默认有
     * @param  {[type]} options.typeTag     弹出框信息类型0-15,-1不显示
     * @param  {[type]} options.callBack    确认按钮回调函数
     * @param  {[type]} options.callBackArg 确认按钮回调函数回调函数的参数
     * @return {[type]} null        [description]
     */
    alert:function(options){
        var defaultOpts = {
            type : options.typeTag ? options.typeTag : 0,
            title: options.title ? options.title : 'Message',
            area : ['auto','auto'],
            btn : 'OK',
            closeBtn : options.closeBtn ? options.closeBtn : 1,
            shade : options.shade ? options.shade : [0.8 , '#000' , true],
            border : [1, 1, '#ddd', true],
            content : options.content,
            yes : function(index){
                options.callBack ? options.callBack(options.callBackArg ? options.callBackArg : "") : "";
                layer.close(index);
            }
        }
        // defaultOpts = $.extend(true,defaultOpts,options );
        return layer.open(defaultOpts);
    },
    closePop : function(index){
        var id = "";
        id = arguments.length>0 ? index : "";
        layer.close(index);
    }
};

//*********************************************************************图片懒加载
GLOBAL.lazyLoad = {
    scrollLazyLoad : function(selectBox){
        var $selectBox = $(selectBox);

        $selectBox.lazyload({
            threshold : 100,
            effect: "fadeIn",
            failure_limit : 60,
            skip_invisible : false
        });
    }
};

GLOBAL.validate_addMethod = {
    mobileReg : /^(((13[0-9]{1})|(15[0-9]{1})|(17[06-8]{1})|(14[5-7]{1})|(18[0-9]{1}))+\d{8})$/,

    mobile : function(){
        var that = this;
        $.validator.addMethod("mobile", function(value, element) {
                var length = value.length;
                var mobile =  that.mobileReg;
                return this.optional(element) || (length == 11 && mobile.test(value));
        }, "手机号码格式错误");
    },

    businessTel: function(){
        var that = this;
        jQuery.validator.addMethod("businessTel",function(value, element) {
                    var length = value.length;
                    var mobile =  that.mobileReg;
                    var tel = /^0\d{2,3}-?\d{7,8}$/;
                    return this.optional(element) || (length == 11 && mobile.test(value))|| (tel.test(value));
                },phoneMsg
        );

    },
    idnumber : function(){
        jQuery.validator.addMethod("idnumber", function(value, element) {
                var idnumber = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
                return this.optional(element) || (idnumber.test(value));
            }, "身份证号码格式错误");
    },
    passwordStrength:function(){
        // 只做纯数字和纯字母判断
        jQuery.validator.addMethod("passwordStrength", function(value, element) {
            return (!(/^\d+$/.test(value)) && !(/^[a-zA-Z]+$/.test(value)));
        }, "密码过于简单，请输入数字字母组合");
    },
    notEqualTo : function(){
        jQuery.validator.addMethod("notEqualTo",function(value, element, param) {
                return this.optional(element) || value!=$(param).val();
            },"Each element should have a different value"
        );
    },
    checkUserName : function(){
        jQuery.validator.addMethod("checkUserName", function(value, element) {   
            var tel = /\d/;
            return this.optional(element) || (!tel.test(value));
        }, 'Can not contain numbers');
    }
}

//收藏本站
GLOBAL.AddFavorite = function(title, url) {
    try {
        window.external.addFavorite(url, title);
    }
    catch (e) {
        try {
            window.sidebar.addPanel(title, url, "");
        }
        catch (e) {
            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}

//检查信息（登录信息)
// function info_check(){ 
//     var username = $.cookie("username");
//     //如果登录了
//     if(username){
//         $('.js-userName').html('<strong>'+username+'</strong>');
//         $('.js-isLogin').show(); 
//         $('.js-isNotLogin').hide();
//     }else{
//        $('.js-isLogin').hide(); 
//        $('.js-isNotLogin').show(); 
//     }
// }

function getKey(){
    if(event.keyCode==13){
        $('#js-globalSearch').trigger('click');
    } 
}

$(function(){
    //判断是否登录
    // info_check();
    
    //全局搜索
    $('#js-globalSearch').click(function(){
        var $searchInput = $('#js-searchInput'),
            $errorTips = $('.js-errorTips'),
            inputVal = $.trim($searchInput.val());

        if( inputVal.length > 0 ){
            window.location.href = DOMAIN + '/search.html?key=' + inputVal;
        }else{
            $errorTips.html('搜索关键词不能为空！').show();
            $searchInput.val('').focus();
            setTimeout(function(){
                $errorTips.fadeOut();
            }, 2000);
        }
    });

    //点击退出登录
    $('.js-logout').click(function(){
        // $.cookie("username",null,{path:"/",domain:'www.yuanbo88.com'});
        $.ajax({
            url: DOMAIN + '/logout.html',
            type: 'POST',
            dataType: 'json',
        })
        .done(function(data) {
            if(data.status === 1){
                window.location.href = window.location.href;
            }else{
                GLOBAL.PopObj.alert({content: '退出失败！关闭浏览器也可以退出登录状态。'});
            }
        });
    });

    //图片懒加载
    GLOBAL.lazyLoad.scrollLazyLoad($("img[data-original]"));
    
    //回到顶部
    $(window).scroll(function(event) {
        var html = '<div class="goTop js_goTop"><a href="javascript:;"><i class="icon-goTop c_tagbg"></i><span>回到顶部</span></a></div>';
        if($(window).scrollTop() > 0 ){
            $("body").find(".goTop").length > 0 ? $("body").find(".goTop").fadeIn() : $("body").append(html).fadeIn();
        }else{
            $("body").find(".goTop").fadeOut();
        }  
    });
    $("body").on("click",".js_goTop",function(){
        $("html,body").animate({scrollTop:0}, 500);
    });


    $(".js-newFeaturesClose").click(function(event){
        $("#popUp-div").animate({width:"0%"}, 1000);
        setTimeout(function(){
            $("#popUp-div").addClass('none');
            $("#putUp-div").removeClass('none');
        },1000);
    });
    $("#putUp-div").click(function(event) {
        $(this).addClass('none');
        $("#popUp-div").removeClass('none').animate({width:"100%"}, 1000);
    });
    
});

