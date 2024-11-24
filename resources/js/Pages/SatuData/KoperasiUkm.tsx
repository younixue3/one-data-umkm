import { Head } from '@inertiajs/react';
import SatuDataLayout from '@/Layouts/SatuDataLayout';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import { Bar } from 'recharts';
import { Legend, LineChart, Tooltip, YAxis } from 'recharts';
import { CartesianGrid, Line, XAxis } from 'recharts';
import { ResponsiveContainer } from 'recharts';
import { BarChart } from 'recharts';
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue
} from '@/Components/ui/select';
import { useState, useEffect } from 'react';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import { fromLonLat } from 'ol/proj';

const koperasiData = [
  {
    id: '366',
    uraian: 'KABUPATEN BULUNGAN',
    '2020': '132',
    '2021': '140',
    '2022': '145',
    '2023': '244'
  },
  {
    id: '367',
    uraian: 'KABUPATEN MALINAU',
    '2020': '826',
    '2021': '881',
    '2022': '963',
    '2023': '124'
  },
  {
    id: '368',
    uraian: 'KABUPATEN NUNUKAN',
    '2020': '26412',
    '2021': '21084',
    '2022': '22476',
    '2023': '349'
  },
  {
    id: '369',
    uraian: 'KABUPATEN TANA TIDUNG',
    '2020': '16495',
    '2021': '13063',
    '2022': '13107',
    '2023': '60'
  },
  {
    id: '370',
    uraian: 'KOTA TARAKAN',
    '2020': '9802',
    '2021': '7899',
    '2022': '9232',
    '2023': '158'
  },
  {
    uraian: 'PROVINSI KALIMANTAN UTARA',
    '2020': '171',
    '2021': '190',
    '2022': '142',
    '2023': '43'
  }
];

const umkmSkalaData = [
  { year: '2020', mikro: 10708, kecil: 2056, menengah: 1621 },
  { year: '2021', mikro: 10708, kecil: 2056, menengah: 1621 },
  { year: '2022', mikro: 17274, kecil: 2757, menengah: 416 },
  { year: '2023', mikro: 35153, kecil: 8293, menengah: 606 }
];

const koperasiAktifData = [
  {
    id: '366',
    uraian: 'KABUPATEN BULUNGAN',
    '2020': '123',
    '2021': '131',
    '2022': '136',
    '2023': '177'
  },
  {
    id: '367',
    uraian: 'KABUPATEN MALINAU',
    '2020': '80',
    '2021': '80',
    '2022': '98',
    '2023': '96'
  },
  {
    id: '368',
    uraian: 'KABUPATEN NUNUKAN',
    '2020': '212',
    '2021': '229',
    '2022': '249',
    '2023': '264'
  },
  {
    id: '369',
    uraian: 'KABUPATEN TANA TIDUNG',
    '2020': '27',
    '2021': '28',
    '2022': '23',
    '2023': '32'
  },
  {
    id: '370',
    uraian: 'KOTA TARAKAN',
    '2020': '70',
    '2021': '79',
    '2022': '89',
    '2023': '107'
  }
];

const jenisKoperasiData = [
  { name: 'Koperasi Usaha Desa (KUD)', '2021': 9, '2022': 9, '2023': 9 },
  { name: 'Non Koperasi Usaha Desa', '2021': 746, '2022': 801, '2023': 865 },
  { name: 'Koperasi Primer', '2021': 752, '2022': 806, '2023': 870 },
  { name: 'Koperasi Sekunder', '2021': 3, '2022': 4, '2023': 4 },
  { name: 'Koperasi Jasa', '2021': 61, '2022': 81, '2023': 88 },
  { name: 'Koperasi Konsumen', '2021': 381, '2022': 394, '2023': 416 },
  { name: 'Koperasi Pemasaran', '2021': 47, '2022': 57, '2023': 65 },
  { name: 'Koperasi Produsen', '2021': 245, '2022': 253, '2023': 281 },
  { name: 'Koperasi Simpan Pinjam', '2021': 21, '2022': 25, '2023': 24 },
  {
    name: 'Jumlah Koperasi yang berkualitas',
    '2021': 103,
    '2022': 120,
    '2023': 72
  },
  {
    name: 'Persentase Koperasi yang Berkualitas',
    '2021': 14,
    '2022': 11,
    '2023': 13
  }
];

