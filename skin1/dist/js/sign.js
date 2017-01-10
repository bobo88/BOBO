(function(){
	$(function(){

		//随机取一张图片作为背景
		getBgImg();

		setBgFall();

		$(window).resize(function() {
			setBgFall();

	    })
	});
	function setBgFall(){
		var clientHeight = $(window).height();
		var clientWidth = $(window).width();
		var warpH = clientHeight;

		cutBgImg(clientWidth,warpH);
	}

	//随机取一张图片作为背景
	function getBgImg(wWd,wHt){
		var $imgbg = $("#imgbg"),
			imgArr = $imgbg.data("imgsrc").split("|");

		//随机取出来一张图片
		$img = $('<img src="'+imgArr[parseInt(Math.random()*imgArr.length,10)]+'" width="100%" height="100%"/>');
		$imgbg.html($img);
	}

	function cutBgImg(wWd,wHt){
		var $img = $("#imgbg").find('img');

		var imgWd = 1920,
			imgHt = 1000,
			newImgWd,
			NewImgHt,
			top=0,
			left=0;

		if(wWd>wHt){//判断电脑是横幅
		   newImgWd=wWd;
		   NewImgHt	= wWd*imgHt/imgWd;

		  if(NewImgHt<wHt){//如果新算出来的图片高度还是小于窗口的高度就以窗口的高度为基准
			    NewImgHt=wHt;
		   		newImgWd=imgWd*wHt/imgHt;
				left = (0-(newImgWd-wWd))/2;

		   }else{
			   top = (0-(NewImgHt-wHt))/2;
		   }

		}else{//判断电脑是竖立
		   NewImgHt=wHt;
		   newImgWd=imgWd*wHt/imgHt;

		   if(newImgWd<wWd){//如果新算出来的图片宽度还是小于窗口的宽度就以窗口的宽度为基准
		   		newImgWd = wWd;
				NewImgHt = wWd*imgHt/imgWd;
				top = (0-(NewImgHt-wHt))/2;

		   }else{
				left = (0-(newImgWd-wWd))/2;
		   }
		}
		$img.css({"height":NewImgHt,"width":newImgWd,"top":top,"left":left});
	}
})();


// 添加自定义验证方法：电话
$.validator.addMethod("mobile", function(value, element) {
        var length = value.length;
        var mobile =  /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/
        return this.optional(element) || (length == 11 && mobile.test(value));
}, "手机号码格式错误");

//填写登录信息
(function(){
	var $loginForm = $("#js-signinform");
	if($loginForm.length > 0){
		$loginForm.validate({
			rules: {
				phone: {
					required: true,
					mobile:true 
				},
			    password: {
			        required: true,
			        maxlength: 60,
			        minlength: 6
			    }
			},
			messages: {
				phone: {
					required: '请输入大陆地区手机号码',
					mobile:'请输入正确的手机格式'
				},
			    password: {
			        required:  '请设置密码',
			        minlength: '密码长度必须大于6个字符'
			    }
			},
			submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form 
				var $submitLoginForm = $('#js-submitLoginForm');
			    $submitLoginForm.attr('disabled','disabled');
			    $.ajax({
			    	url: 'src_login.php',
			    	type: 'POST',
			    	dataType: 'json',
			    	data: $('#js-signinform').serialize(),
			    })
			    .done(function(data) {
			    	//status:0 表示登录不成功，弹出msg
			    	if(data.status === 1){
			    		if(data.username){
			    			// $.cookie('username','bobo', {expires: 7, path: '/',domain:'www.yuanbo88.com'});
			    			// $.cookie('username',data.username, {expires: 7, path: '/',domain:'www.yuanbo88.com'});
			    			var refUrl = $('#ref').val() ? $('#ref').val() : '';
			    			if(refUrl){
			    				window.location.href = refUrl;
			    			}else{
			    				window.location.href = DOMAIN;
			    			}
			    		}
			    		// GLOBAL.PopObj.alert({content: '恭喜您，登录成功!'});
			    		// document.getElementById("js-signinform").reset(); //重置form表单
			    	}else{
			    		GLOBAL.PopObj.alert({content: data.msg});
			    	}
			    	$submitLoginForm.attr('disabled',false);
			    });  
			}, 
			errorPlacement:function(error,element){
			    element.parent().find("label.checked").remove();
			    error.appendTo(element.parent());
		    },
			success: function(label) {
			    label.remove();
			}
	    });
	}
})();

