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
<title>E-learning Informasi</title>
<x-lphead></x-lphead>

<body>
<!-- START HEADER -->
<x-lpheader></x-lpheader>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="{{asset('storage/'.$pengaturan->informasi)}}">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title text-center">
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