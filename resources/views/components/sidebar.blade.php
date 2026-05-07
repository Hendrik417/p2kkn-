<aside :class="open ? 'translate-x-0' : '-translate-x-full'"
    class="fixed z-30 inset-y-0 left-0 w-64 bg-white text-gray-500 border-r border-gray-100
           transform transition-transform duration-200 ease-in-out
           lg:translate-x-0 lg:static lg:inset-0 h-screen flex flex-col shadow-sm">

    <div class="p-8 flex flex-col items-center justify-center shrink-0">
        <h1 class="text-xl font-bold text-gray-800 tracking-wider uppercase">SIM P2KKN</h1>
    </div>

    <nav class="flex-1 overflow-y-auto px-4">
        <div class="px-4 py-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
            Menu
        </div>
        <ul class="mb-6">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all group
                        {{ request()->routeIs('dashboard') ? 'text-indigo-600 bg-indigo-50/50' : 'hover:text-indigo-600 hover:bg-gray-50' }}">
                    @if (request()->routeIs('dashboard'))
                        <div class="absolute left-0 w-1 h-6 bg-indigo-600 rounded-r-lg"></div>
                    @endif
                    <i data-lucide="home"
                        class="w-4 h-4 mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600' }}"></i>
                    Beranda
                </a>
            </li>
        </ul>

        <div class="px-4 py-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
            Mahasiswa
        </div>
        <ul class="space-y-1">
            <li>
                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:text-indigo-600 hover:bg-gray-50 transition group">
                    <i data-lucide="user" class="w-4 h-4 mr-3 text-gray-400 group-hover:text-indigo-600"></i> Halaman
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:text-indigo-600 hover:bg-gray-50 transition group">
                    <i data-lucide="layout-grid" class="w-4 h-4 mr-3 text-gray-400 group-hover:text-indigo-600"></i>
                    Profil
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:text-indigo-600 hover:bg-gray-50 transition group">
                    <i data-lucide="layout-grid" class="w-4 h-4 mr-3 text-gray-400 group-hover:text-indigo-600"></i>
                    Layanan
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:text-indigo-600 hover:bg-gray-50 transition group">
                    <i data-lucide="layout-grid" class="w-4 h-4 mr-3 text-gray-400 group-hover:text-indigo-600"></i>
                    Publikasi
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:text-indigo-600 hover:bg-gray-50 transition group">
                    <i data-lucide="layout-grid" class="w-4 h-4 mr-3 text-gray-400 group-hover:text-indigo-600"></i> Faq
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:text-indigo-600 hover:bg-gray-50 transition group">
                    <i data-lucide="layout-grid" class="w-4 h-4 mr-3 text-gray-400 group-hover:text-indigo-600"></i>
                    Kontak
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:text-indigo-600 hover:bg-gray-50 transition group">
                    <i data-lucide="layout-grid" class="w-4 h-4 mr-3 text-gray-400 group-hover:text-indigo-600"></i>
                    Master Data
                </a>
            </li>
            <li>
                <a href="{{ route('admin.regency.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:text-indigo-600 hover:bg-gray-50 transition group">
                    <i data-lucide="layout-grid" class="w-4 h-4 mr-3 text-gray-400 group-hover:text-indigo-600"></i>
                    Kabupaten
                </a>
            </li>
            <li>
                <a href="{{ route('admin.district.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:text-indigo-600 hover:bg-gray-50 transition group">
                    <i data-lucide="layout-grid" class="w-4 h-4 mr-3 text-gray-400 group-hover:text-indigo-600"></i>
                    Kecamatan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.village.index') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg hover:text-indigo-600 hover:bg-gray-50 transition group">
                    <i data-lucide="layout-grid" class="w-4 h-4 mr-3 text-gray-400 group-hover:text-indigo-600"></i>
                    Desa
                </a>
            </li>
        </ul>
    </nav>
</aside>
