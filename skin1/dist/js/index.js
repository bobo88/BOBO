(function($){
	var $banner = $('#js-banner');
	$banner.flexslider({
	 	namespace:"",
	    animation: "fade",
	    selector: ".slideList > li",
	    pauseOnAction:false,
	    directionNav: true, 
	    pauseOnHover: true,
	    slideshowSpeed: 10000,
        start: function () {
			var slideListLen = $banner.find(".slideList li").length;
			if(slideListLen >= 2){
				$banner.hover(function() {
					$(this).find('.direction-nav a').show();
				}, function() {
					$(this).find('.direction-nav a').hide();
				});
			}else{
				$banner.find(".direction-nav").hide();
			}
		}
	});
})(jQuery);

(function($){
	var $demoWrap = $('#js-someDemoWrap');
	$demoWrap.flexslider({
	 	namespace:"",
	    animation: "slide",
	    selector: ".slideList > li",
	    pauseOnAction:false,
	    controlNav:false,
	    directionNav: true, 
	    pauseOnHover: true,
	    slideshowSpeed: 10000,
	    minItems: 3,//最少显示多少项
	    itemWidth: 280,//一个滚动项目的宽度
	    itemMargin: 80
	});
})(jQuery);

$(function(){
	$('#js-widgetBox li').hover(function(){
		$(this).find('.title').slideDown();
	},function(){
		$(this).find('.title').slideUp();
	});
});

