import Banner from '@/Components/Banner';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function Index({
  kategori,
  news
}: {
  kategori: string;
  news: any;
}) {
  return (
    <GuestLayout>
      <Head title={kategori.toUpperCase()} />

      <div className="">
        <Banner />
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="flex justify-between gap-10">
              <div className="w-full">
                <header>
                  <h2 className="text-lg uppercase font-medium text-gray-900">
                    {kategori.toUpperCase()} Terkini
                  </h2>
                  <p className="mt-1 text-sm uppercase text-gray-600">
                    {kategori.toUpperCase()} terbaru dari Dinas Perindustrian
                    dan Perdagangan.
                  </p>
                </header>

                <div className="mt-6 grid grid-cols-3 gap-6">
                  {news.map((item: any) => (
                    <div className="overflow-hidden rounded-lg bg-white shadow">
                      <div className="p-4">
                        <img
                          src={item.image}
                          alt="Berita 1"
                          className="w-full rounded-lg h-52 object-cover shadow-md"
                        />
                        <div className="mt-4">
                          <h3 className="text-lg font-medium text-gray-900">
                            {item.title}
                          </h3>
                          <p
                            className="mt-2 text-sm text-gray-600"
                            dangerouslySetInnerHTML={{
                              __html: item.content
                            }}
                          ></p>
                          <div className="mt-4 flex items-center justify-between">
                            <span className="text-sm text-gray-500">
                              12 Jan 2024
                            </span>
                            <a
                              href="#"
                              className="text-sm text-blue-600 hover:text-blue-800"
                            >
                              Baca selengkapnya
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  ))}

                  {/* <div className="overflow-hidden rounded-lg bg-white shadow">
                    <div className="p-4">
                      <img
                        src="/assets/1.webp"
                        alt="Berita 2"
                        className="w-full rounded-lg h-52 object-cover shadow-md"
                      />
                      <div className="mt-4">
                        <h3 className="text-lg font-medium text-gray-900">
                          Judul Berita 2
                        </h3>
                        <p className="mt-2 text-sm text-gray-600">
                          Ut enim ad minim veniam, quis nostrud exercitation
                          ullamco laboris nisi ut aliquip ex ea commodo
                          consequat.
                        </p>
                        <div className="mt-4 flex items-center justify-between">
                          <span className="text-sm text-gray-500">
                            10 Jan 2024
                          </span>
                          <a
                            href="#"
                            className="text-sm text-blue-600 hover:text-blue-800"
                          >
                            Baca selengkapnya
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div className="overflow-hidden rounded-lg bg-white shadow">
                    <div className="p-4">
                      <img
                        src="/assets/3.webp"
                        alt="Berita 1"
                        className="w-full rounded-lg h-52 object-cover shadow-md"
                      />
                      <div className="mt-4">
                        <h3 className="text-lg font-medium text-gray-900">
                          Judul Berita 1
                        </h3>
                        <p className="mt-2 text-sm text-gray-600">
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit. Sed do eiusmod tempor incididunt ut labore et
                          dolore magna aliqua.
                        </p>
                        <div className="mt-4 flex items-center justify-between">
                          <span className="text-sm text-gray-500">
                            12 Jan 2024
                          </span>
                          <a
                            href="#"
                            className="text-sm text-blue-600 hover:text-blue-800"
                          >
                            Baca selengkapnya
                          </a>
                        </div>
                      </div>
                    </div>
                  </div> */}
                </div>
              </div>

              <div className="w-64">
                <h2 className="text-lg font-medium text-gray-900 mb-4">
                  KATEGORI BERITA
                </h2>
                <div className="space-y-4">
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">📰</span>
                    <span className="text-gray-700">Umum</span>
                  </div>
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">📢</span>
                    <span className="text-gray-700">Pemberitahuan</span>
                  </div>
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">👥</span>
                    <span className="text-gray-700">Pelayanan Publik</span>
                  </div>
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">🏪</span>
                    <span className="text-gray-700">Pojok UMKM</span>
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
