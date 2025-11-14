@extends('dashboard')

@section('content')
    <div class="p-4 sm:p-6 lg:p-8">
        <!-- Toast Notification Container -->
        <div id="toast-container" class="fixed top-4 right-4 z-[100] space-y-2"></div>

        <!-- Header Section dengan Animasi -->
        <div class="mb-8 animate-fade-in">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 animate-slide-down">Manajemen Inventaris</h1>
                    <p class="mt-2 text-sm text-gray-600 max-w-2xl animate-slide-down" style="animation-delay: 0.1s;">
                        Kelola dan pantau semua barang inventaris Anda dalam satu tempat. Data dikelompokkan berdasarkan nama barang untuk kemudahan analisis.
                    </p>
                </div>
                <div class="flex flex-wrap gap-2 animate-slide-down" style="animation-delay: 0.2s;">
                    <a href="{{ route('inventaris.create') }}"
                       class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Tambah Inventaris
                    </a>
                    <button onclick="openImportModal()"
                            class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-green-600 to-emerald-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        Impor Data
                    </button>
                    <a href="{{ route('inventaris.export') }}"
                       class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-600 to-cyan-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Ekspor Data
                    </a>
                    <a href="{{ route('inventaris.print_all') }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-gray-600 to-slate-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                        </svg>
                        Cetak Semua
                    </a>
                </div>
            </div>
        </div>

        <!-- Pencarian dengan Live Feedback -->
        <div class="mb-6 animate-fade-in" style="animation-delay: 0.3s;">
            <form action="{{ route('inventaris.index') }}" method="GET" class="flex gap-2">
                <div class="relative flex-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        name="search"
                        id="search-input"
                        placeholder="Cari nama barang..."
                        class="block w-full rounded-lg border-0 bg-white/50 backdrop-blur-sm pl-10 pr-4 py-3 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-200 sm:text-sm"
                        value="{{ request('search') }}"
                    >
                    <div id="search-spinner" class="hidden absolute inset-y-0 right-3 flex items-center">
                        <svg class="animate-spin h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>
                <button type="submit"
                        class="rounded-lg bg-gradient-to-r from-gray-800 to-slate-800 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('inventaris.index') }}"
                       class="rounded-lg bg-gradient-to-r from-gray-200 to-slate-200 px-6 py-3 text-sm font-semibold text-gray-800 shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Statistik Cards dengan Counter Animation -->
        <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Total Barang Baik -->
            <div class="stat-card relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-500 via-green-600 to-emerald-700 p-6 text-white shadow-2xl transform hover:scale-105 transition-all duration-300 animate-slide-up" style="animation-delay: 0.1s;">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-white/5 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-green-100 text-sm font-medium mb-1">Total Barang Baik</p>
                            <p class="text-4xl font-bold mt-2 counter" data-target="{{ $inventaris->sum('total_baik') }}">0</p>
                            <p class="text-green-100 text-xs mt-2 opacity-90">Dalam kondisi baik</p>
                        </div>
                        <div class="bg-white/20 p-4 rounded-xl backdrop-blur-sm animate-pulse-slow">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-green-400/30">
                        <div class="flex items-center text-green-100 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>Siap digunakan</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rusak Ringan -->
            <div class="stat-card relative overflow-hidden rounded-2xl bg-gradient-to-br from-yellow-500 via-yellow-600 to-amber-700 p-6 text-white shadow-2xl transform hover:scale-105 transition-all duration-300 animate-slide-up" style="animation-delay: 0.2s;">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-white/5 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-yellow-100 text-sm font-medium mb-1">Rusak Ringan</p>
                            <p class="text-4xl font-bold mt-2 counter" data-target="{{ $inventaris->sum('total_rusak_ringan') }}">0</p>
                            <p class="text-yellow-100 text-xs mt-2 opacity-90">Perlu perbaikan ringan</p>
                        </div>
                        <div class="bg-white/20 p-4 rounded-xl backdrop-blur-sm animate-pulse-slow">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-yellow-400/30">
                        <div class="flex items-center text-yellow-100 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span>Butuh perhatian</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rusak Berat -->
            <div class="stat-card relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-500 via-red-600 to-rose-700 p-6 text-white shadow-2xl transform hover:scale-105 transition-all duration-300 animate-slide-up" style="animation-delay: 0.3s;">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-white/5 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-red-100 text-sm font-medium mb-1">Rusak Berat</p>
                            <p class="text-4xl font-bold mt-2 counter" data-target="{{ $inventaris->sum('total_rusak_berat') }}">0</p>
                            <p class="text-red-100 text-xs mt-2 opacity-90">Perlu perbaikan serius</p>
                        </div>
                        <div class="bg-white/20 p-4 rounded-xl backdrop-blur-sm animate-pulse-slow">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-red-400/30">
                        <div class="flex items-center text-red-100 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span>Prioritas perbaikan</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jenis Barang -->
            <div class="stat-card relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-500 via-blue-600 to-sky-700 p-6 text-white shadow-2xl transform hover:scale-105 transition-all duration-300 animate-slide-up" style="animation-delay: 0.4s;">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-white/5 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-blue-100 text-sm font-medium mb-1">Jenis Barang</p>
                            <p class="text-4xl font-bold mt-2 counter" data-target="{{ $inventaris->count() }}">0</p>
                            <p class="text-blue-100 text-xs mt-2 opacity-90">Kategori berbeda</p>
                        </div>
                        <div class="bg-white/20 p-4 rounded-xl backdrop-blur-sm animate-pulse-slow">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-blue-400/30">
                        <div class="flex items-center text-blue-100 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 01-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                            </svg>
                            <span>Total kategori</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel dengan Animasi -->
        <div class="overflow-hidden rounded-2xl shadow-2xl border-0 bg-white/50 backdrop-blur-sm animate-fade-in" style="animation-delay: 0.5s;">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200/50">
                    <thead class="bg-gray-50/80 backdrop-blur-sm">
                        <tr>
                            <th scope="col" rowspan="2" class="py-4 pl-6 pr-3 text-left text-sm font-semibold text-gray-900">No</th>
                            <th scope="col" rowspan="2" class="px-4 py-4 text-left text-sm font-semibold text-gray-900">Nama Inventaris</th>
                            <th scope="col" colspan="3" class="px-4 py-4 text-center text-sm font-semibold text-gray-900 border-b border-gray-200/50">Kondisi Barang</th>
                            <th scope="col" rowspan="2" class="px-4 py-4 text-left text-sm font-semibold text-gray-900">Keterangan</th>
                            <th scope="col" rowspan="2" class="relative py-4 pl-3 pr-6">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                        <tr>
                            <th scope="col" class="px-4 py-3 text-center text-sm font-semibold text-gray-900">
                                <span class="inline-flex items-center">
                                    <span class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2 shadow-sm animate-pulse"></span>
                                    Baik
                                </span>
                            </th>
                            <th scope="col" class="px-4 py-3 text-center text-sm font-semibold text-gray-900">
                                <span class="inline-flex items-center">
                                    <span class="h-2.5 w-2.5 rounded-full bg-yellow-500 mr-2 shadow-sm animate-pulse"></span>
                                    Rusak Ringan
                                </span>
                            </th>
                            <th scope="col" class="px-4 py-3 text-center text-sm font-semibold text-gray-900">
                                <span class="inline-flex items-center">
                                    <span class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2 shadow-sm animate-pulse"></span>
                                    Rusak Berat
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200/30 bg-white/30">
                        @forelse ($inventaris as $item)
                            <tr class="table-row hover:bg-white/50 transition-all duration-200 group">
                                <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-medium text-gray-900 group-hover:text-gray-700">
                                    {{ $loop->iteration + ($inventaris->currentPage() - 1) * $inventaris->perPage() }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm">
                                    <div class="font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors duration-200">{{ $item->nama_barang }}</div>
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 shadow-sm border border-green-200 hover:scale-110 transition-transform duration-200">
                                        {{ $item->total_baik }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800 shadow-sm border border-yellow-200 hover:scale-110 transition-transform duration-200">
                                        {{ $item->total_rusak_ringan }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-4 text-sm text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800 shadow-sm border border-red-200 hover:scale-110 transition-transform duration-200">
                                        {{ $item->total_rusak_berat }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-600 max-w-xs truncate group-hover:text-gray-500">
                                    {{ $item->keterangan ?: '-' }}
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-x-4">
                                        <a href="{{ route('inventaris.show_grouped', $item) }}"
                                           class="inline-flex items-center text-indigo-600 hover:text-indigo-800 hover:scale-110 transition-all duration-200 font-semibold">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                            Lihat Detail
                                        </a>
                                        <button type="button"
                                                onclick="confirmDelete('{{ $item->nama_barang }}', {{ $item->id }})"
                                                class="inline-flex items-center text-red-600 hover:text-red-800 hover:scale-110 transition-all duration-200 font-semibold">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm-1 3a1 1 0 100 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                            </svg>
                                            <span>Hapus</span>
                                        </button>
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="whitespace-nowrap px-4 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-500 animate-fade-in">
                                        <div class="bg-gradient-to-br from-gray-200 to-gray-300 p-4 rounded-2xl mb-4 animate-bounce-slow">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-8V4a1 1 0 00-1-1h-2a1 1 0 00-1 1v1M9 7h6" />
                                            </svg>
                                        </div>
                                        <p class="text-lg font-semibold text-gray-900 mb-1">Tidak ada data inventaris</p>
                                        <p class="text-gray-500 mb-4">Mulai dengan menambahkan inventaris baru</p>
                                        <a href="{{ route('inventaris.create') }}"
                                           class="inline-flex items-center rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                            </svg>
                                            Tambah Inventaris Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($inventaris->hasPages())
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 animate-fade-in">
                <div class="text-sm text-gray-600 bg-white/50 backdrop-blur-sm rounded-lg px-4 py-2 shadow-sm">
                    Menampilkan 
                    <span class="font-semibold text-gray-900">{{ $inventaris->firstItem() }}</span>
                    sampai
                    <span class="font-semibold text-gray-900">{{ $inventaris->lastItem() }}</span>
                    dari
                    <span class="font-semibold text-gray-900">{{ $inventaris->total() }}</span>
                    hasil
                </div>
                <div class="flex justify-end">
                    {{ $inventaris->links() }}
                </div>
            </div>
        @endif
    </div>

    <!-- Modal Impor dengan Drag & Drop -->
    <div id="importModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Backdrop dengan Blur -->
            <div id="modal-backdrop" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity opacity-0"></div>
            
            <!-- Modal Panel -->
            <div id="modal-panel" class="relative transform overflow-hidden rounded-2xl bg-white px-4 pb-4 pt-5 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6 scale-95 opacity-0">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button type="button" onclick="closeImportModal()" class="rounded-lg bg-white text-gray-400 hover:text-gray-500 hover:bg-gray-100 p-2 transition-all duration-200">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-green-400 to-emerald-600 sm:mx-0 sm:h-12 sm:w-12 animate-pulse-slow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left flex-1">
                        <h3 class="text-xl font-bold leading-6 text-gray-900">Impor Data Inventaris</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Unggah file Excel (.xlsx, .xls) yang berisi data inventaris. Pastikan format file sesuai dengan template yang tersedia.
                            </p>
                        </div>
                    </div>
                </div>
                
                <form id="import-form" action="{{ route('inventaris.import') }}" method="POST" enctype="multipart/form-data" class="mt-6">
                    @csrf
                    <div class="mb-4">
                        <label for="file" class="block text-sm font-medium text-gray-700 mb-2">Pilih File</label>
                        
                        <!-- Drag & Drop Area -->
                        <div id="drop-zone" class="relative flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gradient-to-br from-gray-50 to-gray-100 hover:from-gray-100 hover:to-gray-200 transition-all duration-300 group">
                            <input id="file" name="file" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept=".xlsx,.xls" required />
                            
                            <div id="upload-content" class="flex flex-col items-center justify-center pt-5 pb-6 pointer-events-none">
                                <div class="mb-4 p-4 bg-white rounded-full shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-10 h-10 text-indigo-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                </div>
                                <p class="mb-2 text-sm text-gray-600"><span class="font-semibold text-indigo-600">Klik untuk upload</span> atau drag & drop</p>
                                <p class="text-xs text-gray-500">XLSX, XLS (MAX. 10MB)</p>
                            </div>
                            
                            <div id="file-preview" class="hidden flex-col items-center justify-center pointer-events-none">
                                <div class="mb-3 p-4 bg-green-100 rounded-full animate-bounce-slow">
                                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p id="file-name" class="text-sm font-semibold text-gray-900 mb-1"></p>
                                <p id="file-size" class="text-xs text-gray-500"></p>
                                <button type="button" onclick="resetFileInput()" class="mt-3 text-xs text-indigo-600 hover:text-indigo-800 font-medium pointer-events-auto">
                                    Ganti file
                                </button>
                            </div>

                            <!-- Drop Overlay -->
                            <div id="drop-overlay" class="hidden absolute inset-0 bg-indigo-500/20 backdrop-blur-sm rounded-2xl border-2 border-indigo-500 flex items-center justify-center">
                                <div class="text-center">
                                    <svg class="w-16 h-16 text-indigo-600 mx-auto mb-2 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-indigo-700 font-semibold">Lepaskan file di sini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                        <button
                            type="submit"
                            id="submit-import"
                            class="inline-flex w-full justify-center items-center rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2"
                        >
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                </svg>
                                Impor Data
                            </span>
                        </button>
                        <button
                            type="button"
                            onclick="closeImportModal()"
                            class="mt-3 inline-flex w-full justify-center rounded-xl bg-gradient-to-r from-gray-200 to-slate-200 px-4 py-3 text-sm font-semibold text-gray-900 shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200 sm:col-start-1 sm:mt-0"
                        >
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div id="delete-backdrop" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity opacity-0"></div>
            
            <div id="delete-panel" class="relative transform overflow-hidden rounded-2xl bg-white px-4 pb-4 pt-5 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6 scale-95 opacity-0">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-red-400 to-rose-600 sm:mx-0 sm:h-12 sm:w-12 animate-pulse-slow">
                        <svg class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left flex-1">
                        <h3 class="text-xl font-bold leading-6 text-gray-900">Hapus Data Inventaris</h3>
                        <div class="mt-3">
                            <p class="text-sm text-gray-600">
                                Apakah Anda yakin ingin menghapus master barang <span id="delete-item-name" class="font-bold text-gray-900"></span> beserta semua unit asetnya?
                            </p>
                            <div class="mt-4 p-4 bg-red-50 rounded-lg border border-red-200">
                                <div class="flex">
                                    <svg class="h-5 w-5 text-red-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-sm text-red-800">
                                        <span class="font-semibold">Peringatan:</span> Tindakan ini tidak dapat dibatalkan!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                    <button
                        type="button"
                        id="confirm-delete"
                        class="inline-flex w-full justify-center items-center rounded-xl bg-gradient-to-r from-red-600 to-rose-600 px-4 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200 sm:col-start-2"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Ya, Hapus
                    </button>
                    <button
                        type="button"
                        onclick="closeDeleteModal()"
                        class="mt-3 inline-flex w-full justify-center rounded-xl bg-gradient-to-r from-gray-200 to-slate-200 px-4 py-3 text-sm font-semibold text-gray-900 shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200 sm:col-start-1 sm:mt-0"
                    >
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Animasi Custom */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideDown {
            from { 
                opacity: 0;
                transform: translateY(-20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulseSlow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        @keyframes bounceSlow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        .animate-slide-down {
            animation: slideDown 0.6s ease-out forwards;
        }
        
        .animate-slide-up {
            animation: slideUp 0.6s ease-out forwards;
        }

        .animate-pulse-slow {
            animation: pulseSlow 3s ease-in-out infinite;
        }

        .animate-bounce-slow {
            animation: bounceSlow 2s ease-in-out infinite;
        }
        
        .table-row {
            animation: fadeIn 0.5s ease-out forwards;
        }
        
        /* Drag & Drop States */
        #drop-zone.drag-over {
            border-color: #4f46e5;
            background: linear-gradient(to bottom right, #eef2ff, #e0e7ff);
        }
    </style>

    <script>
        // Toast Notification System
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            const colors = {
                success: 'from-green-500 to-emerald-600',
                error: 'from-red-500 to-rose-600',
                info: 'from-blue-500 to-sky-600',
                warning: 'from-yellow-500 to-amber-600'
            };
            
            const icons = {
                success: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                error: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                info: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                warning: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>'
            };
            
            toast.className = `flex items-center gap-3 p-4 rounded-xl bg-gradient-to-r ${colors[type]} text-white shadow-2xl transform translate-x-full transition-all duration-300 min-w-[300px]`;
            toast.innerHTML = `
                <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    ${icons[type]}
                </svg>
                <p class="text-sm font-medium flex-1">${message}</p>
                <button onclick="this.parentElement.remove()" class="hover:bg-white/20 rounded-lg p-1 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
            
            container.appendChild(toast);
            
            setTimeout(() => toast.classList.remove('translate-x-full'), 100);
            
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }

        // Counter Animation
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 16);
        }

        // Initialize counters on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.counter').forEach(counter => {
                animateCounter(counter);
            });
        });

        // Import Modal Functions
        function openImportModal() {
            const modal = document.getElementById('importModal');
            const backdrop = document.getElementById('modal-backdrop');
            const panel = document.getElementById('modal-panel');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                panel.classList.remove('scale-95', 'opacity-0');
                panel.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeImportModal() {
            const modal = document.getElementById('importModal');
            const backdrop = document.getElementById('modal-backdrop');
            const panel = document.getElementById('modal-panel');
            
            backdrop.classList.add('opacity-0');
            panel.classList.add('scale-95', 'opacity-0');
            panel.classList.remove('scale-100', 'opacity-100');
            
            setTimeout(() => modal.classList.add('hidden'), 300);
        }

        // File Upload with Drag & Drop
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file');
        const uploadContent = document.getElementById('upload-content');
        const filePreview = document.getElementById('file-preview');
        const dropOverlay = document.getElementById('drop-overlay');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.add('drag-over');
                dropOverlay.classList.remove('hidden');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.remove('drag-over');
                dropOverlay.classList.add('hidden');
            });
        });

        dropZone.addEventListener('drop', (e) => {
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                handleFileSelect(files[0]);
            }
        });

        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                handleFileSelect(e.target.files[0]);
            }
        });

        function handleFileSelect(file) {
            const fileName = file.name;
            const fileSize = (file.size / 1024).toFixed(2) + ' KB';
            
            document.getElementById('file-name').textContent = fileName;
            document.getElementById('file-size').textContent = fileSize;
            
            uploadContent.classList.add('hidden');
            filePreview.classList.remove('hidden');
            filePreview.classList.add('flex');
            
            showToast('File berhasil dipilih: ' + fileName, 'success');
        }

        function resetFileInput() {
            fileInput.value = '';
            uploadContent.classList.remove('hidden');
            filePreview.classList.add('hidden');
            filePreview.classList.remove('flex');
        }

        // Delete Confirmation Modal
        let deleteItemId = null;

        function confirmDelete(itemName, itemId) {
            deleteItemId = itemId;
            document.getElementById('delete-item-name').textContent = itemName;
            
            const modal = document.getElementById('deleteModal');
            const backdrop = document.getElementById('delete-backdrop');
            const panel = document.getElementById('delete-panel');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                panel.classList.remove('scale-95', 'opacity-0');
                panel.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const backdrop = document.getElementById('delete-backdrop');
            const panel = document.getElementById('delete-panel');
            
            backdrop.classList.add('opacity-0');
            panel.classList.add('scale-95', 'opacity-0');
            panel.classList.remove('scale-100', 'opacity-100');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                deleteItemId = null;
            }, 300);
        }

        document.getElementById('confirm-delete').addEventListener('click', function() {
            if (deleteItemId) {
                document.getElementById('delete-form-' + deleteItemId).submit();
            }
        });

        // Show success/error messages from Laravel session
        @if(session('success'))
            showToast("{{ session('success') }}", 'success');
        @endif

        @if(session('error'))
            showToast("{{ session('error') }}", 'error');
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                showToast("{{ $error }}", 'error');
            @endforeach
        @endif
    </script>
@endsection