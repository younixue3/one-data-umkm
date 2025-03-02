@extends('Front.master')
@section('title', 'Kegiatan')
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
                    <h2 class="text-lg font-medium text-gray-900">
                        Pelaporan Kegiatan
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Laporan kegiatan-kegiatan yang telah dilaksanakan oleh Dinas
                        Perindustrian dan Perdagangan.
                    </p>
                </header>

                <div class="mt-6 space-y-6">
                    <div class="overflow-hidden rounded-lg border">
                        <div class="p-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-base font-semibold">
                                    Rapat Kerja Teknis Dinas Perindustrian dan Perdagangan
                                </h3>
                                <span class="text-sm text-gray-500">08 Aug 2018</span>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                Rapat koordinasi terkait pengembangan industri dan
                                perdagangan daerah.
                            </p>
                            <div class="mt-4">
                                <button class="text-sm text-blue-600 hover:text-blue-800">
                                    Baca selengkapnya →
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-lg border">
                        <div class="p-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-base font-semibold">
                                    Kunjungan Kerja ke Thailand
                                </h3>
                                <span class="text-sm text-gray-500">07 Aug 2018</span>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                Studi banding dan pertukaran pengalaman terkait
                                pengembangan UMKM.
                            </p>
                            <div class="mt-4">
                                <button class="text-sm text-blue-600 hover:text-blue-800">
                                    Baca selengkapnya →
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden rounded-lg border">
                        <div class="p-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-base font-semibold">
                                    Pelatihan UMKM Digital
                                </h3>
                                <span class="text-sm text-gray-500">06 Aug 2018</span>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                Program pelatihan digitalisasi untuk pelaku UMKM di
                                wilayah kota.
                            </p>
                            <div class="mt-4">
                                <button class="text-sm text-blue-600 hover:text-blue-800">
                                    Baca selengkapnya →
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection