<?php

namespace App\Exports;

use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InventarisExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Inventaris::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Kategori',
            'Lokasi', // Tambahkan lokasi
            'Kondisi Baik',
            'Kondisi Rusak Ringan',
            'Kondisi Rusak Berat',
            'Created At',
            'Updated At',
        ];
    }

    public function map($inventaris): array
    {
        return [
            $inventaris->id,
            $inventaris->nama_barang,
            $inventaris->kategori,
            $inventaris->lokasi, // Tambahkan lokasi
            $inventaris->kondisi_baik,
            $inventaris->kondisi_rusak_ringan,
            $inventaris->kondisi_rusak_berat,
            $inventaris->created_at,
            $inventaris->updated_at,
        ];
    }
}
