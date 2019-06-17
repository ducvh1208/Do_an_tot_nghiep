
$(document).ready(function(){
	// scroll nav 
	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 200) {
	        $('nav').addClass('fixed-header');
	    }
	    else {
	        $('nav').removeClass('fixed-header');
	    }
	});	

	// start carousel section shop
	// tab content
	$(".tab-content").hide();
	$(".tab-content:first").show();
	$("ul li:first").addClass('current');
	$("ul li").click(function(){
		$("ul li").removeClass("current");
		$(this).addClass("current");
		$(".tab-content").hide();

		var tab_id = $(this).find("a").attr("href");
		// console.log("banda an");
		$(tab_id ).fadeIn();
	});
	//  back-to-top start
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
	
});
