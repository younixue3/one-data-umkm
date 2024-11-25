import { Link } from '@inertiajs/react';
import { PropsWithChildren, useState, useEffect } from 'react';
import { Button } from '@/Components/ui/button';
import { MapPin } from 'lucide-react';

export default function Guest({ children }: PropsWithChildren) {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      const offset = window.scrollY;
      setIsScrolled(offset > 100);
    };

    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  return (
    <div className="min-h-screen bg-gray-100">
      <div className="bg-gray-100 shadow-md">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20 py-4">
          {/* Top Address Bar */}
          <div className="flex gap-2 items-center text-sm text-gray-700">
            <MapPin size={20} />
            <p>Jalan Raya Sengkawit Komplek Pasar Induk Tanjung Selor</p>
          </div>

          {/* Main Contact Section */}
          <div className="flex flex-col sm:flex-row justify-between items-center mt-4">
            {/* Logo and Slogan */}
            <div className="flex items-center space-x-4">
              <img
                className="h-16"
                src="/assets/logo.png"
                alt="Logo Disperindagkop Kaltara"
              />
            </div>

            {/* Contact Details */}
            <div className="flex flex-col sm:flex-row items-center sm:space-x-4 mt-4 sm:mt-0">
              <div className="text-center sm:text-left">
                <p className="font-semibold">TLP</p>
                <p className="text-gray-800">0542-100-111</p>
              </div>
              <div className="border-l border-gray-300 h-6 mx-4 hidden sm:block"></div>
              <div className="text-center sm:text-left">
                <p className="font-semibold">Kode POS</p>
                <p className="text-gray-800">77212</p>
              </div>
              <div className="border-l border-gray-300 h-6 mx-4 hidden sm:block"></div>
              <div className="text-center sm:text-left">
                <p className="font-semibold">Email</p>
                <p className="text-gray-800">
                  Disperindagkop_umkm_kaltara@yahoo.co.id
                </p>
              </div>
            </div>

            {/* Social Icons and Button */}
            <div className="flex items-center space-x-4 mt-4 sm:mt-0">
              <div className="flex space-x-2 text-gray-600">
                <a href="#">
                  <i className="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i className="fab fa-twitter"></i>
                </a>
                <a href="#">
                  <i className="fab fa-instagram"></i>
                </a>
                <a href="#">
                  <i className="fab fa-youtube"></i>
                </a>
              </div>
              <button className="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                Hubungi Kami
              </button>
            </div>
          </div>
        </div>
      </div>

      <nav
        className={`bg-gray-800 transition-all ease-in-out duration-300 ${isScrolled ? 'fixed top-0 left-0 right-0 z-50' : ''}`}
      >
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between h-16">
            <div className="flex items-center justify-between w-full">
              <div className="hidden md:flex space-x-4 uppercase">
                <Link
                  href="/"
                  className="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
                >
                  Home
                </Link>
                <div className="relative group">
                  <button className="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700 flex items-center uppercase">
                    Profil
                    <svg
                      className="w-4 h-4 ml-1"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M19 9l-7 7-7-7"
                      />
                    </svg>
                  </button>
                  <div className="absolute hidden z-50 group-hover:block w-48 bg-gray-800 rounded-md shadow-lg py-1">
                    <Link
                      href={route('profil')}
                      className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Profil
                    </Link>
                    <Link
                      href={route('visi_misi')}
                      className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Visi Misi
                    </Link>
                    <Link
                      href={route('tugas_pokok_fungsi')}
                      className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Tugas Pokok & Fungsi
                    </Link>
                  </div>
                </div>
                <div className="relative group">
                  <button className="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700 flex items-center uppercase">
                    Informasi
                    <svg
                      className="w-4 h-4 ml-1"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M19 9l-7 7-7-7"
                      />
                    </svg>
                  </button>
                  <div className="absolute hidden z-50 group-hover:block w-48 bg-gray-800 rounded-md shadow-lg py-1">
                    <div className="relative group/sub">
                      <button className="w-full text-left uppercase px-4 py-2 text-sm text-white hover:bg-gray-700 flex items-center justify-between">
                        Bidang
                        <svg
                          className="w-4 h-4"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth={2}
                            d="M9 5l7 7-7 7"
                          />
                        </svg>
                      </button>
                      <div className="absolute left-full top-0 hidden group-hover/sub:block w-48 bg-gray-800 rounded-md shadow-lg py-1">
                        <Link
                          href={route('bidang.index', 'perindustrian')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Perindustrian
                        </Link>
                        <Link
                          href={route(
                            'bidang.index',
                            'perdagangan-dalam-negeri'
                          )}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Perdagangan Dalam Negeri
                        </Link>
                        <Link
                          href={route(
                            'bidang.index',
                            'perdagangan-luar-negeri'
                          )}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Perdagangan Luar Negeri
                        </Link>
                        <Link
                          href={route('bidang.index', 'koperasi')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Koperasi
                        </Link>
                      </div>
                    </div>
                    <div className="relative group/sub">
                      <button className="w-full text-left uppercase px-4 py-2 text-sm text-white hover:bg-gray-700 flex items-center justify-between">
                        Berita
                        <svg
                          className="w-4 h-4"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth={2}
                            d="M9 5l7 7-7 7"
                          />
                        </svg>
                      </button>
                      <div className="absolute left-full top-0 hidden group-hover/sub:block w-48 bg-gray-800 rounded-md shadow-lg py-1">
                        <Link
                          href={route('berita.index', 'umum')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Umum
                        </Link>
                        <Link
                          href={route('berita.index', 'pemberitahuan')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Pemberitahuan
                        </Link>
                        <Link
                          href={route('berita.index', 'pelayanan-publik')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Pelayanan Publik
                        </Link>
                        <Link
                          href={route('berita.index', 'pojok-umkm')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Pojok UMKM
                        </Link>
                      </div>
                    </div>
                    <Link
                      href={route('harga_bahan_pokok')}
                      className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Harga Bahan Pokok
                    </Link>
                    <Link
                      href={route('tugas_pokok_fungsi')}
                      className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Agenda
                    </Link>
                  </div>
                </div>
                <div className="relative group">
                  <button className="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700 flex items-center uppercase">
                    Publikasi
                    <svg
                      className="w-4 h-4 ml-1"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M19 9l-7 7-7-7"
                      />
                    </svg>
                  </button>
                  <div className="absolute hidden z-50 group-hover:block w-48 bg-gray-800 rounded-md shadow-lg py-1">
                    <div className="relative group/sub">
                      <button className="w-full text-left uppercase px-4 py-2 text-sm text-white hover:bg-gray-700 flex items-center justify-between">
                        Dokumen
                        <svg
                          className="w-4 h-4"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth={2}
                            d="M9 5l7 7-7 7"
                          />
                        </svg>
                      </button>
                      <div className="absolute left-full top-0 hidden group-hover/sub:block w-48 bg-gray-800 rounded-md shadow-lg py-1">
                        <Link
                          href={route('dokumen.index')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Peraturan
                        </Link>
                        <Link
                          href={route('dokumen.index')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Formulir
                        </Link>
                        <Link
                          href={route('dokumen.index')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Majalah
                        </Link>
                      </div>
                    </div>
                    <div className="relative group/sub">
                      <button className="w-full text-left uppercase px-4 py-2 text-sm text-white hover:bg-gray-700 flex items-center justify-between">
                        Pelaporan Kegiatan
                        <svg
                          className="w-4 h-4"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth={2}
                            d="M9 5l7 7-7 7"
                          />
                        </svg>
                      </button>
                      <div className="absolute left-full top-0 hidden group-hover/sub:block w-48 bg-gray-800 rounded-md shadow-lg py-1">
                        <Link
                          href={route('kegiatan.index')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Kegiatan 2017
                        </Link>
                        <Link
                          href={route('kegiatan.index')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Kegiatan 2018
                        </Link>
                        <Link
                          href={route('kegiatan.index')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Kegiatan 2019
                        </Link>
                        <Link
                          href={route('kegiatan.index')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Sejarah Kalimantan Utara
                        </Link>
                        <Link
                          href={route('kegiatan.index')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Kegiatan 2020
                        </Link>
                        <Link
                          href={route('kegiatan.index')}
                          className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Kegiatan 2021
                        </Link>
                      </div>
                    </div>
                    <Link
                      href={route('produk.index')}
                      className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Produk
                    </Link>
                  </div>
                </div>
                <Link
                  href="#"
                  className="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
                >
                  Dekranasda
                </Link>
                <Link
                  href="#"
                  className="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
                >
                  Smesco
                </Link>
                <div className="relative group">
                  <button className="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700 flex items-center uppercase">
                    Gallery
                    <svg
                      className="w-4 h-4 ml-1"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth={2}
                        d="M19 9l-7 7-7-7"
                      />
                    </svg>
                  </button>
                  <div className="absolute hidden z-50 group-hover:block w-48 bg-gray-800 rounded-md shadow-lg py-1">
                    <Link
                      href={route('tugas_pokok_fungsi')}
                      className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Foto
                    </Link>
                    <Link
                      href={route('tugas_pokok_fungsi')}
                      className="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Video
                    </Link>
                  </div>
                </div>
                <Link
                  href={route('satu_data')}
                  className="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
                >
                  Kontak
                </Link>
                <Link
                  href={route('satu_data')}
                  className="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
                >
                  SatuData
                </Link>
              </div>
              <Link
                href={route('dashboard.index')}
                className="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
              >
                Masuk
              </Link>
            </div>
            <div className="md:hidden flex items-center">
              <Button
                onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
                className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
              >
                <span className="sr-only">Open main menu</span>
                {isMobileMenuOpen ? (
                  <svg
                    className="block h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
                ) : (
                  <svg
                    className="block h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      d="M4 6h16M4 12h16M4 18h16"
                    />
                  </svg>
                )}
              </Button>
            </div>
          </div>
        </div>
        {isMobileMenuOpen && (
          <div className="md:hidden">
            <div className="px-2 pt-2 pb-3 space-y-1 sm:px-3">
              <Link
                href="/"
                className="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700"
              >
                Home
              </Link>
              <Link
                href="#"
                className="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700"
              >
                Profil
              </Link>
              <Link
                href="#"
                className="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700"
              >
                News
              </Link>
              <Link
                href="#"
                className="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700"
              >
                Gallery
              </Link>
              <Link
                href={route('satu_data')}
                className="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700"
              >
                SatuData
              </Link>
            </div>
          </div>
        )}
      </nav>

      <main className="flex-grow">{children}</main>
      <footer className="bg-gray-900 py-12 pb-0">
        <div className="container mx-auto flex flex-col md:flex-row justify-between items-start text-white">
          <div className="mb-6 md:mb-0 flex flex-col items-center md:items-start">
            <img
              src="/assets/logo.png"
              alt="Logo Departemen"
              className="h-16 mb-4"
            />
            <p className="text-sm text-center md:text-left max-w-xs">
              Memberikan pelayanan mutu maksimal kepada masyarakat.
            </p>
          </div>
          <div className="mb-6 md:mb-0 text-center md:text-left">
            <h3 className="font-bold text-lg mb-3">Jam Operasional</h3>
            <ul className="space-y-2 text-gray-400">
              <li>Senin - Jumat: 08:00 - 17:00</li>
              <li>Sabtu: 09:00 - 13:00</li>
              <li>Minggu: Tutup</li>
            </ul>
            <h3 className="font-bold text-lg mt-6 mb-3">Informasi Kontak</h3>
            <ul className="space-y-2 text-gray-400">
              <li>Telepon: (123) 456-7890</li>
              <li>Email: info@departemenperindustrian.go.id</li>
              <li>Alamat: Jl. Pemerintah No. 123, Kota Pusat</li>
            </ul>
          </div>
          <nav className="flex flex-col space-y-3">
            <h3 className="font-bold text-lg mb-3">Tautan Cepat</h3>
            <a
              href="/tentang-kami"
              className="text-white hover:text-blue-500 transition duration-300"
            >
              Tentang Kami
            </a>
            <a
              href="/layanan"
              className="text-white hover:text-blue-500 transition duration-300"
            >
              Layanan Kami
            </a>
            <a
              href="/kontak"
              className="text-white hover:text-blue-500 transition duration-300"
            >
              Hubungi Kami
            </a>
            <a
              href="/kebijakan-privasi"
              className="text-white hover:text-blue-500 transition duration-300"
            >
              Kebijakan Privasi
            </a>
            <a
              href="/faq"
              className="text-white hover:text-blue-500 transition duration-300"
            >
              FAQ
            </a>
            <a
              href="/karir"
              className="text-white hover:text-blue-500 transition duration-300"
            >
              Karir
            </a>
          </nav>
          <div className="mt-6 md:mt-0">
            <h3 className="font-bold text-lg mb-3">Buletin</h3>
            <p className="mb-4 text-sm">
              Tetap update dengan berita dan pengumuman terbaru kami
            </p>
            <form className="flex flex-col sm:flex-row">
              <input
                type="email"
                placeholder="Masukkan email Anda"
                className="text-white px-4 py-2 mb-2 sm:mb-0 sm:mr-2 rounded"
              />
              <button
                type="submit"
                className="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition duration-300"
              >
                Berlangganan
              </button>
            </form>
          </div>
        </div>
        <div className="bg-blue-500 py-4 mt-10">
          <div className="container mx-auto flex justify-between items-center text-white px-5">
            <p className="text-sm">&copy; 2024 Disperindagkop Kaltara</p>
            <nav className="flex space-x-6 text-sm">
              <a href="/harga-pokok" className="hover:text-gray-200">
                Harga Pokok
              </a>
              <a href="/dekranasda" className="hover:text-gray-200">
                Dekranasda
              </a>
              <a href="/gallery-smesco" className="hover:text-gray-200">
                Gallery Smesco
              </a>
              <a href="/kontak" className="hover:text-gray-200">
                Kontak
              </a>
            </nav>
          </div>
        </div>
      </footer>
    </div>
  );
}
