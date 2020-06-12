<?php

namespace App\Exports;

use App\Kupon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KuponExport implements FromCollection, WithHeadings, WithMapping
{
	public function headings(): array
    {
        return [
            'Nama Kupon',
            'Kode Kupon',
            'Nama Program',
            'Kuota',
            'Besar Potongan',
            'Tanggal Expired',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kupon::latest()->get();
    }

    public function map($kupon): array
    {
    	$nmP = [];

        foreach ($kupon->KategoriKupon as $nmp) {
            $nmP[] = $nmp->program->nama_program;
        }

        return [
            $kupon->name,
            $kupon->kode,
            $nmP,
            $kupon->kuota,
            $kupon->potongan,
            $kupon->tanggal_expired,
        ];
    }
}
