@extends('dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section yang Diperbaiki -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-4 md:mb-0">
                <div class="flex items-center gap-3 mb-3">
                    <a href="{{ route('inventaris.index') }}" class="group inline-flex items-center text-gray-600 hover:text-gray-900 transition-all duration-300 transform hover:-translate-x-1">
                        <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Daftar Inventaris
                    </a>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                        Detail Inventaris
                    </h1>
                    <div class="flex items-center gap-3">
                        <span class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-3 py-1.5 rounded-full text-sm font-semibold shadow-lg">
                            ID: {{ $inventaris->id }}
                        </span>
                        <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1.5 rounded-full">
                            📅 {{ $inventaris->updated_at->format('d M Y, H:i') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('inventaris.print_single', $inventaris) }}" target="_blank" class="group inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-gray-600 to-slate-700 px-5 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    Cetak
                </a>
                <a href="{{ route('inventaris.edit', $inventaris) }}" class="group inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-yellow-500 to-amber-600 px-5 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards dengan Glassmorphism -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Stok -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-500 via-blue-600 to-sky-700 p-6 text-white shadow-2xl transform hover:scale-105 transition-all duration-300 group">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-blue-100 text-sm font-medium mb-2">Total Stok</p>
                        <p class="text-3xl font-bold mb-1">
                            {{ $inventaris->kondisi_baik + $inventaris->kondisi_rusak_ringan + $inventaris->kondisi_rusak_berat }}
                        </p>
                        <p class="text-blue-100 text-xs opacity-90">Semua kondisi</p>
                    </div>
                    <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m8-8V4a1 1 0 00-1-1h-2a1 1 0 00-1 1v1M9 7h6"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kondisi Baik -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-500 via-green-600 to-emerald-700 p-6 text-white shadow-2xl transform hover:scale-105 transition-all duration-300 group">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-green-100 text-sm font-medium mb-2">Kondisi Baik</p>
                        <p class="text-3xl font-bold mb-1">{{ $inventaris->kondisi_baik }}</p>
                        <p class="text-green-100 text-xs opacity-90">Siap digunakan</p>
                    </div>
                    <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rusak Ringan -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-yellow-500 via-yellow-600 to-amber-700 p-6 text-white shadow-2xl transform hover:scale-105 transition-all duration-300 group">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-yellow-100 text-sm font-medium mb-2">Rusak Ringan</p>
                        <p class="text-3xl font-bold mb-1">{{ $inventaris->kondisi_rusak_ringan }}</p>
                        <p class="text-yellow-100 text-xs opacity-90">Perlu perbaikan</p>
                    </div>
                    <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rusak Berat -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-500 via-red-600 to-rose-700 p-6 text-white shadow-2xl transform hover:scale-105 transition-all duration-300 group">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-red-100 text-sm font-medium mb-2">Rusak Berat</p>
                        <p class="text-3xl font-bold mb-1">{{ $inventaris->kondisi_rusak_berat }}</p>
                        <p class="text-red-100 text-xs opacity-90">Perbaikan serius</p>
                    </div>
                    <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Basic Information -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Basic Information Card -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden group hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-500/10 to-indigo-500/10 px-6 py-5 border-b border-gray-200/50">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-3 rounded-xl mr-4 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        Informasi Dasar Barang
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Nama Barang</label>
                            <p class="text-lg font-bold text-gray-900 bg-gray-50/50 p-3 rounded-lg border border-gray-200">
                                {{ $inventaris->nama_barang }}
                            </p>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Kategori</label>
                            <span class="inline-flex items-center px-3 py-2 rounded-full text-sm font-bold bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 border border-blue-200 shadow-sm capitalize">
                                📦 {{ $inventaris->kategori }}
                            </span>
                        </div>
                        <div class="md:col-span-2 space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Lokasi Penyimpanan</label>
                            <p class="text-lg font-bold text-gray-900 bg-gray-50/50 p-3 rounded-lg border border-gray-200 flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                {{ $inventaris->lokasi ?? 'Lokasi belum ditentukan' }}
                            </p>
                        </div>
                        @if($inventaris->keterangan)
                        <div class="md:col-span-2 space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Keterangan Tambahan</label>
                            <p class="text-gray-700 bg-amber-50/50 p-4 rounded-lg border border-amber-200 leading-relaxed">
                                {{ $inventaris->keterangan }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Additional Details Card -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden group hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-purple-500/10 to-pink-500/10 px-6 py-5 border-b border-gray-200/50">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center">
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-3 rounded-xl mr-4 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        Informasi Tambahan
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Tanggal Dibuat</label>
                            <p class="text-gray-700 bg-gray-50/50 p-3 rounded-lg border border-gray-200 flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $inventaris->created_at->format('d F Y, H:i') }}
                            </p>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Terakhir Diupdate</label>
                            <p class="text-gray-700 bg-gray-50/50 p-3 rounded-lg border border-gray-200 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                {{ $inventaris->updated_at->format('d F Y, H:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Additional Information -->
        <div class="space-y-8">
            <!-- Condition Summary Card -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden group hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-amber-500/10 to-orange-500/10 px-6 py-5 border-b border-gray-200/50">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center">
                        <div class="bg-gradient-to-r from-amber-500 to-amber-600 text-white p-3 rounded-xl mr-4 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        Ringkasan Kondisi
                    </h2>
                </div>
                <div class="p-6">
                    <div class="space-y-5">
                        <!-- Progress Bar Overall -->
                        <div class="mb-6">
                            <div class="flex justify-between text-sm font-semibold text-gray-600 mb-2">
                                <span>Kondisi Keseluruhan</span>
                                <span>
                                    @php
                                        $total = $inventaris->kondisi_baik + $inventaris->kondisi_rusak_ringan + $inventaris->kondisi_rusak_berat;
                                        $percentage = $total > 0 ? ($inventaris->kondisi_baik / $total) * 100 : 0;
                                    @endphp
                                    {{ number_format($percentage, 1) }}% Baik
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-green-500 to-green-600 h-3 rounded-full transition-all duration-1000 ease-out" 
                                     style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>

                        <!-- Baik -->
                        <div class="flex items-center justify-between p-3 bg-green-50/50 rounded-lg border border-green-200">
                            <div class="flex items-center">
                                <span class="w-4 h-4 bg-green-500 rounded-full mr-3 shadow-sm"></span>
                                <span class="text-sm font-semibold text-gray-700">Baik</span>
                            </div>
                            <span class="text-xl font-bold text-green-600 bg-white px-3 py-1 rounded-full shadow-sm">
                                {{ $inventaris->kondisi_baik }}
                            </span>
                        </div>
                        
                        <!-- Rusak Ringan -->
                        <div class="flex items-center justify-between p-3 bg-yellow-50/50 rounded-lg border border-yellow-200">
                            <div class="flex items-center">
                                <span class="w-4 h-4 bg-yellow-500 rounded-full mr-3 shadow-sm"></span>
                                <span class="text-sm font-semibold text-gray-700">Rusak Ringan</span>
                            </div>
                            <span class="text-xl font-bold text-yellow-600 bg-white px-3 py-1 rounded-full shadow-sm">
                                {{ $inventaris->kondisi_rusak_ringan }}
                            </span>
                        </div>
                        
                        <!-- Rusak Berat -->
                        <div class="flex items-center justify-between p-3 bg-red-50/50 rounded-lg border border-red-200">
                            <div class="flex items-center">
                                <span class="w-4 h-4 bg-red-500 rounded-full mr-3 shadow-sm"></span>
                                <span class="text-sm font-semibold text-gray-700">Rusak Berat</span>
                            </div>
                            <span class="text-xl font-bold text-red-600 bg-white px-3 py-1 rounded-full shadow-sm">
                                {{ $inventaris->kondisi_rusak_berat }}
                            </span>
                        </div>
                        
                        <!-- Total -->
                        <div class="pt-5 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-gray-900">Total Stok</span>
                                <span class="text-2xl font-bold text-gray-900 bg-gradient-to-r from-gray-100 to-gray-200 px-4 py-2 rounded-xl shadow-sm">
                                    {{ $total }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons Card -->
            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden group hover:shadow-2xl transition-all duration-300">
                <div class="bg-gradient-to-r from-red-500/10 to-pink-500/10 px-6 py-5 border-b border-gray-200/50">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center">
                        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-3 rounded-xl mr-4 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        Aksi Cepat
                    </h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <a href="{{ route('inventaris.edit', $inventaris) }}" class="group w-full inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-yellow-500 to-amber-600 px-4 py-3.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Inventaris
                        </a>
                        
                        <a href="{{ route('inventaris.print_single', $inventaris) }}" target="_blank" class="group w-full inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-gray-600 to-slate-700 px-4 py-3.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                            Cetak Detail
                        </a>

                        <form action="{{ route('inventaris.destroy', $inventaris) }}" method="POST" class="inline-block w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="group w-full inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-red-600 to-rose-700 px-4 py-3.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200" onclick="return confirm('Apakah Anda yakin ingin menghapus inventaris ini? Tindakan ini tidak dapat dibatalkan.')">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Hapus Inventaris
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection