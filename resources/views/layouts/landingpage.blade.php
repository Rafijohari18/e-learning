<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Templatemanja" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">

<!-- SITE TITLE -->
<title>E-learning Your Company</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('landingpage/images/favicon.png')}}">
<!-- Animation CSS -->
<link rel="stylesheet" href="{{asset('landingpage/css/animate.css')}}">
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="{{asset('landingpage/bootstrap/css/bootstrap.min.css')}}">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="{{asset('landingpage/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('landingpage/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('landingpage/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('landingpage/css/linearicons.css')}}">
<link rel="stylesheet" href="{{asset('landingpage/css/flaticon.css')}}">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="{{asset('landingpage/owlcarousel/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('landingpage/owlcarousel/css/owl.theme.css')}}">
<link rel="stylesheet" href="{{asset('landingpage/owlcarousel/css/owl.theme.default.min.css')}}">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="{{asset('landingpage/css/magnific-popup.css')}}">
<!-- Style CSS -->
<link rel="stylesheet" href="{{asset('landingpage/css/style.css')}}">
<link rel="stylesheet" href="{{asset('landingpage/css/responsive.css')}}">
<link rel="stylesheet" id="layoutstyle" href="{{asset('landingpage/color/theme-yellow.css')}}">
</head>

<body>

<!-- START HEADER -->
<x-lpheader></x-lpheadher>
<!-- END HEADER --> 

<!-- START SECTION BANNER -->
<div class="banner_section full_screen staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade carousel_style1 light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active background_bg overlay_bg_60" data-img-src="{{asset('landingpage/images/banner7.jpg')}}">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-12 col-sm-12 text-center">
                            <div class="banner_content text_white">
                                <h2 class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.2s">learn online course for the new angle</h2>
                                <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                <a class="btn btn-default btn-radius staggered-animation" href="#" data-animation="fadeInUp" data-animation-delay="0.6s">Get Started</a>
                                <a class="btn btn-white btn-radius staggered-animation" href="#" data-animation="fadeInUp" data-animation-delay="0.6s">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div><!-- END CONTAINER-->
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- START SECTION WHY CHOOSE --> 
<div class="section pb_70">
	<div class="container">
        <div class="row justify-content-center">
        	<div class="col-lg-4 col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
            	<div class="icon_box icon_box_style1 box_shadow1 text-center">
                	<div class="icon ibc_orange">
                    	<i class="ti-book"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Materi Berbentuk Video</h5>
                        <p>Materi disajikan dalam bentuk video supaya lebih mudah dipahami</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.3s">
            	<div class="icon_box icon_box_style1 box_shadow1 text-center">
                	<div class="icon ibc_green">
                    	<i class="fas fa-globe"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Belajar Daring Online</h5>
                        <p>Belajar secara online kapanpun dan dimanapun</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.4s">
            	<div class="icon_box icon_box_style1 box_shadow1 text-center">
                	<div class="icon ibc_pink">
                    	<i class="ti-medall"></i>
                    </div>
                    <div class="icon_box_content">
                    	<h5>Sertifikat</h5>
                        <p>Peserta akan diberikan sertifikat sebagai bukti kelulusan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION WHY CHOOSE --> 

<!-- START SECTION COURSES-->
<div class="section pb_70 bg-light">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
            	<div class="heading_s1 text-center">
                	<h2>Program Terbaru</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($program as $mdl)
            <div class="col-lg-4 col-md-6">
                <div class="courses_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                    <div class="courses_img"> 
                    	<a href="#"><img src="{{asset('storage/'.$mdl->path)}}" alt="course_img1"/></a>
                    </div>
                  	<div class="courses_info">
                        <div class="rating_stars"> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star-outline"></i> 
                            <span>4.0</span> 
                            <span class="badge badge-info"></span>
                        </div>
                    
                            <form action="{{ route('invoice.modul') }}" method="POST">
                                @csrf
                            <input type="hidden" name="program_id" value="{{ $mdl->id}}">
                            <input type="hidden" name="harga" value="{{ $mdl->harga }}">
                            @if(Auth::user() == null)
                            @else
                            <input type="text" name="user_id" value="{{ Auth::user()['id'] }}">
                            @endif
                            
                            <button type="submit" class="btn btn-primary btn-sm">{{ $mdl->nama_program }}</button>
                        
                            </form>
                        <p>
                            {!! Str::limit($mdl->deskripsi, 50, '...') !!}
                        </p>
                        <div class="courses_footer">
                            <ul class="courses_meta">
                                <li><a href="#" ><i class="ti-user"></i><span>31</span></a></li>
                                <li><a href="#"><i class="ti-time"></i><span>{{ $mdl->durasi_program }}</span></a></li>
                            </ul>
                            <div class="courses_price"> <span>Rp{{ number_format($mdl->harga, 0, ',', '.') }}</span> </div>
                        </div>
                  	</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> 
