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
      name: 'Batik Samarinda Hj. Suryani',
      person: 'Hj. Suryani',
      type_product: 'Batik',
      lon: 117.1431,
      lat: -0.4917,
      sales: 1200
    },
    {
      name: 'Amplang Gabus Mahakam',
      person: 'Ibu Siti',
      type_product: 'Makanan',
      lon: 117.117,
      lat: -0.4948,
      sales: 1500
    },
    {
      name: 'Kerajinan Rotan Borneo',
      person: 'Pak Hasan',
      type_product: 'Kerajinan',
      lon: 117.1508,
      lat: -0.5016,
      sales: 800
    },
    {
      name: 'Sarung Samarinda Cap Gajah Duduk',
      person: 'H. Abdullah',
      type_product: 'Tekstil',
      lon: 117.1592,
      lat: -0.4975,
      sales: 1000
    },
    {
      name: 'Kue Lapis Samarinda Bu Ayu',
      person: 'Ibu Ayu',
      type_product: 'Makanan',
      lon: 117.1214,
      lat: -0.5001,
      sales: 2000
    },
    {
      name: 'Anyaman Bambu Dayak',
      person: 'Pak Budi',
      type_product: 'Kerajinan',
      lon: 117.1346,
      lat: -0.4889,
      sales: 600
    },
    {
      name: 'Dodol Samarinda Pak Amir',
      person: 'Pak Amir',
      type_product: 'Makanan',
      lon: 117.1253,
      lat: -0.4932,
      sales: 1800
    },
    {
      name: 'Kalung Manik Dayak',
      person: 'Ibu Dewi',
      type_product: 'Aksesoris',
      lon: 117.1475,
      lat: -0.5058,
      sales: 500
    },
    {
      name: 'Kopi Kutai',
      person: 'Pak Dedi',
      type_product: 'Minuman',
      lon: 117.1392,
      lat: -0.4967,
      sales: 2200
    },
    {
      name: 'Tas Ulap Doyo Dayak',
      person: 'Ibu Yanti',
      type_product: 'Kerajinan',
      lon: 117.1531,
      lat: -0.4941,
      sales: 700
    },
    {
      name: 'Keripik Pisang Mahakam',
      person: 'Pak Rudi',
      type_product: 'Makanan',
      lon: 117.1287,
      lat: -0.5034,
      sales: 1300
    },
    {
      name: 'Madu Hutan Kalimantan',
      person: 'Ibu Sari',
      type_product: 'Makanan',
      lon: 117.1409,
      lat: -0.4993,
      sales: 1600
    },
    {
      name: 'Ukiran Kayu Dayak',
      person: 'Pak Agus',
      type_product: 'Kerajinan',
      lon: 117.1564,
      lat: -0.5027,
      sales: 900
    },
    {
      name: 'Sambal Ikan Asin Mahakam',
      person: 'Ibu Tuti',
      type_product: 'Makanan',
      lon: 117.1326,
      lat: -0.4912,
      sales: 1100
    },
    {
      name: 'Gelang Dayak Kenyah',
      person: 'Pak Eko',
      type_product: 'Aksesoris',
      lon: 117.1448,
      lat: -0.5042,
      sales: 400
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
          center: fromLonLat([117.117, -0.4948]), // Centered on Samarinda
          zoom: 12
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
