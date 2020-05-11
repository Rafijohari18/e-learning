<div class="left side-menu">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="">
            <!--<a href="index.html" class="logo text-center">Fonik</a>-->
            <a href="/" class="logo"><img src="{{asset('assets/images/logo.png')}}" height="20" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Menu</li>
                @if(auth()->user()->role == 'Admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect"><i class="dripicons-device-desktop"></i><span> Dashboard </span></a>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="ti-layers"></i><span> Konten </span></a>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="mdi mdi-book"></i><span> Kategori Materi </span></a>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="ti-book"></i><span> Materi </span></a>
                </li>

                <!-- <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-book"></i><span> Materi <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="list-unstyled">
                        <li><a href="ui-buttons.html">Modul</a></li>
                        <li><a href="ui-cards.html">Video</a></li>
                    </ul>
                </li> -->

                <li>
                    <a href="" class="waves-effect"><i class="ti-clipboard"></i><span> Program </span></a>
                </li>

                <!-- <li>
                    <a href="" class="waves-effect"><i class="mdi mdi-account-multiple"></i><span> Data Peserta </span></a>
                </li> -->

                 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-multiple"></i><span> Data Peserta <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="list-unstyled">
                        <li><a href="ui-buttons.html">Peserta E-learning</a></li>
                        <li><a href="ui-cards.html">Prakerja</a></li>
                    </ul>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="ti-wallet"></i><span> Data Transaksi </span></a>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="mdi mdi-account-multiple"></i><span> Data Pengguna </span></a>
                </li>
                @elseif(auth()->user()->role == 'Peserta')
                <li>
                    <a href="{{ route('peserta.dashboard') }}" class="waves-effect"><i class="dripicons-device-desktop"></i><span> Dashboard </span></a>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="ti-announcement"></i><span> Informasi </span></a>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="ti-book"></i><span> Materi </span></a>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="ti-pencil-alt"></i><span> Quis </span></a>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="ti-medall"></i><span> Sertifikat </span></a>
                </li>

                <!-- <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-book"></i><span> Materi <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="list-unstyled">
                        <li><a href="ui-buttons.html">Modul</a></li>
                        <li><a href="ui-cards.html">Video</a></li>
                    </ul>
                </li> -->

                <li>
                    <a href="" class="waves-effect"><i class="ti-wallet"></i><span> Riwayat Transaksi </span></a>
                </li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>