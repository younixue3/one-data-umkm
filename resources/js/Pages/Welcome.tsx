import { PageProps } from '@/types';
import { Head } from '@inertiajs/react';
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselPrevious,
  CarouselNext
} from '@/Components/ui/carousel';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import { Button } from '@/Components/ui/button';
import {
  Globe2,
  FileText,
  Image,
  Database,
  Download,
  DotIcon,
  PinIcon,
  Calendar,
  MapPin
} from 'lucide-react';
import Guest from '../Layouts/GuestLayout';
import { NewsList } from '@/Components/Pages/News/NewsList';
import { GalleryList } from '@/Components/Pages/Gallery/GalleryList';
import { NewsPagination } from '@/Components/Pages/News/NewsPagination';

interface News {
  id: string;
  title: string;
  content: string;
}

const galleryData = [
  {
    id: 1,
    title: 'UMKM Success Story',
    date: '2023-06-15',
    image: 'https://loremflickr.com/800/600/small+business'
  },
  {
    id: 2,
    title: 'Tech Innovation for UMKM',
    date: '2023-06-14',
    image: 'https://loremflickr.com/800/600/technology+business'
  },
  {
    id: 3,
    title: 'UMKM Global Summit',
    date: '2023-06-13',
    image: 'https://loremflickr.com/800/600/business+conference'
  },
  {
    id: 4,
    title: 'Economic Update for UMKM',
    date: '2023-06-12',
    image: 'https://loremflickr.com/800/600/business'
  },
  {
    id: 5,
    title: 'Sustainable UMKM Initiative',
    date: '2023-06-11',
    image: 'https://loremflickr.com/800/600/sustainable+business'
  },
  {
    id: 6,
    title: 'UMKM Product Showcase',
    date: '2023-06-10',
    image: 'https://loremflickr.com/800/600/handmade+products'
  }
];

const carouselData = [
  {
    title: 'Memberdayakan Pertumbuhan Industri',
    description: 'Mendorong inovasi dan pengembangan',
    date: '15-06-2023',
    category: 'Industri',
    image: '/assets/1.webp'
  },
  {
    title: 'Memperluas Cakrawala Perdagangan',
    description: 'Membuka peluang pasar baru',
    date: '20-06-2023',
    category: 'Perdagangan',
    image: '/assets/2.webp'
  },
  {
    title: 'Praktik Manufaktur Berkelanjutan',
    description: 'Mempromosikan solusi industri ramah lingkungan',
    date: '25-06-2023',
    category: 'Keberlanjutan',
    image: '/assets/3.webp'
  },
  {
    title: 'Transformasi Digital dalam Perdagangan',
    description: 'Memanfaatkan teknologi untuk pertumbuhan bisnis',
    date: '30-06-2023',
    category: 'Teknologi',
    image: '/assets/4.webp'
  },
  {
    title: 'Mendorong Industri Lokal',
    description: 'Mendukung dan mempromosikan produsen dalam negeri',
    date: '05-07-2023',
    category: 'Ekonomi Lokal',
    image: '/assets/5.webp'
  },
  {
    title: 'Kemitraan Perdagangan Internasional',
    description: 'Memupuk kolaborasi ekonomi global',
    date: '10-07-2023',
    category: 'Hubungan Internasional',
    image: '/assets/6.webp'
  },
  {
    title: 'Inovasi dalam Manufaktur',
    description: 'Memperkenalkan teknik produksi mutakhir',
    date: '15-07-2023',
    category: 'Inovasi',
    image: '/assets/7.webp'
  },
  {
    title: 'Energi Hijau dalam Industri',
    description: 'Mempromosikan penggunaan energi terbarukan dalam manufaktur',
    date: '20-07-2023',
    category: 'Keberlanjutan',
    image: '/assets/8.webp'
  }
];

const publicationFiles = [
  {
    title: 'Permendag Nomor 19 Tahun 2021',
    category: 'Peraturan',
    fileUrl: '/files/peraturan1.pdf'
  },
  {
    title: 'Permendag Nomor 18 Tahun 2021',
    category: 'Peraturan',
    fileUrl: '/files/peraturan2.pdf'
  },
  {
    title: 'SOP Penerbitan Surat Rekomendasi Izin Usaha',
    category: 'Peraturan',
    fileUrl: '/files/sop.pdf'
  }
];

