@extends('Front.master')

@section('title', 'Perdagangan - SatuData')

@section('content')
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">SatuData</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/satu-data">Industri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/satu-data/perdagangan">Perdagangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/satu-data/koperasi-ukm">Koperasi dan UKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/satu-data/pelatihan">Pelatihan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/satu-data/pemetaan-pelatihan">Pemetaan Pelatihan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4">Peta Perdagangan - Satu Data</h2>
        
        <div class="row">
            <div class="col-md-2 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Filter Data</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="kabupaten" class="form-label">Kabupaten/Kota</label>
                            <select id="kabupaten" class="form-select">
                                <option value="all">Semua Kabupaten/Kota</option>
                                <option value="366">KABUPATEN BULUNGAN</option>
                                <option value="367">KABUPATEN MALINAU</option>
                                <option value="368">KABUPATEN NUNUKAN</option>
                                <option value="369">KABUPATEN TANA TIDUNG</option>
                                <option value="370">KOTA TARAKAN</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2 d-md-flex">
                            <button id="filterBtn" class="btn btn-primary me-md-2">Filter</button>
                            <button id="resetBtn" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Peta Perdagangan</h5>
                    </div>
                    <div class="card-body">
                        <div id="map" style="height: 400px; width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Jumlah Pasar</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="verticalBarChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Jumlah Pasar Menurut Bangunan</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="horizontalBarChart" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Capaian Kinerja</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Uraian</th>
                                        <th>2020</th>
                                        <th>2021</th>
                                        <th>2022</th>
                                        <th>2023</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 max-w-96 truncate">Nilai Investasi Industri Kecil</td>
                                        <td class="text-sm text-gray-500">Rp2,957,432,390.00</td>
                                        <td class="text-sm text-gray-500">Rp2,957,432,390.00</td>
                                        <td class="text-sm text-gray-500">Rp306,019,965,000.00</td>
                                        <td class="text-sm text-gray-500">-</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 max-w-96 truncate">Penyerapan Tenaga Kerja Menurut Jenis Industri</td>
                                        <td class="text-sm text-gray-500">30,116</td>
                                        <td class="text-sm text-gray-500">30,116</td>
                                        <td class="text-sm text-gray-500">28,887</td>
                                        <td class="text-sm text-gray-500">-</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 max-w-96 truncate">Penyerapan Tenaga Kerja Industri Besar</td>
                                        <td class="text-sm text-gray-500">16,212</td>
                                        <td class="text-sm text-gray-500">16,212</td>
                                        <td class="text-sm text-gray-500">19,062</td>
                                        <td class="text-sm text-gray-500">-</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 max-w-96 truncate">Penyerapan Tenaga Kerja Industri Kecil Menengah (IKM)</td>
                                        <td class="text-sm text-gray-500">13,904</td>
                                        <td class="text-sm text-gray-500">13,904</td>
                                        <td class="text-sm text-gray-500">9,825</td>
                                        <td class="text-sm text-gray-500">-</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 max-w-96 truncate">Kontribusi sektor industri terhadap PDRB</td>
                                        <td class="text-sm text-gray-500">9.15</td>
                                        <td class="text-sm text-gray-500">8.97</td>
                                        <td class="text-sm text-gray-500">7.77</td>
                                        <td class="text-sm text-gray-500">7.67</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 max-w-96 truncate">Pertumbuhan industri pengolahan non migas</td>
                                        <td class="text-sm text-gray-500">4.84</td>
                                        <td class="text-sm text-gray-500">-3.85</td>
                                        <td class="text-sm text-gray-500">3.95</td>
                                        <td class="text-sm text-gray-500">1.67</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm font-medium text-gray-900 max-w-96 truncate">Kontribusi PDRB Industri Pengolahan Non Migas</td>
                                        <td class="text-sm text-gray-500">9.15</td>
                                        <td class="text-sm text-gray-500">8.97</td>
                                        <td class="text-sm text-gray-500">7.77</td>
                                        <td class="text-sm text-gray-500">7.67</td>
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

