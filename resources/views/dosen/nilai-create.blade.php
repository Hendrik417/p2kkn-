<x-app-layout>

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
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
                    <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider mb-2 px-2">Mahasiswa</p>
                    <ul class="space-y-1">
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

        {{-- CONTENT --}}
        <main class="flex-1 p-6 bg-gray-100">

            <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">

                <h2 class="text-lg font-bold mb-4 text-red-500">
                    Input Nilai KKN (Dosen)
                </h2>

                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/dosen/nilai') }}">
                    @csrf

                    {{-- PILIH MAHASISWA --}}
                    <div class="mb-4">
                        <label class="block mb-1">Mahasiswa</label>

                        <select name="students_id" class="w-full border p-2 rounded">
                            <option value="">-- Pilih Mahasiswa --</option>

                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">
                                    {{ $student->name }} - {{ $student->nim }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- NILAI --}}
                    <div class="grid grid-cols-2 gap-4">

                        <input type="number" name="disiplin" placeholder="Disiplin" class="border p-2 rounded">

                        <input type="number" name="kerjasama" placeholder="Kerjasama" class="border p-2 rounded">

                        <input type="number" name="inisiatif" placeholder="Inisiatif" class="border p-2 rounded">

                        <input type="number" name="laporan" placeholder="Laporan" class="border p-2 rounded">

                    </div>

                    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
                        Simpan Nilai
                    </button>
                </form>

            </div>

        </main>

    </div>

</x-app-layout>
