    {{-- <x-app-layout>
        <div x-data="{ open: false }" class="flex h-screen bg-gray-100">

            <!-- Sidebar -->
            @include('components.sidebar')

            <!-- Overlay -->
            <div x-show="open" @click="open=false" class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto">

                @include('components.header')

                <div class="py-10">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                        <!-- Breadcrumb -->
                        <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-6">
                            <a href="{{ route('dashboard') }}" class="hover:text-green-600">Home</a>
                            <span>›</span>
                            <a href="{{ route('reports.index') }}" class="hover:text-green-600">Reports</a>
                            <span>›</span>
                            <span class="text-gray-500">Upload</span>
                        </nav>

                        <!-- ERROR -->
                        @if ($errors->any())
                            <div class="mb-5">
                                <div class="bg-red-500 text-white font-bold px-4 py-2 rounded-t">
                                    Terdapat kesalahan
                                </div>
                                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-b">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>- {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <!-- CARD FORM -->
                        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="nama_file" required>

                            <input type="text" name="jenis_laporan" required>

                            <input type="date" name="tanggal_upload" value="{{ date('Y-m-d') }}" required>

                            <input type="file" name="file_laporan" required>

                            <button type="submit" class="btn-red">Simpan Laporan</button>
                        </form>

                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            <!-- LEFT -->
                            <div>
                                <div class="mb-5">
                                    <label class="block text-sm mb-1">Nama File</label>
                                    <input type="text" name="file_name" value="{{ old('file_name') }}"
                                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-200 focus:outline-none">
                                </div>

                                <div class="mb-5">
                                    <label class="block text-sm mb-1">Jenis Laporan</label>
                                    <input type="text" name="jenis_laporan" value="{{ old('jenis_laporan') }}"
                                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-200">
                                </div>

                                <div class="mb-5">
                                    <label class="block text-sm mb-1">Tanggal Upload</label>
                                    <input type="date" name="tanggal_upload"
                                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-gray-200">
                                </div>
                            </div>

                            <!-- RIGHT UPLOAD -->
                            <div>
                                <label class="block text-sm mb-2">Upload pdf Dokumen</label>

                                <div
                                    class="border-2 border-dashed rounded-xl h-44 flex flex-col items-center justify-center text-gray-400">

                                    <!-- ICON -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V8m0 0l-3 3m3-3l3 3m4 4v-8m0 0l3 3m-3-3l-3 3" />
                                    </svg>

                                    <p class="text-sm mb-2">
                                        choose a file or drag and drop it here.
                                    </p>

                                    <input type="file" name="file" id="fileInput" class="hidden">

                                    <button type="button" onclick="document.getElementById('fileInput').click()"
                                        class="bg-gray-200 text-gray-700 px-3 py-1 rounded hover:bg-gray-300">
                                        Browse File
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="flex justify-end gap-2 mt-6">
                            <a href="{{ route('reports.index') }}"
                                class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">

    </x-app-layout>                       Batal --}}
                            </a>

                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Simpan
                            </button>
                        </div>

                        </form>

                    </div>
                </div>
            </main>
        </div>
    {{-- <x-app-layout>
        <div x-data="{ open: false }" class="flex h-screen bg-gray-100">

            @include('components.sidebar')

            <div x-show="open" @click="open=false" class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

            <main class="flex-1 overflow-y-auto">

                @include('components.header')

                <div class="py-10">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                        <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-6">
                            <a href="{{ route('dashboard') }}" class="hover:text-green-600">Home</a>
                            <span>›</span>
                            <a href="{{ route('reports.index') }}" class="hover:text-green-600">Reports</a>
                            <span>›</span>
                            <span class="text-gray-500">Upload</span>
                        </nav>

                        @if ($errors->any())
                            <div class="mb-5">
                                <div class="bg-red-500 text-white font-bold px-4 py-2 rounded-t text-sm">
                                    Terdapat kesalahan input:
                                </div>
                                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-b text-sm">
                                    <ul class="list-disc ml-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data"
                            class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                                <div>
                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama File</label>
                                        <input type="text" name="nama_file" value="{{ old('nama_file') }}" required
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition">
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis
                                            Laporan</label>
                                        <input type="text" name="jenis_laporan" value="{{ old('jenis_laporan') }}"
                                            required
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition">
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                            Upload</label>
                                        <input type="date" name="tanggal_upload"
                                            value="{{ old('tanggal_upload', date('Y-m-d')) }}" required
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload File
                                        Laporan</label>

                                    <div
                                        class="border-2 border-dashed border-gray-300 rounded-xl h-44 flex flex-col items-center justify-center text-gray-400 bg-gray-50 hover:bg-red-50 hover:border-red-300 transition group">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-10 w-10 mb-2 group-hover:text-red-500 transition" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16V8m0 0l-3 3m3-3l3 3m4 4v-8m0 0l3 3m-3-3l-3 3" />
                                        </svg>

                                        <p class="text-sm mb-2 text-center px-4" id="fileNameDisplay">
                                            Klik tombol di bawah atau seret file ke sini
                                        </p>

                                        <input type="file" name="file_laporan" id="fileInput" class="hidden" required
                                            onchange="document.getElementById('fileNameDisplay').innerText = 'File terpilih: ' + this.files[0].name">

                                        <button type="button" onclick="document.getElementById('fileInput').click()"
                                            class="bg-white border border-gray-300 text-gray-700 px-4 py-1.5 rounded-lg shadow-sm hover:bg-gray-100 text-sm font-semibold transition">
                                            Pilih File
                                        </button>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2 italic">*Format yang disarankan: PDF, DOCX,
                                        atau Gambar.</p>
                                </div>
                            </div>

                            <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                                <a href="{{ route('reports.index') }}"
                                    class="px-5 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                                    Batal
                                </a>

                                <button type="submit"
                                    class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition text-sm font-medium shadow-sm shadow-red-200">
                                    Simpan Laporan
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </main>
        </div>
    </x-app-layout> --}}
    {{-- <x-app-layout>
        <div x-data="{ open: false }" class="flex h-screen bg-gray-100">

            @include('components.sidebar')

            <div x-show="open" @click="open=false" class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

            <main class="flex-1 overflow-y-auto">

                @include('components.header')

                <div class="py-10">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                        <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-6">
                            <a href="{{ route('dashboard') }}" class="hover:text-green-600">Home</a>
                            <span>›</span>
                            <a href="{{ route('reports.index') }}" class="hover:text-green-600">Reports</a>
                            <span>›</span>
                            <span class="text-gray-500">Upload</span>
                        </nav>

                        @if (session('success'))
                            <div
                                class="mb-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-5">
                                <div class="bg-red-500 text-white font-bold px-4 py-2 rounded-t text-sm">
                                    Terdapat kesalahan input:
                                </div>
                                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-b text-sm">
                                    <ul class="list-disc ml-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data"
                            class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 mb-8">
                            @csrf
                            <h2 class="text-lg font-semibold mb-6">Upload Laporan Baru</h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama File</label>
                                        <input type="text" name="nama_file" placeholder="Contoh: Laporan Pekan 1"
                                            value="{{ old('nama_file') }}" required
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition">
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis
                                            Laporan</label>
                                        <select name="jenis_laporan" required
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition">
                                            <option value="">Pilih Jenis...</option>
                                            <option value="Harian">Harian</option>
                                            <option value="Mingguan">Mingguan</option>
                                            <option value="Bulanan">Bulanan</option>
                                        </select>
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                            Upload</label>
                                        <input type="date" name="tanggal_upload"
                                            value="{{ old('tanggal_upload', date('Y-m-d')) }}" required
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-200 focus:border-red-500 outline-none transition">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload File
                                        Laporan</label>
                                    <div
                                        class="border-2 border-dashed border-gray-300 rounded-xl h-44 flex flex-col items-center justify-center text-gray-400 bg-gray-50 hover:bg-red-50 hover:border-red-300 transition group relative">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-10 w-10 mb-2 group-hover:text-red-500 transition" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16V8m0 0l-3 3m3-3l3 3m4 4v-8m0 0l3 3m-3-3l-3 3" />
                                        </svg>

                                        <p class="text-sm mb-2 text-center px-4" id="fileNameDisplay">
                                            Klik atau drop file di sini <br> <span class="text-xs">(PDF, JPG, atau
                                                PNG)</span>
                                        </p>

                                        <input type="file" name="file_laporan" id="fileInput" class="hidden" required
                                            accept=".pdf,.jpg,.png"
                                            onchange="document.getElementById('fileNameDisplay').innerText = 'File terpilih: ' + this.files[0].name">

                                        <button type="button" onclick="document.getElementById('fileInput').click()"
                                            class="bg-white border border-gray-300 text-gray-700 px-4 py-1.5 rounded-lg shadow-sm hover:bg-gray-100 text-sm font-semibold transition">
                                            Pilih File
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                                <button type="submit"
                                    class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition text-sm font-medium shadow-sm shadow-red-200">
                                    SIMPAN LAPORAN
                                </button>
                            </div>
                        </form>

                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                            <div class="p-4 border-b border-gray-100 bg-gray-50">
                                <h3 class="font-bold text-gray-700 text-sm uppercase tracking-wider">Riwayat Laporan
                                </h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-sm">
                                    <thead class="bg-gray-50 text-gray-600 border-b">
                                        <tr>
                                            <th class="px-6 py-4 font-medium">Nama File</th>
                                            <th class="px-6 py-4 font-medium">Tanggal</th>
                                            <th class="px-6 py-4 font-medium">Jenis</th>
                                            <th class="px-6 py-4 font-medium">Status</th>
                                            <th class="px-6 py-4 font-medium">Catatan</th>
                                            <th class="px-6 py-4 font-medium text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @forelse ($laporans as $item)
                                            <tr class="hover:bg-gray-50 transition">
                                                <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama_file }}
                                                </td>
                                                <td class="px-6 py-4 text-gray-600">
                                                    {{ \Carbon\Carbon::parse($item->tanggal_upload)->format('d/m/Y') }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span
                                                        class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs">{{ $item->jenis_laporan }}</span>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <span
                                                        class="px-2 py-1 {{ $item->status == 'disetujui' ? 'bg-green-50 text-green-600' : 'bg-yellow-50 text-yellow-600' }} rounded text-xs italic">
                                                        {{ ucfirst($item->status) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-gray-500">{{ $item->catatan ?? '-' }}</td>
                                                <td class="px-6 py-4 text-center">
                                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                                                        class="text-blue-500 hover:underline font-medium">Lihat PDF</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="px-6 py-10 text-center text-gray-400 italic">
                                                    Belum ada riwayat laporan.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </x-app-layout> --}}