<!-- END SECTION CLASSES-->

<!-- START SECTION COUNTER --> 
<div class="section counter_wrap overlay_bg_70 parallax_bg" data-parallax-bg-image="assets/images/counter_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-6 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                <div class="box_counter counter_white text-center">
                    <i class="ti-clipboard text_default"></i><br>
                    <h3 class="counter_text"><span class="counter" data-from="0" data-to="{{ $program }}" data-speed="1500" data-refresh-interval="5"></span>+</h3>
                    <p>Program</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 animation" data-animation="fadeInUp" data-animation-delay="0.3s">
                <div class="box_counter counter_white text-center">
                    <i class="ti-book text_default"></i><br>
                    <h3 class="counter_text"><span class="counter" data-from="0" data-to="" data-speed="1500" data-refresh-interval="5"></span>+</h3>
                    <p>Modul</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 animation" data-animation="fadeInUp" data-animation-delay="0.4s">
                <div class="box_counter counter_white text-center">
                    <i class="ti-user text_default"></i><br>
                    <h3 class="counter_text"><span class="counter" data-from="0" data-to="{{ $peserta }}" data-speed="1500" data-refresh-interval="5"></span>+</h3>
                    <p>Peserta</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6 animation" data-animation="fadeInUp" data-animation-delay="0.5s">
                <div class="box_counter counter_white text-center">
                    <i class="ti-announcement text_default"></i><br>
                    <h3 class="counter_text"><span class="counter" data-from="0" data-to="150" data-speed="1500" data-refresh-interval="5"></span>+</h3>
                    <p>Informasi</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION COUNTER -->

<!-- START SECTION INFORMASI -->
<div class="section pb_70">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
            	<div class="heading_s1 text-center">
                	<h2>Informasi Terbaru</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($konten as $jquin)
    		<div class="col-lg-4 col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
    			<div class="blog_post blog_style1 box_shadow1">
    				<div class="blog_img"> 
                    	<a href="#"> <img src="@if(empty($jquin->path)) {{ asset('landingpage/images/no-image.png') }} @else {{ asset('storage/'.$jquin->path) }}  @endif" alt="{{ $jquin->judul }}"> </a> 
                        <div class="post_date radius_all_5">
                        	<h5><span>{{ $jquin->created_at->format('F, m') }}</span> {{ $jquin->created_at->format('Y') }}</h5> 
                        </div>	
                    </div>
    				<div class="blog_content">
    					<div class="blog_text">
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-user"></i> <span>{{ $jquin->user->nama_lengkap }}</span></a></li>
                                <!-- <li><a href="#"><i class="ti-comments"></i> <span>2 Comment</span></a></li> -->
                            </ul>
                            <h5 class="blog_title"><a href="#">{{ $jquin->judul }}</a></h5>
                            <p>{!! Str::limit($jquin->artikel, 50, '...') !!}</p>
                    	</div>
    				</div>
    			</div>
    		</div>
            @endforeach
    	</div>
    </div>
</div>
<!-- END SECTION BLOG -->

<!-- START FOOTER -->
<x-lpfooter></x-lpfooter>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 


<!-- Latest jQuery --> 
<script src="{{asset('landingpage/js/jquery-1.12.4.min.js')}}"></script> 
<!-- Latest compiled and minified Bootstrap --> 
<script src="{{asset('landingpage/bootstrap/js/bootstrap.min.js')}}"></script> 
<!-- owl-carousel min js  --> 
<script src="{{asset('landingpage/owlcarousel/js/owl.carousel.min.js')}}"></script> 
<!-- magnific-popup min js  --> 
<script src="{{asset('landingpage/js/magnific-popup.min.js')}}"></script> 
<!-- waypoints min js  --> 
<script src="{{asset('landingpage/js/waypoints.min.js')}}"></script> 
<!-- parallax js  --> 
<script src="{{asset('landingpage/js/parallax.js')}}"></script> 
<!-- countdown js  --> 
<script src="{{asset('landingpage/js/jquery.countdown.min.js')}}"></script> 
<!-- jquery.countTo js  --> 
<script src="{{asset('landingpage/js/jquery.countTo.js')}}"></script> 
<!-- imagesloaded js --> 
<script src="{{asset('landingpage/js/imagesloaded.pkgd.min.js')}}"></script> 
<!-- isotope min js --> 
<script src="{{asset('landingpage/js/isotope.min.js')}}"></script> 
<!-- jquery.appear js  --> 
<script src="{{asset('landingpage/js/jquery.appear.js')}}"></script> 
<!-- jquery.dd.min js --> 
<script src="{{asset('landingpage/js/jquery.dd.min.js')}}"></script>
<!-- slick js -->
<script src="{{asset('landingpage/js/slick.min.js')}}"></script> 
<!-- scripts js --> 
<script src="{{asset('landingpage/js/scripts.js')}}"></script>

</body>
</html>