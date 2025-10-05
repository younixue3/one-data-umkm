@extends('Front.master')
@section('title', 'Kontak')
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
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <!-- Informasi Kontak -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        Informasi Kontak
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Silahkan hubungi kami untuk informasi lebih lanjut.
                    </p>

                    <div class="mt-6 space-y-4">
                        <div>
                            <h3 class="text-base font-semibold">Alamat</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Jalan Raya Sengkawit Komplek Pasar Induk Tanjung Selor
                            </p>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold">E-mail</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Disperindagkop_umkm_kaltara@yahoo.co.id
                            </p>
                        </div>

                        <div>
                            <h3 class="text-base font-semibold">Telp</h3>
                            <p class="mt-1 text-sm text-gray-600">0542-100-111</p>
                        </div>
                    </div>
                </div>

                <!-- Form Kontak -->
                <div>
                    <h2 class="text-lg font-medium text-gray-900">
                        Sampaikan Pesan
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Anda dapat mengirimkan pesan kepada kami.
                    </p>

                    <form class="mt-6 space-y-4">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label
                                    for="nama"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Nama
                                </label>
                                <input
                                    type="text"
                                    name="nama"
                                    id="nama"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Nama Anda"
                                />
                            </div>

                            <div>
                                <label
                                    for="email"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Email
                                </label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Email Anda"
                                />
                            </div>
                        </div>

                        <div>
                            <label
                                for="pesan"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Isi Pesan
                            </label>
                            <textarea
                                id="pesan"
                                name="pesan"
                                rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                placeholder="Tulis pesan Anda di sini"
                            ></textarea>
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
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
@endsection