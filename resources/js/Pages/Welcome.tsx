import { PageProps } from '@/types';
import { Head } from '@inertiajs/react';
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselPrevious,
  CarouselNext
} from '@/Components/ui/carousel';
import {
  Card,
  CardContent,
  CardFooter,
  CardHeader,
  CardTitle
} from '@/Components/ui/card';
import { Button } from '@/Components/ui/button';
import { Globe2, FileText, Image, Database, Download } from 'lucide-react';
import Guest from '../Layouts/GuestLayout';
import { NewsList } from '@/Components/Pages/News/NewsList';
import { GalleryList } from '@/Components/Pages/Gallery/GalleryList';

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

const testimonialData = [
  {
    id: 1,
    name: 'John Doe',
    image: 'https://loremflickr.com/800/601/person',
    message:
      "The department's services have been instrumental in our business growth. Their support and guidance are invaluable."
  },
  {
    id: 2,
    name: 'Jane Doe',
    image: 'https://loremflickr.com/800/602/person',
    message:
      "I'm impressed by the efficiency and professionalism of the department. They've helped streamline our operations significantly."
  },
  {
    id: 3,
    name: 'John Smith',
    image: 'https://loremflickr.com/800/603/person',
    message:
      "The resources provided by the department have been crucial for our market expansion. We're grateful for their expertise."
  },
  {
    id: 4,
    name: 'Emily Johnson',
    image: 'https://loremflickr.com/800/604/person',
    message:
      "Thanks to the department's initiatives, we've been able to network with other businesses and find new opportunities."
  },
  {
    id: 5,
    name: 'Michael Brown',
    image: 'https://loremflickr.com/800/605/person',
    message:
      "The department's training programs have significantly improved our team's skills. We're now more competitive in the market."
  },
  {
    id: 6,
    name: 'Sarah Davis',
    image: 'https://loremflickr.com/800/606/person',
    message:
      "The support we've received from the department has been outstanding. They truly understand the challenges small businesses face."
  }
];

const carouselData = [
  {
    title: 'Memberdayakan Pertumbuhan Industri',
    description: 'Mendorong inovasi dan pengembangan',
    date: '15-06-2023',
    category: 'Industri',
    image: 'https://loremflickr.com/2000/2000/industry'
  },
  {
    title: 'Memperluas Cakrawala Perdagangan',
    description: 'Membuka peluang pasar baru',
    date: '20-06-2023',
    category: 'Perdagangan',
    image: 'https://loremflickr.com/2000/2000/trade'
  },
  {
    title: 'Praktik Manufaktur Berkelanjutan',
    description: 'Mempromosikan solusi industri ramah lingkungan',
    date: '25-06-2023',
    category: 'Keberlanjutan',
    image: 'https://loremflickr.com/2000/2000/sustainability'
  },
  {
    title: 'Transformasi Digital dalam Perdagangan',
    description: 'Memanfaatkan teknologi untuk pertumbuhan bisnis',
    date: '30-06-2023',
    category: 'Teknologi',
    image: 'https://loremflickr.com/2000/2000/technology'
  },
  {
    title: 'Mendorong Industri Lokal',
    description: 'Mendukung dan mempromosikan produsen dalam negeri',
    date: '05-07-2023',
    category: 'Ekonomi Lokal',
    image: 'https://loremflickr.com/2000/2000/industry,local'
  },
  {
    title: 'Kemitraan Perdagangan Internasional',
    description: 'Memupuk kolaborasi ekonomi global',
    date: '10-07-2023',
    category: 'Hubungan Internasional',
    image: 'https://loremflickr.com/2000/2000/global,trade'
  },
  {
    title: 'Inovasi dalam Manufaktur',
    description: 'Memperkenalkan teknik produksi mutakhir',
    date: '15-07-2023',
    category: 'Inovasi',
    image: 'https://loremflickr.com/2000/2000/manufacturing,innovation'
  },
  {
    title: 'Energi Hijau dalam Industri',
    description: 'Mempromosikan penggunaan energi terbarukan dalam manufaktur',
    date: '20-07-2023',
    category: 'Keberlanjutan',
    image: 'https://loremflickr.com/2000/2000/green,energy,industry'
  }
];

