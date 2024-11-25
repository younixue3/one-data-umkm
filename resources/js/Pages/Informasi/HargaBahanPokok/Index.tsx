import Banner from '@/Components/Banner';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function Index() {
  return (
    <GuestLayout>
      <Head title="Harga Bahan Pokok" />

      <div className="">
        <Banner />
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="flex flex-col gap-4">
              <select className="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Pasar Agropolitan Tanjung Palas</option>
                <option value="bulungan">Bulungan</option>
                <option value="pasar-induk">Pasar Induk</option>
                <option value="pasar-sore">Pasar Sore</option>
                <option value="malinau">Malinau</option>
                <option value="nunukan">Nunukan</option>
                <option value="tana-tidung">Tana Tidung</option>
                <option value="tarakan">Tarakan</option>
              </select>

              <button
                type="submit"
                className="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
              >
                Lihat Harga
              </button>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
