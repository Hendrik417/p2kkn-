<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

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

            <main class="flex-1 w-full p-6">

                <div class="w-full max-w-[1400px] mx-auto px-6">

                    <!-- GRID ATAS -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                        <!-- ===================== -->
                        <!-- CARD KELOMPOK -->
                        <!-- ===================== -->
                        <div class="bg-white p-6 rounded-xl shadow w-full">

                            <h2 class="text-lg font-bold mb-4">Informasi Kelompok</h2>

                            @if ($groups)
                                <div class="grid grid-cols-2 gap-4 text-sm">

                                    <div>
                                        <p class="text-gray-400">Periode</p>
                                        <p class="font-semibold">{{ $groups->period->name ?? '-' }}</p>
                                    </div>

                                    <div>
                                        <p class="text-gray-400">Kelompok</p>
                                        <p class="font-semibold">{{ $groups->group_name }}</p>
                                    </div>

                                    <div>
                                        <p class="text-gray-400">Desa</p>
                                        <p class="font-semibold">{{ $groups->village->name ?? '-' }}</p>
                                    </div>

                                    <div>
                                        <p class="text-gray-400">Kecamatan</p>
                                        <p class="font-semibold">{{ $groups->district->name ?? '-' }}</p>
                                    </div>

                                    <div>
                                        <p class="text-gray-400">Kabupaten</p>
                                        <p class="font-semibold">{{ $groups->regency->name ?? '-' }}</p>
                                    </div>

                                </div>
                            @else
                                <p class="text-red-500">Belum tergabung dalam kelompok</p>
                            @endif
                        </div>

                        <!-- ===================== -->
                        <!-- PROGRESS -->
                        <!-- ===================== -->
                        <div class="bg-white p-6 rounded-xl shadow w-full">

                            <h2 class="text-lg font-bold mb-4">Progress Laporan</h2>

                            @php
                                $total = 10;
                                $selesai = $laporans->count();
                                $persen = $total > 0 ? ($selesai / $total) * 100 : 0;
                            @endphp

                            <p class="text-sm mb-2">{{ $selesai }} / {{ $total }} laporan</p>

                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-green-500 h-3 rounded-full transition-all duration-500"
                                    style="width: {{ $persen }}%">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- ===================== -->
                    <!-- TABLE LAPORAN -->
                    <!-- ===================== -->
                    <div class="bg-white p-6 rounded-xl shadow w-full">

                        <h2 class="text-lg font-bold mb-4">Laporan Saya</h2>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">

                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Nama File</th>
                                        <th class="px-4 py-2 text-left">Tanggal</th>
                                        <th class="px-4 py-2 text-left">Jenis</th>
                                        <th class="px-4 py-2 text-left">Status</th>
                                        <th class="px-4 py-2 text-left">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($laporans as $item)
                                        <tr class="border-t">

                                            <td class="px-4 py-2">{{ $item->nama_file }}</td>

                                            <td class="px-4 py-2">{{ $item->tanggal_upload }}</td>

                                            <td class="px-4 py-2">{{ $item->jenis_laporan }}</td>

                                            <td class="px-4 py-2">
                                                <span
                                                    class="px-2 py-1 text-xs rounded
                                        @if ($item->status == 'Disetujui') bg-green-100 text-green-700
                                        @elseif($item->status == 'Ditolak') bg-red-100 text-red-700
                                        @else bg-yellow-100 text-yellow-700 @endif">
                                                    {{ $item->status }}
                                                </span>
                                            </td>

                                            <td class="px-4 py-2">
                                                <a href="{{ Storage::url('laporans/' . $item->file_path) }}"
                                                    target="_blank" class="text-blue-600 hover:underline">
                                                    Lihat
                                                </a>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-6 text-gray-400">
                                                Belum ada laporan
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>
            </main>
        </div>
</x-app-layout>