const koperasiKabupatenData = [
  {
    id: '366',
    year: '2020',
    'KABUPATEN BULUNGAN': 3480,
    'KABUPATEN MALINAU': 919,
    'KABUPATEN NUNUKAN': 652,
    'KABUPATEN TANA TIDUNG': 2756,
    'KOTA TARAKAN': 6578
  },
  {
    id: '367',
    year: '2021',
    'KABUPATEN BULUNGAN': 8779,
    'KABUPATEN MALINAU': 2542,
    'KABUPATEN NUNUKAN': 1151,
    'KABUPATEN TANA TIDUNG': 13903,
    'KOTA TARAKAN': 9021
  },
  {
    id: '368',
    year: '2022',
    'KABUPATEN BULUNGAN': 3674,
    'KABUPATEN MALINAU': 973,
    'KABUPATEN NUNUKAN': 1491,
    'KABUPATEN TANA TIDUNG': 4157,
    'KOTA TARAKAN': 10152
  }
];

const umkmData = [
  {
    id: '366',
    year: '2015',
    'KABUPATEN BULUNGAN': 3333,
    'KABUPATEN MALINAU': 164,
    'KABUPATEN NUNUKAN': 2442,
    'KABUPATEN TANA TIDUNG': 505,
    'KOTA TARAKAN': 2110
  },
  {
    id: '367',
    year: '2016',
    'KABUPATEN BULUNGAN': 3415,
    'KABUPATEN MALINAU': 1803,
    'KABUPATEN NUNUKAN': 2137,
    'KABUPATEN TANA TIDUNG': 463,
    'KOTA TARAKAN': 3931
  },
  {
    id: '368',
    year: '2017',
    'KABUPATEN BULUNGAN': 3480,
    'KABUPATEN MALINAU': 1482,
    'KABUPATEN NUNUKAN': 2441,
    'KABUPATEN TANA TIDUNG': 535,
    'KOTA TARAKAN': 2659
  },
  {
    id: '369',
    year: '2018',
    'KABUPATEN BULUNGAN': 3480,
    'KABUPATEN MALINAU': 1144,
    'KABUPATEN NUNUKAN': 2535,
    'KABUPATEN TANA TIDUNG': 613,
    'KOTA TARAKAN': 4451
  },
  {
    id: '370',
    year: '2019',
    'KABUPATEN BULUNGAN': 3480,
    'KABUPATEN MALINAU': 919,
    'KABUPATEN NUNUKAN': 2756,
    'KABUPATEN TANA TIDUNG': 652,
    'KOTA TARAKAN': 13537
  },
  {
    year: '2020',
    'KABUPATEN BULUNGAN': 3480,
    'KABUPATEN MALINAU': 919,
    'KABUPATEN NUNUKAN': 2756,
    'KABUPATEN TANA TIDUNG': 652,
    'KOTA TARAKAN': 6578
  },
  {
    year: '2021',
    'KABUPATEN BULUNGAN': 8779,
    'KABUPATEN MALINAU': 2542,
    'KABUPATEN NUNUKAN': 13903,
    'KABUPATEN TANA TIDUNG': 1151,
    'KOTA TARAKAN': 9021
  },
  {
    year: '2022',
    'KABUPATEN BULUNGAN': 9386,
    'KABUPATEN MALINAU': 2005,
    'KABUPATEN NUNUKAN': 13145,
    'KABUPATEN TANA TIDUNG': 1366,
    'KOTA TARAKAN': 10015
  },
  {
    year: '2023',
    'KABUPATEN BULUNGAN': 10780,
    'KABUPATEN MALINAU': 3276,
    'KABUPATEN NUNUKAN': 7739,
    'KABUPATEN TANA TIDUNG': 2749,
    'KOTA TARAKAN': 19508
  }
];

