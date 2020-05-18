@extends('layouts.master')

@section('title','Invoice')

@section('content')
<?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="invoice-title">
                            <h4 class="pull-right font-16"><strong></strong></h4>
                            <h3 class="mt-0">
                                <img src="{{asset('assets/images/logo_dark.png')}}" alt="logo" height="26"/>
                            </h3>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    {{ Auth::user()->nama_lengkap }}<br>
                                    1234 Main<br>
                                    Apt. 4B<br>
                                    Springfield, ST 54321
                                </address>
                            </div>
                            <div class="col-6 text-right">
                                <address>
                                    <strong>Program To:</strong><br>
                                   BLK Bonang<br>
                                    1234 Main<br>
                                    Apt. 4B<br>
                                    Springfield, ST 54321
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <address>
                                    <strong>Payment Method:</strong><br>
                                    Visa ending **** 4242<br>
                                    jsmith@email.com
                                </address>
                            </div>
                            <div class="col-6 m-t-30 text-right">
                                <address>
                                    <strong>Order Date:</strong><br>
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
                                                <td><strong>No</strong></td>
                                                <td class="text-center"><strong>Nama Kategori</strong></td>
                                                <td class="text-center"><strong>Nama Program</strong></td>
                                                <td class="text-center"><strong>Harga</strong>
                                                </td>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td>1</td>
                                                <td class="text-center">{{ $data['invoice']->program->kategori->nama_kategori }}</td>
                                                <td class="text-center">{{ $data['invoice']->program->nama_program }}</td>
                                                <td class="text-center">Rp. {{ number_format($data['invoice']->harga, 0, ',', '.') }}</td>
                                              
                                            </tr>
                                           
                                            <tr>
                                                <td class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td class="thick-line text-center">
                                                    <strong>Subtotal</strong>
                                                </td>
                                                    <td class="thick-line text-center">Rp. {{ number_format($data['invoice']->harga, 0, ',', '.') }}</td>
                                                </tr>
                                               
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Total</strong></td>
                                                            <td class="no-line text-center"><h4 class="m-0">Rp. {{ number_format($data['invoice']->harga, 0, ',', '.') }}</h4></td>
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
            @stop
