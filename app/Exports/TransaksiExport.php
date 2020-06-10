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
            'Peserta',
            'Program',
            'Kategori Pembayaran',
            'Status Pembayaran',
            'Tanggal Transaksi'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::latest()->get();
    }

    /**
    * @var Invoice $invoice
    */
    public function map($transaksi): array
    {
    	if ($transaksi->user->peserta->prakerja == 'Ya') {
    		$kP = 'Prakerja';
    	} else {
    		$kP = 'Umum';
    	}

        return [
            $transaksi->kode_invoice,
            $transaksi->user->nama_lengkap,
            $transaksi->program->nama_program,
            $kP,
            $transaksi->status,
            $transaksi->tgl(),
        ];
    }
}
