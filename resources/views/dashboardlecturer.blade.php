    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Dosen - SIM P2KKN</title>
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
                        <a href="{{ route('lecturer.dashboard') }}"
                            class="flex items-center gap-3 px-3 py-2 {{ request()->routeIs('lecturer.dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500' }} rounded-lg font-medium shadow-sm transition">
                            <i class="ph ph-house text-lg"></i> Beranda
                        </a>
                    </div>

                    <div class="mb-6">
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2 px-2">Mahasiswa
                        </p>
                        <ul class="space-y-1">
                            {{-- <li>
                                <a href="#"
                                    class="flex items-center gap-3 px-3 py-2 text-gray-500 hover:bg-gray-50 hover:text-gray-700 rounded-lg transition">
                                    <i class="ph ph-user-list text-lg"></i> Pendaftaran
                                </a>
                            </li> --}}
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
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2 px-2">Log Out
                        </p>
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
                    <div
                        class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white shadow-md">
                        <i class="ph ph-user text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold text-indigo-600">
                            Hi, {{ auth()->user()?->name ?? 'Dosen' }}
                        </h2>
                    </div>
                </div>

                <div
                    class="w-full h-40 bg-gradient-to-r from-[#C22E14] to-[#F1732C] rounded-2xl shadow-lg border-b-4 border-orange-700/20">
                </div>

                <div>
                    <button
                        class="bg-white px-6 py-3 rounded-xl shadow-sm border border-gray-100 flex items-center gap-2 group transition hover:shadow-md active:scale-95">
                        <span class="text-orange-600 font-bold text-sm tracking-wide">Daftar Kelompok</span>
                    </button>
                </div>

                {{-- <div class="flex-1 bg-white rounded-3xl shadow-sm border border-gray-100 p-6">
                </div> --}}
                <div class="flex-1 bg-white rounded-3xl shadow-sm border border-gray-100 p-6">

                    <!-- HEADER -->
                    <div class="flex items-center justify-between mb-6">
                        {{-- <h3 class="text-lg font-bold text-gray-800">
                            Daftar Mahas
                        </h3> --}}

                        <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full">
                            {{ $groups?->sum(fn($g) => $g->students->count()) ?? 0 }} Total Mahasiswa
                        </span>
                    </div>

                    <!-- TABLE -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">

                            <thead>
                                <tr class="text-gray-400 text-[11px] uppercase tracking-wider border-b border-gray-50">
                                    <th class="px-4 py-3 font-semibold">Nama Mahasiswa</th>
                                    <th class="px-4 py-3 font-semibold">NIM</th>
                                    <th class="px-4 py-3 font-semibold">Kelompok</th>
                                    <th class="px-4 py-3 font-semibold">Prodi</th>
                                    <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="text-gray-600 text-sm">
                                @forelse($groups ?? [] as $group)

                                    @foreach ($group->students as $student)
                                        <tr class="hover:bg-gray-50 transition-colors border-b border-gray-50">

                                            <!-- NAMA -->
                                            <td class="px-4 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold text-xs">
                                                        {{ strtoupper(substr($student->name, 0, 1)) }}
                                                    </div>
                                                    <span class="font-medium text-gray-800">
                                                        {{ $student->name }}
                                                    </span>
                                                </div>
                                            </td>

                                            <!-- NIM -->
                                            <td class="px-4 py-4 font-mono text-xs">
                                                {{ $student->nim }}
                                            </td>

                                            <!-- KELOMPOK -->
                                            <td class="px-4 py-4">
                                                <span
                                                    class="bg-orange-50 text-orange-600 px-2 py-1 rounded-md text-xs font-semibold">
                                                    {{ $group->groups_names }}
                                                </span>
                                            </td>

                                            <!-- PRODI -->
                                            <td class="px-4 py-4 text-gray-500">
                                                {{ $student->major }}
                                            </td>

                                            <!-- AKSI -->
                                            <td class="px-4 py-4 text-center">
                                                <a href="{{ route('lecturer.students.show', $student->id) }}"
                                                    class="text-gray-400 hover:text-indigo-600 transition">
                                                    <i class="ph ph-eye text-lg"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                @empty
                                    <tr>
                                        <td colspan="5" class="py-10 text-center text-gray-400">
                                            <i class="ph ph-users-three text-4xl mb-2 block mx-auto"></i>
                                            Belum ada data kelompok/mahasiswa.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

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
