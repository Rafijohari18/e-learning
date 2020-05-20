@extends('layouts.master')

@section('title', 'Detail Transaksi')

@section('css')

@stop

@section('content')
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card m-b-20">
            <div class="card-body">
                @if($transaksi->path != NULL)
                    @if($transaksi->status != 'Diverifikasi')
                    <div class="float-right">
                        <a href="{{ route('transaksi.update', $transaksi->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placmenent="top" title="Verifikasi Transaksi {{ $transaksi->user->nama_lengkap }}"><i class="ti-check"></i></a>
                    </div>
                    @endif
                @endif
            	<div class="card-title">Detail Transaksi - {{ $transaksi->user->nama_lengkap }}</div>
            	<hr>
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

                    <dt class="col-sm-5">Status</dt>
                    <dd class="col-sm-7">
                        @if($transaksi->status == 'Diverifikasi')
                        <span class="badge badge-success">{{ $transaksi->status }}</span>
                        @else
                        <span class="badge badge-info">{{ $transaksi->status }}</span>
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

                    <dt class="col-sm-5">Bukti Pembayaran</dt>
                    <dd class="col-sm-7">
                        @if(empty($transaksi->path))
                        <div class="alert alert-info">Peserta belum melakukan pembayaran.</div>
                        @else
                        <img src="{{ asset('storage/'.$transaksi->path) }}" class="img-thumbnail" alt="Bukti Pembayaran">
                        @endif
                    </dd>
                </dl>
            </div>
        </div>
	</div>
</div>
@stop

@section('footer')

@stop