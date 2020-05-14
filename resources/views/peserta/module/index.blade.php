@extends('layouts.master')

@section('title', 'Modul')

@section('content')

<div class="row mb-3">
    <div class="col-12">
        <h4 class="m-t-20 m-b-30">Modul</h4>
        <div class="card-columns">
        	@forelse($neko as $jquin)
            <div class="card m-b-30">
                <img class="card-img-top img-fluid" src="{{ asset('storage/'.$jquin->path) }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title font-20 mt-0">{{ $jquin->nama_modul }}</h4>
                    <p class="card-text">
	                    <i class="ti-user"></i> <small class="text-muted">Durasi </small>
	                    <i class="ti-calendar ml-2"></i> <small class="text-muted">Harga</small>
	                </p>
                    <p class="card-text">{!!  Str::limit($jquin->deskripsi, 50, '...') !!}</p>
                    <a href="#" class="btn btn-primary waves-effect waves-light">Pilih</a>
                </div>
            </div>
            @empty
            <div class="alert alert-info">Tidak ada modul untuk di tampilkan.</div>
            @endforelse
        </div>
    </div>
</div>
<!-- end row -->
@stop

@section('footer')

@stop