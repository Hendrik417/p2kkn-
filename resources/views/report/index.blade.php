<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

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
                            <a href="{{ route('reports.index') }}"
                                class="flex items-center gap-3 px-3 py-2 {{ request()->routeIs('reports.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500' }} rounded-lg transition">
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

        <main class="flex-1 overflow-y-auto">

            @include('components.header')

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <!-- Breadcrumb -->
                    <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-7">
                        <a href="#" class="flex items-center hover:text-green-600">
                            <i data-lucide="home" class="w-4 h-4 mr-1"></i> Home
                        </a>
                        <span>›</span>
                        <span class="text-gray-500">Laporan</span>
                        <span>›</span>
                        <span class="text-gray-500">Upload</span>
                    </nav>

                    <!-- ERROR -->
                    @if ($errors->any())
                        <div class="mb-5">
                            <div class="bg-red-500 text-white font-bold px-4 py-2 rounded-t">
                                Terdapat kesalahan
                            </div>
                            <div class="border border-red-400 bg-red-100 text-red-700 px-4 py-3 rounded-b">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>- {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- SUCCESS -->
                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg border border-green-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- FORM -->
                    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data"
                        class="bg-white p-6 rounded-lg shadow-md">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-bold mb-2">Nama File</label>
                                    <input type="text" name="file_name" value="{{ old('file_name') }}"
                                        class="w-full bg-gray-100 border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:bg-white focus:border-green-500">
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-bold mb-2">Jenis Laporan</label>
                                    <select name="jenis_laporan"
                                        class="w-full bg-gray-100 border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:bg-white focus:border-green-500">
                                        <option value="">Pilih Jenis</option>
                                        <option value="Harian">Harian</option>
                                        <option value="Mingguan">Mingguan</option>
                                        <option value="Akhir">Laporan Akhir</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-bold mb-2">Tanggal Upload</label>
                                    <input type="date" name="tanggal_upload"
                                        value="{{ old('tanggal_upload', date('Y-m-d')) }}"
                                        class="w-full bg-gray-100 border border-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:bg-white focus:border-green-500">
                                </div>
                            </div>

                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg p-6 flex flex-col justify-center">
                                <label class="block text-gray-700 font-bold mb-2">Upload File</label>
                                <input type="file" name="file"
                                    class="w-full bg-gray-100 border border-gray-300 rounded-lg py-2 px-4">
                                <p class="text-xs text-gray-400 mt-2">PDF, JPG, PNG (max 2MB)</p>
                            </div>
                        </div>

                        <div class="mt-6 flex space-x-2">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                                Simpan
                            </button>
                        </div>
                    </form>

                    <!-- TABLE -->
                    <div class="bg-white p-6 rounded-lg shadow-md mt-8">
                        <h2 class="text-lg font-bold mb-4">Riwayat Laporan</h2>

                        <table class="w-full text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2">Nama File</th>
                                    <th class="px-4 py-2">Tanggal</th>
                                    <th class="px-4 py-2">Jenis</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporans as $item)
                                    <tr class="border-t">
                                        <td class="px-4 py-2">{{ $item->nama_file }}</td>
                                        <td class="px-4 py-2">{{ $item->tanggal_upload }}</td>
                                        <td class="px-4 py-2">{{ $item->jenis_laporan }}</td>
                                        <td class="px-4 py-2">
                                            <span
                                                class="px-2 py-1 rounded text-xs
                                    @if ($item->status == 'Disetujui') bg-green-100 text-green-700
                                    @elseif($item->status == 'Ditolak') bg-red-100 text-red-700
                                    @else bg-yellow-100 text-yellow-700 @endif">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2">
                                            <a href="{{ Storage::url('laporans/' . $item->file_path) }}" target="_blank"
                                                class="text-blue-600">Lihat</a>

                                            @if ($item->status == 'Pending')
                                                <form action="{{ route('reports.destroy', $item->id) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-600 ml-2">Hapus</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </main>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Setup CSRF Token untuk semua request AJAX (wajib untuk Laravel)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // 1. Inisialisasi DataTable
                var table = $('#reports-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('reports.index') }}',
                    columns: [{
                            data: 'file_name',
                            name: 'file_name'
                        },
                        {
                            data: 'tanggal_upload',
                            name: 'tanggal_upload'
                        },
                        {
                            data: 'jenis_laporan',
                            name: 'jenis_laporan'
                        },
                        {
                            data: 'status',
                            render: function(data) {
                                let color = data === 'Disetujui' ? 'green' : (data === 'Ditolak' ?
                                    'red' : 'yellow');
                                return `<span class="px-2 py-1 rounded-full text-[10px] font-bold bg-${color}-100 text-${color}-700">${data}</span>`;
                            }
                        },
                        {
                            data: 'catatan',
                            defaultContent: '<span class="text-gray-300">-</span>'
                        },
                        {
                            data: 'action',
                            orderable: false,
                            searchable: false,
                            className: 'text-center'
                        }
                    ],
                    language: {
                        searchPlaceholder: "Cari laporan...",
                        lengthMenu: "_MENU_",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    }
                });

                // 2. Handle Form Submit via AJAX
                $('#form-upload-report').on('submit', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    let btn = $('#btn-save');

                    $.ajax({
                        url: "{{ route('reports.store') }}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            btn.prop('disabled', true).html(
                                '<i class="ph ph-circle-notch animate-spin"></i> Memproses...');
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                                $('#form-upload-report')[0].reset();
                                table.ajax.reload(null, false); // Reload tabel tanpa reset paging
                            }
                        },
                        error: function(xhr) {
                            let msg = xhr.responseJSON?.message || "Terjadi kesalahan sistem.";
                            Swal.fire('Error', msg, 'error');
                        },
                        complete: function() {
                            btn.prop('disabled', false).text('Simpan Laporan');
                        }
                    });
                });

                // 3. Fungsi untuk menghapus laporan
                window.deleteReport = function(id) {
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data laporan dan file akan dihapus permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444', // Tailwind red-500
                        cancelButtonColor: '#9ca3af', // Tailwind gray-400
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: `/reports/${id}`,
                                type: 'DELETE',
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Terhapus!',
                                            text: response.message,
                                            timer: 2000,
                                            showConfirmButton: false
                                        });
                                        // Reload data table
                                        table.ajax.reload(null, false);
                                    }
                                },
                                error: function(xhr) {
                                    Swal.fire(
                                        'Gagal!',
                                        'Terjadi kesalahan saat menghapus data.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                };
            });
        </script>
    @endpush
</x-app-layout>
