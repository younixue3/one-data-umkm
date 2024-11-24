import { Head } from '@inertiajs/react';
import SatuDataLayout from '@/Layouts/SatuDataLayout';
import { useState, useEffect, useRef } from 'react';
import {
  BarChart,
  Bar,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  Legend,
  ResponsiveContainer
} from 'recharts';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import VectorLayer from 'ol/layer/Vector';
import VectorSource from 'ol/source/Vector';
import Feature from 'ol/Feature';
import Point from 'ol/geom/Point';
import { fromLonLat } from 'ol/proj';
import { Style, Circle, Fill, Stroke } from 'ol/style';
import OSM from 'ol/source/OSM';
import 'ol/ol.css';
import { Card, CardContent, CardTitle, CardHeader } from '@/Components/ui/card';
import {
  Select,
  SelectItem,
  SelectContent,
  SelectValue,
  SelectTrigger
} from '@/Components/ui/select';
import { Button } from '@/Components/ui/button';

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
  },
  {
    uraian: 'Jumlah pasar dikelola pemerintah',
    '2020': '78',
    '2021': '78',
    '2022': '102',
    '2023': '102'
  }
];

const data = [
  {
    uraian: 'Nilai Investasi Industri Kecil',
    '2020': 'Rp2,957,432,390.00',
    '2021': 'Rp2,957,432,390.00',
    '2022': 'Rp306,019,965,000.00',
    '2023': '-'
  },
  {
    uraian: 'Penyerapan Tenaga Kerja Menurut Jenis Industri',
    '2020': '30,116',
    '2021': '30,116',
    '2022': '28,887',
    '2023': '-'
  },
  {
    uraian: 'Penyerapan Tenaga Kerja Industri Besar',
    '2020': '16,212',
    '2021': '16,212',
    '2022': '19,062',
    '2023': '-'
  },
  {
    uraian: 'Penyerapan Tenaga Kerja Industri Kecil Menengah (IKM)',
    '2020': '13,904',
    '2021': '13,904',
    '2022': '9,825',
    '2023': '-'
  },
  {
    uraian: 'Kontribusi sektor industri terhadap PDRB',
    '2020': '9.15',
    '2021': '8.97',
    '2022': '7.77',
    '2023': '7.67'
  },
  {
    uraian: 'Pertumbuhan industri pengolahan non migas',
    '2020': '4.84',
    '2021': '-3.85',
    '2022': '3.95',
    '2023': '1.67'
  },
  {
    uraian: 'Kontribusi PDRB Industri Pengolahan Non Migas',
    '2020': '9.15',
    '2021': '8.97',
    '2022': '7.77',
    '2023': '7.67'
  },
  {
    uraian: 'Proporsi nilai tambah IKM terhadap total nilai tambah industri',
    '2020': '98.29',
    '2021': '98.44',
    '2022': '98.38',
    '2023': '99.6'
  },
  {
    uraian: 'Pertumbuhan Ekspor Industri Pengolahan non migas',
    '2020': '-3.85',
    '2021': '4.87',
    '2022': '3.95',
    '2023': '-16.69'
  },
  {
    uraian: 'Tenaga Kerja di Sektor Industri Non Migas',
    '2020': '16,212',
    '2021': '25,883',
    '2022': '28,887',
    '2023': '-'
  },
  {
    uraian: 'Nilai Investasi Sektor Industri Pengolahan Non Migas',
    '2020': '1,080,000,000',
    '2021': '1,200,000,000,000',
    '2022': '13,704,547,246,093',
    '2023': '27,026,584,635,157'
  },
  {
    uraian: 'Nilai Ekspor Produk Industri Pengolahan (USD Miliar)',
    '2020': '1.05',
    '2021': '0.13',
    '2022': '0.25',
    '2023': '0.28'
  },
  {
    uraian:
      'Sentra Industri Kecil dan Menengah (IKM) di Luar Jawa yang Beroperasi',
    '2020': '3',
    '2021': '3',
    '2022': '3',
    '2023': '3'
  },
  {
    uraian: 'Kawasan Industri (KI) yang dikembangkan',
    '2020': '1',
    '2021': '1',
    '2022': '1',
    '2023': '1'
  },
  {
    uraian:
      'Proporsi nilai tambah industri kecil terhadap total nilai tambah industri',
    '2020': '98.29',
    '2021': '98.44',
    '2022': '98.38',
    '2023': '99.6'
  },
  {
    uraian: 'Proporsi industri kecil dengan pinjaman atau kredit',
    '2020': '3.55',
    '2021': '3.32',
    '2022': '2.79',
    '2023': '15.69'
  },
  {
    uraian:
      'Perusahaan Industri Menengah Besar Yang Tersertifikasi Standar Industri Hijau (SIH) Berdasarkan SIH yang ditetapkan',
    '2020': '37',
    '2021': '37',
    '2022': '40',
    '2023': '45'
  }
];

