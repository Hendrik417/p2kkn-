{{-- <x-app-layout>
    <div x-data="{ open: false }" class="flex h-screen bg-gray-50 overflow-hidden">

        @include('components.sidebar')

        <div x-show="open"
             x-transition.opacity
             @click="open = false"
             class="fixed inset-0 bg-gray-900/50 z-20 lg:hidden">
        </div>

        <x-slot name="style">
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
            <style>
                #map { width: 100%; height: 500px; border-radius: 12px; overflow: hidden; }
                .leaflet-popup-content-wrapper { border-radius: 8px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); }
            </style>
        </x-slot>

        <div class="flex-1 flex flex-col overflow-hidden">

            @include('components.header')

            <main class="flex-1 overflow-y-auto">
                <div class="py-8">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                        @include('components.breadcrumb', ['title' => 'Peta Persebaran KKN'])

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            </div>

                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between mb-4 px-2">
                                <h2 class="text-lg font-bold text-gray-800">Visualisasi Persebaran Lokasi KKN</h2>
                                <span class="text-xs text-gray-400 italic">*Data diperbarui secara real-time</span>
                            </div>
                            <div id="map"></div>
                        </div>
                    </div>
                </div>

                @include('components.footer')
            </main>
        </div>
    </div>

    <x-slot name="script">
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            lucide.createIcons();
            // ... (rest of your map script)
        </script>
    </x-slot>
</x-app-layout> --}}
<x-layout.app>
    {{-- Slot CSS untuk Leaflet --}}
    <x-slot name="style">
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <style>
            #map {
                width: 100%;
                height: 500px;
                border-radius: 12px;
                overflow: hidden;
                z-index: 1;
                /* Pastikan tidak menutupi dropdown */
            }

            .leaflet-popup-content-wrapper {
                border-radius: 8px;
                box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            }
        </style>
    </x-slot>

    <div x-data="{ open: false }" class="flex h-screen bg-gray-50 overflow-hidden">

        {{-- Perubahan: Mengarah ke layouts.navigation sesuai screenshot folder kamu --}}
        @include('layouts.navigation')

        {{-- Overlay untuk mobile sidebar --}}
        <div x-show="open" x-transition.opacity @click="open = false" class="fixed inset-0 bg-gray-900/50 z-20 lg:hidden">
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">

            {{-- Perubahan: Mengarah ke layouts.header --}}
            @include('layouts.header')

            <main class="flex-1 overflow-y-auto">
                <div class="py-8">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                        {{-- Perubahan: Mengarah ke layouts.breadcrumb --}}
                        @include('layouts.breadcrumb', ['title' => 'Peta Persebaran KKN'])

                        {{-- Widget Statistik (Bisa diisi jika perlu) --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        </div>

                        {{-- Card Map --}}
                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between mb-4 px-2">
                                <h2 class="text-lg font-bold text-gray-800">Visualisasi Persebaran Lokasi KKN</h2>
                                <span class="text-xs text-gray-400 italic">*Data diperbarui secara real-time</span>
                            </div>

                            {{-- Wadah Peta --}}
                            <div id="map"></div>
                        </div>
                    </div>
                </div>

                {{-- Sertakan footer jika ada file layouts/footer.blade.php --}}
                {{-- @include('layouts.footer') --}}
            </main>
        </div>
    </div>

    {{-- Slot Script untuk Logic Leaflet --}}
    <x-slot name="script">
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi Peta (Koordinat Sulbar/Majene sebagai contoh)
                var map = L.map('map').setView([-2.67, 118.88], 9);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);

                // Contoh Marker
                L.marker([-2.67, 118.88]).addTo(map)
                    .bindPopup('<b>Pusat Koordinasi P2KKN</b><br>Universitas Sulawesi Barat.')
                    .openPopup();
            });
        </script>
    </x-slot>
</x-layout.app>