<div id="popup" class="ol-popup">
    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
    <div id="popup-content"></div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    .nav-link.active {
        font-weight: bold;
        color: #0d6efd !important;
        border-bottom: 2px solid #0d6efd;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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

        // Data pasar
        const pasarData = [
            {
                uraian: 'TOTAL PROVINSI KALIMANTAN UTARA',
                '2020': '99',
                '2021': '99',
                '2022': '102',
                '2023': '102'
            },
            {
                id: '366',
                uraian: 'KABUPATEN BULUNGAN',
                '2020': '19',
                '2021': '19',
                '2022': '19',
                '2023': '19'
            },
            {
                id: '367',
                uraian: 'KABUPATEN MALINAU',
                '2020': '18',
                '2021': '18',
                '2022': '20',
                '2023': '20'
            },
            {
                id: '368',
                uraian: 'KABUPATEN NUNUKAN',
                '2020': '47',
                '2021': '47',
                '2022': '48',
                '2023': '48'
            },
            {
                id: '369',
                uraian: 'KABUPATEN TANA TIDUNG',
                '2020': '6',
                '2021': '6',
                '2022': '6',
                '2023': '6'
            },
            {
                id: '370',
                uraian: 'KOTA TARAKAN',
                '2020': '9',
                '2021': '9',
                '2022': '9',
                '2023': '9'
            }
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
                        fill: new ol.style.Fill({ color: '#0d6efd' }),
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
                
                // Find data for this kabupaten
                const kabData = pasarData.find(item => item.id === id);
                let dataHtml = '';
                
                if (kabData) {
                    dataHtml = `
                        <p>2020: ${kabData['2020']}</p>
                        <p>2021: ${kabData['2021']}</p>
                        <p>2022: ${kabData['2022']}</p>
                        <p>2023: ${kabData['2023']}</p>
                    `;
                }
                
                content.innerHTML = `
                    <h5>${name}</h5>
                    ${dataHtml}
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
            
            if (selectedKabupaten !== 'all') {
                // Find the kabupaten in the coordinates list
                const kabupaten = kabupatenCoords.find(k => k.id === selectedKabupaten);
                if (kabupaten) {
                    // Center map on selected kabupaten
                    map.getView().setCenter(ol.proj.fromLonLat(kabupaten.coords));
                    map.getView().setZoom(10);
                }
            }
        });

        // Reset button click handler
        document.getElementById('resetBtn').addEventListener('click', function() {
            document.getElementById('kabupaten').value = 'all';
            // Reset map view
            map.getView().setCenter(ol.proj.fromLonLat([117.0794, 3.3333]));
            map.getView().setZoom(8);
        });

        // Chart data
        const verticalBarData = {
            labels: pasarData.map(item => item.uraian),
            datasets: [
                { 
                    label: '2020', 
                    data: pasarData.map(item => parseInt(item['2020'])), 
                    backgroundColor: '#0d6efd' 
                },
                { 
                    label: '2021', 
                    data: pasarData.map(item => parseInt(item['2021'])), 
                    backgroundColor: '#198754' 
                },
                { 
                    label: '2022', 
                    data: pasarData.map(item => parseInt(item['2022'])), 
                    backgroundColor: '#ffc107' 
                },
                { 
                    label: '2023', 
                    data: pasarData.map(item => parseInt(item['2023'])), 
                    backgroundColor: '#dc3545' 
                }
            ]
        };

        // Data for horizontal bar chart
        const horizontalBarData = {
            labels: ['Pasar Tradisional', 'Toko Modern', 'Pusat Perbelanjaan', 'Pedagang Kaki Lima'],
            datasets: [
                { 
                    label: '2020', 
                    data: [45, 25, 15, 35], 
                    backgroundColor: '#0d6efd'
                },
                { 
                    label: '2021', 
                    data: [48, 28, 18, 38], 
                    backgroundColor: '#198754'
                },
                { 
                    label: '2022', 
                    data: [51, 31, 21, 41], 
                    backgroundColor: '#ffc107'
                },
                { 
                    label: '2023', 
                    data: [54, 34, 24, 44], 
                    backgroundColor: '#dc3545'
                }
            ]
        };

        // Create vertical bar chart
        const verticalBarCtx = document.getElementById('verticalBarChart').getContext('2d');
        new Chart(verticalBarCtx, {
            type: 'bar',
            data: verticalBarData,
            options: {
                responsive: true,
                scales: {
                    x: { stacked: false },
                    y: { beginAtZero: true }
                }
            }
        });

        // Create horizontal bar chart
        const horizontalBarCtx = document.getElementById('horizontalBarChart').getContext('2d');
        new Chart(horizontalBarCtx, {
            type: 'bar',
            data: horizontalBarData,
            options: {
                indexAxis: 'y',
                responsive: true,
                scales: {
                    x: { beginAtZero: true },
                    y: { stacked: false }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    });
</script>
@endsection