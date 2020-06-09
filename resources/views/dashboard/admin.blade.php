@extends('layouts.master')

@section('css')

@stop

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
                <h3 class="text-info">{{ $program }}</h3>
                Total Program
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
                <h3 class="text-purple">{{ $module }}</h3>
                Total Modul
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
                <h3 class="text-primary">{{ $peserta }}</h3>
                Peserta Umum
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
                <h3 class="text-danger">{{ $prakerja }}</h3>
                Peserta Prakerja
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
                <h3 class="text-purple">{{ $pengajar }}</h3>
                Total Pengajar
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
                <h3 class="text-info">{{ $tmv }}</h3>
                Transaksi Menunggu Verifikasi
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
                <h3 class="text-primary">{{ $dv }}</h3>
                Transaksi Diverifikasi
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')

@stop