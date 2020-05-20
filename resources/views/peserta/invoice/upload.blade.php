@extends('layouts.master')

@section('title', 'Upload Bukti Pembayaran')

@section('css')

@stop

@section('content')
<div class="row justify-content-center">
	<div class="col-md-6">
        <div class="alert alert-info">Kirim pembayaran ke (no-rek).</div>
		<div class="card m-b-20">
            <div class="card-body">
            	<div class="card-title">Detail Transaksi - {{ auth()->user()->nama_lengkap }}</div>
            	<hr>
            	<form action="{{ route('struk.update', $neko->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <dl class="row text-left m-t-20">
                    <dt class="col-sm-5">#Invoice</dt>
                    <dd class="col-sm-7">{{ $neko->kode_invoice }}</dd>

                    <dt class="col-sm-5">Program</dt>
                    <dd class="col-sm-7">{{ $neko->program->nama_program }}</dd>

                    <dt class="col-sm-5">Kategori</dt>
                    <dd class="col-sm-7">{{ $neko->program->kategori->nama_kategori }}</dd>

                    <dt class="col-sm-5">Harga</dt>
                    <dd class="col-sm-7">Rp. {{ number_format($neko->program->harga, 0, ',', '.') }}</dd>

                    <dt class="col-sm-5">Diskon</dt>
                    <dd class="col-sm-7">
                    	@if($neko->program->diskon != NULL)
                    	{{ $neko->program->diskon }}%
                    	@else
                    	0%
                    	@endif
                    </dd>

                    <dt class="col-sm-5">Status</dt>
                    <dd class="col-sm-7"><span class="badge badge-info">{{ $neko->status }}</span></dd>

                    {{-- Diskon --}}
                     @php
                        // Menentukan Diskon
                        $besarnyaDiskon = $neko->program->diskon;
                        $harga = $neko->program->harga;
                        $diskon = ($besarnyaDiskon/100)*$harga;

                        $totalDiskon = number_format($diskon, 0, ',', '.');
                        // Total Bayar
                        $total = $harga - $totalDiskon;
                    @endphp     

                    <dt class="col-sm-5">Total Bayar</dt>
                    <dd class="col-sm-7">Rp. {{ number_format($total, 0, ',', '.') }}</dd>

                    <dt class="col-sm-5">Upload Bukti Pembayaran</dt>
                    <dd class="col-sm-7">
                    	<input type="file" name="path" class="filestyle" data-input="false" data-buttonname="btn-secondary btn-sm" required="">
                    </dd>
                </dl>

                <div class="float-right">
	                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                </div>
                </form>
            </div>
        </div>
	</div>
</div>
@stop

@section('footer')
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
<!-- Parsley js -->
<script type="text/javascript" src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
@stop