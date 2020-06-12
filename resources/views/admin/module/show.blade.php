@extends('layouts.master')

@section('title')
	{{ $module->judul }}
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ $module->judul }} ({{ $module->durasi }})</h4>
                <hr><br>
                
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div id="player" data-plyr-provider="youtube" title="{{ $module->judul }}" data-plyr-embed-id="{{ $module->link }}"></div>
                    </div>
                </div>
                <p class="text-muted m-b-30 font-14">{!! $module->deskripsi !!}</p>

                @if($module->file != NULL)
                    <span class="text-muted"><i class="ti-file"></i> <a href="{{ route('module.download', $module->id) }}" target="_blank">Download File</a></span>
                @endif
            </div>
        </div>
    </div> <!-- end col -->
</div>
@stop

@section('footer')
<script src="https://cdn.plyr.io/3.6.2/plyr.js"></script> 

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