export default function KoperasiUkm() {
  const [selectedKabupaten, setSelectedKabupaten] = useState('all');
  const [map, setMap] = useState<Map | null>(null);

  const filteredKoperasiData =
    selectedKabupaten === 'all'
      ? koperasiData
      : koperasiData.filter(item => item.id === selectedKabupaten);

  const filteredKoperasiAktifData =
    selectedKabupaten === 'all'
      ? koperasiAktifData
      : koperasiAktifData.filter(item => item.id === selectedKabupaten);

  const getKabupatenName = (id: string) => {
    switch (id) {
      case '366':
        return 'KABUPATEN BULUNGAN';
      case '367':
        return 'KABUPATEN MALINAU';
      case '368':
        return 'KABUPATEN NUNUKAN';
      case '369':
        return 'KABUPATEN TANA TIDUNG';
      case '370':
        return 'KOTA TARAKAN';
      default:
        return null;
    }
  };

  const filteredKoperasiKabupatenData = koperasiKabupatenData.map(item => {
    if (selectedKabupaten === 'all') {
      return item;
    }
    const kabName = getKabupatenName(selectedKabupaten);
    if (!kabName) return item;

    return {
      year: item.year,
      [kabName]: item[kabName]
    };
  });

  const filteredUmkmData = umkmData.map(item => {
    if (selectedKabupaten === 'all') {
      return item;
    }
    const kabName = getKabupatenName(selectedKabupaten);
    if (!kabName) return item;

    return {
      year: item.year,
      [kabName]: item[kabName]
    };
  });

  useEffect(() => {
    const initialMap = new Map({
      target: 'map',
      layers: [
        new TileLayer({
          source: new OSM()
        })
      ],
      view: new View({
        center: fromLonLat([116.8625, 3.3319]), // Coordinates for Kalimantan Utara
        zoom: 8
      })
    });

    setMap(initialMap);

    return () => {
      if (initialMap) {
        initialMap.setTarget(undefined);
      }
    };
  }, []);

  return (
    <SatuDataLayout title="Koperasi dan UKM">
      <Head title="Koperasi dan UKM - SatuData" />
      <div className="bg-gray-100 h-screen overflow-hidden p-8">
        <div className="max-w-7xl mx-auto">
          <div className="mb-4">
            <Select
              value={selectedKabupaten}
              onValueChange={setSelectedKabupaten}
            >
              <SelectTrigger className="w-[280px]">
                <SelectValue placeholder="Pilih Kabupaten/Kota" />
              </SelectTrigger>
              <SelectContent>
                <SelectItem value="all">Semua Kabupaten/Kota</SelectItem>
                <SelectItem value="366">Kabupaten Bulungan</SelectItem>
                <SelectItem value="367">Kabupaten Malinau</SelectItem>
                <SelectItem value="368">Kabupaten Nunukan</SelectItem>
                <SelectItem value="369">Kabupaten Tana Tidung</SelectItem>
                <SelectItem value="370">Kota Tarakan</SelectItem>
              </SelectContent>
            </Select>
          </div>
          <div className="grid grid-cols-5 gap-4">
            {/* Bar Chart Horizontal - Jumlah Koperasi */}
            <Card className="col-span-2 row-span-1">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Jumlah Koperasi
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="h-[200px]">
                  <ResponsiveContainer width="100%" height="100%">
                    <BarChart
                      layout="horizontal"
                      data={filteredKoperasiData}
                      margin={{ right: 30, bottom: 5 }}
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
                      <Bar dataKey="2020" fill="#8884d8" name="2020" />
                      <Bar dataKey="2021" fill="#82ca9d" name="2021" />
                      <Bar dataKey="2022" fill="#ffc658" name="2022" />
                      <Bar dataKey="2023" fill="#ff7300" name="2023" />
                    </BarChart>
                  </ResponsiveContainer>
                </div>
              </CardContent>
            </Card>

            {/* Map */}
            <Card className="col-span-2 row-span-1">
              <CardContent>
                <div id="map" className="h-[320px] w-full" />
              </CardContent>
            </Card>

            {/* Line Chart - UMKM Berdasarkan Skala */}
            <Card className="col-span-1 row-span-1">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Jumlah UMKM Berdasarkan Skala Usaha
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="h-[200px]">
                  <ResponsiveContainer width="100%" height="100%">
                    <LineChart
                      data={umkmSkalaData}
                      margin={{ top: 10, right: 30, bottom: 5 }}
                    >
                      <CartesianGrid strokeDasharray="3 3" />
                      <XAxis dataKey="year" tick={{ fontSize: 10 }} />
                      <YAxis tick={{ fontSize: 10 }} />
                      <Tooltip contentStyle={{ fontSize: 10 }} />
                      <Legend wrapperStyle={{ fontSize: 10 }} />
                      <Line
                        type="monotone"
                        dataKey="mikro"
                        stroke="#8884d8"
                        strokeWidth={3}
                        name="Mikro"
                      />
                      <Line
                        type="monotone"
                        dataKey="kecil"
                        stroke="#82ca9d"
                        strokeWidth={3}
                        name="Kecil"
                      />
                      <Line
                        type="monotone"
                        dataKey="menengah"
                        stroke="#ffc658"
                        strokeWidth={3}
                        name="Menengah"
                      />
                    </LineChart>
                  </ResponsiveContainer>
                </div>
              </CardContent>
            </Card>

            {/* Bar Chart Horizontal - Koperasi Aktif */}
            <Card className="col-span-2 row-span-1">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Jumlah Koperasi Aktif
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="h-[200px]">
                  <ResponsiveContainer width="100%" height="100%">
                    <BarChart
                      layout="horizontal"
                      data={filteredKoperasiAktifData}
                      margin={{ top: 10, right: 30, bottom: 5 }}
                    >
                      <CartesianGrid strokeDasharray="3 3" />
                      <XAxis
                        dataKey="uraian"
                        tick={{ fontSize: 10, width: 100 }}
                        interval={0}
                      />
                      <YAxis tick={{ fontSize: 10 }} />
                      <Tooltip contentStyle={{ fontSize: 10 }} />
                      <Legend wrapperStyle={{ fontSize: 10 }} />
                      <Bar dataKey="2020" fill="#8884d8" name="2020" />
                      <Bar dataKey="2021" fill="#82ca9d" name="2021" />
                      <Bar dataKey="2022" fill="#ffc658" name="2022" />
                      <Bar dataKey="2023" fill="#ff7300" name="2023" />
                    </BarChart>
                  </ResponsiveContainer>
                </div>
              </CardContent>
            </Card>

            {/* Bar Chart Vertical - Jenis Koperasi */}
            <Card className="col-span-1 row-span-1">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Jenis Koperasi
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="h-[200px] overflow-auto">
                  <ResponsiveContainer width="100%" height={400}>
                    <BarChart
                      layout="vertical"
                      data={jenisKoperasiData}
                      margin={{ top: 10, right: 30, bottom: 5 }}
                      barSize={20}
                    >
                      <CartesianGrid strokeDasharray="3 3" />
                      <XAxis type="number" tick={{ fontSize: 10 }} />
                      <YAxis type="category" dataKey="name" width={70} />
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

            {/* Line Chart - Koperasi Per Kabupaten */}
            <Card className="col-span-1 row-span-1">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Koperasi Per Kabupaten/Kota
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="h-[200px]">
                  <ResponsiveContainer width="100%" height="100%">
                    <LineChart
                      data={filteredKoperasiKabupatenData}
                      margin={{ right: 10, bottom: 10 }}
                    >
                      <CartesianGrid strokeDasharray="3 3" />
                      <XAxis
                        dataKey="year"
                        tick={{ fontSize: 10, fontWeight: 'bold' }}
                      />
                      <YAxis tick={{ fontSize: 10, fontWeight: 'bold' }} />
                      <Tooltip contentStyle={{ fontSize: 10 }} />
                      <Line
                        type="linear"
                        dataKey="KABUPATEN BULUNGAN"
                        stroke="#8884d8"
                        strokeWidth={3}
                        name="Kab. Bulungan"
                      />
                      <Line
                        type="linear"
                        dataKey="KABUPATEN MALINAU"
                        stroke="#82ca9d"
                        strokeWidth={3}
                        name="Kab. Malinau"
                      />
                      <Line
                        type="linear"
                        dataKey="KABUPATEN NUNUKAN"
                        stroke="#ffc658"
                        strokeWidth={3}
                        name="Kab. Nunukan"
                      />
                      <Line
                        type="linear"
                        dataKey="KABUPATEN TANA TIDUNG"
                        stroke="#ff7300"
                        strokeWidth={3}
                        name="Kab. Tana Tidung"
                      />
                      <Line
                        type="linear"
                        dataKey="KOTA TARAKAN"
                        stroke="#ff0000"
                        strokeWidth={3}
                        name="Kota Tarakan"
                      />
                      <Line
                        type="linear"
                        dataKey="PROVINSI KALIMANTAN UTARA"
                        stroke="#ff0000"
                        strokeWidth={3}
                        name="Prov. Kalimantan Utara"
                      />
                    </LineChart>
                  </ResponsiveContainer>
                </div>
              </CardContent>
            </Card>

            {/* Line Chart - Jumlah UMKM */}
            <Card className="col-span-1 row-span-1">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Jumlah UMKM
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="h-[200px]">
                  <ResponsiveContainer width="100%" height="100%">
                    <LineChart
                      data={filteredUmkmData}
                      margin={{ right: 10, bottom: 10 }}
                    >
                      <CartesianGrid strokeDasharray="3 3" />
                      <XAxis
                        dataKey="year"
                        tick={{ fontSize: 10, fontWeight: 'bold' }}
                      />
                      <YAxis tick={{ fontSize: 10, fontWeight: 'bold' }} />
                      <Tooltip contentStyle={{ fontSize: 10 }} />
                      <Line
                        type="linear"
                        dataKey="KABUPATEN BULUNGAN"
                        stroke="#8884d8"
                        strokeWidth={1.5}
                        name="Kab. Bulungan"
                      />
                      <Line
                        type="linear"
                        dataKey="KABUPATEN MALINAU"
                        stroke="#82ca9d"
                        strokeWidth={1.5}
                        name="Kab. Malinau"
                      />
                      <Line
                        type="linear"
                        dataKey="KABUPATEN NUNUKAN"
                        stroke="#ffc658"
                        strokeWidth={1.5}
                        name="Kab. Nunukan"
                      />
                      <Line
                        type="linear"
                        dataKey="KABUPATEN TANA TIDUNG"
                        stroke="#ff7300"
                        strokeWidth={1.5}
                        name="Kab. Tana Tidung"
                      />
                      <Line
                        type="linear"
                        dataKey="KOTA TARAKAN"
                        stroke="#ff0000"
                        strokeWidth={1.5}
                        name="Kota Tarakan"
                      />
                      <Line
                        type="linear"
                        dataKey="PROVINSI KALIMANTAN UTARA"
                        stroke="#ff0000"
                        strokeWidth={1.5}
                        name="Prov. Kalimantan Utara"
                      />
                    </LineChart>
                  </ResponsiveContainer>
                </div>
              </CardContent>
            </Card>
          </div>
        </div>
      </div>
    </SatuDataLayout>
  );
}
