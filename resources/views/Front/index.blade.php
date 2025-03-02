@extends('Front.master')
@section('title', 'Home')
@section('content')
<div class="bg-white text-black">
        <!-- 1. Hero Section with Carousel -->
        <section class="relative h-[400px] sm:h-[500px] md:h-[600px]">
          <div id="carousel" class="relative" style="height: 35rem;">
            <div class="carousel-content h-full">
                <div class="carousel-item h-full hidden">
                  <div class="relative h-full">
                    <img
                      src="{{ asset('assets/1.webp') }}"
                      alt="Memberdayakan Pertumbuhan Industri"
                      class="w-full h-full object-cover"
                    />
                    <div class="absolute flex inset-0">
                      <div class="m-auto ml-20 bg-black bg-opacity-70 backdrop-blur-sm rounded-lg shadow-lg flex flex-col items-start space-y-2 sm:space-y-4 p-6" style="width:40rem;">
                        <div class="flex gap-2">
                          <span class="text-white text-xs sm:text-lg font-extralight uppercase">
                            Industri
                          </span>
                          <span class="text-yellow-400 flex text-xs sm:text-lg font-extralight uppercase">
                            <div class="my-auto w-4 h-4 bg-yellow-400 rounded-full mr-1"></div>
                            15-06-2023
                          </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white uppercase">
                          Memberdayakan Pertumbuhan Industri
                        </h1>
                        <button class="mt-2 sm:mt-4 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                          <span>Selengkapnya</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item h-full hidden">
                  <div class="relative h-full">
                    <img
                      src="{{ asset('assets/2.webp') }}"
                      alt="Memperluas Cakrawala Perdagangan"
                      class="w-full h-full object-cover"
                    />
                    <div class="absolute flex inset-0">
                      <div class="m-auto ml-20 bg-black bg-opacity-70 backdrop-blur-sm rounded-lg shadow-lg flex flex-col items-start space-y-2 sm:space-y-4 p-6" style="width:40rem;">
                        <div class="flex gap-2">
                          <span class="text-white text-xs sm:text-lg font-extralight uppercase">
                            Perdagangan
                          </span>
                          <span class="text-yellow-400 flex text-xs sm:text-lg font-extralight uppercase">
                            <div class="my-auto w-4 h-4 bg-yellow-400 rounded-full mr-1"></div>
                            20-06-2023
                          </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white uppercase">
                          Memperluas Cakrawala Perdagangan
                        </h1>
                        <button class="mt-2 sm:mt-4 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                          <span>Selengkapnya</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item h-full hidden">
                  <div class="relative h-full">
                    <img
                      src="{{ asset('assets/3.webp') }}"
                      alt="Praktik Manufaktur Berkelanjutan"
                      class="w-full h-full object-cover"
                    />
                    <div class="absolute flex inset-0">
                      <div class="m-auto ml-20 bg-black bg-opacity-70 backdrop-blur-sm rounded-lg shadow-lg flex flex-col items-start space-y-2 sm:space-y-4 p-6" style="width:40rem;">
                        <div class="flex gap-2">
                          <span class="text-white text-xs sm:text-lg font-extralight uppercase">
                            Keberlanjutan
                          </span>
                          <span class="text-yellow-400 flex text-xs sm:text-lg font-extralight uppercase">
                            <div class="my-auto w-4 h-4 bg-yellow-400 rounded-full mr-1"></div>
                            25-06-2023
                          </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white uppercase">
                          Praktik Manufaktur Berkelanjutan
                        </h1>
                        <button class="mt-2 sm:mt-4 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                          <span>Selengkapnya</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item h-full hidden">
                  <div class="relative h-full">
                    <img
                      src="{{ asset('assets/4.webp') }}"
                      alt="Transformasi Digital dalam Perdagangan"
                      class="w-full h-full object-cover"
                    />
                    <div class="absolute flex inset-0">
                      <div class="m-auto ml-20 bg-black bg-opacity-70 backdrop-blur-sm rounded-lg shadow-lg flex flex-col items-start space-y-2 sm:space-y-4 p-6" style="width:40rem;">
                        <div class="flex gap-2">
                          <span class="text-white text-xs sm:text-lg font-extralight uppercase">
                            Teknologi
                          </span>
                          <span class="text-yellow-400 flex text-xs sm:text-lg font-extralight uppercase">
                            <div class="my-auto w-4 h-4 bg-yellow-400 rounded-full mr-1"></div>
                            30-06-2023
                          </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white uppercase">
                          Transformasi Digital dalam Perdagangan
                        </h1>
                        <button class="mt-2 sm:mt-4 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                          <span>Selengkapnya</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item h-full hidden">
                  <div class="relative h-full">
                    <img
                      src="{{ asset('assets/5.webp') }}"
                      alt="Mendorong Industri Lokal"
                      class="w-full h-full object-cover"
                    />
                    <div class="absolute flex inset-0">
                      <div class="m-auto ml-20 bg-black bg-opacity-70 backdrop-blur-sm rounded-lg shadow-lg flex flex-col items-start space-y-2 sm:space-y-4 p-6" style="width:40rem;">
                        <div class="flex gap-2">
                          <span class="text-white text-xs sm:text-lg font-extralight uppercase">
                            Ekonomi Lokal
                          </span>
                          <span class="text-yellow-400 flex text-xs sm:text-lg font-extralight uppercase">
                            <div class="my-auto w-4 h-4 bg-yellow-400 rounded-full mr-1"></div>
                            05-07-2023
                          </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white uppercase">
                          Mendorong Industri Lokal
                        </h1>
                        <button class="mt-2 sm:mt-4 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                          <span>Selengkapnya</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item h-full hidden">
                  <div class="relative h-full">
                    <img
                      src="{{ asset('assets/6.webp') }}"
                      alt="Kemitraan Perdagangan Internasional"
                      class="w-full h-full object-cover"
                    />
                    <div class="absolute flex inset-0">
                      <div class="m-auto ml-20 bg-black bg-opacity-70 backdrop-blur-sm rounded-lg shadow-lg flex flex-col items-start space-y-2 sm:space-y-4 p-6" style="width:40rem;">
                        <div class="flex gap-2">
                          <span class="text-white text-xs sm:text-lg font-extralight uppercase">
                            Hubungan Internasional
                          </span>
                          <span class="text-yellow-400 flex text-xs sm:text-lg font-extralight uppercase">
                            <div class="my-auto w-4 h-4 bg-yellow-400 rounded-full mr-1"></div>
                            10-07-2023
                          </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white uppercase">
                          Kemitraan Perdagangan Internasional
                        </h1>
                        <button class="mt-2 sm:mt-4 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                          <span>Selengkapnya</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item h-full hidden">
                  <div class="relative h-full">
                    <img
                      src="{{ asset('assets/7.webp') }}"
                      alt="Inovasi dalam Manufaktur"
                      class="w-full h-full object-cover"
                    />
                    <div class="absolute flex inset-0">
                      <div class="m-auto ml-20 bg-black bg-opacity-70 backdrop-blur-sm rounded-lg shadow-lg flex flex-col items-start space-y-2 sm:space-y-4 p-6" style="width:40rem;">
                        <div class="flex gap-2">
                          <span class="text-white text-xs sm:text-lg font-extralight uppercase">
                            Inovasi
                          </span>
                          <span class="text-yellow-400 flex text-xs sm:text-lg font-extralight uppercase">
                            <div class="my-auto w-4 h-4 bg-yellow-400 rounded-full mr-1"></div>
                            15-07-2023
                          </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white uppercase">
                          Inovasi dalam Manufaktur
                        </h1>
                        <button class="mt-2 sm:mt-4 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                          <span>Selengkapnya</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item h-full hidden">
                  <div class="relative h-full">
                    <img
                      src="{{ asset('assets/8.webp') }}"
                      alt="Energi Hijau dalam Industri"
                      class="w-full h-full object-cover"
                    />
                    <div class="absolute flex inset-0">
                      <div class="m-auto ml-20 bg-black bg-opacity-70 backdrop-blur-sm rounded-lg shadow-lg flex flex-col items-start space-y-2 sm:space-y-4 p-6" style="width:40rem;">
                        <div class="flex gap-2">
                          <span class="text-white text-xs sm:text-lg font-extralight uppercase">
                            Keberlanjutan
                          </span>
                          <span class="text-yellow-400 flex text-xs sm:text-lg font-extralight uppercase">
                            <div class="my-auto w-4 h-4 bg-yellow-400 rounded-full mr-1"></div>
                            20-07-2023
                          </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white uppercase">
                          Energi Hijau dalam Industri
                        </h1>
                        <button class="mt-2 sm:mt-4 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center">
                          <span>Selengkapnya</span>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <button class="carousel-prev absolute left-2 sm:left-8 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>
            <button class="carousel-next absolute right-2 sm:right-8 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
          </div>
          <div class="px-20">
            <div class="absolute flex gap-1 bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 bg-blue-500 border-none shadow-lg p-4 sm:p-6 w-full max-w-6xl">
              <div class="text-center m-auto w-5/6">
                <h3 class="text-xl font-semibold uppercase text-white">
                  Dinas Perindustrian, Perdagangan, Koperasi dan UKM PROVINSI
                  KALIMANTAN UTARA
                </h3>
              </div>
              <button
                class="w-1/6 text-lg flex items-center justify-center space-x-2 bg-gray-800 hover:bg-gray-900 text-white p-2 rounded"
                onclick="document.querySelector('#news-section')?.scrollIntoView({ behavior: 'smooth' })"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                <span>Cari Informasi</span>
              </button>
            </div>
          </div>
        </section>

        <!-- 2. Informasi Bidang Section -->
        <section class="py-12 sm:py-16 px-4 bg-gray-800 text-white">
          <h2 class="text-2xl sm:text-3xl font-bold text-center mt-10 mb-6 sm:mb-8">
            Informasi Bidang
          </h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 px-24">
            @foreach(['Perindustrian', 'Perdagangan Dalam Negeri', 'Perdagangan Luar Negeri', 'Koperasi'] as $title)
              <div class="bg-transparent border-0 text-white">
                <div class="p-6">
                  <svg xmlns="http://www.w3.org/2000/svg" class="m-auto w-10 h-10 sm:w-20 sm:h-20 mb-3 sm:mb-4 text-yellow-400" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                  <h3 class="text-center text-lg sm:text-base uppercase">
                    {{ $title }}
                  </h3>
                </div>
              </div>
            @endforeach
          </div>
        </section>

        <!-- 3. News Section -->
        <section class="bg-gray-100 py-12 sm:py-16 px-4">
          <h5 class="uppercase text-center">Informasi</h5>
          <h2 class="text-2xl sm:text-4xl uppercase font-extrabold text-center mb-6 sm:mb-8">
            Berita Terkini
          </h2>
          <div class="px-32">
            <div id="news-pagination" class="news-pagination"></div>
          </div>
        </section>

        <section class="bg-sky-600 flex">
          <div class="w-2/5 pl-20 my-auto uppercase">
            <h4 class="text-2xl font-extrabold text-yellow-400">
              Update Harga
            </h4>
            <h3 class="text-3xl text-white font-extrabold flex">
              Bahan Pokok
              <span class="text-yellow-400 ml-2 text-sm font-light flex mt-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                Pasar Induk
              </span>
            </h3>
            <h5 class="text-yellow-400">Bulungan</h5>
            <button class="text-xl font-bold px-0 text-white hover:underline">
              Lihat Detail Update
            </button>
          </div>
          <div class="bg-gray-200 w-3/5 h-32 mb-10"></div>
        </section>
        <!-- 4. Publication Section -->
        <section class="py-12 sm:py-16 px-4 bg-gray-100 relative">
          <h2 class="text-4xl font-bold text-center mb-8">
            Publikasi Pengumuman & Kegiatan
          </h2>

          <div class="container mx-auto flex flex-col lg:flex-row gap-8">
            <!-- Daftar File Publikasi -->
            <div class="lg:w-1/2 bg-white p-6 shadow rounded-lg">
              @foreach([
                [
                  'title' => 'Permendag Nomor 19 Tahun 2021',
                  'category' => 'Peraturan',
                  'fileUrl' => '/assets/peraturan1.pdf'
                ],
                [
                  'title' => 'Permendag Nomor 18 Tahun 2021',
                  'category' => 'Peraturan',
                  'fileUrl' => '/assets/peraturan2.pdf'
                ],
                [
                  'title' => 'SOP Penerbitan Surat Rekomendasi Izin Usaha',
                  'category' => 'Peraturan',
                  'fileUrl' => '/assets/sop.pdf'
                ]
              ] as $file)
                <div class="flex items-center mb-6 bg-transparent border-0">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-500 mr-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  <div>
                    <h3 class="text-lg font-semibold uppercase">
                      {{ $file['category'] }}
                    </h3>
                    <p>{{ $file['title'] }}</p>
                    <a href="{{ $file['fileUrl'] }}" class="mt-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center inline-block">
                      <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-4 h-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                      Download
                    </a>
                  </div>
                </div>
              @endforeach
            </div>
            <!-- Add animation in the center -->
            <div class="inset-0 flex justify-center items-center z-10">
              <img
                src="/assets/people.png"
                alt="Animated graphic"
                class="w-96"
              />
            </div>

            <!-- Daftar Kegiatan -->
            <div class="lg:w-1/2">
              @foreach([
                [
                  'title' => 'Pelatihan Kewirausahaan, Keamanan Pangan dan Manajemen Usaha Bagi UMKM',
                  'category' => 'Bidang Koperasi',
                  'date' => '23 Sep 2021',
                  'imageUrl' => asset('/assets/event1.jpg')
                ],
                [
                  'title' => 'Pelatihan Pengembangan dan Pemasaran Produk Home Decor dan Handicraft untuk Ekspor',
                  'category' => 'Bidang Perdagangan Luar Negeri',
                  'date' => '21 Mar 2020',
                  'imageUrl' => asset('/assets/event2.jpg')
                ],
                [
                  'title' => 'Pengawasan Koperasi Kabupaten Bulungan',
                  'category' => 'Bidang Koperasi',
                  'date' => '10 Jul 2020',
                  'imageUrl' => asset('/assets/event3.jpg')
                ]
              ] as $event)
                <div class="flex items-center p-4 mb-6 bg-white shadow rounded-lg">
                  <img
                    src="{{ $event['imageUrl'] }}"
                    alt="{{ $event['title'] }}"
                    class="w-24 h-24 object-cover rounded-lg mr-4"
                  />
                  <div>
                    <h3 class="text-lg font-semibold uppercase">
                      {{ $event['title'] }}
                    </h3>
                    <p class="text-sm text-gray-500">{{ $event['category'] }}</p>
                    <div class="flex items-center text-gray-500 mt-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                      {{ $event['date'] }}
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </section>

        <!-- 5. Gallery and Satu Data Section -->
        <section class="bg-gray-100 py-12 sm:py-16">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-0 px-4 sm:px-0">
            <div class="bg-gray-700 p-4 sm:p-6 relative overflow-hidden h-64 sm:h-72">
              <div class="absolute bottom-0 left-0 opacity-10 w-32 h-32 sm:w-64 sm:h-64">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
              </div>
              <div class="relative h-full z-10 flex flex-col justify-between">
                <h3 class="text-lg sm:text-xl font-semibold text-white mb-2 sm:mb-4">
                  Gallery
                </h3>
                <p class="text-gray-300 mb-4 text-sm sm:text-base">
                  Explore our photo gallery showcasing our department's
                  activities and achievements.
                </p>
                <button class="bg-blue-600 hover:bg-blue-700 w-full sm:w-auto text-white px-4 py-2 rounded flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-4 h-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                  View Gallery
                </button>
              </div>
            </div>
            <div class="bg-yellow-400 p-4 sm:p-6 relative overflow-hidden h-64 sm:h-72">
              <div class="absolute bottom-0 left-0 opacity-10 w-32 h-32 sm:w-64 sm:h-64">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
              </div>
              <div class="relative h-full z-10 flex flex-col justify-between">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2 sm:mb-4">
                  Satu Data
                </h3>
                <p class="text-gray-700 mb-4 text-sm sm:text-base">
                  Access our integrated data platform for comprehensive insights
                  and analysis.
                </p>
                <button class="bg-blue-600 hover:bg-blue-700 w-full sm:w-auto text-white px-4 py-2 rounded flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 w-4 h-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                  Go to Satu Data
                </button>
              </div>
            </div>
          </div>
        </section>

        <!-- 6. Gallery Images Section -->
        <!-- <section class="py-12 sm:py-16 px-4">
          <h2 class="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8">
            News Gallery
          </h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <div id="gallery-list"></div>
          </div>
        </section> -->
      </div>

