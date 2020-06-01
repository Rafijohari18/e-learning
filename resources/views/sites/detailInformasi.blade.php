<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keywords" content="">

<!-- SITE TITLE -->
<title>Detail Informasi</title>
<x-lphead></x-lphead>

<body>

<!-- START HEADER -->
<x-lpheader></x-lpheader>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="{{ asset('storage/'.$jquin->path) }}">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title text-center">
            		<h1>Detail Informasi</h1>
                    <p>{{ $jquin->judul }}</p>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION BLOG -->
<div class="section">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-9">
            	<div class="single_post">
                    <div class="blog_img">
                        <img src="{{ asset('storage/'.$jquin->path) }}" alt="{{ $jquin->judul }}">
                    </div>
                    <div class="blog_content">
                        <div class="blog_text">
                            <h2 class="blog_title">{{ $jquin->judul }}</h2>
                            <ul class="list_none blog_meta">
                                <li><i class="ti-calendar"></i> {{ $jquin->created_at->format('d F Y') }}</li>
                            </ul>
                            <p>{!! $jquin->artikel !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="col-lg-3 mt-3 mt-lg-0">
            	<div class="sidebar">
                	<div class="widget">
                    	<h5 class="widget_title">Cari Informasi</h5>
                        <div class="search_form">
                            <form> 
                                <input required="" class="form-control" placeholder="Cari Informasi..." type="text">
                                <button type="submit" title="Subscribe" class="btn icon_search" name="submit" value="Submit">
                                    <i class="ion-ios-search-strong"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                	<div class="widget">
                    	<h5 class="widget_title">Informasi Terbaru</h5>
                        <ul class="widget_recent_post">
                            @foreach($neko as $informasi)
                            <li>
                                <div class="post_footer">
                                    <div class="post_img">
                                        <img src="{{ asset('storage/'.$informasi->path) }}" alt="{{ $informasi->judul }}" width="50" height="40">
                                    </div>
                                    <div class="post_content">
                                        <h6><a href="{{ route('detail.informasi', $informasi->slug) }}">{{ $informasi->judul }}</a></h6>
                                        <p class="small m-0">{{ $informasi->created_at->format('d F Y') }}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                    	</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->

<x-lpfooter></x-lpfooter>
</body>

</html>