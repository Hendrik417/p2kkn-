<x-app-layout>

<div x-data="{ open: false }" class="flex h-screen bg-gray-100">

    @include('components.sidebar')

    <div x-show="open" @click="open=false"
        class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

    <main class="flex-1 overflow-y-auto">

        @include('components.header')

        <div class="py-12">

            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

                <h1 class="text-xl font-bold mb-6">
                    Tambah Group
                </h1>

                @if ($errors->any())
                <div class="mb-5">
                    <div class="bg-red-500 text-white px-4 py-2">
                        Terdapat kesalahan
                    </div>

                    <div class="bg-red-100 p-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <form action="{{ route('groups.store') }}"
                      method="POST"
                      class="bg-white p-6 rounded-lg shadow">

                    @csrf

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Period</label>
                        <input type="text" name="periods"
                               value="{{ old('periods') }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Group Name</label>
                        <input type="text" name="groups_names"
                               value="{{ old('groups_names') }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Village</label>
                        <input type="text" name="villages"
                               value="{{ old('villages') }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">District</label>
                        <input type="text" name="districts"
                               value="{{ old('districts') }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Regency</label>
                        <input type="text" name="regency"
                               value="{{ old('regency') }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-bold mb-2">Supervising Lecturer</label>
                        <input type="text" name="survising_lectures"
                               value="{{ old('survising_lectures') }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="flex gap-2">

                        <button
                            class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded">
                            Simpan
                        </button>

                        <a href="{{ route('groups.index') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded">
                           Kembali
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </main>

</div>

</x-app-layout>
