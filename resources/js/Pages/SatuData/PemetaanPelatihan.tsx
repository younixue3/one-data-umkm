import { Head } from '@inertiajs/react';
import SatuDataLayout from '@/Layouts/SatuDataLayout';
import { useState, useEffect } from 'react';
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue
} from '@/Components/ui/select';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import {
  PieChart,
  Pie,
  Cell,
  Tooltip,
  ResponsiveContainer,
  Legend
} from 'recharts';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import { fromLonLat } from 'ol/proj';
import { Button } from '@/Components/ui/button';

const COLORS = ['#0088FE', '#00C49F', '#FFBB28', '#FF8042', '#8884d8'];

export default function PemetaanPelatihan() {
  const [selectedKabupaten, setSelectedKabupaten] = useState<
    '366' | '367' | '368' | '369' | '370' | 'all'
  >('all');
  const [map, setMap] = useState<Map | null>(null);

  const provinsiData = [
    { name: 'ASPEK PRODUKSI', value: 29.13 },
    { name: 'ASPEK SDM', value: 25.48 },
    { name: 'ASPEK KELEMBAGA', value: 22.26 },
    { name: 'ASPEK PEMASARAN', value: 15.95 },
    { name: 'ASPEK KEUANGAN', value: 7.18 }
  ];

  const kabupatenData = {
    '366': [
      // Bulungan
      { name: 'ASPEK PRODUKSI', value: 35.0 },
      { name: 'ASPEK SDM', value: 28.0 },
      { name: 'ASPEK KELEMBAGA', value: 20.0 },
      { name: 'ASPEK PEMASARAN', value: 12.0 },
      { name: 'ASPEK KEUANGAN', value: 5.0 }
    ],
    '367': [
      // Malinau
      { name: 'ASPEK PRODUKSI', value: 30.0 },
      { name: 'ASPEK SDM', value: 25.0 },
      { name: 'ASPEK KELEMBAGA', value: 23.0 },
      { name: 'ASPEK PEMASARAN', value: 15.0 },
      { name: 'ASPEK KEUANGAN', value: 7.0 }
    ],
    '368': [
      // Nunukan
      { name: 'ASPEK PRODUKSI', value: 32.0 },
      { name: 'ASPEK SDM', value: 27.0 },
      { name: 'ASPEK KELEMBAGA', value: 21.0 },
      { name: 'ASPEK PEMASARAN', value: 13.0 },
      { name: 'ASPEK KEUANGAN', value: 7.0 }
    ],
    '369': [
      // Tana Tidung
      { name: 'ASPEK PRODUKSI', value: 28.0 },
      { name: 'ASPEK SDM', value: 26.0 },
      { name: 'ASPEK KELEMBAGA', value: 24.0 },
      { name: 'ASPEK PEMASARAN', value: 14.0 },
      { name: 'ASPEK KEUANGAN', value: 8.0 }
    ],
    '370': [
      // Tarakan
      { name: 'ASPEK PRODUKSI', value: 31.0 },
      { name: 'ASPEK SDM', value: 26.0 },
      { name: 'ASPEK KELEMBAGA', value: 22.0 },
      { name: 'ASPEK PEMASARAN', value: 14.0 },
      { name: 'ASPEK KEUANGAN', value: 7.0 }
    ],
    all: [
      // Default/All
      { name: 'ASPEK PRODUKSI', value: 29.13 },
      { name: 'ASPEK SDM', value: 25.48 },
      { name: 'ASPEK KELEMBAGA', value: 22.26 },
      { name: 'ASPEK PEMASARAN', value: 15.95 },
      { name: 'ASPEK KEUANGAN', value: 7.18 }
    ]
  };

  useEffect(() => {
    if (!map) {
      const initialMap = new Map({
        target: 'map',
        layers: [
          new TileLayer({
            source: new OSM()
          })
        ],
        view: new View({
          center: fromLonLat([117.0794, 3.3391]), // Center of North Kalimantan
          zoom: 8
        })
      });
      setMap(initialMap);
    }
  }, [map]);

  return (
    <SatuDataLayout title="Pemetaan Pelatihan">
      <Head title="Pemetaan Pelatihan - SatuData" />
      <div className="bg-gray-100 h-screen overflow-hidden p-8">
        <div className="max-w-7xl mx-auto">
          <div className="grid grid-cols-5 gap-4">
            {/* Filter Section */}
            <Card className="col-span-1 row-span-2">
              <CardHeader>
                <CardTitle className="text-base">Filter Kabupaten</CardTitle>
              </CardHeader>
              <CardContent className="p-4">
                <div className="space-y-4">
                  <Select
                    value={selectedKabupaten}
                    onValueChange={(value:any) => setSelectedKabupaten(value)}
                  >
                    <SelectTrigger>
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
                  <Button className="w-full bg-blue-600 hover:bg-blue-700 text-white">
                    Search
                  </Button>
                </div>
              </CardContent>
            </Card>
            {/* Map Section */}
            <Card className="col-span-2 row-span-2">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Peta Sebaran Pelatihan
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div id="map" className="h-[500px]"></div>
              </CardContent>
            </Card>

            {/* Pie Chart Provinsi */}
            <Card className="col-span-2 row-span-1">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Pemetaan Pelatihan Provinsi
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="h-[200px]">
                  <ResponsiveContainer width="100%" height="100%">
                    <PieChart>
                      <Pie
                        data={provinsiData}
                        cx="50%"
                        cy="50%"
                        labelLine={true}
                        label={({ name, percent }: any) =>
                          `${name} ${(percent * 100).toFixed(0)}%`
                        }
                        outerRadius={50}
                        fill="#8884d8"
                        dataKey="value"
                      >
                        {provinsiData.map((entry, index) => (
                          <Cell
                            key={`cell-${index}`}
                            fill={COLORS[index % COLORS.length]}
                          />
                        ))}
                      </Pie>
                      <Tooltip />
                      <Legend
                        verticalAlign="bottom"
                        height={36}
                        wrapperStyle={{
                          fontSize: '5px'
                        }}
                      />
                    </PieChart>
                  </ResponsiveContainer>
                </div>
              </CardContent>
            </Card>

            {/* Pie Chart Kabupaten */}
            <Card className="col-span-2 row-span-1">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Pemetaan Pelatihan Kabupaten/Kota
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="h-[200px]">
                  <ResponsiveContainer width="100%" height="100%">
                    <PieChart>
                      <Pie
                        data={kabupatenData[selectedKabupaten]}
                        cx="50%"
                        cy="50%"
                        labelLine={true}
                        label={({ name, percent }: any) =>
                          `${name} ${(percent * 100).toFixed(0)}%`
                        }
                        outerRadius={50}
                        fill="#8884d8"
                        dataKey="value"
                      >
                        {kabupatenData[selectedKabupaten].map(
                          (entry, index) => (
                            <Cell
                              key={`cell-${index}`}
                              fill={COLORS[index % COLORS.length]}
                            />
                          )
                        )}
                      </Pie>
                      <Tooltip />
                      <Legend
                        verticalAlign="bottom"
                        height={36}
                        wrapperStyle={{
                          fontSize: '5px'
                        }}
                      />
                    </PieChart>
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
