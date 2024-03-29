<?php

namespace App\Exports;

use App\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransaksiExport implements FromCollection, WithHeadings, WithMapping
{

	public function headings(): array
    {
        return [
            'Kode Invoice',
            'Nama Peserta',
            'No. Kartu Prakerja',
            'Kode Kupon',
            'Alamat',
            'No. WhatsApp',
            'Pembayaran',
            'Program Pelatihan',
            'Status Transaksi',
            'Tanggal Transaksi',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::where('kartu_prakerja', '!=', NULL)->where('kupon', '!=', NULL)->orderBy('status','DESC')->latest()->get();
    }

    /**
    * @var Invoice $invoice
    */
    public function map($transaksi): array
    {
        return [
            $transaksi->kode_invoice,
            $transaksi->user->nama_lengkap,
            $transaksi->kartu_prakerja,
            $transaksi->kupon,
            $transaksi->user->peserta->alamat,
            $transaksi->user->peserta->whatsapp,
            'Prakerja',
            $transaksi->program->nama_program,
            $transaksi->status,
            $transaksi->tgl(),
        ];
    }
}
