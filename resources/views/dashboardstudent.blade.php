<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - SIM P2KKN</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="bg-[#F4F4F9] font-sans antialiased">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <div class="p-6">
                <h1 class="text-xl font-bold text-gray-800 tracking-tight">SIM P2KKN</h1>
            </div>

            <nav class="flex-1 px-4">
                <div class="mb-6">
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2 px-2">Menu</p>
                    <a href="{{ route('student.dashboard') }}"
                        class="flex items-center gap-3 px-3 py-2 {{ request()->routeIs('student.dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500' }} rounded-lg font-medium shadow-sm transition">
                        <i class="ph ph-house text-lg"></i> Beranda
                    </a>
                </div>

                <div class="mb-6">
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2 px-2">Mahasiswa</p>
                    <ul class="space-y-1">
                        <li>
                            <a href="#"
                                class="flex items-center gap-3 px-3 py-2 text-gray-500 hover:bg-gray-50 hover:text-gray-700 rounded-lg transition">
                                <i class="ph ph-user-list text-lg"></i> Pendaftaran
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center gap-3 px-3 py-2 text-gray-500 hover:bg-gray-50 hover:text-gray-700 rounded-lg transition">
                                <i class="ph ph-file-text text-lg"></i> Laporan KKN
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center gap-3 px-3 py-2 text-gray-500 hover:bg-gray-50 hover:text-gray-700 rounded-lg transition">
                                <i class="ph ph-chart-bar text-lg"></i> Nilai
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="mt-auto pb-6">
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2 px-2">Log Out</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-3 px-3 py-2 text-gray-500 hover:text-red-600 transition">
                            <i class="ph ph-sign-out text-lg"></i> Log out
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <main class="flex-1 p-8 flex flex-col gap-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white shadow-md">
                    <i class="ph ph-user text-xl"></i>
                </div>
                <div>
                    <h2 class="text-sm font-semibold text-indigo-600">
                        Hi, {{ $user->name ?? 'Mahasiswa' }}
                    </h2>
                </div>
            </div>

            <div
                class="w-full h-40 bg-gradient-to-r from-[#C22E14] to-[#F1732C] rounded-2xl shadow-lg border-b-4 border-orange-700/20">
            </div>

            <div>
                <button
                    class="bg-white px-6 py-3 rounded-xl shadow-sm border border-gray-100 flex items-center gap-2 group transition hover:shadow-md active:scale-95">
                    <span class="text-orange-600 font-bold text-sm tracking-wide">Kelompok</span>
                </button>
            </div>

            <div class="flex-1 bg-white rounded-3xl shadow-sm border border-gray-100 p-6">
            </div>
        </main>

        <aside class="w-80 bg-white p-6 flex flex-col gap-4 border-l border-gray-100 hidden xl:flex">
            <div class="bg-[#F1F0F7] py-3 rounded-xl text-center">
                <span class="font-bold text-gray-700 text-sm tracking-wide">Kalender</span>
            </div>

            <div class="bg-[#F1F0F7] h-20 rounded-xl w-full opacity-60"></div>

            <div class="bg-[#F1F0F7] h-64 rounded-3xl w-full shadow-inner opacity-60"></div>

            <div class="bg-[#F1F0F7] h-32 rounded-2xl w-full opacity-60"></div>
        </aside>
    </div>

</body>

</html>
