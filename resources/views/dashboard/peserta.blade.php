@extends('layouts.master')

@section('css')

@stop

@section('title', 'Dashboard')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-7">
        <div class="card m-b-20">
            <div class="card-body">
            	<div class="float-right">
            		<a href="{{ route('edit.profil') }}" class="btn btn-sm btn-warning"><i class="ti-pencil" data-toggle="tooltip" data-placement="top" title="Edit Profil"></i></a>
            	</div>
                <div class="media">
                    <img class="d-flex mr-3 rounded-circle thumb-lg" src="@if(auth()->user()->path != 'default.png') {{ asset('storage/'.auth()->user()->path) }} @else {{ asset('assets/images/users/'.auth()->user()->path) }} @endif" alt="Avatar">
                    <div class="media-body">
                        <h5 class="m-t-10 font-18 mb-1">{{ auth()->user()->nama_lengkap }}</h5>
                        <p class="text-muted m-b-5">{{ auth()->user()->username }}</p>
                        <p class="text-muted font-14 font-500 font-secondary">{{ $neko->nik }}</p>
                    </div>
                </div>
                <dl class="row text-left m-t-20">
                    <dt class="col-sm-5">NIK</dt>
                    <dd class="col-sm-7">{{ $neko->nik }}</dd>

                    <dt class="col-sm-5">Nama Lengkap</dt>
                    <dd class="col-sm-7">{{ $neko->nama_lengkap }}</dd>

                    <dt class="col-sm-5">Tempat, Tanggal Lahir</dt>
                    <dd class="col-sm-7">{{ date('d-m-Y', strtotime($neko->tgl_lahir)) }}</dd>

                    <dt class="col-sm-5">Umur</dt>
                    <dd class="col-sm-7">{{ $neko->umur }} Tahun</dd>

                    <dt class="col-sm-5">Jenis Kelamin</dt>
                    <dd class="col-sm-7">
                    	@if($neko->gender == 'L')
                    	Laki-Laki
                    	@else
                    	Perempuan
                    	@endif
                    </dd>

                    <dt class="col-sm-5">Email</dt>
                    <dd class="col-sm-7">{{ $neko->email }}</dd>

                    <dt class="col-sm-5">WhatsApp</dt>
                    <dd class="col-sm-7">{{ $neko->whatsapp }}</dd>

                    <dt class="col-sm-5">Profesi</dt>
                    <dd class="col-sm-7">{{ $neko->profesi }}</dd>

                    <dt class="col-sm-5">Pelatihan Yang Diikuti</dt>
                    <dd class="col-sm-7"> 
                       @if(count(auth()->user()->ProgramPeserta) > 0) {{ auth()->user()->ProgramPeserta->first->program->program->nama_program }} @else - @endif
                   </dd>

                    <dt class="col-sm-5">Motivasi Mengikuti Program</dt>
                    <dd class="col-sm-7">{{ $neko->motivasi }}</dd>
                    
                    <dt class="col-sm-5">Alamat</dt>
                    <dd class="col-sm-7">{{ $neko->alamat }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')

@stop