const eventsData = [
  {
    title:
      'Pelatihan Kewirausahaan, Keamanan Pangan dan Manajemen Usaha Bagi UMKM',
    category: 'Bidang Koperasi',
    date: '23 Sep 2021',
    imageUrl: '/assets/event1.jpg'
  },
  {
    title:
      'Pelatihan Pengembangan dan Pemasaran Produk Home Decor dan Handicraft untuk Ekspor',
    category: 'Bidang Perdagangan Luar Negeri',
    date: '21 Mar 2020',
    imageUrl: '/assets/event2.jpg'
  },
  {
    title: 'Pengawasan Koperasi Kabupaten Bulungan',
    category: 'Bidang Koperasi',
    date: '10 Jul 2020',
    imageUrl: '/assets/event3.jpg'
  }
];

export default function Welcome({ news }: PageProps<{ news: News[] }>) {
  return (
    <Guest>
      <Head title="Welcome" />
      <div className="bg-white text-black">
        {/* 1. Hero Section with Carousel */}
        <section className="relative h-[400px] sm:h-[500px] md:h-[600px]">
          <Carousel className="h-full">
            <CarouselContent className="h-full">
              {carouselData.map(item => (
                <CarouselItem key={item.title}>
                  <div className="relative h-full">
                    <img
                      src={item.image}
                      alt={item.title}
                      className="w-full h-full object-cover"
                    />
                    <div className="absolute flex inset-0">
                      <div className="m-auto ml-20 w-[40rem] bg-black bg-opacity-70 flex flex-col items-start space-y-2 sm:space-y-4 p-4">
                        <div className="flex gap-2">
                          <span className="text-white text-xs sm:text-lg font-extralight uppercase">
                            {item.category}
                          </span>
                          <span className="text-amber-400 flex text-xs sm:text-lg font-extralight uppercase">
                            <div className="my-auto w-4 h-4 bg-amber-400 rounded-full mr-1"></div>
                            {item.date}
                          </span>
                        </div>
                        <h1 className="text-3xl sm:text-4xl md:text-5xl font-bold text-white uppercase">
                          {item.title}
                        </h1>
                        <Button className="mt-2 sm:mt-4 bg-blue-500 hover:bg-blue-600 text-white">
                          Selengkapnya
                        </Button>
                      </div>
                    </div>
                  </div>
                </CarouselItem>
              ))}
            </CarouselContent>
            <CarouselPrevious className="left-2 sm:left-8" />
            <CarouselNext className="right-2 sm:right-8" />
          </Carousel>
          <div className="px-20">
            <Card className="absolute flex gap-1 bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 bg-blue-500 border-none shadow-lg p-4 sm:p-6 w-full max-w-6xl">
              <div className="text-center m-auto w-5/6">
                <h3 className="text-xl font-semibold uppercase text-white">
                  Dinas Perindustrian, Perdagangan, Koperasi dan UKM PROVINSI
                  KALIMANTAN UTARA
                </h3>
              </div>
              <Button
                className="w-1/6 text-lg flex items-center justify-center space-x-2 bg-gray-800 hover:bg-gray-900 text-white"
                onClick={() =>
                  document
                    .querySelector('#news-section')
                    ?.scrollIntoView({ behavior: 'smooth' })
                }
              >
                <FileText size={20} />
                <span>Cari Informasi</span>
              </Button>
            </Card>
          </div>
        </section>

        {/* 2. Informasi Bidang Section */}
        <section className="py-12 sm:py-16 px-4 bg-gray-800 text-white">
          <h2 className="text-2xl sm:text-3xl font-bold text-center mt-10 mb-6 sm:mb-8">
            Informasi Bidang
          </h2>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 px-24">
            {[
              'Perindustrian',
              'Perdagangan Dalam Negeri',
              'Perdagangan Luar Negeri',
              'Koperasi'
            ].map(title => (
              <Card key={title} className="bg-transparent border-0 text-white">
                <CardHeader>
                  <Globe2 className="m-auto w-10 h-10 sm:w-20 sm:h-20 mb-3 sm:mb-4 text-yellow-400" />
                  <CardTitle className="text-center text-lg sm:text-base uppercase">
                    {title}
                  </CardTitle>
                </CardHeader>
              </Card>
            ))}
          </div>
        </section>

        {/* 3. News Section */}
        <section className="bg-gray-100 py-12 sm:py-16 px-4">
          <h5 className="uppercase text-center">Informasi</h5>
          <h2 className="text-2xl sm:text-4xl uppercase font-extrabold text-center mb-6 sm:mb-8">
            Berita Terkini
          </h2>
          <div className="px-32">
            <NewsPagination data={news} itemsPerPage={3} />
          </div>
        </section>

        <section className="bg-sky-600 flex">
          <div className="w-2/5 pl-20 my-auto uppercase">
            <h4 className="text-2xl font-extrabold text-amber-400">
              Update Harga
            </h4>
            <h3 className="text-3xl text-white font-extrabold flex">
              Bahan Pokok{' '}
              <span className="text-amber-400 ml-2 text-sm font-light flex mt-auto">
                <MapPin className="mr-1" size={20} /> Pasar Induk
              </span>
            </h3>
            <h5 className="text-amber-400">Bulungan</h5>
            <Button className="text-xl font-bold px-0" variant={'link'}>
              Lihat Detail Update
            </Button>
          </div>
          <div className="bg-gray-200 w-3/5 h-32 mb-10"></div>
        </section>
        {/* 4. Publication Section */}
        <section className="py-12 sm:py-16 px-4 bg-gray-100 relative">
          <h2 className="text-4xl font-bold text-center mb-8">
            Publikasi Pengumuman & Kegiatan
          </h2>

          <div className="container mx-auto flex flex-col lg:flex-row gap-8">
            {/* Daftar File Publikasi */}
            <div className="lg:w-1/2 bg-white p-6 shadow rounded-lg">
              {publicationFiles.map((file, index) => (
                <Card
                  key={index}
                  className="flex items-center mb-6 bg-transparent border-0"
                >
                  <FileText className="w-12 h-12 text-gray-500 mr-4" />
                  <div>
                    <CardTitle className="text-lg font-semibold uppercase">
                      {file.category}
                    </CardTitle>
                    <p>{file.title}</p>
                    <Button
                      // href={file.fileUrl}
                      className="mt-2 bg-blue-600 hover:bg-blue-700 text-white"
                      // target="_blank"
                    >
                      <Download className="mr-2 w-4 h-4" /> Download
                    </Button>
                  </div>
                </Card>
              ))}
            </div>
            {/* Add animation in the center */}
            <div className="inset-0 flex justify-center items-center z-10">
              <img
                src="~koperasi/assets/people.png"
                alt="Animated graphic"
                className="w-96"
              />
            </div>

            {/* Daftar Kegiatan */}
            <div className="lg:w-1/2">
              {eventsData.map((event, index) => (
                <Card
                  key={index}
                  className="flex items-center p-4 mb-6 bg-white shadow rounded-lg"
                >
                  <img
                    src={event.imageUrl}
                    alt={event.title}
                    className="w-24 h-24 object-cover rounded-lg mr-4"
                  />
                  <div>
                    <CardTitle className="text-lg font-semibold uppercase">
                      {event.title}
                    </CardTitle>
                    <p className="text-sm text-gray-500">{event.category}</p>
                    <div className="flex items-center text-gray-500 mt-2">
                      <Calendar className="w-4 h-4 mr-2" /> {event.date}
                    </div>
                  </div>
                </Card>
              ))}
            </div>
          </div>
        </section>

        {/* 5. Gallery and Satu Data Section */}
        <section className="bg-gray-100 py-12 sm:py-16">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-0 px-4 sm:px-0">
            <div className="bg-gray-700 p-4 sm:p-6 relative overflow-hidden h-64 sm:h-72">
              <div className="absolute bottom-0 left-0 opacity-10 w-32 h-32 sm:w-64 sm:h-64">
                <Image className="w-full h-full" />
              </div>
              <div className="relative h-full z-10 flex flex-col justify-between">
                <h3 className="text-lg sm:text-xl font-semibold text-white mb-2 sm:mb-4">
                  Gallery
                </h3>
                <p className="text-gray-300 mb-4 text-sm sm:text-base">
                  Explore our photo gallery showcasing our department's
                  activities and achievements.
                </p>
                <Button className="bg-blue-600 hover:bg-blue-700 w-full sm:w-auto">
                  <Image className="mr-2 w-4 h-4" /> View Gallery
                </Button>
              </div>
            </div>
            <div className="bg-yellow-400 p-4 sm:p-6 relative overflow-hidden h-64 sm:h-72">
              <div className="absolute bottom-0 left-0 opacity-10 w-32 h-32 sm:w-64 sm:h-64">
                <Database className="w-full h-full" />
              </div>
              <div className="relative h-full z-10 flex flex-col justify-between">
                <h3 className="text-lg sm:text-xl font-semibold text-gray-800 mb-2 sm:mb-4">
                  Satu Data
                </h3>
                <p className="text-gray-700 mb-4 text-sm sm:text-base">
                  Access our integrated data platform for comprehensive insights
                  and analysis.
                </p>
                <Button className="bg-blue-600 hover:bg-blue-700 w-full sm:w-auto">
                  <Database className="mr-2 w-4 h-4" /> Go to Satu Data
                </Button>
              </div>
            </div>
          </div>
        </section>

        {/* 6. Gallery Images Section */}
        {/* <section className="py-12 sm:py-16 px-4">
          <h2 className="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8">
            News Gallery
          </h2>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <GalleryList data={galleryData} />
          </div>
        </section> */}
      </div>
    </Guest>
  );
}
