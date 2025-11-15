@extends('dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8"> 
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h1 class="text-2xl lg:text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-3">
                Daftar Transaksi Inventaris
            </h1>
            <p class="text-base text-gray-600 max-w-3xl">
                Kelola semua transaksi masuk dan keluar inventaris perusahaan dalam satu platform terpusat
            </p>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
             <a href="{{ route('transactions.create') }}" class="group inline-flex items-center px-5 py-3 border border-transparent rounded-xl shadow-2xl text-sm font-bold text-white bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 hover:from-purple-700 hover:via-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-3xl">
                <svg class="-ml-1 mr-3 h-5 w-5 group-hover:scale-110 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Tambah Transaksi Baru
            </a>
        </div>
    </div>

    @if (session('success'))
     <div class="rounded-2xl bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 p-4 mb-6 shadow-lg animate-fade-in">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                 <div class="bg-gradient-to-br from-green-500 to-emerald-500 text-white p-2 rounded-xl shadow-sm">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="ml-4">
                 <p class="text-sm font-bold text-green-800">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">
         <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-5 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 mb-1">Total Transaksi</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $transactions->total() }}</p>
                </div>
                 <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-2.5 rounded-xl shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
        </div>

         <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-5 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 mb-1">Transaksi Masuk</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $transactions->where('jenis', 'masuk')->count() }}</p>
                </div>
                 <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-2.5 rounded-xl shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
            </div>
        </div>

         <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-5 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 mb-1">Transaksi Keluar</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $transactions->where('jenis', 'keluar')->count() }}</p>
                </div>
                 <div class="bg-gradient-to-br from-red-500 to-red-600 text-white p-2.5 rounded-xl shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                    </svg>
                </div>
            </div>
        </div>

         <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-5 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 mb-1">Bulan Ini</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $transactions->whereBetween('tanggal', [now()->startOfMonth(), now()->endOfMonth()])->count() }}</p>
                </div>
                 <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-2.5 rounded-xl shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-2xl border border-gray-200/50 overflow-hidden">
         <div class="px-6 py-4 border-b border-gray-200/50 bg-gradient-to-r from-slate-50 to-gray-50">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="mb-4 sm:mb-0">
                    <h3 class="text-lg font-bold text-gray-900">Semua Transaksi</h3>
                    <p class="text-sm text-gray-600 mt-1">Daftar lengkap transaksi inventaris perusahaan</p>
                </div>
                <div class="flex items-center space-x-3">
                     <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800 border border-blue-200 shadow-sm">
                        Total: {{ $transactions->total() }} transaksi
                    </span>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200/50">
                <thead class="bg-gradient-to-r from-slate-50/80 to-gray-50/80 backdrop-blur-sm">
                    <tr>
                         <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Inventaris</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Jenis</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Jumlah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Pengguna</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Keterangan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white/50 divide-y divide-gray-200/30">
                    @forelse ($transactions as $transaction)
                    <tr class="hover:bg-gradient-to-r hover:from-blue-50/80 hover:to-indigo-50/80 transition-all duration-200 group">
                         <td class="px-6 py-4 whitespace-nowrap">
                             <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-800 group-hover:bg-blue-200 group-hover:text-blue-800 transition-all duration-200 shadow-sm">
                                #{{ $transaction->id }}
                            </span>
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                 <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl flex items-center justify-center group-hover:from-purple-200 group-hover:to-blue-200 transition-all duration-200 shadow-sm">
                                    <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                                 <div class="ml-3">
                                     <div class="text-sm font-semibold text-gray-900 group-hover:text-blue-900 transition-colors">{{ $transaction->item->nama_barang ?? 'N/A' }}</div>
                                    <div class="text-sm text-gray-500 group-hover:text-blue-700 transition-colors font-mono">{{ $transaction->item->kode_inventaris ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                             @if($transaction->jenis === 'masuk')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200 group-hover:from-green-200 group-hover:to-emerald-200 transition-all duration-200 shadow-sm">
                                <svg class="-ml-0.5 mr-2 h-3 w-3 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                Masuk
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-red-100 to-rose-100 text-red-800 border border-red-200 group-hover:from-red-200 group-hover:to-rose-200 transition-all duration-200 shadow-sm">
                                <svg class="-ml-0.5 mr-2 h-3 w-3 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3" />
                                </svg>
                                Keluar
                            </span>
                            @endif
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                             <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-sm font-bold bg-gradient-to-r from-orange-100 to-amber-100 text-orange-800 border border-orange-200 group-hover:from-orange-200 group-hover:to-amber-200 transition-all duration-200 shadow-sm">
                                {{ $transaction->jumlah }}
                                <span class="ml-2 text-xs font-medium">unit</span>
                            </span>
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-bold text-gray-900 group-hover:text-blue-900 transition-colors">
                                {{ \Carbon\Carbon::parse($transaction->tanggal)->format('d M Y') }}
                            </div>
                            <div class="text-xs text-gray-500 group-hover:text-blue-700 transition-colors">
                                {{ \Carbon\Carbon::parse($transaction->tanggal)->format('H:i') }}
                            </div>
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                 <div class="flex-shrink-0 h-9 w-9 rounded-full bg-gradient-to-br from-cyan-500 to-blue-500 flex items-center justify-center shadow-sm group-hover:shadow-md transition-all duration-200">
                                    <span class="text-white text-sm font-bold">{{ substr($transaction->user->name ?? 'N/A', 0, 1) }}</span>
                                </div>
                                 <div class="ml-2">
                                    <div class="text-sm font-bold text-gray-900 group-hover:text-blue-900 transition-colors">{{ $transaction->user->name ?? 'N/A' }}</div>
                                    <div class="text-xs text-gray-500 group-hover:text-blue-700 transition-colors">{{ $transaction->user->email ?? '' }}</div>
                                </div>
                            </div>
                        </td>
                         <td class="px-6 py-4">
                            <div class="text-sm text-gray-600 max-w-xs group-hover:text-gray-800 transition-colors">
                                @if($transaction->keterangan)
                                <div class="truncate">{{ $transaction->keterangan }}</div>
                                @else
                                <span class="text-gray-400 italic">Tidak ada keterangan</span>
                                @endif
                            </div>
                        </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2 opacity-70 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('transactions.show', $transaction->id) }}" class="group/action text-blue-600 hover:text-blue-800 p-2 rounded-xl bg-blue-50 hover:bg-blue-100 transition-all duration-200 transform hover:scale-110 shadow-sm" title="Lihat Detail">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 group-hover/action:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span class="text-xs font-bold hidden lg:inline">Detail</span>
                                    </div>
                                </a>
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="group/action text-red-600 hover:text-red-800 p-2 rounded-xl bg-red-50 hover:bg-red-100 transition-all duration-200 transform hover:scale-110 shadow-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini? Tindakan ini tidak dapat dibatalkan.')">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 group-hover/action:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            <span class="text-xs font-bold hidden lg:inline">Hapus</span>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                         <td colspan="8" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                 <div class="bg-gradient-to-br from-gray-100 to-gray-200 text-gray-400 p-6 rounded-2xl mb-6 shadow-sm">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                 <h3 class="text-xl font-bold text-gray-900 mb-3">Tidak ada transaksi</h3>
                                 <p class="text-gray-500 mb-8 max-w-md text-base">Mulai dengan membuat transaksi inventaris baru untuk melacak pergerakan barang.</p>
                                 <a href="{{ route('transactions.create') }}" class="group inline-flex items-center px-6 py-3 border border-transparent rounded-2xl shadow-2xl text-sm font-bold text-white bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 hover:from-purple-700 hover:via-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:-translate-y-1">
                                    <svg class="-ml-1 mr-3 h-5 w-5 group-hover:scale-110 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Tambah Transaksi Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($transactions->hasPages())
         <div class="px-6 py-4 bg-gray-50/80 border-t border-gray-200/50">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                 <div class="text-sm text-gray-600 bg-white/50 backdrop-blur-sm rounded-lg px-3 py-2 shadow-sm">
                    Menampilkan 
                    <span class="font-bold text-gray-900">{{ $transactions->firstItem() }}</span> 
                    sampai 
                    <span class="font-bold text-gray-900">{{ $transactions->lastItem() }}</span> 
                    dari 
                    <span class="font-bold text-gray-900">{{ $transactions->total() }}</span> 
                    transaksi
                </div>
                <div class="flex space-x-2">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
.animate-fade-in {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { 
        opacity: 0; 
        transform: translateY(-10px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

/* Custom pagination styling */
.pagination {
    display: flex;
    gap: 0.5rem;
}

.pagination .page-item .page-link {
    padding: 0.75rem 1rem;
    border-radius: 0.75rem;
    border: 1px solid #e5e7eb;
    background: white;
    color: #374151;
    font-weight: 600;
    transition: all 0.2s;
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #7c3aed, #4f46e5);
    border-color: #4f46e5;
    color: white;
}

.pagination .page-item .page-link:hover {
    background: #f3f4f6;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}
</style>
@endsection