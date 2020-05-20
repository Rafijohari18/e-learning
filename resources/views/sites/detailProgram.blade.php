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
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/blog_bg.jpg">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
            		<h1>Informasi Detail</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active">Blog Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION BLOG -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="single_course">
                    <div class="courses_title">
                        <h4>{{ $jquin->nama_program }}</h4>
                    </div>
                    <div class="countent_detail_meta">
                        <ul>
                            <li>
                                <div class="course_cat">
                                    <label>Kategori</label>
                                    <span>{{ $jquin->kategori->nama_kategori }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="course_rating">
                                    <label>Rating</label>
                                    <div class="rating_stars">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star-outline"></i> 
                                        <span>4.0</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="course_student">
                                    <label>Peserta</label>
                                    <span> 523</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="course_img">
                        <img src="{{ asset('storage/'.$jquin->path) }}" alt="{{ $jquin->nama_program }}">
                    </div>
                    <div class="course_info">
                        <div class="course_desc"> 
                            <div class="heading_s1">
                                <h4>Deskripsi:</h4>
                            </div>
                            <p>{!! $jquin->deskripsi !!}</p>
                        </div>
                        <!-- <div class="review_wrap"> -->
                            <!-- <div class="heading_s1">
                                <h4>Review</h4>
                            </div> -->
                           <!--  <div class="comments">
                                <ul class="list_none comment_list">
                                    <li class="comment_info">
                                        <div class="d-flex">
                                            <div class="comment_user">
                                                <img src="assets/images/post_user1.jpg" alt="user2">
                                            </div>
                                            <div class="comment_content">
                                                <div class="d-sm-flex">
                                                    <div class="meta_data">
                                                        <h6><a href="#">Sarah Taylor</a></h6>
                                                        <div class="comment-time"><i class="ti-calendar"></i> <span>March 5, 2019</span></div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="rating_stars">
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star-outline"></i> 
                                                            <span>4.0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>We denounce With righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble.</p>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li class="comment_info">
                                                <div class="d-flex">
                                                    <div class="comment_user">
                                                        <img src="assets/images/post_user2.jpg" alt="user3">
                                                    </div>
                                                    <div class="comment_content">
                                                        <div class="d-sm-flex align-items-md-center">
                                                            <div class="meta_data">
                                                                <h6><a href="#">John Becker</a></h6>
                                                                <div class="comment-time"><i class="ti-calendar"></i> <span>April 8, 2019</span></div>
                                                            </div>
                                                            <div class="ml-auto">
                                                                <div class="rating_stars">
                                                                    <i class="ion-android-star"></i>
                                                                    <i class="ion-android-star"></i>
                                                                    <i class="ion-android-star"></i>
                                                                    <i class="ion-android-star"></i>
                                                                    <i class="ion-android-star-outline"></i> 
                                                                    <span>4.0</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>We denounce With righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble.</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="comment_info">
                                        <div class="d-flex">
                                            <div class="comment_user">
                                                <img src="assets/images/post_user3.jpg" alt="user4">
                                            </div>
                                            <div class="comment_content">
                                                <div class="d-sm-flex">
                                                    <div class="meta_data">
                                                        <h6><a href="#">Daisy Lana</a></h6>
                                                        <div class="comment-time"><i class="ti-calendar"></i> <span>March 15, 2019</span></div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <div class="rating_stars">
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star"></i>
                                                            <i class="ion-android-star-outline"></i> 
                                                            <span>4.0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>We denounce With righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire that the cannot foresee the pain and trouble.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 mt-3 mt-lg-0">
                <div class="sidebar">
                    <div class="widget widget_course_description">
                        <ul>
                            <li><i class="linearicons-user"></i><span>Peserta:</span> <span class="item_value">16</span></li>
                            <li><i class="linearicons-clock"></i><span>Durasi:</span> <span class="item_value"> {{ $jquin->durasi_program }}</span></li>
                            <li><i class="linearicons-transform"></i><span>Quis</span> <span class="item_value">01</span></li>
                            <li><i class="linearicons-license2"></i><span>Sertifikat:</span> <span class="item_value">Ya</span></li>
                            <li><i class="linearicons-bag-dollar "></i><span>Harga:</span> <span class="item_value">Rp. {{ number_format($jquin->harga, 0, ',', '.') }}</span></li>
                            <li><i class="ti-filter "></i><span>Diskon:</span> <span class="item_value">@if(empty($jquin->diskon)) 0% @else {{ $jquin->diskon }}% @endif</span></li>
                        </ul>
                        <a href="{{ route('checkout', $jquin->id) }}" class="btn btn-default btn-block">Ikuti Pelatihan</a>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Program Terbaru</h5>
                        <ul class="widget_recent_post">
                            @foreach($neko as $progBaru)
                            <li>
                                <div class="post_footer">
                                    <div class="post_img">
                                        <img src="{{ asset('storage/'.$progBaru->path) }}" alt="{{ $progBaru->nama_program }}" width="50" height="40"></a>
                                    </div>
                                    <div class="post_content">
                                        <h6><a href="{{ route('detail.program', $progBaru->slug) }}">{{ $progBaru->nama_program }}</a></h6>
                                        <p class="small m-0">{{ $progBaru->created_at->format('d F Y') }}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Kategori</h5>
                        <ul class="widget_categories">
                            @foreach($kategori as $ktg)
                            <li><a href="#"><span class="categories_name">{{ $ktg->nama_kategori }}</span><span class="categories_num">(7)</span></a></li>
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