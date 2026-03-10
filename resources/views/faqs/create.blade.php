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
                    Tambah FAQ
                </h1>

                <!-- Error -->
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

                <form action="{{ route('faqs.store') }}"
                      method="POST"
                      class="bg-white p-6 rounded-lg shadow">

                    @csrf

                    <!-- Question -->
                    <div class="mb-4">

                        <label class="block font-bold mb-2">
                            Question
                        </label>

                        <input type="text"
                               name="questions"
                               value="{{ old('questions') }}"
                               class="w-full border rounded px-3 py-2">

                    </div>

                    <!-- Answer -->
                    <div class="mb-4">

                        <label class="block font-bold mb-2">
                            Answer
                        </label>

                        <textarea name="answers"
                                  rows="4"
                                  class="w-full border rounded px-3 py-2">{{ old('answers') }}</textarea>

                    </div>

                    <!-- Status -->
                    <div class="mb-4">

                        <label class="block font-bold mb-2">
                            Status
                        </label>

                        <select name="is_published"
                                class="w-full border rounded px-3 py-2">

                            <option value="1">Published</option>
                            <option value="0">Draft</option>

                        </select>

                    </div>

                    <!-- View Count -->
                    <div class="mb-4">

                        <label class="block font-bold mb-2">
                            View Count
                        </label>

                        <input type="number"
                               name="view_count"
                               value="0"
                               class="w-full border rounded px-3 py-2">

                    </div>

                    <div class="flex gap-2">

                        <button
                            class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded">

                            Simpan

                        </button>

                        <a href="{{ route('faqs.index') }}"
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
