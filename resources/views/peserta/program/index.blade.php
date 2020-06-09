@extends('layouts.master')

@section('title', 'Program')

@section('css')
<link href="{{ asset('assets/plugins/bootstrap-rating/bootstrap-rating.css')}}" rel="stylesheet" type="text/css">
@stop

@section('content')

@if(empty($neko))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">Anda belum memiliki program untuk dipelajari.</div>
    </div>
</div>
@else
    @if(count($neko) > 0)
    <div class="row">
        @foreach($neko as $jquin)
        <div class="col-md-4">
            <div class="card m-b-30">
                <img class="card-img-top img-fluid" src="{{ asset('storage/'.$jquin->program->path) }}" alt="{{ $jquin->program->nama_program }}">
                <div class="card-body">
                    <h4 class="card-title font-20 mt-0"><a href="" style="color: black;">{{ $jquin->program->nama_program }}</a></h4>
                    
                    <p class="card-text">{!!  Str::limit($jquin->program->deskripsi, 100, '. <a href="detail/'.$jquin->program->id.'/show"> Selengkapnya...</a>') !!}</p>
                    <p class="card-text">

                        <ul>
                            <li>
                                <i class="ti-tag"></i> Kategori - <span class="badge badge-info">{{ $jquin->program->kategori->nama_kategori }}</span>
                            </li>
                            <li>
                                <i class="mdi mdi-clock"></i> Durasi - <span> {{ $jquin->program->durasi_program }} </span>
                            </li>
                            <li>
                                <i class="ti-wallet"></i> Harga - <span>Rp. {{ number_format($jquin->program->harga, 0, ',', '.') }}</span>
                            </li>
                            <li>
                                <input type="hidden" class="rating" data-filled="mdi mdi-star font-24 text-primary" data-empty="mdi mdi-star-outline font-24 text-muted" data-readonly value="{{ round($jquin->program->averageRating) }}"/>
                            </li>
                        </ul>
                    </p>
                </div>
                <div class="card-footer bg-white">
                  <a href="{{ route('program.read', [$jquin->program_id,$jquin->program->module->first->id]) }}" class="btn btn-sm btn-info">Mulai Pelatihan</a>
              </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">Anda belum memiliki program untuk dipelajari.</div>
        </div>
    </div>
    @endif
@endif
@stop

@section('footer')
<script src="{{ asset('assets/plugins/bootstrap-rating/bootstrap-rating.min.js')}}"></script>
<script src="{{ asset('assets/pages/rating-init.js')}}"></script>
@stop

