$(document).ready(function(){

	// scroll nav 
	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 500) {
	        $('nav').addClass('fixed-header');
	    }
	    else {
	        $('nav').removeClass('fixed-header');
	    }
	});	
	
	// tab-content box
	$(".box-content").hide();
	$(".box-content:first").show();
	$("ul li.show-item").addClass('current');
	$("ul li").click(function(){
		$("ul li").removeClass("current");
		$(this).addClass("current");
		$(".box-content").hide();

		var tab_id = $(this).find("a").attr("href");
		$(tab_id ).fadeIn();
	});
	$(window).scroll(function(){
		if($(this).scrollTop()>100){
			$(".go-up").fadeIn();
		}
		else{
			$(".go-up").fadeOut();
		}
	});
	$(".go-up").click(function(){
		$("body, html").animate({scrollTop:0}, 1000);
	});
	//  back-to-top end
	// select option
	
});