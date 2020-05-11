<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>E-learning Login</title>
    <meta content="Masuk Monitoring" name="Login" />
    <meta content="Roni Surya" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- Alertify -->
    <link href="{{asset('assets/plugins/alertify/css/alertify.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center m-0">
                    <a href="index.html" class="logo logo-admin"><img src="{{asset('assets/images/logo_dark.png')}}" height="30" alt="logo"></a>
                </h3>

                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Selamat Datang !</h4>
                    <p class="text-muted text-center">Masukkan Nama Pengguna Dan Kata Sandi Untuk Melanjutkan.</p>
                     <form class="form-horizontal m-t-30" action="{{ route('post.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Nama Pengguna</label>
                            <input type="text" class="form-control" name="username" id="username" required="" placeholder="Masukkan Nama Pengguna">
                        </div>

                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                            <input type="password" name="password" required="" class="form-control" id="password" placeholder="Masukkan Kata Sandi">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-sm-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Ingat Saya!</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Masuk</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <a href="" class="text-muted"><i class="mdi mdi-lock"></i> Lupa Kata Sandi?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="m-t-40 text-center">
            <p>© {{ date('Y') }} E-learning Your Company.</p>
        </div>

    </div>


    <!-- jQuery  -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
    <!-- Alertify js -->
    <script src="{{asset('assets/plugins/alertify/js/alertify.js')}}"></script>
    <script src="{{asset('assets/pages/alertify-init.js')}}"></script>

    <!-- Parsley js -->
    <script type="text/javascript" src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <!-- Alert -->
    <script>
    @if(Session::has('error'))
        alertify.error("Nama Pengguna Atau Kata Sandi Salah!");
    @endif
    </script>

</body>
</html>