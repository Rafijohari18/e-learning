<!DOCTYPE html>
<html lang="en">

<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">

<!-- SITE TITLE -->
<title>E-learning Your Company</title>
<x-lphead></x-lphead>

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
                	<h2>Program</h2>
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
                            <input type="hidden" name="user_id" value="{{ Auth::user()['id'] }}">
                            @endif
                            
                            <button type="submit" class="btn btn-primary btn-sm">{{ $mdl->nama_program }}</button>
                        
                            </form>
                        <p>
                            {!! Str::limit($mdl->deskripsi, 50, '...') !!}
                        </p>
                        <div class="courses_footer">
                            <ul class="courses_meta">
                                <li><i class="ti-user"></i><span>31</span></li>
                                <li><i class="ti-time"></i><span>{{ $mdl->durasi_program }}</span></li>
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

</body>
</html>