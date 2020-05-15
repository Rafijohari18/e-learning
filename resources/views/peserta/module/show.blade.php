@extends('layouts.master')

@section('title')
    {{ $module->nama_modul }}
@stop

@section('css')
<link href="{{asset('assets/plugins/bootstrap-rating/bootstrap-rating.css')}}" rel="stylesheet" type="text/css">
@stop

@section('content')
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
                    <a href="" class="btn btn-sm btn-primary">Ikuti Pelatihan</a>
                </p>
            </div>
        </div>
    </div>
</div> <!-- end row -->
@stop

@section('footer')
<!-- Bootstrap rating js -->
<script src="{{asset('assets/plugins/bootstrap-rating/bootstrap-rating.min.js')}}"></script>
<script src="{{asset('assets/pages/rating-init.js')}}"></script>
@stop