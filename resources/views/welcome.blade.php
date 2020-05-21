<div class="row mb-3">
    <div class="col-12">
        <div class="alert alert-info">Anda belum memiliki modul satupun untuk dipelajari.</div>
        <h4 class="m-t-20 m-b-30">Modul Terbaru</h4>
        <div class="card-columns">
            @forelse($neko as $jquin)
            <div class="card m-b-30">
                <img class="card-img-top img-fluid" src="{{ asset('storage/'.$jquin->path) }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title font-20 mt-0"><a href="{{ route('module.detail', $jquin->id) }}" style="color: black;">{{ $jquin->nama_program }}</a></h4>
                    <span class="badge badge-info">{{ $jquin->kategori->nama_kategori }}</span>
                   
                    <p class="card-text">{!!  Str::limit($jquin->deskripsi, 100, '. <a href="detail/'.$jquin->id.'/modul"> Selengkapnya...</a>') !!}</p>
                </div>
                <div class="card-footer bg-white">
                     <p class="card-text">
                        <i class="mdi mdi-clock"></i> <span> {{ $jquin->durasi_program }} </span>
                        <span class="float-right">Rp{{ number_format($jquin->harga, 0, ',', '.') }}</span>
                    </p>
                </div>
            </div>
            @empty
            <div class="alert alert-info">Tidak ada modul untuk di tampilkan.</div>
            @endforelse
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <img class="card-img-top img-fluid" src="{{ asset('storage/'.$module->path) }}" alt="Card image cap">
            <div class="card-body">
                <div class="float-right"><i class="mdi mdi-clock"></i> <span>{{ $module->durasi_program }} </span> <span >Rp{{ number_format($module->harga, 0, ',', '.') }}</span></div>
                <h4 class="card-title font-20 mt-0">{{ $module->nama_modul }}</h4>
                <span class="badge badge-info">{{ $module->kategori->nama_kategori }}</span>
                <br><br>
                <input type="hidden" class="rating" data-filled="mdi mdi-star font-20 text-primary" data-empty="mdi mdi-star-outline font-20 text-muted" data-readonly value="3"/>
                <p class="card-text">
                    {!! $module->deskripsi !!}
                </p>
            </div>
            <div class="card-footer bg-white">
                 <p class="card-text">
                    <a href="#" data-toggle="modal" data-target="#ikuti" class="btn btn-sm btn-primary">Ikuti Pelatihan</a>
                </p>
            </div>
        </div>
    </div>
</div> <!-- end row -->

<!-- modal -->
<!-- sample modal content -->
<div id="ikuti" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Ikuti Pelatihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="" method="POST">
                @csrf
              <div class="modal-body">
                  <div class="container-fluid">
                      <div class="form-group">
                        <label for="name">Nama Program</label>
                        <input type="text" placeholder="Masukkan Nama Program" name="nama_program" id="nama_program" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary waves-effect" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Simpan</button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@extends('layouts.master')

@section('title','Data Pengguna')

@section('css')
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="float-right">
                
                </div>
                <h4 class="mt-0 header-title">Data Invoice - {{ Auth::user()->nama_lengkap }}</h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Program</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-striped">
                        @forelse($data['program'] as $jquin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jquin->program->nama_program }}</td>
                            <td>
                                <a href="{{ route('peserta.detail',['id'=> $jquin->id ])}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Invoice"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4"><b><i>Tidak Ada Data</i></b></td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- Modal -->
<x-pengguna></x-pengguna>
@stop

@section('footer')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/pages/datatables.init.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>

<script>
    $().DataTable();
</script>

<!-- Destroy -->

@stop

if (unserialize(Cookie::get('hosting'))) {
        // Insert Table User
        $data =  new User();
        $data->nama_lengkap = $request->nama_lengkap;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->role = 'Peserta';
        $data->path = 'default.png';
        $data->save();

        // Insert Table Transaksi
        $cookie = unserialize(Cookie::get('hosting'));
        $a['kode_invoice'] = 'INV-'.mt_rand(100000, 999999).date('s');
        $a['user_id'] = $data->id;
        $a['program_id'] = $cookie['program_id'];
        $a['status'] = 'Menunggu Verifikasi';

        $ProgramPeserta = Transaksi::insert($a);

        // Insert Table Peserta
        $peserta = new Peserta();
        $peserta->user_id = $data->id;
        $peserta->nik = $request->nik;
        $peserta->nama_lengkap = $request->nama_lengkap;
        $peserta->tgl_lahir = $request->tgl_lahir;
        $peserta->umur = $request->umur;
        $peserta->gender = $request->gender;
        $peserta->whatsapp = $request->whatsapp;
        $peserta->email = $request->email;
        $peserta->profesi = $request->profesi;
        $peserta->alamat = $request->alamat;
        $peserta->motivasi = $request->motivasi;
        $peserta->save();

        return redirect('login')->with('alert-success','Kamu berhasil Register');
        
        }else{
            // Insert To Table User
            $data =  new User();
            $data->nama_lengkap = $request->nama_lengkap;
            $data->username = $request->username;
            $data->password = bcrypt($request->password);
            $data->role = 'Peserta';
            $data->path = 'default.png';
            $data->save();

            // Insert To Table Peserta
            $peserta = new Peserta();
            $peserta->user_id = $cookie['user_id'];
            $peserta->nik = $request->nik;
            $peserta->nama_lengkap = $request->nama_lengkap;
            $peserta->tgl_lahir = $request->tgl_lahir;
            $peserta->umur = $request->umur;
            $peserta->gender = $request->gender;
            $peserta->whatsapp = $request->whatsapp;
            $peserta->email = $request->email;
            $peserta->profesi = $request->profesi;
            $peserta->alamat = $request->alamat;
            $peserta->motivasi = $request->motivasi;
            $peserta->save();
            
            return redirect('login')->with('alert-success','Kamu berhasil Register');
        }

<!-- Auth Sebelumnya -->
                if (unserialize(Cookie::get('hosting'))) {
            $cookie = unserialize(Cookie::get('hosting'));
            if (Auth::attempt($request->only('username','password'))) {
                if (auth()->user()->role == 'Peserta') {
                    return redirect()->route('struk.upload')->with('welcome','');
                }
            }
        }else{
        
        }

        <!-- Registrasi -->
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

<!-- Program -->
<form action="{{ route('invoice.modul') }}" method="POST">
@csrf
<input type="hidden" name="program_id" value="{{ $mdl->id}}">
<input type="hidden" name="harga" value="{{ $mdl->harga }}">
@if(Auth::user() == null)
@else
<input type="hidden" name="user_id" value="{{ Auth::user()['id'] }}">
@endif
</form>