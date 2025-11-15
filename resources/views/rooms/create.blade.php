@extends('dashboard')

@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Ruangan Baru') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-4">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-3 md:mb-0">
                        <!-- Page Title -->
                        <div class="mb-2">
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight">
                                Tambah Ruangan Baru
                            </h1>
                            <p class="mt-1 text-sm text-gray-600 max-w-3xl">
                                Lengkapi informasi ruangan baru untuk ditambahkan ke dalam sistem manajemen ruangan.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex space-x-3">
                        <a href="{{ route('rooms.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg font-medium text-sm text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200 shadow-sm hover:shadow-md">
                            <i class="fas fa-arrow-left mr-2 text-sm"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                <!-- Form Section -->
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                        <!-- Form Header -->
                        <div class="px-5 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="bg-white bg-opacity-20 p-2 rounded-lg mr-3">
                                        <i class="fas fa-plus-circle text-base"></i>
                                    </div>
                                    <div>
                                        <h2 class="text-lg font-bold">Form Tambah Ruangan</h2>
                                        <p class="text-blue-100 text-xs mt-0.5">Isi semua informasi yang diperlukan dengan benar</p>
                                    </div>
                                </div>
                                <div class="hidden sm:block bg-white bg-opacity-20 px-3 py-1 rounded-full">
                                    <span class="text-xs font-medium">Wajib Diisi <span class="text-red-300">*</span></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Content -->
                        <div class="p-5">
                            <form action="{{ route('rooms.store') }}" method="POST" class="space-y-5" id="roomForm">
                                @csrf
                                
                                <!-- Nama Ruangan Field -->
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <label for="nama_ruangan" class="block text-sm font-semibold text-gray-800">
                                            Nama Ruangan <span class="text-red-500">*</span>
                                        </label>
                                        <span class="text-xs text-gray-500" id="charCounter">0/100</span>
                                    </div>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-door-open text-gray-400 text-sm"></i>
                                        </div>
                                        <input 
                                            type="text" 
                                            name="nama_ruangan" 
                                            id="nama_ruangan" 
                                            value="{{ old('nama_ruangan') }}" 
                                            required
                                            maxlength="100"
                                            class="w-full pl-10 pr-3 py-2.5 text-sm border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200 @error('nama_ruangan') border-red-500 @enderror"
                                            placeholder="Contoh: Ruang Rapat Utama Lantai 5"
                                            autofocus
                                        >
                                    </div>
                                    @error('nama_ruangan')
                                        <div class="flex items-center p-2.5 text-red-700 bg-red-50 rounded-lg border border-red-200">
                                            <i class="fas fa-exclamation-circle mr-2 text-sm"></i>
                                            <span class="font-medium text-xs">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <p class="text-gray-500 text-xs flex items-start">
                                        <i class="fas fa-info-circle text-blue-500 mr-1.5 mt-0.5 text-xs"></i>
                                        Berikan nama yang jelas dan mudah dikenali oleh semua pengguna
                                    </p>
                                </div>
                                
                                <!-- Lokasi Field -->
                                <div class="space-y-2">
                                    <label for="lokasi" class="block text-sm font-semibold text-gray-800">
                                        Lokasi Detail
                                        <span class="text-xs font-normal text-gray-500 ml-1">(Opsional)</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-map-marker-alt text-gray-400 text-sm"></i>
                                        </div>
                                        <input 
                                            type="text" 
                                            name="lokasi" 
                                            id="lokasi" 
                                            value="{{ old('lokasi') }}" 
                                            class="w-full pl-10 pr-3 py-2.5 text-sm border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200 @error('lokasi') border-red-500 @enderror"
                                            placeholder="Contoh: Gedung A, Lantai 3, Sayap Timur"
                                        >
                                    </div>
                                    @error('lokasi')
                                        <div class="flex items-center p-2.5 text-red-700 bg-red-50 rounded-lg border border-red-200">
                                            <i class="fas fa-exclamation-circle mr-2 text-sm"></i>
                                            <span class="font-medium text-xs">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <p class="text-gray-500 text-xs flex items-start">
                                        <i class="fas fa-info-circle text-blue-500 mr-1.5 mt-0.5 text-xs"></i>
                                        Informasi lokasi membantu pengguna menemukan ruangan dengan mudah
                                    </p>
                                </div>
                                
                                <!-- Unit Field -->
                                <div class="space-y-2">
                                    <label for="unit_id" class="block text-sm font-semibold text-gray-800">
                                        Unit Kerja / Fakultas <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-university text-gray-400 text-sm"></i>
                                        </div>
                                        <select 
                                            name="unit_id" 
                                            id="unit_id" 
                                            required
                                            class="w-full pl-10 pr-8 py-2.5 text-sm border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-200 appearance-none @error('unit_id') border-red-500 @enderror"
                                        >
                                            <option value="">-- Pilih Unit Kerja --</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                                                    {{ $unit->nama_unit }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                                        </div>
                                    </div>
                                    @error('unit_id')
                                        <div class="flex items-center p-2.5 text-red-700 bg-red-50 rounded-lg border border-red-200">
                                            <i class="fas fa-exclamation-circle mr-2 text-sm"></i>
                                            <span class="font-medium text-xs">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <p class="text-gray-500 text-xs flex items-start">
                                        <i class="fas fa-info-circle text-blue-500 mr-1.5 mt-0.5 text-xs"></i>
                                        Pilih unit atau fakultas yang akan menaungi ruangan ini
                                    </p>
                                </div>
                                
                                <!-- Status Information -->
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-4 border border-blue-200">
                                    <h3 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                        <i class="fas fa-info-circle text-blue-600 mr-2 text-sm"></i>
                                        Informasi Status
                                    </h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5 text-gray-700">
                                        <div class="flex items-center">
                                            <div class="bg-blue-100 p-1.5 rounded-lg mr-2.5">
                                                <i class="fas fa-check text-blue-600 text-xs"></i>
                                            </div>
                                            <span class="text-xs">Ruangan akan langsung aktif setelah dibuat</span>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="bg-blue-100 p-1.5 rounded-lg mr-2.5">
                                                <i class="fas fa-check text-blue-600 text-xs"></i>
                                            </div>
                                            <span class="text-xs">Dapat diakses oleh semua pengguna terdaftar</span>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="bg-blue-100 p-1.5 rounded-lg mr-2.5">
                                                <i class="fas fa-check text-blue-600 text-xs"></i>
                                            </div>
                                            <span class="text-xs">Informasi dapat diedit kapan saja</span>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="bg-blue-100 p-1.5 rounded-lg mr-2.5">
                                                <i class="fas fa-check text-blue-600 text-xs"></i>
                                            </div>
                                            <span class="text-xs">Status tersedia secara default</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Form Actions -->
                                <div class="pt-4 border-t border-gray-200">
                                    <div class="flex flex-col sm:flex-row gap-3 justify-end">
                                        <button 
                                            type="submit"
                                            class="inline-flex items-center justify-center px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-700 border border-transparent rounded-lg text-white font-bold text-sm hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-4 focus:ring-blue-200 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                                            id="submitBtn"
                                        >
                                            <i class="fas fa-plus-circle mr-2 text-sm"></i>
                                            Tambah Ruangan
                                        </button>
                                        
                                        <a href="{{ route('rooms.index') }}" 
                                           class="inline-flex items-center justify-center px-6 py-2.5 border-2 border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-200 transition-all duration-200 font-bold text-sm hover:border-gray-400">
                                            <i class="fas fa-times mr-2 text-sm"></i>
                                            Batal
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar Section -->
                <div class="lg:col-span-1 space-y-4">
                    <!-- Quick Stats -->
                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-4">
                        <h3 class="text-sm font-bold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-chart-bar text-blue-600 mr-2 text-sm"></i>
                            Statistik Ruangan
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                                <div>
                                    <p class="text-xs text-gray-600">Total Ruangan</p>
                                    <p class="text-xl font-bold text-gray-900">{{ $totalRooms ?? '0' }}</p>
                                </div>
                                <div class="bg-blue-100 p-2 rounded-lg">
                                    <i class="fas fa-building text-blue-600 text-base"></i>
                                </div>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                                <div>
                                    <p class="text-xs text-gray-600">Tersedia</p>
                                    <p class="text-xl font-bold text-gray-900">{{ $availableRooms ?? '0' }}</p>
                                </div>
                                <div class="bg-green-100 p-2 rounded-lg">
                                    <i class="fas fa-check-circle text-green-600 text-base"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Guidelines -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl shadow-lg border border-blue-200 p-4">
                        <h3 class="text-sm font-bold text-gray-900 mb-3 flex items-center">
                            <i class="fas fa-lightbulb text-yellow-500 mr-2 text-sm"></i>
                            Panduan Penamaan
                        </h3>
                        <ul class="space-y-2 text-xs text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                                <span>Gunakan nama yang deskriptif dan mudah diingat</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                                <span>Sertakan nomor lantai dan gedung</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                                <span>Hindari singkatan yang tidak umum</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                                <span>Konsisten dengan pola penamaan yang ada</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Next Steps -->
                    <div class="bg-gradient-to-r from-slate-800 to-gray-900 rounded-xl shadow-lg p-4 text-white">
                        <h3 class="text-sm font-bold mb-3 flex items-center">
                            <i class="fas fa-tasks text-blue-400 mr-2 text-sm"></i>
                            Langkah Selanjutnya
                        </h3>
                        <div class="space-y-2.5">
                            <div class="flex items-center">
                                <div class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-3">1</div>
                                <span class="text-xs">Atur jadwal penggunaan</span>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-3">2</div>
                                <span class="text-xs">Tambahkan fasilitas</span>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-blue-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold mr-3">3</div>
                                <span class="text-xs">Tetapkan penanggung jawab</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-700 text-center">
                            <p class="text-xs text-gray-400">Room Management System v2.1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    body {
        font-family: 'Inter', sans-serif;
    }
    
    input:focus, select:focus {
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        outline: none;
    }
    
    .transition-all {
        transition: all 0.3s ease;
    }
    
    .hover-lift:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px -5px rgba(0, 0, 0, 0.1), 0 8px 8px -5px rgba(0, 0, 0, 0.04);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-focus on first input
        const firstInput = document.getElementById('nama_ruangan');
        if (firstInput) {
            firstInput.focus();
        }
        
        // Character counter for nama_ruangan
        const namaRuanganInput = document.getElementById('nama_ruangan');
        const charCounter = document.getElementById('charCounter');
        
        if (namaRuanganInput && charCounter) {
            namaRuanganInput.addEventListener('input', function() {
                const count = this.value.length;
                charCounter.textContent = `${count}/100`;
                
                if (count > 80) {
                    charCounter.classList.add('text-orange-500');
                    charCounter.classList.remove('text-gray-500');
                } else {
                    charCounter.classList.remove('text-orange-500');
                    charCounter.classList.add('text-gray-500');
                }
            });
            
            // Initial count
            namaRuanganInput.dispatchEvent(new Event('input'));
        }
        
        // Real-time validation
        const requiredFields = document.querySelectorAll('input[required], select[required]');
        requiredFields.forEach(field => {
            field.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.classList.remove('border-red-500');
                    this.classList.add('border-green-500');
                } else {
                    this.classList.remove('border-green-500');
                    this.classList.add('border-red-500');
                }
            });
            
            // Initial check
            if (field.value.trim() !== '') {
                field.classList.add('border-green-500');
            }
        });
        
        // Form submission handling
        const form = document.getElementById('roomForm');
        const submitBtn = document.getElementById('submitBtn');
        
        if (form && submitBtn) {
            form.addEventListener('submit', function(e) {
                // Change button state
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Menyimpan...';
                submitBtn.disabled = true;
                submitBtn.classList.remove('hover:from-blue-700', 'hover:to-indigo-800', 'hover:shadow-xl', 'transform', 'hover:-translate-y-0.5');
            });
        }
        
        // Add hover effects to cards
        const cards = document.querySelectorAll('.bg-white');
        cards.forEach(card => {
            card.classList.add('transition-all', 'duration-300', 'hover-lift');
        });
    });
</script>
@endpush
@endsection
