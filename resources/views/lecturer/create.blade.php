<x-app-layout>
<div x-data="{ open: false }" class="flex h-screen bg-gray-100">

    @include('components.sidebar')

    <div x-show="open" @click="open=false"
        class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden"></div>

<main class="flex-1 overflow-y-auto">

@include('components.header')

<div class="py-12">

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<nav class="flex items-center text-sm text-gray-600 space-x-2 mb-7">
<a href="{{ route('dashboard') }}" class="flex items-center hover:text-green-600">
<i data-lucide="home" class="w-4 h-4 mr-1"></i> Home
</a>
<span>›</span>
<span class="text-gray-500">Lecturer</span>
<span>›</span>
<span class="text-gray-500">Tambah</span>
</nav>

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

<form action="{{ route('lecturer.store') }}" method="POST"
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
<label class="block text-gray-700 font-bold mb-2">Study Programs</label>
<input type="text" name="study_programs"
value="{{ old('study_programs') }}"
class="block w-full border border-gray-300 rounded-lg py-2 px-4">
</div>

<div class="mb-4">
<label class="block text-gray-700 font-bold mb-2">Number of Groups</label>
<input type="number" name="number_of_groups"
value="{{ old('number_of_groups') }}"
class="block w-full border border-gray-300 rounded-lg py-2 px-4">
</div>

<div class="mb-4">
<label class="block text-gray-700 font-bold mb-2">Location</label>
<input type="text" name="locations"
value="{{ old('locations') }}"
class="block w-full border border-gray-300 rounded-lg py-2 px-4">
</div>

<div class="flex space-x-2">

<button type="submit"
class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow">
Simpan
</button>

<a href="{{ route('lecturer.index') }}"
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
