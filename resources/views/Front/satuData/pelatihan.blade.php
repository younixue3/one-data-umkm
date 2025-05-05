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
                            <h6 class="text-lg font-semibold text-gray-800">Koperasi dan UKM - Satu Data</h6>
                        </div>

                        <div class="p-6 space-y-6">
                            <!-- Filter Controls -->
                            <div class="flex flex-wrap gap-4">
                                <div class="w-full md:w-1/3">
                                    <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-1">
                                        Kabupaten/Kota
                                    </label>
                                    <select id="kabupaten" 
                                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                        <option value="all">Semua Kabupaten/Kota</option>
                                        @foreach($kabupatenList as $kabupaten)
                                            <option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full md:w-1/3 flex items-end space-x-2">
                                    <button id="filterBtn" 
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-200">
                                        Filter
                                    </button>
                                    <button id="resetBtn"
                                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition duration-200">
                                        Reset
                                    </button>
                                </div>
                            </div>

                            <!-- Map -->
                            <div id="map" class="w-full h-96 rounded-lg border border-gray-200"></div>
                            
                            <!-- Data Table -->
                            <!-- Tabel Pelatihan -->
                            <div class="col-span-1 md:col-span-3 bg-white rounded-lg shadow-sm overflow-hidden">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Kab/Kota</th>
                                                    <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Jenis Pelatihan</th>
                                                    <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Tahun 2016</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200" id="pelatihan-data">
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Pelatihan Manajemen Partisipasi Anggota Koperasi</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Pelatihan Menyusun Strategi Pemasaran Produk</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bimbingan Teknis 25 WUB IKM Membatik (Tingkat Lanjutan) Di Kabupaten Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bimbingan Teknis 25 WUB IKM Sandang (Menjahit)</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bimbingan Teknis 25 WUB IKM Servis Elektronik Di Kabupaten Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bimbingan Teknis E-Commerce WUB IKM Di Kabupaten Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bimbingan Teknis Membatik WUB IKM Di Kabupaten Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">BIMBINGAN TEKNIS PRODUKSI MASKER KAIN BAGI 25 WIRAUSAHA IKM KONVEKSI YANG TERDAMPAK COVID 19 DI KABUPATEN BULUNGAN</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bimbingan Teknis WUB IKM Olahan Produk Buah Lokal Di Kabupaten Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bimbingan Teknis WUB IKM Tenun Serat Alam Di Kabupaten Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">BIMTEK WUB IKM KERAJINAN UKIRAN KAYU DI KABUPATEN BULUNGAN DAN KABUPATEN TANA TIDUNG</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">BIMTEK 15 WUB IKM BORDIR TINGKAT LANJUTAN DI KABUPATEN BULUNGAN</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">BORDIR (INDUSTRI)</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Desain Kemasan Produk Angkatan I</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Fasilitasi HAKI</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Fasilitasi Izin Usaha</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Fasilitasi Sertifikasi Halal Bagi IKM</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Fasiltas Legalitas Usaha</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">KEWIRAUSAHAAN BAGI PEMULA (UMKM)</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Literasi Keuangan Bagi Usaha Mikro Angkatan I</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Bulungan</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700">Pelatihan Batako Press (INDUSTRI)</td>
                                                    <td class="px-3 py-2 text-xs text-gray-700 text-right">30</td>
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
    kabupatenCoords.forEach(kab => {
        vectorSource.addFeature(new ol.Feature({
            geometry: new ol.geom.Point(ol.proj.fromLonLat(kab.coords)),
            name: kab.name,
            id: kab.id
        }));
    });

    // Vector Layer Style
    const vectorLayer = new ol.layer.Vector({
        source: vectorSource,
        style: feature => new ol.style.Style({
            image: new ol.style.Circle({
                radius: 8,
                fill: new ol.style.Fill({ color: '#3b82f6' }),
                stroke: new ol.style.Stroke({ color: '#ffffff', width: 2 })
            })
        })
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

    map.on('click', evt => {
        const feature = map.forEachFeatureAtPixel(evt.pixel, feature => feature);
        if (feature) {
            const coords = feature.getGeometry().getCoordinates();
            document.getElementById('popup-content').innerHTML = `
                <h5 class="font-semibold">${feature.get('name')}</h5>
                <p class="text-sm text-gray-600">ID: ${feature.get('id')}</p>
            `;
            popup.setPosition(coords);
            document.getElementById('kabupaten').value = feature.get('id');
        } else {
            popup.setPosition(undefined);
        }
    });

    map.on('pointermove', evt => {
        map.getTargetElement().style.cursor = map.hasFeatureAtPixel(evt.pixel) ? 'pointer' : '';
    });

    // Filter and Reset Handlers
    document.getElementById('filterBtn').onclick = () => {
        const selectedKabupaten = document.getElementById('kabupaten').value;
        // Implement your filter logic here
        console.log('Filtering for kabupaten:', selectedKabupaten);
    };

    document.getElementById('resetBtn').onclick = () => {
        document.getElementById('kabupaten').value = 'all';
        map.getView().setCenter(ol.proj.fromLonLat([117.0794, 3.3333]));
        map.getView().setZoom(8);
        // Implement additional reset logic here
    };
});
</script>
@endsection