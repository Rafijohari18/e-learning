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
<title>Detail Pembayaran</title>
<!-- Favicon Icon -->
<x-lphead></x-lphead>

<body>
<!-- START HEADER -->
<x-lpheader></x-lpheader>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="assets/images/checkout_bg.jpg">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
            		<h1>Checkout</h1>
                </div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-lg-6">
            	<div class="toggle_info">
                	<span><i class="fas fa-user"></i>Returning customer? <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                </div>
                <div class="panel-collapse collapse login_form" id="loginform">
                    <div class="panel-body">
                    	<p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                    	<form method="post">
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="email" placeholder="Username Or Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox" value="">
                                        <label class="form-check-label" for="exampleCheckbox"><span>Remember me</span></label>
                                    </div>
                                </div>
                                <a href="#">Forgot password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-block" name="login">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            	<div class="toggle_info">
            		<span><i class="fas fa-tag"></i>Have a coupon? <a href="#coupon" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                </div>
                <div class="panel-collapse collapse coupon_form" id="coupon">
                    <div class="panel-body">
                    	<p>If you have a coupon code, please apply it below.</p>
                        <div class="coupon field_form input-group">
                            <input type="text" value="" class="form-control" placeholder="Enter Coupon Code..">
                            <div class="input-group-append">
                                <button class="btn btn-default btn-sm" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="medium_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-6">
            	<div class="heading_s1">
            		<h4>Daftar Akun</h4>
                </div>
                <form method="POST" action="" class="row">
                    @csrf
                    <div class="form-group col-md-6">
                        <input type="number" required="" class="form-control" name="nik" placeholder="NIK" maxlength="60">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <input type="text" required="" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" maxlength="50">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="text" required="" class="form-control" name="username" placeholder="Nama Pengguna" maxlength="90">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="password" required="" class="form-control" name="password" placeholder="Kata Sandi" maxlength="60">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="date" required="" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="number" required="" class="form-control" name="umur" placeholder="Umur" maxlength="11">
                    </div>

                    <div class="form-group col-md-12">
                        <div class="custom_select">
                           <select>
                                <option value="">Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="number" required="" class="form-control" name="whatsapp" placeholder="No Whatsapp" maxlength="60">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="email" required="" class="form-control" name="email" placeholder="Email" maxlength="191">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="text" required="" class="form-control" name="profesi" placeholder="Pekerjaan Saat Ini" maxlength="60">
                    </div>

                    <div class="form-group col-md-6">
                       <textarea name="alamat" id="" cols="30" rows="4" class="form-control" placeholder="Alamat" required=""></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <textarea name="motivasi" id="" cols="30" rows="4" class="form-control" placeholder="Motivasi Mengikuti Pelatihan" required=""></textarea>
                    </div>                   	
            </div>
            <div class="col-lg-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Program</th>
                                    <td>{{ $program->nama_program }}</td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">Rp. {{ number_format($program->harga, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Diskon</th>
                                    <td>@if(empty($program->diskon)) 0% @else {{$program->diskon}}% @endif</td>
                                </tr>
                                 {{-- Diskon --}}
                                 @php
                                    // Menentukan Diskon
                                    $besarnyaDiskon = $program->diskon;
                                    $harga = $program->harga;
                                    $diskon = ($besarnyaDiskon/100)*$harga;

                                    $totalDiskon = $diskon;
                                    // Total Bayar
                                    $total = $harga - $totalDiskon;
                                @endphp
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>Pembayaran</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="option3" checked="">
                                <label class="form-check-label" for="exampleRadios3">Kartu Prakerja</label>
                                <p data-method="option3" class="payment-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios5" value="option5">
                                <label class="form-check-label" for="exampleRadios5">Pembayaran Biasa</label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-default" type="submit">Ikuti Pelatihan</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START FOOTER -->
<x-lpfooter></x-lpfooter>
<!-- END FOOTER --> 

</body>

</html>