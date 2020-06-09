@extends('layouts.master')

@section('title')
    Detail Program {{ $program->nama_program }}
@stop

@section('css')
<link href="{{ asset('assets/plugins/bootstrap-rating/bootstrap-rating.css')}}" rel="stylesheet" type="text/css">
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card m-b-30">
            <img class="card-img-top img-fluid" src="{{ asset('storage/'.$program->path) }}" alt="Card image cap">
            <div class="card-body">
                <div class="float-right">
                     <i class="mdi mdi-clock"></i> <span>{{ $program->durasi_program }}</span>&nbsp;
                     <i class="ti-wallet"></i> <span>Rp. {{ number_format($program->harga, 0, ',', '.') }}</span>
                </div>
                <h4 class="card-title font-20 mt-0">{{ $program->nama_program }} <br><input type="hidden" class="rating" data-filled="mdi mdi-star font-15 text-primary" data-empty="mdi mdi-star-outline font-15 text-muted" data-readonly value="{{ round($program->rating($program->id)) }}"/>
                </h4>
                <span class="badge badge-info">{{ $program->kategori->nama_kategori }}</span>
                <p class="card-text">
                    {!!  $program->deskripsi !!}
                </p>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script src="{{asset('assets/plugins/bootstrap-rating/bootstrap-rating.min.js')}}"></script>
<script src="{{asset('assets/pages/rating-init.js')}}"></script>
@stop