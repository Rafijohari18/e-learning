@extends('layouts.master')

@section('title', 'Hasil Quis')

@section('css')
<link href="{{ asset('assets/plugins/bootstrap-rating/bootstrap-rating.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
  .rating{
  opacity: 0;
  }
</style>
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
           <form method="POST" action="{{ route('peserta.sertifikat') }}">
            @csrf
              <label for="">Berikan Penilaian Program</label><br>
                <input type="text" class="rating-tooltip rating" id="rating" name="rating" data-filled="mdi mdi-star font-32 text-primary" data-empty="mdi mdi-star-outline font-32 text-muted"/>

               <input type="hidden" name="id" value="{{ $data['hasil']->program->id }}">
               <br><br>

               <label>Komentar</label>
               <textarea class="form-control mb-3" required="" name="komentar" rows="3" placeholder="Masukan Komentar"></textarea>
               <button class="btn btn-primary waves-effect waves-light btn-block">Lihat Sertifikat</button>
           </form>
       </div>
   </div>
</div>
@stop

@section('footer')
<script src="{{ asset('assets/plugins/bootstrap-rating/bootstrap-rating.min.js')}}"></script>
<script src="{{ asset('assets/pages/rating-init.js')}}"></script>
<script>
    $(".rating").attr('required','required');
</script>
@stop