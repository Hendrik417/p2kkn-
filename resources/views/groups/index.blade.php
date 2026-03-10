<x-app-layout>

<div x-data="{ open: false }" class="flex h-screen bg-gray-100">

    @include('components.sidebar')

    <div x-show="open" @click="open=false"
        class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

    <main class="flex-1 overflow-y-auto">

        @include('components.header')

        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-xl font-bold">Data Groups</h1>

                    <a href="{{ route('groups.create') }}"
                       class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded">
                        Tambah Group
                    </a>
                </div>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white p-6 rounded-lg shadow">

                    <table class="w-full border border-gray-200">

                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-2 border">ID</th>
                                <th class="p-2 border">Period</th>
                                <th class="p-2 border">Group Name</th>
                                <th class="p-2 border">Village</th>
                                <th class="p-2 border">District</th>
                                <th class="p-2 border">Regency</th>
                                <th class="p-2 border">Supervisor</th>
                                <th class="p-2 border">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($groups as $group)

                        <tr>
                            <td class="p-2 border">{{ $group->id_groups }}</td>
                            <td class="p-2 border">{{ $group->periods }}</td>
                            <td class="p-2 border">{{ $group->groups_names }}</td>
                            <td class="p-2 border">{{ $group->villages }}</td>
                            <td class="p-2 border">{{ $group->districts }}</td>
                            <td class="p-2 border">{{ $group->regency }}</td>
                            <td class="p-2 border">{{ $group->survising_lectures }}</td>

                            <td class="p-2 border flex gap-2">

                                <a href="{{ route('groups.edit',$group->id_groups) }}"
                                   class="bg-blue-500 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('groups.destroy',$group->id_groups) }}"
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
