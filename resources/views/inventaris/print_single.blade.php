<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Inventaris: {{ $inventaris->nama_barang }}</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 20px;
        }
        .item-details {
            margin-bottom: 20px;
        }
        .item-details p {
            margin-bottom: 5px;
        }
        .item-details strong {
            display: inline-block;
            width: 150px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Detail Inventaris: {{ $inventaris->nama_barang }}</h1>

    <div class="item-details">
        <p><strong>Nama Barang:</strong> {{ $inventaris->nama_barang }}</p>
        <p><strong>Kategori Inventaris:</strong> {{ $inventaris->kategori }}</p>
        <p><strong>Lokasi:</strong> {{ $inventaris->lokasi ?? 'N/A' }}</p>
        <p><strong>Kondisi Baik:</strong> {{ $inventaris->kondisi_baik }}</p>
        <p><strong>Kondisi Rusak Ringan:</strong> {{ $inventaris->kondisi_rusak_ringan }}</p>
        <p><strong>Kondisi Rusak Berat:</strong> {{ $inventaris->kondisi_rusak_berat }}</p>
        @if ($inventaris->kategori === 'habis_pakai')
            <p><strong>Stok Saat Ini:</strong> {{ $inventaris->stokHabisPakai->sum('jumlah_masuk') - $inventaris->stokHabisPakai->sum('jumlah_keluar') }}</p>
        @endif
        <p><strong>Dibuat Pada:</strong> {{ $inventaris->created_at }}</p>
        <p><strong>Terakhir Diperbarui Pada:</strong> {{ $inventaris->updated_at }}</p>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
