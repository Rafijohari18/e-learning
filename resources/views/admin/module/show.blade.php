@extends('layouts.master')

@section('title')
	{{ $module->judul }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ $module->judul }}</h4>
                <hr><br>
                
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $module->link }}"></iframe>
                        </div>
                    </div>
                </div>
                <p class="text-muted m-b-30 font-14">{!! $module->deskripsi !!}</p>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@stop

@section('footer')

@stop