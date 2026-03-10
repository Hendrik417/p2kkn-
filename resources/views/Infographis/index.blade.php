<x-app-layout>
    <div x-data="{ open: false }" class="flex h-screen bg-gray-100">

        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Overlay mobile --}}
        <div x-show="open" @click="open=false"
            class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

        {{-- Script DataTables --}}
        <x-slot name="script">
            <script>
                var datatable = $('#crudTable').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{!! url()->current() !!}'
                    },
                    columns: [
                        {
                            data: 'id_infographis',
                            name: 'id_infographis',
                            width: '5%'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'picture',
                            name: 'picture',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'published_date',
                            name: 'published_date'
                        },
                        {
                            data: 'place',
                            name: 'place'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            width: '15%'
                        }
                    ]
                });
            </script>
        </x-slot>

        <main class="flex-1 overflow-y-auto">
            @include('components.header')

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    {{-- Breadcrumb --}}
                    <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-7">
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center hover:text-green-600">
                            <i data-lucide="home" class="w-4 h-4 mr-1"></i> Home
                        </a>
                        <span>#</span>
                        <span class="text-gray-500">Infographis</span>
                    </nav>

                    {{-- Alert --}}
                    @if (session('success'))
                        <div class="mb-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Button Tambah --}}
                    <div class="mb-5">
                        <a href="{{ route('infographis.create') }}"
                            class="bg-Red-400 hover:bg-Red-600 text-white font-bold py-2 px-4 rounded shadow">
                            + Tambah Infographis
                        </a>
                    </div>

                    {{-- Table --}}
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <table id="crudTable" class="display cell-border w-full">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Tanggal Publish</th>
                                        <th>Tempat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</x-app-layout>
