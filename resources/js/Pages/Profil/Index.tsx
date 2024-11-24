import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function Index() {
  return (
    <GuestLayout>
      <Head title="Profil" />

      <div className="">
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="max-w-full">
              <img
                src="/assets/banner2.png"
                alt="Banner"
                className="w-full rounded-lg shadow-md"
              />
            </div>
          </div>
        </div>
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="max-w-xl">
              <header>
                <h2 className="text-lg font-medium text-gray-900">
                  Struktur Organisasi
                </h2>
                <p className="mt-1 text-sm text-gray-600">
                  Struktur organisasi Dinas Perindustrian dan Perdagangan.
                </p>
              </header>

              <div className="mt-6">
                <img
                  src="/assets/1723606355.jpg"
                  alt="Struktur Organisasi"
                  className="w-full rounded-lg shadow-md"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
