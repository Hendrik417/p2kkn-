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
                        Home
                    </a>
                    <span>›</span>
                    <span class="text-gray-500">Student</span>
                </nav>

                <div class="bg-white p-6 rounded-lg shadow-md">

                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-xl font-bold">Data Student</h1>

                        <a href="{{ route('student.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white px-4 py-2 rounded">
                            Tambah Student
                        </a>
                    </div>

                    <table id="studentTable" class="w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-2">ID</th>
                                <th class="p-2">Username</th>
                                <th class="p-2">Email</th>
                                <th class="p-2">Group</th>
                                <th class="p-2">Faculty</th>
                                <th class="p-2">Batch</th>
                                <th class="p-2">Location</th>
                                <th class="p-2">Status</th>
                                <th class="p-2">Action</th>
                            </tr>
                        </thead>
                    </table>

                </div>

            </div>

        </div>

    </main>

</div>


<script>
$(document).ready(function(){

    $('#studentTable').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{ route('student.index') }}",

        columns:[
            {data:'id_students'},
            {data:'username'},
            {data:'email'},
            {data:'groups'},
            {data:'faculties'},
            {data:'bacth'},
            {data:'locations'},
            {data:'status'},
            {data:'action', orderable:false, searchable:false}
        ]

    });

});
</script>

</x-app-layout>
