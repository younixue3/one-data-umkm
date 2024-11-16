import { PageProps } from '@/types';
import { Head } from '@inertiajs/react';
import { Input } from '@/Components/ui/input';
import { Button } from '@/Components/ui/button';
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
import { Style, Circle, Fill, Stroke, Text } from 'ol/style';
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
  ResponsiveContainer,
  PieChart,
  Pie,
  Cell,
  Sector
} from 'recharts';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import Overlay from 'ol/Overlay';

const renderActiveShape = (props: any) => {
  const RADIAN = Math.PI / 180;
  const {
    cx,
    cy,
    midAngle,
    innerRadius,
    outerRadius,
    startAngle,
    endAngle,
    fill,
    payload,
    percent,
    value
  } = props;
  const sin = Math.sin(-RADIAN * midAngle);
  const cos = Math.cos(-RADIAN * midAngle);
  const sx = cx + (outerRadius + 10) * cos;
  const sy = cy + (outerRadius + 10) * sin;
  const mx = cx + (outerRadius + 30) * cos;
  const my = cy + (outerRadius + 30) * sin;
  const ex = mx + (cos >= 0 ? 1 : -1) * 22;
  const ey = my;
  const textAnchor = cos >= 0 ? 'start' : 'end';

  return (
    <g>
      <Sector
        cx={cx}
        cy={cy}
        innerRadius={innerRadius}
        outerRadius={outerRadius}
        startAngle={startAngle}
        endAngle={endAngle}
        fill={fill}
      />
      <Sector
        cx={cx}
        cy={cy}
        startAngle={startAngle}
        endAngle={endAngle}
        innerRadius={outerRadius + 6}
        outerRadius={outerRadius + 10}
        fill={fill}
      />
      <path
        d={`M${sx},${sy}L${mx},${my}L${ex},${ey}`}
        stroke={fill}
        fill="none"
      />
      <circle cx={ex} cy={ey} r={2} fill={fill} stroke="none" />
      <text
        x={ex + (cos >= 0 ? 1 : -1) * 12}
        y={ey}
        textAnchor={textAnchor}
        fill="#333"
      >{`${payload.name}`}</text>
      <text
        x={ex + (cos >= 0 ? 1 : -1) * 12}
        y={ey}
        dy={18}
        textAnchor={textAnchor}
        fill="#999"
      >
        {`(Rate ${(percent * 100).toFixed(2)}%)`}
      </text>
    </g>
  );
};

