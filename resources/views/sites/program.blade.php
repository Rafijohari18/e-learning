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
<title>E-learning Program</title>
<x-lphead></x-lphead>

<body>
<!-- START HEADER -->
<x-lpheader></x-lpheader>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="{{asset('storage/'.$pengaturan->program)}}">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title text-center">
                    <h1>Program</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- STAT SECTION INFORMASI --> 
<div class="section">
    <div class="container">
        <div class="row">
            @foreach($program as $mdl)
            <div class="col-lg-4 col-md-6">
                <div class="courses_box radius_all_10 box_shadow1 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                    <div class="courses_img"> 
                        <img src="{{asset('storage/'.$mdl->path)}}" alt="course_img1"/>
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

        <div class="row justify-content-center">
            {{ $program->links() }}
        </div>
    </div>
</div>
<!-- END SECTION INFORMASI -->

<!-- START FOOTER -->
<x-lpfooter></x-lpfooter>
<!-- END FOOTER --> 

</body>

</html>