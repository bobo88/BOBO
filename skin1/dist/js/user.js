;(function ($,window,$LAB) {
    /**
     * 统一所有用户中心操作 通过 USER 对象
     * @type {{allAjaxUrl: {commissionToCashUrl: string}, userAjax: {getAjaxPromise: Function, ajaxSuccessCall: Function, ajaxSuccessFailCall: Function}, otherGlobal: {setTopStep: Function}}}
     */
    window.USER = {
        allAjaxUrl: {
            //修改个人资料
            editProfileUrl: '/m-users-a-edit_profile.html',

            //修改密码
            changePasswordUrl: '/m-users-a-change_password.html',

            //文章发表
            articlePublishUrl: '/m-users-a-article_publish.html',

            //新增首页banner
            addHomeBannerUrl: '/m-users-a-add_home_banner.html',
            //更改首页banner
            changeHomeBannerUrl: '/m-users-a-change_home_banner.html',
            //删除首页banner
            removeHomeBannerUrl: '/m-users-a-remove_home_banner.html',

            //新增参考书籍
            addRefBookUrl: '/m-users-a-add_refbook.html',
            //更改参考书籍
            changeRefBookUrl: '/m-users-a-change_refbook.html',
            //删除参考书籍
            removeRefBookUrl: '/m-users-a-remove_refbook.html',

            //新增微话题
            addWeiUrl: '/m-users-a-wei_add.html',
            //更改微话题
            changeWeiUrl: '/m-users-a-wei_change.html',
            //删除微话题
            removeWeiUrl: '/m-users-a-wei_remove.html',

            //新增演示案例
            addDemocaseUrl: '/m-users-a-democase_add.html',
            //更改演示案例
            changeDemocaseUrl: '/m-users-a-democase_change.html',
            //删除演示案例
            removeDemocaseUrl: '/m-users-a-democase_remove.html'
        },
        linkToUrl: {
            // 登录地址
            loginUrl:'/sign.html',

            // 个人资料地址
            myProfileUrl:'/my-profile.html',

            //文章发表地址
            articleUrl: '/m-article-publish.html',

            //首页管理
            homeBannerUrl: '/m-home.html',

            //参考书籍管理
            refBookUrl: '/m-ref-book.html',

            //微话题管理
            weiUrl: '/m-wei-topic.html',

            //演示案例管理
            democaseUrl: '/m-demo-case.html'
        },
        userAjax: {
            // ajax 方法
            getAjaxPromise: function (ajaxOptions, isAutoCallBack) {    // 统一 ajax 请求，返回 def
                isAutoCallBack = ((arguments.length) > 1) ? isAutoCallBack : true;
                var defaults = {
                    type: 'POST',
                    global: true,
                    dataType: 'json'
                };
                ajaxOptions = $.extend({}, defaults, ajaxOptions);
                var promise = $.ajax(ajaxOptions);
                if (isAutoCallBack) {
                    this.ajaxSuccessCall(promise);
                }
                return promise;
            },
            ajaxSuccessCall: function (promise) {
                // ajax 成功后自动回调
                var that = this;
                promise.done(function (result) {
                    if (result.status != 0) {
                        that.ajaxSuccessFailCall(result);
                    }
                });
            },
            ajaxSuccessFailCall: function (result) { // ajax 成功，返回数据 status !0 回调
                var errorMsg = result.msg;
                USER.otherGlobal.layerAlertReload(errorMsg);
            }
        },
        profile: {
            profileFormObj: '',       // jQuery 对象
            changePassFormObj: '',    // jQuery 对象

            profileValidate: function () {
                USER.otherGlobal.getMyValidate(this.profileFormObj,{
                    rules: {
                        nickname: {
                            rangelength: [4, 25]
                        },
                        email: {
                            email: true
                        },
                        profilecode: {
                            required: true,
                            maxlength: 4,
                            minlength: 4
                        }
                    },
                    messages: {
                        nickname: {
                            rangelength: $.validator.format("昵称长度在 {0} 和 {1} 之间")
                        },
                        email: {
                            email: "请输入正确的邮箱地址"
                        },
                        profilecode: {
                            required: '请输入验证码',
                            maxlength: '验证码长度必须为4位',
                            minlength: '验证码长度必须为4位'
                        }
                    }
                });
            },
            profileForm: function ($form) {
                var that = this;
                that.profileFormObj = $form;

                $LAB.script("jquery.validate.min.js")
                    .wait(function () {
                        that.profileValidate();

                        $(".js_submit").on("click", function (event) {
                            event.preventDefault();
                            var $submitBtn = $(this);
                            if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                                GLOBAL.PopObj.alert({content: '数据保存中，不要着急...'});
                                return false;
                            }

                            if (that.profileFormObj.valid()) {
                                // that.profileFormObj[0].submit();
        
                                $submitBtn.attr('data-doing', 1);
                                USER.userAjax.getAjaxPromise({
                                    url: USER.allAjaxUrl.editProfileUrl,
                                    data: that.profileFormObj.serialize()
                                }, true)
                                    .done(function (result) {
                                        if (result.status === 1) {
                                            USER.otherGlobal.openPop({
                                                area: ['500px', "300px"], //宽高
                                                end: function () {
                                                    USER.otherGlobal.windowReload(USER.linkToUrl.myProfileUrl);
                                                }
                                            });
                                        }else{
                                            USER.otherGlobal.layerAlertReload(result.msg);
                                        }
                                        $submitBtn.attr('data-doing',0);
                                    })
                                    .fail(function () {
                                        USER.otherGlobal.layerAlertReload("个人资料修改失败，点击确定重试！");
                                    });
                            }
                        });
                    });

            },
            changePassValidate: function () {
                USER.otherGlobal.getMyValidate(this.changePassFormObj,{
                    rules: {
                        current_password: {
                            required: true,
                            rangelength: [6, 16]
                        },
                        password: {
                            required: true,
                            rangelength: [6, 16],
                            notEqualTo: "#js_currentPass"
                        },
                        password_confirm: {
                            required: true,
                            rangelength: [6, 16],
                            equalTo: $("#js_password")
                        },
                        security_code: {
                            required: true
                        }
                    },
                    messages: {
                        current_password: {
                            required: "请输入当前密码",
                            rangelength: $.validator.format("密码长度在 {0} 到 {1} 个字符之间")
                        },
                        password: {
                            required: "请输入新密码",
                            rangelength: $.validator.format("密码长度在 {0} 到 {1} 个字符之间"),
                            notEqualTo: "请设置不同的密码"
                        },
                        password_confirm: {
                            required: "请确认密码",
                            rangelength: $.validator.format("密码长度在 {0} 到 {1} 个字符之间"),
                            equalTo: '请确认两次输入密码相同'
                        },
                        security_code: {
                            required: "请输入验证码"
                        }
                    }
                });
            },
            changePassEvent: function () {
                // 刷新验证码
                // this.changePassFormObj.find("#js-checkpic").click(function () {
                //     var $this = $(this);
                //     var thisSrc = $this.attr('src');
                //     $this.attr('src',thisSrc+'?' + new Date().getTime());
                // });
            },
            changePassForm: function ($form) {
                var that = this;
                that.changePassFormObj = $form;
                that.changePassEvent();
                $LAB.script("jquery.validate.min.js")
                    .wait(function () {
                        that.changePassValidate();
                        $(".js_submit").on("click", function (event) {
                            event.preventDefault();
                            if (that.changePassFormObj.valid()) {
                                // do ....
                                USER.userAjax.getAjaxPromise({
                                    url: USER.allAjaxUrl.changePasswordUrl,
                                    data: that.changePassFormObj.serialize()
                                }, true)
                                    .done(function (result) {
                                        if (result.status === 1) {
                                            USER.otherGlobal.openPop({
                                                area: ['500px', "300px"], //宽高
                                                end: function () {
                                                    USER.otherGlobal.windowReload(USER.linkToUrl.loginUrl);
                                                }
                                            });
                                        }else{
                                            USER.otherGlobal.layerAlertReload(result.msg);
                                        }
                                    })
                                    .fail(function () {
                                        USER.otherGlobal.layerAlertReload("密码修改失败，点击确定重试！");
                                    });
                            }
                        });
                    });
            }
        },
        article: {
            articleFormObj: '', // jQuery 对象

            articlePublishValidate: function(){
                USER.otherGlobal.getMyValidate(this.articleFormObj,{
                    rules: {
                        title: {
                            required: true
                        },
                        summary: {
                            required: true,
                            maxlength: 200,
                            minlength: 10
                        },
                        content: {
                            required: true,
                            minlength: 200
                        },
                        keyword: {
                            required: true
                        }
                    },
                    messages: {
                        title: {
                            required: '请输入文章标题'
                        },
                        summary: {
                            required:  '请输入文章简介',
                            maxlength: '文章简介不能大于200个字符',
                            minlength: '文章简介不能小于10个字符'
                        },
                        content: {
                            required: '请输入文章内容',
                            minlength: '文章内容不能小于200个字符'
                        },
                        keyword: {
                            required: '请输入关键词'
                        }
                    },
                });
            },
            articlePublishEvent: function () {
                // 聚焦
                this.articleFormObj.find("input,select,textarea").on("focus",function(){
                    var $this = $(this),
                        $thisParent = $this.parents(".options");
                    $thisParent.addClass('active').siblings('.options').removeClass('active');
                });
            },
            articlePublishForm: function($form){
                var that = this;
                that.articleFormObj = $form;
                that.articlePublishEvent();

                $LAB.script("jquery.validate.min.js")
                    .wait(function () {
                        that.articlePublishValidate();

                        $(".js_submit").on("click", function (event) {
                            event.preventDefault();
                            var $submitBtn = $(this);
                            if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                                GLOBAL.PopObj.alert({content: '文章发表中，不要着急...'});
                                return false;
                            }

                            if (that.articleFormObj.valid()) {
                
                                $submitBtn.attr('data-doing', 1);
                                USER.userAjax.getAjaxPromise({
                                    url: USER.allAjaxUrl.articlePublishUrl,
                                    data: that.articleFormObj.serialize()
                                }, true)
                                    .done(function (result) {
                                        if (result.status === 1) {
                                            USER.otherGlobal.openPop({
                                                area: ['500px', "300px"], //宽高
                                                end: function () {
                                                    USER.otherGlobal.windowReload(USER.linkToUrl.articleUrl);
                                                }
                                            });
                                        }else{
                                            USER.otherGlobal.layerAlertReload(result.msg);
                                        }
                                        $submitBtn.attr('data-doing',0);
                                    })
                                    .fail(function () {
                                        USER.otherGlobal.layerAlertReload("文章发表失败，点击确定重试！");
                                    });
                            }
                        });
                    });

            }
        },
        home: {
            addHomeBannerForm: function($form){
                var that = this,
                    thisForm = $form;

                $(".js_submitAdd").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                   
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: 'Banner新增中，不要着急...'});
                        return false;
                    }
            
                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.addHomeBannerUrl,
                        reloadUrl:  USER.linkToUrl.homeBannerUrl,
                        failAlert: "Banner新增失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            },
            changeHomeBannerForm: function($form){
                var that = this,
                    thisForm = $form;

                $(".js_submitChange").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                    
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: 'Banner更改中，不要着急...'});
                        return false;
                    }

                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.changeHomeBannerUrl,
                        reloadUrl:  USER.linkToUrl.homeBannerUrl,
                        failAlert: "Banner更改失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            },
            removeHomeBannerForm: function($form){
                var that = this,
                    thisForm = $form;
                $(".js_submitRemove").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                    
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: 'Banner删除，不要着急...'});
                        return false;
                    }
            
                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.removeHomeBannerUrl,
                        reloadUrl:  USER.linkToUrl.homeBannerUrl,
                        failAlert: "Banner删除失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            }
        },
        refbook: {
            addRefBookForm: function($form){
                var that = this,
                    thisForm = $form;

                $(".js_submitAdd").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                   
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: '参考书籍新增中，不要着急...'});
                        return false;
                    }
            
                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.addRefBookUrl,
                        reloadUrl:  USER.linkToUrl.refBookUrl,
                        failAlert: "参考书籍新增失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            },
            changeRefBookForm: function($form){
                var that = this,
                    thisForm = $form;

                $(".js_submitChange").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                    
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: '参考书籍更改中，不要着急...'});
                        return false;
                    }

                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.changeRefBookUrl,
                        reloadUrl:  USER.linkToUrl.refBookUrl,
                        failAlert: "参考书籍更改失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            },
            removeRefBookForm: function($form){
                var that = this;
                var thisForm = $form;
                $(".js_submitRemove").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                    
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: '参考书籍删除中，不要着急...'});
                        return false;
                    }
            
                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.removeRefBookUrl,
                        reloadUrl:  USER.linkToUrl.refBookUrl,
                        failAlert: "参考书籍删除失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            }
        },
        wei: {
            addWeiTopicForm: function($form){
                var that = this,
                    thisForm = $form;

                $(".js_submitAdd").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                   
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: '微话题新增中，不要着急...'});
                        return false;
                    }
            
                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.addWeiUrl,
                        reloadUrl:  USER.linkToUrl.weiUrl,
                        failAlert: "微话题新增失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            },
            changeWeiTopicForm: function($form){
                var that = this,
                    thisForm = $form;

                $(".js_submitChange").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                    
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: '微话题更改中，不要着急...'});
                        return false;
                    }

                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.changeWeiUrl,
                        reloadUrl:  USER.linkToUrl.weiUrl,
                        failAlert: "微话题更改失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            },
            removeWeiTopicForm: function($form){
                var that = this;
                var thisForm = $form;
                $(".js_submitRemove").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                    
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: '微话题删除中，不要着急...'});
                        return false;
                    }
            
                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.removeWeiUrl,
                        reloadUrl:  USER.linkToUrl.weiUrl,
                        failAlert: "微话题删除失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            }
        },
        democase: {
            addDemocaseForm: function($form){
                var that = this,
                    thisForm = $form;

                $(".js_submitAdd").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                   
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: '演示案例新增中，不要着急...'});
                        return false;
                    }
            
                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.addDemocaseUrl,
                        reloadUrl:  USER.linkToUrl.democaseUrl,
                        failAlert: "演示案例新增失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            },
            changeDemocaseForm: function($form){
                var that = this,
                    thisForm = $form;

                $(".js_submitChange").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                    
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: '演示案例更改中，不要着急...'});
                        return false;
                    }

                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.changeDemocaseUrl,
                        reloadUrl:  USER.linkToUrl.democaseUrl,
                        failAlert: "演示案例更改失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            },
            removeDemocaseForm: function($form){
                var that = this;
                var thisForm = $form;
                $(".js_submitRemove").on("click", function (event) {
                    event.preventDefault();
                    var $submitBtn = $(this),
                        $inputArr = thisForm.find('input'),
                        validate = USER.otherGlobal.inputRequiredValidate($inputArr),
                        AjaxFunOptions = null;
                    
                    if(!validate){//没有验证通过
                        $submitBtn.attr('data-doing',0);
                        return false;
                    }

                    if( parseInt($submitBtn.attr('data-doing')) === 1 ){
                        GLOBAL.PopObj.alert({content: '演示案例删除中，不要着急...'});
                        return false;
                    }
            
                    $submitBtn.attr('data-doing', 1);
                    AjaxFunOptions = {
                        subBtn: $submitBtn,
                        thisForm: thisForm,
                        ajaxUrl: USER.allAjaxUrl.removeDemocaseUrl,
                        reloadUrl:  USER.linkToUrl.democaseUrl,
                        failAlert: "演示案例删除失败，点击确定重试！"
                    };
                    USER.otherGlobal.ajaxSubFun(AjaxFunOptions);
                });
            }
        },
        otherGlobal: {
            layerIndex: "",    // 控制 弹窗关闭
            // window reload
            windowReload: function (url) {
                url = url || "";
                if (url === "") {
                    window.location.reload(true);
                } else {
                    window.location.href = url;
                }
            },

            layerAlertReload: function (msg, url) {
                url = url || "";
                layer.alert(msg, {
                    end: function () {
                        USER.otherGlobal.windowReload(url);
                    }
                }, function () {
                    USER.otherGlobal.windowReload(url);
                });
            },
            openPop: function (options, isCloseBtn) {
                var $pop = $("#js_pop");
                var that = this;
                options = $.extend({}, {
                    type: 1,
                    shadeClose: false,
                    title: "提示",
                    area: ['500px', "350px"], //宽高
                    content: $pop,
                    end: function () {}
                }, options);
                that.layerIndex = layer.open(options);

                // 是否需要关闭按钮
                isCloseBtn = (arguments.length > 1) ? isCloseBtn : false;
                if (isCloseBtn) {
                    $pop = options.content; // 只能传入 jquery 对象
                    var $cancelBtn = $pop.find(".js_cancel");
                    $cancelBtn.off("click");
                    $cancelBtn.on("click", function (event) {
                        event.preventDefault();
                        layer.close(that.layerIndex);
                    });
                }
            },
            setCheckBox: function () {
                // 模拟 checkbox 事件
                $(".js_checkbox").click(function () {
                    var o = $(this).siblings(".js_inputCheckbox")[0];
                    $(this).toggleClass("selected");
                    o.checked = !o.checked;
                });
            },
            // validator 默认设置
            getMyValidate : function ($form,options) {
                // 默认validate 方法
                jQuery.validator.addMethod("notEqualTo",function(value, element, param) {
                        return this.optional(element) || value!=$(param).val();
                    },"Each element should have a different value"
                );
                GLOBAL.validate_addMethod.notEqualTo();

                jQuery.validator.setDefaults({
                    debug: false,
                    success: "valid",
                    ignore: ""
                });

                options = $.extend({
                    errorClass: "form-error",
                    wrapper: "p",
                    success: function (label) {
                        label.remove();
                    },
                    errorPlacement: function (error, element) {
                        element.parent().parent().find(".error").remove();
                        error.prepend('<span class="span-form-label">&nbsp;</span>');
                        error.addClass("error").appendTo(element.parent().parent());
                    }
                },options);

                return $form.validate(options);
            },

            //input 必填  USER.otherGlobal.inputRequiredValidate()
            inputRequiredValidate: function($inputArr){
                var validateStatus = true;
                $.each($inputArr, function(index, val) {
                    var that = $(val);
                    if(!(that.val().length > 0)){
                        GLOBAL.PopObj.alert({content: '请输入完整信息！'});
                        validateStatus = false;
                    }
                });

                return validateStatus;
            },

            /**
             * 点击提交时发送Ajax Fun
             * @param options：
             *  options.subBtn: 当前点击按钮，jQuery对象；
                options.thisForm: 当前提交表单，jQuery对象；
                options.ajaxUrl: 当前异步请求地址；
                options.reloadUrl:  当前请求成功后reload地址；
                options.failAlert:  请求失败信息，字符串
             */
            ajaxSubFun: function(options){
                USER.userAjax.getAjaxPromise({
                    url: options.ajaxUrl,
                    data: options.thisForm.serialize()
                }, true)
                    .done(function (result) {
                        if (result.status === 1) {
                            USER.otherGlobal.openPop({
                                area: ['500px', "300px"], //宽高
                                end: function () {
                                    USER.otherGlobal.windowReload(options.reloadUrl);
                                }
                            });
                        }else{
                            USER.otherGlobal.layerAlertReload(result.msg);
                        }
                        options.subBtn.attr('data-doing',0);
                    })
                    .fail(function () {
                        USER.otherGlobal.layerAlertReload(options.failAlert);
                    });
            },

            /**
             * reset validete 错误和表单
             * @param formObj 表单dom对象
             * @param formValidate validate对象
             */
            resetForm : function(formObj,formValidate){
                formObj.reset();            // form reset
                formValidate.resetForm();   // validate reset
            }
        }
    };

    $(function () {
        //Refresh reg-code
        $('#js-checkpic').click(function(){
            var $this = $(this);
            var thisSrc = $this.attr('src');
            $this.attr('src',thisSrc+'?' + new Date().getTime());
        });

        $('#js-pbRighttopNav').on('click','li', function(){
            var that = $(this);
            var index = $('#js-pbRighttopNav').find('li').index(that);
            that.addClass('current').siblings('li').removeClass('current');
            $('.js-pbRightContent').find('.user-global-form').eq(index).show().siblings('.user-global-form').hide();
        });
    });

})(jQuery,window,$LAB);