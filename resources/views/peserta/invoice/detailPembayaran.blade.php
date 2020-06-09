@extends('layouts.master')

@section('title', 'Detail Transaksi')

@section('css')

@stop

@section('content')
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card m-b-20">
            <div class="card-body">
            	<div class="card-title">Detail Transaksi - Program {{ $transaksi->program->nama_program }}</div>
            	<hr>
                <form action="{{ route('struk.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <dl class="row text-left m-t-20">
                    <dt class="col-sm-5">Kode Invoice</dt>
                    <dd class="col-sm-7">{{ $transaksi->kode_invoice }}</dd>

                    <dt class="col-sm-5">Program</dt>
                    <dd class="col-sm-7">{{ $transaksi->program->nama_program }}</dd>

                    <dt class="col-sm-5">Kategori</dt>
                    <dd class="col-sm-7">{{ $transaksi->program->kategori->nama_kategori }}</dd>

                    <dt class="col-sm-5">Harga</dt>
                    <dd class="col-sm-7">Rp. {{ number_format($transaksi->program->harga, 0, ',', '.') }}</dd>

                    <dt class="col-sm-5">Diskon</dt>
                    <dd class="col-sm-7">
                    	@if($transaksi->program->diskon != NULL)
                    	{{ $transaksi->program->diskon }}%
                    	@else
                    	0%
                    	@endif
                    </dd>

                     {{-- Diskon --}}
                     @php
                        // Menentukan Diskon
                        $besarnyaDiskon = $transaksi->program->diskon;
                        $harga = $transaksi->program->harga;
                        $diskon = ($besarnyaDiskon/100)*$harga;

                        $totalDiskon = $diskon;
                        // Total Bayar
                        $total = $harga - $totalDiskon;
                    @endphp

                    <dt class="col-sm-5">Total Bayar</dt>
                    <dd class="col-sm-7">Rp. {{ number_format($total, 0, ',', '.') }}</dd>

                    <dt class="col-sm-5">Status</dt>
                    <dd class="col-sm-7">
                        @if($transaksi->status == 'Diverifikasi')
                        <span class="badge badge-success">{{ $transaksi->status }}</span>
                        @else
                        <span class="badge badge-info">{{ $transaksi->status }}</span>
                        @endif
                    </dd>
                    
                    @if($transaksi->kartu_prakerja != NULL && $transaksi->kupon != NULL)
                    <dt class="col-sm-5">No Kartu Prakerja</dt>
                    <dd class="col-sm-7">{{ $transaksi->kartu_prakerja }}</dd>

                    <dt class="col-sm-5">Kode Kupon</dt>
                    <dd class="col-sm-7">{{ $transaksi->kupon }}</dd>
                    @else
                    <dt class="col-sm-5">Bukti Pembayaran Sebelumnya</dt>
                    <dd class="col-sm-7">
                        <img src="{{ asset('storage/'.$transaksi->path) }}" class="img-thumbnail" alt="Bukti Pembayaran">
                        <input type="hidden" name="fileOri" value="{{ $transaksi->path }}">
                    </dd>
                    @endif

                    @if($transaksi->status != 'Diverifikasi')
                    <dt class="col-sm-5">Perbarui Bukti Pembayaran</dt>
                    <dd class="col-sm-7">
                        <input type="file" class="filestyle" data-input="false" data-buttonname="btn-secondary btn-sm" name="path" required="">
                    </dd>
                    @endif
                </dl>

                @if($transaksi->status != 'Diverifikasi')
                <div class="float-right">
                    <button class="btn btn-sm btn-primary">Simpan</button>
                </div>
                @endif
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