//填写注册信息
(function(){
	var $registerForm = $("#js-signupform");
	if($registerForm.length > 0){
		$registerForm.validate({
			rules: {
				phone: {
					required: true,
					mobile:true 
				},
				nickname: {
					required: true,
					minlength: 4
				},
				regcode: {
					required: true,
					maxlength: 4,
				    minlength: 4
				},
			    password: {
			        required: true,
			        maxlength: 60,
			        minlength: 6
			    },
			    password_confirm: {
			        required: true,
			        minlength: 6,
			        maxlength: 60,
			        equalTo: $("#js-regPassword")
			    }
			},
			messages: {
				phone: {
					required: '请输入大陆地区手机号码',
					mobile:'请输入正确的手机格式'
				},
				nickname: {
					required: '请输入昵称',
					minlength: '昵称长度不能小于4个字符'
				},
				regcode: {
					required: '请输入验证码',
					maxlength: '验证码长度必须为4位',
				    minlength: '验证码长度必须为4位'
				},
			    password: {
			        required:  '请设置密码',
			        minlength: '密码长度必须大于6个字符'
			    },
			    password_confirm: {
			        required:  '请再次确认密码',
			        minlength: '密码长度必须大于6个字符',
			        equalTo:   '两次密码输入不一致'
			    }
			},
			submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form 
				var $submitRegForm = $('#js-submitRegForm');
			    $submitRegForm.attr('disabled','disabled');
			    $.ajax({
			    	url: 'src_reg.php',
			    	type: 'POST',
			    	dataType: 'json',
			    	data: $('#js-signupform').serialize(),
			    })
			    .done(function(data) {
			    	//status:0 表示注册不成功，弹出msg
			    	if(data.status === 1){
			    		GLOBAL.PopObj.alert({content: '恭喜您，注册成功! 3秒后自动跳转到登录页面...'});
			    		document.getElementById("js-signupform").reset(); //重置form表单
			    		setTimeout(function(){
			    			window.location.href = DOMAIN + '/sign.html';
			    		}, 3000);
			    	}else{
			    		GLOBAL.PopObj.alert({content: data.msg});
			    	}
			    	$submitRegForm.attr('disabled',false);
			    });  
			}, 
			errorPlacement:function(error,element){
			    element.parent().find("label.checked").remove();
			    error.appendTo(element.parent());
		    },
			success: function(label) {
			    label.remove();
			}
	    });
	}
})();


//admin--填写登录信息
(function(){
	var $loginForm = $("#js-adminSigninform");
	if($loginForm.length > 0){
		$loginForm.validate({
			rules: {
				phone: {
					required: true,
					mobile:true 
				},
			    password: {
			        required: true,
			        maxlength: 60,
			        minlength: 6
			    }
			},
			messages: {
				phone: {
					required: '请输入大陆地区手机号码',
					mobile:'请输入正确的手机格式'
				},
			    password: {
			        required:  '请设置密码',
			        minlength: '密码长度必须大于6个字符'
			    }
			},
			submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form 
				var $submitLoginForm = $('#js-submitAdminLoginForm');
			    $submitLoginForm.attr('disabled','disabled');
			    $.ajax({
			    	url: 'src_adminlogin.php',
			    	type: 'POST',
			    	dataType: 'json',
			    	data: $('#js-adminSigninform').serialize(),
			    })
			    .done(function(data) {
			    	//status:0 表示登录不成功，弹出msg
			    	if(data.status === 1){
			    		if(data.username){
			    			// $.cookie('username',data.username, {expires: 7, path: '/'});
			    			window.location.href = DOMAIN+'/article_publish.html';
			    		}
			    	}else{
			    		GLOBAL.PopObj.alert({content: data.msg});
			    	}
			    	$submitLoginForm.attr('disabled',false);
			    });  
			}, 
			errorPlacement:function(error,element){
			    element.parent().find("label.checked").remove();
			    error.appendTo(element.parent());
		    },
			success: function(label) {
			    label.remove();
			}
	    });
	}
})();


$(function(){
	$("#js-signWrapBox").find(".input-group").find("input").on("focus",function(){
		var $this = $(this),
			$thisParent = $this.parents(".input-group");
		$thisParent.addClass('active').siblings('.input-group').removeClass('active');
	});

	//Refresh reg-code
	$('#js-checkpic').click(function(){
		var $this = $(this);
		var thisSrc = $this.attr('src');
		$this.attr('src',thisSrc+'?' + new Date().getTime());
	});
});

