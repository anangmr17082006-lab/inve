<?php

namespace App\Imports;

use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon; // Tambahkan ini

class InventarisImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        return new Inventaris([
            'nama_barang' => $row['nama_barang'],
            'kategori' => $row['kategori'] ?? 'tidak_habis_pakai', // Beri default jika kosong
            'lokasi' => $row['lokasi'] ?? null, // Tambahkan lokasi
            'kondisi_baik' => $row['kondisi_baik'] ?? 0,
            'kondisi_rusak_ringan' => $row['kondisi_rusak_ringan'] ?? 0,
            'kondisi_rusak_berat' => $row['kondisi_rusak_berat'] ?? 0,
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'nullable|string|in:tidak_habis_pakai,habis_pakai,aset_tetap',
            'lokasi' => 'nullable|string|max:255', // Tambahkan validasi untuk lokasi
            'kondisi_baik' => 'nullable|integer|min:0',
            'kondisi_rusak_ringan' => 'nullable|integer|min:0',
            'kondisi_rusak_berat' => 'nullable|integer|min:0',
        ];
    }
}
