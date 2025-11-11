<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Inventaris') }} - @yield('title', 'Dasbor')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        
        /* Smooth scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    
    <div x-data="{ sidebarOpen: window.innerWidth >= 1024 }" class="flex h-screen overflow-hidden">

        {{-- Overlay untuk mobile --}}
        <div x-show="!sidebarOpen && window.innerWidth < 1024" 
             x-transition:enter="transition-opacity ease-linear duration-200"
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-200"
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 z-20 bg-black/50 lg:hidden"></div>

        {{-- Sidebar --}}
        <aside x-show="sidebarOpen" 
               x-transition:enter="transition ease-in-out duration-200 transform"
               x-transition:enter-start="-translate-x-full" 
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in-out duration-200 transform"
               x-transition:leave-start="translate-x-0" 
               x-transition:leave-end="-translate-x-full"
               class="fixed lg:static inset-y-0 left-0 z-30 w-64 bg-gray-900 text-gray-300 flex flex-col shadow-2xl lg:shadow-lg">
            
            {{-- Logo --}}
            <div class="flex items-center justify-center h-16 bg-gray-950 border-b border-gray-800 shrink-0">
                <img src="{{ asset('logo/ubbg.jpg') }}" alt="Logo Universitas" class="w-8 h-8 mr-3 rounded-full object-cover border border-gray-600">
                <span class="text-xl font-bold text-white tracking-wide">Inventaris</span>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                @php
                    $menuItems = [
                        ['route' => 'dashboard', 'label' => 'Dasbor', 'icon' => 'heroicon-o-home'],
                        [
                            'label' => 'Barang',
                            'icon' => 'heroicon-o-cube',
                            'children' => [
                                ['route' => 'inventaris.index', 'params' => ['kategori' => 'tidak_habis_pakai'], 'label' => 'Tidak Habis Pakai'],
                                ['route' => 'inventaris.index', 'params' => ['kategori' => 'habis_pakai'], 'label' => 'Habis Pakai'],
                                ['route' => 'inventaris.index', 'params' => ['kategori' => 'aset_tetap'], 'label' => 'Aset Tetap'],
                                ['route' => 'inventaris.index', 'label' => 'Semua Barang'],
                            ]
                        ],
                        ['route' => 'acquisitions.index', 'label' => 'Akuisisi', 'icon' => 'heroicon-o-arrow-up-circle'],
                        ['route' => 'rooms.index', 'label' => 'Ruangan', 'icon' => 'heroicon-o-building-library'],
                        ['route' => 'units.index', 'label' => 'Unit', 'icon' => 'heroicon-o-squares-2x2'],
                        ['route' => 'users.index', 'label' => 'Pengguna', 'icon' => 'heroicon-o-users'],
                        ['route' => 'transactions.index', 'label' => 'Transaksi', 'icon' => 'heroicon-o-arrow-path'],
                        ['route' => 'settings.index', 'label' => 'Pengaturan', 'icon' => 'heroicon-o-cog-6-tooth'],
                    ];
                @endphp

                @foreach($menuItems as $item)
                    @if(isset($item['children']))
                        <x-sidebar-dropdown :label="$item['label']" :icon="$item['icon']" :active="request()->routeIs('inventaris.*')">
                            @foreach($item['children'] as $child)
                                <x-sidebar-link 
                                    :route="$child['route']" 
                                    :params="$child['params'] ?? []"
                                    :label="$child['label']"
                                    :active="request()->fullUrlIs(route($child['route'], $child['params'] ?? [], false) . '*')" />
                            @endforeach
                        </x-sidebar-dropdown>
                    @else
                        <x-sidebar-link 
                            :route="$item['route']" 
                            :label="$item['label']"
                            :icon="$item['icon']"
                            :active="request()->routeIs($item['route'] . '*')" />
                    @endif
                @endforeach
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex flex-1 flex-col overflow-hidden w-full">
            
            {{-- Top Navigation --}}
            <header class="sticky top-0 z-10 bg-white/80 backdrop-blur-md border-b border-gray-200 px-4 sm:px-6 py-3 shadow-sm">
                <div class="flex items-center justify-between">
                    
                    {{-- Mobile menu toggle --}}
                    <button @click="sidebarOpen = !sidebarOpen" 
                            class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    {{-- Search Bar --}}
                    <div class="flex-1 max-w-lg mx-4 lg:mx-8">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-400"/>
                            </div>
                            <input type="text" 
                                   class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm transition"
                                   placeholder="Cari barang, transaksi, atau pengguna...">
                        </div>
                    </div>

                    {{-- Right Menu --}}
                    <div class="flex items-center gap-4">
                        
                        {{-- Notifications --}}
                        <div x-data="{ open: false }" @click.away="open = false" class="relative">
                            <button @click="open = !open" 
                                    class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <x-heroicon-o-bell class="w-6 h-6"/>
                                <span class="absolute top-1 right-1 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white"></span>
                            </button>
                            
                            <div x-show="open" x-transition class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border border-gray-200 py-2">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <h3 class="text-sm font-semibold text-gray-900">Notifikasi</h3>
                                </div>
                                <div class="max-h-96 overflow-y-auto">
                                    <p class="px-4 py-6 text-center text-sm text-gray-500">Tidak ada notifikasi baru</p>
                                </div>
                            </div>
                        </div>

                        {{-- User Menu --}}
                        <div x-data="{ open: false }" @click.away="open = false" class="relative">
                            <button @click="open = !open" 
                                    class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                                <img class="w-9 h-9 rounded-full object-cover border-2 border-gray-200" 
                                     src="{{ Auth::user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=e0f2fe&color=0ea5e9' }}" 
                                     alt="{{ Auth::user()->name }}">
                                <div class="hidden md:block text-left">
                                    <div class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-gray-500">{{ ucfirst(Auth::user()->role ?? 'User') }}</div>
                                </div>
                                <x-heroicon-o-chevron-down class="w-4 h-4 text-gray-400"/>
                            </button>

                            <div x-show="open" x-transition 
                                 class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 py-2">
                                <a href="{{ route('profile.edit') }}" 
                                   class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <x-heroicon-o-user-circle class="w-5 h-5"/>
                                    Profil Saya
                                </a>
                                <a href="{{ route('settings.index') }}" 
                                   class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <x-heroicon-o-cog-6-tooth class="w-5 h-5"/>
                                    Pengaturan
                                </a>
                                <div class="border-t border-gray-100 my-2"></div>
                                <form action="{{ route('logout') }}" method="POST" class="px-4 py-2">
                                    @csrf
                                    <button type="submit" 
                                            class="flex items-center gap-2 w-full text-left text-sm text-red-600 hover:bg-red-50 rounded-md px-2 py-1">
                                        <x-heroicon-o-arrow-left-on-rectangle class="w-5 h-5"/>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 bg-gray-50">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

</body>
</html>
