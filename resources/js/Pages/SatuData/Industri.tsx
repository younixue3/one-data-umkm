import { PageProps } from '@/types';
import { Head } from '@inertiajs/react';
import { useState, useEffect, useRef } from 'react';
import 'ol/ol.css';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import VectorLayer from 'ol/layer/Vector';
import VectorSource from 'ol/source/Vector';
import Feature from 'ol/Feature';
import Point from 'ol/geom/Point';
import { fromLonLat } from 'ol/proj';
import { Style, Circle, Fill, Stroke } from 'ol/style';
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue
} from '@/Components/ui/select';
import {
  BarChart,
  Bar,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  Legend,
  LineChart,
  Line,
  ResponsiveContainer
} from 'recharts';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import Overlay from 'ol/Overlay';
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow
} from '@/Components/ui/table';
import SatuDataLayout from '@/Layouts/SatuDataLayout';

interface UkmData {
  id: number;
  nama_perusahaan: string;
  nama_pemilik: string;
  alamat: string;
  kelurahan: {
    id: number;
    name: string;
    kecamatan_id: number | null;
  };
  kecamatan: {
    id: number;
    name: string;
    kabupaten_id: number | null;
  };
  kabupaten: {
    id: number;
    name: string;
    provinsi_id: number;
  };
  provinsi: {
    id: number;
    name: string;
  };
  kontak_person: string;
  no_hp: string;
  email: string;
  nomor_izin: string;
  tahun_izin: number;
  tahun_data: number;
  tenaga_kerja_pria: number;
  tenaga_kerja_wanita: number;
  nilai_investasi: string;
  nilai_kapasitas: string;
  satuan_kapasitas: string;
  nilai_produksi: string;
  nilai_bahan_baku: string;
  status_ekspor: string;
  negara_tujuan_ekspor: string;
  status_aktif: string;
  jenis_pembiayaan: string;
  typeindustries: any[];
  typeproducts: any[];
  longitude: number;
  latitude: number;
}

interface KabupatenData {
  [key: string]: {
    [year: string]: number;
  };
}

interface Typeproduct {
  id: string;
  name: string;
}

interface Typeindustry {
  id: number;
  name: string;
}

interface Kabupaten {
  id: string;
  name: string;
}

