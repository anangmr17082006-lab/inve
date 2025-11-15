@extends('dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section dengan Enhanced Design -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-4 md:mb-0">
                <div class="flex items-center gap-3 mb-3">
                    <a href="{{ route('units.index') }}" class="group inline-flex items-center text-gray-600 hover:text-gray-900 transition-all duration-300 transform hover:-translate-x-1">
                        <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Daftar Unit
                    </a>
                </div>
                <h1 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-3">
                    Detail Unit Kerja
                </h1>
                <p class="text-lg text-gray-600">Informasi lengkap tentang unit organisasi kampus</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('units.edit', $unit->id) }}" class="group inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 px-5 py-3 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Unit
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Unit Information -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Basic Information Card -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-500/10 to-indigo-500/10 px-6 py-5 border-b border-gray-200/50">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center">
                        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-3 rounded-2xl mr-4 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        Informasi Dasar Unit
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Nama Unit</label>
                            <p class="text-lg font-bold text-gray-900 bg-gray-50/50 p-3 rounded-xl border border-gray-200">
                                {{ $unit->nama_unit }}
                            </p>
                        </div>
                        
                        <div class="space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Tipe Unit</label>
                            @php
                                $typeColors = [
                                    'fakultas' => 'from-blue-100 to-blue-200 text-blue-800 border-blue-200',
                                    'departemen' => 'from-green-100 to-green-200 text-green-800 border-green-200',
                                    'laboratorium' => 'from-purple-100 to-purple-200 text-purple-800 border-purple-200',
                                    'unit_kerja' => 'from-gray-100 to-gray-200 text-gray-800 border-gray-200'
                                ];
                                $typeColor = $typeColors[$unit->tipe ?? 'unit_kerja'] ?? $typeColors['unit_kerja'];
                            @endphp
                            <span class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-bold bg-gradient-to-r {{ $typeColor }} border shadow-sm capitalize">
                                {{ $unit->tipe ?? 'Unit Kerja' }}
                            </span>
                        </div>

                        @if($unit->penanggung_jawab)
                        <div class="space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Penanggung Jawab</label>
                            <p class="text-lg font-bold text-gray-900 bg-gray-50/50 p-3 rounded-xl border border-gray-200 flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                {{ $unit->penanggung_jawab }}
                            </p>
                        </div>
                        @endif

                        @if($unit->keterangan)
                        <div class="md:col-span-2 space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Keterangan</label>
                            <p class="text-gray-700 bg-amber-50/50 p-4 rounded-xl border border-amber-200 leading-relaxed">
                                {{ $unit->keterangan }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Statistics Card -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-purple-500/10 to-pink-500/10 px-6 py-5 border-b border-gray-200/50">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center">
                        <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-3 rounded-2xl mr-4 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        Statistik Unit
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2">{{ $unit->rooms_count ?? 0 }}</div>
                            <div class="text-sm font-semibold text-blue-800">Ruangan</div>
                            <p class="text-xs text-blue-600 mt-2">Total ruangan dalam unit</p>
                        </div>
                        
                        <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl border border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2">{{ $unit->inventaris_count ?? 0 }}</div>
                            <div class="text-sm font-semibold text-green-800">Inventaris</div>
                            <p class="text-xs text-green-600 mt-2">Total barang inventaris</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Additional Information & Actions -->
        <div class="space-y-8">
            <!-- Timestamps Card -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-gray-500/10 to-slate-500/10 px-6 py-5 border-b border-gray-200/50">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center">
                        <div class="bg-gradient-to-br from-gray-500 to-gray-600 text-white p-3 rounded-2xl mr-4 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        Informasi Waktu
                    </h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Dibuat Pada</label>
                            <p class="text-gray-700 bg-gray-50/50 p-3 rounded-xl border border-gray-200 flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $unit->created_at->format('d F Y, H:i') }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">{{ $unit->created_at->diffForHumans() }}</p>
                        </div>
                        
                        <div class="space-y-1">
                            <label class="block text-sm font-semibold text-gray-500 mb-2">Terakhir Diperbarui</label>
                            <p class="text-gray-700 bg-gray-50/50 p-3 rounded-xl border border-gray-200 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                {{ $unit->updated_at->format('d F Y, H:i') }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">{{ $unit->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons Card -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-red-500/10 to-rose-500/10 px-6 py-5 border-b border-gray-200/50">
                    <h2 class="text-xl font-bold text-gray-900">Aksi Unit</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <a href="{{ route('units.edit', $unit->id) }}" class="group w-full inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 px-4 py-3.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Unit
                        </a>
                        
                        <form action="{{ route('units.destroy', $unit->id) }}" method="POST" class="inline-block w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="group w-full inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-red-600 to-rose-700 px-4 py-3.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus unit ini? Tindakan ini tidak dapat dibatalkan dan akan mempengaruhi semua ruangan yang terkait.')">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Hapus Unit
                            </button>
                        </form>

                        <a href="{{ route('units.index') }}" class="group w-full inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-gray-600 to-slate-700 px-4 py-3.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links Card -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-500/10 to-cyan-500/10 px-6 py-5 border-b border-gray-200/50">
                    <h2 class="text-xl font-bold text-gray-900">Tautan Cepat</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <a href="{{ route('rooms.index', ['unit_id' => $unit->id]) }}" class="flex items-center gap-3 p-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl transition-all duration-200 group/link">
                            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg group-hover/link:scale-110 transition-transform duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            </div>
                            <span class="font-medium">Lihat Ruangan di Unit Ini</span>
                        </a>
                        
                        <a href="{{ route('inventaris.index', ['unit_id' => $unit->id]) }}" class="flex items-center gap-3 p-3 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-xl transition-all duration-200 group/link">
                            <div class="bg-green-100 text-green-600 p-2 rounded-lg group-hover/link:scale-110 transition-transform duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <span class="font-medium">Lihat Inventaris Unit</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection