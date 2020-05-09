<div class="topbar">

    <nav class="navbar-custom">
        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input" type="search" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <ul class="list-inline float-right mb-0">
            <!-- Search -->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                    <i class="mdi mdi-magnify noti-icon"></i>
                </a>
            </li>
            <!-- Fullscreen -->
            <li class="list-inline-item dropdown notification-list hidden-xs-down">
                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-fullscreen noti-icon"></i>
                </a>
            </li>
            <!-- notification-->
            @yield('notifikasi')
            <!-- User-->
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <span class="text-info dropdown-item">
                        Your name
                    </span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href=""><i class="mdi mdi-lock-outline text-muted"></i> Ganti Kata Sandi</a>
                    <a class="dropdown-item" href=""><i class="mdi mdi-reproduction text-muted"></i> Kunci Layar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href=""><i class="dripicons-exit text-muted"></i> Keluar</a>
                </div>
            </li>
        </ul>

        <!-- Page title -->
        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="ion-navicon"></i>
                </button>
            </li>
            <li class="hide-phone list-inline-item app-search">
                <h3 class="page-title">@yield('text')</h3>
            </li>
        </ul>

        <div class="clearfix"></div>
    </nav>

</div>