export default function Industri({
  laravelVersion,
  phpVersion,
  kabupatenList,
  productTypes,
  dataUkm
}: PageProps<{
  laravelVersion: string;
  phpVersion: string;
  dataUkm: UkmData[];
  dataBigIndustries: any[];
  ukmByKabupatenYear: KabupatenData;
  bigIndustriesByKabupatenYear: KabupatenData;
  kabupatenList: Kabupaten[];
  productTypes: Typeproduct[];
  industryTypes: Typeindustry[];
}>) {
  const [nameUkm, setNameUkm] = useState('');
  const [namePerson, setNamePerson] = useState('');
  const [typeProducts, setTypeProducts] = useState<string[]>(['all']);
  const [selectedKabupaten, setSelectedKabupaten] = useState<
    string | number | any
  >('all');
  const [filteredData, setFilteredData] = useState(dataUkm);
  const mapRef = useRef<HTMLDivElement>(null);
  const mapInstance = useRef<Map | null>(null);
  const vectorSources = useRef<{ [key: string]: VectorSource }>({});
  const vectorLayers = useRef<{ [key: string]: VectorLayer<VectorSource> }>({});
  const popupRef = useRef<HTMLDivElement>(null);
  const overlayRef = useRef<Overlay | null>(null);
  const [activeIndex, setActiveIndex] = useState(0);
  const [selectedType, setSelectedType] = useState('all');

  useEffect(() => {
    let filtered = dataUkm;

    // Filter by product type
    if (typeProducts.length > 0 && typeProducts[0] !== 'all') {
      filtered = filtered.filter(ukm =>
        ukm.typeproducts.some(type => typeProducts.includes(type.id))
      );
    }

    // Filter by kabupaten
    if (selectedKabupaten !== 'all') {
      filtered = filtered.filter(
        ukm => ukm.kabupaten.id.toString() === selectedKabupaten
      );
    }

    // Filter by UKM name
    if (nameUkm) {
      filtered = filtered.filter(ukm =>
        ukm.nama_perusahaan.toLowerCase().includes(nameUkm.toLowerCase())
      );
    }

    // Filter by person name
    if (namePerson) {
      filtered = filtered.filter(ukm =>
        ukm.nama_pemilik.toLowerCase().includes(namePerson.toLowerCase())
      );
    }

    setFilteredData(filtered);
  }, [typeProducts, selectedKabupaten, nameUkm, namePerson, dataUkm]);

  useEffect(() => {
    if (mapRef.current && !mapInstance.current) {
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
          name: kab.name,
          id: kab.id
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
          // Find the corresponding kabupaten ID
          const kabupaten = kabupatenCoords.find(k => k.name === name);
          if (kabupaten?.id) {
            setSelectedKabupaten(parseInt(kabupaten.id));
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

      mapInstance.current = map;
    }

    return () => {
      if (mapInstance.current) {
        mapInstance.current.setTarget(undefined);
        mapInstance.current = null;
      }
    };
  }, []);

  // Transform data for charts
  const mostCommonIndustryPerYear = [
    {
      name: 'Industri Pengolahan Makanan',
      2020: 1103,
      2021: 1183,
      2022: 1183,
      2023: 1272
    },
    {
      name: 'Industri Pengolahan Minuman',
      2020: 194,
      2021: 340,
      2022: 340,
      2023: 372
    },
    {
      name: 'Industri Pengolahan Kayu',
      2020: 409,
      2021: 460,
      2022: 460,
      2023: 466
    },
    {
      name: 'Indsutri Pengolahan anyaman rotan',
      2020: 333,
      2021: 391,
      2022: 391,
      2023: 423
    },
    {
      name: 'Indsutri Pengolahan anyaman bambu',
      2020: 96,
      2021: 99,
      2022: 99,
      2023: 101
    },
    {
      name: 'Indsutri Pengolahan Logam',
      2020: 483,
      2021: 486,
      2022: 486,
      2023: 489
    },
    {
      name: 'Industri Pengolahan Aneka',
      2020: 1086,
      2021: 1303,
      2022: 1303,
      2023: 1583
    }
  ];

  const verticalBarData = [
    {
      id: 'all',
      name: 'Semua Kabupaten/Kota',
      2020: 32,
      2021: 35,
      2022: 40,
      2023: 45
    },
    {
      id: '366',
      name: 'KABUPATEN BULUNGAN',
      2020: 12,
      2021: 15,
      2022: 15,
      2023: 20
    },
    {
      id: '367',
      name: 'KABUPATEN MALINAU',
      2020: 1,
      2021: 1,
      2022: 1,
      2023: 1
    },
    {
      id: '368',
      name: 'KABUPATEN NUNUKAN',
      2020: 10,
      2021: 10,
      2022: 10,
      2023: 11
    },
    {
      id: '369',
      name: 'KABUPATEN TANA TIDUNG',
      2020: 1,
      2021: 1,
      2022: 1,
      2023: 1
    },
    {
      id: '370',
      name: 'KOTA TARAKAN',
      2020: 8,
      2021: 8,
      2022: 8,
      2023: 12
    }
  ];

  const getFilteredData = (selectedKabupaten: string) => {
    if (selectedKabupaten === 'all') {
      return verticalBarData;
    }
    return verticalBarData.filter(item => item.id == selectedKabupaten);
  };

  const horizontalBarData = [
    {
      id: 'all',
      name: 'Semua Kabupaten/Kota',
      2020: 3704,
      2021: 4262,
      2022: 4262,
      2023: 4706
    },
    {
      id: '366',
      name: 'KABUPATEN BULUNGAN',
      2020: 561,
      2021: 561,
      2022: 561,
      2023: 552
    },
    {
      id: '367',
      name: 'KABUPATEN MALINAU',
      2020: 219,
      2021: 341,
      2022: 341,
      2023: 1867
    },
    {
      id: '368',
      name: 'KABUPATEN NUNUKAN',
      2020: 549,
      2021: 636,
      2022: 636,
      2023: 943
    },
    {
      id: '369',
      name: 'KABUPATEN TANA TIDUNG',
      2020: 1191,
      2021: 1540,
      2022: 1540,
      2023: 181
    },
    {
      id: '370',
      name: 'KOTA TARAKAN',
      2020: 1184,
      2021: 1184,
      2022: 1184,
      2023: 1163
    }
  ];

  const getFilteredHorizontalData = (selectedKabupaten: string) => {
    if (selectedKabupaten === 'all') {
      return horizontalBarData;
    }
    return horizontalBarData.filter(item => item.id == selectedKabupaten);
  };

  return (
    <SatuDataLayout title="Dashboard">
      <Head title="Industri - SatuData" />

      <div className="bg-gray-100 h-screen overflow-hidden p-8">
        <div className="max-w-7xl mx-auto">
          <div className="grid grid-cols-1 md:grid-cols-5 gap-4">
            <Card className="col-span-1">
              <CardHeader>
                <CardTitle className="text-base">Filter UKM</CardTitle>
              </CardHeader>
              <CardContent className="p-4">
                <div className="space-y-4">
                  <Select
                    onValueChange={value =>
                      setTypeProducts(value === 'all' ? [] : [value])
                    }
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select product type" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="all">All Types</SelectItem>
                      {productTypes.map((type, index) => (
                        <SelectItem key={index} value={type.id}>
                          {type.name}
                        </SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                  <Select
                    value={selectedKabupaten}
                    onValueChange={value => {
                      setSelectedKabupaten(value);
                    }}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select kabupaten" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="all">All Kabupaten</SelectItem>
                      {kabupatenList.map((kabupaten, index) => (
                        <SelectItem key={index} value={kabupaten.id}>
                          {kabupaten.name}
                        </SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                </div>
              </CardContent>
            </Card>

            <Card className="col-span-2 row-span-2">
              <CardContent className="p-4">
                <div
                  ref={mapRef}
                  className="h-[270px] rounded-lg overflow-hidden"
                ></div>
                <div ref={popupRef} className="ol-popup"></div>
              </CardContent>
            </Card>

            <Card className="col-span-2 row-span-2">
              <CardHeader>
                <CardTitle>
                  <h6 className="text-base text-center">
                    Jumlah Industri Kecil Menengah per Kabupaten
                  </h6>
                </CardTitle>
              </CardHeader>
              <CardContent className="p-4">
                <ResponsiveContainer width="100%" height={200}>
                  <BarChart
                    data={getFilteredHorizontalData(selectedKabupaten)}
                    margin={{ top: 0, right: 0, bottom: 0, left: 0 }}
                  >
                    <CartesianGrid strokeDasharray="3 3" />
                    <XAxis
                      dataKey="name"
                      tick={{
                        fontSize: 10,
                        width: 100
                      }}
                      interval={0}
                    />
                    <YAxis tick={{ fontSize: 10 }} />
                    <Tooltip contentStyle={{ fontSize: 10 }} />
                    <Legend wrapperStyle={{ fontSize: 10 }} />
                    <Bar dataKey="2020" name="2020" fill="#8884d8" />
                    <Bar dataKey="2021" name="2021" fill="#82ca9d" />
                    <Bar dataKey="2022" name="2022" fill="#ffc658" />
                    <Bar dataKey="2023" name="2023" fill="#ff7300" />
                  </BarChart>
                </ResponsiveContainer>
              </CardContent>
            </Card>

            <Card className="col-span-1 row-span-3">
              <CardHeader>
                <CardTitle>
                  <h6 className="text-base text-center">
                    Jumlah Industri Besar per Kabupaten
                  </h6>
                </CardTitle>
              </CardHeader>
              <CardContent className="p-4">
                <ResponsiveContainer width="100%" height={300}>
                  <BarChart
                    data={getFilteredData(selectedKabupaten)}
                    margin={{ top: 0, right: 0, bottom: 0, left: 0 }}
                    layout="vertical"
                  >
                    <CartesianGrid strokeDasharray="3 3" />
                    <XAxis type="number" tick={{ fontSize: 10 }} />
                    <YAxis
                      type="category"
                      dataKey="name"
                      tick={{
                        fontSize: 10,
                        width: 100
                      }}
                      interval={0}
                    />
                    <Tooltip contentStyle={{ fontSize: 10 }} />
                    <Legend wrapperStyle={{ fontSize: 10 }} />
                    <Bar dataKey="2020" name="2020" fill="#8884d8" />
                    <Bar dataKey="2021" name="2021" fill="#82ca9d" />
                    <Bar dataKey="2022" name="2022" fill="#ffc658" />
                    <Bar dataKey="2023" name="2023" fill="#ff7300" />
                  </BarChart>
                </ResponsiveContainer>
              </CardContent>
            </Card>

            <Card className="col-span-2 row-span-1">
              <CardHeader>
                <CardTitle>
                  <h6 className="text-base text-center">
                    Jumlah IKM Berdasarkan Jenis Usahanya
                  </h6>
                </CardTitle>
              </CardHeader>
              <CardContent className="p-4">
                <ResponsiveContainer width="100%" height={220}>
                  <LineChart data={mostCommonIndustryPerYear}>
                    <CartesianGrid strokeDasharray="3 3" />
                    <XAxis
                      dataKey="name"
                      tick={{
                        fontSize: 10,
                        width: 100
                      }}
                      interval={0}
                      padding={{ left: 10, right: 10 }}
                    />
                    <YAxis
                      tick={{ fontSize: 10 }}
                      padding={{ top: 20, bottom: 20 }}
                    />
                    <Tooltip
                      contentStyle={{ fontSize: 10 }}
                      formatter={(value, name) => [`${value}`, name]}
                    />
                    {['2020', '2021', '2022', '2023'].map((year, index) => {
                      const colors = [
                        '#8884d8',
                        '#82ca9d',
                        '#ffc658',
                        '#ff7300'
                      ];

                      return (
                        <Line
                          key={year}
                          type="monotone"
                          dataKey={year}
                          name={year}
                          stroke={colors[index]}
                        />
                      );
                    })}
                  </LineChart>
                </ResponsiveContainer>
              </CardContent>
            </Card>

            <Card className="col-span-2 row-span-3 h-80 overflow-auto">
              <CardHeader>
                <CardTitle>
                  <h6 className="text-base text-center">UKM Data Table</h6>
                </CardTitle>
              </CardHeader>
              <CardContent className="p-4">
                <div className="overflow-x-auto">
                  <Table>
                    <TableHeader className="bg-gray-300">
                      <TableRow>
                        <TableHead className="w-[300px] text-xs">
                          URAIAN
                        </TableHead>
                        <TableHead className="text-right text-xs">
                          2020
                        </TableHead>
                        <TableHead className="text-right text-xs">
                          2021
                        </TableHead>
                        <TableHead className="text-right text-xs">
                          2022
                        </TableHead>
                        <TableHead className="text-right text-xs">
                          2023
                        </TableHead>
                      </TableRow>
                    </TableHeader>
                    <TableBody>
                      <TableRow>
                        <TableCell className="text-xs">
                          Nilai Investasi Industri Kecil
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          Rp2,957,432,390.00
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          Rp2,957,432,390.00
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          Rp306,019,965,000.00
                        </TableCell>
                        <TableCell className="text-right text-xs">-</TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Penyerapan Tenaga Kerja Menurut Jenis Industri
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          30,116
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          30,116
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          28,887
                        </TableCell>
                        <TableCell className="text-right text-xs">-</TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Penyerapan Tenaga Kerja Industri Besar
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          16,212
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          16,212
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          19,062
                        </TableCell>
                        <TableCell className="text-right text-xs">-</TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Penyerapan Tenaga Kerja Industri Kecil Menengah (IKM)
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          13,904
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          13,904
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          9,825
                        </TableCell>
                        <TableCell className="text-right text-xs">-</TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Kontribusi sektor industri terhadap PDRB
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          9.15
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          8.97
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          7.77
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          7.67
                        </TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Pertumbuhan industri pengolahan non migas
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          4.84
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          -3.85
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          3.95
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          1.67
                        </TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Kontribusi PDRB Industri Pengolahan Non Migas
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          9.15
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          8.97
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          7.77
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          7.67
                        </TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Proporsi nilai tambah IKM terhadap total nilai tambah
                          industri
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          98.29
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          98.44
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          98.38
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          99.6
                        </TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Pertumbuhan Ekspor Industri Pengolahan non migas
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          -3.85
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          4.87
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          3.95
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          -16.69
                        </TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Tenaga Kerja di Sektor Industri Non Migas
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          16,212
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          25,883
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          28,887
                        </TableCell>
                        <TableCell className="text-right text-xs">-</TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Nilai Investasi Sektor Industri Pengolahan Non Migas
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          1,080,000,000
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          1,200,000,000,000
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          13,704,547,246,093
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          27,026,584,635,157
                        </TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Nilai Ekspor Produk Industri Pengolahan (USD Miliar)
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          1.05
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          0.13
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          0.25
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          0.28
                        </TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Sentra Industri Kecil dan Menengah (IKM) di Luar Jawa
                          yang Beroperasi
                        </TableCell>
                        <TableCell className="text-right text-xs">3</TableCell>
                        <TableCell className="text-right text-xs">3</TableCell>
                        <TableCell className="text-right text-xs">3</TableCell>
                        <TableCell className="text-right text-xs">3</TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Kawasan Industri (KI) yang dikembangkan
                        </TableCell>
                        <TableCell className="text-right text-xs">1</TableCell>
                        <TableCell className="text-right text-xs">1</TableCell>
                        <TableCell className="text-right text-xs">1</TableCell>
                        <TableCell className="text-right text-xs">1</TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Proporsi nilai tambah industri kecil terhadap total
                          nilai tambah industri
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          98.29
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          98.44
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          98.38
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          99.6
                        </TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Proporsi industri kecil dengan pinjaman atau kredit
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          3.55
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          3.32
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          2.79
                        </TableCell>
                        <TableCell className="text-right text-xs">
                          15.69
                        </TableCell>
                      </TableRow>
                      <TableRow>
                        <TableCell className="text-xs">
                          Perusahaan Industri Menengah Besar Yang Tersertifikasi
                          Standar Industri Hijau (SIH) Berdasarkan SIH yang
                          ditetapkan
                        </TableCell>
                        <TableCell className="text-right text-xs">37</TableCell>
                        <TableCell className="text-right text-xs">37</TableCell>
                        <TableCell className="text-right text-xs">40</TableCell>
                        <TableCell className="text-right text-xs">45</TableCell>
                      </TableRow>
                    </TableBody>
                  </Table>
                </div>
              </CardContent>
            </Card>
          </div>

          <footer className="mt-12 text-center text-sm text-gray-600">
            Laravel v{laravelVersion} (PHP v{phpVersion})
          </footer>
        </div>
      </div>
    </SatuDataLayout>
  );
}
