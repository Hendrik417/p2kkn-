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
            const kknLocations = [{
                    lat: -3.0234,
                    lng: 118.9123,
                    title: "KKN Desa A",
                    mhs: 12
                },
                {
                    lat: -3.1500,
                    lng: 118.9500,
                    title: "KKN Desa B",
                    mhs: 10
                },
                {
                    lat: -3.2000,
                    lng: 119.0000,
                    title: "KKN Kelurahan C",
                    mhs: 15
                }
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
