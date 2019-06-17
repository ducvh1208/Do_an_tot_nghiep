
$(document).ready(function(){
	// scroll nav 
	// $(window).scroll(function(){
	//     if ($(window).scrollTop() >= 100) {
	//         $('nav').addClass('fixed-header');
	//     }
	//     else {
	//         $('nav').removeClass('fixed-header');
	//     }
	// });	
	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 100) {
	        $('.fixed-box ').addClass('sticky-menu');
	    }
	    else {
	        $('.fixed-box ').removeClass('sticky-menu');
	    }
	});	
	// start carousel section shop
    $('.owl-carousel').owlCarousel({
	    loop: true,
	    margin: 10,
	    nav: true,
	    navText: [
	       "<i class='fas fa-caret-left'></i>",
	       "<i class='fas fa-caret-right'></i>"
	    ],
	    autoplay: true,
	    smartSpeed: 1000,
	    autoplayHoverPause: true,
	    responsive: {
	        0: {
	            items: 2
	        },
	        600: {
	           items: 2
	        },
	        992: {
	           items: 4
	        }
	    }
	}) // end owl-carousel section shop
	// countup
	var runCount = $("#count-about").offset().top;
	$(window).scroll(function(){
	 $('.counter').each(function() {
	    var $this = $(this),
	        countTo = $this.attr('data-count');
	  
	    $({ countNum: $this.text()}).animate({
	        countNum: countTo
	     },{
		    duration: 8000,
		    easing:'linear',
		    step: function() {
		      $this.text(Math.floor(this.countNum));
		    },
		    complete: function() {
		      $this.text(this.countNum);
		      //alert('finished');
		    }
	  	}); 
	});
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

