import { PageProps } from '@/types';
import { Head } from '@inertiajs/react';
import { Input } from '@/Components/ui/input';
import { Button } from '@/Components/ui/button';
import { useState, useEffect, useRef, useMemo } from 'react';
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
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow
} from '@/Components/ui/table';
import {
  ColumnDef,
  ColumnFiltersState,
  SortingState,
  VisibilityState,
  flexRender,
  getCoreRowModel,
  getFilteredRowModel,
  getPaginationRowModel,
  getSortedRowModel,
  useReactTable,
  getExpandedRowModel
} from '@tanstack/react-table';
import { ChevronDownIcon, ChevronRight } from 'lucide-react';
import {
  DropdownMenu,
  DropdownMenuCheckboxItem,
  DropdownMenuContent,
  DropdownMenuTrigger
} from '@/Components/ui/dropdown-menu';
import SatuDataLayout from '@/Layouts/SatuDataLayout';

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

const columns: ColumnDef<UkmData>[] = [
  {
    accessorFn: (_, index) => index + 1,
    header: 'No'
  },
  {
    accessorKey: 'nama_perusahaan',
    header: 'Nama Perusahaan',
    cell: ({ row }) => {
      return (
        <div className="flex items-center">
          <Button
            variant="ghost"
            size="sm"
            onClick={() => row.toggleExpanded()}
            className="mr-2"
          >
            {row.getIsExpanded() ? (
              <ChevronDownIcon className="h-4 w-4" />
            ) : (
              <ChevronRight className="h-4 w-4" />
            )}
          </Button>
          {row.original.nama_perusahaan}
        </div>
      );
    }
  },
  {
    id: 'typeproducts',
    header: 'Jenis Produk',
    cell: ({ row }) => (
      <div>
        {row.original.typeproducts?.map((product: any) => (
          <div key={product.id}>{product.name}</div>
        ))}
      </div>
    )
  },
  {
    id: 'typeindustries',
    header: 'Jenis Industri',
    cell: ({ row }) => (
      <div>
        {row.original.typeindustries?.map((industry: any) => (
          <div key={industry.id}>{industry.name}</div>
        ))}
      </div>
    )
  },
  {
    id: 'location',
    header: 'Lokasi',
    cell: ({ row }) => (
      <div>
        <div>Provinsi: {row.original.provinsi?.name}</div>
        <div>Kabupaten: {row.original.kabupaten?.name}</div>
        <div>Kecamatan: {row.original.kecamatan?.name}</div>
        <div>Kelurahan: {row.original.kelurahan?.name}</div>
      </div>
    )
  },
  {
    accessorKey: 'status_aktif',
    header: 'Status',
    cell: ({ row }) => (
      <span
        className={`px-2 py-1 rounded-full text-xs bg-green-100 text-green-800`}
      >
        {row.original.status_aktif}
      </span>
    )
  }
];

interface IkmTableProps {
  data: UkmData[];
}

