<x-app-layout>
    <div x-data="{ open: false }" class="flex h-screen bg-gray-50">

        @include('components.sidebar')

        <div x-show="open"
             x-transition:enter="transition opacity-ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition opacity-ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="open=false"
             class="fixed inset-0 bg-gray-900/50 z-20 lg:hidden"></div>

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

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm flex items-center justify-between hover:shadow-md transition group">
                            <div>
                                <div class="text-gray-400 text-xs uppercase tracking-wider font-semibold">Jumlah Kecamatan</div>
                                <div class="text-3xl font-bold text-gray-800 mt-1">#</div>
                            </div>
                            <div class="p-3 bg-emerald-50 rounded-lg group-hover:bg-emerald-100 transition text-emerald-600">
                                <i data-lucide="map" class="w-8 h-8"></i>
                            </div>
                        </div>

                        <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm flex items-center justify-between hover:shadow-md transition group">
                            <div>
                                <div class="text-gray-400 text-xs uppercase tracking-wider font-semibold">Jumlah Desa</div>
                                <div class="text-3xl font-bold text-gray-800 mt-1">#</div>
                            </div>
                            <div class="p-3 bg-sky-50 rounded-lg group-hover:bg-sky-100 transition text-sky-600">
                                <i data-lucide="home" class="w-8 h-8"></i>
                            </div>
                        </div>

                        <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm flex items-center justify-between hover:shadow-md transition group">
                            <div>
                                <div class="text-gray-400 text-xs uppercase tracking-wider font-semibold">Jumlah Kelurahan</div>
                                <div class="text-3xl font-bold text-gray-800 mt-1">#</div>
                            </div>
                            <div class="p-3 bg-indigo-50 rounded-lg group-hover:bg-indigo-100 transition text-indigo-600">
                                <i data-lucide="building-2" class="w-8 h-8"></i>
                            </div>
                        </div>

                        <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm flex items-center justify-between hover:shadow-md transition group">
                            <div>
                                <div class="text-gray-400 text-xs uppercase tracking-wider font-semibold">Total Lokasi KKN</div>
                                <div class="text-3xl font-bold text-gray-800 mt-1">#</div>
                            </div>
                            <div class="p-3 bg-amber-50 rounded-lg group-hover:bg-amber-100 transition text-amber-600">
                                <i data-lucide="map-pin" class="w-8 h-8"></i>
                            </div>
                        </div>
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
        </main>
    </div>

    <x-slot name="script">
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script src="https://unpkg.com/lucide@latest"></script>

        <script>
            // Initialize Lucide Icons
            lucide.createIcons();

            // Initialize Map
            // Koordinat default (contoh: Majene/Sulbar)
            const map = L.map('map').setView([-3.1492, 118.9669], 10);

            // Add Tile Layer (OpenStreetMap)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Contoh Data Persebaran (Bisa dikirim dari Controller)
            const kknLocations = [
                { lat: -3.0234, lng: 118.9123, title: "KKN Desa A", mhs: 12 },
                { lat: -3.1500, lng: 118.9500, title: "KKN Desa B", mhs: 10 },
                { lat: -3.2000, lng: 119.0000, title: "KKN Kelurahan C", mhs: 15 }
            ];

            // Tambahkan Marker ke Peta
            kknLocations.forEach(loc => {
                L.marker([loc.lat, loc.lng])
                    .addTo(map)
                    .bindPopup(`
                        <div class="p-1">
                            <h3 class="font-bold text-indigo-600">${loc.title}</h3>
                            <p class="text-xs text-gray-600">Jumlah Mahasiswa: ${loc.mhs}</p>
                            <button class="mt-2 text-[10px] bg-indigo-500 text-white px-2 py-1 rounded">Lihat Detail</button>
                        </div>
                    `);
            });
        </script>
    </x-slot>
</x-app-layout>
