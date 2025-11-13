@extends("dashboard")

@section("content")
<div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <!-- Header Section dengan Enhanced Design -->
    <div class="mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-4 md:mb-0">
                <h1 class="text-2xl lg:text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-2">
                    Manajemen Pengguna
                </h1>
                <p class="text-sm text-gray-600 max-w-2xl">
                    Kelola semua akun pengguna dan akses sistem inventaris kampus
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('users.create') }}" class="group inline-flex items-center gap-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-2.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Tambah Pengguna Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Success Message dengan Enhanced Design -->
    @if (session("success"))
    <div class="rounded-xl bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 p-4 mb-6 animate-fade-in shadow-lg">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="bg-gradient-to-br from-green-500 to-emerald-500 text-white p-2 rounded-xl shadow-sm">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-bold text-green-800">{{ session("success") }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Stats Cards dengan Enhanced Design -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Total Pengguna -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-gray-200/50 p-4 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-500 mb-1">Total Pengguna</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $users->total() }}</p>
                    <p class="text-xs text-gray-400 mt-1">Semua pengguna terdaftar</p>
                </div>
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-3 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 5a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Admin -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-gray-200/50 p-4 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-500 mb-1">Administrator</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $adminCount ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-1">Akses penuh sistem</p>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-3 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- User Aktif -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-gray-200/50 p-4 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-500 mb-1">User Aktif</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $activeUsers ?? $users->count() }}</p>
                    <p class="text-xs text-gray-400 mt-1">Terverifikasi & aktif</p>
                </div>
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-3 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Bergabung Bulan Ini -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-gray-200/50 p-4 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-500 mb-1">Bergabung Bulan Ini</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $newUsersThisMonth ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-1">Pengguna baru</p>
                </div>
                <div class="bg-gradient-to-br from-amber-500 to-amber-600 text-white p-3 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section dengan Enhanced Design -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-gray-200/50 p-4 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex-1">
                <div class="relative max-w-md">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        placeholder="Cari pengguna berdasarkan nama atau email..." 
                        class="block w-full rounded-xl border-0 bg-gray-50/50 pl-9 pr-3 py-2.5 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-200 text-sm"
                    >
                </div>
            </div>
            <div class="flex gap-3">
                <select class="rounded-xl border-0 bg-gray-50/50 py-2.5 pl-3 pr-8 text-sm shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-200">
                    <option>Semua Role</option>
                    <option>Administrator</option>
                    <option>Manager</option>
                    <option>Staff</option>
                    <option>User</option>
                </select>
                <select class="rounded-xl border-0 bg-gray-50/50 py-2.5 pl-3 pr-8 text-sm shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-200">
                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Non-aktif</option>
                </select>
                <button class="rounded-xl bg-gradient-to-r from-gray-600 to-slate-700 px-4 py-2.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                    Terapkan Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Users Table dengan Enhanced Design -->
    <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-lg border border-gray-200/50 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-slate-50 px-5 py-4 border-b border-gray-200/50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Daftar Pengguna</h3>
                    <p class="text-xs text-gray-600 mt-1">Semua pengguna terdaftar dalam sistem inventaris</p>
                </div>
                <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2.5 py-1 rounded-full border border-blue-200">
                    {{ $users->total() }} Pengguna
                </span>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200/50">
                <thead class="bg-gray-50/80">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Pengguna</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Role</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Status</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Bergabung</th>
                        <th scope="col" class="relative px-4 py-3">
                            <span class="sr-only">Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white/50 divide-y divide-gray-200/30">
                    @forelse ($users as $user)
                    <tr class="hover:bg-gray-50/80 transition-all duration-200 group">
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-full h-10 w-10 flex items-center justify-center text-white font-bold text-sm shadow-sm group-hover:shadow-md transition-shadow duration-200">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-gray-900 group-hover:text-gray-700 transition-colors">{{ $user->name }}</div>
                                    <div class="text-xs text-gray-500 group-hover:text-gray-600 transition-colors">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            @php
                                $roleColors = [
                                    "admin" => "from-red-100 to-red-200 text-red-800 border-red-200",
                                    "manager" => "from-purple-100 to-purple-200 text-purple-800 border-purple-200",
                                    "staff" => "from-blue-100 to-blue-200 text-blue-800 border-blue-200",
                                    "user" => "from-gray-100 to-gray-200 text-gray-800 border-gray-200"
                                ];
                                $roleColor = $roleColors[$user->role ?? "user"] ?? $roleColors["user"];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-gradient-to-r {{ $roleColor }} border shadow-sm capitalize">
                                {{ $user->role ?? "user" }}
                            </span>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            @if($user->email_verified_at)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200 shadow-sm">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Terverifikasi
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-yellow-100 to-amber-100 text-yellow-800 border border-yellow-200 shadow-sm">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Menunggu Verifikasi
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="text-sm font-bold text-gray-900 group-hover:text-gray-700 transition-colors">
                                {{ $user->created_at ? $user->created_at->format("d M Y") : "N/A" }}
                            </div>
                            <div class="text-xs text-gray-500 group-hover:text-gray-600 transition-colors">
                                {{ $user->created_at ? $user->created_at->diffForHumans() : "N/A" }}
                            </div>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2.5 opacity-70 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-200 group/action" title="Lihat Detail">
                                    <div class="flex items-center gap-2 bg-blue-50 hover:bg-blue-100 px-2.5 py-1.5 rounded-lg border border-blue-200 transition-all duration-200">
                                        <svg class="w-3.5 h-3.5 group-hover/action:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <span class="text-xs font-bold">Detail</span>
                                    </div>
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}" class="text-amber-600 hover:text-amber-800 transition-colors duration-200 group/action" title="Edit">
                                    <div class="flex items-center gap-2 bg-amber-50 hover:bg-amber-100 px-2.5 py-1.5 rounded-lg border border-amber-200 transition-all duration-200">
                                        <svg class="w-3.5 h-3.5 group-hover/action:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        <span class="text-xs font-bold">Edit</span>
                                    </div>
                                </a>
                                @if($user->id !== Auth::id())
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-200 group/action" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini? Tindakan ini tidak dapat dibatalkan.')">
                                        <div class="flex items-center gap-2 bg-red-50 hover:bg-red-100 px-2.5 py-1.5 rounded-lg border border-red-200 transition-all duration-200">
                                            <svg class="w-3.5 h-3.5 group-hover/action:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            <span class="text-xs font-bold">Hapus</span>
                                        </div>
                                    </button>
                                </form>
                                @else
                                <span class="text-gray-400 cursor-not-allowed group/action" title="Tidak dapat menghapus akun sendiri">
                                    <div class="flex items-center gap-2 bg-gray-50 px-2.5 py-1.5 rounded-lg border border-gray-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        <span class="text-xs font-bold text-gray-400">Hapus</span>
                                    </div>
                                </span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="bg-gradient-to-br from-gray-100 to-gray-200 text-gray-400 p-6 rounded-xl mb-4 shadow-sm">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 5a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada pengguna</h3>
                                <p class="text-gray-500 mb-6 max-w-md text-sm">Mulai dengan menambahkan pengguna pertama untuk mengelola sistem inventaris</p>
                                <a href="{{ route('users.create') }}" class="group inline-flex items-center gap-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-2.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Tambah Pengguna Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination dengan Enhanced Design -->
        @if($users->hasPages())
        <div class="bg-gray-50/80 px-5 py-4 border-t border-gray-200/50">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-600 bg-white/50 backdrop-blur-sm rounded-lg px-3 py-2 shadow-sm">
                    Menampilkan 
                    <span class="font-bold text-gray-900">{{ $users->firstItem() }}</span>
                    sampai
                    <span class="font-bold text-gray-900">{{ $users->lastItem() }}</span>
                    dari
                    <span class="font-bold text-gray-900">{{ $users->total() }}</span>
                    pengguna
                </div>
                <div class="flex justify-end">
                    {{ $users->links() }}
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
    gap: 0.25rem;
}

.pagination .page-item .page-link {
    padding: 0.5rem 0.75rem;
    border-radius: 0.5rem;
    border: 1px solid #e5e7eb;
    background: white;
    color: #374151;
    font-weight: 600;
    transition: all 0.2s;
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
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