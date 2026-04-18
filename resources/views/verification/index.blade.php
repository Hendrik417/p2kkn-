    {{-- <x-app-layout>

        <div x-data="{ open: false }" class="flex h-screen bg-gray-100">

            @include('components.sidebar')

            <div x-show="open" @click="open=false" class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

            <main class="flex-1 overflow-y-auto">

                @include('components.header')

                <div class="py-12">

                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                        <!-- Breadcrumb -->
                        <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-7">
                            <a href="{{ route('dashboard') }}" class="hover:text-green-600">
                                Home
                            </a>
                            <span>›</span>
                            <span class="text-gray-500">Verification</span>
                        </nav>

                        <div class="bg-white p-6 rounded-lg shadow-md">

                            <div class="flex justify-between items-center mb-4">
                                <h1 class="text-xl font-bold">Verifikasi Laporan</h1>
                            </div>

                            <table id="verificationTable" class="w-full border border-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-2">Nama File</th>
                                        <th class="p-2">Tanggal Upload</th>
                                        <th class="p-2">Jenis</th>
                                        <th class="p-2">Status</th>
                                        <th class="p-2">Catatan</th>
                                        <th class="p-2">Aksi</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>

                    </div>

                </div>

            </main>

        </div>

        @push('scripts')
            <script>
                $(document).ready(function() {

                    $('#verificationTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('verification.index') }}",

                        columns: [{
                                data: 'file_name'
                            },
                            {
                                data: 'tanggal_upload'
                            },
                            {
                                data: 'jenis_laporan'
                            },
                            {
                                data: 'status'
                            },
                            {
                                data: 'catatan'
                            },
                            {
                                data: 'action',
                                orderable: false,
                                searchable: false
                            }
                        ]
                    });

                });

                // APPROVE
                function approve(id) {
                    if (confirm('Approve laporan ini?')) {
                        $.post('/verification/approve/' + id, {
                            _token: '{{ csrf_token() }}'
                        }, function(res) {
                            alert(res.message);
                            $('#verificationTable').DataTable().ajax.reload();
                        });
                    }
                }

                // REJECT
                function reject(id) {
                    let catatan = prompt("Masukkan catatan penolakan:");

                    if (catatan) {
                        $.post('/verification/reject/' + id, {
                            _token: '{{ csrf_token() }}',
                            catatan: catatan
                        }, function(res) {
                            alert(res.message);
                            $('#verificationTable').DataTable().ajax.reload();
                        });
                    }
                }
            </script>
        @endpush

    </x-app-layout> --}}
    <x-app-layout>
        <div x-data="{ open: false }" class="flex h-screen bg-gray-100">
            @include('components.sidebar')

            <div x-show="open" @click="open=false" class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

            <main class="flex-1 overflow-y-auto">
                @include('components.header')

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-7">
                            <a href="{{ route('dashboard') }}" class="hover:text-green-600">Home</a>
                            <span>›</span>
                            <span class="text-gray-500">Verification</span>
                        </nav>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="flex justify-between items-center mb-4">
                                <h1 class="text-xl font-bold">Verifikasi Laporan</h1>
                                <button onclick="openModal()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm transition">
                                    + Tambah Laporan
                                </button>
                            </div>

                            <div class="overflow-x-auto">
                                <table id="verificationTable" class="w-full border border-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="p-2 border">Nama File</th>
                                            <th class="p-2 border">Tanggal Upload</th>
                                            <th class="p-2 border">Jenis</th>
                                            <th class="p-2 border">Status</th>
                                            <th class="p-2 border">Catatan</th>
                                            <th class="p-2 border">Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div id="uploadModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
                    <form id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Upload Laporan Baru</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Jenis Laporan</label>
                                    <select name="jenis_laporan" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                                        <option value="Laporan Mingguan">Laporan Mingguan</option>
                                        <option value="Laporan Akhir">Laporan Akhir</option>
                                        <option value="Program Kerja">Program Kerja</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">File Laporan (PDF/JPG/PNG)</label>
                                    <input type="file" name="file_laporan" required class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                                Submit Data
                            </button>
                            <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                $(document).ready(function() {
                    // Initialize DataTable
                    let table = $('#verificationTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('verification.index') }}",
                        columns: [
                            { data: 'file_name' },
                            { data: 'tanggal_upload' },
                            { data: 'jenis_laporan' },
                            { data: 'status' },
                            { data: 'catatan' },
                            { data: 'action', orderable: false, searchable: false }
                        ]
                    });

                    // Handle Form Submit
                    $('#uploadForm').on('submit', function(e) {
                        e.preventDefault();
                        let formData = new FormData(this);

                        $.ajax({
                            url: "{{ route('verification.store') }}", // Pastikan route ini ada di web.php
                            method: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                if(res.success) {
                                    alert(res.message);
                                    closeModal();
                                    $('#uploadForm')[0].reset();
                                    table.ajax.reload(); // Refresh tabel otomatis
                                }
                            },
                            error: function(err) {
                                alert("Terjadi kesalahan saat upload.");
                            }
                        });
                    });
                });

                function openModal() {
                    $('#uploadModal').removeClass('hidden');
                }

                function closeModal() {
                    $('#uploadModal').addClass('hidden');
                }

                // APPROVE & REJECT tetap sama seperti sebelumnya
                function approve(id) {
                    if (confirm('Approve laporan ini?')) {
                        $.post('/verification/approve/' + id, { _token: '{{ csrf_token() }}' }, function(res) {
                            alert(res.message);
                            $('#verificationTable').DataTable().ajax.reload();
                        });
                    }
                }

                function reject(id) {
                    let catatan = prompt("Masukkan catatan penolakan:");
                    if (catatan) {
                        $.post('/verification/reject/' + id, { _token: '{{ csrf_token() }}', catatan: catatan }, function(res) {
                            alert(res.message);
                            $('#verificationTable').DataTable().ajax.reload();
                        });
                    }
                }
            </script>
        @endpush
    </x-app-layout>
