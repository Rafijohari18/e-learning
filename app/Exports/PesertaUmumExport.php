<?php

namespace App\Exports;

use App\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PesertaUmumExport implements FromCollection, WithHeadings, WithMapping
{

	public function headings(): array
    {
        return [
            'NIK',
            'Nama Lengkap',
            'Tempat, Tanggal Lahir',
            'Umur',
            'JK',
            'WhatsApp',
            'Email',
            'Profesi',
            'Alamat'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return Peserta::where('prakerja','Tidak')->latest()->get();
    }

    public function map($peserta): array
    {
        return [
            $peserta->nik,
            $peserta->nama_lengkap,
            $peserta->tgl_lahir,
            $peserta->umur,
            $peserta->gender,
            $peserta->whatsapp,
            $peserta->email,
            $peserta->profesi,
            $peserta->alamat
        ];
    }
}
