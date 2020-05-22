<!DOCTYPE html>
<html lang="en">

<x-lphead></x-lphead>

<body>
<!-- START HEADER -->
<x-lpheader></x-lpheader>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="{{asset('landingpage/images/login_bg.jpg')}}">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
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
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star"></i> 
                            <i class="ion-android-star-outline"></i> 
                            <span>4.0</span> 
                            <span class="badge badge-info"></span>
                        </div>
                        <h5 class="courses_title"><a href="{{ route('detail.program', $mdl->slug) }}">{{ $mdl->nama_program }}</a></h5>
                        <span class="badge badge-warning text-white">{{ $mdl->kategori->nama_kategori }}</span>
                        <p>
                            {!! Str::limit($mdl->deskripsi, 50, '...') !!}
                        </p>
                        <div class="courses_footer">
                            <a href="{{ route('checkout',$mdl->id) }}" class="btn btn-warning text-white btn-sm">Ikuti Pelatihan</a>
                            <div class="courses_price"> <span>Rp. {{ number_format($mdl->harga, 0, ',', '.') }}</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 mt-2 mt-md-3">
                <ul class="pagination pagination_style1 justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="linearicons-arrow-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION INFORMASI -->

<!-- START FOOTER -->
<x-lpfooter></x-lpfooter>
<!-- END FOOTER --> 

</body>

</html>