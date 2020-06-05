@extends('layouts.master')

@section('title')
    {{ $modul->judul }}
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ $modul->judul }}</h4>
                <hr><br>
                
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div id="player" data-plyr-provider="youtube" title="{{ $modul->judul }}" data-plyr-embed-id="{{ $modul->link }}"></div>
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
                @elseif($totalModul == count($neko))
                <div class="float-right">
                    <a href="{{ Route('peserta.quiz' ,['sectionId'=>$quis['id']]) }}" class="btn btn-sm btn-primary">Quis <i class="ti-angle-double-right"></i></a>
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
            <div class="card-body slimscrollleft">
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
                        <div class="mt-3 ml-5">
                            <img src="{{ asset('assets/images/modul/bookdf.png') }}" alt="" class="rounded" width="30">
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
                <div class="row">
                    <div class="col-md-2">
                        <div class="mt-3 ml-5">
                            <img src="{{ asset('assets/images/modul/lock.png') }}" alt="" class="rounded" width="30">
                        </div><br>
                    </div>

                    <div class="col-md-4">
                          <a href="#" onclick="quis()" class="text-dark">Quis {{ $quis->nama_program }} </a><br>
                        <small class="text-muted">Anda bisa melaksanakan quis setelah menyelesaikan semua modul pelatihan {{ $quis->nama_program }}</small>
                    </div>
                </div>
                @else
                <!-- Quis -->
                <div class="row">
                    <div class="col-md-2">
                        <div class="mt-3 ml-5">
                            <img src="{{ asset('assets/images/modul/quis.png') }}" alt="" class="rounded" width="30">
                        </div><br>
                    </div>
                    <div class="col-md-4">
                          <a href="{{ Route('peserta.quiz' ,['sectionId'=>$quis['id']]) }}" class="text-dark">Quis {{ $quis->nama_program }} </a>  <br>
                        <small class="text-muted">Pastikan anda sudah menguasai semua materi yang telah di pelajari.</small>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div> <!-- end col -->
</div>
@stop

@section('footer')
<script src="https://cdn.plyr.io/3.6.2/plyr.js"></script> 

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

<!-- Embed Video -->
<script>
    const controls = `
        <div class="plyr__controls">
            <button type="button" class="plyr__control" data-plyr="restart">
                <svg role="presentation"><use xlink:href="#plyr-restart"></use></svg>
                <span class="plyr__tooltip" role="tooltip">Restart</span>
            </button>
            <button type="button" class="plyr__control" data-plyr="rewind">
                <svg role="presentation"><use xlink:href="#plyr-rewind"></use></svg>
                <span class="plyr__tooltip" role="tooltip">Rewind {seektime} secs</span>
            </button>
            <button type="button" class="plyr__control" aria-label="Play, {title}" data-plyr="play">
                <svg class="icon--pressed" role="presentation"><use xlink:href="#plyr-pause"></use></svg>
                <svg class="icon--not-pressed" role="presentation"><use xlink:href="#plyr-play"></use></svg>
                <span class="label--pressed plyr__tooltip" role="tooltip">Pause</span>
                <span class="label--not-pressed plyr__tooltip" role="tooltip">Play</span>
            </button>
            <button type="button" class="plyr__control" data-plyr="fast-forward">
                <svg role="presentation"><use xlink:href="#plyr-fast-forward"></use></svg>
                <span class="plyr__tooltip" role="tooltip">Forward {seektime} secs</span>
            </button>
            <div class="plyr__progress">
                <input data-plyr="seek" type="range" min="0" max="100" step="0.01" value="0" aria-label="Seek">
                <progress class="plyr__progress__buffer" min="0" max="100" value="0">% buffered</progress>
                <span role="tooltip" class="plyr__tooltip">00:00</span>
            </div>
            <div class="plyr__time plyr__time--current" aria-label="Current time">00:00</div>
            <div class="plyr__time plyr__time--duration" aria-label="Duration">00:00</div>
            <button type="button" class="plyr__control" aria-label="Mute" data-plyr="mute">
                <svg class="icon--pressed" role="presentation"><use xlink:href="#plyr-muted"></use></svg>
                <svg class="icon--not-pressed" role="presentation"><use xlink:href="#plyr-volume"></use></svg>
                <span class="label--pressed plyr__tooltip" role="tooltip">Unmute</span>
                <span class="label--not-pressed plyr__tooltip" role="tooltip">Mute</span>
            </button>
            <div class="plyr__volume">
                <input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1" autocomplete="off" aria-label="Volume">
            </div>
            <button type="button" class="plyr__control" data-plyr="captions">
                <svg class="icon--pressed" role="presentation"><use xlink:href="#plyr-captions-on"></use></svg>
                <svg class="icon--not-pressed" role="presentation"><use xlink:href="#plyr-captions-off"></use></svg>
                <span class="label--pressed plyr__tooltip" role="tooltip">Disable captions</span>
                <span class="label--not-pressed plyr__tooltip" role="tooltip">Enable captions</span>
            </button>
            <button type="button" class="plyr__control" data-plyr="fullscreen">
                <svg class="icon--pressed" role="presentation"><use xlink:href="#plyr-exit-fullscreen"></use></svg>
                <svg class="icon--not-pressed" role="presentation"><use xlink:href="#plyr-enter-fullscreen"></use></svg>
                <span class="label--pressed plyr__tooltip" role="tooltip">Exit fullscreen</span>
                <span class="label--not-pressed plyr__tooltip" role="tooltip">Enter fullscreen</span>
            </button>
        </div>
    `;

    // Setup the player
    const player = new Plyr('#player', { controls }); 
</script>
@stop