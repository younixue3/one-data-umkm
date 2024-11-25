import Banner from '@/Components/Banner';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function Index() {
  return (
    <GuestLayout>
      <Head title="Dokumen" />

      <div className="">
        <Banner />
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="max-w-xl">
              <header>
                <h2 className="text-lg font-medium text-gray-900">Dokumen</h2>
                <p className="mt-1 text-sm text-gray-600">
                  Dokumen-dokumen terkait Dinas Perindustrian dan Perdagangan.
                </p>
              </header>

              <div className="mt-6 space-y-4">
                <div className="flex items-center justify-between">
                  <div className="flex items-center space-x-3">
                    <div className="text-gray-600">
                      <svg
                        className="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          strokeWidth="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                      </svg>
                    </div>
                    <span className="text-sm">Perpres No 58 Tahun 2020</span>
                  </div>
                  <button className="rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                    Download
                  </button>
                </div>

                <div className="flex items-center justify-between">
                  <div className="flex items-center space-x-3">
                    <div className="text-gray-600">
                      <svg
                        className="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          strokeWidth="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                      </svg>
                    </div>
                    <span className="text-sm">
                      Peraturan Menteri Perdagangan Nomor 7 Tahun 2020 Harga
                      Acuan Pembelian
                    </span>
                  </div>
                  <button className="rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                    Download
                  </button>
                </div>

                <div className="flex items-center justify-between">
                  <div className="flex items-center space-x-3">
                    <div className="text-gray-600">
                      <svg
                        className="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          strokeWidth="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                      </svg>
                    </div>
                    <span className="text-sm">
                      Peraturan Menteri Perdagangan Nomor 24 Tahun 2020
                    </span>
                  </div>
                  <button className="rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                    Download
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
