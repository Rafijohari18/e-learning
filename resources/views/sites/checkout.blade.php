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
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="{{asset('storage/'.$pengaturan->checkout)}}">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title text-center">
            		<h1>Transaksi</h1>
                    <p>Selesaikan Pembayaran Anda</p>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
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
                <form method="POST" action="{{ route('post.register') }}" class="row">
                    @csrf
                    <input type="hidden" name="program_id" value="{{ $program->id }}">
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
                        <small class="text-muted">*Tanggal Lahir</small>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="number" required="" class="form-control" name="umur" placeholder="Umur" maxlength="11">
                    </div>

                    <div class="form-group col-md-12">
                        <div class="custom_select">
                           <select name="gender">
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
                        <textarea name="motivasi" id="" cols="30" rows="4" class="form-control" placeholder="Motivasi Mengikuti Program" required=""></textarea>
                    </div>                   	
            </div>
            <div class="col-lg-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Detail Transaksi</h4>
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
                            <h4>Metode Pembayaran</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment" id="tf" value="tf">
                                <label class="form-check-label" for="tf">E-Banking</label>
                            </div>
                            
                            <div class="custome-radio">
                                <input class="form-check-input" required="" name="payment" type="radio" id="kartuprakerja" value="kartuprakerja">
                                <label class="form-check-label" for="kartuprakerja">Kartu Prakerja</label>

                                <div id="kp">
                                    <br>
                                    <div class="form-group">
                                        <input type="number" name="no_kk" placeholder="Masukkan No Kartu Prakerja" class="form-control form-sm" maxlength="20" id="no_kk">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="kupon" placeholder="Masukkan Kode Kupon" class="form-control form-sm" maxlength="10" id="kupon">
                                    </div>
                                </div>
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
<script>
$(document).ready(function() {
    $('#kp').hide();
    $("#tf").click(function() {
        $("#kp").hide('slow');
        $("#no_kk").removeAttr('required','required');
        $("#kupon").removeAttr('required','required');
    });

    $("#kartuprakerja").click(function() {
        $("#kp").show('slow');
        $("#no_kk").attr('required','required');
        $("#kupon").attr('required','required');
    });
});
</script>
<!-- END FOOTER --> 

</body>

</html>