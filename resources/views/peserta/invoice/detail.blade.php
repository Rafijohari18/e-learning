@extends('layouts.master')

@section('title','Invoice')

@section('content')
@if($data['invoice']->status != 'Diverifikasi')
<div class="alert alert-danger"><b>Selesaikan Pembayaran Anda Terlebih Dahulu!</b></div>
@else
<?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong>#{{ $data['invoice']->kode_invoice }}</strong></h4>
                            <h3 class="mt-0">
                                <img src="{{asset('assets/images/blkklogo.png')}}" alt="logo" height="30"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Peserta :</strong><br>
                                    {{ Auth::user()->nama_lengkap }}<br>
                                    {{ $data['invoice']->user->peserta->email }}<br>
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Program Yang Diikuti :</strong><br>
                                    {{ $data['invoice']->program->nama_program }}<br>
                                    Kategori : {{ $data['invoice']->program->kategori->nama_kategori }}<br>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <address>
                                    <strong>Tanggal Pemesanan :</strong><br>
                                   <?php echo strftime("%A, %d %B %Y", strtotime($data['invoice']->created_at)) . "\n"; ?><br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                
            <div class="row">
                <div class="col-12">
                    <div class="panel panel-default">
                        <div class="p-2">
                            <h3 class="panel-title font-20"><strong>Invoice </strong></h3>
                        </div>
                        <div class="">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td><strong>#Invoice</strong></td>
                                            <td class="text-center"><strong>Nama Program</strong></td>
                                            <td class="text-center"><strong>Kategori</strong></td>
                                            <td class="text-center"><strong>Harga</strong></td>
                                            <td class="text-center"><strong>Diskon</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $data['invoice']->kode_invoice }}</td>
                                            <td class="text-center">{{ $data['invoice']->program->nama_program }}</td>
                                            <td class="text-center">{{ $data['invoice']->program->kategori->nama_kategori }}</td>
                                            <td class="text-center">Rp. {{ number_format($data['invoice']->program->harga, 0, ',', '.') }}</td>
                                            <td class="text-center">@if($data['invoice']->program->diskon != NULL) {{ $data['invoice']->program->diskon }}% @else 0% @endif</td>
                                        </tr>
                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center">
                                                <strong>Subtotal</strong>
                                            </td>
                                                <td class="thick-line text-center">Rp. {{ number_format($data['invoice']->program->harga, 0, ',', '.') }}</td>
                                            </tr>
                                            {{-- Diskon --}}
                                            @php
                                                // Menentukan Diskon
                                                $besarnyaDiskon = $data['invoice']->program->diskon;
                                                $harga = $data['invoice']->program->harga;
                                                $diskon = ($besarnyaDiskon/100)*$harga;

                                                $totalDiskon = $diskon;
                                                // Total Bayar
                                                $total = $harga - $totalDiskon;
                                            @endphp
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">
                                                    <strong>Total</strong></td>
                                                    <td class="no-line text-center"><h4 class="m-0">Rp. {{ number_format($total, 0, ',', '.') }}</h4></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                        <div class="d-print-none">
                                            <div class="pull-right">
                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i>&nbsp; Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
@endif
@stop
