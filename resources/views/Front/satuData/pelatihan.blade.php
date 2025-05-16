@extends('Front.master')

@section('title', 'Koperasi dan UKM - SatuData')

@section('content')
<div class="min-h-screen bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-xl font-bold text-gray-900">SatuData</h1>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        @foreach([
                            ['/', 'Beranda'],
                            ['/satu-data', 'Industri'],
                            ['/satu-data/perdagangan', 'Perdagangan'],
                            ['/satu-data/koperasi-ukm', 'Koperasi dan UKM'],
                            ['/satu-data/pelatihan', 'Pelatihan'],
                            ['/satu-data/pemetaan-pelatihan', 'Pemetaan Pelatihan']
                        ] as [$url, $label])
                            <a href="{{ $url }}" 
                               class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                                    {{ request()->url() === url($url) 
                                        ? 'border-indigo-500 text-indigo-600' 
                                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' 
                                    }}">
                                {{ $label }}
                            </a>
                        @endforeach
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
                        <!-- Header -->
                        <div class="border-b border-gray-200 px-6 py-4">
                            <h6 class="text-lg font-semibold text-gray-800">Data Pelatihan</h6>
                        </div>

                        <div class="p-6 space-y-6">
                            <!-- Filter Controls -->
                            <form id="filterForm" class="flex flex-wrap gap-4">
                                <div class="w-full md:w-1/3">
                                    <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-1">
                                        Kabupaten/Kota
                                    </label>
                                    <select name="kabupaten" id="kabupaten" 
                                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                        <option value="all">Semua Kabupaten/Kota</option>
                                        @foreach($kabupatenList as $kabupaten)
                                            <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full md:w-1/3">
                                    <label for="tahun" class="block text-sm font-medium text-gray-700 mb-1">
                                        Tahun
                                    </label>
                                    <select name="tahun" id="tahun" 
                                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                        <option value="all">Semua Tahun</option>
                                        @for($i = date('Y'); $i >= 2018; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="w-full md:w-1/3 flex items-end space-x-2">
                                    <button type="submit" id="filterBtn" 
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-200">
                                        Filter
                                    </button>
                                    <button type="reset" id="resetBtn"
                                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition duration-200">
                                        Reset
                                    </button>
                                </div>
                            </form>

                            <!-- Map -->
                            <div id="map" class="w-full h-96 rounded-lg border border-gray-200"></div>
                            
                            <!-- Data Table -->
                            <div class="col-span-1 md:col-span-3 bg-white rounded-lg shadow-sm overflow-hidden">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Kab/Kota</th>
                                                <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Jenis Pelatihan</th>
                                                <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Tahun</th>
                                                <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Peserta</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200" id="pelatihan-data">
                                            @foreach($pelatihans as $pelatihan)
                                                <tr class="pelatihan-row" 
                                                    data-kabupaten="{{ $pelatihan->kabupaten->id }}" 
                                                    data-tahun="{{ $pelatihan->tahun }}">
                                                    <td class="px-3 py-2 text-xs text-gray-700">{{ $pelatihan->kabupaten->name }}</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">{{ $pelatihan->judul }}</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">{{ $pelatihan->tahun }}</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">{{ $pelatihan->peserta }}</td>
                                                </tr>
                                            @endforeach
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

<!-- Map Popup -->
<div id="popup" class="ol-popup">
    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
    <div id="popup-content"></div>
</div>

<!-- Styles -->
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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Map Configuration
    const kabupatenCoords = [
        { id: '366', name: 'KABUPATEN BULUNGAN', coords: [117.0794, 2.904] },
        { id: '367', name: 'KABUPATEN MALINAU', coords: [116.6388, 3.5845] },
        { id: '368', name: 'KABUPATEN NUNUKAN', coords: [117.6467, 4.1357] },
        { id: '369', name: 'KABUPATEN TANA TIDUNG', coords: [117.2502, 3.5519] },
        { id: '370', name: 'KOTA TARAKAN', coords: [117.6333, 3.3] }
    ];

    // Initialize Vector Source and Features
    const vectorSource = new ol.source.Vector();
    const features = {};
    
    kabupatenCoords.forEach(kab => {
        const feature = new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat(kab.coords)),
            name: kab.name,
            id: kab.id
        });
        features[kab.id] = feature;
        vectorSource.addFeature(feature);
    });

    // Vector Layer Style
    const defaultStyle = new ol.style.Style({
        image: new ol.style.Circle({
            radius: 8,
            fill: new ol.style.Fill({ color: '#3b82f6' }),
            stroke: new ol.style.Stroke({ color: '#ffffff', width: 2 })
        })
    });

    const hiddenStyle = new ol.style.Style({
        image: new ol.style.Circle({
            radius: 8,
            fill: new ol.style.Fill({ color: '#d1d5db' }),
            stroke: new ol.style.Stroke({ color: '#ffffff', width: 2 })
        })
    });

    const vectorLayer = new ol.layer.Vector({
        source: vectorSource,
        style: defaultStyle
    });

    // Initialize Map
    const map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({ source: new ol.source.OSM() }),
            vectorLayer
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([117.0794, 3.3333]),
            zoom: 8
        })
    });

    // Popup Configuration
    const popup = new ol.Overlay({
        element: document.getElementById('popup'),
        autoPan: true,
        autoPanAnimation: { duration: 250 }
    });
    map.addOverlay(popup);

    // Event Handlers
    document.getElementById('popup-closer').onclick = () => {
        popup.setPosition(undefined);
        return false;
    };

    map.on('pointermove', evt => {
        map.getTargetElement().style.cursor = map.hasFeatureAtPixel(evt.pixel) ? 'pointer' : '';
    });

    // Add click handler for popup
    map.on('click', function(evt) {
        const feature = map.forEachFeatureAtPixel(evt.pixel, function(feature) {
            return feature;
        });

        if (feature) {
            const coordinates = feature.getGeometry().getCoordinates();
            const kabId = feature.get('id');
            
            // Get pelatihan data for this kabupaten
            const pelatihanRows = document.querySelectorAll(`.pelatihan-row[data-kabupaten="${kabId}"]`);
            let popupContent = `
                <h3 class="font-bold mb-2">${feature.get('name')}</h3>
                <div class="text-sm">
                    <div class="font-semibold">Jumlah Pelatihan: ${pelatihanRows.length}</div>
                </div>
            `;

            document.getElementById('popup-content').innerHTML = popupContent;
            popup.setPosition(coordinates);
        } else {
            popup.setPosition(undefined);
        }
    });

    // Filter table and map points function
    function filterTable() {
        const selectedKabupaten = document.getElementById('kabupaten').value;
        const selectedTahun = document.getElementById('tahun').value;
        const rows = document.querySelectorAll('.pelatihan-row');

        // Filter table rows
        rows.forEach(row => {
            const kabupatenMatch = selectedKabupaten === 'all' || row.dataset.kabupaten === selectedKabupaten;
            const tahunMatch = selectedTahun === 'all' || row.dataset.tahun === selectedTahun;
            row.style.display = kabupatenMatch && tahunMatch ? '' : 'none';
        });

        // Filter map points
        Object.entries(features).forEach(([kabId, feature]) => {
            if (selectedKabupaten === 'all' || kabId === selectedKabupaten) {
                feature.setStyle(defaultStyle);
            } else {
                feature.setStyle(hiddenStyle);
            }
        });

        // Clear popup when filtering
        popup.setPosition(undefined);
    }

    // Filter form submit handler
    document.getElementById('filterForm').addEventListener('submit', (e) => {
        e.preventDefault();
        filterTable();
    });

    // Reset button handler
    document.getElementById('resetBtn').addEventListener('click', (e) => {
        e.preventDefault();
        document.getElementById('kabupaten').value = 'all';
        document.getElementById('tahun').value = 'all';
        map.getView().setCenter(ol.proj.fromLonLat([117.0794, 3.3333]));
        map.getView().setZoom(8);
        filterTable();
    });

    // Initialize filter on page load
    filterTable();
});
</script>
@endsection