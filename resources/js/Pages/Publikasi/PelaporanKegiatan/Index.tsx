import Banner from '@/Components/Banner';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function Index() {
  return (
    <GuestLayout>
      <Head title="Pelaporan Kegiatan" />

      <div className="">
        <Banner />
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="max-w-xl">
              <header>
                <h2 className="text-lg font-medium text-gray-900">
                  Pelaporan Kegiatan
                </h2>
                <p className="mt-1 text-sm text-gray-600">
                  Laporan kegiatan-kegiatan yang telah dilaksanakan oleh Dinas
                  Perindustrian dan Perdagangan.
                </p>
              </header>

              <div className="mt-6 space-y-6">
                <div className="overflow-hidden rounded-lg border">
                  <div className="p-4">
                    <div className="flex items-center justify-between">
                      <h3 className="text-base font-semibold">
                        Rapat Kerja Teknis Dinas Perindustrian dan Perdagangan
                      </h3>
                      <span className="text-sm text-gray-500">08 Aug 2018</span>
                    </div>
                    <p className="mt-2 text-sm text-gray-600">
                      Rapat koordinasi terkait pengembangan industri dan
                      perdagangan daerah.
                    </p>
                    <div className="mt-4">
                      <button className="text-sm text-blue-600 hover:text-blue-800">
                        Baca selengkapnya →
                      </button>
                    </div>
                  </div>
                </div>

                <div className="overflow-hidden rounded-lg border">
                  <div className="p-4">
                    <div className="flex items-center justify-between">
                      <h3 className="text-base font-semibold">
                        Kunjungan Kerja ke Thailand
                      </h3>
                      <span className="text-sm text-gray-500">07 Aug 2018</span>
                    </div>
                    <p className="mt-2 text-sm text-gray-600">
                      Studi banding dan pertukaran pengalaman terkait
                      pengembangan UMKM.
                    </p>
                    <div className="mt-4">
                      <button className="text-sm text-blue-600 hover:text-blue-800">
                        Baca selengkapnya →
                      </button>
                    </div>
                  </div>
                </div>

                <div className="overflow-hidden rounded-lg border">
                  <div className="p-4">
                    <div className="flex items-center justify-between">
                      <h3 className="text-base font-semibold">
                        Pelatihan UMKM Digital
                      </h3>
                      <span className="text-sm text-gray-500">06 Aug 2018</span>
                    </div>
                    <p className="mt-2 text-sm text-gray-600">
                      Program pelatihan digitalisasi untuk pelaku UMKM di
                      wilayah kota.
                    </p>
                    <div className="mt-4">
                      <button className="text-sm text-blue-600 hover:text-blue-800">
                        Baca selengkapnya →
                      </button>
                    </div>
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
