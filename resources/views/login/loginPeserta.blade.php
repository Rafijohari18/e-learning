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
<title>E-learning Login </title>
<x-lphead></x-lphead>

<body>
<!-- START HEADER -->
<x-lpheader></x-lpheader>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="{{asset('storage/'.$pengaturan->login)}}">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title text-center">
                    <h1>Login</h1>
                    <p>Masukkan Nama Pengguna Dan Kata Sandi Untuk Melanjutkan</p>
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
            <div class="col-md-6">
                <div class="padding_eight_all login_wrap">  
                    <div class="heading_s1">
                        <h4>Login</h4>
                    </div>
                    <form method="POST" action="{{ route('post.login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" required="" class="form-control" name="username" placeholder="Masukkan Nama Pengguna">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required="" type="password" name="password" placeholder="Masukkan Kata Sandi">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-block">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION LOGIN -->

<!-- START FOOTER -->
<x-lpfooter></x-lpfooter>
<!-- END FOOTER --> 

</body>

</html>