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
                    <h1>Informasi</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- STAT SECTION INFORMASI --> 
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($informasi as $jquin)
            <div class="col-lg-4 col-md-6 animation" data-animation="fadeInUp" data-animation-delay="0.2s">
                <div class="blog_post blog_style1 box_shadow1">
                    <div class="blog_img">
                        <a href="#">
                            <img src="{{ asset('storage/'.$jquin->path) }}" alt="{{ $jquin->judul }}">
                        </a>
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