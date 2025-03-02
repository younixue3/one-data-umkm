@extends('Front.master')
@section('title', 'Dokumen')
@section('content')
<div>
    <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
        <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div class="max-w-full">
                <img
                    src="{{ asset('assets/banner2.png') }}"
                    alt="Banner"
                    class="w-full rounded-lg shadow-md"
                />
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div class="max-w-xl">
              <header>
                <h2 class="text-lg font-medium text-gray-900">Dokumen</h2>
                <p class="mt-1 text-sm text-gray-600">
                  Dokumen-dokumen terkait Dinas Perindustrian dan Perdagangan.
                </p>
              </header>

              <div class="mt-6 space-y-4">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-3">
                    <div class="text-gray-600">
                      <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                      </svg>
                    </div>
                    <span class="text-sm">Perpres No 58 Tahun 2020</span>
                  </div>
                  <button class="rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                    Download
                  </button>
                </div>

                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-3">
                    <div class="text-gray-600">
                      <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                      </svg>
                    </div>
                    <span class="text-sm">
                      Peraturan Menteri Perdagangan Nomor 7 Tahun 2020 Harga
                      Acuan Pembelian
                    </span>
                  </div>
                  <button class="rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                    Download
                  </button>
                </div>

                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-3">
                    <div class="text-gray-600">
                      <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                      </svg>
                    </div>
                    <span class="text-sm">
                      Peraturan Menteri Perdagangan Nomor 24 Tahun 2020
                    </span>
                  </div>
                  <button class="rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                    Download
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection