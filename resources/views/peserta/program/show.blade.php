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
                @if($next_id)
                <div class="float-right">
                    <form action="{{ route('daftar.belajar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="program_id" value="{{ Request::segment(4) }}">
                        <input type="hidden" name="modul_id" value="{{ $next_id }}">

                        <button class="btn btn-sm btn-primary" type="submit">Selanjutnya <i class="ti-angle-double-right"></i></button>
                    </form>
                </div>
                @endif

                @if($prev_id)
                <div class="float-left">
                    <a href="{{ route('program.read', [Request::segment(4),$prev_id]) }}" class="btn btn-sm btn-primary"><i class="ti-angle-double-left"></i> Sebelumnya</a>
                </div>
                @endif
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
                <!-- Daftar Belajar -->
                @foreach($neko as $jquin)
                <div class="row">
                    {{-- Bandingkan Data --}}
                    @php
                        $daftar = DB::table('daftar_belajar')->where('user_id', auth()->user()->id)->where('modul_id', $jquin->id)->get();
                        $daftar;
                    @endphp

                    @forelse($daftar as $df)
                    <div class="col-md-2">
                        <div class="embed-responsive embed-responsive-16by9 img-thumbnail">
                            <iframe class="embed-responsive-item" src="{{ $jquin->link }}"></iframe>
                        </div>
                        <br>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('program.read', [Request::segment(4),$jquin->id]) }}" class="@if($modul->judul == $jquin->judul) text-info @else text-dark @endif">{{ $jquin->judul }}</a>
                        <small class="text-muted">{!! Str::limit($jquin->deskripsi, 100, '...') !!}</small>
                    </div>
                    @empty
                    <div class="col-md-2">
                        <div class="mt-3 ml-5">
                            <img src="{{ asset('assets/images/modul/lock.png') }}" alt="" class="rounded" width="30">
                        </div>
                        <br>
                    </div>

                    <div class="col-md-4">
                        <a href="#" onclick="validasi()" class="@if($modul->judul == $jquin->judul) text-info @else text-dark @endif">{{ $jquin->judul }}</a>
                        <small class="text-muted">{!! Str::limit($jquin->deskripsi, 50, '...') !!}</small>
                    </div>
                    @endforelse
                </div>
                @endforeach

                {{-- Unlock Quis --}}
                @if($totalModul != count($neko))
                <!-- Quis -->
                @foreach($quis as $row)
                <div class="row">
                    <div class="col-md-2">
                        <div class="mt-3 ml-5">
                            <img src="{{ asset('assets/images/modul/lock.png') }}" alt="" class="rounded" width="30">
                        </div><br>
                    </div>

                    <div class="col-md-4">
                          <a href="#" onclick="quis()" class="text-dark">Quis {{ $row->nama_program }} </a><br>
                        <small class="text-muted">Quis akan bisa di mulai jika anda telah menyelesaikan semua modul pelatihan {{ $row->nama_program }}</small>
                    </div>
                </div>
                @endforeach
                @else
                <!-- Quis -->
                @foreach($quis as $row)
                <div class="row">
                    <div class="col-md-2">
                        <div class="mt-3 ml-5">
                            <img src="{{ asset('assets/images/modul/quis.png') }}" alt="" class="rounded" width="30">
                        </div><br>
                    </div>
                    <div class="col-md-4">
                          <a href="{{ Route('peserta.quiz' ,['sectionId'=>$row['id']]) }}" class="text-dark">Quis {{ $row->nama_program }} </a>  <br>
                        <small class="text-muted">Pastikan anda sudah menguasai semua materi yang telah di pelajari.</small>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div> <!-- end col -->
</div>
@stop

@section('footer')
<script>
    function validasi() {
        alertify.alert("Selesaikan materi sebelumnya terlebih dahulu!");
        return false;
    }

    function quis() {
        alertify.alert("Selesaikan semua modul terlebih dahulu!");
        return false;
    }
</script>
@stop