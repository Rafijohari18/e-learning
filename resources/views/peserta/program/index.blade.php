@extends('layouts.master')

@section('title', 'Program')

@section('content')

@if(empty($neko))
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">Anda belum memiliki program satupun untuk dipelajari.</div>
    </div>
</div>
@else
    @if(count($neko) > 0)
    <div class="row">
        <div class="col-md-4">
            @foreach($neko as $jquin)
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
                                <i class="ti-wallet"></i> Harga - <span>Rp{{ number_format($jquin->program->harga, 0, ',', '.') }}</span>
                            </li>
                        </ul>
                    </p>
                </div>
                <div class="card-footer bg-white">
                  <a href="{{ route('program.read', $jquin->program_id) }}" class="btn btn-sm btn-info">Modul</a>
              </div>
          </div>

      </div>
    </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">Anda belum memiliki program satupun untuk dipelajari.</div>
        </div>
    </div>
    @endif
@endif
@stop

@section('footer')

@stop