<!DOCTYPE html>
<html lang="en">

<x-lphead></x-lphead>

<body>
<!-- START HEADER -->
<x-lpheader></x-lpheader>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section background_bg overlay_bg_50 page_title_light" data-img-src="{{asset('landingpage/images/login_bg.jpg')}}">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    <h1>Daftar Akun</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- STAT SECTION REGISTRASI --> 
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="padding_eight_all login_wrap">  
                    <div class="heading_s1">
                        <h4>Buat Akun Baru</h4>
                    </div>
                    <form method="post" action="{{ route('post.register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" required="" class="form-control" name="nik" placeholder="NIK" maxlength="60">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" maxlength="50">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="username" placeholder="Nama Pengguna" maxlength="90">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" required="" class="form-control" name="password" placeholder="Kata Sandi" maxlength="60">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="date" required="" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" required="" class="form-control" name="umur" placeholder="Umur" maxlength="11">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="gender" id="" class="form-control">
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="number" required="" class="form-control" name="whatsapp" placeholder="No Whatsapp" maxlength="60">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" required="" class="form-control" name="email" placeholder="Email" maxlength="191">
                                </div>  
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="profesi" placeholder="Pekerjaan Saat Ini" maxlength="60">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <textarea name="alamat" id="" cols="30" rows="4" class="form-control" placeholder="Alamat" required=""></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="motivasi" id="" cols="30" rows="4" class="form-control" placeholder="Motivasi Mengikuti Pelatihan" required=""></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-block" name="register">Daftar</button>
                        </div>
                    </form>
                    <div class="form-note text-center">Sudah Punya Akun? <a href="{{ route('login') }}">Login!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION REGISTRASI -->

<!-- START FOOTER -->
<x-lpfooter></x-lpfooter>
<!-- END FOOTER --> 
</body>

</html>