const IkmTable = ({ data }: IkmTableProps) => {
  const [sorting, setSorting] = useState<SortingState>([]);
  const [columnFilters, setColumnFilters] = useState<ColumnFiltersState>([]);
  const [columnVisibility, setColumnVisibility] = useState<VisibilityState>({});
  const [rowSelection, setRowSelection] = useState({});
  const [expanded, setExpanded] = useState({});

  const table = useReactTable({
    data,
    columns,
    onSortingChange: setSorting,
    onColumnFiltersChange: setColumnFilters,
    getCoreRowModel: getCoreRowModel(),
    getPaginationRowModel: getPaginationRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    onColumnVisibilityChange: setColumnVisibility,
    onRowSelectionChange: setRowSelection,
    onExpandedChange: setExpanded,
    getExpandedRowModel: getExpandedRowModel(),
    state: {
      sorting,
      columnFilters,
      columnVisibility,
      rowSelection,
      expanded
    },
    initialState: { pagination: { pageSize: 20 } }
  });

  const { pageIndex } = table.getState().pagination;
  const pageCount = table.getPageCount();
  const pageRange = 2;

  const paginationRange = useMemo(() => {
    const startPage = Math.max(0, pageIndex - pageRange);
    const endPage = Math.min(pageCount - 1, pageIndex + pageRange);
    return Array.from(
      { length: endPage - startPage + 1 },
      (_, i) => startPage + i
    );
  }, [pageIndex, pageCount, pageRange]);

  return (
    <div>
      <div className="flex items-center py-4">
        <Input
          placeholder="Filter nama perusahaan..."
          value={
            (table.getColumn('nama_perusahaan')?.getFilterValue() as string) ??
            ''
          }
          onChange={event =>
            table
              .getColumn('nama_perusahaan')
              ?.setFilterValue(event.target.value)
          }
          className="max-w-sm"
        />
        <DropdownMenu>
          <DropdownMenuTrigger asChild>
            <Button variant="outline" className="ml-auto">
              Columns <ChevronDownIcon className="ml-2 h-4 w-4" />
            </Button>
          </DropdownMenuTrigger>
          <DropdownMenuContent align="end">
            {table
              .getAllColumns()
              .filter(column => column.getCanHide())
              .map(column => {
                return (
                  <DropdownMenuCheckboxItem
                    key={column.id}
                    className="capitalize"
                    checked={column.getIsVisible()}
                    onCheckedChange={value => column.toggleVisibility(value)}
                  >
                    {column.id}
                  </DropdownMenuCheckboxItem>
                );
              })}
          </DropdownMenuContent>
        </DropdownMenu>
      </div>

      <div className="rounded-md border">
        <Table>
          <TableHeader>
            {table.getHeaderGroups().map(headerGroup => (
              <TableRow key={headerGroup.id}>
                {headerGroup.headers.map(header => (
                  <TableHead key={header.id}>
                    {header.isPlaceholder
                      ? null
                      : flexRender(
                          header.column.columnDef.header,
                          header.getContext()
                        )}
                  </TableHead>
                ))}
              </TableRow>
            ))}
          </TableHeader>
          <TableBody>
            {table.getRowModel().rows?.length ? (
              table.getRowModel().rows.map(row => (
                <>
                  <TableRow
                    key={row.id}
                    data-state={row.getIsSelected() && 'selected'}
                  >
                    {row.getVisibleCells().map(cell => (
                      <TableCell key={cell.id}>
                        {flexRender(
                          cell.column.columnDef.cell,
                          cell.getContext()
                        )}
                      </TableCell>
                    ))}
                  </TableRow>
                  {row.getIsExpanded() && (
                    <TableRow>
                      <TableCell colSpan={columns.length}>
                        <div className="p-4 bg-gray-50">
                          <div className="grid grid-cols-3 gap-4">
                            <div>
                              <h4 className="font-medium mb-2">Nama Pemilik</h4>
                              <p>{row.original.nama_pemilik}</p>
                            </div>
                            <div>
                              <h4 className="font-medium mb-2">Kontak</h4>
                              <p>No HP: {row.original.no_hp}</p>
                              <p>Email: {row.original.email}</p>
                            </div>
                            <div>
                              <h4 className="font-medium mb-2">Alamat</h4>
                              <p>{row.original.alamat}</p>
                            </div>
                          </div>
                        </div>
                      </TableCell>
                    </TableRow>
                  )}
                </>
              ))
            ) : (
              <TableRow>
                <TableCell
                  colSpan={columns.length}
                  className="h-24 text-center"
                >
                  No results.
                </TableCell>
              </TableRow>
            )}
          </TableBody>
        </Table>
      </div>

      <div className="flex items-center justify-end space-x-2 py-4">
        <div className="flex-1 text-sm text-muted-foreground">
          {table.getFilteredSelectedRowModel().rows.length} of{' '}
          {table.getFilteredRowModel().rows.length} row(s) selected.
        </div>
        <div className="space-x-2">
          <Button
            variant="outline"
            onClick={() => table.previousPage()}
            disabled={!table.getCanPreviousPage()}
          >
            Previous
          </Button>
          {paginationRange.map((pageNum: number) => (
            <Button
              key={pageNum}
              onClick={() => table.setPageIndex(pageNum)}
              size="sm"
              variant={pageNum === pageIndex ? 'default' : 'outline'}
            >
              {pageNum + 1}
            </Button>
          ))}
          <Button
            variant="outline"
            onClick={() => table.nextPage()}
            disabled={!table.getCanNextPage()}
          >
            Next
          </Button>
        </div>
      </div>
    </div>
  );
};

