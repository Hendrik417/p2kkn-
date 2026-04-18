<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col shadow-sm">

            <!-- LOGO -->
            <div class="p-6 border-b">
                <h1 class="text-lg font-semibold text-gray-800 tracking-tight">
                    SIM P2KKN
                </h1>
            </div>

            <!-- NAV -->
            <nav class="flex-1 px-4 py-4 text-sm">

                <!-- MENU -->
                <div class="mb-6">
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2 px-2">
                        Menu
                    </p>

                    <a href="{{ route('student.dashboard') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('student.dashboard')
                    ? 'bg-indigo-50 text-indigo-600 font-medium'
                    : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">

                        <i class="ph ph-house text-lg"></i>
                        Beranda
                    </a>
                </div>

                <!-- MAHASISWA -->
                <div class="mb-6">
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2 px-2">
                        Mahasiswa
                    </p>

                    <ul class="space-y-1">

                        <li>
                            <a href="#"
                                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                        hover:bg-gray-50 hover:text-gray-700 text-gray-500">
                                <i class="ph ph-user-list text-lg"></i>
                                Pendaftaran
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('reports.index') }}"
                                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('reports.*')
                            ? 'bg-indigo-50 text-indigo-600 font-medium'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
                                <i class="ph ph-file-text text-lg"></i>
                                Laporan KKN
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('nilai.index') }}"
                                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                        {{ request()->routeIs('nilai.*')
                            ? 'bg-indigo-50 text-indigo-600 font-medium'
                            : 'text-gray-500 hover:bg-gray-50 hover:text-gray-700' }}">
                                <i class="ph ph-chart-bar text-lg"></i>
                                Nilai
                            </a>
                        </li>

                    </ul>
                </div>

                <!-- LOGOUT -->
                <div class="mt-auto pt-6 border-t">
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2 px-2">
                        Log Out
                    </p>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-gray-500
                    hover:bg-red-50 hover:text-red-600 transition">

                            <i class="ph ph-sign-out text-lg"></i>
                            Log out
                        </button>
                    </form>
                </div>

            </nav>
        </aside>

        <!-- CONTENT -->
        <main class="flex-1 p-6">

            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-red-500 font-semibold mb-4">
                    Informasi : Perhitungan Nilai KKN
                </h2>

                <div class="space-y-3 text-sm">

                    <div class="flex justify-between bg-gray-100 p-3 rounded">
                        <span>Nama</span>
                        <span>: {{ $data['nama'] }}</span>
                    </div>

                    <div class="flex justify-between bg-gray-100 p-3 rounded">
                        <span>NIM</span>
                        <span>: {{ $data['nim'] }}</span>
                    </div>

                    <div class="flex justify-between bg-gray-100 p-3 rounded">
                        <span>Semester</span>
                        <span>: {{ $data['semester'] }}</span>
                    </div>

                    <div class="flex justify-between bg-gray-100 p-3 rounded">
                        <span>Kode MK</span>
                        <span>: {{ $data['kode_mk'] }}</span>
                    </div>

                    <div class="flex justify-between bg-gray-100 p-3 rounded">
                        <span>Matakuliah</span>
                        <span>: {{ $data['matakuliah'] }}</span>
                    </div>

                    <div class="flex justify-between bg-gray-100 p-3 rounded">
                        <span>Nilai</span>
                        <span class="font-bold text-green-600">: {{ $data['nilai'] }}</span>
                    </div>

                </div>

                <!-- BUTTON -->
                <div class="mt-6 flex justify-between items-center">

                    <!-- Print -->
                    <button onclick="window.print()" class="flex items-center gap-2 text-red-500 hover:text-red-700">
                        🖨️ Cetak
                    </button>

                    <!-- Back -->
                    <a href="{{ route('student.dashboard') }}" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                        Kembali
                    </a>

                </div>

            </div>

        </main>
    </div>
</x-app-layout>
