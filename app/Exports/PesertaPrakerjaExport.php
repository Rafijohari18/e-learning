<?php

namespace App\Exports;

use App\Peserta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PesertaPrakerjaExport implements FromCollection, WithHeadings, WithMapping
{

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'NIK',
            'Tempat, Tanggal Lahir',
            'Jenis Kelamin',
            'Umur',
            'No. Kartu Prakerja',
            'Kode Kupon',
            'Program Pelatihan',
            'Harga Program',
            'No. WhatsApp',
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
        return Peserta::where('prakerja','Ya')->latest()->get();
    }

    public function map($peserta): array
    {
        if ($peserta->gender == 'L') {
            $jk = 'Laki-Laki';
        } else {
            $jk = 'Perempuan';
        }

        return [
            $peserta->nama_lengkap,
            $peserta->nik,
            $peserta->tgl_lahir,
            $jk,
            $peserta->umur,
            $peserta->user->transaksi->first()->kartu_prakerja,
            $peserta->user->transaksi->first()->kupon,
            $peserta->user->transaksi->first()->program->nama_program,
            $peserta->user->transaksi->first()->program->harga,
            $peserta->whatsapp,
            $peserta->email,
            $peserta->profesi,
            $peserta->alamat
        ];
    }
}
