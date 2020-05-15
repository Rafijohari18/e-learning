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
<title>E-learning Daftar</title>
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
<x-lpheader></x-lpheader>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="{{asset('landingpage/images/login_bg.jpg')}}">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1>Daftar Akun</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- STAT SECTION LOGIN --> 
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="padding_eight_all login_wrap">  
                    <div class="heading_s1">
                        <h4>Buat Akun Baru</h4>
                    </div>
                    <form method="post" action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" required="" class="form-control" name="nik" placeholder="NIK" maxlength="60">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" maxlength="50">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="username" placeholder="Nama Pengguna" maxlength="90">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" required="" class="form-control" name="password" placeholder="Kata Sandi" maxlength="60">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="date" required="" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" required="" class="form-control" name="umur" placeholder="Umur" maxlength="11">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="gender" id="" class="form-control">
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" required="" class="form-control" name="whatsapp" placeholder="No Whatsapp" maxlength="60">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" required="" class="form-control" name="email" placeholder="Email" maxlength="191">
                                </div>  
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="profesi" placeholder="Pekerjaan Saat Ini" maxlength="60">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <textarea name="alamat" id="" cols="30" rows="4" class="form-control" placeholder="Alamat" required=""></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="motivasi" id="" cols="30" rows="4" class="form-control" placeholder="Motivasi Mengikuti Pelatihan" required=""></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-block" name="register">Daftar</button>
                        </div>
                    </form>
                    <!-- <div class="different_login">
                        <span> Atau</span>
                    </div>
                    <ul class="btn-login list_none text-center">
                        <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                        <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                    </ul> -->
                    <div class="form-note text-center">Sudah Punya Akun? <a href="{{ route('login') }}">Login!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION LOGIN -->

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