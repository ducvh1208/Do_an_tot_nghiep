
@extends('user.layout')

@section('title')
store
@endsection

@section('css')


<link rel="stylesheet" href="{{ asset('admin_asset/css/store.css') }}">

@endsection

<!-- STORE  -->
@section('content')
<section class="main-container ">
	<div class="container">
		<div class="row">
			<div class="store-toltal col-12 colsm-12 col-md-12 col-lg-12 d-md-flex px-md-0">
				<div class="box-left-store  col-12 col-sm-12 col-md-3 col-lg-3 px-md-0">
					<div class="fixed-box ">
						<span class="d-none d-sm-none d-md-block d-lg-block text_warning">Product portfolio</span>
						<!-- screen tablet-deskTop -->
						<ul class="service-left nav nav-tabs flex-column  d-none d-sm-none d-md-block d-lg-block">

							@foreach( $products_type as $product_type )

							@if( count( $product_type->product ) > 0 )

								<li id="li-desh-{{ $product_type->id }}" class="nav-item " >
									<a class="nav-link" href="#{{ $product_type->id }}"> {{ $product_type->name }} </a>
								</li>

							@endif

							@endforeach

						</ul>
						 <!-- cho mobile ang tablet start-->
                       <div class="mobile-first d-block d-sm-block d-md-none d-lg-none ">
                            <div class="service-title containe d-flex d-sm-flex ">
                                <p>Product Type</p>
                                <button id="mobile">
                                    <i class="fas fa-align-right"></i>
                                </button>
                            </div>
                            <div class="container px-0">
                                <ul class="service-left col-12 col-sm-12 px-0">
                                 @foreach( $products_type as $product_type )
                       
                                 @if( count( $product_type->product ) > 0 )
                                    <li id="li-desh-{{ $product_type->id }}" class="nav-item " >
                                        <a class="nav-link" href='#{{ $product_type->id }}'> {{ $product_type->name }} </a>
                                    </li>
                                @endif
                       
                                @endforeach
                       
                                 </ul>
                            </div>
                        </div>

                    <!-- cho mobile ang tablet end-->
					</div>
					
				</div>
				<div class="box-right-store col-12 col-sm-12 col-md-9 col-lg-9  px-0 ">

					@foreach( $products_type as $product_type )
					<div id="{{ $product_type->id }}" class="tab-content  col-12 col-md-12 col-lg-12">	
						<div class="row d-flex flex-wrap">

							<?php
							$products = DB::table('products')->where('product_id','=', $product_type->id)->get();
							foreach ( $products as $product ) {
							?>

								<!-- product -->
								<div class="store-item col-6 col-sm-6 col-md-4 col-lg-4  btn" data-toggle="modal" data-target="#quickviewModal-{{ $product->id }}" style="cursor: pointer;">
									<div class="item " >           
										<div class="quickview-button">
											<img class="lazy" src='{{ asset("images/$product->image") }}' alt="{{ $product->name }}">
											<div class="overlay"></div>
											<div class="col-md-12 quickview-item">Quick view</div>
										</div>
									</div>
									<div class="product-bottom">
										<h6> {{ $product->name }}</h6>
										<span  class="special-price text-danger"> {{ $product->price }} </span>
									</div>
								</div>


								<!-- Quickview -->
								<div class="modal fade" id="quickviewModal-{{ $product->id }}">
									<div class="modal-dialog modal-lg">
										<div class="modal-content col-12 col-sm-12 col-md-12 col-lg-12">
											<div class="modal-header">
												<h5 class="modal-title">Quick View</h5>
												<button class="close" data-dismiss="modal"><span>&times;</span></button>
											</div>

											<div class="modal-body">
												<div class="view-main d-lg-flex">
													<div class="view-img col-12 col-sm-12 col-md-12 col-lg-6" style="height:260px;">
														<img src='{{ asset("images/$product->image") }}' alt="quickview images" style="width: 100%; height: 100%;">
													</div>
													<div class="view-title col-12 col-sm-12 col-md-12 col-lg-6 ">
														<h6 class="text-warning">{{ $product->name }}</h6>
														<p><span class="text-info">CATEGORY:</span> <small> Pomade </small> </p>
														<p><span class="text-info">BRAND: </span> <small> Blumaan </small> </p>
														<p><span class="text-info">VOLUME:</span> <small> 110 ml </small> </p>
														<p><span class="text-info">PRICE : </span> <small> {{ $product->price }} </small> </p>
													</div>
												</div>
												<div class="container">
													<h3 class="text-info">Details</h3>
													<p>{{ $product->detail }}</p>
												</div>
											</div>

											<div class="modal-footer">
												<button class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							<?php

							}

							?>		
							
						</div>
					</div>

					@endforeach
					<!-- end tab 1 -->

				</div>
			</div>
		</div>
	</div>
		<!-- <div class="col-md-3 col-lg-3 text-uppercase p-0 d-none d-sm-none d-md-block d-lg-block" style="color:  #ff9900"> 
			Product portfolio
		</div> -->
		
		<!-- screen mobile -->
			<!-- <div class="slide-mobile d-block d-sm-block d-md-none d-lg-none col-12 d-flex justify-content-center align-items-center">
				<div class="col-md-3 col-lg-3 text-uppercase p-0 " style="color: #ff9900">Product portfolio</div>
				<ul class="left-mobile nav nav-tabs">
					@foreach( $products_type as $product_type )

					@if(count( $product_type->product ) > 0)

					<li id="li-mobile-{{ $product_type->id }}" class="nav-item"><a class="nav-link" href="#{{ $product_type->id }}"> {{ $product_type->name }} </a></li>

					@endif

					@endforeach

				</ul>
				<button class=" sidebarBtn ">
					<i class="fas fa-plus"></i>
				</button>
			</div> -->
			<!-- end screen mobile -->
			
		</div>

</section>

@endsection

@section('script')

<script src="{{ asset('admin_asset/js/store.js') }}">  </script> 
<script type="text/javascript">

	$(window).on('load',function(){
		$('#li-desh-1').addClass('current');
		$('#li-mobile-1').addClass('current');
	});

	$(".mobile-first .service-left ").hide();
    $("button#mobile").click(function(e){
        $(".mobile-first .service-left").toggle();
        e.stopPropagation();
    });

    $(document).click(function(e){
        $(".mobile-first .service-left").hide();
        e.stopPropagation();
    });
    // end mobile
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
     // back-to-top end
  
    //lấy giá trị
    var share = document.querySelector('.share'),
    clickShowShare = document.getElementById('click-show-share');   
    clickShowShare.addEventListener('click', function(){
        share.classList.toggle('show-share-in');
    })
</script>

@endsection