@extends('layouts.master')

@section('title','Detail Peserta')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="media">
                    <img class="d-flex mr-3 img-thumbnail thumb-lg" src="{{ asset('assets/images/users/default.png') }}" alt="Poto Profil">
                    <div class="media-body">
                        <h5 class="m-t-10 font-18 mb-1">{{ $peserta->nama_lengkap }}</h5>
                        <p class="text-muted m-b-5">{{ $peserta->user->username }}</p>
                        <p class="text-muted font-14 font-500 font-secondary">{{ $peserta->email }}</p>
                    </div>
                </div>

                <dl class="row text-left m-t-20">
                    <dt class="col-sm-5">NIK</dt>
                    <dd class="col-sm-7">{{ $peserta->nik }}</dd>

                    <dt class="col-sm-5">Nama Lengkap</dt>
                    <dd class="col-sm-7">{{ $peserta->nama_lengkap }}</dd>

                    <dt class="col-sm-5">Tempat, Tanggal Lahir</dt>
                    <dd class="col-sm-7">{{ $peserta->tgl_lahir }}</dd>

                    <dt class="col-sm-5">Umur</dt>
                    <dd class="col-sm-7">{{ $peserta->umur }} Tahun</dd>

                    <dt class="col-sm-5">Gender</dt>
                    <dd class="col-sm-7">
                        @if($peserta->gender == 'L')
                            Laki-Laki
                        @else
                            Perempuan
                        @endif
                    </dd>

                    <dt class="col-sm-5">Email</dt>
                    <dd class="col-sm-7">{{ $peserta->email }}</dd>

                    <dt class="col-sm-5">WhatsApp</dt>
                    <dd class="col-sm-7">{{ $peserta->whatsapp }}</dd>

                    <dt class="col-sm-5">Motivasi Ikut Program</dt>
                    <dd class="col-sm-7">{{ $peserta->motivasi }}</dd>

                    <dt class="col-sm-5">Alamat</dt>
                    <dd class="col-sm-7">{{ $peserta->alamat }}</dd>
                </dl>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@stop

@section('footer')
<!-- Parsley js -->
<script type="text/javascript" src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
@stop