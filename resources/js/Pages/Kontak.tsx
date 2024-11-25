import Banner from '@/Components/Banner';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function Index() {
  return (
    <GuestLayout>
      <Head title="Kontak" />

      <div className="">
        <Banner />
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="grid grid-cols-1 gap-8 md:grid-cols-2">
              {/* Informasi Kontak */}
              <div>
                <h2 className="text-lg font-medium text-gray-900">
                  Informasi Kontak
                </h2>
                <p className="mt-1 text-sm text-gray-600">
                  Silahkan hubungi kami untuk informasi lebih lanjut.
                </p>

                <div className="mt-6 space-y-4">
                  <div>
                    <h3 className="text-base font-semibold">Alamat</h3>
                    <p className="mt-1 text-sm text-gray-600">
                      Jalan Raya Sengkawit Komplek Pasar Induk Tanjung Selor
                    </p>
                  </div>

                  <div>
                    <h3 className="text-base font-semibold">E-mail</h3>
                    <p className="mt-1 text-sm text-gray-600">
                      Disperindagkop_umkm_kaltara@yahoo.co.id
                    </p>
                  </div>

                  <div>
                    <h3 className="text-base font-semibold">Telp</h3>
                    <p className="mt-1 text-sm text-gray-600">0542-100-111</p>
                  </div>
                </div>
              </div>

              {/* Form Kontak */}
              <div>
                <h2 className="text-lg font-medium text-gray-900">
                  Sampaikan Pesan
                </h2>
                <p className="mt-1 text-sm text-gray-600">
                  Anda dapat mengirimkan pesan kepada kami.
                </p>

                <form className="mt-6 space-y-4">
                  <div className="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                      <label
                        htmlFor="nama"
                        className="block text-sm font-medium text-gray-700"
                      >
                        Nama
                      </label>
                      <input
                        type="text"
                        name="nama"
                        id="nama"
                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                        placeholder="Nama Anda"
                      />
                    </div>

                    <div>
                      <label
                        htmlFor="email"
                        className="block text-sm font-medium text-gray-700"
                      >
                        Email
                      </label>
                      <input
                        type="email"
                        name="email"
                        id="email"
                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                        placeholder="Email Anda"
                      />
                    </div>
                  </div>

                  <div>
                    <label
                      htmlFor="pesan"
                      className="block text-sm font-medium text-gray-700"
                    >
                      Isi Pesan
                    </label>
                    <textarea
                      id="pesan"
                      name="pesan"
                      rows={4}
                      className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                      placeholder="Tulis pesan Anda di sini"
                    />
                  </div>

                  <div>
                    <button
                      type="submit"
                      className="inline-flex justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                      Kirim Pesan
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
