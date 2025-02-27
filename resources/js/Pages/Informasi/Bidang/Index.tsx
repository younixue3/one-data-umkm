import Banner from '@/Components/Banner';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

interface Props {
  category: string;
  bidangs: {
    id: number;
    description: string;
    image: string;
    category: string;
  }[];
}

export default function Index({ category, bidangs }: Props) {
  return (
    <GuestLayout>
      <Head title={`Bidang ${category}`} />

      <div className="">
        <Banner />
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="flex justify-between gap-8">
              <div className="max-w-xl">
                <header>
                  <h2 className="text-lg font-medium text-gray-900">
                    Program Kerja {category}
                  </h2>
                  <p className="mt-1 text-sm text-gray-600">
                    Program Kerja Dinas Perindustrian dan Perdagangan bidang{' '}
                    {category}.
                  </p>
                </header>

                <div className="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                  {bidangs.map((item: any) => (
                    <div
                      key={item.id}
                      className="overflow-hidden rounded-lg bg-white shadow"
                    >
                      <div className="p-4">
                        <img
                          src={item.image}
                          alt={item.title}
                          className="w-full rounded-lg shadow-md"
                        />
                        <div className="mt-4 text-center">
                          <h3 className="text-lg font-medium text-gray-900">
                            {item.title}
                          </h3>
                          <p className="mt-2 text-sm text-gray-600">
                            {item.description}
                          </p>
                        </div>
                      </div>
                    </div>
                  ))}
                </div>
              </div>

              <div className="w-64">
                <h2 className="text-lg font-medium text-gray-900 mb-4">
                  BIDANG LAINNYA
                </h2>
                <div className="space-y-4">
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">⚡</span>
                    <a
                      href={route('bidang.index', 'perindustrian')}
                      className="text-gray-700 uppercase hover:text-blue-500"
                    >
                      PERINDUSTRIAN
                    </a>
                  </div>
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">⚡</span>
                    <a
                      href={route('bidang.index', 'perdagangan-dalam-negeri')}
                      className="text-gray-700 uppercase hover:text-blue-500"
                    >
                      PERDAGANGAN DALAM NEGERI
                    </a>
                  </div>
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">⚡</span>
                    <a
                      href={route('bidang.index', 'perdagangan-luar-negeri')}
                      className="text-gray-700 uppercase hover:text-blue-500"
                    >
                      PERDAGANGAN LUAR NEGERI
                    </a>
                  </div>
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">⚡</span>
                    <a
                      href={route('bidang.index', 'koperasi')}
                      className="text-gray-700 uppercase hover:text-blue-500"
                    >
                      KOPERASI
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