const totalData = [
  {
    uraian: 'Pasar Bangunan Permanen',
    '2020': '52',
    '2021': '52',
    '2022': '93',
    '2023': '93'
  },
  {
    uraian: 'Pasar Bangunan Semi Permanen',
    '2020': '47',
    '2021': '47',
    '2022': '9',
    '2023': '9'
  }
];

export default function Perdagangan() {
  const [selectedKabupaten, setSelectedKabupaten] = useState('all');
  const mapRef = useRef<HTMLDivElement>(null);
  const mapInstanceRef = useRef<Map | null>(null);

  const filteredData =
    selectedKabupaten === 'all'
      ? pasarData
      : pasarData.filter(item => item.id === selectedKabupaten);

  useEffect(() => {
    if (mapRef.current && !mapInstanceRef.current) {
      // Create vector source and features
      const vectorSource = new VectorSource();

      // Add point features for each kabupaten
      const kabupatenCoords = [
        { id: '366', name: 'KABUPATEN BULUNGAN', coords: [117.0794, 2.904] },
        { id: '367', name: 'KABUPATEN MALINAU', coords: [116.6388, 3.5845] },
        { id: '368', name: 'KABUPATEN NUNUKAN', coords: [117.6467, 4.1357] },
        {
          id: '369',
          name: 'KABUPATEN TANA TIDUNG',
          coords: [117.2502, 3.5519]
        },
        { id: '370', name: 'KOTA TARAKAN', coords: [117.6333, 3.3] }
      ];

      kabupatenCoords.forEach(kab => {
        const feature = new Feature({
          geometry: new Point(fromLonLat(kab.coords)),
          name: kab.name
        });

        vectorSource.addFeature(feature);
      });

      // Create vector layer with style
      const vectorLayer = new VectorLayer({
        source: vectorSource,
        style: new Style({
          image: new Circle({
            radius: 8,
            fill: new Fill({ color: '#3b82f6' }),
            stroke: new Stroke({
              color: '#ffffff',
              width: 2
            })
          })
        })
      });

      // Initialize map
      const map = new Map({
        target: mapRef.current,
        layers: [
          new TileLayer({
            source: new OSM()
          }),
          vectorLayer
        ],
        view: new View({
          center: fromLonLat([117.0794, 3.3333]), // Center on Kalimantan Utara
          zoom: 8
        })
      });

      // Add hit detection
      map.on('click', function (evt) {
        const feature = map.forEachFeatureAtPixel(
          evt.pixel,
          function (feature) {
            return feature;
          }
        );

        if (feature) {
          const name = feature.get('name');
          // Find the corresponding kabupaten data
          const kabupaten = pasarData.find(k => k.uraian === name);
          if (kabupaten?.id) {
            setSelectedKabupaten(kabupaten.id);
          } else {
            setSelectedKabupaten('all');
          }
        }
      });

      // Change cursor on hover
      map.on('pointermove', function (evt) {
        const pixel = map.getEventPixel(evt.originalEvent);
        const hit = map.hasFeatureAtPixel(pixel);
        const target = map.getTarget();
        if (target && target instanceof HTMLElement) {
          target.style.cursor = hit ? 'pointer' : '';
        }
      });

      mapInstanceRef.current = map;
    }

    return () => {
      if (mapInstanceRef.current) {
        mapInstanceRef.current.setTarget(undefined);
        mapInstanceRef.current = null;
      }
    };
  }, []);

  return (
    <SatuDataLayout title="Perdagangan">
      <Head title="Perdagangan - SatuData" />
      <div className="bg-gray-100 h-screen overflow-hidden p-8">
        <div className="max-w-7xl mx-auto">
          <div className="grid grid-cols-5 gap-4">
            <Card className="col-span-1 row-span-2">
              <CardHeader>
                <CardTitle className="text-base">Filter Kabupaten</CardTitle>
              </CardHeader>
              <CardContent className="p-4">
                <div className="space-y-4">
                  <Select
                    value={selectedKabupaten}
                    onValueChange={setSelectedKabupaten}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Pilih Kabupaten" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="all">Semua Kabupaten</SelectItem>
                      {pasarData
                        .filter(item => item.id)
                        .map(item => (
                          <SelectItem key={item.uraian} value={item.id ?? ''}>
                            {item.uraian}
                          </SelectItem>
                        ))}
                    </SelectContent>
                  </Select>
                  <Button className="w-full bg-blue-600 hover:bg-blue-700 text-white">
                    Search
                  </Button>
                </div>
              </CardContent>
            </Card>

            <Card className="col-span-2 row-span-2">
              <CardContent>
                <div ref={mapRef} className="h-[320px]" />
              </CardContent>
            </Card>

            {/* Horizontal Bar Chart */}
            <Card className="col-span-2 row-span-2">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Jumlah Pasar
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="h-[200px] mt-4">
                  <ResponsiveContainer width="100%" height="100%">
                    <BarChart
                      data={filteredData}
                      layout="horizontal"
                      margin={{
                        top: 20,
                        right: 30,
                        bottom: 5
                      }}
                    >
                      <CartesianGrid strokeDasharray="3 3" />
                      <XAxis
                        dataKey="uraian"
                        tick={{
                          fontSize: 10,
                          width: 100
                        }}
                        interval={0}
                      />
                      <YAxis tick={{ fontSize: 10 }} />
                      <Tooltip contentStyle={{ fontSize: 10 }} />
                      <Bar dataKey="2020" name="2020" fill="#8884d8" />
                      <Bar dataKey="2021" name="2021" fill="#82ca9d" />
                      <Bar dataKey="2022" name="2022" fill="#ffc658" />
                      <Bar dataKey="2023" name="2023" fill="#ff7300" />
                    </BarChart>
                  </ResponsiveContainer>
                </div>
              </CardContent>
            </Card>

            {/* Vertical Bar Chart */}
            <Card className="col-span-2 row-span-3 h-[320px]">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Jumlah Pasar Menurut Bangunan
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="mt-4">
                  <ResponsiveContainer width="100%" height={220}>
                    <BarChart
                      data={totalData}
                      layout="vertical"
                      margin={{
                        top: 20,
                        right: 30,
                        bottom: 5
                      }}
                    >
                      <CartesianGrid strokeDasharray="3 3" />
                      <XAxis type="number" />
                      <YAxis
                        type="category"
                        dataKey="uraian"
                        width={70}
                        tick={{ fontSize: 10 }}
                      />
                      <Tooltip contentStyle={{ fontSize: 10 }} />
                      <Bar dataKey="2020" fill="#8884d8" name="2020" />
                      <Bar dataKey="2021" fill="#82ca9d" name="2021" />
                      <Bar dataKey="2022" fill="#ffc658" name="2022" />
                      <Bar dataKey="2023" fill="#ff7300" name="2023" />
                    </BarChart>
                  </ResponsiveContainer>
                </div>
              </CardContent>
            </Card>

            {/* Table */}
            <Card className="col-span-3 row-span-2 h-[320px] overflow-hidden">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Capaian Kinerja
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="mt-4 h-[220px] overflow-auto">
                  <table className="min-w-full divide-y divide-gray-300">
                    <thead>
                      <tr>
                        <th
                          scope="col"
                          className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                        >
                          Uraian
                        </th>
                        <th
                          scope="col"
                          className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                        >
                          2020
                        </th>
                        <th
                          scope="col"
                          className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                        >
                          2021
                        </th>
                        <th
                          scope="col"
                          className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                        >
                          2022
                        </th>
                        <th
                          scope="col"
                          className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                        >
                          2023
                        </th>
                      </tr>
                    </thead>
                    <tbody className="divide-y divide-gray-200 bg-white">
                      {data.map(item => (
                        <tr key={item.uraian}>
                          <td className="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900 max-w-96 truncate">
                            {item.uraian}
                          </td>
                          <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {item['2020']}
                          </td>
                          <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {item['2021']}
                          </td>
                          <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {item['2022']}
                          </td>
                          <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {item['2023']}
                          </td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
              </CardContent>
            </Card>
          </div>
        </div>
      </div>
    </SatuDataLayout>
  );
}
