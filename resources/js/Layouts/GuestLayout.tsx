import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';
import { PropsWithChildren, useState, useEffect } from 'react';
import { Button } from '../Components/ui/button';

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
      <div className="bg-white shadow-md">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
          <div className="flex flex-col sm:flex-row justify-between items-center">
            <Link href="/">
              <ApplicationLogo className="h-10 w-10 fill-current text-gray-500" />
            </Link>
            <div className="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4 mt-4 sm:mt-0">
              <div className="text-sm text-center sm:text-left">
                <p>123 Main St, City, Country</p>
              </div>
              <div className="text-sm text-center sm:text-left">
                <p>Phone: (123) 456-7890</p>
              </div>
              <div className="text-sm text-center sm:text-left">
                <p>Email: info@example.com</p>
              </div>
              <button className="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Contact Us
              </button>
            </div>
          </div>
        </div>
      </div>
      <nav
        className={`bg-gray-800 transition-all duration-300 ${isScrolled ? 'fixed top-0 left-0 right-0 z-50' : ''}`}
      >
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between h-16">
            <div className="flex items-center justify-between w-full">
              <div className="hidden md:flex space-x-4">
                <Link
                  href="/"
                  className="px-3 py-2 rounded-md text-lg font-medium text-white hover:bg-gray-700"
                >
                  Home
                </Link>
                <Link
                  href="/profil"
                  className="px-3 py-2 rounded-md text-lg font-medium text-white hover:bg-gray-700"
                >
                  Profil
                </Link>
                <Link
                  href="/news"
                  className="px-3 py-2 rounded-md text-lg font-medium text-white hover:bg-gray-700"
                >
                  News
                </Link>
                <Link
                  href="/gallery"
                  className="px-3 py-2 rounded-md text-lg font-medium text-white hover:bg-gray-700"
                >
                  Gallery
                </Link>
                <Link
                  href={route('satu_data')}
                  className="px-3 py-2 rounded-md text-lg font-medium text-white hover:bg-gray-700"
                >
                  SatuData
                </Link>
              </div>
              <Link
                href="/login"
                className="px-3 py-2 rounded-md text-lg font-medium text-white hover:bg-gray-700"
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
                href="/profil"
                className="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700"
              >
                Profil
              </Link>
              <Link
                href="/news"
                className="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700"
              >
                News
              </Link>
              <Link
                href="/gallery"
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
      <footer className="bg-gray-900 py-12 px-4">
        <div className="container mx-auto flex flex-col md:flex-row justify-between items-start text-white">
          <div className="mb-6 md:mb-0 flex flex-col items-center md:items-start">
            <img
              src="/images/department-logo.svg"
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
        <div className="mt-10 pt-8 border-t border-gray-600">
          <div className="flex justify-center space-x-6">
            <a
              href="#"
              className="text-gray-400 hover:text-white transition duration-300"
            >
              <span className="sr-only">Facebook</span>
              <svg
                className="h-6 w-6"
                fill="currentColor"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  fillRule="evenodd"
                  d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                  clipRule="evenodd"
                />
              </svg>
            </a>
            <a
              href="#"
              className="text-gray-400 hover:text-white transition duration-300"
            >
              <span className="sr-only">Twitter</span>
              <svg
                className="h-6 w-6"
                fill="currentColor"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
              </svg>
            </a>
            <a
              href="#"
              className="text-gray-400 hover:text-white transition duration-300"
            >
              <span className="sr-only">Instagram</span>
              <svg
                className="h-6 w-6"
                fill="currentColor"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  fillRule="evenodd"
                  d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                  clipRule="evenodd"
                />
              </svg>
            </a>
            <a
              href="#"
              className="text-gray-400 hover:text-white transition duration-300"
            >
              <span className="sr-only">YouTube</span>
              <svg
                className="h-6 w-6"
                fill="currentColor"
                viewBox="0 0 24 24"
                aria-hidden="true"
              >
                <path
                  fillRule="evenodd"
                  d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                  clipRule="evenodd"
                />
              </svg>
            </a>
          </div>
          <p className="mt-8 text-center text-base text-gray-400">
            &copy; 2023 Departemen Perindustrian dan Perdagangan. Hak cipta
            dilindungi undang-undang.
          </p>
        </div>
      </footer>
    </div>
  );
}