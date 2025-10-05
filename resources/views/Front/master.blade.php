<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Disperindagkop | @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('vendor/open-layer/ol.css') }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
      <div class="bg-gray-100 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-20 py-4">
          <!-- Top Address Bar -->
          <div class="flex gap-2 items-center text-sm text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
            <p>Jalan Raya Sengkawit Komplek Pasar Induk Tanjung Selor</p>
          </div>

          <!-- Main Contact Section -->
          <div class="flex flex-col sm:flex-row justify-between items-center mt-4">
            <!-- Logo and Slogan -->
            <div class="flex items-center space-x-4">
              <img
                class="h-16"
                src="/assets/logo.png"
                alt="Logo Disperindagkop Kaltara"
              />
            </div>

            <!-- Contact Details -->
            <div class="flex flex-col sm:flex-row items-center sm:space-x-4 mt-4 sm:mt-0">
              <div class="text-center sm:text-left">
                <p class="font-semibold">TLP</p>
                <p class="text-gray-800">0542-100-111</p>
              </div>
              <div class="border-l border-gray-300 h-6 mx-4 hidden sm:block"></div>
              <div class="text-center sm:text-left">
                <p class="font-semibold">Kode POS</p>
                <p class="text-gray-800">77212</p>
              </div>
              <div class="border-l border-gray-300 h-6 mx-4 hidden sm:block"></div>
              <div class="text-center sm:text-left">
                <p class="font-semibold">Email</p>
                <p class="text-gray-800">
                  Disperindagkop_umkm_kaltara@yahoo.co.id
                </p>
              </div>
            </div>

            <!-- Social Icons and Button -->
            <div class="flex items-center space-x-4 mt-4 sm:mt-0">
              <div class="flex space-x-2 text-gray-600">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="#">
                  <i class="fab fa-youtube"></i>
                </a>
              </div>
              <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                Hubungi Kami
              </button>
            </div>
          </div>
        </div>
      </div>

      <nav
        class="bg-gray-800 transition-all ease-in-out duration-300 {{ isset($isScrolled) && $isScrolled ? 'fixed top-0 left-0 right-0 z-50' : '' }}"
      >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex items-center justify-between w-full">
              <div class="hidden md:flex space-x-4 uppercase">
                <a
                  href="/"
                  class="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
                >
                  Home
                </a>
                <div class="relative group">
                  <button class="dropdown-toggle px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700 flex items-center uppercase" data-dropdown="profil-dropdown">
                    Profil
                    <svg
                      class="w-4 h-4 ml-1"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                      />
                    </svg>
                  </button>
                  <div id="profil-dropdown" class="dropdown-menu absolute hidden z-50 w-48 bg-gray-800 rounded-md shadow-lg py-1">
                    <a
                      href="{{ route('profil') }}"
                      class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Profil
                    </a>
                    <a
                      href="{{ route('profil', 'visi-misi') }}"
                      class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Visi Misi
                    </a>
                    <a
                      href="{{ route('profil', 'tugas-pokok-fungsi') }}"
                      class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Tugas Pokok & Fungsi
                    </a>
                  </div>
                </div>
                <div class="relative group">
                  <button class="dropdown-toggle px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700 flex items-center uppercase" data-dropdown="informasi-dropdown">
                    Informasi
                    <svg
                      class="w-4 h-4 ml-1"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                      />
                    </svg>
                  </button>
                  <div id="informasi-dropdown" class="dropdown-menu absolute hidden z-50 w-48 bg-gray-800 rounded-md shadow-lg py-1">
                    <div class="relative">
                      <button class="dropdown-toggle-sub w-full text-left uppercase px-4 py-2 text-sm text-white hover:bg-gray-700 flex items-center justify-between" data-dropdown="bidang-dropdown">
                        Bidang
                        <svg
                          class="w-4 h-4"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                          />
                        </svg>
                      </button>
                      <div id="bidang-dropdown" class="dropdown-submenu absolute left-full top-0 hidden w-48 bg-gray-800 rounded-md shadow-lg py-1">
                        <a
                          href="{{ route('bidang.index', 'perindustrian') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Perindustrian
                        </a>
                        <a
                          href="{{ route('bidang.index', 'perdagangan-dalam-negeri') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Perdagangan Dalam Negeri
                        </a>
                        <a
                          href="{{ route('bidang.index', 'perdagangan-luar-negeri') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Perdagangan Luar Negeri
                        </a>
                        <a
                          href="{{ route('bidang.index', 'koperasi') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Koperasi
                        </a>
                      </div>
                    </div>
                    <div class="relative">
                      <button class="dropdown-toggle-sub w-full text-left uppercase px-4 py-2 text-sm text-white hover:bg-gray-700 flex items-center justify-between" data-dropdown="berita-dropdown">
                        Berita
                        <svg
                          class="w-4 h-4"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                          />
                        </svg>
                      </button>
                      <div id="berita-dropdown" class="dropdown-submenu absolute left-full top-0 hidden w-48 bg-gray-800 rounded-md shadow-lg py-1">
                        <a
                          href="{{ route('berita.index', 'umum') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Umum
                        </a>
                        <a
                          href="{{ route('berita.index', 'pemberitahuan') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Pemberitahuan
                        </a>
                        <a
                          href="{{ route('berita.index', 'pelayanan-publik') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Pelayanan Publik
                        </a>
                        <a
                          href="{{ route('berita.index', 'pojok-umkm') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Pojok UMKM
                        </a>
                      </div>
                    </div>
                    <a
                      href="{{ route('harga_bahan_pokok') }}"
                      class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Harga Bahan Pokok
                    </a>
                    <a
                      href="{{ route('agenda') }}"
                      class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Agenda
                    </a>
                  </div>
                </div>
                <div class="relative group">
                  <button class="dropdown-toggle px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700 flex items-center uppercase" data-dropdown="publikasi-dropdown">
                    Publikasi
                    <svg
                      class="w-4 h-4 ml-1"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                      />
                    </svg>
                  </button>
                  <div id="publikasi-dropdown" class="dropdown-menu absolute hidden z-50 w-48 bg-gray-800 rounded-md shadow-lg py-1">
                    <div class="relative">
                      <button class="dropdown-toggle-sub w-full text-left uppercase px-4 py-2 text-sm text-white hover:bg-gray-700 flex items-center justify-between" data-dropdown="dokumen-dropdown">
                        Dokumen
                        <svg
                          class="w-4 h-4"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                          />
                        </svg>
                      </button>
                      <div id="dokumen-dropdown" class="dropdown-submenu absolute left-full top-0 hidden w-48 bg-gray-800 rounded-md shadow-lg py-1">
                        <a
                          href="{{ route('dokumen.index') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Peraturan
                        </a>
                        <a
                          href="{{ route('dokumen.index') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Formulir
                        </a>
                        <a
                          href="{{ route('dokumen.index') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Majalah
                        </a>
                      </div>
                    </div>
                    <div class="relative">
                      <button class="dropdown-toggle-sub w-full text-left uppercase px-4 py-2 text-sm text-white hover:bg-gray-700 flex items-center justify-between" data-dropdown="kegiatan-dropdown">
                        Pelaporan Kegiatan
                        <svg
                          class="w-4 h-4"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                          />
                        </svg>
                      </button>
                      <div id="kegiatan-dropdown" class="dropdown-submenu absolute left-full top-0 hidden w-48 bg-gray-800 rounded-md shadow-lg py-1">
                        <a
                          href="{{ route('kegiatan.index') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Kegiatan 2017
                        </a>
                        <a
                          href="{{ route('kegiatan.index') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Kegiatan 2018
                        </a>
                        <a
                          href="{{ route('kegiatan.index') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Kegiatan 2019
                        </a>
                        <a
                          href="{{ route('kegiatan.index') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Sejarah Kalimantan Utara
                        </a>
                        <a
                          href="{{ route('kegiatan.index') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Kegiatan 2020
                        </a>
                        <a
                          href="{{ route('kegiatan.index') }}"
                          class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                        >
                          Kegiatan 2021
                        </a>
                      </div>
                    </div>
                    <a
                      href="{{ route('produk.index') }}"
                      class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Produk
                    </a>
                  </div>
                </div>
                <a
                  href="#"
                  class="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
                >
                  Dekranasda
                </a>
                <a
                  href="#"
                  class="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
                >
                  Smesco
                </a>
                <div class="relative group">
                  <button class="dropdown-toggle px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700 flex items-center uppercase" data-dropdown="gallery-dropdown">
                    Gallery
                    <svg
                      class="w-4 h-4 ml-1"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"
                      />
                    </svg>
                  </button>
                  <div id="gallery-dropdown" class="dropdown-menu absolute hidden z-50 w-48 bg-gray-800 rounded-md shadow-lg py-1">
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Foto
                    </a>
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text-white hover:bg-gray-700"
                    >
                      Video
                    </a>
                  </div>
                </div>
                <a
                  href="{{ route('kontak') }}"
                  class="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
                >
                  Kontak
                </a>
                <a
                  href="{{ route('satu_data') }}"
                  class="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
                >
                  SatuData
                </a>
              </div>
              <a
                href="{{ route('dashboard.index') }}"
                class="px-3 py-2 rounded-md text-sm font-extrabold text-white hover:bg-gray-700"
              >
                Masuk
              </a>
            </div>
            <div class="md:hidden flex items-center">
              <button
                id="mobile-menu-button"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
              >
                <span class="sr-only">Open main menu</span>
                  <svg
                    class="block h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
              </button>
            </div>
          </div>
        </div>
      </nav>
        @yield('content')
    </main>
      <footer class="bg-gray-900 py-12 pb-0">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-start text-white">
          <div class="mb-6 md:mb-0 flex flex-col items-center md:items-start">
            <img
              src="/assets/logo.png"
              alt="Logo Departemen"
              class="h-16 mb-4"
            />
            <p class="text-sm text-center md:text-left max-w-xs">
              Memberikan pelayanan mutu maksimal kepada masyarakat.
            </p>
          </div>
          <div class="mb-6 md:mb-0 text-center md:text-left">
            <h3 class="font-bold text-lg mb-3">Jam Operasional</h3>
            <ul class="space-y-2 text-gray-400">
              <li>Senin - Jumat: 08:00 - 17:00</li>
              <li>Sabtu: 09:00 - 13:00</li>
              <li>Minggu: Tutup</li>
            </ul>
            <h3 class="font-bold text-lg mt-6 mb-3">Informasi Kontak</h3>
            <ul class="space-y-2 text-gray-400">
              <li>Telepon: (123) 456-7890</li>
              <li>Email: info@departemenperindustrian.go.id</li>
              <li>Alamat: Jl. Pemerintah No. 123, Kota Pusat</li>
            </ul>
          </div>
          <nav class="flex flex-col space-y-3 w-96">
            <h3 class="font-bold text-lg mb-3">Tautan Cepat</h3>
            <a
              href="{{ route('profil', 'visi-misi') }}"
              class="text-white hover:text-blue-500 transition duration-300"
            >
              Visi Misi
            </a>
            <a
              href="{{ route('profil') }}"
              class="text-white hover:text-blue-500 transition duration-300"
            >
              Struktur Organisasi
            </a>
            <a
              href="{{ route('profil', 'tugas-pokok-fungsi') }}"
              class="text-white hover:text-blue-500 transition duration-300"
            >
              Tugas Pokok & Fungsi
            </a>
          </nav>
        </div>
        <div class="bg-blue-500 py-4 mt-10">
          <div class="container mx-auto flex justify-between items-center text-white px-5">
            <p class="text-sm">&copy; 2024 Disperindagkop Kaltara</p>
            <nav class="flex space-x-6 text-sm">
              <a href="/harga-pokok" class="hover:text-gray-200">
                Harga Pokok
              </a>
              <a href="/dekranasda" class="hover:text-gray-200">
                Dekranasda
              </a>
              <a href="/gallery-smesco" class="hover:text-gray-200">
                Gallery Smesco
              </a>
              <a href="/kontak" class="hover:text-gray-200">
                Kontak
              </a>
            </nav>
          </div>
        </div>
      </footer>
    </div>
    <script src="{{ asset('vendor/open-layer/ol.js') }}"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Main dropdown toggles
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        
        dropdownToggles.forEach(toggle => {
          toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const targetId = this.getAttribute('data-dropdown');
            const targetDropdown = document.getElementById(targetId);
            
            // Close all other dropdowns first
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
              if (menu.id !== targetId) {
                menu.classList.add('hidden');
              }
            });
            
            // Toggle current dropdown
            targetDropdown.classList.toggle('hidden');
          });
        });
        
        // Submenu dropdown toggles
        const subDropdownToggles = document.querySelectorAll('.dropdown-toggle-sub');
        
        subDropdownToggles.forEach(toggle => {
          toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const targetId = this.getAttribute('data-dropdown');
            const targetDropdown = document.getElementById(targetId);
            
            // Close all other submenus at the same level
            const parentSubmenu = this.closest('.dropdown-menu');
            parentSubmenu.querySelectorAll('.dropdown-submenu').forEach(menu => {
              if (menu.id !== targetId) {
                menu.classList.add('hidden');
              }
            });
            
            // Toggle current submenu
            targetDropdown.classList.toggle('hidden');
          });
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
          if (!e.target.closest('.dropdown-toggle') && 
              !e.target.closest('.dropdown-menu') && 
              !e.target.closest('.dropdown-toggle-sub')) {
            document.querySelectorAll('.dropdown-menu, .dropdown-submenu').forEach(menu => {
              menu.classList.add('hidden');
            });
          }
        });
        
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        if (mobileMenuButton) {
          mobileMenuButton.addEventListener('click', function() {
            // Add mobile menu functionality here
            console.log('Mobile menu clicked');
            // You would typically toggle a mobile menu here
          });
        }
      });
    </script>
    </body>
</html>
