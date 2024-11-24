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
                <div className="prose prose-sm max-w-none">
                  <h3 className="font-semibold text-gray-900">
                    DISPERINDAGKOP Menurut Pergub no. 21 tahun 2016 pasal 78 :
                  </h3>

                  <ol className="list-decimal list-inside space-y-2">
                    <li>
                      Dinas perindustrian, perdagangan, koperasi, dan UKM
                      merupakan unsur pelaksana pemerintahan di bidang
                      perindustrian, bidang perdagangan serta bidang koperasi,
                      usaha kecil, dan menengah.
                    </li>
                    <li>
                      Dinas perindustrian, perdagangan, koperasi, dan UKM
                      dipimpin oleh seorang Kepala Dinas yang dalam melaksanakan
                      tugasnya berada di bawah dan bertanggung jawab kepada
                      Gubernur melalui Sekretaris Daerah.
                    </li>
                  </ol>

                  <h4 className="mt-6 font-semibold text-gray-900">
                    TUGAS (Pergub No. 21 tahun 2016 pasal 79 )
                  </h4>
                  <p className="mt-2">
                    Melaksanakan urusan pemerintahan bidang perindustrian,
                    urusan pemerintahan, bidang perdagangan, dan urusan
                    pemerintahan bidang koperasi, usaha kecil dan menengah yang
                    menjadi kewenangan daerah berdasarkan asas otonomi dan tugas
                    pembantuan
                  </p>

                  <h4 className="mt-6 font-semibold text-gray-900">
                    FUNGSI (Pergub no 21 tahun 2016 pasal 80)
                  </h4>
                  <ol className="mt-2 list-inside list-[lower-alpha] space-y-2">
                    <li>
                      Perumusan kebijakan teknis bidang Perindustrian,
                      Perdagangan, Koperasi, Usaha Kecil dan Menengah sesuai
                      dengan rencana strategis yang ditetapkan Pemerintah
                      Daerah;
                    </li>
                    <li>
                      Perumusan, perencanaan, pembinaan dan pengendalian
                      kebijakan teknis Perencanaan Pembangunan Perindustrian;
                    </li>
                    <li>
                      Perumusan, perencanaan, pembinaan dan pengendalian
                      kebijakan teknis Perizinan Industri;
                    </li>
                    <li>
                      Perumusan, perencanaan, pembinaan dan pengendalian
                      kebijakan teknis Sistem Informasi Industri;
                    </li>
                    <li>
                      Perumusan, perencanaan, pembinaan dan pengendalian
                      kebijakan teknis Perizinan dan Pendaftaran Perusahaan;
                    </li>
                    <li>
                      Perumusan, perencanaan, pembinaan dan pengendalian
                      kebijakan teknis Sarana Distribusi Perdagangan;
                    </li>
                    <li>
                      Perumusan, perencanaan, pembinaan dan pengendalian
                      kebijakan teknis Stabilitas Harga Barang Kebutuhan Pokok
                      dan Barang Penting;
                    </li>
                    <li>
                      Perumusan, perencanaan, pembinaan dan pengendalian
                      kebijakan teknis Pengembangan Ekspor;
                    </li>
                    <li>
                      Perumusan, perencanaan, pembinaan dan pengendalian
                      kebijakan teknis Standarisasi dan Perlindungan Konsumen;
                    </li>
                    <li>Penyelenggaraan urusan kesekretariatan;</li>
                    <li>Pelaksanaan Unit Pelaksana Teknis;</li>
                    <li>Pembinaan Kelompok Jabatan Fungsional; dan</li>
                    <li>
                      Pelaksanaan tugas lain yang diberikan oleh Gubernur sesuai
                      dengan bidang tugas dan fungsinya.
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
