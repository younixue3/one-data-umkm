@extends('Front.master')
@section('title', 'Produk')
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
            <div class="w-full">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Produk</h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Produk-produk dari UMKM binaan Dinas Perindustrian dan
                        Perdagangan.
                    </p>
                </header>

                <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="overflow-hidden rounded-lg border">
                        <img
                            src="{{ asset('assets/5.webp') }}"
                            alt="Produk 1"
                            class="h-48 w-full object-cover"
                        />
                        <div class="p-4">
                            <h3 class="text-base font-semibold">
                                Produk Khas Nusantara
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">Rp 150.000</p>
                            <button class="mt-3 rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                                Detail
                            </button>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-lg border">
                        <img
                            src="{{ asset('assets/6.webp') }}"
                            alt="Produk 2"
                            class="h-48 w-full object-cover"
                        />
                        <div class="p-4">
                            <h3 class="text-base font-semibold">Tas Ulir</h3>
                            <p class="mt-1 text-sm text-gray-600">Rp 200.000</p>
                            <button class="mt-3 rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                                Detail
                            </button>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-lg border">
                        <img
                            src="{{ asset('assets/7.webp') }}"
                            alt="Produk 3"
                            class="h-48 w-full object-cover"
                        />
                        <div class="p-4">
                            <h3 class="text-base font-semibold">
                                Batik Motif Khas
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">Rp 350.000</p>
                            <button class="mt-3 rounded bg-blue-500 px-3 py-1 text-sm text-white hover:bg-blue-600">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-center">
                    <nav class="flex items-center space-x-2">
                        <button class="rounded border px-3 py-1 text-sm text-blue-600">
                            1
                        </button>
                        <button class="rounded px-3 py-1 text-sm text-gray-600 hover:bg-gray-100">
                            2
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection