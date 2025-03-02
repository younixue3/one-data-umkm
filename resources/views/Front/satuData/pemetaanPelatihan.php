@extends('Front.master')

@section('title', 'Industri - SatuData')

@section('content')
<div class="min-h-screen bg-gray-100">
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-xl font-bold">SatuData</h1>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="/" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium border-transparent hover:border-gray-300 text-gray-500 hover:text-gray-700">Beranda</a>
                        <a href="/satu-data" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium border-transparent hover:border-gray-300 text-gray-500 hover:text-gray-700">Industri</a>
                        <a href="/satu-data/perdagangan" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium border-transparent hover:border-gray-300 text-gray-500 hover:text-gray-700">Perdagangan</a>
                        <a href="/satu-data/koperasi-ukm" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium border-transparent hover:border-gray-300 text-gray-500 hover:text-gray-700">Koperasi dan UKM</a>
                        <a href="/satu-data/pelatihan" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium border-transparent hover:border-gray-300 text-gray-500 hover:text-gray-700">Pelatihan</a>
                        <a href="/satu-data/pemetaan-pelatihan" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium border-transparent hover:border-gray-300 text-gray-500 hover:text-gray-700">Pemetaan Pelatihan</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="max-w-7xl mx-auto">
            <div class="px-4 sm:px-0">
                <div class="container mx-auto px-4 py-6">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h6 class="text-lg font-semibold text-gray-800">Peta Industri - Satu Data</h6>
                        </div>
                        <div class="p-6">
                            <div class="flex flex-wrap gap-4 mb-6">
                                <div class="w-full md:w-1/3">
                                    <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-1">Kabupaten/Kota</label>
                                    <select id="kabupaten" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                        <option value="all">Semua Kabupaten/Kota</option>
                                        @foreach($kabupatenList as $kabupaten)
                                            <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full md:w-1/3 flex items-end">
                                    <button id="filterBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md mr-2 transition duration-200">Filter</button>
                                    <button id="resetBtn" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition duration-200">Reset</button>
                                </div>
                            </div>
                            <div id="map" class="w-full h-96 rounded-lg border border-gray-200"></div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <div class="border-b border-gray-200 px-4 py-3">
                                        <h6 class="text-center text-gray-800 font-medium">Jumlah IKM Berdasarkan Kabupaten/Kota</h6>
                                    </div>
                                    <div class="p-4">
                                        <canvas id="verticalBarChart" height="300"></canvas>
                                    </div>
                                </div>
                                
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <div class="border-b border-gray-200 px-4 py-3">
                                        <h6 class="text-center text-gray-800 font-medium">Jumlah IKM Berdasarkan Jenis Usahanya</h6>
                                    </div>
                                    <div class="p-4">
                                        <canvas id="lineChart" height="300"></canvas>
                                    </div>
                                </div>
                                
                                <div class="col-span-1 md:col-span-2 bg-white rounded-lg shadow-md overflow-hidden">
                                    <div class="border-b border-gray-200 px-4 py-3">
                                        <h6 class="text-center text-gray-800 font-medium">UKM Data Table</h6>
                                    </div>
                                    <div class="p-4">
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">URAIAN</th>
                                                        <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">2020</th>
                                                        <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">2021</th>
                                                        <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">2022</th>
                                                        <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">2023</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    <tr>
                                                        <td class="px-3 py-2 text-xs text-gray-700">Nilai Investasi Industri Kecil</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">Rp2,957,432,390.00</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">Rp2,957,432,390.00</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">Rp306,019,965,000.00</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">-</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-3 py-2 text-xs text-gray-700">Penyerapan Tenaga Kerja Menurut Jenis Industri</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">30,116</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">30,116</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">28,887</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">-</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-3 py-2 text-xs text-gray-700">Penyerapan Tenaga Kerja Industri Besar</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">16,212</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">16,212</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">19,062</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">-</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-3 py-2 text-xs text-gray-700">Penyerapan Tenaga Kerja Industri Kecil Menengah (IKM)</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">13,904</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">13,904</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">9,825</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">-</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-3 py-2 text-xs text-gray-700">Kontribusi sektor industri terhadap PDRB</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">9.15</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">8.97</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">7.77</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">7.67</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-3 py-2 text-xs text-gray-700">Pertumbuhan industri pengolahan non migas</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">4.84</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">-3.85</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">3.95</td>
                                                        <td class="px-3 py-2 text-xs text-gray-700 text-right">1.67</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<div id="popup" class="ol-popup">
    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
    <div id="popup-content"></div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css">
<style>
    .ol-popup {
        position: absolute;
        background-color: white;
        box-shadow: 0 1px 4px rgba(0,0,0,0.2);
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #cccccc;
        bottom: 12px;
        left: -50px;
        min-width: 280px;
    }
    .ol-popup:after, .ol-popup:before {
        top: 100%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
    }
    .ol-popup:after {
        border-top-color: white;
        border-width: 10px;
        left: 48px;
        margin-left: -10px;
    }
    .ol-popup:before {
        border-top-color: #cccccc;
        border-width: 11px;
        left: 48px;
        margin-left: -11px;
    }
    .ol-popup-closer {
        text-decoration: none;
        position: absolute;
        top: 2px;
        right: 8px;
    }
    .ol-popup-closer:after {
        content: "✖";
    }
</style>

