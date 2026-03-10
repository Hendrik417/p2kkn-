<x-app-layout>

<div x-data="{ open: false }" class="flex h-screen bg-gray-100">

    @include('components.sidebar')

    <div x-show="open" @click="open=false"
        class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

    <main class="flex-1 overflow-y-auto">

        @include('components.header')

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-xl font-bold">Data Periods</h1>

                    <a href="{{ route('periods.create') }}"
                       class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded">
                        Tambah Period
                    </a>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Table -->
                <div class="bg-white shadow rounded-lg p-6">

                    <table class="w-full border border-gray-200">

                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-2 border">ID</th>
                                <th class="p-2 border">Periods</th>
                                <th class="p-2 border">Active Dates</th>
                                <th class="p-2 border">Status</th>
                                <th class="p-2 border">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($periods as $period)

                        <tr>
                            <td class="p-2 border">
                                {{ $period->id_periods }}
                            </td>

                            <td class="p-2 border">
                                {{ $period->periods }}
                            </td>

                            <td class="p-2 border">
                                {{ $period->active_dates }}
                            </td>

                            <td class="p-2 border">
                                {{ $period->status ? 'Active' : 'Inactive' }}
                            </td>

                            <td class="p-2 border flex gap-2">

                                <a href="{{ route('periods.edit',$period->id_periods) }}"
                                   class="bg-blue-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('periods.destroy',$period->id_periods) }}"
                                      method="POST">

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
