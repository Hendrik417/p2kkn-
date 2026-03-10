<x-app-layout>

<div x-data="{ open: false }" class="flex h-screen bg-gray-100">

    @include('components.sidebar')

    <div x-show="open" @click="open=false"
        class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

    <main class="flex-1 overflow-y-auto">

        @include('components.header')

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Title -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-xl font-bold">Data FAQs</h1>

                    <a href="{{ route('faqs.create') }}"
                        class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded">
                        Tambah FAQ
                    </a>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Table -->
                <div class="bg-white p-6 rounded-lg shadow">

                    <table class="w-full border border-gray-200">

                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-2 border">ID</th>
                                <th class="p-2 border">Questions</th>
                                <th class="p-2 border">Answers</th>
                                <th class="p-2 border">Published</th>
                                <th class="p-2 border">Views</th>
                                <th class="p-2 border">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($faqs as $faq)

                        <tr>
                            <td class="p-2 border">{{ $faq->id_faqs }}</td>
                            <td class="p-2 border">{{ $faq->questions }}</td>
                            <td class="p-2 border">{{ $faq->answers }}</td>

                            <td class="p-2 border">
                                {{ $faq->is_published ? 'Published' : 'Draft' }}
                            </td>

                            <td class="p-2 border">
                                {{ $faq->view_count }}
                            </td>

                            <td class="p-2 border flex gap-2">

                                <a href="{{ route('faqs.edit',$faq->id_faqs) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('faqs.destroy',$faq->id_faqs) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-500 text-white px-3 py-1 rounded">
                                        Delete
                                    </button>

                                </form>

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

</x-app-layout>
