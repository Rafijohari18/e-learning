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
<title>E-learning BLKK Bonang</title>
<x-lphead></x-lphead>

<body>

<!-- START HEADER -->
<x-lpheader></x-lpheadher>
<!-- END HEADER --> 

<!-- START SECTION BANNER -->
<div class="banner_section full_screen staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade carousel_style1 light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            @forelse($slider as $slide)
            <div class="carousel-item @if($slide->id == 1) active @endif background_bg overlay_bg_60" data-img-src="{{asset('storage/'.$slide->path)}}">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-12 col-sm-12 text-center">
                                <div class="banner_content text_white">
                                    <h2 class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.2s">{{ $slide->judul }}</h2>
                                    <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s">{{ $slide->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            @empty
            <div class="carousel-item active background_bg overlay_bg_60" data-img-src="{{asset('landingpage/images/no-image.png')}}">
                <div class="banner_slide_content">
                    <div class="container"><!-- STRART CONTAINER -->
                        <div class="row justify-content-center">
                            <div class="col-lg-7 col-md-12 col-sm-12 text-center">
                                <div class="banner_content text_white">
                                    <h2 class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.2s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</h2>
                                    <p class="staggered-animation" data-animation="fadeInUp" data-animation-delay="0.4s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae facilis provident saepe hic obcaecati quod recusandae dolorem, accusamus soluta. Nulla..</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            @endforelse
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
                    	<img src="{{asset('storage/'.$mdl->path)}}" alt="Thumbnail"/>
                    </div>
                  	<div class="courses_info">
                        <div class="float-right">
                            <ul class="courses_meta">
                         <li><i class="ti-time"></i><span>{{ $mdl->durasi_program }}</span></li>
                            </ul>
                        </div>
                        <div class="rating_stars">
                            @php
                            $stars = round($mdl->rating($mdl->id));
                            @endphp
                            @if($stars == 1)
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star-outline"></i> 
                            <i class="ion-android-star-outline"></i> 
                            <i class="ion-android-star-outline"></i> 
                            <i class="ion-android-star-outline"></i>
                            @elseif($stars == 2)
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star-outline"></i> 
                            <i class="ion-android-star-outline"></i> 
                            <i class="ion-android-star-outline"></i> 
                            @elseif($stars == 3)
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star-outline"></i> 
                            <i class="ion-android-star-outline"></i> 
                            @elseif($stars == 4)
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star-outline"></i>
                            @elseif($stars == 5)
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            @else
                            <i class="ion-android-star-outline"></i>
                            <i class="ion-android-star-outline"></i>
                            <i class="ion-android-star-outline"></i>
                            <i class="ion-android-star-outline"></i>
                            <i class="ion-android-star-outline"></i>
                            @endif
                            <span>{{ round($mdl->rating($mdl->id)) }}.0</span> 
                            <span class="badge badge-info"></span>
                        </div>
                        <h5 class="courses_title"><a href="{{ route('detail.program', $mdl->slug) }}">{{ $mdl->nama_program }}</a></h5>
                        <span class="badge badge-warning text-white">{{ $mdl->kategori->nama_kategori }}</span>
                        <p>
                            {!! Str::limit($mdl->deskripsi, 50, '...') !!}
                        </p>
                        <div class="courses_footer">
                            <a href="{{ route('checkout',$mdl->slug) }}" class="btn btn-warning text-white btn-sm">Ikuti Pelatihan</a>
                            <div class="courses_price"> <span>Rp. {{ number_format($mdl->harga, 0, ',', '.') }}</span> </div>
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
                    	<img src="@if(empty($jquin->path)) {{ asset('landingpage/images/no-image.png') }} @else {{ asset('storage/'.$jquin->path) }}  @endif" alt="{{ $jquin->judul }}"> 
                        <div class="post_date radius_all_5">
                        	<h5><span>{{ $jquin->created_at->format('F, d') }}</span> {{ $jquin->created_at->format('Y') }}</h5> 
                        </div>	
                    </div>
    				<div class="blog_content">
    					<div class="blog_text">
                            <ul class="list_none blog_meta">
                                <li><i class="ti-user"></i> <span>{{ $jquin->user->nama_lengkap }}</span></li>
                            </ul>
                            <h5 class="blog_title"><a href="{{ route('detail.informasi', $jquin->slug) }}">{{ $jquin->judul }}</a></h5>
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