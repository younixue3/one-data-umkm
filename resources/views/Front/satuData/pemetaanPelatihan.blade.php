@extends('Front.master')

@section('title', 'Pemetaan Pelatihan - SatuData')

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
                        <a href="/satu-data/pemetaan-pelatihan" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium border-indigo-500 text-indigo-600">Pemetaan Pelatihan</a>
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
                            <h6 class="text-lg font-semibold text-gray-800">Pemetaan Pelatihan - Satu Data</h6>
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
                                        <h6 class="text-center text-gray-800 font-medium">Distribusi Pelatihan per Kabupaten</h6>
                                    </div>
                                    <div class="p-4">
                                        <canvas id="pieChart1" height="300"></canvas>
                                    </div>
                                </div>
                                
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <div class="border-b border-gray-200 px-4 py-3">
                                        <h6 class="text-center text-gray-800 font-medium">Distribusi Pelatihan per Kategori</h6>
                                    </div>
                                    <div class="p-4">
                                        <canvas id="pieChart2" height="300"></canvas>
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

        // Initialize map components
        const vectorSource = new ol.source.Vector();
        
        kabupatenCoords.forEach(kab => {
            const feature = new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat(kab.coords)),
                name: kab.name,
                id: kab.id
            });
            vectorSource.addFeature(feature);
        });

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

        const map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                }),
                vectorLayer
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([117.0794, 3.3333]),
                zoom: 8
            })
        });

        // Popup handling
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

        // Function to update charts based on selected kabupaten
        function updateCharts(selectedKabupatenId) {
            const pelatihanByKategori = @json($pelatihanByKategori);
            const kabupatenLabels = [];
            const kabupatenData = [];
            const kategoriLabels = [];
            const kategoriData = [];

            pelatihanByKategori.forEach(item => {
                if (selectedKabupatenId === 'all' || item.items.some(training => training.kabupaten_id === selectedKabupatenId)) {
                    if (item.items && item.items.length > 0) {
                        item.items.forEach(training => {
                            if (selectedKabupatenId === 'all' || training.kabupaten_id === selectedKabupatenId) {
                                if (training.kabupaten) {
                                    kabupatenLabels.push(training.kabupaten);
                                    kabupatenData.push(training.peserta || 0);
                                }
                            }
                        });
                    }
                    
                    if (item.kategori && !kategoriLabels.includes(item.kategori)) {
                        kategoriLabels.push(item.kategori);
                        const totalPeserta = item.items ? 
                            item.items.reduce((sum, training) => {
                                if (selectedKabupatenId === 'all' || training.kabupaten_id === selectedKabupatenId) {
                                    return sum + (training.peserta || 0);
                                }
                                return sum;
                            }, 0) : 0;
                        kategoriData.push(totalPeserta);
                    }
                }
            });

            // Update pie charts
            pieChart1.data.labels = kabupatenLabels;
            pieChart1.data.datasets[0].data = kabupatenData;
            pieChart1.update();

            pieChart2.data.labels = kategoriLabels;
            pieChart2.data.datasets[0].data = kategoriData;
            pieChart2.update();
        }

        map.on('click', function(evt) {
            const feature = map.forEachFeatureAtPixel(evt.pixel, function(feature) {
                return feature;
            });
            
            if (feature) {
                const coordinates = feature.getGeometry().getCoordinates();
                const name = feature.get('name');
                const id = feature.get('id');
                
                // Get training data for the selected kabupaten
                const pelatihanByKategori = @json($pelatihanByKategori);
                const kabupatenData = pelatihanByKategori.find(item => 
                    item.items.some(training => training.kabupaten === name)
                );
                
                let totalPelatihan = 0;
                if (kabupatenData) {
                    totalPelatihan = kabupatenData.items.filter(item => item.kabupaten === name).length;
                }
                
                content.innerHTML = `
                    <h5 class="font-semibold">${name}</h5>
                    <p class="mt-2">Total Pelatihan: ${totalPelatihan}</p>
                    <p>Kategori: ${kabupatenData ? kabupatenData.kategori : '-'}</p>
                `;
                
                overlay.setPosition(coordinates);
                document.getElementById('kabupaten').value = id;
                updateCharts(id);
            } else {
                overlay.setPosition(undefined);
            }
        });

        map.on('pointermove', function(evt) {
            const pixel = map.getEventPixel(evt.originalEvent);
            const hit = map.hasFeatureAtPixel(pixel);
            map.getTargetElement().style.cursor = hit ? 'pointer' : '';
        });

        // Button handlers
        document.getElementById('filterBtn').addEventListener('click', function() {
            const selectedKabupaten = document.getElementById('kabupaten').value;
            updateCharts(selectedKabupaten);
            
            if (selectedKabupaten !== 'all') {
                const selectedFeature = vectorSource.getFeatures().find(f => f.get('id') === selectedKabupaten);
                if (selectedFeature) {
                    const coords = selectedFeature.getGeometry().getCoordinates();
                    map.getView().setCenter(coords);
                    map.getView().setZoom(10);
                }
            }
        });

        document.getElementById('resetBtn').addEventListener('click', function() {
            document.getElementById('kabupaten').value = 'all';
            map.getView().setCenter(ol.proj.fromLonLat([117.0794, 3.3333]));
            map.getView().setZoom(8);
            updateCharts('all');
            overlay.setPosition(undefined);
        });

        // Initial chart setup
        const pelatihanByKategori = @json($pelatihanByKategori);
        const totalPelatihan = @json($totalPelatihan);
        
        // Create initial pie charts
        const pieChart1 = new Chart(document.getElementById('pieChart1').getContext('2d'), {
            type: 'pie',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });

        const pieChart2 = new Chart(document.getElementById('pieChart2').getContext('2d'), {
            type: 'pie',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });

        // Initialize charts with all data
        updateCharts('all');
    });
</script>
@endsection