<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Kabupaten coordinates
        const kabupatenCoords = [
            { id: '366', name: 'KABUPATEN BULUNGAN', coords: [117.0794, 2.904] },
            { id: '367', name: 'KABUPATEN MALINAU', coords: [116.6388, 3.5845] },
            { id: '368', name: 'KABUPATEN NUNUKAN', coords: [117.6467, 4.1357] },
            { id: '369', name: 'KABUPATEN TANA TIDUNG', coords: [117.2502, 3.5519] },
            { id: '370', name: 'KOTA TARAKAN', coords: [117.6333, 3.3] }
        ];

        // Initialize the map
        const vectorSource = new ol.source.Vector();
        
        // Add features for each kabupaten
        kabupatenCoords.forEach(kab => {
            const feature = new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat(kab.coords)),
                name: kab.name,
                id: kab.id
            });
            vectorSource.addFeature(feature);
        });

        // Create vector layer with style
        const vectorLayer = new ol.layer.Vector({
            source: vectorSource,
            style: function(feature) {
                return new ol.style.Style({
                    image: new ol.style.Circle({
                        radius: 8,
                        fill: new ol.style.Fill({ color: '#3b82f6' }),
                        stroke: new ol.style.Stroke({ color: '#ffffff', width: 2 })
                    })
                });
            }
        });

        // Initialize map
        const map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                }),
                vectorLayer
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([117.0794, 3.3333]), // Center on Kalimantan Utara
                zoom: 8
            })
        });

        // Popup overlay
        const container = document.getElementById('popup');
        const content = document.getElementById('popup-content');
        const closer = document.getElementById('popup-closer');

        const overlay = new ol.Overlay({
            element: container,
            autoPan: true,
            autoPanAnimation: {
                duration: 250
            }
        });

        map.addOverlay(overlay);

        closer.onclick = function() {
            overlay.setPosition(undefined);
            closer.blur();
            return false;
        };

        // Display popup on click
        map.on('click', function(evt) {
            const feature = map.forEachFeatureAtPixel(evt.pixel, function(feature) {
                return feature;
            });
            
            if (feature) {
                const coordinates = feature.getGeometry().getCoordinates();
                const name = feature.get('name');
                const id = feature.get('id');
                
                content.innerHTML = `
                    <h5>${name}</h5>
                    <p>ID: ${id}</p>
                `;
                
                overlay.setPosition(coordinates);
                
                // Update selected kabupaten
                document.getElementById('kabupaten').value = id;
            } else {
                overlay.setPosition(undefined);
            }
        });

        // Change cursor on hover
        map.on('pointermove', function(evt) {
            const pixel = map.getEventPixel(evt.originalEvent);
            const hit = map.hasFeatureAtPixel(pixel);
            map.getTargetElement().style.cursor = hit ? 'pointer' : '';
        });

        // Filter button click handler
        document.getElementById('filterBtn').addEventListener('click', function() {
            const selectedKabupaten = document.getElementById('kabupaten').value;
            // Implement filtering logic here
            console.log('Selected Kabupaten:', selectedKabupaten);
        });

        // Reset button click handler
        document.getElementById('resetBtn').addEventListener('click', function() {
            document.getElementById('kabupaten').value = 'all';
            // Reset map view
            map.getView().setCenter(ol.proj.fromLonLat([117.0794, 3.3333]));
            map.getView().setZoom(8);
        });

        // Chart data
        const verticalBarData = [
            { name: 'Semua Kabupaten/Kota', '2020': 32, '2021': 35, '2022': 40, '2023': 45 },
            { name: 'KABUPATEN BULUNGAN', '2020': 12, '2021': 15, '2022': 15, '2023': 20 },
            { name: 'KABUPATEN MALINAU', '2020': 1, '2021': 1, '2022': 1, '2023': 1 },
            { name: 'KABUPATEN NUNUKAN', '2020': 10, '2021': 10, '2022': 10, '2023': 11 },
            { name: 'KABUPATEN TANA TIDUNG', '2020': 1, '2021': 1, '2022': 1, '2023': 1 },
            { name: 'KOTA TARAKAN', '2020': 8, '2021': 8, '2022': 8, '2023': 12 }
        ];

        const industryData = [
            { name: 'Industri Pengolahan Makanan', '2020': 1103, '2021': 1183, '2022': 1183, '2023': 1272 },
            { name: 'Industri Pengolahan Minuman', '2020': 194, '2021': 340, '2022': 340, '2023': 372 },
            { name: 'Industri Pengolahan Kayu', '2020': 409, '2021': 460, '2022': 460, '2023': 466 },
            { name: 'Indsutri Pengolahan anyaman rotan', '2020': 333, '2021': 391, '2022': 391, '2023': 423 },
            { name: 'Indsutri Pengolahan anyaman bambu', '2020': 96, '2021': 99, '2022': 99, '2023': 101 }
        ];

        // Create vertical bar chart
        const verticalBarCtx = document.getElementById('verticalBarChart').getContext('2d');
        new Chart(verticalBarCtx, {
            type: 'bar',
            data: {
                labels: verticalBarData.map(item => item.name),
                datasets: [
                    { label: '2020', data: verticalBarData.map(item => item['2020']), backgroundColor: '#8884d8' },
                    { label: '2021', data: verticalBarData.map(item => item['2021']), backgroundColor: '#82ca9d' },
                    { label: '2022', data: verticalBarData.map(item => item['2022']), backgroundColor: '#ffc658' },
                    { label: '2023', data: verticalBarData.map(item => item['2023']), backgroundColor: '#ff7300' }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: { stacked: false },
                    y: { beginAtZero: true }
                }
            }
        });

        // Create line chart
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: industryData.map(item => item.name),
                datasets: [
                    { label: '2020', data: industryData.map(item => item['2020']), borderColor: '#8884d8', fill: false },
                    { label: '2021', data: industryData.map(item => item['2021']), borderColor: '#82ca9d', fill: false },
                    { label: '2022', data: industryData.map(item => item['2022']), borderColor: '#ffc658', fill: false },
                    { label: '2023', data: industryData.map(item => item['2023']), borderColor: '#ff7300', fill: false }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    });
</script>
@endsection