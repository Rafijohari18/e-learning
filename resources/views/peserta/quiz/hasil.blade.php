@extends('layouts.master')

@section('title', 'Detail Transaksi')

@section('css')

@stop

@section('content')
<?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?>


<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card m-b-30 card-body">
            <h3 class="card-title font-20 mt-0">Hasil Quiz Program {{ $data['hasil']->program->nama_program }}</h3>
            <p class="card-text">Nama : {{ $data['hasil']->user->nama_lengkap }}</p>
            <p class="card-text">Waktu Pengerjaan Quis : <?php echo strftime("%A, %d %B %Y", strtotime($data['hasil']->created_at)) . "\n"; ?></p>
            <p class="card-text">Jawaban Benar : {{ $data['hasil']->jawaban_benar }} </p>
            <p class="card-text">Jawaban Salah : {{ $data['hasil']->jawaban_salah }}</p>
            <p class="card-text">Nilai Akhir : {{ $data['hasil']->hasil }}</p>
            <p class="card-text">Dinyatakan  :   
                                             @if($data['hasil']->hasil >= '70')
                                            <span class="badge badge-success">Lulus</span>
                                            @else
                                            <span class="badge badge-info">Tidak Lulus</span>
                                            @endif
          </p>
            <a href="#" class="btn btn-primary waves-effect waves-light">Cetak Sertifikat</a>
        </div>
    </div>

</div>
@stop

