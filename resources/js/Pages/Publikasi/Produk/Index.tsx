import Banner from '@/Components/Banner';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function Index() {
  return (
    <GuestLayout>
      <Head title="Produk" />

      <div className="">
        <Banner />
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="w-full">
              <header>
                <h2 className="text-lg font-medium text-gray-900">Produk</h2>
                <p className="mt-1 text-sm text-gray-600">
                  Produk-produk dari UMKM binaan Dinas Perindustrian dan
                  Perdagangan.
                </p>
              </header>

              <div className="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div className="overflow-hidden rounded-lg border">
                  <img
                    src="~koperasi/assets/5.webp"
                    alt="Produk 1"
                    className="h-48 w-full object-cover"
                  />
                  <div className="p-4">
                    <h3 className="text-base font-semibold">
                      Produk Khas Nusantara
                    </h3>
                    <p className="mt-1 text-sm text-gray-600">Rp 150.000</p>
                    <button className="mt-3 rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                      Detail
                    </button>
                  </div>
                </div>

                <div className="overflow-hidden rounded-lg border">
                  <img
                    src="~koperasi/assets/6.webp"
                    alt="Produk 2"
                    className="h-48 w-full object-cover"
                  />
                  <div className="p-4">
                    <h3 className="text-base font-semibold">Tas Ulir</h3>
                    <p className="mt-1 text-sm text-gray-600">Rp 200.000</p>
                    <button className="mt-3 rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                      Detail
                    </button>
                  </div>
                </div>

                <div className="overflow-hidden rounded-lg border">
                  <img
                    src="~koperasi/assets/7.webp"
                    alt="Produk 3"
                    className="h-48 w-full object-cover"
                  />
                  <div className="p-4">
                    <h3 className="text-base font-semibold">
                      Batik Motif Khas
                    </h3>
                    <p className="mt-1 text-sm text-gray-600">Rp 350.000</p>
                    <button className="mt-3 rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                      Detail
                    </button>
                  </div>
                </div>
              </div>

              <div className="mt-6 flex justify-center">
                <nav className="flex items-center space-x-2">
                  <button className="rounded border px-3 py-1 text-sm text-blue-600">
                    1
                  </button>
                  <button className="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-100">
                    2
                  </button>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
