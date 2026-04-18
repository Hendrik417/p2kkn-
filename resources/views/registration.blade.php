    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pendaftaran KKN - SIM P2KKN</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/@phosphor-icons/web"></script>
        <style>
            /* Menghilangkan scrollbar pada sidebar tapi tetap bisa di-scroll jika penuh */
            .sidebar-scroll::-webkit-scrollbar {
                display: none;
            }

            .sidebar-scroll {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
    </head>

    <body class="bg-[#F1F3F9] font-sans antialiased">

        <div class="flex h-screen overflow-hidden">
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
                        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2 px-2">Mahasiswa
                        </p>
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

            <div class="flex-1 flex overflow-hidden">

                <main class="flex-1 overflow-y-auto p-8 lg:p-12">
                    <div class="max-w-4xl mx-auto">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center gap-3 text-indigo-600">
                                <i class="ph ph-user-circle-gear text-4xl"></i>
                                <span class="text-sm font-semibold text-gray-600">Hi, Mahasiswa</span>
                            </div>
                        </div>

                        <div
                            class="bg-white rounded-[2rem] shadow-2xl shadow-indigo-100/50 border border-white overflow-hidden">
                            <div class="h-32 bg-gradient-to-r from-orange-500 to-red-500 p-8 flex flex-col justify-end">
                                <h2 class="text-2xl font-bold text-white tracking-tight">Formulir Pendaftaran KKN</h2>
                                <p class="text-orange-100 text-xs">Lengkapi data diri anda dengan benar</p>
                            </div>

                            <form action="{{ route('student.pendaftaran.store') }}" method="POST"
                                enctype="multipart/form-data" class="p-8 lg:p-10 space-y-8">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Nama
                                            Mahasiswa</label>
                                        <input type="text" name="nama"
                                            value="{{ old('nama', $user->name ?? '') }}"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm">
                                    </div>

                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">NIM</label>
                                        <input type="text" name="nim" value="{{ old('nim') }}"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm">
                                    </div>

                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Jenis
                                            Kelamin</label>
                                        <select name="jk"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm appearance-none">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Nomor
                                            Handphone</label>
                                        <input type="text" name="no_hp" placeholder="08..."
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Fakultas</label>
                                        <select name="fakultas"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm appearance-none">
                                            <option value="">Pilih Fakultas</option>
                                            <option value="Teknik">Teknik</option>
                                        </select>
                                    </div>
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Prodi</label>
                                        <select name="prodi"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm appearance-none">
                                            <option value="">Pilih Program Studi</option>
                                            <option value="Informatika">Informatika</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Jenis
                                        KKN</label>
                                    <select name="jenis_kkn"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm appearance-none">
                                        <option value="Reguler">Reguler</option>
                                        <option value="MBKM">MBKM</option>
                                    </select>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
                                    <div
                                        class="space-y-2 text-center border-2 border-dashed border-gray-100 rounded-3xl p-6 hover:bg-gray-50 transition-colors cursor-pointer group">
                                        <input type="file" name="surat_pernyataan" class="hidden" id="f1"
                                            onchange="up(this, 's1')">
                                        <label for="f1" class="cursor-pointer block">
                                            <i
                                                class="ph ph-file-pdf text-4xl text-gray-300 group-hover:text-red-500 transition-colors"></i>
                                            <p id="s1"
                                                class="text-[10px] font-bold text-gray-400 mt-2 uppercase tracking-tighter">
                                                Surat Pernyataan (PDF)</p>
                                        </label>
                                    </div>
                                    <div
                                        class="space-y-2 text-center border-2 border-dashed border-gray-100 rounded-3xl p-6 hover:bg-gray-50 transition-colors cursor-pointer group">
                                        <input type="file" name="khs" class="hidden" id="f2"
                                            onchange="up(this, 's2')">
                                        <label for="f2" class="cursor-pointer block">
                                            <i
                                                class="ph ph-article text-4xl text-gray-300 group-hover:text-indigo-500 transition-colors"></i>
                                            <p id="s2"
                                                class="text-[10px] font-bold text-gray-400 mt-2 uppercase tracking-tighter">
                                                KHS Terakhir (PDF)</p>
                                        </label>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-50">
                                    <button type="button"
                                        class="px-6 py-2.5 text-xs font-bold text-gray-400 uppercase tracking-widest hover:text-gray-600 transition-colors">Cancel</button>
                                    <button type="submit"
                                        class="px-8 py-2.5 bg-red-600 text-white rounded-lg text-xs font-bold uppercase tracking-widest hover:bg-red-700 shadow-lg shadow-red-200 transition-all">Submit
                                        Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>

                <aside class="hidden xl:flex w-80 bg-white/50 backdrop-blur-sm border-l border-gray-100 flex-col p-8">
                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 mb-6">
                        <h3 class="text-sm font-bold text-gray-800 mb-6 flex items-center justify-between">
                            Kalender <span><i class="ph ph-calendar-blank"></i></span>
                        </h3>
                        <div class="grid grid-cols-7 gap-2">
                            <div class="h-6 w-full bg-gray-50 rounded-md"></div>
                            <div class="h-6 w-full bg-gray-50 rounded-md"></div>
                            <div class="h-6 w-full bg-indigo-100 rounded-md"></div>
                            <div class="h-6 w-full bg-gray-50 rounded-md"></div>
                        </div>
                    </div>

                    <div class="bg-indigo-600 rounded-[2rem] p-6 text-white shadow-xl shadow-indigo-200">
                        <i class="ph ph-lightbulb-filament text-3xl mb-4"></i>
                        <h4 class="text-sm font-bold mb-2">Tips</h4>
                        <p class="text-[11px] text-indigo-100 leading-relaxed">
                            Gunakan file PDF yang jelas terbaca agar proses verifikasi admin menjadi lebih cepat.
                        </p>
                    </div>
                </aside>
            </div>
        </div>

        <script>
            function up(input, id) {
                if (input.files.length > 0) {
                    document.getElementById(id).innerText = input.files[0].name;
                    document.getElementById(id).classList.add('text-indigo-600');
                }
            }
        </script>
    </body>

    </html>
