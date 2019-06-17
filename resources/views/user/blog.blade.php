
@extends('user.layout')

@section('title')
Blog
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin_asset/css/blog.css') }}">
@endsection

@section('content')

<section class="main-container ">
    <div class="container">
        <div class="row">
            <div class="store-toltal d-md-flex">
                <div class="box-left-store  col-md-3 col-lg-3 px-md-0 ">
                    <div class="fixed-box ">
                        <span class="d-none d-sm-none d-md-block d-lg-block">Category</span>
                        <!-- screen tablet-deskTop -->
                        <ul id="service_id" class="service-left nav nav-tabs flex-column  d-none d-sm-none d-md-block d-lg-block">

                            @foreach( $categories as $category )

                            @if( count( $category->news ) > 0 )

                            <li id="{{ $category->id }}" class="nav-item " >
                                <a class="nav-link delete-navlink " href='#'> {{ $category->name }} </a>
                            </li>
                            @endif

                            @endforeach

                        </ul>
                        <!-- cho mobile ang tablet start-->
                        <div class="mobile-first d-block d-sm-block d-md-none d-lg-none ">
                            <div class="service-title container">
                                <p>Category</p>
                                <button id="mobile">
                                    <i class="fas fa-align-right"></i>
                                </button>
                            </div>
                            <div class="container">
                                <ul class="service-left col-12 col-sm-12 px-0">
                                 @foreach( $categories as $category )

                                 @if( count( $category->news ) > 0 )
                                    <li id="{{ $category->id }}" class="nav-item " >
                                        <a class="nav-link delete-navlink " href='#'> {{ $category->name }} </a>
                                    </li>
                                @endif

                                @endforeach

                                 </ul>
                            </div>
                        </div>

                    <!-- cho mobile and tablet end-->
                    @csrf
                    <input id="send_request" type="hidden" value="">

                </div>

            </div>
            <div id="content_id" class="box-right-store col-12 col-sm-12 col-md-9 col-lg-9">
                <div class="row">


                    <!--view new-->
                    <div class="recent-post-widget">
                        @foreach($news as $new)
                        <div class="blog-item col-12 col-lg-12 btn" data-toggle="modal" data-target="#quickview-{{ $new->id }}">
                            <ul class="recent-posts ">
                                <li class="d-md-flex">
                                    <div style="cursor: pointer;" class="col-12 col-sm-12 col-md-3 col-lg-3 post-img px-0">
                                        <img  src='{{ asset("images/$new->image") }}' title="Read more" alt="{{ $new->name }}" class="alignleft">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 post-text text-left px-0 ml-md-3 ">
                                        <h4 style="cursor: pointer;">{{ $new->name }}</h4>
                                        <span style="color: #a79d9d; font-size:13px"><i class="fa fa-clock" style="color:#4e423070"> </i> {{ $new->updated_at }} </span>
                                        <p class="text-second">{{ $new->description }}</p>
                                    </div>

                                </li>
                            </ul>
                        </div>

                        <!-- quickview modal -->
                        <div class="modal fade" id="quickview-{{ $new->id }}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Read more</h5>
                                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="view-main d-lg-flex">
                                            <div class="view-img col-12 col-sm-12 col-md-12 col-lg-6" style="height:260px;">
                                                <img src='{{ asset("images/$new->image") }}' alt="{{ $new->name }}" style="width: 100%; height: 100%;">
                                            </div>
                                            <div class="view-title col-12 col-sm-12 col-md-12 col-lg-6 ">

                                                <h4>{{ $new->name }}</h4>
                                                <span><i class="fa fa-clock"> </i> {{ $new->updated_at }} </span>
                                                <p class="text-second">{{ $new->description }}</p>

                                            </div>
                                        </div>
                                        <div>
                                            <h3>Details</h3>
                                            <p>{{ $new->content }}</p>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
        
            </div>

        </div>
        <!-- end sidebar -->
    </div>

</div>
<!-- end content -->
</section>
<!-- Blog end -->
@endsection

@section('script')
<script type="text/javascript">

    $(document).ready(function(){

        $('.service-left li').click(function(e){
            e.preventDefault();
            var myId = $(this).attr('id');
            $('#send_request').val(myId); 
            $('.service-left li').removeClass('current');
            $(this).addClass('current');
            
            var _token = $('input[name="_token"]').val();
            var query = $('#send_request').val();

            $.ajax({

                url:"http://localhost/emhairsalon/public/user/blog",
                method:"post",
                data:{query:query, _token:_token},
                success:function(data){ 
                    $('#content_id').fadeIn();  
                    $('#content_id').html(data);
                }

            });

        });  
    });

</script>

<script type="text/javascript">
    $(window).on('load',function () {
        $("#service_id li:first").addClass('current');
    });
    // mobile first

    // $(".service-left ").hide();
    // $("button#mobile").click(function(){
    //     $(".service-left ").toggle();
    // });
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
    //  back-to-top end
    
    
    //  SHARE
    //lấy giá trị
    var share = document.querySelector('.share'),
    clickShowShare = document.getElementById('click-show-share');   
    clickShowShare.addEventListener('click', function(){
        share.classList.toggle('show-share-in');
    })
</script>

<!-- <script>
       $('.pagination li').unbind('click').on('click', function(e) {
         alert('đã chạy được');
           e.preventDefault();
           var page = $(this).attr('href').split('page=')[1];
          
           getPosts(page);
       });
 
       function getPosts(page)
       {
           $.ajax({
               type: "GET",
               url: '?page='+ page
           })
           .success(function(data) {
               $('body').html(data);
           });
       }
   </script> -->


   @endsection