export default function Welcome({
  auth,
  laravelVersion,
  phpVersion
}: PageProps<{ laravelVersion: string; phpVersion: string }>) {
  const [nameUkm, setNameUkm] = useState('');
  const [namePerson, setNamePerson] = useState('');
  const [typeProducts, setTypeProducts] = useState<string[]>([]);
  const mapRef = useRef<HTMLDivElement>(null);
  const mapInstance = useRef<Map | null>(null);
  const vectorSource = useRef<VectorSource | null>(null);
  const popupRef = useRef<HTMLDivElement>(null);
  const overlayRef = useRef<Overlay | null>(null);
  const [activeIndex, setActiveIndex] = useState(0);
  const [selectedType, setSelectedType] = useState('');

  const ukmData = [
    {
      name: 'IPIN',
      person: 'IPIN',
      type_product: 'ANYAMAN DAN KERAJINAN TANGAN',
      lon: 117.381857,
      lat: 3.597675,
      sales: 240000,
      kecamatan: 'SESAYAP HILIR',
      kontak_person: 'IPIN',
      no_hp: '08123456789',
      kelurahan: 'SENGKONG',
      jalan: 'RT.01'
    },
    {
      name: 'BETRIS BAKERY',
      person: 'BETRIANA LILIT',
      type_product: 'ROTI DAN PIZZA',
      lon: 116.915915,
      lat: 3.604332,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'BETRIANA LILIT',
      no_hp: '08198765432',
      kelurahan: 'TIDENG PALE LIMUR',
      jalan: 'JL. PADAT KARYA GG. KENARI'
    },
    {
      name: 'RUMAH ROTI "TANA LlA"',
      person: 'MULIADI, SPd',
      type_product: 'ROTI, BROWNIES, DONAT, KUE KERING',
      lon: 116.82,
      lat: 3.02,
      sales: 240000,
      kecamatan: 'TANA LIA',
      kontak_person: 'MULIADI',
      no_hp: '081351986754',
      kelurahan: 'SAMBUNGAN',
      jalan: 'JL TARAKAN JAYA RT 003'
    },
    {
      name: 'YUMU',
      person: 'YUMU',
      type_product: 'ANYAMAN DARI ROTAN',
      lon: 116.83,
      lat: 3.03,
      sales: 240000,
      kecamatan: 'MURUK RIAN',
      kontak_person: 'YUMU',
      no_hp: '08345678901',
      kelurahan: 'RIAN RAYO',
      jalan: 'RIAN RAYO'
    },
    {
      name: 'BETAYAU TAILOR',
      person: 'SUSANTO PANG',
      type_product: 'BAJU DINAS, BAJU BATIK, KEBAYA DLL SESUAI PESANAN',
      lon: 116.84,
      lat: 3.04,
      sales: 240000,
      kecamatan: 'BETAYAU',
      kontak_person: 'SUSANTO PANG',
      no_hp: '08456789012',
      kelurahan: 'BEBAKUNG',
      jalan: 'JL  POROS KALTIM RT 01'
    },
    {
      name: 'MITRA KALTARA',
      person: 'BUDIARTO MORO',
      type_product:
        'BAJU DINAS, BAJU SERAGAM SEKOLAH, GAMIS DLL SESUAI PESANAN',
      lon: 116.85,
      lat: 3.05,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'BUDIARTO MORO',
      no_hp: '08567890123',
      kelurahan: 'TIDENG PALE',
      jalan: 'JL. JENDERAL SUDIRMAN RT.03'
    },
    {
      name: 'PENJAHIT FIRDAUS',
      person: 'MUHAMMAD IRWAN SAPRI',
      type_product:
        'BAJU DINAS, BAJU SERAGAM SEKOLAH, GAMIS DLL SESUAI PESANAN',
      lon: 116.86,
      lat: 3.06,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'MUHAMMAD IRWAN SAPRI',
      no_hp: '081348294374',
      kelurahan: 'TIDENG PALE',
      jalan: 'JL. TANAH ABANG'
    },
    {
      name: 'RAHMA BAKERY',
      person: 'RAHMA/SUWARNO',
      type_product: 'BAKERY',
      lon: 116.87,
      lat: 3.07,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'RAHMA',
      no_hp: '081350941146',
      kelurahan: 'TIDENG PALE',
      jalan: 'TMD, RT 1. RW.1'
    },
    {
      name: 'HANNI BATIK',
      person: 'MARZUKI',
      type_product: 'BATIK DAN SENDAL UKIR',
      lon: 116.88,
      lat: 3.08,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'MARZUKI',
      no_hp: '0812533002263',
      kelurahan: 'TIDENG PALE TIMUR',
      jalan: 'JL. PADAT KARYA GG. NURI'
    },
    {
      name: 'H. AMIN',
      person: 'H.AMIN',
      type_product: 'BATU BATA',
      lon: 116.89,
      lat: 3.09,
      sales: 240000,
      kecamatan: 'TANA LIA',
      kontak_person: 'H.AMIN',
      no_hp: '08901234567',
      kelurahan: 'TANAH MERAH',
      jalan: 'JL. TARAKAN JAYA'
    },
    {
      name: 'JOKO TOLE',
      person: 'JOKO TOLE',
      type_product: 'BATU BATA',
      lon: 116.9,
      lat: 3.1,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'JOKO TOLE',
      no_hp: '09012345678',
      kelurahan: 'TIDENG PALE',
      jalan: 'JL. POROS KM.08'
    },
    {
      name: 'TIGA JAYA BERSAUDARA',
      person: 'SYAMSUDIN',
      type_product: 'BATU BATA MERAH',
      lon: 116.91,
      lat: 3.11,
      sales: 240000,
      kecamatan: 'SESAYAP HILIR',
      kontak_person: 'SYAMSUDIN',
      no_hp: '085391889666',
      kelurahan: 'SESAYAP SELOR',
      jalan: 'JL. SESAYAP SELOR'
    },
    {
      name: 'CV. MURNI ABADI',
      person: 'MUHLIS SETIAWAN',
      type_product: 'BENGKEL TRALIS',
      lon: 116.92,
      lat: 3.12,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'MUHLIS SETIAWAN',
      no_hp: '081330027005',
      kelurahan: 'SEBIDAI',
      jalan: 'JL. PADAT KARYA, RT 001'
    },
    {
      name: 'JUWITA JAYA',
      person: 'ANI SUSANTI',
      type_product: 'BROWNIS KUKUS, KUP CAKE',
      lon: 116.93,
      lat: 3.13,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'ANI SUSANTI',
      no_hp: '081254837633',
      kelurahan: 'TIDENG PALE',
      jalan: 'JL. PERINTIS RT.006 RW 003'
    },
    {
      name: 'JAURAH',
      person: 'JAURAH',
      type_product: 'BULE RANGGANG',
      lon: 116.94,
      lat: 3.14,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'JAURAH',
      no_hp: '09456789012',
      kelurahan: 'BEBATU',
      jalan: 'BEBATU RT 3'
    },
    {
      name: 'RUSMALA (FARDAH)',
      person: 'RUSMALA',
      type_product: 'IKAT PINGGANG',
      lon: 116.95,
      lat: 3.15,
      sales: 240000,
      kecamatan: 'SESAYAP HILIR',
      kontak_person: 'RUSMALA',
      no_hp: '09567890123',
      kelurahan: 'MENJELUTUNG',
      jalan: 'JL. H. ISMAIL'
    },
    {
      name: 'INA MUSTAFA',
      person: 'INA MUSTAFA',
      type_product: 'KERAMIK, KERAJINAN BAHAN KAYU',
      lon: 116.96,
      lat: 3.16,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'INA MUSTAFA',
      no_hp: '0822476715',
      kelurahan: 'TIDENG PALE',
      jalan: 'JL. PERINTIS KM1'
    },
    {
      name: 'DEWI FORTUNA RAHMATDANI',
      person: 'DEWI FORTUNA RAHMATDANI',
      type_product: 'GELAS KAYU',
      lon: 116.97,
      lat: 3.17,
      sales: 240000,
      kecamatan: 'TANA LIA',
      kontak_person: 'DEWI FORTUNA RAHMATDANI',
      no_hp: '081255238414',
      kelurahan: 'SAMBUNGAN',
      jalan: 'JL GANG PGRI RT 3'
    },
    {
      name: 'FADIRA MEUBEL',
      person: 'JAWAHIR',
      type_product: 'MEUBEL',
      lon: 116.98,
      lat: 3.18,
      sales: 240000,
      kecamatan: 'BETAYAU',
      kontak_person: 'JAWAHIR',
      no_hp: '09678901234',
      kelurahan: 'BEBAKUNG',
      jalan: 'JL. POROS KALTIM'
    },
    {
      name: 'IHANG',
      person: 'IHANG',
      type_product: 'MEUBEL, PERALATAN RUMAH TANGGA',
      lon: 116.99,
      lat: 3.19,
      sales: 240000,
      kecamatan: 'BETAYAU',
      kontak_person: 'IHANG',
      no_hp: '09789012345',
      kelurahan: 'BEBAKUNG',
      jalan: 'JL TEMANGGUNG'
    },
    {
      name: 'MEUBEL LESTARI',
      person: 'M. DARMANSYAH',
      type_product: 'MEUBEL',
      lon: 117.0,
      lat: 3.2,
      sales: 240000,
      kecamatan: 'SESAYAP HILIR',
      kontak_person: 'M. DARMANSYAH',
      no_hp: '09890123456',
      kelurahan: 'MENJELUTUNG',
      jalan: 'JL. JABOL'
    },
    {
      name: 'KATENI',
      person: 'KATENI',
      type_product: 'KACAMATA, PERLENGKAPAN KANTOR',
      lon: 117.01,
      lat: 3.21,
      sales: 240000,
      kecamatan: 'SESAYAP',
      kontak_person: 'KATENI',
      no_hp: '085246160418',
      kelurahan: 'SEBIDAI',
      jalan: 'JL. MANUNGGAL ABRI RT 04'
    }
  ];

  const productTypes = [...new Set(ukmData.map(item => item.type_product))];

  useEffect(() => {
    if (mapRef.current && !mapInstance.current) {
      vectorSource.current = new VectorSource();

      const vectorLayer = new VectorLayer({
        source: vectorSource.current
      });

      mapInstance.current = new Map({
        target: mapRef.current,
        layers: [
          new TileLayer({
            source: new OSM()
          }),
          vectorLayer
        ],
        view: new View({
          center: fromLonLat([116.5, 2.5]), // Pusat peta di Kalimantan Utara
          zoom: 8 // Sesuaikan tingkat zoom jika diperlukan
        })
      });

      // Add initial features
      addFeatures(ukmData);

      // Create and add the overlay
      overlayRef.current = new Overlay({
        element: popupRef.current!
      });
      mapInstance.current.addOverlay(overlayRef.current);

      // Add click interaction
      mapInstance.current.on('click', handleMapClick);
    }
  }, []);

  const handleMapClick = (event: any) => {
    if (!mapInstance.current) return;

    const feature = mapInstance.current.forEachFeatureAtPixel(
      event.pixel,
      feature => feature
    );

    if (feature && feature instanceof Feature) {
      const coordinates = (feature.getGeometry() as Point).getCoordinates();
      const properties = feature.getProperties();

      overlayRef.current!.setPosition(coordinates);
      popupRef.current!.innerHTML = `
                <div class="p-2 bg-white rounded shadow-lg">
                    <h3 class="font-bold text-lg mb-2">${properties.name}</h3>
                    <p><strong>Person:</strong> ${properties.person}</p>
                    <p><strong>Type:</strong> ${properties.type_product}</p>
                    <p><strong>Sales:</strong> ${properties.sales}</p>
                </div>
            `;
      popupRef.current!.style.display = 'block';
    } else {
      overlayRef.current!.setPosition(undefined);
      popupRef.current!.style.display = 'none';
    }
  };

  const addFeatures = (data: any[]) => {
    if (!vectorSource.current) return;

    vectorSource.current.clear();

    data.forEach(item => {
      const feature = new Feature({
        geometry: new Point(fromLonLat([item.lon, item.lat])),
        name: item.name,
        person: item.person,
        type_product: item.type_product,
        sales: item.sales
      });

      feature.setStyle(
        new Style({
          image: new Circle({
            radius: 8,
            fill: new Fill({ color: getColorForProduct(item.type_product) }),
            stroke: new Stroke({ color: '#ffffff', width: 2 })
          }),
          text: new Text({
            text: item.name,
            offsetY: -15,
            fill: new Fill({ color: '#000000' }),
            stroke: new Stroke({ color: '#ffffff', width: 3 })
          })
        })
      );

      vectorSource.current!.addFeature(feature);
    });
  };

  const getColorForProduct = (type: string) => {
    const colors: { [key: string]: string } = {
      Batik: '#FF6B6B',
      Makanan: '#4ECDC4',
      Kerajinan: '#45B7D1',
      Tekstil: '#FFA07A',
      Aksesoris: '#FFD700',
      Minuman: '#98FB98'
    };
    return colors[type] || '#000000';
  };

  const handleSearch = () => {
    const filteredData = ukmData.filter(item => {
      return (
        (nameUkm === '' ||
          item.name.toLowerCase().includes(nameUkm.toLowerCase())) &&
        (namePerson === '' ||
          item.person.toLowerCase().includes(namePerson.toLowerCase())) &&
        (typeProducts.length === 0 || typeProducts.includes(item.type_product))
      );
    });

    addFeatures(filteredData);
  };

  const horizontalBarChartData = ukmData.map(item => ({
    name: item.name,
    sales: item.sales,
    fill: getColorForProduct(item.type_product)
  }));

  const verticalBarChartData = productTypes.map(type => ({
    name: type,
    count: ukmData.filter(item => item.type_product === type).length,
    fill: getColorForProduct(type)
  }));

  const lineChartData = ukmData.map(item => ({
    name: item.name,
    sales: item.sales
  }));

  const pieChartData = productTypes.map(type => ({
    name: type,
    value: ukmData.filter(item => item.type_product === type).length
  }));

  const handlePieClick = (data: any, index: number) => {
    setActiveIndex(index);
    setSelectedType(data.name);
  };

  const filteredUkmData = selectedType
    ? ukmData.filter(item => item.type_product === selectedType)
    : ukmData;

  return (
    <>
      <Head title="Welcome" />
      <div className="bg-gray-100 min-h-screen p-8">
        <div className="max-w-7xl mx-auto">
          <h1 className="text-4xl font-bold text-gray-800 mb-8">
            UKM Dashboard
          </h1>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <Card className="col-span-1">
              <CardHeader>
                <CardTitle>Search UKM</CardTitle>
              </CardHeader>
              <CardContent>
                <div className="space-y-4">
                  <Input
                    type="text"
                    placeholder="Enter UKM name"
                    value={nameUkm}
                    onChange={e => setNameUkm(e.target.value)}
                  />
                  <Input
                    type="text"
                    placeholder="Enter person name"
                    value={namePerson}
                    onChange={e => setNamePerson(e.target.value)}
                  />
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
                      {productTypes.map(type => (
                        <SelectItem key={type} value={type}>
                          {type}
                        </SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                  <Button
                    onClick={handleSearch}
                    className="w-full bg-blue-600 hover:bg-blue-700 text-white"
                  >
                    Search
                  </Button>
                </div>
              </CardContent>
            </Card>

            <Card className="col-span-2">
              <CardHeader>
                <CardTitle>UKM Map</CardTitle>
              </CardHeader>
              <CardContent>
                <div
                  ref={mapRef}
                  className="h-[400px] rounded-lg overflow-hidden"
                ></div>
                <div ref={popupRef} className="ol-popup"></div>
              </CardContent>
            </Card>

            <Card className="col-span-1">
              <CardHeader>
                <CardTitle>UKM Types</CardTitle>
              </CardHeader>
              <CardContent>
                <ResponsiveContainer width="100%" height={300}>
                  <PieChart>
                    <Pie
                      activeIndex={activeIndex}
                      activeShape={renderActiveShape}
                      data={pieChartData}
                      cx="50%"
                      cy="50%"
                      innerRadius={60}
                      outerRadius={80}
                      fill="#8884d8"
                      dataKey="value"
                      onMouseEnter={handlePieClick}
                    >
                      {pieChartData.map((entry, index) => (
                        <Cell
                          key={`cell-${index}`}
                          fill={getColorForProduct(entry.name)}
                        />
                      ))}
                    </Pie>
                  </PieChart>
                </ResponsiveContainer>
              </CardContent>
            </Card>

            <Card className="col-span-2">
              <CardHeader>
                <CardTitle>UKM Sales</CardTitle>
              </CardHeader>
              <CardContent>
                <ResponsiveContainer width="100%" height={300}>
                  <BarChart layout="vertical" data={horizontalBarChartData}>
                    <CartesianGrid strokeDasharray="3 3" />
                    <XAxis type="number" />
                    <YAxis dataKey="name" type="category" width={150} />
                    <Tooltip />
                    <Legend />
                    <Bar dataKey="sales" />
                  </BarChart>
                </ResponsiveContainer>
              </CardContent>
            </Card>

            <Card className="col-span-3">
              <CardHeader>
                <CardTitle>Sales Trend</CardTitle>
              </CardHeader>
              <CardContent>
                <ResponsiveContainer width="100%" height={300}>
                  <LineChart data={lineChartData}>
                    <CartesianGrid strokeDasharray="3 3" />
                    <XAxis dataKey="name" />
                    <YAxis />
                    <Tooltip />
                    <Legend />
                    <Line type="monotone" dataKey="sales" stroke="#8884d8" />
                  </LineChart>
                </ResponsiveContainer>
              </CardContent>
            </Card>

            <Card className="col-span-3">
              <CardHeader>
                <CardTitle>UKM Data Table</CardTitle>
              </CardHeader>
              <CardContent>
                <div className="overflow-x-auto">
                  <table className="w-full text-left">
                    <thead>
                      <tr className="bg-gray-200">
                        <th className="p-2">Name</th>
                        <th className="p-2">Person</th>
                        <th className="p-2">Type</th>
                        <th className="p-2">Sales</th>
                      </tr>
                    </thead>
                    <tbody>
                      {ukmData.map((item, index) => (
                        <tr
                          key={index}
                          className={
                            index % 2 === 0 ? 'bg-white' : 'bg-gray-50'
                          }
                        >
                          <td className="p-2">{item.name}</td>
                          <td className="p-2">{item.person}</td>
                          <td className="p-2">{item.type_product}</td>
                          <td className="p-2">{item.sales}</td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
              </CardContent>
            </Card>
          </div>

          <footer className="mt-12 text-center text-sm text-gray-600">
            Laravel v{laravelVersion} (PHP v{phpVersion})
          </footer>
        </div>
      </div>
    </>
  );
}
