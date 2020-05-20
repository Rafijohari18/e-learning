@extends('layouts.master')

@section('title')
    {{ $modul->judul }}
@stop

@section('css')

@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ $modul->judul }}</h4>
                <hr><br>
                
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9 img-thumbnail">
                            <iframe class="embed-responsive-item" src="{{ $modul->link }}"></iframe>
                        </div>
                    </div>
                </div>
                <p class="text-muted m-b-30 font-14">{!! $modul->deskripsi !!}</p>
            </div>
            <div class="card-footer bg-white">
                <div class="float-right">
                    <a href="" class="btn btn-sm btn-primary">Selanjutnya <i class="ti-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Daftar Belajar</h4>
                <hr>
                @foreach($neko as $jquin)
                <div class="row">
                    <div class="col-md-2">
                        @if($jquin->status != 1)
                        <div class="embed-responsive embed-responsive-16by9 img-thumbnail">
                            <iframe class="embed-responsive-item" src="{{ $jquin->link }}"></iframe>
                        </div><br>
                        @else
                        <div class="mt-3 ml-5">
                            <img src="{{ asset('assets/images/modul/lock.png') }}" alt="" class="rounded" width="30">
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        {{ $jquin->judul }}
                        <small class="text-muted">{!! Str::limit($jquin->deskripsi, 50, '...') !!}</small>
                    </div>
                </div>
                @endforeach
                @foreach($quis as $row)
                <div class="row">
                    <div class="col-md-2">
                        @if($row->status != 1)
                        <div class="embed-responsive embed-responsive-16by9 img-thumbnail">
                            <iframe class="embed-responsive-item" src="{{ $row->link }}"></iframe>
                        </div><br>
                        @else
                        <div class="mt-3 ml-5">
                            <img src="{{ asset('assets/images/modul/lock.png') }}" alt="" class="rounded" width="30">
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                          <a href="{{ Route('peserta.quiz' ,['sectionId'=>$row['id']]) }}">Quis {{ $row->nama_program }} </a>  <br>
                        <small class="text-muted">Quis akan bisa di mulai jika anda telah menyelesaikan semua modul pelatihan {{ $row->nama_program }}</small>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div> <!-- end col -->
</div>
@stop

@section('footer')

@stop