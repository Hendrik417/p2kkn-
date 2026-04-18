<x-app-layout>
    <div x-data="{ open: false }" class="flex h-screen bg-gray-50">

        @include('components.sidebar')

        <div x-show="open" x-transition:enter="transition opacity-ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition opacity-ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click="open=false" class="fixed inset-0 bg-gray-900/50 z-20 lg:hidden">
        </div>

        <x-slot name="style">
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
            <style>
                #map {
                    width: 100%;
                    height: 500px;
                    border-radius: 12px;
                    overflow: hidden;
                }

                /* Custom popup style agar senada dengan dashboard */
                .leaflet-popup-content-wrapper {
                    border-radius: 8px;
                    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
                }
            </style>
        </x-slot>

        <main class="flex-1 overflow-y-auto">
            @include('components.header')

            <div class="py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <nav class="flex items-center text-sm text-gray-500 space-x-2 mb-6">
                        <a href="{{ route('dashboard') }}" class="flex items-center hover:text-indigo-600 transition">
                            <i data-lucide="home" class="w-4 h-4 mr-1.5"></i> Home
                        </a>
                        <span class="text-gray-300">/</span>
                        <span class="font-medium text-gray-700">Peta Persebaran KKN</span>
                    </nav>

                    @include('dashboard.card')

                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-4 px-2">
                            <h2 class="text-lg font-bold text-gray-800">Visualisasi Persebaran Lokasi KKN</h2>
                            <span class="text-xs text-gray-400 italic">*Data diperbarui secara real-time</span>
                        </div>
                        <div id="map"></div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    @include('dashboard.x-slot')


</x-app-layout>
