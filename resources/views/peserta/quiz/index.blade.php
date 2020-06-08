

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Peserta - Quiz</title>
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
     <!-- jQuery -->
    <script src="{{asset('assets/quiz/vendor/jquery.min.js')}}"></script>
    <?php
// koneksi ke mysqli
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "db_elearning";
// Create connection
    $koneksi = mysqli_connect($servername, $username, $password,$db);
// Check connection
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }


    //untuk memulai session
    session_start();

    //set session dulu dengan nama $_SESSION["mulai"]
    if (isset($_SESSION["mulai"])) { 
        //jika session sudah ada
        $telah_berlalu = time() - $_SESSION["mulai"];
    } else { 
        //jika session belum ada
        $_SESSION["mulai"]  = time();
        $telah_berlalu      = 0;
    } 

    $sql    = mysqli_query($koneksi,"select * from timer");   
    $tes   = mysqli_fetch_array($sql);

    $temp_waktu = ($tes['waktu']*60) - $telah_berlalu; //dijadikan detik dan dikurangi waktu yang berlalu
    $temp_menit = (int)($temp_waktu/60);                //dijadikan menit lagi
    $temp_detik = $temp_waktu%60;                       //sisa bagi untuk detik

    if ($temp_menit < 60) { 
        /* Apabila $temp_menit yang kurang dari 60 meni */
        $jam    = 0; 
        $menit  = $temp_menit; 
        $detik  = $temp_detik; 
    } else { 
        /* Apabila $temp_menit lebih dari 60 menit */           
        $jam    = (int)($temp_menit/60);    //$temp_menit dijadikan jam dengan dibagi 60 dan dibulatkan menjadi integer 
        $menit  = $temp_menit%60;           //$temp_menit diambil sisa bagi ($temp_menit%60) untuk menjadi menit
        $detik  = $temp_detik;
    }   
    ?>

    <!-- Script Timer -->
    <script type="text/javascript">
        $(document).ready(function() {
            /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik;
                * var menit;
                * var jam;
                */
                var detik   = <?= $detik; ?>;
                var menit   = <?= $menit; ?>;
                var jam     = <?= $jam; ?>;

            /**
               * Membuat function hitung() sebagai Penghitungan Waktu
               */
               function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                     * mengulang atau merefresh halaman selama 1000 (1 detik) 
                     */
                     setTimeout(hitung,1000);

                     /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
                     if(menit < 10 && jam == 0){
                        var peringatan = 'style="color:red"';
                    };

                    /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                    $('#timer').html(
                        '<h3 align="center"'+peringatan+'>Sisa waktu anda <br />' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h3><hr>'
                        );

                    /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                    detik --;

                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                    */
                    if(detik < 0) {
                        detik = 59;
                        menit --;

                   /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                        */
                        if(menit < 0) {
                            menit = 59;
                            jam --;

                        /** Jika var jam < 0
                            * clearInterval() Memberhentikan Interval dan submit secara otomatis
                            */

                            if(jam < 0) { 
                                clearInterval(hitung); 
                                /** Variable yang digunakan untuk submit secara otomatis di Form */
                                var frmSoal = document.getElementById("submit"); 
                                alert('Waktu Anda telah habis');
                                
                                $("#submit").trigger('click');


                            } 
                        } 
                    } 
                }           
                /** Menjalankan Function Hitung Waktu Mundur */
                hitung();
            });
        </script>
        <?php  session_destroy(); ?>
    </head>

    <body class=" layout-fluid">
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
                            <a class="navbar-brand">
                                <img src="https://www.blkkbonang.com/portal/images/logo.png" class="mr-2" alt="Logo" />
                            </a>
                            <div class="flex"></div>
                            <!-- Menu -->
                            <ul class="nav navbar-nav flex-nowrap">
                                <!-- User dropdown -->
                                <li class="nav-item dropdown ml-1 ml-md-3">
                                        @if(auth()->user()->path != 'default.png')
                                        <img src="{{ asset('storage/'.auth()->user()->path) }}" alt="user" class="rounded-circle" width="40">
                                       @else
                                        <img src="{{ asset('assets/images/users/default.png') }}" alt="user" class="rounded-circle" width="40">
                                       @endif
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
                            <form id="frmSoal" action="{{ route('quis.tambah',['id'=> Request::segment('3') ])}}" method="POST">
                                @csrf
                                @php 
                                $i=1;

                                @endphp
                                @foreach($soal as $value)
                                @php $o=$i++; @endphp
                                <input type="hidden" name="id" value="{{ $value->id }}" >
                                <input type="hidden" name="jumlah" value="{{ $data['jumlah']}}">
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
                                     <?php 
                                     $no = 1;     
                                     $data['shuffled'] = DB::table('pilihan')->where('soal_id',$value->id)->get();
                                     $pilihan = $data['shuffled']->shuffle();
                                     ?>



                                     @foreach($pilihan as $row)
                                     @php 
                                     $n = $no++;
                                     @endphp
                                     <div class="custom-controls-stacked mt-3">
                                        <fieldset>
                                            <div class="custom-control custom-radio">

                                                <input id="radioStacked{{ $o }}--{{ $n }}; ?>" value="{{ $value->id  }}---{{ $row->pilihan  }}" name="jawaban[{{ $o}}]" type="radio" class="custom-control-input">
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
                                Hentikan Quis 
                                <i class="material-icons btn__icon--right">send</i>
                            </button>
                        </form>


                    </div>

                </div>

                <div class="mdk-drawer js-mdk-drawer" data-align="end">
                    <div class="mdk-drawer__content ">
                        <div class="sidebar sidebar-right sidebar-light bg-white o-hidden" data-perfect-scrollbar>
                            <div class="sidebar-p-y">
                                <div id='timer'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
</body>
</html>