export default function Welcome({
  laravelVersion,
  phpVersion,
  news
}: PageProps<{ laravelVersion: string; phpVersion: string; news: News[] }>) {
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
                    <div className="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center space-y-2 sm:space-y-4 p-4 text-center">
                      <h1 className="text-3xl sm:text-4xl md:text-5xl font-bold text-white">
                        {item.title}
                      </h1>
                      <p className="text-lg sm:text-xl md:text-2xl text-yellow-400">
                        {item.description}
                      </p>
                      <div className="flex flex-wrap justify-center gap-2">
                        <span className="bg-blue-600 text-white text-xs sm:text-sm font-semibold px-2 sm:px-3 py-1 rounded-full">
                          {item.category}
                        </span>
                        <span className="bg-green-600 text-white text-xs sm:text-sm font-semibold px-2 sm:px-3 py-1 rounded-full">
                          {item.date}
                        </span>
                      </div>
                      <Button className="mt-2 sm:mt-4 bg-white text-black hover:bg-gray-200">
                        Read More
                      </Button>
                    </div>
                  </div>
                </CarouselItem>
              ))}
            </CarouselContent>
            <CarouselPrevious className="left-2 sm:left-8" />
            <CarouselNext className="right-2 sm:right-8" />
          </Carousel>
          <div className="px-20">
            <Card className="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 bg-white shadow-lg p-4 sm:p-6 w-full max-w-2xl">
              <div className="text-center mb-4">
                <h3 className="text-lg font-semibold text-gray-800">
                  Temukan Informasi Terkini
                </h3>
                <p className="text-sm text-gray-600">
                  Akses berita dan update terbaru dari departemen kami
                </p>
              </div>
              <Button
                className="w-full flex items-center justify-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white"
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
        <section className="py-12 sm:py-16 px-4 bg-gray-700 text-white">
          <h2 className="text-2xl sm:text-3xl font-bold text-center mt-10 mb-6 sm:mb-8">
            Informasi Bidang
          </h2>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-8">
            {[
              'Perindustrian',
              'Perdagangan Dalam Negeri',
              'Perdagangan Luar Negeri',
              'Koperasi'
            ].map(title => (
              <Card key={title} className="bg-gray-500 border-0 text-white">
                <CardHeader>
                  <Globe2 className="m-auto w-10 h-10 sm:w-12 sm:h-12 mb-3 sm:mb-4 text-yellow-400" />
                  <CardTitle className="text-center text-sm sm:text-base">
                    {title}
                  </CardTitle>
                </CardHeader>
              </Card>
            ))}
          </div>
        </section>

        {/* 3. News Section */}
        <section className="bg-gray-100 py-12 sm:py-16 px-4">
          <h2 className="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8">
            Latest News
          </h2>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            <NewsList data={news} />
          </div>
        </section>

        {/* 4. Publication Section */}
        <section className="py-12 sm:py-16 px-4">
          <h2 className="text-3xl sm:text-5xl font-bold text-center mb-6 sm:mb-8 bg-blue-600 text-white py-3 sm:py-4">
            Publications
          </h2>
          <div className="bg-white border rounded-lg shadow-md p-4 sm:p-6">
            <div className="mb-4">
              <h3 className="text-lg sm:text-xl font-semibold mb-2">
                Publications
              </h3>
              <ul className="space-y-4">
                {[
                  {
                    name: 'Annual Report',
                    icon: FileText,
                    year: '2023',
                    description:
                      'Comprehensive overview of our yearly activities and achievements'
                  },
                  {
                    name: 'Research Paper',
                    icon: FileText,
                    year: '2023',
                    description:
                      'In-depth analysis on industry trends and market insights'
                  },
                  {
                    name: 'Policy Brief',
                    icon: FileText,
                    year: '2023',
                    description:
                      'Summary of key policy recommendations and their potential impacts'
                  }
                ].map((item, index) => (
                  <li
                    key={index}
                    className="flex flex-col sm:flex-row sm:items-center justify-between"
                  >
                    <div className="flex items-start sm:items-center mb-2 sm:mb-0">
                      <item.icon className="w-5 h-5 mr-2 text-yellow-500 flex-shrink-0" />
                      <div>
                        <span className="font-semibold text-sm sm:text-base">
                          {item.name}
                        </span>
                        <p className="text-xs sm:text-sm text-gray-600">
                          {item.description}
                        </p>
                      </div>
                    </div>
                    <div className="flex items-center mt-2 sm:mt-0">
                      <span className="text-xs sm:text-sm text-gray-500 mr-2">
                        {item.year}
                      </span>
                      <Button
                        variant="outline"
                        size="sm"
                        className="text-xs sm:text-sm"
                      >
                        <Download className="w-3 h-3 sm:w-4 sm:h-4 mr-1" />
                        Download
                      </Button>
                    </div>
                  </li>
                ))}
              </ul>
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
        <section className="py-12 sm:py-16 px-4">
          <h2 className="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8">
            News Gallery
          </h2>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <GalleryList data={galleryData} />
          </div>
        </section>

        {/* 7. Testimonials Section */}
        <section className="bg-gray-100 py-12 sm:py-16 px-4 sm:px-8 md:px-20">
          <h2 className="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8">
            Testimonials
          </h2>
          <Carousel>
            <CarouselContent>
              {testimonialData.map(item => (
                <CarouselItem key={item.id}>
                  <Card className="bg-white">
                    <CardContent className="flex flex-col items-center p-4 sm:p-6">
                      <img
                        src={item.image}
                        alt={`Testimonial ${item.name}`}
                        className="w-16 h-16 sm:w-24 sm:h-24 rounded-full mb-3 sm:mb-4 object-cover"
                      />
                      <p className="text-center mb-3 sm:mb-4 text-sm sm:text-base">
                        {item.message}
                      </p>
                      <p className="font-bold text-gray-700 text-sm sm:text-base">
                        {item.name}
                      </p>
                    </CardContent>
                  </Card>
                </CarouselItem>
              ))}
            </CarouselContent>
            <CarouselPrevious className="hidden sm:flex -left-4 sm:-left-10" />
            <CarouselNext className="hidden sm:flex -right-4 sm:-right-10" />
          </Carousel>
          <div className="flex justify-center mt-4 sm:mt-6">
            <Button className="bg-blue-600 hover:bg-blue-700 text-white w-full sm:w-auto">
              View All Testimonials
            </Button>
          </div>
        </section>
      </div>
    </Guest>
  );
}
