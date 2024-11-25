import Banner from '@/Components/Banner';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function Index() {
  return (
    <GuestLayout>
      <Head title="Visi Misi" />

      <div className="">
        <Banner />
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="max-w-xl">
              <header>
                <h2 className="text-lg font-medium text-gray-900">Visi Misi</h2>
                <p className="mt-1 text-sm text-gray-600">
                  Visi dan Misi Dinas Perindustrian dan Perdagangan.
                </p>
              </header>

              <div className="mt-6 space-y-6">
                <div>
                  <h3 className="text-base font-semibold">Visi</h3>
                  <p className="mt-2 text-sm text-gray-600">
                    Terwujudnya Sektor Industri dan Perdagangan yang Berdaya
                    Saing, Mandiri dan Berkelanjutan
                  </p>
                </div>

                <div>
                  <h3 className="text-base font-semibold">Misi</h3>
                  <ul className="mt-2 list-inside list-disc space-y-2 text-sm text-gray-600">
                    <li>
                      Meningkatkan daya saing industri melalui pengembangan
                      industri yang efisien dan produktif
                    </li>
                    <li>
                      Memperkuat struktur industri dengan meningkatkan peran
                      industri kecil dan menengah
                    </li>
                    <li>
                      Menciptakan iklim usaha yang kondusif untuk perkembangan
                      industri dan perdagangan
                    </li>
                    <li>
                      Meningkatkan perlindungan konsumen dan pengawasan barang
                      beredar
                    </li>
                    <li>
                      Mengembangkan perdagangan dalam dan luar negeri yang
                      berkelanjutan
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
