<header class="header_wrap fixed-top light_skin sticky_dark_skin main_menu_uppercase transparent_header header_with_topbar dd_dark_skin">
    <div class="top-header light_skin d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <ul class="contact_detail text-center text-lg-left">
                    	<li><i class="ti-mobile"></i><span>123-456-7890</span></li>
                    	<li><i class="ti-email"></i><span>contact@yourmail.com</span></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-end">
                        <ul class="social_icons social_white">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                        <ul class="header_list border_list">
                            <li><a href="{{ route('login') }}" class="nav_btn">Login</a></li>
                            <li><a href="#" class="nav_btn btn-default">Daftar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg"> 
        	<a class="navbar-brand" href="index.html"> 
            	<img class="logo_light" src="{{asset('landingpage/images/logo_light.png')}}" alt="logo"> 
                <img class="logo_dark" src="{{asset('landingpage/images/logo_dark.png')}}" alt="logo"> 
            </a>
          	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false"> <span class="ion-android-menu"></span> </button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
					<li class="">
                       <a class="nav-link" href="index.html">Beranda</a>
                    </li>

                    <li class="">
                       <a class="nav-link" href="index.html">Informasi</a>
                    </li>

                    <li class="">
                       <a class="nav-link" href="index.html">Program</a>
                    </li>
                </ul>
          	</div>
			<ul class="navbar-nav attr-nav align-items-center">
                <li>
                	<a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                    <div class="search_wrap"> 
                        <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                        <form>
                            <input type="text" placeholder="Search" class="form-control" id="search_input">
                            <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                </li>
                <li class="dropdown">
                	<a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span></a>
                    <div class="cart_box dropdown-menu dropdown-menu-right">
                        <ul class="cart_list">
                        	<li> <a href="#" class="item_remove"><i class="ion-close"></i></a> <a href="#"><img src="{{asset('landingpage/images/cart_thamb1.jpg')}}" alt="cart_thumb1">Variable product 001</a> <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span> </li>
                        	<li> <a href="#" class="item_remove"><i class="ion-close"></i></a> <a href="#"><img src="{{asset('landingpage/images/cart_thamb2.jpg')}}" alt="cart_thumb2">Ornare sed consequat</a> <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span> </li>
                        </ul>
                        <div class="cart_footer">
                        	<p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
                        	<p class="cart_buttons"><a href="#" class="btn btn-default rounded-0 view-cart">View Cart</a><a href="#" class="btn btn-dark rounded-0 checkout">Checkout</a></p>
                        </div>
                    </div>
                </li>
			</ul>
        </nav>
    </div>
</header>