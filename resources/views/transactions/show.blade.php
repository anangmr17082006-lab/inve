@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    {{-- Breadcrumb --}}
    <x-breadcrumb :links="[
        ['url' => route('dashboard'), 'label' => 'Dashboard'],
        ['url' => route('transactions.index'), 'label' => 'Transaksi Inventaris'],
    ]" current="#{{ $transaction->id }}" />

    {{-- Header Card --}}
    <x-card>
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Detail Transaksi Inventaris</h1>
                <p class="text-sm text-gray-500 mt-1">ID: #{{ $transaction->id }}</p>
            </div>
            {{-- Status Badge --}}
            <span @class([
                'px-3 py-1 text-sm font-medium rounded-full',
                'bg-green-100 text-green-800' => $transaction->jenis === 'masuk',
                'bg-red-100 text-red-800' => $transaction->jenis === 'keluar',
            ])>
                {{ ucfirst($transaction->jenis) }}
            </span>
        </div>
    </x-card>

    {{-- Detail Card --}}
    <x-card title="Informasi Transaksi" icon="heroicon-o-information-circle">
        <dl class="divide-y divide-gray-100">
            @php
                $details = [
                    ['label' => 'Inventaris', 'value' => $transaction->item->nama_barang, 'subtext' => $transaction->item->kode_inventaris . ' · ' . $transaction->item->kategori],
                    ['label' => 'Jumlah', 'value' => $transaction->jumlah . ' unit', 'icon' => 'heroicon-o-archive-box'],
                    ['label' => 'Tanggal', 'value' => \Carbon\Carbon::parse($transaction->tanggal)->isoFormat('dddd, D MMMM Y'), 'subtext' => \Carbon\Carbon::parse($transaction->tanggal)->diffForHumans()],
                    ['label' => 'Pengguna', 'value' => $transaction->user?->name ?? 'N/A', 'icon' => 'heroicon-o-user'],
                    ['label' => 'Keterangan', 'value' => $transaction->keterangan ?? '-', 'fullWidth' => true],
                    ['label' => 'Dibuat', 'value' => $transaction->created_at->diffForHumans(), 'subtext' => $transaction->created_at->format('d/m/Y H:i:s')],
                    ['label' => 'Diperbarui', 'value' => $transaction->updated_at->diffForHumans(), 'subtext' => $transaction->updated_at->format('d/m/Y H:i:s')],
                ];
            @endphp

            @foreach($details as $detail)
                <x-detail-row :label="$detail['label']" :value="$detail['value']" 
                              :subtext="$detail['subtext'] ?? null" 
                              :icon="$detail['icon'] ?? null" 
                              :fullWidth="$detail['fullWidth'] ?? false" />
            @endforeach
        </dl>
    </x-card>

    {{-- Action Buttons --}}
    <div class="flex items-center justify-between">
        {{-- Delete with Modal --}}
        <div x-data="{ open: false }">
            <x-button @click="open = true" variant="danger" icon="heroicon-o-trash">
                Hapus Transaksi
            </x-button>

            {{-- Modal Confirm --}}
            <div x-show="open" x-transition class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
                <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4 shadow-2xl">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="flex-shrink-0">
                            <x-heroicon-o-exclamation-triangle class="w-8 h-8 text-red-600" />
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Konfirmasi Hapus</h3>
                            <p class="text-sm text-gray-500">Data akan dihapus permanent</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6">Apakah Anda yakin ingin menghapus transaksi <strong>#{{ $transaction->id }}</strong>?</p>
                    <div class="flex justify-end gap-3">
                        <x-button @click="open = false" variant="secondary">Batal</x-button>
                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <x-button type="submit" variant="danger">Ya, Hapus</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <x-button href="{{ route('transactions.index') }}" variant="secondary" icon="heroicon-o-arrow-left">
            Kembali
        </x-button>
    </div>
</div>
@endsection
