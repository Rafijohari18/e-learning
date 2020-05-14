@extends('layouts.master')

@section('title', 'Modul')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <div class="alert alert-info">Anda belum memiliki modul satupun untuk dipelajari.</div>
        <h4 class="m-t-20 m-b-30">Modul Terbaru</h4>
        <div class="card-columns">
        	@forelse($neko as $jquin)
            <div class="card m-b-30">
                <img class="card-img-top img-fluid" src="{{ asset('storage/'.$jquin->path) }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title font-20 mt-0"><a href="{{ route('module.detail', $jquin->id) }}" style="color: black;">{{ $jquin->nama_modul }}</a></h4>
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
@stop

@section('footer')

@stop