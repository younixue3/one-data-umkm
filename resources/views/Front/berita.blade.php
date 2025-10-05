@extends('Front.master')
@section('title', ucfirst($kategori))
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
            <div class="flex justify-between gap-10">
                <div class="w-full">
                    <header>
                        <h2 class="text-lg uppercase font-medium text-gray-900">
                            {{ $kategori }} Terkini
                        </h2>
                        <p class="mt-1 text-sm uppercase text-gray-600">
                            {{ $kategori }} terbaru dari Dinas Perindustrian dan Perdagangan.
                        </p>
                    </header>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($news as $item)
                        <div class="overflow-hidden rounded-lg bg-white shadow">
                            <div class="p-4">
                                <img
                                    src="{{ $item->image }}"
                                    alt="{{ $item->title }}"
                                    class="w-full rounded-lg h-52 object-cover shadow-md"
                                />
                                <div class="mt-4">
                                    <h3 class="text-lg font-medium text-gray-900">
                                        {{ $item->title }}
                                    </h3>
                                    <div class="mt-2 text-sm text-gray-600">
                                        {!! $item->content !!}
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="text-sm text-gray-500">
                                            {{ date('d M Y', strtotime($item->created_at)) }}
                                        </span>
                                        <a
                                            href="{{ route('berita.show', $item->id) }}"
                                            class="text-sm text-blue-600 hover:text-blue-800"
                                        >
                                            Baca selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="w-64">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">
                        KATEGORI BERITA
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="text-gray-500">📰</span>
                            <a href="{{ route('berita.index', 'umum') }}" class="text-gray-700 hover:text-blue-500">Umum</a>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-500">📢</span>
                            <a href="{{ route('berita.index', 'pemberitahuan') }}" class="text-gray-700 hover:text-blue-500">Pemberitahuan</a>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-500">👥</span>
                            <a href="{{ route('berita.index', 'pelayanan-publik') }}" class="text-gray-700 hover:text-blue-500">Pelayanan Publik</a>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-500">🏪</span>
                            <a href="{{ route('berita.index', 'pojok-umkm') }}" class="text-gray-700 hover:text-blue-500">Pojok UMKM</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection