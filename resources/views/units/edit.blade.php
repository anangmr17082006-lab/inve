@extends('dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-4 md:mb-0">
                <div class="flex items-center gap-3 mb-2">
                    <a href="{{ route('units.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-200 font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Daftar Unit
                    </a>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Unit: {{ $unit->nama_unit }}</h1>
                <p class="text-gray-600">Perbarui informasi unit organisasi</p>
            </div>
            <div class="flex items-center gap-2 bg-blue-50 text-blue-700 px-4 py-3 rounded-lg">
                <i class="fas fa-info-circle"></i>
                <span class="text-sm font-medium">Perbarui informasi unit dengan data yang valid</span>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('error'))
    <div class="rounded-xl bg-red-50 border border-red-200 p-4 mb-6 animate-fade-in">
        <div class="flex items-start">
            <div class="flex-shrink-0 pt-0.5">
                <i class="fas fa-exclamation-circle text-red-500"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
            </div>
            <button type="button" class="ml-auto text-red-500 hover:text-red-700" onclick="this.parentElement.parentElement.style.display='none'">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    @if(session('success'))
    <div class="rounded-xl bg-green-50 border border-green-200 p-4 mb-6 animate-fade-in">
        <div class="flex items-start">
            <div class="flex-shrink-0 pt-0.5">
                <i class="fas fa-check-circle text-green-500"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
            </div>
            <button type="button" class="ml-auto text-green-500 hover:text-green-700" onclick="this.parentElement.parentElement.style.display='none'">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    @endif

    <!-- Form Section -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-5">
            <div class="flex items-center">
                <div class="bg-white/20 p-2 rounded-lg mr-3">
                    <i class="fas fa-building text-white"></i>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-white">Form Edit Unit</h2>
                    <p class="text-blue-100 mt-1">Perbarui informasi unit organisasi</p>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-6">
            <form action="{{ route('units.update', $unit->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Informasi Unit Section -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Unit</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Unit -->
                        <div class="md:col-span-2">
                            <label for="nama_unit" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-tag mr-1"></i>
                                Nama Unit <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-building text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    name="nama_unit" 
                                    id="nama_unit" 
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('nama_unit') border-red-300 @enderror" 
                                    value="{{ old('nama_unit', $unit->nama_unit) }}" 
                                    required
                                    placeholder="Masukkan nama unit organisasi"
                                >
                                @error('nama_unit')
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <i class="fas fa-exclamation-circle text-red-500"></i>
                                    </div>
                                @enderror
                            </div>
                            @error('nama_unit')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500">
                                <i class="fas fa-lightbulb mr-1"></i>
                                Contoh: Fakultas Teknik, Bagian Umum, Laboratorium Komputer, dll.
                            </p>
                        </div>

                        <!-- Kode Unit (Optional) -->
                        <div>
                            <label for="kode_unit" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-code mr-1"></i>
                                Kode Unit
                                <span class="text-xs text-gray-500 font-normal">(opsional)</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-hashtag text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    name="kode_unit" 
                                    id="kode_unit" 
                                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" 
                                    value="{{ old('kode_unit', $unit->kode_unit ?? '') }}" 
                                    placeholder="Contoh: FT, BU, LAB"
                                >
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Kode singkatan untuk unit organisasi</p>
                        </div>

                        <!-- Status Unit -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-toggle-on mr-1"></i>
                                Status Unit
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-circle text-gray-400"></i>
                                </div>
                                <select 
                                    name="status" 
                                    id="status" 
                                    class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 appearance-none bg-white"
                                >
                                    <option value="active" {{ ($unit->status ?? 'active') === 'active' ? 'selected' : '' }}>Aktif</option>
                                    <option value="inactive" {{ ($unit->status ?? 'active') === 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Status keaktifan unit organisasi</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Tambahan Section -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="bg-purple-100 text-purple-600 p-2 rounded-lg mr-3">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Tambahan</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Deskripsi Unit -->
                        <div class="md:col-span-2">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-align-left mr-1"></i>
                                Deskripsi Unit
                                <span class="text-xs text-gray-500 font-normal">(opsional)</span>
                            </label>
                            <textarea 
                                name="deskripsi" 
                                id="deskripsi" 
                                rows="4" 
                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none" 
                                placeholder="Masukkan deskripsi atau penjelasan tentang unit organisasi ini"
                            >{{ old('deskripsi', $unit->deskripsi ?? '') }}</textarea>
                            <p class="mt-2 text-sm text-gray-500">Deskripsi singkat tentang fungsi dan tanggung jawab unit</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col-reverse md:flex-row gap-3 md:justify-between items-center pt-8 border-t border-gray-200">
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-history mr-1"></i>
                        Terakhir diperbarui: {{ $unit->updated_at->format('d M Y H:i') }}
                    </div>
                    <div class="flex flex-col-reverse md:flex-row gap-3">
                        <a href="{{ route('units.index') }}" class="inline-flex justify-center items-center gap-2 rounded-lg bg-gray-100 hover:bg-gray-200 px-6 py-3 text-sm font-semibold text-gray-700 transition-colors duration-200 border border-gray-300">
                            <i class="fas fa-times"></i>
                            Batal
                        </a>
                        <button type="submit" class="inline-flex justify-center items-center gap-2 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                            <i class="fas fa-save"></i>
                            Perbarui Unit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.animate-fade-in {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Custom styling untuk select dropdown */
select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}
</style>

<script>
// Fungsi untuk menampilkan preview nama unit
document.addEventListener('DOMContentLoaded', function() {
    const namaUnitInput = document.getElementById('nama_unit');
    const previewElement = document.createElement('div');
    previewElement.className = 'mt-2 text-sm text-gray-600 bg-blue-50 p-3 rounded-lg hidden';
    previewElement.innerHTML = '<i class="fas fa-eye mr-1"></i> <strong>Preview:</strong> <span id="preview-text"></span>';
    namaUnitInput.parentNode.appendChild(previewElement);

    namaUnitInput.addEventListener('input', function() {
        const previewText = this.value || 'Nama unit akan ditampilkan di sini';
        document.getElementById('preview-text').textContent = previewText;
        previewElement.classList.remove('hidden');
    });

    // Trigger input event untuk menampilkan preview awal
    if (namaUnitInput.value) {
        namaUnitInput.dispatchEvent(new Event('input'));
    }
});
</script>
@endsection