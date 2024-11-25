import Banner from '@/Components/Banner';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function Index() {
  return (
    <GuestLayout>
      <Head title="Bidang" />

      <div className="">
        <Banner />
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="flex justify-between gap-8">
              <div className="max-w-xl">
                <header>
                  <h2 className="text-lg font-medium text-gray-900">
                    Program Kerja
                  </h2>
                  <p className="mt-1 text-sm text-gray-600">
                    Program Kerja Dinas Perindustrian dan Perdagangan.
                  </p>
                </header>

                <div className="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                  <div className="overflow-hidden rounded-lg bg-white shadow">
                    <div className="p-4">
                      <img
                        src={'/assets/logo.png'}
                        alt="Program Kerja 2021"
                        className="w-full rounded-lg shadow-md"
                      />
                      <div className="mt-4 text-center">
                        <h3 className="text-lg font-medium text-gray-900">
                          Program Kerja TH. 2021
                        </h3>
                      </div>
                    </div>
                  </div>

                  <div className="overflow-hidden rounded-lg bg-white shadow">
                    <div className="p-4">
                      <img
                        src={'/assets/logo.png'}
                        alt="Program Kerja 2022"
                        className="w-full rounded-lg shadow-md"
                      />
                      <div className="mt-4 text-center">
                        <h3 className="text-lg font-medium text-gray-900">
                          Program Kerja TH. 2022
                        </h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div className="w-64">
                <h2 className="text-lg font-medium text-gray-900 mb-4">
                  BIDANG LAINNYA
                </h2>
                <div className="space-y-4">
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">⚡</span>
                    <span className="text-gray-700 uppercase">
                      PERINDUSTRIAN
                    </span>
                  </div>
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">⚡</span>
                    <span className="text-gray-700 uppercase">
                      PERDAGANGAN DALAM NEGERI
                    </span>
                  </div>
                  <div className="flex items-center gap-2">
                    <span className="text-gray-500">⚡</span>
                    <span className="text-gray-700 uppercase">
                      PERDAGANGAN LUAR NEGERI
                    </span>
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
