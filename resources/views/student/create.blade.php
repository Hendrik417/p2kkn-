<x-app-layout>

<div x-data="{ open: false }" class="flex h-screen bg-gray-100">

    @include('components.sidebar')

    <div x-show="open" @click="open=false"
        class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

    <main class="flex-1 overflow-y-auto">

        @include('components.header')

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Breadcrumb -->
                <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-7">
                    <a href="{{ route('dashboard') }}" class="flex items-center hover:text-green-600">
                        <i data-lucide="home" class="w-4 h-4 mr-1"></i> Home
                    </a>
                    <span>›</span>
                    <span class="text-gray-500">Student</span>
                    <span>›</span>
                    <span class="text-gray-500">Tambah</span>
                </nav>

                <!-- Error -->
                @if ($errors->any())
                <div class="mb-5">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Terdapat kesalahan
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- Form -->
                <form action="{{ route('student.store') }}" method="POST"
                    class="bg-white p-6 rounded-lg shadow-md">

                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Username</label>
                        <input type="text" name="username"
                            value="{{ old('username') }}"
                            class="block w-full border border-gray-300 rounded-lg py-2 px-4">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Email</label>
                        <input type="email" name="email"
                            value="{{ old('email') }}"
                            class="block w-full border border-gray-300 rounded-lg py-2 px-4">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Groups</label>
                        <input type="text" name="groups"
                            value="{{ old('groups') }}"
                            class="block w-full border border-gray-300 rounded-lg py-2 px-4">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Faculties</label>
                        <input type="text" name="faculties"
                            value="{{ old('faculties') }}"
                            class="block w-full border border-gray-300 rounded-lg py-2 px-4">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Batch</label>
                        <input type="text" name="bacth"
                            value="{{ old('bacth') }}"
                            class="block w-full border border-gray-300 rounded-lg py-2 px-4">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Location</label>
                        <input type="text" name="locations"
                            value="{{ old('locations') }}"
                            class="block w-full border border-gray-300 rounded-lg py-2 px-4">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Status</label>
                        <select name="status"
                            class="block w-full border border-gray-300 rounded-lg py-2 px-4">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="flex space-x-2">

                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow">
                            Simpan
                        </button>

                        <a href="{{ route('student.index') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded shadow">
                            Kembali
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </main>
</div>

</x-app-layout>
