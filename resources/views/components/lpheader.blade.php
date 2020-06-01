<header class="header_wrap fixed-top dark_skin main_menu_uppercase header_with_topbar">
    <div class="container">
        <nav class="navbar navbar-expand-lg"> 
        	<a class="navbar-brand" href="/"> 
            	<img class="logo_light" src="https://www.blkkbonang.com/portal/images/logo.png" alt="logo"> 
                <img class="logo_dark" src="https://www.blkkbonang.com/portal/images/logo.png" alt="logo"> 
            </a>
          	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> <span class="ion-android-menu"></span> </button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
					<li class="">
                       <a class="nav-link text-dark" href="/">Beranda</a>
                    </li>

                    <li class="">
                       <a class="nav-link text-dark" href="{{ route('informasi') }}">Informasi</a>
                    </li>

                    <li class="">
                       <a class="nav-link text-dark" href="{{ route('program') }}">Program</a>
                    </li>

                    <li>
                        <a href="{{ route('login') }}" class="nav-link text-dark">Login</a>
                    </li>
                </ul>
          	</div>
			<ul class="navbar-nav attr-nav align-items-center">
                <li>
                	<a href="javascript:void(0);" class="nav-link search_trigger text-dark"><i class="linearicons-magnifier"></i></a>
                    <div class="search_wrap"> 
                        <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                        <form>
                            <input type="text" placeholder="Cari Informasi..." class="form-control" id="search_input">
                            <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                </li>
			</ul>
        </nav>
    </div>
</header>