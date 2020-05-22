<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>E-learning - @yield('title')</title>
        <meta content="E-learning Dashboard" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="https://www.blkkbonang.com/portal/favicon.png">

        <!-- Css -->
        @yield('css')

        <!-- Basic Css files -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>


    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <x-sidebar></x-sidebar>
            <!-- Left Sidebar End -->


            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <x-navbar></x-navbar>
                    <!-- Top Bar End -->

                    <!-- ==================
                         PAGE CONTENT START
                         ================== -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            @yield('content')
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
                </div> <!-- content -->

                <footer class="footer">
                    © {{ date('Y') }} E-learning Your Company.
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.min.js')}}"></script>
        <!-- Popper for Bootstrap -->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
        <!-- Alertify js -->
        <script src="{{asset('assets/plugins/alertify/js/alertify.js')}}"></script>
        <script src="{{asset('assets/pages/alertify-init.js')}}"></script>

        <!-- Footer -->
        @yield('footer')
        <x-alert></x-alert>

        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
    </body>
</html>