export default function Industri({
  laravelVersion,
  phpVersion,
  dataUkm,
  dataBigIndustries,
  ukmByKabupatenYear,
  bigIndustriesByKabupatenYear,
  kabupatenList,
  productTypes,
  industryTypes
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
  const [selectedKabupaten, setSelectedKabupaten] = useState('all');
  const mapRef = useRef<HTMLDivElement>(null);
  const mapInstance = useRef<Map | null>(null);
  const vectorSources = useRef<{ [key: string]: VectorSource }>({});
  const vectorLayers = useRef<{ [key: string]: VectorLayer<VectorSource> }>({});
  const popupRef = useRef<HTMLDivElement>(null);
  const overlayRef = useRef<Overlay | null>(null);
  const [activeIndex, setActiveIndex] = useState(0);
  const [selectedType, setSelectedType] = useState('all');
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

  // Transform kabupaten data for charts
  const transformKabupatenData = (data: KabupatenData) => {
    let filteredData = data;

    // Filter by kabupaten if selected
    if (selectedKabupaten !== 'all') {
      const kabupaten = kabupatenList.find(k => k.id === selectedKabupaten);
      if (!kabupaten || !data[kabupaten.name]) {
        return [];
      }
      filteredData = {
        [kabupaten.name]: data[kabupaten.name]
      };
    }

    return Object.entries(filteredData).map(([kabupaten, yearData]) => ({
      name: kabupaten,
      ...yearData
    }));
  };

  const verticalBarData = transformKabupatenData(bigIndustriesByKabupatenYear);
  const horizontalBarData = transformKabupatenData(ukmByKabupatenYear);

  useEffect(() => {
    if (mapRef.current && !mapInstance.current) {
      mapInstance.current = new Map({
        target: mapRef.current,
        layers: [
          new TileLayer({
            source: new OSM()
          })
        ],
        view: new View({
          center: fromLonLat([116.5, 2.5]), // Center on North Kalimantan
          zoom: 8
        })
      });

      // Add initial features
      addFeatures(dataUkm);

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
          <p><strong>Person:</strong> ${properties.kontak_person}</p>
          <p><strong>Type:</strong> ${properties.typeproducts[0]?.name}</p>
          <p><strong>Production Value:</strong> ${properties.nilai_produksi}</p>
          <p><strong>Kabupaten:</strong> ${properties.kabupaten}</p>
        </div>
      `;
      popupRef.current!.style.display = 'block';
    } else {
      overlayRef.current!.setPosition(undefined);
      popupRef.current!.style.display = 'none';
    }
  };

  const addFeatures = (data: UkmData[]) => {
    // Clear all sources first
    Object.values(vectorSources.current).forEach(source => source.clear());

    // Add features to their respective kabupaten layers
    data.forEach(item => {
      const feature = new Feature({
        geometry: new Point(fromLonLat([item.longitude, item.latitude])),
        name: item.nama_perusahaan,
        kontak_person: item.kontak_person,
        typeproducts: item.typeproducts,
        nilai_produksi: item.nilai_produksi,
        kabupaten: item.kabupaten.name
      });

      const kabupatenSource = vectorSources.current[item.kabupaten.name];
      if (kabupatenSource) {
        kabupatenSource.addFeature(feature);
      }
    });
  };

  const handleSearch = () => {
    const filteredData = dataUkm.filter(item => {
      return (
        (nameUkm === '' ||
          item.nama_perusahaan.toLowerCase().includes(nameUkm.toLowerCase())) &&
        (namePerson === '' ||
          item.kontak_person
            .toLowerCase()
            .includes(namePerson.toLowerCase())) &&
        (typeProducts.length === 0 ||
          typeProducts.includes(item.typeproducts[0]?.name)) &&
        (selectedKabupaten === '' || item.kabupaten.name === selectedKabupaten)
      );
    });

    addFeatures(filteredData);
  };

  const handlePieClick = (data: any, index: number) => {
    setActiveIndex(index);
    setSelectedType(data.name);
  };

  const filteredUkmData = selectedType
    ? dataUkm.filter(item => item.typeproducts[0]?.name === selectedType)
    : dataUkm;

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
                  <Select onValueChange={value => setSelectedKabupaten(value)}>
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
                  <Button
                    onClick={handleSearch}
                    className="w-full bg-blue-600 hover:bg-blue-700 text-white"
                  >
                    Search
                  </Button>
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
                    data={horizontalBarData}
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
                    data={verticalBarData}
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
