<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris; // Changed from Item
use App\Models\Room;
use App\Models\Unit;
use App\Models\StokHabisPakai; // New import
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InventarisExport;
use App\Imports\InventarisImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Opsional, untuk debugging
use App\Http\Requests\StoreInventarisRequest; // Tambahkan ini di atas
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Tambahkan ini

class InventarisController extends Controller // Changed class name
{
    use AuthorizesRequests; // Tambahkan trait ini
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Inventaris::class); // Otorisasi viewAny
        // Logika untuk mengelompokkan inventaris berdasarkan nama_barang
        $query = Inventaris::select(
            'nama_barang',
            DB::raw('MAX(lokasi) as lokasi'), // Tambahkan lokasi ke query
            DB::raw('MAX(kode_inventaris) as kode_inventaris'), // Tambahkan kode_inventaris ke query
            DB::raw('SUM(kondisi_baik) as total_baik'),
            DB::raw('SUM(kondisi_rusak_ringan) as total_rusak_ringan'),
            DB::raw('SUM(kondisi_rusak_berat) as total_rusak_berat'),
        )->groupBy('nama_barang');

        if ($request->has('search')) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        $inventaris = $query->paginate(10);

        return view('inventaris.index', compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Inventaris::class); // Otorisasi create
        
        return view('inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventarisRequest $request) // Ganti tipe parameter
    {
        $this->authorize('create', Inventaris::class); // Otorisasi create (double check, bagus)
        // 1. Validasi sudah otomatis dilakukan oleh Form Request
        $validatedData = $request->validated(); // Ambil data yang sudah divalidasi

        // 2. Mulai Transaksi Database
        DB::beginTransaction();

        try {
            // 3. Buat entri Inventaris baru
            $inventaris = Inventaris::create([
                'nama_barang' => $validatedData['nama_barang'],
                'kategori' => $validatedData['kategori'],
                'lokasi' => $validatedData['lokasi'] ?? null, // Tambahkan lokasi
                'kode_inventaris' => $validatedData['kode_inventaris'] ?? null, // Tambahkan kode_inventaris
                'kondisi_baik' => $validatedData['kondisi_baik'],
                'kondisi_rusak_ringan' => $validatedData['kondisi_rusak_ringan'],
                'kondisi_rusak_berat' => $validatedData['kondisi_rusak_berat'],
            ]);

            // 4. Jika barang habis pakai, buat entri stok
            if ($validatedData['kategori'] === 'habis_pakai' && isset($validatedData['initial_stok'])) {
                StokHabisPakai::create([
                    // Pastikan foreign key sesuai (inventaris_id atau id_inventaris)
                    'inventaris_id' => $inventaris->id,
                    'jumlah_masuk' => $validatedData['initial_stok'],
                    'jumlah_keluar' => 0, // Awalnya keluar 0
                    'tanggal' => now()->toDateString(), // Tanggal stok awal
                ]);
            }

            // 5. Commit transaksi
            DB::commit();

            // 6. Redirect ke halaman index dengan pesan sukses
            return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil ditambahkan.');

        } catch (\Illuminate\Validation\ValidationException $e) {
             // Jika validasi gagal (seharusnya sudah ditangani Form Request, tapi sebagai backup)
             DB::rollBack();
             return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // 7. Jika terjadi error lain, rollback transaksi
            DB::rollBack();
            Log::error('Gagal menyimpan inventaris baru: ' . $e->getMessage());

            // Beri pesan error yang lebih spesifik jika memungkinkan
            $errorMessage = 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage();
            // Redirect kembali ke form dengan pesan error
            return redirect()->back()->withInput()->with('error', $errorMessage);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventaris $inventaris) // Ganti $inventari jadi $inventaris
    {
        $this->authorize('view', $inventaris); // Otorisasi view spesifik
        // Lokasi dan kode_inventaris sudah ada di model, tidak perlu load relasi
        return view('inventaris.show', compact('inventaris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventaris $inventaris) // Ganti $inventari jadi $inventaris
    {
        $this->authorize('update', $inventaris); // Otorisasi update
        // Lokasi dan kode_inventaris sudah ada di model
        return view('inventaris.edit', compact('inventaris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventaris $inventaris) // Ganti $inventari jadi $inventaris
    {
        $this->authorize('update', $inventaris); // Otorisasi update
        // Lakukan validasi seperti di store atau gunakan UpdateInventarisRequest
        $validatedData = $request->validate([ /* ... rules ... */ ]);
        $inventaris->update($validatedData);
        // ... (handle stok jika kategori berubah atau jumlah berubah)
        return redirect()->route('inventaris.index')->with('success', 'Inventaris updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventaris $inventaris) // Ganti $inventari jadi $inventaris
    {
        $this->authorize('delete', $inventaris); // Otorisasi delete
        // ... (logika hapus stok jika perlu)
        $inventaris->delete();
        return redirect()->route('inventaris.index')->with('success', 'Inventaris deleted successfully.');
    }

    public function export()
    {
        $this->authorize('export', Inventaris::class); // Otorisasi export
        return Excel::download(new InventarisExport, 'inventaris.xlsx');
    }

    public function import(Request $request)
    {
        $this->authorize('import', Inventaris::class); // Otorisasi import
        $request->validate(['file' => 'required|mimes:xlsx,xls,csv']);
        Excel::import(new InventarisImport, $request->file('file'));
        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil diimpor.');
    }

    public function printAll()
    {
        $this->authorize('print', Inventaris::class); // Otorisasi print
        $inventaris = Inventaris::all(); // Lokasi dan kode_inventaris sudah ada di model
         // Tambah eager load stok untuk habis pakai
         $inventaris->load(['stokHabisPakai' => function ($query) {
             $query->select('inventaris_id', DB::raw('SUM(jumlah_masuk) as total_masuk, SUM(jumlah_keluar) as total_keluar'))
                   ->groupBy('inventaris_id');
         }]);
        return view('inventaris.print_all', compact('inventaris'));
    }

    public function printSingle($id)
    {
        $inventaris = Inventaris::with(['stokHabisPakai'])->findOrFail($id); // Lokasi dan kode_inventaris sudah ada di model
        $this->authorize('print', $inventaris); // Otorisasi print
        return view('inventaris.print_single', compact('inventaris'));
    }

    /**
     * Get current stock for a specific inventaris item (especially for 'habis_pakai').
     *
     * @param  \App\Models\Inventaris $inventaris
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStock(Inventaris $inventaris)
    {
        if ($inventaris->kategori === 'habis_pakai') {
            $sisaStok = StokHabisPakai::where('inventaris_id', $inventaris->id) // Sesuaikan dengan nama kolom foreign key yang benar
                                    ->sum(DB::raw('jumlah_masuk - jumlah_keluar'));
            return response()->json(['sisa_stok' => $sisaStok]);
        } else {
            // Untuk barang tidak habis pakai, stok tidak dikelola per kuantitas di tabel stok
            // Anda bisa mengembalikan jumlah kondisi baik, atau 0, atau pesan 'N/A'
            return response()->json(['sisa_stok' => $inventaris->kondisi_baik]); // Contoh: mengembalikan jumlah kondisi baik
            // Atau: return response()->json(['sisa_stok' => 'Tidak Berlaku']);
        }
    }

    public function showGrouped($nama_barang)
    {
         $this->authorize('viewAny', Inventaris::class); // Asumsi sama dengan viewAny
         $inventarisDetails = Inventaris::where('nama_barang', $nama_barang)
             ->paginate(10);
         $namaBarang = $nama_barang;
         return view('inventaris.show_grouped', compact('inventarisDetails', 'namaBarang'));
    }
}
