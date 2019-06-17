
@extends('user.layout') 

@section('css')
    <link rel="stylesheet" href="{{ asset('admin_asset/css/xzoom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/css/quickview.css') }}">
    
@endsection

@section('content')
     <!-- HEADER END -->
	<section id="default" >
	    <div class="row">
	    	<div class="container">
	    		<div class="store-xrom d-md-flex pt-3">	
	    			<div class="large-8 column ">
			        	<div class="xzoom-container">
				            <img class="xzoom col-9 col-md-9 col-lg-10" id="xzoom-default" src="{{ asset('images/store3.jpg') }}" xoriginal="{{ asset('images/store1.jpg') }}" />
				            <!-- <div class="xzoom-thumbs my-3">
					          	<a href="{{ asset('images/modal1.jpg') }}"><img class="xzoom-gallery" src="{{ asset('images/modal1.jpg') }}"  xpreview="{{ asset('images/modal1.jpg') }}" title="The description goes here"></a>
					          	<a href="{{ asset('images/modal2.jpg') }}"><img class="xzoom-gallery" src="{{ asset('images/modal2.jpg') }}"  xpreview="{{ asset('images/modal2.jpg') }}" title="The description goes here"></a>
					          	<a href="{{ asset('images/modal3.jpg') }}"><img class="xzoom-gallery"  src="{{ asset('images/modal3.jpg') }}"  xpreview="{{ asset('images/modal3.jpg') }}" title="The description goes here"></a>
					          	<a href="{{ asset('images/modal4.jpg') }}"><img class="xzoom-gallery" src="{{ asset('images/modal4.jpg') }}"  xpreview="{{ asset('images/modal4.jpg') }}" title="The description goes here"></a>
			                </div> -->
      			    	</div>        
    		   		</div>
					<div class="large-1 column  "></div>
				    <div class="view-title col-6 col-md-6 col-lg-6 ">
						<h5>ARCADIAN MATTE PASTE</h5>
						<p><span>- CATEGORY:</span> Pomade</p>
						<p><span>- BRAND: </span>Blumaan</p>
						<p><span>- VOLUME:</span>110 ml</p>
						<p><span>- FLAVOR:</span>Gentle scent</p>
						<p class="view-price">530,000 VNĐ</p>
					</div>
	    		</div>	
	    		<!-- end quickview -->
	    		<!-- details start -->
	    		<div class="details container ">
	    			<h4>DETAILS</h4>
	    			<p class="four-oz mb-0">Arcadian Matte Paste (4 Oz): 460.000 đ</p>
	    			<div class="details-icon">
	    				<i class="fas fa-caret-right"></i>
	    				<span>Finally, the Arcadian manufacturer - Men's Grooming Supply Co., has also released its own Paste product like previous information. For those who are familiar with Arcadian Clay but want to find a better glutinous product, Arcadian Matte Paste promises to be a perfect replacement with Heavy Hold retention instead of Firm Hold.</span>
	    			</div>
	    			<div class="details-icon">
	    				<i class="fas fa-caret-right"></i>
	    				<span>Matte Paste of Arcadian will be available at the shop in mid-October. We will have a detailed review sent to you soon after the goods arrive.</span>
	    			</div>
	    			<div class="details-used">
	    				<p class="mb-0">- Capacity 4 Oz (use 3-4 months)</p>
	    				<p class="mb-0">- Gloss: 0/5</p>
	    				<p class="mb-0">- Good retention ability: 5 + / 5</p>
	    			</div>
	    			<hr class="w-100">
					<div class="contact">
						<p>For advice and purchase, please Inbox Page or contact:</p>
						<p class="mb-0">
							<i class="fas fa-square"></i>
							<span>EM hair Salon</span>
						</p>
						<p class="mb-0">
							<i class="fas fa-square"></i>
							<span>Phone: 024 6687 5115</span>
						</p>
						<p class="mb-0">
							<i class="fas fa-square"></i>
							<span>Website:www.emhairsalon.com</span>
						</p>
						<p class="mb-0">
							<i class="fas fa-square"></i>
							<span>Address :53 Pho Duc Chinh, Ba Dinh, Ha Noi / 7 Do Quang, Trung Hoa, au Giay, Ha Noi.</span>
						</p>
						<p class="mb-0">
							<i class="fas fa-square"></i>
							<span> Fanpage: https://www.facebook.com/EMHAIRSALON/?epa=SEARCH_BOX/span>
						</p>
					</div>	
	    			<div class="video-item py-1 text-center col-12 col-sm-12 col-md-12 col-lg-12">
	    				<iframe width="560" height="370" src="https://www.youtube.com/embed/yX0YWLWXeDo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-100 m-auto"></iframe>

	    			</div>
	    			<!-- video end  -->
	    		</div>
	    		<!-- details end -->

				<!-- related products start-->
	    		<div class="products container">
	    			<h4 class="container my-0">Related products </h4>
	    			<div class="owl-carousel  owl-theme container">
	    				<div class="item">
                            <div class="box-carousel">
                                <a href="shop.html" target="_blank">
                                    <img src="{{ asset('images/shop1.jpg') }}">
                                </a>
                            </div>
                            <div class="box-name text-center">
                                <a href="#" title="BY VILAIN GOLD DIGGER">BY VILAIN GOLD DIGGER</a>
                            </div>
                            <div class="box-price">
                                <p class="shop-price text-center">400,000 VNĐ</p>
                            </div>
                        </div>
                        <!-- end col 1 -->
                        <div class="item">
                            <div class="box-carousel">
                                <a href="shop.html" target="_blank">
                                    <img src="{{ asset('images/shop2.jpg') }}">
                                </a>
                            </div>
                            <div class="box-name text-center">
                                <a href="#" title="BY VILAIN GOLD DIGGER">BY VILAIN GOLD DIGGER</a>
                            </div>
                            <div class="box-price">
                                <p class="shop-price text-center">400,000 VNĐ</p>
                            </div>
                        </div>
                        <!-- end col 2-->
                        <div class="item">
                            <div class="box-carousel">
                                <a href="shop.html" target="_blank">
                                    <img src="{{ asset('images/shop3.jpg') }}">
                                </a>
                            </div>
                            <div class="box-name text-center">
                                <a href="#" title="BY VILAIN GOLD DIGGER">BY VILAIN GOLD DIGGER</a>
                            </div>
                            <div class="box-price">
                                <p class="shop-price text-center">400,000 VNĐ</p>
                            </div>
                        </div>
                        <!-- end col 3-->
                        <div class="item">
                            <div class="box-carousel">
                                <a href="shop.html" target="_blank">
                                    <img src="{{ asset('images/shop4.jpg') }}">
                                </a>
                            </div>
                            <div class="box-name text-center">
                                <a href="#" title="BY VILAIN GOLD DIGGER">BY VILAIN GOLD DIGGER</a>
                            </div>
                            <div class="box-price">
                                <p class="shop-price text-center">400,000 VNĐ</p>
                            </div>
                        </div>
                        <!-- end col 4-->
                        <div class="item">
                            <div class="box-carousel">
                                <a href="shop.html" target="_blank">
                                    <img src="{{ asset('images/shop6.jpg') }}">
                                </a>
                            </div>
                            <div class="box-name text-center">
                                <a href="#" title="BY VILAIN GOLD DIGGER">BY VILAIN GOLD DIGGER</a>
                            </div>
                            <div class="box-price">
                                <p class="shop-price text-center">400,000 VNĐ</p>
                            </div>
                        </div>
                        <!-- end col 5-->
                        <div class="item">
                            <div class="box-carousel">
                                <a href="shop.html" target="_blank">
                                    <img src="{{ asset('images/shop5.jpg') }}">
                                </a>
                            </div>
                            <div class="box-name text-center">
                                <a href="#" title="BY VILAIN GOLD DIGGER">BY VILAIN GOLD DIGGER</a>
                            </div>
                            <div class="box-price">
                                <p class="shop-price text-center">400,000 VNĐ</p>
                            </div>
                        </div>
                        <!-- end col 6-->
	    			</div>
                </div>  
	    		<!-- related products end -->
	    	</div>
	    </div>
    </section>
@endsection
	
@section('script')

    <script src="{{ asset('admin_asset/js/xzoom.min.js') }}"></script>

    <script>
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
			            items: 3
			        },
			        600: {
			           items: 3
			        },
			        768: {
			           items: 4
			        }
			    }
			}) // end owl-carousel section shop
			
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
    	$(".xzoom, .xzoom-gallery").xzoom({tint: '#333', Xoffset: 15});
    </script>
@endsection