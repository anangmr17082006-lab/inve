@extends('dashboard')

@section('title', 'Dashboard')
@section('subtitle', 'Selamat datang kembali, ' . Auth::user()->name)

@section('content')
    <!-- Welcome Banner -->
    <div class="mb-8 animate-fade-in">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 p-8 shadow-2xl">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="absolute top-0 right-0 -mt-10 -mr-10 h-40 w-40 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -mb-10 -ml-10 h-40 w-40 rounded-full bg-white/10 blur-3xl"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
                <div class="mb-6 md:mb-0">
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-2 animate-slide-down">
                        Selamat Datang, {{ Auth::user()->name }}! 👋
                    </h1>
                    <p class="text-white/90 text-lg animate-slide-down" style="animation-delay: 0.1s;">
                        {{ now()->format('l, d F Y') }} • {{ now()->format('H:i') }} WIB
                    </p>
                    <div class="mt-4 flex flex-wrap gap-2 animate-slide-down" style="animation-delay: 0.2s;">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 text-white backdrop-blur-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                            {{ ucfirst(Auth::user()->role ?? 'User') }}
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/20 text-white backdrop-blur-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Online
                        </span>
                    </div>
                </div>
                <div class="flex gap-3 animate-slide-down" style="animation-delay: 0.3s;">
                    <a href="{{ route('inventaris.create') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-white text-indigo-600 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Inventaris
                    </a>
                    <a href="{{ route('inventaris.index') }}" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-white/20 text-white backdrop-blur-sm rounded-xl font-semibold hover:bg-white/30 hover:scale-105 active:scale-95 transition-all duration-200">
                        Lihat Semua
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
        <!-- Total Inventaris -->
        <div class="stat-card relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-500 via-blue-600 to-sky-700 p-6 shadow-2xl transform hover:scale-105 transition-all duration-300 animate-slide-up" style="animation-delay: 0.1s;">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-white/10 blur-2xl"></div>
            <div class="absolute -bottom-4 -left-4 h-32 w-32 rounded-full bg-white/5 blur-3xl"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm animate-pulse-slow">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <span class="text-blue-100 text-xs font-medium px-2 py-1 bg-white/20 rounded-full">Total</span>
                </div>
                <div class="space-y-2">
                    <p class="text-blue-100 text-sm font-medium">Total Inventaris</p>
                    <p class="text-4xl font-bold text-white counter" data-target="{{ $totalInventaris ?? 1250 }}">0</p>
                    <div class="flex items-center text-blue-100 text-sm">
                        <svg class="w-4 h-4 mr-1 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                        </svg>
                        <span>+{{ $growthPercentage ?? 12 }}% dari bulan lalu</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barang Baik -->
        <div class="stat-card relative overflow-hidden rounded-2xl bg-gradient-to-br from-green-500 via-green-600 to-emerald-700 p-6 shadow-2xl transform hover:scale-105 transition-all duration-300 animate-slide-up" style="animation-delay: 0.2s;">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-white/10 blur-2xl"></div>
            <div class="absolute -bottom-4 -left-4 h-32 w-32 rounded-full bg-white/5 blur-3xl"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm animate-pulse-slow">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-green-100 text-xs font-medium px-2 py-1 bg-white/20 rounded-full">Baik</span>
                </div>
                <div class="space-y-2">
                    <p class="text-green-100 text-sm font-medium">Kondisi Baik</p>
                    <p class="text-4xl font-bold text-white counter" data-target="{{ $barangBaik ?? 1089 }}">0</p>
                    <div class="w-full bg-green-400/30 rounded-full h-2 mt-3">
                        <div class="bg-white h-2 rounded-full progress-bar" data-width="{{ $persentaseBaik ?? 87 }}" style="width: 0%"></div>
                    </div>
                    <p class="text-green-100 text-xs">{{ $persentaseBaik ?? 87 }}% dari total inventaris</p>
                </div>
            </div>
        </div>

        <!-- Rusak Ringan -->
        <div class="stat-card relative overflow-hidden rounded-2xl bg-gradient-to-br from-yellow-500 via-yellow-600 to-amber-700 p-6 shadow-2xl transform hover:scale-105 transition-all duration-300 animate-slide-up" style="animation-delay: 0.3s;">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-white/10 blur-2xl"></div>
            <div class="absolute -bottom-4 -left-4 h-32 w-32 rounded-full bg-white/5 blur-3xl"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm animate-pulse-slow">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <span class="text-yellow-100 text-xs font-medium px-2 py-1 bg-white/20 rounded-full">Perhatian</span>
                </div>
                <div class="space-y-2">
                    <p class="text-yellow-100 text-sm font-medium">Rusak Ringan</p>
                    <p class="text-4xl font-bold text-white counter" data-target="{{ $rusakRingan ?? 125 }}">0</p>
                    <div class="w-full bg-yellow-400/30 rounded-full h-2 mt-3">
                        <div class="bg-white h-2 rounded-full progress-bar" data-width="{{ $persentaseRusakRingan ?? 10 }}" style="width: 0%"></div>
                    </div>
                    <p class="text-yellow-100 text-xs">{{ $persentaseRusakRingan ?? 10 }}% memerlukan perbaikan</p>
                </div>
            </div>
        </div>

        <!-- Rusak Berat -->
        <div class="stat-card relative overflow-hidden rounded-2xl bg-gradient-to-br from-red-500 via-red-600 to-rose-700 p-6 shadow-2xl transform hover:scale-105 transition-all duration-300 animate-slide-up" style="animation-delay: 0.4s;">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-white/10 blur-2xl"></div>
            <div class="absolute -bottom-4 -left-4 h-32 w-32 rounded-full bg-white/5 blur-3xl"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm animate-pulse-slow">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-red-100 text-xs font-medium px-2 py-1 bg-white/20 rounded-full pulse-notification">Urgent</span>
                </div>
                <div class="space-y-2">
                    <p class="text-red-100 text-sm font-medium">Rusak Berat</p>
                    <p class="text-4xl font-bold text-white counter" data-target="{{ $rusakBerat ?? 36 }}">0</p>
                    <div class="w-full bg-red-400/30 rounded-full h-2 mt-3">
                        <div class="bg-white h-2 rounded-full progress-bar" data-width="{{ $persentaseRusakBerat ?? 3 }}" style="width: 0%"></div>
                    </div>
                    <p class="text-red-100 text-xs">{{ $persentaseRusakBerat ?? 3 }}% perlu penggantian</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Chart Section -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Kondisi Barang Chart -->
            <div class="bg-white/50 backdrop-blur-sm rounded-2xl shadow-xl p-6 animate-fade-in" style="animation-delay: 0.5s;">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Status Kondisi Barang</h3>
                        <p class="text-sm text-gray-500 mt-1">Distribusi kondisi inventaris</p>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="filterChart('today')" class="chart-filter-btn px-3 py-1.5 text-xs font-semibold bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition-colors" data-filter="today">
                            Hari Ini
                        </button>
                        <button onclick="filterChart('week')" class="chart-filter-btn px-3 py-1.5 text-xs font-semibold text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" data-filter="week">
                            Minggu Ini
                        </button>
                        <button onclick="filterChart('month')" class="chart-filter-btn px-3 py-1.5 text-xs font-semibold text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" data-filter="month">
                            Bulan Ini
                        </button>
                    </div>
                </div>
                
                <div class="relative h-64">
                    <canvas id="conditionChart"></canvas>
                </div>

                <!-- Legend -->
                <div class="grid grid-cols-3 gap-4 mt-6">
                    <div class="flex items-center gap-3 p-3 bg-green-50 rounded-xl">
                        <div class="h-3 w-3 rounded-full bg-green-500"></div>
                        <div>
                            <p class="text-xs text-gray-600">Baik</p>
                            <p class="text-sm font-bold text-gray-900">{{ $persentaseBaik ?? 87 }}%</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-yellow-50 rounded-xl">
                        <div class="h-3 w-3 rounded-full bg-yellow-500"></div>
                        <div>
                            <p class="text-xs text-gray-600">Rusak Ringan</p>
                            <p class="text-sm font-bold text-gray-900">{{ $persentaseRusakRingan ?? 10 }}%</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-red-50 rounded-xl">
                        <div class="h-3 w-3 rounded-full bg-red-500"></div>
                        <div>
                            <p class="text-xs text-gray-600">Rusak Berat</p>
                            <p class="text-sm font-bold text-gray-900">{{ $persentaseRusakBerat ?? 3 }}%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Distribution -->
            <div class="bg-white/50 backdrop-blur-sm rounded-2xl shadow-xl p-6 animate-fade-in" style="animation-delay: 0.6s;">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Distribusi Kategori</h3>
                        <p class="text-sm text-gray-500 mt-1">Berdasarkan jenis barang</p>
                    </div>
                </div>
                
                <div class="space-y-4">
                    @isset($categories)
                        @foreach($categories as $category)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $category['name'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $category['count'] }} items</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-32 bg-gray-200 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full progress-bar" data-width="{{ $category['percentage'] }}" style="width: 0%"></div>
                                </div>
                                <span class="text-sm font-bold text-gray-900 w-12 text-right">{{ $category['percentage'] }}%</span>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Default categories if not passed from controller -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Tidak Habis Pakai</p>
                                    <p class="text-xs text-gray-500">645 items</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-32 bg-gray-200 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full progress-bar" data-width="52" style="width: 0%"></div>
                                </div>
                                <span class="text-sm font-bold text-gray-900 w-12 text-right">52%</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-purple-100 rounded-lg">
                                    <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Habis Pakai</p>
                                    <p class="text-xs text-gray-500">405 items</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-32 bg-gray-200 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-2 rounded-full progress-bar" data-width="32" style="width: 0%"></div>
                                </div>
                                <span class="text-sm font-bold text-gray-900 w-12 text-right">32%</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-amber-100 rounded-lg">
                                    <svg class="w-5 h-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Aset Tetap</p>
                                    <p class="text-xs text-gray-500">200 items</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-32 bg-gray-200 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-amber-500 to-amber-600 h-2 rounded-full progress-bar" data-width="16" style="width: 0%"></div>
                                </div>
                                <span class="text-sm font-bold text-gray-900 w-12 text-right">16%</span>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>

        <!-- Quick Actions & Alerts -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white/50 backdrop-blur-sm rounded-2xl shadow-xl p-6 animate-fade-in" style="animation-delay: 0.7s;">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('inventaris.create') }}" 
                       class="flex items-center gap-3 p-4 bg-gradient-to-r from-indigo-50 to-purple-50 hover:from-indigo-100 hover:to-purple-100 rounded-xl transition-all duration-200 hover:scale-105 group">
                        <div class="p-2 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Tambah Inventaris</p>
                            <p class="text-xs text-gray-500">Buat data baru</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="{{ route('inventaris.export') }}" 
                       class="flex items-center gap-3 p-4 bg-gradient-to-r from-blue-50 to-cyan-50 hover:from-blue-100 hover:to-cyan-100 rounded-xl transition-all duration-200 hover:scale-105 group">
                        <div class="p-2 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Ekspor Data</p>
                            <p class="text-xs text-gray-500">Download Excel</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <!-- PERBAIKAN: Menambah function openImportModal yang hilang -->
                    <button onclick="openImportModal()" 
                       class="flex items-center gap-3 p-4 bg-gradient-to-r from-green-50 to-emerald-50 hover:from-green-100 hover:to-emerald-100 rounded-xl transition-all duration-200 hover:scale-105 group w-full">
                        <div class="p-2 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                        </div>
                        <div class="flex-1 text-left">
                            <p class="text-sm font-semibold text-gray-900">Impor Data</p>
                            <p class="text-xs text-gray-500">Upload dari Excel</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <a href="{{ route('inventaris.print_all') }}" target="_blank"
                       class="flex items-center gap-3 p-4 bg-gradient-to-r from-gray-50 to-slate-50 hover:from-gray-100 hover:to-slate-100 rounded-xl transition-all duration-200 hover:scale-105 group">
                        <div class="p-2 bg-gradient-to-br from-gray-600 to-slate-700 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Cetak Laporan</p>
                            <p class="text-xs text-gray-500">Print semua data</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Alerts & Notifications -->
            <div class="bg-white/50 backdrop-blur-sm rounded-2xl shadow-xl p-6 animate-fade-in" style="animation-delay: 0.8s;">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Peringatan</h3>
                    <span class="px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">{{ $totalAlerts ?? 3 }}</span>
                </div>
                <div class="space-y-3">
                    <div class="flex items-start gap-3 p-3 bg-red-50 border-l-4 border-red-500 rounded-lg">
                        <div class="p-1.5 bg-red-100 rounded-lg">
                            <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-red-900">{{ $rusakBerat ?? 36 }} Barang Rusak Berat</p>
                            <p class="text-xs text-red-700 mt-1">Perlu penggantian segera</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-3 bg-yellow-50 border-l-4 border-yellow-500 rounded-lg">
                        <div class="p-1.5 bg-yellow-100 rounded-lg">
                            <svg class="w-4 h-4 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-yellow-900">{{ $rusakRingan ?? 125 }} Perlu Perbaikan</p>
                            <p class="text-xs text-yellow-700 mt-1">Rusak ringan, dapat diperbaiki</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-3 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
                        <div class="p-1.5 bg-blue-100 rounded-lg">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-blue-900">Stok Rendah</p>
                            <p class="text-xs text-blue-700 mt-1">{{ $stokRendah ?? 15 }} item habis pakai hampir habis</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Storage Overview -->
            <div class="bg-white/50 backdrop-blur-sm rounded-2xl shadow-xl p-6 animate-fade-in" style="animation-delay: 0.9s;">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Kapasitas Penyimpanan</h3>
                <div class="space-y-4">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Database</span>
                            <span class="text-sm font-bold text-gray-900">{{ $databaseUsage ?? '2.4' }} GB / 5 GB</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2.5 rounded-full progress-bar" data-width="{{ $databasePercentage ?? 48 }}" style="width: 0%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Media Files</span>
                            <span class="text-sm font-bold text-gray-900">{{ $mediaUsage ?? '850' }} MB / 2 GB</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-gradient-to-r from-blue-500 to-cyan-600 h-2.5 rounded-full progress-bar" data-width="{{ $mediaPercentage ?? 42 }}" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities & Top Items -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Recent Activities -->
        <div class="bg-white/50 backdrop-blur-sm rounded-2xl shadow-xl p-6 animate-fade-in" style="animation-delay: 1s;">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Aktivitas Terbaru</h3>
                    <p class="text-sm text-gray-500 mt-1">Log aktivitas sistem</p>
                </div>
                <a href="{{ route('activity.logs') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Lihat Semua</a>
            </div>

            <div class="space-y-4">
                @isset($recentActivities)
                    @foreach($recentActivities as $activity)
                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors group">
                        <div class="p-2 {{ $activity['color'] ?? 'bg-green-100' }} rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 {{ $activity['icon_color'] ?? 'text-green-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $activity['icon'] ?? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>' !!}
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">{{ $activity['title'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $activity['description'] }}</p>
                            <p class="text-xs text-gray-400 mt-2 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                {{ $activity['time'] }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Default activities -->
                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors group">
                        <div class="p-2 bg-green-100 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Inventaris Baru Ditambahkan</p>
                            <p class="text-xs text-gray-500 mt-1">Laptop Dell Latitude 5420 ditambahkan ke sistem</p>
                            <p class="text-xs text-gray-400 mt-2 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                2 menit yang lalu
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors group">
                        <div class="p-2 bg-blue-100 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Status Diperbarui</p>
                            <p class="text-xs text-gray-500 mt-1">Proyektor Epson EB-X05 diperbaiki dan dikembalikan</p>
                            <p class="text-xs text-gray-400 mt-2 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                15 menit yang lalu
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors group">
                        <div class="p-2 bg-yellow-100 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Peringatan Kondisi</p>
                            <p class="text-xs text-gray-500 mt-1">Kursi ruang meeting perlu pengecekan kondisi</p>
                            <p class="text-xs text-gray-400 mt-2 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                1 jam yang lalu
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors group">
                        <div class="p-2 bg-purple-100 rounded-lg group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Data Diimpor</p>
                            <p class="text-xs text-gray-500 mt-1">125 item berhasil diimpor dari Excel</p>
                            <p class="text-xs text-gray-400 mt-2 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                3 jam yang lalu
                            </p>
                        </div>
                    </div>
                @endisset
            </div>
        </div>

        <!-- Top Items -->
        <div class="bg-white/50 backdrop-blur-sm rounded-2xl shadow-xl p-6 animate-fade-in" style="animation-delay: 1.1s;">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Item Populer</h3>
                    <p class="text-sm text-gray-500 mt-1">Barang paling banyak digunakan</p>
                </div>
                <div class="flex gap-2">
                    <button class="px-3 py-1.5 text-xs font-semibold bg-indigo-100 text-indigo-700 rounded-lg">
                        Minggu Ini
                    </button>
                </div>
            </div>

            <div class="space-y-4">
                @isset($topItems)
                    @foreach($topItems as $index => $item)
                    <div class="flex items-center gap-4 p-4 {{ $index < 3 ? 'bg-gradient-to-r ' . ($index === 0 ? 'from-yellow-50 to-amber-50 border-2 border-yellow-200' : ($index === 1 ? 'from-gray-50 to-slate-50 border-2 border-gray-200' : 'from-orange-50 to-amber-50 border-2 border-orange-200')) : 'bg-gray-50 hover:bg-gray-100 transition-colors' }} rounded-xl">
                        <div class="flex items-center justify-center w-10 h-10 {{ $index < 3 ? 'bg-gradient-to-br ' . ($index === 0 ? 'from-yellow-400 to-amber-500' : ($index === 1 ? 'from-gray-400 to-slate-500' : 'from-orange-400 to-amber-500')) . ' rounded-xl font-bold text-white text-lg shadow-lg' : 'bg-gray-300 rounded-xl font-bold text-gray-700 text-lg' }} rounded-xl font-bold text-white text-lg shadow-lg">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex-1">
                            <p class="text-sm {{ $index < 3 ? 'font-bold' : 'font-semibold' }} text-gray-900">{{ $item['name'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">Kategori: {{ $item['category'] }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">{{ $item['count'] }}</p>
                            <p class="text-xs text-gray-500">unit</p>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Default top items -->
                    <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-yellow-50 to-amber-50 rounded-xl border-2 border-yellow-200">
                        <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-xl font-bold text-white text-lg shadow-lg">
                            1
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-gray-900">Laptop Dell Latitude 5420</p>
                            <p class="text-xs text-gray-500 mt-1">Kategori: Tidak Habis Pakai</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">45</p>
                            <p class="text-xs text-gray-500">unit</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-gray-50 to-slate-50 rounded-xl border-2 border-gray-200">
                        <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-gray-400 to-slate-500 rounded-xl font-bold text-white text-lg shadow-lg">
                            2
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-gray-900">Proyektor Epson EB-X05</p>
                            <p class="text-xs text-gray-500 mt-1">Kategori: Tidak Habis Pakai</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">32</p>
                            <p class="text-xs text-gray-500">unit</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-orange-50 to-amber-50 rounded-xl border-2 border-orange-200">
                        <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-orange-400 to-amber-500 rounded-xl font-bold text-white text-lg shadow-lg">
                            3
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-gray-900">Meja Kerja Kayu Jati</p>
                            <p class="text-xs text-gray-500 mt-1">Kategori: Aset Tetap</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">28</p>
                            <p class="text-xs text-gray-500">unit</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <div class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-xl font-bold text-gray-700 text-lg">
                            4
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">AC Split 1 PK</p>
                            <p class="text-xs text-gray-500 mt-1">Kategori: Tidak Habis Pakai</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">24</p>
                            <p class="text-xs text-gray-500">unit</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <div class="flex items-center justify-center w-10 h-10 bg-gray-300 rounded-xl font-bold text-gray-700 text-lg">
                            5
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Kursi Kantor Ergonomis</p>
                            <p class="text-xs text-gray-500 mt-1">Kategori: Tidak Habis Pakai</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-900">22</p>
                            <p class="text-xs text-gray-500">unit</p>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>

    <!-- Room Distribution -->
    <div class="bg-white/50 backdrop-blur-sm rounded-2xl shadow-xl p-6 animate-fade-in" style="animation-delay: 1.2s;">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Distribusi Ruangan</h3>
                <p class="text-sm text-gray-500 mt-1">Inventaris berdasarkan lokasi</p>
            </div>
            <a href="{{ route('rooms.index') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Kelola Ruangan</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @isset($rooms)
                @foreach($rooms as $room)
                <div class="p-4 bg-gradient-to-br {{ $room['gradient'] ?? 'from-blue-50 to-sky-50' }} rounded-xl border {{ $room['border'] ?? 'border-blue-200' }} hover:shadow-lg transition-all duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <div class="p-2 {{ $room['icon_bg'] ?? 'bg-blue-100' }} rounded-lg">
                            <svg class="w-5 h-5 {{ $room['icon_color'] ?? 'text-blue-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                {!! $room['icon'] !!}
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-900">{{ $room['count'] }}</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-900">{{ $room['name'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $room['description'] }}</p>
                </div>
                @endforeach
            @else
                <!-- Default rooms -->
                <div class="p-4 bg-gradient-to-br from-blue-50 to-sky-50 rounded-xl border border-blue-200 hover:shadow-lg transition-all duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-900">125</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-900">Ruang Kelas</p>
                    <p class="text-xs text-gray-500 mt-1">15 ruangan aktif</p>
                </div>

                <div class="p-4 bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl border border-purple-200 hover:shadow-lg transition-all duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-900">85</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-900">Lab Komputer</p>
                    <p class="text-xs text-gray-500 mt-1">5 lab tersedia</p>
                </div>

                <div class="p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-200 hover:shadow-lg transition-all duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14 16a2 2 0 002-2v-4a2 2 0 00-2-2h-1.67L10 12.55 7.67 8H6a2 2 0 00-2 2v4a2 2 0 002 2h8z"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-900">45</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-900">Ruang Meeting</p>
                    <p class="text-xs text-gray-500 mt-1">8 ruang meeting</p>
                </div>

                <div class="p-4 bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl border border-amber-200 hover:shadow-lg transition-all duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <div class="p-2 bg-amber-100 rounded-lg">
                            <svg class="w-5 h-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 10-2 0v1H8a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-900">32</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-900">Kantor Admin</p>
                    <p class="text-xs text-gray-500 mt-1">12 ruang kantor</p>
                </div>
            @endisset
        </div>
    </div>

    <!-- PERBAIKAN: Modal untuk Import -->
    <div id="importModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Import Data Inventaris</h3>
                    <button onclick="closeImportModal()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div class="p-4 bg-blue-50 rounded-xl border border-blue-200">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-blue-900">Format yang didukung:</p>
                                <p class="text-xs text-blue-700 mt-1">Excel (.xlsx, .xls) dan CSV (.csv)</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-gray-400 transition-colors">
                        <input type="file" id="importFile" accept=".xlsx,.xls,.csv" class="hidden" onchange="handleFileSelect(event)">
                        <label for="importFile" class="cursor-pointer">
                            <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            <p class="text-sm font-medium text-gray-900">Pilih file untuk diimport</p>
                            <p class="text-xs text-gray-500 mt-1">Atau drag & drop file di sini</p>
                        </label>
                    </div>
                    
                    <div id="selectedFileInfo" class="hidden p-3 bg-green-50 rounded-lg border border-green-200">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <p class="text-sm font-medium text-green-900" id="fileName"></p>
                        </div>
                    </div>
                    
                    <div class="flex gap-3 pt-4">
                        <button onclick="closeImportModal()" class="flex-1 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                            Batal
                        </button>
                        <button onclick="startImport()" id="importBtn" class="flex-1 px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            Import Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Animations */
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

        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
            50% { box-shadow: 0 0 0 6px rgba(239, 68, 68, 0); }
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

        .pulse-notification {
            animation: pulseGlow 2s infinite;
        }

        /* Chart filter active state */
        .chart-filter-btn.active {
            background-color: rgb(129 140 248);
            color: white;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Global variables
        let conditionChart = null;
        let chartData = {
            today: [1089, 125, 36],
            week: [1050, 140, 40],
            month: [1100, 120, 30]
        };

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
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        }

        // Progress Bar Animation
        function animateProgressBar(element) {
            const targetWidth = parseInt(element.getAttribute('data-width'));
            let currentWidth = 0;
            const increment = targetWidth / 50;
            
            const timer = setInterval(() => {
                currentWidth += increment;
                if (currentWidth >= targetWidth) {
                    element.style.width = targetWidth + '%';
                    clearInterval(timer);
                } else {
                    element.style.width = currentWidth + '%';
                }
            }, 20);
        }

        // PERBAIKAN: Function Import Modal yang hilang
        function openImportModal() {
            const modal = document.getElementById('importModal');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeImportModal() {
            const modal = document.getElementById('importModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
            
            // Reset form
            document.getElementById('importFile').value = '';
            document.getElementById('selectedFileInfo').classList.add('hidden');
            document.getElementById('importBtn').disabled = true;
        }

        function handleFileSelect(event) {
            const file = event.target.files[0];
            if (file) {
                const fileName = file.name;
                const fileInfo = document.getElementById('selectedFileInfo');
                const fileNameElement = document.getElementById('fileName');
                const importBtn = document.getElementById('importBtn');
                
                fileNameElement.textContent = fileName;
                fileInfo.classList.remove('hidden');
                importBtn.disabled = false;
            }
        }

        function startImport() {
            const fileInput = document.getElementById('importFile');
            const file = fileInput.files[0];
            
            if (!file) {
                showToast('Silakan pilih file terlebih dahulu', 'warning');
                return;
            }

            // Show loading state
            const importBtn = document.getElementById('importBtn');
            importBtn.textContent = 'Mengimport...';
            importBtn.disabled = true;

            // Simulate import process (replace with actual import logic)
            setTimeout(() => {
                showToast('Data berhasil diimport!', 'success');
                closeImportModal();
                
                // Refresh dashboard data
                refreshDashboard();
            }, 2000);
        }

        // Chart filter function
        function filterChart(period) {
            // Update active button
            document.querySelectorAll('.chart-filter-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-indigo-100', 'text-indigo-700');
                btn.classList.add('text-gray-600', 'hover:bg-gray-100');
            });
            
            const activeBtn = document.querySelector(`[data-filter="${period}"]`);
            activeBtn.classList.add('active', 'bg-indigo-100', 'text-indigo-700');
            activeBtn.classList.remove('text-gray-600', 'hover:bg-gray-100');

            // Update chart data
            if (conditionChart) {
                const newData = chartData[period];
                conditionChart.data.datasets[0].data = newData;
                conditionChart.update('active');
                
                // Update legend
                const total = newData.reduce((a, b) => a + b, 0);
                const percentages = newData.map(value => Math.round((value / total) * 100));
                
                const legendItems = document.querySelectorAll('.grid.grid-cols-3 .text-sm.font-bold.text-gray-900');
                legendItems[0].textContent = percentages[0] + '%';
                legendItems[1].textContent = percentages[1] + '%';
                legendItems[2].textContent = percentages[2] + '%';
            }
        }

        // Initialize animations on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Animate counters
            document.querySelectorAll('.counter').forEach(counter => {
                animateCounter(counter);
            });

            // Animate progress bars
            setTimeout(() => {
                document.querySelectorAll('.progress-bar').forEach(bar => {
                    animateProgressBar(bar);
                });
            }, 500);

            // Initialize Chart
            initializeChart();

            // Set default chart filter
            filterChart('today');
        });

        // Chart Initialization
        function initializeChart() {
            const ctx = document.getElementById('conditionChart');
            if (!ctx) {
                console.warn('Chart canvas not found');
                return;
            }

            try {
                conditionChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Baik', 'Rusak Ringan', 'Rusak Berat'],
                        datasets: [{
                            data: chartData.today,
                            backgroundColor: [
                                'rgba(34, 197, 94, 0.8)',
                                'rgba(234, 179, 8, 0.8)',
                                'rgba(239, 68, 68, 0.8)'
                            ],
                            borderColor: [
                                'rgba(34, 197, 94, 1)',
                                'rgba(234, 179, 8, 1)',
                                'rgba(239, 68, 68, 1)'
                            ],
                            borderWidth: 2,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 13
                                },
                                cornerRadius: 8,
                                displayColors: true,
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label += context.parsed + ' items';
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((context.parsed / total) * 100).toFixed(1);
                                        label += ' (' + percentage + '%)';
                                        return label;
                                    }
                                }
                            }
                        },
                        cutout: '70%',
                        animation: {
                            animateRotate: true,
                            animateScale: true,
                            duration: 2000,
                            easing: 'easeInOutQuart'
                        }
                    }
                });
            } catch (error) {
                console.error('Error initializing chart:', error);
            }
        }

        // Toast Notification Function
        function showToast(message, type = 'success') {
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

            // Create toast container if not exists
            let container = document.getElementById('toast-container');
            if (!container) {
                container = document.createElement('div');
                container.id = 'toast-container';
                container.className = 'fixed top-4 right-4 z-[100] space-y-2';
                document.body.appendChild(container);
            }

            const toast = document.createElement('div');
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

        // Quick stats update function
        function updateStats(stats) {
            if (stats.total !== undefined) {
                const totalCounter = document.querySelector('.counter[data-target]');
                if (totalCounter) {
                    totalCounter.setAttribute('data-target', stats.total);
                    animateCounter(totalCounter);
                }
            }
            // Add more stat updates as needed
        }

        // Refresh data function
        function refreshDashboard() {
            showToast('Memperbarui data dashboard...', 'info');
            
            // Simulate data refresh (replace with actual AJAX call)
            setTimeout(() => {
                showToast('Dashboard berhasil diperbarui!', 'success');
                
                // Restart animations
                document.querySelectorAll('.counter').forEach(counter => {
                    counter.textContent = '0';
                    animateCounter(counter);
                });
                
                document.querySelectorAll('.progress-bar').forEach(bar => {
                    bar.style.width = '0%';
                    animateProgressBar(bar);
                });
            }, 1500);
        }

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + K for quick search
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                document.querySelector('input[placeholder*="Cari"]')?.focus();
            }
            
            // Ctrl/Cmd + R for refresh
            if ((e.ctrlKey || e.metaKey) && e.key === 'r') {
                e.preventDefault();
                refreshDashboard();
            }

            // Escape to close modal
            if (e.key === 'Escape') {
                closeImportModal();
            }
        });

        // Show welcome message on first load
        if (sessionStorage.getItem('dashboardVisited') !== 'true') {
            setTimeout(() => {
                showToast('Selamat datang di Dashboard Inventaris! 👋', 'success');
                sessionStorage.setItem('dashboardVisited', 'true');
            }, 1000);
        }

        // Auto refresh every 5 minutes (optional)
        // setInterval(refreshDashboard, 300000);

        // Drag and drop functionality for import modal
        const importModal = document.getElementById('importModal');
        const fileInput = document.getElementById('importFile');

        if (importModal && fileInput) {
            // Prevent default drag behaviors
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                importModal.addEventListener(eventName, preventDefaults, false);
                document.body.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            // Handle dropped files
            importModal.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files.length > 0) {
                    fileInput.files = files;
                    handleFileSelect({ target: { files: files } });
                }
            }
        }
    </script>
@endsection