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
                        <a href="/satu-data" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium border-indigo-500 text-indigo-600">Industri</a>
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
        <div class="">
            <div class="px-4 sm:px-0">
                <div class="py-6">
                    <div class="grid grid-cols-5 gap-4">
                        <!-- Filter Panel -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden p-4">
                            <div class="border-b border-gray-200 px-4 py-3">
                                <h6 class="text-gray-800 font-medium">Filter Data Industri</h6>
                            </div>
                            <div class="p-4">
                                <div class="mb-4">
                                    <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-1">Kabupaten/Kota</label>
                                    <select id="kabupaten" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                        <option value="all">Semua Kabupaten/Kota</option>
                                        @foreach($kabupatenList as $kabupaten)
                                            <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex items-end">
                                    <button id="filterBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md mr-2 transition duration-200">Filter</button>
                                    <button id="resetBtn" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition duration-200">Reset</button>
                                </div>
                            </div>
                        </div>

                        <!-- Map -->
                        <div class="bg-white col-span-2 row-span-2 rounded-lg shadow-md overflow-hidden p-4">
                            <div class="border-b border-gray-200 px-4 py-3">
                                <h6 class="text-gray-800 font-medium">Peta Sebaran Industri</h6>
                            </div>
                            <div id="map" class="w-full h-96 rounded-lg border border-gray-200 mt-4"></div>
                        </div>
                            
                        <!-- Charts -->
                        <div class="bg-white col-span-2 row-span-2 rounded-lg shadow-md overflow-hidden">
                                <div class="border-b border-gray-200 px-4 py-3">
                                    <h6 class="text-center text-gray-800 font-medium">Jumlah Industri Kecil Menengah Berdasarkan Kabupaten/Kota</h6>
                                </div>
                                <div class="p-4">
                                    <canvas id="horizontalBarChart" height="300"></canvas>
                                </div>
                            </div>
                            <!-- Vertical Bar Chart -->
                            <div class="bg-white row-span-2 rounded-lg shadow-md overflow-hidden">
                                <div class="border-b border-gray-200 px-4 py-3">
                                    <h6 class="text-center text-gray-800 font-medium">Jumlah Industri Besar Berdasarkan Kabupaten/Kota</h6>
                                </div>
                                <div class="p-4">
                                    <canvas id="verticalBarChart" height="1000"></canvas>
                                </div>
                            </div>
                            
                            <div class="bg-white rounded-lg col-span-2 shadow-md overflow-hidden">
                                <div class="border-b border-gray-200 px-4 py-3">
                                    <h6 class="text-center text-gray-800 font-medium">Jumlah IKM Berdasarkan Jenis Usahanya</h6>
                                </div>
                                <div class="p-4">
                                    <canvas id="lineChart" height="300"></canvas>
                                </div>
                            </div>
                        
                        <!-- Data Table -->
                        <div class="bg-white rounded-lg col-span-2 shadow-md overflow-hidden mt-4">
                            <div class="border-b border-gray-200 px-4 py-3">
                                <h6 class="text-center text-gray-800 font-medium">Data Industri</h6>
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
        const kabupatenCoords = @json($combinedIndustriesByKabupaten);

        // Initialize the map
        const vectorSource = new ol.source.Vector();
        
        // Add features for each kabupaten
        kabupatenCoords.forEach(kab => {
            const feature = new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat(kab.coords)),
                name: kab.name,
                id: kab.id,
                big_industries_count: kab.big_industries_count,
                ikm_count: kab.ikm_count
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
                const big_industries_count = feature.get('big_industries_count');
                const ikm_count = feature.get('ikm_count');
                

                content.innerHTML = `
                    <h5 class="font-bold">${name}</h5>
                    <p class="mt-2">Jumlah Industri: <span class="font-semibold">${big_industries_count}</span></p>
                    <p>Tenaga Kerja: <span class="font-semibold">${ikm_count}</span></p>
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
            console.log('Selected Kabupaten:', selectedKabupaten);
            
            // Memperbarui grafik berdasarkan pilihan
            updateCharts(selectedKabupaten);
        });

        // Reset button click handler
        document.getElementById('resetBtn').addEventListener('click', function() {
            document.getElementById('kabupaten').value = 'all';
            map.getView().setCenter(ol.proj.fromLonLat([117.0794, 3.3333]));
            map.getView().setZoom(8);
            updateCharts('all');
        });

        // Chart data
        const verticalBarData = @json($bigIndustriesByKabupatenYear);
        const horizontalBarData = @json($ukmByKabupatenYear);

        const industryData = @json($mostCommonProductPerYear);
        console.log(industryData);

        let verticalBarChart, horizontalBarChart, lineChart;

        // Function to update charts based on selection
        function updateCharts(selectedKabupaten) {
            if (verticalBarChart) verticalBarChart.destroy();
            if (horizontalBarChart) horizontalBarChart.destroy();
            if (lineChart) lineChart.destroy();

            // Filter data based on selection if needed
            let filteredBarData = verticalBarData;
            let filteredHorizontalBarData = horizontalBarData;
            
            if (selectedKabupaten !== 'all') {
                filteredBarData = verticalBarData.filter(item => 
                    item.name === 'Semua Kabupaten/Kota' || 
                    kabupatenCoords.find(k => k.id === selectedKabupaten)?.name === item.name
                );
                filteredHorizontalBarData = horizontalBarData.filter(item => 
                    item.name === 'Semua Kabupaten/Kota' || 
                    kabupatenCoords.find(k => k.id === selectedKabupaten)?.name === item.name
                );
            }
            
            // Create vertical bar chart
            const verticalBarCtx = document.getElementById('verticalBarChart').getContext('2d');
            verticalBarChart = new Chart(verticalBarCtx, {
                type: 'bar',
                data: {
                    labels: filteredBarData.map(item => item.name),
                    datasets: [
                        { label: '2020', data: filteredBarData.map(item => item['2020'] || 0), backgroundColor: '#8884d8' },
                        { label: '2021', data: filteredBarData.map(item => item['2021'] || 0), backgroundColor: '#82ca9d' },
                        { label: '2022', data: filteredBarData.map(item => item['2022'] || 0), backgroundColor: '#ffc658' },
                        { label: '2023', data: filteredBarData.map(item => item['2023'] || 0), backgroundColor: '#ff7300' }
                    ]
                },
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    scales: {
                        x: { 
                            beginAtZero: true,
                            stacked: false 
                        },
                        y: { 
                            stacked: false
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    maintainAspectRatio: false
                }
            });

            // Create horizontal bar chart
            const horizontalBarCtx = document.getElementById('horizontalBarChart').getContext('2d');
            horizontalBarChart = new Chart(horizontalBarCtx, {
                type: 'bar',
                data: {
                    labels: filteredHorizontalBarData.map(item => item.name),
                    datasets: [
                        ...(() => {
                            const years = [2020, 2021, 2022, 2023, 2024, 2025];
                            const colors = ['#8884d8', '#82ca9d', '#ffc658', '#ff7300', '#ff0066', '#9900cc'];
                            
                            return years.map((year, index) => {
                                return {
                                    label: year.toString(),
                                    data: filteredHorizontalBarData.map(item => item[year.toString()] || 0),
                                    backgroundColor: colors[index]
                                };
                            });
                        })()
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: { beginAtZero: true },
                        y: { stacked: false }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });

            // Create line chart
            const lineCtx = document.getElementById('lineChart').getContext('2d');
            lineChart = new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: industryData.map(item => item.name),
                    datasets: [
                        ...(() => {
                            const years = [2020, 2021, 2022, 2023, 2024, 2025];
                            const colors = ['#8884d8', '#82ca9d', '#ffc658', '#ff7300', '#ff0066', '#9900cc'];
                            
                            return years.map((year, index) => {
                                return {
                                    label: year.toString(),
                                    data: industryData.map(item => item[year.toString()] || 0),
                                    borderColor: colors[index],
                                    fill: false
                                };
                            });
                        })()
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
        }

        // Inisialisasi grafik
        updateCharts('all');
    });
</script>
@endsection