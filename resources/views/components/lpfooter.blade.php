<footer class="bg_dark footer_dark">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-8 col-sm-12">
                    <div class="widget">
                        <div class="footer_logo"> 
                            <a href="index.html"><img src="{{asset('landingpage/images/logo_light.png')}}" alt="logo"/></a> 
                        </div>
                        <p>If you are going to use a passage of Lorem Ipsum you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-5">
                    <div class="widget">
                        <h6 class="widget_title">Program</h6>
                        <ul class="widget_links">
                            @foreach($program as $prog)
                            <li><a href="program/detail/{{ $prog->slug }}">{{ $prog->nama_program }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-7">
                    <div class="widget">
                        <h6 class="widget_title">Informasi Terbaru</h6>
                        <ul class="widget_recent_post">
                            <li>
                                <div class="post_footer">
                                    @foreach($konten as $kontenBaru)
                                    <div class="post_img"> 
                                        <img src="{{asset('storage/'.$kontenBaru->path)}}" alt="{{ $kontenBaru->judul }}" width="50" height="40">
                                    </div>
                                    <div class="post_content">
                                        <h6><a href="{{ route('detail.informasi',$kontenBaru->slug) }}">{{ $kontenBaru->judul }}</a></h6>
                                        <p class="small m-0">{{ $kontenBaru->created_at->format('d F Y') }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <h6 class="widget_title">Kontak</h6>
                        <ul class="contact_info contact_info_light">
                            <li> 
                                <i class="ti-location-pin"></i>
                                <p>123 Street, Old Trafford, New South London , UK</p>
                            </li>
                            <li> 
                                <i class="ti-email"></i> 
                                <a href="mailto:info@sitename.com">info@sitename.com</a> 
                            </li>
                            <li> 
                                <i class="ti-mobile"></i>
                                <p>+ 457 789 789 65</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bottom_footer border-top-tran">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mb-md-0 text-center text-md-left">© {{ date('Y') }} <span class="text_default">Your Company</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

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