<script>
  // Carousel functionality
  document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('carousel');
    const items = carousel.querySelectorAll('.carousel-item');
    const prevBtn = carousel.querySelector('.carousel-prev');
    const nextBtn = carousel.querySelector('.carousel-next');
    let currentIndex = 0;
    
    // Show first item
    if (items.length > 0) {
      items[0].classList.remove('hidden');
    }
    
    // Function to show specific slide
    function showSlide(index) {
      // Hide all slides
      items.forEach(item => {
        item.classList.add('hidden');
        item.style.transition = 'opacity 0.5s ease'; // Add transition
        item.style.opacity = '0'; // Set opacity to 0
      });
      
      // Show current slide
      items[index].classList.remove('hidden');
      setTimeout(() => {
        items[index].style.opacity = '1'; // Set opacity to 1 after a short delay
      }, 50);
    }
    
    // Next slide
    function nextSlide() {
      currentIndex = (currentIndex + 1) % items.length;
      showSlide(currentIndex);
    }
    
    // Previous slide
    function prevSlide() {
      currentIndex = (currentIndex - 1 + items.length) % items.length;
      showSlide(currentIndex);
    }
    
    // Add event listeners
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    
    // Auto slide every 5 seconds
    setInterval(nextSlide, 5000);
  });
</script>
@endsection